<?php
$con = new mysqli('localhost', 'root', '', 'pos');
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>POS |</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="fonts/css/font-awesome.min.css" rel="stylesheet">
    <link href="css/animate.min.css" rel="stylesheet">
    <!-- Custom styling plus plugins -->
    <link rel="stylesheet" type="text/css" href="css/maps/jquery-jvectormap-2.0.3.css" />
    <link href="css/icheck/flat/green.css" rel="stylesheet" />
    <link href="css/floatexamples.css" rel="stylesheet" type="text/css" />
    <link href="css/custom.css" rel="stylesheet">
    <link href="css/icheck/flat/green.css" rel="stylesheet">
    <link href="css/datatables/tools/css/dataTables.tableTools.css" rel="stylesheet">
     
    

    <!--[if lt IE 9]>
<script src="../assets/js/ie8-responsive-file-warning.js"></script>
<![endif]-->
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
<![endif]-->
  </head>
  </head>
<body class="nav-md">
  <div class="container body">
    <div class="main_container">
      <div class="col-md-3 left_col">
        <div class="left_col scroll-view">
          <div class="navbar nav_title" style="border: 0;">
            <a href="index.html" class="site_title">
              <img id="logo" class="img-responsive" src="images/logofinal.png" >
            </a>
          </div>
          <div class="clearfix">
          </div>
          <!-- menu prile quick info -->
          <div class="profile">
            <div class="profile_pic">
              <img src="images/img.jpg" alt="..." class="img-circle profile_img">
            </div>
            <div class="profile_info">
              <span>Bienvenu,
              </span>
              <h2>Hacini
              </h2>
            </div>
          </div>
          <!-- /menu prile quick info -->
          <br />
          <!-- sidebar menu -->
          <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
            <div class="menu_section">
              <h3>General</h3>
              <ul class="nav side-menu">
                <li>
                  <a>
                    <i class="fa fa-home">
                    </i> accueil 
                    <span class="fa fa-chevron-down">
                    </span>
                  </a>
                  <ul class="nav child_menu" style="display: none">
                    <li>
                      <a  data-toggle="modal" data-target="#tableau_de_bord_menu">Tableaux de Bord
                      </a>
                    </li>
                  </ul>
                </li>
             
                <li>
                  <a>
                    <i class="fa fa-bar-chart">
                    </i> Analyse Ventes   
                    <span class="fa fa-chevron-down">
                    </span>
                  </a>
                  <ul class="nav child_menu" style="display: none"> 
                    <li>
                      <a   data-toggle="modal" data-target="#chiffre_affaire">Chiffre d’affaires 
                      </a>
                    </li>
                    
                    <li><a  data-toggle="modal" data-target="#Meilleures_ventes_produits">Meilleurs produits vendus</a></li>
                    <li>
                      <a  data-toggle="modal" data-target="#Meilleures_produit_vendus_par_point_de_vente" >Meilleures produit vendus par PV
                      </a>
                    </li>
                    <li>
                      <a  data-toggle="modal" data-target="#Montants_TTC">Montants TTC
                      </a>
                    </li>
                    <li>
                      <a  data-toggle="modal" data-target="#nombre_de_ventes_menu">Nombre de produits vendus
                      </a>
                    </li>
                    <li>
                      <a  data-toggle="modal" data-target="#nombre_de_ventes_par_pv_menu">nombre de ventes par PV
                      </a>
                    </li>
                    <li>
                      <a  data-toggle="modal" id="ventes_promotionnelle_btn" >ventes promotionnelles
                      </a>
                    </li>
                  </ul>
                </li>
                   <li>
                  <a>
                    <i class="fa fa-pie-chart">
                    </i> Analyses Produits
                    <span class="fa fa-chevron-down">
                    </span>
                  </a>
                  <ul class="nav child_menu" style="display: none">
                    <li>
                      <a  id="repartition_des_produits">Répartition des produits
                      </a>
                    </li>
                    <li>
                      <a  id="quantite_produits_stock">Quantité produits dans le stock
                      </a>
                    </li>
                    <li>
                      <a  id="quantite_produits_pv">Quantités produits par pv
                      </a>
                    </li>
                    <li>
                      <a   data-toggle="modal" data-target="#produits_promotionnelles_menu" id="produits_promotionnelles_btn">Produits promotionnels 
                      </a>
                    </li>
                  </ul>
                </li>
                <li>
                  <a>
                    <i class="fa fa-male">
                    </i> Analyse Clients 
                    <span class="fa fa-chevron-down">
                    </span>
                  </a>
                  <ul class="nav child_menu" style="display: none">
                    <li>
                      <a  id="repartition_des_clients">Répartition des clients</a>
                    </li>
                    <li>
                      <a  id="repartition_des_clients_vente">Répartition par ventes
                      </a>
                    </li>
                    <li>
                      <a  id="abonnes">Abonnés
                      </a>
                    </li>
                      <li>
                      <a  id="methodes_commerciales"> méthodes commerciales
                      </a>
                    </li>
                  </ul>
                </li>
                <li>
                  <a>
                    <i class="fa fa-line-chart">
                    </i> Analyse commerciale
                    <span class="fa fa-chevron-down">
                    </span>
                  </a>
                  <ul class="nav child_menu" style="display: none">
                    <li>
                      <a id="details_ventes">Opérations Ventes
                      </a>
                    </li>
                     <li>
                      <a id="operations_caisse">Opérations Caisse 
                      </a>
                    </li>
                     <li>
                      <a id="suivi_chiffre_affaires" data-toggle="modal" data-target="#suivi_chiffre_affaires_menu">Suivi chiffre d'affaires 
                      </a>
                    </li>
                  </ul>
                </li>
                <li>
                  <a id="contactez_nous">
                    <i class="fa fa-envelope-o" >
                    </i> Contactez nous
                  </a>
              </ul>
            </div>
          </div>
          <!-- /sidebar menu -->
        </div>
      </div>
      <!-- top navigation -->
      <div class="top_nav">
        <div class="nav_menu">
          <nav class="" role="navigation">
            <div class="nav toggle">
              <a id="menu_toggle">
                <i class="fa fa-bars">
                </i>
              </a>
            </div>
            <ul class="nav navbar-nav navbar-right">
              <li class="">
                <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                  <img src="images/img.jpg" alt="">Hacini
                  <span class=" fa fa-angle-down">
                  </span>
                </a>
                <ul class="dropdown-menu dropdown-usermenu animated fadeInDown pull-right">
                  <li>
                    <a href="javascript:;">  Profile
                    </a>
                  </li>
                  <li>
                    <a href="javascript:;">
                      <span class="badge bg-red pull-right">50%
                      </span>
                      <span>Settings
                      </span>
                    </a>
                  </li>
                  <li>
                    <a href="javascript:;">Help
                    </a>
                  </li>
                  <li>
                    <a href="login.html">
                      <i class="fa fa-sign-out pull-right">
                      </i> Log Out
                    </a>
                  </li>
                </ul>
              </li>
              <li role="presentation" class="dropdown">
                <a href="javascript:;" class="dropdown-toggle info-number" data-toggle="dropdown" aria-expanded="false">
                  <i class="fa fa-envelope-o">
                  </i>
                  <span class="badge bg-green">6
                  </span>
                </a>
                <ul id="menu1" class="dropdown-menu list-unstyled msg_list animated fadeInDown" role="menu">
                  <li>
                    <a>
                      <span class="image">
                        <img src="images/img.jpg" alt="Profile Image" />
                      </span>
                      <span>
                        <span>John Smith
                        </span>
                        <span class="time">3 mins ago
                        </span>
                      </span>
                      <span class="message">
                        Film festivals used to be do-or-die moments for movie makers. They were where...
                      </span>
                    </a>
                  </li>
                  <li>
                    <a>
                      <span class="image">
                        <img src="images/img.jpg" alt="Profile Image" />
                      </span>
                      <span>
                        <span>John Smith
                        </span>
                        <span class="time">3 mins ago
                        </span>
                      </span>
                      <span class="message">
                        Film festivals used to be do-or-die moments for movie makers. They were where...
                      </span>
                    </a>
                  </li>
                  <li>
                    <a>
                      <span class="image">
                        <img src="images/img.jpg" alt="Profile Image" />
                      </span>
                      <span>
                        <span>John Smith
                        </span>
                        <span class="time">3 mins ago
                        </span>
                      </span>
                      <span class="message">
                        Film festivals used to be do-or-die moments for movie makers. They were where...
                      </span>
                    </a>
                  </li>
                  <li>
                    <a>
                      <span class="image">
                        <img src="images/img.jpg" alt="Profile Image" />
                      </span>
                      <span>
                        <span>John Smith
                        </span>
                        <span class="time">3 mins ago
                        </span>
                      </span>
                      <span class="message">
                        Film festivals used to be do-or-die moments for movie makers. They were where...
                      </span>
                    </a>
                  </li>
                  <li>
                    <div class="text-center">
                      <a href="inbox.html">
                        <strong>See All Alerts
                        </strong>
                        <i class="fa fa-angle-right">
                        </i>
                      </a>
                    </div>
                  </li>
                </ul>
              </li>
            </ul>
          </nav>
        </div>
      </div>
      <!-- /top navigation -->
      <!-- page content -->
      <div class="right_col " role="main">
        <div id="loadmask" class="col-xs-12">
        </div>
        <div id="resultat" class="row" ></div>
        
        
      </div>
      <!-- /page content -->

    </div>
  </div>
  <!--menu suivi_chiffre_affaires_menu-->
  <div class="modal fade" id="suivi_chiffre_affaires_menu" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;
            </span>
          </button>
          <h4 class="modal-title" id="myModalLabel">Options
          </h4>
        </div>
        <div class="modal-body">
          <!-------------------------------------------------------->
          <form data-toggle="validator" role="form">
            <div class="form-group row">
              <div class="col-xs-4">
                <label class="control-label">Année Debut
                </label>
                <div class="input-group date" id="dp3" data-date-format="yyyy-mm-dd">
                <span class="input-group-addon">20</span>
                  <select class="form-control" style="width: 63px" id="suivi_chiffre_affaires_date1">
                      <option>14</option>
                     <option>15</option>
                     <option>16</option>
                    
                </select>
                  
                </div>
              </div>
            </div>
          </form>
          <!-------------------------------------------------------->          
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-primary" data-dismiss="modal" id="suivi_chiffre_affaires_btn">ok
          </button>
        </div>
      </div>
    </div>
  </div>
  <!--Fin menu suivi_chiffre_affaires_menu-->
  <!--menu tableau_de_bord-->
  <div class="modal fade" id="tableau_de_bord_menu" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;
            </span>
          </button>
          <h4 class="modal-title" id="myModalLabel">Options
          </h4>
        </div>
        <div class="modal-body">
          <!-------------------------------------------------------->
          <form data-toggle="validator" role="form">
            <div class="form-group row">
              <div class="col-xs-6">
                <label class="control-label">Date Debut
                </label>
                <div class="input-group date" id="dp3" data-date-format="yyyy-mm-dd">
                  <input class="form-control datedf" type="text"  id="tableau_de_bord_date1" required="required">
                  <span class="input-group-addon">
                    <i class="glyphicon glyphicon-calendar">
                    </i>
                  </span>
                </div>
              </div>
              <div class="col-xs-6">
                <label class="control-label">Date FIN
                </label>
                <div class="input-group date" id="dp3" data-date-format="yyyy-mm-dd">
                  <input class="form-control datedf" type="text" readonly id="tableau_de_bord_date2" required="required">
                  <span class="input-group-addon">
                    <i class="glyphicon glyphicon-calendar">
                    </i>
                  </span>
                </div>
              </div>
            </div>
          </form>
          <!-------------------------------------------------------->          
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-primary" data-dismiss="modal" id="tableau_de_bord_btn">ok
          </button>
        </div>
      </div>
    </div>
  </div>
  <!--Fin menu tableau_de_bord-->
  <!--menu meilleur Ventes-->
  <div class="modal fade" id="Meilleures_ventes_produits" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;
            </span>
          </button>
          <h4 class="modal-title" id="myModalLabel">Options
          </h4>
        </div>
        <div class="modal-body">
          <!-------------------------------------------------------->
          <form data-toggle="validator" role="form">
            <div class="form-group row">
              <div class="col-xs-6">
                <label class="control-label">Date Debut
                </label>
                <div class="input-group date" id="dp3" data-date-format="yyyy-mm-dd">
                  <input class="form-control datedf" type="text"  id="Meilleures_ventes_produits_date1" required>
                  <span class="input-group-addon">
                    <i class="glyphicon glyphicon-calendar">
                    </i>
                  </span>
                </div>
              </div>
              <div class="col-xs-6">
                <label class="control-label">Date FIN
                </label>
                <div class="input-group date" id="dp3" data-date-format="yyyy-mm-dd">
                  <input class="form-control datedf" type="text"  id="Meilleures_ventes_produits_date2" required>
                  <span class="input-group-addon">
                    <i class="glyphicon glyphicon-calendar">
                    </i>
                  </span>
                </div>
              </div>
            </div>
          </form>
          <!-------------------------------------------------------->          
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-primary" data-dismiss="modal" id="Meilleures_ventes_produits_btn">ok
          </button>
        </div>
      </div>
    </div>
  </div>
  <!--fin menu meilleur Ventes-->
  <!--menu Meilleures [top 5,10,15] produit vendus par point de vente-->
  <div class="modal fade" id="Meilleures_produit_vendus_par_point_de_vente" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;
            </span>
          </button>
          <h4 class="modal-title" id="myModalLabel">Options
          </h4>
        </div>
        <div class="modal-body">
          <!-------------------------------------------------------->
          <form data-toggle="validator" role="form">
            <div class="form-group row">
              <div class="col-xs-12">
                <label class="control-label">point de vente
                </label>
                <select class="form-control" id="Meilleures_produit_vendus_par_point_de_vente_pv">
                  <?php
$lnpv = <<<SQL
Select
pointvente.NOMPOINTVENTE
From
pointvente
SQL;
$sth1 = $con->query($lnpv);
while ($r = $sth1->fetch_assoc()) {
?>
                  <option> 
                    <?php
echo $r['NOMPOINTVENTE'];
?>
                  </option>
                  <?php
}
?>
                </select>
              </div>
            </div>
            <div class="form-group row">
              <div class="col-xs-12">
                <label class="control-label" for="number">Nombre produits 
                </label>
                <input id="Meilleures_produit_vendus_par_point_de_vente_nbr" class="form-control" type="number" data-validate-minmax="10,100" required="required" name="number">
              </div>
            </div>
            <div class="form-group row">
              <div class="col-xs-6">
                <label class="control-label">Date Debut
                </label>
                <div class="input-group date" id="dp3" data-date-format="yyyy-mm-dd">
                  <input class="form-control datedf" type="text"  id="Meilleures_produit_vendus_par_point_de_vente_date1" required>
                  <span class="input-group-addon">
                    <i class="glyphicon glyphicon-calendar">
                    </i>
                  </span>
                </div>
              </div>
              <div class="col-xs-6">
                <label class="control-label">Date FIN
                </label>
                <div class="input-group date" id="dp3" data-date-format="yyyy-mm-dd">
                  <input class="form-control datedf" type="text"  id="Meilleures_produit_vendus_par_point_de_vente_date2" required>
                  <span class="input-group-addon">
                    <i class="glyphicon glyphicon-calendar">
                    </i>
                  </span>
                </div>
              </div>
            </div>
          </form>
          <!-------------------------------------------------------->          
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-primary" data-dismiss="modal" id="Meilleures_produit_vendus_par_point_de_vente_btn">ok
          </button>
        </div>
      </div>
    </div>
  </div>
  <!--fin menu Meilleures [top 5,10,15] produit vendus par point de vente-->
  <!--menu Montants_TTC-->
  <div class="modal fade" id="Montants_TTC" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;
            </span>
          </button>
          <h4 class="modal-title" id="myModalLabel">Options
          </h4>
        </div>
        <div class="modal-body">
          <!-------------------------------------------------------->
          <form data-toggle="validator" role="form">
            <div class="form-group row">
              <div class="col-xs-12">
                <div class="radio">
                  <label>
                    <input type="radio" name="optionsRadios" class="optionsRadios" value="TTC_global" checked>
                    Montants TTC Global
                  </label>
                </div>
                <div class="radio">
                  <label>
                    <input type="radio" name="optionsRadios" class="optionsRadios" value="TTC_pv">
                    Montants TTC par point de vente 
                  </label>
                </div>
              </div>
            </div>
            <div class="form-group row">
              <div class="col-xs-6">
                <label class="control-label">Date Debut
                </label>
                <div class="input-group date" id="dp3" data-date-format="yyyy-mm-dd">
                  <input class="form-control datedf" type="text"  id="Montants_TTC_date1" required>
                  <span class="input-group-addon">
                    <i class="glyphicon glyphicon-calendar">
                    </i>
                  </span>
                </div>
              </div>
              <div class="col-xs-6">
                <label class="control-label">Date FIN
                </label>
                <div class="input-group date" id="dp3" data-date-format="yyyy-mm-dd">
                  <input class="form-control datedf" type="text"  id="Montants_TTC_date2" required>
                  <span class="input-group-addon">
                    <i class="glyphicon glyphicon-calendar">
                    </i>
                  </span>
                </div>
              </div>
            </div>
          </form>
          <!-------------------------------------------------------->          
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-primary" data-dismiss="modal" id="Montants_TTC_btn">ok
          </button>
        </div>
      </div>
    </div>
  </div>
  <!--fin menu Montants_TTC-->
  <!--menu nombre_de_ventes-->
  <div class="modal fade" id="nombre_de_ventes_menu" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;
            </span>
          </button>
          <h4 class="modal-title" id="myModalLabel">Options
          </h4>
        </div>
        <div class="modal-body">
          <!-------------------------------------------------------->
          <form data-toggle="validator" role="form">
            <div class="form-group row">
              <div class="col-xs-12">
                <div class="radio">
                  <label>
                    <input type="radio" name="optionsRadios" class="nombre_de_ventes_o" value="nombre_Categories_vendus" checked>
                    Par categories
                  </label>
                </div>
                <div class="radio">
                  <label>
                    <input type="radio" name="optionsRadios" class="nombre_de_ventes_o" value="nombre_produits_vendus">
                    Par produit 
                  </label>
                </div>
              </div>
            </div>
            <div class="form-group row">
              <div class="col-xs-6">
                <label class="control-label">Date Debut
                </label>
                <div class="input-group date" id="dp3" data-date-format="yyyy-mm-dd">
                  <input class="form-control datedf" type="text"  id="nombre_de_ventes_date1" required>
                  <span class="input-group-addon">
                    <i class="glyphicon glyphicon-calendar">
                    </i>
                  </span>
                </div>
              </div>
              <div class="col-xs-6">
                <label class="control-label">Date FIN
                </label>
                <div class="input-group date" id="dp3" data-date-format="yyyy-mm-dd">
                  <input class="form-control datedf" type="text"  id="nombre_de_ventes_date2" required>
                  <span class="input-group-addon">
                    <i class="glyphicon glyphicon-calendar">
                    </i>
                  </span>
                </div>
              </div>
            </div>
          </form>
          <!-------------------------------------------------------->          
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-primary" data-dismiss="modal" id="nombre_de_ventes_btn">ok
          </button>
        </div>
      </div>
    </div>
  </div>
  <!--fin menu nombre_de_ventes-->
  <!--menu nombre_de_ventes_par_pv-->
  <div class="modal fade" id="nombre_de_ventes_par_pv_menu" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;
            </span>
          </button>
          <h4 class="modal-title" id="myModalLabel">Options
          </h4>
        </div>
        <div class="modal-body">
          <!-------------------------------------------------------->
          <form data-toggle="validator" role="form">
            <div class="form-group row">
              <div class="col-xs-6">
                <label class="control-label">Date Debut
                </label>
                <div class="input-group date" id="dp3" data-date-format="yyyy-mm-dd">
                  <input class="form-control datedf" type="text" readonly id="nombre_de_ventes_par_pv_date1" required>
                  <span class="input-group-addon">
                    <i class="glyphicon glyphicon-calendar">
                    </i>
                  </span>
                </div>
              </div>
              <div class="col-xs-6">
                <label class="control-label">Date FIN
                </label>
                <div class="input-group date" id="dp3" data-date-format="yyyy-mm-dd">
                  <input class="form-control datedf" type="text" readonly id="nombre_de_ventes_par_pv_date2" required>
                  <span class="input-group-addon">
                    <i class="glyphicon glyphicon-calendar">
                    </i>
                  </span>
                </div>
              </div>
            </div>
          </form>
          <!-------------------------------------------------------->          
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-primary" data-dismiss="modal" id="nombre_de_ventes_par_pv_btn">ok
          </button>
        </div>
      </div>
    </div>
  </div>
  <!--Fin menu nombre_de_ventes_par_pv-->
  <!--menu CA_global_par_moyen_de_paiement_menu-->
  <div class="modal fade" id="CA_global_par_moyen_de_paiement_menu" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;
            </span>
          </button>
          <h4 class="modal-title" id="myModalLabel">Options
          </h4>
        </div>
        <div class="modal-body">
          <!-------------------------------------------------------->
          <form data-toggle="validator" role="form">
            <div class="form-group row">
              <div class="col-xs-6">
                <label class="control-label">Date Debut
                </label>
                <div class="input-group date" id="dp3" data-date-format="yyyy-mm-dd">
                  <input class="form-control datedf" type="text" readonly id="CA_global_par_moyen_de_paiement_date1" required>
                  <span class="input-group-addon">
                    <i class="glyphicon glyphicon-calendar">
                    </i>
                  </span>
                </div>
              </div>
              <div class="col-xs-6">
                <label class="control-label">Date FIN
                </label>
                <div class="input-group date" id="dp3" data-date-format="yyyy-mm-dd">
                  <input class="form-control datedf" type="text" readonly id="CA_global_par_moyen_de_paiement_date2" required>
                  <span class="input-group-addon">
                    <i class="glyphicon glyphicon-calendar">
                    </i>
                  </span>
                </div>
              </div>
            </div>
          </form>
          <!-------------------------------------------------------->          
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-primary" data-dismiss="modal" id="CA_global_par_moyen_de_paiement_btn">ok
          </button>
        </div>
      </div>
    </div>
  </div>
  <!--Fin menu CA_global_par_moyen_de_paiement_menu-->
  <!--menu CA-->
  <div class="modal fade" id="chiffre_affaire" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;
            </span>
          </button>
          <h4 class="modal-title" id="myModalLabel">Options
          </h4>
        </div>
        <div class="modal-body">
          <!-------------------------------------------------------->
          <form data-toggle="validator" role="form">
            <div class="form-group row">
              <div class="col-xs-12">
                <div class="radio">
                  <label>
                    <input type="radio" name="optionsRadios" class="chiffre_affaire_o" value="CA_valeur_brute" checked>
                    Valeur brute
                  </label>
                </div>
                 <div class="radio">
                  <label>
                    <input type="radio" name="optionsRadios" class="chiffre_affaire_o" value="CA_pv">
                    Par point de vente   
                  </label>
                </div>
                <div class="radio">
                  <label>
                    <input type="radio" name="optionsRadios" class="chiffre_affaire_o" value="CA_global_par_moyen_de_paiement">
                    Par moyen de payment  
                  </label>
                </div>
                <div class="radio">
                  <label>
                    <input type="radio" name="optionsRadios" class="chiffre_affaire_o" value="CA_par_point_de_vente">
                    Par caisse / point de vente / moyen de paiement   
                  </label>
                  <div class="radio">
                  <label>
                    <input type="radio" name="optionsRadios" class="chiffre_affaire_o" value="CA_par_caisse_PV">
                    Par caisse / point de vente  
                  </label>
                </div>
                </div>
              </div>
            </div>
            <div class="form-group row">
              <div class="col-xs-6">
                <label class="control-label">Date Debut
                </label>
                <div class="input-group date" id="dp3" data-date-format="yyyy-mm-dd">
                  <input class="form-control datedf" type="text"  id="chiffre_affaire_date1" required>
                  <span class="input-group-addon">
                    <i class="glyphicon glyphicon-calendar">
                    </i>
                  </span>
                </div>
              </div>
              <div class="col-xs-6">
                <label class="control-label">Date FIN
                </label>
                <div class="input-group date" id="dp3" data-date-format="yyyy-mm-dd">
                  <input class="form-control datedf" type="text"  id="chiffre_affaire_date2" required>
                  <span class="input-group-addon">
                    <i class="glyphicon glyphicon-calendar">
                    </i>
                  </span>
                </div>
              </div>
            </div>
          </form>
          <!-------------------------------------------------------->          
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-primary" data-dismiss="modal" id="chiffre_affaire_btn">ok
          </button>
        </div>
      </div>
    </div>
  </div>
  <!--fin menu CA-->
  <!--menu produits_promotionnelles-->
  <div class="modal fade" id="produits_promotionnelles_menu1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;
            </span>
          </button>
          <h4 class="modal-title" id="myModalLabel">Options
          </h4>
        </div>
        <div class="modal-body">
          <!-------------------------------------------------------->
          <form data-toggle="validator" role="form">
            <div class="form-group row">
              <div class="col-xs-6">
                <label class="control-label">Date Debut
                </label>
                <div class="input-group date" id="dp3" data-date-format="yyyy-mm-dd">
                  <input class="form-control datedf" type="text" readonly id="produits_promotionnelles_date1" required>
                  <span class="input-group-addon">
                    <i class="glyphicon glyphicon-calendar">
                    </i>
                  </span>
                </div>
              </div>
              <div class="col-xs-6">
                <label class="control-label">Date FIN
                </label>
                <div class="input-group date" id="dp3" data-date-format="yyyy-mm-dd">
                  <input class="form-control datedf" type="text" readonly id="produits_promotionnelles_date2" required>
                  <span class="input-group-addon">
                    <i class="glyphicon glyphicon-calendar">
                    </i>
                  </span>
                </div>
              </div>
            </div>
          </form>
          <!-------------------------------------------------------->          
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-primary" data-dismiss="modal" id="produits_promotionnelles">ok
          </button>
        </div>
      </div>
    </div>
  </div>
  <!--Fin menu produits_promotionnelles-->
   
  
  <div id="custom_notifications" class="custom-notifications dsp_none">
    <ul class="list-unstyled notifications clearfix" data-tabbed_notifications="notif-group">
    </ul>
    <div class="clearfix">
    </div>
    <div id="notif-group" class="tabbed_notifications">
    </div>
  </div>
  
    <script src="js/jquery.min.js"></script>
     <script src="js/datatables/js/jquery.dataTables.js"></script>
    <script src="js/datatables/tools/js/dataTables.tableTools.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <!-- Datatables -->
   
    <script src="js/highcharts.js"></script>
    <script src="js/highcharts-3d.js"></script> 
    <script src="js/bootstrap-datepicker.js"></script>
    <script src="https://code.highcharts.com/highcharts-more.js"></script>
    <script src="https://code.highcharts.com/modules/solid-gauge.js"></script>
    <script src="https://code.highcharts.com/modules/exporting.js"></script>
    <script src="https://code.highcharts.com/modules/funnel.js"></script>
  <!-- bootstrap progress js -->
  <script src="js/progressbar/bootstrap-progressbar.min.js"></script>
  <script src="js/nicescroll/jquery.nicescroll.min.js"></script>
  <!-- daterangepicker -->
  <script type="text/javascript" src="js/moment/moment.min.js"></script>
  <script type="text/javascript" src="js/datepicker/daterangepicker.js"></script>
  <!-- chart js -->
  <script type="text/javascript" src="js/moment/moment.min.js"></script>
  <script src="js/chartjs/chart.min.js"></script>
  <!-- ajax-->
  <script type="text/javascript" src="js/ajax.js"></script>
  <!--[if lte IE 8]><script type="text/javascript" src="js/excanvas.min.js"></script><![endif]-->
  <script type="text/javascript" src="js/flot/jquery.flot.js"></script>
  <script type="text/javascript" src="js/flot/jquery.flot.pie.js"></script>
  <script type="text/javascript" src="js/flot/jquery.flot.orderBars.js"></script>
  <script type="text/javascript" src="js/flot/jquery.flot.time.min.js"></script>
  <script type="text/javascript" src="js/flot/date.js"></script>
  <script type="text/javascript" src="js/flot/jquery.flot.spline.js"></script>
  <script type="text/javascript" src="js/flot/jquery.flot.stack.js"></script>
  <script type="text/javascript" src="js/flot/curvedLines.js"></script>
  <script type="text/javascript" src="js/flot/jquery.flot.resize.js"></script>
  <script src="js/icheck/icheck.min.js"></script>
  <script src="js/pace/pace.min.js"></script>
 
  <script src="js/custom.js"></script>


  

</body>
</html>
    
