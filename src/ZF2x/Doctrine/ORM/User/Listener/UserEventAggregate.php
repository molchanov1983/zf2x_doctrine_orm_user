<?php
/**
 * zf2x (http://zf2x.trueaxiom.co.uk/)
 *
 * @link      http://github.com/trueaxiom/zf2x for the canonical source repository
 * @copyright Copyright (c) 2013 True Axiom Limited UK. (http://www.trueaxiom.co.uk)
 * @license   http://www.opensource.org/licenses/mit-license.html  MIT License
 */

namespace ZF2x\Doctrine\ORM\User\Listener;

use ZF2x\User\Event\UserCreateEvent;
use ZF2x\Identity\IdentityInterface;
use Zend\EventManager\EventManagerInterface;
use Zend\EventManager\ListenerAggregateInterface;

class UserEventAggregate implements ListenerAggregateInterface
{
    /**
     * Entity Manager
     *
     * @var \Doctrine\ORM\EntityManager
     */
    protected $entityManager;

    /**
     * Event Listeners
     *
     * @var array
     */
    protected $listeners = array();

    /**
     * Attach Events
     *
     * @param  EventManagerInterface $events
     */
    public function attach(EventManagerInterface $events)
    {
        $this->listeners[] = $events->attach('zf2x.user.create.event', array($this, 'createUser'), -100);
    }

    /**
     * Detach Events
     *
     * @param  EventManagerInterface $events
     */
    public function detach(EventManagerInterface $events)
    {
        foreach ($this->listeners as $listener) {
            $events->detach($listener);
        }
    }

    /**
     * Create User
     *
     * @param  ZF2x\User\Event\UserCreateEvent $event
     */
    public function createUser(UserCreateEvent $event)
    {
        $identity = $event->getIdentity();
        $em = $this->getEntityManager();
        $em->persist($identity);
        $em->flush($identity);
    }

    /**
     * Gets the Entity Manager.
     *
     * @return \Doctrine\ORM\EntityManager
     */
    public function getEntityManager()
    {
        return $this->entityManager;
    }

    /**
     * Sets the Entity Manager.
     *
     * @param \Doctrine\ORM\EntityManager $entityManager the entity manager
     *
     * @return self
     */
    public function setEntityManager(\Doctrine\ORM\EntityManager $entityManager)
    {
        $this->entityManager = $entityManager;

        return $this;
    }
}
