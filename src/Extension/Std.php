<?php

/**
* CG Chat Plugin  - Joomla 4.x/5.x plugin
* copyright 		: Copyright (C) 2024 ConseilGouz. All rights reserved.
* license    		: https://www.gnu.org/licenses/gpl-3.0.html GNU/GPL
*/

namespace ConseilGouz\Plugin\Cgchat\Std\Extension;

defined('_JEXEC') or die('Restricted access');
use Joomla\CMS\Plugin\CMSPlugin;
use Joomla\Event\SubscriberInterface;

class Std extends CMSPlugin implements SubscriberInterface
{
    /**
     * @var boolean
     * @since 4.1.0
     */
    protected $autoloadLanguage = true;

    /**
     * @inheritDoc
     *
     * @return string[]
     *
     * @since 4.1.0
     */
    public static function getSubscribedEvents(): array
    {
        return [
            'onCGChatStart' 	=> 'startCGChat',
            'onCGChatBeforeMsg' => 'beforeMsg',
            'onCGChatKill'      => 'goKill',
        ];
    }

    /*
    *	onCGChatStart : add some options
    *
    *   @context  string   must contain com_cgchat.cgchat/com_cgchat.history
    *   @params   Registry contain com_cgchat parameters
    *   @response String   empty if OK, text if error
    *
    *	@return boolean    always true
    */
    public function startCGChat($event)
    {
        $context = $event['context'];
        $params = $event['params'];
        if (($context != 'com_cgchat.cgchat') && ($context != 'com_cgchat.history')) {
            $event['response'] = "Erreur context";
        }
        return true;
    }
    /*
    *	onCGChatBeforeMsg : before writing new message in DB
    *
    *   @context  string   must contain com_cgchat.cgchat
    *   @params   Registry contain com_cgchat parameters
    *	@user	  CGChatUser
    *	@txt	  String   text to display
    *   @response String   empty if OK, text if error
    *
    *	@return boolean    always true

    */
    public function beforeMsg($event)
    {
        $context	= $event['context'];
        $params 	= $event['params'];
        $user 		= $event['user'];
        $txt		= $event['txt'];
        if ($context != 'com_cgchat.cgchat') {
            $event->setArgument('response', "Erreur context");
        }

        return true;
    }
    /*
    *	onCGChatKill : before killing session
    *
    *   @context  string   must contain com_cgchat.cgchat
    *   @params   Registry contain com_cgchat parameters
    *	@session  String
    *   @response String   empty if OK, text if error
    *
    *	@return boolean    always true

    */
    public function goKill($event)
    {
        $context	= $event['context'];
        $params 	= $event['params'];
        $user 		= $event['user'];
        $txt		= $event['txt'];
        if ($context != 'com_cgchat.cgchat') {
            $event->setArgument('response', "Erreur context");
        }

        return true;
    }


}
