module.exports = {
  content: [
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
    "./resources/**/*.vue",
  ],
  theme: {
    extend: {
      spinner: (theme) => ({
        default: {
          color: '#dae1e7',
          size: '1em',
          border: '2px',
          speed: '500ms',
        },
        md: {
          color: theme('colors.red.500'),
          size: '2em',
          border: '2px',
          speed: '500ms',
        },
      }),
    },
  },
  plugins: [
    require('tailwindcss-spinner')({
      className: 'spinner',
      themeKey: 'spinner',
    }),
  ],
};
