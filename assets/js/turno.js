module.exports = {
    data() {
      return {
        idturno: 0,
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
            this.idturno = 0
        },
        salvarDados(event) {
          retorno = sendFormRequest(event.target.form);
            if (retorno && retorno.status) {
                this.mostrarForm = false
            this.refreshTurnos()
          }
        },
        removerDados(idturno) {
            retorno = sendRequest('api/Turno/removerDados', {idturno}, 'POST')
            if (retorno && retorno.status) {
                this.refreshTurnos()
          }
        },
        refreshTurnos() {
            this.total++
        }
    },
    computed: {
        turnos() {
            dadosRequest = {pagina: this.pagina, totalPorPagina: this.totalPorPagina, termoPesquisa: this.termoPesquisa}
            dadosListagem = sendRequest('api/Turno/buscarListagem', dadosRequest)
            this.total = dadosListagem.total
            this.totalPaginas = Math.ceil(this.total / this.totalPorPagina)
            if (this.totalPaginas && this.pagina > this.totalPaginas) {
                this.pagina = this.totalPaginas
                dadosRequest.pagina = this.pagina
                dadosListagem = sendRequest('api/Turno/buscarListagem', dadosRequest)
            }
            
            return dadosListagem.dados;
        },
        turno() {
            if (this.idturno > 0) {
                this.mostrarForm = true
                return sendRequest('api/Turno/buscarDadosEdicao', {idturno: this.idturno})
            }
            
            return {
                idturno: '',
                nome: ''
            }
        }
    }
}