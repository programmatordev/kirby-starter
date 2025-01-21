import * as CookieConsent from "vanilla-cookieconsent";
import * as Category from "./utils/categories.js";

// import languages
import * as En from "./languages/en.js";
import * as Pt from "./languages/pt.js";

import "vanilla-cookieconsent/dist/cookieconsent.css";

export default class CookieConsentPlugin {
  static categories = {
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

  static translations = {
    en: En.TRANSLATIONS,
    pt: Pt.TRANSLATIONS
  }

  static sections = {
    en: En.SECTIONS,
    pt: Pt.SECTIONS
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

    const languages = Object.keys(this.translations);
    const categories = this.collectConsentCategories();

    // build config categories and translations
    for (const language of languages) {
      // add base translations and header section
      configOptions.language.translations[language] = this.translations[language];
      configOptions.language.translations[language].preferencesModal.sections.push(this.sections[language]['header']);

      for (const category of categories) {
        // add both the category and its related section
        configOptions.categories[category] = this.categories[category];
        configOptions.language.translations[language].preferencesModal.sections.push(this.sections[language][category]);
      }
    }

    CookieConsent.run(configOptions);
  }

  static collectConsentCategories() {
    // always include the "necessary" category
    const categories = [Category.NECESSARY];

    // // Google Analytics integration
    // if (import.meta.env.VITE_GOOGLE_ANALYTICS_MEASUREMENT_ID.length) {
    //   categories.push(
    //     Category.ANALYTICS,
    //     Category.ADVERTISEMENT,
    //     Category.FUNCTIONALITY,
    //     Category.SECURITY
    //   );
    // }

    return categories;
  }
}
