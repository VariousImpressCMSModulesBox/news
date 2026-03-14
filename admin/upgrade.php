<?php
//  ------------------------------------------------------------------------ //
//                  Copyright (c) 2005-2006 Instant Zero                     //
//                     <http://xoops.instant-zero.com/>                      //
// ------------------------------------------------------------------------- //
//  This program is free software; you can redistribute it and/or modify     //
//  it under the terms of the GNU General Public License as published by     //
//  the Free Software Foundation; either version 2 of the License, or        //
//  (at your option) any later version.                                      //
//                                                                           //
//  You may not change or alter any portion of this comment or credits       //
//  of supporting developers from this source code or any supporting         //
//  source code which is considered copyrighted (c) material of the          //
//  original comment or credit authors.                                      //
//                                                                           //
//  This program is distributed in the hope that it will be useful,          //
//  but WITHOUT ANY WARRANTY; without even the implied warranty of           //
//  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the            //
//  GNU General Public License for more details.                             //
//                                                                           //
//  You should have received a copy of the GNU General Public License        //
//  along with this program; if not, write to the Free Software              //
//  Foundation, Inc., 59 Temple Place, Suite 330, Boston, MA  02111-1307 USA //
//  ------------------------------------------------------------------------ //
/**
* upgrader
*
* @copyright	The ImpressCMS Project http://www.impresscms.org/
* @copyright	Instant-Zero http://www.instant-zero.com/
* @license		http://www.gnu.org/licenses/old-licenses/gpl-2.0.html GNU General Public License (GPL)
* @package		Modules (news)
* @since		2.00
* @author		Sina Asghari (aka stranger) <pesian_stranger@users.sourceforge.net>
* @author		Herve Thouzard (Instant Zero) <http://xoops.instant-zero.com>
* @version		$Id$
*/

include_once '../../../include/cp_header.php';
xoops_cp_header();
include_once XOOPS_ROOT_PATH.'/modules/news/include/functions.php';


if (is_object($xoopsUser) && $xoopsUser->isAdmin($xoopsModule->mid())) {
	$errors=0;
	// 1) Create, if it does not exists, the stories_files table
	if(!news_TableExists($xoopsDB->prefix('stories_files'))) {
		$sql = 'CREATE TABLE '.$xoopsDB->prefix('stories_files')." (
  			fileid int(8) unsigned NOT NULL auto_increment,
  			filerealname varchar(255) NOT NULL default '',
  			storyid int(8) unsigned NOT NULL default '0',
  			date int(10) NOT NULL default '0',
  			mimetype varchar(64) NOT NULL default '',
  			downloadname varchar(255) NOT NULL default '',
  			counter int(8) unsigned NOT NULL default '0',
  			PRIMARY KEY  (fileid),
  			KEY storyid (storyid)
			) ENGINE=MyISAM;";
		if (!$xoopsDB->queryF($sql)) {
	    	echo '<br />' . _AM_NEWS_UPGRADEFAILED.' '._AM_NEWS_UPGRADEFAILED1;
	    	$errors++;
		}
	}

	// 2) Change the topic title's length, in the topics table
	$sql=sprintf('ALTER TABLE ' . $xoopsDB->prefix('topics') . ' CHANGE topic_title topic_title VARCHAR( 255 ) NOT NULL;');
	$result=$xoopsDB->queryF($sql);
	if (!$result) {
    	echo '<br />' .  _AM_NEWS_UPGRADEFAILED.' '._AM_NEWS_UPGRADEFAILED2;
    	$errors++;
	}

	// 2.1) Add the new fields to the topic table
	if (!news_FieldExists('menu',$xoopsDB->prefix('topics'))) {
		news_AddField("menu TINYINT( 1 ) DEFAULT '0' NOT NULL",$xoopsDB->prefix('topics'));
	}
	if (!news_FieldExists('topic_frontpage',$xoopsDB->prefix('topics'))) {
		news_AddField("topic_frontpage TINYINT( 1 ) DEFAULT '1' NOT NULL",$xoopsDB->prefix('topics'));
	}
	if (!news_FieldExists('topic_rssurl',$xoopsDB->prefix('topics'))) {
		news_AddField("topic_rssurl VARCHAR( 255 ) NOT NULL",$xoopsDB->prefix('topics'));
	}
	if (!news_FieldExists('topic_description',$xoopsDB->prefix('topics'))) {
		news_AddField("topic_description TEXT NOT NULL",$xoopsDB->prefix('topics'));
	}
	if (!news_FieldExists('topic_color',$xoopsDB->prefix('topics'))) {
		news_AddField("topic_color varchar(6) NOT NULL default '000000'",$xoopsDB->prefix('topics'));
	}

	// 3) If it does not exists, create the table stories_votedata
	if(!news_TableExists($xoopsDB->prefix('stories_votedata'))) {
		$sql = 'CREATE TABLE '.$xoopsDB->prefix('stories_votedata')." (
  			ratingid int(11) unsigned NOT NULL auto_increment,
  			storyid int(8) unsigned NOT NULL default '0',
  			ratinguser int(11) NOT NULL default '0',
  			rating tinyint(3) unsigned NOT NULL default '0',
  			ratinghostname varchar(60) NOT NULL default '',
  			ratingtimestamp int(10) NOT NULL default '0',
  			PRIMARY KEY  (ratingid),
  			KEY ratinguser (ratinguser),
  			KEY ratinghostname (ratinghostname),
  			KEY storyid (storyid)
			) ENGINE=MyISAM;";
		if (!$xoopsDB->queryF($sql)) {
	    	echo '<br />' .  _AM_NEWS_UPGRADEFAILED.' '._AM_NEWS_UPGRADEFAILED3;
	    	$errors++;
		}
	}

	// 4) Create the four new fields for the votes in the story table
	if (!news_FieldExists('rating',$xoopsDB->prefix('stories'))) {
		news_AddField("rating DOUBLE( 6, 4 ) DEFAULT '0.0000' NOT NULL",$xoopsDB->prefix('stories'));
	}
	if (!news_FieldExists('votes',$xoopsDB->prefix('stories'))) {
		news_AddField("votes INT( 11 ) UNSIGNED DEFAULT '0' NOT NULL",$xoopsDB->prefix('stories'));
	}
	if (!news_FieldExists('keywords',$xoopsDB->prefix('stories'))) {
		news_AddField("keywords VARCHAR(255) NOT NULL",$xoopsDB->prefix('stories'));
	}
	if (!news_FieldExists('description',$xoopsDB->prefix('stories'))) {
		news_AddField("description VARCHAR(255) NOT NULL",$xoopsDB->prefix('stories'));
	}

	// 5) Add some indexes to the topics table
	$sql=sprintf('ALTER TABLE ' . $xoopsDB->prefix('topics') . " ADD INDEX ( `topic_title` );");
	$result=$xoopsDB->queryF($sql);
	$sql=sprintf('ALTER TABLE ' . $xoopsDB->prefix('topics') . " ADD INDEX ( `menu` );");
	$result=$xoopsDB->queryF($sql);


	// 6) Create the new table for multiple categories
	if(!news_TableExists($xoopsDB->prefix('stories_newscateg'))) {
		$sql = 'CREATE TABLE '.$xoopsDB->prefix('stories_newscateg')." (
			nc_id int(10) unsigned NOT NULL auto_increment,
			nc_storyid int(10) unsigned NOT NULL,
			nc_topic_id mediumint(8) unsigned NOT NULL,
			PRIMARY KEY  (nc_id),
			KEY nc_storyid (nc_storyid),
			KEY nc_topic_id (nc_topic_id)
			) ENGINE=MyISAM;";
		if (!$xoopsDB->queryF($sql)) {
	    	echo '<br />' . _AM_NEWS_UPGRADEFAILED.' '._AM_NEWS_UPGRADEFAILED5;
	    	$errors++;
		} else {	// Supply existing datas to the table
			$xoopsDB->queryF('INSERT INTO '.$xoopsDB->prefix('stories_newscateg')." SELECT '0', storyid, topicid FROM ".$xoopsDB->prefix('stories'));
		}
	}


    // At the end, if there was errors, show them or redirect user to the module's upgrade page
	if($errors) {
		echo '<H1>' . _AM_NEWS_UPGRADEFAILED . '</H1>';
		echo '<br />' . _AM_NEWS_UPGRADEFAILED0;
	} else {
		echo _AM_NEWS_UPGRADECOMPLETE." - <a href='".XOOPS_URL."/modules/system/admin.php?fct=modulesadmin&op=update&module=news'>"._AM_NEWS_UPDATEMODULE."</a>";
	}
} else {
	printf("<h2>%s</h2>\n",_AM_NEWS_UPGR_ACCESS_ERROR);
}
xoops_cp_footer();
?>
