<?php
/**
 * @package    JoomJunk_Downloads
 * @copyright  (C) 2012 JoomJunk. All rights reserved.
 * @license    http://www.gnu.org/licenses/gpl-3.0.html
 **/

// No direct access to this file
defined('_JEXEC') or die('Restricted access');
 
class com_jjdownloadsInstallerScript
{
	public function preflight( $type, $parent )
	{
		// Module manifest file version
		$this->release = $parent->get("manifest")->version;

			// Abort if the module being installed is not newer than the currently installed version
			if ($type == 'Update')
			{
				$oldRelease = $this->getParam('version');
				$rel = $oldRelease . JText::_('COM_JJ_DOWNLOADS_VERSION_TO') . $this->release;

				if (version_compare($this->release, $oldRelease, 'le'))
				{
					JFactory::getApplication()->enqueueMessage(JText::_('COM_JJ_DOWNLOADS_INCORRECT_SEQUENCE') . $rel);

					return false;
				}
			}
	}

	public function install($parent)
	{
		// Installing component manifest file version
		$this->release = $parent->get("manifest")->version;

		$lang = JFactory::getLanguage();
		$lang->load('com_jjdownloads', JPATH_ADMINISTRATOR);
		echo '<table width="100%">
			<tr>
				<td width="4%">
					<img src="components/com_jjdownloads/assets/images/jj_logo.png" height="48px" width="48px">
				</td>
				<td width="76%">
					<h2>' . JText::_("JJ Downloads") . ' ' . $this->release . '</h2>
				</td>
			</tr>
			<tr>
				<td width="50%"><p>' . JText::_("COM_JJ_DOWNLOADS_DESC") . '</p></td>
				<td width="50%" style="background:#F2F2F2;padding:10px;"><p>' . JText::_("COM_JJ_DOWNLOADS_RIGHT") . '</p></td>
			</tr>
		</table>';

		return true;
	}

	public function update($parent)
	{
		// Installing component manifest file version
		$this->release = $parent->get("manifest")->version;

		$lang = JFactory::getLanguage();
		$lang->load('com_jjdownloads', JPATH_ADMINISTRATOR);
		echo '<table width="100%">
			<tr>
				<td width="4%">
					<img src="components/com_jjdownloads/assets/images/jj_logo.png" height="48px" width="48px">
				</td>
				<td width="76%">
					<h2>' . JText::_("JJ Downloads") . ' ' . $this->release . '</h2>
				</td>
			</tr>
			<tr>
				<td width="50%"><p>' . JText::_("COM_JJ_DOWNLOADS_DESC") . '</p></td>
				<td width="50%" style="background:#F2F2F2;padding:10px;"><p>' . JText::_("COM_JJ_DOWNLOADS_RIGHT") . '</p></td>
			</tr>
		</table>';

		return true;
	}
}
?>
