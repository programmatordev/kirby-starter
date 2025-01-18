import * as Category from "../utils/categories.js";

export const TRANSLATIONS = {
  consentModal: {
    title: 'Utilizamos cookies',
    description: 'Este website utiliza cookies essenciais para funcionar corretamente e cookies de rastreamento para analisar a sua interação com ele. Estes últimos só serão ativados com o seu consentimento.',
    acceptAllBtn: 'Aceitar todos',
    acceptNecessaryBtn: 'Rejeitar todos',
    showPreferencesBtn: 'Gerir preferências'
  },
  preferencesModal: {
    title: 'Gerir preferências de cookies',
    acceptAllBtn: 'Aceitar todos',
    acceptNecessaryBtn: 'Rejeitar todos',
    savePreferencesBtn: 'Guardar seleção atual',
    closeIconLabel: 'Fechar',
    sections: []
  }
}

export const SECTIONS = {
  header: {
    title: 'Utilização de cookies',
    description: 'Utilizamos cookies para assegurar as funções básicas do website e melhorar a sua experiência online.'
  },
  [Category.NECESSARY]: {
    title: 'Cookies essenciais',
    description: 'Estes cookies são indispensáveis para o funcionamento correto do site, como a autenticação do utilizador.',
    linkedCategory: Category.NECESSARY,
  },
  [Category.ANALYTICS]: {
    title: 'Analítica',
    description: 'Os cookies analíticos recolhem dados que ajudam a compreender como os utilizadores interagem com o site. Essas informações permitem melhorar o conteúdo e criar funcionalidades que enriquecem a experiência do utilizador.',
    linkedCategory: Category.ANALYTICS,
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
          name: '_gid',
          domain: 'Google Analytics',
          description: 'Cookie gerido pelo <a href=\"https://business.safety.google/adscookies/\" target="_blank">Google Analytics</a>',
          expiration: 'Expira em 24 horas'
        }
      ]
    }
  },
  [Category.ADVERTISEMENT]: {
    title: 'Publicidade',
    description: 'A Google utiliza cookies para exibir anúncios, personalizar conteúdos publicitários (com base nas suas definições em <a href=\"https://g.co/adsettings\" target="_blank">g.co/adsettings</a>), limitar a frequência de exibição, silenciar anúncios indesejados e medir a eficácia das campanhas.',
    linkedCategory: Category.ADVERTISEMENT,
  },
  [Category.FUNCTIONALITY]: {
    title: 'Funcionalidades',
    description: 'Cookies de funcionalidade permitem o acesso a recursos importantes do site, como guardar preferências de idioma, melhorar a navegação e manter informações temporárias, como o conteúdo de um carrinho de compras.',
    linkedCategory: Category.FUNCTIONALITY,
  },
  [Category.SECURITY]: {
    title: 'Segurança',
    description: 'Estes cookies autenticam utilizadores, previnem fraudes e garantem proteção durante a interação com o site.',
    linkedCategory: Category.SECURITY,
  }
}
