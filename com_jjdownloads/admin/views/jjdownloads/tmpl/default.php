<?php 
/**
 * @copyright (C) 2012 JoomJunk. All rights reserved.
 * @package    JoomJunk Downloads
 * @license    http://www.gnu.org/licenses/gpl-3.0.html
 **/

defined('_JEXEC') or die('Restricted access'); 

?>

<div class="col width-40" style="float: right;">
	<div style="width:95%;border:0px solid #ccc;margin:10px;padding:0px">
		<table class="adminlist">
			<caption><?php echo JText::_('COM_JJ_DOWNLOADS_EXTENSION_DOWNLOADS'); ?></caption>
			<thead>
				<tr>
					<td></td>
					<?php $Monday= strtotime('monday this week');?>
					<th scope="row"><?php echo JText::_('COM_JJ_DOWNLOADS_WEEK') . date("j/n/y", $Monday-(604800*4)); ?></th>
					<th scope="row"><?php echo JText::_('COM_JJ_DOWNLOADS_WEEK') . date("j/n/y", $Monday-(604800*3)); ?></th>
					<th scope="row"><?php echo JText::_('COM_JJ_DOWNLOADS_WEEK') . date("j/n/y", $Monday-(604800*2)); ?></th>
					<th scope="row"><?php echo JText::_('COM_JJ_DOWNLOADS_WEEK') . date("j/n/y", $Monday-(604800*1)); ?></th>
					<th scope="row"><?php echo JText::_('COM_JJ_DOWNLOADS_WEEK') . date("j/n/y", $Monday); ?></th>
				</tr>
			</thead>
			<tbody>
				<tr>
					<th scope="col">Kunena Quick Icons</th>
					<td>30</td>
					<td>30</td>
					<td>160</td>
					<td>40</td>
					<td>120</td>
				</tr>
				<tr>
					<th scope="col">jDownloads Quick Icons</th>
					<td>3</td>
					<td>30</td>
					<td>30</td>
					<td>5</td>
					<td>10</td>
				</tr>
				<tr>
					<th scope="row">Sponsors</th>
					<td>3</td>
					<td>40</td>
					<td>30</td>
					<td>45</td>
					<td>30</td>
				</tr>
				<tr>
					<th scope="row">Shoutbox</th>
					<td>10</td>
					<td>180</td>
					<td>10</td>
					<td>85</td>
					<td>25</td>
				</tr>
				<tr>
					<th scope="row">Social Images</th>
					<td>0</td>
					<td>50</td>
					<td>9</td>
					<td>26</td>
					<td>14</td>
				</tr>
				<tr>
					<th scope="row">Accordion</th>
					<td>40</td>
					<td>80</td>
					<td>90</td>
					<td>25</td>
					<td>15</td>
				</tr>		
				<tr>
					<th scope="row">SWFUpload</th>
					<td>4</td>
					<td>8</td>
					<td>9</td>
					<td>2</td>
					<td>15</td>
				</tr>		
				<tr>
					<th scope="row">Fake Online Users</th>
					<td>40</td>
					<td>80</td>
					<td>90</td>
					<td>25</td>
					<td>15</td>
				</tr>
				<tr>
					<th scope="row">Fake Registered Users</th>
					<td>4</td>
					<td>9</td>
					<td>0</td>
					<td>5</td>
					<td>1</td>
				</tr>
				<tr>
					<th scope="row">Module Generator</th>
					<td>40</td>
					<td>50</td>
					<td>78</td>
					<td>14</td>
					<td>15.6</td>
				</tr>
			</tbody>
		</table>	
	</div>
</div>

<div class="col width-60" style="float: left;">
	<div id="cpanel" style="margin:10px;padding-left:5px">
		<div id="chart">
			<script type="text/javascript">$('.adminlist') .visualize({type: 'line', width: '620px', height: '400px'}) .appendTo('#chart') </script>
		</div>
	</div>           
</div>
