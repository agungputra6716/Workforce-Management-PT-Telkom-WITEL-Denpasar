<!DOCTYPE html>
  <html>
  <head>
  <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">

    <title>WFM MAP</title>

    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?php echo base_url('assets/css/font-awesome.min.css') ?>">

    <!-- Bootstrap core CSS -->
    <link href="<?php echo base_url('assets/css/bootstrap.min.css') ?>" rel="stylesheet">

    <!-- Material Design Bootstrap -->
    <link href="<?php echo base_url('assets/css/compiled.min.css') ?>" rel="stylesheet">
    
  </head>
  
  <body class="login-page">
    <div class="container">
      <?php 
          echo form_open(uri_string());
          if (isset($error)){
              echo "<div class='error'><center>$error</center></div>";
          }
      ?>
        <p class="h5 text-center mb-4">Sign in</p>
        <div class="md-form">
            <i class="fa fa-envelope prefix grey-text"></i>
            <input type="text" id="username" name="username" autofocus class="form-control">
            <label for="username">Username</label>
            <td class="error"><?php echo form_error('username'); ?></td>
        </div>

        <div class="md-form">
            <i class="fa fa-lock prefix grey-text"></i>
            <input type="password" id="password" name="password" class="form-control">
            <label for="password">Password</label>
            <td class="error"><?php echo form_error('password'); ?></td>
        </div>

        <div class="text-center">
            <button type="submit" class="btn btn-default">Login</button>
        </div>
      <?php echo form_close();?>
    </div>
    <script type="text/javascript" src="<?php echo base_url('assets/js/jquery-3.2.1.min.js') ?>"></script>

    <!-- Bootstrap tooltips -->
    <script type="text/javascript" src="<?php echo base_url('assets/js/tether.min.js') ?>"></script>

    <!-- Bootstrap core JavaScript -->
    <script type="text/javascript" src="<?php echo base_url('assets/js/bootstrap.min.js') ?>"></script>

    <!-- MDB core JavaScript -->
    <script type="text/javascript" src="<?php echo base_url('assets/js/compiled.min.js') ?>"></script>
  </body>
  
</html>

