<?php

class Aluno extends Model implements JsonSerializable
{
    private $idaluno;
    private $nome;
    private $turnoIdturno;
    
    private $total;
    private $disciplinaIddisciplina;

    public function __construct($inicializarClassePai = true)
    {
        parent::__construct($inicializarClassePai, $this);
    }

    public function listarTodos($pagina = 0, $totalPorPagina = 0, $termoPesquisa = '')
    {
        $sql = 'SELECT {campos} FROM aluno';
        if (trim($termoPesquisa)) {
            $termoPesquisa = $this->db->real_escape_string($termoPesquisa);
            $sql .= " WHERE nome LIKE '%$termoPesquisa%'";
        }
        $sqlDados = str_replace('{campos}', 'idaluno, nome, turno_idturno AS turnoIdturno', $sql);
        if ($pagina) {
            $sqlTotal = str_replace('{campos}', 'COUNT(idaluno) AS total', $sql);
            $sqlDados .= ' LIMIT '.(($pagina - 1) * $totalPorPagina).', '.$totalPorPagina;
            $retorno['total'] = $this->fetchRow($sqlTotal)->getTotal();
        }
        $retorno['dados'] = $this->fetchRows($sqlDados);
        return $retorno;
    }

    public function buscarDadosId($id)
    {
        $sql = "
        SELECT a.idaluno, a.nome, a.turno_idturno AS turnoIdturno, GROUP_CONCAT(ad.disciplina_iddisciplina) AS disciplinaIddisciplina 
        FROM aluno a 
        LEFT JOIN aluno_has_disciplina ad ON a.idaluno = ad.aluno_idaluno 
        WHERE a.idaluno = $id 
        GROUP BY a.idaluno";
        return $this->fetchRow($sql);
    }

    public function salvarDados($dados)
    {
        $this->setIdaluno($dados['idaluno']);
        $this->setNome($dados['nome']);
        $this->setTurnoIdturno($dados['turnoIdturno']);
        $retorno = $this->salvar();
        
        return $retorno;
    }

    public function removerDados($id)
    {
        $this->setIdaluno($id);
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
    public function getIdaluno()
    {
        return $this->idaluno;
    }

    /**
     * @param mixed $idaluno
     *
     * @return self
     */
    public function setIdaluno($idaluno)
    {
        $this->idaluno = $idaluno;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getNome()
    {
        return $this->nome;
    }

    /**
     * @param mixed $nome
     *
     * @return self
     */
    public function setNome($nome)
    {
        $this->nome = $nome;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getTurnoIdturno()
    {
        return $this->turnoIdturno;
    }

    /**
     * @param mixed $turnoIdturno
     *
     * @return self
     */
    public function setTurnoIdturno($turnoIdturno)
    {
        $this->turnoIdturno = $turnoIdturno;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getTotal()
    {
        return $this->total;
    }

    /**
     * @param mixed $total
     *
     * @return self
     */
    public function setTotal($total)
    {
        $this->total = $total;

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