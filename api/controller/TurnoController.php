<?php

class TurnoController
{
    private $turno;

    public function __construct()
    {
        $this->turno = new Turno();
    }

    public function buscarListagem($pagina, $totalPorPagina, $termoPesquisa)
    { 
        $listagemTurno = $this->turno->listarTodos($pagina, $totalPorPagina, $termoPesquisa);
        return $listagemTurno;
    }

    public function buscarDadosEdicao($idturno)
    {
        $dadosTurno = $this->turno->buscarDadosId($idturno);
        return $dadosTurno;
    }

    public function salvarDados()
    {
        $this->turno->salvarDados($_POST);
    }

    public function removerDados($idturno)
    {
        $this->turno->removerDados($idturno);
    }
}