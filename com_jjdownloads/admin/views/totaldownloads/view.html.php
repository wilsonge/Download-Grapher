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
		JHtml::_('script', JUri::root() . 'administrator/components/com_jjdownloads/assets/js/visualize.jQuery.js');
		//JHtml::_('stylesheet', JUri:root() . 'administrator/components/com_jjdownloads/assets/css/jjdownloads.css');
		JHtml::_('stylesheet', JUri::root() . 'administrator/components/com_jjdownloads/assets/css/visualize.css');

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
