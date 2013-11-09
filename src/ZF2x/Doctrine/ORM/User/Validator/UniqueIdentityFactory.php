<?php
/**
 * zf2x (http://zf2x.trueaxiom.co.uk/)
 *
 * @link      http://github.com/trueaxiom/zf2x for the canonical source repository
 * @copyright Copyright (c) 2013 True Axiom Limited UK. (http://www.trueaxiom.co.uk)
 * @license   http://www.opensource.org/licenses/mit-license.html  MIT License
 */

namespace ZF2x\Doctrine\ORM\User\Validator;

use Zend\ServiceManager\FactoryInterface;
use DoctrineModule\Validator\NoObjectExists;
use Zend\ServiceManager\ServiceLocatorInterface;

class UniqueIdentityFactory implements FactoryInterface
{
    public function createService(ServiceLocatorInterface $serviceLocator)
    {
        $sl = $serviceLocator->getServiceLocator();
        $em = $sl->get('Doctrine\ORM\EntityManager');
        $repository = $em->getRepository('ZF2x\User\Entity\User');
        return new NoObjectExists(
            array(
                'object_repository' => $repository,
                'fields' => array(
                    'identity'
                ),
            )
        );
    }
}
