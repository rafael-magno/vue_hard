<?php

use Base\Turno as BaseTurno;

class Turno extends BaseTurno
{
    private $query;
    
    function __construct()
    {
        $this->query = new TurnoQuery();
    }
    
    public function listarTodos($pagina = 0, $totalPorPagina = 0, $termoPesquisa = '')
    {
        $this->query->orderByIdturno('desc');
        if (trim($termoPesquisa)) {
            $this->query->filterByNome($termoPesquisa);
        }
        if ($pagina) {
             $retorno['total'] = $this->query->count();
             $this->query->paginate($pagina, $totalPorPagina);
        }
        $retorno['dados'] = $this->query->find()->toArray();
        return $retorno;
    }

    public function buscarDadosId($id)
    {        
        return $this->query->findPK($id)->toArray();
    }

    public function salvarDados($dados)
    {
        $turno = $this->query->findPK($dados['idturno']);
        $turno = !$turno ? $this : $turno;
        
        $turno->setNome($dados['nome'])->save();
    }

    public function removerDados($id)
    {
        return $this->query->findPK($id)->delete();
    }
}
