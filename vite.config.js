import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: ['resources/css/app.css', 
                'resources/js/app.js',
                'node_modules/admin-lte/dist/css/adminlte.min.css',
                'node_modules/@fortawesome/fontawesome-free/css/all.min.css',
                'node_modules/overlayscrollbars/css/OverlayScrollbars.min.css'
            ],
            refresh: true,
        }),
    ],
});
