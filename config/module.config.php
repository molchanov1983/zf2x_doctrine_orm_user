<?php
return array(
    'doctrine' => array(
        'driver' => array(
            'user_entity_annotation_driver' => array(
                'class' => 'Doctrine\ORM\Mapping\Driver\XMLDriver',
                'cache' => 'array',
                'paths' => array(
                    'vendor/trueaxiom/zf2x_doctrine_orm_user/config/mapping',
                ),
            ),
            'orm_default' => array(
                'drivers' => array(
                    'ZF2x\User\Entity' => 'user_entity_annotation_driver'
                )
            )
        ),
    ),
    'service_manager' => array(
        'factories' => array(
            'zf2x.user.identity.mapper' => 'ZF2x\Doctrine\ORM\User\Repository\UserFactory',
            'zf2x.doctrine.orm.user.listener' => 'ZF2x\Doctrine\ORM\User\Listener\UserEventAggregateFactory',
            'zf2x.doctrine.orm.user.identity.hydrator'
                => 'ZF2x\Doctrine\ORM\User\Stdlib\Hydrator\UserIdentityHydratorFactory'
        ),
        'invokables' => array(
        ),
    ),
    'validators' => array(
        'factories' => array(
            'zf2x.user.validator.uniqueidentity' => 'ZF2x\Doctrine\ORM\User\Validator\UniqueIdentityFactory'
        ),
    ),
);
