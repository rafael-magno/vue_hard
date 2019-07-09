<?php

use Base\Disciplina as BaseDisciplina;

class Disciplina extends BaseDisciplina
{
    private $query;
    
    function __construct()
    {
        $this->query = new DisciplinaQuery();
    }
    
    public function listarTodos($pagina = 0, $totalPorPagina = 0, $termoPesquisa = '')
    {
        $this->query->orderByIddisciplina('desc');
        if (trim($termoPesquisa)) {
            $this->query->filterByNome($termoPesquisa);
        }
        if ($pagina) {
             $retorno['total'] = $this->query->count();
             $this->query->paginate($pagina, $totalPorPagina);
        }
             echo "$pagina,$totalPorPagina";
        $retorno['dados'] = $this->query->find()->toArray();
        return $retorno;
    }

    public function buscarDadosId($id)
    {        
        return $this->query->findPK($id)->toArray();
    }

    public function salvarDados($dados)
    {
        $disciplina = $this->query->findPK($dados['iddisciplina']);
        $disciplina = !$disciplina ? $this : $disciplina;
        
        $disciplina->setNome($dados['nome'])->save();
    }

    public function removerDados($id)
    {
        return $this->query->findPK($id)->delete();
    }
}
