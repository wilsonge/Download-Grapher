<?php 
/**
 * @copyright (C) 2012 JoomJunk. All rights reserved.
 * @package    JoomJunk Downloads
 * @license    http://www.gnu.org/licenses/gpl-3.0.html
 **/

defined('_JEXEC') or die('Restricted access'); 

?>
<div id="jj_downloads">
	<div class="span5" style="float: right;">
		<div style="width:95%;border:0px solid #ccc;margin:10px;padding:0px">
			<table class="adminlist table table-striped">
				<caption><?php echo JText::_('COM_JJ_DOWNLOADS_TOTALS'); ?></caption>
				<thead>
					<tr>
						<td></td>
						<th scope="row"><?php echo JText::_('COM_JJ_DOWNLOADS_TOTALS'); ?></th>
					</tr>
				</thead>
				<tbody>
					<?php foreach($this->extensions as $extension) { ?>
					<tr>
						<th scope="col"><?php echo $extension->extensionname; ?></th>
						<td><?php echo $extension->counts; ?></td>
					</tr>
					<?php } ?>
				</tbody>
			</table>	
		</div>
	</div>
	
	<div class="span5" style="float: left;">
		<div id="cpanel" style="margin:10px;padding-left:5px">
			<div id="chart">
				<script type="text/javascript">(function($){ $('.adminlist') .visualize({type: 'bar', width: '630px', height: '400px'}) .appendTo('#chart') })(jQuery);</script>
			</div>
		</div>           
	</div>
</div>
