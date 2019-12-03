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
        foreach ($array as $book){ 
            echo '<div class="contentsBook" style="margin-top: 5%;">';
            echo '<div class="info" style="text-align: left; sans-serif; color: black; background-color:#2B7A78; border: 2px solid black; width: 45%; height: 500px; margin: auto;">';
            echo '<div class="topPart">';
            echo '<div class="description" style="margin: 25px; display:inline-block;">';
            echo '<p>You have successfully ordered:';
            echo $book['title'];
            echo '</p>';
            echo '<p>Feel free to look for more books while you wait for your book to arrive!';
            echo '</p>';
            echo '</div>';
            echo '</div>';
            echo '</div>';
            echo '</div>';
        }
    }
    else {
        echo "You aren't logged in!";
    }
    }

    ?>

</body> 
</html>
<link href="https://fonts.googleapis.com/css?family=Roboto&display=swap" rel="stylesheet">

