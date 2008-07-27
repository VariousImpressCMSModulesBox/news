<?php
/**
* news form
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

if (file_exists(XOOPS_ROOT_PATH.'/language/'.$xoopsConfig['language'].'/calendar.php')) {
	include_once XOOPS_ROOT_PATH.'/language/'.$xoopsConfig['language'].'/calendar.php';
} else {
	include_once XOOPS_ROOT_PATH.'/language/english/calendar.php';
}
include_once XOOPS_ROOT_PATH.'/class/xoopsformloader.php';
include_once XOOPS_ROOT_PATH.'/modules/news/include/functions.php';
include_once XOOPS_ROOT_PATH.'/modules/news/class/tree.php';
include_once XOOPS_ROOT_PATH.'/modules/news/config.php';

$sform = new XoopsThemeForm(_NW_SUBMITNEWS, 'storyform', XOOPS_URL.'/modules/'.$xoopsModule->getVar('dirname').'/submit.php');
$sform->setExtra('enctype="multipart/form-data"');
$sform->addElement(new XoopsFormText(_NW_TITLE, 'title', 50, 255, $title), true);

// Topic's selection box
if (!isset($xt)) {
	$xt = new NewsTopic();
}
if($xt->getAllTopicsCount() == 0) {
   	redirect_header('index.php',4,_NW_POST_SORRY);
   	exit();
}


include_once XOOPS_ROOT_PATH.'/class/tree.php';
	if(!$cfg['use_multi_cat']) {
$allTopics = $xt->getAllTopics($xoopsModuleConfig['restrictindex'],'news_submit');
$topic_tree = new XoopsObjectTree($allTopics, 'topic_id', 'topic_pid');
$topic_select = $topic_tree->makeSelBox('topic_id', 'topic_title', '-- ', $topicid, false);
$sform->addElement(new XoopsFormLabel(_NW_TOPIC, $topic_select));
if ($approveprivilege) {
    //Show topic image?
    $sform->addElement(new XoopsFormRadioYN(_AM_TOPICDISPLAY, 'topicdisplay', $topicdisplay));
    //Select image position
    $posselect = new XoopsFormSelect(_AM_TOPICALIGN, 'topicalign', $topicalign);
    $posselect->addOption('R', _AM_RIGHT);
    $posselect->addOption('L', _AM_LEFT);
    $sform->addElement($posselect);
    //Publish in home?
    //TODO: Check that pubinhome is 0 = no and 1 = yes (currently vice versa)
    $sform->addElement(new XoopsFormRadioYN(_AM_PUBINHOME, 'ihome', $ihome, _NO, _YES));
}
	}else{
$allTopics = array();
$allTopics = $xt->getAllTopics($xoopsModuleConfig['restrictindex'],'news_submit', true);
$topic_tree = new MyXoopsObjectTree($allTopics, 'topic_id', 'topic_pid');
$topicArray = array();
$topicArray = $topic_tree->giveElements('topic_title');
$topicSelect = new XoopsFormSelect(_NW_TOPIC, 'topic_id', $topicid, 4, true);
$topicSelect->addOptionArray($topicArray);
$sform->addElement($topicSelect, true);
	}
//If admin - show admin form
//TODO: Change to "If submit privilege"
if ($approveprivilege) {
    //Publish in home?
    //TODO: Check that pubinhome is 0 = no and 1 = yes (currently vice versa)
    $sform->addElement(new XoopsFormRadioYN(_AM_PUBINHOME, 'ihome', $ihome, _NO, _YES));
}

// News author
if ($approveprivilege && is_object($xoopsUser) && $xoopsUser->isAdmin($xoopsModule->mid())) {
	if(!isset($newsauthor)) {
		$newsauthor=$xoopsUser->getVar('uid');
	}
	$member_handler = &xoops_gethandler( 'member' );
	$usercount = $member_handler->getUserCount();
	if ( $usercount < $cfg['config_max_users_list']) {
		$sform->addElement(new XoopsFormSelectUser(_NW_AUTHOR,'author',true, $newsauthor),false);
	} else {
		$sform->addElement(new XoopsFormText(_NW_AUTHOR_ID, 'author', 10, 10, $newsauthor), false);
	}
}

$editor=news_getWysiwygForm(_NW_THESCOOP, 'hometext', $hometext, 15, 60, 'hometext_hidden');
$sform->addElement($editor,true);

//Extra info
//If admin -> if submit privilege
if ($approveprivilege) {
    $editor2=news_getWysiwygForm(_AM_EXTEXT, 'bodytext', $bodytext, 15, 60, 'bodytext_hidden');
	$sform->addElement($editor2,false);

    if(news_getmoduleoption('metadata')) {
		$sform->addElement(new xoopsFormText(_NW_META_DESCRIPTION, 'description', 50, 255, $description), false);
		$sform->addElement(new xoopsFormText(_NW_META_KEYWORDS, 'keywords', 50, 255, $keywords), false);
    }
}

// Manage upload(s)
$allowupload = false;
switch ($xoopsModuleConfig['uploadgroups'])
{
	case 1: //Submitters and Approvers
		$allowupload = true;
		break;
	case 2: //Approvers only
		$allowupload = $approveprivilege ? true : false;
		break;
	case 3: //Upload Disabled
		$allowupload = false;
		break;
}

if($allowupload)
{
	if($op=='edit') {
		$sfiles = new sFiles();
		$filesarr=Array();
		$filesarr=$sfiles->getAllbyStory($storyid);
		if(count($filesarr)>0) {
			$upl_tray = new XoopsFormElementTray(_AM_UPLOAD_ATTACHFILE,'<br />');
			$upl_checkbox=new XoopsFormCheckBox('', 'delupload[]');

			foreach ($filesarr as $onefile)
			{
				$link = sprintf("<a href='%s/%s' target='_blank'>%s</a>\n",XOOPS_UPLOAD_URL,$onefile->getDownloadname('S'),$onefile->getFileRealName('S'));
				$upl_checkbox->addOption($onefile->getFileid(),$link);
			}
			$upl_tray->addElement($upl_checkbox,false);
			$dellabel=new XoopsFormLabel(_AM_DELETE_SELFILES,'');
			$upl_tray->addElement($dellabel,false);
			$sform->addElement($upl_tray);
		}
	}
	$sform->addElement(new XoopsFormFile(_AM_SELFILE, 'attachedfile', $xoopsModuleConfig['maxuploadsize']), false);
}


$option_tray = new XoopsFormElementTray(_OPTIONS,'<br />');
//Set date of publish/expiration
if ($approveprivilege) {
	if(is_object($xoopsUser) && $xoopsUser->isAdmin($xoopsModule->getVar('mid'))) {
		$approve=1;
	}
    $approve_checkbox = new XoopsFormCheckBox('', 'approve', $approve);
    $approve_checkbox->addOption(1, _AM_APPROVE);
    $option_tray->addElement($approve_checkbox);

    $check=$published>0 ? 1 :0;
    $published_checkbox = new XoopsFormCheckBox('', 'autodate',$check);
    $published_checkbox->addOption(1, _AM_SETDATETIME);
    $option_tray->addElement($published_checkbox);

    $option_tray->addElement(new XoopsFormDateTime(_AM_SETDATETIME, 'publish_date', 15, $published));

	$check=$expired>0 ? 1 :0;
    $expired_checkbox = new XoopsFormCheckBox('', 'autoexpdate',$check);
    $expired_checkbox->addOption(1, _AM_SETEXPDATETIME);
    $option_tray->addElement($expired_checkbox);

    $option_tray->addElement(new XoopsFormDateTime(_AM_SETEXPDATETIME, 'expiry_date', 15, $expired));
}

if (is_object($xoopsUser)) {
	$notify_checkbox = new XoopsFormCheckBox('', 'notifypub', $notifypub);
	$notify_checkbox->addOption(1, _NW_NOTIFYPUBLISH);
	$option_tray->addElement($notify_checkbox);
	if ($xoopsUser->isAdmin($xoopsModule->getVar('mid'))) {
		$nohtml_checkbox = new XoopsFormCheckBox('', 'nohtml', $nohtml);
		$nohtml_checkbox->addOption(1, _DISABLEHTML);
		$option_tray->addElement($nohtml_checkbox);
	}
}
$smiley_checkbox = new XoopsFormCheckBox('', 'nosmiley', $nosmiley);
$smiley_checkbox->addOption(1, _DISABLESMILEY);
$option_tray->addElement($smiley_checkbox);


$sform->addElement($option_tray);

//TODO: Approve checkbox + "Move to top" if editing + Edit indicator

//Submit buttons
$button_tray = new XoopsFormElementTray('' ,'');
$preview_btn = new XoopsFormButton('', 'preview', _PREVIEW, 'submit');
$preview_btn->setExtra('accesskey="p"');
$button_tray->addElement($preview_btn);
$submit_btn = new XoopsFormButton('', 'post', _NW_POST, 'submit');
$submit_btn->setExtra('accesskey="s"');
$button_tray->addElement($submit_btn);
$sform->addElement($button_tray);

//Hidden variables
if(isset($storyid)){
    $sform->addElement(new XoopsFormHidden('storyid', $storyid));
}

if (!isset($returnside)) {
	$returnside=isset($_POST['returnside']) ? intval($_POST['returnside']) : 0;
	if(empty($returnside))	{
		$returnside=isset($_GET['returnside']) ? intval($_GET['returnside']) : 0;
	}
}

if(!isset($returnside)) {
	$returnside=0;
}
$sform->addElement(new XoopsFormHidden('returnside', $returnside),false);

if (!isset($type)) {
    if ($approveprivilege) {
        $type = "admin";
    }
    else {
        $type = "user";
    }
}
$type_hidden = new XoopsFormHidden('type', $type);
$sform->addElement($type_hidden);
$sform->display();
?>