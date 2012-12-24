<?php 
/**
 * @copyright (C) 2012 JoomJunk. All rights reserved.
 * @package    JoomJunk Downloads
 * @license    http://www.gnu.org/licenses/gpl-3.0.html
 **/

defined('_JEXEC') or die('Restricted access'); 

jimport('joomla.application.component.helper');

$rows=count($this->history);
$weeks = JComponentHelper::getParams('com_jjdownloads')->get('weeks', 5);

$downloads=array();
$i=0;
while($i<$rows) {
	$downloads[$i]=explode(",", $this->history[$i]->downloads);
	$i++;
}
$i=0;
$historicalcounts=array();
while($i<$rows) {
	$counter=count($downloads[$i]);
	$j=0;
	while($j<($counter-1)) {
		$aextension=$downloads[$i][$j];
		$historicalcounts[$i][$j]=explode(":", $aextension);
		$j++;
	}
	$i++;
}
$array=array();
$i=0;
while($i<$rows) {
	$j=0;
	while($j<($counter-1)) {
		$k=0;
		while($k<count($historicalcounts[$i][$j][0])) {
			$array[$historicalcounts[$i][$j][0]][$this->history[$rows-$i-1]->date]=$historicalcounts[$i][$j][1];
			$k++;
		}
		$array[$historicalcounts[$i][$j][0]]['name']=$historicalcounts[$i][$j][0];
	$j++;
	}
$i++;
}
?>

<div class="col width-40" style="float: right;">
	<div style="width:95%;border:0px solid #ccc;margin:10px;padding:0px">
		<table class="adminlist">
			<caption><?php echo JText::_('COM_JJ_DOWNLOADS_EXTENSION_DOWNLOADS'); ?></caption>
			<thead>
				<tr>
					<td></td>
					<?php
					$i=1;
					while($i<($weeks+1)) {
						?>
						<th scope="row"><?php echo JText::_('COM_JJ_DOWNLOADS_WEEK') . date("j/n/y", strtotime(($this->history[$rows-1]->date))); ?></th>
						<?php
						$i++;
					}
					?>
				</tr>
			</thead>
			<tbody>
				<?php
				$model = $this->getModel('jjdownloads');
				foreach($array as $extension)  {
					$j=0;
					?>
					<tr>
						<th scope="col"><?php if(isset($extension['name'])) { echo $model->Name( $extension['name'] ); } else { echo JText::_('COM_JJ_DOWNLOADS_UNKNOWN'); }?></th>
						<?php for($i=count($this->history);$i>0;$i--) {
							if($j<$weeks) { 
							?>
								<td>
									<?php
									if(($rows-$i)>=0) {
										if(isset($extension[$this->history[$rows-$i]->date])) {
											if(($rows-($i-1))>=0) {
												if(isset($extension[$this->history[$rows-($i-1)]->date])) {
													echo ($extension[$this->history[$rows-$i]->date])-($extension[$this->history[$rows-($i-1)]->date]);
												} else {
													echo $extension[$this->history[$rows-$i]->date];
												}
											} else {
												echo $extension[$this->history[$rows-$i]->date];
											}
										} else {
											echo 0;
										}
									} else {
										echo 0;
									}
									?>
								</td>
							<?php } 
						$j++;
						} ?>
					</tr>
				<?php  } ?>
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
