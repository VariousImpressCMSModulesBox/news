<?php
// $Id: admin.php,v 1.18 2004/07/26 17:51:25 hthouzard Exp $
//%%%%%%	Admin Module Name  Articles 	%%%%%
define("_AM_DBUPDATED","Baza de Date Actulizata cu Succes!");
define("_AM_CONFIG","Configurare Stiri");
define("_AM_AUTOARTICLES","Articole Publicate Automat");
define("_AM_STORYID","ID Articol");
define("_AM_TITLE","Titlu");
define("_AM_TOPIC","Categorie");
define("_AM_POSTER","Potat de");
define("_AM_PROGRAMMED","Data/Ora Programata");
define("_AM_ACTION","Actiune");
define("_AM_EDIT","Editare");
define("_AM_DELETE","Sterge");
define("_AM_LAST10ARTS","Utlimile %d Articole");
define("_AM_PUBLISHED","Publicat la data de"); // Published Date
define("_AM_GO","Mergi!");
define("_AM_EDITARTICLE","Editeaza Articole");
define("_AM_POSTNEWARTICLE","Posteaza Articol Nou");
define("_AM_ARTPUBLISHED","Articolul tau a fost publicat!");
define("_AM_HELLO","Salutare %s,");
define("_AM_YOURARTPUB","Articolul pe care l`ai trimis pe site`ul nostru a fost publicat.");
define("_AM_TITLEC","Titlu: ");
define("_AM_URLC","URL: ");
define("_AM_PUBLISHEDC","Publicat la data de: ");
define("_AM_RUSUREDEL","Esti sigur ca vrei sa stergi acest articol impreuna cu toate comentariile acestuia?");
define("_AM_YES","Da");
define("_AM_NO","Nu");
define("_AM_INTROTEXT","Text Intro");
define("_AM_EXTEXT","Text Extins");
define("_AM_ALLOWEDHTML","Permite HTML:");
define("_AM_DISAMILEY","Dezactiveaza Smiley");
define("_AM_DISHTML","Dezactiveaza HTML");
define("_AM_APPROVE","Aproba");
define("_AM_MOVETOTOP","Muta acest articol la inceput");
define("_AM_CHANGEDATETIME","Modifica data/ora publicarii");
define("_AM_NOWSETTIME","Acum este setat la: %s"); // %s is datetime of publish
define("_AM_CURRENTTIME","Data Curenta este: %s");  // %s is the current datetime
define("_AM_SETDATETIME","Seteaza  data/ora publicarii");
define("_AM_MONTHC","Luna:");
define("_AM_DAYC","Zi:");
define("_AM_YEARC","An:");
define("_AM_TIMEC","Ora:");
define("_AM_PREVIEW","Revizioneaza");
define("_AM_SAVE","Salveaza");
define("_AM_PUBINHOME","Publicare in Baza?");
define("_AM_ADD","Adauga");

//%%%%%%	Admin Module Name  Topics 	%%%%%

define("_AM_ADDMTOPIC","Adauga o categorie Principala");
define("_AM_TOPICNAME","Nume Categorie");
// Warning, changed from 40 to 255 characters.
define("_AM_MAX40CHAR","(max: 255 caractere)");
define("_AM_TOPICIMG","Imagine Topic");
define("_AM_IMGNAEXLOC","nume imagine + extensie localizata in %s");
define("_AM_FEXAMPLE","de exemplu: defiance.gif");
define("_AM_ADDSUBTOPIC","Adauga o SUB-Categorie");
define("_AM_IN","in");
define("_AM_MODIFYTOPIC","Modifica Categorie");
define("_AM_MODIFY","Modifica");
define("_AM_PARENTTOPIC","Categorie Principala");
define("_AM_SAVECHANGE","Salveaza Modificari");
define("_AM_DEL","Sterge");
define("_AM_CANCEL","Anuleaza");
define("_AM_WAYSYWTDTTAL","AVERTISMENT: Esti sigur ca vrei sa stergi aceasta Categorie impreuna cu Articolele si Comentariile continute de aceasta?");


// Added in Beta6
define("_AM_TOPICSMNGR","Administrare Categorii");
define("_AM_PEARTICLES","Posteaza/Editeaza Articole");
define("_AM_NEWSUB","Trimiteri Noi");
define("_AM_POSTED","Postat la data de");
define("_AM_GENERALCONF","Configurare Generala");

// Added in RC2
define("_AM_TOPICDISPLAY","Afisare Imagine Categorie?");
define("_AM_TOPICALIGN","Pozitie");
define("_AM_RIGHT","Dreapta");
define("_AM_LEFT","Stanga");

define("_AM_EXPARTS","Articole Expirate");
define("_AM_EXPIRED","Expirat");
define("_AM_CHANGEEXPDATETIME","Schimba data/ora expirarii");
define("_AM_SETEXPDATETIME","Seteaza data/ora expirarii");
define("_AM_NOWSETEXPTIME","In prezent este setata la: %s");

// Added in RC3
define("_AM_ERRORTOPICNAME", "Trebuie sa introduci un nume de categorie!");
define("_AM_EMPTYNODELETE", "Nu este nimic de sters!");

// Added 240304 (Mithrandir)
define('_AM_GROUPPERM', 'Permisiuni Trimitere/Aprobare/Vizionare');
define('_AM_SELFILE','Selecteaza fisier de upload');

// Added by Hervé
define('_AM_UPLOAD_DBERROR_SAVE','Eroare in timpul atasari fisierului la articol');
define('_AM_UPLOAD_ERROR','Eroare in timpul upload`ului fisierului');
define('_AM_UPLOAD_ATTACHFILE','Fisiere Atasate');
define('_AM_APPROVEFORM', 'Permisiuni Aprobare');
define('_AM_SUBMITFORM', 'Permisiuni Trimitere');
define('_AM_VIEWFORM', 'Permisiuni Vizionare');
define('_AM_APPROVEFORM_DESC', 'Selecteaza, cine poate aproba articole');
define('_AM_SUBMITFORM_DESC', 'Selecteaza, cine poate trimite articole');
define('_AM_VIEWFORM_DESC', 'Selecteaza, cine ce categorii poate vizita');
define('_AM_DELETE_SELFILES', 'Sterge Fisiere Selectate');
define('_AM_TOPIC_PICTURE', 'Upload fotografie');
define('_AM_UPLOAD_WARNING', '<B>Avertisment, nu uita sa aplici permisiunile de scriere pentru folderul urmator : %s</B>');

define('_AM_NEWS_UPGRADECOMPLETE', 'Upgrade Complet');
define('_AM_NEWS_UPDATEMODULE', 'Actualizare templates si blocuri modul');
define('_AM_NEWS_UPGRADEFAILED', 'Upgrade Esuat');
define('_AM_NEWS_UPGRADE', 'Upgrade');
define('_AM_ADD_TOPIC','Adauga o categorie');
define('_AM_ADD_TOPIC_ERROR','Eroare, categorie deja existenta!');
define('_AM_ADD_TOPIC_ERROR1','EROARE: Aceasta categorie nu poate fi selectata ca Principala!');
define('_AM_SUB_MENU','Publica aceasta categorie ca sub meniu');
define('_AM_SUB_MENU_YESNO','Sub-meniu?');
define('_AM_HITS', 'Accesari');
define('_AM_CREATED', 'Creat');

define('_AM_TOPIC_DESCR', "Descriere Categorie");
define('_AM_USERS_LIST', "Lista Utilizatori");
define('_AM_PUBLISH_FRONTPAGE', "Publicare in prima pagina ?");
define('_AM_NEWS_UPGRADEFAILED1', 'Imposibilitate de creare a tabelei stories_files');
define('_AM_NEWS_UPGRADEFAILED2', "Imposibilitate de modificare a titlului categoriei");
define('_AM_NEWS_UPGRADEFAILED21', "Imposibilitate de adaugare de campuri noi in tabela de categorii");
define('_AM_NEWS_UPGRADEFAILED3', 'Imposibilitate de creare a tabelei stories_votedata');
define('_AM_NEWS_UPGRADEFAILED4', "Imposibilitate de creare a celor doua campuri 'votare' si 'voturi' pentru tabela de 'articol' ");
define('_AM_NEWS_UPGRADEFAILED0', "Te rugam sa iei nota de eventuale mesaje si sa incerci sa corectezi problemele folosind phpMyadmin si fisierul de definitii sql disponibil in folderul 'sql' folder a modulului de stiri");
define('_AM_NEWS_UPGR_ACCESS_ERROR',"Eroare, pentru a folosi scriptul de upgrade, trebuie sa fi un admin al acestui modul");
define('_AM_NEWS_PRUNE_BEFORE',"Prune articole ce au fost publicate inainte de");
define('_AM_NEWS_PRUNE_EXPIREDONLY',"Doar inlatura articole ce au expirat");
define('_AM_NEWS_PRUNE_CONFIRM',"Avertisment, esti pe cale de a inlatura definitiv articole ce au fost publicate inainte de %s (aceasta actiune este ireversibila). Reprezinta %s articole.<br />Esti sigur ?");
define('_AM_NEWS_PRUNE_TOPICS',"Limiteaza la urmatoarele categorii");
define('_AM_NEWS_PRUNENEWS', 'Prune stiri');
define('_AM_NEWS_EXPORT_NEWS', 'Exportare Stiri');
define('_AM_NEWS_EXPORT_NOTHING', "Nu era nimic de exportat, verifica criteriile selectionate");
define('_AM_NEWS_PRUNE_DELETED', '%d de articole au fost sterse');
define('_AM_NEWS_PERM_WARNING', '<h2>Avertisment, ai 3 formulare deci ai 3 butoane de submit</h2>');
define('_AM_NEWS_EXPORT_BETWEEN', 'Exporta articole publicate in intervalul');
define('_AM_NEWS_EXPORT_AND', ' si ');
define('_AM_NEWS_EXPORT_PRUNE_DSC', "Daca nu selectezi nimic atunci vor fi folosite toate categoriile<br/> in caz contrar se vor folosi doar categoriile selectate");
define('_AM_NEWS_EXPORT_INCTOPICS', 'Include Definitii Categorii ?');
define('_AM_NEWS_EXPORT_ERROR', 'Eroare in timpul incercarii de a crea fisierul %s. Operatiune intrerupta.');
define('_AM_NEWS_EXPORT_READY', "Fisierul tau xml de exportare este pregatit pentru download. <br /><a href='%s'>Apasa acest link pentru a face download</a>.<br />Nu uita sa <a href='%s'>il stergi</a> odata ce ai terminat.");
define('_AM_NEWS_RSS_URL', "URL a feed`ului RSS");
define('_AM_NEWS_NEWSLETTER', "Newsletter");
define('_AM_NEWS_NEWSLETTER_BETWEEN', 'Selecteaza Stiri publicate in intervalul');
define('_AM_NEWS_NEWSLETTER_READY', "Fisierul tau newsletter este pregatit pentru download. <br /><a href='%s'>Apasa acest link pentru a face download</a>.<br />Nu uita sa  <a href='%s'>il stergi</a> odata ce ai terminat.");
define('_AM_NEWS_DELETED_OK',"Fisier sters cu succes");
define('_AM_NEWS_DELETED_PB',"A intervenit o problema in timpul stergeri fisierului");
define('_AM_NEWS_STATS0','Statistici Categorii');
define('_AM_NEWS_STATS','Statistici');
define('_AM_NEWS_STATS1','Autori Unici');
define('_AM_NEWS_STATS2','Total');
define('_AM_NEWS_STATS3','Statistici Articole');
define('_AM_NEWS_STATS4','Cele mai citite articole');
define('_AM_NEWS_STATS5','Cele mai putin citite articole');
define('_AM_NEWS_STATS6','Cele mai votate articole');
define('_AM_NEWS_STATS7','Cei mai cititi autori');
define('_AM_NEWS_STATS8','Cei mai votati autori');
define('_AM_NEWS_STATS9','Cele mai multe contributii');
define('_AM_NEWS_STATS10','Statistici Autori');
define('_AM_NEWS_STATS11',"Contor Articole");
define('_AM_NEWS_HELP',"Ajutor");
define("_AM_NEWS_MODULEADMIN","Admin Modul");
define("_AM_NEWS_GENERALSET", "Setari Modul" );
define('_AM_NEWS_GOTOMOD','Acceseaza modul');
define('_AM_NEWS_NOTHING',"Nu exista nimic de download, verifica`ti criteriile !");
define('_AM_NEWS_NOTHING_PRUNE',"Nu exista nimic pentru prune, verifica`ti criteriile !");
define('_AM_NEWS_TOPIC_COLOR',"Culori Categorii");
define('_AM_NEWS_COLOR',"Culoare");
define('_AM_NEWS_REMOVE_BR',"Transforma acest tag html &lt;br&gt; intr`o linie noua ?");
// Added in 1.3 RC2
define('_AM_NEWS_PLEASE_UPGRADE',"<a href='upgrade.php'><font color='#FF0000'>Te rugam sa faci upgrade acestui modul !</font></a>");

// Added in verisn 1.50
define('_AM_NEWS_NEWSLETTER_HEADER', "Header");
define('_AM_NEWS_NEWSLETTER_FOOTER', "Footer");
define('_AM_NEWS_NEWSLETTER_HTML_TAGS', "Inlatura taguri html ?");
define('_AM_NEWS_VERIFY_TABLES','Mantenenta tabele');
define('_AM_NEWS_METAGEN',"Metagen");
define('_AM_NEWS_METAGEN_DESC',"Metagen este un sistem ce te ajuta sa ai paginile indexate cat mai bine de catre motoarele de cautare.<br />Except if you type meta keywords and meta descriptions yourself, the module will automatically create them.");
define('_AM_NEWS_BLACKLIST',"Lista Neagra");
define('_AM_NEWS_BLACKLIST_DESC',"Cuvintele din aceasta lista nu vor fi folosite la crearea de meta keywords");
define('_AM_NEWS_BLACKLIST_ADD',"Adauga");
define('_AM_NEWS_BLACKLIST_ADD_DSC',"Introdu cuvintele de adaugat in lista<br />(un cuvant per linie)");
define('_AM_NEWS_META_KEYWORDS_CNT',"Numarul maxim de meta keywords la generare automata");
define('_AM_NEWS_META_KEYWORDS_ORDER',"Ordine Keywords");
define('_AM_NEWS_META_KEYWORDS_INTEXT',"Creare in ordinea aparatiei in text");
define('_AM_NEWS_META_KEYWORDS_FREQ1',"Frecventa ordonarii cuvintelor");
define('_AM_NEWS_META_KEYWORDS_FREQ2',"Frecventa ordonarii inverse a cuvintelor");

?>