const tailwindcss = require("tailwindcss");
module.exports = {
    plugins: [
        require('postcss-import'),
        require('precss'),
        require('tailwindcss'),
        tailwindcss('./tailwind.config.js'),
        require('postcss-nested'),
        require('autoprefixer'),
    ]
}