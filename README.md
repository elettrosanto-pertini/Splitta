# Splitta

<h2>Cosa è</h2>
Splitta è una applicazione web che ha l'obiettivo di tenere traccia dei movimenti di denaro all'interno di un gruppo di persone, calcolando le somme dovute dai debitori ai creditori.
L'ispirazione viene da <a href="https://splid.app/">Splid</a>. Ovviamente non ho intenzione di commercializzare la mia app, il progetto ha il solo scopo didattico.
<hr>
<h2>Cosa fa</h2>
L'app offre la possibilità, previa registrazione, di creare dei "gruppi", cioè delle stanze in cui si possono invitare altri utenti. I gruppi sono pensati per rappresentare una attività 
in cui sono previsti scambi di denaro tra più persone su un periodo di tempo prolungato (Es. gruppi tipo: 'vacanze', 'coinquilini', 'organizzazione ferragosto'...).
Quando un utente paga qualcosa ad un compagno di gruppo, può formalizzare su app il pagamento tramite una "transazione", indicando importo e destinatari. L'app provvede poi al ricalcolo dei bilanci dei singoli utenti.

<h2>Perché l'ho scritta</h2>
Ho pensato che questo tipo di applicazione potesse presentarmi un ampio spettro di problemi e così è stato (Tali problemi sono trattati più nel dettaglio ne file "diario_di_bordo.txt").

<li><h4><em>Frontend</em></h4></li>
Aspiro ad essere un backend developer ma capisco la necessità di sapersi destreggiare anche nella parte frontend. <br>
Così ho affrontato problemi come la <strong><em>reattività</em></strong> del design e <strong><em>l'accessibilità</em></strong>
con l'aiuto del framework <a href="https://bulma.io/">Bulma</a>.<br> Ho cercato di mantenere uno <em>stile minimale</em> ma efficace sia per potermi concentrare sulla parte di logica e backend sia perché la tipologia di applicazione che ho prodotto si presta bene a questo stile, in quanto l'obiettivo non è vendere o trattenere l'utente sul sito ma essere utile, rapida ed efficace.<br>
Una sfida importante è stata quella di gestire le richieste dal client al server, cioè usare JS per gestire i pacchetti di dati sia inviati che ricevuti. Ho scelto di usare il fetch API che è una Promise sia perché l'ho trovata più gestibile di async/await sia perché volevo esercitarmi su questo specifico strumento.

<li><h4><em>Backend</em></h4></li>
Mi sono informato sull'architettura MVC e ho deciso di applicarla per prendere dimestichezza. Ho dunque separato la parte di interazione con l'utente ('view'->view) dal gestore delle richieste ('api'->controller) e dalla parte che dialoga con il DB ('modelli'->model).
In partiolare ho delegato al Model il compito di pulire i dati rozzi prima di passarli al DB. Inoltre, sempre nel Model ho usato il PDO per la gestione delle richieste tramite prepared statements.
