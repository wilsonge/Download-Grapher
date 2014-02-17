<?php
/**
 * @package    JoomJunk_Downloads
 * @copyright  (C) 2012 JoomJunk. All rights reserved.
 * @license    http://www.gnu.org/licenses/gpl-3.0.html
 **/
defined('_JEXEC') or die('Direct Access.');

// import Joomla controller library
jimport('joomla.application.component.controller');

class jjdownloadsController extends JControllerLegacy
{

	public function display($cachable = false, $urlparams = false)
	{
		// Set default view if not set
		$input = JFactory::getApplication()->input;
		$input->set('view', $input->getCmd('view', 'jjdownloads'));

		JSubMenuHelper::addEntry(
			JText::_('COM_JJ_DOWNLOADS_LAST') . ' ' .
			$weeks = JComponentHelper::getParams('com_jjdownloads')->get('weeks', 5) . ' ' . JText::_('COM_JJ_DOWNLOADS_WEEKS'),
			'index.php?option=com_jjdownloads&view=jjdownloads'
		);

		JSubMenuHelper::addEntry(JText::_('COM_JJ_DOWNLOADS_TOTALS'), 'index.php?option=com_jjdownloads&amp;view=totaldownloads');
		parent::display($cachable, $urlparams);
	}
}
