import { defineConfig } from 'vite';

export default defineConfig({
    base: '/boltonbarber/',
    build: {
        outDir: 'dist-pages',
        emptyOutDir: true,
    },
});
