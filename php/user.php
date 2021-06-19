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
            <li class="item active"><a class="home">Home</a></li>
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
        <section class="information-user">
            <div class="user-content">
                <input type="email" id="user-email" value="<?php echo $_SESSION['email']; ?>" hidden>
            </div>
            <div class="update-user">
            <div class="error">
            </div>
                <h4>Update your information</h4>
                <form class="update-form">
                    <input type="text" name="session" value="<?php echo $_SESSION['email']; ?>" hidden/>
                    <div>
                        <label for="name">Name:</label>
                        <input type="text"  name="name">
                    </div>
                    <div>
                        <label for="firts-name">First name</label>
                        <input type="text" name="first-name">
                    </div>
                    <div>
                        <label for="last-name">Last name:</label>
                        <input type="text" name="last-name" value="">
                    </div> 
                    <div>
                        <label for="email">Email:</label>
                        <input type="email" id="session-email" name="email">
                    </div>
                    <div>
                        <label for="password">Password:</label>
                        <input type="password" name="password">
                    </div>
                    <div>
                        <label for="age">Age:</label>
                        <input type="number" name="age">
                    </div>
                    <div class="send">
                        <button class="send-update">Send</button>
                    </div> 
                </form>
            </div>
        </section>
        <section class="coments-user">
            <div class="coments-all-user">
                <h4>Your suggerens <?php echo $_SESSION['email']; ?></h4>
                <div class="your-coments">
                </div>
            </div>
        </section>
        <section class="books-content">
            <div class="content-likes">
                <h1>Your books favorite</h1>
                <div class="books">
                </div>
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
    <script src="../js/user.js"></script>
    <script src="../js/content.js"></script>
</body>
</html>