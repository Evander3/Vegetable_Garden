<?php
    declare(strict_types=1);
    require_once __DIR__.'/../vendor/autoload.php';
    
    use App\Database\Database as Database;



?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>VG - Dashboard</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<body class="container">

<?php include("../src/navigation_bar.html"); ?>

<br />
<h2>Votre simulateur de jardinage</h2>

<table class="table">
    <tr>
        <th>Légume</th>
        <th>Au potager</th>
        <th>Récoltés</th>
    </tr>

    <tr>
        <td>Carotte</td>
        <td>40
<div class="progress">
  <div class="progress-bar progress-bar-striped bg-danger" role="progressbar" style="width: 28%" aria-valuenow="28" aria-valuemin="0" aria-valuemax="100"></div>
</div>
<br />
            <a class="btn btn-primary pull-right disabled" href="#" role="button">Récolter</a></td>
        <td>90</td>
    </tr>
    <tr>
        <td>Tomate</td>
        <td>10&nbsp;

<div class="progress">
  <div class="progress-bar progress-bar-striped bg-success" role="progressbar" style="width: 100%" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
</div>

<br />
<a class="btn btn-primary pull-right" href="#" >Récolter</a></td>
        <td>34</td>
    </tr>
    <tr>
        <td>Pomme de terre</td>
        <td>13&nbsp;

          <div class="progress">
              <div class="progress-bar progress-bar-striped bg-warning" role="progressbar" style="width: 48%" aria-valuenow="48" aria-valuemin="0" aria-valuemax="100"></div>
          </div>
<br />
                <a class="btn btn-primary pull-right disabled" href="#">Récolter</a>
        </td>
        <td>40</td>
    </tr>
    <tr>
        <td>Epinard</td>
        <td>
            <a class="btn btn-success pull-right" href="#">Semer / Planter</a>
        </td>
        <td>40</td>
    </tr>
</table>

</body>
</html>
