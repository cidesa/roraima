<?php

/**
 * Subclase para el manejo de los catálogos por modulo.
 *
 * @package    Siga
 * @subpackage lib
 * @author     Grupo Desarrollo Cidesa <desarrollo@cidesa.com.ve>
 * @version    SVN: $Id: $
 * @copyright  Copyright 2007, Cidesa C.A.
 *
 */
class ForCatalogo extends CatalogoWeb {

  public function Forcargos_forcargos($params) {

    if ($params[0] == 'Y') {
      $this->c = new Criteria();
      //    $this->c->addAscendingOrderByColumn(NptipcarPeer::DESTIPCAR);

      $this->columnas = array (
        NptipcarPeer :: DESTIPCAR => 'Descripcion',
        NptipcarPeer :: CODTIPCAR => 'Codigo'
      );
    } else {
      $this->c = new Criteria();
      $this->c->add(NpcomocpPeer :: PASCAR, '001');
      $this->c->add(NpcomocpPeer :: CODTIPCAR, $params[0]);
      //     $this->c->addAscendingOrderByColumn(NpcomocpPeer::GRACAR);

      $this->columnas = array (
        NpcomocpPeer :: GRACAR => 'Grado',
        NpcomocpPeer :: SUECAR => 'Sueldo'
      );
    }
  }


}