<?php

/**
 * Clientes: Clase estática para el manejo de los clientes
 *
 * @package    Roraima
 * @subpackage facturacion
 * @author     $Author$ <desarrollo@cidesa.com.ve>
 * @version SVN: $Id$
 * 
 * @copyright  Copyright 2007, Cide S.A.
 * @license    http://opensource.org/licenses/gpl-2.0.php GPLv2
 */
class Cliente
{

  /**
   * Función Principal para guardar datos del formulario Facliente
   * TODO Esta función (y todas las demás de su clase) deben retornar un
   * código de error para validar cualquier problema al guardar los datos.
   *
   * @static
   * @param $facliente Object Cliente-Benficiario-Recaudos a guardar
   * @return void
   */
    public static function salvarFacliente($facliente)
    {
      self::Grabar_Cliente($facliente);
      self::Grabar_Beneficiario($facliente);
      self::Grabar_RecaudosCliente($facliente);
    }


/**
   * Función para registrar Cliente
   *
   * @static
   * @param $facliente Object Cliente a guardar
   * @return void
   */
    public static function Grabar_Cliente($facliente){
    $facliente->save();

    }

     /**
   * Función para registrar un Beneficiario
   *
   * @static
   * @param $facliente Object Beneficiario a guardar
   * @return void
   */
    public static function Grabar_Beneficiario($facliente){

        $c = new Criteria();
        $c->add(OpbenefiPeer::CEDRIF,$facliente->getRifpro());
        $opbenefi = OpbenefiPeer::doSelectOne($c) ;
        if (isset($opbenefi))
        {
        $opbenefi->setNitben($facliente->getNitpro());
        }
        else
        {
        $opbenefi = new Opbenefi();

          $codtipben = Herramientas::getxLike('destipben','optipben','codtipben','%CLIENTE%');
          if ($codtipben=='<!Registro no Encontrado o Vacio!>')
          { $codtipben=null;}

          $opbenefi->setcodtipben($codtipben);
        $opbenefi->setCedrif($facliente->getRifpro());
        $opbenefi->setNomben($facliente->getNompro());
        $opbenefi->setNitben($facliente->getNitpro());
        $opbenefi->setDirben($facliente->getDirpro());
        $opbenefi->setTelben($facliente->getTelpro());
        $opbenefi->setCodcta($facliente->getCodcta());
        $opbenefi->setCodord($facliente->getCodord());
        $opbenefi->setCodpercon($facliente->getCodpercon());
        $opbenefi->setCodctasec($facliente->getCodctasec());
        $opbenefi->setCodordadi($facliente->getCodordadi());
        $opbenefi->setCodperconadi($facliente->getCodperconadi());
        $opbenefi->setCodpercontra($facliente->getCodordcontra());
        $opbenefi->setCodpercontra($facliente->getCodpercontra());

      $opbenefi->save();

      return -1;
      }
    }

/**
   * Función para registrar Los recaudos del Cliente
   *
   * @static
   * @param $facliente Object Recaudos a guardar
   * @return void
   */
    public static function Grabar_RecaudosCliente($facliente){
      // Update many-to-many for "recargo"
      $c = new Criteria();
      $c->add(FarecproPeer::CODPRO, $facliente->getCodpro());
      FarecproPeer::doDelete($c);

      $ids = $facliente->getRecargo();
      if (is_array($ids))
      {
        foreach ($ids as $id)
        {
          $Farecpro = new Farecpro();
          $Farecpro->setCodpro($facliente->getCodpro());

          $c = new criteria();
          $c->add(CarecaudPeer::ID,$id);
          $obj = CarecaudPeer::doSelectOne($c);

          $Farecpro->setCodrec($obj->getCodrec());
          $Farecpro->save();
        }
      }
      return -1;
    }

    public static function eliminarFacliente($facliente){
      $c = new Criteria();
      $c->add(FarecproPeer::CODPRO, $facliente->getCodpro());
      $obj = FarecproPeer::doSelect($c);

	  if ($obj)
	     foreach ($obj as $registro)
	   		$registro->delete();

	  $facliente->delete();

	  return true;
    }

}