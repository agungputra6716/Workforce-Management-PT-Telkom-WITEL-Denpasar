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
    <link href="<?php echo base_url('assets/css/jquery.dataTables.min.css') ?>" rel="stylesheet">
    <link href="<?php echo base_url('assets/css/dataTables.bootstrap.min.css') ?>" rel="stylesheet">
    <link href="<?php echo base_url('assets/css/style.css') ?>" rel="stylesheet">

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
        <ul>
          <li><a class="collapsible-header waves-effect arrow-r" href="<?php echo base_url('Access/LogOut') ?>"><i class="fa fa-sign-out ml-1"></i> Log Out</a>
          </li>
        </ul>
      </div>
    </li>
    <li id="manage_user"><a class="waves-effect arrow-r" href="<?php echo base_url('User'); ?>"><i class="fa fa-user mr-1"></i> Manage User</a>
    </li>
    <li><a class="collapsible-header waves-effect arrow-r"><i class="fa fa-edit"></i> Aplikasi<i class="fa fa-angle-down rotate-icon"></i></a>
      <div class="collapsible-body">
        <ul>
          <li><a href="#" id='show_my_cluster' class="waves-effect"><i class="fa fa-circle-o" id="token_show_my_cluster"></i> Show My Cluster</a></li>
          <li><a href="#" id='search_cluster' class="waves-effect"><i class="fa fa-search" id="token_show_my_cluster"></i> Search Cluster</a></li>
          <li><a href="#" id='show_nearest_cluster' class="waves-effect"><i class="fa fa-circle-o" id="token_show_nearest_cluster"></i> Show Nearest Cluster</a></li>
          <li><a href="#" id='show_most_pi_cluster' class="waves-effect"><i class="fa fa-circle-o" id="token_show_most_pi_cluster"></i> Show Most PI Cluster</a></li>
          <li><a href="#" id='show_sc_table' class="waves-effect"><i class="fa fa-table" id="token_show_nearest_cluster"></i> Show SC Table</a></li>
          <!-- <li><a href="#" id='show_location' class="waves-effect"><i class="fa fa-circle-o" id="token_show_location"></i> Show All Locations</a></li> -->
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
                    <div class="col col-lg-1 col-md-1 col-sm-1 col-xsm-1">
                      <i class="fa fa-home prefix"></i>
                    </div>
                    <div class="col col-lg-11 col-md-11 col-sm-11 col-xsm-11">
                      <select class="mdb-select colorful-select dropdown-danger" name="select_sto" id="select_sto">
                        <option value="">Select STO</option>
                      </select>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col col-lg-1 col-md-1 col-sm-1 col-xsm-1">
                      <i class="fa fa-flag"></i>
                    </div>
                    <div class="col col-lg-11 col-md-11 col-sm-11 col-xsm-11">
                      <select class="mdb-select colorful-select dropdown-danger" name="select_odc" id="select_odc">
                        <option value="">Select ODC</option>
                      </select>
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

<!-- Central Modal Medium Success -->
<div class="modal fade" style="height:700px;"id="modal_sc_table" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-notify modal-danger modal-fluid" role="document">
    <!--Content-->
    <div class="modal-content">
      <!--Header-->
      <div class="modal-header">
        <p class="heading lead">SC Table</p>

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
              </tr>
          </thead>
          <tbody>

          </tbody>
      </table>
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
  var num_normal=0;
  var num_pi=0;
  var username="<?php echo $this->session->userdata('username') ?>";

  $(document).ready(function(){
    if ('<?php echo $this->session->userdata('role') ?>'=='TEKNISI') {
      $('#show_location').remove();
      $('#manage_user').remove();
      $('#search_cluster').remove();
      $('#show_sc_table').remove();
    }
    else if('<?php echo $this->session->userdata('role') ?>'=='ADMIN'){
      $('#show_my_cluster').remove();
      $('#show_nearest_cluster').remove();
      $('#show_my_cluster').remove();
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
        url: '<?php echo base_url('teknisi/ajax_get_odc') ?>',
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
      $.ajax({
        url: '<?php echo base_url('teknisi/ajax_get_teknisi') ?>',
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
      array_marker = [];
      toogle_show_location=0;
      $('#token_show_my_cluster').removeClass('fa-circle').addClass('fa-circle-o');
    }
  });
  $('#show_location').click(function(e){
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
              content:set_content(data[i],'ODP'),
              maxWidth:400,
            });
            click_overlay(map,marker);
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
  $('#search_cluster').click(function(e) {
    e.preventDefault();
    $('#slide-out').sideNav('hide');
    num_normal=0;
    num_pi=0;
    $.ajax({
      url: '<?php echo base_url('teknisi/ajax_get_sto') ?>',
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
  $('#btn_submit_search_cluster').click(function(e) {
    e.preventDefault();
    var sto=$('#select_sto').val();
    var odc=$('#select_odc').val();
    if (toogle_show_location==1){
      setMapOnAll(null);
      array_marker = [];
      toogle_show_location=0;
    }
    $.ajax({
      url: '<?php echo base_url('teknisi/ajax_get_odc') ?>',
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
      },
      error:function(data){
        alert('error get cluster');
      }
    });
  });
  $('#show_sc_table').click(function(e){
    e.preventDefault();
    show_data_table_sc('all');
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
      url: '<?php echo base_url('teknisi/ajax_get_odc') ?>',
      type: 'POST',
      dataType: 'JSON',
      data: {
        sto:data.STO,
        name:data.CLUSTER
      },
      success:function(data){
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
      url: '<?php echo base_url('teknisi/ajax_get_odp') ?>',
      type: 'POST',
      dataType: 'JSON',
      data:{
        lat:lat,
        lng:lng
      },
      success:function(data){
        toogle_show_location=1;
        array_sc = [];
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
          if (data['sc'][i].STATUS_RESUME=='Process OSS (Provision Issued)') num_pi++;
          else num_normal++;
          array_sc.push(data['sc'][i].ALPRO);
        }
        console.log(array_sc);
        is_finished=true;
      },
      error:function(){
        alert('error LELE');
      }
    });

  }
  function get_sc(pd_name){
    $.ajax({
      url: '<?php echo base_url('teknisi/ajax_get_sc') ?>',
      type: 'POST',
      dataType: 'JSON',
      data:{
        pd_name:pd_name
      },
      success:function(data){
        for (var i = 0; i < data.length; i++) {
          if (data[i].STATUS_RESUME=='Process OSS (Provision Issued)') num_pi++;
          else num_normal++;
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
                '<span class="keterangan">ODP Name</span>'+
                '<input type="text" id="odp_name" name="odp_name" value="'+data.PD_NAME+'" class="form-control" readonly>'+
              '</div>'+
            '</div>'+
            '<div class="row">'+
              '<div class="col col-lg-6">'+
                '<span class="keterangan">Status</span>'+
                '<input type="text" id="alamat" name="alamat" value="'+data.STATUS_ODP+'" class="form-control" readonly>'+
              '</div>'+
              '<div class="col col-lg-6">'+
                '<span class="keterangan">Last Update Status</span>'+
                '<input type="date" id="alamat" name="alamat" value="'+data.UPDATE_DATE+'" class="form-control" readonly>'+
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
                '<span class="keterangan">Jumlah PS</span>'+
                '<input type="text" id="num_normal" name="num_normal" value="'+num_normal+'" class="form-control" readonly>'+
              '</div>'+
              '<div class="col col-lg-6">'+
                '<span class="keterangan">Jumlah PI</span>'+
                '<input type="text" onclick="show_data_table_sc('+null+')" id="num_pi" name="num_pi" value="'+num_pi+'" class="form-control" readonly>'+
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
        '<button type="button" class="btn btn-success btn-sm"><i class="fa fa-rss"></i>  Cari Cluster Terdekat</button>';

    }
      return iw_content;
    }
  function setMapOnAll(map) {
    for (var i = 0; i < array_marker.length; i++) {
      array_marker[i].setMap(map);
    }
  }
  function create_circle(data){
    if (is_finished) {
      if ((num_pi/(num_pi+num_normal))<=0.5) {
        var warna='#007E33'
      }
      else if ((num_pi/(num_pi+num_normal))<=0.75){
        var warna='#FF8800'
      }
      else if ((num_pi/(num_pi+num_normal))<=1){
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
        if (type=="marker") {
          marker.infowindow.setPosition(event.click);
        }
        else if (type=="circle") {
          marker.infowindow.setPosition(marker.getCenter());
        }
        prev_iw= marker.infowindow;
        marker.infowindow.open(map,marker);
      }
    });
  }
  function show_data_table_sc(type){
    $('#modal_sc_table').modal('show');
      table = $('#sc_table').DataTable({
           "processing": true, //Feature control the processing indicator.
           "serverSide": true, //Feature control DataTables' server-side processing mode.
           "bDestroy": true,
           "order": [], //Initial no order.

           // Load data for the table's content from an Ajax source
           "ajax": {
               "url": "<?php echo base_url('teknisi/ajax_list')?>",
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
  </script>
</body>
</html>
