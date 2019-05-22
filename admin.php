<?php
    require('helpers.php');
?>


<!DOCTYPE html>
<html lang="de">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Dietiker Singtalent</title>

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom fonts for this template -->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet">
    <link href="vendor/simple-line-icons/css/simple-line-icons.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,300italic,400italic,700italic" rel="stylesheet" type="text/css">

    <!-- Custom styles for this template -->
    <link href="css/landing-page.css" rel="stylesheet">
    
    <!-- for pie chart -->
    <script src="https://cdn.plot.ly/plotly-latest.min.js"></script>

  </head>

  <body>

    <!-- Masthead -->
    <header class="masthead text-white text-center">
      <div class="overlay"></div>
      <div class="container">
        <div class="row">
          <div class="col-xl-9 mx-auto">
            <h1 class="mb-5">Dietiker Singtalent</h1>
          </div>
          <div class="col-md-10 col-lg-8 col-xl-7 mx-auto">
              <?php
                $admin = false;
                if ($_SERVER['REQUEST_METHOD'] == 'GET') {
                    // check if somebody tried to login, but failed --> display error message
                    if (isset($_GET['password'])) { 
                        $pw = $_GET['password'];

                        if(!correctAdminPassword($pw)) {
                            print "<div class=\"alert alert-danger\" role=\"alert\">
                              <strong>Falsches Passwort</strong>
                            </div>";
                        }else{
                            $admin = true;
                        }
                    }
                }
                
                if($admin) {
                    // count the number of points for each candidate
                    $scores = array(0, 0, 0, 0, 0);
                    
                    $res = $conn->query("SELECT first, second, third FROM hashes WHERE first IS NOT NULL;");
                    $res->data_seek(0);
                    
                    while ($row = $res->fetch_assoc()) {
                        $scores[intval($row['first'])] += 3;
                        $scores[intval($row['second'])] += 2;
                        $scores[intval($row['third'])] += 1;
                    }
                }
              ?>
              
              <?php if($admin): ?>
              <div id='plotDiv'></div>
              
              <script>
                var data = [{
                    values: [<?php foreach($scores as $score){ echo "$score, "; } ?>],
                    labels: [<?php foreach($singers as $singer){ echo "'$singer', "; } ?>],
                    type: 'pie'
                }];
                
                var layout = {
                  height: 600,
                  width: 380,
                  legend: {
                    x: 1,
                  }
                };
                
                Plotly.newPlot('plotDiv', data, layout);
              </script>
              <?php endif; ?>
              
              <?php if(!$admin): ?>
                    <form>
                      <div class="form-row">
                        <div class="col-12 col-md-9 mb-2 mb-md-0">
                          <input type="text" id="password" name="password" class="form-control form-control-lg" placeholder="Administrator-Passwort eingeben...">
                        </div>
                        <div class="col-12 col-md-3">
                          <button type="submit" class="btn btn-block btn-lg btn-primary">Einloggen</button>
                        </div>
                      </div>
                    </form>
              <?php endif; ?>
          </div>
        </div>
      </div>
    </header>

    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  </body>

<?php
    $conn->close();
?>

</html>
