<script src=".<?=PATHURL;?>assets/js/plugins/multistep-form.js"></script>
<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>   
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js"></script>

<script>
    $(document).click(function() {
      $('.mask_cpf').mask('000.000.000-09');
      $('.mask_cnpj').mask('00.000.000/0000-09');
      $('.mask_money').mask('#.##0,00', { reverse: true });      
    });

    $(document).ready(function() {
      $('.mask_money').blur(function() {
        if ($(this).unmask().length < 2) {
          if ($(this).unmask().length < 2) {
            let valor = '00' + $(this).unmask().val();
  
            $(this).val(valor);
            $(this).mask('#.##0,00', { reverse: true });
          } else {
            let valor = '0' + $(this).unmask().val();
  
            $(this).val(valor);
            $(this).mask('#.##0,00', { reverse: true });
          }
        }
      });
    });
</script>

<script>
  const tipoLocacao = document.getElementById("tipo-locacao");
  const residencial = document.getElementById("residencial");
  const comercial = document.getElementById("comercial");
  const periodo = document.getElementById("periodo");
  const ramo = document.getElementById("row-ramo");

  const tipoGarantia = document.getElementById("tipo-garantia");
  const caucao = document.getElementById("caucao");
  const fiador = document.getElementById("fiador");
  const seguroFianca = document.getElementById("seguro-fianca");
  const tituloCapitacao = document.getElementById("titulo-capitacao")
  const credpago = document.getElementById("fianca-credpago")
  const velo = document.getElementById("fianca-velo")
  const doculoc = document.getElementById("fianca-doculoc")
  const outros = document.getElementById("fianca-outro")
  const semGarantia = document.getElementById("sem-garantia")

  const garantiaSelecionada = document.getElementById("garantia-selecionada");

  // Tipo Locacao
  tipoLocacao.addEventListener("change", function () {
    if (residencial.checked) {
      periodo.innerHTML = `
        <option value="">Selecione o período</option>
        <option value="30 MESES">30 MESES</option>
        <option value="36 MESES">36 MESES</option>
        <option value="48 MESES">48 MESES</option>
        <option value="60 MESES">60 MESES</option>
      `;
      ramo.style.display = "none";
    } else if (comercial.checked) {
      periodo.innerHTML = `
        <option value="">Selecione o período</option>
        <option value="12 MESES">12 MESES</option>
        <option value="24 MESES">24 MESES</option>
        <option value="36 MESES">36 MESES</option>
        <option value="48 MESES">48 MESES</option>
        <option value="60 MESES">60 MESES</option>
      `;
      ramo.style.display = "block";
    }
  });

  // Tipo Garantia
  tipoGarantia.addEventListener("change", function () {
    if (caucao.checked) {
      garantiaSelecionada.innerHTML = `
        <hr class="bg-dark">
        <div class="col-md-12 d-flex justify-content-center gap-3">
          <div class="form-group text-start col">
            <label for="alugueis_garantia">Quantos aluguéis</label>
            <select class="form-control w-full" id="alugueis_garantia" name="alugueis_garantia">
              <option value="1">1</option>
              <option value="2">2</option>
              <option value="3">3</option>
            </select>
          </div>

          <div class="form-group text-start col">
            <label for="valor_aluguel_garantia">Valor</label>
            <input class="mask_money form-control" id="valor_aluguel_garantia" name="valor_aluguel_garantia" type="text" placeholder="Digite apenas números">
          </div>
        </div>        
      `;
    }

    if (fiador.checked) {
      garantiaSelecionada.innerHTML = `
        <div class="col-md-12 text-start">
          <label class="text-start">Estado Civil</label>
          <div class="d-flex justify-content-start gap-4">
            <div class="form-check ps-0">
              <label class="custom-control-label" for="solteiro">Solteiro(a)</label>
              <input class="form-check-input ms-0" type="radio" value="Solteiro(a)" name="estado_civil_garantia" id="solteiro">
            </div>

            <div class="form-check ps-0">
              <label class="custom-control-label" for="casado">Casado(a)</label>
              <input class="form-check-input ms-0" type="radio" value="Casado(a)" name="estado_civil_garantia" id="casado">
            </div>
          </div>
        </div>
      `;
    }

    if (seguroFianca.checked) {
      garantiaSelecionada.innerHTML = `
        <div class="col-md-12">
          <div class="d-flex justify-content-start gap-4">
            <div class="form-group col">
              <label class="form-control-label" for="nome_corretor_garantia">Corretor(a)</label>
              <input class="form-control" name="nome_corretor_garantia" id="nome_corretor_garantia" type="text" placeholder="Digite o nome do corretor(a)"/>
            </div>

            <div class="form-group col">
              <label class="form-control-label" for="cpnj_garantia">CNPJ</label>
              <input class="form-control mask_cnpj" name="cpnj_garantia" id="cpnj_garantia" type="text" placeholder="Digite o CNPJ"/>
            </div>

            <div class="form-group col">
              <label for="date_aprovation_garantia" class="form-control-label">Data da aprovação</label>
              <input class="form-control" type="date" name="date_aprovation_garantia" id="date_aprovation_garantia">
            </div>
          </div>
        </div>

        <div class="col-md-12">
          <div class="form-group">
            <label class="form-control-label" for="pac_garantia">Nº PAC</label>
            <input type="text" class="form-control" name="pac_garantia" id="pac_garantia" placeholder="Digite aqui o número do PAC" />
            </div>
        </div>
      `;
    }
    
    if (tituloCapitacao.checked) {
      garantiaSelecionada.innerHTML = `
        <div class="col-md-12">
          <div class="d-flex justify-content-start gap-4">
            <div class="form-group col">
              <label class="form-control-label" for="nome_corretor_garantia">Corretor(a)</label>
              <input class="form-control" name="nome_corretor_garantia" id="nome_corretor_garantia" type="text" placeholder="Digite o nome do corretor(a)"/>
            </div>

            <div class="form-group col">
              <label class="form-control-label" for="cpnj_garantia">CNPJ</label>
              <input class="form-control mask_cnpj" name="cpnj_garantia" id="cpnj_garantia" type="text" placeholder="Digite o CNPJ"/>
            </div>

            <div class="form-group col">
              <label for="date_aprovation_garantia" class="form-control-label">Data da aprovação</label>
              <input class="form-control" type="date" name="date_aprovation_garantia" id="date_aprovation_garantia">
            </div>
          </div>
        </div>

        <div class="col-md-12">
          <div class="form-group">
            <label class="form-control-label" for="pac_garantia">Nº PAC</label>
            <input type="text" class="form-control" name="pac_garantia" id="pac_garantia" placeholder="Digite aqui o número do PAC" />
            </div>
        </div>
        `;
    }

    if (credpago.checked) {
      garantiaSelecionada.innerHTML = ""
    }

    if (velo.checked) {
      garantiaSelecionada.innerHTML = ""
    }

    if (doculoc.checked) {
      garantiaSelecionada.innerHTML = ""
    }

    if (outros.checked) {
      garantiaSelecionada.innerHTML = `
        <div class="col-md-12">
          <div class="d-flex justify-content-start gap-4">
            <div class="form-group col">
              <label class="form-control-label" for="nome_corretor_garantia">Corretor(a)</label>
              <input class="form-control" name="nome_corretor_garantia" id="nome_corretor_garantia" type="text" placeholder="Digite o nome do corretor(a)"/>
            </div>

            <div class="form-group col">
              <label class="form-control-label" for="cpnj_garantia">CNPJ</label>
              <input class="form-control mask_cnpj" name="cpnj_garantia" id="cpnj_garantia" type="text" placeholder="Digite o CNPJ"/>
            </div>

            <div class="form-group col">
              <label for="date_aprovation_garantia" class="form-control-label">Data da aprovação</label>
              <input class="form-control" type="date" name="date_aprovation_garantia" id="date_aprovation_garantia">
            </div>
          </div>
        </div>

        <div class="col-md-12">
          <div class="form-group">
            <label class="form-control-label" for="pac_garantia">Nº PAC</label>
            <input type="text" class="form-control" name="pac_garantia" id="pac_garantia" placeholder="Digite aqui o número do PAC" />
            </div>
        </div>
      `;
    }

    if (semGarantia.checked) {
      garantiaSelecionada.innerHTML = ""
    }
  });  
</script>