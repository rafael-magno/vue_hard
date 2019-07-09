<?php

class DisciplinaController
{
    private $disciplina;

    public function __construct()
    {
        $this->disciplina = new Disciplina();
    }

    public function buscarListagem($pagina, $totalPorPagina, $termoPesquisa)
    { 
        $listagemDisciplina = $this->disciplina->listarTodos($pagina, $totalPorPagina, $termoPesquisa);
        return $listagemDisciplina;
    }

    public function buscarDadosEdicao($iddisciplina)
    {
        $dadosDisciplina = $this->disciplina->buscarDadosId($iddisciplina);
        return $dadosDisciplina;
    }

    public function salvarDados()
    {
        $this->disciplina->salvarDados($_POST);
    }

    public function removerDados($iddisciplina)
    {
        $this->disciplina->removerDados($iddisciplina);
    }
}