<?php

namespace LuizSuvilao\Doctrine\Helper;

use Doctrine\ORM\EntityManager;
use Doctrine\ORM\Exception\ORMException;
use Doctrine\ORM\Tools\Setup;

class EntityManagerFactory
{
    /**
     * @return EntityManager
     * @throws ORMException
     */
    public function getEntityManager(): EntityManager
    {
        $rootDir = __DIR__ . '/../..';

        $config = Setup::createAnnotationMetadataConfiguration([$rootDir . '/src'], true);

        $connection = [
            'driver' => 'pdo_sqlite',
            'path' => $rootDir . '/var/data/banco.sqlite'
        ];

        return EntityManager::create($connection, $config);
    }
}