<?php
// $Id: admin.php,v 1.18 2004/07/26 17:51:25 hthouzard Exp $
//%%%%%%	Admin Module Name  Articles 	%%%%%
define("_AM_DBUPDATED","数据库更新完成！");
define("_AM_CONFIG","新闻区设置");
define("_AM_AUTOARTICLES","自动发布");
define("_AM_STORYID","新闻ID");
define("_AM_TITLE","新闻主题");
define("_AM_TOPIC","新闻分类");
define("_AM_POSTER","发布者");
define("_AM_PROGRAMMED","日期/时间安排");
define("_AM_ACTION","操作");
define("_AM_EDIT","编辑");
define("_AM_DELETE","删除");
define("_AM_LAST10ARTS","最新%d篇新闻");
define("_AM_PUBLISHED","发布时间"); // Published Date
define("_AM_GO","确定");
define("_AM_EDITARTICLE","编辑新闻");
define("_AM_POSTNEWARTICLE","发布新闻");
define("_AM_ARTPUBLISHED","您提交的新闻已经发布了！");
define("_AM_HELLO","您好，%s");
define("_AM_YOURARTPUB","您提供的新闻巳经发布了。");
define("_AM_TITLEC","新闻标题：");
define("_AM_URLC","网址：");
define("_AM_PUBLISHEDC","发布时间：");
define("_AM_RUSUREDEL","您确定要删除此新闻和所有的评论吗？");
define("_AM_YES","是");
define("_AM_NO","否");
define("_AM_INTROTEXT","简述");
define("_AM_EXTEXT","正文");
define("_AM_ALLOWEDHTML","允许使用HTML语法：");
define("_AM_DISAMILEY","禁用表情图");
define("_AM_DISHTML","禁用HTML语法");
define("_AM_APPROVE","<font color=red>核准</font>");
define("_AM_MOVETOTOP","将该新闻移动到最顶端");
define("_AM_CHANGEDATETIME","改变发布的日期/时间");
define("_AM_NOWSETTIME","设置如下：%s"); // %s is datetime of publish
define("_AM_CURRENTTIME","现在的时间：%s");  // %s is the current datetime
define("_AM_SETDATETIME","设置发布的日期/时间");
define("_AM_MONTHC","月：");
define("_AM_DAYC","日：");
define("_AM_YEARC","年：");
define("_AM_TIMEC","时间：");
define("_AM_PREVIEW","预览");
define("_AM_SAVE","保存");
define("_AM_PUBINHOME","发布在首页？");
define("_AM_ADD","添加");

//%%%%%%	Admin Module Name  Topics 	%%%%%

define("_AM_ADDMTOPIC","添加一个主分类");
define("_AM_TOPICNAME","分类名称");
// Warning, changed from 40 to 255 characters.
define("_AM_MAX40CHAR","(最大：255 字符)");
define("_AM_TOPICIMG","分类图像");
define("_AM_IMGNAEXLOC","图像名称 + 扩展名，位于 %s");
define("_AM_FEXAMPLE","例如：games.gif");
define("_AM_ADDSUBTOPIC","添加一个子分类");
define("_AM_IN","于");
define("_AM_MODIFYTOPIC","修改分类");
define("_AM_MODIFY","修改");
define("_AM_PARENTTOPIC","主分类");
define("_AM_SAVECHANGE","保存更改");
define("_AM_DEL","删除");
define("_AM_CANCEL","取消");
define("_AM_WAYSYWTDTTAL","警告：您确定要删除这个新闻分类及其所有的内容和评论吗？");


// Added in Beta6
define("_AM_TOPICSMNGR","分类管理");
define("_AM_PEARTICLES","发表/编辑新闻");
define("_AM_NEWSUB","新发表的新闻");
define("_AM_POSTED","发表");
define("_AM_GENERALCONF","一般设置");

// Added in RC2
define("_AM_TOPICDISPLAY","是否显示新闻分类图案？");
define("_AM_TOPICALIGN","位置");
define("_AM_RIGHT","右");
define("_AM_LEFT","左");

define("_AM_EXPARTS","过期新闻");
define("_AM_EXPIRED","过期时效");
define("_AM_CHANGEEXPDATETIME","改变过期时效日期/时间");
define("_AM_SETEXPDATETIME","设置过期时效日期/时间");
define("_AM_NOWSETEXPTIME","当前设置为：%s");

// Added in RC3
define("_AM_ERRORTOPICNAME", "必须输入分类名称！");
define("_AM_EMPTYNODELETE", "内容为空！");

// Added 240304 (Mithrandir)
define('_AM_GROUPPERM', '提交/审核/阅读权限');
define('_AM_SELFILE','选择上传文件');

// Added by Herv?
define('_AM_UPLOAD_DBERROR_SAVE','添加附件出错');
define('_AM_UPLOAD_ERROR','上传文件出错');
define('_AM_UPLOAD_ATTACHFILE','上传的文件');
define('_AM_APPROVEFORM', '审核权限');
define('_AM_SUBMITFORM', '提交权限');
define('_AM_VIEWFORM', '阅读权限');
define('_AM_APPROVEFORM_DESC', '选择谁能审核');
define('_AM_SUBMITFORM_DESC', '选择谁能提交');
define('_AM_VIEWFORM_DESC', '选择谁能阅读新闻');
define('_AM_DELETE_SELFILES', '删除选定的文件');
define('_AM_TOPIC_PICTURE', '上传图片');
define('_AM_UPLOAD_WARNING', '<B>提醒！请将下列目录属性设为可写：%s</B>');

define('_AM_NEWS_UPGRADECOMPLETE', '更新完成');
define('_AM_NEWS_UPDATEMODULE', '更新模块模板和区块');
define('_AM_NEWS_UPGRADEFAILED', '更新失败');
define('_AM_NEWS_UPGRADE', '更新');
define('_AM_ADD_TOPIC','增加一个分类');
define('_AM_ADD_TOPIC_ERROR','错误，该分类已存在！');
define('_AM_ADD_TOPIC_ERROR1','错误：不能选择此分类作为父分类！');
define('_AM_SUB_MENU','将该分类作为子菜单发布');
define('_AM_SUB_MENU_YESNO','子菜单');
define('_AM_HITS', '点击数');
define('_AM_CREATED', '已创建');

define('_AM_TOPIC_DESCR', "分类描述");
define('_AM_USERS_LIST', "用户列表");
define('_AM_PUBLISH_FRONTPAGE', "发布在首页？");
define('_AM_NEWS_UPGRADEFAILED1', '不能创建“新闻附件”的数据表');
define('_AM_NEWS_UPGRADEFAILED2', "不能改变分类标题的长度");
define('_AM_NEWS_UPGRADEFAILED21', "不能在分类表中增加新的字段");
define('_AM_NEWS_UPGRADEFAILED3', '不能创建“新闻投票”的数据表');
define('_AM_NEWS_UPGRADEFAILED4', "不能在“新闻”数据表中创建“评分”和“投票”二个字段");
define('_AM_NEWS_UPGRADEFAILED0', "请记住此信息，并尝试使用phpMyadmin和sql纠正NEWS模块的“sql”文件夹中定义的文件");
define('_AM_NEWS_UPGR_ACCESS_ERROR',"错误，使用此升级脚本，您必须是此模块的管理员");
define('_AM_NEWS_PRUNE_BEFORE',"删除在此之前发布的新闻：");
define('_AM_NEWS_PRUNE_EXPIREDONLY',"仅删除过期的新闻");
define('_AM_NEWS_PRUNE_CONFIRM',"警告，您将永久删除在 %s 之前发布的新闻 (此操作不可撤消)。共有 %s 篇新闻。<br />您是否确定？");
define('_AM_NEWS_PRUNE_TOPICS',"仅限于以下分类");
define('_AM_NEWS_PRUNENEWS', '删除新闻');
define('_AM_NEWS_EXPORT_NEWS', '新闻导出（XML）');
define('_AM_NEWS_EXPORT_NOTHING', "抱歉，没有生成任何导出内容，请检查您的设定");
define('_AM_NEWS_PRUNE_DELETED', '%d 篇新闻已删除');
define('_AM_NEWS_PERM_WARNING', '<h2>警告，您有3个表单，因此有3个提交按钮</h2>');
define('_AM_NEWS_EXPORT_BETWEEN', '导出以下范围的新闻：');
define('_AM_NEWS_EXPORT_AND', ' -- ');
define('_AM_NEWS_EXPORT_PRUNE_DSC', "如果您未选择任何分类，则将选择所有分类<br/> 否则仅为选择的分类");
define('_AM_NEWS_EXPORT_INCTOPICS', '是否包括分类定义？');
define('_AM_NEWS_EXPORT_ERROR', '当尝试创建%s文件时产生错误。操作终止。');
define('_AM_NEWS_EXPORT_READY', "您导出的xml文件已可以下载。<br /><a href='%s'>点击此链接下载</a>。<br />当您完成下载后，请勿忘记 <a href='%s'>删除</a>。");
define('_AM_NEWS_RSS_URL', "RSS feed 链接");
define('_AM_NEWS_NEWSLETTER', "新闻快报");
define('_AM_NEWS_NEWSLETTER_BETWEEN', '选择新闻发布的时间范围：');
define('_AM_NEWS_NEWSLETTER_READY', "您的新闻快报文件已可以下载。<br /><a href='%s'>点击此链接下载</a>。<br />当您完成下载后，请勿忘记 <a href='%s'>删除</a>。");
define('_AM_NEWS_DELETED_OK',"文件删除成功");
define('_AM_NEWS_DELETED_PB',"删除此文件时发生错误");
define('_AM_NEWS_STATS0','分类统计');
define('_AM_NEWS_STATS','统计');
define('_AM_NEWS_STATS1','作者数量');
define('_AM_NEWS_STATS2','总计');
define('_AM_NEWS_STATS3','新闻统计');
define('_AM_NEWS_STATS4','阅读最多的新闻');
define('_AM_NEWS_STATS5','阅读最少的新闻');
define('_AM_NEWS_STATS6','评分最高的新闻');
define('_AM_NEWS_STATS7','阅读最多的作者');
define('_AM_NEWS_STATS8','评分最高的作者');
define('_AM_NEWS_STATS9','投稿最多的作者');
define('_AM_NEWS_STATS10','作者统计');
define('_AM_NEWS_STATS11',"新闻数目");
define('_AM_NEWS_HELP',"帮助");
define("_AM_NEWS_MODULEADMIN","模块管理");
define("_AM_NEWS_GENERALSET", "模块设定" );
define('_AM_NEWS_GOTOMOD','转至模块前台');
define('_AM_NEWS_NOTHING',"抱歉，没有任何内容可以下载，请检查您的设定！");
define('_AM_NEWS_NOTHING_PRUNE',"抱歉，没有任何新闻可以删除，请检查您的设定！");
define('_AM_NEWS_TOPIC_COLOR',"分类颜色");
define('_AM_NEWS_COLOR',"颜色");
define('_AM_NEWS_REMOVE_BR',"转换HTML &lt;br&gt; 标签为换行？");
// Added in 1.3 RC2
define('_AM_NEWS_PLEASE_UPGRADE',"<a href='upgrade.php'><font color='#FF0000'>请更新此模块！</font></a>");

// Added in verisn 1.50
define('_AM_NEWS_NEWSLETTER_HEADER', "信头");
define('_AM_NEWS_NEWSLETTER_FOOTER', "信尾");
define('_AM_NEWS_NEWSLETTER_HTML_TAGS', "清除HTML标记");
define('_AM_NEWS_VERIFY_TABLES','保持表格');
define('_AM_NEWS_METAGEN',"Metagen");
define('_AM_NEWS_METAGEN_DESC',"Metagen是一个能够帮助你的页面更够更好的被搜索引擎收录的系统。<br />除了你自己输入meta关键字和meta的描述，模块会自动生成。");
define('_AM_NEWS_BLACKLIST',"黑名单");
define('_AM_NEWS_BLACKLIST_DESC',"此名单上的词不能用来生成meta关键字。");
define('_AM_NEWS_BLACKLIST_ADD',"添加");
define('_AM_NEWS_BLACKLIST_ADD_DSC',"输入添加到此名单上的词。<br />(每一行一个词)");
define('_AM_NEWS_META_KEYWORDS_CNT',"自动生成meta关键字的最大数目");
define('_AM_NEWS_META_KEYWORDS_ORDER',"关键字顺序");
define('_AM_NEWS_META_KEYWORDS_INTEXT',"按照在文中出现的顺序生成");
define('_AM_NEWS_META_KEYWORDS_FREQ1',"词频顺序");
define('_AM_NEWS_META_KEYWORDS_FREQ2',"词频反向排序");
?>