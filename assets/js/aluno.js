module.exports = {
    data() {
      return {
        idaluno: 0,
        pagina: 1,
        totalPaginas: 1,
        totalPorPagina: 20,
        total: 0,
            termoPesquisa: '',
            termoPesquisaInput: '',
            mostrarForm: false
      }
    },
    methods: {
        irParaListagem() {
            this.mostrarForm = false
            this.idaluno = 0
        },
        salvarDados(event) {
          retorno = sendFormRequest(event.target.form);
            if (retorno && retorno.status) {
                this.mostrarForm = false
            this.refreshAlunos()
          }
        },
        removerDados(idaluno) {
            retorno = sendRequest('api/Aluno/removerDados', {idaluno}, 'POST')
            if (retorno && retorno.status) {
                this.refreshAlunos()
          }
        },
        refreshAlunos() {
            this.total++
        }
    },
    computed: {
        alunos() {
            dadosRequest = {pagina: this.pagina, totalPorPagina: this.totalPorPagina, termoPesquisa: this.termoPesquisa}
            dadosListagem = sendRequest('api/Aluno/buscarListagem', dadosRequest)
            this.total = dadosListagem.total
            this.totalPaginas = Math.ceil(this.total / this.totalPorPagina)
            if (this.totalPaginas && this.pagina > this.totalPaginas) {
                this.pagina = this.totalPaginas
                dadosRequest.pagina = this.pagina
                dadosListagem = sendRequest('api/Aluno/buscarListagem', dadosRequest)
            }
            
            return dadosListagem.dados;
        },
        aluno() {
            if (this.idaluno > 0) {
                this.mostrarForm = true
                return sendRequest('api/Aluno/buscarDadosEdicao', {idaluno: this.idaluno})
            }
            
            return {
                idaluno: '',
                nome: '',
                turnoIdturno: '',
                disciplinaIddisciplina: []
            }
        },
        turnos() {
            return sendRequest('api/Turno/buscarListagem').dados;
        },
        disciplinas() {
            return sendRequest('api/Disciplina/buscarListagem').dados;
        }
    }
}