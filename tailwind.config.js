/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    './resources/**/*.blade.php',
    './resources/**/*.js',
    './resources/**/*.vue',
    'node_modules/preline/dist/*.js',
  ],
  theme: {
    extend: {
      colors: {
        primary: {
          DEFAULT: '#ffffff', // main primary color
          light: '#F5F5DC',   // lighter shade for primary
          dark: '#688557',    // darker shade for primary
        },
        secondary: '#81C784', // secondary color
        accent: '#8D6E63',
        text: '#034620',    // accent color
      }
    },
  },
  plugins: [
    require('preline/plugin'),
  ],
}