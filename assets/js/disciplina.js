module.exports = {
  	data() {
  		return {
  			iddisciplina: 0,
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
            this.iddisciplina = 0
        },
        salvarDados(event) {
        	retorno = sendFormRequest(event.target.form);
            if (retorno && retorno.status) {
                this.mostrarForm = false
        		this.refreshDisciplinas()
        	}
        },
        removerDados(iddisciplina) {
            retorno = sendRequest('api/Disciplina/removerDados', {iddisciplina}, 'POST')
            if (retorno && retorno.status) {
                this.refreshDisciplinas()
        	}
        },
        refreshDisciplinas() {
            this.total++
        }
    },
    computed: {
        disciplinas() {
            dadosRequest = {pagina: this.pagina, totalPorPagina: this.totalPorPagina, termoPesquisa: this.termoPesquisa}
            dadosListagem = sendRequest('api/Disciplina/buscarListagem', dadosRequest)
            this.total = dadosListagem.total
            this.totalPaginas = Math.ceil(this.total / this.totalPorPagina)
            if (this.totalPaginas && this.pagina > this.totalPaginas) {
                this.pagina = this.totalPaginas
                dadosRequest.pagina = this.pagina
                dadosListagem = sendRequest('api/Disciplina/buscarListagem', dadosRequest)
            }
            
            return dadosListagem.dados;
        },
        disciplina() {
            if (this.iddisciplina > 0) {
                this.mostrarForm = true
                return sendRequest('api/Disciplina/buscarDadosEdicao', {iddisciplina: this.iddisciplina})
            }
            
            return {
                iddisciplina: '',
                nome: ''
            }
        }
    }
}