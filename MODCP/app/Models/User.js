'use strict'

const Model = use('Model')

class User extends Model {
  static get hidden () {
    return ['password', 'email']
  }

  static boot () {
    super.boot()
    this.addHook('beforeCreate', 'UserHook.hashPassword')
  }

  group () {
    return this.belongsTo('App/Models/Group')
  }

  tokens () {
    return this.hasMany('App/Models/Token')
  }
}

module.exports = User
