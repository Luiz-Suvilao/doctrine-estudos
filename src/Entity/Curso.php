<?php

namespace LuizSuvilao\Doctrine\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Mapping\Column;
use Doctrine\ORM\Mapping\Entity;
use Doctrine\ORM\Mapping\GeneratedValue;
use Doctrine\ORM\Mapping\Id;
use Doctrine\ORM\Mapping\ManyToMany;

/**
 * @Entity
 */
class Curso
{
    /**
     * @Id
     * @GeneratedValue()
     * @Column(type="integer")
     */
    private int $id;

    /**
     * @Column(type="string")
     */
    private string $nome;

    /**
     * @ManyToMany(targetEntity="Aluno", inversedBy="cursos")
     */
    private Collection $alunos;

    public function __construct()
    {
        $this->alunos = new ArrayCollection();
    }

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getNome(): string
    {
        return $this->nome;
    }

    /**
     * @param string $nome
     * @return self
     */
    public function setNome(string $nome): self
    {
        $this->nome = $nome;

        return $this;
    }

    /**
     * @param Aluno $aluno
     * @return $this
     */
    public function addAluno(Aluno $aluno): self
    {
        if ($this->alunos->contains($aluno)) {
            return $this;
        }

        $this->alunos->add($aluno);
        $aluno->addCurso($this);

        return $this;
    }

    /**
     * @return ArrayCollection|Collection
     */
    public function getAlunos(): ArrayCollection|Collection
    {
        return $this->alunos;
    }
}
