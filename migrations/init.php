<?php
/**
*
* @package phpBB Extension - Footerlinks
* @copyright (c) 2016 joyceluna (https://phpbb-style-design.de)
* @license http://opensource.org/licenses/gpl-2.0.php GNU General Public License v2
* @ver 1.3.0
*
*/

namespace joyceluna\footerlinks\migrations;

class init extends \phpbb\db\migration\migration
{
	public function effectively_installed()
	{
		return isset($this->config['footerlinks_version']) && version_compare($this->config['footerlinks_version'], 'RC 1.3.0', '>=');

	}

	static public function depends_on()
	{
		return array('\phpbb\db\migration\data\v310\dev');
	}

	public function update_schema()
	{
		return array(
			'add_tables'	=> array(
			// ADD NEW TABLE STRUCTUR
				$this->table_prefix . 'footerlinks'	=> array(
					'COLUMNS' => array(
					'footerlinks_id'	=> array('UINT', NULL, 'auto_increment'),
					'fl_enable' 		=> array('UINT', '0'),
					'fl_ext_link'		=> array('UINT', '0'),
					'fl_enable_b1'		=> array('UINT', '0'),		//Block 1
					'fl_enable_b2'		=> array('UINT', '0'),		//Block 2
					'fl_enable_b3'		=> array('UINT', '0'),		//Block 3
					'fl_title_cat1'		=> array('VCHAR', ''),		//Cat1
					'fl_title_cat2'		=> array('VCHAR', ''),		//Cat2
					'fl_title_cat3'		=> array('VCHAR', ''),		//Cat3
					'fl_link1'			=> array('VCHAR', ''),		//Link URL 1
					'fl_link_text1'		=> array('VCHAR', ''),		//Link URL Text 1
					'fl_link2'			=> array('VCHAR', ''),		//Link URL 2
					'fl_link_text2'		=> array('VCHAR', ''),		//Link URL Text 2
					'fl_link3'			=> array('VCHAR', ''),		//Link URL 3
					'fl_link_text3'		=> array('VCHAR', ''),		//Link URL Text 3
					),
					'PRIMARY_KEY'	=> 'footerlinks_id',
				),
			),
		);
	}

   	public function update_data()
	{
		// ADD CONFIG VERSION
		return array(
			array('config.add', array('footerlinks_version', 'RC 1.3.0')),
			array('permission.add', array('a_footerlinks', true)),
			array('permission.permission_set', array('ADMINISTRATORS', 'ext_joyceluna/footerlinks && acl_a_board', 'group')),


		// Add ACP modules
			array('module.add', array('acp', 'ACP_CAT_DOT_MODS', 'ACP_FOOTERLINKS_TITLE')),
			array('module.add', array('acp', 'ACP_FOOTERLINKS_TITLE', array(
				'module_basename'	=> '\joyceluna\footerlinks\acp\main_module',
				'module_langname'	=> 'ACP_FOOTERLINKS_CONFIG',
				'module_mode'		=> 'overview',
				'module_auth'		=> 'ext_joyceluna/footerlinks && acl_a_board',
			))),

		// ADD VALUES => DB
        array('custom', array(array(&$this, 'add_footerlinks_data'))),
		);
	}

	public function add_footerlinks_data()
	{
		$footerlinks_sql_query = array(
		'footerlinks_id'	=> '1',
		);
		$this->db->sql_multi_insert($this->table_prefix . 'footerlinks', $footerlinks_sql_query);
	}

	/**
	* Drop the boardrules table schema from the database
	*
	* @return array Array of table schema
	* @access public
	*/
	public function revert_schema()
	{
		return array(
			'drop_tables'	=> array(
				$this->table_prefix . 'footerlinks',
			),
		);
	}
}
