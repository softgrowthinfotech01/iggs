/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    "./*.php",
    "./admin/**/*.php",
    "./components/**/*.php",
    "./js/**/*.js"
  ],

  safelist: [
    'bg-indigo-50',
    'border-indigo-100',
    'text-indigo-700',

    'bg-violet-50',
    'border-violet-100',
    'text-violet-700',

    'bg-emerald-50',
    'border-emerald-100',
    'text-emerald-700',

    'bg-amber-50',
    'border-amber-100',
    'text-amber-700',

    'bg-sky-50',
    'border-sky-100',
    'text-sky-700',

    'bg-rose-50',
    'border-rose-100',
    'text-rose-700'
  ],

  theme: {
    extend: {},
  },

  plugins: [],
}