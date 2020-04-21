
<?php
define( 'varovalka', true );

include_once './shared.php';
?>
<!doctype html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<title>Seznam Drustva ribicov</title>
</head>
<body>
<a href="<?= getvar('APP_URL'); ?>/app/">Seznam</a><hr><br>
<?php
if ( isset( $_GET['vec'] ) && $_GET['vec'] >= 0 ) :

  $raw = file_get_contents( getvar('APP_URL') . '/api/?ribici=' . intval( $_GET['vec'] ) );

  $en = json_decode( $raw, true );

  ?>
  <!-- Več o posamezneme igralcu ali igralki -->
  Samo en ribic/ribici
  <table>
    <tr>
      <td>Ime:</td>
      <td><?= $en['ime']; ?></td>
    </tr>
    <tr>
      <td>Priimek:</td>
      <td><?= $en['priimek']; ?></td>
    </tr>
    <tr>
      <td>:</td>
      <td><?= implode( ', ', $en['kraj'] ); ?></td>
    </tr>
    <tr>
      <td>prisotnost:</td>
      <td>
        <?php // alternativa vrstici 36
          foreach ($en['nagrade'] as $index => $film) {
            echo ($index === 0 ? '' : ', ') . $film;
          }
        ?>
      </td>
    </tr>
  </table>

<?php else :

  // pokličemo surove podatke
  $raw = file_get_contents( getvar('APP_URL') . '/api/' );

  // surove podatke pretvorimo v asociativni array
  $array = json_decode( $raw, true );

  ?>

  <!-- Cel seznam vseh ribicov-->
  Cel seznam
  <table>
    <?php foreach ( $array as $index => $igralec ) : ?>
      <tr>
        <td><?= $index + 1; ?></td>
        <td><?= $ribici['ime'] ?></td>
        <td><?= $ribici['priimek'] ?></td>
        <td><a href="<?= getvar('APP_URL'); ?>/app/?vec=<?= $index; ?>">Preberi več</a></td>
      </tr>
    <?php endforeach; ?>
  </table>

<?php endif; ?>

</body>
</html>
