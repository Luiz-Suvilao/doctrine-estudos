<?php

use LuizSuvilao\Doctrine\Entity\Aluno;
use LuizSuvilao\Doctrine\Helper\EntityManagerFactory;

require_once __DIR__ . '/../vendor/autoload.php';

$entityManagerFactory = new EntityManagerFactory();
$entityManager = $entityManagerFactory->getEntityManager();

$id = $argv[1];
$newName = $argv[2];

$aluno = $entityManager->find(Aluno::class, $id);

$aluno->setNome($newName);

$entityManager->flush();
