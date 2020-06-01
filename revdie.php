<!DOCTYPE html>
<html lang="en">
<head>
  <title>Aeolian Alexanders: Reverse Die Information</title>
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
  $id = strval($_GET["reverse_id"]);
  //$id = '1';
  $sth = $pdo->prepare('SELECT coinid FROM all_coins WHERE revdie = :parameter');
  $sth->bindParam(':parameter', $id, PDO::PARAM_STR);
  $sth->execute();
  $obverseids = $sth->fetchAll();

  include('nav.php');
    ?>
    <br/>
    <br/>
    <br/>
    <main role="main">

    <br/>

    <div class="container">

      <h1 class="font-weight-light text-center text-lg-left mt-4 mb-0">

        <?php

            echo "Reverse ID: " . $id;
        ?></h1>
        <h1 class="font-weight-light text-center text-lg-left mt-4 mb-0">
          Coins:
        </h1>

      <hr class="mt-2 mb-5">

      <div class="row text-center text-lg-left">
<?php

foreach ($obverseids as $row) {
  echo '<div class="col-lg-3 col-md-4 col-6">';
  echo '<a href="/aeolis/coins/'.$row["coinid"].'" class="d-block mb-4 h-100" target="_blank">';
    echo '<img class="img-fluid img-thumbnail" src="https://raw.githubusercontent.com/Aeolian-Alexanders/coins/master/images/'.$row["coinid"].'_r.png" alt="coin obverse image">';
    echo '</a>';
    echo '</div>';
}


?>

      </div>

    </div>



  </main>



</body>
</html>
