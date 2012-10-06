<?php
/**
 * @copyright (C) 2012 JoomJunk. All rights reserved.
 * @package    JoomJunk Downloads
 * @license    http://www.gnu.org/licenses/gpl-3.0.html
 **/
defined( '_JEXEC' ) or die( 'Direct Access.' );

jimport('joomla.application.component.controller');

class jjdownloadsController extends JController
{

function display( )
	{
		JSubMenuHelper::addEntry(JText::_('COM_JJ_DOWNLOADS_CPANEL'), 'index.php?option=com_jjdownloads&view=jjdownloads');
		JSubMenuHelper::addEntry(JText::_('COM_JJ_DOWNLOADS_TOTALS'), 'index.php?option=com_jjdownloads&amp;view=totaldownloads');
		parent::display();
	}
}