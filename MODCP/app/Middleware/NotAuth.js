'use strict'

class NotAuth {
  async handle ({ response, session, auth }, next) {
    try {
      await auth.check()
    } catch (error) {
      return next()
    }

    session.flash({ info: 'Você já está autenticado.' })
    return response.redirect('/')
  }
}

module.exports = NotAuth
