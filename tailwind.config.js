/** @type {import('tailwindcss').Config} */
export default {
    content: [
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        "./resources/**/*.vue",
      ],
  theme: {
    extend: {
        // backgroundImage: {
        //   'custom-bg': "url('/public/images/online_test.png')",
        // }
        colors: {
            'custom-white': '#fff',
            'custom-pink': '#cea0e9',
            'customRose':'#f22d65'
          },
      },
  },
  plugins: [],
}

