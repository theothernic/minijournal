import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/js/app.js',
                'resources/js/editor.js',
                'resources/js/layouts/simple.js'
            ],
            refresh: true,
        }),
    ],
});
