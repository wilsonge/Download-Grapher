<?php
/**
 * @package    JoomJunk_Downloads
 * @copyright  (C) 2012 JoomJunk. All rights reserved.
 * @license    http://www.gnu.org/licenses/gpl-3.0.html
 **/

defined('_JEXEC') or die();

jimport('joomla.application.component.view');
jimport('joomla.environment.browser');

class jjdownloadsViewjjdownloads extends JView
{
	public function display($tpl = null)
	{
		$document =& JFactory::getDocument();
		$document->addScript("http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js");
		$document->addScript("components/com_jjdownloads/assets/js/visualize.jQuery.js");
		JHtml::stylesheet('jjdownloads.css', 'administrator/components/com_jjdownloads/assets/css/');
		JHtml::stylesheet('visualize.css', 'administrator/components/com_jjdownloads/assets/css/');

		$doc = JFactory::getDocument();
		$browser = JBrowser::getInstance();
		$browserType = $browser->getBrowser();

		if ($browserType == 'msie')
		{
			$doc->addScript('components/com_jjdownloads/assets/js/excanvas.js');
		}

		$history = & $this->get('History');
		$this->assignRef('history',	$history);
		JToolBarHelper::title( JText::_('COM_JJ_DOWNLOADS_LAST') . ' ' . $weeks = JComponentHelper::getParams('com_jjdownloads')->get('weeks', 5) . ' ' . JText::_('COM_JJ_DOWNLOADS_WEEKS'), 'cpanel');
		JToolBarHelper::preferences('com_jjdownloads');
		parent::display($tpl);
	}
}