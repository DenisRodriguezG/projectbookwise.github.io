<?php
$_email = $_POST['email'];
$_json = "";
try
{
    require('connect_db.php');
    $_query = "SELECT * FROM datos_usuarioss WHERE CORREO=:c";
    $_connectdb->exec("SET CHARACTER SET utf8");
    $_result = $_connectdb->prepare($_query);
    $_result->bindValue(":c", $_email);
    $_result->execute();

    while($_row = $_result->fetch(PDO::FETCH_ASSOC))
    {
        $_json = '{
            "name": "' . $_row["NOMBRE"] . '",
            "firstname": "' . $_row['PATERNO'] . '",
            "lastname": "' . $_row['MATERNO'] . '",
            "email": "' . $_row['CORREO'] . '",
            "age": "' . $_row['EDAD'] . '",
            "reason": "' . $_row['RAZON'] . '"
        }';
    }
    echo $_json;
}
catch(Exception $_e)
{
    die("ERROR..." . $_e->getMessage());
}
?>