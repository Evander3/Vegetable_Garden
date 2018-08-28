<?php
    declare(strict_types=1);
    require_once __DIR__.'/../vendor/autoload.php';

    use App\Params\GardenParams as GardenParams;

    session_start();

    echo '<pre>';
    var_dump($_POST);
    echo '</pre>';

    $raw = new GardenParams($_POST);
    $raw->extractGardenParams();

    echo '<pre>';
    var_dump($_SESSION);
    echo '</pre>';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>VG - Settings</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<body class="container">

<?php include("../src/navigation_bar.php"); ?>

<br />
<h2>Paramètrage de votre potager</h2>

<form method="POST">
    <table class="table">
        <tr>
            <th>Légume</th>
            <th>Surface allouée (m2)</th>
            <th>PH</th>
        </tr>

        <tr>
            <th colspan="3">Legumes racine</th>
        </tr>
        <tr>
            <td>Carotte</td>
            <td><input name="carotte_sf" type="number" value=20 min=0 max=25 class="form-control" required></td>
            <td><input name="carotte_ph" type="number" value=7 min=0 max=14 class="form-control" required></td>
            <td><input name="carotte_tp" type="hidden" value="racine" class="form-control" required></td>
        </tr>
        <tr>
            <td>Pomme de terre</td>
            <td><input name="patate_sf" type="number" value=20 min=0 max=25 class="form-control" required></td>
            <td><input name="patate_ph" type="number" value=7 min=0 max=14 class="form-control" required></td>
            <td><input name="patate_tp" type="hidden" value="racine" class="form-control" required></td>
        </tr>
        <tr>
            <th colspan="3">Legumes feuille</th>
        </tr>
        <tr>
            <td>Salade</td>
            <td><input name="salade_sf" type="number" value=20 min=0 max=25 class="form-control" required></td>
            <td><input name="salade_ph" type="number" value=7 min=0 max=14 class="form-control" required></td>
            <td><input name="salade_tp" type="hidden" value="feuille" class="form-control" required></td>
        </tr>
        <tr>
            <td>Epinard</td>
            <td><input name="epinard_sf" type="number" value=20 min=0 max=25 class="form-control" required></td>
            <td><input name="epinard_ph" type="number" value=7 min=0 max=14 class="form-control" required></td>
            <td><input name="epinard_tp" type="hidden" value="feuille" class="form-control" required></td>
        </tr>
        <tr>
            <th colspan="3">Legumes fruit</th>
        </tr>
        <tr>
            <td>Tomate</td>
            <td><input name="tomate_sf" type="number" value=20 min=0 max=25 class="form-control" required></td>
            <td><input name="tomate_ph" type="number" value=7 min=0 max=14 class="form-control" required></td>
            <td><input name="tomate_tp" type="hidden" value="fruit" class="form-control" required></td>
        </tr>
        <tr>
            <td>Courgette</td>
            <td><input name="courgette_sf" type="number" value=20 min=0 max=25 class="form-control" required></td>
            <td><input name="courgette_ph" type="number" value=7 min=0 max=14 class="form-control" required></td>
            <td><input name="tomate_tp" type="hidden" value="fruit" class="form-control" required></td>
        </tr>
        <tr>
            <td colspan="3">
                <input type="submit" name="garden_params" value="Sauvegarder le paramètrage" class="btn btn-primary">
            </td>
        </tr>
    </table>
</form>

</body>
</html>

