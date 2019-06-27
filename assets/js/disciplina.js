module.exports = {
	created(){
		this.buscarListagem(1)
  	},
  	data() {
  		return {
  			disciplinas: [],
  			disciplina: {},
  			pagina: 0,
  			totalPaginas: 1,
  			totalPorPagina: 20,
  			total: 0,
            termoPesquisa: '',
            listagemFiltrada: false,
            mostrarForm: false
  		}
  	},
    methods: {
        cadastrarNovoDisciplina() {
            this.mostrarForm = true
            this.disciplina = {}
        },
        limparFiltro() {
            this.termoPesquisa = ''
            this.totalPaginas = 1
            this.buscarListagem(1)
        },
        buscarListagem(pagina) {
        	if (pagina >= 1 && pagina <= this.totalPaginas) {
	        	listagem = sendRequest('api/Disciplina/buscarListagem', {pagina, totalPorPagina: this.totalPorPagina, termoPesquisa: this.termoPesquisa})
                this.listagemFiltrada = this.termoPesquisa != ''
	        	this.disciplinas = listagem.dados
	        	this.total = listagem.total
	        	this.pagina = pagina
	        	this.totalPaginas = Math.ceil(this.total / this.totalPorPagina)
	        	if (this.totalPaginas && this.pagina > this.totalPaginas) {
	        		this.buscarListagem(this.totalPaginas)
	        	}
	        }
        },
        salvarDados(event) {
        	retorno = sendFormRequest(event.target.form);
          if (retorno && retorno.status) {
        		this.disciplina = {}
                this.mostrarForm = false
        		this.limparFiltro()
        	}
        },
        buscarDadosEdicao(iddisciplina) {
            this.disciplina = sendRequest('api/Disciplina/buscarDadosEdicao', {iddisciplina})
            this.mostrarForm = true
        },
        removerDados(iddisciplina) {
          retorno = sendRequest('api/Disciplina/removerDados', {iddisciplina}, 'POST')
          if (retorno && retorno.status) {
        		this.buscarListagem(this.pagina)
        	}
        }
    }
}