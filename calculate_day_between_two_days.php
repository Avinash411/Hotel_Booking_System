<?php
$earlier = new DateTime("2018-08-05");
$later = new DateTime("2018-08-11");

$diff = $later->diff($earlier)->format("%a");
echo $diff;
?>