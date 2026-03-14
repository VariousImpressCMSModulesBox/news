<?php
// $Id: admin.php,v 1.6 2006/09/20 03:33:17 w4z004 Exp $

// ------------------------------------------------------------------------- //
//       Italian Translation by Marco Ragogna (marco@6b6.net)                //
//       Updated Translation by Alessandro Ricci (aricci@armordolls.it)	     //
//            of XOOPS :: Italian Corner  (www.xoops.6b6.net)                //
//              the XOOPS Official Italian Site                              //
// ------------------------------------------------------------------------- //

//%%%%%%	Admin Module Name  Articles 	%%%%%
define("_AM_DBUPDATED","Database aggiornato con successo!");
define("_AM_CONFIG","Amministrazione delle Notizie");
define("_AM_AUTOARTICLES","Notizie automatizzate");
define("_AM_STORYID","ID Notizia");
define("_AM_TITLE","Titolo");
define("_AM_TOPIC","Argomento");
define("_AM_POSTER","Autore");
define("_AM_PROGRAMMED","Data/Ora Programmata");
define("_AM_ACTION","Azione");
define("_AM_EDIT","Modifica");
define("_AM_DELETE","Cancella");
define("_AM_LAST10ARTS","Ultimi 10 Notizie");
define("_AM_PUBLISHED","Pubblicata"); // Published Date
define("_AM_GO","Vai!");
define("_AM_EDITARTICLE","Modifica Notizia");
define("_AM_POSTNEWARTICLE","Invia Notizia");
define("_AM_ARTPUBLISHED","La tua notizia è stata pubblicata!");
define("_AM_HELLO","Ciao %s,");
define("_AM_YOURARTPUB","La notizia inviata al nostro sito è stata pubblicata.");
define("_AM_TITLEC","Titolo: ");
define("_AM_URLC","Indirizzo: ");
define("_AM_PUBLISHEDC","Pubblicata: ");
define("_AM_RUSUREDEL","Sei certo di voler cancellare questa notizia e tutti i suoi commenti?");
define("_AM_YES","Sì");
define("_AM_NO","No");
define("_AM_INTROTEXT","Testo introduttivo");
define("_AM_EXTEXT","Notizia estesa");
define("_AM_ALLOWEDHTML","Consenti i tag HTML:");
define("_AM_DISAMILEY","Disabilita le faccine");
define("_AM_DISHTML","Disabilita i tag HTML");
define("_AM_APPROVE","Approva");
define("_AM_MOVETOTOP","Muovi questa notizia all'inizio");
define("_AM_CHANGEDATETIME","Modifica data/ora di pubblicazione");
define("_AM_NOWSETTIME","Al momento è impostata a: %s"); // %s is datetime of publish
define("_AM_CURRENTTIME","L'ora corrente è: %s");  // %s is the current datetime
define("_AM_SETDATETIME","Imposta la data/ora di pubblicazione");
define("_AM_MONTHC","Mese:");
define("_AM_DAYC","Giorno:");
define("_AM_YEARC","Anno:");
define("_AM_TIMEC","Ora:");
define("_AM_PREVIEW","Anteprima");
define("_AM_SAVE","Salva");
define("_AM_PUBINHOME","Pubblica sulla pagina principale?");
define("_AM_ADD","Aggiungi");

//%%%%%%	Admin Module Name  Topics 	%%%%%

define("_AM_ADDMTOPIC","Aggiungi un argomento principale");
define("_AM_TOPICNAME","Nome dell'argomento");

define("_AM_MAX40CHAR","(max: 255 caratteri)");
define("_AM_TOPICIMG","Immagine dell'argomento");
define("_AM_IMGNAEXLOC","nome immagine + estensione, con l'immagine situata in %s");
define("_AM_FEXAMPLE","es. giochi.gif");
define("_AM_ADDSUBTOPIC","Aggiungi un sotto argomento");
define("_AM_IN","in");
define("_AM_MODIFYTOPIC","Modifica Argomento");
define("_AM_MODIFY","Modifica");
define("_AM_PARENTTOPIC","Argomento Padre");
define("_AM_SAVECHANGE","Salva modifiche");
define("_AM_DEL","Cancella");
define("_AM_CANCEL","Annulla");
define("_AM_WAYSYWTDTTAL","ATTENZIONE: Sei certo di voler cancellare questo argomento e tutti i suoi gli articoli e commenti?");


// Added in Beta6
define("_AM_TOPICSMNGR","Amministrazione degli Argomenti");
define("_AM_PEARTICLES","Invia/Modifica Notizie");
define("_AM_NEWSUB","Nuova Notizia");
define("_AM_POSTED","Inviato");
define("_AM_GENERALCONF","Impostazioni generali");

// Added in RC2
define("_AM_TOPICDISPLAY","Mostra l'immagine dell'argomento?");
define("_AM_TOPICALIGN","Posizione");
define("_AM_RIGHT","Destra");
define("_AM_LEFT","Sinistra");

define("_AM_EXPARTS","Scadenza notizia");
define("_AM_EXPIRED","Scaduta");
define("_AM_CHANGEEXPDATETIME","Cambia la data/ora di scadenza");
define("_AM_SETEXPDATETIME","Imposta la data/ora di scadenza");
define("_AM_NOWSETEXPTIME","Attualmente è impostata a: %s");

// Added in RC3
define("_AM_ERRORTOPICNAME", "Devi inserire un titolo per l'argomento!");
define("_AM_EMPTYNODELETE", "Non c'&acute; niente da cancellare!");

// Added 240304 (Mithrandir)
define('_AM_GROUPPERM', 'Permessi di Inserimento/Approvazione/Visione');
define('_AM_SELFILE','Seleziona file da Caricare');

// Added by Hervé
define('_AM_UPLOAD_DBERROR_SAVE',"Errore nell'allegare il file alla notizia");
define('_AM_UPLOAD_ERROR','Errore nel caricamento del file');
define('_AM_UPLOAD_ATTACHFILE','File Allegati');
define('_AM_APPROVEFORM', 'Permessi di Approvazione');
define('_AM_SUBMITFORM', 'Permessi di Inserimento');
define('_AM_VIEWFORM', 'Permessi di Visualizzazione');

define('_AM_APPROVEFORM_DESC', 'Scegli chi può approvare le News');
define('_AM_SUBMITFORM_DESC', 'Scegli chi può inserire le News');
define('_AM_VIEWFORM_DESC', 'Scegli chi può vedere quali topics');
define('_AM_DELETE_SELFILES', 'Cancella i file selezionati');
define('_AM_TOPIC_PICTURE', 'Carica immagine');
define('_AM_UPLOAD_WARNING', '<B>Attenzione, non dimenticare di settare i permessi di scrittura per la directory: %s</b>');
define('_AM_NEWS_UPGRADECOMPLETE', 'Aggiornamento Completato');
define('_AM_NEWS_UPDATEMODULE', 'Aggiorna i template e i blocchi del modulo');
define('_AM_NEWS_UPGRADEFAILED', 'Aggiornamento Fallito');
define('_AM_NEWS_UPGRADE', 'Aggiorna');
define('_AM_ADD_TOPIC','Aggiungi un Argomento');
define('_AM_ADD_TOPIC_ERROR',"Errore, l'argomento esiste già!");
define('_AM_ADD_TOPIC_ERROR1','ERRORE: Questo argomento non può essere selezionato come padre!');
define('_AM_SUB_MENU','Pubblica questo argomento come sottomenu');
define('_AM_SUB_MENU_YESNO','Sottomenu?');
define('_AM_HITS', 'Visite');
define('_AM_CREATED', 'Creato');

define('_AM_TOPIC_DESCR', "Descrizione dell'argomento");
define('_AM_USERS_LIST', "Lista Utenti");
define('_AM_PUBLISH_FRONTPAGE', "Pubblica nella pagina principale?");
define('_AM_NEWS_UPGRADEFAILED1', 'Impossibile creare la tabella stories_files');
define('_AM_NEWS_UPGRADEFAILED2', "Impossibile modificare la lunghezza del titolo dell'argomento.");
define('_AM_NEWS_UPGRADEFAILED21', "Impossibile aggiungere nuovi campi alla tabella dei topics");
define('_AM_NEWS_UPGRADEFAILED3', 'Impossibile creare la tabella stories_votedata');
define('_AM_NEWS_UPGRADEFAILED4', "Impossibile creare i campi 'rating' e 'voti' nella tabella 'story'");
define('_AM_NEWS_UPGRADEFAILED0', "Per favore, annota i messaggi e cerca di correggere i problemi con phpMyAdmin e il file di definizione sql presente nella directory sql del modulo");
define('_AM_NEWS_UPGR_ACCESS_ERROR',"Errore, per usare lo script di upgrade devi essere un admin di questo modulo");
define('_AM_NEWS_PRUNE_BEFORE', "Elimina storie pubblicate prima del");
define('_AM_NEWS_PRUNE_EXPIREDONLY',"Rimuovi solo le storie scadute");
define('_AM_NEWS_PRUNE_CONFIRM',"Attenzione, stai per rimuovere permanentemente le storie pubblicate prima del %s (questa azione non può essere annullata). Parliamo di %s storie.<br />Sei sicuro?");
define('_AM_NEWS_PRUNE_TOPICS',"Limita ai seguenti argomenti");
define('_AM_NEWS_PRUNENEWS', 'Elimina News');
define('_AM_NEWS_EXPORT_NEWS', 'Esporta News');
define('_AM_NEWS_EXPORT_NOTHING', "Spiacente, non c'è nulla da esportare. Verifica i tuoi criteri");
define('_AM_NEWS_PRUNE_DELETED', '%d storie sono state eliminate');
define('_AM_NEWS_PERM_WARNING', '<h2>Attenzione, hai 3 forms, quindi hai 3 pulsanti "inserimento"</h2>');
define('_AM_NEWS_EXPORT_BETWEEN', 'Esporta le news pubblicate tra il');
define('_AM_NEWS_EXPORT_AND', ' e il ');
define('_AM_NEWS_EXPORT_PRUNE_DSC', "Se non selezioni nulla, tutti gli argomenti verranno utilizzati<br />altrimenti, saranno usati solo quelli selezionati");
define('_AM_NEWS_EXPORT_INCTOPICS', 'Includi le definizioni degli Argomenti?');
define('_AM_NEWS_EXPORT_ERROR', 'Errore durante la creazione del file %s. Operazione interrotta.');
define('_AM_NEWS_EXPORT_READY', "Il tuo file di esportazione xml è pronto per il download. <br>Clicca  <a href='%s'>qui</a> per scaricarlo.<br>Non dimenticare <a href='%s'>di rimuoverlo</a> quando hai finito.");
define('_AM_NEWS_RSS_URL', "URL del feed RSS");
define('_AM_NEWS_NEWSLETTER', "Newsletter");
define('_AM_NEWS_NEWSLETTER_BETWEEN', 'Seleziona le News pubblicate tra');
define('_AM_NEWS_NEWSLETTER_READY', "Il tuo file di newsletter è pronto per il download.<br /><a href='%s'>Clicca su questo link per scaricarlo.</a>.<br />Non dimenticare <a href='%s'>di rimuoverlo</a> quando hai finito.");
define('_AM_NEWS_DELETED_OK',"File cancellato con successo");
define('_AM_NEWS_DELETED_PB',"C'è stato un problema nella cancellazione del file");
define('_AM_NEWS_STATS0','Statistiche degli argomenti');
define('_AM_NEWS_STATS','Statistiche');
define('_AM_NEWS_STATS1','Autori Unici');
define('_AM_NEWS_STATS2','Totali');
define('_AM_NEWS_STATS3','Statistiche sugli Articoli');
define('_AM_NEWS_STATS4','Articoli più letti');
define('_AM_NEWS_STATS5','Articoli meno letti');
define('_AM_NEWS_STATS6','Articoli più votati');
define('_AM_NEWS_STATS7','Autori più letti');
define('_AM_NEWS_STATS8','Autori più votati');
define('_AM_NEWS_STATS9','Maggiori Contirbuenti');
define('_AM_NEWS_STATS10','Statistiche sugli Autori');
define('_AM_NEWS_STATS11',"Conteggio Articoli");
define('_AM_NEWS_HELP',"Aiuto");
define("_AM_NEWS_MODULEADMIN","Amministrazione del Modulo");
define("_AM_NEWS_GENERALSET", "Impostazioni del Modulo" );

define('_AM_NEWS_GOTOMOD','Vai al Modulo');
define('_AM_NEWS_NOTHING',"Spiacente, niente da scaricare, verifica i criteri!");
define('_AM_NEWS_NOTHING_PRUNE',"Spiacente, nessuna notizia da eliminare, verifica i criteri!");
define('_AM_NEWS_TOPIC_COLOR',"Colore per il Topic");
define('_AM_NEWS_COLOR',"Color");
define('_AM_NEWS_REMOVE_BR',"Converti il tag html &lt;br&gt; in un nuova linea?");
// Added in 1.3 RC2
define('_AM_NEWS_PLEASE_UPGRADE',"<a href='upgrade.php'><font color='#FF0000'>Per favore, aggiorna il modulo!</font></a>");


// Added in verisn 1.50
define('_AM_NEWS_NEWSLETTER_HEADER', "Intestazione");
define('_AM_NEWS_NEWSLETTER_FOOTER', "Piè di Pagina");
define('_AM_NEWS_NEWSLETTER_HTML_TAGS', "Rimuovi i tags html?");
define('_AM_NEWS_VERIFY_TABLES','Mantenimento tabelle');
define('_AM_NEWS_METAGEN',"Metagen");
define('_AM_NEWS_METAGEN_DESC',"Metagen è un sistema che ti aiuta ad avere una migliore indicizzazione nei motori di ricerca per le tue pagine web.<br />Infatti se inserisci meta keywords e meta descriptions, il modulo creerà automaticamente le chiavi di indicizzazione.");
define('_AM_NEWS_BLACKLIST',"Lista nera");
define('_AM_NEWS_BLACKLIST_DESC',"Le parole in questa lista non saranno usate per creare meta keywords");
define('_AM_NEWS_BLACKLIST_ADD',"Aggiungi");
define('_AM_NEWS_BLACKLIST_ADD_DSC',"Inserisci parole da aggiungere alla lista<br />(una parola per riga)");
define('_AM_NEWS_META_KEYWORDS_CNT',"Ammontare massimo di meta keywords auto-generate");
define('_AM_NEWS_META_KEYWORDS_ORDER',"Ordine delle keywords");
define('_AM_NEWS_META_KEYWORDS_INTEXT',"Creale in ordine di apparizione nel testo");
define('_AM_NEWS_META_KEYWORDS_FREQ1',"Parole in ordine di frequenza");
define('_AM_NEWS_META_KEYWORDS_FREQ2',"Parole in ordine di frequenza al contrario");
?>