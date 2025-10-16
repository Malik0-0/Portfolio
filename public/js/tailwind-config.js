window.tailwind = window.tailwind || {};
window.tailwind.config = {
  darkMode: "class",
  theme: {
    extend: {
      colors: {
        neon: "#00E5FF",
      },
      transitionProperty: {
        colors: "background-color, border-color, color, fill, stroke",
      },
    },
  },
};
