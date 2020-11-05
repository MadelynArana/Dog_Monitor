<?php

date_default_timezone_set('America/Guatemala');

class Funcion {
    public function edad($fecha) {
      $cumpleanos = new DateTime($fecha);
    $hoy = new DateTime();
    $annos = $hoy->diff($cumpleanos);
    return $annos->y;
    }

}
