<?php
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/all.css">
    <link rel="stylesheet" href="../css/starter.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.4/css/bulma.min.css">
    <script defer src="https://use.fontawesome.com/releases/v5.3.1/js/all.js"></script>
    <title>Splitta</title>
</head>
<body class="has-background-light has-navbar-fixed-top">

    <nav class="navbar has-background-white is-fixed-top">
        <div class="navbar-brand">
            <figure class="image is-64x64">
                <a href="index.php">
                    <img src="https://external-content.duckduckgo.com/iu/?u=https%3A%2F%2Ftse1.mm.bing.net%2Fth%3Fid%3DOIP._WaV3Wc3-6z5QMUtA9YccQHaHa%26pid%3DApi&f=1" alt="Splitta Logo">
                </a>
            </figure>
            <a href="index.php"><h3 class="title is-3 py-3 px-2 has-background-white">Splitta</h3></a>
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
        </div>
    </nav>

    <main class="has-background-light py-5">
        <div class="hero">
            <div class="columns is-flex is-justify-content-center">
                <div class="column is-10-mobile is-10-tablet is-5-desktop is-5-widescreen is-5-fullhd">
                   
                    <div class="box">
                        <h3 class="title is-3" style="text-align:center">Registrati</h3>

                        <form class="form" method="post">

                            <div class="field py-2">
                                <div class="control has-icons-left">
                                    <input id="username" type="text" class="input" placeholder="Username" required>
                                    <span class="icon is-small is-left">
                                        <i class="fas fa-user"></i>
                                    </span>
                                </div>
                            </div>

                            <div class="field py-2">
                                <div class="control has-icons-left">
                                    <input id="email" type="text" class="input" placeholder="Email" required>
                                    <span class="icon is-small is-left">
                                        <i class="fas fa-envelope"></i>
                                    </span>
                                </div>
                            </div>

                            <div class="field py-2">
                                <div class="control has-icons-left">
                                    <input id="password" type="password" class="input" placeholder="Password" required>
                                    <span class="icon is-small is-left">
                                        <i class="fas fa-lock"></i>
                                    </span>
                                </div>
                            </div>

                            <div class="field py-2">
                                <div class="control">
                                    <button id="iscriviti-btn" class="button is-small is-success" type="submit" onclick="registra()" disabled>Iscriviti</button>
                                </div>
                            </div>

                        </form>

                    </div>

                </div>
            </div>
        </div>
    </main>

    <script src="../js/main.js"></script>
    <script src="../js/registrazione.js"></script>
</body>
</html>