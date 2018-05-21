'use strict'

const User = use('App/Models/User')

class DashboardController {
  async index ({ response, view, session, auth }) {
    // Checks if the user is logged in:
    try {
      await auth.check()
    } catch (error) {
      session.flash({ danger: 'Você precisa estar autenticado para visualizar a página principal.' })
      return response.route('login.get')
    }

    const online_list = await User.query()
      .where('is_active', true)
      .with('group')
      .havingBetween('last_visit', [Date.now() - 1000 * 60, Date.now()])
      .fetch()

    return view.render('pages.dashboard', { online_list: online_list.toJSON() })
  }
}

module.exports = DashboardController
