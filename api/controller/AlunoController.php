<?php

require_once 'model/Aluno.php';
require_once 'model/Turno.php';
require_once 'model/AlunoHasDisciplina.php';
require_once 'model/Disciplina.php';

class AlunoController extends Controller
{
    private $aluno;
    private $disciplina;
    private $turno;
    private $alunoHasDisciplina;

    public function __construct()
    {
        $this->aluno = new Aluno();
        $this->disciplina = new Disciplina();
        $this->turno = new Turno();
        $this->alunoHasDisciplina = new AlunoHasDisciplina();
    }

    public function buscarListagem()
    {
        $listagemAluno = $this->aluno->listarTodos($_GET['pagina'], $_GET['totalPorPagina'], $_GET['termoPesquisa']);
        
        $this->json($listagemAluno);
    }

    public function buscarDadosEdicao()
    {
        $dadosAluno = $this->aluno->buscarDadosId((int)$_GET['idaluno']);
        $dadosAluno->setDisciplinaIddisciplina(explode(',', $dadosAluno->getDisciplinaIddisciplina()));

        $this->json($dadosAluno);
    }

    public function salvarDados()
    {
        //$this->aluno->startTransaction();
        
        $retorno = $this->aluno->salvarDados($_POST);
        
        if ($retorno) {
            $idAluno = $_POST['idaluno'] ? $_POST['idaluno'] : $retorno;
            $retorno = $this->alunoHasDisciplina->removerDados($idAluno);        
        }
        
        if ($retorno) {
            $dados = $_POST;
            $dados['alunoIdaluno'] = $idAluno;
            $retorno = $this->alunoHasDisciplina->salvarDados($dados);    
        }
        
        if ($retorno) {
            //$this->aluno->commit();
        } else {
            //$this->aluno->rollback();
        }

        $this->json(['status' => $retorno]);
    }

    public function removerDados()
    {
        $retorno['status'] = $this->aluno->removerDados($_POST['idaluno']);
        
        $this->json($retorno);
    }
}