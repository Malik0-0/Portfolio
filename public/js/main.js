document.addEventListener("DOMContentLoaded", () => {
  const toggle = document.getElementById("darkModeToggle");
  const savedTheme =
    document.cookie.match(/theme=(dark|light)/)?.[1] ||
    localStorage.getItem("theme") ||
    "light";

  const setTheme = (isDark) => {
    document.documentElement.classList.toggle("dark", isDark);
    document.cookie = `theme=${isDark ? "dark" : "light"}; path=/; max-age=31536000`;
    localStorage.setItem("theme", isDark ? "dark" : "light");
  };

  setTheme(savedTheme === "dark");
  if (toggle) toggle.textContent = savedTheme === "dark" ? "☀️" : "🌙";

  toggle?.addEventListener("click", () => {
    const isDark = !document.documentElement.classList.contains("dark");
    setTheme(isDark);
    document.body.style.transition = "opacity 0.3s";
    document.body.style.opacity = 0;
    setTimeout(() => window.location.reload(), 250);
  });

  // Carousel
  document.querySelectorAll(".group").forEach(group => {
    const images = group.querySelectorAll(".carousel-image");
    let index = 0;
    const showImage = (i) => {
      images.forEach((img, j) => {
        img.classList.toggle("opacity-100", j === i);
        img.classList.toggle("opacity-0", j !== i);
        img.classList.toggle("pointer-events-none", j !== i);
      });
    };
    showImage(index);
    group.querySelector(".next-btn")?.addEventListener("click", () => {
      index = (index + 1) % images.length;
      showImage(index);
    });
    group.querySelector(".prev-btn")?.addEventListener("click", () => {
      index = (index - 1 + images.length) % images.length;
      showImage(index);
    });
  });

  // Lightbox
  const lightbox = document.getElementById("imageLightbox");
  const lightboxImage = document.getElementById("lightboxImage");

  document.body.addEventListener("click", (e) => {
    const target = e.target;
    if (
      target.tagName === "IMG" &&
      !target.closest("#imageLightbox") &&
      !target.classList.contains("pointer-events-none")
    ) {
      lightboxImage.src = target.src;
      lightbox.classList.remove("hidden");
      lightbox.classList.add("flex");
    }
  });

  lightbox?.addEventListener("click", () => {
    lightbox.classList.add("hidden");
    lightbox.classList.remove("flex");
    lightboxImage.src = "";
  });

  document.addEventListener("keydown", (e) => {
    if (e.key === "Escape" && !lightbox.classList.contains("hidden")) {
      lightbox.classList.add("hidden");
      lightbox.classList.remove("flex");
      lightboxImage.src = "";
    }
  });

  // Delete image (Admin)
  const container = document.getElementById("existingImages");
  container?.addEventListener("click", async (e) => {
    const btn = e.target.closest("button[data-url]");
    if (!btn) return;
    const imageUrl = btn.dataset.url;
    if (!confirm("Remove this image?")) return;

    try {
      const res = await fetch(`/admin/experience/{{exp.id}}/delete-image`, {
        method: "POST",
        headers: { "Content-Type": "application/json" },
        body: JSON.stringify({ imageUrl }),
      });
      if (res.ok) btn.parentElement.remove();
      else alert("Failed to delete image.");
    } catch (err) {
      console.error(err);
      alert("Error deleting image.");
    }
  });

  window.addEventListener("load", () => {
    document.body.classList.add("loaded");
  });
});
