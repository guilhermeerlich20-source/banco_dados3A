class TabelaInterativa {
    #config;
    #tabela;
    #corpoTabela;
    #campo;

    constructor(config) {
        this.#config = config;
    }

    iniciar(){
      this.#tabela = document.getElementById(this.#config.tabelaId);
      this.#campo = document.getElementById(this.#config.campoId);
      this.#corpoTabela = this.#tabela.querySelector('tbody');

      this.#campo.addEventListener('input', () => {
        this.#filtrar();
    });
   }

    #filtrar() {
        const termo = this.#campo.value.toLowerCase();
        const linhas = this.#corpoTabela.querySelectorAll('tr');

        linhas.forEach((linha) => {
            let texto = linha.textContent.toLowerCase();
            if(texto.includes(termo)) {
                linha.classList.remove('d-none');
            } else {
                linha.classList.add('d-none');
            }
        });
    }
}