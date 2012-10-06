<?php
/**
 * @copyright (C) 2012 JoomJunk. All rights reserved.
 * @package    JoomJunk Downloads
 * @license    http://www.gnu.org/licenses/gpl-3.0.html
 **/

defined('_JEXEC') or die();

jimport('joomla.application.component.view');
require_once JPATH_COMPONENT . DS . 'helper.php';

class jjdownloadsViewjjdownloads extends JView
{
	function display($tpl = null)
	{
		$document =& JFactory::getDocument();
		$document->addScript("http://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js");
		$document->addScript("components/com_jjdownloads/assets/js/visualize.jQuery.js");
		JHTML::stylesheet('jjdownloads.css', 'administrator/components/com_jjdownloads/assets/css/');
		JHTML::stylesheet('visualize.css', 'administrator/components/com_jjdownloads/assets/css/');
		JHTML::script('administrator/components/com_jjdownloads/assets/excanvas.js', false, false, false, 'mie');
		JToolBarHelper::title( JText::_( 'COM_JJ_DOWNLOADS_CPANEL' ), 'cpanel' );
		parent::display($tpl);
	}
}
?>