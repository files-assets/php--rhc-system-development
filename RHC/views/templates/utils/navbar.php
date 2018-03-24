<nav class="navbar navbar-expand-lg sys-navbar">
  <div class="container">
    <a class="navbar-brand" href="<?php echo BASE_URL; ?>">
      <img src="<?php echo EMPTY_GIF; ?>" alt="<?php echo NAME; ?>"><?php echo BRAND_NAME; ?>
    </a>

    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#sys-navbar" aria-expanded="false">
      <span class="navbar-toggler-icon fa fa-bars"></span>
    </button>

    <div class="collapse navbar-collapse sys-navbar-inner" id="sys-navbar">
      <ul class="navbar-nav mr-auto">
        <li class="navbar-item">
          <a class="nav-link" href="<?php echo BASE_URL; ?>">Início</a>
        </li>
        <li class="navbar-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Geral
          </a>
          <div class="dropdown-menu">
            <a class="dropdown-item" href="<?php echo BASE_URL; ?>/usuarios/">Usuários</a>
            <a class="dropdown-item" href="<?php echo BASE_URL; ?>/grupos/">Grupos</a>
            <a class="dropdown-item" href="<?php echo BASE_URL; ?>/ajuda/">Ajuda</a>
          </div>
        </li>
        <li class="navbar-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Postar
          </a>
          <div class="dropdown-menu">
            <a class="dropdown-item" href="#">Aula</a>
            <a class="dropdown-item" href="#">Contratação</a>
            <a class="dropdown-item" href="#">Promoção</a>
            <a class="dropdown-item" href="#">Demissão</a>
            <a class="dropdown-item" href="#">Rebaixamento</a>
            <a class="dropdown-item" href="#">Advertência</a>
          </div>
        </li>
        <li class="navbar-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Verificar
          </a>
          <div class="dropdown-menu">
            <a class="dropdown-item" href="#">Relatório de Aulas</a>
            <a class="dropdown-item" href="#">Relatório de Contratações</a>
            <a class="dropdown-item" href="#">Relatório de Promoções</a>
            <a class="dropdown-item" href="#">Relatório de Demissões</a>
            <a class="dropdown-item" href="#">Relatório de Rebaixamentos</a>
            <a class="dropdown-item" href="#">Relatório de Advertências</a>
          </div>
        </li>
      </ul>
      <ul class="navbar-nav">
        <li class="d-lg-none dropdown-divider"></li>
        <li class="navbar-item ml-lg-auto">
          <a class="nav-link" href="<?php echo BASE_URL; ?>/conta/registro/">Registrar</a>
        </li>
        <li class="navbar-item">
          <a class="nav-link" href="<?php echo BASE_URL; ?>/conta/entrar/">Entrar</a>
        </li>
        <li class="navbar-item">
          <a class="nav-link" href="<?php echo BASE_URL; ?>/conta/sair/">Sair</a>
        </li>
      </ul>
    </div>
  </div>
</nav>
