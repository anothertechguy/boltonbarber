import { defineConfig } from 'vite';
import path from 'path';

export default defineConfig({
    base: process.env.NODE_ENV === 'production' ? '/wp-content/themes/bolton-barber-theme/dist/' : '/',
    build: {
        outDir: 'dist',
        manifest: true,
        rollupOptions: {
            input: {
                main: path.resolve(__dirname, 'src/main.ts'),
            },
        },
    },
    server: {
        allowedHosts: ['qvsix-73-229-163-111.a.free.pinggy.link', '.pinggy.link'],
        cors: true,
        strictPort: true,
        port: 5173,
        hmr: {
            host: 'localhost',
        },
    },
});
