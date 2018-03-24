<?php if (isset($crumbs) && is_array($crumbs)): ?>
  <nav class="sys-crumbs">
    <ul class="breadcrumb">
      <li class="breadcrumb-item">
        <a href="<?php echo BASE_URL; ?>" title="Página Inicial" data-toggle="tooltip">
          <i class="fa fa-home"></i>
        </a>
      </li>
      <?php foreach ($crumbs as $crumb): ?>
        <?php if (is_array($crumb)): ?>
          <?php if (isset($crumb['active'])): ?>
            <li class="breadcrumb-item active">
              <?php echo $crumb['name']; ?>
            </li>
          <?php else: ?>
            <li class="breadcrumb-item">
              <a href="<?php echo BASE_URL . $crumb['link']; ?>">
                <?php echo $crumb['name']; ?>
              </a>
            </li>
          <?php endif; ?>
          <?php else: ?>
            <li class="breadcrumb-item active">
              <?php echo $crumb; ?>
            </li>
        <?php endif; ?>
      <?php endforeach; ?>
    </ul>
  </nav>
<?php endif; ?>

<?php if (isset($page_title) && isset($show_title)): ?>
  <h1 class="sys-page-wrap-title">
    <?php echo $page_title; ?>
  </h1>
<?php endif; ?>
