'use strict'

const User = use('App/Models/User')

class SessionController {
  login ({ response, view }) {
    return view.render('pages.session.login')
  }

  async postLogin ({ request, response, session, auth }) {
    const { username, password, remember } = request.all()

    try {
      await auth.remember(remember === 'on')
        .attempt(username, password)

      if (! auth.user.is_active) {
        auth.logout()
        session.flash({ danger: 'Sua conta não está ativa.' })
        return response.redirect('back')
      }

      session.flash({ success: `Seja bem-vindo(a) novamente, ${auth.user.username}.` })
      return response.redirect('/')
    } catch (error) {
      session.flash({ danger: 'Usuário e/ou senha incorretos.' })
      return response.redirect('back')
    }
  }

  async logout ({ response, auth }) {
    await auth.logout()
    return response.route('login.get')
  }
}

module.exports = SessionController
