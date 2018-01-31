<?php
/**
 *
 * @package phpBB Extension - Footerlinks
 * @copyright (c) 2016 joyceluna (https://phpbb-style-design.de)
 * @license http://opensource.org/licenses/gpl-2.0.php GNU General Public License v2
 *
*/

namespace joyceluna\footerlinks\migrations;

class init_1_3_9 extends \phpbb\db\migration\migration
{
    static public function depends_on()
    {
        return array('\joyceluna\footerlinks\migrations\init');
    }

    public function update_data()
    {
        return array(
            array('config.update', array('footerlinks_version', '1.3.9')),
        );
    }

}