<?php
session_start();
if(!isset($_SESSION['email']))
{
    header("location: ../index.html");
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
                <li><a href="romance">Romance</a></li>
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
        <section class="showBooks">
            <div class="content-books">
                <h1>All books of Poema</h1>
                <div class="books">
                <div class="div"><img src="../img/Poema/20Poemasdeamor.jpeg" alt="">
                <div class="box">
                    <form action="" class="form-favorite">
                        <input type="text" name="email" value="<?php echo $_SESSION['email']; ?>" hidden>
                        <input type="text" name="file" value="../img/Poema/20Poemasdeamor.jpeg" hidden>
                        <input type="checkbox" name="checkbox" class="checkbox">
                    </form>
                    <p class="sinopsis">Sinopsis</p>
                </div>
                </div>
                    <div class="div"><img src="../img/Poema/AntologiaPoetica.jpeg" alt="">
                    <div class="box">
                    <form action="" class="form-favorite">
                        <input type="text" name="email" value="<?php echo $_SESSION['email']; ?>" hidden>
                        <input type="text" name="file" value="../img/Poema/AntologiaPoetica.jpeg" hidden>
                        <input type="checkbox" name="checkbox" class="checkbox">
                    </form>
                    <p class="sinopsis">Sinopsis</p>
                </div>
                </div>
                    <div class="div"><img src="../img/Poema/el tio petros.jpg" alt="">
                    <div class="box">
                    <form action="" class="form-favorite">
                        <input type="text" name="email" value="<?php echo $_SESSION['email']; ?>" hidden>
                        <input type="text" name="file" value="../img/Poema/el tio petros.jpg" hidden>
                        <input type="checkbox" name="checkbox" class="checkbox">
                    </form>
                    <p class="sinopsis">Sinopsis</p>
                </div>
                </div>
                    <div class="div"><img src="../img/Poema/eldariodeanafrank.jpg" alt="">
                    <div class="box">
                    <form action="" class="form-favorite">
                        <input type="text" name="email" value="<?php echo $_SESSION['email']; ?>" hidden>
                        <input type="text" name="file" value="../img/Poema/eldariodeanafrank.jpg" hidden>
                        <input type="checkbox" name="checkbox" class="checkbox">
                    </form>
                    <p class="sinopsis">Sinopsis</p>
                </div>
                </div>
                    <div class="div"><img src="../img/Poema/ellibroescuela.jpeg" alt="">
                    <div class="box">
                    <form action="" class="form-favorite">
                        <input type="text" name="email" value="<?php echo $_SESSION['email']; ?>" hidden>
                        <input type="text" name="file" value="../img/Poema/ellibroescuela.jpeg" hidden>
                        <input type="checkbox" name="checkbox" class="checkbox">
                    </form>
                    <p class="sinopsis">Sinopsis</p>
                </div>
                </div>
                    <div class="div"><img src="../img/Poema/laspruebasdeapolo.jpeg" alt="">
                    <div class="box">
                    <form action="" class="form-favorite">
                        <input type="text" name="email" value="<?php echo $_SESSION['email']; ?>" hidden>
                        <input type="text" name="file" value="../img/Poema/laspruebasdeapolo.jpeg" hidden>
                        <input type="checkbox" name="checkbox" class="checkbox">
                    </form>
                    <p class="sinopsis">Sinopsis</p>
                </div>
                </div>
                    <div class="div"><img src="../img/Poema/poesiacompletas.jpeg" alt="">
                    <div class="box">
                    <form action="" class="form-favorite">
                        <input type="text" name="email" value="<?php echo $_SESSION['email']; ?>" hidden>
                        <input type="text" name="file" value="../img/Poema/poesiacompletas.jpeg" hidden>
                        <input type="checkbox" name="checkbox" class="checkbox">
                    </form>
                    <p class="sinopsis">Sinopsis</p>
                </div>
                </div>
                    <div class="div"><img src="../img/Poema/primerodepoeta.jpeg" alt="">
                    <div class="box">
                    <form action="" class="form-favorite">
                        <input type="text" name="email" value="<?php echo $_SESSION['email']; ?>" hidden>
                        <input type="text" name="file" value="../img/Poema/primerodepoeta.jpeg" hidden>
                        <input type="checkbox" name="checkbox" class="checkbox">
                    </form>
                    <p class="sinopsis">Sinopsis</p>
                </div>
                </div>
                </div>
            </div>
        </section>
        <div class="info-book">
            <div class="content-info">
                <h3>Titulo</h3>
                <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Voluptate, ipsa. Ipsa, quia aspernatur. Earum nihil rerum delectus magnam at quod excepturi, dignissimos ex? Debitis quia excepturi repellat fuga nostrum quod!</p>
                <button class="hidden">Hidden</button>
            </div>
        </div>
    </main>
    <footer id="contact">
        <div class="info-bookwise">
            <div class="contact-bookwise">
                <div class="thanks"></div>
                <p>Name: BOOKWISE.</p>
                <P>Author: Denis Ur??as Rodr??guez Garc??a.</P>
                <p>Fundaction: 06/16/2021</p>
                <p>place: Cunduac??n, Tabasco M??xico.</p>
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
    <script src="../js/settings_books.js"></script>
<script src="../js/content.js"></script>
</body>
</html>