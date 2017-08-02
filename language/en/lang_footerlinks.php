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
	'ACL_A_FOOTERLINKS' 				=> 'Can manage Footerlinks adjustment',
	'ACP_FOOTERLINKS_TITLE'				=> 'Footerlinks',
	'ACP_FOOTERLINKS_CONFIG'			=> 'Configuration',
	'ACP_FL_MOD'						=> 'Footerlinks',
	'FL_VIEW'							=> 'Overview Footerlinks',
	'FL_BVIEW'							=> 'Display',
	'FL_BCOMMENT'						=> 'To configure click on a block. An empty field will not be displayed. <br /> The blocks are sorted from left to right and centered from the middle.',
	'FL_ENABLE'							=> 'Activate Footerlinks',
	'FL_EXT_LINK'						=> 'Open links in separate windows',
	'FL_ENABLE_B1'						=> 'Block 1:',
	'FL_ENABLE_B2'						=> 'Block 2:',
	'FL_ENABLE_B3'						=> 'Block 3:',
	'FL_CAT_TITEL'						=> 'Title',
	'FL_URL'							=> 'URL',
	'FL_URL_TEXT'						=> 'Link Description',
	'FL_MORE_LINKS'						=> 'add Link',
	'LOG_FL_SAVE'						=> 'Settings Footerlink Mod changed' ,
	'FL_SAVED'							=> 'Settings saved',
));
