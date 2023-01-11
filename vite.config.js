import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import mkcert from 'vite-plugin-mkcert'
const fs = require('fs');

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/sass/app.scss',
                'resources/js/app.js',
            ],
            refresh: true,
        }),
    ],
    server: {
        host: '0.0.0.0',
        hmr: {
            host: 'localhost'
        },
        https: {
            key: fs.readFileSync('devilbox-ca.key'),
            cert: fs.readFileSync('devilbox-ca.crt'),
        },
        plugins: [ mkcert() ],
    },
});
