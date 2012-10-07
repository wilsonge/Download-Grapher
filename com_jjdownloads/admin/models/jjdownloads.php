<?php 
/**
 * @copyright (C) 2012 JoomJunk. All rights reserved.
 * @package    JoomJunk Downloads
 * @license    http://www.gnu.org/licenses/gpl-3.0.html
 **/

defined('_JEXEC') or die('Restricted access'); 
 
jimport( 'joomla.application.component.model' );

class jjdownloadsModeljjdownloads extends JModel
{
    var $_data;
 
    function _buildQuery()
    {
        $query = ' SELECT * '
            . ' FROM #__jjdownloads_history '
        ;
        return $query;
    }
 
    function getHistory()
    {
        // Lets load the data if it doesn't already exist
        if (empty( $this->_data ))
        {
            $query = $this->_buildQuery();
            $this->_data = $this->_getList( $query );
        }
 
        return $this->_data;
    }
	
	function Name($number) {
		$db =& JFactory::getDBO();
        $query = ' SELECT * '
            . ' FROM #__jjdownloads WHERE id="'.$number.'"'
        ;
		$db->setQuery($query);
		$row = $db->loadRow();
		return $row[3];
	}
}
