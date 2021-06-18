<?php

try
{
    require('connect_db.php');
    $_query = "SELECT * FROM datos_usuarioss WHERE CORREO=:email";
    $_result = $_connectdb->prepare($_query);
    $_email = $_POST['email'];
    $_password = $_POST['password'];

    $_result->bindValue(":email", $_email);
    $_result->execute();

    $_contador = 0;
   // $_num_register = $_result->rowCount();

    while($_rows = $_result->fetch(PDO::FETCH_ASSOC))
    {
        if(password_verify($_password, $_rows['CONTRASENA']))
        {
            $_contador++;
        }
    }
    if($_contador > 0)
    {
        session_start();
        $_SESSION['email'] = $_email;
        echo "success";
    }
    else
    {
        echo "ERROR.....User or password incorrects";
    }
    //$result->closeCursor();
}
catch(Excepcion $e)
{
    echo ("ERROR....." . $e->getLine());
}

?>