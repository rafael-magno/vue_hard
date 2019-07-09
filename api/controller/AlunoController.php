<?php

class AlunoController
{
    private $aluno;

    public function __construct()
    {
        $this->aluno = new Aluno();
    }

    public function buscarListagem($pagina, $totalPorPagina, $termoPesquisa)
    { 
        $listagemAluno = $this->aluno->listarTodos($pagina, $totalPorPagina, $termoPesquisa);
        return $listagemAluno;
    }

    public function buscarDadosEdicao($idaluno)
    {
        $dadosAluno = $this->aluno->buscarDadosId($idaluno);
        $dadosAluno['disciplinaIddisciplina'] = explode(',', $dadosAluno['disciplinaIddisciplina']);
        return $dadosAluno;
    }

    public function salvarDados()
    {
        $this->aluno->salvarDados($_POST);
    }

    public function removerDados($idaluno)
    {
        $this->aluno->removerDados($idaluno);
    }
}