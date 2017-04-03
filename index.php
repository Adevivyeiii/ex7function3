<?php
  // Load the functions
  require_once('functions.php');

  // Scion prices array
  $scionModels = array(
  'frs'=>26255,
  'ia'=>15700,
  'im'=>18460,
  'iq'=>16435,
  'tc'=>19385,
  'xa'=>12780,
  'xb'=>16950,
  'xd'=>15920
  );

  // Process the form request
  if( isset($_POST['submit']) )
  {
      $theName = htmlentities($_POST['name']);
      $theModel = htmlentities($_POST['scion']);
      $theModel = strtolower($theModel); // Lowercase form submission
      $theQuantity = htmlentities($_POST['quantity']);
      $scion = scionPrice($theName, $scionModels, $theModel, $theQuantity);
  } 

  else {
    // User hasn't entered a value
    $theModel = '';
    $scion = '';
    $theName = '';
  }
?>
<!-- *******************************************************************************************************************************************************************************************endphp******************************************************************************************************************************************************************************************* -->

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <title>Split your Scion</title>
    <link rel="stylesheet" href="css/bootstrap.css">
  </head>
  <body class="bg-faded">
    <main class="container py-4">
      <h1 class="pb-4 font-weight-bold text-center">Whats your style?</h1>
      <form class="form-inline justify-content-center" action="" method="post">
        <label for="name" class="sr-only">Name</label>
        <input class="form-control mr-2" type="text" 
        value="<?php echo ( $theName ? $theName : '' );?>" 
        placeholder="Your Name" name="name" id="name"> 
        <span class="mr-2">wants a</span>
        <select class="custom-select mr-2" name="scion" id="scion">

          <?php echo '<option value="'.( $theModel ? $theModel : 'nothing' ).'">'.( $theModel ? capfirst($theModel) : 'Select a Model' ).'</option>'; ?>

          <?php foreach ($scionModels as $model => $price) {
            echo '<option value="'.$model.'">'.capfirst($model).'</option>';
          }; ?>

        </select> 

        <span class="mr-2">split on </span>
        <input class="form-control mr-2" type="number" value="<?php echo ( $theQuantity ? $theQuantity : '' );?>" placeholder="Quantity" name="quantity" id="quantity">
        <button class="btn btn-outline-primary" name="submit" type="submit">Submit</button>
      </form>

      <?php 
        if($scion){
           echo $scion;
        }
      ?>

    </main>

    <script src="https://code.jquery.com/jquery-3.1.1.slim.min.js" integrity="sha384-A7FZj7v+d/sdmMqp/nOQwliLvUsJfDHW+k9Omg/a/EheAdgtzNs3hpfag6Ed950n" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>
  </body>
</html>