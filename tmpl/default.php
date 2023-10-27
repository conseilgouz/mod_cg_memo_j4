<?php 
/**
 * CG Memo Module for Joomla 4.x/5.x
 *
 * @author     ConseilgGouz
 * @copyright (C) 2023 www.conseilgouz.com. All Rights Reserved.
 * @license    GNU/GPLv3 https://www.gnu.org/licenses/gpl-3.0.html
 */
// no direct access
defined( '_JEXEC' ) or die( 'Restricted access' ); 
use Joomla\CMS\Uri\Uri;
use Joomla\CMS\Factory;
$modulefield	= 'media/mod_cg_memo/';
$document 		= Factory::getDocument();
/** @var Joomla\CMS\WebAsset\WebAssetManager $wa */
$wa = Factory::getDocument()->getWebAssetManager();
$wa->registerAndUseStyle('cgmemo',$modulefield.'css/cgmemo.css');
$core = $wa->useAsset('script', 'core');
if ((bool)Factory::getConfig()->get('debug')) { // Mode debug
	$document->addScript(''.URI::base(true).'/media/mod_cg_memo/js/cgmemo.js'); 
} else {
	$wa->registerAndUseScript('cgmemo',$modulefield.'js/cgmemo.js');
}
$style = "";
if ($params->get('font-family') == 'allthatmattersmedium') {
	$style = "@font-face {
		font-family: 'allthatmattersmedium';
		src: url('".URI::root()."media/mod_cg_memo/fonts/allthatmatters-webfont.eot');
		src: url('".URI::root()."media/mod_cg_memo/fonts/allthatmatters-webfont.eot?#iefix') format('embedded-opentype'),  url('".URI::root()."media/mod_cg_memo/fonts/allthatmatters-webfont.woff') format('woff'),  url('".URI::root()."media/mod_cg_memo/fonts/allthatmatters-webfont.ttf') format('truetype'),  url('".URI::root()."media/mod_cg_memo/fonts/allthatmatters-webfont.svg#allthatmattersmedium') format('svg');
		font-weight: normal;
		font-style: normal;
	}";
	$style .= "@font-face {
		font-family: 'Indie Flower';
		url('".URI::root()."media/mod_cg_memo/fonts/IndieFlower-Regular.ttf') format('truetype');
		font-weight: normal;
		font-style: normal;
	}";
} else {
	$wa->registerAndUseScript('googleFont','//ajax.googleapis.com/ajax/libs/webfont/1.4.7/webfont.js');
}
$style .= ".".$params->get('class').".cg-memo-note {
		max-height:".$params->get('max-height')."%;
		max-width:".$params->get('max-width')."%; 
		font-size:".$params->get('font-size')."px;
		color:".$params->get('color','black')."!important;
		font-family:".$params->get('font-family').";
		line-height:".$params->get('line-height')."px !important;
		background-color:".$params->get('note-color').";
		padding-top:".$params->get('padding-top')."px;
		padding-right:".$params->get('padding-right')."px;
		padding-bottom:".$params->get('padding-bottom')."px;
		padding-left:".$params->get('padding-left')."px;
		-webkit-transform: rotate(".$params->get('degrees')."deg);
	/* Firefox */
		-moz-transform: rotate(".$params->get('degrees')."deg);
	/* IE */
		-ms-transform: rotate(".$params->get('degrees')."deg);
	/* Opera */
		-o-transform: rotate(".$params->get('degrees')."deg);
		box-shadow:".$params->get('shadow-horizontal')."px
					".$params->get('shadow-vertical')."px 
					".$params->get('shadow-blur')."px' 
					".$params->get('shadow-color').";
	}";
$style .= ".".$params->get('class').".editor-output {line-height:".$params->get('line-height')."px !important;}";
$style .= ".".$params->get('class')." ol li, .".$params->get('class')." ul li {line-height:".$params->get('line-height')."px!important;}";
$style .= ".".$params->get('class')." .tack {position: absolute;
				top:".$params->get('tack-top')."px;left:".$params->get('tack-left')."px;";
$style .= 'background-image: url("'.URI::root().'/media/'.$module->module.'/img/'.$params->get('tack-color').'");
			background-repeat: no-repeat;
			background-position: center center;
			height: 42px;
			width: 31px;
			}';
$style .= ".hidepin.tack {display:none !important;}";
$style .= ".".$params->get('class')." .line {display: block;}";
$style .= ".".$params->get('class')." .wf-loading h1 {visibility: hidden;}";
$style .= ".".$params->get('class')." .wf-active h1,. ".$params->get('class').".wf-inactive h1 {
			visibility: visible;
			font-family: 'Cantarell';
			}";
$document->addScriptOptions('mod_cg_memo_'.$module->id, 
	array('fontfamily' => $params->get('font-family'),
	));

// Add an inline content as usual, will be rendered in flow after all assets
$wa->addInlineStyle($style);
header("Content-type: text/css; charset: UTF-8");
?>
<div class="<?php echo $params->get('class');?> cg-memo-note <?php echo $params->get('customclass');?>" data="<?php echo $module->id;?>" >
  <div class="<?php echo $params->get('class');?> <?php echo $params->get('pinvisibleyes');?>  tack"></div>
  <div class="<?php echo $params->get('class');?> text-box-cont"><span class="<?php echo $params->get('class');?> editor-output"><?php echo $params->get('editor');?></span></div>
</div>