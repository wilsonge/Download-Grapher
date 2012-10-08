<?php 
/**
 * @copyright (C) 2012 JoomJunk. All rights reserved.
 * @package    JoomJunk Downloads
 * @license    http://www.gnu.org/licenses/gpl-3.0.html
 **/

defined('_JEXEC') or die('Restricted access'); 

$rows=count($this->history);

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
					<th scope="row"><?php echo JText::_('COM_JJ_DOWNLOADS_WEEK') . date("j/n/y", strtotime(($this->history[$rows-1]->date))); ?></th>
					<th scope="row"><?php echo JText::_('COM_JJ_DOWNLOADS_WEEK') . date("j/n/y", strtotime(($this->history[$rows-2]->date))); ?></th>
					<th scope="row"><?php echo JText::_('COM_JJ_DOWNLOADS_WEEK') . date("j/n/y", strtotime(($this->history[$rows-3]->date))); ?></th>
					<th scope="row"><?php echo JText::_('COM_JJ_DOWNLOADS_WEEK') . date("j/n/y", strtotime(($this->history[$rows-4]->date))); ?></th>
					<th scope="row"><?php echo JText::_('COM_JJ_DOWNLOADS_WEEK') . date("j/n/y", strtotime(($this->history[$rows-5]->date))); ?></th>
				</tr>
			</thead>
			<tbody>
				<?php
				$model = $this->getModel('jjdownloads');
				foreach($array as $extension)  { 
				?>
				<tr>
					<th scope="col"><?php if(isset($extension['name'])) { echo $model->Name( $extension['name'] ); } else { echo 'Unknown'; }?></th>
					<td>
					<?php
						if(($rows-5)>=0) {
							if(isset($extension[$this->history[$rows-5]->date])) {
								if(($rows-6)>=0) {
									if(isset($extension[$this->history[$rows-6]->date])) {
										echo ($extension[$this->history[$rows-6]->date])-($extension[$this->history[$rows-5]->date]);
									} else {
										echo $extension[$this->history[$rows-5]->date];
									}
								} else {
									echo $extension[$this->history[$rows-5]->date];
								}
							} else {
								echo 0;
							}
						} else {
							echo 0;
						}
					?>
					</td>
					<td>
					<?php
						if(($rows-4)>=0) {
							if(isset($extension[$this->history[$rows-4]->date])) {
								if(($rows-5)>=0) {
									if(isset($extension[$this->history[$rows-5]->date])) {
										echo ($extension[$this->history[$rows-5]->date])-($extension[$this->history[$rows-4]->date]);
									} else {
										echo $extension[$this->history[$rows-4]->date];
									}
								} else {
									echo $extension[$this->history[$rows-4]->date];
								}
							} else {
								echo 0;
							}
						} else {
							echo 0;
						}
					?>
					</td>
					<td>
					<?php
						if(($rows-3)>=0) {
							if(isset($extension[$this->history[$rows-3]->date])) {
								if(($rows-4)>=0) {
									if(isset($extension[$this->history[$rows-4]->date])) {
										echo ($extension[$this->history[$rows-4]->date])-($extension[$this->history[$rows-3]->date]);
									} else {
										echo $extension[$this->history[$rows-3]->date];
									}
								} else {
									echo $extension[$this->history[$rows-3]->date];
								}
							} else {
								echo 0;
							}
						} else {
							echo 0;
						}
					?>
					</td>
					<td>
					<?php
						if(($rows-2)>=0) {
							if(isset($extension[$this->history[$rows-2]->date])) {
								if(($rows-3)>=0) {
									if(isset($extension[$this->history[$rows-3]->date])) {
										echo ($extension[$this->history[$rows-3]->date])-($extension[$this->history[$rows-2]->date]);
									} else {
										echo $extension[$this->history[$rows-2]->date];
									}
								} else {
									echo $extension[$this->history[$rows-2]->date];
								}
							} else {
								echo 0;
							}
						} else {
							echo 0;
						}
					?>
					</td>
					<td>
					<?php
						if(($rows-1)>=0) {
							if(isset($extension[$this->history[$rows-1]->date])) {
								if(($rows-2)>=0) {
									if(isset($extension[$this->history[$rows-2]->date])) {
										echo ($extension[$this->history[$rows-2]->date])-($extension[$this->history[$rows-1]->date]);
									} else {
										echo $extension[$this->history[$rows-1]->date];
									}
								} else {
									echo $extension[$this->history[$rows-1]->date];
								}
							} else {
								echo 0;
							}
						} else {
							echo 0;
						}
					?>
					</td>
				</tr>
				<?php } ?>
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
