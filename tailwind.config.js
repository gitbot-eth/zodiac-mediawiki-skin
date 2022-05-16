module.exports = {
  corePlugins: {
    animation: false,
    divideColor: false,
    divideWidth: false,
    gradientColorStops: false,
  },
  theme: {
    colors: {
      transparent: "transparent",
      white: "#ffffff",
      black: "#000000",
      brown: {
        100: "#E3DCD4",
        200: "#CABCAE",
        300: "#A59584",
        400: "#867664",
        500: "#544637",
        800: "#201912",
        900: "#170B05",
      },
      red: {
        200: "#F09D97",
        600: "#F7262B",
      },
      green: {
        300: "#A8E07E",
        600: "#68A12E",
        800: "#4B7B19",
      },
    },
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
      opacity: {
        80: "0.8",
      }
    }
  },
  variants: {
    backgroundColor: ['default'],
    borderColor: ['default'],
    color: ['default'],
    fontWeight: ['default'],
    translate: ['default'],
    scale: ['default'],
    skew: ['default'],
    space: ['responsive','default'],
  },
  plugins: [
    // Some useful comment
  ]
}
