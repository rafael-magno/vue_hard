<?php

class Disciplina extends Model implements JsonSerializable
{
    private $iddisciplina;
    private $nome;
    
    private $total;

    public function __construct($inicializarClassePai = true)
    {
        parent::__construct($inicializarClassePai, $this);
    }

    public function listarTodos($pagina = 0, $totalPorPagina = 0, $termoPesquisa = '')
    {
        $sql = 'SELECT {campos} FROM disciplina';
        if (trim($termoPesquisa)) {
            $termoPesquisa = $this->db->real_escape_string($termoPesquisa);
            $sql .= " WHERE nome LIKE '%$termoPesquisa%'";
        }
        $sqlDados = str_replace('{campos}', 'iddisciplina, nome', $sql);
        if ($pagina) {
            $sqlTotal = str_replace('{campos}', 'COUNT(iddisciplina) AS total', $sql);
            $sqlDados .= ' LIMIT '.(($pagina - 1) * $totalPorPagina).', '.$totalPorPagina;
            $retorno['total'] = $this->fetchRow($sqlTotal)->getTotal();
        }
        $retorno['dados'] = $this->fetchRows($sqlDados);
        return $retorno;
    }

    public function buscarDadosId($id)
    {
        $sql = 'SELECT iddisciplina, nome FROM disciplina WHERE iddisciplina = '.(int)$id;
        return $this->fetchRow($sql);
    }

    public function salvarDados($dados)
    {
        $this->setIddisciplina($dados['iddisciplina']);
        $this->setNome($dados['nome']);
        return $this->salvar();
    }

    public function removerDados($id)
    {
        $this->setIddisciplina($id);
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
    public function getIddisciplina()
    {
        return $this->iddisciplina;
    }

    /**
     * @param mixed $iddisciplina
     *
     * @return self
     */
    public function setIddisciplina($iddisciplina)
    {
        $this->iddisciplina = $iddisciplina;

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
}