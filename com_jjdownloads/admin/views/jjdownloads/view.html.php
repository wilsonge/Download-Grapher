<?php
/**
 * @package    JoomJunk_Downloads
 * @copyright  (C) 2012 JoomJunk. All rights reserved.
 * @license    http://www.gnu.org/licenses/gpl-3.0.html
 **/

defined('_JEXEC') or die();

jimport('joomla.environment.browser');

class jjdownloadsViewjjdownloads extends JViewLegacy
{
	public function display($tpl = null)
	{
		JHtml::_('jquery.framework');
		JHtml::_('script', JUri::root() . 'administrator/components/com_jjdownloads/assets/js/visualize.jQuery.js');
		JHtml::_('stylesheet', JUri:root() . 'administrator/components/com_jjdownloads/assets/css/jjdownloads.css');
		JHtml::_('stylesheet', JUri::root() . 'administrator/components/com_jjdownloads/assets/css/visualize.css');

		$browser = JBrowser::getInstance();
		$browserType = $browser->getBrowser();

		if ($browserType == 'msie')
		{
			JHtml::_('script', JUri::root() . 'administrator/components/com_jjdownloads/assets/js/excanvas.js');
		}
		
		$history = $this->get('History');
		$this->assignRef('history',	$history);
		JToolBarHelper::title(
			JText::_('COM_JJ_DOWNLOADS_LAST') . ' ' . $weeks = JComponentHelper::getParams('com_jjdownloads')->get('weeks', 5) .
			' ' . JText::_('COM_JJ_DOWNLOADS_WEEKS'), 'cpanel'
		);
		JToolBarHelper::preferences('com_jjdownloads');
		parent::display($tpl);
	}
}
