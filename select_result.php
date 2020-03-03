<?php
include 'db_connection.php';
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
  <script src="modalLoading.js"></script>
  <!-- endinject -->
  <style>
    td{
      cursor: pointer;
    }
    .row tbody tr.highlight td {
  background-color: #ccc;
}
  </style>
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
                  <!--<p class="card-description">
                    FISH: <code>Yoriqulov Yorqin</code>
                  </p>-->
                  <div class="form-group">
                    <label for="exampleFormControlSelect2">Testni Tanlang:</label>
                    <select class="form-control" id="exampleFormControlSelect2">
                      <option value="bosh">Tanlang</option>
                    <?php
                      $sql = "SELECT DISTINCT testid FROM javoblar_varaqasi";
                      $result = $dbcon->query($sql);
                      if ($result->num_rows > 0) {
                        while($row = $result->fetch_assoc()) {
                          echo "<option value='".$row['testid']."'>".$row['testid']."</option>";
                        }
                      }
                    ?>
                    </select>
                  </div>
                  <div class="table-responsive pt-3" style="text-align: center;">
                    <table class="table table-bordered" id="userTable" align="center">

                    </table>
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
    var testid;
    $(document).ready(function(){
      $("select.form-control").change(function(){
          modalLoading.init(true);
          testid = $(this).children("option:selected").val();
          $.ajax({
                url: "fetch_model3_select_result.php",        //Path for PHP file to fetch phone models from DB
                method: "POST",                //Fetching method
                data: {testid:testid},    //Data send to the server to get the results
                success:function(data)        //If data fetched successfully from the server, execute this function
                {
                  //modalLoading.stop();
                    // console.log(data);
                    modalLoading.stop();
                    $("#userTable").html("");
                    document.getElementById("userTable").innerHTML += data;
                        //Print the fetched models in the section wih ID - #item
                }
            });
          //alert("You have selected the country - " + selectedCountry);
      });
    });
</script>
  <script>
    $(function() {
      $('#userTable').on('click', 'tbody tr', function(event) {
       
        $(this).addClass('highlight').siblings().removeClass('highlight');
        var abid = $(this).closest("tr").find('td:eq(1)').text();
        window.open("print_result.php?test_id="+parseInt(testid)+"&id="+parseInt(abid));
      });

      $('#btnRowClick').click(function(e) {
        var rows = getHighlightRow();
        if (rows != undefined) {
          alert(rows.attr('id'));
        }
      });

      var getHighlightRow = function() {
        return $('table > tbody > tr.highlight');
      }

    });
  </script>
  <script src="../../vendors/base/vendor.bundle.base.js"></script>
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
