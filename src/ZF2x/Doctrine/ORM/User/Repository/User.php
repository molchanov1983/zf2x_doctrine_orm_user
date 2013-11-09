<?php
/**
 * zf2x (http://zf2x.trueaxiom.co.uk/)
 *
 * @link      http://github.com/trueaxiom/zf2x for the canonical source repository
 * @copyright Copyright (c) 2013 True Axiom Limited UK. (http://www.trueaxiom.co.uk)
 * @license   http://www.opensource.org/licenses/mit-license.html  MIT License
 */

namespace ZF2x\Doctrine\ORM\User\Repository;

use Doctrine\ORM\EntityRepository;
use ZF2x\Identity\IdentityMapperInterface;
use ZF2x\Identity\ValidatableIdentityInterface;

class User extends EntityRepository implements IdentityMapperInterface
{
    public function findOneByIdentity(ValidatableIdentityInterface $identity)
    {
        return $this->findOneBy(array('identity' => $identity->getIdentity()));
    }
}
