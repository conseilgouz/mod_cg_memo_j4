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

header("Content-type: text/css; charset: UTF-8");
?>
<div class="<?php echo $params->get('class');?> cg-memo-note <?php echo $params->get('customclass');?>" data="<?php echo $module->id;?>" >
  <div class="<?php echo $params->get('class');?> <?php echo $params->get('pinvisibleyes');?>  tack"></div>
  <div class="<?php echo $params->get('class');?> text-box-cont"><span class="<?php echo $params->get('class');?> editor-output"><?php echo $params->get('editor');?></span></div>
</div>