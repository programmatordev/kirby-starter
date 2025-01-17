import * as CookieConsent from "vanilla-cookieconsent";
import * as Category from "./utils/categories.js";

// import languages
import * as en from "./languages/en.js";
import * as pt from "./languages/pt.js";

import "vanilla-cookieconsent/dist/cookieconsent.css";

export default class CookieConsentPlugin {
  static categoryEntries = {
    [Category.NECESSARY]: {
      enabled: true,
      readOnly: true
    },
    [Category.ANALYTICS]: {
      autoClear: {
        cookies: [
          { name: /^_ga/ },
          { name: '_gid' }
        ]
      }
    },
    [Category.ADVERTISEMENT]: {},
    [Category.FUNCTIONALITY]: {},
    [Category.SECURITY]: {}
  }

  static translationEntries = {
    en: en.translations,
    pt: pt.translations
  }

  static sectionEntries = {
    en: en.sections,
    pt: pt.sections
  }

  static init() {
    let configOptions = {
      categories: {},
      language: {
        default: 'en',
        // language based on html lang attribute
        // https://cookieconsent.orestbida.com/reference/configuration-reference.html#language-autodetect
        autoDetect: 'document',
        translations: {}
      }
    };

    const languages = Object.keys(this.translationEntries);
    const categories = [Category.NECESSARY];

    // Google Tag Manager integration
    if (import.meta.env.VITE_GOOGLE_TAG_MANAGER_MEASUREMENT_ID.length) {
      // add related categories
      categories.push(
        Category.ANALYTICS,
        Category.ADVERTISEMENT,
        Category.FUNCTIONALITY,
        Category.SECURITY
      );
    }

    // build config categories and translations
    for (const language of languages) {
      // add base translations and header preferences
      configOptions.language.translations[language] = this.translationEntries[language];
      configOptions.language.translations[language].preferencesModal.sections.push(this.sectionEntries[language]['header']);

      for (const category of categories) {
        // add both the category and its related section
        configOptions.categories[category] = this.categoryEntries[category];
        configOptions.language.translations[language].preferencesModal.sections.push(this.sectionEntries[language][category]);
      }
    }

    CookieConsent.run(configOptions);
  }
}
