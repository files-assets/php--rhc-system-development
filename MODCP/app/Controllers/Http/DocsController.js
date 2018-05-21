'use strict'

class DocsController {
  index () {
    return 'Mostrando todos os usuários'
  }

  create () {
    return 'Criando...'
  }

  store () {
    return 'Salvo...'
  }

  show ({ params }) {
    return 'Mostrando com ID.'
  }
}

module.exports = DocsController
