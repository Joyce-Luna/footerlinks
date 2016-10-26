<?php

/**
*
* @package phpBB Extension - Footerlinks
* @copyright (c) 2016 joyceluna (https://phpbb-style-design.de)
* @license http://opensource.org/licenses/gpl-2.0.php GNU General Public License v2
* @ver 1.0.0
*
*/

/**
* @ignore
*/
namespace joyceluna\footerlinks\acp;
/**
* @package acp
*/

class main_module
{
	var $u_action;

	function main($id, $mode)
	{
		global $db, $user, $auth, $template, $cache, $request; 
		global $config, $phpbb_root_path, $phpbb_admin_path, $phpEx;
		global $table_prefix, $phpEx;
		$this->request = $request;
		define('FOOTERLINKS_TABLE', $table_prefix . 'footerlinks');

		$this->tpl_name = 'acp_footerlinks';
		$this->page_title = $user->lang['ACP_FOOTERLINKS_TITLE'];
		$this->request = $request;
		add_form_key('footerlinks/acp_footerlinks');

		if (isset($_POST['submit']))
		{
			if (!check_form_key('footerlinks/acp_footerlinks'))
			{
				trigger_error('FORM_INVALID');
		}

		$sql_ary = array(
			'fl_enable' 		=> $this->request->variable('fl_enable', 0),
			'fl_enable_b1'		=> $this->request->variable('fl_enable_b1', 0),
			'fl_enable_b2'		=> $this->request->variable('fl_enable_b2', 0),
			'fl_enable_b3'		=> $this->request->variable('fl_enable_b3', 0),
			'fl_title_cat1'		=> utf8_normalize_nfc($this->request->variable('fl_title_cat1', '',true)),
			'fl_title_cat2'		=> utf8_normalize_nfc($this->request->variable('fl_title_cat2', '',true)),
			'fl_title_cat3'		=> utf8_normalize_nfc($this->request->variable('fl_title_cat3', '',true))
		);
	
		$db->sql_query('UPDATE ' . FOOTERLINKS_TABLE . '
			SET ' . $db->sql_build_array('UPDATE', $sql_ary)
		);
		
		add_log('admin', 'LOG_FL_SAVE', str_replace('%', '*', ''));	
		trigger_error($user->lang['LP_SAVED'] . adm_back_link($this->u_action));
	}

	$sql = 'SELECT *
	FROM ' . FOOTERLINKS_TABLE . '
	WHERE footerlinks_id = "1"';
	$result = $db->sql_query_limit($sql, 1);
	$fl_data = $db->sql_fetchrow($result);
	$db->sql_freeresult($result);

	$template->assign_vars(array(
		'FL_VERSION'		=> 'Version: ' . $config['footerlinks_version'],
		'FL_ENABLE'			=> $fl_data['fl_enable'],
		'FL_ENABLE_B1'		=> $fl_data['fl_enable_b1'],
		'FL_ENABLE_B2'		=> $fl_data['fl_enable_b2'],
		'FL_ENABLE_B3'		=> $fl_data['fl_enable_b3'],
		'FL_TITLE_CAT1'		=> $fl_data['fl_title_cat1'],
		'FL_TITLE_CAT2'		=> $fl_data['fl_title_cat2'],
		'FL_TITLE_CAT3'		=> $fl_data['fl_title_cat3'],
		));
	}	
}

?>