<?php

$color=getColor(11);

function getColor($n){

    // Is number between 1 and 5?
    if($n>=1 && $n<=5) return "green";

    // Is number between 6 and 10?
    if($n>=6 && $n<=10) return "orange";

    // Is number greater than 11
    if($n>11) return "red";

    // Return default (black) for all other numbers
    return "black";

}

?>

<span style='color:<?=$color?>'>Text</span>