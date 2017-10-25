<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">

    <title>WFM MAP</title>

    <!-- Font Awesome -->
    <link rel="icon" href="<?php echo base_url('assets/images/telkom.png') ?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/css/font-awesome.min.css') ?>">

    <!-- Bootstrap core CSS -->
    <link href="<?php echo base_url('assets/css/bootstrap.min.css') ?>" rel="stylesheet">

    <!-- Material Design Bootstrap -->
    <link href="<?php echo base_url('assets/css/compiled.min.css') ?>" rel="stylesheet">
    <link href="<?php echo base_url('assets/css/jquery.dataTables.min.css') ?>" rel="stylesheet">
    <link href="<?php echo base_url('assets/css/dataTables.bootstrap.min.css') ?>" rel="stylesheet">
    <link href="<?php echo base_url('assets/css/style.css') ?>" rel="stylesheet">

    <!-- Template styles -->
    <style rel="stylesheet">
        /* TEMPLATE STYLES */

        html,
        body,
        .view {
            height: 90.4%;
            width: 100%;
        }
        /* Navigation*/

        footer.page-footer {
            background-color: #CC0000;
            margin-top: -1px;
        }

        .view {
            -webkit-background-size: cover;
            -moz-backgrosund-size: cover;
            -o-background-size: cover;
            background-size: cover;
        }
        tr{
          font-size: 12px;
        }

    </style>
</head>
<body class="fixed-sn pink-skin" >

<ul id="slide-out" class="side-nav fixed sn-bg-4 custom-scrollbar">
<!-- Logo -->
<li>
      <!--
      <div class="logo-wrapper waves-light">
      <a href="#"  class="waves-effect waves-light logo-wrapper"> <img id="logo" src="<?php echo base_url('assets/img/logo1.png') ?>" class="img-fluid flex-center"></a>
    </div>
  -->
</li>
<!--/. Logo -->
<!--Social-->
<li>
  <ul class="social">
    <li><a class="icons-sm fb-ic"><i class="fa fa-facebook"> </i></a></li>
    <li><a class="icons-sm pin-ic"><i class="fa fa-pinterest"> </i></a></li>
    <li><a class="icons-sm gplus-ic"><i class="fa fa-google-plus"> </i></a></li>
    <li><a class="icons-sm tw-ic"><i class="fa fa-twitter"> </i></a></li>
  </ul>
</li>
<li>
  <ul class="collapsible collapsible-accordion">

    <li><a class="social collapsible-header waves-effect arrow-r"><i class="fa fa-user mr-1"></i><i class="fa fa-angle-down rotate-icon"></i>  <?php echo $this->session->userdata('nama') ?></a>
      <div class="collapsible-body">
        <ul class="">
          <li><a class="collapsible-header waves-effect arrow-r" href="<?php echo base_url('Access/LogOut') ?>"><i class="fa fa-sign-out ml-1"></i>Log Out</a>
          </li>
        </ul>
      </div>
    </li>
    <li id="btn_manage_user"><a class="waves-effect arrow-r" href=""><i class="fa fa-user mr-1"></i>Manage User</a>
    </li>
    <li><a href="#" id='show_my_cluster' class="waves-effect"><i class="fa fa-circle-o" id="token_show_my_cluster"></i>Show My Cluster</a></li>
    <li><a href="#" id='search_cluster' class="waves-effect"><i class="fa fa-search" id="token_show_my_cluster"></i>Search Cluster</a></li>
    <li><a href="#" id='show_sc_table' class="waves-effect"><i class="fa fa-table" id="token_show_sc_table"></i>Show PI Table ACCOM</a></li>
    <li id="show_pi_by_sto"><a class="collapsible-header waves-effect arrow-r"><i class="fa fa-edit"></i>Show PI By STO<i class="fa fa-angle-down rotate-icon"></i></a>
      <div class="collapsible-body">
        <ul class="collapsible collapsible-accordion sub-menu">
          <li><a class="sub-menu collapsible-header waves-effect arrow-r"><i class="fa fa-compass"></i>SMY<i class="fa fa-angle-down rotate-icon"></i></a>
            <div class="collapsible-body">
              <ul class="sub-menu">
                <li><a class="collapsible-header waves-effect arrow-r" onclick="show_data_table_pi('READY','SMY')">PI Ready</a></li>
                <li><a class="collapsible-header waves-effect arrow-r" onclick="show_data_table_pi('PROGRESS','SMY')">PI Progress</a></li>
                <li><a class="collapsible-header waves-effect arrow-r" onclick="show_data_table_pi('ACCOM','SMY')">PI ACCOM</a></li>
                <li><a class="collapsible-header waves-effect arrow-r" onclick="show_data_table_pi('KENDALA','SMY')">PI Kendala</a></li>
              </ul>
            </div>
          </li>
          <li><a class="sub-menu collapsible-header waves-effect arrow-r"><i class="fa fa-compass"></i>SAU<i class="fa fa-angle-down rotate-icon"></i></a>
            <div class="collapsible-body">
              <ul class="sub-menu">
                <li><a class="collapsible-header waves-effect arrow-r" onclick="show_data_table_pi('READY','SAU')">PI Ready</a></li>
                <li><a class="collapsible-header waves-effect arrow-r" onclick="show_data_table_pi('PROGRESS','SAU')">PI Progress</a></li>
                <li><a class="collapsible-header waves-effect arrow-r" onclick="show_data_table_pi('ACCOM','SAU')">PI ACCOM</a></li>
                <li><a class="collapsible-header waves-effect arrow-r" onclick="show_data_table_pi('KENDALA','SAU')">PI Kendala</a></li>
              </ul>
            </div>
          </li>
          <li><a class="sub-menu collapsible-header waves-effect arrow-r"><i class="fa fa-compass"></i>BNO<i class="fa fa-angle-down rotate-icon"></i></a>
            <div class="collapsible-body">
              <ul class="sub-menu">
                <li><a class="collapsible-header waves-effect arrow-r" onclick="show_data_table_pi('READY','BNO')">PI Ready</a></li>
                <li><a class="collapsible-header waves-effect arrow-r" onclick="show_data_table_pi('PROGRESS','BNO')">PI Progress</a></li>
                <li><a class="collapsible-header waves-effect arrow-r" onclick="show_data_table_pi('ACCOM','BNO')">PI ACCOM</a></li>
                <li><a class="collapsible-header waves-effect arrow-r" onclick="show_data_table_pi('KENDALA','BNO')">PI Kendala</a></li>
              </ul>
            </div>
          </li>
          <li><a class="sub-menu collapsible-header waves-effect arrow-r"><i class="fa fa-compass"></i>JBR<i class="fa fa-angle-down rotate-icon"></i></a>
            <div class="collapsible-body">
              <ul class="sub-menu">
                <li><a class="collapsible-header waves-effect arrow-r" onclick="show_data_table_pi('READY','JBR')">PI Ready</a></li>
                <li><a class="collapsible-header waves-effect arrow-r" onclick="show_data_table_pi('PROGRESS','JBR')">PI Progress</a></li>
                <li><a class="collapsible-header waves-effect arrow-r" onclick="show_data_table_pi('ACCOM','JBR')">PI ACCOM</a></li>
                <li><a class="collapsible-header waves-effect arrow-r" onclick="show_data_table_pi('KENDALA','JBR')">PI Kendala</a></li>
              </ul>
            </div>
          </li>
          <li><a class="sub-menu collapsible-header waves-effect arrow-r"><i class="fa fa-compass"></i>KLM<i class="fa fa-angle-down rotate-icon"></i></a>
            <div class="collapsible-body">
              <ul class="sub-menu">
                <li><a class="collapsible-header waves-effect arrow-r" onclick="show_data_table_pi('READY','KLM')">PI Ready</a></li>
                <li><a class="collapsible-header waves-effect arrow-r" onclick="show_data_table_pi('PROGRESS','KLM')">PI Progress</a></li>
                <li><a class="collapsible-header waves-effect arrow-r" onclick="show_data_table_pi('ACCOM','KLM')">PI ACCOM</a></li>
                <li><a class="collapsible-header waves-effect arrow-r" onclick="show_data_table_pi('KENDALA','KLM')">PI Kendala</a></li>
              </ul>
            </div>
          </li>
          <li><a class="sub-menu collapsible-header waves-effect arrow-r"><i class="fa fa-compass"></i>KUT<i class="fa fa-angle-down rotate-icon"></i></a>
            <div class="collapsible-body">
              <ul class="sub-menu">
                <li><a class="collapsible-header waves-effect arrow-r" onclick="show_data_table_pi('READY','KUT')">PI Ready</a></li>
                <li><a class="collapsible-header waves-effect arrow-r" onclick="show_data_table_pi('PROGRESS','KUT')">PI Progress</a></li>
                <li><a class="collapsible-header waves-effect arrow-r" onclick="show_data_table_pi('ACCOM','KUT')">PI ACCOM</a></li>
                <li><a class="collapsible-header waves-effect arrow-r" onclick="show_data_table_pi('KENDALA','KUT')">PI Kendala</a></li>
              </ul>
            </div>
          </li>
          <li><a class="sub-menu collapsible-header waves-effect arrow-r"><i class="fa fa-compass"></i>MMN<i class="fa fa-angle-down rotate-icon"></i></a>
            <div class="collapsible-body">
              <ul class="sub-menu">
                <li><a class="collapsible-header waves-effect arrow-r" onclick="show_data_table_pi('READY','MMN')">PI Ready</a></li>
                <li><a class="collapsible-header waves-effect arrow-r" onclick="show_data_table_pi('PROGRESS','MMN')">PI Progress</a></li>
                <li><a class="collapsible-header waves-effect arrow-r" onclick="show_data_table_pi('ACCOM','MMN')">PI ACCOM</a></li>
                <li><a class="collapsible-header waves-effect arrow-r" onclick="show_data_table_pi('KENDALA','MMN')">PI Kendala</a></li>
              </ul>
            </div>
          </li>
          <li><a class="sub-menu collapsible-header waves-effect arrow-r"><i class="fa fa-compass"></i>NDA<i class="fa fa-angle-down rotate-icon"></i></a>
            <div class="collapsible-body">
              <ul class="sub-menu">
                <li><a class="collapsible-header waves-effect arrow-r" onclick="show_data_table_pi('READY','NDA')">PI Ready</a></li>
                <li><a class="collapsible-header waves-effect arrow-r" onclick="show_data_table_pi('PROGRESS','NDA')">PI Progress</a></li>
                <li><a class="collapsible-header waves-effect arrow-r" onclick="show_data_table_pi('ACCOM','NDA')">PI ACCOM</a></li>
                <li><a class="collapsible-header waves-effect arrow-r" onclick="show_data_table_pi('KENDALA','NDA')">PI Kendala</a></li>
              </ul>
            </div>
          </li>
          <li><a class="sub-menu collapsible-header waves-effect arrow-r"><i class="fa fa-compass"></i>SWI<i class="fa fa-angle-down rotate-icon"></i></a>
            <div class="collapsible-body">
              <ul class="sub-menu">
                <li><a class="collapsible-header waves-effect arrow-r" onclick="show_data_table_pi('READY','SWI')">PI Ready</a></li>
                <li><a class="collapsible-header waves-effect arrow-r" onclick="show_data_table_pi('PROGRESS','SWI')">PI Progress</a></li>
                <li><a class="collapsible-header waves-effect arrow-r" onclick="show_data_table_pi('ACCOM','SWI')">PI ACCOM</a></li>
                <li><a class="collapsible-header waves-effect arrow-r" onclick="show_data_table_pi('KENDALA','SWI')">PI Kendala</a></li>
              </ul>
            </div>
          </li>
          <li><a class="sub-menu collapsible-header waves-effect arrow-r"><i class="fa fa-compass"></i>TOP<i class="fa fa-angle-down rotate-icon"></i></a>
            <div class="collapsible-body">
              <ul class="sub-menu">
                <li><a class="collapsible-header waves-effect arrow-r" onclick="show_data_table_pi('READY','TOP')">PI Ready</a></li>
                <li><a class="collapsible-header waves-effect arrow-r" onclick="show_data_table_pi('PROGRESS','TOP')">PI Progress</a></li>
                <li><a class="collapsible-header waves-effect arrow-r" onclick="show_data_table_pi('ACCOM','TOP')">PI ACCOM</a></li>
                <li><a class="collapsible-header waves-effect arrow-r" onclick="show_data_table_pi('KENDALA','TOP')">PI Kendala</a></li>
              </ul>
            </div>
          </li>
          <li><a class="sub-menu collapsible-header waves-effect arrow-r"><i class="fa fa-compass"></i>UBN<i class="fa fa-angle-down rotate-icon"></i></a>
            <div class="collapsible-body">
              <ul class="sub-menu">
                <li><a class="collapsible-header waves-effect arrow-r" onclick="show_data_table_pi('READY','UBN')">PI Ready</a></li>
                <li><a class="collapsible-header waves-effect arrow-r" onclick="show_data_table_pi('PROGRESS','UBN')">PI Progress</a></li>
                <li><a class="collapsible-header waves-effect arrow-r" onclick="show_data_table_pi('ACCOM','UBN')">PI ACCOM</a></li>
                <li><a class="collapsible-header waves-effect arrow-r" onclick="show_data_table_pi('KENDALA','UBN')">PI Kendala</a></li>
              </ul>
            </div>
          </li>
        </ul>
      </div>
    </li>
    <li id="show_pi_by_status"><a class="collapsible-header waves-effect arrow-r"><i class="fa fa-edit"></i>Show PI By Status<i class="fa fa-angle-down rotate-icon"></i></a>
      <div class="collapsible-body">
        <ul class="sub-menu">
          <li><a class="collapsible-header waves-effect arrow-r" onclick="show_data_table_pi('READY','ALL')">PI Ready</a></li>
          <li><a class="collapsible-header waves-effect arrow-r" onclick="show_data_table_pi('PROGRESS','ALL')">PI Progress</a></li>
          <li><a class="collapsible-header waves-effect arrow-r" onclick="show_data_table_pi('ACCOM','ALL')">PI ACCOM</a></li>
          <li><a class="collapsible-header waves-effect arrow-r" onclick="show_data_table_pi('KENDALA','ALL')">PI Kendala</a></li>
        </ul>
      </div>
    </li>
    <li><a href="#" id='show_teknisi_table' class="waves-effect"><i class="fa fa-calendar" id="token_show_teknisi_table"></i>Show Teknisi Today</a></li>
    <li><a href="#" id='upload_teknisi' class="waves-effect"><i class="fa fa-users" id="token_upload_jadwal"></i>Upload Teknisi</a></li>
    <li><a href="#" id='upload_jadwal' class="waves-effect"><i class="fa fa-calendar-plus-o" id="token_upload_jadwal"></i>Upload Jadwal Teknisi</a></li>
    <li><a href="#" id='upload_cluster' class="waves-effect"><i class="fa fa-compass" id="token_upload_jadwal"></i>Upload Cluster</a></li>
    <li><a href="#" id='update_pi' class="waves-effect"><i class="fa fa-file-excel-o" id="token_update_pi"></i>Update data PI</a></li>
    <li><a href="#" id='tambah_pi' class="waves-effect"><i class="fa fa-plus" id="token_tambah_pi"></i>Tambah data PI</a></li>
    <li><a href="#" id='summary' class="waves-effect"><i class="fa fa-book" id="token_summary"></i>Summary</a></li>
    <li><a href="#" id='inbox' class="waves-effect"><i class="fa fa-envelope-o" id="token_inbox"></i>Job Inbox</a></li>
  </ul>
</li>
<!--/. Side navigation links -->
<div class="sidenav-bg mask-strong"></div>
</ul>
<!--/. Sidebar navigation -->

<!--Navbar-->
<nav class="navbar narvar-expanded-lg navbar-dark danger-color-dark">
  <a href="#" data-activates="slide-out" class="button-collapse"><i class="fa fa-bars white-text"></i><strong class="white-text">  WFM MAP</strong></a>
</nav>

<div id="googleMap" style="width:100%;height:100%;"></div>

<div class="modal fade" id="modal_assign_teknisi" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-notify modal-danger modal-md" role="document">
        <!--Content-->
        <div class="modal-content">
            <!--Header-->
            <div class="modal-header text-center">
                <h4 id="header_do_sc" class="modal-title white-text w-100 font-bold py-2">ASSIGN TEKNISI</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true" class="white-text">&times;</span>
                </button>
            </div>

            <!--Body-->
            <div class="modal-body">
              <form id="form_assign_teknisi" class="" action="" method="post">
                <div class="md-form">
                  <input type="hidden" id="NAME_TEKNISI" name="NAME_TEKNISI" value="">
                  <input type="hidden" id="HP_TEKNISI" name="HP_TEKNISI" value="">
                  <input type="hidden" id="NO_SC_SC" name="NO_SC_SC" value="">

                  <select id="select_teknisi" class="mdb-select colorful-select dropdown-danger" name="select_teknisi">
                    <option value="">Select Teknisi</option>
                  </select>
                  <label for="TEKNISI">TEKNISI</label>
                </div>

              </form>
            </div>
            <!--Footer-->
            <div class="modal-footer justify-content-center">
                <button type="submit" id="btn_assign_teknisi"class="btn btn-outline-secondary-modal waves-effect">Send <i class="fa fa-paper-plane-o ml-1"></i></button>
            </div>
        </div>
        <!--/.Content-->
    </div>
</div>

<div class="modal fade" id="modal_do_sc" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-notify modal-danger modal-md" role="document">
        <!--Content-->
        <div class="modal-content">
            <!--Header-->
            <div class="modal-header text-center">
                <h4 id="header_do_sc" class="modal-title white-text w-100 font-bold py-2">KERJAKAN</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true" class="white-text">&times;</span>
                </button>
            </div>

            <!--Body-->
            <div class="modal-body">
              <form id="form_do_sc" class="" action="" method="post">
                <input type="hidden" id="NO_SC" name="NO_SC" value="">
                <div class="md-form">
                  <div class="row">
                    <div class="col-lg-6">
                      <input required type="text" id="TANGGAL_INSTALL" name="TANGGAL_INSTALL" class="form-control datepicker validate">
                      <label data-error="Silahkan isi tanggal install" for="date-picker">Tanggal Install</label>
                    </div>
                    <div class="col-lg-6">
                      <input type="text" required id="DO_SN_ONT" name="SN_ONT" class="form-control validate" value="">
                      <label data-error="Kolom SN ONT belum diisi" for="SN_ONT">SN ONT</label>
                    </div>
                  </div>
                </div>
                <div class="md-form">
                  <input type="text" id="DO_TEKNISI" name="TEKNISI" class="form-control validate" value="<?php echo $this->session->userdata('nama') ?>" readonly>
                  <label for="TEKNISI">TEKNISI</label>
                </div>
                <div class="md-form">
                  <input type="text" id="DO_HP_TEKNISI" name="HP_TEKNISI" class="form-control validate" value="<?php echo $this->session->userdata('contact') ?>" readonly>
                  <label for="HP_TEKNISI">HP TEKNISI</label>
                </div>
                <div class="md-form">
                  <textarea type="text" required id="DO_TINDAK_LANJUT" name="TINDAK_LANJUT" class="form-control validate md-textarea" value=""></textarea>
                  <label data-error="Kolom Tindak Lanjut belum diisi" for="TINDAK_LANJUT">TINDAK LANJUT</label>
                </div>
              </form>
            </div>
            <!--Footer-->
            <div class="modal-footer justify-content-center">
                <button type="submit" id="btn_do_sc"class="btn btn-outline-secondary-modal waves-effect">Send <i class="fa fa-paper-plane-o ml-1"></i></button>
            </div>
        </div>
        <!--/.Content-->
    </div>
</div>

<div class="modal fade" id="modal_search_cluster" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog cascading-modal" role="document">
        <!--Content-->
        <div class="modal-content">

            <!--Header-->
            <div class="modal-header danger-color-dark darken-3 white-text">
                <h4 class="title"><i class="fa fa-search"></i> Search Cluster</h4>
                <button type="button" class="close waves-effect waves-light" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <!--Body-->
            <div class="modal-body mb-0">
              <form class="" action="" method="post">
                <div class="md-form form-sm">
                  <div class="row">
                    <div class="col col-lg-12 col-md-12 col-sm-12 col-xsm-12">
                      <select id="select_sto" class="mdb-select colorful-select dropdown-danger" name="select_sto" id="select_sto">
                        <option value="">Select STO</option>
                      </select>
                      <label for="select_sto">Select STO</label>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col col-lg-12 col-md-12 col-sm-12 col-xsm-12">
                      <select id="select_odc" class="mdb-select colorful-select dropdown-danger" name="select_odc" id="select_odc">
                        <option value="">Select ODC</option>
                      </select>
                      <label for="select_odc">Select ODC</label>
                    </div>
                  </div>
                </div>
              </form>
                <div class="text-center mt-1-half">
                    <button id='btn_submit_search_cluster'class="btn btn-danger mb-1">Submit <i class="fa fa-paper-plane-o ml-1"></i></button>
                </div>

            </div>
        </div>
        <!--/.Content-->
    </div>
</div>

<div class="modal fade" style="height:700px;"id="modal_table" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-notify modal-danger modal-fluid" role="document">
    <!--Content-->
    <div class="modal-content">
      <!--Header-->
      <div class="modal-header">
        <p class="heading lead">PI Table</p>

        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true" class="white-text">&times;</span>
        </button>
      </div>

      <!--Body-->
      <div class="modal-body sc_table table-responsive">
        <table id="sc_table" style="height:300px;"class="table display table-hover table-responsive" cellspacing="0" width="100%">
          <thead>
              <tr>
                  <th>No</th>
                  <th>STO</th>
                  <th>NO SC</th>
                  <th>TYPE TRANSAKSI </th>
                  <th>ALPRO</th>
                  <th>POTS</th>
                  <th>SPEEDY</th>
                  <th>STATUS RESUME</th>
                  <th>ORDER DATE</th>
                  <th>NAMA CUST</th>
                  <th>ALAMAT</th>
                  <th>LONGITUDE</th>
                  <th>LATITUDE</th>
                  <th>TGL INSTALL</th>
                  <th>TEKNISI</th>
                  <th>HP TEKNISI</th>
                  <th>TINDAK LANJUT</th>
                  <th>SN ONT</th>
                  <th id="action">ACTION</th>
              </tr>
          </thead>
          <tbody>

          </tbody>
      </table>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" style="height:700px;"id="modal_manage_user" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-notify modal-danger modal-md" role="document">
    <!--Content-->
    <div class="modal-content">
      <!--Header-->
      <div class="modal-header">
        <p class="heading lead">MANAGE USER</p>

        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true" class="white-text">&times;</span>
        </button>
      </div>

      <!--Body-->
      <div class="modal-body sc_table table-responsive">
        <table id="tb_user" style="height:300px;width:100%;"class="table display table-hover table-responsive" cellspacing="0" width="100%">
          <thead>
              <tr>
                  <th>NO</th>
                  <th>USERNAME</th>
                  <th>NAME</th>
                  <th>ROLE </th>
                  <th>STO</th>
                  <th>CLUSTER</th>
                  <th>CLUSTER HELP</th>
                  <th>WORK FINISHED</th>
              </tr>
          </thead>
          <tbody>

          </tbody>
      </table>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" style="height:700px;"id="modal_teknisi_today" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-notify modal-danger modal-lg" role="document">
    <!--Content-->
    <div class="modal-content">
      <!--Header-->
      <div class="modal-header">
        <p class="heading lead">TEKNISI TODAY</p>

        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true" class="white-text">&times;</span>
        </button>
      </div>

      <!--Body-->
      <div class="modal-body sc_table table-responsive">
        <table id="tb_teknisi" style="height:300px;width:100%;"class="table display table-hover table-responsive" cellspacing="0" width="100%">
          <thead>
              <tr>
                  <th>NO</th>
                  <th>STO</th>
                  <th>CLUSTER</th>
                  <th>USERNAME</th>
                  <th>NAME</th>
              </tr>
          </thead>
          <tbody>

          </tbody>
      </table>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" style="height:700px;"id="modal_summary" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-notify modal-danger modal-md" role="document">
    <!--Content-->
    <div class="modal-content">
      <!--Header-->
      <div class="modal-header">
        <p class="heading lead">SUMMARY</p>

        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true" class="white-text">&times;</span>
        </button>
      </div>

      <!--Body-->
      <div class="modal-body sc_table table-responsive tabl-">
        <table id="tb_summary" style="height:300px;width:100%;"class="table display table-hover table-responsive" cellspacing="0" width="100%">
          <thead>
              <tr>
                  <th>NO</th>
                  <th>STO</th>
                  <th>PI Ready</th>
                  <th>PI Progress</th>
                  <th>PI ACCOM</th>
                  <th>PI KENDALA</th>
              </tr>
          </thead>
          <tbody>

          </tbody>
      </table>

      </div>
    </div>
  </div>
</div>

<div class="modal fade" style="height:700px;"id="modal_upload_jadwal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-notify modal-danger modal-md" role="document">
    <!--Content-->
    <div class="modal-content">
      <!--Header-->
      <div class="modal-header">
        <p class="heading lead">Upload CSV Jadwal Teknisi</p>

        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true" class="white-text">&times;</span>
        </button>
      </div>

      <!--Body-->
      <div class="modal-body table-responsive tabl-">
        <form class="" id="form_upload_jadwal" action="" method="post">
          <div class="file-field">
              <div class="btn btn-primary btn-sm">
                  <span>Choose file</span>
                  <input type="file" name="file_jadwal" id="file_jadwal">
              </div>
              <div class="file-path-wrapper">
                 <input class="file-path validate" type="text" placeholder="Upload your file">
              </div>
          </div>
          <button type="submit" class="btn btn-md btn-success" id="btn_submit_jadwal">Upload</button>
        </form>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" style="height:700px;"id="modal_update_pi" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-notify modal-danger modal-md" role="document">
    <!--Content-->
    <div class="modal-content">
      <!--Header-->
      <div class="modal-header">
        <p class="heading lead">Update PI</p>

        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true" class="white-text">&times;</span>
        </button>
      </div>

      <!--Body-->
      <div class="modal-body table-responsive tabl-">
        <form class="" id="form_update_pi" action="" method="post">
          <div class="file-field">
              <div class="btn btn-primary btn-sm">
                  <span>Choose file</span>
                  <input type="file" name="file_update_pi" id="file_update_pi">
              </div>
              <div class="file-path-wrapper">
                 <input class="file-path validate" type="text" placeholder="Upload your file">
              </div>
          </div>
          <button type="submit" class="btn btn-md btn-success" id="btn_submit_update_pi">Update</button>
        </form>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" style="height:700px;"id="modal_tambah_pi" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-notify modal-danger modal-md" role="document">
    <!--Content-->
    <div class="modal-content">
      <!--Header-->
      <div class="modal-header">
        <p class="heading lead">Tambah PI</p>

        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true" class="white-text">&times;</span>
        </button>
      </div>

      <!--Body-->
      <div class="modal-body table-responsive tabl-">
        <form class="" id="form_tambah_pi" action="" method="post">
          <div class="file-field">
              <div class="btn btn-primary btn-sm">
                  <span>Choose file</span>
                  <input type="file" name="file_tambah_pi" id="file_tambah_pi">
              </div>
              <div class="file-path-wrapper">
                 <input class="file-path validate" type="text" placeholder="Upload your file">
              </div>
          </div>
          <button type="submit" class="btn btn-md btn-success" id="btn_submit_tambah_pi">Add</button>
        </form>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" style="height:700px;"id="modal_upload_cluster" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-notify modal-danger modal-md" role="document">
    <!--Content-->
    <div class="modal-content">
      <!--Header-->
      <div class="modal-header">
        <p class="heading lead">Upload Cluster</p>

        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true" class="white-text">&times;</span>
        </button>
      </div>

      <!--Body-->
      <div class="modal-body table-responsive tabl-">
        <form class="" id="form_upload_cluster" action="" method="post">
          <div class="file-field">
              <div class="btn btn-primary btn-sm">
                  <span>Choose file</span>
                  <input type="file" name="file_cluster" id="file_cluster">
              </div>
              <div class="file-path-wrapper">
                 <input class="file-path validate" type="text" placeholder="Upload your file">
              </div>
          </div>
          <button type="submit" class="btn btn-md btn-success" id="btn_submit_upload_cluster">Upload</button>
        </form>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" style="height:700px;"id="modal_upload_teknisi" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-notify modal-danger modal-md" role="document">
    <!--Content-->
    <div class="modal-content">
      <!--Header-->
      <div class="modal-header">
        <p class="heading lead">Upload Teknisi</p>

        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true" class="white-text">&times;</span>
        </button>
      </div>

      <!--Body-->
      <div class="modal-body table-responsive tabl-">
        <form class="" id="form_upload_teknisi" action="" method="post">
          <div class="file-field">
              <div class="btn btn-primary btn-sm">
                  <span>Choose file</span>
                  <input type="file" name="file_teknisi" id="file_teknisi">
              </div>
              <div class="file-path-wrapper">
                 <input class="file-path validate" type="text" placeholder="Upload your file">
              </div>
          </div>
          <button type="submit" class="btn btn-md btn-success" id="btn_submit_upload_teknisi">Upload</button>
        </form>
      </div>
    </div>
  </div>
</div>

<footer id='footer' class="page-footer center-on-small-only fluid-bottom danger-color-dark">


  <!--Copyright-->
  <div class="footer-copyright">
    <div class="container-static">
      © 2017 Copyright: Telkom WITEL Denpasar
    </div>
  </div>
  <!--/.Copyright-->
</footer>

<!-- SCRIPTS -->
<script type="text/javascript" src="<?php echo base_url('assets/js/jquery-3.2.1.min.js') ?>"></script>
<script type="text/javascript" src="<?php echo base_url('assets/js/tether.min.js') ?>"></script>
<script type="text/javascript" src="<?php echo base_url('assets/js/bootstrap.min.js') ?>"></script>
<script type="text/javascript" src="<?php echo base_url('assets/js/compiled.min.js') ?>"></script>
<script type="text/javascript" src="<?php echo base_url('assets/js/jquery.dataTables.min.js') ?>"></script>
<script type="text/javascript" src="<?php echo base_url('assets/js/dataTables.bootstrap.min.js') ?>"></script>
<script type="text/javascript" src="<?php echo base_url('assets/js/ajaxfileupload.js') ?>"></script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBb4ThyMb8dBaJ6-g_NN9GMFk1sxupL-Uw&callback=myMap" async defer ></script>

<script type="text/javascript">
  var is_finished=false;
  var map;
  var marker_counter=0;
  var array_marker = [];
  var array_sc = [];
  var toogle_show_location=0;
  var prev_iw=false;
  var iw_content;
  var cluster;
  var num_accom=0;
  var num_ready=0;
  var num_progress=0;
  var num_kendala=0;
  var current;
  var current_sc;
  var username="<?php echo $this->session->userdata('username') ?>";

  $(document).ready(function(){
    $('#tambah_pi').hide();
    $('.datepicker').pickadate({
      format:'dd/mm/yyyy',
      formatSubmit: 'dd/mm/yyyy'
    });
    if ('<?php echo $this->session->userdata('role') ?>'=='TEKNISI') {
      $('#upload_jadwal').remove();
      $('#show_location').remove();
      $('#btn_manage_user').remove();
      $('#search_cluster').remove();
      $('#show_sc_table').remove();
      $('#show_pi_by_sto').remove();
      $('#summary').remove();
      $('#show_pi_by_sto').remove();
      $('#show_pi_by_status').remove();
      $('#show_teknisi_table').remove();
      $('#update_pi').remove();
      $('#tambah_pi').remove();
      $('#action').hide();
      $('#upload_cluster').remove();
      $('#upload_teknisi').remove();
    }
    else if('<?php echo $this->session->userdata('role') ?>'=='ADMIN'){
      $('#show_my_cluster').remove();
      $('#inbox').remove();
    }
    else if('<?php echo $this->session->userdata('role') ?>'=='HELP DESK'){
      $('#show_my_cluster').remove();
      $('#teknisi_action').remove();
      $('#btn_manage_user').remove();
      $('#inbox').remove();
    }
    $(".button-collapse").sideNav();
    $('#click_on_map').click(function(){
      $('#click_on_map').addClass('active');
      $('#slide-out').sideNav('hide');
      click_on_map();
    });
    $('#select_sto').change(function(e) {
      e.preventDefault();
      $('.option_odc').remove();
      var sto= $(this).val();
      $.ajax({
        url: '<?php echo base_url('Teknisi/ajax_get_odc') ?>',
        type: 'POST',
        dataType: 'JSON',
        data: {
          sto: sto,
          name: null
        },
        success:function(data){
          for (var i = 0; i < data.length; i++) {
            $('#select_odc').append("<option class='option_odc' value='"+data[i].NAME+"'>"+data[i].NAME+"</option>");
          }
          $('#select_odc').material_select();
        },
        error:function(){
          alert('error onchange');
        }
      });
    });
  });

  $('#show_my_cluster').click(function(e) {
    e.preventDefault();
    if(toogle_show_location==0){
      num_ready=0;num_accom=0;
      $.ajax({
        url: '<?php echo base_url('Teknisi/ajax_get_teknisi') ?>',
        type: 'POST',
        dataType: 'JSON',
        data:{username:username},
        success:function(data){
          get_odc(data[0]);
        },
        error:function() {
          alert('error show my cluster');
        }
      });
      $('#token_show_my_cluster').removeClass('fa-circle-o').addClass('fa-circle');
    }
    else{
      setMapOnAll(null);
      $('#token_show_my_cluster').removeClass('fa-circle').addClass('fa-circle-o');
    }
  });
  $('#search_cluster').click(function(e) {
    e.preventDefault();
    $('#slide-out').sideNav('hide');
    num_accom=0;
    num_ready=0;
    $.ajax({
      url: '<?php echo base_url('Teknisi/ajax_get_sto') ?>',
      type: 'POST',
      dataType: 'JSON',
      success:function(data){
        for (var i = 0; i < data.length; i++) {
          $('#select_sto').append("<option value='"+data[i].STO+"'>"+data[i].STO+"</option>");
        }
        $('#select_sto').material_select();
        $('#select_odc').material_select();
      },
      error:function(){
        alert('error get STO');
      }
    });
    $('#modal_search_cluster').modal('show');
  });
  $('#show_sc_table').click(function(e){
    e.preventDefault();
    show_data_table_sc('all');
  });
  $('#btn_submit_search_cluster').click(function(e) {
    e.preventDefault();
    toastr.info('Pencarian cluster sedang berlangsung, harap tunggu.');
    var sto=$('#select_sto').val();
    var odc=$('#select_odc').val();
    if (toogle_show_location==1){
      setMapOnAll(null);
      array_marker = [];
      toogle_show_location=0;
    }
    $.ajax({
      url: '<?php echo base_url('Teknisi/ajax_get_odc') ?>',
      type: 'POST',
      dataType: 'JSON',
      data: {
        sto: sto,
        name: odc
      },
      success:function(data){
        is_finished=false;
        $('#modal_search_cluster').modal('hide');
        var latlat=parseFloat(data[0].LATITUDE);
        var lnglng=parseFloat(data[0].LONGITUDE);
        get_odp(latlat,lnglng);
        create_circle(data[0]);
        current=data[0];
      },
      error:function(data){
        alert('error get cluster');
      }
    });
  });
  $('#btn_manage_user').click(function(e) {
    e.preventDefault();
    show_data_table_user('ALL');
  });
  $('#btn_do_sc').click(function(e) {
    e.preventDefault();
    $.ajax({
      url: '<?php echo base_url('Teknisi/ajax_do_sc') ?>',
      type: 'POST',
      dataType: 'JSON',
      data: $('#form_do_sc').serialize(),
      success:function(data){
        $('#modal_do_sc').modal('hide');
        toastr.success('Data PI berhasil diupdate!');
        if (toogle_show_location==1) {
          setMapOnAll(null);
        }
        get_odc(current);
      },
      error:function(){
        alert('error do sc');
      }
    });
  });
  $('#btn_assign_teknisi').click(function(e) {
    e.preventDefault();
    var username=$('#select_teknisi').val();
    $.ajax({
      url: '<?php echo base_url('Teknisi/ajax_get_teknisi') ?>',
      type: 'POST',
      dataType: 'JSON',
      data: {username: username},
      success:function(data){
        console.log(data);
        $('#NAME_TEKNISI').val(data[0].NAME);
        $('#NO_SC_SC').val(current_sc.NO_SC);
        $('#HP_TEKNISI').val(data[0].CONTACT);
        $.ajax({
          url: '<?php echo base_url('Teknisi/ajax_assign_teknisi') ?>',
          type: 'POST',
          dataType: 'JSON',
          data: $('#form_assign_teknisi').serialize(),
          success:function(data){
            if (toogle_show_location==1) {
              setMapOnAll(null);
            }
            is_finished=false;
            $('#modal_assign_teknisi').modal('hide');
            get_odp(parseFloat(current.LATITUDE),parseFloat(current.LONGITUDE));
            create_circle(current);
            toastr.success('Berhasil melakukan assign teknisi');
          },
          error:function(){

          }
        });

      },
      error:function(){

      }
    });
  });
  $('#inbox').click(function(e) {
    e.preventDefault();
    show_inbox();
  });
  $('#show_teknisi_table').click(function(e) {
    e.preventDefault();
    show_data_table_user('TEKNISI');
  });
  $('#summary').click(function(e){
    e.preventDefault();
    show_summary();
  });
  $('#upload_jadwal').click(function(e){
    e.preventDefault();
    $('#modal_upload_jadwal').modal('show');
  });
  $('#upload_cluster').click(function(e){
    e.preventDefault();
    $('#modal_upload_cluster').modal('show');
  });
  $('#upload_teknisi').click(function(e){
    e.preventDefault();
    $('#modal_upload_teknisi').modal('show');
  });
  $('#update_pi').click(function(e) {
    e.preventDefault();
    $('#modal_update_pi').modal('show');
  });
  $('#tambah_pi').click(function(e) {
    e.preventDefault();
    $('#modal_tambah_pi').modal('show');
  });
  $('#form_upload_jadwal').submit(function(e){
    e.preventDefault();
    toastr.info('Proses sedang berjalan');
    $('#btn_submit_jadwal').text('Uploading...');
    $('#btn_submit_jadwal').attr('disabled',true);
    var data = new FormData();
    data.append('file_jadwal',$('#file_jadwal')[0].files[0]);
    $.ajax({
      url: '<?php echo base_url('Teknisi/ajax_upload_jadwal') ?>',
      type: 'POST',
      dataType: 'JSON',
      data: data,
      cache: false,
      contentType: false,
      processData: false,
      success:function(){
        toastr.success('Upload jadwal berhasil dilakukan!');
        $('#btn_submit_jadwal').text('Upload');
        $('#btn_submit_jadwal').attr('disabled',false);
      },
      error:function(){
        toastr.error('Upload jadwal gagal dilakukan! Silakan periksa format upload Jadwal!');
        $('#btn_submit_jadwal').text('Upload');
        $('#btn_submit_jadwal').attr('disabled',false);
      }
    });
  });
  $('#form_update_pi').submit(function(e){
    e.preventDefault();
    toastr.info('Proses sedang berjalan');
    $('#btn_submit_update_pi').text('Updating...');
    $('#btn_submit_update_pi').attr('disabled',true);
    var data = new FormData();
    data.append('file_update_pi',$('#file_update_pi')[0].files[0]);
    $.ajax({
      url: '<?php echo base_url('Teknisi/ajax_update_pi') ?>',
      type: 'POST',
      dataType: 'JSON',
      data: data,
      cache: false,
      contentType: false,
      processData: false,
      success:function(data){
        toastr.success('Berhasil update PI sebanyak '+data+' buah!');
        $('#btn_submit_update_pi').text('Update');
        $('#btn_submit_update_pi').attr('disabled',false);
      },
      error:function(){
        toastr.error('Update PI gagal dilakukan! Silakan periksa format update PI!');
        $('#btn_submit_update_pi').text('Update');
        $('#btn_submit_update_pi').attr('disabled',false);
      }
    });
  });
  $('#form_tambah_pi').submit(function(e){
    e.preventDefault();
    toastr.info('Proses sedang berjalan');
    $('#btn_submit_tambah_pi').text('Uploading...');
    $('#btn_submit_tambah_pi').attr('disabled',true);
    var data = new FormData();
    data.append('file_tambah_pi',$('#file_tambah_pi')[0].files[0]);
    $.ajax({
      url: '<?php echo base_url('Teknisi/ajax_tambah_pi') ?>',
      type: 'POST',
      dataType: 'JSON',
      data: data,
      cache: false,
      contentType: false,
      processData: false,
      success:function(){
        toastr.success('Tambah PI berhasil dilakukan!');
        $('#btn_submit_tambah_pi').text('Add');
        $('#btn_submit_tambah_pi').attr('disabled',false);
      },
      error:function(){
        toastr.error('Tambah PI gagal dilakukan! Silakan periksa format tambah PI!');
        $('#btn_submit_tambah_pi').text('Add');
        $('#btn_submit_tambah_pi').attr('disabled',false);
      }
    });
  });
  $('#form_upload_cluster').submit(function(e){
    e.preventDefault();
    toastr.info('Proses sedang berjalan');
    $('#btn_submit_upload_cluster').text('Uploading...');
    $('#btn_submit_upload_cluster').attr('disabled',true);
    var data = new FormData();
    data.append('file_cluster',$('#file_cluster')[0].files[0]);
    $.ajax({
      url: '<?php echo base_url('Teknisi/ajax_upload_cluster') ?>',
      type: 'POST',
      dataType: 'JSON',
      data: data,
      cache: false,
      contentType: false,
      processData: false,
      success:function(data){
        toastr.success('Berhasil menambah cluster sebanyak '+data+' buah!');
        $('#btn_submit_upload_cluster').text('Upload');
        $('#btn_submit_upload_cluster').attr('disabled',false);
      },
      error:function(){
        toastr.error('Tambah PI gagal dilakukan! Silakan periksa format tambah PI!');
        $('#btn_submit_tambah_pi').text('Add');
        $('#btn_submit_tambah_pi').attr('disabled',false);
      }
    });
  });
  $('#form_upload_teknisi').submit(function(e){
    e.preventDefault();
    toastr.info('Proses sedang berjalan');
    $('#btn_submit_upload_teknisi').text('Uploading...');
    $('#btn_submit_upload_teknisi').attr('disabled',true);
    var data = new FormData();
    data.append('file_teknisi',$('#file_teknisi')[0].files[0]);
    $.ajax({
      url: '<?php echo base_url('Teknisi/ajax_upload_teknisi') ?>',
      type: 'POST',
      dataType: 'JSON',
      data: data,
      cache: false,
      contentType: false,
      processData: false,
      success:function(data){
        toastr.success('Berhasil menambah teknisi sebanyak '+data+' orang!');
        $('#btn_submit_upload_teknisi').text('Upload');
        $('#btn_submit_upload_teknisi').attr('disabled',false);
      },
      error:function(){
        toastr.error('Tambah PI gagal dilakukan! Silakan periksa format tambah PI!');
        $('#btn_submit_tambah_pi').text('Add');
        $('#btn_submit_tambah_pi').attr('disabled',false);
      }
    });
  });

  function myMap() {
    var mapProp= {
      center:new google.maps.LatLng(-8.676375,115.211922),
      zoom:10,
      mapTypeId:'roadmap',
      zoomControl: true,
      zoomControlOptions: {
        position: google.maps.ControlPosition.LEFT_CENTER
      },
      fullscreenControl: true,
      streetViewControl: true,
      streetViewControlOptions: {
        position: google.maps.ControlPosition.RIGHT_TOP
      }
    };
    map=new google.maps.Map(document.getElementById("googleMap"),mapProp);
  }
  function get_odc(data){ //untuk teknisi
    $.ajax({
      url: '<?php echo base_url('Teknisi/ajax_get_odc') ?>',
      type: 'POST',
      dataType: 'JSON',
      data: {
        sto:data.STO,
        name:data.CLUSTER
      },
      success:function(data){
        is_finished=false;
        $('#slide-out').sideNav('hide');
        get_odp(parseFloat(data[0].LATITUDE),parseFloat(data[0].LONGITUDE));
        create_circle(data[0]);
      },
      error:function(){
        alert('error get odc');
      }
    });
  } //untuk selec di modal
  function get_odp(lat,lng){
    $.ajax({
      url: '<?php echo base_url('Teknisi/ajax_get_odp') ?>',
      type: 'POST',
      dataType: 'JSON',
      data:{
        lat:lat,
        lng:lng
      },
      success:function(data){
        toogle_show_location=1;
        array_sc = [];
        is_finished=false;
        num_ready=0;
        num_accom=0;
        num_progress=0;
        num_kendala=0;
        for (var i = 0; i < data['odp'].length; i++) {
          var lat = data['odp'][i].LATITUDE;
          var lng = data['odp'][i].LONGITUDE;
          var location = new google.maps.LatLng(lat,lng);
          var marker= new google.maps.Marker({
            position:location,
            map:map,
          });
          array_marker.push(marker);
          marker.infowindow = new google.maps.InfoWindow({
            content:set_content(data['odp'][i],'ODP'),
            maxWidth:400,
          });
          click_overlay(map,marker,'marker');
        }

        for (var i = 0; i < data['sc'].length; i++) {
          if (data['sc'][i].STATUS_RESUME=='PI Ready') num_ready++;
          else if (data['sc'][i].STATUS_RESUME=='PI ACCOM') num_accom++;
          else if (data['sc'][i].STATUS_RESUME=='PI Progress') num_progress++;
          else if (data['sc'][i].STATUS_RESUME=='PI Kendala') num_kendala++;
          array_sc.push(data['sc'][i].ALPRO);
        }
        is_finished=true;
      },
      error:function(){
        alert('error get ODP');
      }
    });

  }
  function get_sc(pd_name){
    $.ajax({
      url: '<?php echo base_url('Teknisi/ajax_get_sc') ?>',
      type: 'POST',
      dataType: 'JSON',
      data:{
        pd_name:pd_name
      },
      success:function(data){
        num_ready=0;
        num_progress=0;
        num_accom=0;
        num_kendala=0;
        for (var i = 0; i < data.length; i++) {
          if (data[i].STATUS_RESUME=='PI Ready') num_ready++;
          else if (data[i].STATUS_RESUME=='PI Progress') num_progress++;
          else if (data[i].STATUS_RESUME=='PI ACCOM') num_accom++;
          else if (data[i].STATUS_RESUME=='PI Kedala') num_kendala++;
        }
        array_sc.push(data);
        is_finished=true;
      },
      error:function(){
        alert('error get sc');
      }
    });

  }
  function set_content(data,type){
    if (type=='ODP') {
      iw_content='<form  id="frm_content">'+
          '<div class="container">'+
            '<div class="row">'+
              '<div class="col col-lg-12">'+
                '<span class="keterangan">STO</span>'+
                '<input type="text" id="sto" name="sto" value="'+data.STO+'" class="form-control" readonly>'+
              '</div>'+
            '</div>'+
            '<div class="row">'+
              '<div class="col col-lg-12">'+
                '<span class="keterangan">PD Name</span>'+
                '<input type="text" id="pd_name" name="pd_name" value="'+data.PD_NAME+'" class="form-control" readonly>'+
              '</div>'+
            '</div>'+
          '</div>'+
          '<div class="row">'+
            '<div class="col col-lg-6">'+
              '<span class="keterangan">Status ODP</span>'+
              '<input type="text" id="status_odp" name="status_odp" value="'+data.STATUS_ODP+'" class="form-control" readonly>'+
            '</div>'+
            '<div class="col col-lg-6">'+
              '<span class="keterangan">F OLT</span>'+
              '<input type="text" id="f_olt" name="f_olt" value="'+data.F_OLT+'" class="form-control" readonly>'+
            '</div>'+
          '</div>'+
          '<div class="row">'+
            '<div class="col col-lg-6">'+
              '<span class="keterangan">QR Code OPD</span>'+
              '<input type="text" id="qr_code_odp" name="qr_code_odp" value="'+data.QR_CODE_ODP+'" class="form-control" readonly>'+
            '</div>'+
            '<div class="col col-lg-6">'+
              '<span class="keterangan">Tipe GPON</span>'+
              '<input type="text" id="tipe_gpon" name="tipe_gpon" value="'+data.TIPE_GPON+'" class="form-control" readonly>'+
            '</div>'+
          '</div>'+
          '<div class="row">'+
            '<div class="col col-lg-6">'+
              '<span class="keterangan">IP GPON</span>'+
              '<input type="text" id="ip_gpon" name="ip_gpon" value="'+data.IP_GPON+'" class="form-control" readonly>'+
            '</div>'+
            '<div class="col col-lg-6">'+
              '<span class="keterangan">Port GPON</span>'+
              '<input type="text" id="port_gpon" name="port_gpon" value="'+data.PORT_GPON+'" class="form-control" readonly>'+
            '</div>'+
          '</div>'+
            '<div class="row">'+
              '<div class="col col-lg-6">'+
                '<span class="keterangan">Latitude</span>'+
                '<input type="text" id="lat" name="lat" value="'+data.LATITUDE+'" class="form-control" readonly>'+
              '</div>'+
              '<div class="col col-lg-6">'+
                '<span class="keterangan">Longitude</span>'+
                '<input type="text" id="long" name="long" value="'+data.LONGITUDE+'" class="form-control" readonly>'+
              '</div>'+
            '</div>'+
          '</div>'+
        '</form>';
    }
    else if (type=='circle') {
      iw_content='<form  id="frm_content">'+
          '<div class="container">'+
            '<div class="row">'+
              '<div class="col col-lg-6">'+
                '<span class="keterangan">STO</span>'+
                '<input type="text" id="sto" name="sto" value="'+data.STO+'" class="form-control" readonly>'+
              '</div>'+
              '<div class="col col-lg-6">'+
                '<span class="keterangan">ODC Name</span>'+
                '<input type="text" id="odc_name" name="odc_name" value="'+data.NAME+'" class="form-control" readonly>'+
              '</div>'+
            '</div>'+
            '<div class="row">'+
              '<div class="col col-lg-6">'+
                '<span class="keterangan">Jumlah PI ACCOM</span>'+
                '<input type="text" onclick="show_data_table_sc(\'ACCOM\')" id="num_accom" name="num_accom" value="'+num_accom+'" class="form-control" readonly>'+
              '</div>'+
              '<div class="col col-lg-6">'+
                '<span class="keterangan">Jumlah PI Ready</span>'+
                '<input type="text" onclick="show_data_table_sc(\'READY\')" id="num_ready" name="num_ready" value="'+num_ready+'" class="form-control" readonly>'+
              '</div>'+
            '</div>'+
            '<div class="row">'+
              '<div class="col col-lg-6">'+
                '<span class="keterangan">Jumlah PI Progress</span>'+
                '<input type="text" onclick="show_data_table_sc(\'PROGRESS\')" id="num_accom" name="num_accom" value="'+num_progress+'" class="form-control" readonly>'+
              '</div>'+
              '<div class="col col-lg-6">'+
                '<span class="keterangan">Jumlah PI Kendala</span>'+
                '<input type="text" onclick="show_data_table_sc(\'KENDALA\')" id="num_ready" name="num_ready" value="'+num_kendala+'" class="form-control" readonly>'+
              '</div>'+
            '</div>'+
            '<div class="row">'+
            '<div class="col col-lg-6">'+
              '<span class="keterangan">Latitude</span>'+
                '<input type="text" id="lat" name="lat" value="'+data.LATITUDE+'" class="form-control" readonly>'+
              '</div>'+
              '<div class="col col-lg-6">'+
                '<span class="keterangan">Longitude</span>'+
                '<input type="text" id="long" name="long" value="'+data.LONGITUDE+'" class="form-control" readonly>'+
              '</div>'+
            '</div>'+
          '</div>'+
        '</form>'+
        '<button type="button" onclick="search_nearest_cluster(\''+data.LATITUDE+'\',\''+data.LONGITUDE+'\')" class="btn btn-success btn-sm"><i class="fa fa-rss"></i>  Cari Cluster Terdekat</button>';

    }
      return iw_content;
    }
  function setMapOnAll(map) {
    for (var i = 0; i < array_marker.length; i++) {
      array_marker[i].setMap(map);
    }
    array_marker = [];
    toogle_show_location=0;
  }
  function create_circle(data){
    if (is_finished) {
      if ((num_ready/(num_ready+num_accom+num_kendala+num_progress))<=0.5) {
        var warna='#007E33'
      }
      else if ((num_ready/(num_ready+num_accom))<=0.75){
        var warna='#FF8800'
      }
      else if ((num_ready/(num_ready+num_accom))<=1){
        var warna='#CC0000'
      }
      var latlat=parseFloat(data.LATITUDE);
      var lnglng=parseFloat(data.LONGITUDE);
      var location = new google.maps.LatLng(latlat,lnglng);
      var cluster = new google.maps.Circle({
          strokeColor: warna,
          strokeOpacity: 0.8,
          strokeWeight: 2,
          fillColor: warna,
          fillOpacity: 0.35,
          map: map,
          center: location,
          radius: 500
        });
      map.setCenter(location);
      map.setZoom(17);
      array_marker.push(cluster);
      cluster.infowindow = new google.maps.InfoWindow({
        content:set_content(data,'circle'),
        maxWidth:400,
      });
      click_overlay(map,cluster,'circle');
      if (num_ready==0) {
        toastr.info('Silahkan klik tombol Cari Cluster Terdekat karena di cluster anda tidak ada PI berstatus PI Ready!');
      }
    }
    else {
      setTimeout(function(){create_circle(data)},100);
    }
  }
  function click_overlay(map,marker,type){
    google.maps.event.addListener(marker,'click',function(){
      if(prev_iw){
        prev_iw.close();
      }
      if((prev_iw==marker.infowindow)&&(marker_counter==1)){
        prev_iw.close();
        marker_counter=0;
      }
      else{
        marker_counter=1;
        if (type=="circle") {
          marker.infowindow.setPosition(marker.getCenter());
        }
        prev_iw= marker.infowindow;
        marker.infowindow.open(map,marker);
      }
    });
  }
  function show_data_table_sc(type){
    $('#action').show();
    $('#modal_table').modal('show');
    table = null;
    table = $('#sc_table').DataTable({
         "processing": true, //Feature control the processing indicator.
         "serverSide": true, //Feature control DataTables' server-side processing mode.
         "bDestroy": true,
         "order": [], //Initial no order.

         // Load data for the table's content from an Ajax source
         "ajax": {
             "url": "<?php echo base_url('Teknisi/ajax_list')?>",
             "type": "POST",
             "data": function(data){
               if (type!='all') {
                 data.sc = array_sc;
               }
               data.type=type;
             }
         },

         //Set column definition initialisation properties.
         "columnDefs": [
         {
             "targets": [ -1 ], //last column
             "orderable": false, //set not orderable
         },
         ],
     });
    //  $('#sc_table_filter').remove();
  }
  function show_data_table_pi(type,sto){
    if ((type=='READY')||(type=='ACCOM')||(type=='KENDALA')) {
      $('#action').hide();
    }
    else {
      $('#action').show();
    }
    $('#modal_table').modal('show');
    table = null;
    table = $('#sc_table').DataTable({
         "processing": true, //Feature control the processing indicator.
         "serverSide": true, //Feature control DataTables' server-side processing mode.
         "bDestroy": true,
         "order": [], //Initial no order.

         // Load data for the table's content from an Ajax source
         "ajax": {
             "url": "<?php echo base_url('Teknisi/ajax_list_pi')?>",
             "type": "POST",
             "data": function(data){
               data.type=type;
               data.sto=sto;
             }
         },

         //Set column definition initialisation properties.
         "columnDefs": [
         {
             "targets": [ -1 ], //last column
             "orderable": false, //set not orderable
         },
         ],
     });
    //  $('#sc_table_filter').remove();
  }
  function show_inbox(){
    $('#action').show();
    $('#modal_table').modal('show');
    table = null;
    table = $('#sc_table').DataTable({
         "processing": true, //Feature control the processing indicator.
         "serverSide": true, //Feature control DataTables' server-side processing mode.
         "bDestroy": true,
         "order": [], //Initial no order.

         // Load data for the table's content from an Ajax source
         "ajax": {
             "url": "<?php echo base_url('Teknisi/ajax_get_inbox')?>",
             "type": "POST",
             "data": function(data){
               data.type='inbox';
             }
         },

         //Set column definition initialisation properties.
         "columnDefs": [
         {
             "targets": [ -1 ], //last column
             "orderable": false, //set not orderable
         },
         ],
     });
    //  $('#sc_table_filter').remove();
  }
  function show_summary(){
    $('#modal_summary').modal('show');
    table = null;
    table = $('#tb_summary').DataTable({
         "processing": true, //Feature control the processing indicator.
         "serverSide": true, //Feature control DataTables' server-side processing mode.
         "bDestroy": true,
         "bFilter": false,
         "bSort": false,
         "bPaginate": false,
         "order": [], //Initial no order.

         // Load data for the table's content from an Ajax source
         "ajax": {
             "url": "<?php echo base_url('Teknisi/ajax_get_summary')?>",
             "type": "POST",
             "data": function(data){
               data.sto='ALL';
               data.type='SUMMARY';
             }
         },

         //Set column definition initialisation properties.
         "columnDefs": [
         {
             "targets": [ -1 ], //last column
             "orderable": false, //set not orderable
         },
         ],
     });
     $('#tb_summary_paginate').remove();
  }
  function show_data_table_user(type){
    if (type=='TEKNISI') {
      $('#modal_teknisi_today').modal('show');
      table = $('#tb_teknisi').DataTable({
           "processing": true, //Feature control the processing indicator.
           "serverSide": true, //Feature control DataTables' server-side processing mode.
           "bDestroy": true,
           "order": [], //Initial no order.

           // Load data for the table's content from an Ajax source
           "ajax": {
               "url": "<?php echo base_url('Access/ajax_user')?>",
               "type": "POST",
               "data": function(data){
                 data.type=type;
               }
           },

           //Set column definition initialisation properties.
           "columnDefs": [
           {
               "targets": [ -1 ], //last column
               "orderable": false, //set not orderable
           },
           ],
       });
    }
    else {
      $('#modal_manage_user').modal('show');
      table = $('#tb_user').DataTable({
        "processing": true, //Feature control the processing indicator.
        "serverSide": true, //Feature control DataTables' server-side processing mode.
        "bDestroy": true,
        "order": [], //Initial no order.

        // Load data for the table's content from an Ajax source
        "ajax": {
          "url": "<?php echo base_url('Access/ajax_user')?>",
          "type": "POST",
          "data": function(data){
            data.type=type;
          }
        },

        //Set column definition initialisation properties.
        "columnDefs": [
          {
            "targets": [ -1 ], //last column
            "orderable": false, //set not orderable
          },
        ],
      });
      //  $('#sc_table_filter').remove();
    }
  }
  function search_nearest_cluster(lat,lng){
    if (toogle_show_location==1) {
      setMapOnAll(null);
    }
    toastr.info('Harap tunggu, proses sedang berjalan');
    num_ready=0;num_accom=0;
    $.ajax({
      url: '<?php echo base_url("Teknisi/ajax_get_nearest"); ?>',
      type: 'POST',
      dataType: 'JSON',
      data: {
        lat: lat,
        lng: lng
      },
      success:function(data){
        is_finished=false;
        get_odp(parseFloat(data.LATITUDE),parseFloat(data.LONGITUDE));
        create_circle(data);
        current=data;
      },
      error:function(){
        alert('error get nearest cluster')
      }
    });
    toogle_show_location=1;
  }
  function do_sc(no_sc){
    $.ajax({
      url: '<?php echo base_url('Teknisi/ajax_get_sc_by_no') ?>',
      type: 'POST',
      dataType: 'JSON',
      data: {no_sc: no_sc},
      success:function(data){
        $('#NO_SC').val(data[0].NO_SC);
        $('#header_do_sc').html('Kerjakan SC no '+data[0].NO_SC);
        $('#modal_table').modal('hide');
        $('#modal_do_sc').modal('show');
      },
      error:function(){
        alert('error do sc');
      }
    });
  }
  function assign_teknisi(no_sc){
    $('.option_teknisi').remove();
    $.ajax({
      url: '<?php echo base_url('Teknisi/ajax_get_sc_by_no') ?>',
      type: 'POST',
      dataType: 'JSON',
      data: {no_sc: no_sc},
      success:function(data){
        current_sc = data[0];
        $('#NO_SC_TEKNISI').val(data[0].NO_SC);
        $.ajax({
          url: '<?php echo base_url('Teknisi/ajax_get_avail_teknisi') ?>',
          type: 'POST',
          dataType: 'JSON',
          data: {
            STO: current.STO,
            CLUSTER: current.NAME
          },
          success:function(data){
            if (data.length==0) {
              toastr.info('Tidak ada teknisi yang iddle di cluster ini.');
              toastr.info('Pencarian teknisi terdekat sedang berlangsung, harap tunggu.');
              $.ajax({
                url: '<?php echo base_url('Teknisi/ajax_get_nearest_teknisi') ?>',
                type: 'POST',
                dataType: 'JSON',
                data: {
                  lat: current.LATITUDE,
                  lng: current.LONGITUDE
                },
                success:function(data){
                  console.log(data);
                  for (var i = 0; i < data[0].length; i++) {
                    $('#select_teknisi').append("<option class='option_teknisi' value='"+data[0][i].USERNAME+"'>"+data[0][i].NAME+"</option>");
                    $('#select_teknisi').material_select();
                  }
                }
              });
            }
            else {
              for (var i = 0; i < data.length; i++) {
                $('#select_teknisi').append("<option class='option_teknisi' value='"+data[i].USERNAME+"'>"+data[i].NAME+"</option>");
                $('#select_teknisi').material_select();
              }
            }
            $('#modal_table').modal('hide');
            $('#modal_assign_teknisi').modal('show');
          },
          error:function() {

          }
        });
      },
      error:function(){
        alert('error assign teknisi');
      }
    });
  }
  function calcel_assign_teknisi(no_sc){
    if(confirm('Yakin ingin cancel?')){
      $.ajax({
        url: '<?php echo base_url('Teknisi/ajax_cancel_assign_teknisi') ?>',
        type: 'POST',
        dataType: 'JSON',
        data: {no_sc: no_sc},
        success:function(){
          $('#modal_table').modal('hide');
          if (toogle_show_location==1) {
            setMapOnAll(null);
          }
          is_finished=false;
          get_odp(parseFloat(current.LATITUDE),parseFloat(current.LONGITUDE));
          create_circle(current);
          toastr.success('Berhasil melakukan cancel assign teknisi');
        },
        error:function() {
          alert('error cancel assign teknisi');
        }
      });
    }
  }
  </script>
</body>
</html>
