'use strict'

class IsActive {
  async handle ({ response, session, auth }, next) {
    try {
      await auth.check()
    } catch (error) {
      return next()
    }

    if (!! auth.user.is_active) {
      return next()
    }

    await auth.logout()
    session.flash({ danger: 'Sua conta não está ativa. Sua sessão foi expirada pelo sistema.' })
    return response.route('login.get')
  }
}

module.exports = IsActive
