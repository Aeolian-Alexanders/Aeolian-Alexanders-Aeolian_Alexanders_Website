<!DOCTYPE html>
<html lang="en">
<head>
  <title>Aeolian Alexanders</title>
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
    include('nav.php');
    ?>

  <main role="main">

    <!-- Main jumbotron for a primary marketing message or call to action -->
    <div class="jumbotron">
      <div class="container">
        <h1 class="display-3"><img src="img/aeolis_logo.svg" style="height:50px;">Aeolian Alexanders</h1>
        <p>This NEH-Mellon supported study conducted by <a href="https://rmhorne.org/" target = "_blank">Dr. Ryan Horne</a> uses
          new innovations in social network analysis software and geographic information systems to
          reimagine traditional die studies as digital publications which illustrate economic and social networks in geographic space.
          Focusing on coinage from the region of ancient <a href="https://pleiades.stoa.org/places/550406" target="_blank">Aeolis</a> in western Turkey, this project offers the first all-digital die study,
          along with new tools and methodologies which can be used by other digital humanities initiatives.</p>
      </div>
    </div>

    <div class="container">
      <!-- Example row of columns -->
      <div class="row">
        <div class="col-md-4">
          <h2>The Die Study</h2>
          <a href="" target = "_blank"><img src="img/die_study_overview.png" alt="die study thumbnail" class="img-thumbnail" style="height:150px;"></a>
          <p>Primarily focusing on the production of Temnian tetradrachms in the name of Alexander the Great, with smaller
          production runs from Myrina and Kyme, this study provides historical context for this important aspect of
          hellenistic coinage. It also examines associated political and economic connectivity, and offers new  tools and approaches
          for studying historical networks.</p>
          <p><a class="btn btn-secondary" href="#" role="button">Read the study &raquo;</a></p>
        </div>

        <div class="col-md-4">
          <h2>A Full Suite of Digital Humanities Tools</h2>
          <a href="https://github.com/Aeolian-Alexanders/jupyter_notebooks" target = "_blank"><img src="img/lab_book.png" alt="Jupyter Lab Notebook Thumbnail" class="img-thumbnail" style="height:150px;"></a>
          <p>All of the code used in the die study, including general tools to analyize historical networks, is in a jupyter notebook
            <a href="https://github.com/Aeolian-Alexanders/jupyter_notebooks" target = "_blank"> available on GitHub</a>.</p>
          <p><a class="btn btn-secondary" href="https://github.com/Aeolian-Alexanders/jupyter_notebooks" target = "_blank" role="button">Notebooks &raquo;</a></p>
        </div>
        <div class="col-md-4">
          <h2>Browse the Coins</h2>
          <a href="coincat"><img src="img/catalog.png" alt="coin catalog thumbail" class="img-thumbnail" style="height:150px;"></a>
          <p>You can search the coin catalog, with images, coin information, and links to other projects and data sources.</p>
          <p><a class="btn btn-secondary" href="coincat" role="button">Search catalog &raquo;</a></p>
        </div>
        <div class="col-md-4">
          <h2>Die Study Software</h2>
          <a href="https://github.com/Aeolian-Alexanders/coin_comparer"><img src="img/die_study_tools.jpeg" alt="coin tools thumbail" class="img-thumbnail" style="height:150px;"></a>
          <p>You can use new software developed in this project to create your own database to compare coins, images, and other data.</p>
          <p><a class="btn btn-secondary" href="https://github.com/Aeolian-Alexanders/coin_comparer" role="button">Get the code &raquo;</a></p>
        </div>
        <div class="col-md-4">
          <h2>Explore Coin Links</h2>
          <a href="temnos_net"><img src="img/coin_net.png" alt="coin network thumbail" class="img-thumbnail" style="height:150px;"></a>
          <p>A work in-progress demonstration of using d3js to render interactive graphs of coin linkages.
          Use the navigation bar at the top of the page to select different mints.</p>

        </div>

        <div class="col-md-4">
          <a href="https://www.neh.gov/grants/research/neh-mellon-fellowships-digital-publication"><img src="img/NEH-Preferred-Seal.svg" alt="NEH Seal" class="img-thumbnail" style="height:150px;"></a>
          <h2></h2>
          <p>This project is generously supported by a NEH-Mellon Fellowship for Digital Publication #FEL-257341-18</p>
          <p><a class="btn btn-secondary" href="https://www.neh.gov/grants/research/neh-mellon-fellowships-digital-publication" target = "_blank" role="button">Fellowship Website &raquo;</a></p>
        </div>


      </div>

      <hr>

    </div> <!-- /container -->

  </main>

</body>
</html>
