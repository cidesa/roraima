<?php

class Cuentasxcobrar {
  public static function salvarDocumentos($cobdocume, $grid, $grid2)
  {
    $cobdocume->save();
    self::Grabar_Recargos_Documentos($cobdocume, $grid);
    self::Grabar_Descuentos_Documentos($cobdocume, $grid2);
  }

   public static function Grabar_Recargos_Documentos($cobdocume, $grid){
      $x=$grid[0];
      $j=0;
      while ($j<count($x))
      {
       if ( $x[$j]->getCodrec()!="")
       {
       	$x[$j]->setRefdoc($cobdocume->getRefdoc());
       	$x[$j]->setCodcli($cobdocume->getCodcli());
       	$x[$j]->setFecrec($cobdocume->getFecemi());
       	$x[$j]->save();
       }
       $j++;
      }

      $z=$grid[1];
      $j=0;
      while ($j<count($z))
      {
        $z[$j]->delete();
        $j++;
      }

    }

    public static function Grabar_Descuentos_Documentos($cobdocume, $grid){
      $x=$grid[0];
      $j=0;
      while ($j<count($x))
      {
       if ( $x[$j]->getCoddes()!="")
       {
       	$x[$j]->setRefdoc($cobdocume->getRefdoc());
       	$x[$j]->setCodcli($cobdocume->getCodcli());
       	$x[$j]->setFecrec($cobdocume->getFecemi());
       	$x[$j]->save();
       }
       $j++;
      }

      $z=$grid[1];
      $j=0;
      while ($j<count($z))
      {
        $z[$j]->delete();
        $j++;
      }

    }


}
?>