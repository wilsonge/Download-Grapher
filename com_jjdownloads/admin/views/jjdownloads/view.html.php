<?php
/**
 * @copyright (C) 2012 JoomJunk. All rights reserved.
 * @package    JoomJunk Downloads
 * @license    http://www.gnu.org/licenses/gpl-3.0.html
 **/

defined('_JEXEC') or die();

jimport('joomla.application.component.view');
jimport('joomla.environment.browser');

class jjdownloadsViewjjdownloads extends JView
{
	function display($tpl = null)
	{
		$document =& JFactory::getDocument();
		$document->addScript("http://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js");
		$document->addScript("components/com_jjdownloads/assets/js/visualize.jQuery.js");
		JHTML::stylesheet('jjdownloads.css', 'administrator/components/com_jjdownloads/assets/css/');
		JHTML::stylesheet('visualize.css', 'administrator/components/com_jjdownloads/assets/css/');
				
        $doc =& JFactory::getDocument();
        $browser = &JBrowser::getInstance();
        $browserType = $browser->getBrowser();
        if($browserType == 'msie')
        {
           $doc->addScript( 'components/com_jjdownloads/assets/js/excanvas.js' );
        }


		JToolBarHelper::title( JText::_( 'COM_JJ_DOWNLOADS_CPANEL' ), 'cpanel' );
		parent::display($tpl);
	}
}
?>