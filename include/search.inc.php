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
* Search posts
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
if (!defined('XOOPS_ROOT_PATH')) {
	die('ImpressCMS root path not defined');
}
	include_once XOOPS_ROOT_PATH.'/modules/news/config.php';
	if(!$cfg['use_multi_cat']) {
function news_search($queryarray, $andor, $limit, $offset, $userid){
	global $xoopsDB, $xoopsUser;
	include_once XOOPS_ROOT_PATH.'/modules/news/include/functions.php';
	$restricted=news_getmoduleoption('restrictindex');
	$highlight = false;
	$highlight=news_getmoduleoption('keywordshighlight');	// keywords highlighting

	$module_handler =& xoops_gethandler('module');
	$module =& $module_handler->getByDirname('news');
    $modid= $module->getVar('mid');
    $searchparam='';

	$gperm_handler =& xoops_gethandler('groupperm');
	if (is_object($xoopsUser)) {
	    $groups = $xoopsUser->getGroups();
	} else {
		$groups = XOOPS_GROUP_ANONYMOUS;
	}

	$sql = "SELECT storyid, topicid, uid, title, created FROM ".$xoopsDB->prefix("stories")." WHERE (published>0 AND published<=".time().") AND (expired = 0 OR expired > ".time().') ';

	if ( $userid != 0 ) {
		$sql .= " AND uid=".$userid." ";
	}
	// because count() returns 1 even if a supplied variable
	// is not an array, we must check if $querryarray is really an array
	if ( is_array($queryarray) && $count = count($queryarray) ) {
		$sql .= " AND ((hometext LIKE '%$queryarray[0]%' OR bodytext LIKE '%$queryarray[0]%' OR title LIKE '%$queryarray[0]%' OR keywords LIKE '%$queryarray[0]%' OR description LIKE '%$queryarray[0]%')";
		for($i=1;$i<$count;$i++){
			$sql .= " $andor ";
			$sql .= "(hometext LIKE '%$queryarray[$i]%' OR bodytext LIKE '%$queryarray[$i]%' OR title LIKE '%$queryarray[$i]%' OR keywords LIKE '%$queryarray[$i]%' OR description LIKE '%$queryarray[$i]%')";
		}
		$sql .= ") ";
		// keywords highlighting
		if($highlight) {
			$searchparam='&keywords='.urlencode(trim(implode(' ',$queryarray)));
		}
	}

	$sql .= "ORDER BY created DESC";
	$result = $xoopsDB->query($sql,$limit,$offset);
	$ret = array();
	$i = 0;
 	while($myrow = $xoopsDB->fetchArray($result)){
		$display=true;
		if($modid && $gperm_handler) {
			if ($restricted && !$gperm_handler->checkRight("news_view", $myrow['topicid'], $groups, $modid)) {
				$display=false;
			}
		}

		if ($display) {
			$ret[$i]['image'] = "images/forum.gif";
			$ret[$i]['link'] = "article.php?storyid=".$myrow['storyid']."".$searchparam;
			$ret[$i]['title'] = $myrow['title'];
			$ret[$i]['time'] = $myrow['created'];
			$ret[$i]['uid'] = $myrow['uid'];
			$i++;
		}
	}

	include_once XOOPS_ROOT_PATH.'/modules/news/config.php';
	$searchincomments = $cfg['config_search_comments'];

	if($searchincomments && (isset($limit) && $i<=$limit)) {
		include_once XOOPS_ROOT_PATH.'/include/comment_constants.php';
		$ind=$i;
		$sql = "SELECT com_id, com_modid, com_itemid, com_created, com_uid, com_title, com_text, com_status FROM ".$xoopsDB->prefix("xoopscomments")." WHERE (com_id>0) AND (com_modid=$modid) AND (com_status=".XOOPS_COMMENT_ACTIVE.") ";
		if ( $userid != 0 ) {
			$sql .= " AND com_uid=".$userid." ";
		}

		if ( is_array($queryarray) && $count = count($queryarray) ) {
			$sql .= " AND ((com_title LIKE '%$queryarray[0]%' OR com_text LIKE '%$queryarray[0]%')";
			for($i=1;$i<$count;$i++){
				$sql .= " $andor ";
				$sql .= "(com_title LIKE '%$queryarray[$i]%' OR com_text LIKE '%$queryarray[$i]%')";
			}
			$sql .= ") ";
		}
		$i=$ind;
		$sql .= "ORDER BY com_created DESC";
		$result = $xoopsDB->query($sql,$limit,$offset);
		while($myrow = $xoopsDB->fetchArray($result)) {
			$display=true;
			if($modid && $gperm_handler) {
				if ($restricted && !$gperm_handler->checkRight("news_view", $myrow['com_itemid'], $groups, $modid)) {
					$display=false;
				}
			}
			if($i+1>$limit) {
				$display=false;
			}

			if ($display) {
				$ret[$i]['image'] = "images/forum.gif";
				$ret[$i]['link'] = "article.php?storyid=".$myrow['com_itemid']."".$searchparam;
				$ret[$i]['title'] = $myrow['com_title'];
				$ret[$i]['time'] = $myrow['com_created'];
				$ret[$i]['uid'] = $myrow['com_uid'];
				$i++;
			}
		}
	}

	return $ret;
}
	}else{
function news_search($queryarray, $andor, $limit, $offset, $userid){
	global $xoopsDB, $xoopsUser;
	include_once XOOPS_ROOT_PATH.'/modules/news/include/functions.php';
	$restricted=news_getmoduleoption('restrictindex');
	$highlight=false;
	$highlight=news_getmoduleoption('keywordshighlight');	// keywords highlighting

	$module_handler =& xoops_gethandler('module');
	$module =& $module_handler->getByDirname('news');
    $modid= $module->getVar('mid');
    $searchparam='';

	$gperm_handler =& xoops_gethandler('groupperm');
	if (is_object($xoopsUser)) {
	    $groups = $xoopsUser->getGroups();
	} else {
		$groups = XOOPS_GROUP_ANONYMOUS;
	}

	$sql = 'SELECT s.storyid, s.uid, s.title, s.created FROM '.$xoopsDB->prefix('stories').' s LEFT JOIN '.$xoopsDB->prefix('stories_newscateg').' t ON s.storyid = t.nc_storyid WHERE (published>0 AND published<='.time().') AND (expired = 0 OR expired > '.time().') ';
	if($restricted) {
		$topics = array();
		$topics = news_MygetItemIds('news_view');
		if(count($topics)>0) {
			$sql .= ' AND t.nc_topic_id IN ('.implode(',', $topics).')';
		}
	}

	if ( $userid != 0 ) {
		$sql .= ' AND uid='.$userid.' ';
	}
	// because count() returns 1 even if a supplied variable
	// is not an array, we must check if $querryarray is really an array
	if ( is_array($queryarray) && $count = count($queryarray) ) {
		$sql .= " AND ((s.hometext LIKE '%$queryarray[0]%' OR s.bodytext LIKE '%$queryarray[0]%' OR s.title LIKE '%$queryarray[0]%' OR s.keywords LIKE '%$queryarray[0]%' OR s.description LIKE '%$queryarray[0]%')";
		for($i=1;$i<$count;$i++){
			$sql .= " $andor ";
			$sql .= "(s.hometext LIKE '%$queryarray[$i]%' OR s.bodytext LIKE '%$queryarray[$i]%' OR s.title LIKE '%$queryarray[$i]%' OR s.keywords LIKE '%$queryarray[$i]%' OR s.description LIKE '%$queryarray[$i]%')";
		}
		$sql .= ") ";
		// keywords highlighting
		if($highlight) {
			$searchparam='&keywords='.urlencode(trim(implode(' ',$queryarray)));
		}
	}

	$sql .= "ORDER BY s.created DESC";
	$result = $xoopsDB->query($sql,$limit,$offset);
	$ret = array();
	$i = 0;
 	while($myrow = $xoopsDB->fetchArray($result)){
		$ret[$i]['image'] = 'images/forum.gif';
		$ret[$i]['link'] = "article.php?storyid=".$myrow['storyid']."".$searchparam;
		$ret[$i]['title'] = $myrow['title'];
		$ret[$i]['time'] = $myrow['created'];
		$ret[$i]['uid'] = $myrow['uid'];
		$i++;
	}

	include_once XOOPS_ROOT_PATH.'/modules/news/config.php';
	$searchincomments = $cfg['config_search_comments'];

	if($searchincomments && (isset($limit) && $i<=$limit)) {
		include_once XOOPS_ROOT_PATH.'/include/comment_constants.php';
		$ind=$i;
		$sql = "SELECT com_id, com_modid, com_itemid, com_created, com_uid, com_title, com_text, com_status FROM ".$xoopsDB->prefix("xoopscomments")." WHERE (com_id>0) AND (com_modid=$modid) AND (com_status=".XOOPS_COMMENT_ACTIVE.") ";
		if ( $userid != 0 ) {
			$sql .= " AND com_uid=".$userid." ";
		}

		if ( is_array($queryarray) && $count = count($queryarray) ) {
			$sql .= " AND ((com_title LIKE '%$queryarray[0]%' OR com_text LIKE '%$queryarray[0]%')";
			for($i=1;$i<$count;$i++){
				$sql .= " $andor ";
				$sql .= "(com_title LIKE '%$queryarray[$i]%' OR com_text LIKE '%$queryarray[$i]%')";
			}
			$sql .= ") ";
		}
		$i=$ind;
		$sql .= "ORDER BY com_created DESC";
		$result = $xoopsDB->query($sql,$limit,$offset);
		while($myrow = $xoopsDB->fetchArray($result)) {
			$display=true;
			if($modid && $gperm_handler) {
				if ($restricted && !$gperm_handler->checkRight("news_view", $myrow['com_itemid'], $groups, $modid)) {
					$display=false;
				}
			}
			if($i+1>$limit) {
				$display=false;
			}

			if ($display) {
				$ret[$i]['image'] = "images/forum.gif";
				$ret[$i]['link'] = "article.php?storyid=".$myrow['com_itemid']."".$searchparam;
				$ret[$i]['title'] = $myrow['com_title'];
				$ret[$i]['time'] = $myrow['com_created'];
				$ret[$i]['uid'] = $myrow['com_uid'];
				$i++;
			}
		}
	}

	return $ret;
}
}
?>