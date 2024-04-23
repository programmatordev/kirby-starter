/** @type {import('tailwindcss').Config} */
export default {
  content: [
    'site/(templates|snippets)/**/*.php',
    'assets/styles/app.css'
  ],
  theme: {
    extend: {
      fontFamily: {
        sans: '-apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, Helvetica, Arial, sans-serif, "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol"',
        mono: '"SFMono-Regular", Consolas, "Liberation Mono", Menlo, Courier, monospace'
      }
    },
  },
  plugins: [
    require('@tailwindcss/typography')
  ],
}