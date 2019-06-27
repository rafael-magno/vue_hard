<?php

class AlunoHasDisciplina extends Model implements JsonSerializable
{
    private $alunoIdaluno;
    private $disciplinaIddisciplina;

    public function __construct($inicializarClassePai = true)
    {
        parent::__construct($inicializarClassePai, $this);
    }

    public function salvarDados($dados)
    {
        print_r($dados);
        $this->setAlunoIdaluno($dados['alunoIdaluno']);
        foreach ($dados['disciplinaIddisciplina'] as $disciplinaIddisciplina) {
            $this->setDisciplinaIddisciplina($disciplinaIddisciplina);
            if (!$this->salvar()) {
                return false;
            }
        }
        
        return true;
    }

    public function removerDados($idAluno)
    {
        $this->setAlunoIdaluno($idAluno);
        return $this->remover();
    }
    
    public function jsonSerialize()
    {
        $vars = get_object_vars($this);

        return $vars;
    }

    /**
     * @return mixed
     */
    public function getAlunoIdaluno()
    {
        return $this->alunoIdaluno;
    }

    /**
     * @param mixed $alunoIdaluno
     *
     * @return self
     */
    public function setAlunoIdaluno($alunoIdaluno)
    {
        $this->alunoIdaluno = $alunoIdaluno;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getDisciplinaIddisciplina()
    {
        return $this->disciplinaIddisciplina;
    }

    /**
     * @param mixed $disciplinaIddisciplina
     *
     * @return self
     */
    public function setDisciplinaIddisciplina($disciplinaIddisciplina)
    {
        $this->disciplinaIddisciplina = $disciplinaIddisciplina;

        return $this;
    }
}