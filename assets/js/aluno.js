module.exports = {
	created(){
		this.buscarListagem(1)
    this.turnos = sendRequest('api/Turno/buscarListagem').dados
    this.disciplinas = sendRequest('api/Disciplina/buscarListagem').dados
  	},
  	data() {
  		return {
  			alunos: [],
  			aluno: {},
  			pagina: 0,
  			totalPaginas: 1,
  			totalPorPagina: 20,
  			total: 0,
        termoPesquisa: '',
        listagemFiltrada: false,
        mostrarForm: false,
        turnos: [],
        disciplinas: [],
  		}
  	},
    methods: {
        cadastrarNovoAluno() {
            this.mostrarForm = true
            this.aluno = {}
        },
        limparFiltro() {
            this.termoPesquisa = ''
            this.totalPaginas = 1
            this.buscarListagem(1)
        },
        buscarListagem(pagina) {
        	if (pagina >= 1 && pagina <= this.totalPaginas) {
	        	listagem = sendRequest('api/Aluno/buscarListagem', {pagina, totalPorPagina: this.totalPorPagina, termoPesquisa: this.termoPesquisa})
            this.listagemFiltrada = this.termoPesquisa != ''
	        	this.alunos = listagem.dados
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
        		this.aluno = {}
                this.mostrarForm = false
        		this.limparFiltro()
        	}
        },
        buscarDadosEdicao(idaluno) {
            this.aluno = sendRequest('api/Aluno/buscarDadosEdicao', {idaluno})
            this.mostrarForm = true
        },
        removerDados(idaluno) {
        	retorno = sendRequest('api/Aluno/removerDados', {idaluno}, 'POST')
          if (retorno && retorno.status) {
        		this.buscarListagem(this.pagina)
        	}
        }
    }
}