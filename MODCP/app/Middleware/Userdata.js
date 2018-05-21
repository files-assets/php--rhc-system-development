'use strict'

const User = use('App/Models/User')

class Userdata {
  async handle ({ response, view, auth }, next) {
    try {
      await auth.check()
    } catch (error) {
      return next()
    }

    const userdata = await User.query()
      .where('id', auth.user.id)
      .with('group')
      .select('users.id', 'users.username', 'users.last_visit')
      .first()

    view.share({
      '__userdata__': userdata.toJSON()
    })

    return next()
  }
}

module.exports = Userdata
