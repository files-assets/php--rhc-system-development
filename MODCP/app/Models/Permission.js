'use strict'

const Model = use('Model')

class Permission extends Model {
  static get hidden () {
    return ['description']
  }
  groups () {
    return this
      .belongsToMany('App/Models/Group')
      .pivotTable('group_permission')
  }
}

module.exports = Permission
