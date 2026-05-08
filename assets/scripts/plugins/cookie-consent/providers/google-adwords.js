import { CATEGORY_ADVERTISEMENT } from "../utils/categories.js";

export const googleAdwords = {
  // categories related to this provider
  // and respective settings
  categories: {
    [CATEGORY_ADVERTISEMENT]: {
      autoClear: {
        cookies: [
          { name: /^_gcl_/ }
        ]
      }
    }
  },
  // section information related to this provider
  // to be appended to base section information
  sections: {
    en: {
      [CATEGORY_ADVERTISEMENT]: {
        cookieTable: {
          headers: {
            name: 'Name',
            domain: 'Service',
            description: 'Description',
            expiration: 'Expiration'
          },
          body: [
            {
              name: '_gcl_*',
              domain: 'Google Ads',
              description: 'Cookie set by <a href="https://policies.google.com/technologies/cookies" target="_blank">Google Ads</a> to measure ad clicks and conversions.',
              expiration: 'Expires after 3 months'
            }
          ]
        }
      }
    },

    pt: {
      [CATEGORY_ADVERTISEMENT]: {
        cookieTable: {
          headers: {
            name: 'Nome',
            domain: 'Serviço',
            description: 'Descrição',
            expiration: 'Validade'
          },
          body: [
            {
              name: '_gcl_*',
              domain: 'Google Ads',
              description: 'Cookie gerido pelo <a href="https://policies.google.com/technologies/cookies" target="_blank">Google Ads</a> para medir cliques em anúncios e conversões.',
              expiration: 'Expira em 3 meses'
            }
          ]
        }
      }
    }
  }
}
