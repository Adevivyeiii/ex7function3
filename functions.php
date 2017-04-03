<?php

function titlecase($word)
{
    $word = ucwords($word);
    return $word;
}

function capfirst($word)
{
    $word = ucfirst($word);
    return $word;
}

function scionPrice($theName, $scionModels, $theModel, $theQuantity)
{
    if ($theModel != 'nothing' && $theQuantity > 0) {
        $valid = true;
        $price = $scionModels[$theModel];
        $total = $price / $theQuantity;
        
        if ($theQuantity == 1) {
            $title       = titlecase($theModel) . ' for $' . $price;
            $theTotal    = 'MSRP: $' . number_format($total, 2);
            $description = $theName . ' wants to buy a Scion ' . $theModel;

        }
        
        elseif ($theQuantity > 10) {
            $title       = 'Ooopps! ' ;
            $theModel    = 'Oopps';
           
            $description = 'We&rsquo;re sorry, ' . $theName . ' ,that&rsquo;s too many cards for us to process, we cannot split the order on  '. $theQuantity . ' transactions, our limit is 10 cards. Please reduce the amount of credit cards or take a look at something less than $' . number_format($price, 2) . '! Or maybe try Venmo!';
           
        }
        
        else {
            $title       = $theName . ' is looking at a Scion ' . titlecase($theModel) . ' for $' . $price;
            $theTotal    = 'Scion ' . $theModel . ' at ' . $price . ' split on ' . number_format($theQuantity) . ' people is $' . number_format($total, 2) . ' per person.';
            $title = $theName . ' wants  ' . number_format($theQuantity) . ' people to split the cost of the Scion' . $theModel . '.';
        }
    }
    
    else {
        $valid = false;
    }
    ;
    
    if ($valid == true) {
        return ('
      <div class="card my-4 mx-auto" style="width: 20rem;">
        <img class="img-fluid" src="images/' . $theModel . '.jpg" alt="Card image cap">
        <div class="card-block">
          <h2 class="h4 card-title">' . $title . '</h2>
          <p1 class="card-text">' . $description . '</p1>
          
          
          <p class="h5">' . $theTotal . ' </p>
        </div>
      </div>
    ');
    } else {
        return ('
      <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        <p class="m-0"><strong>You need to select a model</strong> </p>
      </div>
    ');
    }
}
