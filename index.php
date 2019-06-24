<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>PAGO DIARIO</title>
    <meta name ="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  </head>
  <body style= "">

    <form class="form-inline" action="index.php" method="post">
  <div class="form-group mx-sm-3 mb-2">
    <input type="text" name="producto" placeholder="ingrese un producto">
  </div>
  <button type="submit" class="btn btn-primary mb-3"  value="Enviar">ENVIAR</button>
</form>



    <div class="container py-5">

      <div class="row d-flex">


        <?php

          if (empty($_POST['producto'])) {

            $palabraClave = "led";

          }
          else {
            $palabraClave = $_POST['producto'];
          }

         require 'simple_html_dom.php';



        $html = file_get_html('https://www.genesiohogar.com/'.$palabraClave.'_qO'.$palabraClave.'xSM');

        $error = $html->find('li[class=selected]');
        echo $errorFinal = implode( "", $error );

        foreach ( $html->find('article') as $art) {

          $images = array();
          foreach($art->find('img') as $img) {
           $images[] = $img->src;
          }

        $titulo = array();
        foreach($art->find('img') as $tit) {
         $titulo[] = $tit->title;
        }

        foreach($art->find('[class=ch-price]') as $pre) {
         $precio = $pre->plaintext;
        }
        $precioFinal =str_replace( "$" , "" , $precio );

        echo "<div class ='col-md-4 col-sm-12 p-4'>";
        echo "<img src=";
        echo $imagenFinal = implode ( "", $images );
        echo ">";
        echo "<br>";
        echo $tituloFinal = implode ( "", $titulo );
        echo "<br>";
        echo "<strong>";
        echo "precio financiado a 90 dias :"." $" .round(((int)$precioFinal*2.2)/90) ." x dia";
        echo "</strong>";
        echo "<br>";
        echo "<a class='btn btn-primary' href='https://api.whatsapp.com/send?phone=5493513289703' role='button'>CONTACTAME</a>";
        echo "<br>";
        echo "</div>";

        }

        ?>

      </div>

    </div>

    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" crossorigin="anonymous"></script>

    </script>
  </body>
</html>
