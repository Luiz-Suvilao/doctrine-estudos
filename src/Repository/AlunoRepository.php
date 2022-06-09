<?php

namespace LuizSuvilao\Doctrine\Repository;

use Doctrine\ORM\EntityRepository;

class AlunoRepository extends EntityRepository
{
    public function buscaCursoPorAluno()
    {
        return $this
            ->createQueryBuilder('a')
            ->join('a.telefones', 't')
            ->join('a.cursos', 'c')
            ->addSelect('t')
            ->addSelect('c')
            ->getQuery()
            ->getResult();
    }
}
