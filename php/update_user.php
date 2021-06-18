<?php

$_sessionemail = $_POST['session'];
$_name = $_POST['name'];
$_firstname = $_POST['first-name'];
$_lastname = $_POST['last-name'];
$_email = $_POST['email'];
$_password = password_hash($_POST['password'], PASSWORD_DEFAULT, array('cost' => 12 ));
$_age = $_POST['age'];

if(!empty($_name) && !empty($_firstname) && !empty($_lastname) && !empty($_email) && !empty($_password) && !empty($_age))
{
    if(filter_var($_email, FILTER_VALIDATE_EMAIL))
    {
        try
        {
            require("connect_db.php");
            $_query1 = "SELECT * FROM datos_usuarioss WHERE CORREO=:c";
            $_result1 = $_connectdb->prepare($_query1);
            $_result1->bindValue(":c", $_email);
            $_result1->execute();
            if($_result1->rowCount() > 0)
            {
                echo "exits";
            }
            else
            {
            $_query = "UPDATE datos_usuarioss SET NOMBRE=:n, PATERNO=:p, MATERNO=:m, CORREO=:c,CONTRASENA=:cc, EDAD=:e WHERE CORREO=:s";
            $_connectdb->exec("SET CHARACTER SET utf8");
            $_result = $_connectdb->prepare($_query);
            $_result->bindValue(":n", $_name);
            $_result->bindValue(":p", $_firstname);
            $_result->bindValue(":m", $_lastname);
            $_result->bindValue(":c", $_email);
            $_result->bindValue(":cc", $_password);
            $_result->bindValue(":e", $_age);
            $_result->bindValue(":s", $_sessionemail);
            $_result->execute();
            if($_result->rowCount())
            {
                session_start();
                $_SESSION['email'] = $_email;
                echo $_SESSION['email'];
            }
            $_query2 = "UPDATE coments_users SET user=:u WHERE user=:s";
            $_result2 = $_connectdb->prepare($_query2);
            $_result2->bindValue(':u', $_email);
            $_result2->bindValue(":s", $_sessionemail);
            $_result2->execute();
            }
        }
        catch(Excepcion $_e)
        {
            die("ERROR......" . $_e->getMessage());
        }
    }
    else
    {
        echo "email";    
    }
}
else
{
    echo "space";
}
?>