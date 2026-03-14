<?php
// $Id: modinfo.php,v 1.21 2004/09/01 17:48:07 hthouzard Exp $
// Module Info

// The name of this module
define('_MI_NEWS_NAME', 'Nyheder');

// A brief description of this module
define('_MI_NEWS_DESC', 'Opretter en Slashdot lignende nyhedssektion, hvor brugerne kan skrive nyheder og kommentarer.');

// Names of blocks for this module (Not all module has blocks)
define('_MI_NEWS_BNAME1', 'Nyhedskategorier');
define('_MI_NEWS_BNAME3', 'Dagens Historie');
define('_MI_NEWS_BNAME4', 'Top Nyheder');
define('_MI_NEWS_BNAME5', 'Seneste Nyt');
define('_MI_NEWS_BNAME6', 'Mindre nyheder');
define('_MI_NEWS_BNAME7', 'Naviger gennem kategorier');

// Sub menus in main menu block
define('_MI_NEWS_SMNAME1', 'Indsend nyheder');
define('_MI_NEWS_SMNAME2', 'Arkiv');

// Names of admin menu items
define('_MI_NEWS_ADMENU2', 'Emne håndtering');
define('_MI_NEWS_ADMENU3', 'Skriv/Redigér nyheder');
define('_MI_NEWS_GROUPPERMS', 'Rettigheder');
// Added by Hervé for prune option
define('_MI_NEWS_PRUNENEWS', 'Fjern nyheder');
// Added by Hervé
define('_MI_NEWS_EXPORT', 'Eksporter nyheder');

// Title of config items
define('_MI_STORYHOME', 'Vælg antallet af nyheder, der skal vises på top-siden');
define('_MI_NOTIFYSUBMIT', 'Vælg ja for at sende en orientéring til webmasteren, når der kommer en ny artikel');
define('_MI_DISPLAYNAV', 'Vælg ja for at vise en navigationsboks øverst på hver nyhedsside');
define('_MI_AUTOAPPROVE', 'Godkend automatisk nyhedsartikler uden administrators indblanding?');
define('_MI_ALLOWEDSUBMITGROUPS', 'Grupper der kan indsende nyheder');
define('_MI_ALLOWEDAPPROVEGROUPS', 'Grupper der kan godkende nyheder');
define('_MI_NEWSDISPLAY', 'Nyhedsvisning indstillinger');
define('_MI_NAMEDISPLAY', 'Forfatters navn');
define('_MI_COLUMNMODE', 'Kolonner');
define('_MI_STORYCOUNTADMIN', 'Antal nye artikler der vises i admin området (dette vil også begrænse antallet af kategorier der vises i admin området og det vil blive benyttet i statistikken) : ');
define('_MI_UPLOADFILESIZE', 'Maksimum filstørrelse på upload (KB) 1048576 = 1 Meg');
define('_MI_UPLOADGROUPS', 'Grupper der må uploade');


// Description of each config items
define('_MI_STORYHOMEDSC', '');
define('_MI_NOTIFYSUBMITDSC', '');
define('_MI_DISPLAYNAVDSC', '');
define('_MI_AUTOAPPROVEDSC', '');
define('_MI_ALLOWEDSUBMITGROUPSDESC', 'De valgte grupper vil kunne indsende nyheder');
define('_MI_ALLOWEDAPPROVEGROUPSDESC', 'De valgte grupper vil kunne godkende nyheder');
define('_MI_NEWSDISPLAYDESC', 'Classic viser alle nyheder i dateorden efter udgivelsesdato. Nyheder pr. kategori vil grupperes efter kategori, den seneste historie vil blive vist i fuld længde - øvrige vil kun vises med overskrift.');
define('_MI_ADISPLAYNAMEDSC', 'Vælg hvordan forfatters navn skal vises.');
define('_MI_COLUMNMODE_DESC', 'Du kan vælge antallet af kolonner for visning af artikel-liste');
define('_MI_STORYCOUNTADMIN_DESC', '');
define('_MI_UPLOADFILESIZE_DESC', '');
define('_MI_UPLOADGROUPS_DESC', 'Vælg hvilke grupper der kan uploade til serveren');

// Name of config item values
define('_MI_NEWSCLASSIC', 'Classic');
define('_MI_NEWSBYTOPIC', 'Efter kategori');
define('_MI_DISPLAYNAME1', 'Brugernavn');
define('_MI_DISPLAYNAME2', 'Rigtige navn');
define('_MI_DISPLAYNAME3', 'Vis ikke forfatter');
define('_MI_UPLOAD_GROUP1', 'Indsender og godkender');
define('_MI_UPLOAD_GROUP2', 'Kun godkender');
define('_MI_UPLOAD_GROUP3', 'Upload ikke muligt');

// Text for notifications

define('_MI_NEWS_GLOBAL_NOTIFY', 'Global');
define('_MI_NEWS_GLOBAL_NOTIFYDSC', 'Indstillinger for globale nyhedsorientéringer.');

define('_MI_NEWS_STORY_NOTIFY', 'Artikel');
define('_MI_NEWS_STORY_NOTIFYDSC', 'Orientéringsmuligheder for den aktuelle historie.');

define('_MI_NEWS_GLOBAL_NEWCATEGORY_NOTIFY', 'Nyt emne');
define('_MI_NEWS_GLOBAL_NEWCATEGORY_NOTIFYCAP', 'Orientér mig når et nyt emne bliver oprettet.');
define('_MI_NEWS_GLOBAL_NEWCATEGORY_NOTIFYDSC', 'Modtag orientéring når et nyt emne oprettes.');
define('_MI_NEWS_GLOBAL_NEWCATEGORY_NOTIFYSBJ', '[{X_SITENAME}] {X_MODULE} auto-orientéring : Nyt nyhedsemne');

define('_MI_NEWS_GLOBAL_STORYSUBMIT_NOTIFY', 'Ny artikel er blevet indsendt');
define('_MI_NEWS_GLOBAL_STORYSUBMIT_NOTIFYCAP', 'Orientér mig når en nyhedsartikel (hvilken som helst) bliver indsendt (og afventer godkendelse).');
define('_MI_NEWS_GLOBAL_STORYSUBMIT_NOTIFYDSC', 'Modtag orientéring når en nyhedsartikel (hvilken som helst) bliver indsendt (og afventer godkendelse).');
define('_MI_NEWS_GLOBAL_STORYSUBMIT_NOTIFYSBJ', '[{X_SITENAME}] {X_MODULE} auto-orientéring : Ny nyhedsartikel er blevet indsendt');

define('_MI_NEWS_GLOBAL_NEWSTORY_NOTIFY', 'Ny artikel');
define('_MI_NEWS_GLOBAL_NEWSTORY_NOTIFYCAP', 'Orientér mig når en nyhedsartikel (hvilken som helst) bliver udgivet.');
define('_MI_NEWS_GLOBAL_NEWSTORY_NOTIFYDSC', 'Modtag orientéring når en nyhedsartikel (hvilken som helst) bliver udgivetReceive notification when any new story is posted.');
define('_MI_NEWS_GLOBAL_NEWSTORY_NOTIFYSBJ', '[{X_SITENAME}] {X_MODULE} auto-orientéring : Ny nyhedsartikel');

define('_MI_NEWS_STORY_APPROVE_NOTIFY', 'Artikel er blevet godkendt');
define('_MI_NEWS_STORY_APPROVE_NOTIFYCAP', 'Orientér mig, når denne artikel bliver godkendt.');
define('_MI_NEWS_STORY_APPROVE_NOTIFYDSC', 'Modtag orientéring når denne artikel bliver godkendt.');
define('_MI_NEWS_STORY_APPROVE_NOTIFYSBJ', '[{X_SITENAME}] {X_MODULE} auto-orientéring : Artiklen er blevet godkendt');

define('_MI_RESTRICTINDEX', 'Begræns kategorier på index siden?');
define('_MI_RESTRICTINDEXDSC', 'Hvis dette sættes til ja, vil brugerne kun se nyheder på indexsiden, som de har rettigheder til.');

define('_MI_NEWSBYTHISAUTHOR', 'Nyheder af samme forfatter');
define('_MI_NEWSBYTHISAUTHORDSC', 'Hvis dette sættes til ja, et link \'artikler af denne forfatter\' vil blive synlig');

define('_MI_NEWS_PREVNEX_LINK', 'Vis forrige og næste link ?');
define('_MI_NEWS_PREVNEX_LINK_DESC', 'Når denne sættes til \'Ja\', to nye links bliver synlige i bunden af hver artikel. Det er de link der benyttes til at gå til den forrige og den næste artikel, i forhold til udgivelsesdatoen');
define('_MI_NEWS_SUMMARY_SHOW', 'Vis resumé liste?');
define('_MI_NEWS_SUMMARY_SHOW_DESC', 'Når dette benyttes, vises et resumé med links til alle tidligere udgivet artikler i bunden af hver artikel');
define('_MI_NEWS_AUTHOR_EDIT', 'Må forfatter redigerer deres egne poster ?');
define('_MI_NEWS_AUTHOR_EDIT_DESC', 'Hvis dette sættes til, kan forfatteren selv redigerer deres indsendelser.');
define('_MI_NEWS_RATE_NEWS', 'Lad brugerne bedømme nyheder ?');
define('_MI_NEWS_TOPICS_RSS', 'Slå RSS feeds til for kategorier ?');
define('_MI_NEWS_TOPICS_RSS_DESC', 'Hvis dette sættes til \'Ja\', vil indholdet af kategorierne blive tilgængelige som RSS feeds');
define('_MI_NEWS_DATEFORMAT', 'Dato format');
define('_MI_NEWS_DATEFORMAT_DESC', 'Se venligst i php dokumentationen (www.php.net/manual/da/function.date.php\') for mere information om brug af datoformat. Bemærk, hvis du ikke angiver noget vil default format benyttes.');
define('_MI_NEWS_META_DATA', 'Enable meta datas (keywords and description) to be entered ?');
define('_MI_NEWS_META_DATA_DESC', 'Hvis du sætter dette til \'Ja\' vil godkenderne være i stand til at angive følgende meta data: søgeord og beskrivelse');
define('_MI_NEWS_BNAME8', 'Tilfældig nyhed');
define('_MI_NEWS_NEWSLETTER', 'Nyhedsbrev');
define('_MI_NEWS_STATS', 'Statistik');
define('_MI_NEWS_FORM_OPTIONS', 'Form mulighed');
define('_MI_NEWS_FORM_COMPACT', 'Kompakt');
define('_MI_NEWS_FORM_DHTML', 'DHTML');
define('_MI_NEWS_FORM_SPAW', 'Spaw Editor');
define('_MI_NEWS_FORM_HTMLAREA', 'HtmlArea Editor');
define('_MI_NEWS_FORM_FCK', 'FCK Editor');
define('_MI_NEWS_FORM_KOIVI', 'Koivi Editor');
define('_MI_NEWS_FORM_OPTIONS_DESC', 'Vælg hvilken editor der benyttes. Hvis du har en normal installation (bare benytter xoops egen editor, som installeres sammen med xoops), så skal du bare vælge DHTML og kompakt');
define('_MI_NEWS_KEYWORDS_HIGH', 'Benyt søgeords fremhævning ?');
define('_MI_NEWS_KEYWORDS_HIGH_DESC', 'Hvis du bentter dette vil søgeord blive fremhævet i artiklerne');
define('_MI_NEWS_HIGH_COLOR', 'Farve til fremhævede søgeord ?');
define('_MI_NEWS_HIGH_COLOR_DES', 'Brug kun denne mulighed, hvis du har valgt Ja i forrige mulighed.');
define('_MI_NEWS_INFOTIPS', 'Tooltips længde');
define('_MI_NEWS_INFOTIPS_DES', 'Hvis du benytter dette, link relateret til nyheder vil indeholde de første (n) karakterer fra artiklen. Hvis du sætter værdien til 0 vil infotips være tomt');
define('_MI_NEWS_SITE_NAVBAR', 'Brug Mozilla og Opera side navigations bar ?');
define('_MI_NEWS_SITE_NAVBAR_DESC', 'Hvis du sætter denne til Ja, vil brugerne være i stand til at benytte side navigationsbaren til navigering i dine artikler.');
define('_MI_NEWS_TABS_SKIN', 'Vælg hvilket udseende der skal bruges i faner');
define('_MI_NEWS_TABS_SKIN_DESC', 'Dette udseende vil blive benyttet i alle blokke der bruger faner');
define('_MI_NEWS_SKIN_1', 'Bar Style');
define('_MI_NEWS_SKIN_2', 'Afskåret');
define('_MI_NEWS_SKIN_3', 'Classic');
define('_MI_NEWS_SKIN_4', 'Folder');
define('_MI_NEWS_SKIN_5', 'MacOs');
define('_MI_NEWS_SKIN_6', 'Plain');
define('_MI_NEWS_SKIN_7', 'Afrundet');
define('_MI_NEWS_SKIN_8', 'ZDnet style');

// Added in version 1.50
define('_MI_NEWS_BNAME9', 'Archives');
define('_MI_NEWS_FORM_TINYEDITOR', 'TinyEditor');
define('_MI_NEWS_FOOTNOTES', 'Vis links i printversionen af dine artikler ?');
define('_MI_NEWS_DUBLINCORE', 'Aktiver Dublin Core Metadata ?');
define('_MI_NEWS_DUBLINCORE_DSC', 'For mere information, <a hreh=\'http:
define("_MI_NEWS_BOOKMARK_ME","Vis \'Bookmark denne artikel på disse sider\' block ?');
define('_MI_NEWS_BOOKMARK_ME', 'Display a \'Bookmark this article at these sites\' block ?');
define('_MI_NEWS_BOOKMARK_ME_DSC', 'Denne blok vil være synlig på artiklens side.');
define('_MI_NEWS_FF_MICROFORMAT', 'Aktiver FireFox 2 Micro summaries ?');
define('_MI_NEWS_FF_MICROFORMAT_DSC', 'For mere information, se <a href=\'http:define("_MI_NEWS_WHOS_WHO","Hvem er hvem"');
define('_MI_NEWS_WHOS_WHO', 'Who\'s Who');
define('_MI_NEWS_METAGEN', 'Metagen');
define('_MI_NEWS_TOPICS_DIRECTORY', 'Kategori liste');
define('_MI_NEWS_ADVERTISEMENT', 'Annonce');
define('_MI_NEWS_ADV_DESCR', 'Indtast tekst eller javescript kode, som skal vises i dine artikler');
define('_MI_NEWS_MIME_TYPES', 'Indtast tilladte filtyper, som er tilladt. (adskil med ny linie)');
define('_MI_NEWS_ENHANCED_PAGENAV', 'Brug forøget side navigering ? ');
define('_MI_NEWS_ENHANCED_PAGENAV_DSC', 'Med denne mulighed kan du adskille dine sider med noget i denne stil:
[pagebreak:page title], links til siderne bliver erstattet af dropdown lister og du kan benytte [sumary] til at oprette en kort appetitvækker af dine sider.');
?>