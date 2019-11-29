<!DOCTYPE html>
<html>
<body>

<?php
function get_books($term) {
        $output = shell_exec("python3.8 ../BitBook\ Backend/search.py $term");
        #echo gettype($output);
        echo "<br>";
        echo $output;
}
echo "OK";
if(isset($_GET['search'])) {
        echo $_GET['search'];
    get_books($_GET['search']);
} else {
    echo "Search not set";
}
?>

</body>
</html>

