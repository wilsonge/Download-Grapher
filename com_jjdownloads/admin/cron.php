<html>
<head>
</head>
<body>
<?php
	// Init Joomla Framework
	define('_JEXEC', 1);
	define('DS', DIRECTORY_SEPARATOR);
	define('JPATH_BASE', realpath(dirname(__FILE__) . DS . '..' . DS . '..' . DS . '..'));

	require_once JPATH_BASE . DS . 'includes' . DS . 'defines.php';
	require_once JPATH_BASE . DS . 'includes' . DS . 'framework.php';

	$mainframe = JFactory::getApplication('site');

	// DBQuery
	$database = JFactory::getDBO();
	$query = "SELECT * FROM #__jjdownloads;";
	$database->setQuery($query);
	$result = $database->loadRowList();

	$query 	= "CREATE TABLE IF NOT EXISTS #__jjdownloads_history (
		`id` int(10) unsigned NOT NULL auto_increment,
		`date` DATE NOT NULL,
		`downloads` varchar(1000) NOT NULL,
		PRIMARY KEY  (`id`)
	) ; ";
	$database->setQuery($query);
	$database->query();

	$downloads = 0;

	foreach ($result as $extension)
	{
		$downloads .= $extension[0] . ':' . $extension[2] . ',';
	}

	$query = "INSERT INTO `#__jjdownloads_history` (`date`, `downloads`) VALUES
		('" . date('Y-m-d') . "', '" . $downloads . "');";
	$database->setQuery($query);
	$database->query();
?>
</body>
</html>