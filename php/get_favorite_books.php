<?php
$_email = $_POST['email'];
$_file = $_POST['file'];

try
{
    require("connect_db.php");
    $_query = "SELECT * FROM books_favorite WHERE book=:f AND user=:e";
    $_result = $_connectdb->prepare($_query);
    $_result->bindValue(":f",$_file);
    $_result->bindValue(":e", $_email);
    $_result->execute();

    if($_result->rowCount() > 0)
    {
        echo "found";
    }
    else
    {
        echo "not found";
    }
}
catch(Exception $_e)
{
    die("ERROR...." . $_e->getMessage());
}
?>