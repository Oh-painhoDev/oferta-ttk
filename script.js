document.addEventListener('DOMContentLoaded', function() {
    const payWithPixBtn = document.getElementById('payWithPix');
    const pixModal = document.getElementById('pixModal');
    const closeBtn = document.querySelector('.close');
    const copyPixCodeBtn = document.getElementById('copyPixCode');
    const pixCodeInput = document.getElementById('pixCode');
    
    // Gerar QRCode quando o modal abrir
    payWithPixBtn.addEventListener('click', function() {
        pixModal.style.display = 'block';
        
        // Limpa o QRCode anterior se existir
        document.getElementById('qrcode').innerHTML = '';
        
        // Gera novo QRCode com o código PIX
        new QRCode(document.getElementById('qrcode'), {
            text: pixCodeInput.value,
            width: 200,
            height: 200,
            colorDark: "#000000",
            colorLight: "#ffffff",
            correctLevel: QRCode.CorrectLevel.H
        });
    });
    
    // Fechar modal
    closeBtn.addEventListener('click', function() {
        pixModal.style.display = 'none';
    });
    
    // Fechar modal ao clicar fora
    window.addEventListener('click', function(event) {
        if (event.target === pixModal) {
            pixModal.style.display = 'none';
        }
    });
    
    // Copiar código PIX
    copyPixCodeBtn.addEventListener('click', function() {
        pixCodeInput.select();
        document.execCommand('copy');
        
        // Feedback visual
        const originalText = copyPixCodeBtn.textContent;
        copyPixCodeBtn.textContent = 'Copiado!';
        setTimeout(() => {
            copyPixCodeBtn.textContent = originalText;
        }, 2000);
    });
    
    // Simular verificação de pagamento (em produção, você usaria uma API)
    function checkPayment() {
        // Esta é apenas uma simulação
        // Em um sistema real, você faria uma requisição para seu backend
        // que verificaria com o PSP (PagSeguro, Mercado Pago, etc) se o pagamento foi realizado
        console.log("Verificando pagamento...");
    }
    
    // Verificar pagamento a cada 5 segundos (simulação)
    setInterval(checkPayment, 5000);
});