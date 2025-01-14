import fluid, { extract, screens, fontSize } from 'fluid-tailwind';

/** @type {import('tailwindcss').Config} */
export default {
  content: {
    files: [
      'site/(templates|snippets)/**/*.php',
      'assets/styles/app.css'
    ],
    extract
  },
  theme: {
    screens,
    fontSize,
    extend: {},
  },
  plugins: [
      fluid()
  ],
  future: {
    hoverOnlyWhenSupported: true
  }
}