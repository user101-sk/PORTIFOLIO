const mutante = document.getElementById('elemento-mutante');

// Função que verifica a posição do utilizador e aplica as classes
function atualizarAnimacao() {
    const scrollY = window.scrollY;
    
    // Descobre qual é a altura exata do monitor da pessoa no momento (útil se ele der zoom)
    const alturaTela = window.innerHeight;

    // Limpa os estados antigos
    mutante.classList.remove('estado-quadrado', 'estado-bolinha', 'estado-botao');

    // Se o scroll passou da metade da primeira tela, fica quadrado
    if (scrollY < alturaTela * 0.5) {
        mutante.classList.add('estado-quadrado'); 
    } 
    // Se o scroll está na segunda tela, vira bolinha no canto
    else if (scrollY >= alturaTela * 0.5 && scrollY < alturaTela * 1.5) {
        mutante.classList.add('estado-bolinha'); 
    } 
    // Se o scroll chegou à terceira tela, vira botão
    else {
        mutante.classList.add('estado-botao'); 
    }
}

// Ouve tanto o scroll da roda do rato quanto se a pessoa alterar o zoom/tamanho da janela
window.addEventListener('scroll', atualizarAnimacao);
window.addEventListener('resize', atualizarAnimacao);

// Roda a função uma vez assim que a página carrega para posicionar tudo corretamente
atualizarAnimacao();