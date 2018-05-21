'use strict'

const Schema = use('Schema')

class GroupSchema extends Schema {
  up () {
    this.create('groups', (table) => {
      table.increments()
      table.string('name', 256).notNullable()
      table.string('alias', 35).unique().notNullable().index()
      table.string('description', 1000).notNullable()
      table.string('color', 35).notNullable()
      table.timestamps()
    })
  }

  down () {
    this.drop('groups')
  }
}

module.exports = GroupSchema
