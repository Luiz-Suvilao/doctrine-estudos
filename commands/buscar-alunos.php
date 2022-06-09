<?php

use LuizSuvilao\Doctrine\Entity\Aluno;
use LuizSuvilao\Doctrine\Entity\Telefone;
use LuizSuvilao\Doctrine\Helper\EntityManagerFactory;

require_once __DIR__  . '/../vendor/autoload.php';

$entityManagerFactory = new EntityManagerFactory();
$entityManager = $entityManagerFactory->getEntityManager();

$dql = "SELECT aluno FROM LuizSuvilao\\Doctrine\Entity\\Aluno aluno";
$query = $entityManager->createQuery($dql);

/** @var Aluno[] $alunoList */
$alunoList = $query->getResult();

foreach ($alunoList as $aluno) {
    $telefones = $aluno
        ->getTelefones()
        ->map(function(Telefone $tel) {
            return $tel->getNumber();
    })->toArray();

    echo "ID: {$aluno->getId()} \nNome: {$aluno->getNome()}\n";
    echo "Telefones: " . implode(', ', $telefones);
    echo "\n\n";
}
