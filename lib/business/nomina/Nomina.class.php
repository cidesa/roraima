<?php
/**
 * Nóminas: Clase estática con funcionalidades básicas de los formularios de nómina
 *
 * @package    Roraima
 * @subpackage nomina
 * @author     $Author$ <desarrollo@cidesa.com.ve>
 * @version SVN: $Id$
 *
 * @copyright  Copyright 2007, Cide S.A.
 * @license    http://opensource.org/licenses/gpl-2.0.php GPLv2
 */
class Nomina {

  public static function salvarNomdefespcon($concepto) {
    if ($concepto->getCodcon()=='###')
    {
      $t= new Criteria();
	  $t->add(NpdefcptPeer::OPECON,$concepto->getOpecon());
	  $t->addDescendingOrderByColumn(NpdefcptPeer::CODCON);
	  $reg= NpdefcptPeer::doSelectOne($t);
	  if ($reg)
	  {
	    $concepto->setCodcon($reg->getCodcon()+1);
	  }else $concepto->setCodcon('001');
    }
    $concepto->save();

    $c = new Criteria();
    $c->add(NpasiconempPeer :: CODCON, $concepto->getCodcon());
    $resul = NpasiconempPeer :: doSelect($c);
    if ($resul) {
      foreach ($resul as $datos) {
        $datos->setNomcon($concepto->getNomcon());
        if ($concepto->getAcuhis() == 'S') {
          $datos->setAcucon('S');
        } else {
          $datos->setAcucon('N');
        }
        if ($concepto->getOpecon() == 'A') {
          $datos->setAsided('A');
        } else
          if ($concepto->getOpecon() == 'D') {
            $datos->setAsided('D');
          } else {
            $datos->setAsided('P');
          }

        $datos->save();
      }

    }
  }
  /**************************************************************************
  **                          Requisición de Servicios                     **
  **                                Carlos Ovidio                                 **
  **************************************************************************/
  /**
     * Función Principal para guardar datos del formulario NomDefconaportes
     * TODO Esta función (y todas las demás de su clase) deben retornar un
     * código de error para validar cualquier problema al guardar los datos.
     *
     * @static
     * @param $retapo Object Npcontipaporet a guardar
     * @param $grid Array de Objects Servicios.
     * @return void
     */

  public static function salvarContipaporet($retapo, $grid) {
    $x = $grid[0];
    $j = 0;
    while ($j < count($x)) {
      if ($x[$j]->getCodnom() != '' && $x[$j]->getCodcon() != '') {
        $x[$j]->setCodtipapo($retapo->getCodtipapo());
        $x[$j]->setTipo('A');
        $x[$j]->save();
      }
      $j++;
    }
    $z = $grid[1];
    $j = 0;
    if (!empty ($z[$j])) {
      while ($j < count($z)) {
        $z[$j]->delete();
        $j++;
      } //while ($j<count($z))
    } //if (!empty($z[$j]))

  }

  public static function salvarContipaporet2($retapo, $grid) {
    $x = $grid[0];
    $j = 0;
    while ($j < count($x)) {
      $x[$j]->setCodtipapo($retapo->getCodtipapo());
      $x[$j]->setTipo('R');

      $x[$j]->save();
      $j++;
    }
    $z = $grid[1];
    $j = 0;
    if (!empty ($z[$j])) {
      while ($j < count($z)) {
        $z[$j]->delete();
        $j++;
      } //while ($j<count($z))
    } //if (!empty($z[$j]))

  }

  /**
        * Función para eliminar los detalles  retencion y aportes
     *
     * @static
     * @param $retapo Object Nptipconaporet a eliminar
     * @param $grid Array de Objects Servicios a eliminar.
     * @return void
     */

  public static function eliminarContipaporet($retapo) {
    Herramientas :: EliminarRegistro('Npcontipaporet', 'Codtipapo', $retapo->getCodtipapo);
    $retapo->delete();
  }

  public static function salvarNomdefconfon($fondo, $grid, $ded, $apo, $aded, $aapo) {
    $c = new Criteria();
    $c->add(NpconfonPeer :: CODNOM, $fondo->getCodnom());
    NpconfonPeer :: doDelete($c);
    if ($ded != "") {
      $npconfon = new Npconfon();
      $npconfon->setCodnom($fondo->getCodnom());
      $npconfon->setCodcon($ded);
      $npconfon->setTipcon('D');
      $npconfon->save();
    }

    if ($apo != "") {
      $npconfon1 = new Npconfon();
      $npconfon1->setCodnom($fondo->getCodnom());
      $npconfon1->setCodcon($apo);
      $npconfon1->setTipcon('A');
      $npconfon1->save();
    }

    if ($aded != "") {
      $npconfon2 = new Npconfon();
      $npconfon2->setCodnom($fondo->getCodnom());
      $npconfon2->setCodcon($aded);
      $npconfon2->setTipcon('J');
      $npconfon2->save();
    }

    if ($aapo != "") {
      $npconfon3 = new Npconfon();
      $npconfon3->setCodnom($fondo->getCodnom());
      $npconfon3->setCodcon($aapo);
      $npconfon3->setTipcon('U');
      $npconfon3->save();
    }

    $x = $grid[0];
    $j = 0;
    while ($j < count($x)) {
      if ($x[$j]['check'] == "1" && ($x[$j]['codcon'] != $ded && $x[$j]['codcon'] != $apo && $x[$j]['codcon'] != $aded && $x[$j]['codcon'] != $aapo)) {
        $npconfon4 = new Npconfon();
        $npconfon4->setCodnom($fondo->getCodnom());
        $npconfon4->setCodcon($x[$j]['codcon']);
        $npconfon4->setTipcon("S");
        $npconfon4->save();

      } //if
      $j++;
    } //while

  }

  /*******************************Hoja Integral*****************************************************/
  public static function obtenerEdad($fecha) {
    $fecha = split('/', $fecha);
    $fechanueva = $fecha[2] . "-" . $fecha[1] . "-" . $fecha[0];

    $sql = "select  Extract(year from age(now(),'" . $fechanueva . "')) as edad";
    if (Herramientas :: BuscarDatos($sql, & $result)) {
      return $result[0]['edad'];
    }
  }

  public static function salvarNomhojint($datos, $grid, $grid2, $grid3, $grid4, $grid5, $arreglo) {
    $cadena = "";
    if ($arreglo != "") {
      foreach ($arreglo as $val) {
        $cadena = $cadena . $val . '-';
      }
      $cadena = substr($cadena, 0, strlen($cadena) - 1);
    }
    $datos->setSercon($cadena);
    $datos->save();
    self :: grabarInffam($datos, $grid);
    self :: grabarInfcur($datos, $grid2);
    self :: grabarExplabden($datos, $grid3);
    self :: grabarExplabfue($datos, $grid4);
    self :: grabarIngegr($datos, $grid5);
    self :: grabarIncapa($datos);
  }

  /**
   * Función para registrar las incapacidades de un trabajador
   *
   * @static
   * @param $datos Objeto a guardar
   * @return void
   */
  public static function grabarIncapa($datos) {
    // Update many-to-many for "incapacidades"
    $c = new Criteria();
    $c->add(NphojintincPeer :: CODEMP, $datos->getCodemp());
    NphojintincPeer :: doDelete($c);

    $ids = $datos->getIncapacidades();
    if (is_array($ids)) {
      foreach ($ids as $id) {
        $Nphojintinc = new Nphojintinc();
        $Nphojintinc->setCodemp($datos->getCodemp());

        $c = new criteria();
        $c->add(NpincapaPeer :: ID, $id);
        $obj = NpincapaPeer :: doSelectOne($c);

        $Nphojintinc->setCodinc($obj->getCodinc());
        $Nphojintinc->save();
      }
    }
    return -1;
  }

  public static function grabarInffam($datos, $grid) {
    $codigo = $datos->getCodemp();
    $x = $grid[0];
    $j = 0;
    while ($j < count($x)) {
      if ($x[$j]->getCedfam() != "" || $x[$j]->getNomfam() != "") {
        $x[$j]->setCodemp($codigo);
                $x[$j]->setEdafam($x[$j]->getEdafamact());
        if ($x[$j]->getSeghcm() == "1") {
          $x[$j]->setSeghcm('S');
        } else {
          $x[$j]->setSeghcm('N');
        }
        $x[$j]->save();
      }
      $j++;
    }

    $z = $grid[1];
    $j = 0;
    if (!empty ($z[$j])) {
      while ($j < count($z)) {
        $z[$j]->delete();
        $j++;
      }
    }
  }

  public static function grabarInfcur($datos, $grid2) {
    $codigo = $datos->getCodemp();
    $l = $grid2[0];
    $j = 0;
    while ($j < count($l)) {
      if ($l[$j]->getNomtit() != "") {
        $l[$j]->setCodemp($codigo);
        $l[$j]->save();
      }
      $j++;
    }

    $z = $grid2[1];
    $j = 0;
    if (!empty ($z[$j])) {
      while ($j < count($z)) {
        $z[$j]->delete();
        $j++;
      }
    }
  }

  public static function grabarExplabden($datos, $grid3) {
    $codigo = $datos->getCodemp();
    $z = $grid3[0];
    $j = 0;
    while ($j < count($z)) {
      if ($z[$j]->getCodcar() != "" && $z[$j]->getDescar() != "") {
        $z[$j]->setCodemp($codigo);
        $z[$j]->setStacar('D');
        $z[$j]->save();
      }
      $j++;
    }

    $z = $grid3[1];
    $j = 0;
    if (!empty ($z[$j])) {
      while ($j < count($z)) {
        $z[$j]->delete();
        $j++;
      }
    }
  }

  public static function grabarExplabfue($datos, $grid4) {
    $codigo = $datos->getCodemp();
    $f = $grid4[0];
    $j = 0;
    while ($j < count($f)) {
      if ($f[$j]->getNomemp() != "" && $f[$j]->getDescar() != "") {
        $f[$j]->setCodemp($codigo);
        $f[$j]->setStacar('F');
        $f[$j]->save();
      }
      $j++;
    }

    $z = $grid4[1];
    $j = 0;
    if (!empty ($z[$j])) {
      while ($j < count($z)) {
        $z[$j]->delete();
        $j++;
      }
    }
  }

  public static function grabarIngegr($datos, $grid5) {
    $codigo = $datos->getCodemp();
    $e = $grid5[0];
    $j = 0;
    while ($j < count($e)) {
      if ($e[$j]->getFecing() != "") {
        $e[$j]->setCodemp($codigo);
        $e[$j]->save();
      }
      $j++;
    }

    $z = $grid5[1];
    $j = 0;
    if (!empty ($z[$j])) {
      while ($j < count($z)) {
        $z[$j]->delete();
        $j++;
      }
    }
  }

  public static function actualizarNomhojint($datos, $grid, $grid2, $grid3, $grid4, $grid5, $arreglo, $fecha) {
    $cadena = "";
    if ($arreglo != "") {
      foreach ($arreglo as $val) {
        $cadena = $cadena . $val . '-';
      }
      $cadena = substr($cadena, 0, strlen($cadena) - 1);
    }
    $datos->setSercon($cadena);
    if ($fecha != "") {
      $datos->setFecret(null);
      $datos->setObsemp(null);
    }
    $datos->save();

    $c = new Criteria();
    $c->add(NpasicarempPeer :: CODEMP, $datos->getCodemp());
    $dato = NpasicarempPeer :: doSelectOne($c);
    if ($dato) {
      $dato->setNomemp($datos->getNomemp());
      $dato->save();
    }

    $l = new Criteria();
    $l->add(NpasiconempPeer :: CODEMP, $datos->getCodemp());
    $dato1 = NpasiconempPeer :: doSelectOne($l);
    if ($dato1) {
      $dato1->setNomemp($datos->getNomemp());
      $dato1->save();
    }

    $k = new Criteria();
    $k->add(NpasiempcontPeer :: CODEMP, $datos->getCodemp());
    $dato2 = NpasiempcontPeer :: doSelectOne($k);
    if ($dato2) {
      $dato2->setNomemp($datos->getNomemp());
      $dato2->setFeccal($datos->getFecing());
      $dato2->save();
    }

    self :: grabarInffam($datos, $grid);
    self :: grabarInfcur($datos, $grid2);
    self :: grabarExplabden($datos, $grid3);
    self :: grabarExplabfue($datos, $grid4);
    self :: grabarIngegr($datos, $grid5);
    self :: grabarIncapa($datos);
  }

  /**************************************************************************************************/

  public static function salvarNomdefdiaadicnom($registro, $grid) {
    $c = new Criteria();
    $c->add(NpdiaadicnomPeer :: CODNOM, $registro->getCodnom());
    NpdiaadicnomPeer :: doDelete($c);

    $x = $grid[0];
    $j = 0;
    while ($j < count($x)) {
      if ($x[$j]['check'] == "1") {
        $npdiaadicnom = new Npdiaadicnom();
        $npdiaadicnom->setCodnom($registro->getCodnom());
        $npdiaadicnom->setCodcon($x[$j]['codcon']);
        $npdiaadicnom->save();
      } //if
      $j++;
    } //while

  }

  /**************************************************************************************************/
  /* miki calculo de nomina */

  const ABREPAREN = 0;
  const IDENTIFICADOR = 1;
  const OPERANDO = 2;
  const OPERADOR = 3;
  const CIERRAPAREN = 4;
  const FUNCION = 5;

  /*public static function salvarNomdefespcon($concepto)
  {
   $concepto->save();

   $c = new Criteria();
   $c->add(NpasiconempPeer::CODCON,$concepto->getCodcon());
   $resul= NpasiconempPeer::doSelect($c);
   if ($resul)
   {
   foreach ($resul as $datos)
   {
     $datos->setNomcon($concepto->getNomcon());
     if ($concepto->getAcuhis()=='S')
     {
       $datos->setAcucon('S');
     }else{$datos->setAcucon('N');}

     $datos->save();
   }

   }
  }*/

  public static function buscar_Periodos($codnom, $codemp, $cargo, & $i_periodos_adicionales) {
    $i_periodos_adicionales = 0;
    $i_periodos = 0;

    $sql = "Select * from npvacdefgen where codnomvac ='" . $codnom . "' and PAGOAD='N'";
    if (Herramientas :: BuscarDatos($sql, & $npvalregcalnom)) {
      $i_periodos = 1; //0;
      return $i_periodos; //_adicionales;
    }

    $sql = "Select periodos from NPVACREGCALNOM A,NPVACREGSAL B where A.CodEmp='" . $codemp . "' And A.CodEmp=B.CodEmp And A.CodNom=B.CodNom and B.StaVac='N'";
    if (Herramientas :: BuscarDatos($sql, & $npvalregcalnom)) {
      $i_periodos = 1;
      $i_periodos_adicionales = $npvalregcalnom[0]["periodos"];
    }

    if ($i_periodos == 0) {
      $sql = "Select * from NPVACREGCALNOM A,NPNOMINA B where A.CodNom=B.CodNom AND A.CODNOM='" . $codnom . "'
                 And A.CodEmp='" . $codemp . "' AND A.CODCAR='" . $cargo . "' And A.FechaNomina > B.ProFec";
      if (!Herramientas :: BuscarDatos($sql, & $npvalregcalnom)) {
        $i_periodos = 1;
      }
    }
    return $i_periodos;
  }

  public static function buscar_Periodos_Efectivos($fechanomina, $frecuencianomina, $i_periodos, $frecuenciaconcepto, $i_periodos_adicionales, $opsi, $msem) {
    //print $fechanomina.'***'.$frecuencianomina.'***'.$i_periodos.'***'.$frecuenciaconcepto.'***'.$i_periodos_adicionales.'***'.$opsi.'***'.$msem;

    $i_periodosefectivos = 0;
    for ($i = 1; $i <= $i_periodos + $i_periodos_adicionales; $i++) {
      //print 'dentro del for!';
      //exit;
      switch ($frecuencianomina) {
        case "S" : //nomina semanal
          if ($opsi == 'true') // no es ultima semana
            {
            if (($frecuenciaconcepto == $msem) || ($frecuenciaconcepto == 'T')) {
              $i_periodosefectivos = $i_periodosefectivos +1;
            }
          } else // es ultima semana
            {
            if (($frecuenciaconcepto == $msem) || ($frecuenciaconcepto == 'T') || ($frecuenciaconcepto == 'U')) {
              $i_periodosefectivos = $i_periodosefectivos +1;
            }
          }
          $fecha = split('-', $fechanomina);
          $fechaux = $fecha[0] . '-' . $fecha[1] . '-' . $fecha[2];
          $dia = 7;
          $fechanomina = date("Y-m-d", strtotime("$fechaux +$dia day"));
          break;

        case "Q" : //nomina quincenal
          $fecha = split('-', $fechanomina);

          if (intval($fecha[2]) <= 15) // nomina es primera quincena
            {
            if (($frecuenciaconcepto == 'P') || ($frecuenciaconcepto == 'D')) //verificamos que el concepto este en la primera quincena o en ambas
              {
              $i_periodosefectivos = $i_periodosefectivos +1;
            }
            $fecha = split('-', $fechanomina);
            $fechaux = $fecha[0] . '-' . $fecha[1] . '-01';
            $mes = 1;
            $fechanomina = date("Y-m-d", strtotime("$fechaux +$mes month"));
          } else // es segunda quincena
            {
            if (($frecuenciaconcepto == 'S') || ($frecuenciaconcepto == 'D')) //verificamos que el concepto este en la primera quincena o en ambas
              {
              $i_periodosefectivos = $i_periodosefectivos +1;
            }
            $fecha = split('-', $fechanomina);
            $fechaux = $fecha[0] . '-' . $fecha[1] . '-15';
            $mes = 1;
            $fechanomina = date("Y-m-d", strtotime("$fechaux +$mes month"));
          }
          break;

        case "M" : //nomina quincenal
          if ($frecuenciaconcepto == 'M') {
            $i_periodosefectivos = $i_periodosefectivos +1;
          }
          $fecha = split('-', $fechanomina);
          $fechaux = $fecha[0] . '-' . $fecha[1] . '-01';
          $mes = 1;
          $fechanomina = date("Y-m-d", strtotime("$fechaux +$mes month"));
          break;

      } //fin switch
    } // fin for
    return $i_periodosefectivos;
  }

  /////////////////////////////////////////////////////////////////////////////////////////////////
  public static function posfix($infix) {
    /*   global $abreparen; //0
      global $identificador; //1
      global $operando; //2
      global $operador; //3
      global $cierreparen; //4
      global $funcion; //5
    */

    $operadores = array ();
    array_push($operadores, '(');
    $infix = $infix . ')';
    $opeant = true;
    $numant = false;
    $cadena = '';
    $error = false;

    while ($infix != '' && !$error) //es while
      {
      self :: separaToken(& $infix, & $token, & $tipo);

      if ($tipo == self :: IDENTIFICADOR) {
        self :: clasificaFuncion(& $token, & $tipo);
      }
      switch ($tipo) {
        ///////////////////////////////////
        case (self :: ABREPAREN) :
          $opeant = true;
          if ($numant) {
            array_push($operadores, '*');
          }
          array_push($operadores, $token);
          break;

          ///////////////////////////////////
        case (self :: FUNCION) :
          $opeant = true;
          if ($numant) {
            array_push($operadores, '*');
          }
          array_push($operadores, $token);
          break;

          ///////////////////////////////////
        case (self :: IDENTIFICADOR) :
          $cadena = $cadena . $token . " ";
          if ($numant && $tipo == self :: IDENTIFICADOR) {
            array_push($operadores, '.');
          }
          $opeant = false;
          break;

          ///////////////////////////////////
        case (self :: OPERANDO) :
          $cadena = $cadena . $token . " ";
          if ($numant && $tipo == self :: IDENTIFICADOR) {
            array_push($operadores, '.');
          }
          $opeant = false;
          break;

          ///////////////////////////////////
        case self :: OPERADOR :
          if ($opeant && ($token == '+' || $token == '-')) {
            if ($token == '-') {
              array_push($operadores, '~');
            }
          } else {
            while (self :: prioridad(self :: array_peek($operadores, count($operadores) - 1)) >= self :: prioridad($token)) {
              $cadena = $cadena . array_pop($operadores) . " ";
            }
            if ($token == ',' || $token == ';') {
              $opeant = false;
            } else {
              array_push($operadores, $token);
              $opeant = ($token != '%');
            }
          }
          break;

          ///////////////////////////////////
        case (self :: CIERRAPAREN) :
          $token = array_pop($operadores);
          while ($token != '(' && $token != '') {
            $cadena = $cadena . $token . " ";
            $token = array_pop($operadores);
          }
          $tipo = self :: OPERANDO;
          $opeant = false;
          break;

      } // fin switch
      $numant = ($tipo == self :: OPERANDO);
    } // fin while
    return trim($cadena);
  }

  /////////////////////////////////////////////////////////////////////////////////////////////////
  public static function separaToken(& $cadena, & $token, & $tipo) {
    $carvali = "";
    $letra = false;
    $numero = false;
    $cadena = trim($cadena);
    $c = trim(strtoupper(substr($cadena, 0, 1)));

    // validamos "A" to "Z"
    $values = '/^[a-zA-Z]+$/';
    if (preg_match($values, trim($c)) == 1) // 1 es valida
      {
      $letra = true;
    }
    ///////////////////////

    // validamos numerico
    $values = "/^[-]?([1-9]{1}[0-9]{0,}(\.[0-9]{0,2})?|0(\.[0-9]{0,2})?|\.[0-9]{1,2})$/";
    if (preg_match($values, trim($c)) == 1) // 1 es valida
      {
      $numero = true;
    }
    //////////////////////

    if (strtoupper(substr($cadena, 0, 1)) == "(") {
      $tipo = self :: ABREPAREN;
    } else
      if ($letra) {
        $carvali = "0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ";
        $tipo = self :: IDENTIFICADOR;
      } else
        if ($numero) {
          $carvali = ".0123456789";
          $tipo = self :: OPERANDO;
        } else
          if (strtoupper(substr($cadena, 0, 1)) == ")") {
            $tipo = self :: CIERRAPAREN;
          } else {
            $carvali = "";
            $tipo = self :: OPERADOR;
          }
    //////////
    for ($i = 1; $i <= strlen($cadena) - 1; $i++) {
      if (Herramientas :: instr($carvali, strtoupper(substr($cadena, $i, 1)), 0, 1) == 0) {
        break;
      }
    }
    //////////

    $token = strtoupper(substr($cadena, 0, $i));

    if ($token == ".") {
      $tipo = self :: OPERADOR;
    }
    $cadena = substr($cadena, $i);
  }

  /////////////////////////////////////////////////////////////////////////////////////////////////
  public static function clasificaFuncion(& $token, & $tipo) {
    $pos = strrpos("SIN COS INT LOG LN SGN SQR RND FINT FFRAC ", $token . " ", 0);

    if ($pos === false)
      $pos = -1;

    if ($pos != -1) {
      $tipo = self :: FUNCION;
    } else {
      self :: clasificaToken(& $token, & $tipo);
    }
    return true;
  }

  public static function clasificaToken(& $token, & $tipo) {
    if ($token == "DOBLE" || $token == "ROUND") {
      $tipo = self :: FUNCION;
    }
  }

  /////////////////////////////////////////////////////////////////////////////////////////////////
  public static function prioridad($operador) {
    $operadores = '(,;+-*/.^%~';
    $valpri = '01122334568';
    $pos = Herramientas :: instr($operadores, $operador, 0, 1);
    if ($pos != 0) {
      $pos = intval(substr($valpri, $pos -1, 1));
    } else {
      $pos = 7;
    }
    return $pos;
  }

  /////////////////////////////////////////////////////////////////////////////////////////////////
  public static function array_peek($stack, $where) {
    //First see if the stack is empty
    $cnt = count($stack);
    if ($cnt == 0)
      return NULL;
    //Then set $where to top of stack if it is omitted
    if (func_num_args() <= 1)
      $where = $cnt -1;
    //Next make sure $where is pointing to somewhere in the stack -
    //otherwise make it point to the top of the stack
    if ($where >= $cnt || $where < 0)
      $where = $cnt -1;
    return $stack[$where];
  }

  ///////////////////////////////////////////////////////////////////////////////////////////////
  public static function evalEcua(& $cadena, & $resecu, & $error, $empleado, $cargo, $concepto, $nomina, $liscon, $lismov, $lisvar, $lisfun, $lisemp, $lishis, $fecnom, $fechanac, $fechaing, $sexo, $vars = '', $especial = 'NO') {
    $ident = array ();
    $pila = array ();

    $error = false;

    while ($cadena != '' && !$error) {
      self :: separaToken(& $cadena, & $token, & $tipo);
      switch ($tipo) {
        ///////////////////////////////////
        case (self :: IDENTIFICADOR) :
          self :: evalIdent(& $token, & $pila, & $error, & $ident, & $empleado, & $cargo, & $concepto, & $nomina, & $liscon, & $lismov, & $lisvar, & $lisfun, & $lisemp, & $lishis, & $fecnom, & $fechanac, & $fechaing, & $sexo, & $vars, & $especial);
          break;

          ///////////////////////////////////
        case (self :: OPERANDO) :
          $token = H :: toFloatdecimal($token, 4);
          array_push($pila, $token);
          break;

          ///////////////////////////////////
        case (self :: OPERADOR) :
          self :: evalOperad($token, $pila, $error);
          break;
      } // end switch
    } // end while
    if (count($pila) < 1 || $error) // if pila.tope <> 1
      {
      $error = true;
    } else {
      $resecu = floatval((array_pop($pila)));
    }
  }

  /////////////////////////////////////////////////////////////////////////////////////////////////
  public static function evalIdent(& $token, & $pila, & $error, & $ident, & $empleado, & $cargo, & $concepto, & $nomina, & $liscon, & $lismov, & $lisvar, & $lisfun, & $lisemp, & $lishis, & $fecnom, & $fechanac, & $fechaing, & $sexo, & $vars, & $especial) {
    $valor = array_pop($pila);
    $error = false;
    switch ($token) {
      case "SIN" :
        if (!$error) {
          array_push($pila, strval(sin(floatval($valor))));
        }
        break;
      case "COS" :
        if (!$error) {
          array_push($pila, strval(cos(floatval($valor))));
        }
        break;
      case "INT" :
        if (!$error) {
          array_push($pila, strval(intval(floatval($valor))));
        }
        break;
      case "LOG" :
        if (!$error) {
          array_push($pila, strval(log(floatval($valor))));
        }
        break;
      case "LN" :
        if (!$error) {
          array_push($pila, strval(log(floatval($valor))));
        }
        break;
      case "SGN" :
        if (!$error) {
          array_push($pila, strval(self :: sgn(floatval($valor))));
        }
        break;
      case "SQR" :
        if (!$error) {
          array_push($pila, strval(sqrt(floatval($valor))));
        }
        break;
      case "RND" :
        if (!$error) {
          array_push($pila, strval(round(floatval($valor))));
        }
        break;
      case "FFRAC" :
        if (!$error) {
          array_push($pila, strval(floatval($valor) - (int) (floatval($valor))));
        }
        break;
      case "FINT" :
        if (!$error) {
          array_push($pila, strval((int) (floatval($valor))));
        }
        break;

      default :
        if (!$error) {
          array_push($pila, $valor);
        }

        $valor = "";

        if (count($ident) != 0) {
          //$valor=$ident[$token];
        } //else
        //{
        //   $valor="";
        //}

        $guardar = ($valor == '');

        if ($valor == '' && $empleado == '') {
          self :: evaluaToken(& $token, & $valor, & $pila, & $guardar, & $liscon, & $lismov, & $lisvar, & $lisfun, & $lisemp, & $lishis);
        } else
          if ($valor == "" && $empleado != "") {
            self :: calculaToken(& $token, & $valor, & $pila, & $guardar, & $empleado, & $cargo, & $concepto, & $nomina, & $fecnom, & $fechanac, & $fechaing, & $sexo, & $especial);
          }
        if ($guardar && $valor != "") {
          //$ident[$token]=$valor;
          $vars = $vars . chr(13) . $token . "=" . $valor; // no se que hacen con esto.
        }
        if ($valor != '') {
          $error = false;
          array_push($pila, $valor);
        } else {
          $error = true;
        }
    } // end switch

  }

  /////////////////////////////////////////////////////////////////////////////////////////////////
  public static function sgn($x) {
    return $x ? ($x > 0 ? 1 : -1) : 0;
  }

  /////////////////////////////////////////////////////////////////////////////////////////////////
  public static function evalOperad(& $token, & $pila, & $error) {
    $valor = array_pop($pila);
    if (count($pila) == 0)
      $error = true;
    else
      $error = false;

    if (!$error) {
      switch ($token) {
        case "+" :
          if (count($pila) < 1) {
            $error = true;
          } else {
            array_push($pila, strval(floatval(array_pop($pila)) + floatval($valor)));
          }
          break;

        case "-" :
          if (count($pila) < 1) {
            $error = true;
          } else {
            array_push($pila, strval(floatval(array_pop($pila)) - floatval($valor)));
          }
          break;

        case "*" :
          if (count($pila) < 1) {
            $error = true;
          } else {
            $valor2 = array_pop($pila);
            array_push($pila, strval(floatval($valor2) * floatval($valor)));
          }
          break;

        case "." :
          if (count($pila) < 1) {
            $error = true;
          } else {
            $valor2 = array_pop($pila);
            array_push($pila, strval(floatval($valor2) * floatval($valor)));
          }
          break;

        case "/" :
          if (floatval($valor) == 0) {
            $error = true;
          } else {
            $valor2 = array_pop($pila);
            if ($valor != "") {
              array_push($pila, strval(floatval($valor2) / floatval($valor)));
            } else {
              $error = true;
            }
          }

          break;

        case "^" :
          if (count($pila) < 1) {
            $error = true;
          } else {
            array_push($pila, strval(floatval(array_pop($pila)) ^ floatval($valor)));
          }
          break;

        case "~" :
          array_push($pila, strval(floatval($valor) * (-1)));
          break;

        case "%" :
          array_push($pila, strval(floatval($valor) / 100));
          break;

        default :
          $error = true;
      } // end switch
    } // end if error

  }

  public static function evaluaToken(& $token, & $valor, & $pila, & $guardar, & $liscon, & $lismov, & $lisvar, & $lisfun, & $lisemp, & $lishis) {
    $encontro = false;
    $i = 0;

    if (Herramientas :: StringPos($token, "NHIJO", 0) != -1) {
      $parametro = substr($token, 5, strlen($token) - 5);
      if (!is_numeric($parametro)) {
        $parametro = '0';
      }
      $token = "NHIJO";
    }

    if (Herramientas :: StringPos($token, "ACUC", 0) != -1) {
      $parametro = substr($token, 4, strlen($token) - 4);
      if (!is_numeric($parametro)) {
        $parametro = '000';
      }
      $token = "ACUC";
    }

    if (Herramientas :: StringPos($token, "STAB", 0) != -1) {
      $parametro = substr($token, 4, strlen($token) - 4);
      $fecha = substr($parametro, 2, 2) . "/" . substr($parametro, 0, 2) . "/" . substr($parametro, 4, 4);
      $rfec = strtotime($fecha);

      if (($rfec === -1 || $rfec === false)) {
        $parametro = "0101" . Date("Y");
      }
      $token = "STAB";
    }

    if (Herramientas :: StringPos($token, "CTAB", 0) != -1) {

      $parametro = substr($token, 4, strlen($token) - 4);
      $fecha = substr($parametro, 2, 2) . "/" . substr($parametro, 0, 2) . "/" . substr($parametro, 4, 4);
      $rfec = strtotime($fecha);

      if (($rfec === -1 || $rfec === false)) {
        $parametro = "0101" . Date("Y");
      }
      $token = "CTAB";
    }

    if (Herramientas :: StringPos($token, "STAF", 0) != -1) {
      $parametro = substr($token, 4, strlen($token) - 4);
      $fecha = substr($parametro, 2, 2) . "/" . substr($parametro, 0, 2) . "/" . substr($parametro, 4, 4);
      $rfec = strtotime($fecha);

      if (($rfec === -1 || $rfec === false)) {
        $parametro = "0101" . Date("Y");
      }
      $token = "STAF";
    }

    if (Herramientas :: StringPos($token, "NHMAYEDA", 0) != -1) {
      $parametro = substr($token, 8, strlen($token));

      $token = "NHMAYEDA";
    }

    if (Herramientas :: StringPos($token, "NHMENEDA", 0) != -1) {
      $parametro = substr($token, 8, strlen($token));
      $token = "NHMENEDA";
    }

    if (Herramientas :: StringPos($token, "SIMESDAD", 0) != -1) {
      $parametro = substr($token, 8, strlen($token));
      $token = "SIMESDAD";
    }

	if (Herramientas :: StringPos($token, "INTPRES", 0) != -1) {
      $parametro = substr($token, 7, strlen($token));
      $token = "INTPRES";
    }

    if (Herramientas :: StringPos($token, "SHORAS", 0) != -1) {
      $parametro = substr($token, 6, strlen($token));
      $token = "SHORAS";
    }

    if (Herramientas :: StringPos($token, "SDIAS", 0) != -1) {
      $parametro = substr($token, 5, strlen($token));
      $token = "SDIAS";
    }
    if (Herramientas :: StringPos($token, "FECDIAS", 0) != -1) {
      $parametro = substr($token, 7, strlen($token));
      $token = "FECDIAS";
    }
    if (Herramientas :: StringPos($token, "FECMES", 0) != -1) {
      $parametro = substr($token, 6, strlen($token));
      $token = "FECMES";
    }
    if (Herramientas :: StringPos($token, "FECANNOS", 0) != -1) {
      $parametro = substr($token, 8, strlen($token));
      $token = "FECANNOS";
    }


    if (Herramientas :: StringPos($token, "CTAF", 0) != -1) {
      $parametro = substr($token, 4, strlen($token) - 4);
      $fecha = substr($parametro, 2, 2) . "/" . substr($parametro, 0, 2) . "/" . substr($parametro, 4, 4);
      $rfec = strtotime($fecha);

      if (($rfec === -1 || $rfec === false)) {
        $parametro = "0101" . Date("Y");
      }
      $token = "CTAF";
    }

    /////////////////////BUSQUEDA EN LAS LISTAS///////////////////////////
    //  LISCON

    if (!$encontro) {
      foreach ($liscon as $con) {
        if (strtoupper(substr($con, 0, Herramientas :: instr($con, " ", 0, 1) - 1)) == strtoupper($token)) {
          $encontro = true;
          break;
        }
      }
    }

    // LISMOV

    if (!$encontro) {
      foreach ($lismov as $mov) {
        if (strtoupper(substr($mov, 0, Herramientas :: instr($mov, " ", 0, 1) - 1)) == strtoupper($token)) {
          $encontro = true;
          break;
        }
      }
    }

    //LISVAR

    if (!$encontro) {
      foreach ($lisvar as $var) {
        if (strtoupper(substr($var, 0, Herramientas :: instr($var, " ", 0, 1) - 1)) == strtoupper($token)) {
          $encontro = true;
          break;
        }
      }
    }

    //LISFUN

    if (!$encontro) {
      foreach ($lisfun as $fun) {
        if (strtoupper(substr($fun, 0, Herramientas :: instr($fun, " ", 0, 1) - 1)) == strtoupper($token)) {
          $encontro = true;
          break;
        }
      }
    }

    //LISEMP

    if (!$encontro) {
      foreach ($lisemp as $emp) {
        if (strtoupper(substr($emp, 0, Herramientas :: instr($emp, " ", 0, 1) - 1)) == strtoupper($token)) {
          $encontro = true;
          break;
        }
      }
    }

    //LISHIS

    if (!$encontro) {
      foreach ($lishis as $his) {
        if (strtoupper(substr($his, 0, Herramientas :: instr($his, " ", 0, 1) - 1)) == substr(strtoupper($token), 0, 6)) {
          $fec1 = substr($token, 7, 2) . "/" . substr($token, 9, 2) . "/" . substr($token, 11, 4);
          $dia = substr($fec1, 0, 2);
          $mes = substr($fec1, 3, 2);
          $ano = substr($fec1, 6, 4);
          $fec11 = $mes . "/" . $dia . "/" . $ano;

          $fec2 = substr($token, 15, 2) . "/" . substr($token, 17, 2) . "/" . substr($token, 19, 4);
          $dia = substr($fec2, 0, 2);
          $mes = substr($fec2, 3, 2);
          $ano = substr($fec2, 6, 4);
          $fec22 = $mes . "/" . $dia . "/" . $ano;

          $rfec1 = strtotime($fec11);
          $rfec2 = strtotime($fec22);

          if (!($rfec1 === -1 || $rfec1 === false) && !($rfec2 === -1 || $rfec2 === false) && (Herramientas :: StringPos("PSMN", substr($token, 24, 1), 0) != -1) && (substr($token, 25)) == "0") {
            $encontro = true;
          } else
            if ($fec1 == "DD/MM/AAAA" && $fec2 == "DD/MM/AAAA" && $pos <> -1 && is_numeric(substr($token, 25)) > 0) {
              if (floatval(substr($token, 25)) > 0) {
                $encontro = true;
                break;
              }
            }
        }
      }
    }
    // este gran pedazo es + que  todo para calculo de conceptos... (MIKI)
    /*********************************************************************/
    //ya esta implantada la solucion(CARLOS OVIDIO)
    //(LISTO Y ACTUALIZADO)
    ////////////////////////////////////////////////

    if ($encontro) {
      $valor = 1;
    }
  }

  public static function calculaToken(& $token, & $valor, & $pila, & $guardar, & $empleado, & $cargo, & $concepto, & $nomina, & $fecnom, & $fechanac, & $fechaing, & $sexo, & $especial)
  // ??????? pasarle todos los param q necesito: $nomina, $cargo ...etc etc etc.
  {
    if (strrpos($fecnom, "/")) {
      $fecaux = split("/", $fecnom);
      $fecnom = $fecaux[2] . '-' . $fecaux[1] . '-' . $fecaux[0];
    }

    if ($especial == 'SI') {
      $cadena = " and coalesce(especial,'N')='S' ";
    } else {
      $cadena = " and coalesce(especial,'N')='N' ";
    }

    //////////////////////////////////////////////////
    // definiciones de tabla

    if (trim($token) == "NHIJO") {
      $token = "NHIJO0";
    }

    if (Herramientas :: StringPos($token, "NHIJO", 0) != -1)
      //if ( Herramientas::instr($token,"NHIJO",0,1) > 0 )
      {
      $parametro = substr($token, 5, strlen($token) - 5);
      if (!is_numeric($parametro)) {
        $parametro = "0";
      }
      $token = "NHIJO";
    }

    if (trim($token) == "ACUC") {
      $token = "ACUC0";
    }

    if (Herramientas :: StringPos($token, "ACUC", 0) != -1)
      //if ( Herramientas::instr($token,"ACUC",0,1) > 0 )
      {
      $parametro = substr($token, 4, strlen($token) - 4);
      if (!is_numeric($parametro)) {
        $parametro = "000";
      }
      $token = "ACUC";
    }

    if (Herramientas :: StringPos($token, "STAB", 0) != -1) {
      $parametro = substr($token, 4, strlen($token) - 4);
      $fecha = substr($parametro, 2, 2) . "/" . substr($parametro, 0, 2) . "/" . substr($parametro, 4, 4);
      $rfec = strtotime($fecha);

      if (($rfec === -1 || $rfec === false)) {
        $parametro = "0101" . Date("Y");
      }
      $token = "STAB";
    }

    if (Herramientas :: StringPos($token, "CTAB", 0) != -1) {

      $parametro = substr($token, 4, strlen($token) - 4);
      $fecha = substr($parametro, 2, 2) . "/" . substr($parametro, 0, 2) . "/" . substr($parametro, 4, 4);
      $rfec = strtotime($fecha);

      if (($rfec === -1 || $rfec === false)) {
        $parametro = "0101" . Date("Y");
      }
      $token = "CTAB";
    }

    if (Herramientas :: StringPos($token, "STAF", 0) != -1) {

      $parametro = substr($token, 4, strlen($token) - 4);
      $fecha = substr($parametro, 2, 2) . "/" . substr($parametro, 0, 2) . "/" . substr($parametro, 4, 4);
      $rfec = strtotime($fecha);

      if (($rfec === -1 || $rfec === false)) {
        $parametro = "0101" . Date("Y");
      }
      $token = "STAF";
    }

    if (Herramientas :: StringPos($token, "NHMAYEDA", 0) != -1) {
      $parametro = substr($token, 8, strlen($token));

      $token = "NHMAYEDA";
    }

    if (Herramientas :: StringPos($token, "NHMENEDA", 0) != -1) {
      $parametro = substr($token, 8, strlen($token));
      $token = "NHMENEDA";
    }

   if (Herramientas :: StringPos($token, "SIMESDAD", 0) != -1) {
      $parametro = substr($token, 8, strlen($token));

      $token = "SIMESDAD";
    }

    if (Herramientas :: StringPos($token, "SHORAS", 0) != -1) {
      $parametro = substr($token, 6, strlen($token));

      $token = "SHORAS";
    }

	if (Herramientas :: StringPos($token, "INTPRES", 0) != -1) {
      $parametro = substr($token, 7, strlen($token));
      $token = "INTPRES";
    }

    if (Herramientas :: StringPos($token, "SDIAS", 0) != -1) {
      $parametro = substr($token, 5, strlen($token));

      $token = "SDIAS";
    }

    if (Herramientas :: StringPos($token, "FECDIAS", 0) != -1) {
      $parametro = substr($token, 7, strlen($token));
      $token = "FECDIAS";
    }
    if (Herramientas :: StringPos($token, "FECMES", 0) != -1) {
      $parametro = substr($token, 6, strlen($token));
      $token = "FECMES";
    }
    if (Herramientas :: StringPos($token, "FECANNOS", 0) != -1) {
      $parametro = substr($token, 8, strlen($token));
      $token = "FECANNOS";
    }

    if (Herramientas :: StringPos($token, "CTAF", 0) != -1) {

      $parametro = substr($token, 4, strlen($token) - 4);
      $fecha = substr($parametro, 2, 2) . "/" . substr($parametro, 0, 2) . "/" . substr($parametro, 4, 4);
      $rfec = strtotime($fecha);

      if (($rfec === -1 || $rfec === false)) {
        $parametro = "0101" . Date("Y");
      }
      $token = "CTAF";
    }

    switch ($token) {
      case "TAF" :
        $criterio = "Select coalesce(SUM(a.saldo),0) as campo from npNomCal A,NPDEFCPT B where  A.CODCON=B.CODCON AND  a.codnom='" . $nomina . "' and a.codemp='" . $empleado . "' and a.codcar='" . $cargo . "' AND b.OPECON='A' AND b.IMPCPT='S' " . $cadena;
        if (Herramientas :: BuscarDatos($criterio, & $tabla)) {
          $valor = $tabla[0]["campo"];
        }
        break;

      case "SIC" :
        $criterio = "Select coalesce(SUM(a.saldo),0) as campo from npNomCal A,NPCONSALINT B where  A.CODCON=B.CODCON AND  a.CODNOM=B.CODNOM AND  a.codnom='" . $nomina . "' and a.codemp='" . $empleado . "' and a.codcar='" . $cargo . "' " . $cadena;
		#$criterio = "Select coalesce(SUM(a.saldo),0) as campo from npNomCal A,NPCONSALINT B where  A.CODCON=B.CODCON AND  a.CODNOM=B.CODNOM AND  a.codnom='" . $nomina . "' and a.codemp='" . $empleado . "' and a.codcar='" . $cargo . "' ";
        if (Herramientas :: BuscarDatos($criterio, & $tabla)) {
          $valor = $tabla[0]["campo"];
        }
        break;

      case "SC" :
        $criterio = "Select coalesce(SUM(MONTO),0) as campo from NPASICONEMP where (CODCON IN (SELECT x.CODCON FROM NPCONSUELDO x) OR CODCON IN (SELECT y.CODCON FROM NPCONCOMP y)) AND codemp='" . $empleado . "' and codcar='" . $cargo . "'";
        if (Herramientas :: BuscarDatos($criterio, & $tabla)) {
          $valor = $tabla[0]["campo"];
        }
        break;

      case "SCAR" :
        $criterio = "Select suecar as campo from npcargos where  codcar='" . $cargo . "'";
        if (Herramientas :: BuscarDatos($criterio, & $tabla)) {
          $valor = $tabla[0]["campo"];
        }
        break;

      case "SIM" :
        $criterio = "Select coalesce(SUM(Monto),0) as campo from npAsiConEmp A,NPCONSALINT B where  A.CODCON=B.CODCON  and a.codemp='" . $empleado . "' and a.codcar='" . $cargo . "'";
        if (Herramientas :: BuscarDatos($criterio, & $tabla)) {
          $valor = $tabla[0]["campo"];
        }
        break;

      case "NLP" :
        $criterio = "SELECT profec,ultfec FROM NPNOMINA WHERE  codnom='" . $nomina . "'";
        if (Herramientas :: BuscarDatos($criterio, & $tabla)) {
          $fecha1 = $tabla[0]["ultfec"];
          $fecha2 = $tabla[0]["profec"];
          $fechaini = $fechaing;

          if (strtotime($fechaini) > strtotime($fecha1)) {
            $salir = false;
          } else {
            $fechaini = $fecha1;
            $salir = true;
          }

          $fechaini_mod = split("-", $fechaini);
          if (Herramientas :: dia_semana($fechaini_mod[2], $fechaini_mod[1], $fechaini_mod[0]) == 'Lunes') {
            $salir = true;
          }

          while (!$salir && strtotime($fechaini) > strtotime($fecha1)) {
            $fechaini = Herramientas :: dateAdd('d', 1, $fechaini, '-');
            $fechaini_mod = split("-", $fechaini);
            if (Herramientas :: dia_semana($fechaini_mod[2], $fechaini_mod[1], $fechaini_mod[0]) == 'Lunes')
              $salir = true;
          }

          $numerosemanas = 0;
          while (strtotime($fechaini) <= strtotime($fecha2)) {
            $fechaini_mod = split("-", $fechaini);
            if (Herramientas :: dia_semana($fechaini_mod[2], $fechaini_mod[1], $fechaini_mod[0]) == 'Lunes') {
              $numerosemanas += 1;
            }
            $fechaini = Herramientas :: dateAdd('d', 1, $fechaini, '+');
          }
          $valor = $numerosemanas;
        }
        break;

      case "DM" :
        //'verificamos que no haya entrado En ese mes
        $fechaing_mod = split('-', $fechaing);
        $fecnom_mod = split('-', $fecnom);
        $mesano_ing = $fechaing_mod[0] . $fechaing_mod[1];
        $mesano_nom = $fecnom_mod[0] . $fecnom_mod[1];

        if ($mesano_ing == $mesano_nom) {
          //CDate(UltimoDiaMes(CStr(FecNom)))) + (31 - Val(Format(UltimoDiaMes(CStr(FecNom))
          $ultdia = date('t', strtotime($fecnom));
          $fecnom_aux = split('-', $fecnom);
          $fecnom1 = $fecnom_aux[0] . '-' . $fecnom_aux[1] . '-' . str_pad(strval($ultdia), 2, '0', STR_PAD_LEFT);
          $fecnom2 = 31 - intval($ultdia);
          $fecnom_tot = Herramientas :: dateAdd('d', $fecnom2, $fecnom1, '+');

          $valor = Herramientas :: dateDiff('d', $fechaing, $fecnom_tot);

          if ($fecnom_aux[1] == '02') {
            if ($valor >= 28) {
              $valor = 30;
            }
          } else {
            if ($valor >= 30) {
              $valor = 30;
            }
          }
        } else {
          $valor = 30;
        }
        break;

      case "DP" :
        //'verificamos que no haya entrado En ese mes
        $fechaing_mod = split('-', $fechaing);
        $fecnom_mod = split('-', $fecnom);
        $mesano_ing = $fechaing_mod[0] . $fechaing_mod[1];
        $mesano_nom = $fecnom_mod[0] . $fecnom_mod[1];

        if ($mesano_ing == $mesano_nom) {
          $valor = Herramientas :: dateDiff('d', $fechaing, $fecnom) + 1;
          $fecnom_aux = split('-', $fecnom);
          if (intval($fecnom_aux[2]) > 15) {
            if ($fecnom_aux[1] == '02') {
              if ($fecnom_aux[2] == '28') {
                $valor = $valor +2;
              }
              if ($fecnom_aux[2] == '29') {
                $valor = $valor +1;
              }
            } else {
              if ($valor > 15) {
                $valor = 15;
              }
            }
          }
        } else {
          $valor = 15;
        }
        break;

      case "NL" :
        $fecnom_aux = split('-', $fecnom);
        $fecha1 = $fecnom_aux[0] . '-' . $fecnom_aux[1] . '-01';
        $fecha2 = Herramientas :: dateAdd('m', 1, $fecha1, '+');
        $fecha2 = Herramientas :: dateAdd('d', 1, $fecha2, '-');

        $criterio = "Select fecrei from nphojint where codemp='" . $empleado . "'";
        if (Herramientas :: BuscarDatos($criterio, & $datosper)) {
          if (trim($datosper[0]["fecrei"]) != '') {
            $fechaini = $datosper[0]["fecrei"];
            /*if ( strtotime($datosper[0]["fecret"]) < strtotime($fecha2) )
            {
              $fecha2=$datosper[0]["fecret"];
              $salir=false;
            }*/
          } else
            $fechaini = $fechaing;
        }
        if (strtotime($fechaini) > strtotime($fecha1)) {
          $salir = false;
        } else {
          $fechaini = $fecha1;
          $salir = true;
        }

        /*if (Herramientas::dia_semana($fechaini_mod[2],$fechaini_mod[1],$fechaini_mod[0])=='Lunes')
        {
          $salir=true;
        }*/

        $numerosemanas = 0;
        while (strtotime($fechaini) <= strtotime($fecha2)) {
          $fechaini_mod = split('-', $fechaini);
          if (Herramientas :: dia_semana($fechaini_mod[2], $fechaini_mod[1], $fechaini_mod[0]) == 'Lunes') {
            $numerosemanas += 1;
          }
          $fechaini = Herramientas :: dateAdd('d', 1, $fechaini, '+');
        }
        $valor = $numerosemanas;
        break;

      case "NS" :
        $fecnom_aux = split('-', $fecnom);
        $fecha1 = $fecnom_aux[0] . '-' . $fecnom_aux[1] . '-01';
        $fecha2 = Herramientas :: dateAdd('m', 1, $fecha1, '+');
        $fecha2 = Herramientas :: dateAdd('d', 1, $fecha2, '-');

        $numerosemanas = 0;

        while (strtotime($fecha1) <= strtotime($fecha2)) {
          $fecha1_mod = split('-', $fecha1);
          if (Herramientas :: dia_semana($fecha1_mod[2], $fecha1_mod[1], $fecha1_mod[0]) == 'Lunes') {
            $numerosemanas += 1;
          }
          $fecha1 = Herramientas :: dateAdd('d', 1, $fecha1, '+');
        }
        $fecnom_aux = split('-', $fecnom);
        $fecha1 = $fecnom_aux[0] . '-' . $fecnom_aux[1] . '-01';
        $fecha2 = Herramientas :: dateAdd('m', 1, $fecha1, '+');
        $fecha2 = Herramientas :: dateAdd('d', 1, $fecha2, '-');
        $valor = $numerosemanas;

        break;

      case "PHIJO" :
        //??????????????? HAY QUE MIGRARLA A POSTGRES
        $sql = "SELECT coalesce(SUM(C.MONTO),0) as elmonto
                  FROM NPINFFAM A,NPPRIMASHIJOS C WHERE
                           A.CODEMP='" . $empleado . "'
                           and a.parfam=c.parfam
                        AND TRUNC(Months_between(TO_DATE('" . $fecnom . "','YYYY-MM-DD'), A.FECNAC)/12)>= C.EDADDES
                           AND TRUNC(Months_between(TO_DATE('" . $fecnom . "','YYYY-MM-DD'), A.FECNAC)/12)<= C.EDADHAS
                  AND (CASE WHEN C.ESTUDIOS='S' THEN 'E' ELSE coalesce(a.ocupac,'') END)=coalesce(a.ocupac,'')";
        if (Herramientas :: BuscarDatos($sql, & $tabla)) {
          $valor = $tabla[0]["elmonto"];
        }
        break;

      case "NHIJO" : // ??????????????????
        $aux="%HIJ%";
          $codhijo="001";
          $criterio = "SELECT tippar FROM nptippar WHERE  upper(despar) like '". $aux . "'";
          if (Herramientas :: BuscarDatos($criterio, &$reg))
          {
                  $codhijo=$reg[0]["tippar"];
          }
        $sql = "Select coalesce(Count(Cedfam),0) as cuantos From NPINFFAM Where CodEmp='" . $empleado . "'  and  parfam='". $codhijo ."' And TRUNC((date(now())-FECNAC)/365)<='" . $parametro . "'";
        if (Herramientas :: BuscarDatos($sql, & $tabla)) {
          $valor = $tabla[0]["cuantos"];
        }
        break;

      case "PPROF" : // ??????????????'
        $sql = "SELECT sum(coalesce(A.PRIMA,0)) as elmonto
				FROM NPPRIMAPROFES a, nphojint b
				WHERE
				a.GRADO=b.codnivedu and
				b.codemp='$empleado'";
        if (Herramientas :: BuscarDatos($sql, & $tabla)) {
          $valor = $tabla[0]["elmonto"];
        }
        break;

      case "PROFE" : // profesion
        $c = new Criteria();
        $c->add(NpinfcurPeer :: CODEMP, $empleado);
        $c->add(NpinfcurPeer :: ACTIVO, TRUE);
        $infcur = NpinfcurPeer :: doSelectOne($c);

        if ($infcur) {
          $c = new Criteria();
          $c->add(NpprofesionPeer :: CODPROFES, $infcur->getCodprofes());
          $npprofesion = NpprofesionPeer :: doSelectOne($c);
          if ($npprofesion)
            $valor = $npprofesion->getNivpro();
          else
            $valor = '';
        } else {
          $valor = '';
        }

        break;

      case "CGUAR" :
        $sql = "select sum(valgua) as monto from npinffam inner join npguarde on codgua=codcon where codemp = '" . $empleado . "'";
        if (Herramientas :: BuscarDatos($sql, & $tabla)) {
          if ($tabla[0]["monto"] != null && $tabla[0]["monto"] != '')
            $valor = $tabla[0]["monto"];
          else
            $valor = 0;
        } else
          $valor = 0;

      case "PCARG" :
        $sql = "Select coalesce(b.Prima,0) as monto
                  from NpAsiCarEmp a,NPCARGOSCOL b where CodNom='" . $nomina . "'  AND a.status='V'
                  And a.codCarCol=b.codcarcol and A.CodEmp='" . $empleado . "' and codcar='" . $cargo . "'";
        if (Herramientas :: BuscarDatos($sql, & $tabla)) {
          $valor = $tabla[0]["monto"];
        }
        break;

      case "CCARG" :
        $valor = $cargo;
        break;

      case "ACUC" :
        $sql = "Select coalesce(Sum(case when B.TIPACU='C' then A.Cantidad
                                when B.TIPACU='M' then A.Monto
                              when B.TIPACU='S' then C.Saldo)*B.Factor),0) as Cuantos
                From NPASICONEMP A,NPACUMULACPT B,NPNOMCAL C
                Where
                A.CODEMP=C.CODEMP
                AND A.CODCON=C.CODCON
                AND A.CodCon=B.CodCon
                and c.codnom='$nomina' And A.CodEmp='" . $empleado . "' And B.CodAcu='" . $parametro . "'" . $cadena;
        if (Herramientas :: BuscarDatos($sql, & $tabla)) {
          $valor = $tabla[0]["cuantos"];
        }
        break;
      case "NHIJ" :
        $aux="%HIJ%";
          $codhijo="001";
          $criterio = "SELECT tippar FROM nptippar WHERE  upper(despar) like '". $aux . "'";
          if (Herramientas :: BuscarDatos($criterio, &$reg))
          {
                  $codhijo=$reg[0]["tippar"];
          }
        $sql = "Select coalesce(COUNT(*),0) as cuantos from NPInfFam where  CodEmp='" . $empleado . "' and parfam='". $codhijo ."' ";
        if (Herramientas :: BuscarDatos($sql, & $tabla)) {
          $valor = $tabla[0]["cuantos"];
        } else {
          $valor = 0;
        }
        break;

      case "ADF" :
        $fecnom_aux = split('-', $fecnom);
        $fecnom_mod = $fecnom_aux[0] . '-12-31';
        $valor = Herramientas :: dateDiff('d', $fechaing, $fecnom_mod) + 1;
        break;

      case "DV" : //????????????????'
        $sql = "SELECT A.FECHAENTRADA as fechaentrada,A.FECHASALIDA as fechasalida,
                    B.ULTFEC as ultfec, B.PROFEC as profec
                    FROM NPVACREGCALNOM A,NPNOMINA B
                       WHERE
                    B.codemp='" . $empleado . "'
                    and
                    (A.fechaentrada>=B.ULTFEC and A.fechaentrada<=B.PROFEC
                    OR (a.fechasalida>= b.ultfec and a.fechasalida<= B.PROFEC)
                    or (b.ultfec >= a.FECHASALIDA and b.ultfec <= a.FECHAENTRADA)
                    or (B.PROFEC >= a.FECHASALIDA and B.PROFEC <= a.FECHAENTRADA))
                    AND A.CodNom='" . $nomina . "' AND A.CODNOM=B.CODNOM";
        if (!Herramientas :: BuscarDatos($sql, & $tabla)) {
          $valor = 0;
        } else {
          $fec1 = $tabla[0]["fechasalida"];
          $fec2 = Herramientas :: dateAdd('d', 1, $tabla[0]["fechaentrada"], '-');
          if (strtotime($tabla[0]["fechasalida"]) > strtotime($tabla[0]["ultfec"])) {
            $fec1 = $tabla[0]["ultfec"];
          }
          if (strtotime($tabla[0]["fechaentrada"]) > strtotime($tabla[0]["profec"])) {
            $fec2 = $tabla[0]["profec"];
            $fec2_aux = split('-', $fec2);
            if ($fec2_aux[2] == '31') {
              $fec2 = $fec2_aux[0] . '-' . $fec2_aux[1] . '-30';
            }
          }

          $seguir = true;
          $valor = Herramientas :: dateDiff('d', $fec1, $fec2) + 1;
        }
        break;

      case "ADV" :
        $valor = Herramientas :: dateDiff('d', $fechaing, $fecnom) + 1;

        break;

      case "DBV" : // dias bono vacacional
        $sql = "SELECT DIASBONO as valor FROM NPVACREGCALNOM WHERE codemp='" . $empleado . "'
                  AND CodNom='" . $nomina . "' and codcar='" . $cargo . "'";
        if (Herramientas :: BuscarDatos($sql, & $tabla)) {
          $valor = $tabla[0]["valor"];
        } else {
          $valor = 0;
        }
        break;

      case "PV" : // periodos vacacionales
        $sql = "SELECT PERIODOS as campo FROM NPVACREGCALNOM WHERE codemp='" . $empleado . "'
                  AND CodNom='" . $nomina . "' and codcar='" . $cargo . "'";
        if (Herramientas :: BuscarDatos($sql, & $tabla)) {
          $valor = $tabla[0]["campo"];
        } else {
          $valor = 0;
        }
        break;

      case "AD" :
        $valor = Herramientas :: dateDiff('d', $fechaing, $fecnom) + 1;
        break;

      case "DFI" :
        $valor = intval(date('d', strtotime($fechaing))) + 1;
        break;

      case "DFE" :
        $sql = "Select FECREI from nphojint where codemp='" . $empleado . "'";
        if (Herramientas :: BuscarDatos($sql, & $datosper)) {
          if (trim($datosper[0]["fecrei"]) != '') {
            $valor = intval(date('d', strtotime($datosper[0]["fecrei"])));
          } else {
            $valor = 0;
          }
        } else {
          $valor = 0;
        }
        break;

      case "AM" :
		$valorano=0;
		$sql="select to_char(age(to_date('$fecnom','yyyy-mm-dd'),to_date('$fechaing','yyyy-mm-dd')),'YY') as ano";
		if (Herramientas :: BuscarDatos($sql, & $tabla)) {
			$valorano = intval($tabla[0]['ano']);
		}
		$valormes=0;
		$sql="select to_char(age(to_date('$fecnom','yyyy-mm-dd'),to_date('$fechaing','yyyy-mm-dd')),'MM') as mes";
		if (Herramientas :: BuscarDatos($sql, & $tabla)){
			$valormes = intval($tabla[0]['mes']);
		}
		$valor = ($valorano*12)+$valormes;
		return $valor;
        #$valor = Herramientas :: dateDiff('m', $fechaing, $fecnom);
        break;

      case "AC" :
        $sql = "Select fecasi from npasicaremp where Status='V' and CodNom='" . $nomina . "' and codemp='" . $empleado . "' and codcar='" . $cargo . "'";
        if (Herramientas :: BuscarDatos($sql, & $tabla)) {
          $valor = Herramientas :: dateDiff('d', $tabla[0]["fecasi"], $fecnom);
        }
        break;
      case "DNLAB" :
        $valor = 0;
        break;
      case "AAP" :
        if (strrpos($fecnom, "/")) {
          $fecaux = split("/", $fecnom);
          $hastaaux = $fecaux[2] . '-' . $fecaux[1] . '-' . $fecaux[0];
        } else {
          $hastaaux = $fecnom;
        }

        $sql = "select antpub('A','" . $empleado . "','" . $hastaaux . "','S') as aap from empresa;";
        if (Herramientas :: BuscarDatos($sql, & $tabla)) {
          if ($tabla[0]["aap"] != null && $tabla[0]["aap"] != '') {
            $valor = $tabla[0]["aap"];
          } else
            $valor = 0;
        } else
          $valor = 0;
        break;

      case "DC" :
        $sql = "Select fecasi from npasicaremp where Status='V' and CodNom='" . $nomina . "' and codemp='" . $empleado . "' and codcar='" . $cargo . "'";
        if (Herramientas :: BuscarDatos($sql, & $tabla)) {
          $valor = Herramientas :: dateDiff('d', $tabla[0]["fecasi"], $fecnom) + 1;
        }
        break;


      case "AA" :
        // ????????? año bisiesto ojoooooooooo cambiar
		$t= new Criteria();
        $t->add(NphojintPeer::CODEMP,$empleado);
        $result= NphojintPeer::doSelectOne($t);
        if ($result)
        {
          $fecharein=$result->getFecrei();
        }else $fecharein="";
		if ($fecharein!=""){
		  $sql="select to_char(age(to_date('$fecnom','yyyy-mm-dd'),to_date('$fecharein','yyyy-mm-dd')),'YY') as ano";
		}else{
          $sql="select to_char(age(to_date('$fecnom','yyyy-mm-dd'),to_date('$fechaing','yyyy-mm-dd')),'YY') as ano";
		}
		if (Herramientas :: BuscarDatos($sql, & $tabla)) {
			$valor = intval($tabla[0]['ano']);
		}else
        	$valor = 0;
		return $valor;
        break;
      case "AET" :
        $d= new Criteria();
        $d->add(NpinfcurPeer::CODEMP,$empleado);
        $d->add(NpinfcurPeer::ACTIVO,'1');
        $reg= NpinfcurPeer::doSelectOne($d);
        if ($reg)
        {
        	$feenttit=$reg->getFecenttit();
        }else $feenttit='';
		$sql="select to_char(age(to_date('$fecnom','yyyy-mm-dd'),to_date('$feenttit','yyyy-mm-dd')),'YY') as ano";
		if (Herramientas :: BuscarDatos($sql, & $tabla)) {
			$valor = intval($tabla[0]['ano']);
		}else
        	$valor = 0;
		return $valor;
        break;

      case "CATRAB" :
        $sql = "Select ultfec from NPNomina where CodNom='" . $nomina . "'";
        if (Herramientas :: BuscarDatos($sql, & $tabla)) {
          $fecnom1 = $tabla[0]["ultfec"];
          $valor = 0;
        $t= new Criteria();
        $t->add(NphojintPeer::CODEMP,$empleado);
        $result= NphojintPeer::doSelectOne($t);
        if ($result)
        {
          $fecharein=$result->getFecrei();
        }else $fecharein="";

        if ($fecharein!="")
        {
           if (intval(date('m', strtotime($fecharein))) == intval(date('m', strtotime($fecnom)))) {
            if (intval(date('d', strtotime($fecharein))) >= intval(date('d', strtotime($fecnom1))) && intval(date('d', strtotime($fecharein))) <= intval(date('d', strtotime($fecnom)))) {
              if (intval(date('Y', strtotime($fecharein))) < intval(date('Y', strtotime($fecnom)))) {
                $valor = 1;
              }
            }
          }
        }else{
           if (intval(date('m', strtotime($fechaing))) == intval(date('m', strtotime($fecnom)))) {
            if (intval(date('d', strtotime($fechaing))) >= intval(date('d', strtotime($fecnom1))) && intval(date('d', strtotime($fechaing))) <= intval(date('d', strtotime($fecnom)))) {
              if (intval(date('Y', strtotime($fechaing))) < intval(date('Y', strtotime($fecnom)))) {
                $valor = 1;
              }
            }
          }
        }
        }
        break;

      case "CC" :
        $sql = "Select * from npasicaremp where Status='V' and CodNom='" . $nomina . "' and codemp='" . $empleado . "'";
        if (Herramientas :: BuscarDatos($sql, & $tabla)) {
          $valor = count($tabla);
        }
        break;

      case "ED" :
        $dias = intval(Herramientas :: dateDiff('d', $fechanac, $fecnom));
        $fecha = Herramientas :: dateAdd('d', $dias, '1900-01-01', '+');
        $valor = Herramientas :: dateAdd('d', 1, $fecha, '+');
        break;

      case "EE" :
        $valor = Herramientas :: dateDiff('m', $fechanac, $fecnom);
        break;

      case "CTAB" :
      case "STAB" :
        $movconvar = substr($parametro, 0, 2) . "/" . substr($parametro, 2, 2) . "/" . substr($parametro, 4);
        $sql = "Select * from npasicaremp where Status='V' and CodNom='" . $nomina . "' and codemp='" . $empleado . "'";

        if (Herramientas :: BuscarDatos($sql, & $tabla)) {

		  if($tabla[0]['codtipded']!='' && $tabla[0]['codtipcat']!='')
		  {
	          $sql = "Select A.* from NPCOMOCP A, NPCARGOS B  WHERE B.CODCAR='" . $tabla[0]["codcar"] . "' AND A.CODTIPCAR=B.CODTIP AND A.GRACAR='".$tabla[0]['codtipcat']."' and A.PASCAR='".$tabla[0]['codtipded']."' AND FECDES<=TO_DATE('" . $movconvar . "','DD/MM/YYYY') ORDER BY FECDES DESC";
	          if (Herramientas :: BuscarDatos($sql, & $tablaescala)) {
	            $valor = $tablaescala[0]["suecar"];
	          } else {
	            $valor = 0;
	          }
		  }else
		  {
	  		if ($token = "STAB") {
	            $sql = "Select A.* from NPCOMOCP A,NPCARGOS B WHERE B.CODCAR='" . $tabla[0]["codcar"] . "' AND A.CODTIPCAR=B.CODTIP AND A.GRACAR=B.GRAOCP AND A.PASCAR='001' AND FECDES<=TO_DATE('" . $movconvar . "','DD/MM/YYYY') ORDER BY FECDES DESC";
	          } else {
	            $sql = "Select ABS(SUM(case when a.pascar='001' then a.suecar else a.suecar*-1)) as suecar from NPCOMOCP A,NPCARGOS B WHERE B.CODCAR='" . $tabla[0]["codcar"] . "' AND A.CODTIPCAR=B.CODTIP AND A.GRACAR=B.GRAOCP AND (A.PASCAR='001' OR A.PASCAR='" . $tabla[0]["paso"] . "') AND FECDES<=TO_DATE('" . $movconvar . "','DD/MM/YYYY') ORDER BY FECDES DESC";
	          }
	          if (Herramientas :: BuscarDatos($sql, & $tablaescala)) {
	            $valor = $tablaescala[0]["suecar"];
	          } else {
	            $valor = 0;
	          }
		  }
        } else
          $valor = 0;
        break;

      case "CTAF" :
      case "STAF" :
        $movconvar = substr($parametro, 0, 2) . "/" . substr($parametro, 2, 2) . "/" . substr($parametro, 4);
        $sql = "Select * from npasicaremp where Status='V' and CodNom='" . $nomina . "' and codemp='" . $empleado . "'";
        if (Herramientas :: BuscarDatos($sql, & $tabla)) {
          if ($token = "STAF") {
            $sql = "Select A.* from NPCOMOCP A,NPCARGOS B WHERE B.CODCAR='" . $tabla[0]["codcar"] . "' AND A.CODTIPCAR=B.CODTIP AND A.GRACAR=B.GRAOCP AND A.PASCAR='001' AND FECDES<=TO_DATE('" . $movconvar . "','DD/MM/YYYY') ORDER BY FECDES DESC";
          } else {
            $sql = "Select ABS(SUM(case when a.pascar='001' then a.suecar else a.suecar*-1)) as suecar from NPCOMOCP A,NPCARGOS B WHERE B.CODCAR='" . $tabla[0]["codcar"] . "' AND A.CODTIPCAR=B.CODTIP AND A.GRACAR=B.GRAOCP AND (A.PASCAR='001' OR A.PASCAR='" . $tabla[0]["paso"] . "') AND FECDES<=TO_DATE('" . $movconvar . "','DD/MM/YYYY') ORDER BY FECDES DESC";
          }
          if (Herramientas :: BuscarDatos($sql, & $tablaescala)) {
            $valor = $tablaescala[0]["suecar"];
          } else {
            $valor = 0;
          }
        } else
          $valor = 0;

        break;

      case "DHAB" :
          $criterio = "SELECT profec,ultfec FROM NPNOMINA WHERE  codnom='" . $nomina . "'";
          if (Herramientas :: BuscarDatos($criterio, & $tabla))
          {
           $fecha1 = $tabla[0]["ultfec"];
          $fecha2 = $tabla[0]["profec"];
          $faux = split('-', $fecha1);
          $fechadesde = $faux[2] . '/' . $faux[1] . '/' . $faux[0];
          $faux2 = split('-', $fecha2);
          $fechahasta = $faux2[2] . '/' . $faux2[1] . '/' . $faux2[0];

          $sql="SELECT diashab('".$nomina."',TO_DATE('". $fechadesde ."','DD/MM/YYYY'),TO_DATE('". $fechahasta ."','DD/MM/YYYY')) as diahab;";
          if (Herramientas :: BuscarDatos($sql, & $result)) {
            $valor = $result[0]["diahab"];
          }
          else
          {
            $valor = 0;
          }
          }
        else
        {
          $valor = 0;
        }
        break;

      case "DHABM" :
           $fecnom_aux = split('-', $fecnom);
          $fecha1 = $fecnom_aux[0] . '-' . $fecnom_aux[1] . '-01';
          $fecha2 = Herramientas :: dateAdd('m', 1, $fecha1, '+');
          $fecha2 = Herramientas :: dateAdd('d', 1, $fecha2, '-');
          $faux = split('-', $fecha1);
          $fechadesde = $faux[2] . '/' . $faux[1] . '/' . $faux[0];
          $faux2 = split('-', $fecha2);
          $fechahasta = $faux2[2] . '/' . $faux2[1] . '/' . $faux2[0];
          $sql="SELECT diashab('".$nomina."',TO_DATE('". $fechadesde ."','DD/MM/YYYY'),TO_DATE('". $fechahasta ."','DD/MM/YYYY')) as diahab;";
          if (Herramientas :: BuscarDatos($sql, & $result)) {
            $valor = $result[0]["diahab"];
          }
          else
          {
            $valor = 0;
          }
        break;

      case "CARG" :
        $sql="SELECT codcar FROM npasicaremp  where CODEMP='" . $empleado . "' AND CODNOM='".$nomina."'  AND status='V';";
        if (Herramientas :: BuscarDatos($sql, & $result)) {
          $valor = $result[0]["codcar"];
        }
        else
        {
          $valor = "";
        }
        break;

      case "NHMENEDA" :
          $aux="%HIJ%";
          $codhijo="001";
          $criterio = "SELECT tippar FROM nptippar WHERE  upper(despar) like '". $aux . "'";
          if (Herramientas :: BuscarDatos($criterio, &$reg))
          {
                  $codhijo=$reg[0]["tippar"];
          }
          $sql = "Select coalesce(COUNT(*),0) as cuantos from NPInfFam where  CodEmp='" . $empleado . "' and parfam='". $codhijo ."' and Extract(year from age(now(),fecnac))<='". $parametro ."' ";
        if (Herramientas :: BuscarDatos($sql, & $tabla)) {
          $valor= $tabla[0]["cuantos"];
        }
        else
        {
          $valor = 0;
        }
        break;

      case "NHMAYEDA" :
          $aux="%HIJ%";
          $codhijo="001";
          $criterio = "SELECT tippar FROM nptippar WHERE  upper(despar) like '". $aux . "'";
          if (Herramientas :: BuscarDatos($criterio, &$reg))
          {
                  $codhijo=$reg[0]["tippar"];
          }
          $sql = "Select coalesce(COUNT(*),0) as cuantos from NPInfFam where  CodEmp='" . $empleado . "' and parfam='". $codhijo ."' and Extract(year from age(now(),fecnac))>='". $parametro ."' ";
        if (Herramientas :: BuscarDatos($sql, & $tabla)) {
          $valor= $tabla[0]["cuantos"];
        }
        else
        {
          $valor = 0;
        }
        break;

      case "SIMESANT" :
       /*  $criterio = "Select coalesce(SUM(Monto),0) as campo from npHISCON A,NPCONSALINT B,NPNOMINA C where  A.CODCON=B.CODCON  and a.codemp='" . $empleado . "' AND  a.codNOM='" . $nomina . "' and  b.codNOM='" . $nomina . "'  and a.codcar='" . $cargo . "' and a.codnom=c.codnom and a.codnom=b.codnom and TO_CHAR(A.FECNOM,'MM')=LPAD(TRIM(to_char(to_number(to_char(c.profec,'MM'),'99')-1,'99')),2,'0') AND TO_CHAR(A.FECNOM,'YYYY')=TO_CHAR(C.PROFEC,'YYYY') ";
          if (Herramientas :: BuscarDatos($criterio, & $tabla)) {
             $valor = $tabla[0]["campo"];
          }
          else
          {
            $valor = 0;
          }*/
        $criterio = "Select coalesce(SUM(a.Monto),0) as campo from npHISCON A,NPCONSALINT B,NPNOMINA C where  A.CODCON=B.CODCON  and a.codemp='" . $empleado . "' AND  a.codNOM='" . $nomina . "' and  b.codNOM='" . $nomina . "' and a.codnom=c.codnom and a.codnom=b.codnom and TO_CHAR(A.FECNOM,'MM-yyyy')=to_char(c.profec,'MM-yyyy')  ";
        if (Herramientas :: BuscarDatos($criterio, & $tabla)) {
           $valor = $tabla[0]["campo"];
        }
        else
        {
          $valor = 0;
        }
        $criterio = "Select coalesce(SUM(a.saldo),0) as campo from npnomcal A,NPCONSALINT B,NPNOMINA C where  A.CODCON=B.CODCON  and a.codemp='" . $empleado . "' AND  a.codNOM='" . $nomina . "' and  b.codNOM='" . $nomina . "' and a.codnom=c.codnom and a.codnom=b.codnom ";
        if (Herramientas :: BuscarDatos($criterio, & $tabla)) {
           $valor = $valor+$tabla[0]["campo"];
        }
        else
        {
          $valor = $valor + 0;
        }

      break;
      case "SIPERANT" :
         $criterio = "Select coalesce(SUM(Monto),0) as campo from npHISCON A,NPCONSALINT B,NPNOMINA C where  A.CODCON=B.CODCON  and a.codemp='" . $empleado . "' AND  a.codNOM='" . $nomina . "' and a.codnom=c.codnom and a.codnom=b.codnom and A.FECNOM=c.ultfec-1 ";
          if (Herramientas :: BuscarDatos($criterio, & $tabla)) {
             $valor = $tabla[0]["campo"];
          }
          else
          {
            $valor = 0;
          }
      break;

      case "SIANOANT" ://nueva por Leobardo
 /*        // $criterio = "Select coalesce(SUM(Monto),0) as campo from npHISCON A,NPCONSALINT B,NPNOMINA C where  A.CODCON=B.CODCON  and a.codemp='" . $empleado . "' AND  a.codNOM='" . $nomina . "' and  b.codNOM='" . $nomina . "' and a.codnom=c.codnom and a.codnom=b.codnom and A.FECNOM>=add_months(c.profec,-13) and A.FECNOM<=add_months(c.profec,-1) ";
        $criterio = "Select coalesce(AVG(A.Monto),0) as campo from npHISCON A,NPCONSALINT B,NPNOMINA C where  A.CODCON=B.CODCON  and a.codemp='" . $empleado . "' AND  a.codNOM='" . $nomina . "' and  b.codNOM='" . $nomina . "' and a.codnom=c.codnom and a.codnom=b.codnom and A.FECNOM>=add_months(c.profec,-12)";
        if (Herramientas :: BuscarDatos($criterio, & $tabla)) {
           $valor = $tabla[0]["campo"];
        }
        else
        {
          $valor = 0;
        }
        $criterio = "Select coalesce(SUM(a.saldo),0) as campo from npnomcal A,NPCONSALINT B,NPNOMINA C where  A.CODCON=B.CODCON  and a.codemp='" . $empleado . "' AND  a.codNOM='" . $nomina . "' and  b.codNOM='" . $nomina . "' and a.codnom=c.codnom and a.codnom=b.codnom ";
        if (Herramientas :: BuscarDatos($criterio, & $tabla)) {
           $valor = ($valor+$tabla[0]["campo"])/2;
        }
        else
        {
          $valor = $valor + 0;
        }*/

        $criterio ="SELECT AVG(ELMONTO) as campo FROM (Select SUM(MONTO) AS ELMONTO,FECNOM FROM(Select SUM(MONTO) AS MONTO,TO_CHAR(FECNOM,'YYYY/MM') AS FECNOM
					from npHISCON A,Npdiaadicnom B,NPNOMINA C
					where  A.CODCON=B.CODCON
					and a.codemp='" . $empleado . "'
					AND  a.codNOM='" . $nomina . "'
					And  b.codNOM='" . $nomina . "'
					And a.codnom=c.codnom
					And a.codnom=b.codnom
					And A.FECNOM>=add_months(c.profec+1,-12)
					GROUP BY
					TO_CHAR(FECNOM,'YYYY/MM')
					UNION ALL
					Select coalesce(SUM(a.saldo),0) as MONTO,TO_CHAR(FECNOM,'YYYY/MM') AS FECNOM from npnomcal A,Npdiaadicnom B,NPNOMINA C
					where  A.CODCON=B.CODCON  and a.codemp='" . $empleado . "'
					AND  a.codNOM='" . $nomina . "'  and  b.codNOM='" . $nomina . "'
					and a.codnom=c.codnom and a.codnom=b.codnom
					group by TO_CHAR(FECNOM,'YYYY/MM')
					) LATABLA1 GROUP BY FECNOM order by fecnom
					) LATABLA2";

		if (Herramientas :: BuscarDatos($criterio, & $tabla)) {
           $valor = $tabla[0]["campo"];
        }
        else
        {
          $valor = 0;
        }
      break;

     case "SIMESDAD" :
       /*  $criterio = "Select coalesce(SUM(Monto),0) as campo from npHISCON A,NPCONSALINT B,NPNOMINA C where  A.CODCON=B.CODCON  and a.codemp='" . $empleado . "' AND  a.codNOM='" . $nomina . "' and  b.codNOM='" . $nomina . "'  and a.codcar='" . $cargo . "' and a.codnom=c.codnom and a.codnom=b.codnom and TO_CHAR(A.FECNOM,'MM')=LPAD(TRIM(to_char(to_number(to_char(c.profec,'MM'),'99')-1,'99')),2,'0') AND TO_CHAR(A.FECNOM,'YYYY')=TO_CHAR(C.PROFEC,'YYYY') ";
          if (Herramientas :: BuscarDatos($criterio, & $tabla)) {
             $valor = $tabla[0]["campo"];
          }
          else
          {
            $valor = 0;
          }*/
        $nromes=intval($parametro);
        $criterio = "Select coalesce(SUM(a.Monto),0) as campo from npHISCON A,NPCONSALINT B,NPNOMINA C where  A.CODCON=B.CODCON  and a.codemp='" . $empleado . "' AND  a.codNOM='" . $nomina . "' and  b.codNOM='" . $nomina . "' and a.codnom=c.codnom and a.codnom=b.codnom and TO_CHAR(A.FECNOM,'MM-yyyy')=(LPAD(TRIM(to_char(to_number(to_char(c.profec,'MM'),'99')-$nromes,'99')),2,'0')||'-'||TO_CHAR(c.profec,'yyyy'))  ";
        if (Herramientas :: BuscarDatos($criterio, & $tabla)) {
           $valor = $tabla[0]["campo"];
        }
        else
        {
          $valor = 0;
        }

      break;


     case "SDIAS" :
      if ($parametro=="0")
        $sueldo=0;
      else
        $sueldo= self::ObtenervalorMovimientoConceptoVariable($parametro,$empleado,$cargo,$fecnom,$nomina);


        if ($sueldo==0)
        {
           $criterio = "Select suecar as campo from npcargos where  codcar='" . $cargo . "'";
           if (Herramientas :: BuscarDatos($criterio, & $tabla))
           {
             $sueldo = $tabla[0]["campo"];
           }
        }

        if ($sueldo>0)
             $valor=floatval($sueldo)/30;
         else
             $valor=0;

      break;


     case "SHORAS" :
      if ($parametro=="0")
        $sueldo=0;
      else
        $sueldo= self::ObtenervalorMovimientoConceptoVariable($parametro,$empleado,$cargo,$fecnom,$nomina);

        if ($sueldo==0)
        {
           $criterio = "Select suecar as campo from npcargos where  codcar='" . $cargo . "'";
           if (Herramientas :: BuscarDatos($criterio, & $tabla))
           {
             $sueldo = $tabla[0]["campo"];
           }
        }

        if ($sueldo>0)
             $valor=(floatval($sueldo)/30)/8;
         else
             $valor=0;

      break;

     case "AAPMESES" :
        if (strrpos($fecnom, "/")) {
          $fecaux = split("/", $fecnom);
          $hastaaux = $fecaux[2] . '-' . $fecaux[1] . '-' . $fecaux[0];
        } else {
          $hastaaux = $fecnom;
        }

        $sql = "select antpub('M','" . $empleado . "','" . $hastaaux . "','S') as aap from empresa;";
        if (Herramientas :: BuscarDatos($sql, & $tabla)) {
          if ($tabla[0]["aap"] != null && $tabla[0]["aap"] != '') {
            $valor = $tabla[0]["aap"];
          } else
            $valor = 0;
        } else
          $valor = 0;
        break;

     case "AAPDIAS" :
        if (strrpos($fecnom, "/")) {
          $fecaux = split("/", $fecnom);
          $hastaaux = $fecaux[2] . '-' . $fecaux[1] . '-' . $fecaux[0];
        } else {
          $hastaaux = $fecnom;
        }

        $sql = "select antpub('D','" . $empleado . "','" . $hastaaux . "','S') as aap from empresa;";
        if (Herramientas :: BuscarDatos($sql, & $tabla)) {
          if ($tabla[0]["aap"] != null && $tabla[0]["aap"] != '') {
            $valor = $tabla[0]["aap"];
          } else
            $valor = 0;
        } else
          $valor = 0;
        break;

      case "NHIJEST" :
        $aux="%HIJ%";
          $codhijo="001";
          $criterio = "SELECT tippar FROM nptippar WHERE  upper(despar) like '". $aux . "'";
          if (Herramientas :: BuscarDatos($criterio, &$reg))
          {
                  $codhijo=$reg[0]["tippar"];
          }
        $sql = "Select coalesce(COUNT(*),0) as cuantos from NPInfFam where  CodEmp='" . $empleado . "' and parfam='". $codhijo ."' and  ocupac='E'";
        if (Herramientas :: BuscarDatos($sql, & $tabla)) {
          $valor = $tabla[0]["cuantos"];
        } else {
          $valor = 0;
        }
        break;

      case "FECDIAS":
          $mifecha="";
          $valor = 0;
          $criterio = "Select * from nphojint where codemp='" . $empleado . "'";
          if (Herramientas :: BuscarDatos($criterio, & $datosper)) {
            $aux = intval(substr($parametro, 1, 2));
            foreach ($datosper as $dat) {
              $i = 0;
              foreach ($dat as $d => $key) {
                if ($i == $aux) {
                  $mifecha= $key;
                }
                $i = $i +1;
              }
            }//foreach ($datosper as $dat)
            $fec_aux = split("-", $mifecha);
            if (count($fec_aux)>1)
            {
	            if (checkdate(intval($fec_aux[1]), intval($fec_aux[2]), intval($fec_aux[0])) )
	            {
	              $valor=$fec_aux[2];
	            }
            }
          }
      break;

      case "FECMES":
          $mifecha="";
          $valor = 0;
          $criterio = "Select * from nphojint where codemp='" . $empleado . "'";
          if (Herramientas :: BuscarDatos($criterio, & $datosper)) {
            $aux = intval(substr($parametro, 1, 2));
            foreach ($datosper as $dat) {
              $i = 0;
              foreach ($dat as $d => $key) {
                if ($i == $aux) {
                  $mifecha= $key;
                }
                $i = $i +1;
              }
            }//foreach ($datosper as $dat)
            $fec_aux = split("-", $mifecha);
            if (count($fec_aux)>1)
            {
	            if (checkdate(intval($fec_aux[1]), intval($fec_aux[2]), intval($fec_aux[0])) )
	            {
	              $valor=$fec_aux[1];
	            }
            }
          }
      break;

      case "FECANNOS":
          $mifecha="";
          $valor = 0;
          $criterio = "Select * from nphojint where codemp='" . $empleado . "'";
          if (Herramientas :: BuscarDatos($criterio, & $datosper)) {
            $aux = intval(substr($parametro, 1, 2));
            foreach ($datosper as $dat) {
              $i = 0;
              foreach ($dat as $d => $key) {
                if ($i == $aux) {
                  $mifecha= $key;
                }
                $i = $i +1;
              }
            }//foreach ($datosper as $dat)
            $fec_aux = split("-", $mifecha);
            if (count($fec_aux)>1)
            {
            	if (checkdate(intval($fec_aux[1]), intval($fec_aux[2]), intval($fec_aux[0])) )
            	{
              	 $valor=$fec_aux[0];
            	}
            }
          }
      break;

      case "CATRABMES" :
        $valor = 0;

        if (intval(date('m', strtotime($fechaing))) == intval(date('m', strtotime($fecnom))))
        {
           $valor = 1;
        }

        return $valor;
        break;

	  case "INTPRES" :
        $valor = 0;
        $fecha = date('d/m/Y',strtotime($fecnom));
        $criterio = "Select * from calculopres('$empleado','$fecha','$parametro','P') where tipo='DEPOSITADOS' order by fecini desc";

        if (Herramientas :: BuscarDatos($criterio, & $calpres))
		{
			$valor = $calpres[0]['monint'];
		}

        return $valor;
        break;

	  case "DIASBONOVAC" :

        $valor = 0;
        $fecha = date('d/m/Y',strtotime($fecnom));
        $criterio = "select sum(coalesce(a.diasbonovac,0)) as valor
				from npvacsalidas_det a, npvacsalidas b
				where
				b.fecpagbonvac=to_date('$fecha','dd/mm/yyyy')
				and a.codemp='$empleado'
				and a.fecvac=b.fecvac ";

        if (Herramientas :: BuscarDatos($criterio, & $rs))
			if($rs[0]['valor']!='')
				$valor = $rs[0]['valor'];

        return $valor;
        break;

	  case "MESFINALANO" :

        $valor = 0;
		$fecha = '31/12/'.date('Y',strtotime($fecnom));
        $criterio = "select months_between(fecing,to_date('$fecha','dd/mm/yyyy')+1) as valor
						from nphojint
						where
						codemp='$empleado'";

        if (Herramientas :: BuscarDatos($criterio, & $rs))
			if($rs[0]['valor']!='')
				$valor = $rs[0]['valor'];

        return $valor;
        break;
		
	  case "D360FA" :

        $valor = 0;
		$fecha = '31/12/'.date('Y',strtotime($fecnom));
        $criterio = "select dias360(to_char(fecing,'dd/mm/yyyy'),'$fecha') as valor
						from nphojint
						where
						codemp='$empleado'";

        if (Herramientas :: BuscarDatos($criterio, & $rs))
			if($rs[0]['valor']!='')
				$valor = $rs[0]['valor'];

        return $valor;
        break;	

      default :
        $aux = 0;

        if (Herramientas :: StringPos($token, "FFRAC", 0) != -1)
          //if ( Herramientas::instr($token,'FFRAC',0,1)!=0 )
          {
          $movconbar = substr($token, Herramientas :: instr($token, '(', 0, 1) - 1);

          if (substr($movconbar, 0, 1) == 'M') // movimiento
            {
            if (substr($movconbar, 7, 0) == 'S') {
              $criterio = "Select Sum(cantidad) as cantidads,Sum(monto) as montos, Sum(Acumulado) as acumulados
                                from npasiconemp where activo='S' and codemp='" . $empleado . "' and codcon='" . substr($movconbar, 4, 3) . "' ";
              if (Herramientas :: BuscarDatos($criterio, & $tabla)) {
                if (substr($movconbar, 8, 1) == 'C') {
                  $sql = "Select * from nptippre where codcon='" . substr($movconbar, 4, 3) . "' ";
                  if (Herramientas :: BuscarDatos($sql, & $tablaprestamo)) {
                    if (floatval($tabla[0]["acumulados"]) - floatval($tabla[0]["cantidads"]) <= 0) {
                      $aux = $tabla[0]["acumulados"];
                    } else {
                      $aux = $tabla[0]["cantidads"];
                    }
                  } else {
                    $aux = $tabla[0]["cantidads"];
                  }
                } else {
                  $aux = $tabla[0]["montos"];
                } // tipo c o m
              }
            } else {
              $criterio = "Select cantidad,monto,acumulado from npasiconemp where activo='S' and codemp='" . $empleado . "' and codcar='" . $cargo . "' and codcon='" . substr($movconbar, 4, 3) . "' ";
              if (Herramientas :: BuscarDatos($criterio, & $tabla)) {
                if (substr($movconbar, 7, 1) == 'C') {
                  $sql = "Select * from nptippre where codcon='" . substr($movconbar, 4, 3) . "' ";
                  if (Herramientas :: BuscarDatos($sql, & $tablaprestamo)) {
                    if (floatval($tabla[0]["acumulado"]) - floatval($tabla[0]["cantidad"]) <= 0) {
                      $aux = $tabla[0]["acumulado"];
                    } else {
                      $aux = $tabla[0]["cantidad"];
                    }
                  } else {
                    $aux = $tabla[0]["cantidad"];
                  }
                } else {
                  $aux = $tabla[0]["monto"];
                } // tipo c o m
              } // tabla
            }
          }
          elseif (substr($movconbar, 0, 1) == 'C') // concepto
          {
            $criterio = "Select a.saldo as saldo,a.acumulado as acumulado,b.opecon as opecon
                            from npNomCal a, Npdefcpt b
                            where  a.codnom='" . $nomina . "' and a.codemp='" . $empleado . "'
                            and a.codcar='" . $cargo . "'
                            and a.codcon='" . substr($movconbar, 1, 3) . "'
                            and a.codcon = b.codcon " . $cadena;
            if (Herramientas :: BuscarDatos($criterio, & $tabla)) {
              if (substr($movconbar, 4, 1) == 'S') {
                $aux = $tabla[0]["saldo"];
              } else {
                $aux = $tabla[0]["acumulado"];
              }
            }
          }
          elseif (substr($movconbar, 0, 1) == 'V') // variable
          {
            $criterio = "Select * from npdefvar where  codnom='" . $nomina . "' and codvar='" . substr($movconbar, 1, 3) . "' ";
            if (Herramientas :: BuscarDatos($criterio, & $tabla)) {
              $mid = 2 + intval(substr($movconbar, 4, 1)) - 2;
              $campo = 'valor' . $mid;
              $aux = $tabla[0][$campo]; // ???????????
            }
          }

          $valor = floatval($aux) - intval($aux); // FFRAC
        } // FFRAC

        elseif (Herramientas :: StringPos($token, "FINT", 0) != -1)
        //( Herramientas::instr($token,'FINT',0,1) != 0 )
        {
          $movconbar = substr($token, Herramientas :: instr($token, '(', 0, 1) - 1);

          if (substr($movconbar, 0, 1) == 'M') // movimiento
            {
            if (substr($movconbar, 7, 1) == 'S') {
              $criterio = "Select Sum(cantidad) as cantidads,Sum(monto) as montos, Sum(Acumulado) as acumulados
                                from npasiconemp where activo='S' and codemp='" . $empleado . "' and codcon='" . substr($movconbar, 4, 3) . "' ";
              if (Herramientas :: BuscarDatos($criterio, & $tabla)) {
                if (substr($movconbar, 8, 1) == 'C') {
                  $sql = "Select * from nptippre where codcon='" . substr($movconbar, 4, 3) . "' ";
                  if (Herramientas :: BuscarDatos($sql, & $tablaprestamo)) {
                    if (floatval($tabla[0]["acumulados"]) - floatval($tabla[0]["cantidads"]) <= 0) {
                      $aux = $tabla[0]["acumulados"];
                    } else {
                      $aux = $tabla[0]["cantidads"];
                    }
                  } else {
                    $aux = $tabla[0]["cantidads"];
                  }
                } else {
                  $aux = $tabla[0]["montos"];
                } // tipo c o m
              }
            } // movconvar 7 1
            else {
              $criterio = "Select cantidad,monto,acumulado from npasiconemp where activo='S' and codemp='" . $empleado . "' and codcar='" . $cargo . "' and codcon='" . substr($movconbar, 4, 3) . "' ";
              if (Herramientas :: BuscarDatos($criterio, & $tabla)) {
                if (substr($movconbar, 7, 1) == 'C') {
                  $sql = "Select * from nptippre where codcon='" . substr($movconbar, 4, 3) . "' ";
                  if (Herramientas :: BuscarDatos($sql, & $tablaprestamo)) {
                    if (floatval($tabla[0]["acumulado"]) - floatval($tabla[0]["cantidad"]) <= 0) {
                      $aux = $tabla[0]["acumulado"];
                    } else {
                      $aux = $tabla[0]["cantidad"];
                    }
                  } else {
                    $aux = $tabla[0]["cantidad"];
                  }
                } else {
                  $aux = $tabla[0]["monto"];
                } // tipo c o m
              } // tabla
            } // fin else movconbar 7 1
          }
          elseif (substr($movconbar, 0, 1) == 'C') // concepto
          {
            $criterio = "Select a.saldo as saldo,a.acumulado as acumulado,b.opecon as opecon
                            from npNomCal a, Npdefcpt b
                            where  a.codnom='" . $nomina . "' and a.codemp='" . $empleado . "'
                            and a.codcar='" . $cargo . "'
                            and a.codcon='" . substr($movconbar, 1, 3) . "'
                            and a.codcon = b.codcon " . $cadena;
            if (Herramientas :: BuscarDatos($criterio, & $tabla)) {
              if (substr($movconbar, 4, 1) == 'S') {
                $aux = $tabla[0]["saldo"];
              } else {
                $aux = $tabla[0]["acumulado"];
              }
            }
          } // fin concepto
          elseif (substr($movconbar, 0, 1) == 'V') // variable
          {
            $criterio = "Select * from npdefvar where  codnom='" . $nomina . "' and codvar='" . substr($movconbar, 1, 3) . "' ";
            if (Herramientas :: BuscarDatos($criterio, & $tabla)) {
              $mid = 2 + intval(substr($movconbar, 4, 1)) - 2;
              $campo = 'valor' . $mid;
              $aux = $tabla[0][$campo]; // ???????????
            }
          }
          $valor = intval($aux);
        } // end fint
        elseif (substr($token, 0, 1) == 'M') // M
        {
          if (substr($token, 7, 1) == 'S') {
            $criterio = "Select Sum(cantidad) as cantidads,Sum(monto) as montos, Sum(Acumulado) as acumulados
                              from npasiconemp where activo='S' and codemp='" . $empleado . "' and codcon='" . substr($token, 4, 3) . "' ";
            if (Herramientas :: BuscarDatos($criterio, & $tabla)) {
              if (substr($token, 8, 1) == 'C') {
                $sql = "Select * from nptippre where codcon='" . substr($token, 4, 3) . "' ";
                if (Herramientas :: BuscarDatos($sql, & $tablaprestamo)) {
                  if (floatval($tabla[0]["acumulados"]) - floatval($tabla[0]["cantidads"]) <= 0) {
                    $aux = $tabla[0]["acumulados"];
                  } else {
                    $aux = $tabla[0]["cantidads"];
                  }
                } else {
                  $aux = $tabla[0]["cantidads"];
                }
              } else {
                $aux = $tabla[0]["montos"];
              } // tipo c o m
              $valor = $aux;
            }
          } // movconvar 7 1
          else {
            $criterio = "Select cantidad,monto,acumulado from npasiconemp where activo='S' and codemp='" . $empleado . "' and codcar='" . $cargo . "' and codcon='" . substr($token, 4, 3) . "' ";
            if (Herramientas :: BuscarDatos($criterio, & $tabla)) {
              if (substr($token, 7, 1) == 'C') {
                $sql = "Select * from nptippre where codcon='" . substr($token, 4, 3) . "' ";
                if (Herramientas :: BuscarDatos($sql, & $tablaprestamo)) {
                  if (floatval($tabla[0]["acumulado"]) - floatval($tabla[0]["cantidad"]) <= 0) {
                    $aux = $tabla[0]["acumulado"];
                  } else {
                    $aux = $tabla[0]["cantidad"];
                  }
                } else {
                  $aux = $tabla[0]["cantidad"];
                }
              } else {
                $aux = $tabla[0]["monto"];
              } // tipo c o m
              $valor = $aux;
            } // tabla
          } // fin else movconbar 7 1
        }
        //TODO:Cambiar al strrpos()

        elseif (Herramientas :: StringPos($token, "FECN", 0) != -1) //(Herramientas::instr($campo,'FECN',0,1) )
        {
          $valor = $fecnom;
        }
        elseif (substr($token, 0, 1) == 'E') {
          $criterio = "Select * from nphojint where codemp='" . $empleado . "'";
          if (Herramientas :: BuscarDatos($criterio, & $datosper)) {
            $aux = intval(substr($token, 1, 2));
            foreach ($datosper as $dat) {
              $i = 0;
              foreach ($dat as $d => $key) {
                if ($i == $aux) {
                  $valor = $key;
                }
                $i = $i +1;
              }
            }
            $valor = 'EEEEEEEEEEEEE';
            //$valor=$datosper[0][$aux];
          }
        }
        elseif (substr($token, 0, 1) == 'V') { //PRIMER CAMBIO
          $valor = 0.00;
          $criterio = "Select * from npdefvar where  codnom='" . $nomina . "' and codvar='" . substr($token, 1, 3) . "' ";
          if (Herramientas :: BuscarDatos($criterio, & $tabla)) {
            $aux = intval(substr($token, 4, 1));
            $aux = 'valor' . $aux;
            foreach ($tabla as $dat) {
              foreach ($dat as $d => $key) {
                if ($d == $aux) {
                  $valor = $key;
                }
              }
            }
            //$valor=$tabla[0][$aux];
          }
        }
        elseif (substr($token, 0, 1) == 'C') {
          $criterio = "Select a.saldo as saldo,a.acumulado as acumulado,b.opecon as opecon
                        from npNomCal a,Npdefcpt b
                        where  a.codnom='" . $nomina . "' and a.codemp='" . $empleado . "'
                        and a.codcar='" . $cargo . "' and a.codcon='" . substr($token, 1, 3) . "'
                        and a.codcon = b.codcon ";
          //print $criterio;exit;
          if (Herramientas :: BuscarDatos($criterio, & $tabla)) {
            if (substr($token, 4, 1) == 'S') {
              if (empty ($tabla[0]["saldo"])) {
                $aux = 0;
              } else {
                $aux = $tabla[0]["saldo"];
              }
            } else {
              if (empty ($tabla[0]["acumulado"])) {
                $aux = 0;
              } else {
                $aux = $tabla[0]["acumulado"];
              }
            }
            $valor = $aux;
          }
        }
        elseif (substr($token, 0, 1) == 'H') // historicos
        {
		  if($especial=='NO') $esp='N'; else $esp='S';
          if (substr($token, 23, 1) == 'P') // PROMEDIO
            {
            $fec1 = substr($token, 9, 2) . '/' . substr($token, 7, 2) . '/' . substr($token, 11, 4);
            $fec2 = substr($token, 17, 2) . '/' . substr($token, 15, 2) . '/' . substr($token, 19, 4);
            $fec1_aux = split("/", $fec1);
            $fec2_aux = split("/", $fec2);
            if (checkdate(intval($fec1_aux[1]), intval($fec1_aux[0]), intval($fec1_aux[2])) && checkdate(intval($fec2_aux[1]), intval($fec2_aux[0]), intval($fec2_aux[2]))) {
              $criterio = "Select avg(monto) as monto from nphiscon where  codnom='" . substr($token, 1, 3) . "'
                                         and codemp='" . $empleado . "'  and codcon='" . substr($token, 4, 3) . "' and";
              $criterio2 = " fecnom>=TO_DATE('" . $fec1 . "','dd/mm/yyyy') and
                                          fecnom<=TO_DATE('" . $fec2 . "','dd/mm/yyyy') ";
              if (Herramientas :: BuscarDatos($criterio . $criterio2, & $tabla)) {
                if (!empty ($tabla[0]["monto"])) {
                  $aux = $tabla[0]["monto"];
                } else {
                  $aux = 0;
                }
                $valor = $aux;
              }
            } else // no son fechas
              {

              if (substr($token, 24, 1) == 'P') // Periodo
              {
                 $numero = floatval(substr($token, 25));
                 $criterio="select min(fecnom) as minfec,max(fecnom) as maxfec from (select distinct fecnom from nphiscon where codnom='" . substr($token, 1, 3) . "' and codemp='" . $empleado . "' and especial='$esp' order by fecnom desc limit " . $numero . ") a ";
                 if (Herramientas :: BuscarDatos($criterio, &$resultados)) {
                 if (!empty($resultados[0]["minfec"]) && !empty($resultados[0]["maxfec"]))
                 {
                   $criterio = "Select coalesce(avg(monto),0) as monto from nphiscon where  codnom='" . substr($token, 1, 3) . "'
                                          and codemp='" . $empleado . "'  and codcon='" . substr($token, 4, 3) . "' and ";
                   $criterio2 = " fecnom>=TO_DATE('" . $resultados[0]["minfec"] . "','yyyy-mm-dd') and
                                          fecnom<=TO_DATE('" . $resultados[0]["maxfec"] . "','yyyy-mm-dd') ";

                   if (Herramientas :: BuscarDatos($criterio . $criterio2, & $tabla)) {
                   if (!empty ($tabla[0]["monto"]))
                    {$aux = $tabla[0]["monto"];}
                   else
                     { $aux = 0; }
                   }
                   else
                     { $aux = 0; }
                 }
                 else
                  { $aux = 0; }
                 $valor = $aux;
              }

              }//if (substr($token, 24, 1) == 'P') // MES
              else //meses
              {
				$numero = floatval(substr($token, 24));
			    //////////////////
                $resta="-".$numero;
                $sql="select add_months('" . $fecnom . "',-1) as mesfin, add_months('" . $fecnom . "',".$resta.") as mesini from empresa";
                Herramientas :: BuscarDatos($sql, &$resulfechas);
                $auxmesini=$resulfechas[0]["mesini"];
                $auxmesfin=$resulfechas[0]["mesfin"];
                $auxfecini= split('-', $auxmesini);
                $fecini = $auxfecini[0] . '-' . $auxfecini[1] . '-01';
                $sql="select last_day('" . $auxmesfin . "') as fecfin from empresa";
                Herramientas :: BuscarDatos($sql, &$resulfecfin);
                $fecfin=$resulfecfin[0]["fecfin"];
				//////////////////////
              $criterio = "Select avg(monto) as monto from nphiscon where  codnom='" . substr($token, 1, 3) . "'
                                          and codemp='" . $empleado . "'  and codcon='" . substr($token, 4, 3) . "' and ";
              $criterio2 = " fecnom>=TO_DATE('" . $fecini . "','yyyy-mm-dd') and
                                          fecnom<=TO_DATE('" . $fecfin . "','yyyy-mm-dd') ";
              if (Herramientas :: BuscarDatos($criterio . $criterio2, & $tabla)) {
                if (empty ($tabla[0]["monto"])) {
                  $aux = $tabla[0]["monto"];
                } else {
                  $aux = 0;
                }
                $valor = $aux;
              }
             }//else  // MES
            }
          } // fin PROMEDIO
          elseif (substr($token, 23, 1) == 'S') // SUM
          {
            $fec1 = substr($token, 9, 2) . '/' . substr($token, 7, 2) . '/' . substr($token, 11, 4);
            $fec2 = substr($token, 17, 2) . '/' . substr($token, 15, 2) . '/' . substr($token, 19, 4);
            $fec1_aux = split("/", $fec1);
            $fec2_aux = split("/", $fec2);
            if (checkdate(intval($fec1_aux[1]), intval($fec1_aux[0]), intval($fec1_aux[2])) && checkdate(intval($fec2_aux[1]), intval($fec2_aux[0]), intval($fec2_aux[2]))) {
              $criterio = "Select coalesce(SUM(monto),0) as monto from nphiscon where  codnom='" . substr($token, 1, 3) . "'
                                          and codemp='" . $empleado . "'  and codcon='" . substr($token, 4, 3) . "' and ";
              $criterio2 = " fecnom>=TO_DATE('" . $fec1 . "','dd/mm/yyyy') and
                                          fecnom<=TO_DATE('" . $fec2 . "','dd/mm/yyyy') ";


              if (Herramientas :: BuscarDatos($criterio . $criterio2, & $tabla)) {
                if (empty ($tabla[0]["monto"]) || $tabla[0]["monto"] == null) {
                  $aux = 0;
                } else {
                  $aux = $tabla[0]["monto"];
                }
              $valor = $aux;
              }
            } else // no son fechas
            {
              if (substr($token, 24, 1) == 'P') // PERIODO
              {
              	 $numero = floatval(substr($token, 25));
                 $criterio="select min(fecnom) as minfec,max(fecnom) as maxfec from (select distinct fecnom from nphiscon where codnom='" . substr($token, 1, 3) . "' and codemp='" . $empleado . "' and especial='$esp' order by fecnom desc limit " . $numero . ") a ";
                 if (Herramientas :: BuscarDatos($criterio, &$resultados)) {
                 if (!empty($resultados[0]["minfec"]) && !empty($resultados[0]["maxfec"]))
                 {
                   $criterio = "Select coalesce(SUM(monto),0) as monto from nphiscon where  codnom='" . substr($token, 1, 3) . "'
                                          and codemp='" . $empleado . "'  and codcon='" . substr($token, 4, 3) . "' and ";
                   $criterio2 = " fecnom>=TO_DATE('" . $resultados[0]["minfec"] . "','yyyy-mm-dd') and
                                          fecnom<=TO_DATE('" . $resultados[0]["maxfec"] . "','yyyy-mm-dd') ";

                   if (Herramientas :: BuscarDatos($criterio . $criterio2, & $tabla)) {
                   if (!empty ($tabla[0]["monto"]))
                    {$aux = $tabla[0]["monto"];}
                   else
                     { $aux = 0; }
                   }
                   else
                     { $aux = 0; }
                 }
                 else
                  { $aux = 0; }
                 $valor = $aux;
              }
             }//if (substr($token, 24, 1) == 'P') // PERIODO
              else  //meses
              {
                $numero = floatval(substr($token, 24));
                //////////////////
                $resta="-".$numero;
                $sql="select add_months('" . $fecnom . "',-1) as mesfin, add_months('" . $fecnom . "',".$resta.") as mesini from empresa";
                Herramientas :: BuscarDatos($sql, &$resulfechas);
                $auxmesini=$resulfechas[0]["mesini"];
                $auxmesfin=$resulfechas[0]["mesfin"];
                $auxfecini= split('-', $auxmesini);
                $fecini = $auxfecini[0] . '-' . $auxfecini[1] . '-01';
                $sql="select last_day('" . $auxmesfin . "') as fecfin from empresa";
                Herramientas :: BuscarDatos($sql, &$resulfecfin);
                $fecfin=$resulfecfin[0]["fecfin"];
				//////////////////////
              $criterio = "Select coalesce(SUM(monto),0) as monto from nphiscon where  codnom='" . substr($token, 1, 3) . "'
                                          and codemp='" . $empleado . "'  and codcon='" . substr($token, 4, 3) . "' and ";
              $criterio2 = " fecnom>=TO_DATE('" . $fecini . "','yyyy-mm-dd') and
                                          fecnom<=TO_DATE('" . $fecfin . "','yyyy-mm-dd') ";
              if (Herramientas :: BuscarDatos($criterio . $criterio2, & $tabla)) {
                if (empty ($tabla[0]["monto"]) || $tabla[0]["monto"] == null) {
                  $aux = 0;
                } else {
                  $aux = $tabla[0]["monto"];
                }
                $valor = $aux;
               }
              }//else // MES
            } // no son fechas
          } // fin SUM
          elseif (substr($token, 23, 1) == 'M') // MAX
          {
            $fec1 = substr($token, 9, 2) . '/' . substr($token, 7, 2) . '/' . substr($token, 11, 4);
            $fec2 = substr($token, 17, 2) . '/' . substr($token, 15, 2) . '/' . substr($token, 19, 4);
            $fec1_aux = split("/", $fec1);
            $fec2_aux = split("/", $fec2);
            if (checkdate(intval($fec1_aux[1]), intval($fec1_aux[0]), intval($fec1_aux[2])) && checkdate(intval($fec2_aux[1]), intval($fec2_aux[0]), intval($fec2_aux[2]))) {
              $criterio = "Select max(monto) as monto from nphiscon where  codnom='" . substr($token, 1, 3) . "'
                                          and codemp='" . $empleado . "'  and codcon='" . substr($token, 4, 3) . "' and ";
              $criterio2 = " fecnom>=TO_DATE('" . $fec1 . "','dd/mm/yyyy') and
                                          fecnom<=TO_DATE('" . $fec2 . "','dd/mm/yyyy') ";
              if (Herramientas :: BuscarDatos($criterio . $criterio2, & $tabla)) {
                if (empty ($tabla[0]["monto"]) || $tabla[0]["monto"] == null) {
                  $aux = 0;
                } else {
                  $aux = $tabla[0]["monto"];
                }
                $valor = $aux;
              }
            } else // no son fechas
            {

             if (substr($token, 24, 1) == 'P') // PERIODO
             {
             	 $numero = floatval(substr($token, 25));
                 $criterio="select min(fecnom) as minfec,max(fecnom) as maxfec from (select distinct fecnom from nphiscon where codnom='" . substr($token, 1, 3) . "' and codemp='" . $empleado . "' and especial='$esp' order by fecnom desc limit " . $numero . ") a ";
                 if (Herramientas :: BuscarDatos($criterio, &$resultados)) {
                 if (!empty($resultados[0]["minfec"]) && !empty($resultados[0]["maxfec"]))
                 {
                   $criterio = "Select max(monto) as monto  from nphiscon where  codnom='" . substr($token, 1, 3) . "'
                                          and codemp='" . $empleado . "'  and codcon='" . substr($token, 4, 3) . "' and ";
                   $criterio2 = " fecnom>=TO_DATE('" . $resultados[0]["minfec"] . "','yyyy-mm-dd') and
                                          fecnom<=TO_DATE('" . $resultados[0]["maxfec"] . "','yyyy-mm-dd') ";

                   if (Herramientas :: BuscarDatos($criterio . $criterio2, & $tabla)) {
                   if (!empty ($tabla[0]["monto"]))
                    {$aux = $tabla[0]["monto"];}
                   else
                     { $aux = 0; }
                   }
                   else
                     { $aux = 0; }
                 }
                 else
                  { $aux = 0; }
                 $valor = $aux;
              }
             }//if (substr($token, 24, 1) == 'P') //PERIODO
            else
              {
              	$numero = floatval(substr($token, 24));
                //////////////////
                $resta="-".$numero;
                $sql="select add_months('" . $fecnom . "',-1) as mesfin, add_months('" . $fecnom . "',".$resta.") as mesini from empresa";
                Herramientas :: BuscarDatos($sql, &$resulfechas);
                $auxmesini=$resulfechas[0]["mesini"];
                $auxmesfin=$resulfechas[0]["mesfin"];
                $auxfecini= split('-', $auxmesini);
                $fecini = $auxfecini[0] . '-' . $auxfecini[1] . '-01';
                $sql="select last_day('" . $auxmesfin . "') as fecfin from empresa";
                Herramientas :: BuscarDatos($sql, &$resulfecfin);
                $fecfin=$resulfecfin[0]["fecfin"];
				//////////////////////
              $criterio = "Select max(monto) as monto from nphiscon where  codnom='" . substr($token, 1, 3) . "'
                                          and codemp='" . $empleado . "'  and codcon='" . substr($token, 4, 3) . "' and ";
              $criterio2 = " fecnom>=TO_DATE('" . $fecini . "','yyyy-mm-dd') and
                                          fecnom<=TO_DATE('" . $fecfin . "','yyyy-mm-dd') ";
              if (Herramientas :: BuscarDatos($criterio . $criterio2, & $tabla)) {
                if (empty ($tabla[0]["monto"]) || $tabla[0]["monto"] == null) {
                  $aux = 0;
                } else {
                  $aux = $tabla[0]["monto"];
                }
                $valor = $aux;
              }

              }//else  // MES
            }
          } // fin MAX
          elseif (substr($token, 23, 1) == 'N') // MIN
          {
            $fec1 = substr($token, 9, 2) . '/' . substr($token, 7, 2) . '/' . substr($token, 11, 4);
            $fec2 = substr($token, 17, 2) . '/' . substr($token, 15, 2) . '/' . substr($token, 19, 4);
            $fec1_aux = split("/", $fec1);
            $fec2_aux = split("/", $fec2);
            if (checkdate(intval($fec1_aux[1]), intval($fec1_aux[0]), intval($fec1_aux[2])) && checkdate(intval($fec2_aux[1]), intval($fec2_aux[0]), intval($fec2_aux[2]))) {
              $criterio = "Select min(monto) as monto from nphiscon where  codnom='" . substr($token, 1, 3) . "'
                                          and codemp='" . $empleado . "'  and codcon='" . substr($token, 4, 3) . "' and ";
              $criterio2 = " fecnom>=TO_DATE('" . $fec1 . "','dd/mm/yyyy') and
                                          fecnom<=TO_DATE('" . $fec2 . "','dd/mm/yyyy') ";
              if (Herramientas :: BuscarDatos($criterio . $criterio2, & $tabla)) {
                if (empty ($tabla[0]["monto"]) || $tabla[0]["monto"] == null) {
                  $aux = 0;
                } else {
                  $aux = $tabla[0]["monto"];
                }
                $valor = $aux;
              }
            } else // no son fechas
            {

             if (substr($token, 24, 1) == 'P') // PERIODO
             {
                 $numero = floatval(substr($token, 25));
                 $criterio="select min(fecnom) as minfec,max(fecnom) as maxfec from (select distinct fecnom from nphiscon where codnom='" . substr($token, 1, 3) . "' and codemp='" . $empleado . "' and especial='$esp' order by fecnom desc limit " . $numero . ") a ";
                 if (Herramientas :: BuscarDatos($criterio, &$resultados)) {
                 if (!empty($resultados[0]["minfec"]) && !empty($resultados[0]["maxfec"]))
                 {
                   $criterio = "Select min(monto) as monto  from nphiscon where  codnom='" . substr($token, 1, 3) . "'
                                          and codemp='" . $empleado . "'  and codcon='" . substr($token, 4, 3) . "' and ";
                   $criterio2 = " fecnom>=TO_DATE('" . $resultados[0]["minfec"] . "','yyyy-mm-dd') and
                                          fecnom<=TO_DATE('" . $resultados[0]["maxfec"] . "','yyyy-mm-dd') ";

                   if (Herramientas :: BuscarDatos($criterio . $criterio2, & $tabla)) {
                   if (!empty ($tabla[0]["monto"]))
                    {$aux = $tabla[0]["monto"];}
                   else
                     { $aux = 0; }
                   }
                   else
                     { $aux = 0; }
                 }
                 else
                  { $aux = 0; }
                 $valor = $aux;
              }
             }//if (substr($token, 24, 1) == 'P') // PERIODO
             else  //meses
              {
              	$numero = floatval(substr($token, 24));
                //////////////////
                $resta="-".$numero;
                $sql="select add_months('" . $fecnom . "',-1) as mesfin, add_months('" . $fecnom . "',".$resta.") as mesini from empresa";
                Herramientas :: BuscarDatos($sql, &$resulfechas);
                $auxmesini=$resulfechas[0]["mesini"];
                $auxmesfin=$resulfechas[0]["mesfin"];
                $auxfecini= split('-', $auxmesini);
                $fecini = $auxfecini[0] . '-' . $auxfecini[1] . '-01';
                $sql="select last_day('" . $auxmesfin . "') as fecfin from empresa";
                Herramientas :: BuscarDatos($sql, &$resulfecfin);
                $fecfin=$resulfecfin[0]["fecfin"];
				//////////////////////
              $criterio = "Select min(monto) as monto from nphiscon where  codnom='" . substr($token, 1, 3) . "'
                                          and codemp='" . $empleado . "'  and codcon='" . substr($token, 4, 3) . "' and ";
              $criterio2 = " fecnom>=TO_DATE('" . $fecini . "','yyyy-mm-dd') and
                                          fecnom<=TO_DATE('" . $fecfin . "','yyyy-mm-dd') ";
              if (Herramientas :: BuscarDatos($criterio . $criterio2, & $tabla)) {
                if (empty ($tabla[0]["monto"]) || $tabla[0]["monto"] == null) {
                  $aux = 0;
                } else {
                  $aux = $tabla[0]["monto"];
                }
                $valor = $aux;
              }
             }//else MES
            }//else no son fechas
          } // fin MIN
        } // FIN DEL "H"
    } // end switch moyejuo

    if ($valor == '') {
      $valor = number_format(0.00, 2);
    }

  } // fin calcula token

  public static function evaluar_Campo(& $campo, & $valor, & $pila, & $guardar, & $empleado, & $cargo, & $concepto, & $nomina, & $fecnom, & $fechanac, & $fechaing, & $sexo, & $especial, & $desde, & $hasta, & $ultfec, & $profec) // ??????? pasarle todos los param q necesito: $nomina, $cargo ...etc etc etc.
  {
    //*************************************
    if (trim($campo) == "NHIJO") {
      $campo = "NHIJO0";
    }

    if (Herramientas :: StringPos($campo, "NHIJO", 0) != -1)
      //if (  Herramientas::instr($campo,"NHIJO",0,1) > 0 )
      {
      $parametro = substr($campo, 5, strlen($campo) - 5);
      if (!(is_numeric($parametro))) {
        $parametro = "0";
      }
      $campo = "NHIJO";
    }

    if (trim($campo) == "ACUC") {
      $campo = "ACUC000";
    }

    if (Herramientas :: StringPos($campo, "ACUC", 0) != -1)
      //if ( Herramientas::instr($campo,"ACUC",0,1) > 0 )
      {
      $parametro = substr($campo, 4, strlen($campo) - 4);
      if (!(is_numeric($parametro))) {
        $parametro = "000";
      }
      $campo = "ACUC";
    }
    //*************************************
    if (Herramientas :: StringPos($campo, "STAB", 0) != -1) {
      $parametro = substr($campo, 4, strlen($campo) - 4);
      $fecha = substr($parametro, 2, 2) . "/" . substr($parametro, 0, 2) . "/" . substr($parametro, 4, 4);
      $rfec = strtotime($fecha);

      if (($rfec === -1 || $rfec === false)) {
        $parametro = "0101" . Date("Y");
      }
      $campo = "STAB";
    }

    if (Herramientas :: StringPos($campo, "CTAB", 0) != -1) {

      $parametro = substr($campo, 4, strlen($campo) - 4);
      $fecha = substr($parametro, 2, 2) . "/" . substr($parametro, 0, 2) . "/" . substr($parametro, 4, 4);
      $rfec = strtotime($fecha);

      if (($rfec === -1 || $rfec === false)) {
        $parametro = "0101" . Date("Y");
      }
      $campo = "CTAB";
    }

    if (Herramientas :: StringPos($campo, "STAF", 0) != -1) {

      $parametro = substr($campo, 4, strlen($campo) - 4);
      $fecha = substr($parametro, 2, 2) . "/" . substr($parametro, 0, 2) . "/" . substr($parametro, 4, 4);
      $rfec = strtotime($fecha);

      if (($rfec === -1 || $rfec === false)) {
        $parametro = "0101" . Date("Y");
      }
      $campo = "STAF";
    }

    if (Herramientas :: StringPos($campo, "NHMAYEDA", 0) != -1) {
      $parametro = substr($campo, 8, strlen($campo));

      $campo = "NHMAYEDA";
    }

    if (Herramientas :: StringPos($campo, "NHMENEDA", 0) != -1) {
      $parametro = substr($campo, 8, strlen($campo));
      $campo = "NHMENEDA";
    }

    if (Herramientas :: StringPos($campo, "SIMESDAD", 0) != -1) {
      $parametro = substr($campo, 8, strlen($campo));

      $campo = "SIMESDAD";
    }

	if (Herramientas :: StringPos($campo, "INTPRES", 0) != -1) {
      $parametro = substr($campo, 7, strlen($campo));

      $campo = "INTPRES";
    }
//print $parametro;
//print "--".$campo;

    if (Herramientas :: StringPos($campo, "SHORAS", 0) != -1) {
      $parametro = substr($campo, 6, strlen($campo));

      $campo = "SHORAS";
    }

    if (Herramientas :: StringPos($campo, "SDIAS", 0) != -1) {
      $parametro = substr($campo, 5, strlen($campo));

      $campo = "SDIAS";
    }

    if (Herramientas :: StringPos($campo, "FECDIAS", 0) != -1) {
      $parametro = substr($campo, 7, strlen($campo));
      $campo = "FECDIAS";
    }
    if (Herramientas :: StringPos($campo, "FECMES", 0) != -1) {
      $parametro = substr($campo, 6, strlen($campo));
      $campo = "FECMES";
    }
    if (Herramientas :: StringPos($campo, "FECANNOS", 0) != -1) {
      $parametro = substr($campo, 8, strlen($campo));
      $campo = "FECANNOS";
    }

    if (Herramientas :: StringPos($campo, "CTAF", 0) != -1) {

      $parametro = substr($campo, 4, strlen($campo) - 4);
      $fecha = substr($parametro, 2, 2) . "/" . substr($parametro, 0, 2) . "/" . substr($parametro, 4, 4);
      $rfec = strtotime($fecha);

      if (($rfec === -1 || $rfec === false)) {
        $parametro = "0101" . Date("Y");
      }
      $campo = "CTAF";
    }

    switch ($campo) {
      case "SIM" :
        $criterio = "Select coalesce(SUM(Monto),0) as campo from npAsiConEmp A,NPCONSALINT B where  A.CODCON=B.CODCON  and a.codemp='" . $empleado . "' and a.codcar='" . $cargo . "'";
        if (Herramientas :: BuscarDatos($criterio, & $tabla)) {
          return $tabla[0]["campo"];
        }
        break;
      case "SIC" :
        $criterio = "Select coalesce(SUM(a.saldo),0) as campo from npNomCal A,NPCONSALINT B where  A.CODCON=B.CODCON AND  a.CODNOM=B.CODNOM AND  a.codnom='" . $nomina . "' and a.codemp='" . $empleado . "' and a.codcar='" . $cargo . "' ";
        if (Herramientas :: BuscarDatos($criterio, & $tabla)) {
          return $tabla[0]["campo"];
        }
        break;
      case "SC" :
        $criterio = "Select coalesce(SUM(MONTO),0) as campo from NPASICONEMP where (CODCON IN (SELECT x.CODCON FROM NPCONSUELDO x) OR CODCON IN (SELECT y.CODCON FROM NPCONCOMP y)) AND codemp='" . $empleado . "' and codcar='" . $cargo . "'";
        if (Herramientas :: BuscarDatos($criterio, & $tabla)) {
          return $tabla[0]["campo"];
        }
        break;
      case "SCAR" :
        $criterio = "Select suecar as campo from npcargos where  codcar='" . $cargo . "'";
        if (Herramientas :: BuscarDatos($criterio, & $tabla)) {
          return $tabla[0]["campo"];
        }

        break;
      case "TAF" :
        $criterio = "Select coalesce(SUM(a.saldo),0) as campo from npNomCal A,NPDEFCPT B where  A.CODCON=B.CODCON AND  a.codnom='" . $nomina . "' and a.codemp='" . $empleado . "' and a.codcar='" . $cargo . "' AND b.OPECON='A' AND b.IMPCPT='S' ";
        if (Herramientas :: BuscarDatos($criterio, & $tabla)) {
          return $tabla[0]["campo"];
        }
        break;
      case "NLP" :
        $criterio = "SELECT profec,ultfec FROM NPNOMINA WHERE  codnom='" . $nomina . "'";
        if (Herramientas :: BuscarDatos($criterio, & $tabla)) {
          $fecha1 = $tabla[0]["ultfec"];
          $fecha2 = $tabla[0]["profec"];
          $fechaini = $fechaing;

          if (strtotime($fechaini) > strtotime($fecha1)) {
            $salir = false;
          } else {
            $fechaini = $fecha1;
            $salir = true;
          }

          $fechaini_mod = split("-", $fechaini);
          if (Herramientas :: dia_semana($fechaini_mod[2], $fechaini_mod[1], $fechaini_mod[0]) == 'Lunes') {
            $salir = true;
          }

          while (!$salir && strtotime($fechaini) > strtotime($fecha1)) {
            $fechaini = Herramientas :: dateAdd('d', 1, $fechaini, '-');
            $fechaini_mod = split("-", $fechaini);
            if (Herramientas :: dia_semana($fechaini_mod[2], $fechaini_mod[1], $fechaini_mod[0]) == 'Lunes') {
              $salir = true;
            }
          }
          $numerosemanas = 0;

          while (strtotime($fechaini) <= strtotime($fecha2)) {
            $fechaini_mod = split("-", $fechaini);
            if (Herramientas :: dia_semana($fechaini_mod[2], $fechaini_mod[1], $fechaini_mod[0]) == 'Lunes') {
              $numerosemanas += 1;
            }
            $fechaini = Herramientas :: dateAdd('d', 1, $fechaini, '+');
          }
          return $numerosemanas;
        }
        break;
      case "DM" :
        //'verificamos que no haya entrado En ese mes
        $fechaing_mod = split('-', $fechaing);
        $fecnom_mod = split('-', $profec);
        $mesano_ing = $fechaing_mod[0] . $fechaing_mod[1];
        $mesano_nom = $fecnom_mod[0] . $fecnom_mod[1];

        if ($mesano_ing == $mesano_nom) {
          //CDate(UltimoDiaMes(CStr(FecNom)))) + (31 - Val(Format(UltimoDiaMes(CStr(FecNom))
          $ultdia = date('t', strtotime($profec));
          $fecnom_aux = split('-', $profec);
          $fecnom1 = $fecnom_aux[0] . '-' . $fecnom_aux[1] . '-' . str_pad(strval($ultdia), 2, '0', STR_PAD_LEFT);
          $fecnom2 = 31 - intval($ultdia);
          $fecnom_tot = Herramientas :: dateAdd('d', $fecnom2, $fecnom1, '+');

          $valor = Herramientas :: dateDiff('d', $fechaing, $fecnom_tot);

          if ($fecnom_aux[1] == '02') {
            if ($valor >= 28) {
              $valor = 30;
            }
          } else {
            if ($valor >= 30) {
              $valor = 30;
            }
          }
        } else {
          $valor = 30;
        }
        return $valor;
        break;
      case "DP" :
        //'verificamos que no haya entrado En ese mes
        $fechaing_mod = split('-', $fechaing);
        $fecnom_mod = split('-', $profec);
        $mesano_ing = $fechaing_mod[0] . $fechaing_mod[1];
        $mesano_nom = $fecnom_mod[0] . $fecnom_mod[1];

        if ($mesano_ing == $mesano_nom) {
          $valor = Herramientas :: dateDiff('d', $fechaing, $fecnom) + 1;
          $fecnom_aux = split('-', $fecnom);
          if (intval($fecnom_aux[2]) > 15) {
            if ($fecnom_aux[1] == '02') {
              if ($fecnom_aux[2] == '28') {
                $valor = $valor +2;
              }
              if ($fecnom_aux[2] == '29') {
                $valor = $valor +1;
              }
            } else {
              if ($valor > 15) {
                $valor = 15;
              }
            }
          }
        } else {
          $valor = 15;
        }
        return $valor;
        break;
      case "NL" :
        $fecnom_aux = split('-', $profec);
        $fecha1 = $fecnom_aux[0] . '-' . $fecnom_aux[1] . '-01';
        $fecha2 = Herramientas :: dateAdd('m', 1, $fecha1, '+');
        $fecha2 = Herramientas :: dateAdd('d', 1, $fecha2, '-');

        $criterio = "Select fecrei from nphojint where codemp='" . $empleado . "'";
        if (Herramientas :: BuscarDatos($criterio, & $datosper)) {
          if (trim($datosper[0]["fecrei"]) != '') {
            $fechaini = $datosper[0]["fecrei"];
            /*if ( strtotime($datosper[0]["fecret"]) < strtotime($fecha2) )
            {
              $fecha2=$datosper[0]["fecret"];
              $salir=false;
            }*/
          } else
            $fechaini = $fechaing;
        }
        if (strtotime($fechaini) > strtotime($fecha1)) {
          $salir = false;
        } else {
          $fechaini = $fecha1;
          $salir = true;
        }
        $numerosemanas = 0;
        while (strtotime($fechaini) <= strtotime($fecha2)) {
          $fechaini_mod = split('-', $fechaini);
          if (Herramientas :: dia_semana($fechaini_mod[2], $fechaini_mod[1], $fechaini_mod[0]) == 'Lunes') {
            $numerosemanas += 1;
          }
          $fechaini = Herramientas :: dateAdd('d', 1, $fechaini, '+');
        }

        return $numerosemanas;
        break;
      case "NS" :
        $fecnom_aux = split('-', $profec);
        $fecha1 = $fecnom_aux[0] . '-' . $fecnom_aux[1] . '-01';
        $fecha2 = Herramientas :: dateAdd('m', 1, $fecha1, '+');
        $fecha2 = Herramientas :: dateAdd('d', 1, $fecha2, '-');

        $numerosemanas = 0;

        while (strtotime($fecha1) <= strtotime($fecha2)) {
          $fecha1_mod = split('-', $fecha1);
          if (Herramientas :: dia_semana($fecha1_mod[2], $fecha1_mod[1], $fecha1_mod[0]) == 'Lunes') {
            $numerosemanas += 1;
          }
          $fecha1 = Herramientas :: dateAdd('d', 1, $fecha1, '+');
        }
        $fecnom_aux = split('-', $profec);
        $fecha1 = $fecnom_aux[0] . '-' . $fecnom_aux[1] . '-01';
        $fecha2 = Herramientas :: dateAdd('m', 1, $fecha1, '+');
        $fecha2 = Herramientas :: dateAdd('d', 1, $fecha2, '-');
        return $numerosemanas;
        break;
      case "NHIJ" :
        $aux="%HIJ%";
          $codhijo="001";
          $criterio = "SELECT tippar FROM nptippar WHERE  upper(despar) like '". $aux . "'";
          if (Herramientas :: BuscarDatos($criterio, &$reg))
          {
                  $codhijo=$reg[0]["tippar"];
          }
        $sql = "Select coalesce(COUNT(*),0) as cuantos from NPInfFam where  CodEmp='" . $empleado . "' and parfam='". $codhijo ."' ";
        if (Herramientas :: BuscarDatos($sql, & $tabla)) {
          return $tabla[0]["cuantos"];
        } else {
          return 0;
        }
        break;
      case "DV" : //????????????????'
        $sql = "SELECT A.FECHAENTRADA as fechaentrada,A.FECHASALIDA as fechasalida,
                    B.ULTFEC as ultfec, B.PROFEC as profec
                    FROM NPVACREGCALNOM A,NPNOMINA B
                       WHERE
                    B.codemp='" . $empleado . "'
                    and
                    (A.fechaentrada>=B.ULTFEC and A.fechaentrada<=B.PROFEC
                    OR (a.fechasalida>= b.ultfec and a.fechasalida<= B.PROFEC)
                    or (b.ultfec >= a.FECHASALIDA and b.ultfec <= a.FECHAENTRADA)
                    or (B.PROFEC >= a.FECHASALIDA and B.PROFEC <= a.FECHAENTRADA))
                    AND A.CodNom='" . $nomina . "' AND A.CODNOM=B.CODNOM";
        if (!Herramientas :: BuscarDatos($sql, & $tabla)) {
          $valor = 0;
        } else {
          $fec1 = $tabla[0]["fechasalida"];
          $fec2 = Herramientas :: dateAdd('d', 1, $tabla[0]["fechaentrada"], '-');

          $seguir = true;
          while ($seguir) {
            $fec2_mod = split('-', $fec2);
            if ((Herramientas :: dia_semana($fec2_mod[2], $fec2_mod[1], $fec2_mod[0]) == 'Lunes') || (Herramientas :: dia_semana($fec2_mod[2], $fec2_mod[1], $fec2_mod[0]) == 'Martes') || (Herramientas :: dia_semana($fec2_mod[2], $fec2_mod[1], $fec2_mod[0]) == 'Miercoles') || (Herramientas :: dia_semana($fec2_mod[2], $fec2_mod[1], $fec2_mod[0]) == 'Jueves') || (Herramientas :: dia_semana($fec2_mod[2], $fec2_mod[1], $fec2_mod[0]) == 'Viernes')) {
              $criterio = "Select * FROM  NPVACDIAFER WHERE DIA='" . trim(strval(date('d', strtotime($fec2)))) . "' and mes='" . trim(strval(date('m', strtotime($fec2)))) . "' ";
              if (!Herramientas :: BuscarDatos($criterio, & $npvacdiafer)) {
                $fec2 = Herramientas :: dateAdd('d', 1, $fec2, '-');
              } else {
                $seguir = false;
              }
            } else // fin de semana
              {
              $fec2 = Herramientas :: dateAdd('d', 1, $fec2, '-');
            }
          } // while

          if (strtotime($tabla[0]["fechasalida"]) < strtotime($tabla[0]["ultfec"])) {
            $fec1 = $tabla[0]["ultfec"];
          }
          if (strtotime($tabla[0]["fechaentrada"]) > strtotime($tabla[0]["profec"])) {
            $fec2 = $tabla[0]["profec"];
            $fec2_aux = split('-', $fec2);
            if ($fec2_aux[2] == '31') {
              $fec2 = $fec2_aux[0] . '-' . $fec2_aux[1] . '-30';
            }
          }

          $seguir = true;
          return Herramientas :: dateDiff('d', $fec1, $fec2) + 1;
        }
        break;
      case "DBV" : // dias bono vacacional
        $sql = "SELECT DIASBONO as valor FROM NPVACREGCALNOM WHERE codemp='" . $empleado . "'
                  AND CodNom='" . $nomina . "' and codcar='" . $cargo . "'";
        if (Herramientas :: BuscarDatos($sql, & $tabla)) {
          return $tabla[0]["valor"];
        } else {
          return 0;
        }
        break;
      case "PV" : // periodos vacacionales
        $sql = "SELECT PERIODOS as campo FROM NPVACREGCALNOM WHERE codemp='" . $empleado . "'
                  AND CodNom='" . $nomina . "' and codcar='" . $cargo . "'";
        if (Herramientas :: BuscarDatos($sql, & $tabla)) {
          return $tabla[0]["campo"];
        } else {
          return 1;
        }
        break;
      case "ADV" :
        return Herramientas :: dateDiff('d', $fechaing, $profec) + 1;
        break;
      case "ADF" :
        $fecnom_aux = split('-', $profec);
        $fecnom_mod = $fecnom_aux[0] . '-12-31';
        return Herramientas :: dateDiff('d', $fechaing, $fecnom_mod) + 1;
        break;
      case "AD" :
        return Herramientas :: dateDiff('d', $fechaing, $profec) + 1;
        break;
      case "DFI" :
        return intval(date('d', strtotime($fechaing)));
        break;
      case "DFE" :
        $sql = "Select FECRET from nphojint where codemp='" . $empleado . "'";
        if (Herramientas :: BuscarDatos($sql, & $datosper)) {
          if (trim($datosper[0]["fecret"]) != '') {
            $valor = intval(date('d', strtotime($datosper[0]["fecret"])));
          } else {
            $valor = 0;
          }
        } else {
          $valor = 0;
        }
        return $valor;
        break;
       case "AM" :
		$valorano=0;
		$sql="select to_char(age(to_date('$profec','yyyy-mm-dd'),to_date('$fechaing','yyyy-mm-dd')),'YY') as ano";
		if (Herramientas :: BuscarDatos($sql, & $tabla)) {
			$valorano = intval($tabla[0]['ano']);
		}
		$valormes=0;
		$sql="select to_char(age(to_date('$profec','yyyy-mm-dd'),to_date('$fechaing','yyyy-mm-dd')),'MM') as mes";
		if (Herramientas :: BuscarDatos($sql, & $tabla)){
			$valormes = intval($tabla[0]['mes']);
		}
		$valor = ($valorano*12)+$valormes;
		return $valor;
        #$valor = Herramientas :: dateDiff('m', $fechaing, $fecnom);
        break;
      case "AAP" :

        if (strrpos($hasta, "/")) {
          $fecaux = split("/", $hasta);
          $hastaaux = $fecaux[2] . '-' . $fecaux[1] . '-' . $fecaux[0];
        } else {
          $hastaaux = $hasta;
        }

        $sql = "select antpub('A','" . $empleado . "','" . $hastaaux . "','S') as aap from empresa;";
        if (Herramientas :: BuscarDatos($sql, & $tabla)) {
          if ($tabla[0]["aap"] != null && $tabla[0]["aap"] != '') {
            $valor = $tabla[0]["aap"];
          } else
            $valor = 0;
        } else
          $valor = 0;

        return $valor;
        break;
      case "AC" :
        $sql = "Select fecasi from npasicaremp where Status='V' and CodNom='" . $nomina . "' and codemp='" . $empleado . "' and codcar='" . $cargo . "'";
        if (Herramientas :: BuscarDatos($sql, & $tabla)) {
          return intval(Herramientas :: dateDiff('d', $tabla[0]["fecasi"], $profec)) / 365;
        }
        break;
      case "DC" :
        $sql = "Select fecasi from npasicaremp where Status='V' and CodNom='" . $nomina . "' and codemp='" . $empleado . "' and codcar='" . $cargo . "'";
        if (Herramientas :: BuscarDatos($sql, & $tabla)) {
          return Herramientas :: dateDiff('d', $tabla[0]["fecasi"], $profec) + 1;
        }
        break;
      case "PHIJO" :
        $sql = "SELECT coalesce(SUM(C.MONTO),0) as elmonto
                  FROM NPINFFAM A,NPPRIMASHIJOS C WHERE
                           A.CODEMP='" . $empleado . "'
                           and a.parfam=c.parfam
                        AND TRUNC(Months_between(TO_DATE('" . $hasta . "','DD/MM/YYYY'), A.FECNAC)/12)>= C.EDADDES
                           AND TRUNC(Months_between(TO_DATE('" . $hasta . "','DD/MM/YYYY'), A.FECNAC)/12)<= C.EDADHAS
                  AND (CASE WHEN C.ESTUDIOS='S' THEN 'E' ELSE coalesce(a.ocupac,'') END)=coalesce(a.ocupac,'')";

        if (Herramientas :: BuscarDatos($sql, & $tabla)) {
          return $tabla[0]["elmonto"];
        }
        break;
      case "NHIJO" : // ????????????????
        $aux="%HIJ%";
          $codhijo="001";
          $criterio = "SELECT tippar FROM nptippar WHERE  upper(despar) like '". $aux . "'";
          if (Herramientas :: BuscarDatos($criterio, &$reg))
          {
                  $codhijo=$reg[0]["tippar"];
          }
        $sql = "Select coalesce(Count(Cedfam),0) as cuantos From NPINFFAM Where CodEmp='" . $empleado . "'  and parfam='". $codhijo ."'  And TRUNC((date(now())-FECNAC)/365)<='" . $parametro . "'";
        if (Herramientas :: BuscarDatos($sql, & $tabla)) {
          return $tabla[0]["cuantos"];
        }
        break;
      case "PPROF" : // ??????????
        $sql = "SELECT sum(coalesce(A.PRIMA,0)) as elmonto
				FROM NPPRIMAPROFES a, nphojint b
				WHERE
				a.GRADO=b.codnivedu and
				b.codemp='$empleado'";
        if (Herramientas :: BuscarDatos($sql, & $tabla)) {
          return $tabla[0]["elmonto"];
        }
        break;

      case "PROFE" : // profesion
        $c = new Criteria();
        $c->add(NpinfcurPeer :: CODEMP, $empleado);
        $c->add(NpinfcurPeer :: ACTIVO, TRUE);
        $infcur = NpinfcurPeer :: doSelectOne($c);

        if ($infcur) {
          $c = new Criteria();
          $c->add(NpprofesionPeer :: CODPROFES, $infcur->getCodprofes());
          $npprofesion = NpprofesionPeer :: doSelectOne($c);
          if ($npprofesion)
            $valor = $npprofesion->getNivpro();
          else
            $valor = '';
        } else {
          $valor = '';
        }
        return $valor;
        break;

      case "CGUAR" :
        $sql = "select sum(valgua) as monto from npinffam inner join npguarde on codgua=codcon where codemp = '" . $empleado . "'";
        if (Herramientas :: BuscarDatos($sql, & $tabla)) {
          if ($tabla[0]["monto"] != null && $tabla[0]["monto"] != '')
            return $tabla[0]["monto"];
          else
            return 0;
        } else
          return 0;
      case "PCARG" :
        $sql = "Select coalesce(b.Prima,0) as monto
                  from NpAsiCarEmp a,NPCARGOSCOL b where CodNom='" . $nomina . "'  AND a.status='V'
                  And a.codCarCol=b.codcarcol and A.CodEmp='" . $empleado . "' and codcar='" . $cargo . "'";
        if (Herramientas :: BuscarDatos($sql, & $tabla)) {
          return $tabla[0]["monto"];
        }
        break;
      case "CCARG" :
        return $cargo;
        break;
      case "ACUC" :
        $sql = "Select coalesce(Sum(case when B.TIPACU='C' then A.Cantidad
                                when B.TIPACU='M' then A.Monto
                              when B.TIPACU='S' then C.Saldo)*B.Factor),0) as cuantos
                From NPASICONEMP A,NPACUMULACPT B,NPNOMCAL C
                Where
                A.CODEMP=C.CODEMP
                AND A.CODCON=C.CODCON
                AND A.CodCon=B.CodCon
                and c.codnom='$nomina' And A.CodEmp='" . $empleado . "' And B.CodAcu='" . $parametro . "'";
        if (Herramientas :: BuscarDatos($sql, & $tabla)) {
          return $tabla[0]["cuantos"];
        }
        break;
      case "AA" :
        // ????????? año bisiesto ojoooooooooo cambiar
        $t= new Criteria();
        $t->add(NphojintPeer::CODEMP,$empleado);
        $result= NphojintPeer::doSelectOne($t);
        if ($result)
        {
          $fecharein=$result->getFecrei();
        }else $fecharein="";
		if ($fecharein!=""){
		  $sql="select to_char(age(to_date('$profec','yyyy-mm-dd'),to_date('$fecharein','yyyy-mm-dd')),'YY') as ano";
		}else{
		  $sql="select to_char(age(to_date('$profec','yyyy-mm-dd'),to_date('$fechaing','yyyy-mm-dd')),'YY') as ano";
		}
		if (Herramientas :: BuscarDatos($sql, & $tabla)) {
			$valor = intval($tabla[0]['ano']);
		}else
        	$valor = 0;
		return $valor;
        break;
      case "AET" :
        ///Funcion calcule los años de haber entregado el titulo fondo negro Barcelona
        $d= new Criteria();
        $d->add(NpinfcurPeer::CODEMP,$empleado);
        $d->add(NpinfcurPeer::ACTIVO,'1');
        $reg= NpinfcurPeer::doSelectOne($d);
        if ($reg)
        {
        	$feenttit=$reg->getFecenttit();
        }else $feenttit='';
		$sql="select to_char(age(to_date('$fecnom','yyyy-mm-dd'),to_date('$feenttit','yyyy-mm-dd')),'YY') as ano";
		if (Herramientas :: BuscarDatos($sql, & $tabla)) {
			$valor = intval($tabla[0]['ano']);
		}else
        	$valor = 0;
		return $valor;
        break;
      case "CATRAB" :
        $valor = 0;
        $hasta_mod = split('/', $hasta);
        $desde_mod = split('/', $desde);
        $t= new Criteria();
        $t->add(NphojintPeer::CODEMP,$empleado);
        $result= NphojintPeer::doSelectOne($t);
        if ($result)
        {
          $fecharein=$result->getFecrei();
        }else $fecharein="";
        if ($fecharein!="")
        {
          if (intval(date('m', strtotime($fecharein))) == intval(date('m', strtotime($hasta_mod[1] . '/' . $hasta_mod[0] . '/' . $hasta_mod[2])))) {
          if (intval(date('d', strtotime($fecharein))) >= intval(date('d', strtotime($desde_mod[1] . '/' . $desde_mod[0] . '/' . $desde_mod[2]))) && intval(date('d', strtotime($fecharein))) <= intval(date('d', strtotime($hasta_mod[1] . '/' . $hasta_mod[0] . '/' . $hasta_mod[2])))) {
            if (intval(date('Y', strtotime($fecharein))) < intval(date('Y', strtotime($hasta_mod[1] . '/' . $hasta_mod[0] . '/' . $hasta_mod[2])))) {
              $valor = 1;
            }
          }
        }
        }else{
        if (intval(date('m', strtotime($fechaing))) == intval(date('m', strtotime($hasta_mod[1] . '/' . $hasta_mod[0] . '/' . $hasta_mod[2])))) {
          if (intval(date('d', strtotime($fechaing))) >= intval(date('d', strtotime($desde_mod[1] . '/' . $desde_mod[0] . '/' . $desde_mod[2]))) && intval(date('d', strtotime($fechaing))) <= intval(date('d', strtotime($hasta_mod[1] . '/' . $hasta_mod[0] . '/' . $hasta_mod[2])))) {
            if (intval(date('Y', strtotime($fechaing))) < intval(date('Y', strtotime($hasta_mod[1] . '/' . $hasta_mod[0] . '/' . $hasta_mod[2])))) {
              $valor = 1;
            }
          }
        }
        }
        return $valor;
        break;
      case "CC" :
        $sql = "Select * from npasicaremp where Status='V' and CodNom='" . $nomina . "' and codemp='" . $empleado . "'";
        if (Herramientas :: BuscarDatos($sql, & $tabla)) {
          return count($tabla);
        }
        break;
      case "ED" :
        $dias = intval(Herramientas :: dateDiff('d', $fechanac, $profec));
        $fecha = Herramientas :: dateAdd('d', $dias, '1900-01-01', '+');
        return Herramientas :: dateAdd('d', 1, $fecha, '+');
        break;
      case "EE" :
        return Herramientas :: dateDiff('m', $fechanac, $profec);
        break;

      case "CTAB" :
      case "STAB" :
        $movconvar = substr($parametro, 0, 2) . "/" . substr($parametro, 2, 2) . "/" . substr($parametro, 4);
        $sql = "Select * from npasicaremp where Status='V' and CodNom='" . $nomina . "' and codemp='" . $empleado . "'";

        if (Herramientas :: BuscarDatos($sql, & $tabla)) {
          if($tabla[0]['codtipded']!='' && $tabla[0]['codtipcat']!='')
		  {
	          $sql = "Select A.* from NPCOMOCP A, NPCARGOS B  WHERE B.CODCAR='" . $tabla[0]["codcar"] . "' AND A.CODTIPCAR=B.CODTIP AND A.GRACAR='".$tabla[0]['codtipcat']."' and A.PASCAR='".$tabla[0]['codtipded']."' AND FECDES<=TO_DATE('" . $movconvar . "','DD/MM/YYYY') ORDER BY FECDES DESC";
	          if (Herramientas :: BuscarDatos($sql, & $tablaescala)) {
	            $valor = $tablaescala[0]["suecar"];
	          } else {
	            $valor = 0;
	          }
		  }else
		  {
		  	if ($campo = "STAB") {
	            $sql = "Select A.* from NPCOMOCP A,NPCARGOS B WHERE B.CODCAR='" . $tabla[0]["codcar"] . "' AND A.CODTIPCAR=B.CODTIP AND A.GRACAR=B.GRAOCP AND A.PASCAR='001' AND FECDES<=TO_DATE('" . $movconvar . "','DD/MM/YYYY') ORDER BY FECDES DESC";
	          } else {
	            $sql = "Select ABS(SUM(case when a.pascar='001' then a.suecar else a.suecar*-1)) as suecar from NPCOMOCP A,NPCARGOS B WHERE B.CODCAR='" . $tabla[0]["codcar"] . "' AND A.CODTIPCAR=B.CODTIP AND A.GRACAR=B.GRAOCP AND (A.PASCAR='001' OR A.PASCAR='" . $tabla[0]["paso"] . "') AND FECDES<=TO_DATE('" . $movconvar . "','DD/MM/YYYY') ORDER BY FECDES DESC";
	          }
	          if (Herramientas :: BuscarDatos($sql, & $tablaescala)) {
	            $valor = $tablaescala[0]["suecar"];
	         } else {
	            $valor = 0;
	          }
		  }
        } else
          $valor = 0;
        break;

      case "CTAF" :
      case "STAF" :
        $movconvar = substr($parametro, 0, 2) . "/" . substr($parametro, 2, 2) . "/" . substr($parametro, 4);
        $sql = "Select * from npasicaremp where Status='V' and CodNom='" . $nomina . "' and codemp='" . $empleado . "'";
        if (Herramientas :: BuscarDatos($sql, & $tabla)) {
          if ($campo = "STAF") {
            $sql = "Select A.* from NPCOMOCP A,NPCARGOS B WHERE B.CODCAR='" . $tabla[0]["codcar"] . "' AND A.CODTIPCAR=B.CODTIP AND A.GRACAR=B.GRAOCP AND A.PASCAR='001' AND FECDES<=TO_DATE('" . $movconvar . "','DD/MM/YYYY') ORDER BY FECDES DESC";
          } else {
            $sql = "Select ABS(SUM(case when a.pascar='001' then a.suecar else a.suecar*-1)) as suecar from NPCOMOCP A,NPCARGOS B WHERE B.CODCAR='" . $tabla[0]["codcar"] . "' AND A.CODTIPCAR=B.CODTIP AND A.GRACAR=B.GRAOCP AND (A.PASCAR='001' OR A.PASCAR='" . $tabla[0]["paso"] . "') AND FECDES<=TO_DATE('" . $movconvar . "','DD/MM/YYYY') ORDER BY FECDES DESC";
          }
          if (Herramientas :: BuscarDatos($sql, & $tablaescala)) {
            $valor = $tablaescala[0]["suecar"];
          } else {
            $valor = 0;
          }
        } else
          $valor = 0;

        break;

      case "DHAB" :
          $criterio = "SELECT profec,ultfec FROM NPNOMINA WHERE  codnom='" . $nomina . "'";
          if (Herramientas :: BuscarDatos($criterio, & $tabla))
          {
           $fecha1 = $tabla[0]["ultfec"];
          $fecha2 = $tabla[0]["profec"];
          $faux = split('-', $fecha1);
          $fechadesde = $faux[2] . '/' . $faux[1] . '/' . $faux[0];
          $faux2 = split('-', $fecha2);
          $fechahasta = $faux2[2] . '/' . $faux2[1] . '/' . $faux2[0];
          $sql="SELECT diashab('".$nomina."',TO_DATE('". $fechadesde ."','DD/MM/YYYY'),TO_DATE('". $fechahasta ."','DD/MM/YYYY')) as diahab;";
          if (Herramientas :: BuscarDatos($sql, & $result)) {
            $valor = $result[0]["diahab"];
          }
          else
          {
            $valor = 0;
          }
          }
        else
        {
          $valor = 0;
        }

        break;

       case "DHABM" :
           $fecnom_aux = split('-', $fecnom);
          $fecha1 = $fecnom_aux[0] . '-' . $fecnom_aux[1] . '-01';
          $fecha2 = Herramientas :: dateAdd('m', 1, $fecha1, '+');
          $fecha2 = Herramientas :: dateAdd('d', 1, $fecha2, '-');
          $faux = split('-', $fecha1);
          $fechadesde = $faux[2] . '/' . $faux[1] . '/' . $faux[0];
          $faux2 = split('-', $fecha2);
          $fechahasta = $faux2[2] . '/' . $faux2[1] . '/' . $faux2[0];
          $sql="SELECT diashab('".$nomina."',TO_DATE('". $fechadesde ."','DD/MM/YYYY'),TO_DATE('". $fechahasta ."','DD/MM/YYYY')) as diahab;";
          if (Herramientas :: BuscarDatos($sql, & $result)) {
            $valor = $result[0]["diahab"];
          }
          else
          {
            $valor = 0;
          }
        break;

      case "CARG" :
        $sql="SELECT codcar FROM npasicaremp  where CODEMP='" . $empleado . "' AND CODNOM='".$nomina."'  AND status='V';";
        if (Herramientas :: BuscarDatos($sql, & $result)) {
          $valor = $result[0]["codcar"];
        }
        else
        {
          $valor = "";
        }
        break;

      case "NHMENEDA" :
          $aux="%HIJ%";
          $codhijo="001";
          $criterio = "SELECT tippar FROM nptippar WHERE  upper(despar) like '". $aux . "'";
          if (Herramientas :: BuscarDatos($criterio, &$reg))
          {
                  $codhijo=$reg[0]["tippar"];
          }
          $sql = "Select coalesce(COUNT(*),0) as cuantos from NPInfFam where  CodEmp='" . $empleado . "' and parfam='". $codhijo ."' and Extract(year from age(now(),fecnac))<='". $parametro ."' ";
        if (Herramientas :: BuscarDatos($sql, & $tabla)) {
          $valor= $tabla[0]["cuantos"];
        }
        else
        {
          $valor = 0;
        }
        break;

      case "NHMAYEDA" :
          $aux="%HIJ%";
          $codhijo="001";
          $criterio = "SELECT tippar FROM nptippar WHERE  upper(despar) like '". $aux . "'";
          if (Herramientas :: BuscarDatos($criterio, &$reg))
          {
                  $codhijo=$reg[0]["tippar"];
          }
          $sql = "Select coalesce(COUNT(*),0) as cuantos from NPInfFam where  CodEmp='" . $empleado . "' and parfam='". $codhijo ."' and Extract(year from age(now(),fecnac))>='". $parametro ."' ";
        if (Herramientas :: BuscarDatos($sql, & $tabla)) {
          $valor= $tabla[0]["cuantos"];
        }
        else
        {
          $valor = 0;
        }
        break;

      case "SIMESANT" :
        $criterio = "Select coalesce(SUM(a.Monto),0) as campo from npHISCON A,NPCONSALINT B,NPNOMINA C where  A.CODCON=B.CODCON  and a.codemp='" . $empleado . "' AND  a.codNOM='" . $nomina . "' and  b.codNOM='" . $nomina . "' and a.codnom=c.codnom and a.codnom=b.codnom and TO_CHAR(A.FECNOM,'MM-yyyy')=to_char(c.profec,'MM-yyyy')  ";
        if (Herramientas :: BuscarDatos($criterio, & $tabla)) {
           $valor = $tabla[0]["campo"];
        }
        else
        {
          $valor = 0;
        }
        $criterio = "Select coalesce(SUM(a.saldo),0) as campo from npnomcal A,NPCONSALINT B,NPNOMINA C where  A.CODCON=B.CODCON  and a.codemp='" . $empleado . "' AND  a.codNOM='" . $nomina . "' and  b.codNOM='" . $nomina . "' and a.codnom=c.codnom and a.codnom=b.codnom ";
        if (Herramientas :: BuscarDatos($criterio, & $tabla)) {
           $valor = $valor+$tabla[0]["campo"];
        }
        else
        {
          $valor = $valor + 0;
        }

      break;
      case "SIPERANT" :
         $criterio = "Select coalesce(SUM(Monto),0) as campo from npHISCON A,NPCONSALINT B,NPNOMINA C where  A.CODCON=B.CODCON  and a.codemp='" . $empleado . "' AND  a.codNOM='" . $nomina . "' and a.codnom=c.codnom and a.codnom=b.codnom and A.FECNOM=c.ultfec-1 ";
          if (Herramientas :: BuscarDatos($criterio, & $tabla)) {
             $valor = $tabla[0]["campo"];
          }
          else
          {
            $valor = 0;
          }
      break;

	  case "SIANOANT" : //Nueva por Leobardo
       /*$criterio = "Select coalesce(AVG(A.Monto),0) as campo from npHISCON A,NPCONSALINT B,NPNOMINA C where  A.CODCON=B.CODCON  and a.codemp='" . $empleado . "' AND  a.codNOM='" . $nomina . "' and  b.codNOM='" . $nomina . "' and a.codnom=c.codnom and a.codnom=b.codnom and A.FECNOM>=add_months(c.profec,-12)";
        if (Herramientas :: BuscarDatos($criterio, & $tabla)) {
           $valor = $tabla[0]["campo"];
        }
        else
        {
          $valor = 0;
        }
        $criterio = "Select coalesce(SUM(a.saldo),0) as campo from npnomcal A,NPCONSALINT B,NPNOMINA C where  A.CODCON=B.CODCON  and a.codemp='" . $empleado . "' AND  a.codNOM='" . $nomina . "' and  b.codNOM='" . $nomina . "' and a.codnom=c.codnom and a.codnom=b.codnom ";
        if (Herramientas :: BuscarDatos($criterio, & $tabla)) {
           $valor = ($valor+$tabla[0]["campo"])/2;
        }
        else
        {
          $valor = $valor + 0;
        }*/
        $criterio ="SELECT AVG(ELMONTO) as campo FROM (Select SUM(MONTO) AS ELMONTO,FECNOM FROM(Select SUM(MONTO) AS MONTO,TO_CHAR(FECNOM,'YYYY/MM') AS FECNOM
					from npHISCON A,Npdiaadicnom B,NPNOMINA C
					where  A.CODCON=B.CODCON
					and a.codemp='" . $empleado . "'
					AND  a.codNOM='" . $nomina . "'
					And  b.codNOM='" . $nomina . "'
					And a.codnom=c.codnom
					And a.codnom=b.codnom
					And A.FECNOM>=add_months(c.profec+1,-12)
					GROUP BY
					TO_CHAR(FECNOM,'YYYY/MM')
					UNION ALL
					Select coalesce(SUM(a.saldo),0) as MONTO,TO_CHAR(FECNOM,'YYYY/MM') AS FECNOM from npnomcal A,Npdiaadicnom B,NPNOMINA C
					where  A.CODCON=B.CODCON  and a.codemp='" . $empleado . "'
					AND  a.codNOM='" . $nomina . "'  and  b.codNOM='" . $nomina . "'
					and a.codnom=c.codnom and a.codnom=b.codnom
					group by TO_CHAR(FECNOM,'YYYY/MM')
					) LATABLA1 GROUP BY FECNOM order by fecnom
					) LATABLA2";
        if (Herramientas :: BuscarDatos($criterio, & $tabla)) {
           $valor = $tabla[0]["campo"];
        }
        else
        {
          $valor = 0;
        }

      break;

     case "SIMESDAD" :
        $nromes=intval($parametro);
        $criterio = "Select coalesce(SUM(a.Monto),0) as campo from npHISCON A,NPCONSALINT B,NPNOMINA C where  A.CODCON=B.CODCON  and a.codemp='" . $empleado . "' AND  a.codNOM='" . $nomina . "' and  b.codNOM='" . $nomina . "' and a.codnom=c.codnom and a.codnom=b.codnom and TO_CHAR(A.FECNOM,'MM-yyyy')=(LPAD(TRIM(to_char(to_number(to_char(c.profec,'MM'),'99')-$nromes,'99')),2,'0')||'-'||TO_CHAR(c.profec,'yyyy')) ";
        if (Herramientas :: BuscarDatos($criterio, & $tabla)) {
           $valor = $tabla[0]["campo"];
        }
        else
        {
          $valor = 0;
        }

      break;

      case "SDIAS":
      if ($parametro=="0")
        $sueldo=0;
      else
        $sueldo= self::ObtenervalorMovimientoConceptoVariable($parametro,$empleado,$cargo,$fecnom,$nomina);

        if ($sueldo==0)
        {
           $criterio = "Select suecar as campo from npcargos where  codcar='" . $cargo . "'";
           if (Herramientas :: BuscarDatos($criterio, & $tabla))
           {
             $sueldo = $tabla[0]["campo"];
           }
        }

        if ($sueldo>0)
             $valor=floatval($sueldo)/30;
         else
             $valor=0;

      break;


     case "SHORAS":
 	  if ($parametro=="0")
        $sueldo=0;
      else
        $sueldo= self::ObtenervalorMovimientoConceptoVariable($parametro,$empleado,$cargo,$fecnom,$nomina);


        if ($sueldo==0)
        {
           $criterio = "Select suecar as campo from npcargos where  codcar='" . $cargo . "'";
           if (Herramientas :: BuscarDatos($criterio, & $tabla))
           {
             $sueldo = $tabla[0]["campo"];
           }
        }

        if ($sueldo>0)
             $valor=(floatval($sueldo)/30)/8;
         else
             $valor=0;
      break;

      case "AAPMESES":

        if (strrpos($hasta, "/")) {
          $fecaux = split("/", $hasta);
          $hastaaux = $fecaux[2] . '-' . $fecaux[1] . '-' . $fecaux[0];
        } else {
          $hastaaux = $hasta;
        }

        $sql = "select antpub('M','" . $empleado . "','" . $hastaaux . "','S') as aap from empresa;";
        if (Herramientas :: BuscarDatos($sql, & $tabla)) {
          if ($tabla[0]["aap"] != null && $tabla[0]["aap"] != '') {
            $valor = $tabla[0]["aap"];
          } else
            $valor = 0;
        } else
          $valor = 0;

        return $valor;
        break;


      case "AAPDIAS" :
        if (strrpos($hasta, "/")) {
          $fecaux = split("/", $hasta);
          $hastaaux = $fecaux[2] . '-' . $fecaux[1] . '-' . $fecaux[0];
        } else {
          $hastaaux = $hasta;
        }

        $sql = "select antpub('D','" . $empleado . "','" . $hastaaux . "','S') as aap from empresa;";
        if (Herramientas :: BuscarDatos($sql, & $tabla)) {
          if ($tabla[0]["aap"] != null && $tabla[0]["aap"] != '') {
            $valor = $tabla[0]["aap"];
          } else
            $valor = 0;
        } else
          $valor = 0;

        return $valor;
        break;

      case "NHIJEST" :
          $aux="%HIJ%";
          $codhijo="001";
          $criterio = "SELECT tippar FROM nptippar WHERE  upper(despar) like '". $aux . "'";
          if (Herramientas :: BuscarDatos($criterio, &$reg))
          {
                  $codhijo=$reg[0]["tippar"];
          }

         $sql = "Select coalesce(COUNT(*),0) as cuantos from NPInfFam where  CodEmp='" . $empleado . "' and parfam='". $codhijo ."' and  ocupac='E'";
         if (Herramientas :: BuscarDatos($sql, & $tabla)) {
          $valor = $tabla[0]["cuantos"];
         } else {
          $valor = 0;
         }
         break;

      case "FECDIAS":
          $mifecha="";
          $valor = 0;
          $criterio = "Select * from nphojint where codemp='" . $empleado . "'";
          if (Herramientas :: BuscarDatos($criterio, & $datosper)) {
            $aux = intval(substr($parametro, 1, 2));
            foreach ($datosper as $dat) {
              $i = 0;
              foreach ($dat as $d => $key) {
                if ($i == $aux) {
                  $mifecha= $key;
                }
                $i = $i +1;
              }
            }//foreach ($datosper as $dat)
           $fec_aux = split("-", $mifecha);
           if (count($fec_aux)>1)
           {
            if (checkdate(intval($fec_aux[1]), intval($fec_aux[2]), intval($fec_aux[0])) )
            {
              $valor=$fec_aux[2];
            }
           }
          }
      break;

      case "FECMES":
          $mifecha="";
          $valor = 0;
          $criterio = "Select * from nphojint where codemp='" . $empleado . "'";
          if (Herramientas :: BuscarDatos($criterio, & $datosper)) {
            $aux = intval(substr($parametro, 1, 2));
            foreach ($datosper as $dat) {
              $i = 0;
              foreach ($dat as $d => $key) {
                if ($i == $aux) {
                  $mifecha= $key;
                }
                $i = $i +1;
              }
            }//foreach ($datosper as $dat)
            $fec_aux = split("-", $mifecha);
            if (count($fec_aux)>1)
            {
	            if (checkdate(intval($fec_aux[1]), intval($fec_aux[2]), intval($fec_aux[0])) )
	            {
	              $valor=$fec_aux[1];
	            }
            }
          }
      break;

      case "FECANNOS":
          $mifecha="";
          $valor = 0;
          $criterio = "Select * from nphojint where codemp='" . $empleado . "'";
          if (Herramientas :: BuscarDatos($criterio, & $datosper)) {
            $aux = intval(substr($parametro, 1, 2));
            foreach ($datosper as $dat) {
              $i = 0;
              foreach ($dat as $d => $key) {
                if ($i == $aux) {
                  $mifecha= $key;
                }
                $i = $i +1;
              }
            }//foreach ($datosper as $dat)
            $fec_aux = split("-", $mifecha);
            if (count($fec_aux)>1)
            {
	            if (checkdate(intval($fec_aux[1]), intval($fec_aux[2]), intval($fec_aux[0])) )
	            {
	              $valor=$fec_aux[0];
	            }
            }
          }
      break;

      case "CATRABMES" :
        $valor = 0;
        $hasta_mod = split('/', $hasta);
        $desde_mod = split('/', $desde);
        if (intval(date('m', strtotime($fechaing))) == intval(date('m', strtotime($hasta_mod[1] . '/' . $hasta_mod[0] . '/' . $hasta_mod[2]))))
        {
           $valor = 1;
        }

        return $valor;
        break;

	  case "INTPRES" :
        $valor = 0;
        $fecha = $hasta;
        $criterio = "Select * from calculopres('$empleado','$fecha','$parametro','P') where tipo='DEPOSITADOS' order by fecini desc";
        if (Herramientas :: BuscarDatos($criterio, & $calpres))
		{
			$valor = $calpres[0]['monint'];
		}

        return $valor;
        break;

	  case "DIASBONOVAC" :

        $valor = 0;
        $fecha = $hasta;
        $criterio = "select sum(coalesce(a.diasbonovac,0)) as valor
				from npvacsalidas_det a, npvacsalidas b
				where
				b.fecpagbonvac=to_date('$fecha','dd/mm/yyyy')
				and and a.codemp='$empleado'
				and a.fecvac=b.fecvac ";

        if (Herramientas :: BuscarDatos($criterio, & $rs))
			if($rs[0]['valor']!='')
				$valor = $rs[0]['valor'];

        return $valor;
        break;

		case "MESFINALANO" :

        $valor = 0;
		$fecha = '31/12/'.substr($hasta,6,4);
        $criterio = "select months_between(fecing,to_date('$fecha','dd/mm/yyyy')+1) as valor
						from nphojint
						where
						codemp='$empleado'";

        if (Herramientas :: BuscarDatos($criterio, & $rs))
			if($rs[0]['valor']!='')
				$valor = $rs[0]['valor'];

        return $valor;
        break;
		
		case "D360FA" :

        $valor = 0;
		$fecha = '31/12/'.substr($hasta,6,4);
        $criterio = "select dias360(to_char(fecing,'dd/mm/yyyy'),'$fecha') as valor
						from nphojint
						where
						codemp='$empleado'";

        if (Herramientas :: BuscarDatos($criterio, & $rs))
			if($rs[0]['valor']!='')
				$valor = $rs[0]['valor'];

        return $valor;
        break;

      default :
        /////// FFRAC

        if (Herramientas :: StringPos($campo, "FFRAC", 0) != -1)
          //if ( Herramientas::instr($campo,'FFRAC',0,1)!=0 )
          {
          $movconbar = substr($campo, Herramientas :: instr($campo, '(', 0, 1) - 1);

          if (substr($movconbar, 0, 1) == 'M') // movimiento
            {
            if (substr($movconbar, 7, 1) == 'S') {
              $criterio = "Select Sum(cantidad) as cantidads,Sum(monto) as montos, Sum(Acumulado) as acumulados
                                from npasiconemp where activo='S' and codemp='" . $empleado . "' and codcon='" . substr($movconbar, 4, 3) . "' ";
              if (Herramientas :: BuscarDatos($criterio, & $tabla)) {
                if (substr($movconbar, 8, 1) == 'C') {
                  $sql = "Select * from nptippre where codcon='" . substr($movconbar, 4, 3) . "' ";
                  if (Herramientas :: BuscarDatos($sql, & $tablaprestamo)) {
                    if (floatval($tabla[0]["acumulados"]) - floatval($tabla[0]["cantidads"]) <= 0) {
                      $aux = $tabla[0]["acumulados"];
                    } else {
                      $aux = $tabla[0]["cantidads"];
                    }
                  } else {
                    $aux = $tabla[0]["cantidads"];
                  }
                } else {
                  $aux = $tabla[0]["montos"];
                } // tipo c o m
              }
            } else {
              $criterio = "Select cantidad,monto,acumulado from npasiconemp where activo='S' and codemp='" . $empleado . "' and codcar='" . $cargo . "' and codcon='" . substr($movconbar, 4, 3) . "' ";
              if (Herramientas :: BuscarDatos($criterio, & $tabla)) {
                if (substr($movconbar, 7, 1) == 'C') {
                  $sql = "Select * from nptippre where codcon='" . substr($movconbar, 4, 3) . "' ";
                  if (Herramientas :: BuscarDatos($sql, & $tablaprestamo)) {
                    if (floatval($tabla[0]["acumulado"]) - floatval($tabla[0]["cantidad"]) <= 0) {
                      $aux = $tabla[0]["acumulado"];
                    } else {
                      $aux = $tabla[0]["cantidad"];
                    }
                  } else {
                    $aux = $tabla[0]["cantidad"];
                  }
                } else {
                  $aux = $tabla[0]["monto"];
                } // tipo c o m
              } // tabla
            }
          }
          elseif (substr($movconbar, 0, 1) == 'C') // concepto
          {
            $criterio = "Select a.saldo as saldo,a.acumulado as acumulado,b.opecon as opecon
                            from npNomCal a, Npdefcpt b
                            where  a.codnom='" . $nomina . "' and a.codemp='" . $empleado . "'
                            and a.codcar='" . $cargo . "'
                            and a.codcon='" . substr($movconbar, 1, 3) . "'
                            and a.codcon = b.codcon ";
            if (Herramientas :: BuscarDatos($criterio, & $tabla)) {
              if (substr($movconbar, 4, 1) == 'S') {
                $aux = $tabla[0]["saldo"];
              } else {
                $aux = $tabla[0]["acumulado"];
              }
            }
          }
          elseif (substr($movconbar, 0, 1) == 'V') // variable
          {
            $criterio = "Select * from npdefvar where  codnom='" . $nomina . "' and codvar='" . substr($movconbar, 1, 3) . "' ";
            if (Herramientas :: BuscarDatos($criterio, & $tabla)) {
              $mid = 2 + intval(substr($movconbar, 4, 1)); // - 2;
              $campo = 'valor' . $mid;
              $aux = $tabla[0][$campo]; // ???????????
            }
          }

          return floatval($aux) - intval($aux); // FFRAC
        } //  fin FFRAC
        /////// FINT
        elseif (Herramientas :: StringPos($campo, "FINT", 0) != -1)
        //( Herramientas::instr($campo,'FINT',0,1) != 0 )
        {
          $movconbar = substr($campo, Herramientas :: instr($campo, '(', 0, 1) - 1);

          if (substr($movconbar, 0, 1) == 'M') // movimiento
            {
            if (substr($movconbar, 7, 1) == 'S') {
              $criterio = "Select Sum(cantidad) as cantidads,Sum(monto) as montos, Sum(Acumulado) as acumulados
                                from npasiconemp where activo='S' and codemp='" . $empleado . "' and codcon='" . substr($movconbar, 4, 3) . "' ";
              if (Herramientas :: BuscarDatos($criterio, & $tabla)) {
                if (substr($movconbar, 8, 1) == 'C') {
                  $sql = "Select * from nptippre where codcon='" . substr($movconbar, 4, 3) . "' ";
                  if (Herramientas :: BuscarDatos($sql, & $tablaprestamo)) {
                    if (floatval($tabla[0]["acumulados"]) - floatval($tabla[0]["cantidads"]) <= 0) {
                      $aux = $tabla[0]["acumulados"];
                    } else {
                      $aux = $tabla[0]["cantidads"];
                    }
                  } else {
                    $aux = $tabla[0]["cantidads"];
                  }
                } else {
                  $aux = $tabla[0]["montos"];
                } // tipo c o m
              }
            } // movconvar 7 1
            else {
              $criterio = "Select cantidad,monto,acumulado from npasiconemp where activo='S' and codemp='" . $empleado . "' and codcar='" . $cargo . "' and codcon='" . substr($movconbar, 4, 3) . "' ";
              if (Herramientas :: BuscarDatos($criterio, & $tabla)) {
                if (substr($movconbar, 7, 1) == 'C') {
                  $sql = "Select * from nptippre where codcon='" . substr($movconbar, 4, 3) . "' ";
                  if (Herramientas :: BuscarDatos($sql, & $tablaprestamo)) {
                    if (floatval($tabla[0]["acumulado"]) - floatval($tabla[0]["cantidad"]) <= 0) {
                      $aux = $tabla[0]["acumulado"];
                    } else {
                      $aux = $tabla[0]["cantidad"];
                    }
                  } else {
                    $aux = $tabla[0]["cantidad"];
                  }
                } else {
                  $aux = $tabla[0]["monto"];
                } // tipo c o m
              } // tabla
            } // fin else movconbar 7 1
          }
          elseif (substr($movconbar, 0, 1) == 'C') // concepto
          {
            $criterio = "Select a.saldo as saldo,a.acumulado as acumulado,b.opecon as opecon
                            from npNomCal a, Npdefcpt b
                            where  a.codnom='" . $nomina . "' and a.codemp='" . $empleado . "'
                            and a.codcar='" . $cargo . "'
                            and a.codcon='" . substr($movconbar, 1, 3) . "'
                            and a.codcon = b.codcon ";
            if (Herramientas :: BuscarDatos($criterio, & $tabla)) {
              if (substr($movconbar, 4, 1) == 'S') {
                $aux = $tabla[0]["saldo"];
              } else {
                $aux = $tabla[0]["acumulado"];
              }
            }
          } // fin concepto
          elseif (substr($movconbar, 0, 1) == 'V') // variable
          {
            $criterio = "Select * from npdefvar where  codnom='" . $nomina . "' and codvar='" . substr($movconbar, 1, 3) . "' ";
            if (Herramientas :: BuscarDatos($criterio, & $tabla)) {
              $mid = 2 + intval(substr($movconbar, 4, 1)); //- 2;
              $campo = 'valor' . $mid;
              $aux = $tabla[0][$campo]; // ???????????
            }
          }
          return intval($aux);
        } // end fint
        ////// MESF
        elseif (Herramientas :: StringPos($campo, "MESF*", 0) != -1)
        //( Herramientas::instr($campo,'MESF*',0,1) != 0 )
        {
          $movconbar = substr($campo, Herramientas :: instr($campo, '(', 0, 1), strlen($campo) - Herramientas :: instr($campo, '(', 0, 1) - 1);
          if (substr($movconbar, 0, 1) == 'E' || Herramientas :: StringPos($movconbar, "FECN", 0) != -1) //Herramientas::instr($movconbar,'FECN',0,1) != 0)
            {
            // ???????? recursividad
            return date('m', strtotime(self :: evaluar_Campo($movconbar)));
          } else {
            return date('m', strtotime($movconbar));
          }
        } // end MESF
        //////// DIAF*
        elseif (Herramientas :: StringPos($campo, "DIAF*", 0) != -1)
        // if ( Herramientas::instr($campo,'DIAF*',0,1) != 0 )
        {
          $movconbar = substr($campo, Herramientas :: instr($campo, '(', 0, 1), strlen($campo) - Herramientas :: instr($campo, '(', 0, 1) - 1);
          if (substr($movconbar, 0, 1) == 'E' || Herramientas :: StringPos($movconbar, "FECN", 0) != -1) //Herramientas::instr($movconbar,'FECN',0,1) != 0)
            {
            // ???????? recursividad
            return date('d', strtotime(self :: evaluar_Campo($movconbar)));
          } else {
            return date('d', strtotime($movconbar));
          }
        } // end DIAF*
        //////// ANOF*
        elseif (Herramientas :: StringPos($campo, "ANOF*", 0) != -1)
        //if ( Herramientas::instr($campo,'ANOF*',0,1) != 0 )
        {
          $movconbar = substr($campo, Herramientas :: instr($campo, '(', 0, 1), strlen($campo) - Herramientas :: instr($campo, '(', 0, 1) - 1);
          if (substr($movconbar, 0, 1) == 'E' || Herramientas :: StringPos($movconbar, "FECN", 0) != -1) //Herramientas::instr($movconbar,'FECN',0,1) != 0)
            {
            // ???????? recursividad
            return date('Y', strtotime(self :: evaluar_Campo($movconbar)));
          } else {
            return date('Y', strtotime($movconbar));
          }
        } // end ANOF*
        // FECN
        elseif (Herramientas :: StringPos($campo, "FECN*", 0) != -1)
        //if ( Herramientas::instr($campo,'FECN*',0,1) != 0 )
        {
          return $profec;
        }
        ///////// M
        elseif (substr($campo, 0, 1) == 'M') // M
        {
          if (substr($campo, 7, 1) == 'S') {
            $criterio = "Select Sum(cantidad) as cantidads,Sum(monto) as montos, Sum(Acumulado) as acumulados
                              from npasiconemp where activo='S' and codemp='" . $empleado . "' and codcon='" . substr($campo, 4, 3) . "' ";
            if (Herramientas :: BuscarDatos($criterio, & $tabla)) {
              if (substr($campo, 8, 1) == 'C') {
                $sql = "Select * from nptippre where codcon='" . substr($campo, 4, 3) . "' ";
                if (Herramientas :: BuscarDatos($sql, & $tablaprestamo)) {
                  if (floatval($tabla[0]["acumulados"]) - floatval($tabla[0]["cantidads"]) <= 0) {
                    $aux = $tabla[0]["acumulados"];
                  } else {
                    $aux = $tabla[0]["cantidads"];
                  }
                } else {
                  $aux = $tabla[0]["cantidads"];
                }
              } else {
                $aux = $tabla[0]["montos"];
              } // tipo c o m
            }
            return $aux;
          } // $campo 7 1
          else {
            $criterio = "Select cantidad,monto,acumulado from npasiconemp where activo='S' and codemp='" . $empleado . "' and codcar='" . $cargo . "' and codcon='" . substr($campo, 4, 3) . "' ";
            if (Herramientas :: BuscarDatos($criterio, & $tabla)) {
              if (substr($campo, 7, 1) == 'C') {
                $sql = "Select * from nptippre where codcon='" . substr($campo, 4, 3) . "' ";
                if (Herramientas :: BuscarDatos($sql, & $tablaprestamo)) {
                  if (floatval($tabla[0]["acumulado"]) - floatval($tabla[0]["cantidad"]) <= 0) {
                    $aux = $tabla[0]["acumulado"];
                  } else {
                    $aux = $tabla[0]["cantidad"];
                  }
                } else {
                  $aux = $tabla[0]["cantidad"];
                }
              } else {
                $aux = $tabla[0]["monto"];
              } // tipo c o m
              return $aux;
            } // tabla

          } // fin else $campo 7 1
        }
        elseif (substr($campo, 0, 1) == 'E') {
          $criterio = "Select * from nphojint where codemp='" . $empleado . "'";
          if (Herramientas :: BuscarDatos($criterio, & $datosper)) {
            $aux = intval(substr($campo, 1, 2));
            foreach ($datosper as $dat) {
              $i = 0;
              foreach ($dat as $d => $key) {
                if ($i == $aux) {
                  return $key;
                }
                $i = $i +1;
              }
            }
            return 'EEEEEEEEEEEEE';
          }
        }
        elseif (substr($campo, 0, 1) == 'V') {
          //SEGUNDO CAMBIO
          $valor = 0.00;
          $criterio = "Select * from npdefvar where  codnom='" . $nomina . "' and codvar='" . substr($campo, 1, 3) . "' ";
          if (Herramientas :: BuscarDatos($criterio, & $tabla)) {
            $aux = intval(substr($campo, 4, 1));
            $aux = 'valor' . $aux;
            foreach ($tabla as $dat) {

              foreach ($dat as $d => $key) {
                if ($d == $aux) {
                  $valor = $key;
                }

              }
            }
            return $valor;
          }
        }
        elseif (substr($campo, 0, 1) == 'C') {
          $criterio = "Select a.saldo as saldo,a.acumulado as acumulado,b.opecon as opecon
                        from npNomCal a,Npdefcpt b
                        where  a.codnom='" . $nomina . "' and a.codemp='" . $empleado . "'
                        and a.codcar='" . $cargo . "' and a.codcon='" . substr($campo, 1, 3) . "'
                        and a.codcon = b.codcon ";
          if (Herramientas :: BuscarDatos($criterio, & $tabla)) {
            if (substr($campo, 4, 1) == 'S') {
              if (empty ($tabla[0]["saldo"])) {
                $aux = 0;
              } else {
                $aux = $tabla[0]["saldo"];
              }
            } else {
              if (empty ($tabla[0]["acumulado"])) {
                $aux = 0;
              } else {
                $aux = $tabla[0]["acumulado"];
              }
            }
            return $aux;
          }
        }
        elseif (substr($campo, 0, 1) == 'H') // historicos
        {
          if (substr($campo, 23, 1) == 'P') // PROMEDIO
            {

            $fec1 = substr($campo, 9, 2) . '/' . substr($campo, 7, 2) . '/' . substr($campo, 11, 4);
            $fec2 = substr($campo, 17, 2) . '/' . substr($campo, 15, 2) . '/' . substr($campo, 19, 4);
            $fec1_aux = split("/", $fec1);
            $fec2_aux = split("/", $fec2);
            if (checkdate(intval($fec1_aux[1]), intval($fec1_aux[0]), intval($fec1_aux[2])) && checkdate(intval($fec2_aux[1]), intval($fec2_aux[0]), intval($fec2_aux[2]))) {
              $criterio = "Select avg(monto) as monto from nphiscon where  codnom='" . substr($campo, 1, 3) . "'
                                         and codemp='" . $empleado . "'  and codcon='" . substr($campo, 4, 3) . "' and";
              $criterio2 = " TO_DATE(TO_CHAR(fecnom,'DD/MM/YYYY'),'DD/MM/YYYY')>=TO_DATE('" . $fec1 . "','DD/MM/YYYY') and
                                          TO_DATE(TO_CHAR(fecnom,'DD/MM/YYYY'),'DD/MM/YYYY')<=TO_DATE('" . $fec2 . "','DD/MM/YYYY') ";
              if (Herramientas :: BuscarDatos($criterio . $criterio2, & $tabla)) {
                if (empty ($tabla[0]["monto"])) {
                  $aux = $tabla[0]["monto"];
                } else {
                  $aux = 0;
                }
                return $aux;
              }
            } else // no son fechas
            {

              if (substr($campo, 24, 1) == 'P') // PERIODO
              {
              	 $numero = floatval(substr($campo, 25));
                 $criterio="select min(fecnom) as minfec,max(fecnom) as maxfec from (select distinct fecnom from nphiscon where codnom='" . substr($campo, 1, 3) . "' order by fecnom desc limit " . $numero . ") a ";
                 if (Herramientas :: BuscarDatos($criterio, &$resultados)) {
                 if (!empty($resultados[0]["minfec"]) && !empty($resultados[0]["maxfec"]))
                 {
                   $criterio = "Select coalesce(avg(monto),0) as monto from nphiscon where  codnom='" . substr($campo, 1, 3) . "'
                                          and codemp='" . $empleado . "'  and codcon='" . substr($campo, 4, 3) . "' and ";
                   $criterio2 = " fecnom>=TO_DATE('" . $resultados[0]["minfec"] . "','yyyy-mm-dd') and
                                          fecnom<=TO_DATE('" . $resultados[0]["maxfec"] . "','yyyy-mm-dd') ";

                   if (Herramientas :: BuscarDatos($criterio . $criterio2, & $tabla)) {
                   if (!empty ($tabla[0]["monto"]))
                    {$aux = $tabla[0]["monto"];}
                   else
                     { $aux = 0; }
                   }
                   else
                     { $aux = 0; }
                 }
                 else
                  { $aux = 0; }
                 return $aux;
               }
              }//if (substr($campo, 24, 1) == 'M') // MES
              else //meses
              {
                $numero = floatval(substr($campo, 24));
                //////////////////
                $resta="-".$numero;
                $sql="select add_months('" . $fecnom . "',-1) as mesfin, add_months('" . $fecnom . "',".$resta.") as mesini from empresa";
                Herramientas :: BuscarDatos($sql, &$resulfechas);
                $auxmesini=$resulfechas[0]["mesini"];
                $auxmesfin=$resulfechas[0]["mesfin"];
                $auxfecini= split('-', $auxmesini);
                $fecini = $auxfecini[0] . '-' . $auxfecini[1] . '-01';
                $sql="select last_day('" . $auxmesfin . "') as fecfin from empresa";
                Herramientas :: BuscarDatos($sql, &$resulfecfin);
                $fecfin=$resulfecfin[0]["fecfin"];
				//////////////////////
                $criterio = "Select avg(monto) as monto from nphiscon where  codnom='" . substr($campo, 1, 3) . "'
                                          and codemp='" . $empleado . "'  and codcon='" . substr($campo, 4, 3) . "' and ";
                $criterio2 = " TO_DATE(TO_CHAR(fecnom,'DD/MM/YYYY'),'DD/MM/YYYY')>=TO_DATE('" . $fecini . "','DD/MM/YYYY') and
                                          TO_DATE(TO_CHAR(fecnom,'DD/MM/YYYY'),'DD/MM/YYYY')<=TO_DATE('" . $fecfin . "','DD/MM/YYYY') ";
                 if (Herramientas :: BuscarDatos($criterio . $criterio2, & $tabla))
                 {
                  if (empty ($tabla[0]["monto"])) {
                   $aux = $tabla[0]["monto"];
                  } else {
                    $aux = 0;
                 }
                 return $aux;
                 }//if (Herramientas :: BuscarDatos($criterio . $criterio2, & $tabla))
              }//else // MES
            }//else no son fechas
          } // fin PROMEDIO
          elseif (substr($campo, 23, 1) == 'S') // SUM
          {
            $fec1 = substr($campo, 9, 2) . '/' . substr($campo, 7, 2) . '/' . substr($campo, 11, 4);
            $fec2 = substr($campo, 17, 2) . '/' . substr($campo, 15, 2) . '/' . substr($campo, 19, 4);
            $fec1_aux = split("/", $fec1);
            $fec2_aux = split("/", $fec2);
            if (checkdate(intval($fec1_aux[1]), intval($fec1_aux[0]), intval($fec1_aux[2])) && checkdate(intval($fec2_aux[1]), intval($fec2_aux[0]), intval($fec2_aux[2]))) {
              $criterio = "Select sum(monto) as monto from nphiscon where  codnom='" . substr($campo, 1, 3) . "'
                                          and codemp='" . $empleado . "'  and codcon='" . substr($campo, 4, 3) . "' and ";
              $criterio2 = " TO_DATE(TO_CHAR(fecnom,'DD/MM/YYYY'),'DD/MM/YYYY')>=TO_DATE('" . $fec1 . "','DD/MM/YYYY') and
                                          TO_DATE(TO_CHAR(fecnom,'DD/MM/YYYY'),'DD/MM/YYYY')<=TO_DATE('" . $fec2 . "','DD/MM/YYYY') ";
              if (Herramientas :: BuscarDatos($criterio . $criterio2, & $tabla)) {
                if (empty ($tabla[0]["monto"])) {
                  $aux = $tabla[0]["monto"];
                } else {
                  $aux = 0;
                }
                return $aux;
              }
            } else // no son fechas
            {
             if (substr($campo, 24, 1) == 'P') // PERIODO
             {
             	 $numero = floatval(substr($campo, 25));
                 $criterio="select min(fecnom) as minfec,max(fecnom) as maxfec from (select distinct fecnom from nphiscon where codnom='" . substr($campo, 1, 3) . "' order by fecnom desc limit " . $numero . ") a ";
                 if (Herramientas :: BuscarDatos($criterio, &$resultados)) {
                 if (!empty($resultados[0]["minfec"]) && !empty($resultados[0]["maxfec"]))
                 {
                   $criterio = "Select coalesce(sum(monto),0) as monto from nphiscon where  codnom='" . substr($campo, 1, 3) . "'
                                          and codemp='" . $empleado . "'  and codcon='" . substr($campo, 4, 3) . "' and ";
                   $criterio2 = " fecnom>=TO_DATE('" . $resultados[0]["minfec"] . "','yyyy-mm-dd') and
                                          fecnom<=TO_DATE('" . $resultados[0]["maxfec"] . "','yyyy-mm-dd') ";

                   if (Herramientas :: BuscarDatos($criterio . $criterio2, & $tabla)) {
                   if (!empty ($tabla[0]["monto"]))
                    {$aux = $tabla[0]["monto"];}
                   else
                     { $aux = 0; }
                   }
                   else
                     { $aux = 0; }
                 }
                 else
                  { $aux = 0; }
                 return $aux;
               }

             }//if (substr($campo, 24, 1) == 'P') // PERIODO
             else
              {
             	$numero = floatval(substr($campo, 24));
                //////////////////
                $resta="-".$numero;
                $sql="select add_months('" . $fecnom . "',-1) as mesfin, add_months('" . $fecnom . "',".$resta.") as mesini from empresa";
                Herramientas :: BuscarDatos($sql, &$resulfechas);
                $auxmesini=$resulfechas[0]["mesini"];
                $auxmesfin=$resulfechas[0]["mesfin"];
                $auxfecini= split('-', $auxmesini);
                $fecini = $auxfecini[0] . '-' . $auxfecini[1] . '-01';
                $sql="select last_day('" . $auxmesfin . "') as fecfin from empresa";
                Herramientas :: BuscarDatos($sql, &$resulfecfin);
                $fecfin=$resulfecfin[0]["fecfin"];
				//////////////////////
                $criterio = "Select sum(monto) as monto from nphiscon where  codnom='" . substr($campo, 1, 3) . "'
                                          and codemp='" . $empleado . "'  and codcon='" . substr($campo, 4, 3) . "' and ";
                $criterio2 = " TO_DATE(TO_CHAR(fecnom,'DD/MM/YYYY'),'DD/MM/YYYY')>=TO_DATE('" . $fecini . "','DD/MM/YYYY') and
                                          TO_DATE(TO_CHAR(fecnom,'DD/MM/YYYY'),'DD/MM/YYYY')<=TO_DATE('" . $fecfin . "','DD/MM/YYYY') ";
              if (Herramientas :: BuscarDatos($criterio . $criterio2, & $tabla)) {
                if (empty ($tabla[0]["monto"])) {
                  $aux = $tabla[0]["monto"];
                } else {
                  $aux = 0;
                }
                return $aux;
              }

              }//else// MES
            }
          } // fin SUM
          elseif (substr($campo, 23, 1) == 'M') // MAX
          {
            $fec1 = substr($campo, 9, 2) . '/' . substr($campo, 7, 2) . '/' . substr($campo, 11, 4);
            $fec2 = substr($campo, 17, 2) . '/' . substr($campo, 15, 2) . '/' . substr($campo, 19, 4);
            $fec1_aux = split("/", $fec1);
            $fec2_aux = split("/", $fec2);
            if (checkdate(intval($fec1_aux[1]), intval($fec1_aux[0]), intval($fec1_aux[2])) && checkdate(intval($fec2_aux[1]), intval($fec2_aux[0]), intval($fec2_aux[2]))) {
              $criterio = "Select max(monto) as monto from nphiscon where  codnom='" . substr($campo, 1, 3) . "'
                                          and codemp='" . $empleado . "'  and codcon='" . substr($campo, 4, 3) . "' and ";
              $criterio2 = " TO_DATE(TO_CHAR(fecnom,'DD/MM/YYYY'),'DD/MM/YYYY')>=TO_DATE('" . $fec1 . "','DD/MM/YYYY') and
                                          TO_DATE(TO_CHAR(fecnom,'DD/MM/YYYY'),'DD/MM/YYYY')<=TO_DATE('" . $fec2 . "','DD/MM/YYYY') ";
              if (Herramientas :: BuscarDatos($criterio . $criterio2, & $tabla)) {
                if (empty ($tabla[0]["monto"])) {
                  $aux = $tabla[0]["monto"];
                } else {
                  $aux = 0;
                }
                return $aux;
              }
            } else // no son fechas
            {

             if (substr($campo, 24, 1) == 'P') // PERIODO
             {
             	 $numero = floatval(substr($campo, 25));
                 $criterio="select min(fecnom) as minfec,max(fecnom) as maxfec from (select distinct fecnom from nphiscon where codnom='" . substr($campo, 1, 3) . "' order by fecnom desc limit " . $numero . ") a ";
                 if (Herramientas :: BuscarDatos($criterio, &$resultados)) {
                 if (!empty($resultados[0]["minfec"]) && !empty($resultados[0]["maxfec"]))
                 {
                   $criterio = "Select coalesce(max(monto),0) as monto from nphiscon where  codnom='" . substr($campo, 1, 3) . "'
                                          and codemp='" . $empleado . "'  and codcon='" . substr($campo, 4, 3) . "' and ";
                   $criterio2 = " fecnom>=TO_DATE('" . $resultados[0]["minfec"] . "','yyyy-mm-dd') and
                                          fecnom<=TO_DATE('" . $resultados[0]["maxfec"] . "','yyyy-mm-dd') ";

                   if (Herramientas :: BuscarDatos($criterio . $criterio2, & $tabla)) {
                   if (!empty ($tabla[0]["monto"]))
                    {$aux = $tabla[0]["monto"];}
                   else
                     { $aux = 0; }
                   }
                   else
                     { $aux = 0; }
                 }
                 else
                  { $aux = 0; }
                 return $aux;
               }

             }//if (substr($campo, 24, 1) == 'P') // PERIODO
              else
              {
				$numero = floatval(substr($campo, 24));
                //////////////////
                $resta="-".$numero;
                $sql="select add_months('" . $fecnom . "',-1) as mesfin, add_months('" . $fecnom . "',".$resta.") as mesini from empresa";
                Herramientas :: BuscarDatos($sql, &$resulfechas);
                $auxmesini=$resulfechas[0]["mesini"];
                $auxmesfin=$resulfechas[0]["mesfin"];
                $auxfecini= split('-', $auxmesini);
                $fecini = $auxfecini[0] . '-' . $auxfecini[1] . '-01';
                $sql="select last_day('" . $auxmesfin . "') as fecfin from empresa";
                Herramientas :: BuscarDatos($sql, &$resulfecfin);
                $fecfin=$resulfecfin[0]["fecfin"];
				//////////////////////
              $criterio = "Select max(monto) as monto from nphiscon where  codnom='" . substr($campo, 1, 3) . "'
                                          and codemp='" . $empleado . "'  and codcon='" . substr($campo, 4, 3) . "' and ";
              $criterio2 = " TO_DATE(TO_CHAR(fecnom,'DD/MM/YYYY'),'DD/MM/YYYY')>=TO_DATE('" . $fecini . "','DD/MM/YYYY') and
                                          TO_DATE(TO_CHAR(fecnom,'DD/MM/YYYY'),'DD/MM/YYYY')<=TO_DATE('" . $fecfin . "','DD/MM/YYYY') ";
              if (Herramientas :: BuscarDatos($criterio . $criterio2, & $tabla)) {
                if (empty ($tabla[0]["monto"])) {
                  $aux = $tabla[0]["monto"];
                } else {
                  $aux = 0;
                }
                return $aux;
              }
             }//else // MES
            }
          } // fin MAX
          elseif (substr($campo, 23, 1) == 'N') // MIN
          {
            $fec1 = substr($campo, 9, 2) . '/' . substr($campo, 7, 2) . '/' . substr($campo, 11, 4);
            $fec2 = substr($campo, 17, 2) . '/' . substr($campo, 15, 2) . '/' . substr($campo, 19, 4);
            $fec1_aux = split("/", $fec1);
            $fec2_aux = split("/", $fec2);
            if (checkdate(intval($fec1_aux[1]), intval($fec1_aux[0]), intval($fec1_aux[2])) && checkdate(intval($fec2_aux[1]), intval($fec2_aux[0]), intval($fec2_aux[2]))) {
              $criterio = "Select min(monto) as monto from nphiscon where  codnom='" . substr($campo, 1, 3) . "'
                                          and codemp='" . $empleado . "'  and codcon='" . substr($campo, 4, 3) . "' and ";
              $criterio2 = " TO_DATE(TO_CHAR(fecnom,'DD/MM/YYYY'),'DD/MM/YYYY')>=TO_DATE('" . $fec1 . "','DD/MM/YYYY') and
                                          TO_DATE(TO_CHAR(fecnom,'DD/MM/YYYY'),'DD/MM/YYYY')<=TO_DATE('" . $fec2 . "','DD/MM/YYYY') ";
              if (Herramientas :: BuscarDatos($criterio . $criterio2, & $tabla)) {
                if (empty ($tabla[0]["monto"])) {
                  $aux = $tabla[0]["monto"];
                } else {
                  $aux = 0;
                }
                return $aux;
              }
            } else // no son fechas
            {

             if (substr($campo, 24, 1) == 'P') // PERIODO
             {
                 $numero = floatval(substr($campo, 25));
                 $criterio="select min(fecnom) as minfec,max(fecnom) as maxfec from (select distinct fecnom from nphiscon where codnom='" . substr($campo, 1, 3) . "' order by fecnom desc limit " . $numero . ") a ";
                 if (Herramientas :: BuscarDatos($criterio, &$resultados)) {
                 if (!empty($resultados[0]["minfec"]) && !empty($resultados[0]["maxfec"]))
                 {
                   $criterio = "Select coalesce(min(monto),0) as monto from nphiscon where  codnom='" . substr($campo, 1, 3) . "'
                                          and codemp='" . $empleado . "'  and codcon='" . substr($campo, 4, 3) . "' and ";
                   $criterio2 = " fecnom>=TO_DATE('" . $resultados[0]["minfec"] . "','yyyy-mm-dd') and
                                          fecnom<=TO_DATE('" . $resultados[0]["maxfec"] . "','yyyy-mm-dd') ";

                   if (Herramientas :: BuscarDatos($criterio . $criterio2, & $tabla)) {
                   if (!empty ($tabla[0]["monto"]))
                    {$aux = $tabla[0]["monto"];}
                   else
                     { $aux = 0; }
                   }
                   else
                     { $aux = 0; }
                 }
                 else
                  { $aux = 0; }
                 return $aux;
               }
             }//if (substr($campo, 24, 1) == 'M') // MES
             else
              {
              	$numero = floatval(substr($campo, 24));
                //////////////////
                $resta="-".$numero;
                $sql="select add_months('" . $fecnom . "',-1) as mesfin, add_months('" . $fecnom . "',".$resta.") as mesini from empresa";
                Herramientas :: BuscarDatos($sql, &$resulfechas);
                $auxmesini=$resulfechas[0]["mesini"];
                $auxmesfin=$resulfechas[0]["mesfin"];
                $auxfecini= split('-', $auxmesini);
                $fecini = $auxfecini[0] . '-' . $auxfecini[1] . '-01';
                $sql="select last_day('" . $auxmesfin . "') as fecfin from empresa";
                Herramientas :: BuscarDatos($sql, &$resulfecfin);
                $fecfin=$resulfecfin[0]["fecfin"];
				//////////////////////
              $criterio = "Select min(monto) as monto from nphiscon where  codnom='" . substr($campo, 1, 3) . "'
                                          and codemp='" . $empleado . "'  and codcon='" . substr($campo, 4, 3) . "' and ";
              $criterio2 = " TO_DATE(TO_CHAR(fecnom,'DD/MM/YYYY'),'DD/MM/YYYY')>=TO_DATE('" . $fecini . "','DD/MM/YYYY') and
                                          TO_DATE(TO_CHAR(fecnom,'DD/MM/YYYY'),'DD/MM/YYYY')<=TO_DATE('" . $fecfin . "','DD/MM/YYYY') ";
              if (Herramientas :: BuscarDatos($criterio . $criterio2, & $tabla)) {
                if (empty ($tabla[0]["monto"])) {
                  $aux = $tabla[0]["monto"];
                } else {
                  $aux = 0;
                }
                return $aux;
              }
             }//else // MES
            }
          } // fin MIN
        } // FIN DEL "H"
    }
    return $valor;

  } // fin function

  public static function evaluar_Cond($valor1, $operador, $valor2) {
    $val = split("/", $valor2);
    if (count($val) == 3) {
      $valor2 = $val[2] . '-' . $val[1] . '-' . $val[0];
    }

    $cont1 = split("-", $valor1);
    $cont2 = split("-", $valor2);

    $aux2 = strrpos($valor2, ',');
    $aux3 = strrpos($valor2, '.');
    if ($aux2 || $aux3) {
      /*$valor2 = str_replace('.','*',$valor2);
      $valor2 = str_replace(',','',$valor2);
      $valor2 = str_replace('*','.',$valor2);*/
      $valor2 = H :: toFloatdecimal($valor2, 4);
    }

    if (is_numeric(trim($valor2)) && is_numeric(trim($valor1))) {
      $valor2 = floatval($valor2);
      $valor1 = floatval($valor1);
    }
    elseif (count($cont1) >= 2 && (count($cont2)) >= 2 && (strlen($valor2) == 8 || strlen($valor2) == 10)) {
      $valor2 = strtotime($valor2);
      $valor1 = strtotime($valor1);
    }
    switch ($operador) {
      case ">" :
        if ($valor1 > $valor2) {
          return true;
        } else {
          return false;
        }
        break;

      case "<" :
        if ($valor1 < $valor2) {
          return true;
        } else {
          return false;
        }
        break;

      case "<>" :
        if ($valor1 != $valor2) {
          return true;
        } else {
          return false;
        }
        break;

      case ">=" :
        if ($valor1 >= $valor2) {
          return true;
        } else {
          return false;
        }
        break;

      case "<=" :
        if ($valor1 <= $valor2) {
          return true;
        } else {
          return false;
        }
        break;

      case "=" :
        if ($valor1 == $valor2) {
          return true;
        } else {
          return false;
        }
        break;
    } // fin switch
  }

  public static function evaluar_Opelog($campo1, $campo2, $operador) {
    switch (strtoupper($operador)) {
      case (strtoupper("AND")) :
        if ($campo1 && $campo2) {
          return true;
        } else {
          return false;
        }
        break;

      case (strtoupper("OR")) :
        if ($campo1 || $campo2) {
          return true;
        } else {
          return false;
        }
        break;
    }
  }

  public static function calcularBanco($empleado, $cargo, $codnom) {
    $c = new Criteria();
    $c->add(NpasicarempPeer :: CODEMP, $empleado);
    $c->add(NpasicarempPeer :: CODCAR, $cargo);
    $c->add(NpasicarempPeer :: CODNOM, $codnom);
    $npempleados_banco = NpasicarempPeer :: doSelectOne($c);
    if ($npempleados_banco) {
      $criterio = "SELECT coalesce(SUM(a.SALDO),0) as saldo
                   FROM NPNOMCAL A,NPDEFCPT B
                    WHERE A.CODEMP='" . $empleado . "' AND A.CODCON=B.CODCON AND
                    A.ASIDED='A' AND B.IMPCPT='S' AND A.CODNOM= '" . $codnom . "' AND CODCAR='" . $cargo . "'";
      Herramientas :: BuscarDatos($criterio, & $asignaciones);
      $criterio = "SELECT coalesce(SUM(a.SALDO),0) as saldo
                   FROM NPNOMCAL A,NPDEFCPT B
                    WHERE A.CODEMP='" . $empleado . "' AND A.CODCON=B.CODCON AND
                    A.ASIDED='D' AND B.IMPCPT='S' AND A.CODNOM= '" . $codnom . "' AND CODCAR='" . $cargo . "'";
      Herramientas :: BuscarDatos($criterio, & $deducciones);

      if (empty ($deducciones[0]["saldo"]))
        $deducc = 0;
      else
        $deducc = $deducciones[0]["saldo"];
      $monto = $asignaciones[0]["saldo"] - $deducc;

      $npempleados_banco->setMontonomina($monto);
      $npempleados_banco->save();
    }
  }

  /********************************************************************************************/

  public static function salvarNomasicarconnom($registro, $grid) {
    //maestro
    $c = new Criteria();
    $c->add(NpcargosPeer :: CODCAR, $registro->getCodcar());
    $resul = NpcargosPeer :: doSelectOne($c);
    if ($resul) {
      $sueldo = $resul->getSuecar();
      $grado = $resul->getGraocp();
    } else {
      $sueldo = 0;
      $grado = "";
    }
    ///consulta con id criteria y este if

    if ($registro->getId() != "") {
      $cc = new Criteria();
      $cc->add(NpasicarempPeer :: ID, $registro->getId());
      $r = NpasicarempPeer :: doSelectOne($cc);

      $r->setCodemp($registro->getCodemp());
      $r->setCodcar($registro->getCodcar());
      $r->setCodnom($registro->getCodnom());
      $r->setCodcat($registro->getCodcat());
      $r->setFecasi($registro->getFecasi());
      $r->setNomemp($registro->getNomemp());
      $r->setNomcar($registro->getNomcar());
      $r->setNomnom($registro->getNomnom());
      $r->setNomcat($registro->getNomcat());
	  $r->setCodtipded($registro->getCodtipded());
	  $r->setCodtipcat($registro->getCodtipcat());
      $r->setUnieje(null);
      $r->setSueldo($sueldo);
      $r->setStatus('V');
      $r->setCodtipgas($registro->getCodtipgas());
      $r->setCodgrunom($registro->getCodgrunom());
      if ($grado != "") {
        $r->setGrado($grado);
      }
      if ($registro->getPaso() != "") {
        $r->setPaso($registro->getPaso());
      }
      $r->save();
    } else {
      //new

      $c = new Criteria();
      $c->add(NpasicarempPeer :: CODEMP, $registro->getCodemp());
      $c->add(NpasicarempPeer :: CODCAR, $registro->getCodcar());
      $c->add(NpasicarempPeer :: CODNOM, $registro->getCodnom());
      $c->add(NpasicarempPeer :: FECASI, $registro->getFecasi());
      $c->add(NpasicarempPeer :: STATUS, 'V');
      $reg = NpasicarempPeer :: doSelectOne($c);

      if ($reg) {
        return 434;
      }

      $npasicaremp = new Npasicaremp();
      $npasicaremp->setCodemp($registro->getCodemp());
      $npasicaremp->setCodcar($registro->getCodcar());
      $npasicaremp->setCodnom($registro->getCodnom());
      $npasicaremp->setCodcat($registro->getCodcat());
      $npasicaremp->setFecasi($registro->getFecasi());
      $npasicaremp->setNomemp($registro->getNomemp());
      $npasicaremp->setNomcar($registro->getNomcar());
      $npasicaremp->setNomnom($registro->getNomnom());
      $npasicaremp->setNomcat($registro->getNomcat());
	  $npasicaremp->setCodtipded($registro->getCodtipded());
	  $npasicaremp->setCodtipcat($registro->getCodtipcat());
      $npasicaremp->setUnieje(null);
      $npasicaremp->setSueldo($sueldo);
      $npasicaremp->setStatus('V');
      $npasicaremp->setCodtipgas($registro->getCodtipgas());
      $npasicaremp->setCodgrunom($registro->getCodgrunom());
      if ($grado != "") {
        $npasicaremp->setGrado($grado);
      }
      if ($registro->getPaso() != "") {
        $npasicaremp->setPaso($registro->getPaso());
      }
      $npasicaremp->save();

    }

    //detalle
    /*$c = new Criteria();
    $c->add(NpasiconempPeer::CODEMP,$registro->getCodemp());
    $c->add(NpasiconempPeer::CODCAR,$registro->getCodcar());
    $c->add(NpasiconnomPeer::CODNOM,$registro->getCodnom());
    $c->addJoin(NpasiconempPeer::CODCON,NpasiconnomPeer::CODCON);
    $resul= NpasiconempPeer::doDelete($c);*/
    $sql = "delete from npasiconemp where codemp='" . $registro->getCodemp() . "' and codcar='" . $registro->getCodcar() . "'
            and codcon in (select codcon from npasiconnom where codnom='" . $registro->getCodnom() . "')";
    Herramientas :: insertarRegistros($sql);

    $x = $grid[0][0];
    $j = 0;
    while ($j < count($x)) {
      $marcado = str_replace("'", "", $x[$j]['check']);
      $concepto = str_replace("'", "", $x[$j]['codcon']);
      if ($marcado == "1") {
        $e = new Criteria();
        $e->add(NpdefcptPeer :: CODCON, $concepto);
        $rese = NpdefcptPeer :: doSelectOne($e);
        if ($rese) {
          $act_con = $rese->getConact();
          $asi_ded = $rese->getOpecon();
        } else {
          $act_con = 0;
          $asi_ded = 0;
        }

        $npasiconemp = new Npasiconemp();
        $npasiconemp->setCodemp($registro->getCodemp());
        $npasiconemp->setCodcon(str_replace("'", "", $x[$j]['codcon']));
        $npasiconemp->setCodcar($registro->getCodcar());
        $npasiconemp->setNomemp($registro->getNomemp());
        $npasiconemp->setNomcon(str_replace("'", "", $x[$j]['nomcon']));
        $npasiconemp->setNomcar($registro->getNomcar());
        $npasiconemp->setCantidad(str_replace("'", "", $x[$j]['cantidad']));
        $npasiconemp->setMonto(str_replace("'", "", $x[$j]['monto']));
        $npasiconemp->setFecini(str_replace("'", "", $x[$j]['fecini']));
        $npasiconemp->setFecexp(str_replace("'", "", $x[$j]['fecexp']));
        $npasiconemp->setFrecon(str_replace("'", "", $x[$j]['frecon']));
        $npasiconemp->setAsided($asi_ded);
        $npasiconemp->setAcucon($act_con);
        $npasiconemp->setCalcon("S");
        $npasiconemp->setActivo(str_replace("'", "", $x[$j]['activo']));
        $npasiconemp->setAcumulado(str_replace("'", "", $x[$j]['acumulado']));

        $npasiconemp->save();

      } //if
      $j++;
    } //while

    return -1;
  }

  public static function eliminarNomasicarconnom($emp, $car, $nom, $fec,$explab=true) {
    $sql = "select monto as monto from npasiconemp where codemp='" . $emp . "' and codcar='" . $car . "'
    and codcon  in (select codcon from npconsueldo where codnom='" . $nom . "');";
    if (Herramientas :: BuscarDatos($sql, & $resul)) {
      $sueobt = $resul[0]["monto"];
    } else {
      $sueobt = 0;
    }

    $sql1 = "select monto as monto from npasiconemp where codemp='" . $emp . "' and codcar='" . $car . "'
    and codcon  in (select codcon from npconcomp where codnom='" . $nom . "');";
    if (Herramientas :: BuscarDatos($sql1, & $resul)) {
      $compensacion = $resul[0]["monto"];
    } else {
      $compensacion = 0;
    }

    $c = new Criteria();
    $c->add(NpasiconempPeer :: CODEMP, $emp);
    $c->add(NpasiconempPeer :: CODCAR, $car);
    NpasiconempPeer :: doDelete($c);

	if($explab=='si')
    	self :: grabarExperienciaLaboral($emp, $car, $nom, $fec, $sueobt, $compensacion);

    $c = new Criteria();
    $c->add(NpasicarempPeer :: CODEMP, $emp);
    $c->add(NpasicarempPeer :: CODCAR, $car);
    $c->add(NpasicarempPeer :: CODNOM, $nom);
    $result = NpasicarempPeer :: doSelectOne($c);
    if ($result) {
      if($explab=='si')
	  {
	  	  $nphisasicaremp = new Nphisasicaremp();
	      $nphisasicaremp->setCodemp($result->getCodemp());
	      $nphisasicaremp->setCodcar($result->getCodcar());
	      $nphisasicaremp->setCodnom($result->getCodnom());
	      $nphisasicaremp->setCodcat($result->getCodcat());
	      $nphisasicaremp->setFecasi($result->getFecasi());
	      $nphisasicaremp->setNomemp($result->getNomemp());
	      $nphisasicaremp->setNomcar($result->getNomcar());
	      $nphisasicaremp->setNomnom($result->getNomnom());
	      $nphisasicaremp->setNomcat($result->getNomcat());
	      $nphisasicaremp->setUnieje(null);
	      $nphisasicaremp->setSueldo($result->getSueldo());
	      $nphisasicaremp->setStatus($result->getStatus());
	      if ($result->getMontonomina() != "") {
	        $nphisasicaremp->setMontonomina($result->getMontonomina());
	      } else {
	        $nphisasicaremp->setMontonomina(0);
	      }
	      $nphisasicaremp->save();
	  }
    }
    $result->delete();
  }

  public static function grabarExperienciaLaboral($emp, $car, $nom, $fec, $sueobt, $compensacion) {
    $dateFormat = new sfDateFormat('es_VE');
    $fec1 = $dateFormat->format($fec, 'i', $dateFormat->getInputPattern('d'));
    $nombre = Herramientas :: getX('CODEMP', 'Nphojint', 'Nomemp', $emp);
    $nombre2 = Herramientas :: getX('CODCAR', 'Npcargos', 'Nomcar', $car);
    $npexplab = new Npexplab();
    $npexplab->setCodemp($emp);
    $npexplab->setNomemp($nombre);
    $npexplab->setCodcar($car);
    $npexplab->setDescar($nombre2);
    $npexplab->setFecini($fec1);
    $npexplab->setFecter(date('Y-m-d'));
    $npexplab->setSueobt($sueobt);
    $npexplab->setCompobt($compensacion);
    $npexplab->setStacar("D");
    $npexplab->save();
  }

  /*****************************************************************************/

  //////////////////Registro de Cargos////////////////

  public static function salvarNomdefespcar($cargos, $ids, $grid) {
    $cargos->save();
    $c = new Criteria();
    $c->add(NpasiconempPeer :: CODCAR, $cargos->getCodcar());
    $resul = NpasiconempPeer :: doSelect($c);
    if ($resul) {
      foreach ($resul as $datos) {
        $datos->setNomcar($cargos->getNomcar());
        $datos->save();
      }
    }

    $c = new Criteria();
    $c->add(NpasicarempPeer :: CODCAR, $cargos->getCodcar());
    $resul = NpasicarempPeer :: doSelect($c);
    if ($resul) {
      foreach ($resul as $datos) {
        $datos->setNomcar($cargos->getNomcar());
        $datos->save();
      }
    }
    self :: grabarProfesion($cargos, $ids);
    self :: grabarPerfil($cargos, $grid);
  }
  public static function grabarProfesion($cargos, $ids) {
    $c = new Criteria();
    $c->add(NpprocarPeer :: CODCAR, $cargos->getCodcar());
    NpprocarPeer :: doDelete($c);

    if (is_array($ids)) {
      foreach ($ids as $id) {
        $Npprocar = new Npprocar();
        $Npprocar->setCodcar($cargos->getCodcar());
        $c = new criteria();
        $c->add(NpprofesionPeer :: ID, $id);
        $objprofe = NpprofesionPeer :: doSelectOne($c);
        $Npprocar->setCodprofes($objprofe->getCodprofes());
        $Npprocar->save();
      }
    }
  }

  public static function grabarPerfil($cargos, $grid) {
    $cargo = $cargos->getCodcar();
    $c = $grid[0];
    $l = 0;
    while ($l < count($c)) {
      if ($c[$l]->getCodperfil() != "") {
        $c[$l]->setCodcar($cargo);
        $c[$l]->save();
      }
      $l++;
    }
    $d = $grid[1];
    $l = 0;
    if (!empty ($d[$l])) {
      while ($l < count($d)) {
        $d[$l]->delete();
        $l++;
      }
    }
  }

  /*********************/
  // miki
  public static function salvarAsignarconceptosnomina($codigo, $gridsi, $gridno) {
    $grid1 = $gridsi[0];
    $grid2 = $gridno[0];

    $c = new Criteria();
    $c->add(NpasiconnomPeer :: CODNOM, $codigo);
    NpasiconnomPeer :: doDelete($c);

    foreach ($grid1 as $g) {
      $npasiconnom = new Npasiconnom();
      if ($g["check"] == '1') {
        $npasiconnom->setCodnom($codigo);
        $npasiconnom->setCodcon(str_replace("'", '', $g["codcon"]));
        $npasiconnom->setFrecon(str_replace("'", '', $g["frecon"]));
        $npasiconnom->setActivo(str_replace("'", '', substr($g["conact"], 0, 1)));
        $npasiconnom->save();

		$c = new Criteria();
		$c->add(NpasiconempPeer::CODCON,$g["codcon"]);
		$npasiconemp = NpasiconempPeer::doSelect($c);
		if($npasiconemp)
		{
			foreach($npasiconemp as $clase)
			{
				$clase->setFrecon($g["frecon"]);
				$clase->save();
			}
		}

      }
    }

    foreach ($grid2 as $g) {
      $npasiconnom = new Npasiconnom();
      if ($g["check"] == '1') {
        $npasiconnom->setCodnom($codigo);
        $npasiconnom->setCodcon(str_replace("'", '', $g["codcon"]));
        $npasiconnom->setFrecon(str_replace("'", '', $g["frecon"]));
        $npasiconnom->setActivo(str_replace("'", '', substr($g["conact"], 0, 1)));

        $npasiconnom->save();
      }
    }
  }

  public static function validarAsignacion($gridsi, $gridno) {
    $grid1 = $gridsi[0];
    $grid2 = $gridno[0];
    foreach ($grid1 as $g) {
      if ($g["check"] == '1') {
        if ($g["frecon"] == "") {
          return 400;
        }
      }
    }

    foreach ($grid2 as $g) {
      if ($g["check"] == '1') {

        if ($g["frecon"] == "") {
          return 401;
        }
      }
    }
    return -1;
  }
  /*********************/

  /*<------------------------------------------------------------------- nomdefespasicartipnomlot--------------------------------------*/
  public static function Grabar_grid_nomdefespasicartipnomlot($npasicarnom, $grid) {
    $x = $grid[0];
    $j = 0;
    while ($j < count($x)) {
      $x[$j]->setCodnom($npasicarnom->getCodnom());
      $x[$j]->save();
      $j++;
    }
    $z = $grid[1];
    $j = 0;
    if (!empty ($z[$j])) {
      while ($j < count($z)) {
        $z[$j]->delete();
        $j++;
      }

    }
  }

  /*<------------------------------------------------------------------- npcomocp--------------------------------------*/
  public static function Grabar_grid_nocomocp($npcomocp, $grid_detalle) {
    $grid = $grid_detalle[0];
    $result = array ();
    $sql = "Select Distinct(gracar) as gracar from NPComOcp where CodTipCar='" . $npcomocp->getCodtipcar() . "' and Fecdes=TO_DATE('" . $npcomocp->getFecdes() . "','DD/MM/YYYY')";
    if (Herramientas :: BuscarDatos($sql, & $result)) {
      $gracar = $result[0]['gracar'];
    }
    //H::PrintR($grid); exit;
    if (count($grid) > 0) {
      $c = new Criteria();
      $c->add(NpcomocpPeer :: CODTIPCAR, $npcomocp->getCodtipcar());
      //$c->add(NpcomocpPeer::GRACAR,$gracar);
      $c->add(NpcomocpPeer :: FECDES, $npcomocp->getFecdes());
      $npcomocp_del = NpcomocpPeer :: doDelete($c);

      $i = 0;
      while ($i < count($grid)) {
        if ((trim($grid[$i]['gracar']) != '') && (($grid[$i]['suecar'] != 0.00) || ($grid[$i]['suecar'] != 0))) {
          $npcomocp_new = new Npcomocp();
          $npcomocp_new->setCodtipcar($npcomocp->getCodtipcar());
          $npcomocp_new->setFecdes($npcomocp->getFecdes());
		  $npcomocp_new->setGracar($grid[$i]['gracar']);
		  if($grid[$i]['pascar']=='')
          	$npcomocp_new->setPascar('001');
		  else
		    $npcomocp_new->setPascar($grid[$i]['pascar']);
          if ($grid[$i]['suecar'] > 0) {
            $npcomocp_new->setSuecar($grid[$i]['suecar']);
          } else {
            $npcomocp_new->setSuecar('0');
          }
          $npcomocp_new->save();
        }
        $i++;
      }

    }
  }

  /*<------------------------------------------------------------------- nomdiaext--------------------------------------*/
  public static function Grabar_grid_nomdiaext($npdiaext, $grid_detalle) {
    $c = new Criteria();
    $c->add(NpdiaextPeer :: CODNOM, $npdiaext->getCodnom());
    $c->add(NpdiaextPeer :: FECHA, $npdiaext->getFecha());
    $cadisrgo_del = NpdiaextPeer :: doDelete($c);

    $grid = $grid_detalle[0];
    $i = 0;
    if (count($grid) > 0) {
      while ($i < count($grid)) {
        if (trim($grid[$i]['codemp']) != '') {
          $npdiaext_new = new Npdiaext();
          $npdiaext_new->setCodnom($npdiaext->getCodnom());
          $npdiaext_new->setFecha($npdiaext->getFecha());
          $npdiaext_new->setCodemp($grid[$i]['codemp']);
          $npdiaext_new->save();
        }
        $i++;
      }

    }
  }

  /*<------------------------------------------------------------------- nomfalperlot--------------------------------------*/

  public static function Obtener_Arreglo_Nomfalperlot($codigo, $fecha, & $output) {
    $result = array ();
    $output = array ();
    $grid = array ();
    $sql = "Select codemp,nomcar From NPAsiCarEmp where Rtrim(CodNom)='" . $codigo . "'  AND status='V'  Order by CodEmp";
    if (Herramientas :: BuscarDatos($sql, & $result)) {
      $i = 0;
      while ($i < count($result)) {
        if (str_replace("'", "", $result[$i]['codemp']) != '') {
          $result2 = array ();
          $sql2 = "Select codmot From NpFalPer Where  rtrim(CodEmp)='" . $result[$i]['codemp'] . "' and fecdes=to_date('" . $fecha . "','yyyy-mm-dd')";
          //  exit($sql2);
          if (Herramientas :: BuscarDatos($sql2, & $result2)) {
            $grid['id'] = $i;
            $grid['check'] = '1';
            $grid['codemp'] = $result[$i]['codemp'];
            $grid['nomemp'] = Herramientas :: getX('codemp', 'NpHojInt', 'nomemp', $result[$i]['codemp']);
            $grid['nomcar'] = $result[$i]['nomcar'];
            $grid['codmot'] = $result2[0]['codmot'];
            $grid['desmotfal'] = Herramientas :: getX('CodMotFal', 'NpMotFal', 'DesMotFal', $result2[0]['codmot']);
          } else {
            $grid['id'] = $i;
            $grid['check'] = '0';
            $grid['codemp'] = $result[$i]['codemp'];
            $grid['nomemp'] = Herramientas :: getX('codemp', 'NpHojInt', 'nomemp', $result[$i]['codemp']);
            $grid['nomcar'] = $result[$i]['nomcar'];
            $grid['codmot'] = ' ';
            $grid['desmotfal'] = ' ';
          }
        }
        $output[] = $grid;
        $i++;
      }
    }
  }

  public static function Grabar_grid_nomfalperlot($npfalper, $grid_detalle) {
    $c = new Criteria();
    $c->add(NpfalperPeer :: CODNOM, $npfalper->getCodnom());
    $c->add(NpfalperPeer :: FECDES, $npfalper->getFecdes());
    $npfalper_del = NpfalperPeer :: doDelete($c);

    $grid = $grid_detalle[0];
    $i = 0;
    if (count($grid) > 0) {
      while ($i < count($grid)) {
        if ((trim($grid[$i]['codemp']) != '') or (trim($grid[$i]['codmot']) != '')) {
          if ($grid[$i]['check'] == '1') {
            $nfalper_new = new Npfalper();
            $nfalper_new->setCodnom($npfalper->getCodnom());
            $nfalper_new->setFecdes($npfalper->getFecdes());
            $nfalper_new->setCodemp($grid[$i]['codemp']);
            $nfalper_new->setFechas($npfalper->getFecdes());
            $nfalper_new->setCodmot($grid[$i]['codmot']);
            $nfalper_new->setNrodia('1');
            $nfalper_new->save();
          }
        }
        $i++;
      }
    }
  }

  public static function Grabar_grid_nomdefcodpre($npasicodpre, $grid) {
    $c = new Criteria();
    $c->add(NpasicodprePeer :: CODCON, $npasicodpre->getCodcon());
    NpasicodprePeer :: doDelete($c);
    $x = $grid[0];
    $j = 0;
    while ($j < count($x) && $x[$j]["codpre"] != '') {
      $objNpasicp = new Npasicodpre();
      $objNpasicp->setCodcon($npasicodpre->getCodcon());
      $objNpasicp->setCodnom($x[$j]["codnom"]);
      $objNpasicp->setCodpre($x[$j]["codpre"]);

      $objNpasicp->save();
      $j++;
    }
    $z = $grid[1];
    $j = 0;
    if (!empty ($z[$j])) {
      while ($j < count($z)) {
        $z[$j]->delete();
        $j++;
      }

    }
  }

  /*<------------------------------------------------------------------- Nomdiaextlablot--------------------------------------*/

  public static function Obtener_Arreglo_Nomdiaextlablot($codigo, $fecha, & $output) {
    $result = array ();
    $output = array ();
    $grid = array ();
    $sql = "Select codemp,nomcar From NPAsiCarEmp where Rtrim(CodNom)='" . $codigo . "'   AND status='V' Order by CodEmp";
    if (Herramientas :: BuscarDatos($sql, & $result)) {
      $i = 0;
      while ($i < count($result)) {
        if (str_replace("'", "", $result[$i]['codemp']) != '') {
          $result2 = array ();
          $sql2 = "Select codmot From NpFalPer Where  rtrim(CodEmp)='" . $result[$i]['codemp'] . "' and fecdes=to_date('" . $fecha . "','yyyy-mm-dd')";
          //  exit($sql2);
          if (Herramientas :: BuscarDatos($sql2, & $result2)) {
            $grid['id'] = $i;
            $grid['check'] = '1';
            $grid['codemp'] = $result[$i]['codemp'];
            $grid['nomemp'] = Herramientas :: getX('codemp', 'NpHojInt', 'nomemp', $result[$i]['codemp']);
            $grid['nomcar'] = $result[$i]['nomcar'];
            $grid['codmot'] = $result2[0]['codmot'];
            $grid['desmotfal'] = Herramientas :: getX('CodMotFal', 'NpMotFal', 'DesMotFal', $result2[0]['codmot']);
          } else {
            $grid['id'] = $i;
            $grid['check'] = '0';
            $grid['codemp'] = $result[$i]['codemp'];
            $grid['nomemp'] = Herramientas :: getX('codemp', 'NpHojInt', 'nomemp', $result[$i]['codemp']);
            $grid['nomcar'] = $result[$i]['nomcar'];
            $grid['codmot'] = ' ';
            $grid['desmotfal'] = ' ';
          }
        }
        $output[] = $grid;
        $i++;
      }
    }
  }

  public static function Grabar_grid_nomdiaextlablot($npdiaext, $grid_detalle) {
    $c = new Criteria();
    $c->add(NpdiaextPeer :: CODNOM, $npdiaext->getCodnom());
    $c->add(NpdiaextPeer :: FECHA, $npdiaext->getFecha());
    $cadisrgo_del = NpdiaextPeer :: doDelete($c);

    $grid = $grid_detalle[0];
    $i = 0;
    if (count($grid) > 0) {
      while ($i < count($grid)) {
        if (trim($grid[$i]['codemp']) != '') {
          $npdiaext_new = new Npdiaext();
          $npdiaext_new->setCodnom($npdiaext->getCodnom());
          $npdiaext_new->setFecha($npdiaext->getFecha());
          $npdiaext_new->setCodemp($grid[$i]['codemp']);
          $npdiaext_new->save();
        }
        $i++;
      }

    }
  }

  /*<------------------------------------------------------------------- nomnommovnomcon--------------------------------------*/

  public static function salvarNomnommovnomcon($npasiconemp, $grid_detalle) {

    self :: grabar_grid_nomnommovnomcon($npasiconemp, $grid_detalle);

    return -1;

  }

  public static function grabar_grid_nomnommovnomcon($npasiconemp, $grid_detalle) {

    $grid = $grid_detalle[0];

    $i = 0;
    if (count($grid) > 0) {
      while ($i < count($grid)) {

        $grid[$i]->save();

        $i++;
      }
    }
  }

  public static function salvarNomnommovnomemp($npasiconemp, $grid_detalle) {

    self :: grabar_grid_nomnommovnomemp($npasiconemp, $grid_detalle);

    return -1;

  }

  public static function grabar_grid_nomnommovnomemp($npasiconemp, $grid_detalle) {

    $grid = $grid_detalle[0];
    /*
              print '<pre>';
          print_r($grid);
          print '</pre>';
          exit();
    */
    $i = 0;
    if (count($grid) > 0) {
      while ($i < count($grid)) {
        $c = new Criteria();
        $c->add(NpasiconempPeer :: CODEMP, $grid[$i]['codemp']);
        $c->add(NpasiconempPeer :: CODCON, $grid[$i]['codcon']);
        $c->add(NpasiconempPeer :: CODCAR, $grid[$i]['codcar']);

        $objNpasiconemp = NpasiconempPeer :: doSelectOne($c);

        if ($objNpasiconemp) {
          if ($grid[$i]['status'] == 'M') {
            $objNpasiconemp->setMonto($grid[$i]['valor']);
          } else {
            $objNpasiconemp->setCantidad($grid[$i]['valor']);
          }

          $objNpasiconemp->save();
        }

        $i++;
      }

    }

  }

  public static function validarNomcalcon($npcalcon, $grid_detalle, & $tipo) {
    $grid = $grid_detalle[0];
    $i = 0;
    $filas = 0;
    $filas = count($grid);

    if (empty ($grid[0])) {
      return 405;
    }

    if ($filas == 1) {
      if (($grid[0]->getCampo() == "" && $grid[0]->getOperador() == "" && $grid[0]->getValor() == "" && $grid[0]->getConfor() != "" && $grid[0]->getConfor() != "And" && $grid[0]->getConfor() != "Or")) {
        $tipo = "F";
        return -1;
      }
    }
    //else
    //{
    $cuentacondiciones = 0;
    $condicion = true;
    $i = 0;
    while ($i < $filas) {
      if ($grid[$i]->getCampo() == "") {
        return 410;
      } else
        if ($grid[$i]->getOperador() == "") {
          return 411;
        } else
          if ($grid[$i]->getValor() == "") {
            return 402;
          } else
            if ($grid[$i]->getConfor() == "") {
              return 403;
            } else
              if ($grid[$i]->getConfor() != "And" && $grid[$i]->getConfor() != "Or") {
                $cuentacondiciones++;
                $condicion = false;
              } else
                $condicion = true;

      $i++;
    }
    if ($cuentacondiciones == 0 && $condicion)
      return 404;
    else {
      $tipo = "C";
      return -1;
    }
    //}
  }

  public static function salvar_npcalcon($npcalcon, $grid_detalle, $tipo) {

    $concepto = $npcalcon->getCodcon();
    $nomina = $npcalcon->getCodnom();
    $x = $grid_detalle[0];
    $j = 0;
    while ($j < count($x)) {
      if ($x[$j]->getCampo() == '' && $x[$j]->getOperador() == '' && $x[$j]->getValor() == '' && $x[$j]->getConfor() != 'AND' && $x[$j]->getConfor() != 'OR') {
        if ($x[$j]->getConfor() != '') {
          $x[$j]->setCodcon($concepto);
          $x[$j]->setCodnom($nomina);
          $x[$j]->setNumcon(str_pad($j +1, 3, '0', STR_PAD_LEFT));

          //if ($x[$j]->getConfor()=='And' and $x[$j]->getConfor()=='Or')
          //  $x[$j]->setTipcal('C');
          //else
          $x[$j]->setTipcal('F');

          $x[$j]->save();
          $j++;
        }
      } else {
        if ($x[$j]->getCampo() != '') {
          $x[$j]->setCodcon($concepto);
          $x[$j]->setCodnom($nomina);
          $x[$j]->setNumcon(str_pad($j +1, 3, '0', STR_PAD_LEFT));

          //if ($x[$j]->getConfor()=='And' or $x[$j]->getConfor()=='Or')
          $x[$j]->setTipcal('C');
          //else
          //  $x[$j]->setTipcal('F');

          $x[$j]->save();
          $j++;
        }
      }
    }

    $z = $grid_detalle[1];
    $j = 0;
    if (!empty ($z[$j])) {
      while ($j < count($z)) {
        $z[$j]->delete();
        $j++;
      }
    }
  }

  /*
  *   Grid de Nominas Especiales - Definicion
  */

  public static function salvarNpnomesptipos($npnomesptipos, $grid_detalle) {
    $c = new Criteria();
    $c->add(NpnomesptiposPeer :: CODNOMESP, $npnomesptipos->getCodnomesp());
    $objNomesp = NpnomesptiposPeer :: doSelectOne($c);

    if ($objNomesp) {
      self :: grabar_npnomesptipos($npnomesptipos, $objNomesp);
      self :: grabar_grid_nomespdefinicion($npnomesptipos, $grid_detalle);
    } else {
      $objNomesp = new Npnomesptipos();
      $objNomesp->setCodnomesp($npnomesptipos->getCodnomesp());
      self :: grabar_npnomesptipos($npnomesptipos, $objNomesp);
      self :: grabar_grid_nomespdefinicion($npnomesptipos, $grid_detalle);
    }

    return -1;

  }
  public static function grabar_npnomesptipos($npnomesptipos, $objNomesp) {

    $objNomesp->setDesnomesp($npnomesptipos->getDesnomesp());
    $objNomesp->setFecnomdes($npnomesptipos->getFecnomdes());
    $objNomesp->setFecnomhas($npnomesptipos->getFecnomhas());
	if($npnomesptipos->getNomintpre()==1)
		$objNomesp->setNomintpre('S');
	else
		$objNomesp->setNomintpre(null);
    $objNomesp->save();

  }
  public static function grabar_grid_nomespdefinicion($npnomesptipos, $grid_detalle) {
    /*$grid = $grid_detalle[0];
    $i = 0;
    if (count($grid) > 0) {
      $c = new Criteria();
      $c->add(NpnomespnomtipPeer :: CODNOMESP, $npnomesptipos->getCodnomesp());
      $objNpnomespnomtip = NpnomespnomtipPeer :: doDelete($c);

      while (($i < count($grid)) and (!(is_null($grid[$i]['codnom'])))) {
        $c1 = new Criteria();
        $c1->add(NpnominaPeer :: CODNOM, $grid[$i]['codnom']);

        if (NpnominaPeer :: doSelectOne($c1)) {
          $objNpnomespnomtip = new Npnomespnomtip();
          $objNpnomespnomtip->setCodnom($grid[$i]['codnom']);
          $objNpnomespnomtip->setCodnomesp($npnomesptipos->getCodnomesp());
          $objNpnomespnomtip->save();
        }
        $i++;
      }
    }
*/

    $codnomesp = $npnomesptipos->getCodnomesp();
    $x = $grid_detalle[0];
    $j = 0;
    while ($j<count($x))
    {
      $x[$j]->setCodnomesp($codnomesp);
      $x[$j]->save();
      $j++;
    }

     $z=$grid_detalle[1];
     $j=0;

     if (!empty($z[$j]))
     {
       while ($j<count($z))
       {
       $z[$j]->delete();
       $j++;
       }
      }

  }
  public static function validarNomdefespnivorg($nivel) {
    $codniv = $nivel->getCodniv();
    $formato = Herramientas :: ObtenerFormato('npdefgen', 'fororg');
    $posrup1 = Herramientas :: instr($formato, '-', 0, 1);
    $posrup1 = $posrup1 -1;
    if (strlen(trim($codniv)) < $posrup1) {
      return 101;
    }

    Herramientas :: FormarCodigoPadre($codniv, & $nivelcodigo, & $ultimo, $formato);
    if (!(Herramientas :: buscarCodigoPadre('Codniv', 'Npestorg', $ultimo))) {
      if ($nivelcodigo == 0) {
        return 100;
      } else
        return -1;
    } else
      return -1;

  }

  public static function Buscar_CodigoHijo($codniv) {
    $sql = "Select * from Npestorg where codniv Like '" . $codniv . "%'";
    if (Herramientas :: BuscarDatos($sql, & $result)) {
      if (count($result) > 1)
        return true;
      else
        return false;
    } else {
      return false;
    }
  }

  public static function validarNomdefespcar($cargo) {
    $codcar = $cargo->getCodcar();
    $formato = Herramientas :: ObtenerFormato('npdefgen', 'forcar');
    $posrup1 = Herramientas :: instr($formato, '-', 0, 1);
    $posrup1 = $posrup1 -1;
    if (strlen(trim($codcar)) < $posrup1) {
      return 101;
    }

    Herramientas :: FormarCodigoPadre($codcar, & $nivelcodigo, & $ultimo, $formato);
    if (!(Herramientas :: buscarCodigoPadre('Codcar', 'Npcargos', $ultimo))) {
      if ($nivelcodigo == 0) {
        return 100;
      } else
        return -1;
    } else
      return -1;

  }

  public static function Buscar_CodigoHijo2($codcar) {
    $sql = "Select * from Npcargos where codcar Like '" . $codcar . "%'";
    if (Herramientas :: BuscarDatos($sql, & $result)) {
      if (count($result) > 1)
        return true;
      else
        return false;
    } else {
      return false;
    }
  }

  /*
  *   Grid de Nominas Especiales - Conceptos
  */

  public static function salvarNpnomespconnomtip($npnomespnomtip, $grid_detalle) {

    self :: grabar_grid_nomespconceptos($npnomespnomtip, $grid_detalle);

    return -1;

  }

  public static function grabar_grid_nomespconceptos($npnomespnomtip, $grid_detalle) {
    $grid = $grid_detalle[0];
    if (count($grid) > 0) {
      /*
      $c1 = new Criteria();
      $c1->add(NpnomespconnomtipPeer :: CODNOMESP, $npnomespnomtip->getCodnomesp());
      $c1->add(NpnomespconnomtipPeer :: CODNOM, $npnomespnomtip->getCodnom());
      NpnomespconnomtipPeer :: doDelete($c1);*/

        $j=0;
        while ($j<count($grid) and (!(is_null($grid[$j]->getCodcon()))))
        {
          $grid[$j]->setCodnomesp($npnomespnomtip->getCodnomesp());
          $grid[$j]->setCodnom($npnomespnomtip->getCodnom());
          $grid[$j]->save();
          $j++;
        }
        $z=$grid_detalle[1];
        $j=0;
        if (!empty($z[$j]))
        {
          while ($j<count($z))
          {
            $z[$j]->delete();
            $j++;
          }
        }
    }

  }

  /*
  *   Para el Grid de Registro de vacaciones disfrutadas - vachistorico / wilcar
  *   utilizada en la siguiente funcion
  */

  public static function tiempoServicioTotal($codemp, $diassumar, $messumar, $anossumar, & $diastot, & $mesestot, & $anostot, $dentrofuera) {
    $diaspub = 0;
    $mesespub = 0;
    $anospub = 0;

    if ($dentrofuera == 'F') {
      $sql = "SELECT SUM(cuantotiempo(fecini,fecter,'CD','0')) as diaspub, " .
      "SUM(cuantotiempo(fecini,fecter,'CM','0')) as mesespub, " .
      "SUM(cuantotiempo(fecini,fecter,'CY','0')) as anospub " .
      "FROM NPEXPLAB WHERE codemp = '" . $codemp . "' " .
      "AND stacar = 'F' AND tiporg = 'Publico'";
    }
    elseif ($dentrofuera == 'D') {
      $sql = "SELECT SUM(cuantotiempo(fecini,fecter,'CD','0')) as diaspub, " .
      "SUM(cuantotiempo(fecini,fecter,'CM','0')) as mesespub, " .
      "SUM(cuantotiempo(fecini,fecter,'CY','0')) as anospub " .
      "FROM NPEXPLAB WHERE codemp = '" . $codemp . "' " .
      "AND stacar = 'D'";
    }
    elseif ($dentrofuera == 'I') {
      $sql = "SELECT SUM(cuantotiempo(A.fecing,A.fecegr,'CD','0')) as diaspub, " .
      "SUM(cuantotiempo(A.fecing,A.fecegr,'CM','0')) as mesespub, " .
      "SUM(cuantotiempo(A.fecing,A.fecegr,'CY','0')) as anospub " .
      "FROM NPHIINEG A, NPHOJINT B WHERE A.codemp = B.codemp AND A.fecegr<>COALESCE(B.fecret,'2500-12-31') AND A.codemp = '" . $codemp . "'";
    }

    $s = Herramientas :: BuscarDatos($sql, & $arr);

    if (Herramientas :: BuscarDatos($sql, & $arr)) {
      if ($arr[0]["diaspub"])
        $diaspub = $arr[0]["diaspub"];
      else
        $diaspub = 0;
      if ($arr[0]["mesespub"])
        $mesespub = $arr[0]["mesespub"];
      else
        $mesespub = 0;
      if ($arr[0]["anospub"])
        $anospub = $arr[0]["anospub"];
      else
        $anospub = 0;

      if ($diaspub > 30) {
        $mesespub = $mesespub + (int) ($diaspub / 30);
        $diaspub = $diaspub - ((int) ($diaspub / 30) * 30);
      }
      if ($mesespub > 11) {
        $anospub = $anospub + (int) ($mesespub / 12);
        $mesespub = $mesespub - ((int) ($mesespub / 12) * 12);
      }

    }

    $diastot = $diassumar + $diaspub;
    $mesestot = $messumar + $mesespub;
    $anostot = $anossumar + $anospub;

    if ($diastot > 30) {
      $mesestot = $mesestot + (int) ($diastot / 30);
      $diastot = $diastot - ((int) ($diastot / 30) * 30);
    }
    if ($mesestot > 11) {
      $anostot = $anostot + (int) ($mesestot / 12);
      $mesestot = $mesestot - ((int) ($mesestot / 12) * 12);
    }

  }

  /*
  *   Para el Grid de Registro de vacaciones disfrutadas - vachistorico / wilcar
  *
  */

  public static function ArregloVacaciones($codemp, $fechaing, & $arreglo) {

    $arreglo = array ();

    list ($diahoy, $meshoy, $anohoy) = split('[/.-]', date('d/m/Y'));

    if ($fechaing) {
      list ($dia, $mes, $ano) = split('[/.-]', $fechaing);
    } else {
      $ano = null;
    }

    if ($ano) {
      if (strlen($ano) == 4) {
        $anodesde = (int) $ano;
      } else {
        list ($ano, $mes, $dia) = split('[/.-]', $fechaing);
        $anodesde = (int) $ano;
      }
      $anoing = $anodesde;
      $anohasta = $anodesde +1;

	  if($meshoy>=$mes)
	  {
	  	if($meshoy>$mes)
	  	  $anofin = ((int)$anohoy);
		elseif($diahoy>=$dia)
		  $anofin = (int) $anohoy;
		else
		  $anofin = ((int)$anohoy)-1;
	  }
	  else
	  {
		  $anofin = ((int)$anohoy)-1;
	  }

      $i = 0;

      while ($anohasta <= $anofin) {
        $arreglo[$i]["id"] = 9;
        $arreglo[$i]["perini"] = $anodesde;
        $arreglo[$i]["perfin"] = $anohasta;

        $sql = "SELECT A.ANTAPVAC,A.DIAVAC FROM NPBONOCONT A, NPASIEMPCONT B WHERE A.CODTIPCON=B.CODTIPCON AND B.CODEMP='" . $codemp . "' AND '" . $anohasta . "' BETWEEN TO_CHAR(ANOVIG,'YYYY') AND TO_CHAR(ANOVIGHAS,'YYYY')";

        $resp = Herramientas :: BuscarDatos($sql, & $per);

        $antiguedadAP = '';
        if ($per){
          $antiguedadAP = $per[0]["antapvac"];
          $arreglo[$i]["diasbonovac"] = $per[0]['diavac'];
        }else{
        	$arreglo[$i]["diasbonovac"] = '0';
        }

        self :: tiempoServicioTotal($codemp, 0, 0, 0, & $Idia, & $Imes, & $Iano, 'I');

        $antiguedad = ($anohasta - $anoing) + $Iano;

        if ($antiguedadAP == 'S') {
          self :: tiempoServicioTotal($codemp, 0, 0, 0, & $Idia, & $Imes, & $Iano, 'F');
          $antiguedad = $antiguedad + $Iano;
        }

        $c1 = new Criteria();
        $c1->add(NpasicarempPeer :: CODEMP, $codemp);
        $c1->addJoin(NpasicarempPeer :: CODEMP, NpasiempcontPeer :: CODEMP);
        $c1->addJoin(NpasicarempPeer :: CODNOM, NpasiempcontPeer :: CODNOM);
        $c1->add(NpasicarempPeer :: STATUS, 'V');
        $objNpasicaremp = NpasicarempPeer :: doSelectOne($c1);

        if ($objNpasicaremp) {
          $nomina = $objNpasicaremp->getCodnom();
        } else {
          $c2 = new Criteria();
          $c2->add(NphisconPeer :: CODEMP, $codemp);
          $c2->addDescendingOrderByColumn(NphisconPeer :: FECNOM);
          $objNphiscon = NphisconPeer :: doSelectOne($c2);

          if ($objNphiscon)
            $nomina = $objNphiscon->getCodnom();
          else
            $nomina = '';
        }

        $sql2 = "Select diadis from NPvacdiadis where CodNom='" . $nomina . "' and Rangohasta >= '$antiguedad'   order by rangodesde";

        $res = Herramientas :: BuscarDatos($sql2, & $arrnom);

        if ($arrnom) {
          if ($arrnom[0]['diadis'])
            $arreglo[$i]["diasdisfutar"] = $arrnom[0]['diadis'];
          else
            $arreglo[$i]["diasdisfutar"] = 0;
        } else {
          $arreglo[$i]["diasdisfutar"] = 0;
        }

        $arreglo[$i]["diasdisfrutados"] = 0;

        $arreglo[$i]["diaspdisfrutar"] = $arreglo[$i]["diasdisfutar"] - $arreglo[$i]["diasdisfrutados"];

        $arreglo[$i]["diasbonovacpag"] = 0;

        $c = new Criteria();
        $c->add(NpvacdisfrutePeer :: PERINI, $anodesde);
        $c->add(NpvacdisfrutePeer :: CODEMP, $codemp);
        $objNpvacdisfrute = NpvacdisfrutePeer :: doSelectOne($c);

        if ($objNpvacdisfrute) {
          $arreglo[$i]["diasdisfutar"] = $objNpvacdisfrute->getDiasdisfutar();
          $arreglo[$i]["diasdisfrutados"] = $objNpvacdisfrute->getDiasdisfrutados();
          $pordisfrutar = $arreglo[$i]["diasdisfutar"] - $arreglo[$i]["diasdisfrutados"];
          $arreglo[$i]["diaspdisfrutar"] = $pordisfrutar;
		  $objNpvacdisfrute->getDiasbonovacpag()=='' ? $diapag=0 : $diapag=$objNpvacdisfrute->getDiasbonovacpag();
		  $arreglo[$i]["diasbonovacpag"] = $diapag;
        }

        $anodesde = $anodesde +1;
        $anohasta = $anohasta +1;
        $i = $i +1;
      }
    }

  }

  /*
  *   Tipos de Contratos Colectivos
  */
  public static function salvar_presnomtipcon($nptipcon, $arreglo_arreglo, & $coderror) {
    $grid_alicuota_arreglos = $arreglo_arreglo[0][0];
    $grid_nomina = $arreglo_arreglo[1][0];
	$grid_intereses = $arreglo_arreglo[2];
	$grid_antiguedad = $arreglo_arreglo[3];
    $alic = $arreglo_arreglo[4];
    $a146 = $arreglo_arreglo[5];
	$fid = $arreglo_arreglo[6];

    $c = new Criteria();
    if ($nptipcon->getCodtipcon() != '') {
      if ($alic == 'S')
        $nptipcon->setAlicuocon(1);
      else
        $nptipcon->setAlicuocon(0);

      if ($a146 == 'S')
        $nptipcon->setArt146(1);
      else
        $nptipcon->setArt146(0);

	  if ($fid == 'S')
        $nptipcon->setFid(1);
      else
        $nptipcon->setFid(0);

      if (count($grid_nomina) > 0) {
        $sql1 = "delete from Npasinomcont where codtipcon='" . $nptipcon->getCodtipcon() . "'";
        Herramientas :: insertarRegistros($sql1);
        $i = 0;
        while ($i < count($grid_nomina)) {
          $sql = "Insert into Npasinomcont values ('" . $nptipcon->getCodtipcon() . "','" . $grid_nomina[$i]['codnom'] . "')";
          Herramientas :: insertarRegistros($sql);
          $i++;
        }

      }
      if (count($grid_alicuota_arreglos) > 0) {
        $sql1 = "delete from Npbonocont where codtipcon='" . $nptipcon->getCodtipcon() . "'";
        Herramientas :: insertarRegistros($sql1);
        $i = 0;
        //H::PrintR($grid_alicuota_arreglos);exit;
        while ($i < count($grid_alicuota_arreglos)) {
          $npbonocont_new = new Npbonocont();
          $npbonocont_new->setCodtipcon($nptipcon->getCodtipcon());
          $npbonocont_new->setAnovig($grid_alicuota_arreglos[$i]['anovig']);
          $npbonocont_new->setAnovighas($grid_alicuota_arreglos[$i]['anovighas']);
          $npbonocont_new->setDesde($grid_alicuota_arreglos[$i]['desde']);
          $npbonocont_new->setHasta($grid_alicuota_arreglos[$i]['hasta']);
          $npbonocont_new->setDiauti($grid_alicuota_arreglos[$i]['diauti']);
          $npbonocont_new->setDiavac($grid_alicuota_arreglos[$i]['diavac']);
		  $npbonocont_new->setDiapro($grid_alicuota_arreglos[$i]['diapro']);
          if (strtoupper($grid_alicuota_arreglos[$i]['calinc']) == 'S')
            $npbonocont_new->setCalinc('S');
          else
            $npbonocont_new->setCalinc('N');
          if (strtoupper($grid_alicuota_arreglos[$i]['antap']) == 'S')
            $npbonocont_new->setAntap('S');
          else
            $npbonocont_new->setAntap('N');
          if (strtoupper($grid_alicuota_arreglos[$i]['antapvac']) == 'S')
            $npbonocont_new->setAntapvac('S');
          else
            $npbonocont_new->setAntapvac('N');

          $npbonocont_new->save();
          $i++;
        }
      }
	    #GRID Intereses
	    $x = $grid_intereses[0];
	    $j = 0;
	    while ($j < count($x)) {
	      $x[$j]->setCodcon($nptipcon->getCodtipcon());
	      $x[$j]->save();
	      $j++;
	    }
		$z = $grid_intereses[1];
		$j = 0;
		if (!empty ($z[$j])) {
		  while ($j < count($z)) {
		    $z[$j]->delete();
		    $j++;
		  }
		}
	    #GRID ANTIGUEDAD
	    $x = $grid_antiguedad[0];
	    $j = 0;
	    while ($j < count($x)) {
	      $x[$j]->setCodcon($nptipcon->getCodtipcon());
	      $x[$j]->save();
	      $j++;
	    }
		$z = $grid_antiguedad[1];
		$j = 0;
		if (!empty ($z[$j])) {
		  while ($j < count($z)) {
		    $z[$j]->delete();
		    $j++;
		  }
		}
      $nptipcon->save();
    }
    return true;

  }

  public static function salvarNomdefconaho($ahorro, $grid, $deduccion, $aporte, $ajudeduccion, $ajuaporte) {
    $c = new Criteria();
    $c->add(NpconahoPeer :: CODNOM, $ahorro->getCodnom());
    NpconahoPeer :: doDelete($c);

    if ($deduccion != '') {
      $npconaho = new Npconaho();
      $npconaho->setCodnom($ahorro->getCodnom());
      $npconaho->setCodcon($deduccion);
      $npconaho->setTipcon('D');
      $npconaho->setTipnom($ahorro->getTipnom());
      $npconaho->save();
    }

    if ($aporte != '') {
      $npconaho1 = new Npconaho();
      $npconaho1->setCodnom($ahorro->getCodnom());
      $npconaho1->setCodcon($aporte);
      $npconaho1->setTipcon('A');
      $npconaho1->setTipnom($ahorro->getTipnom());
      $npconaho1->save();
    }

    if ($ajudeduccion != '') {
      $npconaho2 = new Npconaho();
      $npconaho2->setCodnom($ahorro->getCodnom());
      $npconaho2->setCodcon($ajudeduccion);
      $npconaho2->setTipcon('J');
      $npconaho2->setTipnom($ahorro->getTipnom());
      $npconaho2->save();
    }

    if ($ajuaporte != '') {
      $npconaho3 = new Npconaho();
      $npconaho3->setCodnom($ahorro->getCodnom());
      $npconaho3->setCodcon($ajuaporte);
      $npconaho3->setTipcon('U');
      $npconaho3->setTipnom($ahorro->getTipnom());
      $npconaho3->save();
    }

    $x = $grid[0];
    $j = 0;
    while ($j < count($x)) {
      if ($x[$j]['check'] == '1' && ($x[$j]['codcon'] != $deduccion && $x[$j]['codcon'] != $aporte && $x[$j]['codcon'] != $ajudeduccion && $x[$j]['codcon'] != $ajuaporte)) {
        $npconaho4 = new Npconaho();
        $npconaho4->setCodnom($ahorro->getCodnom());
        $npconaho4->setCodcon($x[$j]['codcon']);
        $npconaho4->setTipnom($ahorro->getTipnom());
        $npconaho4->setTipcon('S');
        $npconaho4->save();
      }
      $j++;
    }
  }

  public static function salvarNomnomasiconnom($npasiconemp, $grid) {
    $concepto = $npasiconemp->getCodcon();

    $x = $grid[0];
    $j = 0;
    while ($j < count($x)) {
      $c = new Criteria();
      $c->add(NpasiconempPeer :: CODEMP, $x[$j]['codemp']);
      $c->add(NpasiconempPeer :: CODCON, $npasiconemp->getCodcon());
      $c->add(NpasiconempPeer :: CODCAR, $x[$j]['codcar']);
      NpasiconempPeer :: doDelete($c);
      if ($x[$j]['check'] == '1') {
        $npasiconemp = new Npasiconemp();
        $npasiconemp->setCodemp($x[$j]['codemp']);
        $npasiconemp->setCodcon($concepto);
        $npasiconemp->setCodcar($x[$j]['codcar']);
        $npasiconemp->setNomemp($x[$j]['nomemp']);
        $npasiconemp->setNomcon($npasiconemp->getNomcon());
        $npasiconemp->setNomcar($x[$j]['nomcar']);
        $npasiconemp->setCantidad($x[$j]['cantidad']);
        $npasiconemp->setMonto($x[$j]['monto']);
        $npasiconemp->setFecini($x[$j]['fecini']);
        $npasiconemp->setFecexp($x[$j]['fecexp']);
        $npasiconemp->setFrecon($x[$j]['frecon']);
        $npasiconemp->setAsided($x[$j]['asided']);
        $npasiconemp->setAcucon($x[$j]['acucon']);
        $npasiconemp->setCalcon($x[$j]['calcon']);
        $npasiconemp->setActivo($x[$j]['activo']);
        $npasiconemp->setAcumulado($x[$j]['acumulado']);
        $npasiconemp->save();
      } /*else{
              $c= new Criteria();
              $c->add(NpasiconempPeer::CODEMP,$x[$j]['codemp']);
              $c->add(NpasiconempPeer::CODCON,$npasiconemp->getCodcon());
              $c->add(NpasiconempPeer::CODCAR,$npasiconemp->getCodcar());
              NpasiconempPeer::doDelete($c);
            }*/
      $j++;
    }
  }

  public static function obtenerAno($fecha, & $dia, & $mes, & $ano) {

    if ($fecha) {
      $dia = substr($fecha, 0, 2);
      $mes = substr($fecha, 3, 2);
      ;
      $ano = substr($fecha, 6, 4);
    } else {
      $ano = null;
      $mes = null;
      $dia = null;
    }

  }

  public static function cargar_empleados_periodo($perini, $nomina) {

    if (!$perini)
      $perini = date('Y') - 1;

    if ($nomina == '0')
      $sqlnom = "";
    else
      $sqlnom = "and a.codnom='$nomina'";
    //and TO_NUMBER(TO_CHAR(b.fecing,'YYYY'),'9999') >= ".$perini."'
	if($perini == (date('Y') - 1))
	{
		$sql = "Select  distinct a.codnom, a.codemp, b.nomemp, a.id, TO_CHAR(b.fecing,'YYYY')
          from Npasicaremp a,Nphojint b, npasiempcont c
          where  TO_NUMBER(TO_CHAR(b.fecing,'YYYY'),'9999')<='$perini' and
		  (case when (to_char(date(now()),'mm')>to_char(fecing,'mm')) then 'SI'
			when (to_char(date(now()),'mm')=to_char(fecing,'mm')) then (case when (to_char(date(now()),'dd')>=to_char(fecing,'mm')) then 'SI' else 'NO' end)
			else 'NO' end )='SI' and
		  a.codemp=c.codemp and a.codnom=c.codnom and a.codemp=b.codemp and a.status='V' $sqlnom order by a.codemp";
	}
	else{
		$sql = "Select  distinct a.codnom, a.codemp, b.nomemp, a.id, TO_CHAR(b.fecing,'YYYY')
          from Npasicaremp a,Nphojint b, npasiempcont c
          where  TO_NUMBER(TO_CHAR(b.fecing,'YYYY'),'9999')<='$perini' and  a.codemp=c.codemp and a.codnom=c.codnom and a.codemp=b.codemp and a.status='V' $sqlnom order by a.codemp";
	}


    $arremp = array ();
    Herramientas :: BuscarDatos($sql, & $arremp1);

    $perfin = $perini +1;

    $i = 0;
    foreach ($arremp1 as $a) {

      $arremp[$i]['id'] = 9;
      $arremp[$i]['codemp'] = $a['codemp'];
      $arremp[$i]['nomemp'] = $a['nomemp'];

      if ($a['codnom'])
        $nomina = $a['codnom'];
      else {
        $c2 = new Criteria();
        $c2->add(NphisconPeer :: CODEMP, $a['codemp']);
        $c2->addDescendingOrderByColumn(NphisconPeer :: FECNOM);
        $objNphiscon = NphisconPeer :: doSelectOne($c2);

        if ($objNphiscon)
          $nomina = $objNphiscon->getCodnom();
        else
          $nomina = '';
      }

      $sql2 = "select * from  NPVacDisfrute where CodEmp='" . $a['codemp'] .
      "' and PerIni='" . $perini .
      "' and PerFin='" . $perfin . "'";

      Herramientas :: BuscarDatos($sql2, & $arremp2);

      if ($arremp2) {
        $arremp[$i]["diasdisfutar"] = $arremp2[0]['diasdisfutar'];
        $arremp[$i]["diasdisfrutados"] = $arremp2[0]['diasdisfrutados'];
      } else {
        $sql3 = "select FecIng from  nphojint where CodEmp='" . $a['codemp'] . "'";
        Herramientas :: BuscarDatos($sql3, & $arremp3);

        if ($arremp3) {
          $fechaingr = $arremp3[0]['fecing'];
          $anodesde = Herramientas :: obtenerDiaMesOAno($fechaingr, 'Y-m-d', 'Y');
          //self::obtenerAno($fechaingr,&$dia,&$mes,&$anodesde);

          $antiguedad = $perini - $anodesde;

        } else {
          $antiguedad = 0;
        }

        $sql4 = "Select diadis from NPvacdiadis where Rangohasta>= " . $antiguedad .
        " and codnom = '" . $nomina . "'  order by rangodesde";

        Herramientas :: BuscarDatos($sql4, & $arremp4);

        if ($arremp4) {
          $arremp[$i]["diasdisfutar"] = $arremp4[0]['diadis'];
          $arremp[$i]["diasdisfrutados"] = 0;
        } else {
          $arremp[$i]["diasdisfutar"] = 0;
          $arremp[$i]["diasdisfrutados"] = 0;
        }

      }
      $arremp[$i]["diaspdisfrutar"] = $arremp[$i]["diasdisfutar"] - $arremp[$i]["diasdisfrutados"];
      $arremp[$i]["diasdisfutar"] = Herramientas :: ToFloat($arremp[$i]["diasdisfutar"]);
      $arremp[$i]["diasdisfrutados"] = Herramientas :: ToFloat($arremp[$i]["diasdisfrutados"]);
      $arremp[$i]["diaspdisfrutar"] = Herramientas :: ToFloat($arremp[$i]["diaspdisfrutar"]);
      $i++;

    }
    return $arremp;

  }

  public static function salvarNpvacdisfrute($npvacdisfrute, $grid_detalle, $nomina) {
    $grid = $grid_detalle[0];

    $i = 0;
    if (count($grid) > 0) {
      $sql = "delete from npvacdisfrute
               where  codemp  in (select codemp from npasicaremp where codnom='$nomina' and status='V')";
      //print $sql;exit;
      Herramientas :: insertarRegistros($sql);

      /*$c= new Criteria();
      $c->addjoin(NpvacdisfrutePeer::CODEMP,NpasicarempPeer::CODEMP,Criteria::EQUAL);
      $c->add(NpasicarempPeer::CODNOM,$nomina);
      $c->add(NpvacdisfrutePeer::PERINI,$npvacdisfrute->getPerini());
      NpvacdisfrutePeer::doDelete($c);*/

      while (($i < count($grid)) and (!(is_null($grid[$i]['codemp'])))) {
        $objNpvacdisfrute = new Npvacdisfrute();

        $objNpvacdisfrute->setCodemp($grid[$i]['codemp']);
        $objNpvacdisfrute->setPerini($npvacdisfrute->getPerini());
        $objNpvacdisfrute->setPerfin(($npvacdisfrute->getPerini() + 1));
        $objNpvacdisfrute->setDiasdisfutar($grid[$i]['diasdisfutar']);
        $objNpvacdisfrute->setDiasdisfrutados($grid[$i]['diasdisfrutados']);
        $objNpvacdisfrute->save();

        $i++;
      }

    }

  }

  public static function salvarNphojint($nphojint, $grid_detalle) {
    $grid = $grid_detalle[0];

    $c1 = new Criteria();
    $c1->add(NphojintPeer :: CODEMP, $nphojint->getCodemp());
    $objHojint = NphojintPeer :: doSelectOne($c1);

    $i = 0;

    if ((count($grid) > 0) and ($objHojint)) {
      $c = new Criteria();
      $c->add(NpvacdisfrutePeer :: CODEMP, $nphojint->getCodemp());
      NpvacdisfrutePeer :: doDelete($c);

      while (($i < count($grid)) and (!(is_null($grid[$i]['perini'])))) {
        $objNpvacdisfrute = new Npvacdisfrute();

        $objNpvacdisfrute->setCodemp($nphojint->getCodemp());
        $objNpvacdisfrute->setPerini($grid[$i]['perini']);
        $objNpvacdisfrute->setPerfin($grid[$i]['perfin']);
        $objNpvacdisfrute->setDiasdisfutar($grid[$i]['diasdisfutar']);
        $objNpvacdisfrute->setDiasdisfrutados($grid[$i]['diasdisfrutados']);
		$objNpvacdisfrute->setDiasbonovac($grid[$i]['diasbonovac']);
        $objNpvacdisfrute->setDiasbonovacpag($grid[$i]['diasbonovacpag']);
        $objNpvacdisfrute->save();

        $i++;
      }

    }

  }

  // Inicio VacSalidas

  public static function cargarDatosNpvacsalidas($codemp, $fechaing, & $arreglo, & $diaslaborales, & $fecvac, & $diaspend, $fechadesde,$tipo='') {

    //$sql1 = "Select CodEmp,NomEmp,FecIng from npHOJINT where CodEmp='" .$codemp. "'";
    if(empty($fechadesde))
      $fechadesde=date('d-m-Y');

    $sql1 = "Select CodEmp,NomEmp,FecIng from npHOJINT where CodEmp='" . $codemp . "'";

    $diaslaborables = array ();
    Herramientas :: BuscarDatos($sql1, & $arr1);

    /*
          print '<pre>';
        print_r($arr1);
        print '</pre>';
        exit();
      */

    $arreglo = array ();
    if ($arr1) {
      $nomemp = $arr1[0]['nomemp'];
      $fecing = $arr1[0]['fecing'];

      $sql2 = "Select " .
      "(CASE a.lunes WHEN 'S' THEN '2' ELSE a.lunes END) as LUNES, " .
      "(CASE a.martes WHEN 'S' THEN '3' ELSE a.martes END) as MARTES, " .
      "(CASE a.miercoles WHEN 'S' THEN '4' ELSE a.miercoles END) as MIERCOLES, " .
      "(CASE a.jueves WHEN 'S' THEN '5' ELSE a.jueves END) as JUEVES, " .
      "(CASE a.viernes WHEN 'S' THEN '6' ELSE a.viernes END) as VIERNES, " .
      "(CASE a.sabado WHEN 'S' THEN '7' ELSE a.sabado END) as SABADO, " .
      "(CASE a.domingo WHEN 'S' THEN '1' ELSE a.domingo END) as DOMINGO " .
      "From NPVACJORLAB A,NPASICAREMP B " .
      "Where B.CodEmp = '" . $codemp . "' " .
      "AND A.CODNOM=B.CODNOM " .
      "AND B.STATUS='V'";

      Herramientas :: BuscarDatos($sql2, & $arr2);

	  if($tipo!='C')
	  {
	      if ($arr2) {

	        if ($arr2[0]['lunes'] == "2")
	          $diaslaborales[0] = "S";
	        else
	          $diaslaborales[0] = "N";

	        if ($arr2[0]['martes'] == "3")
	          $diaslaborales[1] = "S";
	        else
	          $diaslaborales[1] = "N";

	        if ($arr2[0]['miercoles'] == "4")
	          $diaslaborales[2] = "S";
	        else
	          $diaslaborales[2] = "N";

	        if ($arr2[0]['jueves'] == "5")
	          $diaslaborales[3] = "S";
	        else
	          $diaslaborales[3] = "N";

	        if ($arr2[0]['viernes'] == "6")
	          $diaslaborales[4] = "S";
	        else
	          $diaslaborales[4] = "N";

	        if ($arr2[0]['sabado'] == "7")
	          $diaslaborales[5] = "S";
	        else
	          $diaslaborales[5] = "N";

	        if ($arr2[0]['domingo'] == "1")
	          $diaslaborales[6] = "S";
	        else
	          $diaslaborales[6] = "N";

	      }
	  }else
	  {
	  	$diaslaborales[0] = "S";
		$diaslaborales[1] = "S";
		$diaslaborales[2] = "S";
		$diaslaborales[3] = "S";
		$diaslaborales[4] = "S";
		$diaslaborales[5] = "S";
		$diaslaborales[6] = "S";
	  }

      $sql3 = "Select max(fecvac) from NPVACSALIDAS WHERE CODEMP='" . $codemp . "'";
      Herramientas :: BuscarDatos($sql3, & $arr3);

      if ($arr3) {
        if (!$arr3[0]['max'])
          $fecvac = date('d/m/Y');

        else
          $fecvac = $arr3[0]['max'];
      } else
        $fecvac = date('d/m/Y');

      Nomina :: cargarArregloNpvacsalidas(& $arreglo, & $diaspend, $fechaing, $codemp,$fechadesde);

    }

  }

  public static function cargarArregloNpvacsalidas(& $arreglo, & $diaspend, $fechaing, $codemp,$fechadesde='') {

    if(empty($fechadesde))
      $fechadesde=date('d-m-Y');

    $diaspend = 0;
    $arreglo = array ();

    $anohoy = date('Y');

    $monto = 0;

    self :: obtenerAno($fechaing, & $dia, & $mes, & $anoing);

    $anodesde = $anoing;
    $anohasta = $anodesde +1;
    //$anohasta = $anodesde;
    $anofin = $anohoy;

    $c1 = new Criteria();
    $c1->add(NpasicarempPeer :: CODEMP, $codemp);
    $c1->addJoin(NpasicarempPeer :: CODEMP, NpasiempcontPeer :: CODEMP);
    $c1->addJoin(NpasicarempPeer :: CODNOM, NpasiempcontPeer :: CODNOM);
    $c1->add(NpasicarempPeer :: STATUS, 'V');
    $objNpasicaremp = NpasicarempPeer :: doSelectOne($c1);

    if ($objNpasicaremp) {
      $nomina = $objNpasicaremp->getCodnom();
    } else {
      $c2 = new Criteria();
      $c2->add(NphisconPeer :: CODEMP, $codemp);
      $c1->addJoin(NphisconPeer :: CODEMP, NpasiempcontPeer :: CODEMP);
      $c1->addJoin(NphisconPeer :: CODNOM, NpasiempcontPeer :: CODNOM);
      $c2->addDescendingOrderByColumn(NphisconPeer :: FECNOM);
      $objNphiscon = NphisconPeer :: doSelectOne($c2);

      if ($objNphiscon)
        $nomina = $objNphiscon->getCodnom();
      else {
        $c3 = new Criteria();
        $c3->add(NpasiempcontPeer :: CODEMP, $codemp);
        $objNpasiempcont = NpasiempcontPeer :: doSelectOne($c3);

        if ($objNpasiempcont) {
          $nomina = $objNpasiempcont->getCodnom();
        } else {
          $nomina = '';
        }
      } //
    }

    /*$sql1 = "Select A.id,
      coalesce(to_number(C.perini,'9999'),0) as Historico,
      A.*, B.Ano,
      '".(int)$anofin."'-B.Ano as Antiguedad,
      coalesce(to_number(C.perini,'9999'),('".(int)$anohasta."'-1)+('".(int)$anofin."'-B.ano)-1) as Desde,
      coalesce(to_number(C.perfin,'9999'),('".(int)$anohasta."'-1)+('".(int)$anofin."'-B.ano)) as Hasta,
      coalesce(C.diasdisfrutados,0) as Disfrutados,
      coalesce(C.diasdisfutar,A.diadis) as CORRESPONDE
      from
          Npvacdisfrute C right join Npanos B on ((B.ano =  C.perfin) and ('".$codemp."' = C.codemp)),
      NPvacdiadis A
      Where (A.codnom='".$nomina."')
      And (B.Ano BETWEEN ('".(int)$anohasta."'-1) and '".(int)$anofin."')
      And (('".(int)$anofin."' - B.ano) BETWEEN A.rangodesde and A.rangohasta)
      order by coalesce(to_number(C.perini,'9999'),('".(int)$anohasta."'-1)+('".(int)$anofin."'-B.ano)), B.ano desc";
    */

    // Se modifico el sql quitandole a $anohasta el (-1)

    $sql1 = "SELECT
              (CASE WHEN (SUM(HIST)=0) THEN 'NO' ELSE 'SI' END) AS HIST,
              SUM(ANTIGUEDAD) AS ANTIGUEDAD,
              DESDE,
              HASTA,
              SUM(DISFRUTADOS) AS DISFRUTADOS,
              (CASE WHEN (SUM(HIST)=0) THEN SUM(CORRESPONDE) ELSE SUM(CORRESPONDEHIS) END) AS CORRESPONDE,
			  jornada
              FROM
              (
                    Select
                0 as HIST,
                " . $anofin . "-B.Ano as Antiguedad,
                ((" . ($anohasta -1) . ")+(" . $anofin . "-B.Ano-1)) as Desde,
                ((" . ($anohasta -1) . ")+(" . $anofin . "-B.Ano)) as Hasta,
                0 as Disfrutados,
                A.DIADIS as CORRESPONDE,
                0 as CORRESPONDEHIS
                from NPvacdiadis A,NPAnos B
                Where
                A.codnom='" . $nomina . "'
                And B.Ano Between " . ($anohasta -1) . " and " . $anofin . "
                And " . $anofin . "-B.ano between A.rangodesde and A.rangohasta

                UNION ALL

                Select
                1 as HIST,
                " . $anofin . "-B.Ano as Antiguedad,
                to_number(C.PERINI,'9999') as Desde,
                to_number(C.PERFIN,'9999') as Hasta,
                C.DIASDISFRUTADOS as Disfrutados,
                0 as CORRESPONDE,
                C.diasdisfutar as CORRESPONDEHIS
                from
                NPvacdiadis A,NPAnos B,Npvacdisfrute C
                Where
                A.codnom='" . $nomina . "'
                And B.Ano Between " . ($anohasta -1) . " and " . $anofin . "
                And " . $anofin . "-B.ano between A.rangodesde and A.rangohasta
                And C.PERINI=B.ANO::varchar
                And C.CODEMP='" . $codemp . "'

              ) as subconsulta
			  , npvacdiadis b
			  where b.codnom='$nomina'
              GROUP BY DESDE,HASTA,JORNADA,rangodesde,rangohasta
			  HAVING sum(antiguedad)>=rangodesde and sum(antiguedad)<=rangohasta
              ORDER BY DESDE";
//echo $sql1; exit();
    Herramientas :: BuscarDatos($sql1, & $arr1);

    /*          print '**************************** <br>';
              print 'Hasta: '.$anohasta.'<br>';
                          print 'Fin '.$anofin.'<br>';
                          print 'Empleado '.$codemp.'<br>';
                          print 'Nomina '.$nomina.'<br>';
                      print '<pre>';
                    print_r($arr1);
                print '</pre>';
                exit;
    */
    $diaing = substr($fechaing, 0, 2);
    $mesing = substr($fechaing, 3, 2);

    //NO DEBE COMPARAR CON LA FECHA DE DE HOY
    //$hoy = date('d-m-Y');
    $hoy = $fechadesde;
    $diah = substr($hoy, 0, 2);
    $mesh = substr($hoy, 3, 2);
    $anoh = substr($hoy, 6, 4);
    $fechah = mktime(0, 0, 0, (int) $mesh, (int) $diah, (int) $anoh);

    $i = 0;
    /*
    print '<pre>';
      print_r($arr1);
      print '</pre>';
      exit();
      */

    //      print 'Fecha de hoy '.$fechah.'<br>';

    if ($arr1) {
      foreach ($arr1 as $a) {
        $ano = $a['hasta'];
        $fecha = mktime(0, 0, 0, (int) $mesing, (int) $diaing, (int) $ano);
        //          print $fecha.'<br>';
        //    if ($a['historico'] <> 0)
        // {

        if ($fecha <= $fechah) {
          //          print 'entro <br>';
          $arreglo[$i]["id"] = 9;
          $arreglo[$i]["perini"] = $a['desde'];
          $arreglo[$i]["perfin"] = $a['hasta'];
		  $arreglo[$i]["jornada"] = $a['jornada'];

          $sql2 = "SELECT A.ANTAPVAC FROM NPBONOCONT A, NPASIEMPCONT B WHERE A.CODTIPCON=B.CODTIPCON AND B.CODEMP='" . $codemp . "' AND TO_CHAR(" . $a['hasta'] . ",'YYYY') BETWEEN TO_CHAR(ANOVIG,'YYYY') AND TO_CHAR(ANOVIGHAS,'YYYY')";
          Herramientas :: BuscarDatos($sql2, & $arr2);

          /*
                        print '<pre>';
                        print_r($arr2);
                        print '</pre>';
                        exit();
          */
          $antiguedadAP = '';
          if ($arr2)
            $antiguedadAP = $arr2[0]["antapvac"];

          $antiguedad = $a['antiguedad']; //+ 1;

          self :: tiempoServicioTotal($codemp, 0, 0, 0, & $Idia, & $Imes, & $Iano, 'I');

          $antiguedadIN = '';

          if ($Iano > 0) {
            $antiguedadIN = 'SI';
          }
          $antiguedad = $antiguedad + $Iano;
          //          print '<br>'.$antiguedadAP.'<br>';

          if ($antiguedadAP == 'S') {
            self :: tiempoServicioTotal($codemp, 0, 0, 0, & $Idia, & $Imes, & $Iano, 'F');

            //             print $Iano;

            //             print $a['hist'];
            if ($a['hist'] == 'NO') {
              $antiguedad = $antiguedad + $Iano;

              $sql3 = "Select diadis from NPvacdiadis where CodNom='" . $nomina . "' and Rangohasta >=  '" . $antiguedad . "'   order by rangodesde";

              Herramientas :: BuscarDatos($sql3, & $arr3);

              if ($arr3)
                $variable = $arr3[0]['diadis'];
              else
                $variable = 0;

            } else
              $variable = $a['corresponde'];

          } else
            $variable = $a['corresponde'];

          $diasdisfrutar = $variable;

          $arreglo[$i]['diasdisfutar'] = $variable;
          $variable = $a['disfrutados'];
          $arreglo[$i]['diasdisfrutados'] = $variable;
          $arreglo[$i]['diasvac'] = 0;
          $variable = $diasdisfrutar - $variable;
          $arreglo[$i]['diaspdisfrutar'] = $variable;

          $arreglo[$i]['diasdisfutar'] = Herramientas :: ToFloat($arreglo[$i]['diasdisfutar']);
          $arreglo[$i]['diasdisfrutados'] = Herramientas :: ToFloat($arreglo[$i]['diasdisfrutados']);
          $arreglo[$i]['diasvac'] = Herramientas :: ToFloat($arreglo[$i]['diasvac']);
          $arreglo[$i]['diaspdisfrutar'] = Herramientas :: ToFloat($arreglo[$i]['diaspdisfrutar']);

          $monto = $monto + $variable;
          $i = $i +1;
          $diaspend = $monto;

        }
        // }
      }
      //        exit;

    }
    //      exit;
    /*        if (!$diaspend)
                $diaspend = 0;*/
    /*
    print '<pre>';
    print_r($arreglo);
    print '</pre>';
    exit();
    */

  }

  public static function cargarDatosNpvacsalidasDiasVac($fechaing, $codemp, & $diasvac, & $arreglo, & $diaspend, $fechadesde, & $fechahasta,$tipo='') {

    //echo $fechadesde.' - '.$diasvac; exit;
    if ($diasvac <> '0') {
      if (!is_numeric($diasvac)) {
        $diasvac = 0;
        Nomina :: cargarArregloNpvacsalidas(& $arreglo, & $diaspend, $fechaing, $codemp, $fechadesde);
      } else {
        if ((double) $diasvac > (double) $diaspend) {
          $diasvac = 0;
          Nomina :: cargarArregloNpvacsalidas(& $arreglo, & $diaspend, $fechaing, $codemp, $fechadesde);
        } else {

          //echo 'Dias vac= '.(double)$diasvac.'<br> Dias pend= '.(double)$diaspend; exit;
          self :: cargarArregloNpvacsalidas(& $arreglo, & $diaspend, $fechaing, $codemp, $fechadesde);

          self :: actualizarArregloNpvacsalidas(& $arreglo, & $diaspend, $diasvac);
        }
        $fechahasta = self :: calcularFechaEntrada((double) $diasvac, $fechadesde, $codemp, $fechaing,$tipo);
      }
    } else {
      $fechahasta = self :: calcularFechaEntrada((double) $diasvac, $fechadesde, $codemp, $fechaing,$tipo);

      if(empty($fechadesde))
        $fechadesde=date('d-m-Y');
      Nomina :: cargarArregloNpvacsalidas(& $arreglo, & $diaspend, $fechaing, $codemp,$fechadesde);

    }

  }

  public static function actualizarArregloNpvacsalidas(& $arreglo, & $diaspend, $diasvac) {
    $saldo = (int) $diasvac;
    $monto = 0;
    $arr = $arreglo;

    $i = 0;
    foreach ($arreglo as $a) {
      $disfutar = $a['diasdisfutar'];
      $disfrutados = $a['diasdisfrutados'];
      $variable = $disfutar - $disfrutados;

      if ($saldo > $variable) {
        $arr[$i]['diasvac'] = $variable;
        $saldo = $saldo - $variable;
      } else {
        $variable = $saldo;
        $arr[$i]['diasvac'] = $variable;
        $saldo = $saldo - $variable;
      }

      $variable = (int) $disfutar - ((int) $disfrutados + (int) $variable);

      $arr[$i]['diaspdisfrutar'] = $variable;
      $monto = $monto + $variable;
      $i++;
    }
    $arreglo = $arr;
    $diaspend = $monto;
  }

  public static function calcularFechaEntrada($diasvac, $fechadesde, $codemp, $fechaing,$tipo='') {
    $diad = substr($fechadesde, 0, 2);
    $mesd = substr($fechadesde, 3, 2);
    $anod = substr($fechadesde, 6, 8);

    $fechad = $anod . '-' . $mesd . '-' . $diad;

    $valor = Herramientas :: dateAdd('d', 1, $fechad, '-');

    if ($diasvac <> 0) {
      $i = 0;
      $jornada = false;
      self :: cargarDatosNpvacsalidas($codemp, $fechaing, & $arreglo, & $diaslaborales, & $fecvac, & $diaspend, $fechadesde,$tipo);
      while ($i <= $diasvac) {
        $valor = Herramientas :: dateAdd('d', 1, $valor, '+');

			if (self :: diaLaboral($valor, $jornada, $diaslaborales)) {
	          $anoing = substr($valor, 0, 4);
	          $mes = substr($valor, 5, 2);
	          $dia = substr($valor, 8, 2);

	          $sql = "Select  * FROM  NPVACDIAFER WHERE DIA='" . (int) $dia . "' AND MES='" . (int) $mes . "'";
	          Herramientas :: BuscarDatos($sql, & $arr);

	          if (!$arr) {
	            $i++;
	            if ($i >= ($diasvac -2))
	              $jornada = true;

	          }
	        }
      }

     // $valor = Herramientas :: dateAdd('d', 1, $valor, '+');
    /*  if (!self :: diaLaboral($valor, $jornada, $diaslaborales))
        $valor = Herramientas :: dateAdd('d', 1, $valor, '+');*/

      while (!self :: diaLaboral($valor, $jornada, $diaslaborales))
      {
        $valor = Herramientas :: dateAdd('d', 1, $valor, '+');
      }// end while

      $fechahasta = $valor;
    } else {
      $fechahasta = $fechad;
      $fechahasta = Herramientas :: dateAdd('d', 1, $fechahasta, '+');
    }

    $anoh = substr($fechahasta, 0, 4);
    $mesh = substr($fechahasta, 5, 2);
    $diah = substr($fechahasta, 8, 2);

    $fechahas = $diah . '/' . $mesh . '/' . $anoh;

    return $fechahas;

  }

  public static function diaLaboral($valor, $jornada, $diasLaborales) {

    $ano = substr($valor, 0, 4);
    $mes = substr($valor, 5, 2);
    $dia = substr($valor, 8, 2);
    $valor2 = mktime(0, 0, 0, (int) $mes, (int) $dia, (int) $ano);

    switch (date('w', $valor2)) {
      case '0' :
        $dia = 6;
        break;
      case '1' :
        $dia = 0;
        break;
      case '2' :
        $dia = 1;
        break;
      case '3' :
        $dia = 2;
        break;
      case '4' :
        $dia = 3;
        break;
      case '5' :
        $dia = 4;
        break;
      case '6' :
        $dia = 5;
        break;
    }

    if ($jornada) {
      if ($diasLaborales[$dia] == 'S')
        $laboral = true;
      else
        $laboral = false;
    } else {
      if ($dia > 4)
        $laboral = false;
      else
        $laboral = true;
    }

    return $laboral;

  }

  public static function cargarDatosNpvacsalidasFecVac($codemp, $fecvac, $fechaing, & $arreglo, & $diasvac, & $observaciones, & $fecdesde, & $fechasta, & $diaspend) {

    if ($codemp <> '') {
      $sql = "Select * from NPVACSALIDAS where CodEmp='" . $codemp . "' AND FECVAC = to_date('" . $fecvac . "','dd/mm/yyyy')";
      Herramientas :: BuscarDatos($sql, & $arr);

      if (!$arr) {
        $diasvac = '0';
        $observaciones = '';
        $fecdesde = $fecvac;
        Nomina :: cargarArregloNpvacsalidas(& $arreglo, & $diaspend, $fechaing, $codemp, $fecdesde);
      } else {
        $observaciones = $arr[0]['observa'];
        $diasvac = $arr[0]['diasdisfrutar'];

        $valor = $arr[0]['fecdes'];
        $ano = substr($valor, 0, 4);
        $mes = substr($valor, 5, 2);
        $dia = substr($valor, 8, 2);
        $valor2 = $dia . '/' . $mes . '/' . $ano;
        $fecdesde = $valor2;
        $fechasta = $arr[0]['fechas'];
        self :: llenarSalida($codemp, $fecvac, $fechaing, & $arreglo, & $diaspend);

        //probar la funcion llenarSalida
      }

    }

  }

  public static function llenarSalida($codemp, $fecvac, $fechaing, & $arreglo, & $diaspend) {
    $diaspend = 0;
    $arreglo = array ();
    if ($fechaing == '')
      return;
    $sql = "Select * from NPvacsalidas_det WHERE CODEMP='" . $codemp . "' AND FECVAC = to_date('" . $fecvac . "','dd/mm/yyyy') Order by PerIni";

    Herramientas :: BuscarDatos($sql, & $arr);
    /*
    print '<pre>';
      print_r($arr);
      print '</pre>';
      exit();
    */

    if ($arr) {
      $i = 0;
      $monto = 0;
      foreach ($arr as $a) {
        $arreglo[$i]['id'] = 1;

        $variable = trim($a['perini']);
        $arreglo[$i]['perini'] = $variable;

        $variable = trim($a['perfin']);
        $arreglo[$i]['perfin'] = $variable;

        $variable = trim($a['diasdisfutar']);
        $diasdisfutar = $variable;
        $arreglo[$i]['diasdisfutar'] = $variable;

        $variable = trim($a['diasdisfrutados']);
        $arreglo[$i]['diasdisfrutados'] = $variable;

        $variable2 = trim($a['diasvac']);
        $arreglo[$i]['diasvac'] = $variable2;

        $variable = $diasdisfutar - ($variable + $variable2);

        $arreglo[$i]['diaspdisfrutar'] = $variable;

        $monto = $monto + $variable;

        $diaspend = $monto;
        $i++;
      }
    }

  }

  // Guarda registros del grid en vacsalidas
  public static function salvarNphistorico_det($npvacsalidas, $grid_detalle) {

    $grid = $grid_detalle[0];

    $c2 = new Criteria();
    $c2->add(NpvacsalidasDetPeer :: CODEMP, $npvacsalidas->getCodemp());
    $c2->add(NpvacsalidasDetPeer :: FECVAC, $npvacsalidas->getFecvac());
    NpvacsalidasDetPeer :: doDelete($c2);

    $i = 0;
    if ((count($grid) > 0)) {

      while (($i < count($grid)) and (!(is_null($grid[$i]['perini'])))) {
        $c4 = new Criteria();
        $c4->add(NpvacdisfrutePeer :: CODEMP, $npvacsalidas->getCodemp());
        $c4->add(NpvacdisfrutePeer :: PERINI, $grid[$i]['perini']);
        $c4->add(NpvacdisfrutePeer :: PERFIN, $grid[$i]['perfin']);
        $objNpvacdisfrute = NpvacdisfrutePeer :: doSelectOne($c4);

        if (!$objNpvacdisfrute) {
          $objNpvacdisfrute = new Npvacdisfrute();

          $objNpvacdisfrute->setCodemp($npvacsalidas->getCodemp());
          $objNpvacdisfrute->setPerini($grid[$i]['perini']);
          $objNpvacdisfrute->setPerfin($grid[$i]['perfin']);

        }

        $objNpvacdisfrute->setDiasdisfutar($grid[$i]['diasdisfutar']);
        $objNpvacdisfrute->setDiasdisfrutados(($grid[$i]['diasdisfrutados']) + ($grid[$i]['diasvac']));
        $objNpvacdisfrute->save();

        if ($grid[$i]['diasvac'] > 0) {
          $objNpvacsalidasDet = new NpvacsalidasDet();

          $objNpvacsalidasDet->setCodemp($npvacsalidas->getCodemp());
          $objNpvacsalidasDet->setPerini($grid[$i]['perini']);
          $objNpvacsalidasDet->setPerfin($grid[$i]['perfin']);
          $objNpvacsalidasDet->setDiasdisfutar($grid[$i]['diasdisfutar']);
          $objNpvacsalidasDet->setDiasdisfrutados($grid[$i]['diasdisfrutados']);
          $objNpvacsalidasDet->setDiasvac($grid[$i]['diasvac']);
          $objNpvacsalidasDet->setFecvac($npvacsalidas->getFecvac());

          $objNpvacsalidasDet->save();
        }

        $i++;
      }
    }

  }

  /*
  *    Valida al guardar en Npvacsalidas
  */
  public static function validarVacsalidas($objeto) {
    $coderr = -1;
    if ($objeto->getFecvac() > $objeto->getFecdes()) {
      $coderr = 439;
    } else {
      $c = new Criteria();
      $c->add(NpvacsalidasPeer :: CODEMP, $objeto->getCodemp());
      $c->add(NpvacsalidasPeer :: FECHAS, $objeto->getFecvac(), Criteria :: GREATER_THAN);
      $rs = NpvacsalidasPeer :: doSelect($c);
      if ($rs)
        $coderr = 440;
      else
        $coderr = self :: validarCodemp($objeto);
      ;
    }
    return $coderr;
  }

  public static function validarCodemp($objeto) {
    $c = new Criteria();
    $c->add(NpliquidacionDetPeer :: CODEMP, $objeto->getCodemp());
    $objNpliquidacionDet = NpliquidacionDetPeer :: doSelectOne($c);

    if ($objNpliquidacionDet)
      return 415;
    else
      return -1;

  }

  // Fin VacSalidas

  // Inicio VacLiquidacion

  public static function cargarDatosVacliquidacionCodemp($codemp, & $ultimosueldo) {

    $ultimosueldo = 0;
    if ($codemp) {
      $valorclave = $codemp;
      $sql1 = "Select b.NomEmp,fecing,c.FecCal,codnom,FECRET from NpHojInt b,npasiempcont c where b.codemp=c.codemp and b.CodEmp='" . $codemp . "'";
      Herramientas :: BuscarDatos($sql1, & $arr1);
      /*
      print '<pre>';
        print_r($arr);
        print '</pre>';
        exit();
      */

      if ($arr1) {
        $nomina = $arr1[0]['codnom'];
        $antiguedad = 0;

        //Devuelve el numero de intervalos de tiempo entre dos fechas determinadas
        //Antiguedad = DateDiff("yyyy", CDate(FecIng.Caption), Date)

        $antiguedad = array (
          'ejemplo 1999-2000'
        );

        $sql2 = "Select Distinct A.CodCar from NPHISCON A,NPASIEMPCONT B  where A.CodEmp='" . $codemp .
        "' AND A.CODEMP=B.CODEMP AND A.CODNOM=B.CODNOM AND A.FECNOM= (SELECT MAX(D.FECNOM) FROM NPHISCON D where D.CodEmp='" . $codemp .
        "')";
        Herramientas :: BuscarDatos($sql2, & $arr2);

        if ($arr2) {
          $sql3 = "Select max(fecdes) as FecDes from npcargos a,npcomocp b where a.codcar='" . $arr2[0]['codcar'] . "' and a.codtip=b.codtipcar";
          Herramientas :: BuscarDatos($sql3, & $arr3);

          if ($arr3) {
            $fechamaxima = $arr3[0]['max'];

            $sql4 = "Select b.SueCar as SueCar from npcargos a,npcomocp b where a.codcar='" . $arr2[0]['codcar'] . "' and a.codtip=b.codtipcar and b.fecdes=to_date('" . $fechamaxima . "','dd/mm/yyyy') and to_number(a.graocp,'999')=to_number(b.gracar,'999')";
            Herramientas :: BuscarDatos($sql4, & $arr4);

            if ($arr4)
              $ultimosueldo = $arr4[0]['suecar'];
            else
              $ultimosueldo = 0.00;
            // Mensaje: "No se pudo determinar el Sueldo del Cargo a traves de la Escala"
          } else
            $ultimosueldo = 0.00;
          // Mensaje: "No se pudo determinar el Sueldo del Cargo a traves de la Escala"

        }
      }
    }
  }

  public static function datosHistoricos($codemp, $fecing, $fecegr, & $arreglo) {

    $arreglo1 = array ();

    if ($fecegr) {
      $anodesde = Herramientas :: obtenerDiaMesOAno($fecing, 'd/m/Y', 'Y') + 1;
      $anohasta = $anodesde +1;

      if (Herramientas :: obtenerDiaMesOAno($fecing, 'd/m/Y', 'm') < Herramientas :: obtenerDiaMesOAno($fecegr, 'd/m/Y', 'm'))
        $anofin = Herramientas :: obtenerDiaMesOAno($fecegr, 'd/m/Y', 'Y') + 1;

      else
        $anofin = Herramientas :: obtenerDiaMesOAno($fecegr, 'd/m/Y', 'Y');

      $sql1 = "Select * from NPAsiCarEmp where CodEmp='" . $codemp . "' and Status='V'";
      Herramientas :: BuscarDatos($sql1, & $arr1);

      if ($arr1)
        $nomina = $arr1[0]['codnom'];

      else // Si no lo encontro buscamos la ultima nomina en el historico del empleado
        {
        $sql2 = "Select * from NPHisCon where CodEmp='" . $codemp . "' order by FecNom Desc";
        Herramientas :: BuscarDatos($sql2, & $arr2);

        if ($arr2)
          $nomina = $arr2[0]['codnom'];

        else
          $nimina = '';

        $sql3 = "Select A.id,
                  coalesce(to_number(C.perini,'9999'),0) as Historico,
                  A.*, B.Ano,
                  '" . (int) $anofin . "'-B.Ano as Antiguedad,
                  coalesce(to_number(C.perini,'9999'),('" . (int) $anohasta . "'-1)+('" . (int) $anofin . "'-B.ano)-1) as Desde,
                  coalesce(to_number(C.perfin,'9999'),('" . (int) $anohasta . "'-1)+('" . (int) $anofin . "'-B.ano)) as Hasta,
                  coalesce(C.diasdisfrutados,0) as Disfrutados,
                  coalesce(C.diasdisfutar,A.diadis) as CORRESPONDE
                  from
                      Npvacdisfrute C right join Npanos B on ((B.ano =  C.perfin) and ('" . $codemp . "' = C.codemp)),
                  NPvacdiadis A
                  Where (A.codnom='" . $nomina . "')
                  And (B.Ano BETWEEN ('" . (int) $anohasta . "'-1) and '" . (int) $anofin . "')
                  And (('" . (int) $anofin . "' - B.ano) BETWEEN A.rangodesde and A.rangohasta)
                  order by coalesce(to_number(C.perini,'9999'),('" . (int) $anohasta . "'-1)+('" . (int) $anofin . "'-B.ano)), B.ano desc";

        Herramientas :: BuscarDatos($sql3, & $arr3);

        $i = 1;
        //$i = 0;

        foreach ($arr3 as $a) {
          if ($arr3['historico'] <> 0)
            $arreglo1[$i]['desde'] = $arr3['desde'];
          $arreglo1[$i]['hasta'] = $arr3['hasta'];

          $sql4 = "SELECT A.ANTAPVAC antapvac FROM NPBONOCONT AS A, NPASIEMPCONT AS B WHERE A.CODTIPCON=B.CODTIPCON AND B.CODEMP='" . $codemp . "' AND TO_CHAR(" . $arr3['hasta'] . ") BETWEEN TO_CHAR(ANOVIG,'YYYY') AND TO_CHAR(ANOVIGHAS,'YYYY')";
          Herramientas :: BuscarDatos($sql4, & $arr4);

          $antiguedadAP = '';
          if ($arr2)
            $antiguedadAP = $arr4[0]["antapvac"];
          $antiguedad = $a['antiguedad'] + 1;

          self :: tiempoServicioTotal($codemp, 0, 0, 0, & $Idia, & $Imes, & $Iano, 'I');

          $antiguedad = $antiguedad + $Iano;

          $antiguedadIN = '';
          if ($Iano > 0) {
            $antiguedadIN = 'SI';
          }

        }

      }
    }

  }

  // Fin VacLiquidacion

  public static function salvarNomdefmov($npdefmov, $grid) {
    $nomina = $npdefmov->getCodnom();
    $c = new Criteria();
    $c->add(NpdefmovPeer :: CODNOM, $nomina);
    NpdefmovPeer :: doDelete($c);

    $x = $grid[0];
    $j = 0;
    while ($j < count($x)) {
      if ($x[$j]['monto'] == '1') {
        $tabla = new Npdefmov();
        $tabla->setCodnom($nomina);
        $tabla->setCodcon($x[$j]['codcon']);
        $tabla->setStatus('M');
        $tabla->save();
      }

      if ($x[$j]['cantidad'] == '1') {
        $tabla2 = new Npdefmov();
        $tabla2->setCodnom($nomina);
        $tabla2->setCodcon($x[$j]['codcon']);
        $tabla2->setStatus('C');
        $tabla2->save();
      }
      $j++;
    }
  }

  public static function salvarNpconsalint($codnom, $gridsi, $gridno) {
    $grid1 = $gridsi[0];
    $grid2 = $gridno[0];
    $c = new Criteria();
    $c->add(NpconsalintPeer :: CODNOM, $codnom);
    NpconsalintPeer :: doDelete($c);

    foreach ($grid1 as $g) {

      $npconsalint = new Npconsalint();
      if ($g["check"] == '1') {
        $npconsalint->setCodnom($codnom);
        $npconsalint->setCodcon(str_replace("'", '', $g["codcon"]));

        $npconsalint->save();
      }

    }

    foreach ($grid2 as $g) {
      $npconsalint = new Npconsalint();
      if ($g["check"] == '1') {
        $npconsalint->setCodnom($codnom);
        $npconsalint->setCodcon(str_replace("'", '', $g["codcon"]));

        $npconsalint->save();
      }
    }
  }

  public static function salvarpresnomasicompre($obj, $grid_detalle) {

    $c = new Criteria();
    $c->add(NpconasiPeer :: CODCON, $obj->getCodcon());
    $c->add(NpconasiPeer :: CODASI, $obj->getCodasi());
    $npfalper_del = NpconasiPeer :: doDelete($c);

      $c2 = new Criteria();
      $c->add(NpasiprePeer :: CODCON, $obj->getCodcon());
      $c->add(NpasiprePeer :: CODASI, $obj->getCodasi());
      $resultado = NpasiprePeer :: doDelete($c);

      $npasipre = new Npasipre();
      $npasipre->setCodcon($obj->getCodcon());
      $npasipre->setCodasi($obj->getCodasi());
      $npasipre->setDesasi($obj->getDesasi());
	  $npasipre->setTipasi($obj->getTipasi());
	  if($obj->getAfealibv()=='')
			$npasipre->setAfealibv('N');
		else
			$npasipre->setAfealibv('S');
	  if($obj->getAfealibf()=='')
			$npasipre->setAfealibf('N');
		else
			$npasipre->setAfealibf('S');
      $npasipre->save();


    $grid = $grid_detalle[0];
    $i = 0;
    if (count($grid) > 0) {
      while ($i < count($grid)) {
        $npconasi= new Npconasi();
        $npconasi->setCodcon($obj->getCodcon());
        $npconasi->setCodasi($obj->getCodasi());
        $npconasi->setCodcpt($grid[$i]['codcpt']);
		if($grid[$i]['afealibv']=='')
			$npconasi->setAfealibv('N');
		else
			$npconasi->setAfealibv('S');
		if($grid[$i]['afealibf']=='')
			$npconasi->setAfealibf('N');
		else
			$npconasi->setAfealibf('S');
        $npconasi->save();
        $i++;
      }
    }

  }

  /* Función Principal para validar datos del Modulo Npintfecref
       */
  public static function validarNpintfecref($fechaini, $fechafin) {

    $c = new Criteria;
    $per = NpintfecrefPeer :: doSelect($c);
    $fechaini1 = self :: convertir_formato_fechas($fechaini);
    $fechafin1 = self :: convertir_formato_fechas($fechafin);
    $fechainicio = self :: convertir_fecha_numero($fechaini1);
    $fechafinal = self :: convertir_fecha_numero($fechafin1);

    foreach ($per as $array_fecha) {
      $fecha_ini = $array_fecha->getFeciniref();
      $fecha_fin = $array_fecha->getFecfinref();
      $fechaini2 = self :: convertir_formato_fechas($fecha_ini);
      $fechafin2 = self :: convertir_formato_fechas($fecha_fin);
      $fechainiciobd = self :: convertir_fecha_numero($fechaini2);
      $fechafinbd = self :: convertir_fecha_numero($fechafin2);

      if (($fechainicio >= $fechainiciobd) && ($fechainicio <= $fechafinbd)) {
        return 424;
      }
      elseif (($fechafinal >= $fechainiciobd) && ($fechafinal <= $fechafinbd)) {
        return 424;
      }
      elseif (($fechainicio <= $fechainiciobd) && ($fechafinal >= $fechafinbd)) {
        return 424;
      }

    }
    return -1;

  }

  public static function convertir_formato_fechas($fecha_ini) { /*Convierte Formato Fecha a dd/mm/aaa */

    $dia = substr($fecha_ini, 8, 2);
    $mes = substr($fecha_ini, 5, 2);
    $ano = substr($fecha_ini, 0, 4);
    $fecha = $dia . '/' . $mes . '/' . $ano;

    return $fecha;

  }

  public static function convertir_fecha_numero($fechaini) { /*  La fecha  debe  estar en Formato dd/mm/aaaa*/

    $dia = substr($fechaini, 0, 2);
    $mes = substr($fechaini, 3, 2);
    $ano = substr($fechaini, 6, 4);
    $fecha = mktime(0, 0, 0, (int) $mes, (int) $dia, (int) $ano);

    return $fecha;

  }

  /* Función Principal para validar datos del Modulo Npantpre
       */
  public static function validarNpantpre($codemp) {
    // return self:: validarNpantpre($codemp);
    $c = new Criteria;
    $c->add(NpantprePeer :: CODEMP, $codemp);
    $per = NpantprePeer :: doSelectOne($c);

    if ($per) {
      return -1;
    } else
      return 425;
  }

  /* Función Principal para validar datos del Modulo Npreghisantpre
       */
  public static function validarNpreghistantpre($codemp, $fecant) {
    // return self:: validarNpantpre($codemp);
    $error = -1;
    $c = new Criteria;
    $c->add(NphojintPeer :: CODEMP, $codemp);
    $per = NphojintPeer :: doSelectOne($c);

    if (!$per) {
      $error = 425;
    } else {
      $c = new Criteria;
      $c->add(NpantprePeer :: CODEMP, $codemp);
      $c->add(NpantprePeer :: FECANT, $fecant);
      $per = NpantprePeer :: doSelectOne($c);

      if ($per) {
        $error = 433;
      }
    }
    return $error;
  }

  //Salvar Registro Historico de Anticipos.
  public static function salvarpresnomreghisantpre($obj) {

    /*$c= new Criteria();
    $c->add(NpantprePeer::CODEMP,$obj->getCodemp());
    $c->add(NpantprePeer::FECANT,$obj->getFecant());
    //$c->add(NpantprePeer::MONANT,$obj->getMonant());
    //$c->add(NpantprePeer::MONTO,$obj->getMonto());
    $npantpre_del = NpantprePeer::doDelete($c);*/
    $obj->save();
  }

  public static function salvarNpsalint($npsalint, $grid) {

    $x = $grid[0];

    $fechaini = $npsalint->getFecinicon();
    $fechafin = $npsalint->getFecfincon();
    $cod = $npsalint->getCodcon();
    $arr_codasi = array ();
    $sqlCodAsi = "Select codasi  from Npasipre where codcon='$cod'";
    H :: BuscarDatos($sqlCodAsi, $arr_codasi);

    //Herramientas::PrintR($x);
    $j = 0;
    while ($j < count($x)) {
      $h = 0;
      while ($h < count($arr_codasi)) {
        $c = new Criteria();
        $c->add(NpsalintPeer :: CODCON, $cod, Criteria :: EQUAL);
        $c->add(NpsalintPeer :: CODEMP, $x[$j]["codemp"], Criteria :: EQUAL);
        $c->add(NpsalintPeer :: FECINICON, $fechaini, Criteria :: EQUAL);
        $c->add(NpsalintPeer :: CODASI, $arr_codasi[$h]["codasi"], Criteria :: EQUAL);
        $c->add(NpsalintPeer :: FECFINCON, $fechafin, Criteria :: EQUAL);
        $per = NpsalintPeer :: doSelectOne($c);
        if ($per)
          $per->delete();

        $npsalint = new Npsalint();
        $npsalint->setCodemp($x[$j]["codemp"]);
        $npsalint->setCodasi($arr_codasi[$h]["codasi"]);
        $npsalint->setMonasi($x[$j][$arr_codasi[$h]["codasi"]]);
        $npsalint->setFecinicon($fechaini);
        $npsalint->setFecfincon($fechafin);
		$r = new Criteria();
		$r->add(NpasiempcontPeer::CODEMP,$x[$j]["codemp"]);
		$r->add(NpasiempcontPeer::STATUS,'A');
		$per2 = NpasiempcontPeer::doSelectOne($r);
		if($per2)
			$npsalint->setCodcon($per2->getCodtipcon());
		else
			$npsalint->setCodcon($cod);
        $npsalint->save();
        //print "<br> A grabar, codemp ".$x[$j]["codemp"]." Cod Asi ".$arr_codasi[$h]["codasi"]. " Monasi ".$x[$j][$arr_codasi[$h]["codasi"]];
        $h++;
      }
      $j++;
    }
    return -1;
  }

public static function salvarNpsalintind($npsalint, $grid) {



    $x = $grid[0];
	$r = new Criteria();
	$r->add(NpasiempcontPeer::CODEMP,$npsalint->getCodemp());
	$r->add(NpasiempcontPeer::STATUS,'A');
	$per2 = NpasiempcontPeer::doSelectOne($r);
	if($per2)
		$codcon = $per2->getCodtipcon();
	else
		$codcon = $npsalint->getCodcon();

    $codemp = $npsalint->getCodemp();
    $arr_codasi = array ();
    $sqlCodAsi = "Select codasi  from Npasipre where codcon='$codcon'";
    H :: BuscarDatos($sqlCodAsi, $arr_codasi);

    $c = new Criteria();
    $c->add(NpsalintPeer :: CODCON, $codcon, Criteria :: EQUAL);
    $c->add(NpsalintPeer :: CODEMP, $codemp, Criteria :: EQUAL);
    NpsalintPeer :: doDelete($c);

    //Herramientas::PrintR($x);
    $j = 0;
    $montoasiref=-1;
    $monasi=0;
    while ($j < count($x)) {
      $h = 0;
      while ($h < count($arr_codasi)) {

      /*  if($montoasiref!=$x[$j][$arr_codasi[$h]["codasi"]] && $x[$j][$arr_codasi[$h]["codasi"]]!=0)
        {
          $monasi=$x[$j][$arr_codasi[$h]["codasi"]];
        }*/
        $npsalint = new Npsalint();
        $npsalint->setCodemp($codemp);
        $npsalint->setCodasi($arr_codasi[$h]["codasi"]);
        $npsalint->setMonasi($x[$j][$arr_codasi[$h]["codasi"]]);
        //$npsalint->setMonasi($monasi);
        $fecinicon = $x[$j]["fecinicon"];
        $fecfincon = $x[$j]["fecfincon"];
        $npsalint->setFecinicon($fecinicon);
        $npsalint->setFecfincon($fecfincon);
        $npsalint->setCodcon($codcon);
        $npsalint->save();
        //print "<br> A grabar, codemp ".$codemp." Cod Asi ".$arr_codasi[$h]["codasi"]. " Monasi ".$x[$j][$arr_codasi[$h]["codasi"]];
        //print "<br> A grabar, fecinicon ".$fecinicon." fecfincon ".$fecfincon;
        $montoasiref=$x[$j][$arr_codasi[$h]["codasi"]];
        $h++;
      }
      $j++;
    }
    return -1;
  }



  public static function validarNomcamnomcar($npasicaremp, $codnom, $codcar, $codcat, $feccam) {

    if ($npasicaremp) {
      if ($npasicaremp->getId() == '')
        return 442;

      if ($codnom != '' && $codcar != '') {
        $c = new Criteria();
        $c->add(NpnominaPeer :: CODNOM, $codnom);
        $npnomina = NpnominaPeer :: doSelectOne($c);
        if (!$npnomina)
          return 443;

        $c = new Criteria();
        $c->add(NpcargosPeer :: CODCAR, $codcar);
        $npcargos = NpcargosPeer :: doSelectOne($c);
        if (!$npcargos)
          return 444;
      }
      elseif ($codnom != '' && $codcar == '') {
        return 445;
      }
      elseif ($codnom == '' && $codcar != '') {
        $c = new Criteria();
        $c->add(NpcargosPeer :: CODCAR, $codcar);
        $npcargos = NpcargosPeer :: doSelectOne($c);
        if (!$npcargos)
          return 444;
      }

      if ($codcat != '') {
        $c = new Criteria();
        $c->add(NpcatprePeer :: CODCAT, $codcat);
        $npcatpre = NpcatprePeer :: doSelectOne($c);
        if (!$npcatpre)
          return 446;
      }

      return -1;

    } else
      return 442;

  }

  public static function salvarNomcamnomcar($npasicaremp, $codnom, $codcar, $codcat, $feccam) {
  /*	print "cod. nom :".$codnom; print "cod. car :". $codcar; print "cod. cat :".$codcat;
        H::printR($npasicaremp);
    exit;*/
    if (($codnom && $codcar) || ($codnom == '' && $codcar != '')) {

          $c= new Criteria();
          $c->add(NphojintPeer::CODEMP, $npasicaremp->getCodemp());
          $nphojint=  NphojintPeer::doSelectOne($c);


      if ($codnom == '' && $codcar != '')
        $codnom = $npasicaremp->getCodnom();

            if ($codcat=="") $codcat=$npasicaremp->getCodcat();

            // Registro de la nomina
      $c = new Criteria();
      $c->add(NpnominaPeer::CODNOM, $codnom);
      $npnomina = NpnominaPeer :: doSelectOne($c);

      // Registro del Cargo
      $c = new Criteria();
      $c->add(NpcargosPeer::CODCAR, $codcar);
      $npcargos = NpcargosPeer :: doSelectOne($c);

      // Registro del Cargo Anterior
      $c = new Criteria();
      $c->add(NpcargosPeer :: CODCAR, $npasicaremp->getCodcar());
      $npcargosant = NpcargosPeer :: doSelectOne($c);

      // Busco el registro de la categoria
      $c = new Criteria();
      $c->add(NpcatprePeer :: CODCAT, $codcat);
      $npcatpre = NpcatprePeer :: doSelectOne($c);

       /*$c = new Criteria();
      $c->add(NpasicarempPeer::CODEMP, $npasiaremp->getCodemp());
      $c->add(NpasicarempPeer::CODCAR, $npasiaremp->getCodcar());
      $c->add(NpasicarempPeer::CODNOM, $npasiaremp->getCodnom());
      $npasiarempact = NpasicarempPeer :: doSelectOne($c);*/

            $npasicaremp->setStatus("E");
            $npasicaremp->save();
            $npasicarempnew = new Npasicaremp();
      $npasicarempnew->setCodemp($npasicaremp->getCodemp());
      $npasicarempnew->setCodcar($codcar);
      $npasicarempnew->setCodnom($codnom);
      $npasicarempnew->setCodcat($codcat);
        $npasicarempnew->setNomcar($npcargos->getNomcar());
      $npasicarempnew->setNomnom($npnomina->getNomnom());
      $npasicarempnew->setNomcat($npcatpre->getNomcat());
      $npasicarempnew->setFecasi($npasicaremp->getFecasi());
      $npasicarempnew->setNomemp($npasicaremp->getNomemp());
      $npasicarempnew->setUnieje($npasicaremp->getUnieje());
      $npasicarempnew->setSueldo($npasicaremp->getSueldo());
      $npasicarempnew->setStatus('V');
      $npasicarempnew->setCodtipgas($npasicaremp->getCodtipgas());
      $npasicarempnew->setCodgrunom($npasicaremp->getCodgrunom());
      $npasicarempnew->setPaso($npasicaremp->getPaso());
            $npasicarempnew->save();



      // Guardo el historial del cargo
      $nphisasicaremp = new Nphisasicaremp();
      $nphisasicaremp->setCodemp($npasicaremp->getCodemp());
      $nphisasicaremp->setCodcar($npasicaremp->getCodcar());
      $nphisasicaremp->setCodnom($npasicaremp->getCodnom());
      $nphisasicaremp->setCodcat($npasicaremp->getCodcat());
      $nphisasicaremp->setFecasi($npasicaremp->getFecasi());
      $nphisasicaremp->setNomemp($npasicaremp->getNomemp());
      $nphisasicaremp->setNomcar($npasicaremp->getNomcar());
      $nphisasicaremp->setNomnom($npasicaremp->getNomnom());
      $nphisasicaremp->setNomcat($npasicaremp->getNomcat());
      $nphisasicaremp->setUnieje($npasicaremp->getUnieje());
      $nphisasicaremp->setSueldo($npasicaremp->getSueldo());
      $nphisasicaremp->setStatus('N');
      $nphisasicaremp->setMontonomina($npasicaremp->getMontonomina());
      $nphisasicaremp->setCodtip($npasicaremp->getCodtip());
      $nphisasicaremp->setCodtipgas($npasicaremp->getCodtipgas());
      $nphisasicaremp->save();



      // Genero la experiencia laboral con el cargo viejo
      $npexplab = new Npexplab();
      $npexplab->setCodemp($npasicaremp->getCodemp());
      $npexplab->setNomemp($nphojint->getNomemp());
      $npexplab->setCodcar($npasicaremp->getCodcar());
      $npexplab->setDescar($npasicaremp->getNomcar());
      $npexplab->setFecini($npasicaremp->getFecasi());
      $npexplab->setFecter($feccam);
      $npexplab->setSueobt($npcargosant->getSuecar());
      $npexplab->setStacar('D');
      //$npexplab->setCompobt();
      //$npexplab->setDurexp();
      $npexplab->setTiporg('Publico');
      $npexplab->save();



      // Se actualizan loc conceptos asignados al empleado
      $c = new Criteria();
      $c->add(NpasiconempPeer :: CODEMP, $npasicaremp->getCodemp());
      $c->add(NpasiconempPeer :: CODCAR, $npasicaremp->getCodcar());
      $datos_npasiconemp=NpasiconempPeer :: doSelect($c);
        foreach ($datos_npasiconemp as $npasiconemp) {
          $c = new Criteria();
          $c->add(NpasiconnomPeer :: CODNOM, $codnom);
          $c->add(NpasiconnomPeer :: CODCON, $npasiconemp->getCodcon());
          $npasiconnom = NpasiconnomPeer::doSelect($c);
          //si el concepto existe para la nueva nomina lo actualizo, de lo contrario lo elimino
          if ($npasiconnom)
           {
                      $npasiconemp->setCodcar($codcar);
                      $npasiconemp->setNomcar($npcargos->getNomcar());
                      $npasiconemp->save();
          }
          else //if ($npasiconnom)
          {
                    $npasiconemp->delete();
          }// else if ($npasiconnom)
        }//foreach
    } // if codnon y codcar
    elseif ($codnom == '' && $codcar == '' && $codcat != '') // Cambio de categoria
    {

      // Busco el registro de la categoria nueva
      $c = new Criteria();
      $c->add(NpcatprePeer::CODCAT, $codcat);
      $npcatpre = NpcatprePeer :: doSelectOne($c);

      $npasicaremp->setCodcat($codcat);
      $npasicaremp->setNomcat($npcatpre->getNomcat());
      $npasicaremp->save();
    }
    return -1;
  }

  public static function actualizarArregloNpvacsalidasreversa($npvacsalidas) {

    return false;
  }


  public static function VerificarConceptos($codcon,$codnom)
  {
    $c = new Criteria();
    $c->add(NpcestaticketsPeer::CODNOM,$codnom);
    $c->add(NpcestaticketsPeer::CODCON,$codcon);
    $per = NpcestaticketsPeer::doSelect($c);

    if ($per){
      return true;
    }else{
      return false;
    }
  }

  public static function salvarNomcodprenom($npdefcpt,$grid)
  {
    $codcon=$npdefcpt->getCodcon();


    $c= new Criteria();
    $c->add(NpasicodprePeer::CODCON,$codcon);
    NpasicodprePeer::doDelete($c);
    $x=$grid[0];
   //H::PrintR($x);exit;
    $j=0;
    while ($j<count($x))
    {

     if ($x[$j]->getCodnom()!="" and $x[$j]->getCodpre()!="")
     {
      $regaux= new Npasicodpre();
      $regaux->setCodcon($codcon);
      $regaux->setCodnom($x[$j]->getCodnom());
      $regaux->setCodpre($x[$j]->getCodpre());
      $regaux->save();
     }

     $j++;
    }

  }


  public static function Salvarasignarpartidasconceptos($clase, $grid)
  {
    $x = $grid[0];
    $j = 0;
    while ($j < count($x))
    {
      $c = new Criteria();
      $c->add(NpasiparconPeer::ID,$x[$j]['idborrar']);
      NpasiparconPeer::doDelete($c);
      $j++;
    }

    $x = $grid[0];
    $j = 0;
    while ($j < count($x))
    {
	  if (!empty($x[$j]['codpar']))
      {
        $c = new Npasiparcon();
        $c->setCodnom($x[$j]['codnom']);
        $c->setCodcar($x[$j]['codcar']);
        $c->setCodcon($x[$j]['codcon']);
        $c->setCodpar($x[$j]['codpar']);
        $c->save();
      }
      $j++;
    }
    return -1;
  }

  public static function salvarConceptosReportes($npasiconsue,$grid1,$grid2,$grid3,$grid4,$grid5,$grid6)
  {
    self::grabarSueldoCompensacion($grid1);
    self::grabarSalarioIntegral($grid2);
    self::grabarSueldoReportes($grid3);
    self::grabarARC($grid4);
    self::grabarCASEP($npasiconsue,$grid5);
    self::grabarConstancia($grid6);
  }

  public static function grabarSueldoCompensacion($grid1)
  {
  	//Grabamos Datos de Sueldo y Compensación

     $t= new Criteria();
     $data=NpasiconsuePeer::doSelect($t); //Borramos los Datos Viejos para Grabar los Nuevos
     if ($data)
     {
     	foreach ($data as $objdata)
     	{
     		$objdata->delete();
     	}
     }

     $x=$grid1[0];
     $j=0;
     if (count($x)>0)
     {
      while ($j<count($x))
      {
        if ($x[$j]["codnom"]!="" && $x[$j]["codcon"]!="" && $x[$j]["codcom"]!="")
        {
          $npasiconsue= new Npasiconsue();
          $npasiconsue->setCodnom($x[$j]["codnom"]);
          $npasiconsue->setCodcon($x[$j]["codcon"]);
          $npasiconsue->setCodcom($x[$j]["codcom"]);
          $npasiconsue->save();
        }
      	$j++;
      }
     }
    /////////////////////////////////////////
  }

  public static function grabarSalarioIntegral($grid2)
  {
  	//Grabamos el Salario Integral
    $x=$grid2[0];
    $j=0;
    while ($j<count($x))
    {
      if ($x[$j]->getCodnom()!='' && $x[$j]->getCodcon()!='')
      {
        $x[$j]->save();
      }
      $j++;
    }

    $z=$grid2[1];
    $j=0;
    if (!empty($z[$j]))
    {
      while ($j<count($z))
      {
        $z[$j]->delete();
        $j++;
      }
    }
    //////////////////////////////
  }

  public static function grabarSueldoReportes($grid3)
  {
  	//Grabamos el grid Sueldo Reportes
    $x=$grid3[0];
    $j=0;
    while ($j<count($x))
    {
      if ($x[$j]->getCodnom()!='' && $x[$j]->getCodcon()!='')
      {
        $x[$j]->save();
      }
      $j++;
    }

    $z=$grid3[1];
    $j=0;
    if (!empty($z[$j]))
    {
      while ($j<count($z))
      {
        $z[$j]->delete();
        $j++;
      }
    }
    //////////////////////////////
  }

  public static function grabarARC($grid4)
  {
  	//Grabamos el grid ARC
    $x=$grid4[0];
    $j=0;
    while ($j<count($x))
    {
      if ($x[$j]->getCodnom()!='' && $x[$j]->getCodcon()!='')
      {
        $x[$j]->save();
      }
      $j++;
    }

    $z=$grid4[1];
    $j=0;
    if (!empty($z[$j]))
    {
      while ($j<count($z))
      {
        $z[$j]->delete();
        $j++;
      }
    }
    //////////////////////////////
  }

  public static function grabarCASEP($npasiconsue,$grid5)
  {
  	//Grabamos el grid de CASEP
    $x=$grid5[0];
    $j=0;
    while ($j<count($x))
    {
      if ($x[$j]->getCodnom()!='' && $x[$j]->getCodcon()!='')
      {
      	$x[$j]->setTipo($npasiconsue->getTippres());
        $x[$j]->save();
      }
      $j++;
    }

    $z=$grid5[1];
    $j=0;
    if (!empty($z[$j]))
    {
      while ($j<count($z))
      {
        $z[$j]->delete();
        $j++;
      }
    }
    //////////////////////////////
  }

  public static function grabarConstancia($grid6)
  {
  	//Grabamos Grid de Constancia de Trabajo
    $x=$grid6[0];
    $j=0;
    while ($j<count($x))
    {
      if ($x[$j]->getCodnom()!='' && $x[$j]->getCodcon()!='')
      {
        $x[$j]->save();
      }
      $j++;
    }

    $z=$grid6[1];
    $j=0;
    if (!empty($z[$j]))
    {
      while ($j<count($z))
      {
        $z[$j]->delete();
        $j++;
      }
    }
    //////////////////////////////
  }

  public static function getPrestamo()
  {
    $c= new Criteria();
    $c->addAscendingOrderByColumn(NpdefconcasepPeer::TIPO);
    $reg=NpdefconcasepPeer::doSelectOne($c);
    if ($reg)
    {
    	$dato=$reg->getTipo();
    }else $dato='';
    return $dato;
  }

  public static function Grabar_grid_nomdefespprimas($grid1,$grid2,$grid3)
  {
  	//Grabamos Grid Prima por Hijo
    $x=$grid1[0];
    $j=0;
	if(count($x)>0)
    while ($j<count($x))
    {
	  if ($x[$j]->getConsest()=='1')
	  {
	  	$x[$j]->setConsest('S');
	  }else $x[$j]->setConsest(null);
	  $x[$j]->save();
	  $j++;
    }
    $z=$grid1[1];
    $j=0;
    if (!empty($z[$j]))
    {
      while ($j<count($z))
      {
        $z[$j]->delete();
        $j++;
      }
    }
	//Grabamos Grid Prima Profesionalizacion
    $x=$grid2[0];
    $j=0;
	if(count($x)>0)
    while ($j<count($x))
    {
	  $x[$j]->save();
	  $j++;
    }
    $z=$grid2[1];
    $j=0;
    if (!empty($z[$j]))
    {
      while ($j<count($z))
      {
        $z[$j]->delete();
        $j++;
      }
    }
	//Grabamos Grid Prima Cargo colateral
    $x=$grid3[0];
    $j=0;
	if(count($x)>0)
    while ($j<count($x))
    {
	  $x[$j]->save();
	  $j++;
    }
    //////////////////////////////
	return -1;
  }


  public static function ObtenervalorMovimientoConceptoVariable($token,$empleado,$cargo,$fecnom,$nomina)
  {
  	 $valor=0;
  	 if (substr($token, 0, 1) == 'M') // M
        {
          if (substr($token, 7, 1) == 'S') {
            $criterio = "Select Sum(cantidad) as cantidads,Sum(monto) as montos, Sum(Acumulado) as acumulados
                              from npasiconemp where activo='S' and codemp='" . $empleado . "' and codcon='" . substr($token, 4, 3) . "' ";
            if (Herramientas :: BuscarDatos($criterio, & $tabla)) {
              if (substr($token, 8, 1) == 'C') {
                $sql = "Select * from nptippre where codcon='" . substr($token, 4, 3) . "' ";
                if (Herramientas :: BuscarDatos($sql, & $tablaprestamo)) {
                  if (floatval($tabla[0]["acumulados"]) - floatval($tabla[0]["cantidads"]) <= 0) {
                    $aux = $tabla[0]["acumulados"];
                  } else {
                    $aux = $tabla[0]["cantidads"];
                  }
                } else {
                  $aux = $tabla[0]["cantidads"];
                }
              } else {
                $aux = $tabla[0]["montos"];
              } // tipo c o m
              $valor = $aux;
            }
          } // movconvar 7 1
          else {
            $criterio = "Select cantidad,monto,acumulado from npasiconemp where activo='S' and codemp='" . $empleado . "' and codcar='" . $cargo . "' and codcon='" . substr($token, 4, 3) . "' ";
            if (Herramientas :: BuscarDatos($criterio, & $tabla)) {
              if (substr($token, 7, 1) == 'C') {
                $sql = "Select * from nptippre where codcon='" . substr($token, 4, 3) . "' ";
                if (Herramientas :: BuscarDatos($sql, & $tablaprestamo)) {
                  if (floatval($tabla[0]["acumulado"]) - floatval($tabla[0]["cantidad"]) <= 0) {
                    $aux = $tabla[0]["acumulado"];
                  } else {
                    $aux = $tabla[0]["cantidad"];
                  }
                } else {
                  $aux = $tabla[0]["cantidad"];
                }
              } else {
                $aux = $tabla[0]["monto"];
              } // tipo c o m
              $valor = $aux;
            } // tabla
          } // fin else movconbar 7 1
        }
        //TODO:Cambiar al strrpos()

        elseif (Herramientas :: StringPos($token, "FECN", 0) != -1) //(Herramientas::instr($campo,'FECN',0,1) )
        {
          $valor = $fecnom;
        }
        elseif (substr($token, 0, 1) == 'E') {
          $criterio = "Select * from nphojint where codemp='" . $empleado . "'";
          if (Herramientas :: BuscarDatos($criterio, & $datosper)) {
            $aux = intval(substr($token, 1, 2));
            foreach ($datosper as $dat) {
              $i = 0;
              foreach ($dat as $d => $key) {
                if ($i == $aux) {
                  $valor = $key;
                }
                $i = $i +1;
              }
            }
            $valor = 'EEEEEEEEEEEEE';
            //$valor=$datosper[0][$aux];
          }
        }
        elseif (substr($token, 0, 1) == 'V') { //PRIMER CAMBIO
          $valor = 0.00;
          $criterio = "Select * from npdefvar where  codnom='" . $nomina . "' and codvar='" . substr($token, 1, 3) . "' ";
          if (Herramientas :: BuscarDatos($criterio, & $tabla)) {
            $aux = intval(substr($token, 4, 1));
            $aux = 'valor' . $aux;
            foreach ($tabla as $dat) {
              foreach ($dat as $d => $key) {
                if ($d == $aux) {
                  $valor = $key;
                }
              }
            }
            //$valor=$tabla[0][$aux];
          }
        }
        elseif (substr($token, 0, 1) == 'C') {
          $criterio = "Select a.saldo as saldo,a.acumulado as acumulado,b.opecon as opecon
                        from npNomCal a,Npdefcpt b
                        where  a.codnom='" . $nomina . "' and a.codemp='" . $empleado . "'
                        and a.codcar='" . $cargo . "' and a.codcon='" . substr($token, 1, 3) . "'
                        and a.codcon = b.codcon ";
          //print $criterio;exit;
          if (Herramientas :: BuscarDatos($criterio, & $tabla)) {
            if (substr($token, 4, 1) == 'S') {
              if (empty ($tabla[0]["saldo"])) {
                $aux = 0;
              } else {
                $aux = $tabla[0]["saldo"];
              }
            } else {
              if (empty ($tabla[0]["acumulado"])) {
                $aux = 0;
              } else {
                $aux = $tabla[0]["acumulado"];
              }
            }
            $valor = $aux;
          }
        }
    return $valor;
  }



  public static function aa($cireging,$numero,$registro=array())
  {
    $mensaje="";
    $numeroorden="";
    $r='';

    $numerocomprob=Comprobante::Buscar_Correlativo();
    $reftra=$numero;

    $codigocuenta = "";
    $tipo  = "";
    $des   = "";
    $monto = "";

    $codigocuentas = "";
    $tipo1  = "";
    $desc   = "";
    $monto1 = "";

    $codigocuenta2 = "";
    $tipo2  ="";
    $des2   ="";
    $monto2 ="";

    $cuentas= "";
    $tipos  = "";
    $montos ="";
    $descr  ="";

    $msjuno = "";
    $msjdos = "";

    $c = new Criteria();
    $x = $grid[0];
    $j = 0;

          $sql="select B.CODCTA as CODCTA,B.DESCTA as DESCTA,A.SALACT as SALACT
		          FROM
			          CONTABB1 A,CONTABB B
		          WHERE
			         A.CODCTA=B.CODCTA AND
		          	 A.CODCTA LIKE '".trim($GLOBALS["egresos"])."%' and
		          	 A.PEREJE='".trim($GLOBALS["ultimoperiodo"])."' AND
		          	 A.SALACT<>0 AND
		          	 B.CARGAB='C'
		          ORDER BY
		          	B.CODCTA";

		if (H::BuscarDatos($sql,&$dato))
		{
			$sql = "SELECT SUM(coalesce(A.SALACT,0)) as total FROM CONTABB1 A,CONTABB B
	                	WHERE A.CODCTA=B.CODCTA AND
	                	A.CODCTA LIKE '".trim($GLOBALS["egresos"])."%' AND
	                	A.PEREJE='".trim($GLOBALS["ultimoperiodo"])."' AND B.CARGAB='C'";

			if (H::BuscarDatos($sql,&$dato2))
			{
				$totegr = abs($dato[0]["total"]);
			}

           $codigocuentas = $registro["resultado"];
           $desc          = $registro["descta"];
           $tipo1         = 'D';
           $monto1        = $totegr;

		}
exit();
         if ($j==0)
         {
           $codigocuentas=$codigocuenta;
           $desc=$des;
           $tipo1=$tipo;
           $monto1=$monto;
         }
         else
         {
           $codigocuentas=$codigocuentas.'_'.$codigocuenta;
           $desc=$desc.'_'.$des;
           $tipo1=$tipo1.'_'.$tipo;
           $monto1=$monto1.'_'.$monto;
          }


    //Obtener cta asociada al banco
        $codigocuenta2=$cireging->getCtaban();
        $b1= new Criteria();
        $b1->add(TsdefbanPeer::NUMCUE,$codigocuenta2);
        $regis3 = TsdefbanPeer::doSelectOne($b1);
          $codigo = $regis3->getCodcta();

        //Obtener la descripcion del codigo de cuenta
        $b2= new Criteria();
        $b2->add(ContabbPeer::CODCTA,$codigo);
        $regis4  = ContabbPeer::doSelectOne($b2);
          $nomcta = $regis4->getDescta();
          $tipo2  = 'D';
          $des2   = $regis4->getDescta();
          $monto2 = $cireging->getMontot();

      $cuentas=$codigo.'_'.$codigocuentas;
      $descr=$des2.'_'.$desc;
      $tipos=$tipo2.'_'.$tipo1;
      $montos=$monto2.'_'.$monto1;

      $clscommpro=new Comprobante();
      $clscommpro->setGrabar("N");
      $clscommpro->setNumcom($numerocomprob);
      $clscommpro->setReftra($reftra);
      $clscommpro->setFectra(date("d/m/Y",strtotime($cireging->getFecing())));
      $clscommpro->setDestra($cireging->getDesing());
      $clscommpro->setCtas($cuentas);
      $clscommpro->setDesc($descr);
      $clscommpro->setMov($tipos);
      $clscommpro->setMontos($montos);
      $arrcompro[]=$clscommpro;

  return true;
  }


} // fin clase




?>