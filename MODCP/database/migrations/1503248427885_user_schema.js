'use strict'

const Schema = use('Schema')

class UserSchema extends Schema {
  up () {
    this.create('users', (table) => {
      table.increments()
      table.string('username', 80).notNullable().unique().index()
      table.string('email', 254).notNullable().unique()
      table.string('password', 60).notNullable().unique()
      table.integer('group_id').unsigned().references('id').inTable('groups')
      table.boolean('is_active').defaultTo(false)
      table.bigInteger('last_visit').defaultTo(0)
      table.timestamps()
    })
  }

  down () {
    this.drop('users')
  }
}

module.exports = UserSchema
