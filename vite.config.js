import { defineConfig } from 'vite'

// https://vitejs.dev/config/
export default defineConfig({
  build: {
    watch: {
      include: 'includes/Frontend/assets/src/**'
    },
    rollupOptions: {
      input: '/includes/Frontend/assets/src/main.js',
      output: {
        dir: 'includes/Frontend/assets/built/',
        entryFileNames: 'index.js',
        assetFileNames: 'index.css'
      }
    }
  }
});