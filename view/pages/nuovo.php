
<?php 
session_start();
if(isset($_SESSION['gruppo_id'])){
    $_SESSION['gruppo_id']='';
}
if(!isset($_SESSION['user'])){
    echo 'ACCESS DENIED';
}else{
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/all.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.4/css/bulma.min.css">
    <script defer src="https://use.fontawesome.com/releases/v5.3.1/js/all.js"></script>
    <style>
        .field{
            width:80%;
            max-width:980px;
            margin:0 auto;
        }
        #nuovo-gruppo{
            margin-left:10%;
        }
    </style>

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
                    <a id="logOutBtn" class="button is-danger">
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

                    <h3 id="nuovo-gruppo" class="title is-3">Nuovo Gruppo</h3>

                    <form class="form">

                        <div class="field">
                            <label class="label">Nome Gruppo</label>
                            <div class="control">
                                <input type="text" class="input" id="nome_gruppo" placeholder="Es: Calcetto-2022" required>
                            </div>
                            <span id="nomeGruppo-help"></span>
                        </div>

                        <div class="field">
                            <label class="label">Aggiungi Amici</label>
                            <table class="table is-narrow">
                                <thead>
                                    <th></th>
                                    <th></th>
                                </thead>
                                <tbody id="invite_list">
                                </tbody>
                            </table>
                            <div class="control pt-1">
                                <input class="input" type="search" name="user-search" id="user-search" placeholder="Es: mario_rossi97">
                            </div>
                            <span id="invitato-help" class="aiuto"></span>
                        </div>

                        <div class="field">
                            <div class="control">
                                <button id="aggiungi-btn" class="button is-info is-small" type="button">
                                    <span class="icon">
                                        <i class="fas fa-plus"></i>
                                    </span>
                                    <span>Aggiungi</span>
                                </button>
                            </div>
                        </div>

                        <div class="field mt-6">
                            <div class="control">
                                <button class="button is-success" id="conferma_btn" type="button">Conferma</button>
                            </div>
                        </div>

                    </form>
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
    <script src="../js/nuovo.js"></script>
    <script src="../js/nuovo_validation.js"></script>
</body>
</html>
<?php }?>