<?php
/**
*
* @package phpBB Extension - Footerlinks
* @copyright (c) 2016 joyceluna (https://phpbb-style-design.de)
* @license http://opensource.org/licenses/gpl-2.0.php GNU General Public License v2
* @ver 1.3.2
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

	/** @var \phpbb\user */
	protected $user;

	/** @var \phpbb\db\driver\driver_interface */
	protected $db;

	/** @var \phpbb\request\request */
	protected $request;

	/**
	* Constructor
	*
	* @param \phpbb\template\template          	$template
	* @param \phpbb\user                       	$user
	* @param \phpbb\db\driver\driver_interface 	$db
	* @param \phpbb\request\request            	$request
	* @param string								$footerlinks_table
	*/

	public function __construct(\phpbb\template\template $template, \phpbb\user $user, \phpbb\db\driver\driver_interface $db,
	\phpbb\request\request $request, $footerlinks_table)
	{
		$this->template = $template;
		$this->user = $user;
		$this->db = $db;
		$this->request = $request;
		$this->footerlinks_table = $footerlinks_table;
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
		$sql = 'SELECT * 
		FROM '. $this->footerlinks_table;

		$result	 = $this->db->sql_query($sql,86400);
		$fl_data = $this->db->sql_fetchrow($result);

		if ($fl_data['fl_enable'])
		{
			$this->template->assign_vars(array(
				'FL_ENABLE'			=> $fl_data['fl_enable'],
				'FL_EXT_LINK'		=> $fl_data['fl_ext_link'],
				'FL_ENABLE_B1'		=> $fl_data['fl_enable_b1'],
				'FL_ENABLE_B2'		=> $fl_data['fl_enable_b2'],
				'FL_ENABLE_B3'		=> $fl_data['fl_enable_b3'],
				'FL_TITLE_CAT1'		=> $fl_data['fl_title_cat1'],
				'FL_TITLE_CAT2'		=> $fl_data['fl_title_cat2'],
				'FL_TITLE_CAT3'		=> $fl_data['fl_title_cat3'],
			));

			while ($row = $this->db->sql_fetchrow($result))
			{
				if ($fl_data['fl_enable_b1'])
				{
					if (!empty($row['fl_link1']))
					{
						$this->template->assign_block_vars('fl_links1', array(
							'FL_LINK1'			=> $row['fl_link1'],
							'FL_LINK_TEXT1'		=> $row['fl_link_text1'],
						));
					};
				}

				if ($fl_data['fl_enable_b2'])
				{
					if (!empty($row['fl_link2']))
					{
						$this->template->assign_block_vars('fl_links2', array(
							'FL_LINK2'			=> $row['fl_link2'],
							'FL_LINK_TEXT2'		=> $row['fl_link_text2'],
						));
					};
				};

				if ($fl_data['fl_enable_b3'])
				{
					if (!empty($row['fl_link3']))
					{
						$this->template->assign_block_vars('fl_links3', array(
							'FL_LINK3'			=> $row['fl_link3'],
							'FL_LINK_TEXT3'		=> $row['fl_link_text3'],
						));
					}
				}
			}
		}
		$this->db->sql_freeresult($result);
	}
}
