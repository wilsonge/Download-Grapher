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
// We are a valid entry point.
define('_JEXEC', 1);

error_reporting(E_ALL | E_NOTICE);
ini_set('display_errors', 1);

if (!defined('_JDEFINES'))
{
	define('JPATH_BASE', dirname(__DIR__) . '/..');
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
 * @package  JoomJunk_Downloads
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
		JLog::addLogger(
			array(
				'text_file' => 'cli_jjdownloads.php'
			),
			JLog::ALL,
			'jjdownloads'
		);
		JLog::add('Starting Update', JLog::INFO, 'jjdownloads');

		// Get the latest Download counts from the database
		$database = JFactory::getDbo();
		$query = $database->getQuery(true);
		$query->select('*')
			->from($database->quoteName('#__jjdownloads'));
		$database->setQuery($query);
		JLog::add('Retrieving data from the jjdownloads table', JLog::INFO, 'jjdownloads');

		try
		{
			$result = $database->loadRowList();
		}
		catch (Exception $e)
		{
			JLog::add('Error getting latest downloads from the database. Error' . $e->getMessage(), JLog::ERROR, 'jjdownloads');

			return;
		}

		$downloads = '';

		foreach ($result as $extension)
		{
			$downloads .= $extension[0] . ':' . $extension[2] . ',';
		}

		// Insert values and their respective columns.
		$columns = array('date', 'downloads');
		$values = array(date('Y-m-d'), $database->quote($downloads));

		// Prepare the insert query.
		$query = $database->getQuery(true);
		$query
			->insert($database->quoteName('#__jjdownloads_history'))
			->columns($database->quoteName($columns))
			->values(implode(',', $values));

		// Set the query using our newly populated query object and execute it.
		$database->setQuery($query);

		JLog::add('Uploading data into the jjdownloads history table', JLog::INFO, 'jjdownloads');

		try
		{
			$database->execute();
		}
		catch (Exception $e)
		{
			JLog::add('Error storing data into the database. Error' . $e->getMessage(), JLog::ERROR, 'jjdownloads');

			return;
		}

		JLog::add('Finished uploading latest values', JLog::INFO, 'jjdownloads');
	}
}

JApplicationCli::getInstance('Jjdownloadupdate')->execute();
