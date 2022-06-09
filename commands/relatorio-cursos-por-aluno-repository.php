<?php

use LuizSuvilao\Doctrine\Entity\Aluno;
use LuizSuvilao\Doctrine\Entity\Telefone;
use LuizSuvilao\Doctrine\Helper\EntityManagerFactory;

require_once __DIR__ . '/../vendor/autoload.php';

$entityManagerFactory = new EntityManagerFactory();
$entityManager = $entityManagerFactory->getEntityManager();

$alunosRepository = $entityManager->getRepository(Aluno::class);

/** @var Aluno[] $alunos */
$alunos = $alunosRepository->buscaCursoPorAluno();

foreach ($alunos as $aluno) {
    $telefones = $aluno
        ->getTelefones()
        ->map(function(Telefone $tel) {
            return $tel->getNumber();
        })->toArray();

    echo "ID: {$aluno->getId()} \nNome: {$aluno->getNome()}\n";
    echo "Telefones: " . implode(', ', $telefones);
    echo "\n";

    $cursos = $aluno->getCursos();
    foreach ($cursos as $curso) {
        echo "\tID Curso: {$curso->getId()}\n";
        echo "\tCurso: {$curso->getNome()}\n";
        echo "\n";
    }

    echo "\n";
}
