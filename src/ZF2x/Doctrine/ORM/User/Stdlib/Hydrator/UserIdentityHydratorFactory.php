<?php
/**
 * zf2x (http://zf2x.trueaxiom.co.uk/)
 *
 * @link      http://github.com/trueaxiom/zf2x for the canonical source repository
 * @copyright Copyright (c) 2013 True Axiom Limited UK. (http://www.trueaxiom.co.uk)
 * @license   http://www.opensource.org/licenses/mit-license.html  MIT License
 */

namespace ZF2x\Doctrine\ORM\User\Stdlib\Hydrator;

use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

class UserIdentityHydratorFactory implements FactoryInterface
{
    public function createService(ServiceLocatorInterface $serviceLocator)
    {
        $entityManager = $serviceLocator->get('Doctrine\ORM\EntityManager');
        $hydrator = new UserIdentityHydrator($entityManager);
        return $hydrator;
    }
}
