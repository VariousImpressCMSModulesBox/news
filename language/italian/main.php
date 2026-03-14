<?php
// $Id: main.php,v 1.6 2003/03/26 03:33:17 w4z004 Exp $

// ------------------------------------------------------------------------- //
//       Italian Translation by Marco Ragogna (marco@6b6.net)                //
//                and Andrea Bandino (andrea@6b6.net)                        //
//        webmasters of XOOPS :: Italian Corner  (www.xoops.6b6.net)         //
//              the XOOPS Official Italian Site                              //
//			and Alessandro Ricci (aricci@armordolls.it)						 //
// ------------------------------------------------------------------------- //

//%%%%%%		File Name index.php 		%%%%%
define("_NW_PRINTER","Pagina stampabile");
define("_NW_SENDSTORY","Invia questa notizia a un amico");
define("_NW_READMORE","Leggi tutto...");
define("_NW_COMMENTS","Commenti?");
define("_NW_ONECOMMENT","1 commento");
define("_NW_BYTESMORE","altri %s bytes");
define("_NW_NUMCOMMENTS","%s commenti");
define("_NW_MORERELEASES", "Ulteriori rilasci in ");


//%%%%%%		File Name submit.php		%%%%%
define("_NW_SUBMITNEWS","Invia Notizia");
define("_NW_TITLE","Titolo");
define("_NW_TOPIC","Argomento");
define("_NW_THESCOOP","La notizia");
define("_NW_NOTIFYPUBLISH","Notifica via email nel momento in cui verrà pubblicata");
define("_NW_POST","Invia");
define("_NW_GO","Vai!");
define("_NW_THANKS","Grazie del tuo contributo!"); //submission of news article

define("_NW_NOTIFYSBJCT","Notizia per il mio sito"); // Notification mail subject
define("_NW_NOTIFYMSG","Hey! Hai ricevuto un nuova notizia per il tuo sito."); // Notification mail message

//%%%%%%		File Name archive.php		%%%%%
define("_NW_NEWSARCHIVES","Archivo Notizie");
define("_NW_ARTICLES","Notizie");
define("_NW_VIEWS","Letture");
define("_NW_DATE","Data");
define("_NW_ACTIONS","Azione");
define("_NW_PRINTERFRIENDLY","Pagina stampabile");

define("_NW_THEREAREINTOTAL","Ci sono in tutto %s notizie");

// %s is your site name
define("_NW_INTARTICLE","Ho trovato una notizia interessante su %s");
define("_NW_INTARTFOUND","Ecco una notizia interessante che ho trovato su %s");

define("_NW_TOPICC","Argomento:");
define("_NW_URL","Indirizzo:");
define("_NW_NOSTORY","Spiacenti, ma l'articolo selezionato non esiste.");

//%%%%%%	File Name print.php 	%%%%%

define("_NW_URLFORSTORY","L'indirizzo di questa notizia è:");

// %s represents your site name
define("_NW_THISCOMESFROM","Questa notizia proviene da %s");

// Added by Hervé
define("_NW_ATTACHEDFILES","File allegati:");
define("_NW_ATTACHEDLIB","Questo articolo ha dei file allegati");

define("_NW_NEWSSAMEAUTHORLINK","Notizie dallo stesso autore");
define("_NW_NEWS_NO_TOPICS","Spiacente, ma non esiste alcun argomento, creane uno prima di inserire una notizia");
define("_NW_PREVIOUS_ARTICLE","Articolo Precedente");
define("_NW_NEXT_ARTICLE","Articolo Successivo");
define("_NW_OTHER_ARTICLES","Altri Articoli");

// Added by Hervé in version 1.3 for rating
define("_NW_RATETHISNEWS","Vota questa notizia");
define("_NW_RATEIT","Votala!");
define("_NW_TOTALRATE","Voti totali");
define("_NW_RATINGLTOH","Rango (Ascendente)");
define("_NW_RATINGHTOL","Rango (Discendente)");
define("_NW_RATINGC","Rango: ");
define("_NW_RATINGSCALE","La scala è da 1 a 10, 1 è pessimo e 10 eccellente.");
define("_NW_BEOBJECTIVE","Per favore, cerca di essere oggettivo, se tutti votano 1 o 10 il rango non serve a molto.");
define("_NW_DONOTVOTE","Non votare per le risorse proposte da te.");
define("_NW_RATING","Rango");
define("_NW_VOTE","Vota");
define("_NW_NORATING","Nessun rango selezionato.");
define("_NW_USERAVG","Voto Medio Utente");
define("_NW_DLRATINGS","Rango Notizia (voti totali: %s)");
define("_NW_ONEVOTE","1 voto");
define("_NW_NUMVOTES","%u voti");		// Warning
define("_NW_CANTVOTEOWN","Non puoi votare sulle risorse inserite da te.<br />Tutti i voti sono memorizzati e verificati.");
define("_NW_VOTEDELETED","Dati sul voto cancellati.");
define("_NW_VOTEONCE","Per favore, non votare due volte la stessa risorsa.");
define("_NW_VOTEAPPRE","Apprezziamo il tuo voto.");
define("_NW_THANKYOU","Grazie per aver speso il tempo di votare su %s"); // %s is your site name
define("_NW_RSSFEED","RSS Feed");	// Warning, this text is included insided an Alt attribut (for a picture), so take care to the quotes
define("_NW_AUTHOR","Autore");
define("_NW_META_DESCRIPTION","Meta description");
define("_NW_META_KEYWORDS","Meta keywords");
define("_NW_MAKEPDF","Crea un PDF dall'articolo");
define('_MD_POSTEDON',"Pubblicato il : ");
define("_NW_AUTHOR_ID","ID Autore");
define("_NW_POST_SORRY","Spiacente, ma o non ci sono argomenti, oppure non hai i permessi di inviare in nessun argomento. Se sei il webmaster, vai in 'permessi' e controlla i permessi di invio.");

// Added language definitions for news expiry date
	// The following is not present in the english language file for the
	// current version, so I removed them. If I understand what they are for...
	/*
	define("_AM_EXPARTS","Articoli cancellati");
	define("_AM_EXPIRED","Cancellati");
	define("_AM_CHANGEEXPDATETIME","cambia la data/tempo della cancellazione");
	define("_AM_SETEXPDATETIME","Setta la data/tempo della cancellazione");
	define("_AM_NOWSETEXPTIME","è ora settato a: %s");
	*/


// Added in v 1.50
define("_NW_LINKS","Links");
define("_NW_PAGE","Pagina");
define("_NW_BOOKMARK_ME","Inserisci questo articolo come segnalibro");
define('_AM_NEWS_TOTAL',"Totale articoli di %u");
define('_AM_NEWS_WHOS_WHO',"Chi è chi");
define('_NW_NEWS_LIST_OF_AUTHORS',"Questa è una lista degli autori del sito, clicca sul nome per visualizzare i suoi articoli");
define('_AM_NEWS_TOPICS_DIRECTORY',"Lista degli argomenti");
define("_NW_PAGE_AUTO_SUMMARY","Pagina %d : %s");
?>