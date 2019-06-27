<?php

require_once 'model/Turno.php';

class TurnoController extends Controller
{
    private $turno;

    public function __construct()
    {
        $this->turno = new Turno();
    }

    public function buscarListagem()
    {
        $listagemTurno = $this->turno->listarTodos($_GET['pagina'], $_GET['totalPorPagina'], $_GET['termoPesquisa']);
        
        $this->json($listagemTurno);
    }

    public function buscarDadosEdicao()
    {
        $dadosTurno = $this->turno->buscarDadosId($_GET['idturno']);

        $this->json($dadosTurno);
    }

    public function salvarDados()
    {
        $retorno['status'] = $this->turno->salvarDados($_POST);

        $this->json($retorno);
    }

    public function removerDados()
    {
        $retorno['status'] = $this->turno->removerDados($_POST['idturno']);
        
        $this->json($retorno);
    }
}