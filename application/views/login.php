<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">

    <title>WFM Map</title>

    <!-- Font Awesome -->
    <link rel="icon" href="<?php echo base_url('assets/images/telkom.png') ?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/css/font-awesome.min.css') ?>">

    <!-- Bootstrap core CSS -->
    <link href="<?php echo base_url('assets/css/bootstrap.min.css') ?>" rel="stylesheet">

    <!-- Material Design Bootstrap -->
    <link href="<?php echo base_url('assets/css/compiled.min.css') ?>" rel="stylesheet">

    <!-- Template styles -->
    <style rel="stylesheet">
        /* TEMPLATE STYLES */

        html,
        body,
        .view {
            height: 96.45%;
        }
        /* Navigation*/

        .navbar {
            background-color: #cc0000;
        }

        .scrolling-navbar {
            -webkit-transition: background .5s ease-in-out, padding .5s ease-in-out;
            -moz-transition: background .5s ease-in-out, padding .5s ease-in-out;
            transition: background .5s ease-in-out, padding .5s ease-in-out;
        }

        .top-nav-collapse {
            background-color: #1C2331;
        }

        footer.page-footer {
            background-color: #1C2331;
            margin-top: -1px;
        }

        @media only screen and (max-width: 768px) {
            .navbar {
                background-color: #1C2331;
            }
        }
        /*Call to action*/

        .flex-center {
            color: #fff;
        }

        .view {
            background: url(<?= base_url() ?>assets/img/4.jpg)no-repeat center center fixed;
            -webkit-background-size: cover;
            -moz-background-size: cover;
            -o-background-size: cover;
            background-size: cover;
        }
    </style>

</head>

<body>

    <!--Navbar-->
    <nav class="navbar navbar-toggleable-md navbar-dark fixed-top scrolling-navbar">
        <div class="container">
            <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarNav1" aria-controls="navbarNav1" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <a class="navbar-brand" href="#">
                <strong>WFM Map</strong>
            </a>
        </div>
    </nav>
    <!--/.Navbar-->

    <!--Mask-->
    <div class="view hm-black-strong">
        <div class="full-bg-img flex-center">
            <ul class="animated fadeInUp">
                <li>
                    <h1 class="h1-responsive">WELCOME TO TELKOM WITEL DENPASAR WFM MAP</h1></li>
                <li>
                    <p>______________________________________________________</p>
                </li>
                <li>
                  <button type="button" class="btn btn-danger btn-lg" data-toggle="modal" data-target="#modalLRForm">
                      Sign In
                  </button>
                </li>
            </ul>


    <!--Modal: Login / Register Form-->
    <div class="modal fade" style="height:700px;"id="modalLRForm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-notify modal-danger modal-md" role="document">
            <!--Content-->
            <div class="modal-content">

                <!--Modal cascading tabs-->
                <div class="modal-header">
                  <p class="heading lead">SIGN IN</p>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true" class="white-text">&times;</span>
                  </button>
                </div>
                  <!--Body-->
                  <div class="modal-body">
                    <?php
                    echo form_open(uri_string());
                    if (isset($error)){
                      echo "<div class='error'><center>$error</center></div>";
                    }
                    ?>
                    <div class="md-form">
                        <i class="fa fa-user prefix grey-text"></i>
                        <input type="text" id="username" name="username" class="form-control">
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
                        <button type="submit" class="btn btn-danger white-text">Login</button>
                    </div>
                  <?php echo form_close();?>
                  </div>
                  <!--Footer-->
                </div>
            <!--/.Content-->
        </div>
    </div>
    <!--Modal: Login / Register Form-->



        </div>
    </div>
    <!--/.Mask-->
    <!--Footer-->



    <footer class="page-footer center-on-small-only danger-color-dark">

        <!--Footer Links-->

        <!--Copyright-->
        <div class="footer-copyright">
            <div class="container-fluid">
                © 2017 Copyright: Telkom WITEL Denpasar

            </div>
        </div>
        <!--/.Copyright-->
    </footer>
    <!--/.Footer-->


    <!-- SCRIPTS -->

    <!-- JQuery -->
    <script type="text/javascript" src="<?php echo base_url('assets/js/jquery-3.1.1.min.js') ?>"></script>

    <!-- Bootstrap tooltips -->
    <script type="text/javascript" src="<?php echo base_url('assets/js/tether.min.js') ?>"></script>

    <!-- Bootstrap core JavaScript -->
    <script type="text/javascript" src="<?php echo base_url('assets/js/bootstrap.min.js') ?>"></script>

    <!-- MDB core JavaScript -->
    <script type="text/javascript" src="<?php echo base_url('assets/js/compiled.min.js') ?>"></script>


</body>

</html>
