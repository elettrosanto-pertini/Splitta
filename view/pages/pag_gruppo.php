<!DOCTYPE html>
<html lang="en">
<?php 
session_start();
$_SESSION['gruppo_id'] = $_GET['gruppo_id'];
$_SESSION['group_name'] = $_GET['group_name'];
?>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/all.css">
    <link rel="stylesheet" href="../css/pag_gruppo_style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.4/css/bulma.min.css">
    <script defer src="https://use.fontawesome.com/releases/v5.3.1/js/all.js"></script>
    
    <title>Splitta</title>

</head>
<body class="has-background-light has-navbar-fixed-top">

    <!-- MENU DI NAVIGAZIONE -->

    <nav class="navbar has-background-white is-fixed-top">

        <div class="navbar-brand">
            <figure class="image is-64x64">
                <a href="gruppi.php">
                    <img src="https://external-content.duckduckgo.com/iu/?u=https%3A%2F%2Fstatic.vecteezy.com%2Fsystem%2Fresources%2Fpreviews%2F000%2F389%2F221%2Foriginal%2Fthe-letter-s-vector.jpg&f=1&nofb=1" alt="SPLITTA!" width="80">
                </a>
            </figure>
            <a href="gruppi.php"><h3 class="title is-3 py-3 px-2 has-background-white">Splitta</h3></a>

            <div id="burger-btn" class="navbar-burger" data-target="myNav" role="button" aria-label="menu" aria-expanded="false">
                <span aria-hidden="true"></span>
                <span aria-hidden="true"></span>
                <span aria-hidden="true"></span>
            </div>
        </div>

        <div class="navbar-menu" id="myNav">

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

    <!-- CONTENUTO -->

    <main class="py-5 has-background-light">

        <div class="hero">
            <div class="columns is-flex is-justify-content-center">
                <div class="column is-10-mobile is-10-tablet is-8-desktop is-8-widescreen is-8-fullhd">

                    <div id="group-btns" class="mb-3 is-flex is-justify-content-space-between is-flex-wrap-wrap">
                        
                            <a id="eliminaGruppo" class="button is-danger mb-1 p-2 js-modal-trigger" data-target="eliminaGruppo-modal-box">
                                <span class="icon">
                                    <i class="fas fa-times"></i>
                                </span>
                                <span>Elimina Gruppo</span>
                            </a>
                        
                        
                            <a href="#" id="tr_modal_btn" class="button is-success mb-1 p-2 js-modal-trigger" data-target="tr_modal_box">
                                <span class="icon">
                                    <i class="fas fa-plus"></i>
                                </span>
                                <span>Nuova Transazione</span>
                            </a>

                            <a href="transazioni.php" class="button is-info mb-1 p-2">
                                <span class="icon">
                                    <i class="fas fa-dollar-sign"></i>
                                </span>
                                <span>Transazioni</span>
                            </a>
                        
                    </div>

                    <div class="box">
                        <div id="vetrina" class="p-2">
                            <figure class="image is-3by1">
                                <img id="copertina" src="https://external-content.duckduckgo.com/iu/?u=http%3A%2F%2Fgetwallpapers.com%2Fwallpaper%2Ffull%2F8%2Ff%2F4%2F64439.jpg&f=1&nofb=1" alt="Copertina">
                            </figure>

                            <div id="nomeGruppo" class="level is-flex is-justify-content-center mt-2 has-text-weight-bold">
                                <span>Nome Del Gruppo</span>
                            </div>
                    
                            <!-- <div id="utente-1" class="level p-2 hovera is-flex is-flex-wrap-nowrap">
                                <div class="level-left"><strong>Nome utente-1</strong></div>
                                <div class="level-right mt-0">0.00€</div>
                            </div>
                    
                            <div id="utente-2" class="level p-2 hovera is-flex is-flex-wrap-nowrap">
                                <div class="level-left"><strong>Nome utente-2</strong></div>
                                <div class="level-right mt-0">0.00€</div>
                            </div>
                    
                            <div id="utente-3" class="level p-2 hovera is-flex is-flex-wrap-nowrap">
                                <div class="level-left"><strong>Nome utente-3</strong></div>
                                <div class="level-right mt-0">0.00€</div>
                            </div> -->
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- MODALS -->

        <div class="modal" id="tr_modal_box">
            <div class="modal-background"></div>
            <div class="modal-content">
                <div class="box">

                    <form class="form">

                        <div class="field">
                            <label class="label">Destinatario:</label>
                            <div class="control is-flex is-flex-direction-column">
                                <label class="checkbox">
                                    <input type="checkbox" value="Utente1">
                                    Utente1
                                </label>
                                <label class="checkbox">
                                    <input type="checkbox" value="Utente2">
                                    Utente2
                                </label>
                            </div>
                        </div>

                        <hr>

                        <div class="field">
                            <label class="label">Somma</label>
                            <div class="control">
                                <div class="is-flex is-flex-wrap-nowrap">
                                    <span class="p-2">€</span> <input type="number" min="0.01" step="0.01" class="input">
                                </div>
                            </div>
                        </div>

                        <div class="field pt-2">
                            <button type="submit" id="transactionBtn" class="button is-small is-success">Fine</button>
                        </div>
                    </form>

                </div>
            </div>
            <button class="modal-close is-large has-background-danger" aria-label="close"></button>
        </div>

        <div class="modal" id="eliminaGruppo_modal_box">
            <div class="modal-background"></div>
            <div class="modal-content">
                <div class="box">

                    <p class="content">
                        Sei sicuro di voler eliminare il gruppo? I tuoi amici potrebbero pensare che vuoi far sparire i tuoi buffi!
                    </p>
                    <div class="level">
                        <div class="level-left">
                            <button id="eliminaGruppo-effective" class="button is-danger" onclick="deleteGroup(this)">Elimina</button>
                        </div>
                        <div class="level-right">
                            <button class="annulla-btn button is-info">Annulla</button>
                        </div>
                    </div>
                </div>
            </div>
            <button class="modal-close is-large has-background-danger" aria-label="close"></button>
        </div>

    </main>

    <!-- FOOTER CONCLUSIVO -->
    <footer class="footer has-background-warning">
        <p class="content has-text-centered">Sviluppato da <a href="https://github.com/elettrosanto-pertini" target="_blank">@elettrosanto-pertini</a> usando <a href="https://bulma.io" target="_blank">Bulma Framework</a></p>
        <p class="content has-text-centered">Applicazione creata per puro fine didattico e in nessun modo commerciale.</p>
        <p class="content has-text-centered">This app was created with no commercial intent. The only goal is to learn! <br> (I may have been inspired by already existing apps)</p>
    </footer>

    <script src="../js/main.js"></script>
    <script src="../js/pag_gruppo_modals.js"></script>
    <script src="../js/pag_gruppo.js"></script>
</body>
</html>