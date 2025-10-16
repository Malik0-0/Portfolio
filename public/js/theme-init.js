(() => {
  const theme =
    document.cookie.match(/theme=(dark|light)/)?.[1] ||
    localStorage.getItem("theme") ||
    "light";

  if (theme === "dark") {
    document.documentElement.classList.add("dark");
  } else {
    document.documentElement.classList.remove("dark");
  }

  // Prevent flash before Tailwind applies
  document.documentElement.style.visibility = "hidden";
})();
