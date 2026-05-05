document.addEventListener('DOMContentLoaded', () => {
    const tabela = new TabelaInterativa({
        tabelaId: 'tabela-exercicios',
        campoId: 'campo-filtro',
    });
    tabela.iniciar();
});

