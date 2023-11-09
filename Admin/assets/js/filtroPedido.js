// Cliente
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
		var listaHTML = " ";
	}
	document.getElementById("resultPesquisaCli").innerHTML = listaHTML;
}

function inputValueCli(nome) {
	document.getElementById("nomeCli").value = "";
	document.getElementById("nomeCli").value = nome;
	document.getElementById("resultPesquisaCli").innerHTML = "";
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