import { globSync } from 'glob';
import { resolve } from 'path';
import { defineConfig } from 'vite';
import kirby from 'vite-plugin-kirby';

// set port and origin for server config
const port = 5173;
const origin = `${process.env.DDEV_PRIMARY_URL}:${port}`;

// build directory
const outDir = 'build';
const assetsDir = 'assets';

// find all files from the assets directory
const input = [...globSync(['assets/scripts/app.js', 'assets/*(images|fonts)/**/*.*'])].map(
  (path) => resolve(process.cwd(), path)
);

export default defineConfig(({ mode }) => ({
  base: mode === 'development' ? '/' : `/${outDir}`,

  build: {
    outDir: outDir,
    assetsDir: assetsDir,
    rollupOptions: {
      input: input,
      output: {
        manualChunks: (id) => {
          // split vendor chunk for cacheability
          if (id.includes('node_modules')) {
            return 'vendor';
          }
        },
        chunkFileNames: 'scripts/[name]-[hash].js',
        entryFileNames: 'scripts/[name]-[hash].js',
        assetFileNames: ({ names }) => {
          const fileName = names ?? '';

          if (/\.(gif|jpe?g|png|svg)$/.test(fileName)) {
            return 'images/[name]-[hash][extname]';
          }

          if (/\.(woff2?)$/.test(fileName)) {
            return 'fonts/[name]-[hash][extname]';
          }

          if (/\.css$/.test(fileName)) {
            return 'styles/[name]-[hash][extname]';
          }

          // default value
          // https://rollupjs.org/guide/en/#outputassetfilenames
          return '[name]-[hash][extname]';
        },
      }
    }
  },

  // adjust vite's dev server for ddev
  server: {
    // respond to all network requests:
    host: '0.0.0.0',
    port: port,
    strictPort: true,
    // defines the origin of the generated asset URLs during development
    origin: origin,
    cors: true
  },

  plugins: [
    kirby({
      watch: [
        'site/(templates|snippets|controllers|models|layouts)/**/*.php',
        'content/**/*',
      ]
    })
  ]
}));
