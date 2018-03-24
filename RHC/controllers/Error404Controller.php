<?php

class Error404Controller extends Controller
{
  public function index ()
  {
    $this->render('error404', [
      'page_title' => 'Erro 404'
    ]);
  }
}
