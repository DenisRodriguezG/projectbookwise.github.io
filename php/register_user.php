<?php
$_name = $_POST['name'];
$_firstName = $_POST['first-name'];
$_lastName = $_POST['last-name'];
$_email = $_POST['email'];
$_password = password_hash($_POST['password'], PASSWORD_DEFAULT, array('cost' => 12 ));
$_age = $_POST['age'];
$_reason = $_POST['reason'];


if(!empty($_name) && !empty($_firstName) && !empty($_lastName) && !empty($_email) && !empty($_password) && !empty($_age) && !empty($_reason))
{
    if(filter_var($_email, FILTER_VALIDATE_EMAIL))
    {
        require("connect_db.php");
        $_queryVerify = "SELECT * FROM datos_usuarioss WHERE CORREO=:c";
        $_result = $_connectdb->prepare($_queryVerify);
        $_result->bindValue(":c", $_email);
        $_result->execute();
        $_column = $_result->rowCount();
        if($_column > 0)
        {
            echo "exits";
        }
        else
        { 
        try
        {

            $_query = "INSERT INTO datos_usuarioss(NOMBRE,PATERNO, MATERNO, CORREO, CONTRASENA, EDAD, RAZON) VALUES (:n, :p, :m, :c, :cn, :a, :r)";
            $_connectdb->exec("SET CHARACTER SET utf8");
            $_result = $_connectdb->prepare($_query);
            $_result->bindValue(":n", $_name);
            $_result->bindValue(":p", $_firstName);
            $_result->bindValue(":m", $_lastName);
            $_result->bindValue(":c", $_email);
            $_result->bindValue(":cn", $_password);
            $_result->bindValue(":a", $_age);
            $_result->bindValue(":r", $_reason);
            $_result->execute();

        }
        catch(Excepcion $_e)
        {
            die("ERROR...." . $_e->getMessage());
        }
        }
    }
    else
    {
        echo "emailI";
    }
}
else
{
    echo "space";
}
?>