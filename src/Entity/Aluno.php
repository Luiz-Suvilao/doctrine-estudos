<?php

namespace LuizSuvilao\Doctrine\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping\ManyToMany;
use Doctrine\ORM\Mapping\OneToMany;
use Doctrine\ORM\Mapping\Column;
use Doctrine\ORM\Mapping\Entity;
use Doctrine\ORM\Mapping\GeneratedValue;
use Doctrine\ORM\Mapping\Id;

/**
 * @Entity(repositoryClass="LuizSuvilao\Doctrine\Repository\AlunoRepository")
 */
class Aluno
{
    /**
     * @Id
     * @GeneratedValue
     * @Column(type="integer")
     */
    private int $id;

    /**
     * @Column(type="string")
     */
    private string $nome;

    /**
     * @OneToMany(targetEntity="Telefone", mappedBy="aluno", cascade={"remove", "persist"}, fetch="EAGER")
     */
    private Collection $telefones;

    /**
     * @ManyToMany(targetEntity="Curso", mappedBy="alunos")
     */
    private Collection $cursos;

    public function __construct()
    {
        $this->telefones = new ArrayCollection();
        $this->cursos = new ArrayCollection();
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
     * @return Aluno
     */
    public function setNome(string $nome): self
    {
        $this->nome = $nome;
        return $this;
    }

    /**
     * @param Telefone $telefone
     * @return Aluno
     */
    public function addTelefone(Telefone $telefone): self
    {
        $this->telefones->add($telefone);
        $telefone->setAluno($this);

        return $this;
    }

    /**
     * @return Collection
     */
    public function getTelefones(): Collection
    {
        return $this->telefones;
    }

    /**
     * @param Curso $curso
     * @return $this
     */
    public function addCurso(Curso $curso): self
    {
        if ($this->cursos->contains($curso)) {
            return  $this;
        }

        $this->cursos->add($curso);
        $curso->addAluno($this);

        return $this;
    }

    /**
     * @return Curso[]|Collection
     */
    public function getCursos(): Curso|Collection
    {
        return $this->cursos;
    }
}
