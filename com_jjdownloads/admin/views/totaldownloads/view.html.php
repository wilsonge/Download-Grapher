<?php
/**
 * @package    JoomJunk_Downloads
 * @copyright  (C) 2012 JoomJunk. All rights reserved.
 * @license    http://www.gnu.org/licenses/gpl-3.0.html
 **/

defined('_JEXEC') or die();

jimport('joomla.environment.browser');

class jjdownloadsViewtotaldownloads extends JViewLegacy
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
			JHtml::_('script', JUri::root() . 'administrator/components/com_jjdownloads/assets/js/excanvas.js');
		}

		$extensions	= $this->get('Extensions');
		$this->assignRef('extensions',	$extensions);
		JToolBarHelper::title(JText::_('COM_JJ_DOWNLOADS_DOWNLOADS'), 'cpanel');
		JToolBarHelper::preferences('com_jjdownloads');
		parent::display($tpl);
	}
}
