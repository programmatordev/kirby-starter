import { CATEGORY_NECESSARY, CATEGORY_ANALYTICS, CATEGORY_ADVERTISEMENT, CATEGORY_FUNCTIONALITY } from './categories.js';

export const HEADER_SECTION = 'headerSection';

export const baseTranslations = {
  en: {
    consentModal: {
      title: 'Use of cookies',
      description: 'We use strictly necessary cookies to ensure the proper functioning of the website. Other cookies are only used with your consent.',
      acceptAllBtn: 'Accept all',
      acceptNecessaryBtn: 'Reject non-essential',
      showPreferencesBtn: 'Manage preferences'
    },
    preferencesModal: {
      title: 'Cookie preferences',
      acceptAllBtn: 'Accept all',
      acceptNecessaryBtn: 'Reject non-essential',
      savePreferencesBtn: 'Save preferences',
      closeIconLabel: 'Close'
    }
  },

  pt: {
    consentModal: {
      title: 'Utilização de cookies',
      description: 'Utilizamos cookies estritamente necessários para assegurar o funcionamento do website. Outros cookies só são utilizados mediante o seu consentimento.',
      acceptAllBtn: 'Aceitar todos',
      acceptNecessaryBtn: 'Rejeitar não essenciais',
      showPreferencesBtn: 'Gerir preferências'
    },
    preferencesModal: {
      title: 'Preferências de cookies',
      acceptAllBtn: 'Aceitar todos',
      acceptNecessaryBtn: 'Rejeitar não essenciais',
      savePreferencesBtn: 'Guardar preferências',
      closeIconLabel: 'Fechar'
    }
  }
}

export const baseSections = {
  en: {
    [HEADER_SECTION]: {
      title: 'Use of cookies',
      description: 'We use cookies and similar technologies to ensure the proper functioning of the website and, subject to your consent, for other purposes as described below.'
    },
    [CATEGORY_NECESSARY]: {
      title: 'Strictly necessary',
      description: 'These cookies are essential for the operation of the website and cannot be disabled in our systems. They are usually set only in response to actions taken by you, such as setting privacy preferences, logging in or filling in forms.',
      linkedCategory: CATEGORY_NECESSARY,
    },
    [CATEGORY_ANALYTICS]: {
      title: 'Analytics',
      description: 'These cookies allow the collection of aggregated and anonymous information about the use of the website, for the purpose of analysing performance and improving its operation. They are only used with your consent.',
      linkedCategory: CATEGORY_ANALYTICS,
    },
    [CATEGORY_ADVERTISEMENT]: {
      title: 'Advertising',
      description: 'These cookies are used to display relevant advertising based on your interests, limit the number of times an advert is shown and measure the effectiveness of advertising campaigns. They are only used with your consent.',
      linkedCategory: CATEGORY_ADVERTISEMENT,
    },
    [CATEGORY_FUNCTIONALITY]: {
      title: 'Functionality',
      description: 'These cookies allow us to remember choices you make, such as your language or region, in order to provide enhanced and more personalised features. They are only used with your consent.',
      linkedCategory: CATEGORY_FUNCTIONALITY,
    }
  },

  pt: {
    [HEADER_SECTION]: {
      title: 'Utilização de cookies',
      description: 'Utilizamos cookies e tecnologias semelhantes para assegurar o funcionamento do website e, mediante o seu consentimento, para outras finalidades, conforme descrito abaixo.'
    },
    [CATEGORY_NECESSARY]: {
      title: 'Estritamente necessários',
      description: 'Estes cookies são essenciais para o funcionamento do website e não podem ser desativados nos nossos sistemas. São normalmente definidos apenas em resposta a ações realizadas por si, como definir preferências de privacidade, iniciar sessão ou preencher formulários.',
      linkedCategory: CATEGORY_NECESSARY,
    },
    [CATEGORY_ANALYTICS]: {
      title: 'Análise',
      description: 'Estes cookies permitem recolher informações agregadas e anónimas sobre a utilização do website, com o objetivo de analisar o desempenho e melhorar o seu funcionamento. Só são utilizados mediante o seu consentimento.',
      linkedCategory: CATEGORY_ANALYTICS,
    },
    [CATEGORY_ADVERTISEMENT]: {
      title: 'Publicidade',
      description: 'Estes cookies são utilizados para apresentar publicidade relevante com base nos seus interesses, limitar a repetição de anúncios e medir a eficácia das campanhas publicitárias. Só são utilizados mediante o seu consentimento.',
      linkedCategory: CATEGORY_ADVERTISEMENT,
    },
    [CATEGORY_FUNCTIONALITY]: {
      title: 'Funcionalidade',
      description: 'Estes cookies permitem memorizar escolhas feitas por si, como o idioma ou a região, de forma a disponibilizar funcionalidades personalizadas. Só são utilizados mediante o seu consentimento.',
      linkedCategory: CATEGORY_FUNCTIONALITY,
    }
  }
}
