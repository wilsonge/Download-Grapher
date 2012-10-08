<?php
/**
 * @copyright (C) 2012 JoomJunk. All rights reserved.
 * @package    JoomJunk Downloads
 * @license    http://www.gnu.org/licenses/gpl-3.0.html
 **/

function com_install() {
$lang =&  JFactory::getLanguage();
$lang->load('com_jjdownloads', JPATH_ADMINISTRATOR);
    ?>
    <table width="100%">
    	<tr>
    		<td width="4%">
    			<img src="components/com_jjdownloads/assets/images/jj_logo.png" height="48px" width="48px">
    		</td>
    		<td width="76%">
    			<h2>
    				<?php
					echo JText::_('JJ Downloads') . ' 1.0.0 '; ?>
    			</h2>
    		</td>
    	</tr>
    </table>

    <table width="100%">
		<tr>
			<td width='50%'>
    			<?php echo JText::_('COM_JJ_DOWNLOADS_DESC'); ?>
    		</td>
			<td width='50%' style='background:#F2F2F2;padding:10px;'>
				<?php echo JText::_('COM_JJ_DOWNLOADS_RIGHT'); ?>
			</td>
    	</tr>
    </table>
	<?php
    return true;
} ?>