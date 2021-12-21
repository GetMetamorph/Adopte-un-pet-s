module.exports = {
    purge: ['./templates/**/*.twig'],
    darkMode: 'class',
    theme: { extend: {}, },
    variants: { extend: {}, },
    plugins: [
        require('@themesberg/flowbite/plugin')
    ],
}