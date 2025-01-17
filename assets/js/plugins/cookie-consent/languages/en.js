import * as Category from "../utils/categories.js";

export const translations = {
  consentModal: {
    title: 'We use cookies',
    description: 'This website uses essential cookies to ensure its proper operation and tracking cookies to understand how you interact with it. The latter will be set only after consent.',
    acceptAllBtn: 'Accept all',
    acceptNecessaryBtn: 'Reject all',
    showPreferencesBtn: 'Manage Individual preferences'
  },
  preferencesModal: {
    title: 'Manage cookie preferences',
    acceptAllBtn: 'Accept all',
    acceptNecessaryBtn: 'Reject all',
    savePreferencesBtn: 'Accept current selection',
    closeIconLabel: 'Close modal',
    sections: []
  }
}

export const sections = {
  header: {
    title: 'Cookie usage',
    description: 'We use cookies to ensure the basic functionalities of the website and to enhance your online experience.'
  },
  [Category.NECESSARY]: {
    title: 'Strictly necessary cookies',
    description: 'These cookies are essential for the proper functioning of the website, for example for user authentication.',
    linkedCategory: Category.NECESSARY,
  },
  [Category.ANALYTICS]: {
    title: 'Analytics',
    description: 'Cookies used for analytics help collect data that allows services to understand how users interact with a particular service. These insights allow services both to improve content and to build better features that improve the user’s experience.',
    linkedCategory: Category.ANALYTICS,
    cookieTable: {
      headers: {
        name: 'Name',
        domain: 'Service',
        description: 'Description',
        expiration: 'Expiration'
      },
      body: [
        {
          name: '_ga',
          domain: 'Google Analytics',
          description: 'Cookie set by <a href=\"https://business.safety.google/adscookies/\" target="_blank">Google Analytics</a>',
          expiration: 'Expires after 2 years'
        },
        {
          name: '_gid',
          domain: 'Google Analytics',
          description: 'Cookie set by <a href=\"https://business.safety.google/adscookies/\" target="_blank">Google Analytics</a>',
          expiration: 'Expires after 24 hours'
        }
      ]
    }
  },
  [Category.ADVERTISEMENT]: {
    title: 'Advertising',
    description: 'Google uses cookies for advertising, including serving and rendering ads, personalizing ads (depending on your ad settings at <a href=\"https://g.co/adsettings\" target="_blank">g.co/adsettings</a>), limiting the number of times an ad is shown to a user, muting ads you have chosen to stop seeing, and measuring the effectiveness of ads.',
    linkedCategory: Category.ADVERTISEMENT,
  },
  [Category.FUNCTIONALITY]: {
    title: 'Functionality',
    description: 'Cookies used for functionality allow users to interact with a service or site to access features that are fundamental to that service. Things considered fundamental to the service include preferences like the user’s choice of language, product optimizations that help maintain and improve a service, and maintaining information relating to a user’s session, such as the content of a shopping cart.',
    linkedCategory: Category.FUNCTIONALITY,
  },
  [Category.SECURITY]: {
    title: 'Security',
    description: 'Cookies used for security authenticate users, prevent fraud, and protect users as they interact with a service.',
    linkedCategory: Category.SECURITY,
  }
}
