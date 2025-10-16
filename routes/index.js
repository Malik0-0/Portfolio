import express from "express";
import { PrismaClient } from "@prisma/client";

const router = express.Router();
const prisma = new PrismaClient();

router.get("/", async (req, res) => {
  try {
    const isDarkMode =
      req.cookies.theme === "dark" || req.query.theme === "dark" || false;

    const experiences = await prisma.experience.findMany({
      orderBy: { start_date: "desc" },
    });

    const projects = await prisma.project.findMany({
      orderBy: { createdAt: "desc" },
    });

    res.render("index", {
      layout: "layouts/base",
      title: "Portfolio",
      experiences,
      projects,
      isDarkMode,
    });
  } catch (err) {
    console.error("❌ Error rendering homepage:", err);
    res.status(500).send("Server error");
  }
});

export default router;
