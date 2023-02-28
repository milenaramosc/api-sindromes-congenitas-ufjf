<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <meta charset="ISO-8859-1" http-equiv=Content-Type content='text/html' name='viewport'>
    <title><?=$title?></title>

</head>

<body class="align-items-center p-4">
    <div class="d-flex flex-column justify-content-between">
        <h3 class=' text-center fw-bold'>RELATÓRIO DA APLICAÇÃO</h3>
        <div class="text-center fw-semibold fs-3 p-4">
            <h6>
                De acordo com as respostas coletadas, recomendamos que o(a) paciente seja encaminhado(a) para as
                seguintes
                especialidades a fim de obter melhor orientação e diagnóstico
            </h6>
        </div>
        <p class="list-group-item fw-bold fs-6 pt-4" aria-current="true">Consultar as possiveis especialidades:</p>
        <ol class="list-group list-group-numbered text-uppercase">
            <?php
            foreach ($especialidades as $especialidade) {
                echo "<li class='list-group-item list-group-item-action'>$especialidade</li>";
            }?>
        </ol>
    </div>
</body>

</html>