<?php
// $Id: modinfo.php,v 1.21 2004/09/01 17:48:07 hthouzard Exp $
// Module Info

// The name of this module
define('_MI_NEWS_NAME','اخبار ');

// A brief description of this module
define('_MI_NEWS_DESC','برای ساختن بخش خبری پیشرفته کاربران میتوانند خبر ارسال کنند و نظر دهند.');

// Names of blocks for this module (Not all module has blocks)
define('_MI_NEWS_BNAME1','سر فصل های اخبار');
define('_MI_NEWS_BNAME3','خبر مهم امروز');
define('_MI_NEWS_BNAME4','سر تیتر اخبار');
define('_MI_NEWS_BNAME5','اخبار جدید');
define('_MI_NEWS_BNAME6','مدیریت اخبار');
define('_MI_NEWS_BNAME7','جابجایی بین عناوین');

// Sub menus in main menu block
define('_MI_NEWS_SMNAME1','ارسال خبر');
define('_MI_NEWS_SMNAME2','آرشیو');

// Names of admin menu items
define('_MI_NEWS_ADMENU2', 'مدیریت سر فصل ها');
define('_MI_NEWS_ADMENU3', 'نوشتن/ویرایش خبر');
define('_MI_NEWS_GROUPPERMS', 'دسترسی برای دیدن/ارسال/تایید اخبار');
// Added by Hervé for prune option
define('_MI_NEWS_PRUNENEWS', 'هرس کردن اخبار (prune)');
// Added by Hervé
define('_MI_NEWS_EXPORT', 'خروجی اخبار (export)');

// Title of config items
define('_MI_STORYHOME', 'تعداد خبر هایی را که درصفحه نشان داده می شوند انتخاب کنید');
define('_MI_NOTIFYSUBMIT', 'بله را انتخاب کنید تا پیام آگهی رسانی بعد از ارسال خبر به مدیر فرستاده شود');
define('_MI_DISPLAYNAV', 'بله را انتخاب کنید تا navigation box در بالای صفحه نشان داده شود');
define('_MI_ANONPOST','اجازه به کاربران مهمان برای ارسال خبر؟'); //only in news 1.1
define('_MI_AUTOAPPROVE','تایید خودکار خبر ها بدون نیاز به بررسی مدیر؟');
define("_MI_ALLOWEDSUBMITGROUPS", "گروه هایی که می توانند خبر ارسال کنند");
define("_MI_ALLOWEDAPPROVEGROUPS", "گروه هایی که می توانند خبر ها را تایید کنند");
define("_MI_NEWSDISPLAY", "ساختار نشان دادن اخبار");
define("_MI_NAMEDISPLAY","نام نویسنده");
define("_MI_COLUMNMODE","ستون ها");
define("_MI_STORYCOUNTADMIN","تعداد خبر های جدیدی که در صفحه مدیریت نشان داده می شود: ");
define('_MI_UPLOADFILESIZE', 'حداکثر حجم فایل مجاز برای بار گذاری (KB) 1048576 = 1 Meg');
define("_MI_UPLOADGROUPS","گروه های مجاز برای بارگذاری");


// Description of each config items
define('_MI_STORYHOMEDSC', '');
define('_MI_NOTIFYSUBMITDSC', '');
define('_MI_DISPLAYNAVDSC', '');
define('_MI_AUTOAPPROVEDSC', '');
define("_MI_ALLOWEDSUBMITGROUPSDESC", "گروه های انتخاب شده می توانند خبر ارسال کنند");
define("_MI_ALLOWEDAPPROVEGROUPSDESC", "گروه های انتخاب شده می توانند خبر تایید کنند");
define("_MI_NEWSDISPLAYDESC", "نمایش به شیوه مرسوم (clasic) خبر ها را بر اساس تاریخ انتشار نمایش می دهد. نمایش از روی سر فصل (by topic) خبر ها رابر اساس سر فصل نشان میدهد به طوری که آخرین خبر هر سر فصل به طور کامل و بقیه خبر ها در آن سر فصل به صورت لینک در زیر آن نمایش داده می شوند.");
define('_MI_ADISPLAYNAMEDSC', 'انتخاب کنید که نام نویسنده چطور نمایش داده شود');
define("_MI_COLUMNMODE_DESC","میتوانید تعداد ستون هایی را که برای نمایش اخبار استفاده می شود انتخاب کنید");
define("_MI_STORYCOUNTADMIN_DESC","");
define("_MI_UPLOADFILESIZE_DESC","");
define("_MI_UPLOADGROUPS_DESC","گروه هایی را که میتوانند فایل بارگذاری کنند انتخاب کنید");

// Name of config item values
define("_MI_NEWSCLASSIC", "مرسوم (خبرهای پشت سر هم)");
define("_MI_NEWSBYTOPIC", "بر اساس سر فصل (by topic)");
define("_MI_DISPLAYNAME1", "شناسه کاربری");
define("_MI_DISPLAYNAME2", "نام واقعی");
define("_MI_DISPLAYNAME3", "نویسنده را نشان نده");
define("_MI_UPLOAD_GROUP1","ارسال کننده ها و تایید کننده ها");
define("_MI_UPLOAD_GROUP2","فقط تایید کننده ها");
define("_MI_UPLOAD_GROUP3","غیر فعال کردن امکان بارگذاری فایل");

// Text for notifications

define('_MI_NEWS_GLOBAL_NOTIFY', 'کلی');
define('_MI_NEWS_GLOBAL_NOTIFYDSC', 'تنظیمات اطلاع رسانی اخبار');

define('_MI_NEWS_STORY_NOTIFY', 'نوشته');
define('_MI_NEWS_STORY_NOTIFYDSC', 'تنظیمات اطلاع رسانی مورد استفاده در همین فروم');

define('_MI_NEWS_GLOBAL_NEWCATEGORY_NOTIFY', 'عنوان جدید');
define('_MI_NEWS_GLOBAL_NEWCATEGORY_NOTIFYCAP', 'وقتی یک عنوان جدید ایجاد شد مرا با خبر کن');
define('_MI_NEWS_GLOBAL_NEWCATEGORY_NOTIFYDSC', 'آگهی رسانی برای ساخته شدن عنوان جدید');
define('_MI_NEWS_GLOBAL_NEWCATEGORY_NOTIFYSBJ', '[{X_SITENAME}] {X_MODULE} auto-notify : New news topic');

define('_MI_NEWS_GLOBAL_STORYSUBMIT_NOTIFY', 'خبر جدید ارسال شده');       
define('_MI_NEWS_GLOBAL_STORYSUBMIT_NOTIFYCAP', 'هر خبر جدیدی که ارسال شد مرا با خبر کن');                           
define('_MI_NEWS_GLOBAL_STORYSUBMIT_NOTIFYDSC', 'آگهی رسانی برای ارسال یک خبر جدید');                
define('_MI_NEWS_GLOBAL_STORYSUBMIT_NOTIFYSBJ', '[{X_SITENAME}] {X_MODULE} اطلاع رسانی خودکار:خبر جدید ارسال شده');                              

define('_MI_NEWS_GLOBAL_NEWSTORY_NOTIFY', 'خبر جدید');       
define('_MI_NEWS_GLOBAL_NEWSTORY_NOTIFYCAP', 'هر خبر جدیدی در سایت قرار گرفت مرا با خبر کن');
define('_MI_NEWS_GLOBAL_NEWSTORY_NOTIFYDSC', 'آگهی رسانی برای قرار گرفتن یک خبر جدید در سایت');
define('_MI_NEWS_GLOBAL_NEWSTORY_NOTIFYSBJ', '[{X_SITENAME}] {X_MODULE} اطلاع رسانی خودکار:خبر جدید');                              

define('_MI_NEWS_STORY_APPROVE_NOTIFY', 'خبر تایید شده');
define('_MI_NEWS_STORY_APPROVE_NOTIFYCAP', 'هر خبری که تایید شد مرا با خبر کن');
define('_MI_NEWS_STORY_APPROVE_NOTIFYDSC', 'آگهی رسانی برای خبر تایید شده');
define('_MI_NEWS_STORY_APPROVE_NOTIFYSBJ', '[{X_SITENAME}] {X_MODULE} اطلاع رسانی خودکار:خبر تایید شده');


define('_MI_RESTRICTINDEX', 'سر فصل های خبری را محدود به صفحه اصلی خبر کن؟');
define('_MI_RESTRICTINDEXDSC', 'اگر روی بله باشد کاربر فقط خبر ها را در صفحه اصلی سر فصل خواهد دید و در صورتی میتوانند یک خبر را به طور کامل ببینند که دسترسی داشته باشند');

define('_MI_NEWSBYTHISAUTHOR', 'همه خبر های ارسال شده از طرف: ');
define('_MI_NEWSBYTHISAUTHORDSC', 'If you set this option to yes, then a link \'Articles by this author\' will be visible');

define('_MI_NEWS_PREVNEX_LINK','لینک قبلی و بعدی را نشان بده؟');
define('_MI_NEWS_PREVNEX_LINK_DESC','When this option is set to \'Yes\', two new links are visibles at the bottom of each article. Those links are used to go to the previous and next article according to the publish date');
define('_MI_NEWS_SUMMARY_SHOW','نشان دادن جدول خلاصه خبر؟');
define('_MI_NEWS_SUMMARY_SHOW_DESC','When you use this option, a summary containing links to all the recent published articles is visible at the bottom of each article');
define('_MI_NEWS_AUTHOR_EDIT','اجازه به نویسنده خبر برای ویرایش آن؟');
define('_MI_NEWS_AUTHOR_EDIT_DESC','With this option, authors can edit their posts.');
define('_MI_NEWS_RATE_NEWS','فعال کردن ارزش یابی؟');
define('_MI_NEWS_TOPICS_RSS','فعال کردن RSS برای هر سر فصل؟');
define('_MI_NEWS_TOPICS_RSS_DESC',"If you set this option to 'Yes' then the topics content will be available as RSS feeds");
define('_MI_NEWS_DATEFORMAT', "فرمت تاریخ");
define('_MI_NEWS_DATEFORMAT_DESC',"Please refer to the Php documentation (http://fr.php.net/manual/en/function.date.php) for more information on how to select the format. Note, if you don't type anything then the default date's format will be used");
define('_MI_NEWS_META_DATA', "فعال کردن متاها (شرح و کلمات کلیدی) ؟");
define('_MI_NEWS_META_DATA_DESC', "If you set this option to 'yes' then the approvers will be able to enter the following meta datas : keywords and description");
define('_MI_NEWS_BNAME8','خبر های تصادفی');
define('_MI_NEWS_NEWSLETTER','خبرنامه');
define('_MI_NEWS_STATS','آمار');
define("_MI_NEWS_FORM_OPTIONS","انتخاب ویرایشگر");
define("_MI_NEWS_FORM_COMPACT","فشرده");
define("_MI_NEWS_FORM_DHTML","DHTML");
define("_MI_NEWS_FORM_SPAW","Spaw ویرایشگر");
define("_MI_NEWS_FORM_HTMLAREA","HtmlArea ویرایشگر");
define("_MI_NEWS_FORM_FCK","FCK ویرایشگر");
define("_MI_NEWS_FORM_KOIVI","Koivi ویرایشگر");
define("_MI_NEWS_FORM_OPTIONS_DESC","Select the editor to use. If you have a 'simple' install (e.g you use only xoops core editor class, provided in the standard xoops core package), then you can just select DHTML and Compact");
define("_MI_NEWS_KEYWORDS_HIGH","برجسته کردن کلمات کلیدی؟");
define("_MI_NEWS_KEYWORDS_HIGH_DESC","If you use this option then the keywords typed in the search will be highlited in the articles");
define("_MI_NEWS_HIGH_COLOR","رنگ مورد استفاده برای برجسته کردن کلمات کلیدی؟");
define("_MI_NEWS_HIGH_COLOR_DES","Only use this option if you have choosed Yes for the previous option");
define("_MI_NEWS_INFOTIPS","طول tooltip");
define("_MI_NEWS_INFOTIPS_DES","If you use this option, links related to news will contains the first (n) characters of the article. If you set this value to 0 then the infotips will be empty");
define("_MI_NEWS_SITE_NAVBAR","استفاده از نویگیشن بار موزیلا یا اوپرا؟");
define("_MI_NEWS_SITE_NAVBAR_DESC","اگر این گزینه را روی بله بگذارید بازدید کنندگان سایت شما میتوانند برای مرور سایت شما از این ها استفاده کنند.");
define("_MI_NEWS_TABS_SKIN","از پوسته های که در تب ها میخواهید استفاده کنید");
define("_MI_NEWS_TABS_SKIN_DESC","این پوسته در تمام بلاک هایی که تب دارند استفاده می شود");
define("_MI_NEWS_SKIN_1","Bar Style");
define("_MI_NEWS_SKIN_2","Beveled");
define("_MI_NEWS_SKIN_3","Classic");
define("_MI_NEWS_SKIN_4","Folders");
define("_MI_NEWS_SKIN_5","MacOs");
define("_MI_NEWS_SKIN_6","Plain");
define("_MI_NEWS_SKIN_7","Rounded");
define("_MI_NEWS_SKIN_8","ZDnet style");

// Added in version 1.50
define('_MI_NEWS_BNAME9','بایگانی ها');
define("_MI_NEWS_FORM_TINYEDITOR","ویرایشگر TinyEditor");
define("_MI_NEWS_FOOTNOTES","لینک های داخل خبر را به صورت قابل چاپ نمایش دهد؟");
define("_MI_NEWS_DUBLINCORE","فعال کردن موتور داده Dublin Core?");
define("_MI_NEWS_DUBLINCORE_DSC","برای اطلاعات بیشتر, <a href='http://dublincore.org/'>این لینک را بزنید</a>");
define("_MI_NEWS_BOOKMARK_ME"," نمایش گزینه 'این خبر را در این سایت ها بوک مارک کن' در بلاک ؟");
define("_MI_NEWS_BOOKMARK_ME_DSC","این بلاک در صفحه نمایش خبر قرار میگیرد");
define("_MI_NEWS_FF_MICROFORMAT","فعال کردن خلاصه های ریز در مرورگر فایر فاکس 2");
define("_MI_NEWS_FF_MICROFORMAT_DSC","برای اطلاعات بیشتر <a href='http://wiki.mozilla.org/Microsummaries' target='_blank'>این صفحه</a> را ببینید.");
define("_MI_NEWS_WHOS_WHO","اسامی ارسال کنندگان خبر");
define("_MI_NEWS_METAGEN","موتور متا");
define("_MI_NEWS_TOPICS_DIRECTORY","شاخه سر فصل ها");
define("_MI_NEWS_ADVERTISEMENT","تبلیغات");
define("_MI_NEWS_ADV_DESCR","یک متن یا کد جاوا اسکریپت را در اینجا وارد کنید تا در هر خبر نمایش یابد");
define("_MI_NEWS_MIME_TYPES","Mime Type های مجاز برای بارگذاری فایل را وارد کنید (هر کدام را در یک خط بنویسید)");
define("_MI_NEWS_ENHANCED_PAGENAV","استفاده از صفحه گذاری پیشرفته؟");
define("_MI_NEWS_ENHANCED_PAGENAV_DSC","با استفاده از این گزینه شما میتوانید در خبر خود صفحات مختلف داشته باشید و هر صفحه دارای یک عنوان مستقل مربوط به خود است. این صفحه را باید به این صورت بنویسید: [pagrebreak:عنوان صفحه جدید]،لینک صفحات در یک منوی دراپ دان نشان داده می شوند با استفاده از تگ  [summary] میتوانید خلاصه ای از صفحات را در ابتدای متن داشته باشید. توجه کنید که داخل عنوان صفحه از [ یا ] استفاده نکنید.");
// Added in version 1.54
define('_MI_NEWS_CATEGORY_NOTIFY','شاخه');
define('_MI_NEWS_CATEGORY_NOTIFYDSC','گزینه های آگهی رسانی که برای این شاخه به کار می رود');

define('_MI_NEWS_CATEGORY_STORYPOSTED_NOTIFY', 'خبر جدید ارسال شده');
define('_MI_NEWS_CATEGORY_STORYPOSTED_NOTIFYCAP', 'هر خبر جدیدی در این شاخه ارسال شد مرا با خبر کن');
define('_MI_NEWS_CATEGORY_STORYPOSTED_NOTIFYDSC', 'دریافت آگهی رسانی هنگامی که هر خبر جدیدی به این شاخه ارشال شد.');
define('_MI_NEWS_CATEGORY_STORYPOSTED_NOTIFYSBJ', '[{X_SITENAME}] {X_MODULE} آگهی رسانی خودکار : خبر جدید');
?>