<?php
$_coment = $_POST['coment'];
$_userC = $_POST['user'];

if(!empty($_coment))
{
    require('connect_db.php');
    $_query = "INSERT INTO coments_users(user, coments) VALUES (:u, :c)";
    $_result = $_connectdb->prepare($_query);
    $_result->bindValue(":u", $_userC);
    $_result->bindValue(":c", $_coment);
    $_result->execute();
   
    echo "success";
}
else
{
    echo "space";
}
?>