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
    <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.4/css/bulma.min.css"> -->
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

            <div id="burger-btn" class="navbar-burger mt-3" data-target="myNav" role="button" aria-label="menu" aria-expanded="false">
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

    <main class="py-5">

        <div class="hero">
            <div class="columns is-flex is-justify-content-center">
                <div class="column is-10-mobile is-10-tablet is-8-desktop is-8-widescreen is-8-fullhd">
                    <h3 class="title is-3 has-text-centered"><a href="pag_gruppo.php?gruppo_id=<?php echo $_SESSION['gruppo_id']?>&group_name=<?php echo $_SESSION['group_name']?>"><?php echo $_SESSION['group_name']?></a></h3>
                    <div class="level is-flex is-flex-wrap-wrap">
                        <div class="level-right mt-0">
                            <a href="#" id="tr_modal_btn" class="button is-success js-modal-trigger" data-target="tr_modal_box">
                                <span class="icon">
                                    <i class="fas fa-plus"></i>
                                </span>
                                <span>Nuova Transazione</span>
                            </a>
                        </div>
                    </div>
                    <div id="bacheca">
                        <!--SINGOLA TRANSAZIONE-->
                        <!-- <div class="box">
                            <div class="level is-flex is-flex-wrap-wrap">
                                <div class="level-right">
                                    <div class="is-flex is-flex-direction-column">
                                        <label class="label"><strong>nome spesa</strong></label>
                                        <p class="content mb-0"><strong>Da:</strong> <span>Utente1</span></p>
                                        <p class="content mb-0"><strong>Per:</strong> <span>Utente2,Utente5</span></p>
                                        <p class="content mb-0"><strong>Data:</strong> <span>25-05-2022</span></p>
                                    </div>
                                </div>
                                <div class="level-left">
                                    <p class="content"><span>0.00</span>€</p>
                                </div>
                            </div>
                        </div> -->
                        <!--FINE SINGOLA TRANSAZIONE-->
                    </div>
                </div>
            </div>
        </div>

        <div class="modal" id="tr_modal_box">
            <div class="modal-background"></div>
            <div class="modal-content">
                <div class="box">

                    <form class="form">
                        <div class="field">
                            <label class="label">Mittente:</label>
                            <div class="control is-flex is-flex-direction-column is-flex-wrap-wrap" id="mittente">
                                
                            </div>
                        </div>

                        <div class="field">
                            <label class="label">Destinatario:</label>
                            <div class="control is-flex is-flex-direction-column" id="destinatari">
                                
                            </div>
                        </div>

                        <hr>

                        <div class="field">
                            <label class="label">Titolo</label>
                            <div class="control">
                                <input id="nomeSpesa" type="text" class="input" placeholder="Es: Birra x2" required>
                            </div>
                        </div>

                        <div class="field">
                            <label class="label">Somma</label>
                            <div class="control">
                                <div class="is-flex is-flex-wrap-nowrap">
                                    <span class="p-2">€</span> <input type="number" min="0" step="0.01" class="input" id="somma" required>
                                </div>
                            </div>
                        </div>

                        <div class="field pt-4">
                            <button type="button" id="transactionBtn" class="button is-normal is-success" disabled>Fine</button>
                        </div>

                    </form>

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
    <script src="../js/transaction_modal.js"></script>
    <script src="../js/transazioni.js"></script>
    <script src="../js/quota_engine.js"></script>
</body>
</html>