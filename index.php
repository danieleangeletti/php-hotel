<?php

$hotels = [

  [
    'name' => 'Hotel Belvedere',
    'description' => 'Hotel Belvedere Descrizione',
    'parking' => true,
    'vote' => 4,
    'distance_to_center' => 10.4,
  ],
  [
    'name' => 'Hotel Futuro',
    'description' => 'Hotel Futuro Descrizione',
    'parking' => true,
    'vote' => 2,
    'distance_to_center' => 2
  ],
  [
    'name' => 'Hotel Rivamare',
    'description' => 'Hotel Rivamare Descrizione',
    'parking' => false,
    'vote' => 1,
    'distance_to_center' => 1
  ],
  [
    'name' => 'Hotel Bellavista',
    'description' => 'Hotel Bellavista Descrizione',
    'parking' => false,
    'vote' => 5,
    'distance_to_center' => 5.5
  ],
  [
    'name' => 'Hotel Milano',
    'description' => 'Hotel Milano Descrizione',
    'parking' => true,
    'vote' => 2,
    'distance_to_center' => 50
  ],

];

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>PHP Hotel</title>

  <!-- Bootstrap -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" />

  <!-- CSS -->
  <link rel="stylesheet" href="./css/style.css" />
</head>

<body>
  <header>
    <h1>PHP Hotels</h1>
  </header>

  <main>

    <form action="" method="GET">
      <div class="mb-3">
        <select name="parcheggio">
          <option value="0">Tutte le strutture</option>
          <option value="yes">Solo strutture con parcheggio</option>
          <option value="no">Solo strutture senza parcheggio</option>
        </select>

      </div>

      <div class="mb-3">
        <select name="valutazione" id="">
          <option value="0">Qualsiasi valutazione</option>
          <option value="1">1</option>
          <option value="2">2</option>
          <option value="3">3</option>
          <option value="4">4</option>
          <option value="5">5</option>
        </select>
      </div>

      <button>SUBMIT</button>
    </form>

    <table class="table">
      <thead>
        <tr>
          <th scope="col">Name</th>
          <th scope="col">Description</th>
          <th scope="col">Parking</th>
          <th scope="col">Vote</th>
          <th scope="col">Distance to center</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <?php
          $parcheggio = isset($_GET['parcheggio']) ? $_GET['parcheggio'] : 0;
          $valutazione = isset($_GET['valutazione']) ? $_GET['valutazione'] : 0;
          foreach ($hotels as $hotel) {
            if (intval($valutazione) <= $hotel['vote'] || $valutazione == 0) {

              if (($parcheggio == 'yes' && $hotel['parking']) || ($parcheggio == 'no' && !$hotel['parking']) || $parcheggio == 0) {
                if ($hotel['parking'] == true) {
                  $parking_available = 'yes';
                } else {
                  $parking_available = 'no';
                }
                echo
                  "<td>$hotel[name]</td>
                <td>$hotel[description]</td>
                <td>$parking_available</td>
                <td>$hotel[vote]</td>
                <td>$hotel[distance_to_center]</td>
                </tr>";
              }
            }
          }
          ;
          ?>
      </tbody>
    </table>
  </main>

  <script type="text/javascript" src="./javascript/scripts.js"></script>
</body>

</html>