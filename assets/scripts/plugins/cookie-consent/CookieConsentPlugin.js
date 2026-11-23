import * as CookieConsent from "vanilla-cookieconsent";
import { mergician } from "mergician";

import { CATEGORY_NECESSARY } from "./utils/categories.js";
import { baseTranslations, baseSections, HEADER_SECTION } from "./utils/translations.js";

import { googleAnalytics } from "./providers/google-analytics.js";
import { googleAds } from "./providers/google-ads.js";
import { metaPixel } from "./providers/meta-pixel.js";

import "vanilla-cookieconsent/dist/cookieconsent.css";

export default class CookieConsentPlugin {
  static init() {
    // Expose the API so persistent and page-level UI can open the preferences dialog.
    window.CookieConsent = CookieConsent;

    // Append and deduplicate provider sections when merging their configuration.
    const merge = mergician({ appendArrays: true, dedupArrays: true });

    /** @type {import("../../types").CookieConsentConfig} */
    const config = {
      categories: {
        [CATEGORY_NECESSARY]: {
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

    // Enable only the optional categories required by configured trackers.
    if (window.trackers.googleAnalyticsId) {
      config.categories = merge(config.categories, googleAnalytics.categories);
    }
    if (window.trackers.googleAdsId) {
      config.categories = merge(config.categories, googleAds.categories);
    }
    if (window.trackers.metaPixelId) {
      config.categories = merge(config.categories, metaPixel.categories);
    }

    // Build each language's modal sections in category order, then add provider details.
    for (const language in config.language.translations) {
      let sections = {
        [HEADER_SECTION]: baseSections[language][HEADER_SECTION]
      }

      for (const categoryName in config.categories) {
        sections[categoryName] = baseSections[language][categoryName];
      }

      if (window.trackers.googleAnalyticsId) {
        sections = merge(sections, googleAnalytics.sections[language]);
      }
      if (window.trackers.googleAdsId) {
        sections = merge(sections, googleAds.sections[language]);
      }
      if (window.trackers.metaPixelId) {
        sections = merge(sections, metaPixel.sections[language]);
      }

      config.language.translations[language].preferencesModal.sections = [];

      for (const sectionName in sections) {
        config.language.translations[language].preferencesModal.sections.push(sections[sectionName]);
      }
    }

    CookieConsent.run(config);
  }
}
