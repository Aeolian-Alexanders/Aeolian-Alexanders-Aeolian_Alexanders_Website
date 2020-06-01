<!DOCTYPE html>
<html lang="en">
<head>
  <head>
    <title>Aeolian Alexanders: Coin Information</title>
    <meta charset="utf-8">
    <link rel="icon" type="image/svg+xml" href="/aeolis/img/aeolis_logo.svg">
    <link rel="alternate icon" href="/aeolis/favicon.ico">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
  </head>
<body>

<?php
  include('dbconnect.php');
  try {
    $pdo = new PDO("pgsql:host=$host;dbname=$dbname", $dbuser, $dbpass);
  }catch (PDOException $e) {
    echo "Error : " . $e->getMessage() . "<br/>";
    die();
  }

  //echo 'Hello ' . htmlspecialchars($_GET["coin_id"]) . '!';
  $id = strval($_GET["coin_id"]);
  //$id = '1';

  $sth = $pdo->prepare('SELECT * FROM all_coins WHERE coinid = :parameter');
  $sth->bindParam(':parameter', $id, PDO::PARAM_STR);
  $sth->execute();
  $result = $sth -> fetch();
  include('nav.php');
    ?>
    <br/>
    <br/>
    <br/>
    <main role="main">

    <br/>

    <div class="row">
      <div class="col-md-3" style="padding-left: 25px;">
        <h3>Coin Information</h3>
        <br/>
        <br/>

      <?php

          echo '<h6> Coin ID: ' . $result["coinid"]. '</h6>';
          echo '<h6> Mint: ' . $result["mint"]. '</h6>';
          echo '<h6> Title: ' . $result["title"]. '</h6>';
          echo '<h6> Weight: ' . $result["weight"]. '</h6>';
          echo '<h6> Size: ' . $result["size"]. '</h6>';
          echo '<h6> Material: <a href="http://nomisma.org/id/ar" target="_blank">AR (silver)</a></h6>';
          echo '<h6> denomenation: <a href="http://nomisma.org/id/tetradrachm" target="_blank">Tetradrachm</a></h6>';
          echo '<h6> Rotation: ' . $result["rotation"]. '</h6>';
          if (is_numeric($result["typeid"]))
          {
            echo '<h6> Type ID: <a href="http://numismatics.org/pella/id/price.'.$result["typeid"].'" "target="_blank">'.$result["typeid"].'</a></h6>';
          }
          else
          {
            echo '<h6> Type ID: '.$result["typeid"].'</h6>';
          }
          echo '<h6> Obverse Die: <a href="/aeolis/obversedies/'.$result["obvdie"].'" target="_blank">'.$result["obvdie"].'</a></h6>';
          echo '<h6> Reverse Die: <a href="/aeolis/reversedies/'.$result["revdie"].'" target="_blank">'.$result["revdie"].'</a></h6>';
          echo '<a href="/aeolis/coins/'.$result["coinid"].'/rdf" target="_blank">RDF</a>';

      ?>
      </div>
      <div class="col-md-3"><h3>Obverse</h3>
        <?php
        echo '<img src="https://raw.githubusercontent.com/Aeolian-Alexanders/coins/master/images/'.$result["coinid"].'_o.png" alt="coin obverse image" class="img-thumbnail">';
        ?>
      </div>
      <div class="col-md-3"><h3>Reverse</h3>
            <?php
        echo '<img src="https://raw.githubusercontent.com/Aeolian-Alexanders/coins/master/images/'.$result["coinid"].'_r.png" alt="coin reverse image" class="img-thumbnail">';
        ?>
      </div>

    </div>
  </main>



</body>
</html>
