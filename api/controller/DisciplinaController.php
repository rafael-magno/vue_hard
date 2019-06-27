<?php

require_once 'model/Disciplina.php';

class DisciplinaController extends Controller
{
    private $disciplina;

    public function __construct()
    {
        $this->disciplina = new Disciplina();
    }

    public function buscarListagem()
    {
        $listagemDisciplina = $this->disciplina->listarTodos($_GET['pagina'], $_GET['totalPorPagina'], $_GET['termoPesquisa']);
        
        $this->json($listagemDisciplina);
    }

    public function buscarDadosEdicao()
    {
        $dadosDisciplina = $this->disciplina->buscarDadosId($_GET['iddisciplina']);

        $this->json($dadosDisciplina);
    }

    public function salvarDados()
    {
        $retorno['status'] = $this->disciplina->salvarDados($_POST);

        $this->json($retorno);
    }

    public function removerDados()
    {
        $retorno['status'] = $this->disciplina->removerDados($_POST['iddisciplina']);
        
        $this->json($retorno);
    }
}