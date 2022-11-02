var btn = document.getElementById("btn");

btn.addEventListener('click', async () => {

    const req = await axios.post('../backend/index.php', { }, {
        params: { 
            nome: document.getElementById("nome").value, 
            email: document.getElementById("email").value, 
            telefone: document.getElementById("telefone").value, 
            mensagem: document.getElementById("mensagem").value 
        },
        headers: { 'Content-Type': 'multipart/form-data' },
    });

    window.alert(req.data);
    if(req.data === 'Cadastrado com sucesso'){
        document.getElementById("nome").value = '';
        document.getElementById("email").value = '';
        document.getElementById("telefone").value = '';
        document.getElementById("mensagem").value = '';
    }
})