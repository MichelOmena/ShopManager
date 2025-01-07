/*DataTables*/
$(document).ready( function () {
    $('#table_product').DataTable();
});
/*Fim DataTables*/

// /* Modal Categoria/Sub */
// // Função para abrir o modal de categorias e carregar as opções no dropdown
// function openCategoriaModal(ean, categorias) {
//     const dropdown = document.getElementById('categoriaDropdown');
//     dropdown.innerHTML = '<option value="" selected>Selecione uma Categoria</option>'; // Resetar opções

//     categorias.forEach(categoria => {
//         const option = document.createElement('option');
//         option.value = categoria.toLowerCase().replace(/\s/g, '_'); // Valor pode ser ajustado
//         option.textContent = categoria; // Corrigido para usar "option"
//         dropdown.appendChild(option);
//     });

//     // Abrir o Modal
//     const modal = new bootstrap.Modal(document.getElementById('categoriaModal')); // Corrigido ID como string
//     modal.show();

//     // Adicionar evento ao dropdown para salvar escolha
//     dropdown.onchange = function () {
//         if (this.value) {
//             updateSelection(ean, 'categoria', this.options[this.selectedIndex].text); // Corrigido para usar "selectedIndex"
//             modal.hide(); // Fechar o modal
//         }
//     };
// }

// // Função para abrir o modal de subcategorias e carregar as opções no dropdown
// function openSubcategoriaModal(ean, subcategorias) {
//     const dropdown = document.getElementById('subcategoriaDropdown');
//     dropdown.innerHTML = '<option value="" selected>Selecione uma Subcategoria</option>'; // Resetar opções

//     subcategorias.forEach(subcategoria => {
//         const option = document.createElement('option');
//         option.value = subcategoria.toLowerCase().replace(/\s/g, '_');
//         option.textContent = subcategoria;
//         dropdown.appendChild(option);
//     });

//     // Abrir o modal
//     const modal = new bootstrap.Modal(document.getElementById('subcategoriaModal')); // Corrigido ID como string
//     modal.show();

//     // Adicionar evento ao dropdown para salvar escolha
//     dropdown.onchange = function () {
//         if (this.value) {
//             updateSelection(ean, 'subcategoria', this.options[this.selectedIndex].text); // Corrigido para usar "selectedIndex"
//             modal.hide(); // Fechar modal
//         }
//     };
// }

// // Função para atualizar a exibição da seleção feita
// function updateSelection(ean, type, selectedText) {
//     const buttonId = `${type}Btn_${ean}`;
//     const button = document.getElementById(buttonId);

//     // Substituir o botão por um texto clicável
//     button.outerHTML = `
//         <span id="${buttonId}" class="text-primary" 
//               style="cursor: pointer;" 
//               onclick="open${type.charAt(0).toUpperCase() + type.slice(1)}Modal('${ean}', ${type === 'categoria' ? 'categorias' : 'subcategorias'})">
//             ${selectedText}
//         </span>`;
// }

//Fim do Modal

//Pagina de Upload do CSV
// Mapeamento de colunas
// document.getElementById('uploadBtn').addEventListener('click', function() {
//     const formData = new FormData(document.getElementById('uploadForm'));
//     fetch('process_csv.php', {
//             method: 'POST',
//             body: formData
//         })
//         .then(response => response.json())
//         .then(data => {
//             if (data.success) {
//                 const mappingSection = document.getElementById('mappingSection');
//                 const mappingTable = document.getElementById('mappingTable');

//                 mappingTable.innerHTML = '';

//                 data.dbColumns.forEach(dbColumn => {
//                     const row = document.createElement('tr');
//                     const dbColCell = document.createElement('td');
//                     dbColCell.textContent = dbColumn;

//                     const csvColCell = document.createElement('td');
//                     const select = document.createElement('select');
//                     select.name = `mapping[${dbColumn}]`;

//                     const defaultOption = document.createElement('option');
//                     defaultOption.value = '';
//                     defaultOption.textContent = '-- Selecionar --';
//                     select.appendChild(defaultOption);

//                     data.csvColumns.forEach(csvColumn => {
//                         const option = document.createElement('option');
//                         option.value = csvColumn;
//                         option.textContent = csvColumn;
//                         select.appendChild(option);
//                     });

//                     csvColCell.appendChild(select);

//                     row.appendChild(dbColCell);
//                     row.appendChild(csvColCell);
//                     mappingTable.appendChild(row);

//                 });

//                 mappingSection.style.display = 'block';
//             } else {
//                 alert('Erro ao processar o arquivo CSV.');
//             }
//         });
// });