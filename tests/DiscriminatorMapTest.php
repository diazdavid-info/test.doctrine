<?php

namespace foo\tests;


use Doctrine\ORM\EntityManager;
use Doctrine\ORM\OptimisticLockException;
use Doctrine\ORM\ORMException;
use Doctrine\ORM\Tools\Setup;
use foo\mapping\Car;
use foo\mapping\Medium;
use foo\mapping\Small;

class DiscriminatorMapTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @test
     * @throws ORMException
     * @throws OptimisticLockException
     */
    public function nothing()
    {
        $isDevMode = true;
        $config = Setup::createXMLMetadataConfiguration([__DIR__ . '/../config/xml'], $isDevMode);
        $conn = [
            'dbname' => 'discriminator',
            'user' => 'root',
            'password' => 'admin',
            'host' => '127.0.0.1',
            'driver' => 'pdo_mysql',
        ];

        $entityManager = EntityManager::create($conn, $config);

        $medium = new Medium();
        $medium->setMake('Seat');
        $medium->setName('Name Seat');

        $entityManager->persist($medium);
        $entityManager->flush();
    }

    /**
     * @test
     */
    public function find()
    {
        $isDevMode = true;
        $config = Setup::createXMLMetadataConfiguration([__DIR__ . '/../config/xml'], $isDevMode);
        $conn = [
            'dbname' => 'discriminator',
            'user' => 'root',
            'password' => 'admin',
            'host' => '127.0.0.1',
            'driver' => 'pdo_mysql',
        ];

        $entityManager = EntityManager::create($conn, $config);

        $car = $entityManager->getRepository(Small::class)
            ->find(1);

        $this->assertInstanceOf(Small::class, $car);
    }
}
