<?php

$id = null;

  if ( isset( $isset( $_GET['ribic'])) {
    $id = intval($_GET['ribic']);
  }


  /* Drustvo ribicov
   *
   * ime
   * priimek
   * kraj
   * prisotnost
   * nagrade
   *
   * */

  $ribici = array(
    array(
      'ime'          => 'Zele',
      'primek'       => 'Vele',
      'kraj'         => 'Kranj',
      'prisotnost'   =>  52,
      'nagrade'      =>  array ('Dve nagradi' ),

    ),
    array(
      'ime'          => 'Mirko',
      'primek'       => 'Novak',
      'kraj'         => 'Celje',
      'prisotnost'   =>  50,
    )  'nagrade'      =>  array('Tri nagradi'),

    ),
    array(
      'ime'          => 'Branka',
      'primek'       => 'Vovk',
      'kraj'         => 'Horjul',
      'prisotnost'   =>  51,
      'nagrade'      =>  array('Ena nagrada'),

    ),
    array(
      'ime'          => 'Lejla',
      'primek'       => 'Mir',
      'kraj'         => 'Vrhnika',
      'prisotnost'   =>  48,
      'nagrade'      => array('Ena nagrada'),
    )

);
  if ( $id !== null && $id >= 0 ) {
      // samo en ribici
      $podatki = $[$id];
    } else {
      // vsi ribici
      $podatki = $ribic;
    }


  // vrnemovtocno dolocenovvrstovdatotek ->Json
  header( 'Content-Type: application/json');

  echo json_encode( $podatki );

  ?>
