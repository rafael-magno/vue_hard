<?php

class Turno extends Model implements JsonSerializable
{
    private $idturno;
    private $nome;
    
    private $total;

    public function __construct($inicializarClassePai = true)
    {
        parent::__construct($inicializarClassePai, $this);
    }

    public function listarTodos($pagina = 0, $totalPorPagina = 0, $termoPesquisa = '')
    {
        $sql = 'SELECT {campos} FROM turno';
        if (trim($termoPesquisa)) {
            $termoPesquisa = $this->db->real_escape_string($termoPesquisa);
            $sql .= " WHERE nome LIKE '%$termoPesquisa%'";
        }
        $sqlDados = str_replace('{campos}', 'idturno, nome', $sql);
        if ($pagina) {
            $sqlTotal = str_replace('{campos}', 'COUNT(idturno) AS total', $sql);
            $sqlDados .= ' LIMIT '.(($pagina - 1) * $totalPorPagina).', '.$totalPorPagina;
            $retorno['total'] = $this->fetchRow($sqlTotal)->getTotal();
        }
        $retorno['dados'] = $this->fetchRows($sqlDados);
        return $retorno;
    }

    public function buscarDadosId($id)
    {
        $sql = 'SELECT idturno, nome FROM turno WHERE idturno = '.(int)$id;
        return $this->fetchRow($sql);
    }

    public function salvarDados($dados)
    {
        $this->setIdturno($dados['idturno']);
        $this->setNome($dados['nome']);
        return $this->salvar();
    }

    public function removerDados($id)
    {
        $this->setIdturno($id);
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
    public function getTotal()
    {
        return $this->total;
    }

    /**
     * @return mixed
     */
    public function getIdturno()
    {
        return $this->idturno;
    }

    /**
     * @param mixed $idturno
     *
     * @return self
     */
    public function setIdturno($idturno)
    {
        $this->idturno = $idturno;

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