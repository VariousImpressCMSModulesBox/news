<?php
// $Id: modinfo.php,v 1.9 2003/04/01 22:51:22 mvandam Exp $
// Module Info

// The name of this module
define('_MI_NEWS_NAME','Nyheter');

// A brief description of this module
define('_MI_NEWS_DESC','Lager en Slashdot-lignende nyhetsseksjon, hvor brukere kan poste nyheter/kommentarer.');

// Names of blocks for this module (Not all module has blocks)
define('_MI_NEWS_BNAME1','Nyhetstemne');
define('_MI_NEWS_BNAME3','Store saker');
define('_MI_NEWS_BNAME4','Toppsaker');
define('_MI_NEWS_BNAME5','Siste nyheter');
define('_MI_NEWS_BNAME6','Godkjenn nyheter');
define('_MI_NEWS_BNAME7','Velg emne');

// Sub menus in main menu block
define('_MI_NEWS_SMNAME1','Legg til nyhet');
define('_MI_NEWS_SMNAME2','Arkiv');

// Names of admin menu items
define('_MI_NEWS_ADMENU2', 'Administrasjon av emner');
define('_MI_NEWS_ADMENU3', 'Poste/Rediger nyhet');
define('_MI_NEWS_GROUPPERMS', 'Rettigheter');
// Added by Hervé for prune option
define('_MI_NEWS_PRUNENEWS', 'Beskjær nyheter');
// Added by Hervé
define('_MI_NEWS_EXPORT', 'Eksport');

// Title of config items
define('_MI_STORYHOME', 'Velg hvor mange nyheter som skal vises på første side');
define('_MI_NOTIFYSUBMIT', 'Velg ja for å sende varsling til webmaster ved nytt innlegg');
define('_MI_DISPLAYNAV', 'Velg ja for visning av navigasjonsboks på toppen av hver nyhetsside');
define('_MI_AUTOAPPROVE','Automatisk godkjenning av saker?');
define("_MI_ALLOWEDSUBMITGROUPS", "Grupper som kan bidra med nyheter");
define("_MI_ALLOWEDAPPROVEGROUPS", "Grupper som kan godkjenne nyheter");
define("_MI_NEWSDISPLAY", "Nyhetsvisning");
define("_MI_NAMEDISPLAY","Forfatterens navn");
define("_MI_COLUMNMODE","Kolonne");
define("_MI_STORYCOUNTADMIN","Antall nye artikler som skal vises i admin-området (denne innstillingen kan også brukes til å begrense antall emner som vises i adminområdet og det vil bli brukt i statistikken) : ");
define('_MI_UPLOADFILESIZE', 'MAKS filstørrelse på opplasting (KB) 1048576 = 1 Meg');
define("_MI_UPLOADGROUPS","Grupper godkjent for opplasting");


// Description of each config items
define('_MI_STORYHOMEDSC', '');
define('_MI_NOTIFYSUBMITDSC', '');
define('_MI_DISPLAYNAVDSC', '');
define('_MI_AUTOAPPROVEDSC', '');
define("_MI_ALLOWEDSUBMITGROUPSDESC", "Valgte grupper vil kunne sende inn nyhetssaker");
define("_MI_ALLOWEDAPPROVEGROUPSDESC", "Valgte grupper vil kunne godkjenne nyhetssaker");
define("_MI_NEWSDISPLAYDESC", "Klassisk viser sakene sortert etter utgivelsesdato. Saker etter emne vil ordne sakene etter emne, med siste sak fullt synlig og resten bare med tittel");
define('_MI_ADISPLAYNAMEDSC', 'Velg visning av forfatternavnet');
define("_MI_COLUMNMODE_DESC","Du kan velge antall kolonner i artikkellisten");
define("_MI_STORYCOUNTADMIN_DESC","");
define("_MI_UPLOADFILESIZE_DESC","");
define("_MI_UPLOADGROUPS_DESC","Velg grupper som kan laste opp til server");

// Name of config item values
define("_MI_NEWSCLASSIC", "Klassisk");
define("_MI_NEWSBYTOPIC", "Etter emne");
define("_MI_DISPLAYNAME1", "Brukernavn");
define("_MI_DISPLAYNAME2", "Ekte navn");
define("_MI_DISPLAYNAME3", "Skjul forfatter");
define("_MI_UPLOAD_GROUP1","Innsendere og godkjennere");
define("_MI_UPLOAD_GROUP2","Kun godkjennere");
define("_MI_UPLOAD_GROUP3","Opplasting deaktivert");

// Text for notifications

define('_MI_NEWS_GLOBAL_NOTIFY', 'Globalt');
define('_MI_NEWS_GLOBAL_NOTIFYDSC', 'Globale valg for nyhetsvarslinger.');

define('_MI_NEWS_STORY_NOTIFY', 'Artikkel');
define('_MI_NEWS_STORY_NOTIFYDSC', 'Varslingsvalg som gjelder for nåværende artikkel.');

define('_MI_NEWS_GLOBAL_NEWCATEGORY_NOTIFY', 'Nytt Emne');
define('_MI_NEWS_GLOBAL_NEWCATEGORY_NOTIFYCAP', 'Varsle meg når ett nytt emne er laget.');
define('_MI_NEWS_GLOBAL_NEWCATEGORY_NOTIFYDSC', 'Motta varsling når ett nytt emne er laget.');
define('_MI_NEWS_GLOBAL_NEWCATEGORY_NOTIFYSBJ', '[{X_SITENAME}] {X_MODULE} auto-varsling : Nytt nyhetsemne');

define('_MI_NEWS_GLOBAL_STORYSUBMIT_NOTIFY', 'Ny artikkel innsendt');       
define('_MI_NEWS_GLOBAL_STORYSUBMIT_NOTIFYCAP', 'Varsle meg når en nytt artikkel er innsendt (som venter på godkjenning).');
define('_MI_NEWS_GLOBAL_STORYSUBMIT_NOTIFYDSC', 'Motta varsling når ett nytt artikkel er innsendt (som venter på godkjenning).');
define('_MI_NEWS_GLOBAL_STORYSUBMIT_NOTIFYSBJ', '[{X_SITENAME}] {X_MODULE} auto-varsling : Ny nyhetsartikkel er innsendt');                              

define('_MI_NEWS_GLOBAL_NEWSTORY_NOTIFY', 'Ny artikkel');       
define('_MI_NEWS_GLOBAL_NEWSTORY_NOTIFYCAP', 'Varsle meg når en ny artikkel er innsendt.');
define('_MI_NEWS_GLOBAL_NEWSTORY_NOTIFYDSC', 'Motta varsling når en ny artikkel er innsendt.');
define('_MI_NEWS_GLOBAL_NEWSTORY_NOTIFYSBJ', '[{X_SITENAME}] {X_MODULE} auto-varsling : Ny nyhetsartikkel');                              

define('_MI_NEWS_STORY_APPROVE_NOTIFY', 'Story Approved');
define('_MI_NEWS_STORY_APPROVE_NOTIFYCAP', 'Varsle meg når denne artikkelen er godkjent.');
define('_MI_NEWS_STORY_APPROVE_NOTIFYDSC', 'Motta varsling når denne artikkelen er godkjent.');
define('_MI_NEWS_STORY_APPROVE_NOTIFYSBJ', '[{X_SITENAME}] {X_MODULE} auto-varsling : Artikkel er godkjent');

define('_MI_RESTRICTINDEX', 'Begrens emner på innholdssiden?');
define('_MI_RESTRICTINDEXDSC', 'Hvis ja: Brukere vil bare se saker i emneinnholdet, og de vil ha tilgang som satt i rettighetene');

define('_MI_NEWSBYTHISAUTHOR', 'Saker av samme forfatter');
define('_MI_NEWSBYTHISAUTHORDSC', 'Hvis ja: En lenke til \'Saker av samme forfatter\' vil være synlig');

define('_MI_NEWS_PREVNEX_LINK','Vis forrige og neste lenke ?');
define('_MI_NEWS_PREVNEX_LINK_DESC','Hvis ja: To lenker vil vises nederst på hver artikkel. Disse går til forrige og neste artikkel, basert på utgivelsesdato');
define('_MI_NEWS_SUMMARY_SHOW','Vis oppsummeringstabell ?');
define('_MI_NEWS_SUMMARY_SHOW_DESC','Hvis ja: En oppsummering med lenker til alle nylig utgitte artikler vil vises nederst på hver artikkel');
define('_MI_NEWS_AUTHOR_EDIT','Tillat forfattere å endre sine saker ?');
define('_MI_NEWS_AUTHOR_EDIT_DESC','Med dette valget kan forfattere tillates å endre sine saker.');
define('_MI_NEWS_RATE_NEWS','Tillat brukere å rangere saker ?');
define('_MI_NEWS_TOPICS_RSS','Aktivèr RSS-feeding på emnenivå ?');
define('_MI_NEWS_TOPICS_RSS_DESC',"Hvis ja: Emneinnholdet vil være tilgjengelig som RSS feeds");
define('_MI_NEWS_DATEFORMAT', "Datoformat");
define('_MI_NEWS_DATEFORMAT_DESC',"Vennligst søk i dokumentasjonen for Php (http://fr.php.net/manual/en/function.date.php) for mer informasjon om formatene. Merk at om du lar det stå blankt så vil hovedvalgene bli brukt");
define('_MI_NEWS_META_DATA', "Tillat bruk av metadata (nøkkelord og beskrivelse) ?");
define('_MI_NEWS_META_DATA_DESC', "Hvis ja: Godkjennere vil kunne sette inn nøkkelord og beskrivelse");
define('_MI_NEWS_BNAME8','Tilfeldige saker');
define('_MI_NEWS_NEWSLETTER','Nyhetsbrev');
define('_MI_NEWS_STATS','Statistikk');
define("_MI_NEWS_FORM_OPTIONS","Skjemavalg");
define("_MI_NEWS_FORM_COMPACT","Kompakt");
define("_MI_NEWS_FORM_DHTML","DHTML");
define("_MI_NEWS_FORM_SPAW","Spaw Editor");
define("_MI_NEWS_FORM_HTMLAREA","HtmlArea Editor");
define("_MI_NEWS_FORM_FCK","FCK Editor");
define("_MI_NEWS_FORM_KOIVI","Koivi Editor");
define("_MI_NEWS_FORM_OPTIONS_DESC","Velg hvilken editor som skal brukes. Om du har en enkel installasjon (f.eks. om du bare har installert xoopskjernen), så kan du velge DHTML og Kompakt");
define("_MI_NEWS_KEYWORDS_HIGH","Bruk markerte nøkkelord ?");
define("_MI_NEWS_KEYWORDS_HIGH_DESC","Hvis ja: Nøkkelordene fra søket vil markeres i artiklene");
define("_MI_NEWS_HIGH_COLOR","Farge for markering av nøkkelord ?");
define("_MI_NEWS_HIGH_COLOR_DES","Bruk dette valget bare om du har svart ja på forrige valg");
define("_MI_NEWS_INFOTIPS","Hjelpetips-lengde");
define("_MI_NEWS_INFOTIPS_DES","Hvis ja: lenker som relateres til saker vil inneholde de første (n) tegnene i artikkelen. Hvis du setter denne verdien til 0 så vil hjelpetipsene være tomme");
define("_MI_NEWS_SITE_NAVBAR","Bruk Mozilla og Opera navigasjonsverktøy ?");
define("_MI_NEWS_SITE_NAVBAR_DESC","Hvis ja: Besøkende på nettstedet vil kunne bruke navigasjonsverktøy til å navigere gjennom dine artikler.");
define("_MI_NEWS_TABS_SKIN","Velg utseende for mappene");
define("_MI_NEWS_TABS_SKIN_DESC","Dette utseendet vil brukes i alle blokker som bruker mapper");
define("_MI_NEWS_SKIN_1","Bjelkestil");
define("_MI_NEWS_SKIN_2","Bevelert");
define("_MI_NEWS_SKIN_3","Klassisk");
define("_MI_NEWS_SKIN_4","Mapper");
define("_MI_NEWS_SKIN_5","MacOs");
define("_MI_NEWS_SKIN_6","Vanlig");
define("_MI_NEWS_SKIN_7","Avrundet");
define("_MI_NEWS_SKIN_8","ZDnet stil");
?>