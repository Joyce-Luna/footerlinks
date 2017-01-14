<?php

/**
*
* @package phpBB Extension - Footerlinks
* @copyright (c) 2016 joyceluna (https://phpbb-style-design.de)
* @license http://opensource.org/licenses/gpl-2.0.php GNU General Public License v2
* @ver 1.3.1
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
		global $db, $user, $template, $request, $phpbb_log, $config, $phpbb_container, $cache;

$this->cache = $cache;
		$this->tpl_name 	= 'acp_footerlinks';
		$this->page_title 	= $user->lang['ACP_FOOTERLINKS_TITLE'];
		$this->request 		= $request;
		$this->log 			= $phpbb_log;
		$footerlinks_table = $phpbb_container->getParameter('tables.footerlinks_table');

		add_form_key('footerlinks/acp_footerlinks');

		$sql = 'SELECT *
		FROM '. $footerlinks_table;
		$result = $db->sql_query($sql);

		while ($row = $db->sql_fetchrow($result))
		{
			if (!empty($row['fl_link1']))
			{
				$template->assign_block_vars('fl_links1', array(
					'FL_LINK1'		=> $row['fl_link1'],
					'FL_LINK_TEXT1'	=> $row['fl_link_text1'],
				));
			};

			if (!empty($row['fl_link2']))
			{
				$template->assign_block_vars('fl_links2', array(
					'FL_LINK2'		=> $row['fl_link2'],
					'FL_LINK_TEXT2'	=> $row['fl_link_text2'],
				));
			};

			if (!empty($row['fl_link3']))
			{
				$template->assign_block_vars('fl_links3', array(
					'FL_LINK3'		=> $row['fl_link3'],
					'FL_LINK_TEXT3'	=> $row['fl_link_text3'],
				));
			}
		};

		if (empty($row['fl_link1']))
		{
			$template->assign_block_vars('fl_links1', array(
				'FL_LINK1' => '',
			));
		};
		if (empty($row['fl_link2']))
		{
			$template->assign_block_vars('fl_links2', array(
				'FL_LINK2' => '',
			));
		};
		if (empty($row['fl_link3']))
		{
			$template->assign_block_vars('fl_links3', array(
				'FL_LINK3' => '',
			));
		};

		$submit = $request->is_set_post('submit');
		if ($submit)
		{
			if (!check_form_key('footerlinks/acp_footerlinks'))
			{
				trigger_error('FORM_INVALID');
			}

			function parseurl($fl_url)
			{
				if (!preg_match("@^[hf]tt?ps?://@", $fl_url))
				{
					$fl_url = "http://" . $fl_url;
				}
				return $fl_url;
			}

			$sql = 'DELETE FROM ' . $footerlinks_table ;
			$db->sql_query($sql);

			$sql = 'ALTER TABLE ' . $footerlinks_table . ' AUTO_INCREMENT = 1' ;
			$db->sql_query($sql);

			$sql_arr_id = array(
				'footerlinks_id' => '1',
			);
			$sql = 'INSERT INTO ' . $footerlinks_table . ' ' . $db->sql_build_array('INSERT', $sql_arr_id);
			$db->sql_query($sql);

			$fl_link1 		= $this->request->variable('fl_link1', array('' => ''),true);
			$fl_link_text1 	= $this->request->variable('fl_link_text1', array('' => ''),true);
			$fl_link1		= array_merge( array_filter($fl_link1));

			$i = 0;
			while ($i < count($fl_link1))
			{
				$fl_link1[$i] = parseurl($fl_link1[$i]);

				$sql_ary1 = array(
				'fl_link1' 		=> $fl_link1[$i],
				'fl_link_text1' => $fl_link_text1[$i],
				);
				$db->sql_query('INSERT INTO ' . $footerlinks_table . ' ' . $db->sql_build_array('INSERT', $sql_ary1));
				$i++;
			}

			$fl_link2 		= $this->request->variable('fl_link2', array('' => ''),true);
			$fl_link_text2 	= $this->request->variable('fl_link_text2', array('' => ''),true);
			$fl_link2		= array_merge( array_filter($fl_link2));

			$i = 0;
			while ($i < count($fl_link2))
			{
				$fl_link2[$i] = parseurl($fl_link2[$i]);

				$sql_ary2 = array(
				'fl_link2' 		=> $fl_link2[$i],
				'fl_link_text2'	=> $fl_link_text2[$i],
				);
				$db->sql_query('INSERT INTO ' . $footerlinks_table . ' ' . $db->sql_build_array('INSERT', $sql_ary2));
				$i++;
			}
			
			$fl_link3 		= $this->request->variable('fl_link3', array('' => ''),true);
			$fl_link_text3 	= $this->request->variable('fl_link_text3', array('' => ''),true);
			$fl_link3		= array_merge( array_filter($fl_link3));

			$i = 0;
			while ($i < count($fl_link3) && (!empty($fl_link3[$i])))
			{
				$fl_link3[$i] = parseurl($fl_link3[$i]);

				$sql_ary3 = array(
				'fl_link3' 		=> $fl_link3[$i],
				'fl_link_text3'	=> $fl_link_text3[$i],
				);
				$db->sql_query('INSERT INTO ' . $footerlinks_table . ' ' . $db->sql_build_array('INSERT', $sql_ary3));
				$i++;
			}

			$fl_enable_b1 = (($this->request->variable('fl_enable_b1', '') && $fl_link1)) ? true : false;
			$fl_enable_b2 = (($this->request->variable('fl_enable_b2', '') && $fl_link2)) ? true : false;
			$fl_enable_b3 = (($this->request->variable('fl_enable_b3', '') && $fl_link3)) ? true : false;

			$sql_ary_block= array(
				'fl_enable' 	=> $this->request->variable('fl_enable', ''),
				'fl_ext_link' 	=> $this->request->variable('fl_ext_link', ''),
				'fl_enable_b1'	=> $fl_enable_b1,
				'fl_enable_b2'	=> $fl_enable_b2,
				'fl_enable_b3'	=> $fl_enable_b3,
				'fl_title_cat1'	=> $this->request->variable('fl_title_cat1', '',true),
				'fl_title_cat2'	=> $this->request->variable('fl_title_cat2', '',true),
				'fl_title_cat3'	=> $this->request->variable('fl_title_cat3', '',true),
			);

			$db->sql_query('UPDATE ' . $footerlinks_table . '
				SET ' . $db->sql_build_array('UPDATE', $sql_ary_block) . "
				WHERE footerlinks_id =  1"
			);

			$cache->destroy('sql', $footerlinks_table);

			$user_id = $user->data['user_id'];
			$user_ip = $user->ip;

			$phpbb_log->add('admin', $user_id, $user_ip, 'LOG_FL_SAVE');
			trigger_error($user->lang['FL_SAVED'] . adm_back_link($this->u_action));
		}

		$sql = 'SELECT *
		FROM '. $footerlinks_table;
		$result = $db->sql_query($sql);
		$fl_data = $db->sql_fetchrow($result);

		$template->assign_vars(array(
			'FL_VERSION'	=> $config['footerlinks_version'],
			'FL_ENABLE'		=> $fl_data['fl_enable'],
			'FL_EXT_LINK'	=> $fl_data['fl_ext_link'],
			'FL_ENABLE_B1'	=> $fl_data['fl_enable_b1'],
			'FL_ENABLE_B2'	=> $fl_data['fl_enable_b2'],
			'FL_ENABLE_B3'	=> $fl_data['fl_enable_b3'],
			'FL_TITLE_CAT1'	=> $fl_data['fl_title_cat1'],
			'FL_TITLE_CAT2'	=> $fl_data['fl_title_cat2'],
			'FL_TITLE_CAT3' => $fl_data['fl_title_cat3'],
		));
	}
}
