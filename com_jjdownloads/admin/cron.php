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

// We are a valid entry point.
const _JEXEC = 1;

// Load system defines
if (file_exists(dirname(__DIR__) . '/defines.php'))
{
	require_once dirname(__DIR__) . '/defines.php';
}

if (!defined('_JDEFINES'))
{
	define('JPATH_BASE', dirname(__DIR__));
	require_once JPATH_BASE . '/includes/defines.php';
}

// Get the framework.
require_once JPATH_LIBRARIES . '/import.legacy.php';

// Bootstrap the CMS libraries.
require_once JPATH_LIBRARIES . '/cms.php';

// Configure error reporting to maximum for CLI output.
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Load Library language
$lang = JFactory::getLanguage();

// Try the files_joomla file in the current language (without allowing the loading of the file in the default language)
$lang->load('files_joomla.sys', JPATH_SITE, null, false, false)
// Fallback to the files_joomla file in the default language
|| $lang->load('files_joomla.sys', JPATH_SITE, null, true);

/**
 * This script will fetch the download count for all extensions from the #__jjdownloads
 * database and store them in the #__jjdownloads_history table.
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
		$this->out('Starting Update');

		// Get the latest Download counts from the database
		$database = JFactory::getDbo();
		$query = $database->getQuery(true);
		$query->select('*')
			->from($database->quoteName('#__jjdownloads'));
		$database->setQuery($query);
		$this->out('Retrieving data from the jjdownloads table');

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

		$this->out('Uploading data into the jjdownloads history table');

		try
		{
			$database->execute();
		}
		catch (Exception $e)
		{
			JLog::add('Error storing data into the database. Error' . $e->getMessage(), JLog::ERROR, 'jjdownloads');

			return;
		}

		$this->out('Finished uploading latest values');
	}
}


$instance = JApplicationCli::getInstance('Jjdownloadupdate');

$instance->execute();
