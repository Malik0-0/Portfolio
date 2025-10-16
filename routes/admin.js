import express from "express";
import bcrypt from "bcrypt";
import multer from "multer";
import path from "path";
import fs from "fs";
import { fileURLToPath } from "url";
import { PrismaClient } from "@prisma/client";

const router = express.Router();
const prisma = new PrismaClient();

const __filename = fileURLToPath(import.meta.url);
const __dirname = path.dirname(__filename);

function deleteFiles(filePaths) {
  if (!filePaths || !filePaths.length) return;

  filePaths.forEach((filePath) => {
    try {
      const fullPath = path.join(__dirname, "../public", filePath);
      if (fs.existsSync(fullPath)) {
        fs.unlinkSync(fullPath);
        console.log("🗑️ Deleted:", fullPath);
      } else {
        console.log("⚠️ File not found:", fullPath);
      }
    } catch (err) {
      console.error("⚠️ Failed to delete:", filePath, err);
    }
  });
}

// Middleware to check if logged in
function isAuthenticated(req, res, next) {
  if (req.session.userId) return next();
  res.redirect("/admin/login");
}

// Login Page
router.get("/login", (req, res) => {
  res.render("admin/login", { layout: "layouts/base", title: "Admin Login" });
});

// Login Action
router.post("/login", async (req, res) => {
  const { email, password } = req.body;

  const user = await prisma.user.findUnique({ where: { email } });
  if (!user) return res.send("User not found");

  const valid = await bcrypt.compare(password, user.password_hash);
  if (!valid) return res.send("Invalid password");

  req.session.userId = user.id;
  res.redirect("/admin/dashboard");
});

// Dashboard (Protected)
router.get("/dashboard", isAuthenticated, async (req, res) => {
  const projects = await prisma.project.findMany();
  const experiences = await prisma.experience.findMany();

  res.render("admin/dashboard", {
    layout: "layouts/base",
    title: "Admin Dashboard",
    projects,
    experiences,
  });
});

// Logout
router.get("/logout", (req, res) => {
  req.session.destroy(() => res.redirect("/admin/login"));
});

// Setup Multer storage
const storage = multer.diskStorage({
  destination: (req, file, cb) => {
    cb(null, path.join(__dirname, "../public/uploads"));
  },
  filename: (req, file, cb) => {
    const uniqueSuffix = Date.now() + "-" + Math.round(Math.random() * 1e9);
    const ext = path.extname(file.originalname);
    cb(null, file.fieldname + "-" + uniqueSuffix + ext);
  },
});

const upload = multer({ storage });

// ADD NEW PROJECT PAGE
router.get("/projects/new", isAuthenticated, (req, res) => {
  res.render("admin/project_new", {
    layout: "layouts/base",
    title: "Add Project",
    isDarkMode: true,
  });
});

// ADD PROJECT ACTION
router.post("/projects/new", isAuthenticated, upload.array("images", 10), async (req, res) => {
  try {
    const { title, description, tech, repo_url, demo_url } = req.body;

    const images = req.files ? req.files.map(f => `/uploads/${f.filename}`) : [];

    await prisma.project.create({
      data: {
        title,
        description,
        tech: tech.split(",").map((t) => t.trim()),
        images,
        repo_url,
        demo_url,
      },
    });

    res.redirect("/admin/dashboard");
  } catch (err) {
    console.error(err);
    res.status(500).send("Error saving project");
  }
});

// ADD NEW EXPERIENCE PAGE
router.get("/experience/new", isAuthenticated, (req, res) => {
  res.render("admin/experience_new", {
    layout: "layouts/base",
    title: "Add Experience",
    isDarkMode: true,
  });
});

// ADD EXPERIENCE ACTION
router.post("/experience/new", isAuthenticated, upload.array("pictures", 5), async (req, res) => {
  const { role, company, location, start_date, end_date, description, tech } = req.body;

  const pictures = req.files ? req.files.map(f => `/uploads/${f.filename}`) : [];

  await prisma.experience.create({
    data: {
      role,
      company,
      location,
      start_date: new Date(start_date),
      end_date: end_date ? new Date(end_date) : null,
      description,
      tech: tech ? tech.split(",").map((t) => t.trim()) : [],
      pictures,
    },
  });

  res.redirect("/admin/dashboard");
});


// Edit Project (GET)
router.get("/projects/edit/:id", isAuthenticated, async (req, res) => {
  const project = await prisma.project.findUnique({ where: { id: parseInt(req.params.id) } });
    res.render("admin/project_edit", { layout: "layouts/base", project, title: "Edit Project" });
});

// Edit Project (POST)
router.post(
  "/projects/edit/:id",
  isAuthenticated,
  upload.array("images"), // ✅ field name changed here
  async (req, res) => {
    try {
      const id = parseInt(req.params.id);
      const { title, description, tech, repo_url, demo_url } = req.body;

      // Find the existing project
      const project = await prisma.project.findUnique({ where: { id } });
      if (!project) return res.status(404).send("Project not found");

      // If user uploaded new images, delete old ones first
      let updatedImages = project.images;
      if (req.files && req.files.length > 0) {
        deleteFiles(project.images);
        updatedImages = req.files.map((f) => `/uploads/${f.filename}`);
      }

      await prisma.project.update({
        where: { id },
        data: {
          title,
          description,
          tech: tech ? tech.split(",").map((t) => t.trim()) : [],
          repo_url,
          demo_url,
          images: updatedImages,
        },
      });

      res.redirect("/admin/dashboard");
    } catch (err) {
      console.error("❌ Error updating project:", err);
      res.status(500).send(`Error updating project: ${err.message}`);
    }
  }
);



// Delete Project
router.post("/projects/delete/:id", isAuthenticated, async (req, res) => {
  try {
    const project = await prisma.project.findUnique({
      where: { id: parseInt(req.params.id) },
    });

    if (project?.pictures?.length) {
      deleteFiles(project.pictures);
    }

    await prisma.project.delete({ where: { id: parseInt(req.params.id) } });
    res.redirect("/admin/dashboard");
  } catch (err) {
    console.error("❌ Error deleting project:", err);
    res.status(500).send("Error deleting project");
  }
});
// Edit Experience (GET)
router.get("/experience/edit/:id", isAuthenticated, async (req, res) => {
  const exp = await prisma.experience.findUnique({ where: { id: parseInt(req.params.id) } });
    res.render("admin/experience_edit", { layout: "layouts/base", exp, title: "Edit Experience" });
});

// Edit Experience (POST)
router.post(
  "/experience/edit/:id",
  isAuthenticated,
  upload.array("pictures"), // ✅ field name for experience
  async (req, res) => {
    try {
      const id = parseInt(req.params.id);
      const { role, company, location, description, tech, start_date, end_date } = req.body;

      // Find the existing experience
      const exp = await prisma.experience.findUnique({ where: { id } });
      if (!exp) return res.status(404).send("Experience not found");

      // If new pictures uploaded, replace and delete old
      let updatedPictures = exp.pictures;
      if (req.files && req.files.length > 0) {
        deleteFiles(exp.pictures);
        updatedPictures = req.files.map((f) => `/uploads/${f.filename}`);
      }

      await prisma.experience.update({
        where: { id },
        data: {
          role,
          company,
          location,
          description,
          start_date: start_date ? new Date(start_date) : exp.start_date,
          end_date: end_date ? new Date(end_date) : exp.end_date,
          tech: tech ? tech.split(",").map((t) => t.trim()) : [],
          pictures: updatedPictures,
        },
      });

      res.redirect("/admin/dashboard");
    } catch (err) {
      console.error("❌ Error updating experience:", err);
      res.status(500).send(`Error updating experience: ${err.message}`);
    }
  }
);



// Delete Experience
router.post("/experience/delete/:id", isAuthenticated, async (req, res) => {
  try {
    const exp = await prisma.experience.findUnique({
      where: { id: parseInt(req.params.id) },
    });

    if (exp?.pictures?.length) {
      deleteFiles(exp.pictures);
    }

    await prisma.experience.delete({ where: { id: parseInt(req.params.id) } });
    res.redirect("/admin/dashboard");
  } catch (err) {
    console.error("❌ Error deleting experience:", err);
    res.status(500).send("Error deleting experience");
  }
});



  
export default router;
