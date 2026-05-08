import { CATEGORY_ADVERTISEMENT } from "../utils/categories.js";

export const metaPixel = {
  // categories related to this provider
  // and respective settings
  categories: {
    [CATEGORY_ADVERTISEMENT]: {}
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
              name: '_fbp',
              domain: 'Meta Pixel',
              description: 'Cookie used by <a href="https://www.facebook.com/privacy/policies/cookies/" target="_blank">Meta Pixel</a> to identify browsers for advertising, attribution and conversion measurement.',
              expiration: 'Expires after 3 months'
            },
            {
              name: '_fbc',
              domain: 'Meta Pixel',
              description: 'Cookie used by <a href="https://www.facebook.com/privacy/policies/cookies/" target="_blank">Meta Pixel</a> to store the click identifier when a visitor arrives from a Meta ad.',
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
              name: '_fbp',
              domain: 'Meta Pixel',
              description: 'Cookie gerido pelo <a href="https://www.facebook.com/privacy/policies/cookies/" target="_blank">Meta Pixel</a> para identificar o browser para publicidade, atribuição e medição de conversões.',
              expiration: 'Expira em 3 meses'
            },
            {
              name: '_fbc',
              domain: 'Meta Pixel',
              description: 'Cookie gerido pelo <a href="https://www.facebook.com/privacy/policies/cookies/" target="_blank">Meta Pixel</a> para guardar o identificador de clique quando um visitante chega através de um anúncio da Meta.',
              expiration: 'Expira em 3 meses'
            }
          ]
        }
      }
    }
  }
}
