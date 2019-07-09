<?php

use Base\Aluno as BaseAluno;

class Aluno extends BaseAluno
{
    private $query;
    private $alunoHasDisciplina;
    
    function __construct()
    {
        $this->query = new AlunoQuery();
        $this->alunoHasDisciplina = new AlunoHasDisciplina();
    }
    
    public function listarTodos($pagina = 0, $totalPorPagina = 0, $termoPesquisa = '')
    {
        if (trim($termoPesquisa)) {
            $this->query->filterByNome($termoPesquisa);
        }
        if ($pagina) {
             $retorno['total'] = $this->query->count();
             $this->query->paginate($pagina, $totalPorPagina);
        }
        $retorno['dados'] = $this->query->orderByIdaluno('desc')
                                        ->find()
                                        ->toArray();
        return $retorno;
    }

    public function buscarDadosId($id)
    {        
        return $this->query->withColumn('GROUP_CONCAT(ad.disciplina_iddisciplina)', 'disciplinaIddisciplina')
                       ->joinAlunoHasDisciplina('ad', 'left join')
                       ->groupBy('idaluno')
                       ->findPK($id)
                       ->toArray();
    }

    public function salvarDados($dados)
    {
        $aluno = $this->query->findPK($dados['idaluno']);
        $aluno = !$aluno ? $this : $aluno;
        
        $con = Propel\Runtime\Propel::getWriteConnection(Map\AlunoTableMap::DATABASE_NAME);
        
        $con->beginTransaction();
        
        try {
            $this->alunoHasDisciplina->removeByIdaluno($dados['idaluno']);
            foreach ((array)$dados['disciplinaIddisciplina'] as $disciplinaIddisciplina) {
                $this->alunoHasDisciplina->setDisciplinaIddisciplina($disciplinaIddisciplina);
                $aluno->addAlunoHasDisciplina(clone $this->alunoHasDisciplina);
            }
            $aluno->setNome($dados['nome'])
                  ->setTurnoIdturno($dados['turnoIdturno'])
                  ->save();
            $con->commit();
        } catch (Exception $e) {
            $con->rollback();
            throw $e;
        }
    }

    public function removerDados($id)
    {
        $this->query->findPK($id)->delete();
    }
}