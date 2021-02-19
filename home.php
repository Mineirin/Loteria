<?php 



  $sql_sort = "SELECT * FROM sorteio ";
  $result = mysqli_query($db,$sql_sort);
  $num_rows = mysqli_num_rows($result);

  $sql_user = 'SELECT * FROM user WHERE tipo = "1"';
  $result1 = mysqli_query($db,$sql_user);
  $num_rows1 = mysqli_num_rows($result1);

  $sql_camb = 'SELECT * FROM user WHERE tipo = "2"';
  $result2 = mysqli_query($db,$sql_camb);
  $num_rows2 = mysqli_num_rows($result2);
?>

<div class="container-fluid">
          <div class="content cards-gerenciais">
          <div class="row">
            <div class="col-lg-3 col-md-6 col-sm-6">
              <div class="card card-stats">
                <div class="card-body ">
                  <div class="row">
                    <div class="col-5 col-md-4">
                      <div class="icon-big text-center icon-warning">
                        <i class="fas fa-users"></i>
                      </div>
                    </div>
                    <div class="col-7 col-md-8">
                      <div class="numbers">
                        <p class="card-category">Total de Usuários</p>
                        <p class="card-title"><?php echo isset( $num_rows2) ?  $num_rows2 : "0"; ?>
                          <p>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="card-footer ">
                  <hr>
                  <div class="stats">
                    <i class="fa fa-refresh"></i> Total Cadastrados
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6">
              <div class="card card-stats">
                <div class="card-body ">
                  <div class="row">
                    <div class="col-5 col-md-4">
                      <div class="icon-big text-center icon-warning">
                          <i class="far fa-money-bill-alt text-success"></i>
                      </div>
                    </div>
                    <div class="col-7 col-md-8">
                      <div class="numbers">
                        <p class="card-category">Saldo</p>
                        <p class="card-title">0
                          <p>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="card-footer ">
                  <hr>
                  <div class="stats">
                    <i class="fa fa-calendar-o"></i> Saldo do dia
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6">
              <div class="card card-stats">
                <div class="card-body ">
                  <div class="row">
                    <div class="col-5 col-md-4">
                      <div class="icon-big text-center icon-warning">
                          <i class="fas fa-cubes"></i>
                      </div>
                    </div>
                    <div class="col-7 col-md-8">
                      <div class="numbers">
                        <p class="card-category">Sorteio</p>
                        <p class="card-title"><?php echo isset( $num_rows) ?  $num_rows : "0"; ?>
                          <p>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="card-footer ">
                  <hr>
                  <div class="stats">
                    <i class="fa fa-clock-o"></i> Total de Sorteios
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6">
              <div class="card card-stats">
                <div class="card-body ">
                  <div class="row">
                    <div class="col-5 col-md-4">
                      <div class="icon-big text-center icon-warning">
                          <i class="fas fa-user"></i>
                      </div>
                    </div>
                    <div class="col-7 col-md-8">
                      <div class="numbers">
                        <p class="card-category">Cambistas</p>
                        <p class="card-title"><?php echo isset( $num_rows1) ?  $num_rows1 : "0"; ?>
                          <p>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="card-footer ">
                  <hr>
                  <div class="stats">
                    <i class="fa fa-refresh"></i> Cambistas Cadastrados
                  </div>
                </div>
              </div>
            </div>
          </div>
          
      </div>
</div>