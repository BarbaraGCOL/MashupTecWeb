<?php
session_start(); 
?>
<!doctype html>
<html xmlns:fb="http://www.facebook.com/2008/fbml">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <script src="http://maps.google.com/maps/api/js?sensor=true"></script>
    <script type="text/javascript" src="script.js"></script>
    <script src="https://maps.googleapis.com/maps/api/js?v=3.exp&signed_in=true"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Dashboard">
    <meta name="keyword" content="Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">

    <title>Gerenciador de Localidades</title>

    <!-- Bootstrap core CSS -->
    <link href="assets/css/bootstrap.css" rel="stylesheet">
    <!--external css-->
    <link href="assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
        
    <!-- Custom styles for this template -->
    <link href="assets/css/style.css" rel="stylesheet">
    <link href="assets/css/style-responsive.css" rel="stylesheet">

    <link href="assets/css/bootstrap.css" rel="stylesheet">
    <!--external css-->
    <link href="assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
    <link rel="stylesheet" type="text/css" href="assets/css/zabuto_calendar.css">
    <link rel="stylesheet" type="text/css" href="assets/js/gritter/css/jquery.gritter.css" />
    <link rel="stylesheet" type="text/css" href="assets/lineicons/style.css">    
    
    <!-- Custom styles for this template -->
    <link href="assets/css/style.css" rel="stylesheet">
    <link href="assets/css/style-responsive.css" rel="stylesheet">

    <script src="assets/js/chart-master/Chart.js"></script>

    <style type="text/css">
      #map {
        width: 750px;
        height: 380px;
      }
      #address{
        width: 650px;
      }
    </style>
  </head>
  <body onload="geolocateUser(); preencheTabela();">
    <?php if ($_SESSION['FBID']): ?>
      <header class="header black-bg">
        <div class="sidebar-toggle-box">
          <div class="fa fa-bars tooltips" data-placement="right" data-original-title="Toggle Navigation"></div>
        </div>
        <a href="index.html" class="logo"><b>Gerenciador de Localidades</b></a>
          <div class="top-menu">
            <ul class="nav pull-right top-menu">
              <li><a class="logout" href="logout.php">Sair</a></li>
            </ul>
          </div>
      </header>
      <aside>
        <div id="sidebar"  class="nav-collapse ">
          <ul class="sidebar-menu" id="nav-accordion">
            <h5 class="centered">Bem vindo(a)!</h5>
            <p class="centered"><img src="https://graph.facebook.com/<?php echo $_SESSION['FBID']; ?>/picture"></p>
            <h5 class="centered"><?php echo $_SESSION['FULLNAME']; ?></h5>
            <li class="nav-header">Facebook ID</li>
            <li><?php echo  $_SESSION['FBID']; ?></li>
          </ul>
        </div>
      </aside>
      <section id="main-content">
        <section class="wrapper">
          <div class="row mt">
            <div class="col-lg-12">
              <div class="form-panel">
                <h4 class="mb"><i class="fa fa-angle-right"></i> Localidade</h4>
                <form name="formularioEndereco" class="form-inline" role="form" method="post" action='salvarLocalidade.php'>
                  <div class="form-group">
                    Endereço:<input type="text" class="form-control" id="address" name="address" placeholder="Digite o Endereço">
                  </div>
                  <input type="button" value="Buscar" onClick="addMarker();" class="btn btn-theme">
                  <div class="form-group">
                    Nome:<input type="text" class="form-control" id="nome" name="nome" placeholder="Nome da Localidade">
                  </div>
                  <input id="local" name="local" type="hidden" size="30"> 
                  <input id="latlong" name="latlong" type="hidden" size="30"> 
                  <button name="add" type="submit" class="btn btn-theme">Salvar Endereço</button>
                </form>
              </div>
            </div>
          </div>

          <div class="row">
            <div class="row mt">
              <div class="col-lg-12">
                <section id="main-content">
                  <section class="wrapper">
                    <div class="row">
                      <div id="map"></div>
                    </div>
                  </section>
                </section>
              </div>
            </div>  
          </div> 
        </section>
        <div class="form-panel">
          <form id='f1'></form>
          <div id="tabelaCadastro"></div>       
          <p id="error"></p>
        </div>
      </section>
    <?php else: ?>  
      <div class="container">
        <form class="form-login" action="fbconfig.php">
          <h2 class="form-login-heading">Entre</h2>
          <div class="login-wrap">
            <p>VocÊ pode logar com sua conta do Facebook!</p>
            <button class="btn btn-facebook" type="submit" onclick="fbconfig.php"><i class="fa fa-facebook"></i> Facebook</button>
          </div>
        </form>
      </div>
    <?php endif ?>
  </body>
</html>
