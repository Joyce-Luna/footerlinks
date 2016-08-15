<?php
/**
*
* @package phpBB Extension - Footer Links
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
    public static function getSubscribedEvents()
    {
        return array(
            'core.page_header'      => 'page_header',
        );
    }
 
    /** @var \phpbb\user */
    protected $user;
 
 
    /**
     * Constructor
     *
     * @param \phpbb\user       $user       User object
     */
    public function __construct(\phpbb\user $user)
    {
        $this->user = $user;
 
    }
    /**
    * Load language file
    *
    * @param    object  $event  The event object
    * @return   null
    * @access   public
    */
    public function page_header($event)
    {
        $this->user->add_lang_ext('joyceluna/footerlinks', 'main');
    }
}