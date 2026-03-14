<?php
// $Id: admin.php,v 1.18 2004/07/26 17:51:25 hthouzard Exp $
//%%%%%%	Admin Module Name  Articles 	%%%%%
define("_AM_DBUPDATED"," „  ÕœÌÀ ﬁ«⁄œ… «·»Ì«‰« ");
define("_AM_CONFIG","ŒÌ«—«  «·√Œ»«—");
define("_AM_AUTOARTICLES","⁄—÷  ·ﬁ«∆Ì ··√Œ»«—");
define("_AM_STORYID","—ﬁ„ «·Œ»—");
define("_AM_TITLE","«·⁄‰Ê«‰");
define("_AM_TOPIC","«·ﬁ”„");
define("_AM_POSTER","«·‰«‘—");
define("_AM_PROGRAMMED","‰ÂÃ «· «—ÌŒ Ê«·Êﬁ ");
define("_AM_ACTION","«· Õﬂ„");
define("_AM_EDIT"," Õ—Ì—");
define("_AM_DELETE","„”Õ");
define("_AM_LAST10ARTS","¬Œ— %d Œ»—");
define("_AM_PUBLISHED"," «—ÌŒ «·‰‘—"); // Published Date
define("_AM_GO","≈–Â»");
define("_AM_EDITARTICLE"," Õ—Ì— «·Œ»—");
define("_AM_POSTNEWARTICLE","≈÷«›… Œ»— ÃœÌœ");
define("_AM_ARTPUBLISHED"," „ ‰‘—«·Œ»— »‰Ã«Õ");
define("_AM_HELLO","«·”·«„ ⁄·Ìﬂ„ %s,");
define("_AM_YOURARTPUB","«·Œ»— «·–Ì ﬂ » Â ›Ì „Êﬁ⁄‰«  „ ‰‘—Â »‰Ã«Õ");
define("_AM_TITLEC","«·⁄‰Ê«‰: ");
define("_AM_URLC","«·⁄‰Ê«‰ («·Ê’·Â): ");
define("_AM_PUBLISHEDC","‰‘—: ");
define("_AM_RUSUREDEL","Â· √‰  Ê«Àﬁ „‰ √‰ﬂ  —Ìœ „”Õ Â–« «·Œ»— „⁄ Ã„Ì⁄  ⁄·Ìﬁ« Â ø");
define("_AM_YES","‰⁄„");
define("_AM_NO","·«");
define("_AM_INTROTEXT","„ﬁœ„… «·Œ»—");
define("_AM_EXTEXT"," ﬂ„·… «·Œ»—");
define("_AM_ALLOWEDHTML","ﬁ»Ê· Html:");
define("_AM_DISAMILEY"," ⁄ÿÌ· «·ÊÃÊÂ «· ⁄»Ì—Ì…");
define("_AM_DISHTML"," ⁄ÿÌ· ·€… Html");
define("_AM_APPROVE","≈⁄ „«œ «·‰‘—");
define("_AM_MOVETOTOP","‰ﬁ· Â–« «·Œ»— ≈·Ï «·√⁄·Ï");
define("_AM_CHANGEDATETIME"," €ÌÌ—  «—ÌŒ ÊÊﬁ  ‰‘— «·Œ»—");
define("_AM_NOWSETTIME","Êﬁ  «·‰‘— «·Õ«·Ï: %s"); // %s is datetime of publish
define("_AM_CURRENTTIME","«·Êﬁ  «·Õ«·Ì: %s");  // %s is the current datetime
define("_AM_SETDATETIME"," ÕœÌœ  «—ÌŒ ÊÊﬁ  «·‰‘—");
define("_AM_MONTHC","‘Â—:");
define("_AM_DAYC","ÌÊ„:");
define("_AM_YEARC","”‰…:");
define("_AM_TIMEC","«·Êﬁ :");
define("_AM_PREVIEW","„‘«Âœ…");
define("_AM_SAVE","Õ›Ÿ");
define("_AM_PUBINHOME","‰‘— ›Ì «·„ﬂ«‰ «·—∆Ì”Ì");
define("_AM_ADD","√÷›");

//%%%%%%	Admin Module Name  Topics 	%%%%%

define("_AM_ADDMTOPIC","√÷› ﬁ”„ —∆Ì”Ì");
define("_AM_TOPICNAME","«”„ «·ﬁ”„");
// Warning, changed from 40 to 255 characters.
define("_AM_MAX40CHAR","(«·Õœ «·√ﬁ’Ï: 255 Õ—›)");
define("_AM_TOPICIMG","’Ê—… «·ﬁ”„");
define("_AM_IMGNAEXLOC","«·’Ê—… ÌÃ» «‰  ﬂÊ‰ ›Ì «·„Ã·œ %s");
define("_AM_FEXAMPLE","„À«·: software.gif");
define("_AM_ADDSUBTOPIC","√÷› ﬁ”„ ›—⁄Ì");
define("_AM_IN","›Ì");
define("_AM_MODIFYTOPIC"," ⁄œÌ· «·ﬁ”„");
define("_AM_MODIFY"," ⁄œÌ·");
define("_AM_PARENTTOPIC","«·ﬁ”„ «·—∆Ì”Ì");
define("_AM_SAVECHANGE","Õ›Ÿ «· ⁄œÌ·« ");
define("_AM_DEL","„”Õ");
define("_AM_CANCEL"," —«Ã⁄");
define("_AM_WAYSYWTDTTAL","Â· √‰  „ √ﬂœ „‰ √‰ﬂ  —Ìœ „”Õ «·ﬁ”„ „⁄ Ã„Ì⁄ √Œ»«—Â Ê  ⁄·Ìﬁ« Â ø");


// Added in Beta6
define("_AM_TOPICSMNGR","≈œ«—… «·√ﬁ”«„");
define("_AM_PEARTICLES","≈÷«›… Ê Õ—Ì— «·√Œ»«—");
define("_AM_NEWSUB","√Œ»«— ÃœÌœ… ··‰‘—");
define("_AM_POSTED","» «—ÌŒ");
define("_AM_GENERALCONF"," ⁄œÌ·«  ⁄«„…");

// Added in RC2
define("_AM_TOPICDISPLAY","⁄—÷ ’Ê—… «·ﬁ”„");
define("_AM_TOPICALIGN","«·≈ Ã«Â");
define("_AM_RIGHT","Ì„Ì‰");
define("_AM_LEFT","Ì”«—");

define("_AM_EXPARTS","Œ»— „‰ ÂÌ «·’·«ÕÌ…");
define("_AM_EXPIRED","„‰ ÂÌ «·’·«ÕÌ…");
define("_AM_CHANGEEXPDATETIME"," €ÌÌ—  «—ÌŒ «‰ Â«¡ ’·«ÕÌ… «·Œ»—");
define("_AM_SETEXPDATETIME","√œŒ·  «—ÌŒ «‰ Â«¡ ’·«ÕÌ… «·Œ»—");
define("_AM_NOWSETEXPTIME","·ﬁœ  „  ÕœÌœÂ« ›Ì : %s");

// Added in RC3
define("_AM_ERRORTOPICNAME", "ÌÃ» «œŒ«· ⁄‰Ê«‰ «·Œ»—");
define("_AM_EMPTYNODELETE", "·« ÌÊÃœ ‘Ì¡ Ì„”Õ");

// Added 240304 (Mithrandir)
define('_AM_GROUPPERM', '’·«ÕÌ«  «·‰‘—/«·„Ê«›ﬁ…/«·⁄—÷');
define('_AM_SELFILE','√Œ — „·›');

// Added by HervÈ
define('_AM_UPLOAD_DBERROR_SAVE','Õ’· Œÿ√ ›Ì «—›«ﬁ «·„·› ··ﬁ”„');
define('_AM_UPLOAD_ERROR','Â‰«ﬂ Œÿ√ ›Ì  Õ„Ì· «·„·›');
define('_AM_UPLOAD_ATTACHFILE','«·„·› «·„—›ﬁ :');
define('_AM_APPROVEFORM', ' ’«—ÌÕ «·‰‘—');
define('_AM_SUBMITFORM', ' ’«—ÌÕ «·≈÷«›…');
define('_AM_VIEWFORM', ' ’«—ÌÕ «·„‘«Âœ…');
define('_AM_APPROVEFORM_DESC', '«Œ — „‰ Ì” ÿÌ⁄ ‰‘— «·Œ»—');
define('_AM_SUBMITFORM_DESC', '«Œ‰— „‰ Ì” ÿÌ⁄ ≈÷«›… «·Œ»—');
define('_AM_VIEWFORM_DESC', '≈Œ — „‰ Ì” ÿÌ⁄ „‘«Âœ… «·ﬁ”„');
define('_AM_DELETE_SELFILES', '„”Õ «·„·› «·„Õœœ');
define('_AM_TOPIC_PICTURE', ' Õ„Ì· ’Ê—…');
define('_AM_UPLOAD_WARNING', '<B> Õ–Ì—: ·«  ‰”Ï «⁄ÿ«¡ ’·«ÕÌ… «·ﬂ «»… ··„Ã·œ «· «·Ì  : %s</B>');

define('_AM_NEWS_UPGRADECOMPLETE', ' „  «· —ﬁÌ…');
define('_AM_NEWS_UPDATEMODULE', ' ÕœÌÀ ﬁÊ«·» «·„ÊœÌ· Ê«·»·Êﬂ« ');
define('_AM_NEWS_UPGRADEFAILED', '›‘·  «· —ﬁÌ…');
define('_AM_NEWS_UPGRADE', ' ÕœÌÀ');
define('_AM_ADD_TOPIC','≈÷«›… ﬁ”„');
define('_AM_ADD_TOPIC_ERROR','Œÿ√, «·ﬁ”„ „ÊÃÊœ ”·›«!');
define('_AM_ADD_TOPIC_ERROR1','Œÿ√: ·«Ì„ﬂ‰ «Œ Ì«— Â–« «· ﬁ”Ì„ ·· ﬁ”Ì„ «·—∆Ì”Ì!');
define('_AM_SUB_MENU','‰‘— «·ﬁ”„ ﬂﬁ«∆„… ›—⁄Ì…');
define('_AM_SUB_MENU_YESNO','ﬁ«∆„… ›—⁄Ì… ø');
define('_AM_HITS', '«·“Ì«—« ');
define('_AM_CREATED', ' «—ÌŒ «·≈‰‘«¡');

define('_AM_TOPIC_DESCR', "Ê’› «·ﬁ”„");
define('_AM_USERS_LIST', "ﬁ«∆„… «·„” Œœ„Ì‰");
define('_AM_PUBLISH_FRONTPAGE', "‰‘— ›Ì «·’›Õ… «·—∆Ì”Ì…");
define('_AM_NEWS_UPGRADEFAILED1', '·«Ì„ﬂ‰ ≈‰‘«¡ «·ÃœÊ· stories_files');
define('_AM_NEWS_UPGRADEFAILED2', "·«Ì„ﬂ‰  €ÌÌ— ÿÊ· ⁄‰Ê«‰ «· ’‰Ì›");
define('_AM_NEWS_UPGRADEFAILED21', "·« Ì„ﬂ‰ ≈÷«›… «·ÕﬁÊ· «·ÃœÌœ… ··ÃœÊ· topics ");
define('_AM_NEWS_UPGRADEFAILED3', '·«Ì„ﬂ‰ ≈‰‘«¡ «·ÃœÊ· stories_votedata');
define('_AM_NEWS_UPGRADEFAILED4', "·«Ì„ﬂ‰ ≈‰‘«¡ «·Õﬁ·Ì‰ 'rating' Ê 'votes' „‰ ÃœÊ· 'story' ");
define('_AM_NEWS_UPGRADEFAILED0', "«·—Ã«¡ ·«ÕŸ «·—”«∆· ÊÕ«Ê· ≈’·«Õ –·ﬂ ÌœÊÌ« „‰ »—‰«„Ã phpMyadmin Ê” Ãœ „·›  ⁄—Ì› «·sql ›Ì „Ã·œ 'sql' ›Ì «·„ÊœÌ· «·ÃœÌœ");
define('_AM_NEWS_UPGR_ACCESS_ERROR',"Œÿ√, ·«” Œœ«„ ”ﬂ—  «· —ﬁÌ…, ÌÃ» √‰  œŒ· ﬂ„œÌ—");
define('_AM_NEWS_PRUNE_BEFORE',"„”Õ «·√Œ»«— «· Ì ‰‘—  ﬁ»·");
define('_AM_NEWS_PRUNE_EXPIREDONLY',"„”Õ «·√Œ»«— «· Ì «‰ Â  ’·«ÕÌ Â« ›ﬁÿ");
define('_AM_NEWS_PRUNE_CONFIRM'," Õ–Ì—, √‰  ” ﬁÊ„ »Õ–› «·√Œ»«— «· Ì ‰‘—  ﬁ»· %s »‘ﬂ· ‰Â«∆Ì ,(·‰  ” ÿÌ⁄ «· —Ã«⁄ ⁄‰ Â–« «·⁄„· ·«Õﬁ«). ”ÌƒÀ— ⁄·Ï %s Œ»—.<br />Â· √‰  „ √ﬂœ  ?");
define('_AM_NEWS_PRUNE_TOPICS',"›ﬁÿ «·√ﬁ”«„ «·„Õœœ…");
define('_AM_NEWS_PRUNENEWS', ' Â–Ì» «·√Œ»«—');
define('_AM_NEWS_EXPORT_NEWS', ' ’œÌ— «·√Œ»«—');
define('_AM_NEWS_EXPORT_NOTHING', "⁄–—« Ê·ﬂ‰ ·«ÌÊÃœ ‘Ì¡ · ’œÌ—…,");
define('_AM_NEWS_PRUNE_DELETED', '%d  „ Õ–›Â');
define('_AM_NEWS_PERM_WARNING', '<h2> Õ–Ì—, ÌÊÃœ 3 √“—«— ·ﬂ· ‰„Ê–Ã “— ,  √ﬂœ „‰  ÿ»Ìﬁ ﬂ· „‰Â« ⁄·Ï Õœ…</h2>');
define('_AM_NEWS_EXPORT_BETWEEN', '’œ— «·√Œ»«— «·„‰‘Ê—… »Ì‰');
define('_AM_NEWS_EXPORT_AND', ' Ê ');
define('_AM_NEWS_EXPORT_PRUNE_DSC', "≈–« ·„  Œ — ‘Ì∆« ”Ì „ «· ÿ»Ìﬁ ⁄·Ï ﬂ· «·√ﬁ”«„");
define('_AM_NEWS_EXPORT_INCTOPICS', ' ÷„Ì‰ «· ⁄—Ì›« ?');
define('_AM_NEWS_EXPORT_ERROR', 'Œÿ√ √À‰«¡ „Õ«Ê·… ≈‰‘«¡ «·„·› %s.  „ Êﬁ› «·⁄„·Ì….');
define('_AM_NEWS_EXPORT_READY', "„·› «·‹XML Ã«Â“ ·· ‰“Ì·. <br /><a href='%s'>√‰ﬁ— Â‰« ·· ‰“Ì·</a>.<br />·« ‰”Ï <a href='%s'>Õ–›Â ⁄‰œ «·≈‰ Â«¡</a> .");
define('_AM_NEWS_RSS_URL', "—«»ÿ  €–Ì…RSS ");
define('_AM_NEWS_NEWSLETTER', "«·‰‘—…");
define('_AM_NEWS_NEWSLETTER_BETWEEN', '«Œ — «·√Œ»«— «·„‰‘Ê—… »Ì‰');
define('_AM_NEWS_NEWSLETTER_READY', "«·‰‘—… Ã«Â“… ·· Õ„Ì· . <br /><a href='%s'>√‰ﬁ— Â‰« ·· Õ„Ì·</a>.<br />·« ‰”Ï <a href='%s'>Õ–›Â« ⁄‰œ «·≈‰ Â«¡</a> .");
define('_AM_NEWS_DELETED_OK'," „ Õ–› «·„·› »‰Ã«Õ");
define('_AM_NEWS_DELETED_PB',"ÕœÀ  „‘ﬂ·… √À‰«¡ Õ–› «·„·›");
define('_AM_NEWS_STATS0','≈Õ’«∆Ì«  «·√ﬁ”«„');
define('_AM_NEWS_STATS','«·≈Õ’«∆Ì« ');
define('_AM_NEWS_STATS1','«·„ƒ·›Ì‰ »‘ﬂ· ›—Ìœ');
define('_AM_NEWS_STATS2','«·„Ã«„Ì⁄');
define('_AM_NEWS_STATS3','«Õ’«∆Ì«  «·√Œ»«—');
define('_AM_NEWS_STATS4','«·√Œ»«— «·√ﬂÀ— ﬁ—«¡…');
define('_AM_NEWS_STATS5','«·√Œ»«— «·√ﬁ· ﬁ—«¡…');
define('_AM_NEWS_STATS6','«·√Œ»«— «·√›÷·  ﬁÌÌ„«');
define('_AM_NEWS_STATS7','«·„ƒ·›Ì‰ «·√ﬂÀ— ﬁ—«¡…');
define('_AM_NEWS_STATS8','«·„ƒ·›Ì‰ «·–Ì Õ«“Ê« ⁄·Ï √›÷·  ’ÊÌ ');
define('_AM_NEWS_STATS9','√ﬂÀ— «·„‘«—ﬂÌ‰');
define('_AM_NEWS_STATS10','«Õ’«∆Ì«  «·„ƒ·›Ì‰');
define('_AM_NEWS_STATS11',"⁄œœ «·√Œ»«—");
define('_AM_NEWS_HELP',"„”«⁄œ…");
define("_AM_NEWS_MODULEADMIN","≈œ«—… «·»—‰«„Ã");
define("_AM_NEWS_GENERALSET", "≈⁄œ«œ«  «·»—‰«„Ã" );
define('_AM_NEWS_GOTOMOD','≈–Â» ≈·Ï «·»—‰«„Ã');
define('_AM_NEWS_NOTHING',"⁄–—« , Ê·ﬂ‰ ·«ÌÊÃœ ‘Ì¡ · ‰“Ì·… !");
define('_AM_NEWS_NOTHING_PRUNE',"⁄–—« , Ê·ﬂ‰ ·« ÊÃœ √Œ»«— · ‰ŸÌ›Â«, !");
define('_AM_NEWS_TOPIC_COLOR',"·Ê‰ «·ﬁ”„");
define('_AM_NEWS_COLOR',"«··Ê‰");
define('_AM_NEWS_REMOVE_BR',"ÕÊ· Ê”Ê„ «·Â „·  &lt;br&gt; ≈·Ï ”ÿ— ÃœÌœ ?");
// Added in 1.3 RC2
define('_AM_NEWS_PLEASE_UPGRADE',"<a href='upgrade.php'><font color='#FF0000'>«·—Ã«¡ ÕœÀ «·»—‰«„Ã !</font></a>");

// Added in verisn 1.50
define('_AM_NEWS_NEWSLETTER_HEADER', "«· —ÊÌ”…");
define('_AM_NEWS_NEWSLETTER_FOOTER', "«· –ÌÌ·");
define('_AM_NEWS_NEWSLETTER_HTML_TAGS', "≈“«·… Ê”Ê„ HTML ø");
define('_AM_NEWS_VERIFY_TABLES','’Ì«‰… «·Ãœ«Ê· ');
define('_AM_NEWS_METAGEN',"„›« ÌÕ „Õ—ﬂ«  «·»ÕÀ");
define('_AM_NEWS_METAGEN_DESC',"‰Ÿ«„ Metagen ÂÊ ‰Ÿ«„ Ì”«⁄œﬂ ⁄·Ï  Õ”Ì‰ ŸÂÊ— ’›Õ«  „Êﬁ⁄ﬂ ›Ì ‰ «∆Ã „Õ—ﬂ«  «·»ÕÀ «·⁄«·„Ì….<br />≈–« ·„  ﬁ„ »ﬂ «»… «·ﬂ·„«  «·„› «ÕÌ… Ê «·Ê’› ›”Ê› ÌﬁÊ„ «·‰Ÿ«„ »≈‰‘«∆Â«  ·ﬁ«∆Ì«.");
define('_AM_NEWS_BLACKLIST',"«·ﬁ«∆„… «·”¯Êœ«¡");
define('_AM_NEWS_BLACKLIST_DESC',"«·ﬂ·„«  ›Ì Â–Â «·ﬁ«∆„… ”Ê› ·‰  ” Œœ„ ›Ì  ﬂÊÌ‰ «·ﬂ·„«  «·„› «ÕÌ…");
define('_AM_NEWS_BLACKLIST_ADD',"≈÷«›… ");
define('_AM_NEWS_BLACKLIST_ADD_DSC',"«ﬂ » «·ﬂ·„«  «·„—«œ ≈÷«› Â« ··ﬁ«∆„…<br />(ﬂ·„… Ê«Õœ… ›Ì ﬂ· ”ÿ—)");
define('_AM_NEWS_META_KEYWORDS_CNT',"√ﬁ’Ï ⁄œœ ··ﬂ·„«  «·„› «ÕÌ… ›Ì Õ«·… «·≈‰‘«¡ «·–« Ì");
define('_AM_NEWS_META_KEYWORDS_ORDER'," — Ì» «·ﬂ·„«  «·„› «ÕÌ…");
define('_AM_NEWS_META_KEYWORDS_INTEXT'," ﬂÊÌ‰ «·ﬂ·„«  Õ”»  — Ì»Â« ›Ì «·‰’");
define('_AM_NEWS_META_KEYWORDS_FREQ1'," — Ì»  ﬂ—«— «·ﬂ·„« ");
define('_AM_NEWS_META_KEYWORDS_FREQ2',"⁄ﬂ”  — Ì»  ﬂ—«— «·ﬂ·„« ");
?>