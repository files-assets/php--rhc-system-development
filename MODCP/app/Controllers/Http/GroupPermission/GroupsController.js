'use strict'

const Group = use('App/Models/Group')

class GroupController {
  async index ({ request, view }) {
    const page = request.input('page', '1')

    const groups = await Group.query()
      .paginate(page, 50)

    const data = groups.toJSON()

    return view.render('pages.groups.index', { data })
  }
}

module.exports = GroupController
