<?php
include 'db_connection.php';
if(isset($_GET['test_id']) and isset($_GET['id'])){
  $testid = (int) $_GET['test_id'];
  $abid = (int) $_GET['id'];
  $sql = "SELECT * FROM javoblar_varaqasi WHERE testid='$testid' AND abty_id='$abid'";
  $result = $dbcon->query($sql);
  if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
      $fish = $row['fish'];
    }
  }
}
else{
  //echo "<script>window.open('select_result.php','_self')</script>";
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Nekovschool.uz</title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="vendors/ti-icons/css/themify-icons.css">
  <link rel="stylesheet" href="vendors/base/vendor.bundle.base.css">
  <script data-require="jquery" data-semver="2.1.4" src="http://code.jquery.com/jquery-2.1.4.min.js"></script>
  <!-- endinject -->
  <!-- inject:css -->
  <link rel="stylesheet" href="css/style.css">
  <!-- endinject -->
</head>

<body>
 
    <!-- partial:../../partials/_navbar.html -->
   
    <!-- partial -->
 
      <!-- partial:../../partials/_sidebar.html -->
      
      <!-- partial -->
  
        <div class="content-wrapper">
          <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title" style="text-align: center;">Test Natijalari</h4>
                  <p class="card-description">
                    FISH: <code><?php
                      echo $fish;
                    ?></code>
                  </p>
                  <div class="container">
                    <div class="row">
                      <div class="col-sm">
                        
                    <table class="table-bordered" id="userTable">
                      <thead>
                          <th>
                            T/r
                          </th>
                          <th>
                          Javob
                          </th>
                          <th>
                            Kalit
                          </th>              
                      </thead>
                      <tbody>
                        <?php
                        $raqam=0;
                        $sql = "SELECT * FROM javoblar_varaqasi WHERE testid='$testid' AND abty_id='$abid'";
                        $result = $dbcon->query($sql);
                        if ($result->num_rows > 0) {
                          while($row = $result->fetch_assoc()) {
                            $javoblar_baza = explode("|", $row['javoblar']);
                            for($i=1;$i<=101;$i++){
                              $javoblar = explode("-", $javoblar_baza[$i-1]);
                              if((int)$javoblar[2]==1){
                                echo "<tr style='background-color:green;'>";
                              }
                              if((int)$javoblar[2]==0){
                                echo "<tr style='background-color:yellow;'>";
                              }
                              echo "<td>".$i."</td>";
                              echo "<td>".$javoblar[1]."</td>";
                              echo "<td>".$javoblar[3]."</td>";
                              echo "</tr>";
                            }
                          }
                        }
                        ?>
                     
                      </tbody>
                    </table>
                      </div>
                      <div class="col-sm">
                        <img src="123.jpg" width="90%">
                      </div>
                      <div class="col-sm">
                        <img src="123.jpg" width="90%">
                      </div>
                    </div>
                  </div>
                  <div>
                    
               
                  </div>
                  
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- content-wrapper ends -->
        <!-- partial:../../partials/_footer.html -->
        
        <!-- partial -->

      <!-- main-panel ends -->
 
    <!-- page-body-wrapper ends -->
  
  <!-- container-scroller -->
  <!-- plugins:js -->
  <script>
    $(function() {
      $('#userTable').on('click', 'tbody tr', function(event) {
       
        $(this).addClass('highlight').siblings().removeClass('highlight');
        var id = $(this).closest("tr").find('td:eq(1)').text();
        
        //window.open("google/"+parseInt(id));
      });


      var getHighlightRow = function() {
        return $('table > tbody > tr.highlight');
      }

    });
  </script>
  <script src="vendors/base/vendor.bundle.base.js"></script>
  <!-- endinject -->
  <!-- Plugin js for this page-->
  <!-- End plugin js for this page-->
  <!-- inject:js -->
  <script src="js/off-canvas.js"></script>
  <script src="js/hoverable-collapse.js"></script>
  <script src="js/template.js"></script>
  <script src="js/todolist.js"></script>
  <!-- endinject -->
  <!-- Custom js for this page-->
  <!-- End custom js for this page-->
</body>

</html>
