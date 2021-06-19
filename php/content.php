<?php
session_start();
require('connect_db.php');

//$_info = $_GET['info'];

if(!isset($_SESSION['email']))
{
    header("location: ../index.html");
}
$_query = "SELECT * FROM datos_usuarioss WHERE CORREO=:c";
$_connectdb->exec("SET CHARACTER SET utf8");
$_result = $_connectdb->prepare($_query);
$_result->bindValue(":c", $_SESSION['email']);
$_result->execute();

while($_row = $_result->fetch(PDO::FETCH_ASSOC))
{
    $_name = $_row['NOMBRE'];
    $_firstname = $_row['PATERNO'];
    $_lastname = $_row['MATERNO'];
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BOOKWISE</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body class="body-content">
    <header>
        <div class="options">
        <ul>
            <li class="item active"><a href="content.php">Home</a></li>
            <li class="item"><a href="user.php">user</a></li>
            <li class="books-opcions item">books
                <ul class="books-gener">
                <li><a href="aventura.php">Aventura</a></li>
                <li><a href="poema.php">Poema</a></li>
                <li><a href="romance.php">Romance</a></li>
                </ul>
            </li>
            <li class="item"><a href="#contact" class="contact">contact</a></li>
            <li class="item"><a href="logout.php">logout</a></li>
        </ul>
        </div>
        <div class="menu">
        </div>
    </header>
    <main>
        <section class="welcome">
            <p>Hi! <b><?php echo $_name . " " . $_firstname . " " . $_lastname ?></b>
            thanks for visit we our page <b>BOOKWISE</b>, we hope that
            you are great.
            </p>
        </section>
        <section class="second-section">
            <div class="watch">
                <ul class="opcions">
                    <li><a class="option active">Aventura</a></li>
                    <li><a class="option">Poema</a></li>
                    <li><a class="option">Romance</a></li>
                </ul>
                <div class="container-options">
                <div class="picture-1">
                    <img src="../img/aventura/elbosquedelossecretoserinhunter.jpg" alt="">
                    <img src="../img/aventura/elterritoriosalvajeerinhunter.jpg" alt="">
                    <img src="../img/aventura/excalibur.jpeg" alt="">
                    <img src="../img/aventura/fuegoyhieloerinhunter.jpg" alt="">
                    <img src="../img/aventura/grandesaventuras.jpeg" alt="">
                    <img src="../img/aventura/lasagadeloslongevos.jpeg" alt="">
                    <img src="../img/aventura/lasaventurasdeolivercrow.jpeg" alt="">
                    <img src="../img/aventura/laspruebasdeapolo.jpeg" alt="">
                </div>
                <div class="picture-2">
                    <img src="../img/Poema/20Poemasdeamor.jpeg" alt="">
                    <img src="../img/Poema/AntologiaPoetica.jpeg" alt="">
                    <img src="../img/Poema/primerodepoeta.jpeg" alt="">
                    <img src="../img/Poema/poesiacompletas.jpeg" alt="">
                    <img src="../img/Poema/el tio petros.jpg" alt="">
                    <img src="../img/Poema/eldariodeanafrank.jpg" alt="">
                    <img src="../img/Poema/labellezadelmarido.jpeg" alt="">
                    <img src="../img/Poema/lasaventurasdeolivercrow.jpeg" alt="">
                </div>
                <div class="picture-3">
                    <img src="../img/Romance/Adosmetrosdeti.jpeg" alt="">
                    <img src="../img/Romance/ApuestoYMaldito.jpeg" alt="">
                    <img src="../img/Romance/cienañosdeaoledad.jpg" alt="">
                    <img src="../img/Romance/docecuentosperegrinos.jpg" alt="">
                    <img src="../img/Romance/elamorenlostiempodesdecolera.jpg" alt="">
                    <img src="../img/Romance/ElAmorHueleAcafe.jpeg" alt="">
                    <img src="../img/Romance/Elbebenodeseado.jpeg" alt="">
                    <img src="../img/Poema/lasaventurasdeolivercrow.jpeg" alt="">
                </div>
                </div>
            </div>
        </section>
        <section class="my-history">
            <div class="info-author">
                <h3>History of BOOKWISE</h3>
                <p>Hello my friend!. I'm Denis Urías Rodríguez García.
                    I´m a person very kind, I´m a developer of javascript and 
                    I love. 
                    BOOKWISE is a project that I think. Always I like read, cause 
                    I get more wise.
                </p>
            </div>
        </section>
    </main>
    <footer id="contact">
        <div class="info-bookwise">
            <div class="contact-bookwise">
                <div class="thanks"></div>
                <p>Name: BOOKWISE.</p>
                <P>Author: Denis Urías Rodríguez García.</P>
                <p>Fundaction: 06/16/2021</p>
                <p>place: Cunduacán, Tabasco México.</p>
                <p>apps for contact: </p>
                <p><button class="suggerens">Give me suggerens</button></p>
            </div>
            <div class="info-coment">
                <div class="suggerens-user">
                    <div class="error"></div>
                    <h4>help me to update our site</h4>
                    <p>We need that we help yo to follow ahead.</p>
                    <form class="form-suggerens">
                        <input type="text" name="user" value="<?php echo $_SESSION['email']; ?>" hidden>
                        <textarea name="coment" id="coment-textarea" cols="30" rows="10"></textarea>
                        <button class="send-suggerens">Send</button>
                    </form>
                </div>
            </div>  
        </div>
    </footer>
    <script src="../js/content.js"></script>
</body>
</html>