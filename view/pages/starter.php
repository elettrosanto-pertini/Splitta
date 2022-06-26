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
<body class="has-background-light">
    <nav class="navbar has-background-white">
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
            <div class="navbar-start"></div>
            <div class="navbar-end">
                <div class="navbar-item">
                    <a href="#" id="accediBtn" class="button is-warning js-modal-trigger" data-target="modal-box">Accedi</a>
                </div>
            </div>
        </div>
    </nav>

    <main class="pt-6 mb-6">
        <div class="hero">
            <div class="container">
                <div class="columns is-10-mobile is-10-tablet is-8-desktop is-8-widescreen is-8-fullhd has-background-warning">
                    <div id= "bacheca" class="column">
                        <div class="box">
                            <h1 class="title is-1">Nessun Gruppo</h1>
                            <p id="warning-message" class="content">Accedi per creare nuovi gruppi coi tuoi amici!</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
    
    <div class="modal" id="modal-box">
        <div class="modal-background"></div>
        <div class="modal-content">
            <div class="box">
                <h3 class="title is-3">Accedi</h3>
                <form class="form">
                    <div class="field">
                        <div class="control has-icons-left">
                            <input id="nameField" type="text" class="input" placeholder="Username" required>
                            <span class="icon is-small is-left">
                                <i class="fas fa-user"></i>
                            </span>
                        </div>
                    </div>
                    <div class="field">
                        <div class="control has-icons-left">
                            <input id="passwordField" type="password" class="input" placeholder="Password" required>
                            <span class="icon is-small is-left">
                                <i class="fas fa-lock"></i>
                            </span>
                        </div>
                    </div>
                    <div class="field">
                        <div class="control">
                            <a href="gruppi.php" class="button is-success">Accedi</a>
                        </div>
                    </div>
                    <div class="field">
                        <div class="control">
                            <p class="content">Non hai un account? <a href="registrazione.php">Registrati</a></p>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <button class="modal-close is-large has-background-danger" aria-label="close"></button>
    </div>
    

    <!--FOOTER CONCLUSIVO-->
    <footer class="footer has-background-warning mt-6">
        <p class="content has-text-centered">Sviluppato da <a href="https://github.com/elettrosanto-pertini" target="_blank">@elettrosanto-pertini</a> usando <a href="https://bulma.io" target="_blank">Bulma Framework</a></p>
        <p class="content has-text-centered">Applicazione creata per puro fine didattico e in nessun modo commerciale.</p>
        <p class="content has-text-centered">This app was created with no commercial intent. The only goal is to learn! <br> (I may have been inspired by already existing apps)</p>
    </footer>
    <script src="../js/starter.js"></script>
</body>
</html>