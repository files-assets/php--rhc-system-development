<?php

class ContaController extends Controller
{
  public function entrar ()
  {
    $data = [
      'page_title' => 'Entrar'
    ];

    $u = new User();

    if (isset($_POST['username']) && isset($_POST['password']) && isset($_POST['token'])) {
      $result = $u->session('login', [
        'username' => $_POST['username'],
        'password' => $_POST['password'],
        'token'    => $_POST['token']
      ]);

      if (!$result['status']) {
        $data['error'] = $result['response'];
      }
    }

    $this->render('conta/entrar', $data, false);
  }
}
