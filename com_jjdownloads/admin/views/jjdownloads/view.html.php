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
		JHtml::_('script', 'com_jjdownloads/visualize.jQuery.js', false, true);
		JHtml::_('stylesheet', 'com_jjdownloads/jjdownloads.css', array(), true);
		JHtml::_('stylesheet', 'com_jjdownloads/visualize.css', array(), true);

		$browser = JBrowser::getInstance();
		$browserType = $browser->getBrowser();

		if ($browserType == 'msie')
		{
			JHtml::_('script', 'com_jjdownloads/excanvas.js', false, true);
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
