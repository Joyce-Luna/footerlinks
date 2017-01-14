<?php

/**
*
* @package phpBB Extension - Footerlinks
* @copyright (c) 2016 joyceluna (https://phpbb-style-design.de)
* @license http://opensource.org/licenses/gpl-2.0.php GNU General Public License v2
*
*/

/**
* @ignore
*/

/**
* @package module_install
*/

namespace joyceluna\footerlinks\acp;

class main_info
{
	function module()
	{
		return array(
			'filename'	=> '\joyceluna\footerlinks\acp\main_module',
			'title'		=> 'ACP_FOOTERLINKS_TITLE',
			'version'	=> 'footerlinks_version',
			'modes'		=> array(
				'settings'	=> array(
					'title' 	=> 'ACP_FOOTERLINKS_CONFIG',
					'auth' 		=> 'joyceluna/footerlinks && acl_a_board',
					'cat'		=> array('ACP_FOOTERLINKS_CONFIG')),
				),
		);
	}
}
