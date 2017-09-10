<?php
/**
*
* @package phpBB Extension - Footerlinks
* @copyright (c) 2016 joyceluna (https://phpbb-style-design.de)
* @license http://opensource.org/licenses/gpl-2.0.php GNU General Public License v2
*
*/

namespace joyceluna\footerlinks\migrations;

class init extends \phpbb\db\migration\migration
{
	public function effectively_installed()
	{
		return isset($this->config['footerlinks_version']) && version_compare($this->config['footerlinks_version'], '1.3.8', '>=');

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
					'footerlinks_id'	=> array('UINT', null, 'auto_increment'),
					'fl_ext_link'		=> array('UINT', '0'),
					'fl_enable_b'		=> array('UINT', '0'),
					'fl_title_cat'		=> array('VCHAR', ''),
					'fl_link'			=> array('VCHAR', ''),
					'fl_link_text'		=> array('VCHAR', ''),
					'fl_b_nr'			=> array('UINT', '0'),
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
			array('config.add', array('footerlinks_version', '1.3.8')),
			array('config.add', array('footerlinks_enable', '0')),
			array('config.add', array('footerlinks_ext_link', '0')),
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
		);
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
