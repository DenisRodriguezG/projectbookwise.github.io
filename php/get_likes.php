<?php
$_email = $_POST['email'];
try
{
    require('connect_db.php');
    $_query = "SELECT * FROM books_favorite WHERE user=:e";
    $_result = $_connectdb->prepare($_query);
    $_result->execute(array("e"=>$_email));
    
    while($_rows = $_result->fetch(PDO::FETCH_ASSOC))
    {
        echo  "<div><img src='" . $_rows["book"] . "'></div>";
    }
}
catch(Exception $_e)
{
    die("ERROR..." . getMessage());
}
?>