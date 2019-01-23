<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Homework 3</title>
    <link rel="stylesheet" href="css/style.css">

</head>

<body>
    <div class="container-wrap">
        <div class="container">
            <h1>Input</h1>
            <div class="container-input">
                <form action="<?php $_SERVER['PHP_SELF'] ?>" method="post">
                    <div class="input-wrap">
                        <label for="row">Broj redaka</label>
                        <input type="text" name="row" id="row">
                    </div>
                    <div class="input-wrap">
                        <label for="column">Broj stupaca</label>
                        <input type="text" name="column" id="column">
                    </div>
                    <input type="submit" value="KREIRAJ TABLICU">
                </form>
            </div>
            <div class="container-output">
                <table>
                    <tbody>
                    <tr>
                        <td>1</td>
                        <td>2</td>
                        <td>3</td>
                        <td>4</td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>


</body>

</html>