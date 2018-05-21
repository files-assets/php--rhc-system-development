'use strict'

/*
|--------------------------------------------------------------------------
| DatabaseSeeder
|--------------------------------------------------------------------------
|
| Make use of the Factory instance to seed database with dummy data or
| make use of Lucid models directly.
|
*/

const Database = use('Database')
const User = use('App/Models/User')
const Group = use('App/Models/Group')
const Permission = use('App/Models/Permission')

class DatabaseSeeder {
  async run () {
    await Permission.createMany([
      {
        id: 1,
        name: 'Deletar',
        alias: 'DELETE',
        description: 'Permissão.'
      }, {
        id: 2,
        name: 'Atualizar',
        alias: 'UPDATE',
        description: 'Permissão.'
      }, {
        id: 3,
        name: 'Escrita',
        alias: 'WRITE',
        description: 'Permissão.'
      }, {
        id: 4,
        name: 'Ler',
        alias: 'READ',
        description: 'Permissão.'
      }
    ])

    await Group.createMany([
      {
        id: 1,
        name: 'Administradores',
        alias: 'ADMIN',
        description: 'Grupo de Administração.',
        color: 'red'
      }, {
        id: 2,
        name: 'Moderadores',
        alias: 'MOD',
        description: 'Grupo de Moderação.',
        color: 'green'
      }, {
        id: 3,
        name: 'Ajudeiros',
        alias: 'AJU',
        description: 'Grupo de Ajudeiros.',
        color: 'orange'
      }, {
        id: 4,
        name: 'Artmeiros',
        alias: 'ART',
        description: 'Grupo de Artmeiros.',
        color: 'purple'
      }
    ])

    console.log('Inserindo permissões...');
    await Database.insert([
      { group_id: 1, permission_id: 1 },
      { group_id: 1, permission_id: 2 },
      { group_id: 1, permission_id: 3 },
      { group_id: 1, permission_id: 4 },
      { group_id: 2, permission_id: 2 },
      { group_id: 2, permission_id: 3 },
      { group_id: 2, permission_id: 4 },
      { group_id: 3, permission_id: 3 },
      { group_id: 3, permission_id: 4 },
      { group_id: 4, permission_id: 3 },
      { group_id: 4, permission_id: 4 }
    ]).into('group_permission')
    console.log('Permissões inseridas...');

    await User.createMany([
      { id: 1, username: 'Luiz', email: 'luiz@fdf.com', password: '123', group_id: 1, is_active: true },
      { id: 2, username: 'Dr.', email: 'dr@fdf.com', password: '456', group_id: 1 },
      { id: 3, username: 'Fraise', email: 'fraise@fdf.com', password: '789', group_id: 2 },
      { id: 4, username: 'Fou-Lu', email: 'fou@fdf.com', password: '123', group_id: 2 },
      { id: 5, username: 'Alex', email: 'alex@fdf.com', password: '456', group_id: 3, is_active: true },
      { id: 6, username: 'Shek', email: 'shek@fdf.com', password: '789', group_id: 3 },
      { id: 7,  username: 'LosT', email: 'lost@fdf.com', password: '123', group_id: 4 },
      { id: 8,  username: 'Kyo Panda', email: 'kyo@fdf.com', password: '123' },
    ])
  }
}

module.exports = DatabaseSeeder
