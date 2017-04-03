<?php 

function titlecase($word) {
  $word = ucwords($word);
  return $word;
}

function capfirst($word) {
  $word = ucfirst($word);
  return $word;
}

function scionPrice($theName, $scionModels, $theModel, $theQuantity) {
  if ($theModel != 'nothing' && $theQuantity > 0) {
    $valid = true;
    $price = $scionModels[$theModel];
    $total = $price / $theQuantity;
    
    if ($theQuantity < 2) {
      $title = titlecase($theModel).' for '.$theName;
      $theTotal = 'Total: $'.number_format($total, 2);
      $description = $theName.' wants to buy '.$theModel.'.';
    } 

    elseif ($theQuantity > 50) {
      $title = 'Sorry '.titlecase($theName).' we cannot split the order on ' .$thequantity 'transactions';
      $theModel = 'Ooopps!';
      $description = 'We&rsquo;re sorry,'.$theName.',thats too many cards for us to process maybe take alook at something less than $'.number_format($total, 2).'! Or maybe try Venmo!';
    } 

    else {
      $title = .$theName 'is looking at ' titlecase($theModel).' for ';
      $theTotal = 'Total: $'.number_format($total, 2)'.';
      $description = $theName.' wants  '.number_format($theQuantity).' people to split the cost of the Scion'.$theModel.'.';
    }
  } 

  else {
    $valid = false;
  };

  if ($valid == true) {
    return('
      <div class="card my-4 mx-auto" style="width: 20rem;">
        <img class="img-fluid" src="images/'.$theModel.'.jpg" alt="Card image cap">
        <div class="card-block">
          <h2 class="h4 card-title">'.$title.'</h2>
          <p class="card-text">'.$description.'</p>
          <p class="h5">'.$theTotal.'</p>
        </div>
      </div>
    ');
  } else {
    return('
      <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        <p class="m-0"><strong>You need to select a model</strong> </p>
      </div>
    ');
  }
}
