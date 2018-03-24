<form method="post" class="w-50 mx-auto my-5">
  <h1>Login</h1>

  <?php if (isset($error)): ?>
    <div class="alert alert-danger alert-dismissible fade show my-3">
      <?php echo $error; ?>
      <button type="button" class="close" data-dismiss="alert">
        <span>&times;</span>
      </button>
    </div>
  <?php endif; ?>

  <fieldset>
    <div class="form-group">
      <label for="username">Usuário:</label>
      <input type="text" name="username" id="username" class="form-control" />
    </div>
    <div class="form-group">
      <label for="username">Senha:</label>
      <input type="text" name="password" id="password" class="form-control" />
    </div>
    <div class="form-group">
      <label class="custom-control custom-checkbox">
        <input type="checkbox" name="remember" value="on" class="custom-control-input">
        <span class="custom-control-indicator"></span>
        <span class="custom-control-description">
          Continuar conectado.
          <small class="form-help text-muted d-block">Não recomendado para computadores públicos.</small>
        </span>
      </label>
    </div>
    <div class="form-group">
      <input type="submit" value="Entrar" class="btn btn-primary" />
    </div>
  </fieldset>
  <input type="hidden" name="token" value="<?php echo $a->getToken(); ?>" />
</form>
