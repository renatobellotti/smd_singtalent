<?php
    require('helpers.php');
    
    if ($_GET['ticket_nr'] == '' || !ticketExists($_GET['ticket_nr'])) { 
        // invalid or no hash --> redirect to start page
        header('Location: ' . $home_url);
        die();
    }
    
    // the hash exists --> the vote can be performed
    if(isset($_GET['vote'])) {
        // the form was submitted
        // now check validity of form data
        
        // every priority must be set
        if(isset($_GET['first']) && isset($_GET['second']) && isset($_GET['third'])) {
            // only one vote per candidate!
            if($_GET['first'] != $_GET['second'] && $_GET['first'] != $_GET['third'] && $_GET['second'] != $_GET['third']) {
                // valid vote
                
                // save the vote
                if(saveVote($_GET['first'], $_GET['second'], $_GET['third'], $_GET['ticket_nr'])) {
                    header('Location: ' . $home_url . 'success.php?success=1');
                    die();
                }else{
                    $save_failed = true;
                }
            }else{
                $duplicates = true;
            }
        }else{
            $not_all_set = true;
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
    <link href="css/form.css" rel="stylesheet">

  </head>

  <body>

    <!-- Masthead -->
    <header class="masthead text-white text-center">
      <div class="container">
        <div class="row">
          <div class="col-xl-9 mx-auto">
            <h1 class="mb-5">Dietiker Singtalent</h1>
          </div>
          <div class="col-md-12 col-lg-12 col-xl-12 mx-auto">
            <?php if(isset($not_all_set)): ?>
              <div class="alert alert-danger" role="alert">
                <strong>Bitte alle Prioritäten angeben!</strong>
              </div>
            <?php endif; ?>
                
            <?php if(isset($duplicates)): ?>
                <div class="alert alert-danger" role="alert">
                    <strong>Nur eine Stimme pro KandidatIn erlaubt!</strong>
                </div>
            <?php endif; ?>
            
            <?php if(isset($save_failed)): ?>
                <div class="alert alert-danger" role="alert">
                    <strong>Es gab einen Fehler beim Speichern. Bitte nochmal versuchen!</strong>
                </div>
            <?php endif; ?>

              <form>
                <input type="hidden" name="ticket_nr" value="<?php echo $_GET['ticket_nr']; ?>" /> <!-- needed to prove that the hash is still valid -->
                <fieldset>
                    <h2>Erste Wahl:</h2>
                    <input type="radio" name="first" id="0" value="0"><label for="0">KandidatIn 0</label><br />
                    <input type="radio" name="first" id="1" value="1"><label for="1">KandidatIn 1</label><br />
                    <input type="radio" name="first" id="2" value="2"><label for="2">KandidatIn 2</label><br />
                    <input type="radio" name="first" id="3" value="3"><label for="3">KandidatIn 3</label><br />
                    <input type="radio" name="first" id="4" value="4"><label for="4">KandidatIn 4</label><br />
                </fieldset>
                <fieldset>
                    <h2>Zweite Wahl:</h2>
                    <input type="radio" name="second" id="0" value="0"><label for="0">KandidatIn 0</label><br />
                    <input type="radio" name="second" id="1" value="1"><label for="1">KandidatIn 1</label><br />
                    <input type="radio" name="second" id="2" value="2"><label for="2">KandidatIn 2</label><br />
                    <input type="radio" name="second" id="3" value="3"><label for="3">KandidatIn 3</label><br />
                    <input type="radio" name="second" id="4" value="4"><label for="4">KandidatIn 4</label><br />
                </fieldset>
                <fieldset>
                    <h2>Dritte Wahl:</h2>
                    <input type="radio" name="third" id="0" value="0"><label for="0">KandidatIn 0</label><br />
                    <input type="radio" name="third" id="1" value="1"><label for="1">KandidatIn 1</label><br />
                    <input type="radio" name="third" id="2" value="2"><label for="2">KandidatIn 2</label><br />
                    <input type="radio" name="third" id="3" value="3"><label for="3">KandidatIn 3</label><br />
                    <input type="radio" name="third" id="4" value="4"><label for="4">KandidatIn 4</label><br />
                </fieldset>
                <div class="col-12 col-md-12">
                  <button type="submit" class="btn btn-block btn-lg btn-primary" name="vote" value="vote">Speichern</button>
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
