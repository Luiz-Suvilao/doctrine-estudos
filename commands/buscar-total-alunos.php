<?php

use LuizSuvilao\Doctrine\Entity\Aluno;
use LuizSuvilao\Doctrine\Helper\EntityManagerFactory;

require_once __DIR__  . '/../vendor/autoload.php';

$entityManagerFactory = new EntityManagerFactory();
$entityManager = $entityManagerFactory->getEntityManager();

$classAlunos = Aluno::class;

$dql = "SELECT COUNT (a) FROM $classAlunos a";
$query = $entityManager->createQuery($dql);
$totalAlunos = $query->getSingleScalarResult();

echo "Total de Alunos: $totalAlunos";
