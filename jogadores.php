<?php 
include('php/server.php') ;

  if (!isset($_SESSION['username'])) {
  	$_SESSION['msg'] = "You must log in first";
  	header('location: login.php');
  }
  if (isset($_GET['logout'])) {
  	session_destroy();
  	unset($_SESSION['username']);
  	header("location: login.php");
  }

  
 

  $sort_check_query = 'SELECT * FROM user WHERE tipo = "2" ';
  $result = mysqli_query($db,$sort_check_query);
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Sorteio Magnata</title>

  <!-- Custom fonts for this template -->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template -->
  <link href="css/sb-admin-2.min.css" rel="stylesheet">

  <!-- Custom styles for this page -->
  <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

</head>

<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion no-print" id="accordionSidebar">

      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.php">
        <div class="col">
          <i class="fab fa-monero fa-3x"></i>
        </div>
        <div class="sidebar-brand-text mx-3">Sorteio Magnata</div>
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
      if($_SESSION['tipo']=="0"){
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
<li class="nav-item">
        <a class="nav-link" href="apostas.php">
          <i class="fas fa-fw fa-cubes"></i>
          <span>Apostas</span></a>
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
          <h1 class="h3 mb-2 text-gray-800">Jogadores</h1>
          <!-- DataTales Example -->
          <div class="card shadow mb-4">
          <div class="card-header py-3" style="display: flex; flex-direction: row; justify-content: space-between; width: 100%; margin-left: 0px;">
          <h6 class="m-0 font-weight-bold text-primary" style="width: 45%;">Jogadores Cadastrados</h6>
             <div class="col-lg-2 col-md-9 col-sm-12">
                <button class="btn btn-primary" data-toggle="modal" data-target="#modalExemplo"> <i class="fas fa-user-plus"> USUÁRIOS </i> </button>
              </div>
            </div>
            <div class="card-body">
              <div class="table-responsive">
              <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>Nome</th>
                      <th>Celular</th>
                      <th>Ação</th>
                      <th>Cadastrado</th>
                    </tr>
                  </thead>
                  
                  <tbody>
                  <?php 
                  $cont =0;
                   while($row = $result->fetch_assoc()) {
                    if($row['idSuperior']==0){
                      $nammm =  "Desconhecido";
                    }
                    else{
                      $user_check_query = 'SELECT * FROM user WHERE iduser='.$row['idSuperior'].'  LIMIT 1';
                      //echo($user_check_query );
                    $result1 = mysqli_query($db, $user_check_query);

                    
                    
                    $user = mysqli_fetch_assoc($result1);
                    $nammm =  $user['name'];
                    $idd = $user['iduser'];
                    
                    }
                    $idsup= $_SESSION['id'];
//<a class='btn btn-info' href=''><i class='fas fa-edit'></i></a>
                    echo("<tr>
                    <td>".$row['name']."</td>
                    <td>".$row['celular']."</td>
                    
                  ");

                  if($idd == $idsup){
                    echo("<form id='exc_camb".$cont."' class='dropdown-item' method='post' action='cambistas.php'>
                    <input type='hidden' id='custId' name='idDelet' value='".$row['iduser']."'>
                    <input type='hidden' id='tipo' name='tipo' value='2'>
                  </form>
                    <td style='display: flex;'> 
                  
                     <div style='width: 44px !important; max-width: 30%; position: relative;'> <input  class='btn btn-danger' type='submit' form='exc_camb".$cont."' name='exc_camb'  value='    '/><i class='fa fa-minus-square'".$cont."' style='    position: absolute; left: 35%; top: 30%;  color: white; '></i></div >
                  </td>");
                  }
                  else{
                    echo("<td></td>
                    ");
                  }
                  echo("<td>".$nammm."</td>
                  </tr>");
                  $cont +=1;
                   }
                  
                  ?>
                    
                    
                  </tbody>
                </table>
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
            <span>Copyright &copy; Mineirando-Software 2021</span>
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

  <!-- Modal -->
      <div id="modalExemplo" class="modal fade" role="dialog">
        <div class="modal-dialog">
         <!-- Modal content-->
          <div class="modal-content">
            <div class="modal-header">
              
              <h5 class="modal-title">Usuários</h5>
              <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
            <form method="POST" action="jogadores.php">

<div class="form-group">
  <label for="id_produto">Nome</label>
  <input type="text" class="form-control mr-2" name="username" placeholder="Nome" required>
</div>

  <div class="form-group">
  <label for="id_user">Celular</label>
  <input type="text" class="form-control mr-2" name="celular" placeholder="Celular" id="celular" required>
</div>
<input type="hidden" id="exampleInputEmail" name="password_1" value="senha123">
<!--<div class="form-group">
  <label for="id_user">Senha</label>
  
  <input type="password" class="form-control mr-2"  id="exampleInputEmail" aria-describedby="emailHelp" placeholder="Senha" name="password_1">
</div>-->

 <div class="form-group">
  <label for="fornecedor">Nível</label>
    <select class="form-control mr-2" id="category" name="nivel">
            
      <option value="2">Jogador</option> 
         
 </select>
</div>
</div>
     
<div class="modal-footer">
 <button type="submit" class="btn btn-success mb-3"  name="reg_tot">Salvar </button>


  <button type="button" class="btn btn-danger mb-3" data-dismiss="modal">Cancelar </button>
</form>
            </div>
          </div>
        </div>
      </div>    
<script> $("#modalEditar").modal("show"); </script>

  <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="js/sb-admin-2.min.js"></script>

  <!-- Page level plugins -->
  <script src="vendor/datatables/jquery.dataTables.min.js"></script>
  <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>

  <!-- Page level custom scripts -->
  <script src="js/demo/datatables-demo.js"></script>

</body>


</html>
