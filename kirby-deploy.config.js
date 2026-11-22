import { defineConfig } from 'kirby-deploy';

const targets = ['staging', 'production'];
const target = process.env.DEPLOY_TARGET;

if (!targets.includes(target)) {
  throw new Error(`DEPLOY_TARGET must be one of: ${targets.join(', ')}`);
}

const prefix = `DEPLOY_${target.toUpperCase()}_`;

const environmentValue = (key) => {
  const value = process.env[`${prefix}${key}`];

  return value === undefined || value.trim() === '' ? undefined : value;
};

const requiredEnvironmentValue = (key) => {
  const value = environmentValue(key);

  if (value === undefined) {
    throw new Error(`${prefix}${key} is required`);
  }

  return value;
};

const booleanEnvironmentValue = (key, defaultValue) => {
  const value = environmentValue(key);

  if (value === undefined) {
    return defaultValue;
  }

  const normalizedValue = value.toLowerCase();

  if (['1', 'true', 'yes', 'on'].includes(normalizedValue)) {
    return true;
  }

  if (['0', 'false', 'no', 'off'].includes(normalizedValue)) {
    return false;
  }

  throw new Error(`${prefix}${key} must be a boolean`);
};

const callWebhooks = booleanEnvironmentValue('CALL_WEBHOOKS', false);
const url = callWebhooks ? requiredEnvironmentValue('URL') : environmentValue('URL');
const token = callWebhooks ? requiredEnvironmentValue('TOKEN') : environmentValue('TOKEN');

export default defineConfig({
  host: requiredEnvironmentValue('HOST'),
  user: requiredEnvironmentValue('USER'),
  password: requiredEnvironmentValue('PASSWORD'),
  remoteDir: environmentValue('REMOTE_DIR') ?? './',
  folderStructure: 'flat',
  checkComposerLock: true,
  dryRun: booleanEnvironmentValue('DRY_RUN', true),
  verbose: booleanEnvironmentValue('VERBOSE', false),
  // Deploy Vite's generated build output without its source files and local tooling.
  exclude: [
    '^assets/fonts/',
    '^assets/images/',
    '^assets/scripts/',
    '^assets/styles/',
    '^ide\\.json$',
    '^kirby-deploy\\.config\\.js$',
    '^LICENSE$',
    '^package-lock\\.json$',
    '^package\\.json$',
    '^README\\.md$',
    '^vite\\.config\\.js$',
  ],

  // The optional Composer plugin must be installed before enabling webhooks.
  url,
  token,
  callWebhooks,

  lftpSettings: {
    'ftp:ssl-force': booleanEnvironmentValue('FTP_SSL_FORCE', true),
  },
  lftpFlags: ['--no-perms'],
});
