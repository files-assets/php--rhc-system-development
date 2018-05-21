'use strict'

const User = use('App/Models/User')

class LastVisit {
  async handle ({ response, auth }, next) {
    // If the user isn't logged in, pass to the next middleware:
    try {
      await auth.check()
    } catch (error) {
      return next()
    }

    // Update the 'last_visit' field in the database:
    await User.query()
      .where('id', auth.user.id)
      .update({ 'last_visit': Date.now() })

    return next()
  }
}

module.exports = LastVisit
