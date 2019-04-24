<?php
    require('helpers.php');
    
    // check if an email address has been entered in the form
    if(isset($_GET['email'])) {
        // check validity of the email address
        if(filter_var($_GET['email'], FILTER_VALIDATE_EMAIL)) {
            $valid_email = true;
            saveEmailAddress($_GET['email']);
        }else{
            $valid_email = false;
        }
    }
    
    // check if the user wants to enter another code
    if(isset($_GET['code'])) {
        header('Location: ' . $home_url);
        die();
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

    <!-- Add this only to the index.php and header.php page -->
    <style>
        header.masthead {
          height: 100%;
        }
    </style>

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
            <?php if(isset($_GET['success'])): ?>
              <div class="alert alert-success text-center" role="alert">
                <strong>Stimmabgabe erfolgreich!</strong><br />
              </div>
            <?php endif; ?>
            
            <div class="col-12 col-md-9 mb-2 mx-auto text-warning">
                <strong>Möchten sie gerne über die Stadtmusik Dietikon auf dem Laufenden gehalten werden?</strong>
            </div>
            
            <?php if(isset($valid_email) && $valid_email): ?>
              <div class="alert alert-success text-center" role="alert">
                <strong>E-Mail-Adresse erfolgreich gespeichert!</strong><br />
              </div>
            <?php endif; ?>
            
            <?php if(isset($valid_email) && !$valid_email): ?>
              <div class="alert alert-danger text-center" role="alert">
                <strong>Ungültige E-Mail-Adresse.</strong><br />
              </div>
            <?php endif; ?>
              
              <form>
              <div class="form-row">
                <div class="col-12">
                  <input type="email" id="email" name="email" class="form-control form-control-lg" placeholder="E-Mail Adresse">
                </div>
                
                <div class="col-12 my-2">
                  <input type="submit" class="btn btn-block btn-lg btn-primary" id="newsletter" name="newsletter" value="Newsletter abonnieren" />
                </div>
              </div>
              </form>
            
          </div>
        </div>
        <form>
          <div class="row">
            <div class="col-md-10 col-lg-8 col-xl-7 mx-auto my-auto">
              <button type="submit" class="btn btn-block btn-lg btn-info" id="code" name="code">Noch einen Code einlösen</button>
            </div>
          </div>
        </form>
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
