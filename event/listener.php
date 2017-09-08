<?php
/**
*
* @package phpBB Extension - Footerlinks
* @copyright (c) 2016 joyceluna (https://phpbb-style-design.de)
* @license http://opensource.org/licenses/gpl-2.0.php GNU General Public License v2
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
	/** @var \phpbb\template\template */
	protected $template;

	/** @var \phpbb\db\driver\driver_interface */
	protected $db;

	/** @var \phpbb\config\config */
	protected $config;

	/**
	* Constructor
	*
	* @param \phpbb\template\template          	$template
	* @param \phpbb\db\driver\driver_interface 	$db
	* @param string								$footerlinks_table
	* @param \phpbb\config\config				$config
	*/

	public function __construct(\phpbb\template\template $template, \phpbb\user $user, \phpbb\db\driver\driver_interface $db,
	\phpbb\request\request $request, $footerlinks_table, \phpbb\config\config $config)
	{
		$this->template = $template;
		$this->db = $db;
		$this->request = $request;
		$this->footerlinks_table = $footerlinks_table;
		$this->config = $config;
	}

	public static function getSubscribedEvents()
	{
		return array(
			'core.user_setup'  => 'load_language_on_setup',
			'core.page_header' => 'footerlinks',
		);
	}

	public function load_language_on_setup($event)
	{
		$lang_set_ext 	= $event['lang_set_ext'];
		$lang_set_ext[] = array(
			'ext_name'	=> 'joyceluna/footerlinks',
			'lang_set'	=> 'lang_footerlinks',
		);
		$event['lang_set_ext'] = $lang_set_ext;
	}

	public function footerlinks($event)
	{
		$this->template->assign_vars(array(
			'FL_ENABLE'			=> $this->config['footerlinks_enable'],
			'FL_EXT_LINK'		=> $this->config['footerlinks_ext_link'],
		));

		$sql = 'SELECT * 
		FROM '. $this->footerlinks_table;
		$result	 = $this->db->sql_query($sql,86400);

		while ($row = $this->db->sql_fetchrow($result))
		{
			if (!empty($row['fl_link']) && ($row['fl_b_nr'] == 1))
			{				
			$this->template->assign_vars(array(
				'FL_ENABLE_B1'	=> $row['fl_enable_b'],
				'FL_TITLE_CAT1'	=> $row['fl_title_cat']
			));

			$this->template->assign_block_vars('fl_links1', array(
				'FL_LINK1'			=> $row['fl_link'],
				'FL_LINK_TEXT1'		=> $row['fl_link_text'],
				));
			}

			if (!empty($row['fl_link']) && ($row['fl_b_nr'] == 2))
			{				
			$this->template->assign_vars(array(
				'FL_ENABLE_B2'	=> $row['fl_enable_b'],
				'FL_TITLE_CAT2'	=> $row['fl_title_cat']
			));

			$this->template->assign_block_vars('fl_links2', array(
				'FL_LINK2'			=> $row['fl_link'],
				'FL_LINK_TEXT2'		=> $row['fl_link_text'],
				));
			}

			if (!empty($row['fl_link']) && ($row['fl_b_nr'] == 3))
			{				
			$this->template->assign_vars(array(
				'FL_ENABLE_B3'	=> $row['fl_enable_b'],
				'FL_TITLE_CAT3'	=> $row['fl_title_cat']
			));

			$this->template->assign_block_vars('fl_links3', array(
				'FL_LINK3'			=> $row['fl_link'],
				'FL_LINK_TEXT3'		=> $row['fl_link_text'],
				));
			}
		}
		$this->db->sql_freeresult($result);
	}
}
