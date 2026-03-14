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
* news story class
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

include_once XOOPS_ROOT_PATH.'/class/xoopstopic.php';
include_once XOOPS_ROOT_PATH.'/class/xoopsuser.php';

include_once XOOPS_ROOT_PATH.'/class/xoopsstory.php';
include_once XOOPS_ROOT_PATH.'/include/comment_constants.php';
include_once XOOPS_ROOT_PATH.'/modules/news/include/functions.php';
include_once XOOPS_ROOT_PATH.'/modules/news/config.php';

	if(!$cfg['use_multi_cat']) {
class NewsStory extends XoopsStory
{
	var $newstopic;   	// XoopsTopic object
	var $rating;		// News rating
  	var $votes;			// Number of votes
  	var $description;	// META, desciption
  	var $keywords;		// META, keywords
  	var $topic_imgurl;
  	var $topic_title;


	/**
 	* Constructor
 	*/
	function NewsStory($storyid=-1)
	{
		$this->db =& Database::getInstance();
		$this->table = $this->db->prefix('stories');
		$this->topicstable = $this->db->prefix('topics');
		if (is_array($storyid)) {
			$this->makeStory($storyid);
		} elseif($storyid != -1) {
			$this->getStory(intval($storyid));
		}
	}

	/**
 	* Returns the number of stories published before a date
 	*/
	function GetCountStoriesPublishedBefore($timestamp, $expired, $topicslist='')
	{
		$db =& Database::getInstance();
		$sql = 'SELECT count(*) as cpt FROM '.$db->prefix('stories').' WHERE published <=' . $timestamp;
		if($expired) {
			$sql .=' AND (expired>0 AND expired<='.time().')';
		}
		if(strlen(trim($topicslist))>0) {
			$sql .=' AND topicid IN ('.$topicslist.')';
		}
		$result = $db->query($sql);
		list($count) = $db->fetchRow($result);
		return $count;
	}


	/**
	 * Load the specified story from the database
	 */
	function getStory($storyid)
	{
		$sql = 'SELECT s.*, t.* FROM '.$this->table.' s, '.$this->db->prefix('topics').' t WHERE (storyid='.intval($storyid).') AND (s.topicid=t.topic_id)';
		$array = $this->db->fetchArray($this->db->query($sql));
		$this->makeStory($array);
	}


	/**
 	* Delete stories that were published before a given date
 	*/
	function DeleteBeforeDate($timestamp, $expired, $topicslist='')
	{
		global $xoopsModule;
		$mid= $xoopsModule->getVar('mid');
		$db =& Database::getInstance();
		$prefix = $db->prefix('stories');
		$vote_prefix = $db->prefix('stories_votedata');
		$files_prefix = $db->prefix('stories_files');
		$sql = 'SELECT storyid FROM  '.$prefix.' WHERE published <=' . $timestamp;
		if($expired) {
			$sql .=' (AND expired>0 AND expired<='.time().')';
		}
		if(strlen(trim($topicslist))>0) {
			$sql .=' AND topicid IN ('.$topicslist.')';
		}
		$result = $db->query($sql);
		while ($myrow = $db->fetchArray($result)) {
			xoops_comment_delete($mid, $myrow['storyid']);									// Delete comments
			xoops_notification_deletebyitem($mid, 'story', $myrow['storyid']);				// Delete notifications
			$db->queryF('DELETE FROM '.$vote_prefix.' WHERE storyid='.$myrow['storyid']);	// Delete votes
			// Remove files and records related to the files
			$result2 = $db->query('SELECT * FROM '.$files_prefix.' WHERE storyid='.$myrow['storyid']);
			while ($myrow2 = $db->fetchArray($result2)) {
				$name = XOOPS_ROOT_PATH.'/uploads/'.$myrow2['downloadname'];
				if(file_exists($name)) {
					unlink($name);
				}
				$db->query('DELETE FROM '.$files_prefix.' WHERE fileid='.$myrow2['fileid']);
			}
			$db->queryF('DELETE FROM '.$prefix.' WHERE storyid='.$myrow['storyid']);		// Delete the story
		}
		return true;
	}

	function _searchPreviousOrNextArticle($storyid, $next = true, $checkRight = false)
	{
		$db =& Database::getInstance();
		$ret = array();
		$storyid = intval($storyid);
		if($next) {
			$sql = 'SELECT storyid, title FROM '.$db->prefix('stories').' WHERE (published > 0 AND published <= '.time().') AND (expired = 0 OR expired > '.time().') AND storyid > '.$storyid;
			$orderBy = ' ORDER BY storyid ASC';
		} else {
			$sql = 'SELECT storyid, title FROM '.$db->prefix('stories').' WHERE (published > 0 AND published <= '.time().') AND (expired = 0 OR expired > '.time().') AND storyid < '.$storyid;
			$orderBy = ' ORDER BY storyid DESC';
		}
		if($checkRight) {
			$topics = news_MygetItemIds('news_view');
	    	if(count($topics) > 0) {
	        	$sql .= ' AND topicid IN ('.implode(',', $topics).')';
	    	} else {
	    		return null;
	    	}
		}
		$sql .= $orderBy;
		$db =& Database::getInstance();
		$result = $db->query($sql, 1);
		if($result) {
			$myts =& MyTextSanitizer::getInstance();
			while ( $row = $db->fetchArray($result) ) {
				$ret = array('storyid' => $row['storyid'], 'title' => $myts->htmlSpecialChars($row['title']));
			}
		}
		return $ret;
	}

	function getNextArticle($storyid, $checkRight=false)
	{
		return $this->_searchPreviousOrNextArticle($storyid, true, $checkRight);
	}

	function getPreviousArticle($storyid, $checkRight=false)
	{
		return $this->_searchPreviousOrNextArticle($storyid, false, $checkRight);
	}


	/**
 	 * Returns published stories according to some options
 	 */
	function getAllPublished($limit=0, $start=0, $checkRight=false, $topic=0, $ihome=0, $asobject=true, $order = 'published', $topic_frontpage=false)
	{
		$db =& Database::getInstance();
		$myts =& MyTextSanitizer::getInstance();
		$ret = array();
		$sql = 'SELECT s.*, t.* FROM '.$db->prefix('stories').' s, '. $db->prefix('topics').' t WHERE (s.published > 0 AND s.published <= '.time().') AND (s.expired = 0 OR s.expired > '.time().') AND (s.topicid=t.topic_id) ';
		if ($topic != 0) {
		    if (!is_array($topic)) {
		    	if($checkRight) {
        			$topics = news_MygetItemIds('news_view');
		    		if(!in_array ($topic,$topics)) {
		    			return null;
		    		} else {
		    			$sql .= ' AND s.topicid='.intval($topic).' AND (s.ihome=1 OR s.ihome=0)';
		    		}
		    	} else {
		        	$sql .= ' AND s.topicid='.intval($topic).' AND (s.ihome=1 OR s.ihome=0)';
		        }
		    } else {
				if($checkRight) {
					$topics = news_MygetItemIds('news_view');
		    		$topic = array_intersect($topic,$topics);
		    	}
		    	if(count($topic)>0) {
		        	$sql .= ' AND s.topicid IN ('.implode(',', $topic).')';
		    	} else {
		    		return null;
		    	}
		    }
		} else {
		    if($checkRight) {
		        $topics = news_MygetItemIds('news_view');
		        if(count($topics)>0) {
		        	$topics = implode(',', $topics);
		        	$sql .= ' AND s.topicid IN ('.$topics.')';
		        } else {
		        	return null;
		        }
		    }
			if (intval($ihome) == 0) {
				$sql .= ' AND s.ihome=0';
			}
		}
		if($topic_frontpage) {
			$sql .=' AND t.topic_frontpage=1';
		}
 		$sql .= " ORDER BY s.$order DESC";
		$result = $db->query($sql,intval($limit),intval($start));

		while ( $myrow = $db->fetchArray($result) ) {
			if ($asobject) {
				$ret[] = new NewsStory($myrow);
			} else {
				$ret[$myrow['storyid']] = $myts->htmlSpecialChars($myrow['title']);
			}
		}
		return $ret;
	}


	/**
	 * Retourne la liste des articles aux archives (pour une priode donne)
	 */
	function getArchive($publish_start, $publish_end, $checkRight=false, $asobject=true, $order = 'published')
	{
		$db =& Database::getInstance();
		$myts =& MyTextSanitizer::getInstance();
		$ret = array();
		$sql = 'SELECT s.*, t.* FROM '.$db->prefix('stories').' s, ' .$db->prefix('topics').' t WHERE (s.topicid=t.topic_id) AND (s.published > ' . $publish_start . ' AND s.published <= ' . $publish_end . ') AND (expired = 0 OR expired > '.time().') ';

	    if($checkRight) {
	        $topics = news_MygetItemIds('news_view');
	        if(count($topics)>0) {
	        	$topics = implode(',', $topics);
	        	$sql .= ' AND topicid IN ('.$topics.')';
	        } else {
	        	return null;
	        }
	    }
 		$sql .= " ORDER BY $order DESC";
		$result = $db->query($sql);
		while ( $myrow = $db->fetchArray($result) ) {
			if ($asobject) {
				$ret[] = new NewsStory($myrow);
			} else {
				$ret[$myrow['storyid']] = $myts->htmlSpecialChars($myrow['title']);
			}
		}
		return $ret;
	}


	/**
 	* Get the today's most readed article
 	*
 	* @param int 		$limit			records limit
 	* @param int 		$start 			starting record
 	* @param boolean	$checkRight		Do we need to check permissions (by topics) ?
	* @param int 		$topic 			limit the job to one topic
	* @param int 		$ihome 			Limit to articles published in home page only ?
	* @param boolean	$asobject		Do we have to return an array of objects or a simple array ?
	* @param string		$order			Fields to sort on
 	*/
	function getBigStory($limit=0, $start=0, $checkRight=false, $topic=0, $ihome=0, $asobject=true, $order = 'counter')
	{
		$db =& Database::getInstance();
		$myts =& MyTextSanitizer::getInstance();
		$ret = array();
		$tdate = mktime(0,0,0,date('n'),date('j'),date('Y'));
		$sql = 'SELECT s.*, t.* FROM '.$db->prefix('stories').' s, '. $db->prefix('topics').' t WHERE (s.topicid=t.topic_id) AND (published > '.$tdate.' AND published < '.time().') AND (expired > '.time().' OR expired = 0) ';

		if ( intval($topic) != 0 ) {
		    if (!is_array($topic)) {
		        $sql .= ' AND topicid='.intval($topic).' AND (ihome=1 OR ihome=0)';
		    }
		    else {
		    	if(count($topic)>0) {
		        	$sql .= ' AND topicid IN ('.implode(',', $topic).')';
		        } else {
		        	return null;
		        }
		    }
		} else {
		    if ($checkRight) {
		        $topics = news_MygetItemIds('news_view');
		        if(count($topics)>0) {
		        	$topics = implode(',', $topics);
		        	$sql .= ' AND topicid IN ('.$topics.')';
		        } else {
		        	return null;
		        }
		    }
			if ( intval($ihome) == 0 ) {
				$sql .= ' AND ihome=0';
			}
		}
 		$sql .= " ORDER BY $order DESC";
		$result = $db->query($sql,intval($limit),intval($start));
		while ( $myrow = $db->fetchArray($result) ) {
			if ( $asobject ) {
				$ret[] = new NewsStory($myrow);
			} else {
				$ret[$myrow['storyid']] = $myts->htmlSpecialChars($myrow['title']);
			}
		}
		return $ret;
	}


	/**
	* Get all articles published by an author
	*
	* @param int $uid author's id
	* @param boolean $checkRight whether to check the user's rights to topics
	*/
	function getAllPublishedByAuthor($uid, $checkRight=false, $asobject=true)
	{
		$db =& Database::getInstance();
		$myts =& MyTextSanitizer::getInstance();
		$ret = array();
		$tblstory=$db->prefix('stories');
		$tbltopics=$db->prefix('topics');

		$sql = 'SELECT ' . $tblstory . '.*, '. $tbltopics . '.topic_title, '.$tbltopics.'.topic_color FROM '.$tblstory.','.$tbltopics .' WHERE ('.$tblstory.'.topicid='.$tbltopics.'.topic_id) AND (published > 0 AND published <= '.time().') AND (expired = 0 OR expired > '.time().')';
		$sql .= ' AND uid='.intval($uid);
	    if ($checkRight) {
	        $topics = news_MygetItemIds('news_view');
	        $topics = implode(',', $topics);
	        if(xoops_trim($topics)!='') {
	        	$sql .= ' AND topicid IN ('.$topics.')';
	        }
	    }
 		$sql .= ' ORDER BY '.$tbltopics.'.topic_title ASC, '.$tblstory.'.published DESC';
		$result = $db->query($sql);
		while ( $myrow = $db->fetchArray($result) )
		{
			if ( $asobject ) {
				$ret[] = new NewsStory($myrow);
			} else {
				if ( $myrow['nohtml'] ) {
					$html = 0;
				} else {
					$html = 1;
				}
				if ( $myrow['nosmiley'] ) {
					$smiley = 0;
				} else {
					$smiley = 1;
				}
				$ret[$myrow['storyid']] = array('title'=>$myts->displayTarea($myrow['title'],$html,$smiley,1),
												'topicid'=>intval($myrow['topicid']),
												'storyid'=>intval($myrow['storyid']),
												'hometext'=>$myts->displayTarea($myrow['hometext'],$html,$smiley,1),
												'counter'=>intval($myrow['counter']),
												'created'=>intval($myrow['created']),
												'topic_title'=>$myts->displayTarea($myrow['topic_title'],$html,$smiley,1),
												'topic_color'=>$myts->displayTarea($myrow['topic_color']),
												'published'=>intval($myrow['published']),
												'rating'=>(float)$myrow['rating'],
												'votes'=>intval($myrow['votes']));
			}
		}
		return $ret;
	}


	/**
	 * Get all expired stories
	 */
	function getAllExpired($limit=0, $start=0, $topic=0, $ihome=0, $asobject=true)
	{
		$db =& Database::getInstance();
		$myts =& MyTextSanitizer::getInstance();
		$ret = array();
		$sql = 'SELECT * FROM '.$db->prefix('stories').' WHERE expired <= '.time().' AND expired > 0';
		if ( !empty($topic) ) {
			$sql .= ' AND topicid='.intval($topic).' AND (ihome=1 OR ihome=0)';
		} else {
			if ( intval($ihome) == 0 ) {
				$sql .= ' AND ihome=0';
			}
		}

 		$sql .= ' ORDER BY expired DESC';
		$result = $db->query($sql,intval($limit),intval($start));
		while ( $myrow = $db->fetchArray($result) ) {
			if ($asobject) {
				$ret[] = new NewsStory($myrow);
			} else {
				$ret[$myrow['storyid']] = $myts->htmlSpecialChars($myrow['title']);
			}
		}
		return $ret;
	}



	/**
	 * Returns an array of object containing all the news to be automatically published.
	 */
	function getAllAutoStory($limit=0, $asobject=true, $start=0)
	{
		$db =& Database::getInstance();
		$myts =& MyTextSanitizer::getInstance();
		$ret = array();
		$sql = 'SELECT * FROM '.$db->prefix('stories').' WHERE published > '.time().' ORDER BY published ASC';
		$result = $db->query($sql,intval($limit),intval($start));
		while ( $myrow = $db->fetchArray($result) ) {
			if ( $asobject ) {
				$ret[] = new NewsStory($myrow);
			} else {
				$ret[$myrow['storyid']] = $myts->htmlSpecialChars($myrow['title']);
			}
		}
		return $ret;
	}

	/**
	* Get all submitted stories awaiting approval
	*
	* @param int $limit Denotes where to start the query
	* @param boolean $asobject true will returns the stories as an array of objects, false will return storyid => title
	* @param boolean $checkRight whether to check the user's rights to topics
	*/
	function getAllSubmitted($limit=0, $asobject=true, $checkRight = false, $start=0)
	{
		$db =& Database::getInstance();
		$myts =& MyTextSanitizer::getInstance();
		$ret = array();
		$criteria = new CriteriaCompo(new Criteria('published', 0));
		if ($checkRight) {
		    global $xoopsUser;
		    if (!is_object($xoopsUser)) {
		        return $ret;
		    }
		    $allowedtopics = news_MygetItemIds('news_approve');
		    $criteria2 = new CriteriaCompo();
		    foreach ($allowedtopics as $key => $topicid) {
		        $criteria2->add(new Criteria('topicid', $topicid), 'OR');
		    }
		    $criteria->add($criteria2);
		}
		$sql = 'SELECT s.*, t.* FROM '.$db->prefix('stories').' s, '.$db->prefix('topics').' t ';
		$sql .= ' '.$criteria->renderWhere().' AND (s.topicid=t.topic_id) ORDER BY created DESC';
		$result = $db->query($sql,intval($limit),intval($start));
		while ( $myrow = $db->fetchArray($result) ) {
			if ( $asobject ) {
				$ret[] = new NewsStory($myrow);
			} else {
				$ret[$myrow['storyid']] = $myts->htmlSpecialChars($myrow['title']);
			}
		}
		return $ret;
	}


	/**
	 * Used in the module's admin to know the number of expired, automated or pubilshed news
	 *
  	 * @param int	$storytype	1=Expired, 2=Automated, 3=New submissions, 4=Last published stories
  	 * @param bool	$checkRight	verify permissions or not ?
	 */
	function getAllStoriesCount($storytype=1, $checkRight = false)
	{
		$db =& Database::getInstance();
		$sql = 'SELECT count(*) as cpt FROM '.$db->prefix('stories').' WHERE ';
		switch($storytype) {
			case 1:	// Expired
				$sql .='(expired <= '.time().' AND expired >0)';
				break;
			case 2:	// Automated
				$sql .='(published > '.time().')';
				break;
			case 3:	// New submissions
				$sql .='(published = 0)';
				break;
			case 4:	// Last published stories
				$sql .='(published > 0 AND published <= '.time().') AND (expired = 0 OR expired > '.time().')';
				break;
		}
		if($checkRight) {
	        $topics = news_MygetItemIds('news_view');
	        if(count($topics)>0) {
	        	$topics = implode(',', $topics);
	        	$sql .= ' AND topicid IN ('.$topics.')';
	        } else {
	        	return 0;
	        }
		}
		$result = $db->query($sql);
		$myrow = $db->fetchArray($result);
		return $myrow['cpt'];
	}


	/**
	 * Get a list of stories (as objects) related to a specific topic
	 */
	function getByTopic($topicid, $limit=0)
	{
		$ret = array();
		$db =& Database::getInstance();
		$sql = 'SELECT * FROM '.$db->prefix('stories').' WHERE topicid='.intval($topicid).' ORDER BY published DESC';
		$result = $db->query($sql, intval($limit), 0);
		while( $myrow = $db->fetchArray($result) ){
			$ret[] = new NewsStory($myrow);
		}
		return $ret;
	}


	/**
	 * Count the number of news published for a specific topic
	 */
	function countPublishedByTopic($topicid=0, $checkRight = false)
	{
		$db =& Database::getInstance();
		$sql = 'SELECT COUNT(*) FROM '.$db->prefix('stories').' WHERE published > 0 AND published <= '.time().' AND (expired = 0 OR expired > '.time().')';
		if ( !empty($topicid) ) {
			$sql .= ' AND topicid='.intval($topicid);
		} else {
			$sql .= ' AND ihome=0';
			if ($checkRight) {
		        $topics = news_MygetItemIds('news_view');
		        if(count($topics)>0) {
		        	$topics = implode(',', $topics);
		        	$sql .= ' AND topicid IN ('.$topics.')';
		        } else {
		        	return null;
		        }
		    }
		}
		$result = $db->query($sql);
		list($count) = $db->fetchRow($result);
		return $count;
	}


	/**
	 * Internal function
	 */
	function adminlink()
	{
		$ret = "&nbsp;[ <a href='".XOOPS_URL."/modules/news/submit.php?op=edit&amp;storyid=".$this->storyid()."'>"._EDIT."</a> | <a href='".XOOPS_URL."/modules/news/admin/index.php?op=delete&amp;storyid=".$this->storyid()."'>"._DELETE."</a> ]&nbsp;";
		return $ret;
	}


	/**
	 * Get the topic image url
	 */
	function topic_imgurl($format='S')
	{
		if(trim($this->topic_imgurl)=='') {
			$this->topic_imgurl='blank.png';
		}
		$myts =& MyTextSanitizer::getInstance();
		switch($format){
			case 'S':
				$imgurl= $myts->makeTboxData4Show($this->topic_imgurl);
				break;
			case 'E':
				$imgurl = $myts->makeTboxData4Edit($this->topic_imgurl);
				break;
			case 'P':
				$imgurl = $myts->makeTboxData4Preview($this->topic_imgurl);
				break;
			case 'F':
				$imgurl = $myts->makeTboxData4PreviewInForm($this->topic_imgurl);
				break;
		}
		return $imgurl;
	}

	function topic_title($format='S')
	{
		$myts =& MyTextSanitizer::getInstance();
		switch($format){
			case 'S':
				$title = $myts->makeTboxData4Show($this->topic_title);
				break;
			case 'E':
				$title = $myts->makeTboxData4Edit($this->topic_title);
				break;
			case 'P':
				$title = $myts->makeTboxData4Preview($this->topic_title);
				break;
			case 'F':
				$title = $myts->makeTboxData4PreviewInForm($this->topic_title);
				break;
		}
		return $title;
	}

	function imglink()
	{
		$ret = '';
		if ($this->topic_imgurl() != '' && file_exists(XOOPS_ROOT_PATH.'/modules/news/images/topics/'.$this->topic_imgurl())) {
			$ret = "<a href='".XOOPS_URL."/modules/news/index.php?storytopic=".$this->topicid()."'><img src='".XOOPS_URL."/modules/news/images/topics/".$this->topic_imgurl()."' alt='".$this->topic_title()."' hspace='10' vspace='10' align='".$this->topicalign()."' /></a>";
		}
		return $ret;
	}

	function textlink()
	{
		$ret = "<a href='".XOOPS_URL."/modules/news/index.php?storytopic=".$this->topicid()."'>".$this->topic_title()."</a>";
		return $ret;
	}

	/**
	 * Function used to prepare an article to be showned
	 */
	function prepare2show($filescount)
	{
	    include_once XOOPS_ROOT_PATH.'/modules/news/include/functions.php';
	    global $xoopsUser, $xoopsConfig, $xoopsModuleConfig;
	    $myts =& MyTextSanitizer::getInstance();
	    $infotips = news_getmoduleoption('infotips');
	    $story = array();
	    $story['id'] = $this->storyid();
	    $story['poster'] = $this->uname();
	    $story['author_name'] = $this->uname();
	    $story['author_uid'] = $this->uid();
	    if ( $story['poster'] != false ) {
	        $story['poster'] = "<a href='".XOOPS_URL."/userinfo.php?uid=".$this->uid()."'>".$story['poster']."</a>";
	    } else {
			if($xoopsModuleConfig['displayname']!=3) {
				$story['poster'] = $xoopsConfig['anonymous'];
			}
	    }
		if ($xoopsModuleConfig['ratenews']) {
			$story['rating'] = number_format($this->rating(), 2);
			if ($this->votes == 1) {
				$story['votes'] = _NW_ONEVOTE;
			} else {
				$story['votes'] = sprintf(_NW_NUMVOTES,$this->votes);
			}
		}
	    $story['posttimestamp'] = $this->published();
	    $story['posttime'] = formatTimestamp($story['posttimestamp'],news_getmoduleoption('dateformat'));
		$story['topic_description'] = $myts->displayTarea($this->topic_description);

		$auto_summary = '';
		$tmp = '';
		$auto_summary = $this->auto_summary($this->bodytext(),$tmp);

	    $story['text'] = $this->hometext();
		$story['text'] = str_replace('[summary]', $auto_summary, $story['text']);

	    $introcount = strlen($story['text']);
	    $fullcount = strlen($this->bodytext());
	    $totalcount = $introcount + $fullcount;

	    $morelink = '';
	    if ( $fullcount > 1 ) {
	        $morelink .= '<a href="'.XOOPS_URL.'/modules/news/article.php?storyid='.$this->storyid().'';
	        $morelink .= '">'._NW_READMORE.'</a>';
        	$morelink .= ' | '.sprintf(_NW_BYTESMORE,$totalcount);
	        if (XOOPS_COMMENT_APPROVENONE != $xoopsModuleConfig['com_rule']) {
	            $morelink .= ' | ';
	        }
	    }
	    if (XOOPS_COMMENT_APPROVENONE != $xoopsModuleConfig['com_rule']) {
	        $ccount = $this->comments();
	        $morelink .= '<a href="'.XOOPS_URL.'/modules/news/article.php?storyid='.$this->storyid().'';
	        $morelink2 = '<a href="'.XOOPS_URL.'/modules/news/article.php?storyid='.$this->storyid().'';
	        if ( $ccount == 0 ) {
	            $morelink .= '">'._NW_COMMENTS.'</a>';
	        } else {
	            if ( $fullcount < 1 ) {
	                if ( $ccount == 1 ) {
	                    $morelink .= '">'._NW_READMORE.'</a> | '.$morelink2.'">'._NW_ONECOMMENT.'</a>';
	                } else {
	                    $morelink .= '">'._NW_READMORE.'</a> | '.$morelink2.'">';
	                    $morelink .= sprintf(_NW_NUMCOMMENTS, $ccount);
	                    $morelink .= '</a>';
	                }
	            } else {
	                if ( $ccount == 1 ) {
	                    $morelink .= '">'._NW_ONECOMMENT.'</a>';
	                } else {
	                    $morelink .= '">';
	                    $morelink .= sprintf(_NW_NUMCOMMENTS, $ccount);
	                    $morelink .= '</a>';
	                }
	            }
	        }
	    }
	    $story['morelink'] = $morelink;
	    $story['adminlink'] = '';

	    $approveprivilege = 0;
	    if(news_is_admin_group()) {
	        $approveprivilege = 1;
	    }

	    if($xoopsModuleConfig['authoredit']==1 && (is_object($xoopsUser) && $xoopsUser->getVar('uid')==$this->uid())) {
	    	$approveprivilege = 1;
	    }
	    if ($approveprivilege) {
	        $story['adminlink'] = $this->adminlink();
	    }
	    $story['mail_link'] = 'mailto:?subject='.sprintf(_NW_INTARTICLE,$xoopsConfig['sitename']).'&amp;body='.sprintf(_NW_INTARTFOUND, $xoopsConfig['sitename']).':  '.XOOPS_URL.'/modules/news/article.php?storyid='.$this->storyid();
	    $story['imglink'] = '';
	    $story['align'] = '';
	    if ( $this->topicdisplay() ) {
	        $story['imglink'] = $this->imglink();
	        $story['align'] = $this->topicalign();
	    }
		if($infotips>0) {
			$story['infotips'] = ' title="'.news_make_infotips($this->hometext()).'"';
		} else {
			$story['infotips'] = '';
		}
	    $story['title'] = "<a href='".XOOPS_URL."/modules/news/article.php?storyid=".$this->storyid()."'".$story['infotips'].">".$this->title()."</a>";

	    $story['hits'] = $this->counter();
		if($filescount>0) {
			$story['files_attached']= true;
			$story['attached_link']="<a href='".XOOPS_URL.'/modules/news/article.php?storyid='.$this->storyid()."' title='"._NW_ATTACHEDLIB."'><img src='".XOOPS_URL.'/modules/news/images/attach.gif'."' title='"._NW_ATTACHEDLIB."'></a>";
		} else {
			$story['files_attached']= false;
			$story['attached_link']='';
		}
	    return $story;
	}

	/**
 	* Returns the user's name of the current story according to the module's option "displayname"
 	*/
	function uname($uid=0)
	{
		global $xoopsConfig;
		include_once XOOPS_ROOT_PATH.'/modules/news/include/functions.php';
		static $tblusers = array();
		$option=-1;
		if($uid == 0) {
			$uid=$this->uid();
		}

		if(is_array($tblusers) && array_key_exists($uid,$tblusers)) {
			return 	$tblusers[$uid];
		}

		$option = news_getmoduleoption('displayname');
		if (!$option) {
			$option=1;
		}

		switch($option) {
			case 1:		// Username
				$tblusers[$uid]=XoopsUser::getUnameFromId($uid);
				return $tblusers[$uid];

			case 2:		// Display full name (if it is not empty)
				$member_handler =& xoops_gethandler('member');
				$thisuser = $member_handler->getUser($uid);
				if (is_object($thisuser)) {
					$return = $thisuser->getVar('name');
					if ($return == '') {
						$return=$thisuser->getVar('uname');
					}
				} else {
					$return=$xoopsConfig['anonymous'];
				}
				$tblusers[$uid]=$return;
				return $return;

			case 3:		// Nothing
				$tblusers[$uid]='';
				return '';
		}
	}

	/**
	* Function used to export news (in xml) and eventually the topics definitions
	* Warning, permissions are not exported !
	* @param int 		$fromdate 		Starting date
	* @param int 		$todate 		Ending date
	* @param string		$topiclist		If not empty, a list of topics to limit to
	* @param boolean	$usetopicsdef 	Should we also export topics definitions ?
	* @param boolean	$asobject		Return values as an object or not ?
	*/
	function NewsExport($fromdate, $todate, $topicslist='', $usetopicsdef=0, &$tbltopics, $asobject=true, $order = 'published')
	{
		$ret=Array();
		$myts =& MyTextSanitizer::getInstance();
		if($usetopicsdef) {	// We firt begin by exporting topics definitions
			// Before all we must know wich topics to export
			$sql = 'SELECT distinct topicid FROM '.$this->db->prefix('stories').' WHERE (published >=' . $fromdate . ' AND published <= ' . $todate .')';
			if(strlen(trim($topicslist))>0) {
				$sql .=' AND topicid IN ('.$topicslist.')';
			}
			$result = $this->db->query($sql);
			while ( $myrow = $this->db->fetchArray($result) ) {
				$tbltopics[]=$myrow['topicid'];
			}
		}

		// Now we can search for the stories
		$sql = 'SELECT s.*, t.* FROM '.$this->table.' s, '.$this->db->prefix('topics').' t WHERE (s.topicid=t.topic_id) AND (s.published >=' . $fromdate . ' AND s.published <= ' . $todate .')';
		if(strlen(trim($topicslist))>0) {
			$sql .=' AND topicid IN ('.$topicslist.')';
		}
		$sql .= " ORDER BY $order DESC";
		$result = $this->db->query($sql);
		while ($myrow = $this->db->fetchArray($result)) {
			if ($asobject) {
				$ret[] = new NewsStory($myrow);
			} else {
				$ret[$myrow['storyid']] = $myts->htmlSpecialChars($myrow['title']);
			}
		}
		return $ret;
	}


	/**
	 * Create or update an article
	 */
	function store($approved=false)
	{
		$myts =& MyTextSanitizer::getInstance();
		$counter = isset($this->counter) ? $this->counter : 0;
		$title =$myts->censorString($this->title);
		$title = $myts->addSlashes($title);
		$hostname=$myts->addSlashes($this->hostname);
		$type=$myts->addSlashes($this->type);
		$hometext =$myts->addSlashes($myts->censorString($this->hometext));
		$bodytext =$myts->addSlashes($myts->censorString($this->bodytext));
		$description =$myts->addSlashes($myts->censorString($this->description));
		$keywords =$myts->addSlashes($myts->censorString($this->keywords));
		$votes= intval($this->votes);
		$rating = (float)($this->rating);
		if (!isset($this->nohtml) || $this->nohtml != 1) {
			$this->nohtml = 0;
		}
		if (!isset($this->nosmiley) || $this->nosmiley != 1) {
			$this->nosmiley = 0;
		}
		if (!isset($this->notifypub) || $this->notifypub != 1) {
			$this->notifypub = 0;
		}
		if(!isset($this->topicdisplay) || $this->topicdisplay != 0) {
			$this->topicdisplay = 1;
		}
		$expired = !empty($this->expired) ? $this->expired : 0;
		if (!isset($this->storyid)) {
			//$newpost = 1;
			$newstoryid = $this->db->genId($this->table.'_storyid_seq');
			$created = time();
			$published = ( $this->approved ) ? intval($this->published) : 0;
			$sql = sprintf("INSERT INTO %s (storyid, uid, title, created, published, expired, hostname, nohtml, nosmiley, hometext, bodytext, counter, topicid, ihome, notifypub, story_type, topicdisplay, topicalign, comments, rating, votes, description, keywords) VALUES (%u, %u, '%s', %u, %u, %u, '%s', %u, %u, '%s', '%s', %u, %u, %u, %u, '%s', %u, '%s', %u, %u, %u, '%s', '%s')", $this->table, $newstoryid, intval($this->uid()), $title, $created, $published, $expired, $hostname, intval($this->nohtml()), intval($this->nosmiley()), $hometext, $bodytext, $counter, intval($this->topicid()), intval($this->ihome()), intval($this->notifypub()), $type, intval($this->topicdisplay()), $this->topicalign, intval($this->comments()), $rating, $votes, $description, $keywords);
		} else {
			$sql = sprintf("UPDATE %s SET title='%s', published=%u, expired=%u, nohtml=%u, nosmiley=%u, hometext='%s', bodytext='%s', topicid=%u, ihome=%u, topicdisplay=%u, topicalign='%s', comments=%u, rating=%u, votes=%u, uid=%u, description='%s', keywords='%s' WHERE storyid = %u", $this->table, $title, intval($this->published()), $expired, intval($this->nohtml()), intval($this->nosmiley()), $hometext, $bodytext, intval($this->topicid()), intval($this->ihome()), intval($this->topicdisplay()), $this->topicalign, intval($this->comments()), $rating, $votes, intval($this->uid()), $description, $keywords, intval($this->storyid()));
			$newstoryid = intval($this->storyid());
		}
		if (!$this->db->queryF($sql)) {
			return false;
		}
		if (empty($newstoryid)) {
			$newstoryid = $this->db->getInsertId();
			$this->storyid = $newstoryid;
		}
		return $newstoryid;
	}

	function rating()
	{
		return $this->rating;
	}

	function votes()
	{
		return $this->votes;
	}

	function Setdescription($data)
	{
		$this->description=$data;
	}

	function Setkeywords($data)
	{
		$this->keywords=$data;
	}

	function description($format='S')
	{
		$myts =& MyTextSanitizer::getInstance();
		switch(strtoupper($format)) {
			case 'S':
				$description= $myts->htmlSpecialChars($this->description);
				break;
			case 'P':
			case 'F':
				$description = $myts->htmlSpecialChars($myts->stripSlashesGPC($this->description));
				break;
			case 'E':
				$description = $myts->htmlSpecialChars($this->description);
				break;
		}
		return $description;
	}

	function keywords($format='S')
	{
		$myts =& MyTextSanitizer::getInstance();
		switch(strtoupper($format)) {
			case 'S':
				$keywords= $myts->htmlSpecialChars($this->keywords);
				break;
			case 'P':
			case 'F':
				$keywords = $myts->htmlSpecialChars($myts->stripSlashesGPC($this->keywords));
				break;
			case 'E':
				$keywords = $myts->htmlSpecialChars($this->keywords);
				break;
		}
		return $keywords;
	}

	/**
 	* Returns a random number of news
 	*/
	function getRandomNews($limit=0, $start=0, $checkRight=false, $topic=0, $ihome=0, $order='published', $topic_frontpage=false)
	{
		$db =& Database::getInstance();
		$ret = $rand_keys = $ret3 = array();
		$sql = 'SELECT storyid FROM '.$db->prefix('stories').' WHERE (published > 0 AND published <= '.time().') AND (expired = 0 OR expired > '.time().')';
		if ($topic != 0) {
		    if (!is_array($topic)) {
		    	if($checkRight) {
        			$topics = news_MygetItemIds('news_view');
		    		if(!in_array ($topic,$topics)) {
		    			return null;
		    		} else {
		    			$sql .= ' AND topicid='.intval($topic).' AND (ihome=1 OR ihome=0)';
		    		}
		    	} else {
		        	$sql .= ' AND topicid='.intval($topic).' AND (ihome=1 OR ihome=0)';
		        }
		    } else {
		    	if(count($topic)>0) {
		        	$sql .= ' AND topicid IN ('.implode(',', $topic).')';
		    	} else {
		    		return null;
		    	}
		    }
		} else {
		    if($checkRight) {
		        $topics = news_MygetItemIds('news_view');
		        if(count($topics)>0) {
		        	$topics = implode(',', $topics);
		        	$sql .= ' AND topicid IN ('.$topics.')';
		        } else {
		        	return null;
		        }
		    }
			if (intval($ihome) == 0) {
				$sql .= ' AND ihome=0';
			}
		}
		if($topic_frontpage) {
			$sql .=' AND t.topic_frontpage=1';
		}
 		$sql .= " ORDER BY $order DESC";
		$result = $db->query($sql);

		while ( $myrow = $db->fetchArray($result) ) {
			$ret[] = $myrow['storyid'];
		}
		$cnt=count($ret);
		if($cnt)	{
			srand ((double) microtime() * 10000000);
			if($limit>$cnt) {
				$limit=$cnt;
			}
			$rand_keys = array_rand($ret, $limit);
			if($limit>1) {
				for($i=0;$i<$limit;$i++) {
					$onestory=$ret[$rand_keys[$i]];
					$ret3[]= new NewsStory($onestory);
				}
			} else {
				$ret3[]= new NewsStory($ret[$rand_keys]);
			}
		}
		return $ret3;
	}



	/**
 	* Returns statistics about the stories and topics
 	*/
	function GetStats($limit)
	{
		$ret=array();
		$db =& Database::getInstance();
		$tbls=$db->prefix('stories');
		$tblt=$db->prefix('topics');
		$tblf=$db->prefix('stories_files');

		$db =& Database::getInstance();
		// Number of stories per topic, including expired and non published stories
		$ret2=array();
		$sql="SELECT count(s.storyid) as cpt, s.topicid, t.topic_title FROM $tbls s, $tblt t WHERE s.topicid=t.topic_id GROUP BY s.topicid ORDER BY t.topic_title";
		$result = $db->query($sql);
		while ($myrow = $db->fetchArray($result) ) {
			$ret2[$myrow['topicid']]=$myrow;
		}
		$ret['storiespertopic']=$ret2;
		unset($ret2);

		// Total of reads per topic
		$ret2=array();
		$sql="SELECT Sum(counter) as cpt, topicid FROM $tbls GROUP BY topicid ORDER BY topicid";
		$result = $db->query($sql);
		while ($myrow = $db->fetchArray($result) ) {
			$ret2[$myrow['topicid']]=$myrow['cpt'];
		}
		$ret['readspertopic']=$ret2;
		unset($ret2);

		// Attached files per topic
		$ret2=array();
		$sql="SELECT Count(*) as cpt, s.topicid FROM $tblf f, $tbls s WHERE f.storyid=s.storyid GROUP BY s.topicid ORDER BY s.topicid";
		$result = $db->query($sql);
		while ($myrow = $db->fetchArray($result) ) {
			$ret2[$myrow['topicid']]=$myrow['cpt'];
		}
		$ret['filespertopic']=$ret2;
        unset($ret2);

		// Expired articles per topic
		$ret2=array();
		$sql="SELECT Count(storyid) as cpt, topicid FROM $tbls WHERE expired>0 AND expired<=".time()." GROUP BY topicid ORDER BY topicid";
		$result = $db->query($sql);
		while ($myrow = $db->fetchArray($result) ) {
			$ret2[$myrow['topicid']]=$myrow['cpt'];
		}
		$ret['expiredpertopic']=$ret2;
		unset($ret2);

		// Number of unique authors per topic
		$ret2=array();
		$sql="SELECT Count(Distinct(uid)) as cpt, topicid FROM $tbls GROUP BY topicid ORDER BY topicid";
		$result = $db->query($sql);
		while ($myrow = $db->fetchArray($result) ) {
			$ret2[$myrow['topicid']]=$myrow['cpt'];
		}
		$ret['authorspertopic']=$ret2;
		unset($ret2);

		// Most readed articles
		$ret2=array();
		$sql="SELECT s.storyid, s.uid, s.title, s.counter, s.topicid, t.topic_title  FROM $tbls s, $tblt t WHERE s.topicid=t.topic_id ORDER BY s.counter DESC";
		$result = $db->query($sql,intval($limit));
		while ($myrow = $db->fetchArray($result) ) {
			$ret2[$myrow['storyid']]=$myrow;
		}
		$ret['mostreadednews']=$ret2;
		unset($ret2);

		// Less readed articles
		$ret2=array();
		$sql="SELECT s.storyid, s.uid, s.title, s.counter, s.topicid, t.topic_title  FROM $tbls s, $tblt t WHERE s.topicid=t.topic_id ORDER BY s.counter";
		$result = $db->query($sql,intval($limit));
		while ($myrow = $db->fetchArray($result) ) {
			$ret2[$myrow['storyid']]=$myrow;
		}
		$ret['lessreadednews']=$ret2;
		unset($ret2);

		// Best rated articles
		$ret2=array();
		$sql="SELECT s.storyid, s.uid, s.title, s.rating, s.topicid, t.topic_title  FROM $tbls s, $tblt t WHERE s.topicid=t.topic_id ORDER BY s.rating DESC";
		$result = $db->query($sql,intval($limit));
		while ($myrow = $db->fetchArray($result) ) {
			$ret2[$myrow['storyid']]=$myrow;
		}
		$ret['besratednews']=$ret2;
		unset($ret2);

		// Most readed authors
		$ret2=array();
		$sql="SELECT Sum(counter) as cpt, uid FROM $tbls GROUP BY uid ORDER BY cpt DESC";
		$result = $db->query($sql,intval($limit));
		while ($myrow = $db->fetchArray($result) ) {
			$ret2[$myrow['uid']]=$myrow['cpt'];
		}
		$ret['mostreadedauthors']=$ret2;
		unset($ret2);

		// Best rated authors
		$ret2=array();
		$sql="SELECT Avg(rating) as cpt, uid FROM $tbls WHERE votes > 0 GROUP BY uid ORDER BY cpt DESC";
		$result = $db->query($sql,intval($limit));
		while ($myrow = $db->fetchArray($result) ) {
			$ret2[$myrow['uid']]=$myrow['cpt'];
		}
		$ret['bestratedauthors']=$ret2;
		unset($ret2);

		// Biggest contributors
		$ret2=array();
		$sql="SELECT Count(*) as cpt, uid FROM $tbls GROUP BY uid ORDER BY cpt DESC";
		$result = $db->query($sql,intval($limit));
		while ($myrow = $db->fetchArray($result) ) {
			$ret2[$myrow['uid']]=$myrow['cpt'];
		}
		$ret['biggestcontributors']=$ret2;
		unset($ret2);

		return $ret;
	}


	/**
	 * Get the date of the older and most recent news
	 */
	function GetOlderRecentNews(&$older, &$recent)
	{
		$db =& Database::getInstance();
		$sql = 'SELECT min(published) as minpublish, max(published) as maxpublish FROM '.$db->prefix('stories');
		$result = $db->query($sql);
		if(!$result) {
			$older = $recent = 0;
		} else {
			list($older, $recent) = $this->db->fetchRow($result);
		}
	}


	/*
	 * Returns the author's IDs for the Who's who page
	 */
	function getWhosWho($checkRight=false, $limit=0, $start=0)
	{
		$db =& Database::getInstance();
		$ret = array();
		$sql = 'SELECT distinct(uid) as uid FROM '.$db->prefix('stories').' WHERE (published > 0 AND published <= '.time().') AND (expired = 0 OR expired > '.time().')';
	    if($checkRight) {
	        $topics = news_MygetItemIds('news_view');
	        if(count($topics)>0) {
	        	$topics = implode(',', $topics);
	        	$sql .= ' AND topicid IN ('.$topics.')';
	        } else {
	        	return null;
	        }
	    }
 		$sql .= " ORDER BY uid";
		$result = $db->query($sql);
		while ( $myrow = $db->fetchArray($result) ) {
			$ret[] = $myrow['uid'];
		}
		return $ret;
	}


	/**
	 * Returns the content of the summary and the titles requires for the list selector
	 */
	function auto_summary($text, &$titles)
	{
		$auto_summary = '';
		if(news_getmoduleoption('enhanced_pagenav')) {
	    	$expr_matches = array();
	    	$posdeb = preg_match_all('/(\[pagebreak:|\[pagebreak).*\]/iU', $text, $expr_matches);
	    	if(count($expr_matches) > 0) {
				$delimiters = $expr_matches[0];
				$arr_search = array('[pagebreak:', '[pagebreak', ']');
				$arr_replace = array('', '', '');
				$cpt = 1;
				if(isset($titles) && is_array($titles)) {
					$titles[] = strip_tags(sprintf(_NW_PAGE_AUTO_SUMMARY,1, $this->title()));
				}
				$item = "<a href='".XOOPS_URL.'/modules/news/article.php?storyid='.$this->storyid()."&page=0'>".sprintf(_NW_PAGE_AUTO_SUMMARY,1, $this->title()).'</a><br />';
				$auto_summary .= $item;

				foreach($delimiters as $item) {
					$cpt++;
					$item = str_replace($arr_search, $arr_replace, $item);
					if(xoops_trim($item) == '') {
						$item = $cpt;
					}
					$titles[] = strip_tags(sprintf(_NW_PAGE_AUTO_SUMMARY,$cpt, $item));
					$item = "<a href='".XOOPS_URL.'/modules/news/article.php?storyid='.$this->storyid().'&page='.($cpt-1)."'>".sprintf(_NW_PAGE_AUTO_SUMMARY,$cpt, $item).'</a><br />';
					$auto_summary .= $item;
				}
    		}
		}
		return $auto_summary;
	}

	function hometext($format = 'Show')
	{
		$myts =& MyTextSanitizer::getInstance();
		$html = $smiley = $xcodes = 1;
		if ( $this->nohtml() ) {
			$html = 0;
		}
		if ( $this->nosmiley() ) {
			$smiley = 0;
		}
		switch ( $format ) {
		case 'Show':
			$hometext = $myts->displayTarea($this->hometext,$html,$smiley,$xcodes);
			$tmp = '';
			$auto_summary = $this->auto_summary($this->bodytext('Show'),$tmp);
			$hometext = str_replace('[summary]', $auto_summary, $hometext);
			break;
		case 'Edit':
			$hometext = $myts->htmlSpecialChars($this->hometext);
			break;
		case 'Preview':
			$hometext = $myts->previewTarea($this->hometext,$html,$smiley,$xcodes);
			break;
		case 'InForm':
			$hometext = $myts->makeTareaData4PreviewInForm($this->hometext);
			break;
		}
		return $hometext;
	}

	function bodytext($format = 'Show')
	{
		$myts =& MyTextSanitizer::getInstance();
		$html = 1;
		$smiley = 1;
		$xcodes = 1;
		if ( $this->nohtml() ) {
			$html = 0;
		}
		if ( $this->nosmiley() ) {
			$smiley = 0;
		}
		switch ( $format ) {
		case 'Show':
			$bodytext = $myts->displayTarea($this->bodytext,$html,$smiley,$xcodes);
			$tmp = '';
			$auto_summary = $this->auto_summary($bodytext,$tmp);
			$bodytext = str_replace('[summary]', $auto_summary, $bodytext);
			break;
		case 'Edit':
			$bodytext = $myts->htmlSpecialChars($this->bodytext);
			break;
		case 'Preview':
			$bodytext = $myts->previewTarea($this->bodytext,$html,$smiley, $xcodes);
			break;
		case 'InForm':
			$bodytext = $myts->makeTareaData4PreviewInForm($this->bodytext);
			break;
		}
		return $bodytext;
	}
}
	}else{
		class NewsStory extends XoopsStory
{
    var $table;
	var $storyid;
	//var $topicid;
	var $uid;
	var $title;
	var $hometext;
	var $bodytext="";
	var $counter;
	var $created;
	var $published;
	var $expired;
	var $hostname;
	var $nohtml=0;
	var $nosmiley=0;
	var $ihome=0;
	var $notifypub=0;
	var $type;
	var $approved;
	var $topicdisplay;
	var $topicalign;
	var $db;
	var $topicstable;
	var $comments;
	var $topicsIds;		// Tableau des ID des topics auxquel est rattach l'article
	var $topicsTitles;	// Tableau des titres des sujets auxquel l'article est rattach
	var $topicsIdsTitles;

	var $newstopic;   	// XoopsTopic object
	var $rating;		// News rating
  	var $votes;			// Number of votes
  	var $description;	// META, desciption
  	var $keywords;		// META, keywords
  	var $topic_imgurl;
  	var $topic_title;


	/**
  	 * Constructor
 	 */
	function NewsStory($storyid=-1)
	{
		$this->db =& Database::getInstance();
		$this->table = $this->db->prefix('stories');
		$this->topicstable = $this->db->prefix('topics');
		$this->topicsIds = array();
		$this->topicsTitles = array();
		$this->topicsIdsTitles = array();
		if (is_array($storyid)) {
			$this->makeStory($storyid);
		} elseif($storyid != -1) {
			$this->getStory(intval($storyid));
		}
	}

	/**
 	* Returns the number of stories published before a date
 	*/
	function GetCountStoriesPublishedBefore($timestamp, $expired, $topicslist='')
	{
		$db =& Database::getInstance();
		$sql = 'SELECT Count(DISTINCT(s.storyid)) as cpt FROM '.$db->prefix('stories').' s LEFT JOIN '.$db->prefix('stories_newscateg').' t ON s.storyid = t.nc_storyid WHERE s.published <= '.$timestamp;
		if($expired) {
			$sql .= 'AND (s.expired >0 AND s.expired <='.time().')';
		}
		if(xoops_trim($topicslist) != '') {
			$sql .=' t.nc_topic_id IN ('.$topicslist.')';
		}
		$result = $db->query($sql);
		list($count) = $db->fetchRow($result);
		return $count;
	}


	/**
	 * Load the specified story from the database
	 */
	function getStory($storyid)
	{
		$db =& Database::getInstance();
		$sql = 'SELECT * FROM '.$this->table.'  WHERE storyid = '.intval($storyid);
		$array = $db->fetchArray($db->query($sql));
		$this->makeStory($array);
	}

	function makeStory($array)
	{
		$db =& Database::getInstance();
		foreach ( $array as $key=>$value ){
			$this->$key = $value;
		}
		// Rcupration des ID des sujets auxquel l'article est rattach
		$sql = 'SELECT nc_topic_id FROM '.$db->prefix('stories_newscateg').'  WHERE nc_storyid = '.intval($this->storyid);
		$this->topicsIds = array();

		$result = $db->query($sql);
		while ($myrow = $db->fetchArray($result)) {
			$this->topicsIds[] = $myrow['nc_topic_id'];
		}
		// Rcupration des titres des sujets
		if( count($this->topicsIds) > 0) {
			$sql = 'SELECT topic_id, topic_title FROM '.$db->prefix('topics').' WHERE topic_id IN ('.implode(',', $this->topicsIds).')';
		}
		$this->topicsTitles = $this->topicsIdsTitles = array();
		$result = $db->query($sql);
		while ($myrow = $db->fetchArray($result)) {
			$this->topicsTitles[] = $myrow['topic_title'];
			$this->topicsIdsTitles[$myrow['topic_id']] = $myrow['topic_title'];
		}
	}


	function delete()
	{
		$db =& Database::getInstance();
		$db->queryF('DELETE FROM '.$db->prefix('stories_cronmail').' WHERE storyid='.intval($this->storyid));	// Suppression des taches CRON
		$sql = sprintf("DELETE FROM %s WHERE storyid = %u", $this->table, intval($this->storyid));
		if( !$result = $db->query($sql) ) {
			return false;
		}
		return true;
	}

	function updateCounter()
	{
		$db =& Database::getInstance();
		$sql = sprintf("UPDATE %s SET counter = counter+1 WHERE storyid = %u", $this->table, $this->storyid);
		if ( !$result = $db->queryF($sql) ) {
			return false;
		}
		return true;
	}

	function updateComments($total)
	{
		$db =& Database::getInstance();
		$sql = sprintf("UPDATE %s SET comments = %u WHERE storyid = %u", $this->table, intval($total), $this->storyid);
		if ( !$result = $db->queryF($sql) ) {
			return false;
		}
		return true;
	}


	function uid()
	{
		return $this->uid;
	}


	/**
 	* Delete stories that were published before a given date
 	*/
	function DeleteBeforeDate($timestamp, $expired, $topicslist='')
	{
		global $xoopsModule;
		$db =& Database::getInstance();
		$mid = $xoopsModule->getVar('mid');
		$prefix = $db->prefix('stories');
		$vote_prefix = $db->prefix('stories_votedata');
		$files_prefix = $db->prefix('stories_files');

		$sql = 'SELECT s.storyid FROM '.$db->prefix('stories').' s LEFT JOIN '.$db->prefix('stories_newscateg').' t ON s.storyid = t.nc_storyid WHERE s.published <= '.$timestamp;
		if($expired) {
			$sql .= 'AND (s.expired >0 AND s.expired <='.time().')';
		}
		if(xoops_trim($topicslist) != '') {
			$sql .=' t.nc_topic_id IN ('.$topicslist.')';
		}

		$result = $db->query($sql);
		while ($myrow = $db->fetchArray($result)) {
			xoops_comment_delete($mid, $myrow['storyid']);									// Delete comments
			xoops_notification_deletebyitem($mid, 'story', $myrow['storyid']);				// Delete notifications
			$db->queryF('DELETE FROM '.$vote_prefix.' WHERE storyid='.$myrow['storyid']);	// Delete votes
			$db->queryF('DELETE FROM '.$db->prefix('stories_cronmail').' WHERE storyid='.$myrow['storyid']);	// Suppression des taches CRON
			// Remove files and records related to the files
			$result2 = $db->query('SELECT * FROM '.$files_prefix.' WHERE storyid='.$myrow['storyid']);
			while ($myrow2 = $db->fetchArray($result2)) {
				$name = XOOPS_ROOT_PATH.'/uploads/'.$myrow2['downloadname'];
				if(file_exists($name)) {
					unlink($name);
				}
				$db->query('DELETE FROM '.$files_prefix.' WHERE fileid='.$myrow2['fileid']);
			}
			$db->queryF('DELETE FROM '.$prefix.' WHERE storyid='.$myrow['storyid']);		// Delete the story
		}
		return true;
	}

	function title($format="Show")
	{
		$myts =& MyTextSanitizer::getInstance();
		$smiley = 1;
		if ( $this->nosmiley() ) {
			$smiley = 0;
		}
		switch ( $format ) {
		case "Show":
			$title = $myts->htmlSpecialChars($this->title);
			break;
		case "Edit":
			$title = $myts->htmlSpecialChars($this->title);
			break;
		case "Preview":
			$title = $myts->makeTboxData4Preview($this->title,$smiley);
			break;
		case "InForm":
			$title = $myts->makeTboxData4PreviewInForm($this->title);
			break;
		}
		return $title;
	}

	function _searchPreviousOrNextArticle($storyid, $next = true, $checkRight = false)
	{
		$db =& Database::getInstance();
		$ret = array();	
		$storyid = intval($storyid);
		if($next) {
			$sql = 'SELECT storyid, title FROM '.$db->prefix('stories').' WHERE (published > 0 AND published <= '.time().') AND (expired = 0 OR expired > '.time().') AND storyid > '.$storyid;
	                         $orderBy = ' ORDER BY storyid ASC';
		} else {
			$sql = 'SELECT storyid, title FROM '.$db->prefix('stories').' WHERE (published > 0 AND published <= '.time().') AND (expired = 0 OR expired > '.time().') AND storyid < '.$storyid;		
	                         $orderBy = ' ORDER BY storyid DESC';
	                         }
		if($checkRight) {
			$topics = news_MygetItemIds('news_view');
	    	if(count($topics) > 0) {
	        	$sql .= ' AND topicid IN ('.implode(',', $topics).')';
	    	} else {
	    		return null;
	    	}
		}
		$sql .= $orderBy;
		$db =& Database::getInstance();
		$result = $db->query($sql, 1);
		if($result) {
			$myts =& MyTextSanitizer::getInstance();
			while ( $row = $db->fetchArray($result) ) {
				$ret = array('storyid' => $row['storyid'], 'title' => $myts->htmlSpecialChars($row['title']));
			} 
		}
		return $ret;
	}

	function getNextArticle($storyid, $checkRight=false)
	{
		return $this->_searchPreviousOrNextArticle($storyid, true, $checkRight);
	}
	
	function getPreviousArticle($storyid, $checkRight=false)
	{
		return $this->_searchPreviousOrNextArticle($storyid, false, $checkRight);
	}
	

	/**
 	* Returns published stories according to some options
 	*/
	function getAllPublished($limit=0, $start=0, $checkRight=false, $topic=0, $ihome=0, $asobject=true, $order = 'published', $topic_frontpage=false)
	{
		$db =& Database::getInstance();
		$myts =& MyTextSanitizer::getInstance();
		$ret = array();
		$sql = 'SELECT DISTINCT(s.storyid) FROM '.$db->prefix('stories').' s LEFT JOIN '.$db->prefix('stories_newscateg').' t ON s.storyid = t.nc_storyid LEFT JOIN '.$db->prefix('topics').' o ON t.nc_topic_id = o.topic_id WHERE (s.published > 0 AND s.published <='.time().') AND (s.expired = 0 OR s.expired > '.time().') ';

		if ($topic != 0) {
		    if (!is_array($topic)) {
		    	if($checkRight) {
        			$topics = news_MygetItemIds('news_view');
		    		if(!in_array ($topic,$topics)) {
		    			return null;
		    		} else {
		    			$sql .= ' AND t.nc_topic_id='.intval($topic).' AND (s.ihome=1 OR s.ihome=0)';
		    		}
		    	} else {
		        	$sql .= ' AND t.nc_topic_id='.intval($topic).' AND (s.ihome=1 OR s.ihome=0)';
		        }
		    } else {
				if($checkRight) {
					$topics = news_MygetItemIds('news_view');
		    		$topic = array_intersect($topic,$topics);
		    	}
		    	if(count($topic)>0) {
		        	$sql .= ' AND t.nc_topic_id IN ('.implode(',', $topic).')';
		    	} else {
		    		return null;
		    	}
		    }
		} else {
		    if($checkRight) {
		        $topics = news_MygetItemIds('news_view');
		        if(count($topics)>0) {
		        	$topics = implode(',', $topics);
		        	$sql .= ' AND t.nc_topic_id IN ('.$topics.')';
		        } else {
		        	return null;
		        }
		    }
			if (intval($ihome) == 0) {
				$sql .= ' AND s.ihome=0';
			}
		}
		if($topic_frontpage) {
			$sql .=' AND o.topic_frontpage=1';
		}
 		$sql .= " ORDER BY s.$order DESC";
		$result = $db->query($sql,intval($limit),intval($start));
		$storiesList = array();

		while ( $myrow = $db->fetchArray($result) ) {
			$storiesList[] = $myrow['storyid'];
		}
		if(count($storiesList) > 0) {
			$sql = 'SELECT * FROM '.$db->prefix('stories').' WHERE storyid IN ('.implode(',', $storiesList).') ORDER BY '.$order.' DESC';
			$result = $db->query($sql);
			while ( $myrow = $db->fetchArray($result) ) {
				// Rcupration des topics
				$sql2 = 'SELECT * FROM '.$db->prefix('stories_newscateg').' t LEFT JOIN '.$db->prefix('topics').' o ON t.nc_topic_id = o.topic_id WHERE nc_storyid = '.$myrow['storyid'];
				$result2 = $db->query($sql2);
				$topicTitles = $topicIds = array();
				while ( $myrow2 = $db->fetchArray($result2) ) {
					$topicTitles[] = $myts->htmlSpecialChars($myrow2['topic_title']);
					$topicIds[] = $myrow2['topic_id'];
				}
				if ($asobject) {
					if(count($topicTitles) > 0) {
						$myrow['topic_title'] = implode('|', $topicTitles);
						$myrow['topicid'] = implode('|', $topicIds);
					}
					$ret[] = new NewsStory($myrow);
				} else {
					$ret[$myrow['storyid']] = $myts->htmlSpecialChars($myrow['title']);
				}
				$old = $myrow['storyid'];
				$topicList = array();
			}
		}
		return $ret;
	}


	function getArchive($publish_start, $publish_end, $checkRight=false, $asobject=true, $order = 's.published')
	{
		$myts =& MyTextSanitizer::getInstance();
		$ret = array();
		$db =& Database::getInstance();
		//$sql = 'SELECT s.*, t.* FROM '.$db->prefix('stories').' s, ' .$db->prefix('topics').' t WHERE (s.topicid=t.topic_id) AND (s.published > ' . $publish_start . ' AND s.published <= ' . $publish_end . ') AND (expired = 0 OR expired > '.time().') ';
		$sql = 'SELECT * FROM '.$db->prefix('stories').' s LEFT JOIN '.$db->prefix('stories_newscateg').' t ON s.storyid = t.nc_storyid WHERE (s.published <= '.$publish_start.' AND  s.published <= '.$publish_end . ') AND (s.expired = 0 OR s.expired > '.time().') ';

	    if($checkRight) {
	        $topics = news_MygetItemIds('news_view');
	        if(count($topics)>0) {
	        	$topics = implode(',', $topics);
	        	$sql .= ' AND t.nc_topic_id IN ('.$topics.')';
	        } else {
	        	return null;
	        }
	    }
 		$sql .= " ORDER BY $order DESC";
		$result = $db->query($sql);
		while ( $myrow = $db->fetchArray($result) ) {
			if ($asobject) {
				$ret[] = new NewsStory($myrow);
			} else {
				$ret[$myrow['storyid']] = $myts->htmlSpecialChars($myrow['title']);
			}
		}
		return $ret;
	}


	/**
 	* Get the today's most readed article
 	*
 	* @param int 		$limit			records limit
 	* @param int 		$start 			starting record
 	* @param boolean	$checkRight		Do we need to check permissions (by topics) ?
	* @param int 		$topic 			limit the job to one topic
	* @param int 		$ihome 			Limit to articles published in home page only ?
	* @param boolean	$asobject		Do we have to return an array of objects or a simple array ?
	* @param string		$order			Fields to sort on
 	*/
	function getBigStory($limit=0, $start=0, $checkRight=false, $topic=0, $ihome=0, $asobject=true, $order = 's.counter')
	{
		$myts =& MyTextSanitizer::getInstance();
		$ret = array();
		$db =& Database::getInstance();
		$tdate = mktime(0,0,0,date('n'),date('j'),date('Y'));

		$sql = 'SELECT * FROM '.$db->prefix('stories').' s LEFT JOIN '.$db->prefix('stories_newscateg').' t ON s.storyid = t.nc_storyid WHERE (s.published > '.$tdate.' AND s.published < '.time().') AND (s.expired > '.time().' OR s.expired = 0) ';

		if ( intval($topic) != 0 ) {
		    if (!is_array($topic)) {
		        $sql .= ' AND t.nc_topic_id ='.intval($topic).' AND (s.ihome=1 OR s.ihome=0)';
		    }
		    else {
		    	if(count($topic)>0) {
		        	$sql .= ' AND t.nc_topic_id IN ('.implode(',', $topic).')';
		        } else {
		        	return null;
		        }
		    }
		} else {
		    if ($checkRight) {
		        $topics = news_MygetItemIds('news_view');
		        if(count($topics)>0) {
		        	$topics = implode(',', $topics);
		        	$sql .= ' AND t.nc_topic_id IN ('.$topics.')';
		        } else {
		        	return null;
		        }
		    }
			if ( intval($ihome) == 0 ) {
				$sql .= ' AND s.ihome=0';
			}
		}
 		$sql .= " ORDER BY $order DESC";
		$result = $db->query($sql,intval($limit),intval($start));
		while ( $myrow = $db->fetchArray($result) ) {
			if ( $asobject ) {
				$ret[] = new NewsStory($myrow);
			} else {
				$ret[$myrow['storyid']] = $myts->htmlSpecialChars($myrow['title']);
			}
		}
		return $ret;
	}


	/**
	* Get all articles published by an author
	*
	* @param int $uid author's id
	* @param boolean $checkRight whether to check the user's rights to topics
	*/
	function getAllPublishedByAuthor($uid, $checkRight=false, $asobject=true)
	{
		$myts =& MyTextSanitizer::getInstance();
		$db =& Database::getInstance();
		$ret = array();

		$tblstory = $db->prefix('stories');
		$tbltopics = $db->prefix('topics');


		$sql = 'SELECT * FROM '.$db->prefix('stories_newscateg').' t LEFT JOIN '.$db->prefix('stories').' s ON s.storyid = t.nc_storyid LEFT JOIN '.$db->prefix('topics').' o ON t.nc_topic_id = o.topic_id WHERE (s.published > 0 AND s.published <='.time().') AND (s.expired = 0 OR s.expired > '.time().') AND s.uid = '.intval($uid);

	    if ($checkRight) {
	        $topics = news_MygetItemIds('news_view');
	        $topics = implode(',', $topics);
	        if(xoops_trim($topics)!='') {
	        	$sql .= ' AND t.nc_topic_id IN ('.$topics.')';
	        }
	    }
 		$sql .= ' ORDER BY t.nc_topic_id, s.published DESC';
		$result = $db->query($sql);
		while ( $myrow = $db->fetchArray($result) ) {
			if ( $asobject ) {
				$ret[] = new NewsStory($myrow);
			} else {
				if ( $myrow['nohtml'] ) {
					$html = 0;
				} else {
					$html = 1;
				}
				if ( $myrow['nosmiley'] ) {
					$smiley = 0;
				} else {
					$smiley = 1;
				}
				$ret[] = array('title'=>$myts->displayTarea($myrow['title'],$html,$smiley,1),
												'topicid'=>intval($myrow['nc_topic_id']),
												'storyid'=>intval($myrow['storyid']),
												'hometext'=>$myts->displayTarea($myrow['hometext'],$html,$smiley,1),
												'counter'=>intval($myrow['counter']),
												'created'=>intval($myrow['created']),
												'topic_title'=>$myts->displayTarea($myrow['topic_title'],$html,$smiley,1),
												'topic_color'=>$myts->displayTarea($myrow['topic_color']),
												'published'=>intval($myrow['published']),
												'rating'=>(float)$myrow['rating'],
												'votes'=>intval($myrow['votes']));
			}
		}
		return $ret;
	}


	/**
	 * Get all expired stories
	 */
	function getAllExpired($limit=0, $start=0, $topic=0, $ihome=0, $asobject=true)
	{
		$myts =& MyTextSanitizer::getInstance();
		$ret = array();
		$db =& Database::getInstance();
		$sql = 'SELECT * FROM '.$db->prefix('stories').' WHERE expired <= '.time().' AND expired > 0';
				$sql .= ' AND ihome=0';

 		$sql .= ' ORDER BY expired DESC';
		$result = $db->query($sql,intval($limit),intval($start));
		while ( $myrow = $db->fetchArray($result) ) {
			if ($asobject) {
				$ret[] = new NewsStory($myrow);
			} else {
				$ret[$myrow['storyid']] = $myts->htmlSpecialChars($myrow['title']);
			}
		}
		return $ret;
	}



	/**
	 * Returns an array of object containing all the news to be automatically published.
	 */
	function getAllAutoStory($limit=0, $asobject=true, $start=0)
	{
		$myts =& MyTextSanitizer::getInstance();
		$ret = array();
		$db =& Database::getInstance();
		$sql = 'SELECT Distinct(s.storyid) FROM '.$db->prefix('stories').' s LEFT JOIN '.$db->prefix('stories_newscateg').' t ON s.storyid = t.nc_storyid WHERE S.published > '.time().' ORDER BY s.published ASC';
		$result = $db->query($sql,intval($limit),intval($start));

		$tblStories = array();
		while ( $myrow = $db->fetchArray($result) ) {
			$tblStories[] = $myrow['storyid'];
		}
		if(count($tblStories) == 0) {
			return $ret;
		}
		$sql = 'SELECT * FROM '.$db->prefix('stories').' WHERE storyid IN ('.implode(',', $tblStories).')  ORDER BY published ASC';
		$result = $db->query($sql,intval($limit),intval($start));
		while ( $myrow = $db->fetchArray($result) ) {
			if ( $asobject ) {
				$ret[] = new NewsStory($myrow);
			} else {
				$ret[$myrow['storyid']] = $myts->htmlSpecialChars($myrow['title']);
			}
		}
		return $ret;
	}

	/**
	* Get all submitted stories awaiting approval
	*
	* @param int $limit Denotes where to start the query
	* @param boolean $asobject true will returns the stories as an array of objects, false will return storyid => title
	* @param boolean $checkRight whether to check the user's rights to topics
	*/
	function getAllSubmitted($limit=0, $asobject=true, $checkRight = false, $start=0)
	{
		$myts =& MyTextSanitizer::getInstance();
		$db =& Database::getInstance();
		$ret = array();
		$sql = 'SELECT Distinct(s.storyid) FROM '.$db->prefix('stories').' s LEFT JOIN '.$db->prefix('stories_newscateg').' t ON s.storyid = t.nc_storyid WHERE (s.published = 0) ';
		if ($checkRight) {
		    global $xoopsUser;
		    if (!is_object($xoopsUser)) {
		        return $ret;
		    }
		    $allowedtopics = news_MygetItemIds('news_approve');
		    $sql .= ' AND t.nc_topic_id IN ('.implode(',', $allowedtopics).')';
		}

		$sql .= ' ORDER BY s.created DESC';

		$result = $db->query($sql,intval($limit),intval($start));
		$tblStories = array();
		while ( $myrow = $db->fetchArray($result) ) {
			$tblStories[] = $myrow['storyid'];
		}
		if(count($tblStories) == 0) {
			return $ret;
		}
		$sql = 'SELECT * FROM '.$db->prefix('stories').' WHERE storyid IN ('.implode(',', $tblStories).') ORDER BY created DESC';
		$result = $db->query($sql,intval($limit),intval($start));
		while ( $myrow = $db->fetchArray($result) ) {
			if ( $asobject ) {
				$ret[] = new NewsStory($myrow);
			} else {
				$ret[$myrow['storyid']] = $myts->htmlSpecialChars($myrow['title']);
			}
		}
		return $ret;
	}


	/**
	 * Used in the module's admin to know the number of expired, automated or pubilshed news
	 *
  	 * @param int	$storytype	1=Expired, 2=Automated, 3=New submissions, 4=Last published stories
  	 * @param bool	$checkRight	verify permissions or not ?
	 */
	function getAllStoriesCount($storytype=1, $checkRight = false)
	{
		$db =& Database::getInstance();
		$sql = 'SELECT Count(DISTINCT(s.storyid)) as cpt  FROM '.$db->prefix('stories').' s LEFT JOIN '.$db->prefix('stories_newscateg').' t ON s.storyid = t.nc_storyid LEFT JOIN '.$db->prefix('topics').' o ON t.nc_topic_id = o.topic_id WHERE ';
		switch($storytype) {
			case 1:	// Expired
				$sql .='(s.expired <= '.time().' AND s.expired >0)';
				break;
			case 2:	// Automated
				$sql .='(s.published > '.time().')';
				break;
			case 3:	// New submissions
				$sql .='(s.published = 0)';
				break;
			case 4:	// Last published stories
				$sql .='(s.published > 0 AND s.published <= '.time().') AND (s.expired = 0 OR s.expired > '.time().')';
				break;
		}
		if($checkRight) {
	        $topics = news_MygetItemIds('news_view');
	        if(count($topics)>0) {
	        	$topics = implode(',', $topics);
	        	$sql .= ' AND t.nc_topic_id IN ('.$topics.')';
	        } else {
	        	return 0;
	        }
		}
		$result = $db->query($sql);
		$myrow = $db->fetchArray($result);
		return $myrow['cpt'];
	}


	/**
	 * Get a list of stories (as objects) related to a specific topic
	 */
	function getByTopic($topicid, $limit=0)
	{
		$ret = array();
		$db =& Database::getInstance();
		$sql = 'SELECT * FROM '.$db->prefix('stories').' WHERE topicid='.intval($topicid).' ORDER BY published DESC';
		$result = $db->query($sql, intval($limit), 0);
		while( $myrow = $db->fetchArray($result) ){
			$ret[] = new NewsStory($myrow);
		}
		return $ret;
	}


	/**
	 * Count the number of news published for a specific topic
	 */
	function countPublishedByTopic($topicid=0, $checkRight = false)
	{
		$db =& Database::getInstance();
		$sql = 'SELECT Count(DISTINCT(s.storyid)) FROM '.$db->prefix('stories').' s LEFT JOIN '.$db->prefix('stories_newscateg').' t ON s.storyid = t.nc_storyid WHERE s.published > 0 AND s.published <= '.time().' AND (s.expired = 0 OR s.expired > '.time().')';
		if ( $topicid > 0 ) {
			$sql .= ' AND t.nc_topic_id = '.intval($topicid);
		} else {
			$sql .= ' AND s.ihome=0';
			if ($checkRight) {
		        $topics = news_MygetItemIds('news_view');
		        if(count($topics)>0) {
		        	$topics = implode(',', $topics);
		        	$sql .= ' AND t.nc_topic_id IN ('.$topics.')';
		        } else {
		        	return null;
		        }
		    }
		}
		$result = $db->query($sql);
		list($count) = $db->fetchRow($result);
		return $count;
	}


	function adminlink()
	{
		$ret = "&nbsp;[ <a href='".XOOPS_URL."/modules/news/submit.php?op=edit&amp;storyid=".$this->storyid()."'>"._EDIT."</a> | <a href='".XOOPS_URL."/modules/news/admin/index.php?op=delete&amp;storyid=".$this->storyid()."'>"._DELETE."</a> ]&nbsp;";
		return $ret;
	}


	function topic_imgurl($format='S')
	{
		if(trim($this->topic_imgurl)=='') {
			$this->topic_imgurl='blank.png';
		}
		$myts =& MyTextSanitizer::getInstance();
		switch($format){
			case 'S':
				$imgurl= $myts->htmlSpecialChars($this->topic_imgurl);
				break;
			case 'E':
				$imgurl = $myts->htmlSpecialChars($this->topic_imgurl);
				break;
			case 'P':
				$imgurl = $myts->makeTboxData4Preview($this->topic_imgurl);
				break;
			case 'F':
				$imgurl = $myts->makeTboxData4PreviewInForm($this->topic_imgurl);
				break;
		}
		return $imgurl;
	}

	function topic_title($format='S')
	{
		$myts =& MyTextSanitizer::getInstance();
		switch($format){
			case 'S':
				$title = $myts->htmlSpecialChars($this->topic_title);
				break;
			case 'E':
				$title = $myts->htmlSpecialChars($this->topic_title);
				break;
			case 'P':
				$title = $myts->makeTboxData4Preview($this->topic_title);
				break;
			case 'F':
				$title = $myts->makeTboxData4PreviewInForm($this->topic_title);
				break;
		}
		return $title;
	}

	function imglink()
	{
		$ret = '';
		if ($this->topic_imgurl() != '' && file_exists(XOOPS_ROOT_PATH.'/modules/news/images/topics/'.$this->topic_imgurl())) {
			$ret = "<a href='".XOOPS_URL."/modules/news/index.php?storytopic=".$this->topicid()."'><img src='".XOOPS_URL."/modules/news/images/topics/".$this->topic_imgurl()."' alt='".$this->topic_title()."' hspace='10' vspace='10' align='".$this->topicalign()."' /></a>";
		}
		return $ret;
	}

	function textlink()
	{
		$cpt = count($this->topicsIds);
		for($i=0; $i<$cpt; $i++) {
			$returns[] = "<a href='".XOOPS_URL."/modules/news/index.php?storytopic=".$this->topicsIds[$i]."'>".$this->topicsTitles[$i]."</a>";
		}
		$ret = implode(', ', $returns);
		return $ret;
	}


	function prepare2show($filescount)
	{
	    include_once XOOPS_ROOT_PATH.'/modules/news/include/functions.php';
	    global $xoopsUser, $xoopsConfig, $xoopsModuleConfig;
	    $myts =& MyTextSanitizer::getInstance();
	    $infotips = news_getmoduleoption('infotips');
	    $story = array();
	    $story['id'] = $this->storyid();
	    $story['poster'] = $this->uname();
	    $story['author_name'] = $this->uname();
	    $story['author_uid'] = $this->uid();
	    if ( $story['poster'] != false ) {
	        $story['poster'] = "<a href='".XOOPS_URL."/userinfo.php?uid=".$this->uid()."'>".$story['poster']."</a>";
	    } else {
			if($xoopsModuleConfig['displayname']!=3) {
				$story['poster'] = $xoopsConfig['anonymous'];
			}
	    }
		if ($xoopsModuleConfig['ratenews']) {
			$story['rating'] = number_format($this->rating(), 2);
			if ($this->votes == 1) {
				$story['votes'] = _NW_ONEVOTE;
			} else {
				$story['votes'] = sprintf(_NW_NUMVOTES,$this->votes);
			}
		}
	    $story['posttimestamp'] = $this->published();
	    $story['posttime'] = formatTimestamp($story['posttimestamp'],news_getmoduleoption('dateformat'));

		$auto_summary = '';
		$tmp = '';
		$auto_summary = $this->auto_summary($this->bodytext(),$tmp);

	    $story['text'] = $this->hometext();
		$story['text'] = str_replace('[summary]', $auto_summary, $story['text']);

	    $introcount = strlen($story['text']);
	    $fullcount = strlen($this->bodytext());
	    $totalcount = $introcount + $fullcount;

	    $morelink = '';
	    if ( $fullcount > 1 ) {
	        $morelink .= '<a href="'.XOOPS_URL.'/modules/news/article.php?storyid='.$this->storyid().'';
	        $morelink .= '">'._NW_READMORE.'</a>';
        	$morelink .= ' | '.sprintf(_NW_BYTESMORE,$totalcount);
	        if (XOOPS_COMMENT_APPROVENONE != $xoopsModuleConfig['com_rule']) {
	            $morelink .= ' | ';
	        }
	    }
	    if (XOOPS_COMMENT_APPROVENONE != $xoopsModuleConfig['com_rule']) {
	        $ccount = $this->comments();
	        $morelink .= '<a href="'.XOOPS_URL.'/modules/news/article.php?storyid='.$this->storyid().'';
	        $morelink2 = '<a href="'.XOOPS_URL.'/modules/news/article.php?storyid='.$this->storyid().'';
	        if ( $ccount == 0 ) {
	            $morelink .= '">'._NW_COMMENTS.'</a>';
	        } else {
	            if ( $fullcount < 1 ) {
	                if ( $ccount == 1 ) {
	                    $morelink .= '">'._NW_READMORE.'</a> | '.$morelink2.'">'._NW_ONECOMMENT.'</a>';
	                } else {
	                    $morelink .= '">'._NW_READMORE.'</a> | '.$morelink2.'">';
	                    $morelink .= sprintf(_NW_NUMCOMMENTS, $ccount);
	                    $morelink .= '</a>';
	                }
	            } else {
	                if ( $ccount == 1 ) {
	                    $morelink .= '">'._NW_ONECOMMENT.'</a>';
	                } else {
	                    $morelink .= '">';
	                    $morelink .= sprintf(_NW_NUMCOMMENTS, $ccount);
	                    $morelink .= '</a>';
	                }
	            }
	        }
	    }
	    $story['morelink'] = $morelink;
	    $story['adminlink'] = '';

	    $approveprivilege = 0;
	    if(news_is_admin_group()) {
	        $approveprivilege = 1;
	    }

	    if($xoopsModuleConfig['authoredit']==1 && (is_object($xoopsUser) && $xoopsUser->getVar('uid')==$this->uid())) {
	    	$approveprivilege = 1;
	    }
	    if ($approveprivilege) {
	        $story['adminlink'] = $this->adminlink();
	    }
	    $story['mail_link'] = 'mailto:?subject='.sprintf(_NW_INTARTICLE,$xoopsConfig['sitename']).'&amp;body='.sprintf(_NW_INTARTFOUND, $xoopsConfig['sitename']).':  '.XOOPS_URL.'/modules/news/article.php?storyid='.$this->storyid();
	    $story['imglink'] = '';
	    $story['align'] = '';
	    if ( $this->topicdisplay() ) {
	        $story['imglink'] = $this->imglink();
	        $story['align'] = $this->topicalign();
	    }
		if( $infotips > 0 ) {
			$story['infotips'] = ' title="'.news_make_infotips($this->hometext()).'"';
		} else {
			$story['infotips'] = '';
		}
	    $story['title'] = "<a href='".XOOPS_URL."/modules/news/article.php?storyid=".$this->storyid()."'".$story['infotips'].">".$this->title()."</a>";

	    $story['hits'] = $this->counter();
		if($filescount>0) {
			$story['files_attached']= true;
			$story['attached_link']="<a href='".XOOPS_URL.'/modules/news/article.php?storyid='.$this->storyid()."' title='"._NW_ATTACHEDLIB."'><img src='".XOOPS_URL.'/modules/news/images/attach.gif'."' title='"._NW_ATTACHEDLIB."'></a>";
		} else {
			$story['files_attached']= false;
			$story['attached_link']='';
		}
	    return $story;
	}

	/**
 	* Returns the user's name of the current story according to the module's option "displayname"
 	*/
	function uname($uid=0)
	{
		global $xoopsConfig;
		include_once XOOPS_ROOT_PATH.'/modules/news/include/functions.php';
		static $tblusers = array();
		$option=-1;
		if(empty($uid)) {
			$uid=$this->uid();
		}

		if(is_array($tblusers) && array_key_exists($uid,$tblusers)) {
			return 	$tblusers[$uid];
		}

		$option = news_getmoduleoption('displayname');
		if (!$option) {
			$option=1;
		}

		switch($option) {
			case 1:		// Username
				$tblusers[$uid]=XoopsUser::getUnameFromId($uid);
				return $tblusers[$uid];

			case 2:		// Display full name (if it is not empty)
				$member_handler =& xoops_gethandler('member');
				$thisuser = $member_handler->getUser($uid);
				if (is_object($thisuser)) {
					$return = $thisuser->getVar('name');
					if ($return == '') {
						$return=$thisuser->getVar('uname');
					}
				} else {
					$return=$xoopsConfig['anonymous'];
				}
				$tblusers[$uid]=$return;
				return $return;

			case 3:		// Nothing
				$tblusers[$uid]='';
				return '';
		}
	}

	/**
	* Function used to export news (in xml) and eventually the topics definitions
	* Warning, permissions are not exported !
	* @param int 		$fromdate 		Starting date
	* @param int 		$todate 		Ending date
	* @param string		$topiclist		If not empty, a list of topics to limit to
	* @param boolean	$usetopicsdef 	Should we also export topics definitions ?
	* @param boolean	$asobject		Return values as an object or not ?
	*/
	function NewsExport($fromdate, $todate, $topicslist='', $usetopicsdef=0, &$tbltopics, $asobject=true, $order = 's.published')
	{
		$ret=Array();
		$myts =& MyTextSanitizer::getInstance();
		$db =& Database::getInstance();

		if($usetopicsdef) {	// We firt begin by exporting topics definitions
			// Before all we must know which topics to export
			$sql = 'SELECT DISTINCT(t.nc_topic_id) FROM '.$db->prefix('stories').' s LEFT JOIN '.$db->prefix('stories_newscateg').' t ON s.storyid = t.nc_storyid WHERE (s.published >=' . $fromdate . ' AND s.published <= ' . $todate .')';
			if(strlen(trim($topicslist))>0) {
				$sql .=' AND t.nc_topic_id IN ('.$topicslist.')';
			}
			$result = $db->query($sql);
			while ( $myrow = $db->fetchArray($result) ) {
				$tbltopics[]=$myrow['nc_topic_id'];
			}
		}

		// Now we can search for the stories
		$sql = 'SELECT * FROM '.$db->prefix('stories').' s LEFT JOIN '.$db->prefix('stories_newscateg').' t ON s.storyid = t.nc_storyid WHERE s.published >=' . $fromdate . ' AND s.published <= ' . $todate .')';
		if(strlen(trim($topicslist))>0) {
			$sql .=' AND t.nc_topic_id IN ('.$topicslist.')';
		}
		$sql .= " ORDER BY $order DESC";
		$result = $db->query($sql);
		while ($myrow = $db->fetchArray($result)) {
			if ($asobject) {
				$ret[] = new NewsStory($myrow);
			} else {
				$ret[$myrow['storyid']] = $myts->htmlSpecialChars($myrow['title']);
			}
		}
		return $ret;
	}


	function store($approved=false)
	{
		$db =& Database::getInstance();
		$counter = isset($this->counter) ? $this->counter : 0;
		$myts =& MyTextSanitizer::getInstance();
		$title = $myts->censorString($this->title);
		$title = $myts->addSlashes($title);
		$hostname = $myts->addSlashes($this->hostname);
		$type = $myts->addSlashes($this->type);
		$hometext = $myts->addSlashes($myts->censorString($this->hometext));
		$bodytext = $myts->addSlashes($myts->censorString($this->bodytext));
		$description = $myts->addSlashes($myts->censorString($this->description));
		$keywords = $myts->addSlashes($myts->censorString($this->keywords));
		$votes = intval($this->votes);
		$rating = (float)($this->rating);
		if (!isset($this->nohtml) || $this->nohtml != 1) {
			$this->nohtml = 0;
		}
		if (!isset($this->nosmiley) || $this->nosmiley != 1) {
			$this->nosmiley = 0;
		}
		if (!isset($this->notifypub) || $this->notifypub != 1) {
			$this->notifypub = 0;
		}
		if(!isset($this->topicdisplay) || $this->topicdisplay != 0) {
			$this->topicdisplay = 1;
		}
		$expired = !empty($this->expired) ? $this->expired : 0;
		if (!isset($this->storyid)) {
			//$newpost = 1;
			$newstoryid = $db->genId($this->table.'_storyid_seq');
			$created = time();
			$published = ( $this->approved ) ? intval($this->published) : 0;
			$sql = sprintf("INSERT INTO %s (storyid, uid, title, created, published, expired, hostname, nohtml, nosmiley, hometext, bodytext, counter, ihome, notifypub, story_type, topicdisplay, topicalign, comments, rating, votes, description, keywords) VALUES (%u, %u, '%s', %u, %u, %u, '%s', %u, %u, '%s', '%s', %u, %u, %u, '%s', %u, '%s', %u, %u, %u, '%s', '%s')", $this->table, $newstoryid, intval($this->uid()), $title, $created, $published, $expired, $hostname, intval($this->nohtml()), intval($this->nosmiley()), $hometext, $bodytext, $counter, intval($this->ihome()), intval($this->notifypub()), $type, intval($this->topicdisplay()), $this->topicalign, intval($this->comments()), $rating, $votes, $description, $keywords);
		} else {
			$sql = sprintf("UPDATE %s SET title='%s', published=%u, expired=%u, nohtml=%u, nosmiley=%u, hometext='%s', bodytext='%s', ihome=%u, topicdisplay=%u, topicalign='%s', comments=%u, rating=%u, votes=%u, uid=%u, description='%s', keywords='%s' WHERE storyid = %u", $this->table, $title, intval($this->published()), $expired, intval($this->nohtml()), intval($this->nosmiley()), $hometext, $bodytext, intval($this->ihome()), intval($this->topicdisplay()), $this->topicalign, intval($this->comments()), $rating, $votes, intval($this->uid()), $description, $keywords, intval($this->storyid()));
			$newstoryid = intval($this->storyid());
		}
		if (!$db->queryF($sql)) {
			return false;
		}
		if (empty($newstoryid)) {
			$newstoryid = $db->getInsertId();
			$this->storyid = $newstoryid;
		}
		return $newstoryid;
	}

	function rating()
	{
		return $this->rating;
	}

	function votes()
	{
		return $this->votes;
	}

	function Setdescription($data)
	{
		$this->description=$data;
	}

	function Setkeywords($data)
	{
		$this->keywords=$data;
	}

	function description($format='S')
	{
		$myts =& MyTextSanitizer::getInstance();
		switch($format){
			case 'S':
				$description= $myts->htmlSpecialChars($this->description);
				break;
			case 'P':
			case 'F':
				$description = $myts->htmlSpecialChars($myts->stripSlashesGPC($this->description));
				break;
			case 'E':
				$description = $myts->htmlSpecialChars($this->description);
				break;
		}
		return $description;
	}

	function keywords($format='S')
	{
		$myts =& MyTextSanitizer::getInstance();
		switch($format){
			case 'S':
				$keywords= $myts->htmlSpecialChars($this->keywords);
				break;
			case 'P':
			case 'F':
				$keywords = $myts->htmlSpecialChars($myts->stripSlashesGPC($this->keywords));
				break;
			case 'E':
				$keywords = $myts->htmlSpecialChars($this->keywords);
				break;
		}
		return $keywords;
	}

	/**
 	* Returns a random number of news
 	*/
	function getRandomNews($limit=0, $start=0, $checkRight=false, $topic=0, $ihome=0, $order='s.published')
	{
		$ret = $rand_keys = $ret3 = array();
		$db =& Database::getInstance();
		$sql = 'SELECT s.storyid FROM '.$db->prefix('stories').' s LEFT JOIN '.$db->prefix('stories_newscateg').' t ON (s.storyid = t.nc_storyid) WHERE (s.expired = 0 OR s.expired > '.time().')';
		if ($topic != 0) {
		    if (!is_array($topic)) {
		    	if($checkRight) {
        			$topics = news_MygetItemIds('news_view');
		    		if(!in_array ($topic,$topics)) {
		    			return null;
		    		} else {
		    			$sql .= ' AND t.nc_topic_id = '.intval($topic).' AND (s.ihome=1 OR s.ihome=0)';
		    		}
		    	} else {
		        	$sql .= ' AND t.nc_topic_id = '.intval($topic).' AND (s.ihome=1 OR s.ihome=0)';
		        }
		    } else {
		    	if(count($topic)>0) {
		        	$sql .= ' AND t.nc_topic_id IN ('.implode(',', $topic).')';
		    	} else {
		    		return null;
		    	}
		    }
		} else {
		    if($checkRight) {
		        $topics = news_MygetItemIds('news_view');
		        if(count($topics)>0) {
		        	$topics = implode(',', $topics);
		        	$sql .= ' AND t.nc_topic_id IN ('.$topics.')';
		        } else {
		        	return null;
		        }
		    }
			if (intval($ihome) == 0) {
				$sql .= ' AND s.ihome=0';
			}
		}
 		$sql .= " ORDER BY $order DESC";
		$result = $db->query($sql);

		while ( $myrow = $db->fetchArray($result) ) {
			$ret[] = $myrow['storyid'];
		}
		$cnt=count($ret);
		if($cnt)	{
			srand ((double) microtime() * 10000000);
			if($limit>$cnt) {
				$limit=$cnt;
			}
			$rand_keys = array_rand($ret, $limit);
			if($limit>1) {
				for($i=0;$i<$limit;$i++) {
					$onestory=$ret[$rand_keys[$i]];
					$ret3[]= new NewsStory($onestory);
				}
			} else {
				$ret3[]= new NewsStory($ret[$rand_keys]);
			}
		}
		return $ret3;
	}



	/**
 	* Returns statistics about the stories and topics
 	*/
	function GetStats($limit)
	{
		$ret=array();
		$db =& Database::getInstance();
		$tbls=$db->prefix('stories');
		$tblt=$db->prefix('topics');
		$tblf=$db->prefix('stories_files');

		// Number of stories per topic, including expired and non published stories
		$ret2=array();
		$sql = 'SELECT count(DISTINCT(s.storyid)) as cpt, t.nc_topic_id as topicid, o.topic_title FROM '.$db->prefix('stories').' s LEFT JOIN '.$db->prefix('stories_newscateg').' t ON s.storyid = t.nc_storyid LEFT JOIN '.$db->prefix('topics').' o ON t.nc_topic_id = o.topic_id WHERE 1=1 GROUP BY t.nc_topic_id ORDER BY o.topic_title ';
		$result = $db->query($sql);
		while ($myrow = $db->fetchArray($result) ) {
			$ret2[$myrow['topicid']]=$myrow;
		}
		$ret['storiespertopic']=$ret2;
		unset($ret2);

		// Total of reads per topic
		$ret2=array();
		$sql = 'SELECT Sum(s.counter) as cpt, t.nc_topic_id as topicid FROM '.$db->prefix('stories').' s LEFT JOIN '.$db->prefix('stories_newscateg').' t ON s.storyid = t.nc_storyid GROUP BY t.nc_topic_id ORDER BY t.nc_topic_id';
		$result = $db->query($sql);
		while ($myrow = $db->fetchArray($result) ) {
			$ret2[$myrow['topicid']]=$myrow['cpt'];
		}
		$ret['readspertopic']=$ret2;
		unset($ret2);

		// Attached files per topic
		$ret2=array();
		$sql = 'SELECT Count(distinct(f.fileid)) as cpt, t.nc_topic_id as topicid FROM '.$db->prefix('stories_files').' f LEFT JOIN '.$db->prefix('stories').' s ON f.storyid = s.storyid LEFT JOIN '.$db->prefix('stories_newscateg').' t ON s.storyid = t.nc_storyid GROUP BY t.nc_topic_id ORDER BY t.nc_topic_id';
		$result = $db->query($sql);
		while ($myrow = $db->fetchArray($result) ) {
			$ret2[$myrow['topicid']]=$myrow['cpt'];
		}
		$ret['filespertopic']=$ret2;
        unset($ret2);

		// Expired articles per topic
		$ret2=array();
		$sql = 'SELECT count(DISTINCT(s.storyid)) as cpt, t.nc_topic_id as topicid FROM '.$db->prefix('stories').' s LEFT JOIN '.$db->prefix('stories_newscateg').' t ON s.storyid = t.nc_storyid WHERE s.expired>0 AND s.expired<='.time().' GROUP BY t.nc_topic_id ORDER BY t.nc_topic_id';
		$result = $db->query($sql);
		while ($myrow = $db->fetchArray($result) ) {
			$ret2[$myrow['topicid']]=$myrow['cpt'];
		}
		$ret['expiredpertopic']=$ret2;
		unset($ret2);

		// Number of unique authors per topic
		$ret2=array();
		$sql = 'SELECT count(DISTINCT(s.uid)) as cpt, t.nc_topic_id as topicid FROM '.$db->prefix('stories').' s LEFT JOIN '.$db->prefix('stories_newscateg').' t ON s.storyid = t.nc_storyid GROUP BY t.nc_topic_id ORDER BY t.nc_topic_id';
		$result = $db->query($sql);
		while ($myrow = $db->fetchArray($result) ) {
			$ret2[$myrow['topicid']]=$myrow['cpt'];
		}
		$ret['authorspertopic']=$ret2;
		unset($ret2);

		// Most readed articles
		$ret2=array();
		$sql = 'SELECT s.storyid, s.uid, s.title, s.counter, t.nc_topic_id as topicid, o.topic_title FROM '.$db->prefix('stories').' s LEFT JOIN '.$db->prefix('stories_newscateg').' t ON s.storyid = t.nc_storyid LEFT JOIN '.$db->prefix('topics').' o ON t.nc_topic_id = o.topic_id ORDER BY s.counter DESC';
		$result = $db->query($sql,intval($limit));
		while ($myrow = $db->fetchArray($result) ) {
			$ret2[$myrow['storyid']]=$myrow;
		}
		$ret['mostreadednews']=$ret2;
		unset($ret2);

		// Less readed articles
		$ret2=array();
		$sql = 'SELECT s.storyid, s.uid, s.title, s.counter, t.nc_topic_id as topicid, o.topic_title FROM '.$db->prefix('stories').' s LEFT JOIN '.$db->prefix('stories_newscateg').' t ON s.storyid = t.nc_storyid LEFT JOIN '.$db->prefix('topics').' o ON t.nc_topic_id = o.topic_id ORDER BY s.counter';
		$result = $db->query($sql,intval($limit));
		while ($myrow = $db->fetchArray($result) ) {
			$ret2[$myrow['storyid']]=$myrow;
		}
		$ret['lessreadednews']=$ret2;
		unset($ret2);

		// Best rated articles
		$ret2=array();
		$sql = 'SELECT s.storyid, s.uid, s.title, s.rating, t.nc_topic_id as topicid, o.topic_title FROM '.$db->prefix('stories').' s LEFT JOIN '.$db->prefix('stories_newscateg').' t ON s.storyid = t.nc_storyid LEFT JOIN '.$db->prefix('topics').' o ON t.nc_topic_id = o.topic_id ORDER BY s.rating DESC';
		$result = $db->query($sql,intval($limit));
		while ($myrow = $db->fetchArray($result) ) {
			$ret2[$myrow['storyid']]=$myrow;
		}
		$ret['besratednews']=$ret2;
		unset($ret2);

		// Most readed authors
		$ret2=array();
		$sql="SELECT Sum(counter) as cpt, uid FROM $tbls GROUP BY uid ORDER BY cpt DESC";
		$result = $db->query($sql,intval($limit));
		while ($myrow = $db->fetchArray($result) ) {
			$ret2[$myrow['uid']]=$myrow['cpt'];
		}
		$ret['mostreadedauthors']=$ret2;
		unset($ret2);

		// Best rated authors
		$ret2=array();
		$sql="SELECT Avg(rating) as cpt, uid FROM $tbls WHERE votes > 0 GROUP BY uid ORDER BY cpt DESC";
		$result = $db->query($sql,intval($limit));
		while ($myrow = $db->fetchArray($result) ) {
			$ret2[$myrow['uid']]=$myrow['cpt'];
		}
		$ret['bestratedauthors']=$ret2;
		unset($ret2);

		// Biggest contributors
		$ret2=array();
		$sql="SELECT Count(*) as cpt, uid FROM $tbls GROUP BY uid ORDER BY cpt DESC";
		$result = $db->query($sql,intval($limit));
		while ($myrow = $db->fetchArray($result) ) {
			$ret2[$myrow['uid']]=$myrow['cpt'];
		}
		$ret['biggestcontributors']=$ret2;
		unset($ret2);

		return $ret;
	}


	/**
	 * Get the date of the older and most recent news
	 */
	function GetOlderRecentNews(&$older, &$recent)
	{
		$db =& Database::getInstance();
		$sql = 'SELECT min(published) as minpublish, max(published) as maxpublish FROM '.$db->prefix('stories');
		$result = $db->query($sql);
		if(!$result) {
			$older = $recent = 0;
		} else {
			list($older, $recent) = $db->fetchRow($result);
		}
	}


	/*
	 * Returns the author's IDs for the Who's who page
	 */
	function getWhosWho($checkRight=false, $limit=0, $start=0)
	{
		$ret = array();
		$db =& Database::getInstance();
		$sql = 'SELECT Distinct(s.uid) FROM '.$db->prefix('stories').' s LEFT JOIN '.$db->prefix('stories_newscateg').' t ON s.storyid = t.nc_storyid WHERE (published > 0 AND published <= '.time(). ') AND (s.expired = 0 OR s.expired > '.time().') ';

	    if($checkRight) {
	        $topics = news_MygetItemIds('news_view');
	        if(count($topics)>0) {
	        	$topics = implode(',', $topics);
	        	$sql .= ' AND t.nc_topic_id IN ('.$topics.')';
	        } else {
	        	return null;
	        }
	    }
 		$sql .= ' ORDER BY s.uid';
		$result = $db->query($sql);
		while ( $myrow = $db->fetchArray($result) ) {
			$ret[] = $myrow['uid'];
		}
		return $ret;
	}


	/**
	 * Returns the content of the summary and the titles requires for the list selector
	 */
	function auto_summary($text, &$titles)
	{
		$auto_summary = '';
		if(news_getmoduleoption('enhanced_pagenav')) {
	    	$expr_matches = array();
	    	$posdeb = preg_match_all('/(\[pagebreak:|\[pagebreak).*\]/iU', $text, $expr_matches);
	    	if(count($expr_matches) > 0) {
				$delimiters = $expr_matches[0];
				$arr_search = array('[pagebreak:', '[pagebreak', ']');
				$arr_replace = array('', '', '');
				$cpt = 1;
				if(isset($titles) && is_array($titles)) {
					$titles[] = strip_tags(sprintf(_NW_PAGE_AUTO_SUMMARY,1, $this->title()));
				}
				$item = "<a href='".XOOPS_URL.'/modules/news/article.php?storyid='.$this->storyid()."&page=0'>".sprintf(_NW_PAGE_AUTO_SUMMARY,1, $this->title()).'</a><br />';
				$auto_summary .= $item;

				foreach($delimiters as $item) {
					$cpt++;
					$item = str_replace($arr_search, $arr_replace, $item);
					if(xoops_trim($item) == '') {
						$item = $cpt;
					}
					$titles[] = strip_tags(sprintf(_NW_PAGE_AUTO_SUMMARY,$cpt, $item));
					$item = "<a href='".XOOPS_URL.'/modules/news/article.php?storyid='.$this->storyid().'&page='.($cpt-1)."'>".sprintf(_NW_PAGE_AUTO_SUMMARY,$cpt, $item).'</a><br />';
					$auto_summary .= $item;
				}
    		}
		}
		return $auto_summary;
	}

	function hometext($format = 'Show')
	{
		$myts =& MyTextSanitizer::getInstance();
		$html = $smiley = $xcodes = 1;
		if ( $this->nohtml() ) {
			$html = 0;
		}
		if ( $this->nosmiley() ) {
			$smiley = 0;
		}
		switch ( $format ) {
		case 'Show':
			$hometext = $myts->displayTarea($this->hometext,$html,$smiley,$xcodes);
			$tmp = '';
			$auto_summary = $this->auto_summary($this->bodytext('Show'),$tmp);
			$hometext = str_replace('[summary]', $auto_summary, $hometext);
			break;
		case 'Edit':
			$hometext = $myts->htmlSpecialChars($this->hometext);
			break;
		case 'Preview':
			$hometext = $myts->previewTarea($this->hometext,$html,$smiley,$xcodes);
			break;
		case 'InForm':
			$hometext = $myts->makeTareaData4PreviewInForm($this->hometext);
			break;
		}
		return $hometext;
	}

	function bodytext($format = 'Show')
	{
		$myts =& MyTextSanitizer::getInstance();
		$html = 1;
		$smiley = 1;
		$xcodes = 1;
		if ( $this->nohtml() ) {
			$html = 0;
		}
		if ( $this->nosmiley() ) {
			$smiley = 0;
		}
		switch ( $format ) {
		case 'Show':
			$bodytext = $myts->displayTarea($this->bodytext,$html,$smiley,$xcodes);
			$tmp = '';
			$auto_summary = $this->auto_summary($bodytext,$tmp);
			$bodytext = str_replace('[summary]', $auto_summary, $bodytext);
			break;
		case 'Edit':
			$bodytext = $myts->htmlSpecialChars($this->bodytext);
			break;
		case 'Preview':
			$bodytext = $myts->previewTarea($this->bodytext,$html,$smiley, $xcodes);
			break;
		case 'InForm':
			$bodytext = $myts->makeTareaData4PreviewInForm($this->bodytext);
			break;
		}
		return $bodytext;
	}

	function counter()
	{
		return $this->counter;
	}

	function created()
	{
		return $this->created;
	}

	function published()
	{
		return $this->published;
	}

	function expired()
	{
		return $this->expired;
	}

	function hostname()
	{
		return $this->hostname;
	}

	function storyid()
	{
		return $this->storyid;
	}

	function nohtml()
	{
		return $this->nohtml;
	}

	function nosmiley()
	{
		return $this->nosmiley;
	}

	function notifypub()
	{
		return $this->notifypub;
	}

	function type()
	{
		return $this->type;
	}

	function ihome()
	{
		return $this->ihome;
	}

	function topicdisplay()
	{
		return $this->topicdisplay;
	}

	function topicalign($astext=true)
	{
		if ( $astext ) {
			if ( $this->topicalign == 'R' ) {
				$ret = 'right';
			} else {
				$ret = 'left';
			}
			return $ret;
		}
		return $this->topicalign;
	}

	function comments()
	{
		return $this->comments;
	}

	function setStoryId($value)
	{
		$this->storyid = intval($value);
	}

	function setTopicId($value)
	{
		$this->topicid = intval($value);
	}

	function setUid($value)
	{
		$this->uid = intval($value);
	}

	function setTitle($value)
	{
		$this->title = $value;
	}

	function setHometext($value)
	{
		$this->hometext = $value;
	}

	function setBodytext($value)
	{
		$this->bodytext = $value;
	}

	function setPublished($value)
	{
		$this->published = intval($value);
	}

	function setExpired($value)
	{
		$this->expired = intval($value);
	}

	function setHostname($value)
	{
		$this->hostname = $value;
	}

	function setNohtml($value=0)
	{
		$this->nohtml = $value;
	}

	function setNosmiley($value=0)
	{
		$this->nosmiley = $value;
	}

	function setIhome($value)
	{
		$this->ihome = $value;
	}

	function setNotifyPub($value)
	{
		$this->notifypub = $value;
	}

	function setType($value)
	{
		$this->type = $value;
	}

	function setApproved($value)
	{
		$this->approved = intval($value);
	}

	function setTopicdisplay($value)
	{
		$this->topicdisplay = $value;
	}

	function setTopicalign($value)
	{
		$this->topicalign = $value;
	}

	function setComments($value)
	{
		$this->comments = intval($value);
	}
}
	}
?>