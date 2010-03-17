<?php

/**
 * Proveedores: Clase estática para el manejo de los Proveedores
 *
 * @package    Roraima
 * @subpackage compras
 * @author     $Author$ <desarrollo@cidesa.com.ve>
 * @version SVN: $Id$
 *
 * @copyright  Copyright 2007, Cide S.A.
 * @license    http://opensource.org/licenses/gpl-2.0.php GPLv2
 */
class Proveedor
{

  /**
   * Función Principal para guardar datos del formulario Almregpro
   * TODO Esta función (y todas las demás de su clase) deben retornar un
   * código de error para validar cualquier problema al guardar los datos.
   *
   * @static
   * @param $caprovee Object Proveedor-Benficiario-Recaudos a guardar
   * @return void
   */
    public static function salvarAlmregpro($caprovee,$grid,$gridC,$gridR,$gridRE,$manprocor,$mascararif)
    {
      if ($manprocor=='S' && (!$caprovee->getId()))
      {
        $trajo=self::BuscarCorrelativoActiv(&$caprovee);
      }else $trajo=-1;

      if ($trajo == -1){
      	self::Grabar_Proveedor($caprovee,$manprocor,$mascararif);
      	self::Grabar_Beneficiario($caprovee);
      	self::Grabar_Recaudosproveedor($caprovee,$grid);
      	self::Grabar_Contactosproveedor($caprovee,$gridC);
      	self::Grabar_Ramosproveedor($caprovee,$gridR);
      	self::Grabar_Retencionesproveedor($caprovee,$gridRE);
      }else{
      	return 145;
      }

    }

    public static function BuscarCorrelativo_Proveedor($caprovee)
    {
    	if ($caprovee->getCodpro()=='########'){
    	 if (H::getVerCorrelativo('corpro','cacorrel',&$output)){
    	 	$codpro = str_pad($output,8,0,STR_PAD_LEFT);
    	 	$caprovee->setCodpro($codpro);

    	 	if (!(H::getSalvarCorrelativo('corpro','cacorrel','Proveedor',$codpro,&$msg)))
    	 	{
    	 		return 145;
    	 	}

    	 }else{ return 145; }

    	}
    	 return -1;
    }

    public static function Grabar_Retencionesproveedor($caprovee,$grid)
    {
    try {
      $x  = $grid[0];
      $j  = 0;

      while ($j<count($x))
       {
       	 $x[$j]->setCodpro($caprovee->getCodpro());
         $x[$j]->save();
         $j++;
     	}
       $z=$grid[1];
       $j=0;
       if (!empty($z[$j]))
       {
	       while ($j<count($z))
	       {
	         $z[$j]->delete();
	         $j++;
	       }
       }
  	 return -1;

  	}catch (Exception $ex){
	    return 0;
  	}

    }


    public static function Grabar_Contactosproveedor($caprovee,$grid)
    {
    try {
      $x  = $grid[0];
      $j  = 0;

      while ($j<count($x))
       {
       	 $x[$j]->setCodpro($caprovee->getCodpro());
         $x[$j]->save();
         $j++;
     	}
       $z=$grid[1];
       $j=0;
       if (!empty($z[$j]))
       {
	       while ($j<count($z))
	       {
	         $z[$j]->delete();
	         $j++;
	       }
       }
  	 return -1;

  	}catch (Exception $ex){
	    return 0;
  	}

    }


    public static function Grabar_Ramosproveedor($caprovee,$grid)
    {
    try {
      $x  = $grid[0];
      $j  = 0;

      while ($j<count($x))
       {
       	 $x[$j]->setCodpro($caprovee->getCodpro());
         $x[$j]->save();
         $j++;
     	}
       $z=$grid[1];
       $j=0;
       if (!empty($z[$j]))
       {
	       while ($j<count($z))
	       {
	         $z[$j]->delete();
	         $j++;
	       }
       }
  	 return -1;

  	}catch (Exception $ex){
	    return 0;
  	}

    }



/**
   * Función para registrar Proveedor
   *
   * @static
   * @param $caprovee Object Proveedor a guardar
   * @return void
   */
    public static function Grabar_Proveedor($caprovee,$manprocor,$mascararif){

    if ($mascararif=='S')
        {
            $caprovee->setRifpro($caprovee->getNitpro()."-".substr($caprovee->getRifpro(),2,10));
        }
     if ($caprovee->getId())
         {
            $reg = CaproveePeer::retrieveByPKs($caprovee->getId());
            $reg1 = array();
            $reg1 = $reg[0];
            $caprovee->setNitpro($reg1->getNitpro());
         }

    if ($manprocor=='S' && (!$caprovee->getId())) {
    	$q= new Criteria();
    	$dat=CadefartPeer::doSelectOne($q);
    	if ($dat)
    	{
    	  if ($caprovee->getNacpro()=='N')
    	  {
    	  	$dat->setCornac($dat->getCornac()+1);
    	  }else $dat->setCorext($dat->getCorext()+1);
    	  $dat->save();
    	}
    }
    $caprovee->save();

    }

     /**
   * Función para registrar un Beneficiario
   *
   * @static
   * @param $caprovee Object Beneficiario a guardar
   * @return void
   */
    public static function Grabar_Beneficiario($caprovee)
    {

        $c = new Criteria();
        $c->add(OpbenefiPeer::CEDRIF,$caprovee->getRifpro());
        $opbenefi = OpbenefiPeer::doSelectOne($c) ;
        if (isset($opbenefi))
        {
          $opbenefi->setNomben($caprovee->getNompro());
          $opbenefi->setNitben($caprovee->getNitpro());
          $opbenefi->setDirben($caprovee->getDirpro());
          $opbenefi->setTelben($caprovee->getTelpro());
          $opbenefi->save();

          return -1;
        }
        else
        {
          $opbenefi = new Opbenefi();

          $codtipben = Herramientas::getxLike('destipben','optipben','codtipben','%PROVEEDOR%');
          if ($codtipben=='<!Registro no Encontrado o Vacio!>')
          { $codtipben=null;}

          $opbenefi->setcodtipben($codtipben);
          $opbenefi->setCedrif($caprovee->getRifpro());
          $opbenefi->setNomben($caprovee->getNompro());
          $opbenefi->setNitben($caprovee->getNitpro());
          $opbenefi->setDirben($caprovee->getDirpro());
          $opbenefi->setTelben($caprovee->getTelpro());
          $opbenefi->setCodcta($caprovee->getCodcta());
          $opbenefi->setCodord($caprovee->getCodord());
          $opbenefi->setCodpercon($caprovee->getCodpercon());
          $opbenefi->setCodctasec($caprovee->getCodctasec());
          $opbenefi->setCodordadi($caprovee->getCodordadi());
          $opbenefi->setCodperconadi($caprovee->getCodperconadi());
          $opbenefi->setCodpercontra($caprovee->getCodordcontra());
          $opbenefi->setCodpercontra($caprovee->getCodpercontra());

          $opbenefi->save();

          return -1;
        }
    }

/**
   * Función para registrar Los recaudos del Proveedor
   *
   * @static
   * @param $caprovee Object Recaudos a guardar
   * @return void
   */
    public static function Grabar_Recaudosproveedor($caprovee,$grid)
    {
    try {
      $x  = $grid[0];
      $j  = 0;

      while ($j<count($x))
       {
       	 $x[$j]->setCodpro($caprovee->getCodpro());
         $x[$j]->save();
         $j++;
     	}
       $z=$grid[1];
       $j=0;
       if (!empty($z[$j]))
       {
	       while ($j<count($z))
	       {
	         $z[$j]->delete();
	         $j++;
	       }
       }

  	 return -1;

  	}catch (Exception $ex){
	    return 0;
  	}

    }


  /**
   * Función Principal para validar datos del formulario Almregart
   *
   * @static
   * @param $articulo Object Artículo a guardar
   * @param $grid Array de Objects Almacen.
   * @return void
   */
    public static function validarAlmregart($articulo,$grid) {
      return self::validarCodart($articulo);
    }

  /**
   * Función Principal para validar datos del formulario Almregart
   *
   * @static
   * @param $articulo Object Artículo a guardar
   * @return void
   */
  public static function validarCodart($articulo)
  {
         $codart=$articulo->getCodart();
         if (strlen(trim($codart))<4)
         {
           return 2;
         }

      Herramientas::FormarCodigoPadre($codart,&$nivelcodigo,&$ultimo);
        if (!(Herramientas::buscar_codigo_padre($ultimo))){
          If ($nivelcodigo == 0){
            return 1;
          } else return -1;
        }else return -1;
      }

   public static function BuscarCorrelativoActiv(&$caprovee)
   {
     $y= new Criteria();
     $reg=CadefartPeer::doSelectOne($y);
     if ($reg)
     {
     	if ($caprovee->getNacpro()=='N'){
     		if ($reg->getCornac()!=0) $r=$reg->getCornac(); else $r=1;

     	}else{
     		if ($reg->getCorext()!=0) $r=$reg->getCorext();  else $r=1;
     	}
     }

     $numero=str_pad($r, 11, '0', STR_PAD_LEFT);

     if ($caprovee->getNacpro()=='N')
     $codpro="N".substr($numero,1,10);
     else $codpro="I".substr($numero,1,10);

     $caprovee->setCodpro($codpro);
     return -1;
   }
}
