<?php
/**
 * @package    JoomJunk_Downloads
 *
 * @copyright  (C) 2012 JoomJunk. All rights reserved.
 * @license    http://www.gnu.org/licenses/gpl-3.0.html
 */

/**
 * This is a CRON script which should be called from the command-line, not the
 * web. For example something like:
 * /usr/bin/php /path/to/site/cli/update_cron.php
 */

// Set flag that this is a parent file.
const _JEXEC = 1;

error_reporting(E_ALL | E_NOTICE);
ini_set('display_errors', 1);

if (!defined('_JDEFINES'))
{
	define('JPATH_BASE', dirname(__DIR__));
}

// Load system defines
if (file_exists(dirname(__DIR__) . '/../includes/defines.php'))
{
	require_once dirname(__DIR__) . '/../includes/defines.php';
}

require_once JPATH_LIBRARIES . '/import.legacy.php';
require_once JPATH_LIBRARIES . '/cms.php';

// Load the configuration
require_once JPATH_CONFIGURATION . '/configuration.php';

/**
 * This script will fetch the update information for all extensions and store
 * them in the database, speeding up your administrator.
 *
 * @package  Joomla.Cli
 * @since    2.0
 */
class Jjdownloadupdate extends JApplicationCli
{
	/**
	 * Entry point for the script
	 *
	 * @return  void
	 *
	 * @since   2.0
	 */
	public function doExecute()
	{
		$this->out('Starting Update');
		// Get the latest Download counts from the database
		$database = JFactory::getDbo();
		$query = $database->getQuery(true);
		$query->select('*')
			->from($database->quoteName('#__jjdownloads'));
		$database->setQuery($query);

		$this->out('Retrieving data from the jjdownloads table');

		$result = $database->loadRowList();

		$query 	= "CREATE TABLE IF NOT EXISTS #__jjdownloads_history (
			`id` int(10) unsigned NOT NULL auto_increment,
			`date` DATE NOT NULL,
			`downloads` varchar(1000) NOT NULL,
			PRIMARY KEY  (`id`)
		);";
		$database->setQuery($query);
		$database->execute();

		$downloads = 0;

		foreach ($result as $extension)
		{
			$downloads .= $extension[0] . ':' . $extension[2] . ',';
		}

		// Create a new query object.
		$query = $database->getQuery(true);
		 
		// Insert columns.
		$columns = array('date', 'downloads');
		 
		// Insert values.
		$values = array(date('Y-m-d'), $database->quote($downloads));
		 
		// Prepare the insert query.
		$query
		    ->insert($database->quoteName('#__jjdownloads_history'))
		    ->columns($database->quoteName($columns))
		    ->values(implode(',', $values));
		 
		// Set the query using our newly populated query object and execute it.
		$database->setQuery($query);

		$this->out('Uploading data into the jjdownloads history table');

		$database->execute();

		$this->out('Finished uploading latest values');
	}
}

JApplicationCli::getInstance('Jjdownloadupdate')->execute();
