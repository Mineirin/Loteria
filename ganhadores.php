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

  if (isset($_GET['idsort'])) {
    $idSort = $_GET['idsort'];
  }else{
    header("location: index.php");
  }

  $sort_check_query = 'SELECT * FROM sorteio  WHERE idsorteio = '.$idSort.' LIMIT 1';
  $result = mysqli_query($db,$sort_check_query);
  $user = mysqli_fetch_assoc($result);
    $numeros =  $user['numeros'];
 
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Sorteios - Dashboard</title>

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
          <form class="form-inline">
            <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
              <i class="fa fa-bars"></i>
            </button>
          </form>

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
          <h1 class="h3 mb-2 text-gray-800">Sorteios</h1>

          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Ganhadores</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                    <th>Colocação</th>
                      <th>id</th>
                      <th>Números</th>
                      <th>Celular</th>
                    </tr>
                  </thead>
                  
                  <tbody>
                  <?php 
                  $cont =0;
                  
                  $colo =1; 

                  $user_check_query = 'SELECT * FROM sorteio WHERE idsorteio='. $idSort.'  LIMIT 1';
                      //echo($user_check_query );
                    $result1 = mysqli_query($db, $user_check_query);

                    
                    $cesta = array();


                    $user = mysqli_fetch_assoc($result1);
                    $num =  $user['numeros'];


                 $sort_check_query = 'SELECT * FROM apostas WHERE idSorteio='.$idSort;
                 $result3 = mysqli_query($db,$sort_check_query);
                 $arr2 = str_split($num);


                 $n1 = $arr2[0].$arr2[1];
                 $n2 = $arr2[4].$arr2[5];
                 $n3 = $arr2[8].$arr2[9];
                 $n4 = $arr2[12].$arr2[13];
                 $n5 = $arr2[16].$arr2[17];

                 $arr5n = array();
                 $arr4n = array();
                 $arr3n = array();
                 $arr2n = array();

                 $colo = 1;
                 
                 


                 while($row = $result3->fetch_assoc()) {
                    $arr2 = str_split($row['numeros']);
                    $n1ap = $arr2[0].$arr2[1];
                    $n2ap = $arr2[4].$arr2[5];
                    $n3ap = $arr2[8].$arr2[9];
                    $n4ap = $arr2[12].$arr2[13];
                    $n5ap = $arr2[16].$arr2[17];
                    $n6ap = $arr2[20].$arr2[21];
                      $n7ap = $arr2[24].$arr2[25];
                      $n8ap = $arr2[28].$arr2[29];
                      $n9ap = $arr2[32].$arr2[33];
                      $n10ap = $arr2[36].$arr2[37];

                      $arr3 = array($n1ap,$n2ap,$n3ap,$n4ap,$n5ap,$n6ap,$n7ap,$n8ap,$n9ap,$n10ap);
                    
                    //array_push(idapostas);
                    $cont =0;
                    for($i = 0; $i<10;$i++){
                      if($n1 == $arr3[$i]){
                        $cont++;
                      }
                      elseif($n2 == $arr3[$i]){
                        $cont++;
                      }
                      elseif($n3 == $arr3[$i]){
                        $cont++;
                      }
                      elseif($n4 == $arr3[$i]){
                        $cont++;
                      }
                      elseif($n5 == $arr3[$i]){
                        $cont++;
                      }
                    }
                    if($cont==5){
                      array_push( $arr5n,$row['idapostas']);
                    }
                    elseif($cont==4){
                      array_push( $arr4n,$row['idapostas']);
                    }
                    elseif($cont==3){
                      array_push( $arr3n,$row['idapostas']);
                    }
                    elseif($cont==2){
                      array_push( $arr2n,$row['idapostas']);
                    }

                     }
                    
                     
              for($i = 0; $i<sizeof($arr5n); $i++){
                $sort_check_query = 'SELECT * FROM apostas WHERE idapostas='.$arr5n[$i].'  LIMIT 1';
                 $result4 = mysqli_query($db,$sort_check_query);
                 $ap = mysqli_fetch_assoc($result4);


                 $user_check_query = 'SELECT * FROM user WHERE iduser="'. $ap['idUser'].'"  LIMIT 1';
                 $result1 = mysqli_query($db, $user_check_query);
                 $user = mysqli_fetch_assoc($result1);
                 $idCriador =  $user['name'];
                 $numero = $user['celular'];

                 echo("
                 <tr>
                 <td>".$colo."</td>
                   <td>".$idCriador."</td>
                   <td>".$ap['numeros']."</td>
                   <td>".$numero."</td>
                   <td></td>
                 </tr>
                 
                 ");
                 $colo ++;

              }
               
              for($i = 0; $i<sizeof($arr4n); $i++){
                $sort_check_query = 'SELECT * FROM apostas WHERE idapostas='.$arr4n[$i].'  LIMIT 1';
                 $result4 = mysqli_query($db,$sort_check_query);
                 $ap = mysqli_fetch_assoc($result4);


                 $user_check_query = 'SELECT * FROM user WHERE iduser="'. $ap['idUser'].'"  LIMIT 1';
                 $result1 = mysqli_query($db, $user_check_query);
                 $user = mysqli_fetch_assoc($result1);
                 $idCriador =  $user['name'];
                 $numero = $user['celular'];

                 echo("
                 <tr>
                 <td>".$colo."</td>
                   <td>".$idCriador."</td>
                   <td>".$ap['numeros']."</td>
                   <td>".$numero."</td>
                   <td></td>
                 </tr>
                 
                 ");
                 $colo ++;

              }

              for($i = 0; $i<sizeof($arr3n); $i++){
                $sort_check_query = 'SELECT * FROM apostas WHERE idapostas='.$arr3n[$i].'  LIMIT 1';
                 $result4 = mysqli_query($db,$sort_check_query);
                 $ap = mysqli_fetch_assoc($result4);


                 $user_check_query = 'SELECT * FROM user WHERE iduser="'. $ap['idUser'].'"  LIMIT 1';
                 $result1 = mysqli_query($db, $user_check_query);
                 $user = mysqli_fetch_assoc($result1);
                 $idCriador =  $user['name'];
                 $numero = $user['celular'];

                 echo("
                 <tr>
                 <td>".$colo."</td>
                   <td>".$idCriador."</td>
                   <td>".$ap['numeros']."</td>
                   <td>".$numero."</td>
                   <td></td>
                 </tr>
                 
                 ");
                 $colo ++;

              }

              for($i = 0; $i<sizeof($arr2n); $i++){
                $sort_check_query = 'SELECT * FROM apostas WHERE idapostas='.$arr2n[$i].'  LIMIT 1';
                 $result4 = mysqli_query($db,$sort_check_query);
                 $ap = mysqli_fetch_assoc($result4);


                 $user_check_query = 'SELECT * FROM user WHERE iduser="'. $ap['idUser'].'"  LIMIT 1';
                 $result1 = mysqli_query($db, $user_check_query);
                 $user = mysqli_fetch_assoc($result1);
                 $idCriador =  $user['name'];
                 $numero = $user['celular'];

                 echo("
                 <tr>
                 <td>".$colo."</td>
                   <td>".$idCriador."</td>
                   <td>".$ap['numeros']."</td>
                   <td>".$numero."</td>
                   <td></td>
                 </tr>
                 
                 ");
                 $colo ++;

              }
                 
            
         

                  
                  ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>

          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Todos</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>id</th>
                      <th>Números</th>
                      <th>Celular</th>
                    </tr>
                  </thead>
                  
                  <tbody>
                  <?php 
                  $cont =0;

                  $sort_check_query = 'SELECT * FROM apostas WHERE idSorteio='.$idSort.'  ';

                  $result12 = mysqli_query($db,$sort_check_query);
                  
                  while($row = $result12->fetch_assoc()) {
                    $user_check_query = 'SELECT * FROM user WHERE iduser="'. $row['idUser'].'"  LIMIT 1';

                    $result1 = mysqli_query($db, $user_check_query);
                    $user = mysqli_fetch_assoc($result1);
                    $idCriador =  $user['name'];
                    $numero = $user['celular'];

                    echo("
                    <tr>
                      <td>".$idCriador."</td>
                      <td>".$row['numeros']."</td>
                      <td>".$numero."</td>
                      <td></td>
                    </tr>
                    
                    ");
                    
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