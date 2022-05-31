<?php
if ($_GET) {

    $ciudad = str_replace (" ","",$_GET["ciudad"]);
    
            $file = "https://es.weather-forecast.com/locations/".$ciudad."/forecasts/latest";
            $file_headers = @get_headers($file);
                if(!$file_headers || $file_headers[0] == 'HTTP/1.1 404 Not Found') {
                    $error = "No hemos podido encontrar esa ciudad";
                }
                else {
                    $previsionTiempo = "";
                    $paginaForecast = file_get_contents ("https://es.weather-forecast.com/locations/".$ciudad."/forecasts/latest");
                    $array1 = explode ('1&ndash;3 días)</div><p class="b-forecast__table-description-content"><span class="phrase">',$paginaForecast);
                    $array2 = explode ('</span></p></td><td class="b-forecast__table-description-cell--js"',$array1[1]);
                    $previsionTiempo = $array2[0];
                }
            }
 
?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <title>Que tiempo hace</title>
    <style type="text/css"> 
        html { 
        background: url(weather.jpg) no-repeat center center fixed; 
        -webkit-background-size: cover;
        -moz-background-size: cover;
        -o-background-size: cover;
        background-size: cover;
        }
        body {
            background: none;
        }
        .container {
            text-align: center;
            margin-top: 250px;
            width: 450px;
        }

        input {
            margin: 20px 0;
        }
        #previsionTiempo {
            margin-top: 20px;
            font-weight: bold;
        }
    </style>
  </head>
  <body>
        <div class="container">
            <h1>Como esta el día</h1>
            <form>
                <div class="form-group">
                    <label for="exampleInputEmail1">Ingresa el nombre de tu ciudad</label>
                    <input type="text" class="form-control" id="ciudad" aria-describedby="ciudadClima" name="ciudad" placeholder="Por ej. Buenos Aires, Tokyo">
                </div>
                <button type="submit" class="btn btn-primary">Enviar</button>
            </form>
            
                <?php
                    if ($_GET) {
                        echo "<div id=\"previsionTiempo\" class=\"alert alert-info\" role=\"alert\">";
                        echo "<p>El pronostico para ".$_GET["ciudad"]." es:";
                        if ($previsionTiempo !== "") {
                            echo "<p>$previsionTiempo</p>";
                        } else {
                            echo "el array esta vacioo";
                        }
                    }
                        echo "</div>";
                ?>
            
        </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>