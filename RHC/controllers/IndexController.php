<?php

class IndexController extends Controller
{
  public function index ()
  {
    $this->render('home', [
      'page_title' => 'Página Inicial',
      'show_title' => true/*,
      'crumbs' => [
        [ 'active' => true, 'href' => '/', 'name' => 'Página Inicial' ],
        [ 'href' => '/', 'name' => 'Página De Contato' ]
      ]*/
    ]);
  }
}
