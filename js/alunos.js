document.addEventListener('DOMContentLoaded', () => {
   const tabela = new TabelaInterativa({
    tabelaId: 'tabela-alunos',
    filtroId: 'campo-filtro',
    msgVaioId: 'msg-vazio',
   });
   tabela.iniciar();
});