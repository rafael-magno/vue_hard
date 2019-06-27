var routes = [
	{ path: '/turno', component: httpVueLoader('view/turno.vue') },
	{ path: '/disciplina', component: httpVueLoader('view/disciplina.vue') },
	{ path: '/aluno', component: httpVueLoader('view/aluno.vue') },
]

var router = new VueRouter({
    routes 
})

var app = new Vue({
    router
}).$mount('#app')

$('#menuSuperior li').click(function() {
	$('#menuSuperior li').removeClass('active');
	$(this).addClass('active');
});

function sendFormRequest(form) {
	var data = $(form).find('input[type!="checkbox"][type!="radio"], input[type="radio"]:checked, input[type="checkbox"]:checked, select, textarea');
	return sendRequest(form.action, data, form.method);
}

function sendRequest(url, data, type) {
	var retorno
	
	$.ajax({
		url: url,
		type: type,
		data: data,
		dataType: 'json',
		async: false,
		success: function(data) {
			retorno = data
		},
		error: function () {
			alert('error')
		}
	})
	
	return retorno
}

function objectIsEmpty() {
	return JSON.stringify(obj) === JSON.stringify({});
}