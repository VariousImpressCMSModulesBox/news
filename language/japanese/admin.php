<?php
// $Id: admin.php,v 1.49 2005/03/13 12:59:35 hthouzard Exp $
//%%%%%%	Admin Module Name  Articles 	%%%%%
define("_AM_DBUPDATED","¥Ç¡¼¥¿¥Ù¡¼¥¹¤ò¹¹¿·¤·¤Þ¤·¤¿");
define("_AM_CONFIG","¥Ë¥å¡¼¥¹ ÀßÄê");
define("_AM_AUTOARTICLES","·ÇºÜÍ½Äê¤Îµ­»ö");
define("_AM_STORYID","¥Ë¥å¡¼¥¹µ­»öID");
define("_AM_TITLE","É½Âê");
define("_AM_TOPIC","¥È¥Ô¥Ã¥¯");
define("_AM_POSTER","Åê¹Æ¼Ô");
define("_AM_PROGRAMMED","·ÇºÜÍ½ÄêÆü»þ");
define("_AM_ACTION","´ÉÍý");
define("_AM_EDIT","ÊÔ½¸");
define("_AM_DELETE","ºï½ü");
define("_AM_LAST10ARTS","ºÇ¿· %d ¥Ë¥å¡¼¥¹µ­»ö");
define("_AM_PUBLISHED","·ÇºÜÆü»þ"); // Published Date
define("_AM_GO","Á÷¿®");
define("_AM_EDITARTICLE","¥Ë¥å¡¼¥¹µ­»ö¤òÊÔ½¸");
define("_AM_POSTNEWARTICLE","¿·µ¬¥Ë¥å¡¼¥¹µ­»öºîÀ®");
define("_AM_ARTPUBLISHED","¥Ë¥å¡¼¥¹µ­»ö¤¬·ÇºÜ¤µ¤ì¤Þ¤·¤¿");
define("_AM_HELLO","%s¤µ¤ó¡¢¤³¤ó¤Ë¤Á¤Ï");
define("_AM_YOURARTPUB","¤¢¤Ê¤¿¤¬Åê¹Æ¤·¤¿¥Ë¥å¡¼¥¹µ­»ö¤¬¡¢Åö¥µ¥¤¥È¤Ë¤ÆÀµ¼°·ÇºÜ¤µ¤ì¤Þ¤·¤¿¡£");
define("_AM_TITLEC","É½Âê¡§");
define("_AM_URLC","URL¡§");
define("_AM_PUBLISHEDC","·ÇºÜÆü»þ¡§");
define("_AM_RUSUREDEL","¤³¤Î¥Ë¥å¡¼¥¹µ­»ö¤ª¤è¤Óµ­»ö¤ËÂÐ¤¹¤ë¥³¥á¥ó¥È¤òÁ´¤Æºï½ü¤·¤Æ¤â¤¤¤¤¤Ç¤¹¤«¡©");
define("_AM_YES","¤Ï¤¤");
define("_AM_NO","¤¤¤¤¤¨");
define("_AM_INTROTEXT","ËÜÊ¸");
define("_AM_EXTEXT","ËÜÊ¸£²");
define("_AM_ALLOWEDHTML","»ÈÍÑ²ÄÇ½¤ÊHTML¥¿¥°¡§");
define("_AM_DISAMILEY","´é¥¢¥¤¥³¥ó¤òÌµ¸ú¤Ë¤¹¤ë");
define("_AM_DISHTML","HTML¥¿¥°¤òÌµ¸ú¤Ë¤¹¤ë");
define("_AM_APPROVE","¾µÇ§");
define("_AM_MOVETOTOP","¤³¤Îµ­»ö¤ò¥È¥Ã¥×¥Ú¡¼¥¸ºÇ¾åÉô¤Ë°ÜÆ°¤¹¤ë");
define("_AM_CHANGEDATETIME","·ÇºÜÆü»þ¤òÊÑ¹¹¤¹¤ë");
define("_AM_NOWSETTIME","¸½ºß¤Î·ÇºÜÍ½ÄêÆü»þ¡§ %s"); // %s is datetime of publish
define("_AM_CURRENTTIME","¸½ºß»þ´Ö¡§ %s");  // %s is the current datetime
define("_AM_SETDATETIME","·ÇºÜÆü»þ¤òÀßÄê¤¹¤ë");
define("_AM_MONTHC","·î¡§");
define("_AM_DAYC","Æü¡§");
define("_AM_YEARC","Ç¯¡§");
define("_AM_TIMEC","»þ´Ö¡§");
define("_AM_PREVIEW","¥×¥ì¥Ó¥å¡¼");
define("_AM_SAVE","ÊÝÂ¸");
define("_AM_PUBINHOME","¥È¥Ã¥×¥Ú¡¼¥¸¤Ë·ÇºÜ¤¹¤ë");
define("_AM_ADD","ÄÉ²Ã");

//%%%%%%	Admin Module Name  Topics 	%%%%%

define("_AM_ADDMTOPIC","¥á¥¤¥ó¥È¥Ô¥Ã¥¯¤ÎºîÀ®");
define("_AM_TOPICNAME","¥È¥Ô¥Ã¥¯Ì¾");
// Warning, changed from 40 to 255 characters.
define("_AM_MAX40CHAR","¡ÊºÇÂç255Ê¸»ú¡ÊÈ¾³Ñ¡Ë¡Ë");
define("_AM_TOPICIMG","¥È¥Ô¥Ã¥¯²èÁü");
define("_AM_IMGNAEXLOC","%s ²¼¤Ë¤¢¤ë²èÁü¥Õ¥¡¥¤¥ëÌ¾");
define("_AM_FEXAMPLE","Îã¡§ games.gif");
define("_AM_ADDSUBTOPIC","¥µ¥Ö¥È¥Ô¥Ã¥¯¤ÎºîÀ®");
define("_AM_IN","¿Æ¥È¥Ô¥Ã¥¯¡§");
define("_AM_MODIFYTOPIC","¥È¥Ô¥Ã¥¯¤ÎÊÔ½¸");
define("_AM_MODIFY","Á÷¿®");
define("_AM_PARENTTOPIC","¿Æ¥È¥Ô¥Ã¥¯");
define("_AM_SAVECHANGE","ÊÑ¹¹¤òÊÝÂ¸");
define("_AM_DEL","ºï½ü");
define("_AM_CANCEL","¥­¥ã¥ó¥»¥ë");
define("_AM_WAYSYWTDTTAL","¤³¤Î¥È¥Ô¥Ã¥¯¤ª¤è¤Ó¤³¤Î¥È¥Ô¥Ã¥¯Æâ¤ÎÁ´¤Æ¤Î¥Ë¥å¡¼¥¹µ­»ö¤ª¤è¤Ó¥³¥á¥ó¥È¤òºï½ü¤·¤Æ¤â¤¤¤¤¤Ç¤¹¤«¡©");


// Added in Beta6
define("_AM_TOPICSMNGR","¥È¥Ô¥Ã¥¯´ÉÍý¥á¥Ë¥å¡¼");
define("_AM_PEARTICLES","¥Ë¥å¡¼¥¹µ­»ö¤ÎÅê¹Æ¡¿ÊÔ½¸");
define("_AM_NEWSUB","¿·µ¬Åê¹Æ¥Ë¥å¡¼¥¹");
define("_AM_POSTED","Åê¹ÆÆü»þ");
define("_AM_GENERALCONF","°ìÈÌÀßÄê");

// Added in RC2
define("_AM_TOPICDISPLAY","¥È¥Ô¥Ã¥¯²èÁü¤òÉ½¼¨");
define("_AM_TOPICALIGN","°ÌÃÖ");
define("_AM_RIGHT","±¦Â¦");
define("_AM_LEFT","º¸Â¦");

define("_AM_EXPARTS","´ü¸ÂÀÚ¤ìµ­»ö");
define("_AM_EXPIRED","´ü¸ÂÀÚ¤ì");
define("_AM_CHANGEEXPDATETIME","Í­¸ú´ü¸Â¤òÊÑ¹¹¤¹¤ë");
define("_AM_SETEXPDATETIME","Í­¸ú´ü¸Â¤òÀßÄê¤¹¤ë");
define("_AM_NOWSETEXPTIME","¸½ºßÀßÄê¤µ¤ì¤Æ¤¤¤ë´ü¸Â¡§ %s");

// Added in RC3
define("_AM_ERRORTOPICNAME", "¥È¥Ô¥Ã¥¯Ì¾¤¬µ­Æþ¤µ¤ì¤Æ¤¤¤Þ¤»¤ó¡£");
define("_AM_EMPTYNODELETE", "ºï½ü¤Ç¤­¤Þ¤»¤ó");

// Added 240304 (Mithrandir)
define('_AM_GROUPPERM', 'Åê¹Æ¡¦¾µÇ§¡¦»²¾È¤Î¸¢¸Â');
define('_AM_SELFILE','¥¢¥Ã¥×¥í¡¼¥É¥Õ¥¡¥¤¥ë¤ÎÁªÂò');

// Added by Hervü¦Ž€
define('_AM_UPLOAD_DBERROR_SAVE','¥Ë¥å¡¼¥¹µ­»ö¤Ë¥Õ¥¡¥¤¥ë¤òÅºÉÕ¤¹¤ë¤Î¤Ë¥¨¥é¡¼¤¬È¯À¸¤·¤Þ¤·¤¿¡£');
define('_AM_UPLOAD_ERROR','¥Õ¥¡¥¤¥ë¹¹¿·¤Ë¥¨¥é¡¼¤¬È¯À¸¤·¤Þ¤·¤¿¡£');
define('_AM_UPLOAD_ATTACHFILE','ÅºÉÕ¥Õ¥¡¥¤¥ë');
define('_AM_APPROVEFORM', '¾µÇ§¤Î¸¢¸Â');
define('_AM_SUBMITFORM', 'Åê¹Æ¤Î¸¢¸Â');
define('_AM_VIEWFORM', '±ÜÍ÷¤Î¸¢¸Â');
define('_AM_APPROVEFORM_DESC', '¾µÇ§¼Ô¤ÎÁªÂò');
define('_AM_SUBMITFORM_DESC', 'Åê¹Æ¼Ô¤ÎÁªÂò');
define('_AM_VIEWFORM_DESC', '±ÜÍ÷¼Ô¤ÎÁªÂò');
define('_AM_DELETE_SELFILES', 'ÁªÂò¤·¤¿¥Õ¥¡¥¤¥ë¤Îºï½ü');
define('_AM_TOPIC_PICTURE', '²èÁü¤Î¥¢¥Ã¥×¥í¡¼¥É');
define('_AM_UPLOAD_WARNING', '<B>·Ù¹ð:, °Ê²¼¤Î¥Õ¥©¥ë¥À¡¼¤ËÂÐ¤¹¤ë¥¢¥¯¥»¥¹¸¢¤òÉ¬¤ºÀßÄê¤·¤Æ¤¯¤À¤µ¤¤¡£: %s</B>');

define('_AM_NEWS_UPGRADECOMPLETE', '¥¢¥Ã¥×¥°¥ì¡¼¥É¤¬´°Î»¤·¤Þ¤·¤¿¡£');
define('_AM_NEWS_UPDATEMODULE', '¥â¥¸¥å¡¼¥ë¤È¥Æ¥ó¥×¥ì¡¼¥È¤Î¥¢¥Ã¥×¥Ç¡¼¥È');
define('_AM_NEWS_UPGRADEFAILED', '¥¢¥Ã¥×¥°¥ì¡¼¥É¼ºÇÔ¡ª¡ª');
define('_AM_NEWS_UPGRADE', '¥¢¥Ã¥×¥°¥ì¡¼¥É');
define('_AM_ADD_TOPIC','¥È¥Ô¥Ã¥¯ÄÉ²Ã');
define('_AM_ADD_TOPIC_ERROR','¥¨¥é¡¼:¥È¥Ô¥Ã¥¯¤¬´û¤ËÂ¸ºß¤·¤Þ¤¹');
define('_AM_ADD_TOPIC_ERROR1','¥¨¥é¡¼:¤³¤Î¥È¥Ô¥Ã¥¯¤Ï¿Æ¥È¥Ô¥Ã¥¯¤È¤·¤ÆÁªÂò¤Ç¤­¤Þ¤»¤ó');
define('_AM_SUB_MENU','¤³¤Î¥È¥Ô¥Ã¥¯¤ò¥µ¥Ö¥á¥Ë¥å¡¼¤È¤·¤Æ¸ø³«¤¹¤ë');
define('_AM_SUB_MENU_YESNO','¥µ¥Ö¥á¥Ë¥å¡¼¤Ç¤¹¤«?');
define('_AM_HITS', '¥Ò¥Ã¥È¿ô');
define('_AM_CREATED', 'ºîÀ®ºÑ¤ß');

define('_AM_TOPIC_DESCR', "¥È¥Ô¥Ã¥¯¤Î³µÍ×");
define('_AM_USERS_LIST', "¥æ¡¼¥¶¡¼¥ê¥¹¥È");
define('_AM_PUBLISH_FRONTPAGE', "¥Õ¥í¥ó¥È¥Ú¡¼¥¸¤Ë¸ø³«¤·¤Þ¤·¤¹¤«?");
define('_AM_NEWS_UPGRADEFAILED1', 'stories_files¥Æ¡¼¥Ö¥ë¤ÎºîÀ®¼ºÇÔ');
define('_AM_NEWS_UPGRADEFAILED2', "¥È¥Ô¥Ã¥¯¥¿¥¤¥È¥ëÄ¹¤ÎÊÑ¹¹¼ºÇÔ");
define('_AM_NEWS_UPGRADEFAILED21', "topics¥Æ¡¼¥Ö¥ë¤Ø¤Î¿·µ¬¥Õ¥£¡¼¥ë¥ÉÄÉ²Ã¼ºÇÔ");
define('_AM_NEWS_UPGRADEFAILED3', 'stories_votedata¥Æ¡¼¥Ö¥ë¤ÎºîÀ®¼ºÇÔ');
define('_AM_NEWS_UPGRADEFAILED4', "story¥Æ¡¼¥Ö¥ë¤Ø¤Î'rating'¡¢'votes'¥Õ¥£¡¼¥ë¥ÉÄÉ²Ã¼ºÇÔ");
define('_AM_NEWS_UPGRADEFAILED0', "¥á¥Ã¥»¡¼¥¸¤ËÃí°Õ¤·¤Æ¡¢¥Ë¥å¡¼¥¹¥â¥¸¥å¡¼¥ë¤Î'sql'¥Õ¥©¥ë¥À¡¼¤ÇÍøÍÑ²ÄÇ½¤ÊsqlÄêµÁ¥Õ¥¡¥¤¥ë¤Ë´Ø¤¹¤ëÌäÂê¤òphpMyadmin¤Ç½¤Àµ¤¹¤ë¤è¤¦¤Ë¤·¤Æ¤¯¤À¤µ¤¤¡£");
define('_AM_NEWS_UPGR_ACCESS_ERROR',"¥¨¥é¡¼: ¤³¤Î¥â¥¸¥å¡¼¥ë¤Î´ÉÍý¸¢¸Â¤¬¤Ê¤¤¤È¤³¤Î¥¹¥¯¥ê¥×¥È¤òÍøÍÑ½ÐÍè¤Þ¤»¤ó");
define('_AM_NEWS_PRUNE_BEFORE',"°ÊÁ°¸ø³«¤µ¤ì¤¿¥Ë¥å¡¼¥¹µ­»ö¼è¤ê½ü¤¯");
define('_AM_NEWS_PRUNE_EXPIREDONLY',"½ªÎ»¤·¤¿¥Ë¥å¡¼¥¹µ­»ö¤Î¤ß¤ò¼è¤ê½ü¤¯");
define('_AM_NEWS_PRUNE_CONFIRM',"·Ù¹ð: %s°ÊÁ°¤Ë¸ø³«¤µ¤ì¤¿¥Ë¥å¡¼¥¹µ­»ö±Êµ×¤Ë¼è¤ê½ü¤³¤¦¤È¤·¤Æ¤Þ¤¹¡£(¤³¤Î¥¢¥¯¥·¥ç¥ó¤Ï¼è¤ê¾Ã¤»¤Þ¤»¤ó)%s ¥¹¥È¡¼¥ê¡¼¤ò¼¨¤·¤Æ¤Þ¤¹¡£<br />ËÜÅö¤Ë¤ä¤ê¤Þ¤¹¤« ?");
define('_AM_NEWS_PRUNE_TOPICS',"°Ê²¼¤Î¥È¥Ô¥Ã¥¯¥¹¤ÎÀ©¸Â");
define('_AM_NEWS_PRUNENEWS', '¥Ë¥å¡¼¥¹¤ò¼è¤ê½ü¤¯');
define('_AM_NEWS_EXPORT_NEWS', '¥Ë¥å¡¼¥¹¤ò¥¨¥¯¥¹¥Ý¡¼¥È');
define('_AM_NEWS_EXPORT_NOTHING', "¥¨¥¯¥¹¥Ý¡¼¥È¤¹¤ë¤â¤Î¤¬¤¢¤ê¤Þ¤»¤ó¡£ ¾ò·ï¤Ë¤Ä¤¤¤Æ³Î¤«¤á¤Æ¤¯¤À¤µ¤¤¡£");
define('_AM_NEWS_PRUNE_DELETED', '%d ¸Ä¤Î¥Ë¥å¡¼¥¹¤¬ºï½ü¤µ¤ì¤Þ¤·¤¿');
define('_AM_NEWS_PERM_WARNING', '<h2>·Ù¹ð: 3¤Ä¤Î¥Õ¥©¡¼¥à¤¬¤¢¤ë¤Î¤Ç¡¢3¸Ä¤ÎÁ÷¿®¥Ü¥¿¥ó¤¬¤¢¤ê¤Þ¤¹¡£</h2>');
define('_AM_NEWS_EXPORT_BETWEEN', '¥Ë¥å¡¼¥¹¤ÎÆüÉÕ¡Ê¸ø³«ÆüÉÕ¡Ë¤ò»ØÄê');
define('_AM_NEWS_EXPORT_AND', ' µÚ¤Ó ');
define('_AM_NEWS_EXPORT_PRUNE_DSC', "¥Á¥§¥Ã¥¯¤·¤¿¥È¥Ô¥Ã¥¯¤Î¤ß¤¬»ÈÍÑ¤µ¤ì¤Þ¤¹¡£<br/>²¿¤â¥Á¥§¥Ã¥¯¤·¤Ê¤¤¤È¤¹¤Ù¤Æ¤Î¥È¥Ô¥Ã¥¯¥¹¤¬»ÈÍÑ¤µ¤ì¤Þ¤¹¡£");
define('_AM_NEWS_EXPORT_INCTOPICS', '¥È¥Ô¥Ã¥¯¤ÎÄêµÁ¤ò¼è¤ê¹þ¤ß¤Þ¤¹¤«¡©');
define('_AM_NEWS_EXPORT_ERROR', '¥Õ¥¡¥¤¥ë %s ¤ÎºîÀ®»î¹ÔÃæ¤Ë¥¨¥é¡¼¤¬È¯À¸¤·¤Þ¤·¤¿¡£ Áàºî¤ÏÄä»ß¤µ¤ì¤Þ¤·¤¿¡£');
define('_AM_NEWS_EXPORT_READY', "XML ¥¨¥¯¥¹¥Ý¡¼¥È¥Õ¥¡¥¤¥ë¤Î½àÈ÷¤¬½ÐÍè¤Þ¤·¤¿¡£ <br /><a href='%s'>¤³¤³¤ò¥¯¥ê¥Ã¥¯¤·¤Æ¥À¥¦¥ó¥í¡¼¥É¤·¤Æ¤¯¤À¤µ¤¤¡£</a><br />¥À¥¦¥ó¥í¡¼¥É¤·½ª¤¨¤¿¸å<a href='%s'>ºï½ü¤¹¤ë</a>¤Î¤òËº¤ì¤Ê¤¤¤Ç¤¯¤À¤µ¤¤¡£");
define('_AM_NEWS_RSS_URL', "RSSÁ÷¿®¤ÎURL");
define('_AM_NEWS_NEWSLETTER', "¥Ë¥å¡¼¥¹¥ì¥¿¡¼");
define('_AM_NEWS_NEWSLETTER_BETWEEN', '¥Ë¥å¡¼¥¹¤ÎÆüÉÕ¡Ê¸ø³«ÆüÉÕ¡Ë¤ò»ØÄê');
define('_AM_NEWS_NEWSLETTER_READY', "¥Ë¥å¡¼¥¹¥ì¥¿¡¼¥Õ¥¡¥¤¥ë¤Î½àÈ÷¤¬½ÐÍè¤Þ¤·¤¿¡£ <br /><a href='%s'>¤³¤³¤ò¥¯¥ê¥Ã¥¯¤·¤Æ¥À¥¦¥ó¥í¡¼¥É¤·¤Æ¤¯¤À¤µ¤¤¡£</a>.<br />¥À¥¦¥ó¥í¡¼¥É¤·½ª¤¨¤¿¸å<a href='%s'>ºï½ü¤¹¤ë</a>¤Î¤òËº¤ì¤Ê¤¤¤Ç¤¯¤À¤µ¤¤¡£");
define('_AM_NEWS_DELETED_OK','¥Õ¥¡¥¤¥ë¤Îºï½ü¤ËÀ®¸ù¤·¤Þ¤·¤¿');
define('_AM_NEWS_DELETED_PB','¤½¤Î¥Õ¥¡¥¤¥ëºï½üÃæ¤ËÌäÂêÈ¯À¸');
define('_AM_NEWS_STATS0','¥È¥Ô¥Ã¥¯¥¹¤ÎÅý·×');
define('_AM_NEWS_STATS','Åý·×');
define('_AM_NEWS_STATS1','Åê¹Æ¼Ô');
define('_AM_NEWS_STATS2','Áí¿ô');
define('_AM_NEWS_STATS3','µ­»ö¤ÎÅý·×');
define('_AM_NEWS_STATS4','¤â¤Ã¤È¤âÆÉ¤Þ¤ì¤¿µ­»ö');
define('_AM_NEWS_STATS5','¤â¤Ã¤È¤âÆÉ¤Þ¤ì¤Ê¤«¤Ã¤¿µ­»ö');
define('_AM_NEWS_STATS6','¤â¤Ã¤È¤âÉ¾²Á¤Î¹â¤¤µ­»ö');
define('_AM_NEWS_STATS7','¤â¤Ã¤È¤âÆÉ¤Þ¤ì¤¿Åê¹Æ¼Ô');
define('_AM_NEWS_STATS8','¤â¤Ã¤È¤âÉ¾²Á¤Î¹â¤¤Åê¹Æ¼Ô');
define('_AM_NEWS_STATS9','¤â¤Ã¤È¤â¹×¸¥ÅÙÂç¤­¤¤Åê¹Æ¼Ô');
define('_AM_NEWS_STATS10','Åê¹Æ¼Ô¤ÎÅý·×');
define('_AM_NEWS_STATS11','µ­»ö¿ô');
define('_AM_NEWS_HELP','¥Ø¥ë¥×');
define('_AM_NEWS_MODULEADMIN','¥â¥¸¥å¡¼¥ë´ÉÍý');
define('_AM_NEWS_GENERALSET', "¥â¥¸¥å¡¼¥ëÀßÄê" );
define('_AM_NEWS_GOTOMOD','¥â¥¸¥å¡¼¥ë¤Ø');
define('_AM_NEWS_NOTHING',"¥À¥¦¥ó¥í¡¼¥É¤¹¤ë¤â¤Î¤¬¤¢¤ê¤Þ¤»¤ó¡£ ¾ò·ï¤Ë¤Ä¤¤¤Æ³Î¤«¤á¤Æ¤¯¤À¤µ¤¤¡£");
define('_AM_NEWS_NOTHING_PRUNE',"ºï½ü¤¹¤ë¥Ë¥å¡¼¥¹¤¬¤¢¤ê¤Þ¤»¤ó¡£ ¾ò·ï¤Ë¤Ä¤¤¤Æ³Î¤«¤á¤Æ¤¯¤À¤µ¤¤¡£");
define('_AM_NEWS_TOPIC_COLOR','¥È¥Ô¥Ã¥¯¥¹¤Î¿§');
define('_AM_NEWS_COLOR','¿§');
define('_AM_NEWS_REMOVE_BR',"&lt;br&gt; ¥¿¥°¤ò²þ¹Ô¤ËÊÑ´¹¤·¤Þ¤·¤¹¤«?");
// Added in 1.3 RC2
define('_AM_NEWS_PLEASE_UPGRADE',"<a href='upgrade.php'><font color='#FF0000'>¥â¥¸¥å¡¼¥ë¤Î¥¢¥Ã¥×¥°¥ì¡¼¥É½èÍý¤ò¤·¤Æ¤¯¤À¤µ¤¤!</font></a>");
?>