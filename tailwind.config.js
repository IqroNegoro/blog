/** @type {import('tailwindcss').Config} */
module.exports = {
  content: ["./resources/**/*.blade.php"],
  theme: {
    extend: {
      animation: {
        "notif": "notif 5s linear forwards"
      },
      keyframes: {
        notif: {
          "0%": {transform: "translateY(4rem)"},
          "1%, 99%": {transform: "translateY(0)"},
          "100%": {transform: "translateY(10rem)", display: "none"}
        }
      }
    },
  },
  plugins: [],
}
