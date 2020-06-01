<?php
header('Content-type: application/xml; charset=utf-8');
  include('dbconnect.php');
  try {
    $pdo = new PDO("pgsql:host=$host;dbname=$dbname", $dbuser, $dbpass);
  }catch (PDOException $e) {
    echo "Error : " . $e->getMessage() . "<br/>";
    die();
  }

  $projectURL = "https://maps.isaw.nyu.edu/aeolis/";
  $coinURL = "https://maps.isaw.nyu.edu/aeolis/coins/";
  $imageURL = "https://github.com/Aeolian-Alexanders/coins/raw/master/images/";
  $obvURL = "https://maps.isaw.nyu.edu/aeolis/obvversedies/";
  $revURL = "https://maps.isaw.nyu.edu/aeolis/reversedies/";

  $id = strval($_GET["coin_id"]);

  $sth = $pdo->prepare('SELECT * FROM all_coins WHERE coinid = :parameter');
  $sth->bindParam(':parameter', $id, PDO::PARAM_STR);
  $sth->execute();
  $result = $sth -> fetch();
    ?>
<?xml version="1.0" encoding="utf-8"?>
<rdf:RDF xmlns:dcmitype="http://purl.org/dc/dcmitype/"
         xmlns:nmo="http://nomisma.org/ontology#"
         xmlns:un="http://www.owl-ontologies.com/Ontology1181490123.owl#"
         xmlns:crmsci="http://www.ics.forth.gr/isl/CRMsci/"
         xmlns:foaf="http://xmlns.com/foaf/0.1/"
         xmlns:xsd="http://www.w3.org/2001/XMLSchema#"
         xmlns:crmgeo="http://www.ics.forth.gr/isl/CRMgeo/"
         xmlns:rdfs="http://www.w3.org/2000/01/rdf-schema#"
         xmlns:crmarchaeo="http://www.cidoc-crm.org/cidoc-crm/CRMarchaeo/"
         xmlns:geo="http://www.w3.org/2003/01/geo/wgs84_pos#"
         xmlns:relations="http://pelagios.github.io/vocab/relations#"
         xmlns:dcterms="http://purl.org/dc/terms/"
         xmlns:edm="http://www.europeana.eu/schemas/edm/"
         xmlns:rdf="http://www.w3.org/1999/02/22-rdf-syntax-ns#"
         xmlns:svcs="http://rdfs.org/sioc/services#"
         xmlns:numishare="https://github.com/ewg118/numishare"
         xmlns:crm="http://www.cidoc-crm.org/cidoc-crm/"
         xmlns:doap="http://usefulinc.com/ns/doap#"
         xmlns:nm="http://nomisma.org/id/"
         xmlns:oa="http://www.w3.org/ns/oa#"
         xmlns:pelagios="http://pelagios.github.io/vocab/terms#"
         xmlns:skos="http://www.w3.org/2004/02/skos/core#"
         xmlns:void="http://rdfs.org/ns/void#">
<?php
  echo '<nmo:NumismaticObject rdf:about="' .$coinURL. $result["coinid"]. '">';
  echo '<dcterms:title>' .htmlspecialchars($result["title"], ENT_XML1, 'UTF-8').'</dcterms:title>';
  echo '<dcterms:identifier>' .$result["id"]. '</dcterms:identifier>';
  if ($result["typeid"] != ''){
  echo '<nmo:hasTypeSeriesItem rdf:resource="http://numismatics.org/pella/id/price.' .$result["typeid"]. '"/>';
}
if ($result["rotation"] != ''){

  echo '<nmo:hasAxis rdf:datatype="xsd:integer">' .$result["rotation"]. '</nmo:hasAxis>';
}
if ($result["weight"] != ''){

  echo '<nmo:hasWeight rdf:datatype="http://www.w3.org/2001/XMLSchema#decimal">' .$result["weight"]. '</nmo:hasWeight>';
}
if ($result["obvdie"] != ''){

  echo '<nmo:hasObverse rdf:resource="' .$obvURL . $result["obvdie"].'"/>';
}
if ($result["revdie"] != ''){

  echo '<nmo:hasReverse rdf:resource="' .$revURL . $result["revdie"].'"/>';
}
  echo '<void:inDataset rdf:resource="'.$projectURL.'coincat/"/>';
  echo '</nmo:NumismaticObject>';
  echo '<rdf:Description rdf:about="' .$coinURL . $result["coinid"].'#obverse">';
  echo    '<foaf:depiction rdf:resource="'.$imageURL . $result["coinid"].'_o.png"/>';
  echo '</rdf:Description>';
  echo '<rdf:Description rdf:about="' .$coinURL . $result["coinid"].'#reverse">';
  echo    '<foaf:depiction rdf:resource="'.$imageURL . $result["coinid"].'_r.png"/>';
  echo '</rdf:Description>';
  echo '</rdf:RDF>';
?>
