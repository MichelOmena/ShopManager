/*DataTables*/
$(document).ready( function () {
    $('#example').DataTable();
    // data: data
} );

$(document).ready( function () {
    $('#example2').DataTable();
    // data: data
} );

/*Modal*/
// function openModal(ean, referencia, descricao) {
//     $('#ean').val(ean);
//     $('#referencia').val(referencia);
//     $('#descricao').val(descricao);

//     //Abrir o modal
//     $('#editModal').modal('show');
// }

// $(document).ready(function () {
//     //configuracao do botao de salvar
//     $('#saveChanges').on('click', function () {
//         const updateData = {
//             ean: $('#ean').val(),
//             referencia: $('#referencia').val(),
//             descricao: $('#descricao').val(),
//         };
//         // Enviar os dados Ajax
//         // $.ajax({
//         //     url: '/updateRecord.php', // exemplo
//         //     type: 'POST',
//         //     data: updateData,
//         //     success: function (response) {
//         //         // atualizar tabela sem recarregar
//         //         alert('Registo atualizado com sucesso!');
//         //         $('#editModal').modal('hide');
//         //     },
//         //     error: function () {
//         //         alert('Erro ao atualizar o registo.');
//         //     },
//         // });
//     });
// });

// Mapeamento de colunas

document.getElementById('uploadBtn').addEventListener('click', function() {
    const formData = new FormData(document.getElementById('uploadForm'));
    fetch('process_csv.php', {
            method: 'POST',
            body: formData
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                const mappingSection = document.getElementById('mappingSection');
                const mappingTable = document.getElementById('mappingTable');

                mappingTable.innerHTML = '';

                data.dbColumns.forEach(dbColumn => {
                    const row = document.createElement('tr');
                    const dbColCell = document.createElement('td');
                    dbColCell.textContent = dbColumn;

                    const csvColCell = document.createElement('td');
                    const select = document.createElement('select');
                    select.name = `mapping[${dbColumn}]`;

                    const defaultOption = document.createElement('option');
                    defaultOption.value = '';
                    defaultOption.textContent = '-- Selecionar --';
                    select.appendChild(defaultOption);

                    data.csvColumns.forEach(csvColumn => {
                        const option = document.createElement('option');
                        option.value = csvColumn;
                        option.textContent = csvColumn;
                        select.appendChild(option);
                    });

                    csvColCell.appendChild(select);

                    row.appendChild(dbColCell);
                    row.appendChild(csvColCell);
                    mappingTable.appendChild(row);

                });

                mappingSection.style.display = 'block';
            } else {
                alert('Erro ao processar o arquivo CSV.');
            }
        });
});