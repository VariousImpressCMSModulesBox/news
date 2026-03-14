<?php
// $Id: modinfo.php,v 1.21 2004/09/01 17:48:07 hthouzard Exp $
// Module Info

// The name of this module
define('_MI_NEWS_NAME','Stiri');

// A brief description of this module
define('_MI_NEWS_DESC','Creaza o sectiunde stiri, in care utilizatorii pot posta stiri/comentarii.');

// Names of blocks for this module (Not all module has blocks)
define('_MI_NEWS_BNAME1','Categorii Stiri');
define('_MI_NEWS_BNAME3','Articol Important');
define('_MI_NEWS_BNAME4','Stiri Populare');
define('_MI_NEWS_BNAME5','Stiri Recente');
define('_MI_NEWS_BNAME6','Modereaza Stiri');
define('_MI_NEWS_BNAME7','Navigare prin categorii');

// Sub menus in main menu block
define('_MI_NEWS_SMNAME1','Trimite Articol');
define('_MI_NEWS_SMNAME2','Arhiva');

// Names of admin menu items
define('_MI_NEWS_ADMENU2', 'Administrare Categorii');
define('_MI_NEWS_ADMENU3', 'Postare/Editare Stiri');
define('_MI_NEWS_GROUPPERMS', 'Permisiuni');
// Added by Hervé for prune option
define('_MI_NEWS_PRUNENEWS', 'Stiri Prune');
// Added by Hervé
define('_MI_NEWS_EXPORT', 'Exportare Stiri');

// Title of config items
define('_MI_STORYHOME', 'Selecteaza numarul de obiecte stiri pentru afisare pe pagina de index');
define('_MI_NOTIFYSUBMIT', 'Selecteaza da pentru a trimite mesaj de notificare unui admin la fiecare trimitere de articol');
define('_MI_DISPLAYNAV', 'Selecteaza da pentru a afisa bloc de navigare in partea superioara a fiecari pagini de modul');
define('_MI_AUTOAPPROVE','Aprobare automata a articolelor fara interventia unui admin?');
define("_MI_ALLOWEDSUBMITGROUPS", "Grupuri ce pot trimite articole");
define("_MI_ALLOWEDAPPROVEGROUPS", "Grupuri ce pot aproba articole");
define("_MI_NEWSDISPLAY", "Mod de afisare Stiri");
define("_MI_NAMEDISPLAY","Nume Autor");
define("_MI_COLUMNMODE","Coloane");
define("_MI_STORYCOUNTADMIN","Numar de articole noi de afisat in interfata admin (aceasta optiune va fi deasemenea folosita la limitarea numarului de categorii afisate in interfata de admin si va fi folosit in statistici) : ");
define('_MI_UPLOADFILESIZE', 'Marime Maxima Fisier de Upload (KB) 1048576 = 1 Meg');
define("_MI_UPLOADGROUPS","Grupuri autorizate pentru a face upload");


// Description of each config items
define('_MI_STORYHOMEDSC', '');
define('_MI_NOTIFYSUBMITDSC', '');
define('_MI_DISPLAYNAVDSC', '');
define('_MI_AUTOAPPROVEDSC', '');
define("_MI_ALLOWEDSUBMITGROUPSDESC", "Grupurile selectate vor putea trimite articole");
define("_MI_ALLOWEDAPPROVEGROUPSDESC", "Grupurile selectate vor putea sa aprobe articole trimise");
define("_MI_NEWSDISPLAYDESC", "Mod Clasic va afisa stirile ordonate dupa data publicarii. Stiri dupa categorie va grupa stirile dupa categorie cu ultima stire in text complet iar pentru restu va afisa doar titlu");
define('_MI_ADISPLAYNAMEDSC', 'Selecteaza modul de afisare a numelui autorului');
define("_MI_COLUMNMODE_DESC","Poti selecta numarul de coloane pentru afisarea listei de articole");
define("_MI_STORYCOUNTADMIN_DESC","");
define("_MI_UPLOADFILESIZE_DESC","");
define("_MI_UPLOADGROUPS_DESC","Selecteaza grupurile ce pot face upload pe server");

// Name of config item values
define("_MI_NEWSCLASSIC", "Clasic");
define("_MI_NEWSBYTOPIC", "Dupa Categorie");
define("_MI_DISPLAYNAME1", "Username");
define("_MI_DISPLAYNAME2", "Nume Real");
define("_MI_DISPLAYNAME3", "Nu afisa autor");
define("_MI_UPLOAD_GROUP1","Cei care Trimit si Aproba");
define("_MI_UPLOAD_GROUP2","Doar cei care Aproba");
define("_MI_UPLOAD_GROUP3","Upload Dezactivat");

// Text for notifications

define('_MI_NEWS_GLOBAL_NOTIFY', 'Global');
define('_MI_NEWS_GLOBAL_NOTIFYDSC', 'Optiuni de notificare globala.');

define('_MI_NEWS_STORY_NOTIFY', 'Articol');
define('_MI_NEWS_STORY_NOTIFYDSC', 'Optiuni de notificare ce se aplica articolului curent.');

define('_MI_NEWS_GLOBAL_NEWCATEGORY_NOTIFY', 'Categorie Noua');
define('_MI_NEWS_GLOBAL_NEWCATEGORY_NOTIFYCAP', 'Primesc notificare cand o categorie noua este creata.');
define('_MI_NEWS_GLOBAL_NEWCATEGORY_NOTIFYDSC', 'Primeste notificari cand o categorie noua este creata.');
define('_MI_NEWS_GLOBAL_NEWCATEGORY_NOTIFYSBJ', '[{X_SITENAME}] {X_MODULE} auto-notify : Categorie noua de stiri');

define('_MI_NEWS_GLOBAL_STORYSUBMIT_NOTIFY', 'Articol Nou Trimis');
define('_MI_NEWS_GLOBAL_STORYSUBMIT_NOTIFYCAP', 'Primesc notificare cand un articol nou este trimis (si asteapta aprobare).');
define('_MI_NEWS_GLOBAL_STORYSUBMIT_NOTIFYDSC', 'Primeste notificari cand un articol nou este trimis (si asteapt aprobare).');
define('_MI_NEWS_GLOBAL_STORYSUBMIT_NOTIFYSBJ', '[{X_SITENAME}] {X_MODULE} auto-notify : Articol nou de stiri trimis');

define('_MI_NEWS_GLOBAL_NEWSTORY_NOTIFY', 'Articol Nou');
define('_MI_NEWS_GLOBAL_NEWSTORY_NOTIFYCAP', 'Primesc notificare cand un articol nou este publicat.');
define('_MI_NEWS_GLOBAL_NEWSTORY_NOTIFYDSC', 'Primeste notificari cand un articol nou de stiri este publicat.');
define('_MI_NEWS_GLOBAL_NEWSTORY_NOTIFYSBJ', '[{X_SITENAME}] {X_MODULE} auto-notify : Nou articol publicat');

define('_MI_NEWS_STORY_APPROVE_NOTIFY', 'Articol Aprobat');
define('_MI_NEWS_STORY_APPROVE_NOTIFYCAP', 'Primesc notificare cand acest articol este aprobat.');
define('_MI_NEWS_STORY_APPROVE_NOTIFYDSC', 'Primeste notificare la aprobarea acestui articol.');
define('_MI_NEWS_STORY_APPROVE_NOTIFYSBJ', '[{X_SITENAME}] {X_MODULE} auto-notify : Articol Aprobat');

define('_MI_RESTRICTINDEX', 'Restrictioneaza Categorii pe Pagina de Index?');
define('_MI_RESTRICTINDEXDSC', 'Daca setezi Da, utilizatorii vor vedea doar stirile listate in indexul categoriilor, si au acces dupa cum a fost setat in Permisiuni Stiri');

define('_MI_NEWSBYTHISAUTHOR', 'Articole ale aceluiasi autor');
define('_MI_NEWSBYTHISAUTHORDSC', 'Daca setezi aceasta optiune Da, atunci un link \'Articole ale acestui autor\' va fi vizibil');

define('_MI_NEWS_PREVNEX_LINK','Afisare link Precedent si Urmator ?');
define('_MI_NEWS_PREVNEX_LINK_DESC','Cand aceasta optiune este setata la \'DA\', doua noi link`uri vor fi vizibile la baza fiecarui articol. Aceste link`uri permit trecerea la articolul precedent sau urmator in concordanta cu data publicarii acestora');
define('_MI_NEWS_SUMMARY_SHOW','Afisare tabela sumar ?');
define('_MI_NEWS_SUMMARY_SHOW_DESC','Cand se foloseste aceasta optiune, un sumar ce contine link`uri catre toate articolele publicate recent va fi vizibil la baza fiecarui articol');
define('_MI_NEWS_AUTHOR_EDIT','Permiti autorilor sa isi editeze articolele ?');
define('_MI_NEWS_AUTHOR_EDIT_DESC','Folosind aceasta optiune, autorii isi pot edita articolele trimise si publicate.');
define('_MI_NEWS_RATE_NEWS','Permiti utilizatorilor sa voteze articole ?');
define('_MI_NEWS_TOPICS_RSS','Activezi Feed`uri RSS per categorii ?');
define('_MI_NEWS_TOPICS_RSS_DESC',"Daca setezi aceasta optiune la 'Da' atunci continutul categoriilor va fi disponibil si in feed`uri RSS");
define('_MI_NEWS_DATEFORMAT', "Format Data");
define('_MI_NEWS_DATEFORMAT_DESC',"Te rugam ca consulti documentia Php (http://fr.php.net/manual/en/function.date.php) pentru mai multe informatii despre cum sa selectezi formatul. Tine cont ca, daca nu completezi acest camp atunci se va folosi modul standard de afisare data");
define('_MI_NEWS_META_DATA', "Activeaza date meta (cuvinte cheie si descriere) ?");
define('_MI_NEWS_META_DATA_DESC', "Daca setezi aceasta optiune la 'Da' atunci cei care aproba publicari vor avea posibilitatea sa introduca urmatoarele date meta : cuvinte cheie si descriere");
define('_MI_NEWS_BNAME8','Articole Aleatorii');
define('_MI_NEWS_NEWSLETTER','Newsletter');
define('_MI_NEWS_STATS','Statistici');
define("_MI_NEWS_FORM_OPTIONS","Optiune Formular");
define("_MI_NEWS_FORM_COMPACT","Compact");
define("_MI_NEWS_FORM_DHTML","DHTML");
define("_MI_NEWS_FORM_SPAW","Spaw Editor");
define("_MI_NEWS_FORM_HTMLAREA","HtmlArea Editor");
define("_MI_NEWS_FORM_FCK","FCK Editor");
define("_MI_NEWS_FORM_KOIVI","Koivi Editor");
define("_MI_NEWS_FORM_OPTIONS_DESC","Selecteaza editorul ce va fis folosit. daca aveti o instalare 'simpla' (ex. folosesti doar editorul din nucleul xoops, continut de pachetul de baza xoops), atunci nu puteti selecta decat DHTML si Compact");
define("_MI_NEWS_KEYWORDS_HIGH","Folosesti Evidentiere Cuvinte Cheie ?");
define("_MI_NEWS_KEYWORDS_HIGH_DESC","Daca folositi aceasta optiune atunci cuvintele cheie scrise in campul de cautare vor fi evidentiate in articole");
define("_MI_NEWS_HIGH_COLOR","Culoare folosita la evidentiere cuvinte cheie ?");
define("_MI_NEWS_HIGH_COLOR_DES","Folositi aceasta optiune DOAR daca ati selectat Da la optiunea precedenta");
define("_MI_NEWS_INFOTIPS","Marime Tooltips");
define("_MI_NEWS_INFOTIPS_DES","Daca folositi aceasta optiune, link`uri legate de stiri vor contine primul (n) caracter al articolului. Daca setati aceasta valoare la 0 atunci infotips vor lipsi");
define("_MI_NEWS_SITE_NAVBAR","Folosete Bara de Navigare Site a Mozilla si Opera ?");
define("_MI_NEWS_SITE_NAVBAR_DESC","Daca setati aceasta optiune la Da atunci vizitatorii vor avea posibilitatea sa foloseasca Bara de Navigare Site pentru a naviga printre articole.");
define("_MI_NEWS_TABS_SKIN","Selecteaza skin de folosit in tab`uri");
define("_MI_NEWS_TABS_SKIN_DESC","Acest skin va fi folosit in toate blocurile ce foloseste tab`uri");
define("_MI_NEWS_SKIN_1","Stil Bara");
define("_MI_NEWS_SKIN_2","Beveled");
define("_MI_NEWS_SKIN_3","Clasic");
define("_MI_NEWS_SKIN_4","Foldere");
define("_MI_NEWS_SKIN_5","MacOs");
define("_MI_NEWS_SKIN_6","Simplu");
define("_MI_NEWS_SKIN_7","Rotunjit");
define("_MI_NEWS_SKIN_8","Stil ZDnet");


// Added in version 1.50
define('_MI_NEWS_BNAME9','Archiva');
define("_MI_NEWS_FORM_TINYEDITOR","TinyEditor");
define("_MI_NEWS_FOOTNOTES","Afiseaza legaturi in versiunea printabila a articolelor tale ?");
define("_MI_NEWS_DUBLINCORE","Ativeaza Dublin Core Metadata ?");
define("_MI_NEWS_DUBLINCORE_DSC","Pentru mai multe informatii, <a href='http://dublincore.org/'>acceseaza acest link</a>");
define("_MI_NEWS_BOOKMARK_ME","Afiseaza un block 'Pune un Bookmark catre acest articol pe aceste site-uri' ?");
define("_MI_NEWS_BOOKMARK_ME_DSC","Acest bloc va fi vizibil pe pagina articolului");
define("_MI_NEWS_FF_MICROFORMAT","Activeaza Firefox 2 Micro Summaries ?");
define("_MI_NEWS_FF_MICROFORMAT_DSC","Pentru mai multe informatii, acceseaza <a href='http://wiki.mozilla.org/Microsummaries' target='_blank'>aceasta pagina</a>");
define("_MI_NEWS_WHOS_WHO","Cine e Cine");
define("_MI_NEWS_METAGEN","Metagen");
define("_MI_NEWS_TOPICS_DIRECTORY","Director Topicuri");
define("_MI_NEWS_ADVERTISEMENT","Reclama");
define("_MI_NEWS_ADV_DESCR","Introdu un text sau cod java pentru a-l afisa in articolele tale");
define("_MI_NEWS_MIME_TYPES","Introdu Mime Types permise pentru upload (separate pe fiecare linie)");
define("_MI_NEWS_ENHANCED_PAGENAV","Foloseste navigator avansat in pagini ?");
define("_MI_NEWS_ENHANCED_PAGENAV_DSC","Prin aceasta optiune poti separa paginile cu ceva de genul : [pagebreak:Titlu Pagina], Linkurile catre pagini sunt inlocuite cu o lista dropdown si poti folosi [summary] pentru a crea sumarul paginilor");
?>