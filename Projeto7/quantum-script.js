document.addEventListener('DOMContentLoaded', () => {
    
    // 1. Animação de entrada da página inteira
    const conteudo = document.getElementById('conteudo-principal');
    setTimeout(() => {
        conteudo.classList.remove('esconder-inicio');
    }, 100);

    // 2. Animação do Gráfico de Barras
    // Dá um pequeno atraso para o gráfico crescer só depois de a página aparecer
    setTimeout(() => {
        const barras = document.querySelectorAll('.barra');
        
        barras.forEach(barra => {
            // Puxa o valor do data-altura do HTML (ex: "85%")
            const alturaAlvo = barra.getAttribute('data-altura');
            
            // Aplica a altura, e o CSS encarrega-se de fazer a transição suave
            barra.style.height = alturaAlvo;
        });
    }, 500); // Começa a crescer meio segundo depois

});