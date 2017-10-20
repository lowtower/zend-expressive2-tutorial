<?php

namespace Album\Db;

use Album\Model\Entity\AlbumEntity;
use Interop\Container\ContainerInterface;
use Zend\Db\Adapter\AdapterInterface;
use Zend\Db\ResultSet\HydratingResultSet;

class AlbumTableGatewayFactory
{
    /**
     * @param ContainerInterface $container
     * @return AlbumTableGateway
     */
    public function __invoke(ContainerInterface $container)
    {
        $resultSetPrototype = new HydratingResultSet(
            null,
            new AlbumEntity()
        );

        return new AlbumTableGateway(
            $container->get(AdapterInterface::class),
            $resultSetPrototype
        );
    }
}
