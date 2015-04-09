<?php 
/**
 * @package    JoomJunk_Downloads
 * @copyright  (C) 2012 JoomJunk. All rights reserved.
 * @license    http://www.gnu.org/licenses/gpl-3.0.html
 **/

defined('_JEXEC') or die('Restricted access'); 
 
class jjdownloadsModeltotaldownloads extends JModelLegacy
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
			->from($query->quoteName('#__jjdownloads'));

		return $query;
	}

	public function getExtensions()
	{
		// Lets load the data if it doesn't already exist
		if (empty( $this->_data ))
		{
			$query = $this->_buildQuery();
			$this->_data = $this->_getList($query);
		}

		return $this->_data;
	}
}
