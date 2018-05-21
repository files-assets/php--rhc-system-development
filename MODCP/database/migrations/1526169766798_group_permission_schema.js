'use strict'

const Schema = use('Schema')

class GroupPermissionSchema extends Schema {
  up () {
    this.create('group_permission', (table) => {
      table.increments()
      table.integer('group_id').unsigned().index().references('id').inTable('groups')
      table.integer('permission_id').unsigned().index().references('id').inTable('permissions')
    })
  }

  down () {
    this.drop('group_permission')
  }
}

module.exports = GroupPermissionSchema
