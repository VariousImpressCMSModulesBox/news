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
* PDF class
*
* System tool that allow's you to generate PDF files from your news articles
* Some parts of this file is based on the old "pdf.php" from news module.
*
* @copyright	The ImpressCMS Project http://www.impresscms.org/
* @license		http://www.gnu.org/licenses/old-licenses/gpl-2.0.html GNU General Public License (GPL)
* @package		Modules (news)
* @since		1.57
* @author		Sina Asghari (AKA stranger) <stranger@impresscms.ir>
* @author		Herve Thouzard (Instant Zero) <http://xoops.instant-zero.com>
* @version		$Id$
*/

error_reporting(0);
include_once '../../mainfile.php';
$myts =& MyTextSanitizer::getInstance();
include_once XOOPS_ROOT_PATH.'/modules/news/class/class.newsstory.php';
include_once XOOPS_ROOT_PATH.'/modules/news/include/functions.php';

// Verifications on the article
$storyid = isset($_GET['storyid']) ? intval($_GET['storyid']) : 0;

if (empty($storyid))  {
    redirect_header(XOOPS_URL.'/modules/news/index.php',2,_NW_NOSTORY);
    exit();
}

$article = new NewsStory($storyid);
// Not yet published
if ( $article->published() == 0 || $article->published() > time() ) {
    redirect_header(XOOPS_URL.'/modules/news/index.php', 2, _NW_NOSTORY);
    exit();
}

// Expired
if ( $article->expired() != 0 && $article->expired() < time() ) {
    redirect_header(XOOPS_URL.'/modules/news/index.php', 2, _NW_NOSTORY);
    exit();
}


$gperm_handler =& xoops_gethandler('groupperm');
if (is_object($xoopsUser)) {
    $groups = $xoopsUser->getGroups();
} else {
	$groups = XOOPS_GROUP_ANONYMOUS;
}
if(!isset($xoopsModule)) {
	$module_handler =& xoops_gethandler('module');
	$xoopsModule =& $module_handler->getByDirname('news');
}

if (!$gperm_handler->checkRight('news_view', $article->topicid(), $groups, $xoopsModule->getVar('mid'))) {
	redirect_header(XOOPS_URL.'/modules/news/index.php', 3, _NOPERM);
	exit();
}

require_once ICMS_PDF_LIB_PATH.'/tcpdf.php';
$filename = XOOPS_ROOT_PATH.'/modules/news/language/'.$xoopsConfig['language'].'/main.php';
if (file_exists( $filename)) {
	include_once $filename;
} else {
	include_once XOOPS_ROOT_PATH.'/modules/news/language/english/main.php';
}

$filename = ICMS_ROOT_PATH.'/language/'.$xoopsConfig['language'].'/pdf.php';
if(file_exists($filename)) {
	include_once $filename;
} else {
	include_once ICMS_ROOT_PATH.'/language/english/pdf.php';
}

$dateformat = news_getmoduleoption('dateformat');
$content = '';
$content .= '<b><i><u><a href="'.XOOPS_URL.'/modules/news/article.php?storyid='.$article->storyid().'" title="'.$myts->undoHtmlSpecialChars($article->title()).'">'.$myts->undoHtmlSpecialChars($article->title()).'</a></u></i></b><br />'._POSTEDBY.' : <a href="'.XOOPS_URL.'/userinfo.php?uid='.$article->uid().'" title="'.$myts->undoHtmlSpecialChars($article->uname()).'">'.$myts->undoHtmlSpecialChars($article->uname()).'</a><br />'._MD_POSTEDON.' '.formatTimestamp($article->published(),$dateformat).'<br /><br /><br />';
$content .= $myts->undoHtmlSpecialChars($article->hometext()) . '<br />' . $myts->undoHtmlSpecialChars($article->bodytext());
$content = str_replace('[pagebreak]','<br />',$content);

$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true);

$doc_title = $myts->undoHtmlSpecialChars($article->title());
$doc_keywords = 'ICMS';

// set document information
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor(PDF_AUTHOR);
$pdf->SetTitle($doc_title);
$pdf->SetSubject($doc_title);
$pdf->SetKeywords($doc_keywords);

$pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE, PDF_HEADER_STRING);

//set margins
$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
//set auto page breaks
$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);
$pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);
$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO); //set image scale factor

$pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
$pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

$pdf->setLanguageArray($l); //set language items


//initialize document
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->writeHTML($content, true, 0);
$pdf->Output();
?>