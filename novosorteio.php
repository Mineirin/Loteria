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
  <link rel="stylesheet" href="css/print.css">

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
      <a class="nav-link" href="index.php">
        <i class="fas fa-fw fa-tachometer-alt"></i>
        <span>Painel Administrador</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
      Menu Principal
    </div>

    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item">
      <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
        <i class="fas fa-fw fa-user"></i>
        <span>Usuários</span>
      </a>
      <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
          <h6 class="collapse-header">Painel de Usuários:</h6>
          <a class="collapse-item" href="cambistas.php">Cambistas</a>
          <a class="collapse-item" href="jogadores.php">Jogadores</a>
        </div>
      </div>
    </li>

     <!-- Nav Item - Charts -->
     <li class="nav-item">
      <a class="nav-link" href="novosorteio.php">
        <i class="fas fa-fw fa-cube"></i>
        <span>Novo Sorteio</span></a>
    </li>
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
          <form class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
            <div class="input-group">
              <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
              <div class="input-group-append">
                <button class="btn btn-primary" type="button">
                  <i class="fas fa-search fa-sm"></i>
                </button>
              </div>
            </div>
          </form>

          <!-- Topbar Navbar -->
          <ul class="navbar-nav ml-auto">

            <!-- Nav Item - Search Dropdown (Visible Only XS) -->
            <li class="nav-item dropdown no-arrow d-sm-none">
              <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-search fa-fw"></i>
              </a>
              <!-- Dropdown - Messages -->
              <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in" aria-labelledby="searchDropdown">
                <form class="form-inline mr-auto w-100 navbar-search">
                  <div class="input-group">
                    <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
                    <div class="input-group-append">
                      <button class="btn btn-primary" type="button">
                        <i class="fas fa-search fa-sm"></i>
                      </button>
                    </div>
                  </div>
                </form>
              </div>
            </li>

           <!-- Nav Item - Alerts -->
           <li class="nav-item dropdown no-arrow mx-1">
            <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <i class="fas fa-bell fa-fw"></i>
              <!-- Counter - Alerts -->
              <span class="badge badge-danger badge-counter">1+</span>
            </a>
            <!-- Dropdown - Alerts -->
            <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="alertsDropdown">
              <h6 class="dropdown-header">
                Alertas
              </h6>
              <a class="dropdown-item d-flex align-items-center" href="#">
                <div class="mr-3">
                  <div class="icon-circle bg-primary">
                    <i class="fas fa-file-alt text-white"></i>
                  </div>
                </div>
                <div>
                  <div class="small text-gray-500">Hoje</div>
                  <span class="font-weight-bold">Seja Bem Vindo!!</span>
                </div>
              </a>
              
              <a class="dropdown-item text-center small text-gray-500" href="#">Todas Alertas</a>
            </div>
          </li>

          <!-- Nav Item - Messages -->
          <li class="nav-item dropdown no-arrow mx-1">
            <a class="nav-link dropdown-toggle" href="#" id="messagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <i class="fas fa-envelope fa-fw"></i>
              <!-- Counter - Messages -->
              <!--<span class="badge badge-danger badge-counter">7</span> -->
            </a>
            <!-- Dropdown - Messages -->
            <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="messagesDropdown">
              <h6 class="dropdown-header">
                Mensagens
              </h6>

              <a class="dropdown-item text-center small text-gray-500" href="#">Ler mais Messages</a>
            </div>
          </li>

          <div class="topbar-divider d-none d-sm-block"></div>

          <!-- Nav Item - User Information -->
          <li class="nav-item dropdown no-arrow">
            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <span class="mr-2 d-none d-lg-inline text-gray-600 small">Administrador</span>
              <img class="img-profile rounded-circle" src="https://source.unsplash.com/QAB-WJcbgJk/60x60">
            </a>
            <!-- Dropdown - User Information -->
            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
              <a class="dropdown-item" href="#">
                <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                Perfil
              </a>
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
          <h1 class="h3 mb-4 text-gray-800 text-center no-print">Novo Sorteio</h1>
          <div class="row">
            <div class="col-12">
                            <!-- Inicio do Card -->
                            <div class="card shadow mb-4 card-novaaposta mx-auto no-print">
                              <div class="card-header py-3">
                                <h6 class="m-0 font-weight-bold text-primary text-center">Selecione os Numeros do Sorteio</h6>
                              </div>
                              <div class="card-body">
              
                                <div class="row">
                                  <div class="col-md-6 d-flex align-items-center justify-content-center formss" id="teste123">
              
                                    <div class="cartela ml-3">
                                      <form name='form1' method=post action='check.php'>
                                      <div class="d-flex justify-content-center">
                                        <div class="form-check form-check-inline">
                                          <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="option2" name="ckb" onclick='chkcontrol(0)';>
                                          <label class="form-check-label" for="inlineCheckbox1">01</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                          <input class="form-check-input" type="checkbox" id="inlineCheckbox2" value="option2" name="ckb" onclick='chkcontrol(1)';>
                                          <label class="form-check-label" for="inlineCheckbox2">02</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                          <input class="form-check-input" type="checkbox" id="inlineCheckbox3" value="option2" name="ckb" onclick='chkcontrol(2)';>
                                          <label class="form-check-label" for="inlineCheckbox3">03</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                          <input class="form-check-input" type="checkbox" id="inlineCheckbox4" value="option2" name="ckb" onclick='chkcontrol(3)';>
                                          <label class="form-check-label" for="inlineCheckbox4">04</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                          <input class="form-check-input" type="checkbox" id="inlineCheckbox5" value="option2" name="ckb" onclick='chkcontrol(4)';>
                                          <label class="form-check-label" for="inlineCheckbox5">05</label>
                                        </div>

                                        <div class="form-check form-check-inline">
                                          <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="option2" name="ckb" onclick='chkcontrol(5)';>
                                          <label class="form-check-label" for="inlineCheckbox1">06</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                          <input class="form-check-input" type="checkbox" id="inlineCheckbox2" value="option2" name="ckb" onclick='chkcontrol(6)';>
                                          <label class="form-check-label" for="inlineCheckbox2">07</label>
                                        </div>
                    
                                      </div>
                    
                                      <div class="d-flex justify-content-center">
                    
                                        
                                        <div class="form-check form-check-inline">
                                          <input class="form-check-input" type="checkbox" id="inlineCheckbox3" value="option2" name="ckb" onclick='chkcontrol(7)';>
                                          <label class="form-check-label" for="inlineCheckbox3">08</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                          <input class="form-check-input" type="checkbox" id="inlineCheckbox4" value="option2" name="ckb" onclick='chkcontrol(8)';>
                                          <label class="form-check-label" for="inlineCheckbox4">09</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                          <input class="form-check-input" type="checkbox" id="inlineCheckbox5" value="option2" name="ckb" onclick='chkcontrol(9)';>
                                          <label class="form-check-label" for="inlineCheckbox5">10</label>
                                        </div>

                                        <div class="form-check form-check-inline">
                                          <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="option2" name="ckb" onclick='chkcontrol(10)';>
                                          <label class="form-check-label" for="inlineCheckbox1">11</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                          <input class="form-check-input" type="checkbox" id="inlineCheckbox2" value="option2" name="ckb" onclick='chkcontrol(11)';>
                                          <label class="form-check-label" for="inlineCheckbox2">12</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                          <input class="form-check-input" type="checkbox" id="inlineCheckbox3" value="option2" name="ckb" onclick='chkcontrol(12)';>
                                          <label class="form-check-label" for="inlineCheckbox3">13</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                          <input class="form-check-input" type="checkbox" id="inlineCheckbox4" value="option2" name="ckb" onclick='chkcontrol(13)';>
                                          <label class="form-check-label" for="inlineCheckbox4">14</label>
                                        </div>
                    
                                      </div>
                    
                                      <div class="d-flex justify-content-center">
                    
                                        
                                        <div class="form-check form-check-inline">
                                          <input class="form-check-input" type="checkbox" id="inlineCheckbox5" value="option2" name="ckb" onclick='chkcontrol(14)';>
                                          <label class="form-check-label" for="inlineCheckbox5">15</label>
                                        </div>
                                         <div class="form-check form-check-inline">
                                          <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="option2" name="ckb" onclick='chkcontrol(15)';>
                                          <label class="form-check-label" for="inlineCheckbox1">16</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                          <input class="form-check-input" type="checkbox" id="inlineCheckbox2" value="option2" name="ckb" onclick='chkcontrol(16)';>
                                          <label class="form-check-label" for="inlineCheckbox2">17</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                          <input class="form-check-input" type="checkbox" id="inlineCheckbox3" value="option2" name="ckb" onclick='chkcontrol(17)';>
                                          <label class="form-check-label" for="inlineCheckbox3">18</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                          <input class="form-check-input" type="checkbox" id="inlineCheckbox4" value="option2" name="ckb" onclick='chkcontrol(18)';>
                                          <label class="form-check-label" for="inlineCheckbox4">19</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                          <input class="form-check-input" type="checkbox" id="inlineCheckbox5" value="option2" name="ckb" onclick='chkcontrol(19)';>
                                          <label class="form-check-label" for="inlineCheckbox5">20</label>
                                        </div>

                                         <div class="form-check form-check-inline">
                                          <input class="form-check-input" type="checkbox" id="inlineCheckbox5" value="option2" name="ckb" onclick='chkcontrol(20)';>
                                          <label class="form-check-label" for="inlineCheckbox5">21</label>
                                        </div>
                    
                                      </div>
                    
                                  
                    
                                      <div class="d-flex justify-content-center">
                    
                                        
                                        <div class="form-check form-check-inline">
                                          <input class="form-check-input" type="checkbox" id="inlineCheckbox2" value="option2" name="ckb" onclick='chkcontrol(21)';>
                                          <label class="form-check-label" for="inlineCheckbox2">22</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                          <input class="form-check-input" type="checkbox" id="inlineCheckbox3" value="option2" name="ckb" onclick='chkcontrol(22)';>
                                          <label class="form-check-label" for="inlineCheckbox3">23</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                          <input class="form-check-input" type="checkbox" id="inlineCheckbox4" value="option2" name="ckb" onclick='chkcontrol(23)';>
                                          <label class="form-check-label" for="inlineCheckbox4">24</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                          <input class="form-check-input" type="checkbox" id="inlineCheckbox5" value="option2" name="ckb" onclick='chkcontrol(24)';>
                                          <label class="form-check-label" for="inlineCheckbox5">25</label>
                                        </div>

                                        <div class="form-check form-check-inline">
                                          <input class="form-check-input" type="checkbox" id="inlineCheckbox5" value="option2" name="ckb" onclick='chkcontrol(25)';>
                                          <label class="form-check-label" for="inlineCheckbox5">26</label>
                                        </div>

                                        <div class="form-check form-check-inline">
                                          <input class="form-check-input" type="checkbox" id="inlineCheckbox5" value="option2" name="ckb" onclick='chkcontrol(26)';>
                                          <label class="form-check-label" for="inlineCheckbox5">27</label>
                                        </div>

                                        <div class="form-check form-check-inline">
                                          <input class="form-check-input" type="checkbox" id="inlineCheckbox5" value="option2" name="ckb" onclick='chkcontrol(27)';>
                                          <label class="form-check-label" for="inlineCheckbox5">28</label>
                                        </div>
                    
                                      </div>
                                      </form>
                                    </div>
              
                                  </div>
                                  <div class="col-md-6">
                                    <img class="imagem-novaaposta img-fluid" alt="dinheiro" src="https://image.freepik.com/free-vector/abstract-illustration-stock-exchange-data_23-2148604352.jpg">
                                  </div>
                                </div>
              
                              </div>
                              <div class="card-footer text-center no-print">
                                <a href="resultado.php" class="btn btn-primary btn-icon-split btn-lg mt-3 mb-3">
                                  <span class="icon text-white-50">
                                    <i class="fas fa-check"></i>
                                  </span>
                                  <span class="text">Salvar Sorteio</span>
                                </a>
                              </div>
                            </div>
                            <!-- / Fim do Card-->

                            <h1 class="h3 mb-4 text-gray-800 text-center">Ganhadores</h1>

                            <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4 no-print">
            <h1 class="h3 mb-0 text-gray-800">      </h1>
            <button onclick="window.print()" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm no-print"><i class="fas fa-download fa-sm text-white-50"></i> Gerar Relatório</button>
          </div>

          <div class="d-sm-flex align-items-center justify-content-between mb-4 only-print">
            <h1 class="h3 mb-0 text-gray-800">Relatório Resumo dos Sorteios</h1>
            <button onclick="window.print()" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm no-print"><i class="fas fa-download fa-sm text-white-50"></i> Gerar Relatório</button>
          </div>
                  
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Ganhadores do Sorteio</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>Nome</th>
                      <th>Numero</th>
                      <th>Celular</th>
                      <th>Colocação</th>
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                      <th>Nome</th>
                      <th>Numero</th>
                      <th>Celular</th>
                      <th>Colocação</th>
                    </tr>
                  </tfoot>
                  <tbody>
                    <tr>
                      <td>Tiger Nixon</td>
                      <td>01, 04, 13, 16, 23</td>
                      <td>(19)99999-9999</td>
                      <td>1</td>
                    </tr>
                    <tr>
                      <td>Garrett Winters</td>
                      <td>01, 04, 13, 16, 23</td>
                      <td>(19)99999-9999</td>
                      <td>2</td>
                    </tr>
                    <tr>
                      <td>Ashton Cox</td>
                      <td>01, 04, 13, 16, 23</td>
                      <td>(19)99999-9999</td>
                      <td>3</td>
                    </tr>
                    <tr>
                      <td>Cedric Kelly</td>
                      <td>01, 04, 13, 16, 23</td>
                      <td>(19)99999-9999</td>
                      <td>4</td>
                    </tr>
                    <tr>
                      <td>Airi Satou</td>
                      <td>01, 04, 13, 16, 23</td>
                      <td>(19)99999-9999</td>
                      <td>5</td>
                    </tr>
                    <tr>
                      <td>Brielle Williamson</td>
                      <td>01, 04, 13, 16, 23</td>
                      <td>(19)99999-9999</td>
                      <td>6</td>
                    </tr>
                    <tr>
                      <td>Herrod Chandler</td>
                      <td>01, 04, 13, 16, 23</td>
                      <td>(19)99999-9999</td>
                      <td>7</td>
                    </tr>
                    <tr>
                      <td>Rhona Davidson</td>
                      <td>01, 04, 13, 16, 23</td>
                      <td>(19)99999-9999</td>
                      <td>8</td>
                    </tr>
                    <tr>
                      <td>Colleen Hurst</td>
                      <td>01, 04, 13, 16, 23</td>
                      <td>(19)99999-9999</td>
                      <td>9</td>
                    </tr>
                    <tr>
                      <td>Sonya Frost</td>
                      <td>01, 04, 13, 16, 23</td>
                      <td>(19)99999-9999</td>
                      <td>10</td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
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
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="js/sb-admin-2.min.js"></script>

  <script>
   function checkWindowSize() {  

    if ( $(window).width() > 1150 ) {  
      document.getElementById("teste123").classList.add('col-md-6');

document.getElementById("teste123").classList.remove('col-md-12');
       
    }  
    else {  
      document.getElementById("teste123").classList.add('col-md-12');

document.getElementById("teste123").classList.remove('col-md-6');
        
    }  

}  

$(window).resize(checkWindowSize);  
  </script>

  <script type="text/javascript">
function chkcontrol(j) {
var total=0;
for(var i=0; i < document.form1.ckb.length; i++){
if(document.form1.ckb[i].checked){
total =total +1;}
if(total > 5){
alert("Selecione apenas 5 numeros") 
document.form1.ckb[j].checked = false ;
return false;
}
}
} </script>

</body>

</html>
