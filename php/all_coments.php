<?php
$_email = $_POST['email'];//$_POST['email'];
$_content = "";
if(!empty($_email))
{
    try
    {
        require('connect_db.php');
        $_query = "SELECT coments FROM coments_users WHERE user=:c";
        $_result = $_connectdb->prepare($_query);
        $_result->execute(array('c'=>$_email));
        while($_row = $_result->fetch(PDO::FETCH_ASSOC))
        {
            echo "<p>" .  $_row['coments']  . " </p>";
        }
    }
    catch(Excepcion $_e)
    {
        die("ERROR..." . $_e->getMessage());
    }
}
else
{
    echo "email empty";
}

?>