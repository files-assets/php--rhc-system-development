'use strict'

/*
|--------------------------------------------------------------------------
| Routes
|--------------------------------------------------------------------------
|
| Http routes are entry points to your web application. You can create
| routes for different URL's and bind Controller actions to them.
|
| A complete guide on routing is available here.
| http://adonisjs.com/docs/4.0/routing
|
*/

const Route = use('Route')

Route.get('/', 'DashboardController.index').as('index')

/**
 * ---------------------------------------------------------------------
 * Session
 * ---------------------------------------------------------------------
 */
Route.group(() => {
  Route.get('/login', 'SessionController.login').as('login.get')
  Route.post('/login', 'SessionController.postLogin').as('login.post').validator('Login')
})
  .prefix('/session').middleware('not-auth')

Route.any('/session/logout', 'SessionController.logout')
  .as('logout')
  .middleware('auth')

/**
 * ---------------------------------------------------------------------
 * Users
 * ---------------------------------------------------------------------
 */
Route.group(() => {
  Route.get('/users', 'UsersController.index').as('users.index')

  Route.get('/users/search', 'UsersController.search').as('users.search')

  Route.get('/users/:id', 'UsersController.show').as('users.show')
})
  .middleware('auth')

/**
 * ---------------------------------------------------------------------
 * Groups and Permissions
 * ---------------------------------------------------------------------
 */
Route.group(() => {
  Route.get('/groups', 'GroupsController.index').as('groups.index')

  Route.resource('/permissions', 'PermissionsController')
})
  .namespace('GroupPermission')
  .middleware('auth')

/**
 * ---------------------------------------------------------------------
 * Docs
 * ---------------------------------------------------------------------
 */
Route.resource('/docs', 'DocsController')

/**
 * ---------------------------------------------------------------------
 * Tests
 *
 * @ignore
 * ---------------------------------------------------------------------
 */

Route.get('/force-login', async ({ request, response, session, auth }) => {
  try {
    await auth.loginViaId(Number(request.input('id')))

    if (request.accepts(['html', 'json']) === 'json') {
      return { logged: true }
    }

    session.flash({ info: 'Você foi logado via `force-login`.' })
    return response.route('index')
  } catch (e) {
    if (request.accepts(['html', 'json']) === 'json') {
      return { logged: true }
    }

    session.flash({ danger: 'Falha ao logar via `force-login`.' })
    return response.route('login.get')
  }
});

