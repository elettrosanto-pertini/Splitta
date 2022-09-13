# Splitta

## Cosa è
Splitta è una applicazione web che ha l'obiettivo di tenere traccia dei movimenti di denaro all'interno di un gruppo di persone, calcolando le somme dovute dai debitori ai creditori.
L'ispirazione viene da <a href="https://splid.app/">Splid</a>. Ovviamente non ho intenzione di commercializzare la mia app, il progetto ha il solo scopo didattico.
<hr>

## Cosa fa
L'app offre la possibilità, previa registrazione, di creare dei "gruppi", cioè delle stanze in cui si possono invitare altri utenti. I gruppi sono pensati per rappresentare una attività 
in cui sono previsti scambi di denaro tra più persone su un periodo di tempo prolungato (Es. gruppi tipo: 'vacanze', 'coinquilini', 'organizzazione ferragosto'...).
Quando un utente paga qualcosa ad un compagno di gruppo, può formalizzare su app il pagamento tramite una "transazione", indicando importo e destinatari. L'app provvede poi al ricalcolo dei bilanci dei singoli utenti.

## Perché l'ho scritta
Ho pensato che questo tipo di applicazione potesse presentarmi un ampio spettro di problemi e così è stato (Tali problemi sono trattati più nel dettaglio ne file "diario_di_bordo.txt").

## *Frontend*
Aspiro ad essere un Full Stack developer, perciò capisco la necessità di sapersi destreggiare anche nella parte frontend. <br>
Così ho affrontato problemi come la ***reattività*** del design e ***l'accessibilità***
con l'aiuto del framework <a href="https://bulma.io/">Bulma</a>.<br> Ho cercato di mantenere uno *stile minimale* ma efficace sia per potermi concentrare sulla parte di logica e backend sia perché la tipologia di applicazione che ho prodotto si presta bene a questo stile, in quanto l'obiettivo non è vendere o trattenere l'utente sul sito ma essere utile, rapida ed efficace.<br>
Una sfida importante è stata quella di gestire le richieste dal client al server, cioè usare JS per gestire i pacchetti di dati sia inviati che ricevuti. Ho scelto di usare il fetch API che è una Promise perché volevo esercitarmi su questo specifico strumento.

## *Backend*
<li>MVC</li>
Mi sono informato sull'architettura MVC e ho deciso di applicarla per prendere dimestichezza. Ho dunque separato la parte di interazione con l'utente ('view'->view) dal gestore delle richieste ('api'->controller) e dalla parte che dialoga con il DB ('modelli'->model).<br><br>
<li>API</li>
Ho costruito un luogo dove ho inserito tutto e il solo codice che riceve delle richieste e dal client e opera di conseguenza, chiedendo a sua volta l'intervento del model. Riceve la risposta del Model, la manipola e la restituisce al client. In pratica è il controller.<br><br>
<li>PDO</li>
In partiolare ho delegato al Model il compito di pulire i dati rozzi prima di passarli al DB. Inoltre, sempre nel Model ho usato il PDO per la gestione delle richieste tramite prepared statements.

## *Database*
Ho utilizzato MySQL poiché parte del pacchetto xampp insieme ad apache e php. Di seguito lo Schema delle relazioni.

![Schema delle Relazioni](https://github.com/elettrosanto-pertini/Splitta/blob/main/schemaSplittaDB.png)
