<?php
/**
 * zf2x (http://zf2x.trueaxiom.co.uk/)
 *
 * @link      http://github.com/trueaxiom/zf2x for the canonical source repository
 * @copyright Copyright (c) 2013 True Axiom Limited UK. (http://www.trueaxiom.co.uk)
 * @license   http://www.opensource.org/licenses/mit-license.html  MIT License
 */

namespace ZF2x\Doctrine\ORM\User\Stdlib\Hydrator;

use DoctrineORMModule\Stdlib\Hydrator\DoctrineEntity;

class UserIdentityHydrator extends DoctrineEntity
{
    public function extract($object)
    {
        return array('id' => $object->getId());
    }
}
