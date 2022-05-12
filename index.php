<!doctype html>
<html lang="ru">
<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <title>Отдел кадров</title>
</head>
<body>

    <div class="container" align="center">
        <h3 align="center">Отдел кадров</h3> <br>

        <div class="form-check form-check-inline">

            <input class="form-check-input" type="radio" name="flexRadioDefault" id="all" checked>
            <label class="form-check-label" for="all">
                Отобразить все
            </label>
        </div>

        <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="flexRadioDefault" id="trial" >
            <label class="form-check-label" for="trial">
                Испытательный срок
            </label>
        </div>
        <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="flexRadioDefault" id="fired" >
            <label class="form-check-label" for="fired">
                Уволенные
            </label>
        </div>
         <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="flexRadioDefault" id="chief" >
            <label class="form-check-label" for="chief">
                Начальники
            </label>
         </div>

    <div class="table" id="pagination_data"></div>
    </div>


</body>
</html>

<script src="js/load.js"></script>