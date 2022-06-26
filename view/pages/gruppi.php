<!DOCTYPE html>
<html lang="en">
<?php 
session_start();
?>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/all.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.4/css/bulma.min.css">
    <script defer src="https://use.fontawesome.com/releases/v5.3.1/js/all.js"></script>

    <title>Splitta</title>
</head>

<body class="has-background-light has-navbar-fixed-top">

    <nav class="navbar has-background-white is-fixed-top">
        <div class="navbar-brand">
            <figure class="image is-64x64">
                <a href="gruppi.php">
                    <img src="https://external-content.duckduckgo.com/iu/?u=https%3A%2F%2Ftse1.mm.bing.net%2Fth%3Fid%3DOIP._WaV3Wc3-6z5QMUtA9YccQHaHa%26pid%3DApi&f=1" alt="Splitta Logo">
                </a>
            </figure>
            <a href="gruppi.php"><h3 class="title is-3 py-3 px-2 has-background-white">Splitta</h3></a>
            <div class="navbar-burger" data-target="myNav" id="burger-btn">
                <span aria-hidden="true"></span>
                <span aria-hidden="true"></span>
                <span aria-hidden="true"></span>
            </div>    
        </div>
        <div class="navbar-menu has-background-white" id="myNav">
            <div class="navbar-start">
                <a href="gruppi.php" class="navbar-item ml-2">
                    <span class="icon">
                        <i class="fas fa-users"></i>
                    </span>
                    <span>Gruppi</span>
                </a>

                <a href="nuovo.php" class="navbar-item ml-2">
                    <span class="icon">
                        <i class="fas fa-plus"></i>
                    </span>
                    <span>Nuovo</span>
                </a>

                <a href="inviti.php" class="navbar-item ml-2">
                    <span class="icon">
                        <i class="fas fa-user-plus"></i>
                    </span>
                    <span>Inviti</span>
                </a>
            </div>
            
            <div class="navbar-end">
                <div class="navbar-item">
                    <a href="#" id="logOutBtn" class="button is-danger">
                        <span class="icon">
                            <i class="fas fa-user"></i>
                        </span>
                        <span>Log out</span>
                    </a>
                </div>
            </div>
        </div>
    </nav>

    <main class="pt-6 mb-6">
        <div class="columns is-flex is-justify-content-center">
            <div id= "bacheca" class="column is-10-mobile is-10-tablet is-8-desktop is-8-widescreen is-8-fullhd">
                
                <!--BOX INVITO-->

                <div class="box">
                    <div class="level is-flex is-flex-wrap-wrap">
                        <div class="level-right">
                            <a href="pag_gruppo.php" class="has-text-black">
                                <div class="is-flex is-flex-direction-column">
                                    <p class="content">
                                        <strong>Nome Gruppo</strong>
                                    </p>
                                    <p class="content is-small">
                                        Bilancio: <span id="bilancio">0.00€</span>
                                    </p>
                                </div>
                            </a>
                        </div>
                        <div class="level-left">
                            <a class="button is-danger is-small">
                                <span class="icon">
                                    <i class="fas fa-times"></i>
                                </span>
                            </a>
                        </div>
                    </div>
                </div>

                <!--FINE BOX INVITO-->
            </div>
        </div>
    </main>
    
    <!--FOOTER CONCLUSIVO-->
    <footer class="footer has-background-warning mt-6">
        <p class="content has-text-centered">Sviluppato da <a href="https://github.com/elettrosanto-pertini" target="_blank">@elettrosanto-pertini</a> usando <a href="https://bulma.io" target="_blank">Bulma Framework</a></p>
        <p class="content has-text-centered">Applicazione creata per puro fine didattico e in nessun modo commerciale.</p>
        <p class="content has-text-centered">This app was created with no commercial intent. The only goal is to learn! <br> (I may have been inspired by already existing apps)</p>
    </footer>
    <script src="../js/main.js"></script>
</body>
</html>