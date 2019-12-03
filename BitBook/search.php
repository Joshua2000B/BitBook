<?php

  if($_GET) {
      if(isset($_GET['book'])) {

          order($_GET['book']);
      }
  }

  function order($book) {

  $book = str_replace($book, "+", " ");

  echo "IN FUNCTION";
  require("dbConnect.php");
  if(isset($_COOKIE["user"])) {

      $sql = "select isbn from book where title = '$book';";

      $isbn = mysqli_query($conn,$sql);

      if(! $isbn) {die('Could not enter data: ' . mysqli_error($conn));}

      echo gettype($isbn);

      $time = date('Y-m-d G:i:s'); 
  
      $sql = "insert into ordered values('$time','".$_COOKIE["user"]."',$book,0);";
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

<!DOCTYPE html>
<html> 
    <link rel="stylesheet" href="BitBook.css">
<header>
    <div class="topnav" >
        <img src="https://st2.depositphotos.com/1069290/5358/v/950/depositphotos_53581759-stock-illustration-book-icon-vector-logo.jpg">
        <a href="feed.html">Books For You</a>
        <form class="example" action="search.php" style="height: 42px;">
            <button type="submit" style="margin-left:0px;">Search</button>
            <input type="text" placeholder="Search.." name="search">
        </form>
    </div>
</header>

<body>

    <?php
      
    // header("Content-type: text/css");
    function get_books($term) {
        $output = shell_exec("python3.8 ../BitBook\ Backend/search.py $term");
        echo "Output (type/contents): <br>";
        echo gettype($output) . "/|||" . $output . "|||";
        echo "<br>";
        if($output == "{}\n") {
          echo '<h1> Sorry! </h1>';
          echo '<p> We were unable to find any books with those criteria, please try again </p>';
          die();
        }
        $array = json_decode($output, true);
        foreach ($array as $book){ 
            echo '<div class="contentsBook" style="margin-top: 5%;">';
            echo '<div class="info" style="text-align: left; sans-serif; color: black; background-color:#2B7A78; border: 2px solid black; width: 45%; height: 500px; margin: auto;">';
            echo '<div class="topPart">';
            echo '<div class="cover" style="margin: 25px; width: 45%; display:inline-block; vertical-align: top;">';
            echo  '<img src="https://render.fineartamerica.com/images/rendered/default/poster/8/10/break/images-medium-5/sherlock-holmes-book-cover-poster-art-2-nishanth-gopinathan.jpg" alt="Cover Photo Did Not Load!" height="55%" width="45%;" float: right;>';
            echo '</div>';
            echo '<div class="description" style="margin: 25px; display:inline-block;">';
            echo '<p id="title">Title: ';
            echo $book['title'];
            echo '</p>';

	    echo '<form action="order.php" method="get">';
            //echo '<input type="submit" class="button" name="test" value="hello" />';
	    //echo '<input type="submit" name="book" value=' . $book["title"] . ' />';
	    //echo $book["title"];
	    echo '<button type="submit" name="book" value = ' . urlencode($book["title"]) . '>Purchase</button></form>';

	    //echo '<button id="btn"' . $book["title"] . ' name="btn"' . $book["title"] . ' onClick="location.href="?book=$book["title"]">Purchase</button>';

            echo '</div>';
            echo '<div class="bottomPart" style="margin: 25px;">';
            echo '<p id="summary">Summary: ';
            echo $book['summary'];
            echo '</p>';
            echo '</div>';
            echo '</div>';
            echo '</div>';
            echo '</div>';
        }
    }
    if(isset($_GET['search'])) {
        get_books($_GET['search']);
    }
    ?>

</body> 
</html>
<link href="https://fonts.googleapis.com/css?family=Roboto&display=swap" rel="stylesheet">
