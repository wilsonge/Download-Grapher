<?php
/**
 * @copyright (C) 2012 JoomJunk. All rights reserved.
 * @package    JoomJunk Downloads
 * @license    http://www.gnu.org/licenses/gpl-3.0.html
 **/
defined( '_JEXEC' ) or die( 'Direct Access.' );

jimport('joomla.application.component.controller');

class jjdownloadsHelper
{

	function quickIconButton( $link, $image, $text , $target = "") {

		$lang	= &JFactory::getLanguage();
		$button = '';
		if ($lang->isRTL()) {
			$button .= '<div style="float:right;">';
		} else {
			$button .= '<div style="float:left;">';
		}
		if ($target) {
			$button .=	'<div class="icon">'
				.'<a href="'.$link.'" target="' . $target . '">'
				.JHTML::_('image.site',  $image, '/components/com_jjdownloads/assets/', NULL, NULL, $text )
				.'<span>'.$text.'</span></a>'
				.'</div>';
			$button .= '</div>';
		}
		else {
			$button .=	'<div class="icon">'
				.'<a href="'.$link.'">'
				.JHTML::_('image.site',  $image, '/components/com_jjdownloads/assets/', NULL, NULL, $text )
				.'<span>'.$text.'</span></a>'
				.'</div>';
			$button .= '</div>';
		}

		return $button;
	}

}