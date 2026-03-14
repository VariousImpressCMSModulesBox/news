<?php
// $Id: main.php,v 1.9 2004/07/26 17:51:25 hthouzard Exp $
//%%%%%%		File Name index.php 		%%%%%
define("_NW_PRINTER","صفحه مناسب چاپ");
define("_NW_SENDSTORY","برای دوستتون بفرستید");
define("_NW_READMORE","ادامه");
define("_NW_COMMENTS","نظر");
define("_NW_ONECOMMENT","1 نظر");
define("_NW_BYTESMORE","%s کلمه در ادامه متن");
define("_NW_NUMCOMMENTS","%s نظر");
define("_NW_MORERELEASES", "خبر های دیگر از");


//%%%%%%		File Name submit.php		%%%%%
define("_NW_SUBMITNEWS","فرستادن خبر برای صفحه اول<br>-خبر ها باید با ذکر منبع باشند از تایید کردن اخبار بدون اینکه منبع آنها مشخص باشد معذوریم<br>- از فرستادن خبر های تکراری و همچنین خبر هایی که اهمیت چندانی ندارند خود داری کنید");

define("_NW_TITLE","عنوان");
define("_NW_TOPIC","دسته");
define("_NW_THESCOOP","متن");
define("_NW_NOTIFYPUBLISH","هنگام انتشار به من خبر بده");
define("_NW_POST","بفرست");
define("_NW_GO","برو!");
define("_NW_THANKS","از نوشته شما سپاس گذاریم."); //submission of news article

define("_NW_NOTIFYSBJCT","نوشته برای سایت من"); // Notification mail subject
define("_NW_NOTIFYMSG","یه نوشته جدید برای صفحه اول سایت اومده."); // Notification mail message

//%%%%%%		File Name archive.php		%%%%%
define("_NW_NEWSARCHIVES","آرشیو اخبار");
define("_NW_ARTICLES","نوشته ها");
define("_NW_VIEWS","بازدید");
define("_NW_DATE","تاریخ");
define("_NW_ACTIONS","کار");
define("_NW_PRINTERFRIENDLY","صفحه مناسب چاپ");

define("_NW_THEREAREINTOTAL"," %s نوشته در کل");

// %s is your site name
define("_NW_INTARTICLE","نوشته جالب در سایت %s");
define("_NW_INTARTFOUND","این یک خبر جالب است که در %s پیدا کردم");

define("_NW_TOPICC","عنوان:");
define("_NW_URL","آدرس:");
define("_NW_NOSTORY","متاسفانه نوشته انتخاب شده وجود ندارد.");

//%%%%%%	File Name print.php 	%%%%%

define("_NW_URLFORSTORY","نشانی این صفحه :");

// %s represents your site name
define("_NW_THISCOMESFROM","نوشته ای از %s");

// Added by Hervé
define("_NW_ATTACHEDFILES","فایل های الصاق شده:");
define("_NW_ATTACHEDLIB","این خبر دارای فایل متصل شده است");
define("_NW_NEWSSAMEAUTHORLINK","خبر های فرستاده شده توسط این شخص");
define("_NW_NEWS_NO_TOPICS","متاسفانه سر فصلی برای ارسال خبر وجود ندارد. اول باید یک سر فصل بسازید");
define("_NW_PREVIOUS_ARTICLE","خبر قبلی");
define("_NW_NEXT_ARTICLE","خبر بعدی");
define("_NW_OTHER_ARTICLES","سایر خبر ها");

// Added by Hervé in version 1.3 for rating
define("_NW_RATETHISNEWS","ارزش گذاری این خبر");
define("_NW_RATEIT","رای دهید!");
define("_NW_TOTALRATE","تمام رای ها");
define("_NW_RATINGLTOH","ارزش گذاری (از کم به زیاد)");
define("_NW_RATINGHTOL","ارزش گذاری (از زیاد به کم)");
define("_NW_RATINGC","ارزش: ");
define("_NW_RATINGSCALE","از 1 تا 10 میتوانید رای دهید یک یعنی به درد نخور و 10 یعنی عالی");
define("_NW_BEOBJECTIVE","لطفا منصف باشید. اگر یکی 1 یا 10 بگیرد این ارزش یابی مفید نخواهد بود.");
define("_NW_DONOTVOTE","برای نوشته های خودتان رای ندهید.");
define("_NW_RATING","ارزش");
define("_NW_VOTE","رای");
define("_NW_NORATING","هیچ عددی انتخاب نشده است");
define("_NW_USERAVG","میانگین ارزش این کاربر");
define("_NW_DLRATINGS","ارزش این خبر (کل رای ها: %s)");
define("_NW_ONEVOTE","1 رای");
define("_NW_NUMVOTES","%u رای");		// Warning
define("_NW_CANTVOTEOWN","شما نمیتوانید به نوشته های خودتان رای دهید.<br />تمام رای ها ذخیره و بازبینی میشوند");
define("_NW_VOTEDELETED","داده های ارزش گذاری حذف شد.");
define("_NW_VOTEONCE","لطفا برای یک نوشته بیش از یک بار رای ندهید");
define("_NW_VOTEAPPRE","با تشکر از رای شما");
define("_NW_THANKYOU","با تشکر از وقتی که برای رای دادن در سایت %s گذاشتید"); // %s is your site name
define("_NW_RSSFEED","RSS Feed");	// Warning, this text is included insided an Alt attribut (for a picture), so take care to the quotes
define("_NW_AUTHOR","نویسنده");
define("_NW_META_DESCRIPTION","شرح Meta (برای موتور های جستجو)");
define("_NW_META_KEYWORDS","کلمات کلیدی Meta (برای موتور های جستجو)");
define("_NW_MAKEPDF","از این خبر یک pdf بساز");
define('_MD_POSTEDON',"ارسال شده در تاریخ : ");
define("_NW_AUTHOR_ID","ID نویسنده");
define("_NW_POST_SORRY","متاسفانه یا سر فصلی وجود ندارد و یا شما دسترسی به هیچ سر فصلی برای ارسال خبر ندارید.اگر شما وب مستر هستید، به صفحه دسترسی ها بروید و دسترسی ها برای 'ارسال' را تنظیم کنید.");

// Added in v 1.50
define("_NW_LINKS","لینک ها");
define("_NW_PAGE","صفحه ها");
define("_NW_BOOKMARK_ME","این خبر را در این سایت ها بوک مارک کن");
define('_AM_NEWS_TOTAL',"تعداد کل %u خبر");
define('_AM_NEWS_WHOS_WHO',"اسامی ارسال کنندگان خبر");
define('_NW_NEWS_LIST_OF_AUTHORS',"در اینجا فهرستی از تمام نویسندگان خبر این سایت را مشاهده می کنید، روی نام نویسنده کلیک کنید تا فهرست خبر های ارسال شده را ببینید");
define('_AM_NEWS_TOPICS_DIRECTORY',"شاخه سر فصل ها");
define("_NW_PAGE_AUTO_SUMMARY","صفحه %d : %s");
// Added in version 1.51
define("_NW_BOOKMARK_TO_BLINKLIST","ارسال خبر به Blinklist");
define("_NW_BOOKMARK_TO_DELICIOUS","ارسال خبر به del.icio.us");
define("_NW_BOOKMARK_TO_DIGG","ارسال خبر به Digg");
define("_NW_BOOKMARK_TO_FARK","ارسال خبر به Fark");
define("_NW_BOOKMARK_TO_FURL","ارسال خبر به Furl");
define("_NW_BOOKMARK_TO_NEWSVINE","ارسال خبر به Newsvine");
define("_NW_BOOKMARK_TO_REDDIT","ارسال خبر به Reddit");
define("_NW_BOOKMARK_TO_SIMPY","ارسال خبر به Simpy");
define("_NW_BOOKMARK_TO_SPURL","ارسال خبر به Spurl");
define("_NW_BOOKMARK_TO_YAHOO","ارسال خبر به یاهو");
define("_NW_BOOKMARK_TO_BALATARIN","ارسال خبر به بالاترین");

// Added in version 1.56
define('_NW_NOTYETSTORY',"متاسفانه خبر انتخاب شده شما هنوز منتشر نشده است. لطفا بعدا مراجعه کرده و مجددا تلاش فرمایید.");
?>