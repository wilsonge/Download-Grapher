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
	 * The database object
	 *
	 * @var    JDatabase
	 * @since  2.0
	 */
	protected $db = null;

	/**
	 * Constructor
	 *
	 * @param   array  $config  A named configuration array for object construction.<br/>
	 *                          name: the name (optional) of the view (defaults to the view class name suffix).<br/>
	 *                          charset: the character set to use for display<br/>
	 *                          escape: the name (optional) of the function to use for escaping strings<br/>
	 *                          base_path: the parent path (optional) of the views directory (defaults to the component folder)<br/>
	 *                          template_plath: the path (optional) of the layout directory (defaults to base_path + /views/ + view name<br/>
	 *                          helper_path: the path (optional) of the helper files (defaults to base_path + /helpers/)<br/>
	 *                          layout: the layout (optional) to use to display the view<br/>
	 *                          db: the database object<br/>
	 *
	 * @since   2.0
	 */
	public function __construct($config = array())
	{
		if (array_key_exists('name', $config))
		{
			$this->db = $config['db'];
		}
		else
		{
			$this->db = JFactory::getDbo();
		}		
		
		parent::__construct($config);
	}

	/**
	 * Builds the query to the database
	 *
	 * @since 1.0
	 * @return  JDatabaseQuery
	 */
	private function _buildQuery()
	{
		$query = $this->db->getQuery(true);
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
		$query = $this->db->getQuery(true);
		$query->select('*')
			->from($query->quoteName('#__jjdownloads'))
			->where($query->quoteName('id') . ' = ' . (int) $number);
		$this->db->setQuery($query);
		$row = $this->db->loadRow();

		return $row[3];
	}
}
