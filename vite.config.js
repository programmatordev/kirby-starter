import { globSync } from "glob";
import { resolve } from "path";
import { defineConfig } from "vite";
import kirby from "vite-plugin-kirby";
import tailwindcss from "@tailwindcss/vite";

const port = 5173;
const origin = `${process.env.DDEV_PRIMARY_URL}:${port}`;

const outDir = 'build';
const assetsDir = 'assets';

// Keep app.css as an explicit entry so app styles and dependency CSS emit separately.
// PHP templates can reference images and fonts through vite().file(), so include them in the manifest.
const input = globSync([
  'assets/scripts/app.js',
  'assets/styles/app.css',
  'assets/{images,fonts}/**/*.*'
]).map((path) => resolve(process.cwd(), path));

export default defineConfig(({ mode }) => ({
  base: mode === 'development' ? '/' : `/${outDir}/`,

  build: {
    outDir,
    assetsDir,
    rollupOptions: {
      input,
      output: {
        chunkFileNames: 'scripts/[name]-[hash].js',
        entryFileNames: 'scripts/[name]-[hash].js',
        assetFileNames: (chunkInfo) => {
          const fileName = chunkInfo.names?.[0] ?? chunkInfo.originalFileNames?.[0] ?? '';

          if (/\.(gif|jpe?g|png|svg|webp|avif)$/i.test(fileName)) {
            return 'images/[name]-[hash][extname]';
          }

          if (/\.(woff2?|eot|ttf|otf)$/i.test(fileName)) {
            return 'fonts/[name]-[hash][extname]';
          }

          if (/\.css$/.test(fileName)) {
            return 'styles/[name]-[hash][extname]';
          }

          // Keep Rollup's default naming for unclassified assets.
          return '[name]-[hash][extname]';
        },
      }
    }
  },

  // Make Vite available through DDEV's public URL.
  server: {
    // Listen outside the container so DDEV can proxy requests.
    host: '0.0.0.0',
    port,
    strictPort: true,
    // Generate development asset URLs from DDEV's public origin.
    origin,
    cors: true
  },

  plugins: [
    kirby({
      watch: [
        'site/(templates|snippets|controllers|models|collections)/**/*.php',
        'content/**/*',
      ]
    }),
    tailwindcss(),
  ]
}));
