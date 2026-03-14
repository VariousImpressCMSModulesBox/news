<?php
// $Id: modinfo.php,v 1.21 2004/09/01 17:48:07 hthouzard Exp $
// Module Info

// The name of this module
define('_MI_NEWS_NAME','Новини');

// A brief description of this module
define('_MI_NEWS_DESC','Създава подобна на Slashdot новинарска секция, в която потребителите могат да добавят новини/коментари.');

// Names of blocks for this module (Not all module has blocks)
define('_MI_NEWS_BNAME1','Теми');
define('_MI_NEWS_BNAME3','Новината на деня');
define('_MI_NEWS_BNAME4','Топ новини');
define('_MI_NEWS_BNAME5','Последни новини');
define('_MI_NEWS_BNAME6','Модериране на новините');
define('_MI_NEWS_BNAME7','Навигация през темите');

// Sub menus in main menu block
define('_MI_NEWS_SMNAME1','Добави новина');
define('_MI_NEWS_SMNAME2','Архив');

// Names of admin menu items
define('_MI_NEWS_ADMENU2', 'Теми');
define('_MI_NEWS_ADMENU3', 'Публикува/Редактира новини');
define('_MI_NEWS_GROUPPERMS', 'Права');
// Added by Herv� for prune option
define('_MI_NEWS_PRUNENEWS', 'Изчиства новините');
// Added by Herv�
define('_MI_NEWS_EXPORT', 'Експортира новините');

// Title of config items
define('_MI_STORYHOME', 'Изберете брой новини, които да се показват на главната страница');
define('_MI_NOTIFYSUBMIT', 'Изберете ДА за да изпраща известие на Администратора при добавяне на новина');
define('_MI_DISPLAYNAV', 'Изберете ДА за да показва навигационно поле на страницата с новините');
define('_MI_AUTOAPPROVE','Да добавя ли новините, без да има нужда от одобрението на администратора?');
define("_MI_ALLOWEDSUBMITGROUPS", "Групи които могат да добавят новини");
define("_MI_ALLOWEDAPPROVEGROUPS", "Групи които могат да одобряват новини");
define("_MI_NEWSDISPLAY", "Режим на показване на новините");
define("_MI_NAMEDISPLAY","Име на автора");
define("_MI_COLUMNMODE","Колони");
define("_MI_STORYCOUNTADMIN","Брой на новините които да показва в Админ. зоната: ");
define('_MI_UPLOADFILESIZE', 'Макс. размер на файла (KB) 1048576 = 1 1MB');
define("_MI_UPLOADGROUPS","Групи с права за качване");


// Description of each config items
define('_MI_STORYHOMEDSC', '');
define('_MI_NOTIFYSUBMITDSC', '');
define('_MI_DISPLAYNAVDSC', '');
define('_MI_AUTOAPPROVEDSC', '');
define("_MI_ALLOWEDSUBMITGROUPSDESC", "Избраните групи са с позволение да изпращат новини");
define("_MI_ALLOWEDAPPROVEGROUPSDESC", "Избраните групи са с позволение да одобряват новини");
define("_MI_NEWSDISPLAYDESC", "Класическо - ще показва новините по датата на тяхната публикация. Новини по Тема, ще бъдат групирано първо тематично, след това по дата");
define('_MI_ADISPLAYNAMEDSC', 'Изберете как да показва името на автора');
define("_MI_COLUMNMODE_DESC","Можете да изберете броя колони в които да се зареждат новините");
define("_MI_STORYCOUNTADMIN_DESC","");
define("_MI_UPLOADFILESIZE_DESC","");
define("_MI_UPLOADGROUPS_DESC","Изберете групите които могат да качват");

// Name of config item values
define("_MI_NEWSCLASSIC", "Класическо");
define("_MI_NEWSBYTOPIC", "Тематично");
define("_MI_DISPLAYNAME1", "Потребителско име");
define("_MI_DISPLAYNAME2", "Истинско име");
define("_MI_DISPLAYNAME3", "Да не показва автора");
define("_MI_UPLOAD_GROUP1","Добавящи и одобряващи");
define("_MI_UPLOAD_GROUP2","Само одобряващите");
define("_MI_UPLOAD_GROUP3","Качването забранено");

// Text for notifications

define('_MI_NEWS_GLOBAL_NOTIFY', 'Глобални');
define('_MI_NEWS_GLOBAL_NOTIFYDSC', 'Глобални опции за известията.');

define('_MI_NEWS_STORY_NOTIFY', 'Новина');
define('_MI_NEWS_STORY_NOTIFYDSC', 'Опции за известията отговарящи за определена новина.');

define('_MI_NEWS_GLOBAL_NEWCATEGORY_NOTIFY', 'Нова тема');
define('_MI_NEWS_GLOBAL_NEWCATEGORY_NOTIFYCAP', 'Извести ме, когато нова тема е създадена.');
define('_MI_NEWS_GLOBAL_NEWCATEGORY_NOTIFYDSC', 'Получавате известие когато нова тема е създадена.');
define('_MI_NEWS_GLOBAL_NEWCATEGORY_NOTIFYSBJ', '[{X_SITENAME}] {X_MODULE} Известие : Нова тема');

define('_MI_NEWS_GLOBAL_STORYSUBMIT_NOTIFY', 'Нова статия е добавена');
define('_MI_NEWS_GLOBAL_STORYSUBMIT_NOTIFYCAP', 'Извести ме когато статия е добавена (чака одобрение).');
define('_MI_NEWS_GLOBAL_STORYSUBMIT_NOTIFYDSC', 'Получавате известие когато статия е добавена (чака одобрение).');
define('_MI_NEWS_GLOBAL_STORYSUBMIT_NOTIFYSBJ', '[{X_SITENAME}] {X_MODULE} Известие : Нова статия е добавена');

define('_MI_NEWS_GLOBAL_NEWSTORY_NOTIFY', 'Нова статия');
define('_MI_NEWS_GLOBAL_NEWSTORY_NOTIFYCAP', 'Извести ме, когато нова статия е публикувана.');
define('_MI_NEWS_GLOBAL_NEWSTORY_NOTIFYDSC', 'Получавате известие когато нова статия е публикувана.');
define('_MI_NEWS_GLOBAL_NEWSTORY_NOTIFYSBJ', '[{X_SITENAME}] {X_MODULE} Известие : Нова статия е добавена');

define('_MI_NEWS_STORY_APPROVE_NOTIFY', 'Статията е одобрена');
define('_MI_NEWS_STORY_APPROVE_NOTIFYCAP', 'Извести ме, когато статия е добавена.');
define('_MI_NEWS_STORY_APPROVE_NOTIFYDSC', 'Получавате известие когато статията е одобрена.');
define('_MI_NEWS_STORY_APPROVE_NOTIFYSBJ', '[{X_SITENAME}] {X_MODULE} Известие : Статията е одобрена');

define('_MI_RESTRICTINDEX', 'Да ограничи темите на главната страница?');
define('_MI_RESTRICTINDEXDSC', 'Ако е ДА, потребителите ще виждат теми само до които имат права');

define('_MI_NEWSBYTHISAUTHOR', 'Новини от същия автор');
define('_MI_NEWSBYTHISAUTHORDSC', 'Ако тази опция е ДА, ще има допълнителна видима връзка към *Новини от същия автор*');

define('_MI_NEWS_PREVNEX_LINK','Да показва ли връзки за предишна и следваща новина ?');
define('_MI_NEWS_PREVNEX_LINK_DESC','Когато тази опция е ДА, ще показва две връзки в края на всяка новина за избор на предишна и следваща');
define('_MI_NEWS_SUMMARY_SHOW','Show summary table ?');
define('_MI_NEWS_SUMMARY_SHOW_DESC','When you use this option, a summary containing links to all the recent published articles is visible at the bottom of each article');
define('_MI_NEWS_AUTHOR_EDIT','Разрешава на авторите да одобряват новините си ?');
define('_MI_NEWS_AUTHOR_EDIT_DESC','С тази опция давате права на авторите да редактират само техните новини.');
define('_MI_NEWS_RATE_NEWS','Да разреши ли оценяването на статиите ?');
define('_MI_NEWS_TOPICS_RSS','Разрешава RSS синдикация за темите ?');
define('_MI_NEWS_TOPICS_RSS_DESC',"Ако тази опция е 'ДА' тогава темите ще са достъпни за RSS синдикация");
define('_MI_NEWS_DATEFORMAT', "Формат на датата");
define('_MI_NEWS_DATEFORMAT_DESC',"Моля проверете Php документацията (http://fr.php.net/manual/en/function.date.php) за повече информация как се ползва");
define('_MI_NEWS_META_DATA', "Разрешава МЕТА данни (ключови думи и описание) да бъдат добавяни ?");
define('_MI_NEWS_META_DATA_DESC', "Когато е ДА, одобряващите новините, ще могат да добавят ключови думи и описание за улесняване в търсенето");
define('_MI_NEWS_BNAME8','Пройзволни новини');
define('_MI_NEWS_NEWSLETTER','Вестник');
define('_MI_NEWS_STATS','Статистики');
define("_MI_NEWS_FORM_OPTIONS","Форма");
define("_MI_NEWS_FORM_COMPACT","Компактен");
define("_MI_NEWS_FORM_DHTML","DHTML");
define("_MI_NEWS_FORM_SPAW","Spaw редактор");
define("_MI_NEWS_FORM_HTMLAREA","HtmlArea редактор");
define("_MI_NEWS_FORM_FCK","FCK редактор");
define("_MI_NEWS_FORM_KOIVI","Koivi редактор");
define("_MI_NEWS_FORM_OPTIONS_DESC","Изберете редактор за ползване. Ако това е обикновенна инсталация (като ако сте инсталирали стандартен XOOPS, можете да избирате между DHTML и Компактен");
define("_MI_NEWS_KEYWORDS_HIGH","Да ползва ли оцветяване за ключовите думи ?");
define("_MI_NEWS_KEYWORDS_HIGH_DESC","Ако това е ДА, ключовите думи в статията ще бъдат с различен цвят");
define("_MI_NEWS_HIGH_COLOR","Цветове използвани за ключовите думи ?");
define("_MI_NEWS_HIGH_COLOR_DES","Ползвайте тази опция само ако при по-горната сте избрали ДА");
define("_MI_NEWS_INFOTIPS","Дължина на съвета");
define("_MI_NEWS_INFOTIPS_DES","Ако ползвате тази опция, връзките към новините ще показват (n) знака от статиите. Ако сте избрали 0 ще е празно");
define("_MI_NEWS_SITE_NAVBAR","Да използва ли страничната линия на Mozilla и Opera ?");
define("_MI_NEWS_SITE_NAVBAR_DESC","Ако е избрано Да, потребителите ще могат да разглеждат новините през така нареченият Side Bar.");
define("_MI_NEWS_TABS_SKIN","Кожа която да използват табовете");
define("_MI_NEWS_TABS_SKIN_DESC","Тази кожа ще бъде ползвана в всички блокове които поддържат табове");
define("_MI_NEWS_SKIN_1","Bar Style");
define("_MI_NEWS_SKIN_2","Beveled");
define("_MI_NEWS_SKIN_3","Classic");
define("_MI_NEWS_SKIN_4","Folders");
define("_MI_NEWS_SKIN_5","MacOs");
define("_MI_NEWS_SKIN_6","Plain");
define("_MI_NEWS_SKIN_7","Rounded");
define("_MI_NEWS_SKIN_8","ZDnet style");
?>