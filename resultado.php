<?php 
  session_start(); 

  if (!isset($_SESSION['username'])) {
  	$_SESSION['msg'] = "You must log in first";
  	header('location: login.php');
  }
  if (isset($_GET['logout'])) {
  	session_destroy();
  	unset($_SESSION['username']);
  	header("location: login.php");
  }
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Loteria - Dashboard</title>

  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="css/sb-admin-2.min.css" rel="stylesheet">
  <link rel="stylesheet" href="css/style.css">

</head>

<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">

   <!-- Sidebar -->
   <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion no-print" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.php">
      <div class="sidebar-brand-icon rotate-n-15">
        <i class="fas fa-laugh-wink"></i>
      </div>
      <div class="sidebar-brand-text mx-3">Loteria</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item active">
      <?php
      if($_SESSION['tipo']=="0"){
echo('<a class="nav-link" href="paineladm.php">
<i class="fas fa-fw fa-tachometer-alt"></i>
<span>Painel Administrador</span></a>');
      }
      
      ?>
        
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider">

      <!-- Heading -->
      <div class="sidebar-heading">
        Menu Principal
      </div>

      <!-- Nav Item - Pages Collapse Menu -->
      
        

        <?php
      if($_SESSION['tipo']=="0"|| $_SESSION['tipo']=="1"){
echo('<li class="nav-item">
<a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
  <i class="fas fa-fw fa-user"></i>
  <span>Usuários</span>
</a>
<div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
<div class="bg-white py-2 collapse-inner rounded">
  <h6 class="collapse-header">Painel de Usuários:</h6>');
  if($_SESSION['tipo']=="0"){
  echo(' <a class="collapse-item" href="cambistas.php">Cambistas</a>');}
  echo('<a class="collapse-item" href="jogadores.php">Jogadores</a>
</div>
</div></li>');
      }
      
      ?>
      

       <!-- Nav Item - Charts -->
      


      <?php
      if($_SESSION['tipo']=="0"|| $_SESSION['tipo']=="1"){
echo(' <li class="nav-item">
<a class="nav-link" href="novosorteio.php">
  <i class="fas fa-fw fa-cube"></i>
  <span>Novo Sorteio</span></a>
</li>');
      }
      
      ?>
    <li class="nav-item">
      <a class="nav-link" href="novaaposta.php">
        <i class="fas fa-fw fa-cube"></i>
        <span>Nova Aposta</span></a>
    </li>
    <!-- Nav Item - Charts -->
    <li class="nav-item">
      <a class="nav-link" href="sorteios.php">
        <i class="fas fa-fw fa-cubes"></i>
        <span>Sorteios</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
      <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

  </ul>
  <!-- End of Sidebar -->
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

        <!-- Topbar -->
        <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

          <!-- Sidebar Toggle (Topbar) -->
          <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
            <i class="fa fa-bars"></i>
          </button>

          <!-- Topbar Search -->
         
          <ul class="navbar-nav ml-auto">
    <div class="topbar-divider d-none d-sm-block"></div>

    <!-- Nav Item - User Information -->
    <li class="nav-item dropdown no-arrow">
      <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?php echo $_SESSION['username']; ?></span>
        <img class="img-profile rounded-circle" src="https://source.unsplash.com/QAB-WJcbgJk/60x60">
      </a>
      <!-- Dropdown - User Information -->
      <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
        
        <div class="dropdown-divider"></div>
        <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
          <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
          Sair
        </a>
      </div>
    </li>

          </ul>

        </nav>
        <!-- End of Topbar -->

        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-4 text-gray-800 text-center">Resultado</h1>
          <div class="row">
            <div class="col-12">
                                <!-- Basic Card Example -->
              <div class="card shadow mb-4 card-novaaposta mx-auto">
                <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-primary text-center">Confira quais números foram sorteados</h6>
                </div>
                <div class="card-body">

                  
                  <div class="row">
                    <div class="col-md-12 numeros">
                      <h2>Números Sorteados</h2>
                      <span class="badge badge-pill badge-primary p-3 text-lg">1</span>
                      <span class="badge badge-pill badge-primary p-3 text-lg">3</span>
                      <span class="badge badge-pill badge-primary p-3 text-lg">4</span>
                      <span class="badge badge-pill badge-primary p-3 text-lg">5</span>
                      <span class="badge badge-pill badge-primary p-3 text-lg">8</span>
                      <span class="badge badge-pill badge-primary p-3 text-lg">10</span>
                      <span class="badge badge-pill badge-primary p-3 text-lg">11</span>
                      <span class="badge badge-pill badge-primary p-3 text-lg">13</span>
                      <span class="badge badge-pill badge-primary p-3 text-lg">15</span>
                      <span class="badge badge-pill badge-primary p-3 text-lg">16</span>
                      <span class="badge badge-pill badge-primary p-3 text-lg">18</span>
                      <span class="badge badge-pill badge-primary p-3 text-lg">20</span>
                      <span class="badge badge-pill badge-primary p-3 text-lg">22</span>
                      <span class="badge badge-pill badge-primary p-3 text-lg">24</span>
                      <span class="badge badge-pill badge-primary p-3 text-lg">25</span>
                    </div>
                  </div>

                  <div class="row mt-5">
                    <div class="col-md-12 numeros">
                      <h2>Sua Aposta</h2>
                      <span class="badge badge-pill badge-primary p-3 text-lg">1</span>
                      <span class="badge badge-pill badge-danger p-3 text-lg">2</span>
                      <span class="badge badge-pill badge-primary p-3 text-lg">3</span>
                      <span class="badge badge-pill badge-danger p-3 text-lg">6</span>
                      <span class="badge badge-pill badge-danger p-3 text-lg">7</span>
                      <span class="badge badge-pill badge-danger p-3 text-lg">9</span>
                      <span class="badge badge-pill badge-primary p-3 text-lg">11</span>
                      <span class="badge badge-pill badge-primary p-3 text-lg">13</span>
                      <span class="badge badge-pill badge-primary p-3 text-lg">16</span>
                      <span class="badge badge-pill badge-primary p-3 text-lg">18</span>
                      <span class="badge badge-pill badge-primary p-3 text-lg">20</span>
                      <span class="badge badge-pill badge-danger p-3 text-lg">21</span>
                      <span class="badge badge-pill badge-primary p-3 text-lg">22</span>
                      <span class="badge badge-pill badge-danger p-3 text-lg">23</span>
                      <span class="badge badge-pill badge-primary p-3 text-lg">24</span>
                    </div>
                  </div>

                  
                  <div class="row mt-3">
                    <div class="col-md-6 d-flex align-items-center justify-content-center">
                      <div>
                        <h4>Codigo Aposta: <strong>5241</strong></h4>
                        <h4>Erros: <strong>6</strong></h4>
                        <h4>Acertos: <strong>9</strong></h4>
                        <h4>Ganhos: <strong>Nenhum</strong></h4>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <img class="imagem-novaaposta img-fluid" alt="dinheiro" src="https://www.gpspoint.com.br/wp-content/uploads/2019/11/ganhar-dinheior-internet.png">
                    </div>
                  </div>
                  
                </div>
                <div class="card-footer text-center">
                  <a href="novaaposta.php" class="btn btn-primary btn-icon-split btn-lg mt-3 mb-3 mr-4">
                    <span class="icon text-white-50">
                      <i class="fas fa-plus"></i>
                    </span>
                    <span class="text">Nova Aposta</span>
                  </a>
                  <a href="apostas.html" class="btn btn-info btn-icon-split btn-lg mt-3 mb-3">
                    <span class="icon text-white-50">
                      <i class="fas fa-cubes"></i>
                    </span>
                    <span class="text">Ver Apostas</span>
                  </a>
                </div>
              </div>
              <!-- Fim card-->
            </div>
          </div>

        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

      <!-- Footer -->
      <footer class="sticky-footer bg-white no-print">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span>Copyright &copy; Mineirando-Software 2020</span>
          </div>
        </div>
      </footer>
      <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <!-- Logout Modal-->
  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Deseja realmente sair?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>

        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
          <a href="index.php?logout='1'" class="btn btn-primary">Sair</a>
        </div>
      </div>
    </div>
  </div>


  <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="js/sb-admin-2.min.js"></script>

</body>

</html>
