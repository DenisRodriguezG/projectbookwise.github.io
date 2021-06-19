<?php
$_email = $_POST['email'];
$_file = $_POST['file'];
$_checkbox = $_POST['checkbox'];
try
{
    require("connect_db.php");
    $_connectdb->exec("SET CHARACTER SET utf8");
    $_query1 = "SELECT * FROM books_favorite WHERE book=:f AND user=:e";
    $_result1 = $_connectdb->prepare($_query1);
    $_result1->bindValue(":f", $_file);
    $_result1->bindValue(":e", $_email);
    $_result1->execute();

    if($_result1->rowCount() > 0)
    {
        $_query2 = "DELETE FROM books_favorite WHERE book=:f AND user=:e";
        $_result2 = $_connectdb->prepare($_query2);
        $_result2->bindValue(":f", $_file);
        $_result2->bindValue(":e", $_email);
        $_result2->execute();
        echo "deleted";
    }
    else
    {
        $_true= "true";
        $_query3 = "INSERT INTO books_favorite(user, book, value) VALUES (:e, :f, :t)";
        $_result3 = $_connectdb->prepare($_query3);
        $_result3->bindValue(":e", $_email);
        $_result3->bindValue(":f", $_file);
        $_result3->bindValue(":t", $_true);
        $_result3->execute();
        echo "added";
    }
}catch(Exception $_e)
{
    die("ERROR...." . $_e.getMessage());
}
?>