<?php 
/**
 * @package    JoomJunk_Downloads
 * @copyright  (C) 2012 JoomJunk. All rights reserved.
 * @license    http://www.gnu.org/licenses/gpl-3.0.html
 **/

defined('_JEXEC') or die('Restricted access'); 

class jjdownloadsModeljjdownloads extends JModelLegacy
{
	var $_data;
	
	/**
	 * Builds the query to the database
	 *
	 * @since 1.0
	 * @return  JDatabaseQuery
	 */
	private function _buildQuery()
	{
		$query = $this->getDbo()->getQuery(true);
		$query->select('*')
			->from($query->quoteName('#__jjdownloads_history'))
			->order($query->quoteName('id'));

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

	/**
	 * Builds the query to the database
	 *
	 * @since 1.0
	 * @return  JDatabaseQuery
	 */
	public function Name($number)
	{
		$query = $this->getDbo()->getQuery(true);
		$query->select('*')
			->from($query->quoteName('#__jjdownloads'))
			->where($query->quoteName('id') . ' = ' . (int) $number);
		$this->getDbo()->setQuery($query);
		$row = $this->getDbo()->loadRow();

		return $row[3];
	}
}
