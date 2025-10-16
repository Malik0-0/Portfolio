document.addEventListener("DOMContentLoaded", () => {
  const marquee = document.querySelector(".animate-marquee");
  marquee?.addEventListener("mouseenter", () => {
    marquee.style.animationPlayState = "paused";
  });
  marquee?.addEventListener("mouseleave", () => {
    marquee.style.animationPlayState = "running";
  });
});
