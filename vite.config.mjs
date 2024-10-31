import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel([
            'resources/js/app.js',
            'resources/css/app.css',
        ]),
    ],
    server: {
        port: 5175, // Port yang sesuai dengan Vite
    },
});
