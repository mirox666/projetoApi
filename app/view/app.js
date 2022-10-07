async function carregarDados(){
    const url = "http://localhost/projetoApi/api/produto"

    try {
        const resultado = await fetch(url)
        const dados = await resultado.json()

        console.log(dados.data)
        for(elementos of dados.data){
            console.log(elementos)
        }
    } catch (error) {
        console.log(`O seguinte erro ocorreu: ${error}`)
    }
}

carregarDados()