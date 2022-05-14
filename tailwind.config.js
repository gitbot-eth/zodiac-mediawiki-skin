module.exports = {
  theme: {
    fontFamily: {
      mono: "Roboto Mono, ui-monospace",
      serif: "Spectral, Georgia, ui-serif",
    },
    extend: {
      screens: {
        'max-md': {max: '768px'}
      },
      inset: {
        "6": "1.5rem",
      },
      colors: {
        brown: {
          100: "#E3DCD4",
          200: "#CABCAE",
          300: "#A59584",
          400: "#867664",
          500: "#544637",
          800: "#201912",
          900: "#170B05",
        },
        zodiacGreen: {
          300: "#A8E07E",
        }
      },
      opacity: {
        80: "0.8",
      }
    },
  },
  variants: {
    // Some useful comment
  },
  plugins: [
    // Some useful comment
  ]
}
