<?php 
/**
 * @package    JoomJunk_Downloads
 * @copyright  (C) 2012 JoomJunk. All rights reserved.
 * @license    http://www.gnu.org/licenses/gpl-3.0.html
 **/

defined('_JEXEC') or die('Restricted access'); 

jimport( 'joomla.application.component.model' );

class jjdownloadsModeljjdownloads extends JModel
{
	var $_data;

	private function _buildQuery()
	{
		$query = 'SELECT * FROM #__jjdownloads_history ORDER BY id';

		return $query;
	}

	public function getHistory()
	{
		// Lets load the data if it doesn't already exist
		if (empty( $this->_data ))
		{
			$query = $this->_buildQuery();
			$this->_data = $this->_getList($query);
		}

		return $this->_data;
	}

	public function Name($number)
	{
		$db = JFactory::getDBO();
		$query = 'SELECT * FROM #__jjdownloads WHERE id="' . $number . '"';
		$db->setQuery($query);
		$row = $db->loadRow();

		return $row[3];
	}
}
