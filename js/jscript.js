
function validar_formulario(){
	var nome = formulario.nome.value;
	var idade = formulario.idade.value;
	var cpf = formulario.cpf.value;
	var email = formulario.email.value;
	var datanc = formulario.datanc.value;

	if (nome == '') {
		alert('Campo nome é obrigatório');
		formulario.nome.focus();
		return false;
	}
	if (idade == NaN) {
		alert('Campo idade é obrigatório');
		formulario.idade.focus();
		return false;
	}
	if (cpf == NaN) {
		alert('Campo cpf é obrigatório');
		formulario.cpf.focus();
		return false;
	}
	if (email == '') {
		alert('Campo email é obrigatório');
		formulario.email.focus();
		return false;
	}
	if (datanc == '') {
		alert('Campo datanc é obrigatório');
		formulario.datanc.focus();
		return false;
	}
}
function limpa_formulario(){
					document.getElementById('rua').value = ("");
					document.getElementById('bairro').value = ("");
					document.getElementById('cidade').value = ("");
					document.getElementById('uf').value = ("");
				}

				function retorno(inform){
					if (!("erro" in inform)) {
					document.getElementById('rua').value = (inform.logradouro);
					document.getElementById('bairro').value = (inform.bairro);
					document.getElementById('cidade').value = (inform.localidade);
					document.getElementById('uf').value = (inform.uf);
					}
					else{
						limpa_formulario();
						alert("Cep inexistente! Tente novamente");
					}
				}

				function pesquisacep(valor){
					var cep = valor.replace(/\D/g, '');
					if (cep != "") {
						var validacep = /^[0-9]{8}$/;
						if (validacep.test(cep)) {
							document.getElementById('rua').value = "Carregando";
							document.getElementById('bairro').value = "Carregando";
							document.getElementById('cidade').value = "Carregando";
							document.getElementById('uf').value = "Carregando";

					var script = document.createElement('script');

					script.src = 'https://viacep.com.br/ws/'+ cep + '/json/?callback=retorno';

					document.body.appendChild(script);
				}
					else{
					limpa_formulario();
					alert('Cep inexistente! Tente novamente');
					}
				}
					else{
					limpa_formulario();
					}
			};