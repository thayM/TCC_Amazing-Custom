<div class="container_modal modalCad modalPed" style="display:none">
  <div class="content_modal">
    <div class="parteEsq">
      <h2 class="tituloEsq">Dados do pedido</h2>
      <div class="atributos">
        <p class="atributo" id="nPed"></p>
        <p class="atributo" id="cliente"></p>
        <p class="atributo" id="subValor"></p>
        <p class="atributo" id="frete"></p>
        <p class="atributo" id="valorTotal"></p>
      </div>
    </div>

    <div class="parteDir ">
      <div class="linha">
        <div class="circEtapas">
          <div id="cirEtapaPag" class="circulo"></div>
          <div id="cirEtapaArt" class="circulo"></div>
          <div id="cirEtapaProd" class="circulo"></div>
          <div id="cirEtapaEnvio" class="circulo"></div>
        </div>

        <div class="linhas">
        <div id="linhaPA"></div>
        <div id="linhaAP"></div>
        <div id="linhaPE"></div>
        </div>
      </div>

      <div class="etapas">
        <div class="etapa etapaPag">
          <div id="iconPag" class="icons"></div>
          <p id="pPag">Pagamento</p>
        </div>
        <div class="etapa etapaArt">
          <div id="iconArt" class="icons"></div>
          <p id="pArt">Arte</p>
        </div>
        <div class="etapa etapaProd">
          <div id="iconProd" class="icons"></div>
          <p id="pProd">Produção</p>
        </div>
        <div class="etapa etapaEnvio">
          <div id="iconEnvio" class="icons"></div>
          <p id="pEnvio">Envio</p>
        </div>
      </div>
      
      <div class="dirInferior">
        <div class="descEtapas">
          <p>Data Pedido</p>
          <div class="hrDt">
            <p id="dataPed"></p>
            <!-- <p>--:--</p> -->
          </div>
        </div>

        <div class="endereco">
          <div class="infos">
            <div class="ruaInfo">
              <h3>Rua: </h3>
              <p id="logradouro"></p>
            </div>
            <div class="numeroInfo">
              <h3>N°: </h3>
              <p id="num"></p>
            </div>
            <div class="bairroInfo">
              <h3>Bairro: </h3>
              <p id="bairro"></p>
            </div>
            <div class="cidadeInfo">
              <h3>Cidade: </h3>
              <p id="cidade"></p>
            </div>
            <div class="cepInfo">
              <h3>CEP: </h3>
              <p id="cep"></p>
            </div>
            <div class="complementoInfo">
              <h3>Complemento: </h3>
              <p id="complemento"></p>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div id="fecharModalPed">

    </div>
  </div>
</div>

<script src="../assets/js/modalPed.js"></script>