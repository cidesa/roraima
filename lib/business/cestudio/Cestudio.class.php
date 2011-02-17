<?php

class Cestudio {
    public static function salvarInscribir($seccion, $grid){

        $inscritos = $grid[0];

        foreach($inscritos as $ins){
            $ins->setSeccionesId($seccion->getId());
            $ins->save();
        }

        return -1;
    }
}
?>