import cookieParser from "cookie-parser";
import session from "express-session";
import express from "express";
import path from "path";
import hbs from "hbs";

import { PrismaClient } from "@prisma/client";
import { PrismaSessionStore } from "@quixo3/prisma-session-store";
import { fileURLToPath } from "url";

import homeRoutes from "./routes/index.js";
import adminRoutes from "./routes/admin.js";

const prisma = new PrismaClient();
const app = express();

// path setup
const __filename = fileURLToPath(import.meta.url);
const __dirname = path.dirname(__filename);

// public folder for static files (css, images, js)
app.use(express.json());
app.use(cookieParser());
app.use(express.urlencoded({ extended: true })); // to parse form data
app.use(
  session({
    secret: "supersecretkey",
    resave: false,
    saveUninitialized: false,
    store: new PrismaSessionStore(prisma, {
      checkPeriod: 2 * 60 * 1000, // every 2 minutes clean expired
      dbRecordIdIsSessionId: true,
      dbRecordIdFunction: undefined,
    }),
    cookie: {
      secure: false,
      httpOnly: true,
      sameSite: "lax",
      maxAge: 1000 * 60 * 60 * 2, // 2 hours
    },
  })
);
app.use(express.static(path.join(__dirname, "public")));
app.use("/uploads", express.static("public/uploads"));
app.use((req, res, next) => {
    res.locals.isLoggedIn = !!req.session.userId;
    res.locals.user = req.session.user || null;
    res.locals.isAdminPage = req.originalUrl.startsWith("/admin");
    next();
});

// set view engine
app.set("view engine", "hbs");
app.set("views", path.join(__dirname, "views"));

hbs.registerPartials(path.join(__dirname, "views/partials"));
hbs.registerHelper("formatDateRange", (start, end) => {
  if (!start) return "";
  const startDate = new Date(start);
  const endDate = end ? new Date(end) : null;

  const startStr = startDate.toLocaleString("en-US", {
    month: "short",
    year: "numeric",
  });
  const endStr = endDate
    ? endDate.toLocaleString("en-US", { month: "short", year: "numeric" })
    : "Present";

  return `${startStr} – ${endStr}`;
});

// routes
app.use("/", homeRoutes);
app.use("/admin", adminRoutes);

// run server
const PORT = 3000;
app.listen(PORT, () => console.log(`Server running at http://localhost:${PORT}`));
