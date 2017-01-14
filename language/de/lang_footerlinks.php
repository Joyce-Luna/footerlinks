<?php
/**
*
* @package phpBB Extension - Footerlinks
* @copyright (c) 2016 joyceluna (https://phpbb-style-design.de)
* @license http://opensource.org/licenses/gpl-2.0.php GNU General Public License v2
*
*/

if (!defined('IN_PHPBB'))
{
	exit;
}

if (empty($lang) || !is_array($lang))
{
	$lang = array();
}
// DEVELOPERS PLEASE NOTE
//
// All language files should use UTF-8 as their encoding and the files must not contain a BOM.
//
// Placeholders can now contain order information, e.g. instead of
// 'Page %s of %s' you can (and should) write 'Page %1$s of %2$s', this allows
// translators to re-order the output of data while ensuring it remains correct
//
// You do not need this where single placeholders are used, e.g. 'Message %d' is fine
// equally where a string contains only two placeholders which are used to wrap text
// in a url you again do not need to specify an order e.g., 'Click %sHERE%s' is fine
//
// Some characters you may want to copy&paste:
// ’ » “ ” …
//
$lang = array_merge($lang, array(
	'ACL_A_FOOTERLINKS' 				=> 'Kann Mod Footerlinks ändern',
	'ACP_FOOTERLINKS_TITLE'				=> 'Footerlinks',
	'ACP_FOOTERLINKS_CONFIG'			=> 'Einstellungen',
	'ACP_FL_MOD'						=> 'Footerlinks',
	'FL_VIEW'							=> 'Footerlinks Übersicht',
	'FL_BVIEW'							=> 'Anzeige',
	'FL_BCOMMENT'						=> 'Zum Konfigurieren auf jeweiligen Block klicken.<br>Die Blöcke werden aus der Mitte heraus und in Reihenfolge zentriert.<br>Ein leeres Feld wird nicht anzeigt.',
	'FL_ENABLE'							=> 'Footerlinks aktivieren',
	'FL_EXT_LINK'						=> 'Externe Links in separaten Fenster öffnen',
	'FL_ENABLE_B1'						=> 'Block 1:',
	'FL_ENABLE_B2'						=> 'Block 2:',
	'FL_ENABLE_B3'						=> 'Block 3:',
	'FL_CAT_TITEL'						=> 'Titel',
	'FL_URL'							=> 'URL',
	'FL_URL_TEXT'						=> 'Link Beschreibung',
	'FL_MORE_LINKS'						=> 'weiterer Link',
	'LOG_FL_SAVE'						=> 'Footerlink Einstellung geändert',
	'FL_SAVED'							=> 'Einstellungen gespeichert',
));
