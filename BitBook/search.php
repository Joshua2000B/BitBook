<!DOCTYPE html>
<html>
<body>
<!DOCTYPE html>
<html> 
    <link rel="stylesheet" href="BitBook.css">
<header>
    <div class="topnav" >
        <img src="https://st2.depositphotos.com/1069290/5358/v/950/depositphotos_53581759-stock-illustration-book-icon-vector-logo.jpg">
        <a href="landing.html">Home</a>
        <a href="Feed.html">Books For You</a>
        <form class="example" action="search.php" style="padding-block: 15px;">
            <input type="text" placeholder="Search.." name="search">
            <button type="submit">Search</button>
        </form>
    </div>
</header>

<body>
    <div id="contentsBook">
        <div id="info">
            <div id="topPart">
                <div id="cover">
                        <img src="https://render.fineartamerica.com/images/rendered/default/poster/8/10/break/images-medium-5/sherlock-holmes-book-cover-poster-art-2-nishanth-gopinathan.jpg" alt="Cover Photo Did Not Load!">
                </div> 
                <div id="description">
                    <p id="title">Title: </p> 
                    <!-- <p id="author">Author: </p> -->
                    <button type="button" style="margin: 0px;">Purchase</button>
                </div>
            </div>
            <div id="bottomPart">
                <p id="summary">Summary: </p>
            </div>
        </div>
    </div>


<?php
function get_books($term) {
        $output = shell_exec("python3.8 ../BitBook\ Backend/search.py $term");
        echo $output;
}
if(isset($_GET['search'])) {
    get_books($_GET['search']);
} #else {
  #  echo "Search not set";
  #}
  $array = json_decode($output, true);
foreach ($array as $book){ 
    echo '<div class="contentsBook">';
    echo '<div class="info">';
    echo '<div class="topPart">';
    echo '<div class="cover">';
    echo '<div class="description">';
    echo $book->title;
    echo '<div class="bottomPart">';
    echo $book->summary;
}
?>

</body> 
</html>
<link href="https://fonts.googleapis.com/css?family=Roboto&display=swap" rel="stylesheet">
