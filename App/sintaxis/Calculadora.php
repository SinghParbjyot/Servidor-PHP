
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<fieldset style="background: lightseagreen; width: 700px;margin: 10%">Calculadora
    <form action="calcular.php" method="post">
        <input type="text" name="operando" id="">
        <select name="operador" id="">
            <option value="+">+</option>
            <option value="-">-</option>
            <option value="*">*</option>
            <option value="/">/</option>
        </select>
        <input type="text" name="operando2" id="">
        <input type="submit" value="Calcular">
    </form>
</fieldset>

</body>
</html>
