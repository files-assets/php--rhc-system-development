<footer class="sys-footer">
  <div class="sys-footer-inner">
    <nav class="sys-footer-linklist">
      <div class="container">
        <a href="<?php echo BASE_URL; ?>">Página Inicial</a>
        <a href="<?php echo BASE_URL; ?>/ajuda/">Central de Ajuda</a>
        <a href="#" data-toggle="modal" data-target="#error-modal">Informar Erro</a>
      </div>
    </nav>
    <div class="sys-footer-attr">
      <div class="container">
        <div class="sys-footer-copyright">
          Copyright &copy; <?php echo NAME; ?>. Todos os direitos reservados.
          <small class="d-block">
            Este site web não é de propriedade e/ou mantido pela <em>Sulake Corporation Oy.</em> e nem pelo <em>Habbo Hotel</em>.
          </small>
        </div>
        <div class="sys-made-by">
          <i class="fa fa-code"></i> com <i class="fa fa-heart"></i> por <a href="https://lffg.github.io/" target="_blank">luuuiiiz</a>.
        </div>
      </div>
    </div>
  </div>

  <div class="modal fade" id="error-modal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
      <form class="modal-content" action="<?php echo BASE_URL; ?>/formularios/erro/" method="post">
        <div class="modal-header">
          <h5 class="modal-title">Informar Erro</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="form-group">
            <label for="username">Seu nick:</label>
            <input type="text" value="luuuiiiz." class="form-control" disabled />
          </div>
          <div class="form-group">
            <label for="error_type">Tipo de problema:</label>
            <select name="error_type" id="error_type" class="form-control" required>
              <option value="" selected disabled>Selecione</option>
              <option value="bug">Bug ou erro técnico</option>
              <option value="ort_error">Erro de ortografia</option>
              <option value="gen_error">Outro tipo de erro</option>
            </select>
          </div>
          <div class="form-group">
            <label for="message">Explicação:</label>
            <textarea name="message" id="message" class="form-control" style="height: 120px;" minlength="30" required></textarea>
            <small class="form-help text-muted" id="message-ht">Você deve inserir pelo menos mais <strong id="message-ml">30</strong> caracteres neste campo.</small>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
          <button type="submit" class="btn btn-primary">Enviar</button>
        </div>
      </form>
    </div>
  </div>

  <script>
    (function () {
      'use strict';

      var textarea = document.getElementById('message');
      var entry    = document.getElementById('message-ht');
      var label    = document.getElementById('message-ml');

      var change   = function () {
        if (30 - this.value.length >= 1) {
          label.innerText = 30 - this.value.length;
        }
      };

      textarea.addEventListener('keypress', change);
      textarea.addEventListener('keyup', change);
    }());
  </script>
</footer>
