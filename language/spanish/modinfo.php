<?php
//Traducción por Riosoft. Cambios menores por debianus
// $Id: modinfo.php,v 1.21 2004/09/01 17:48:07 hthouzard Exp $
// Module Info

// The name of this module
define('_MI_NEWS_NAME','Artículos');

// A brief description of this module
define('_MI_NEWS_DESC','Crear una sección de artículos, donde los usuarios puedan enviar los suyos propios y comentarlos.');

// Names of blocks for this module (Not all module has blocks)
define('_MI_NEWS_BNAME1','Temas');
define('_MI_NEWS_BNAME3','Artículo del día');
define('_MI_NEWS_BNAME4','Artículos populares');
define('_MI_NEWS_BNAME5','Artículos recientes');
define('_MI_NEWS_BNAME6','Moderar artículos');
define('_MI_NEWS_BNAME7','Navegar por los temas');

// Sub menus in main menu block
define('_MI_NEWS_SMNAME1','Enviar artículo');
define('_MI_NEWS_SMNAME2','Historial');

// Names of admin menu items
define('_MI_NEWS_ADMENU2','Gestionar temas');
define('_MI_NEWS_ADMENU3','Enviar/modificar artículos');
define('_MI_NEWS_GROUPPERMS', 'Administrar permisos');
// Added by Hervé for prune option
define('_MI_NEWS_PRUNENEWS', 'Purgar artículos');
// Added by Hervé
define('_MI_NEWS_EXPORT', 'Exportar artículos');

// Title of config items
define('_MI_STORYHOME', 'Seleccione el número de artículos a mostrar en la página principal');
define('_MI_NOTIFYSUBMIT', 'Seleccione SI para enviar un mensaje de notificación al administrador acerca de nuevos envíos');
define('_MI_DISPLAYNAV', 'Seleccione SI para mostrar la barra de navegación al tope de cada página de artículos');
define('_MI_AUTOAPPROVE','Auto aprobar los nuevos artículos sin la intervención del administrador');
define("_MI_ALLOWEDSUBMITGROUPS", "Grupos que pueden enviar noticias");
define("_MI_ALLOWEDAPPROVEGROUPS", "Grupos que pueden aprobar noticias");
define("_MI_NEWSDISPLAY", "Aspecto de las noticias");
define("_MI_NAMEDISPLAY","Nombre del autor");
define("_MI_COLUMNMODE","Columnas");
define("_MI_STORYCOUNTADMIN","Número de artículos nuevos que se mostrarán en el área de administración: ");
define('_MI_UPLOADFILESIZE', 'Támaño máximo permitido del contenido a subir(en KB) 1048576 = 1 Meg');
define("_MI_UPLOADGROUPS","Grupos autorizados para subir archivos");


// Description of each config items
define('_MI_STORYHOMEDSC', '');
define('_MI_NOTIFYSUBMITDSC', '');
define('_MI_DISPLAYNAVDSC', '');
define('_MI_AUTOAPPROVEDSC', '');
define("_MI_ALLOWEDSUBMITGROUPSDESC", "Los grupos seleccionados podrán enviar artículos.");
define("_MI_ALLOWEDAPPROVEGROUPSDESC", "Los grupos seleccionados podrán aprobar artículos.");
define("_MI_NEWSDISPLAYDESC", "El modo clásico mostrará los documentos ordenados por fecha de publicación. Las noticias por tema serán agrupadas por tema con la última noticia completa y las otras como artículos.");
define('_MI_ADISPLAYNAMEDSC', 'Elija cómo mostrar el nombre del redactor');
define("_MI_COLUMNMODE_DESC","Puede elegir qué número de columnas habrá en la lista de artículos mostrada.");
define("_MI_STORYCOUNTADMIN_DESC","");
define("_MI_UPLOADFILESIZE_DESC","");
define("_MI_UPLOADGROUPS_DESC","Elija qué grupos serán autorizados para subir archivos al servidor.");

// Name of config item values
define("_MI_NEWSCLASSIC", "Clásico");
define("_MI_NEWSBYTOPIC", "Por tema");
define("_MI_DISPLAYNAME1", "Apodo");
define("_MI_DISPLAYNAME2", "Nombre real");
define("_MI_DISPLAYNAME3", "No mostrar redactor");
define("_MI_UPLOAD_GROUP1","Quienes envían y aprueban");
define("_MI_UPLOAD_GROUP2","Sólo los que aprueban");
define("_MI_UPLOAD_GROUP3","Deshabilitar la subida de archivos");

// Text for notifications

define('_MI_NEWS_GLOBAL_NOTIFY', 'Global');
define('_MI_NEWS_GLOBAL_NOTIFYDSC', 'Opciones globales de notificación.');

define('_MI_NEWS_STORY_NOTIFY', 'Artículo');
define('_MI_NEWS_STORY_NOTIFYDSC', 'Opciones de notificación que se aplican al artículo actual.');

define('_MI_NEWS_GLOBAL_NEWCATEGORY_NOTIFY', 'Nuevo tema');
define('_MI_NEWS_GLOBAL_NEWCATEGORY_NOTIFYCAP', 'Notificarme cuando un nuevo tema es creado.');
define('_MI_NEWS_GLOBAL_NEWCATEGORY_NOTIFYDSC', 'Recibir notificación cuando un nuevo tema es creado.');
define('_MI_NEWS_GLOBAL_NEWCATEGORY_NOTIFYSBJ', '[{X_SITENAME}] {X_MODULE} auto-notificación : Nuevo tema.');

define('_MI_NEWS_GLOBAL_STORYSUBMIT_NOTIFY', 'Nuevo artículo enviado');
define('_MI_NEWS_GLOBAL_STORYSUBMIT_NOTIFYCAP', 'Notificarme cuando cualquier nuevo artículo es enviado (aguardando aprobación).');
define('_MI_NEWS_GLOBAL_STORYSUBMIT_NOTIFYDSC', 'Recibir una notificación cuando cualquier nuevo artículo es enviado  (aguardando aprobación).');
define('_MI_NEWS_GLOBAL_STORYSUBMIT_NOTIFYSBJ', '[{X_SITENAME}] {X_MODULE} auto-notificación : Nuevo artículo enviado.');

define('_MI_NEWS_GLOBAL_NEWSTORY_NOTIFY', 'Nuevo artículo');
define('_MI_NEWS_GLOBAL_NEWSTORY_NOTIFYCAP', 'Notificarme cuando cualquier nuevo artículo es publicado.');
define('_MI_NEWS_GLOBAL_NEWSTORY_NOTIFYDSC', 'Recibir una notificación cuando cualquier nuevo artículo es publicado.');
define('_MI_NEWS_GLOBAL_NEWSTORY_NOTIFYSBJ', '[{X_SITENAME}] {X_MODULE} auto-notificación : Nuevo artículo publicado.');

define('_MI_NEWS_STORY_APPROVE_NOTIFY', 'Artículo aprobado');
define('_MI_NEWS_STORY_APPROVE_NOTIFYCAP', 'Notificarme cuando este artículo sea aprobado.');
define('_MI_NEWS_STORY_APPROVE_NOTIFYDSC', 'Recibir una notificación cuando este artículo sea aprobado.');
define('_MI_NEWS_STORY_APPROVE_NOTIFYSBJ', '[{X_SITENAME}] {X_MODULE} auto-notificación : Artículo aprobado.');

define('_MI_RESTRICTINDEX', 'Restringir los temas a la página de Inicio');
define('_MI_RESTRICTINDEXDSC', 'Si es activado, los usuarios sólo podrán ver el contenido de las noticias listado en los temas.');

define('_MI_NEWSBYTHISAUTHOR', 'Artículos del mismo redactor');
define('_MI_NEWSBYTHISAUTHORDSC', 'Si se selecciona, un enlace será mostrado para ver los demás artículos publicados por el redactor.');

define('_MI_NEWS_PREVNEX_LINK','Mostrar enlaces de navegación entre artículo anterior y siguiente');
define('_MI_NEWS_PREVNEX_LINK_DESC','Si es activada esta opción, se mostrará al final de cada artículo unos enlaces de navegación \'Artículo anterior\' y \'Artículo siguiente\', el criterio usado para el orden es la fecha de publicación.');
define('_MI_NEWS_SUMMARY_SHOW','Mostrar tabla de sumario');
define('_MI_NEWS_SUMMARY_SHOW_DESC','Si es activada esta opción, se mostrará al final de cada artículo, una tabla con una serie de enlaces a los artículos más recientes.');
define('_MI_NEWS_AUTHOR_EDIT','Permitir a los redactores modificar sus envíos');
define('_MI_NEWS_AUTHOR_EDIT_DESC','Mediante esta opción, se autoriza a los redactores para que puedan modificar sus propios artículos.');
define('_MI_NEWS_RATE_NEWS','Permitir a los usuarios valorar artículos');
define('_MI_NEWS_TOPICS_RSS','Habilitar RSS en los temas');
define('_MI_NEWS_TOPICS_RSS_DESC',"Si es activada esta opción, los contenidos de los temas serán accesibles por RSS.");
define('_MI_NEWS_DATEFORMAT', "Formato de la fecha");
define('_MI_NEWS_DATEFORMAT_DESC',"Por favor consulte la <a href='http://fr.php.net/manual/es/function.date.php' target='_blank'>documentación Php</a>, para obtener más información sobre como configurar el formato de fecha y hora.<br /> Nota: Si no define ningún formato, se usará el formato por defecto.");
define('_MI_NEWS_META_DATA', "Habilitar inclusión de meta datos");
define('_MI_NEWS_META_DATA_DESC', "Si es activada esta opción, los usuarios con permisos para enviar artículos podrán incluir datos en la etiqueta 'Meta', estos son: metakeywords y metadescription");
define('_MI_NEWS_BNAME8','Artículos aleatorios');
define('_MI_NEWS_NEWSLETTER','Boletín de artículos');
define('_MI_NEWS_STATS','Estadísticas');
define("_MI_NEWS_FORM_OPTIONS","Tipo de editor");
define("_MI_NEWS_FORM_COMPACT","Compacto");
define("_MI_NEWS_FORM_DHTML","DHTML");
define("_MI_NEWS_FORM_SPAW","Editor Spaw");
define("_MI_NEWS_FORM_HTMLAREA","Editor HtmlArea");
define("_MI_NEWS_FORM_FCK","Editor FCK");
define("_MI_NEWS_FORM_KOIVI","Editor Koivi");
define("_MI_NEWS_FORM_OPTIONS_DESC","Seleccione el editor que desea usar. Para una instalación simple o si no ha instalado ningún editor opcional, solo funcionará el DHTML o el Compacto.");
define("_MI_NEWS_KEYWORDS_HIGH","Usar resaltado de texto");
define("_MI_NEWS_KEYWORDS_HIGH_DESC","Si es activada esta opción, el texto que ha sido buscado en la búsqueda global de la página saldrá resaltado en los artículos al consultar los resultados.");
define("_MI_NEWS_HIGH_COLOR","Color del resaltado");
define("_MI_NEWS_HIGH_COLOR_DES","Solo será usado si ha seleccionado usar el resaltado de texto.");
define("_MI_NEWS_INFOTIPS","Longitud de las viñetas de información");
define("_MI_NEWS_INFOTIPS_DES","Si es activada esta opción, los enlaces relativos a los artículos mostrarán, al poner el ratón encima, los primeros caracteres del artículo en una viñeta. Si pone 0 como valor, las viñetas de información no mostrarán nada.");
define("_MI_NEWS_SITE_NAVBAR","Usar barra de navegación del sitio para Mozilla y Opera");
define("_MI_NEWS_SITE_NAVBAR_DESC","Si es activada esta opción, los visitantes de su sitio podrán usar la barra de navegación de sitios que poseen estos navegadores.");
define("_MI_NEWS_TABS_SKIN","Seleccione el aspecto de las pestañas");
define("_MI_NEWS_TABS_SKIN_DESC","Permite seleccionar el aspecto de las pestañas en los bloques que las usan");
define("_MI_NEWS_SKIN_1","Estilo barra");
define("_MI_NEWS_SKIN_2","Estilo biselado");
define("_MI_NEWS_SKIN_3","Estilo clásico");
define("_MI_NEWS_SKIN_4","Estilo carpetas");
define("_MI_NEWS_SKIN_5","Estilo MacOs");
define("_MI_NEWS_SKIN_6","Estilo plano");
define("_MI_NEWS_SKIN_7","Estilo redondeado");
define("_MI_NEWS_SKIN_8","Estilo ZDnet");

// Added in version 1.50
define('_MI_NEWS_BNAME9','Archivos');
define("_MI_NEWS_FORM_TINYEDITOR","TinyEditor");
define("_MI_NEWS_FOOTNOTES","¿Mostrar enlaces en la página de impresión de los artículos?");
define("_MI_NEWS_DUBLINCORE","¿Activar Dublin Core Metadata?");
define("_MI_NEWS_DUBLINCORE_DSC","Para más información, <a hreh='http://dublincore.org/'>visite este enlace</a>");
define("_MI_NEWS_BOOKMARK_ME","¿ Mostrar el bloque 'Agregue este artículo a favoritos' ?");
define("_MI_NEWS_BOOKMARK_ME_DSC","Este bloque se mantendrá visible en la página del artículo");
define("_MI_NEWS_FF_MICROFORMAT","¿Activar Firefox 2 Micro Summaries ?");
define("_MI_NEWS_FF_MICROFORMAT_DSC","Para más información, visite <a href='http://wiki.mozilla.org/Microsummaries' target='_blank'>esta página</a>");
define("_MI_NEWS_WHOS_WHO","Quién es quién");
define("_MI_NEWS_METAGEN","Metagen");
define("_MI_NEWS_TOPICS_DIRECTORY","Directorio de temas");
define("_MI_NEWS_ADVERTISEMENT","Publicidad");
define("_MI_NEWS_ADV_DESCR","Inserte el texto o código javascript a mostrar en sus artículos");
define("_MI_NEWS_MIME_TYPES","Introduzca los 'Mime Types' permitidos para subir/upload (separados por líneas)");
define("_MI_NEWS_ENHANCED_PAGENAV","¿ Utilizar el navegador mejorado de páginas ?");
define("_MI_NEWS_ENHANCED_PAGENAV_DSC","Con esta opción podrá separar las páginas con algo así como : [pagrebreak:Page Title], los enlaces a las páginas son reemplazados por un menú desplegalbe. También podrá usar [sumary] para crear un sumario automático de las páginas");

// Added in version 1.54
define('_MI_NEWS_CATEGORY_NOTIFY','Categoría');
define('_MI_NEWS_CATEGORY_NOTIFYDSC','Opciones de notificación que se aplicarán a la categoría actual');

define('_MI_NEWS_CATEGORY_STORYPOSTED_NOTIFY', 'Nuevo artículo enviado');
define('_MI_NEWS_CATEGORY_STORYPOSTED_NOTIFYCAP', 'Recibir notificación sobre los futuros contenidos de la categoría.');
define('_MI_NEWS_CATEGORY_STORYPOSTED_NOTIFYDSC', 'Recibir notificación sobre la publicación de nuevos contenidos en esta categoría.');
define('_MI_NEWS_CATEGORY_STORYPOSTED_NOTIFYSBJ', '[{X_SITENAME}] {X_MODULE} auto-notificación : Nuevo contenido añadido');
?>