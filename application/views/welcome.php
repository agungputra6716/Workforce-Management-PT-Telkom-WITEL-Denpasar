  <!DOCTYPE html>
<html lang="en">
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

    <!-- Template styles -->
    <style rel="stylesheet">
        /* TEMPLATE STYLES */

        html,
        body,
        .view {
            height: 90.6%;
            width: 100%;
        }
        /* Navigation*/

        footer.page-footer {
            background-color: #1C2331;
            margin-top: -1px;
        }

        .view {
            -webkit-background-size: cover;
            -moz-background-size: cover;
            -o-background-size: cover;
            background-size: cover;
        }


    </style>
</head>
<body class="fixed-sn light-blue-skin">

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

<!--/Social-->
<!--Search Form-->



<!--/.Search Form-->
<!-- Side navigation links -->
<li>
  <ul class="collapsible collapsible-accordion">

    <li><a class="social collapsible-header waves-effect arrow-r"><i class="fa fa-user mr-1"></i><?php echo $this->session->userdata('nama') ?><i class="fa fa-angle-down rotate-icon"></i></a>
      <div class="collapsible-body">
        <ul>
          <li><a class="collapsible-header waves-effect arrow-r" href="<?php echo base_url('User/logout') ?>"><i class="fa fa-sign-out ml-1"></i> Log Out</a>
          </li>
        </ul>
      </div>
    </li>
    <li><a class="waves-effect arrow-r" href="<?php echo base_url('User'); ?>"><i class="fa fa-user mr-1"></i> User</a>
    </li>
    <li><a class="collapsible-header waves-effect arrow-r"><i class="fa fa-edit"></i> Aplikasi<i class="fa fa-angle-down rotate-icon"></i></a>
      <div class="collapsible-body">
        <ul>
          <li><a href="#" id='click_on_map' class="waves-effect"><i class="fa fa-crosshairs" id="token_click_on_map"></i> Click On Map</a></li>
          <li><a href="#" id='show_location' class="waves-effect"><i class="fa fa-circle-o" id="token_show_location"></i> Show All Locations</a></li>
        </ul>
      </div>
    </li>
    <li><a class="collapsible-header waves-effect arrow-r"><i class="fa fa-eye"></i> About<i class="fa fa-angle-down rotate-icon"></i></a>
      <div class="collapsible-body">
        <ul>
          <li><a href="#" class="waves-effect">Introduction</a>
          </li>
        </ul>
      </div>
    </li>
    <li><a class="collapsible-header waves-effect arrow-r" href="<?php echo base_url('User/logout') ?>"><i class="fa fa-sign-out ml-1"></i> Log Out</a>
    </li>
  </ul>
</li>
<!--/. Side navigation links -->
<div class="sidenav-bg mask-strong"></div>
</ul>
<!--/. Sidebar navigation -->

<!--Navbar-->
<nav class="navbar narvar-expanded-lg navbar-dark">
  <a href="#" data-activates="slide-out" class="button-collapse"><i class="fa fa-bars white-text"></i><strong class="white-text">  WMF MAP</strong></a>
</nav>

<div id="googleMap" style="width:100%;height:100%;"></div>
<section>
  <div class="fixed-action-btn" style="bottom: 80px; right: 2px;">
    <a class="btn-floating btn-lg red waves-effect waves-light">
      <i class="fa fa-pencil"></i>
    </a>
    <ul>
      <li><a class="btn-floating red waves-effect waves-light" style="transform: scaleY(0.0001) scaleX(0.0001) translateY(40px) translateX(0px); opacity: 0;"><i class="fa fa-star"></i></a></li>
      <li><a class="btn-floating yellow darken-1 waves-effect waves-light" style="transform: scaleY(0.4) scaleX(0.4) translateY(40px) translateX(0px); opacity: 0;"><i class="fa fa-user"></i></a></li>
      <li><a class="btn-floating green waves-effect waves-light" style="transform: scaleY(0.4) scaleX(0.4) translateY(40px) translateX(0px); opacity: 0;"><i class="fa fa-envelope"></i></a></li>
      <li><a class="btn-floating blue waves-effect waves-light" style="transform: scaleY(0.4) scaleX(0.4) translateY(40px) translateX(0px); opacity: 0;"><i class="fa fa-shopping-cart"></i></a></li>
    </ul>
  </div>
</section>

<div class="modal fade" id="modal_add_location" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog cascading-modal" role="document">
        <!--Content-->
      <div class="modal-content">
          <!--Header-->
          <div class="modal-header light-blue darken-3 white-text">
            <h4 class="title"><i class="fa fa-pencil"></i> Tambah Lokasi</h4>
            <button type="button" class="close waves-effect waves-light" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
            <!--Body-->
          <form class="" id="frm_add_location" method="post">
            <div class="modal-body mb-0">
              <div class="md-form form-sm">
                <input type="text" id="add_nama" name="add_nama" class="form-control">
                <label for="add_nama">Nama</label>
              </div>
              <div class="md-form form-sm">
                <input type="text" id="add_lat" name="add_lat" class="form-control" readonly value=" ">
                <label for="add_lat">Latitude</label>
              </div>
              <div class="md-form form-sm">
                <input type="text" id="add_long" name="add_long" class="form-control" readonly value=" ">
                <label for="add_long">Longitude</label>
              </div>
              <div class="md-form form-sm">
                <textarea type="text" id="add_keterangan" name="add_keterangan" class="md-textarea mb-0"> </textarea>
                <label for="add_keterangan">Keterangan</label>
              </div>
            </form>
            <div class="text-center mt-1-half">
                <button id="submit_add_location" class="btn btn-info mb-2">Send <i class="fa fa-send ml-1"></i></button>
            </div>
            </div>
        </div>
        <!--/.Content-->
    </div>
</div>
<footer class="page-footer center-on-small-only fluid-bottom">

  <!--Footer Links-->

  <!--Copyright-->
  <div class="footer-copyright">
    <div class="container-static">
      © 2017 Copyright: Telkom WITEL Denpasar
    </div>
  </div>
  <!--/.Copyright-->
</footer>

<!-- SCRIPTS -->

<!-- JQuery -->
<script type="text/javascript" src="<?php echo base_url('assets/js/jquery-3.2.1.min.js') ?>"></script>

<!-- Bootstrap tooltips -->
<script type="text/javascript" src="<?php echo base_url('assets/js/tether.min.js') ?>"></script>

<!-- Bootstrap core JavaScript -->
<script type="text/javascript" src="<?php echo base_url('assets/js/bootstrap.min.js') ?>"></script>

<!-- MDB core JavaScript -->
<script type="text/javascript" src="<?php echo base_url('assets/js/compiled.min.js') ?>"></script>
<!-- Google Maps API -->
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBb4ThyMb8dBaJ6-g_NN9GMFk1sxupL-Uw&callback=myMap" async defer ></script>

<script type="text/javascript">
  var map;
  var marker_counter=0;
  var array_marker = [];
  var toogle_show_location=0;
  var prev_iw=false;
  var iw_content;

  $(document).ready(function(){
    $(".button-collapse").sideNav();

    $('#click_on_map').click(function(){
      $('#click_on_map').addClass('active');
      $('#slide-out').sideNav('hide');
      click_on_map();
    });
  });

  $('#show_location').click(function(e)
  {
    e.preventDefault();
    if(toogle_show_location==0){
      $.ajax({
        url: '<?php echo base_url('Maps/get_location') ?>',
        type: 'POST',
        dataType: 'JSON',
        data:{
          alpro:'ODC'
        },
        success: function(data)
        {
          console.log(data);
          toogle_show_location=1;
          $('#token_show_location').removeClass('fa-circle-o').addClass('fa-circle');
          for (var i = 0; i < data.length; i++) {
            var sto = data[i].STO;
            var nama = data[i].NAME;
            var alamat = data[i].ALAMAT;
            var lat = data[i].LATITUDE;
            var lng = data[i].LONGITUDE;
            var location = new google.maps.LatLng(lat,lng);

            var marker= new google.maps.Marker({
              position:location,
              map:map,
            });
            array_marker.push(marker);

            marker.infowindow = new google.maps.InfoWindow({
              content:set_content(data[i]),
              maxWidth:400,
            });
            click_marker(map,marker);
          }
        }
      });
    }
    else {
      setMapOnAll(null);
      array_marker = [];
      $('#token_show_location').removeClass('fa-circle').addClass('fa-circle-o');
      toogle_show_location=0;
    }
  });
  function triger_edit_location() {
    $('#keterangan').attr('readonly', false);
    $('#lat').attr('readonly', false);
    $('#long').attr('readonly', false);
    $('.keterangan').addClass('text-primary');
    $('#save').attr('disabled', false);
    $('#keterangan').focus();
  }

  function edit_location(){
    $.ajax({
      url: '<?php echo base_url('Maps/edit_location') ?>',
      type: 'POST',
      dataType: 'JSON',
      data: $('#frm_content').serialize(),
      success: function (data)
      {
        if (data) {
          toastr["success"]("Data berhasil diedit!");
        }
        else {
          toastr["error"]("Data gagal diedit!");
        }
        $('#keterangan').attr('readonly', true);
        $('#lat').attr('readonly', true);
        $('#long').attr('readonly', true);
        $('.keterangan').removeClass('text-primary');
        $('#save').attr('disabled', true);
      },
      error:function(jqXHR,textStatus,errorThrown)
      {
        toastr["error"]("Data gagal diedit!");
      }
    });
  }

  function set_content(data){
    iw_content='<form  id="frm_content">'+
                  '<div class="container">'+
                    '<div class="row">'+
                      '<div class="col col-lg-6">'+
                        '<span class="keterangan">STO</span>'+
                        '<input type="text" id="sto" name="sto" value="'+data.STO+'" class="form-control" readonly>'+
                      '</div>'+
                      '<div class="col col-lg-6">'+
                        '<span class="keterangan">Nama ODC</span>'+
                        '<input type="text" id="odp" name="odp" value="'+data.NAME+'" class="form-control" readonly>'+
                      '</div>'+
                    '</div>'+
                    '<div class="row">'+
                      '<div class="col col-lg-12">'+
                        '<span class="keterangan">Alamat</span>'+
                        '<input type="text" id="alamat" name="alamat" value="'+data.ALAMAT+'" class="form-control" readonly>'+
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
                '<div class="">'+
                  '<button onclick="edit_location()" name="save" id="save" class="btn btn-default btn-sm cyan text-white" disabled>Save</button>'+
                  '<button onclick="triger_edit_location()" type="button" name="edit" id="edit" class="btn btn-success btn-sm text-white">Edit</button>'+
                  '<button onclick="delete_location()" type="button" name="delete" id="delete" class="btn btn-danger btn-sm text-white">Delete</button>'+
                '</div>';
      return iw_content;
    }

    function click_on_map(){
      map.setOptions({draggableCursor:'crosshair'});
      var listener = google.maps.event.addListener(map,'click',function(event){
        var lat=event.latLng.lat();
        var lng=event.latLng.lng();
        var nama;
        var data = [];
        data.latitude=lat;
        data.longitude=lng;

        $("#add_lat").val(lat);
        $("#add_long").val(lng);
        $("#modal_add_location").modal('show');
        $("#submit_add_location").click(function(e){
          e.preventDefault();
          $.ajax({
            url: '<?php echo base_url('Maps/add_location') ?>',
            type: 'POST',
            dataType: 'JSON',
            data: $('#frm_add_location').serialize(),
            success:function(data){
              if (data) {
                toastr["success"]("Data berhasil ditambah!");
                $("#add_nama").val(" ");
                $("#add_lat").val(" ");
                $("#add_long").val(" ");
                $("#add_keterangan").val(" ");
                $("#modal_add_location").modal('hide');
              }
              else {
                toastr["error"]("Data gagal ditambah!");
              }
              $('#add_keterangan').attr('readonly', true);
              $('#add_lat').attr('readonly', true);
              $('#add_long').attr('readonly', true);
            },
            error:function(jqXHR,textStatus,errorThrown){
              toastr["error"]("Data gagal ditambah! Gunakan nama lain!");
            }
          });
        });
        google.maps.event.removeListener(listener);
        map.setOptions({ draggableCursor: 'url(http://maps.google.com/mapfiles/openhand.cur), move' });
        $('#click_on_map').removeClass('active');
      });

    }

    function click_marker(map,marker){
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
          prev_iw= marker.infowindow;
          marker.infowindow.open(map,marker);
        }
      });

    }

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

    function setMapOnAll(map) {
      for (var i = 0; i < array_marker.length; i++) {
        array_marker[i].setMap(map);
      }
    }
  </script>
</body>
</html>
