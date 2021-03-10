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


  $sort_check_query = 'SELECT * FROM user WHERE tipo = "2"';
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

  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="css/sb-admin-2.min.css" rel="stylesheet">
  <link rel="stylesheet" href="css/style.css">
  <link rel="stylesheet" href="css/stylesorteio.css">
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
<h1 class="h3 mb-4 text-gray-800 text-center no-print">Nova aposta</h1>
<div class="row">
  <div class="col-12">
                  <!-- Inicio do Card -->
                  <div class="card shadow mb-4 card-novaaposta mx-auto no-print">
                    <div class="card-header py-3">
                      <h6 class="m-0 font-weight-bold text-primary text-center">Selecione os Numeros da aposta</h6>
                    </div>
                    <div class="card-body">
    
                      <div class="row">
                        <div class="col-md-6 d-flex align-items-center justify-content-center formss" id="teste123">
    
                        <div id="form">
                          <form id="reg_sort" class="" method="post" action="novaaposta.php" style="    display: flex; flex-direction: column;">
                          <select name="idUser" required  class="teste" style="height: 40px; border: solid 1px; border-radius: 4px; text-align: center;">
                          <option ></option>
                            <?php 
                            while($row = $result->fetch_assoc()) {
                                echo("<option value='".$row['iduser']."'>".$row['name']."</option>");
                            }
                            ?>
                            
  </select>
                          </br>
                              <div>
                              <input class="teste" type="text" maxLength="2"  min="0" max="80" name="n1"/>
                              <input class="teste" type="text" maxLength="2"  min="0" max="80" name="n2"/>
                              <input class="teste" type="text" maxLength="2"  min="0" max="80" name="n3"/>
                              <input class="teste" type="text" maxLength="2"  min="0" max="80" name="n4"/>
                              <input class="teste" type="text" maxLength="2"  min="0" max="80" name="n5"/>
                              <input class="teste" type="text" maxLength="2"  min="0" max="80" name="n6"/>
                              <input class="teste" type="text" maxLength="2"  min="0" max="80" name="n7"/>
                              <input class="teste" type="text" maxLength="2"  min="0" max="80" name="n8"/>
                              <input class="teste" type="text" maxLength="2"  min="0" max="80" name="n9"/>
                              <input class="teste" type="text" maxLength="2"  min="0" max="80" name="n10"/></div>
                                        </form>
    
    </div>
              
                        </div>
                        <div class="col-md-6">
                          <img class="imagem-novaaposta img-fluid" alt="dinheiro" src="https://image.freepik.com/free-vector/abstract-illustration-stock-exchange-data_23-2148604352.jpg">
                        </div>
                        <p style="color:red !important;"> <?php include('php/errors.php'); ?></p>
                      </div>
    
                    </div>
                    <div class="card-footer text-center no-print">
                      
                      <div class="salvar">                        
                      <input class="btn btn-primary btn-icon-split btn-lg mt-3 mb-3 btsalvar" type="submit" form="reg_sort" value="Salvar" name="reg_apost"/>
                      </div>
                    </div>
                  </div>
                  <!-- / Fim do Card-->

                  

                  <!-- Begin Page Content -->
<div class="container-fluid">
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

<script type="text/javascript">

$(function() {
  'use strict';

  var body = $('body');

  function goToNextInput(e) {
    var key = e.which,
      t = $(e.target),
      sib = t.next('input.sorteio');

    if (key != 9 && (key < 48 || key > 57)) {
      e.preventDefault();
      return false;
    }

    if (key === 9) {
      return true;
    }

    if (!sib || !sib.length) {
      sib = body.find('input.sorteio').eq(0);
    }
    sib.select().focus();
  }

  function onKeyDown(e) {
    var key = e.which;

    if (key === 9 || (key >= 48 && key <= 57)) {
      return true;
    }

    e.preventDefault();
    return false;
  }
  
  function onFocus(e) {
    $(e.target).select();
  }

  //body.on('keyup', 'input', goToNextInput);
  //body.on('keydown', 'input.teste', onKeyDown);
  body.on('click', 'input.teste', onFocus);

})

</script>

</body>

</html>
