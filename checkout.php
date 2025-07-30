<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>FRAN BY FR - Finalizar Compra</title>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600;700&display=swap" rel="stylesheet">
  <style>
    :root {
      --primary: #D81E5B;
      --primary-dark: #A71C45;
      --secondary: #2B2D42;
      --light-gray: #F5F5F5;
      --gray: #E0E0E0;
      --dark-gray: #777777;
      --success: #4CAF50;
      --error: #F44336;
    }
    
    * {
      box-sizing: border-box;
      margin: 0;
      padding: 0;
    }
    
    body {
      font-family: 'Montserrat', Arial, sans-serif;
      max-width: 480px;
      margin: 0 auto;
      padding: 1rem;
      background: var(--light-gray);
      color: var(--secondary);
      line-height: 1.5;
    }
    
    header {
      text-align: center;
      margin-bottom: 1.5rem;
      padding-bottom: 1rem;
      border-bottom: 1px solid var(--gray);
    }
    
    header img {
      max-width: 180px;
      height: auto;
    }
    
    h1, h2, h3 {
      color: var(--secondary);
      font-weight: 600;
    }
    
    h2 {
      font-size: 1.25rem;
      margin-bottom: 1rem;
    }
    
    form {
      background: white;
      padding: 1.5rem;
      border-radius: 10px;
      box-shadow: 0 2px 10px rgba(0, 0, 0, 0.05);
      margin-bottom: 1.5rem;
    }
    
    .form-group {
      margin-bottom: 1.25rem;
    }
    
    label {
      display: block;
      margin-bottom: 0.5rem;
      font-weight: 500;
      font-size: 0.9rem;
    }
    
    input[type="text"],
    input[type="email"],
    input[type="tel"],
    select {
      width: 100%;
      padding: 0.75rem;
      font-size: 1rem;
      border: 1px solid var(--gray);
      border-radius: 6px;
      transition: border-color 0.3s;
    }
    
    input:focus, select:focus {
      outline: none;
      border-color: var(--primary);
      box-shadow: 0 0 0 2px rgba(216, 30, 91, 0.1);
    }
    
    .checkbox-group {
      display: flex;
      align-items: center;
      margin: 1rem 0;
    }
    
    .checkbox-group input {
      margin-right: 0.5rem;
    }
    
    .checkbox-label {
      font-weight: normal;
      font-size: 0.9rem;
      cursor: pointer;
      user-select: none;
    }
    
    .delivery-options {
      margin: 1.5rem 0;
      display: none;
    }
    
    .delivery-option {
      display: flex;
      justify-content: space-between;
      padding: 0.75rem;
      border: 1px solid var(--gray);
      border-radius: 6px;
      margin-bottom: 0.5rem;
      cursor: pointer;
      transition: all 0.3s;
    }
    
    .delivery-option:hover {
      border-color: var(--primary);
    }
    
    .delivery-option.selected {
      border-color: var(--primary);
      background-color: rgba(216, 30, 91, 0.05);
    }
    
    .delivery-option input {
      margin-right: 0.5rem;
    }
    
    .info-text {
      font-size: 0.85rem;
      color: var(--dark-gray);
      margin: 0.5rem 0;
    }
    
    .cart-summary {
      background: white;
      padding: 1.5rem;
      border-radius: 10px;
      box-shadow: 0 2px 10px rgba(0, 0, 0, 0.05);
      margin-bottom: 1.5rem;
    }
    
    .cart-item {
      display: flex;
      justify-content: space-between;
      margin-bottom: 1rem;
      padding-bottom: 1rem;
      border-bottom: 1px solid var(--gray);
    }
    
    .cart-item-name {
      font-weight: 500;
      flex: 1;
    }
    
    .cart-item-price {
      font-weight: 600;
      margin-left: 1rem;
    }
    
    .totals {
      margin-top: 1rem;
    }
    
    .total-row {
      display: flex;
      justify-content: space-between;
      margin-bottom: 0.5rem;
    }
    
    .grand-total {
      font-weight: 700;
      font-size: 1.2rem;
      margin-top: 1rem;
      padding-top: 1rem;
      border-top: 1px solid var(--gray);
    }
    
    button {
      width: 100%;
      background: var(--primary);
      border: none;
      color: white;
      padding: 1rem;
      font-size: 1rem;
      font-weight: 600;
      border-radius: 6px;
      cursor: pointer;
      transition: background 0.3s ease;
      margin-top: 1rem;
      text-transform: uppercase;
      letter-spacing: 0.5px;
    }
    
    button:hover {
      background: var(--primary-dark);
    }
    
    button:disabled {
      background: var(--gray);
      cursor: not-allowed;
    }
    
    #qrcode-container {
      background: white;
      padding: 1.5rem;
      border-radius: 10px;
      box-shadow: 0 2px 10px rgba(0, 0, 0, 0.05);
      text-align: center;
      margin: 1.5rem 0;
      display: none;
    }
    
    #qrcode-image {
      max-width: 220px;
      border: 1px solid var(--gray);
      padding: 1rem;
      border-radius: 8px;
      background: white;
      margin: 1rem auto;
    }
    
    .pix-instructions {
      background: #F0F8FF;
      padding: 1rem;
      border-radius: 6px;
      margin: 1rem 0;
      font-size: 0.9rem;
    }
    
    .pix-instructions ol {
      padding-left: 1.2rem;
      margin: 0.5rem 0;
    }
    
    .pix-instructions li {
      margin-bottom: 0.5rem;
    }
    
    .copy-pix {
      display: inline-block;
      background: var(--primary);
      color: white;
      padding: 0.5rem 1rem;
      border-radius: 4px;
      font-size: 0.9rem;
      margin-top: 0.5rem;
      cursor: pointer;
      transition: background 0.3s;
    }
    
    .copy-pix:hover {
      background: var(--primary-dark);
    }
    
    .success-message {
      color: var(--success);
      font-weight: 500;
      margin-top: 0.5rem;
      display: none;
    }
    
    .error-message {
      color: var(--error);
      font-weight: 500;
      margin-top: 0.5rem;
      display: none;
    }
    
    footer {
      text-align: center;
      margin-top: 3rem;
      font-size: 0.8rem;
      color: var(--dark-gray);
      padding: 1rem 0;
      border-top: 1px solid var(--gray);
    }
    
    .loading {
      display: inline-block;
      width: 20px;
      height: 20px;
      border: 3px solid rgba(255,255,255,.3);
      border-radius: 50%;
      border-top-color: white;
      animation: spin 1s ease-in-out infinite;
      margin-right: 0.5rem;
    }
    
    @keyframes spin {
      to { transform: rotate(360deg); }
    }
    
    /* Responsividade adicional */
    @media (max-width: 400px) {
      body {
        padding: 0.75rem;
      }
      
      form, .cart-summary, #qrcode-container {
        padding: 1rem;
      }
    }
  </style>
</head>
<body>

<header>
  <img src="https://i.imgur.com/OwFmVtN.png" alt="FRAN BY FR Logo" />
  <h1>Finalizar Compra</h1>
</header>

<form id="checkout-form">
  <h2>Informações Pessoais</h2>
  
  <div class="form-group">
    <label for="name">Nome completo</label>
    <input type="text" id="name" name="name" placeholder="Nome e Sobrenome" required />
  </div>
  
  <div class="form-group">
    <label for="email">E-mail</label>
    <input type="email" id="email" name="email" placeholder="email@exemplo.com" required />
    <p class="info-text">Enviaremos a confirmação do pedido para este e-mail</p>
  </div>
  
  <div class="form-group">
    <label for="phone">Telefone</label>
    <input type="tel" id="phone" name="phone" placeholder="(99) 99999-9999" required />
  </div>
  
  <div class="form-group">
    <label for="document">CPF</label>
    <input type="text" id="document" name="document" placeholder="123.456.789-12" required />
  </div>
  
  <div class="checkbox-group">
    <input type="checkbox" id="deliveryForOther" name="deliveryForOther" />
    <label for="deliveryForOther" class="checkbox-label">Outra pessoa irá receber o pedido?</label>
  </div>
  
  <div id="receiver-info" style="display: none;">
    <div class="form-group">
      <label for="receiver-name">Nome do destinatário</label>
      <input type="text" id="receiver-name" name="receiver-name" placeholder="Nome completo do destinatário" />
    </div>
    
    <div class="form-group">
      <label for="receiver-phone">Telefone do destinatário</label>
      <input type="tel" id="receiver-phone" name="receiver-phone" placeholder="(99) 99999-9999" />
    </div>
  </div>
  
  <h2>Endereço de Entrega</h2>
  
  <div class="form-group">
    <label for="cep">CEP</label>
    <input type="text" id="cep" name="cep" placeholder="12345-000" required />
    <p class="info-text">Preencha seu CEP para calcularmos o frete</p>
  </div>
  
  <div class="form-group">
    <label for="address">Endereço</label>
    <input type="text" id="address" name="address" placeholder="Rua, Avenida, etc." required />
  </div>
  
  <div class="form-group">
    <label for="number">Número</label>
    <input type="text" id="number" name="number" placeholder="Número" required />
  </div>
  
  <div class="form-group">
    <label for="complement">Complemento (opcional)</label>
    <input type="text" id="complement" name="complement" placeholder="Apartamento, bloco, etc." />
  </div>
  
  <div class="form-group">
    <label for="neighborhood">Bairro</label>
    <input type="text" id="neighborhood" name="neighborhood" placeholder="Bairro" required />
  </div>
  
  <div class="form-group">
    <label for="city">Cidade</label>
    <input type="text" id="city" name="city" placeholder="Cidade" required />
  </div>
  
  <div class="form-group">
    <label for="state">Estado</label>
    <select id="state" name="state" required>
      <option value="">Selecione</option>
      <option value="AC">Acre</option>
      <option value="AL">Alagoas</option>
      <option value="AP">Amapá</option>
      <option value="AM">Amazonas</option>
      <option value="BA">Bahia</option>
      <option value="CE">Ceará</option>
      <option value="DF">Distrito Federal</option>
      <option value="ES">Espírito Santo</option>
      <option value="GO">Goiás</option>
      <option value="MA">Maranhão</option>
      <option value="MT">Mato Grosso</option>
      <option value="MS">Mato Grosso do Sul</option>
      <option value="MG">Minas Gerais</option>
      <option value="PA">Pará</option>
      <option value="PB">Paraíba</option>
      <option value="PR">Paraná</option>
      <option value="PE">Pernambuco</option>
      <option value="PI">Piauí</option>
      <option value="RJ">Rio de Janeiro</option>
      <option value="RN">Rio Grande do Norte</option>
      <option value="RS">Rio Grande do Sul</option>
      <option value="RO">Rondônia</option>
      <option value="RR">Roraima</option>
      <option value="SC">Santa Catarina</option>
      <option value="SP">São Paulo</option>
      <option value="SE">Sergipe</option>
      <option value="TO">Tocantins</option>
    </select>
  </div>
  
  <div id="delivery-options" class="delivery-options">
    <h2>Opções de Entrega</h2>
    <p class="info-text">Selecione o método de entrega desejado</p>
    
    <div class="delivery-option">
      <div>
        <input type="radio" id="delivery-standard" name="delivery" value="standard" />
        <label for="delivery-standard">Entrega Padrão</label>
        <p class="info-text">5-7 dias úteis</p>
      </div>
      <div>R$ 12,90</div>
    </div>
    
    <div class="delivery-option">
      <div>
        <input type="radio" id="delivery-express" name="delivery" value="express" />
        <label for="delivery-express">Entrega Expressa</label>
        <p class="info-text">2-3 dias úteis</p>
      </div>
      <div>R$ 24,90</div>
    </div>
  </div>
  
  <h2>Método de Pagamento</h2>
  <p class="info-text">Pagamento via PIX (10% de desconto)</p>
  
  <div id="error-message" class="error-message"></div>
  
  <button type="submit" id="submit-btn">
    <span id="btn-text">Finalizar Compra</span>
  </button>
</form>

<section class="cart-summary">
  <h2>Resumo do Pedido</h2>
  
  <div class="cart-item">
    <div class="cart-item-name">1x PAGUE 1 LEVE 3 COMBO PROMOCIONAL BY FRANCINY EHLKE LIMITADO</div>
    <div class="cart-item-price">R$ 49,87</div>
  </div>
  
  <div class="totals">
    <div class="total-row">
      <span>Subtotal:</span>
      <span>R$ 49,87</span>
    </div>
    <div class="total-row" id="shipping-row">
      <span>Frete:</span>
      <span>-</span>
    </div>
    <div class="total-row" id="discount-row" style="display: none;">
      <span>Desconto PIX:</span>
      <span>-R$ 4,99</span>
    </div>
    <div class="grand-total" id="grand-total">
      <span>Total:</span>
      <span>R$ 49,87</span>
    </div>
  </div>
</section>

<section id="qrcode-container">
  <h2>Pagamento via PIX</h2>
  
  <div class="pix-instructions">
    <p><strong>Como finalizar seu pagamento:</strong></p>
    <ol>
      <li>Abra o aplicativo do seu banco</li>
      <li>Selecione a opção PIX</li>
      <li>Escaneie o QR Code ou copie o código abaixo</li>
      <li>Confirme o pagamento</li>
    </ol>
    <p id="expiration-text" style="font-weight: 600; margin-top: 0.5rem;"></p>
  </div>
  
  <img id="qrcode-image" src="" alt="QR Code do PIX" />
  
  <p>Ou copie o código PIX abaixo:</p>
  <div id="pix-code" style="word-break: break-all; margin: 1rem 0; font-size: 0.9rem;"></div>
  <button class="copy-pix" id="copy-pix-btn">Copiar Código</button>
  <div class="success-message" id="copy-success">Código copiado com sucesso!</div>
  
  <p class="info-text" style="margin-top: 1rem;">Seu pedido será processado assim que o pagamento for confirmado.</p>
  
  <div id="order-info" style="margin-top: 1rem; font-size: 0.9rem; display: none;">
    <p>Número do pedido: <strong id="order-number"></strong></p>
  </div>
</section>

<footer>
  <p>© 2025 FRAN BY FR. Todos os direitos reservados.</p>
  <p>Em caso de dúvidas, entre em contato: contato@franbyfr.com.br</p>
</footer>

<script>
  // Máscaras para os campos
  function maskPhone(value) {
    return value
      .replace(/\D/g, '')
      .replace(/^(\d{2})(\d)/g, '($1) $2')
      .replace(/(\d)(\d{4})$/, '$1-$2');
  }
  
  function maskCPF(value) {
    return value
      .replace(/\D/g, '')
      .replace(/(\d{3})(\d)/, '$1.$2')
      .replace(/(\d{3})(\d)/, '$1.$2')
      .replace(/(\d{3})(\d{1,2})$/, '$1-$2');
  }
  
  function maskCEP(value) {
    return value
      .replace(/\D/g, '')
      .replace(/^(\d{5})(\d)/, '$1-$2');
  }

  // Aplicar máscaras
  document.getElementById('phone').addEventListener('input', e => {
    e.target.value = maskPhone(e.target.value);
  });
  
  document.getElementById('document').addEventListener('input', e => {
    e.target.value = maskCPF(e.target.value);
  });
  
  document.getElementById('cep').addEventListener('input', e => {
    e.target.value = maskCEP(e.target.value);
    
    // Quando o CEP estiver completo (8 dígitos), buscar endereço
    if (e.target.value.replace(/\D/g, '').length === 8) {
      fetchAddress(e.target.value.replace(/\D/g, ''));
    }
  });
  
  // Mostrar/ocultar informações do destinatário
  document.getElementById('deliveryForOther').addEventListener('change', function(e) {
    document.getElementById('receiver-info').style.display = e.target.checked ? 'block' : 'none';
  });
  
  // Buscar endereço via API ViaCEP
  async function fetchAddress(cep) {
    try {
      const response = await fetch(`https://viacep.com.br/ws/${cep}/json/`);
      const data = await response.json();
      
      if (!data.erro) {
        document.getElementById('address').value = data.logradouro || '';
        document.getElementById('neighborhood').value = data.bairro || '';
        document.getElementById('city').value = data.localidade || '';
        document.getElementById('state').value = data.uf || '';
        
        // Mostrar opções de entrega (simulado)
        document.getElementById('delivery-options').style.display = 'block';
        updateShipping(12.90); // Valor padrão
        
        // Focar no campo número
        document.getElementById('number').focus();
      } else {
        alert('CEP não encontrado. Por favor, verifique e tente novamente.');
      }
    } catch (error) {
      console.error('Erro ao buscar CEP:', error);
      alert('Ocorreu um erro ao buscar o CEP. Tente novamente mais tarde.');
    }
  }
  
  // Atualizar valor do frete e total
  function updateShipping(value) {
    const shippingRow = document.getElementById('shipping-row');
    const grandTotal = document.getElementById('grand-total');
    const discountRow = document.getElementById('discount-row');
    
    if (value > 0) {
      shippingRow.innerHTML = `<span>Frete:</span><span>R$ ${value.toFixed(2).replace('.', ',')}</span>`;
      
      // Calcular total com desconto PIX (10%)
      const subtotal = 49.87;
      const discount = (subtotal + value) * 0.1;
      const total = (subtotal + value) - discount;
      
      discountRow.style.display = 'flex';
      discountRow.innerHTML = `<span>Desconto PIX:</span><span>-R$ ${discount.toFixed(2).replace('.', ',')}</span>`;
      
      grandTotal.innerHTML = `<span>Total:</span><span>R$ ${total.toFixed(2).replace('.', ',')}</span>`;
    } else {
      shippingRow.innerHTML = `<span>Frete:</span><span>-</span>`;
      grandTotal.innerHTML = `<span>Total:</span><span>R$ 49,87</span>`;
      discountRow.style.display = 'none';
    }
  }
  
  // Selecionar opção de entrega
  document.querySelectorAll('input[name="delivery"]').forEach(radio => {
    radio.addEventListener('change', function() {
      if (this.value === 'standard') {
        updateShipping(12.90);
      } else if (this.value === 'express') {
        updateShipping(24.90);
      }
    });
  });
  
  // Copiar código PIX
  document.getElementById('copy-pix-btn').addEventListener('click', function() {
    const pixCode = document.getElementById('pix-code').textContent;
    navigator.clipboard.writeText(pixCode).then(() => {
      const copySuccess = document.getElementById('copy-success');
      copySuccess.style.display = 'block';
      setTimeout(() => {
        copySuccess.style.display = 'none';
      }, 3000);
    });
  });
  
  // Evento de envio do formulário
  document.getElementById('checkout-form').addEventListener('submit', async function(e) {
    e.preventDefault();
    
    // Validar campos obrigatórios
    const requiredFields = ['name', 'email', 'phone', 'document', 'cep', 'address', 'number', 'neighborhood', 'city', 'state'];
    let isValid = true;
    
    requiredFields.forEach(fieldId => {
      const field = document.getElementById(fieldId);
      if (!field.value.trim()) {
        field.style.borderColor = 'red';
        isValid = false;
      } else {
        field.style.borderColor = '';
      }
    });
    
    // Verificar se um método de entrega foi selecionado
    const deliverySelected = document.querySelector('input[name="delivery"]:checked');
    if (!deliverySelected) {
      alert('Por favor, selecione um método de entrega.');
      isValid = false;
    }
    
    if (!isValid) {
      alert('Por favor, preencha todos os campos obrigatórios.');
      return;
    }
    
    // Pegar o valor total do pedido
    const totalText = document.querySelector('#grand-total span:last-child').textContent;
    const totalValue = parseFloat(totalText.replace('R$ ', '').replace(',', '.'));
    
    // Simular envio do formulário
    const submitBtn = document.getElementById('submit-btn');
    const btnText = document.getElementById('btn-text');
    const errorMessage = document.getElementById('error-message');
    
    submitBtn.disabled = true;
    btnText.innerHTML = '<span class="loading"></span> Processando...';
    errorMessage.style.display = 'none';
    
    // Preparar dados para a API
    const payload = {
      name: document.getElementById('name').value.trim(),
      email: document.getElementById('email').value.trim(),
      document: document.getElementById('document').value.trim(),
      phone: document.getElementById('phone').value.trim(),
      totalCompra: totalValue
    };
    
    try {
      const response = await fetch('generate-pix.php', {
        method: 'POST',
        headers: {
          'Content-Type': 'application/json'
        },
        body: JSON.stringify(payload)
      });
      
      const data = await response.json();
      
      if (!response.ok) {
        throw new Error(data.error || 'Erro ao processar pagamento');
      }
      
      if (data.success) {
        // Mostrar QR Code e informações do pagamento
        showPixPayment(data);
      } else {
        throw new Error(data.error || 'Erro ao gerar pagamento PIX');
      }
    } catch (error) {
      console.error('Erro:', error);
      errorMessage.textContent = error.message;
      errorMessage.style.display = 'block';
    } finally {
      submitBtn.disabled = false;
      btnText.textContent = 'Finalizar Compra';
    }
  });
  
  // Mostrar QR Code do PIX com os dados da API
  function showPixPayment(data) {
    document.getElementById('pix-code').textContent = data.qrcode || '';
    document.getElementById('qrcode-image').src = data.qrcodeImage || '';
    document.getElementById('order-number').textContent = data.orderNumber || '';
    
    // Mostrar data de expiração se disponível
    if (data.expiration) {
      const expirationDate = new Date(data.expiration);
      const options = { 
        day: '2-digit', 
        month: '2-digit', 
        year: 'numeric', 
        hour: '2-digit', 
        minute: '2-digit' 
      };
      const formattedDate = expirationDate.toLocaleDateString('pt-BR', options);
      document.getElementById('expiration-text').textContent = `Validade: ${formattedDate}`;
    }
    
    // Mostrar seção de pagamento
    document.getElementById('qrcode-container').style.display = 'block';
    document.getElementById('order-info').style.display = 'block';
    
    // Rolagem suave para a seção do PIX
    document.getElementById('qrcode-container').scrollIntoView({ behavior: 'smooth' });
  }
</script>

</body>
</html>