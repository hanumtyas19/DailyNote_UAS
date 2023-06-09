<?php
session_start();

$conn = mysqli_connect(
  'localhost',
  'root',
  '',
  'note'
) or die(mysqli_error($mysqli));

?>
