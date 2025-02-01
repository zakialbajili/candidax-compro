/** @type {import('tailwindcss').Config} */
export default {
  content: [
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
    "./resources/**/*.vue",
  ],
  theme: {
    extend: {
      fontFamily:{
        poppins:["Poppins", "Serif"]
      },
      colors:{
        softBlue: "#5879C4",
        jungleGreen: "#22A585",
        mintGreen: "#37C287",
        cherryRed:  "#D92632",
        deepBlue: "#004EB2",
        skyBlue: "#2F96F4",
        lightBlue: "#BCE3F9",
        gold: "#F7C257",
        primerText: "#404040",
        secondaryText: "#404856",
        border: "#E2E1DE",
        lightGray: "#F7F5F2",
        subtleGray: "#F8F9FC"
      }
    },
  },
  plugins: [],
}

