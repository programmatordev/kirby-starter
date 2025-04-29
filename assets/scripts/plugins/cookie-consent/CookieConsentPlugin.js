import * as CookieConsent from "vanilla-cookieconsent";
import { mergician } from "mergician";

import { CAT_NECESSARY } from './utils/categories.js';
import { baseTranslations, baseSections, HEADER_SECTION } from "./utils/translations.js";
import { googleAnalytics } from "./providers/google-analytics.js";

import "vanilla-cookieconsent/dist/cookieconsent.css";

export default class CookieConsentPlugin {
  static init() {
    // create custom merge
    const merge = mergician({ appendArrays: true, dedupArrays: true });
    // get consent providers settings from meta tag
    const providers = JSON.parse(
      document.querySelector('meta[name="site-consent-providers"]').getAttribute('content')
    );


    /** @type {import("../../types").CookieConsentConfig} */
    let config = {
      categories: {
        [CAT_NECESSARY]: {
          enabled: true,
          readOnly: true
        }
      },
      language: {
        default: 'en',
        autoDetect: 'document',
        translations: baseTranslations
      }
    };

    // CATEGORIES
    // add additional categories according to configured providers
    if (providers.googleAnalytics) {
      config.categories = merge(config.categories, googleAnalytics.categories);
    }

    // SECTIONS
    // set sections for all languages
    for (const language in config.language.translations) {
      // add header section for all languages
      let sections = {
        [HEADER_SECTION]: baseSections[language][HEADER_SECTION]
      }

      // add sections according to consent categories
      for (const categoryName in config.categories) {
        sections[categoryName] = baseSections[language][categoryName];
      }

      // merge providers section data
      if (providers.googleAnalytics) {
        sections = merge(sections, googleAnalytics.sections[language]);
      }

      // add sections to config
      config.language.translations[language].preferencesModal.sections = [];

      for (const sectionName in sections) {
        config.language.translations[language].preferencesModal.sections.push(sections[sectionName]);
      }
    }

    CookieConsent.run(config);
  }
}
