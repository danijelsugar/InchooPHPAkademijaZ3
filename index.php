<?php

$rows = isset($_POST['row']) ? $_POST['row'] : 0;   //number of rows entered
$columns = isset($_POST['column']) ? $_POST['column'] : 0; //number of columns entered
/**
 * @param $rows -first param, desired number of rows entered by user
 * @param $columns -second param, desired number of columns entered by user
 * @return array -two-dimensional array of numbers to fill $rows*$columns size table
 */
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

    $counter = 1;   //numbers counter

    $a=1; // circuit counter

    while ($counter<=$rows*$columns) {  //while counter is smaller than $rows*$columns

        for ($i=$a-1;$i<$columns-($a-1);$i++){ // 1. Right
            if($counter>$rows*$columns){
                return $data;
            }
            $data[$a-1][$i]=$counter++;

        }

        for($i=$a;$i<$rows-$a;$i++){    //2. Down
            if($counter>$rows*$columns){
                return $data;
            }
            $data[$i][$columns-$a]=$counter++;

        }

        for($i=$columns-$a; $i>=($a-1);$i--){   //3. left
            if($counter>$rows*$columns){
                return $data;
            }
            $data[$rows-$a][$i]=$counter++;

        }

        for($i=$rows-($a+1); $i>($a-1);$i--){   //4. up
            if($counter>$rows*$columns){
                return $data;
            }
            $data[$i][$a-1]=$counter++;
        }
        $a++;
    }
    return $data;   //returnd two-dimensional array
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