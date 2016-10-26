<?php
/**
*
* @package phpBB Extension - Footerlinks
* @copyright (c) 2016 joyceluna (https://phpbb-style-design.de)
* @license http://opensource.org/licenses/gpl-2.0.php GNU General Public License v2
* @ver 1.3.1
*
*/
namespace joyceluna\footerlinks\event;

/**
* @ignore
*/
use Symfony\Component\EventDispatcher\EventSubscriberInterface;

/**
* Event listener
*/
class listener implements EventSubscriberInterface
{
	public static function getSubscribedEvents()
	{
		return array(
			'core.user_setup'			=> 'load_language_on_setup',
			'core.page_header'			=> 'footerlinks',
		);
	}

	/* @var \phpbb\controller\helper */
	protected $helper;

	/* @var \phpbb\template\template */
	protected $template;

	public function load_language_on_setup($event)
	{
		$lang_set_ext = $event['lang_set_ext'];
		$lang_set_ext[] = array(
			'ext_name' => 'joyceluna/footerlinks',
			'lang_set' => 'lang_footerlinks',
		);
		$event['lang_set_ext'] = $lang_set_ext;
	}

	public function page_header($event)
	{
		$this->user->add_lang_ext('joyceluna/footerlinks', 'lang_footerlinks');
	}

	public function footerlinks($event)
	{
		global $config, $db, $user, $auth, $template, $phpbb_root_path, $phpEx, $table_prefix;
	
		$footerlinks_table = $table_prefix . 'footerlinks';

		$sql = 'SELECT * 
		FROM '. $footerlinks_table;

		$result = $db->sql_query($sql);
		$fl_data = $db->sql_fetchrow($result);

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


			while ($row = $db->sql_fetchrow($result))
			{
				if ($fl_data['fl_enable_b1'])
				{
					if (!empty($row['fl_link1']))
					{
						$template->assign_block_vars('fl_links1', array(
						'FL_LINK1'			=> $row['fl_link1'],
						'FL_LINK_TEXT1'		=> $row['fl_link_text1'],
						));
					};
				}
					
				if ($fl_data['fl_enable_b2'])
				{
					if (!empty($row['fl_link2']))
					{
						$template->assign_block_vars('fl_links2', array(
							'FL_LINK2'			=> $row['fl_link2'],
						'FL_LINK_TEXT2'		=> $row['fl_link_text2'],
						));
					};
				};
					
				if ($fl_data['fl_enable_b3'])
				{
					if (!empty($row['fl_link3']))
					{
						$template->assign_block_vars('fl_links3', array(
							'FL_LINK3'			=> $row['fl_link3'],
							'FL_LINK_TEXT3'		=> $row['fl_link_text3'],
						));
					}
				}
			}
		}
		$db->sql_freeresult($result);
	}
}
