<?php

use LuizSuvilao\Doctrine\Entity\Aluno;
use LuizSuvilao\Doctrine\Entity\Telefone;
use LuizSuvilao\Doctrine\Helper\EntityManagerFactory;

require_once __DIR__  . '/../vendor/autoload.php';

$aluno = new Aluno();
$aluno->setNome($argv[1]);

$entityManagerFactory = new EntityManagerFactory();
$entityManager = $entityManagerFactory->getEntityManager();

for ($i = 2; $i < $argc; $i++) {
    $numeroTelefone = $argv[$i];
    $telefone = new Telefone();
    $telefone->setNumber($numeroTelefone);
    $aluno->addTelefone($telefone);

}



$entityManager->persist($aluno);

$entityManager->flush();

