// Este arquivo deve lidar com a interação do frontend, ou seja, enviar os dados para o backend PHP.

// Enviar dados para ChatGPT
// document.getElementById('generate-report').addEventListener('click', async function() {
//     const prompt = 'Informe o que você gostaria de consultar para gerar o relatório';
//     try {
//         const response = await fetch('../includes/requisicao_api.php', {
//             method: 'POST',
//             headers: {
//                 'Content-Type': 'application/json',
//             },
//             body: JSON.stringify({ prompt })  // Envia o prompt para o servidor
//         });

//         const data = await response.json();
//         if (data.error) {
//             console.error('Erro:', data.error);
//         } else {
//             console.log('Relatório gerado com sucesso!');
//         }
//     } catch (error) {
//         console.error('Erro ao chamar a API:', error);
//     }
// });
