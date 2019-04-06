<?php
    require('helpers.php');

    // check if somebody tried to login
    if (isset($_GET['ticket_nr'])) { 
        $hash = $_GET['ticket_nr'];

        if(ticketExists($hash)) {
            // successful login --> redirect to voting page
            $url = $home_url . 'vote.php?ticket_nr=' . $hash;
            header('Location: ' . $url);
            die();
        }
    }
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

  </head>

  <body>

    <!-- Masthead -->
    <header class="masthead text-white text-center">
      <div class="container">
        <div class="row">
          <div class="col-xl-9 mx-auto">
            <h1 class="mb-5">Dietiker Singtalent</h1>
          </div>
          <div class="col-md-10 col-lg-8 col-xl-7 mx-auto">
              <?php
                if ($_SERVER['REQUEST_METHOD'] == 'GET') {
                    // check if somebody tried to login, but failed --> display error message
                    if (isset($_GET['ticket_nr'])) { 
                        $hash = $_GET['ticket_nr'];

                        if(!ticketExists($hash)): ?>
                            <div class="alert alert-danger" role="alert">
                              <strong>Ungültiger Code</strong>
                            </div>
                        <?php endif;
                    }
                }
              ?>
              <form>
              <div class="form-row">
                <div class="col-12 col-md-9 mb-2 mb-md-0">
                  <input type="text" id="ticket_nr" name="ticket_nr" class="form-control form-control-lg" placeholder="Ticket-Nr. eingeben...">
                </div>
                <div class="col-12 col-md-3">
                  <button type="submit" class="btn btn-block btn-lg btn-primary">Abstimmen</button>
                </div>
              </div>
              </form>
            
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
