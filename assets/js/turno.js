module.exports = {
	created(){
		this.buscarListagem(1)
  	},
  	data() {
  		return {
  			turnos: [],
  			turno: {},
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
        cadastrarNovoTurno() {
            this.mostrarForm = true
            this.turno = {}
        },
        limparFiltro() {
            this.termoPesquisa = ''
            this.totalPaginas = 1
            this.buscarListagem(1)
        },
        buscarListagem(pagina) {
        	if (pagina >= 1 && pagina <= this.totalPaginas) {
	        	listagem = sendRequest('api/Turno/buscarListagem', {pagina, totalPorPagina: this.totalPorPagina, termoPesquisa: this.termoPesquisa})
                this.listagemFiltrada = this.termoPesquisa != ''
	        	this.turnos = listagem.dados
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
        		this.turno = {}
            this.mostrarForm = false
        		this.limparFiltro()
        	}
        },
        buscarDadosEdicao(idturno) {
            this.turno = sendRequest('api/Turno/buscarDadosEdicao', {idturno})
            this.mostrarForm = true
        },
        removerDados(idturno) {
          retorno = sendRequest('api/Turno/removerDados', {idturno}, 'POST')
        	if (retorno && retorno.status) {
        		this.buscarListagem(this.pagina)
        	}
        }
    }
}