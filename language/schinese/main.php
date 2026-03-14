<?php
// $Id: main.php,v 1.9 2004/07/26 17:51:25 hthouzard Exp $
//%%%%%%		File Name index.php 		%%%%%
define("_NW_PRINTER","可打印模式");
define("_NW_SENDSTORY","转发给朋友");
define("_NW_READMORE","阅读全文...");
define("_NW_COMMENTS","发表评论");
define("_NW_ONECOMMENT","1篇评论");
define("_NW_BYTESMORE","%s字符 (含本文)");
define("_NW_NUMCOMMENTS","%s篇评论");
define("_NW_MORERELEASES", "更多内容 ");


//%%%%%%		File Name submit.php		%%%%%
define("_NW_SUBMITNEWS","发布新闻");
define("_NW_TITLE","标题");
define("_NW_TOPIC","新闻分类");
define("_NW_THESCOOP","摘要");
define("_NW_NOTIFYPUBLISH","若有人评论，发mail通知");
define("_NW_POST","发布");
define("_NW_GO","确定");
define("_NW_THANKS","感谢您提供新闻。"); //submission of news article

define("_NW_NOTIFYSBJCT","有人提供新的新闻"); // Notification mail subject
define("_NW_NOTIFYMSG","有人到站上提供了新闻，请去看一看。"); // Notification mail message

//%%%%%%		File Name archive.php		%%%%%
define("_NW_NEWSARCHIVES","按月归档");
define("_NW_ARTICLES","新闻");
define("_NW_VIEWS","阅读数");
define("_NW_DATE","日期");
define("_NW_ACTIONS","功能选项");
define("_NW_PRINTERFRIENDLY","可打印模式");

define("_NW_THEREAREINTOTAL","总计有%s篇新闻");

// %s is your site name
define("_NW_INTARTICLE","不错的新闻来自于%s");
define("_NW_INTARTFOUND","我在%s发现不错的新闻哦");

define("_NW_TOPICC","新闻类别：");
define("_NW_URL","链接 (URL)：");
define("_NW_NOSTORY","抱歉，尚未选择新闻。");

//%%%%%%	File Name print.php 	%%%%%

define("_NW_URLFORSTORY","本篇新闻的链接网址是：");

// %s represents your site name
define("_NW_THISCOMESFROM","本篇新闻来自：%s");

// Added by Herv?
define("_NW_ATTACHEDFILES","附件：");
define("_NW_ATTACHEDLIB","该新闻有附件");
define("_NW_NEWSSAMEAUTHORLINK","该作者发布的其他新闻");
define("_NW_NEWS_NO_TOPICS","尚无分类，请在提交新闻前先创建至少一个分类");
define("_NW_PREVIOUS_ARTICLE","上一篇");
define("_NW_NEXT_ARTICLE","下一篇");
define("_NW_OTHER_ARTICLES","其他新闻");

// Added by Herv?in version 1.3 for rating
define("_NW_RATETHISNEWS","对此新闻评分");
define("_NW_RATEIT","评分");
define("_NW_TOTALRATE","总评分");
define("_NW_RATINGLTOH","升序评分 (从低到高)");
define("_NW_RATINGHTOL","降序评分 (从高到低)");
define("_NW_RATINGC","评分: ");
define("_NW_RATINGSCALE","分值范围为：1 - 10。1为最低，10为最高。");
define("_NW_BEOBJECTIVE","请认真评分，若每篇新闻都为1或10，评分将毫无意义。");
define("_NW_DONOTVOTE","请不要给自己的新闻评分。");
define("_NW_RATING","评分");
define("_NW_VOTE","投票");
define("_NW_NORATING","尚未选择评分。");
define("_NW_USERAVG","平均用户评分");
define("_NW_DLRATINGS","新闻评分 (总票数: %s)");
define("_NW_ONEVOTE","1 票");
define("_NW_NUMVOTES","%u 票");		// Warning
define("_NW_CANTVOTEOWN","您不能对自己的新闻投票。<br />所有投票将被记录和检查。");
define("_NW_VOTEDELETED","投票数据已删除。");
define("_NW_VOTEONCE","请勿对同一篇新闻多次投票。");
define("_NW_VOTEAPPRE","感谢您的投票。");
define("_NW_THANKYOU","感谢您在 %s 参加投票"); // %s is your site name
define("_NW_RSSFEED","RSS Feed");	// Warning, this text is included insided an Alt attribut (for a picture), so take care to the quotes
define("_NW_AUTHOR","作者");
define("_NW_META_DESCRIPTION","Meta 描述");
define("_NW_META_KEYWORDS","Meta 关键词");
define("_NW_MAKEPDF","创建PDF");
define('_MD_POSTEDON',"发布于：");
define("_NW_AUTHOR_ID","作者ID");
define("_NW_POST_SORRY","抱歉，尚无该分类或是您尚不具备在分类中发表的权限。如果您是管理员，请进入权限管理并设定“提交”权限。");

// Added in v 1.50
define("_NW_LINKS","链接");
define("_NW_PAGE","页");
define("_NW_BOOKMARK_ME","在以上网站做书签");
define('_AM_NEWS_TOTAL',"共 %u 篇文章");
define('_AM_NEWS_WHOS_WHO',"作者列表");
define('_NW_NEWS_LIST_OF_AUTHORS',"这是作者列表, 点击名字可看到他的文章");
define('_AM_NEWS_TOPICS_DIRECTORY',"新闻目录");
define("_NW_PAGE_AUTO_SUMMARY","页 %d : %s");
?>