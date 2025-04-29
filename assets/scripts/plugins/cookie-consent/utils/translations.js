import { CAT_NECESSARY, CAT_ANALYTICS, CAT_ADVERTISEMENT, CAT_FUNCTIONALITY, CAT_SECURITY } from './categories.js';

export const HEADER_SECTION = 'headerSection';

export const baseTranslations = {
  en: {
    consentModal: {
      title: 'We use cookies',
      description: 'This website uses essential cookies to ensure its proper operation and tracking cookies to understand how you interact with it. The latter will be set only after consent.',
      acceptAllBtn: 'Accept all',
      acceptNecessaryBtn: 'Reject all',
      showPreferencesBtn: 'Manage individual preferences'
    },
    preferencesModal: {
      title: 'Manage cookie preferences',
      acceptAllBtn: 'Accept all',
      acceptNecessaryBtn: 'Reject all',
      savePreferencesBtn: 'Accept current selection',
      closeIconLabel: 'Close modal'
    }
  },
  pt: {
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
}

export const baseSections = {
  en: {
    [HEADER_SECTION]: {
      title: 'Cookie usage',
      description: 'We use cookies to ensure the basic functionalities of the website and to enhance your online experience.'
    },
    [CAT_NECESSARY]: {
      title: 'Strictly necessary cookies',
      description: 'These cookies are essential for the proper functioning of the website, for example for user authentication.',
      linkedCategory: CAT_NECESSARY,
    },
    [CAT_ANALYTICS]: {
      title: 'Analytics',
      description: 'Cookies used for analytics help collect data that allows services to understand how users interact with a particular service. These insights allow services both to improve content and to build better features that improve the user’s experience.',
      linkedCategory: CAT_ANALYTICS,
    },
    [CAT_ADVERTISEMENT]: {
      title: 'Advertising',
      description: 'Cookies used for advertising, including serving and rendering ads, personalizing ads, limiting the number of times an ad is shown to a user, muting ads you have chosen to stop seeing, and measuring the effectiveness of ads.',
      linkedCategory: CAT_ADVERTISEMENT,
    },
    [CAT_FUNCTIONALITY]: {
      title: 'Functionality',
      description: 'Cookies used for functionality allow users to interact with a service or site to access features that are fundamental to that service. Things considered fundamental to the service include preferences like the user’s choice of language, product optimizations that help maintain and improve a service, and maintaining information relating to a user’s session, such as the content of a shopping cart.',
      linkedCategory: CAT_FUNCTIONALITY,
    },
    [CAT_SECURITY]: {
      title: 'Security',
      description: 'Cookies used for security authenticate users, prevent fraud, and protect users as they interact with a service.',
      linkedCategory: CAT_SECURITY,
    }
  },
  pt: {
    [HEADER_SECTION]: {
      title: 'Utilização de cookies',
      description: 'Utilizamos cookies para assegurar as funções básicas do website e melhorar a sua experiência online.'
    },
    [CAT_NECESSARY]: {
      title: 'Cookies essenciais',
      description: 'Estes cookies são indispensáveis para o funcionamento correto do site, como a autenticação do utilizador.',
      linkedCategory: CAT_NECESSARY,
    },
    [CAT_ANALYTICS]: {
      title: 'Análise',
      description: 'Cookies de análise recolhem dados que ajudam a compreender como os utilizadores interagem com o site. Essas informações permitem melhorar o conteúdo e criar funcionalidades que enriquecem a experiência do utilizador.',
      linkedCategory: CAT_ANALYTICS,
    },
    [CAT_ADVERTISEMENT]: {
      title: 'Publicidade',
      description: 'Cookies para exibir anúncios, personalizar conteúdos publicitários, limitar a frequência de exibição, silenciar anúncios indesejados e medir a eficácia das campanhas.',
      linkedCategory: CAT_ADVERTISEMENT,
    },
    [CAT_FUNCTIONALITY]: {
      title: 'Funcionalidades',
      description: 'Cookies de funcionalidade permitem o acesso a recursos importantes do site, como guardar preferências de idioma, melhorar a navegação e manter informações temporárias, como o conteúdo de um carrinho de compras.',
      linkedCategory: CAT_FUNCTIONALITY,
    },
    [CAT_SECURITY]: {
      title: 'Segurança',
      description: 'Estes cookies autenticam utilizadores, previnem fraudes e garantem proteção durante a interação com o site.',
      linkedCategory: CAT_SECURITY,
    }
  }
}
