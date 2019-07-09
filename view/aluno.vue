<template>
    <div>
        <div class="container" v-show="mostrarForm">
            <div class="row">
                <div class="col-lg-12">
                    <button class="btn pull-left" @click="irParaListagem">Ir para listagem</button>
                    <button class="btn pull-right" @click="idaluno = 0" v-show="aluno.idaluno">Novo aluno</button>
                    <br><br><br>
                </div>
            </div>
            <form action="api/Aluno/salvarDados" method="post">
                <div class="row">
                    <div class="col-lg-1">Nome</div>
                    <div class="col-lg-3">
                        <input type="text" class="form-control" name="nome" v-model="aluno.nome">
                        <br>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-1">Turno</div>
                    <div class="col-lg-3">
                        <select class="form-control" name="turnoIdturno" v-model="aluno.turnoIdturno">
                            <option value=""></option>
                            <option v-for="turno in turnos" :value="turno.idturno">{{turno.nome}}</option>
                        </select>
                        <br>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-1">Disciplinas</div>
                    <div class="col-lg-3">
                        <div v-for="disciplina in disciplinas">
                            <label>
                                <input type="checkbox" name="disciplinaIddisciplina[]" :value="disciplina.iddisciplina" v-model="aluno.disciplinaIddisciplina">
                                {{disciplina.nome}}
                            </label>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <input type="button" class="btn btn-primary" @click="salvarDados" value="Salvar">
                    </div>
                </div>
                <input type="hidden" name="idaluno" v-model="aluno.idaluno">
            </form>
        </div>
        <div class="container" v-show="!mostrarForm">
            <div class="row">
                <div class="col-lg-2">
                    <button class="btn btn-primary" @click="mostrarForm = true">Cadastrar aluno</button>
                    <br><br>
                </div>
                <div class="col-lg-4">
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="Filtrar" v-model="termoPesquisaInput">
                        <span class="input-group-btn">
                            <button class="btn" @click="termoPesquisa = termoPesquisaInput"><i class="fas fa-search"></i></button>
                        </span>
                    </div>
                </div>
                <div class="col-lg-2">
                    <button class="btn" @click="termoPesquisa = ''" v-show="termoPesquisa != ''">Limpar filtro</button>
                </div>
                <div class="col-lg-4">
                    <nav v-show="totalPaginas > 1" class="pull-right">
                      <ul class="pagination justify-content-end">
                        <li class="page-item" :class="{disabled : pagina <= 1}">
                          <a class="page-link" href="javascript:void(0)" @click="pagina = pagina > 1 ? pagina - 1 : 1">Anterior</a>
                        </li>
                        <li class="page-item" :class="{active : pagina == i}" v-for="i in totalPaginas">
                            <a class="page-link" href="javascript:void(0)" @click="pagina = i">{{i}}</a>
                        </li>
                        <li class="page-item" :class="{disabled : pagina >= totalPaginas}">
                          <a class="page-link" href="javascript:void(0)" @click="pagina = pagina < totalPaginas ? pagina + 1 : totalPaginas">Próximo</a>
                        </li>
                      </ul>
                    </nav>
                </div>
            </div>
            <table class="table">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Nome</th>
                        <th>Editar</th>
                        <th>Excluir</th>
                    </tr>
                </thead>
                <tbody>
                    <tr v-for="aluno in alunos">
                        <td>{{aluno.idaluno}}</td>
                        <td>{{aluno.nome}}</td>
                        <td><a href="javascript:void(0)" @click="idaluno = aluno.idaluno">Editar</a></td>
                        <td><a href="javascript:void(0)" @click="removerDados(aluno.idaluno)">Excluir</a></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</template>
<script type="text/javascript" src="assets/js/aluno.js"></script>