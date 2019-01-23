<?php

$rows = $_POST['row'];
$columns = $_POST['column'];

function doJob($rows,$columns)
{
    $data = [];
    for ($i=0;$i<$rows;$i++) {
        $column = [];
        for ($j=0;$j<$columns;$j++){
            $column[] = 0;
        }
        $data[] = $column;
    }

    $counter = 1;

    $a=1; // circuit counter

    while ($counter<=$rows*$columns) {

        for ($i=$a-1;$i<$columns-($a-1);$i++){
            if($counter>$rows*$columns){
                return $data;
            }
            $data[$a-1][$i]=$counter++;

        }

        for($i=$a;$i<$rows-$a;$i++){
            if($counter>$rows*$columns){
                return $data;
            }
            $data[$i][$columns-$a]=$counter++;

        }

        for($i=$columns-$a; $i>=($a-1);$i--){
            if($counter>$rows*$columns){
                return $data;
            }
            $data[$rows-$a][$i]=$counter++;

        }

        for($i=$rows-($a+1); $i>($a-1);$i--){              
            if($counter>$rows*$columns){
                return $data;
            }
            $data[$i][$a-1]=$counter++;
        }
        $a++;
    }
    return $data;
}

$data = doJob($rows,$columns);

?>
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
            <div class="container-input">
                <h1>Input</h1>
                <form action="<?php $_SERVER['PHP_SELF'] ?>" method="post">
                    <div class="input-wrap">
                        <label for="row">Broj redaka</label>
                        <input type="text" name="row" id="row" value="<?php echo $rows; ?>">
                    </div>
                    <div class="input-wrap">
                        <label for="column">Broj stupaca</label>
                        <input type="text" name="column" id="column" value="<?php echo $columns; ?>">
                    </div>
                    <input type="submit" value="KREIRAJ TABLICU">
                </form>
            </div>
            <div class="container-output">
                <h1>Output</h1>
                <table>
                    <tbody>
                        <?php

                        for ($i=0;$i<$rows;$i++) {
                            echo '<tr>';
                            for ($j=0;$j<$columns;$j++) {
                                echo '<td>' . $data[$i][$j] . '</td>';
                            }
                            echo '</tr>';
                        }

                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>


</body>

</html>