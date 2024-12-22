<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--Css-->
    <link rel="stylesheet" href="./assets/styles/styles.css">
    <!-- Local Bootstrap -->
    <link rel="stylesheet" href="./assets/styles/bootstrap.min.css">
    <title>Upload CSV</title>
</head>

<body>
    <div class="container d-flex justify-content-center align-items-center">
        <div class="background-wrapper col-lg-12">
            <img src="./assets/img/christmas-frame.jpg" alt="plano_de_fundo" class="background_image" width="100%">
        </div>
    </div>
    <div class="row">
        <div class="container d-flex justify-content-center align-items-center min-vh-100">
            <div class="bg-light p-4 rounded shadow-lg col-lg-6">
                <div class="mt-5 mb-5">
                    <h1 class="text-black text-center">Upload CSV</h1>
                </div>
                <form id="uploadForm" enctype="multipart/form-data">
                    <label for="csvFile">Selecione o arquivo CSV</label>
                    <input type="file" id="csvFile" name="csvFile" accept=".csv" required>
                    <div class="d-flex justify-content-center mt-4">
                        <button type="button" id="uploadBtn">Salvar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!----------------------------------------------------------------------------->
    <!--Modal-->
    <div class="modal fade" id="columnModal" tabindex="-1" aria-labelledby="columnModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="moda-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="columnModalLabel">Selecione as colunas para importar</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body"></div>
                <form id="columnSelectionForm">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="id_produto" name="columns[]" value="id_produto" checked>
                        <label for=""></label>
                    </div>
                </form>
            </div>
        </div>
    </div>
    </div>

    <!--Scripts-->
    <script src="/assets/javascript/scripts.js"></script>
</body>

</html>