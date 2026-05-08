import { CATEGORY_ADVERTISEMENT, CATEGORY_ANALYTICS, CATEGORY_FUNCTIONALITY } from "../utils/categories.js";

export const googleAnalytics = {
  // categories related to this provider
  // and respective settings
  categories: {
    [CATEGORY_ANALYTICS]: {
      autoClear: {
        cookies: [
          { name: /^_ga/ },
          { name: '_gid' }
        ]
      }
    },
    [CATEGORY_ADVERTISEMENT]: {},
    [CATEGORY_FUNCTIONALITY]: {}
  },
  // section information related to this provider
  // to be appended to base section information
  sections: {
    en: {
      [CATEGORY_ANALYTICS]: {
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
              name: '_ga_*',
              domain: 'Google Analytics',
              description: 'Cookie set by <a href=\"https://business.safety.google/adscookies/\" target="_blank">Google Analytics</a> to persist session state',
              expiration: 'Expires after 2 years'
            }
          ]
        }
      },
    },

    pt: {
      [CATEGORY_ANALYTICS]: {
        cookieTable: {
          headers: {
            name: 'Nome',
            domain: 'Serviço',
            description: 'Descrição',
            expiration: 'Validade'
          },
          body: [
            {
              name: '_ga',
              domain: 'Google Analytics',
              description: 'Cookie gerido pelo <a href=\"https://business.safety.google/adscookies/\" target="_blank">Google Analytics</a>',
              expiration: 'Expira em 2 anos'
            },
            {
              name: '_ga_*',
              domain: 'Google Analytics',
              description: 'Cookie gerido pelo <a href=\"https://business.safety.google/adscookies/\" target="_blank">Google Analytics</a> para manter o estado da sessão',
              expiration: 'Expira em 2 anos'
            }
          ]
        }
      },
    }
  }
}
