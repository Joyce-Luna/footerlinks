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

namespace joyceluna\footerlinks\controller;

if (!defined('IN_PHPBB'))
{
	exit;
}

global $phpbb_root_path, $phpEx, $db, $auth, $user, $template, $table_prefix;

$footerlinks_table = $table_prefix . 'footerlinks';

$sql = 'SELECT fl_enable,fl_ext_link,fl_enable_b1,fl_enable_b2,fl_enable_b3,fl_title_cat1,fl_title_cat2,fl_title_cat3
FROM '. $footerlinks_table . '
WHERE footerlinks_id = "1"';

$result = $db->sql_query_limit($sql, 1);
$fl_data = $db->sql_fetchrow($result);
$db->sql_freeresult($result);

if ($fl_data['fl_enable'])
{
	$template->assign_vars(array(
		'FL_ENABLE'			=> $fl_data['fl_enable'],
		'FL_EXT_LINK'		=> $fl_data['fl_ext_link'],
		'FL_ENABLE_B1'		=> $fl_data['fl_enable_b1'],
		'FL_ENABLE_B2'		=> $fl_data['fl_enable_b2'],
		'FL_ENABLE_B3'		=> $fl_data['fl_enable_b3'],
		'FL_TITLE_CAT1'		=> $fl_data['fl_title_cat1'],
		'FL_TITLE_CAT2'		=> $fl_data['fl_title_cat2'],
		'FL_TITLE_CAT3'		=> $fl_data['fl_title_cat3'],
	));
	//Block 1
	if ($fl_data['fl_enable_b1'])
	{
		$sql = 'SELECT fl_title_cat1,fl_link1, fl_link_text1
		FROM '. $footerlinks_table;
		$result = $db->sql_query($sql);

		while ($row = $db->sql_fetchrow($result))
		{
			if (!empty($row['fl_link1']))
			{
				$template->assign_block_vars('fl_links1', array(
				'FL_LINK1'			=> $row['fl_link1'],
				'FL_LINK_TEXT1'		=> $row['fl_link_text1'],
				));
			};
		};
	}
	//Block 3
	if ($fl_data['fl_enable_b2'])
	{
		$sql = 'SELECT fl_title_cat2,fl_link2, fl_link_text2
		FROM '. $footerlinks_table;
		$result = $db->sql_query($sql);

		while (!empty($row = $db->sql_fetchrow($result)))
		{
			if (!empty($row['fl_link2']))
			{
				$template->assign_block_vars('fl_links2', array(
				'FL_LINK2'			=> $row['fl_link2'],
				'FL_LINK_TEXT2'		=> $row['fl_link_text2'],
				));
			};
		};
	}
	//Block 3
	if ($fl_data['fl_enable_b3'])
	{
		$sql = 'SELECT fl_title_cat3,fl_link3, fl_link_text3
		FROM '. $footerlinks_table;
		$result = $db->sql_query($sql);

		while ($row = $db->sql_fetchrow($result))
		{
			if (!empty($row['fl_link3']))
			{
				$template->assign_block_vars('fl_links3', array(
					'FL_LINK3'			=> $row['fl_link3'],
					'FL_LINK_TEXT3'		=> $row['fl_link_text3'],
				));
			}
		};
	}
}
