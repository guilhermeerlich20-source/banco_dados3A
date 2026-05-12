document.addEventListener('DOMContentLoaded', () => {
    const tabela = new TabelaInterativa({
        tabelaId: 'tabela-exercicios',
        campoId: 'campo-filtro',
        msgVazioId: 'msg-vazio'
    });
    tabela.iniciar();
});

