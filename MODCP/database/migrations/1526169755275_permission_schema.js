'use strict'

const Schema = use('Schema')

class PermissionSchema extends Schema {
  up () {
    this.create('permissions', (table) => {
      table.increments()
      table.string('name', 256).notNullable()
      table.string('alias', 35).unique().notNullable().index()
      table.string('description', 1000).notNullable()
      table.timestamps()
    })
  }

  down () {
    this.drop('permissions')
  }
}

module.exports = PermissionSchema
