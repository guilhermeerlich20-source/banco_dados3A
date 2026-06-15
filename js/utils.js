document.addEventListener('DOMContentLoaded', ()  => {
    const form = document.querySelector('form');
    const campoCep = document.querySelector('#cep');
    const senha = document.querySelector('#senha');
    const confirmaSenha = document.querySelector('#confirmaSenha');
    const btnSalvar = document.querySelector('#btnSalvar');

    document.querySelectorAll('[data-mascara]').forEach(input => {
        input.addEventListener('input', (e) => {
           const padrao = e.target.dataset.mascara; //(00) 00000-0000
           let valor = e.target.value.replace(/\D/g, ''); // Remove tudo que não for número
           let res = '', idx = 0;
           for (let i = 0; i < padrao.length && idx < valor.length; i++) {
            res += padrao[i] === '0' ? valor[idx++] : padrao[i];
           }    
           e.target.value = res;
        });
    });

    // Busca do Cep
    if (campoCep) {
        campoCep.addEventListener('blur', async () => {
            let cep = campoCep.value.replace(/\D/g, '');
            if (cep.length !== 8) return;
            try {
                const res = await fetch(`https://viacep.com.br/ws/${cep}/json/`);
                const dados = await res.json();
                if (!dados.erro) {
                document.querySelector('#logradouro').value = dados.logradouro;
                document.querySelector('#bairro').value = dados.bairro;
                document.querySelector('#cidade').value = dados.cidade;
                document.querySelector('#estado').value = dados.uf;
            } 
            } catch (error) {
                console.error('Erro ao buscar CEP:', error);
            }
        });
    }

    if (senha && confirmaSenha && btnSalvar) {
        console.log('Configurações de senha ativadas');
        const configurarToggleSenha = (btnId, InputId) => {
            btn = document.querySelector(btnId);
            if(!btn) return;
            const input = document.querySelector(InputId);
            const icone = btn.querySelector('i');
            btn.addEventListener('click', () => {
                const tipo = input.getAttribute('type') === 'password' ? 'text' : 'password';
                input.setAttribute('type', tipo);
                icone.classList.toggle('bi-eye-slash');
                icone.classList.toggle('bi-eye');
            });
        };
        configurarToggleSenha('#toggleSenha', '#senha');
        configurarToggleSenha('#toggleConfirmaSenha', '#confirmaSenha');

        const validar = () => {
            const Senha = senha.value !== "";
            const erro = Senha && senha.value !== confirmaSenha.value;
            confirmaSenha.style.borderColor = !Senha ? '' : (erro ? 'red' : 'green');
            btnSalvar.disabled = erro;
        };
        senha.addEventListener('input', validar);
        confirmaSenha.addEventListener('input', validar);
      }
});
