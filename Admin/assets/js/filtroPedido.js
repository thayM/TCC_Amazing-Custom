// Cliente
async function infoCliente(name) {
	let require = await fetch('../appAdmin/functions/filtrar/filtrarCli.php?value=' + name);
	let data = await require.json();

	console.log(data)
	$(".infomacao_cliente").css("display", "flex");

	let infoContent = `
	<div class="content_infomacao_cliente d-flex flex-column">
		<h3>Informações do cliente</h3>
		<p>Código de rastreamento: ${data["dados"][0].cod_rastreamento}</p>
		<p>Email: ${data["dados"][0].email}</p>
		<p>Telefones: ${data["dados"][0].tel}</p>
		<div>
			<p class="endereco">Endereço: ${data["dados"][0].logradouro}, ${data["dados"][0].num}, ${data["dados"][0].bairro}, ${data["dados"][0].cidade}-${data["dados"][0].uf}</p>
			<div class="d-flex justify-content-between w-100">
				<p>CEP: ${data["dados"][0].cep}</p>
				<p class="compl">Compl: ${data["dados"][0].complemento}</p>
			</div>
		</div>
	</div>
	`;

	$(".infomacao_cliente").html(infoContent);
}

async function filtroCli(value) {
	if (value.length != 0) {
		const require = await fetch('../appAdmin/functions/filtrar/filtrarCli.php?value=' + value);
		const data = await require.json();
		var listaHTML = '<ul>';

		if (data['status']) {
			for (let i = 0; i < data['dados'].length; i++) {
				listaHTML += `<li onclick='inputValueCli(${JSON.stringify(data['dados'][i].nome)})'>${data["dados"][i].nome}</li>`;
			}
		} else {
			listaHTML += "<li>" + data["msg"] + "</li>";
		}
		listaHTML += "</ul>";
	} else {
		var listaHTML = "";
		$(".infomacao_cliente").css("display", "none");
	}
	document.getElementById("resultPesquisaCli").innerHTML = listaHTML;
}

function inputValueCli(nome) {
	document.getElementById("nomeCli").value = "";
	document.getElementById("nomeCli").value = nome;
	document.getElementById("resultPesquisaCli").innerHTML = "";
	infoCliente(nome);
}

// Fragrancia
async function filtroFrag(value, destino) {
	console.log(value)
	if (value.length != 0) {
		const require = await fetch('../appAdmin/functions/filtrar/filtrarFrag.php?value=' + value);
		const data = await require.json();
		var listaHTML = '<ul>';
		if (data['status']) {
			for (let i = 0; i < data['dados'].length; i++) {
				listaHTML += `<li onclick='inputValue(${JSON.stringify(data['dados'][i].nome_frag)}, "${destino}", 1)'>${data["dados"][i].nome_frag}</li>`;
			}
		} else {
			listaHTML += "<li>" + data["msg"] + "</li>";
		}
		listaHTML += "</ul>";
	} else {
		var listaHTML = " ";
	}
	console.log(listaHTML)
	$(`.resultPesquisaFrag_${destino}`).html(listaHTML)
}

// Modelo
async function filtroModelo(value, destino) {
	if (value.length != 0) {
		const require = await fetch('../appAdmin/functions/filtrar/filtrarModelo.php?value=' + value);
		const data = await require.json();
		var listaHTML = '<ul>';
		if (data['status']) {
			console.log(destino)
			for (let i = 0; i < data['dados'].length; i++) {
				listaHTML += `<li onclick='inputValue(${JSON.stringify(data['dados'][i].nome_modelo)}, "${destino}", 0)'>${data["dados"][i].nome_modelo}</li>`;
			}
		} else {
			listaHTML += "<li>" + data["msg"] + "</li>";
		}
		listaHTML += "</ul>";
	} else {
		var listaHTML = " ";
	}
	$(`.resultPesquisaModelo_${destino}`).html(listaHTML)
	
}

function inputValue(nome, destino, campo) {
	$(`.${destino}`)[0].children[campo].children[0].value = nome
	$(`.${destino}`)[0].children[campo].children[1].innerHTML = ""
	attValor()
}