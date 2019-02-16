'use strict'

const { HttpException } = use('@adonisjs/generic-exceptions')

const User = use('App/Models/User')
const Group = use('App/Models/Group')

class UsersController {
  async index ({ request, view }) {
    const page = request.input('page', '1')

    const users = await User.query()
      .setHidden(['password'])
      .with('group')
      .paginate(page, 50)

    const data = users.toJSON()
    return view.render('pages.users.index', { data })
  }

  async show ({ response, params, view }, next) {
    const user = await User.query()
      .where('id', params.id)
      .setHidden(['password'])
      .with('group')
      .first()

    if (! user) {
      throw new HttpException('Not Found', 404)
    }

    return view.render('pages.users.show', { user: user.toJSON() })
  }

  async search ({ request, view }) {
    const groups = await Group.all()

    if (! request.input('q')) {
      return view.render('pages.users.search', { groups: groups.toJSON() })
    }

    return 'em pesquisa ' + JSON.stringify(request.all())
  }
}

module.exports = UsersController
