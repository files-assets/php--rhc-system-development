'use strict'

const Model = use('Model')

class Group extends Model {
  users () {
    return this.hasMany('App/Models/User')
  }

  permissions () {
    return this
      .belongsToMany('App/Models/Permission')
      .pivotTable('group_permission')
  }
}

module.exports = Group
