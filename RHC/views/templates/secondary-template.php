<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <meta http-equiv="X-UA-Compatible" content="ie=edge" />
  <?php if (isset($page_title) && !empty($page_title)): ?>
    <title><?php echo $page_title . ' &middot; ' . NAME; ?></title>
  <?php else: ?>
    <title><?php echo NAME; ?></title>
  <?php endif; ?>

  <link rel="shortcut icon" href="<?php echo BASE_URL; ?>/default.ico" />

  <link rel="stylesheet" href="<?php echo BASE_URL; ?>/assets/vendor/fonts/fontawesome/css/font-awesome.min.css" />
  <link rel="stylesheet" href="<?php echo BASE_URL; ?>/assets/css/index.css" />

  <script src="<?php echo BASE_URL; ?>/assets/vendor/js/jquery-popper-bs.min.js"></script>
  <script src="<?php echo BASE_URL; ?>/assets/js/index.js"></script>
</head>
<body>
  <?php $this->renderInTemplate($name, $data); ?>
</body>
</html>
