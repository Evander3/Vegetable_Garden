<?php
    declare(strict_types=1);
    require_once __DIR__.'/../vendor/autoload.php';
    
    use App\Database\DB_Link as DB_Link;
    use App\Gestion\Defines as Defines;

    echo '<pre>';
    var_dump($_POST);
    echo '</pre>';

    // we extract the data from the DB
    $pdo = DB_Link::create();
    $data = $pdo::getParams();

    // Get the defines values
    $def = Defines::create();
    $val_racine = $def::getRacineValues();
    $val_feuille = $def::getFeuilleValues();
    $val_fruit = $def::getFruitValues();



    // defines the current Datetime object
    $d = new DateTime();
    echo "now : ".$d->format('Y-m-d H:i:s.u');
    echo '<br />';
    $e = clone $d;
    $e = $e->modify('+3500 seconds');
    echo "then : ".$e->format('Y-m-d H:i:s.u');
    echo '<br />';
    $f=$d->diff($e);
    echo "the diff : ".$f->format('%d jours %h heures %i minutes %s secondes');



?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="refresh" content="<?php echo Defines::create()::getRefreshDelay() ?>">
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

    <?php
        foreach  ($data as $row) {
            echo '
            <tr>
                <td>'.ucfirst($row['name']).'</td>
                <td>
                    <div class="progress">
                        <div
                            class="progress-bar progress-bar-striped bg-danger"
                            role="progressbar"
                            style="width: 28%"
                            aria-valuenow="28"
                            aria-valuemin="0"
                            aria-valuemax="100">
                        </div>
                    </div>
                    <br />

                    <form method="POST">
                    <input  type="submit"
                            name="sow_'.$row['name'].'"
                            value="Semer/Planter"
                            class="btn btn-primary"
                    >
                    </form>
                    <form method="POST">
                    <input  type="submit"
                            name="recolt_'.$row['name'].'"
                            value="Récolter"
                            class="btn btn-primary"
                    >
                    </form>
                        
                    </a>
                </td>
                <td>'.$row['quant'].'</td>
            </tr>';
        }
    ?>
</table>

</body>
</html>
