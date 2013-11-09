<?php
/**
 * zf2x (http://zf2x.trueaxiom.co.uk/)
 *
 * @link      http://github.com/trueaxiom/zf2x for the canonical source repository
 * @copyright Copyright (c) 2013 True Axiom Limited UK. (http://www.trueaxiom.co.uk)
 * @license   http://www.opensource.org/licenses/mit-license.html  MIT License
 */

namespace ZF2x\Doctrine\ORM\User;

use Zend\Mvc\MvcEvent;
use Zend\ModuleManager\Feature\ConfigProviderInterface;

class Module implements ConfigProviderInterface
{
    /**
     * On Bootstrap
     *
     * @param  MvcEvent $e
     */
    public function onBootstrap(MvcEvent $e)
    {
        $app        = $e->getApplication();
        $sl         = $app->getServiceManager();
        $events     = $app->getEventManager();

        $userEvents = $sl->get('zf2x.doctrine.orm.user.listener');
        $events->attachAggregate($userEvents);

        $identityService = $sl->get('zf2x.identity.service');
        $userSession = new \ZF2x\Identity\Provider\Session('ZF2x\User\Entity\User');
        $userIdentityHydrator = $sl->get('zf2x.doctrine.orm.user.identity.hydrator');
        $userSession->setHydrator($userIdentityHydrator);
        $identityService->addProvider($userSession);
    }

    /**
     * {@inheritDoc}
     */
    public function getConfig()
    {
        return include __DIR__ . '/../../../../../config/module.config.php';
    }
}
