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

// find all css and js files from the assets directory
const input = [...globSync('assets/**/*.{css,js}')].map(
  (path) => resolve(process.cwd(), path)
);

// noinspection JSCheckFunctionSignatures,JSUnusedGlobalSymbols
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
        chunkFileNames: 'assets/js/[name]-[hash].js',
        entryFileNames: 'assets/js/[name]-[hash].js',
        assetFileNames: ({ name }) => {
          const fileName = name ?? '';

          if (/\.(gif|jpe?g|png|svg)$/.test(fileName)) {
            return 'assets/images/[name]-[hash][extname]';
          }

          if (/\.css$/.test(fileName)) {
            return 'assets/css/[name]-[hash][extname]';
          }

          // default value
          // https://rollupjs.org/guide/en/#outputassetfilenames
          return 'assets/[name]-[hash][extname]';
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
    origin: origin
  },

  plugins: [
    kirby({
      watch: [
        'site/(templates|snippets)/**/*.php',
        'content/**/*',
      ]
    })
  ]
}));
