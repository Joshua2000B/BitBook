<?php

  if($_GET) {
  echo "HEY";
      if(isset($_GET['book'])) {

          order($_GET['book']);
      }
  }

  function order($book) {

  $book = str_replace("+"," ",$book);

  echo "IN FUNCTION with book: " . $book;
  require("dbConnect.php");
  if(isset($_COOKIE["user"])) {

      $sql = "select isbn from book where title = '$book';";

      $isbn = mysqli_query($conn,$sql);

      if(! $isbn) {die('Could not enter data: ' . mysqli_error($conn));}

      echo gettype($isbn);
      $isbn = $isbn->fetch_row();
      $time = date('Y-m-d G:i:s');

      $sql = "insert into ordered values('$time','".$_COOKIE["user"]."',$isbn[0],0);";
      echo $sql;
      $retval = mysqli_query($conn,$sql);

      if(! $retval) {die('Could not enter data: ' . mysqli_error($conn));}

      mysqli_close($conn);
  }
  else {
      echo "You aren't logged in!";
  }
  }
?>
