<!DOCTYPE html>
<html> 
<body>

<?php
function get_books($term) {
    $output = shell_exec("python \"../Bitbook\ Backend/search.py\" $term");
    echo $output;
}
if(isset($_GET['search'])) {
    get_books($_GET['search']);
}
?>

</body>
</html>