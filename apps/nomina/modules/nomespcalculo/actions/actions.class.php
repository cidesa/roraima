<?php

/**
 * nomespcalculo actions.
 *
 * @package    siga
 * @subpackage nomespcalculo
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 2288 2006-10-02 15:22:13Z fabien $
 */
class nomespcalculoActions extends autonomespcalculoActions
{
  public function executeIndex()
  {
    return $this->redirect('nomespcalculo/edit');
  }


  // Para incluir funcionalidades al executeEdit()
  public function editing()
  {
 	$this->configGridV2();
  }


  public function executeAjax()
  {
  	 $codnomesp = $this->getRequestParameter('codnomesp');
     $cajtexmos = $this->getRequestParameter('cajtexmos');
     $cajtexcom = $this->getRequestParameter('cajtexcom');
     $codigo    = $this->getRequestParameter('codigo');

	if ($this->getRequestParameter('ajax')=='1')
      {
		$dato=Herramientas::getX('codnomesp','npnomesptipos','desnomesp',$codigo);
        //$dato=CaproveePeer::getNompro($this->getRequestParameter('codigo'));
        $output = '[["'.$cajtexmos.'","'.$dato.'",""]]';
        $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');
        return sfView::HEADER_ONLY;
      }
    else if ($this->getRequestParameter('ajax')=='2')
      {
        $consultado = false;
        $datoaux='';
        $datopag='';
        ////LOSTFOCUS
        if ($codigo!='')
        {
        $sql0="Select distinct(B.codnom),B.nomnom from npnomina B,NPNomEspNomTip C where C.codnomesp='".$codnomesp."' and B.codnom=C.codnom and C.codnom='".$codigo."'";
        if (Herramientas::BuscarDatos($sql0,&$npresult))
        {
          $datoaux='valor';
          $consultado=true;
        }
        }
        if ($consultado)
      {   /////DATOS NIVELES
          $opsi="false";
          $msem="";

          $sql="select codnom, nomnom, numsem, ultfec, profec, frecal,
          to_char(profec,'dd/mm/yyyy') as profec2, to_char(ultfec,'dd/mm/yyyy') as ultfec2
          from npnomina where codnom='".$codigo."' ";

        if (Herramientas::BuscarDatos($sql,&$npnomina))
        {
          $nomnom=$npnomina[0]["nomnom"];
          $numsem=$npnomina[0]["numsem"];

		  //Se comento para el especial
          //$ultfec=$npnomina[0]["ultfec"];
          //$profec=split('-',$npnomina[0]["profec"]);
		  /////
		  //Se habilito para el especial
          $ultfec = H::getX('codnomesp','npnomesptipos','fecnomdes',$codnomesp);
          $profec = split('-',H::getX('codnomesp','npnomesptipos','fecnomhas',$codnomesp));
		  /////

          $fecha1 = $profec[0].'-'.$profec[1].'-'.'01';
          $fecha2 = Herramientas::dateAdd('m',1,$fecha1,'+');
          $fecha2 = Herramientas::dateAdd('d',1,$fecha2,'-');

          $numerosemanas=0;

          while (strtotime($fecha1) <= strtotime($fecha2))
          {
            $fecha1b=split('-',$fecha1);

            if (Herramientas::dia_semana($fecha1b[2],$fecha1b[1],$fecha1b[0])=='Lunes')
            {
              $numerosemanas=$numerosemanas+1;
            }
            $dia=1;
            $fecha1=date("Y-m-d", strtotime("$fecha1 +$dia day"));
          }

          $fecha1=$profec[0].'-'.$profec[1].'-'.'01';

          $fecha2=Herramientas::dateAdd('m',1,$fecha1,'+');
          $fecha2=Herramientas::dateAdd('d',1,$fecha2,'-');

          if ($npnomina[0]["frecal"]=='S')
          {
            $datopag='S';

            if (!(is_null($numsem)))
            {
              $msem=$numsem;
            }
            else
            {
              $msem="__";
            }
            $opsi="true";
          }
          else if ($npnomina[0]["frecal"]=='Q')
          {
            $datopag='Q';
          }
          else if ($npnomina[0]["frecal"]=='M')
          {
            $datopag='M';
          }

          $profec = date('d/m/Y',strtotime(H::getX('codnomesp','npnomesptipos','fecnomhas',$codnomesp)));
          $ultfec = date('d/m/Y',strtotime(H::getX('codnomesp','npnomesptipos','fecnomdes',$codnomesp)));

          $output = '[["npnomina_nomnom","'.$nomnom.'",""],["npnomina_numsem","'.$numerosemanas.'",""],["npnomina_profec","'.$profec.'",""],["npnomina_ultfec","'.$ultfec.'",""],["opsi","'.$opsi.'",""],["msem","'.$msem.'",""],["cajocuaux","'.$datopag.'",""]]';

          //$output = '[["caja","'.$profec.'",""]]';
          $this->getUser()->setAttribute('calculolisto','si','nomnomcalnom');
          $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');
          return sfView::HEADER_ONLY;
        }
      }
      else
      {
        $output = '[["npnomina_nomnom","Registro no Encontrado o Vacio!",""],["cajocuaux","'.$datoaux.'",""]]';
        $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');
          return sfView::HEADER_ONLY;
      }
      }
      ////////////////////////////////////////////////////////////////////////////////////
    ////////////////////////////////////////////////////////////////////////////////////
    ////////////////////////////////////////////////////////////////////////////////////
    else if ($this->getRequestParameter('ajax')=='3') // CALCULO DE NOMINA!!!!!!!!!!!
      {
      $codnom    = $this->getRequestParameter('codnom');
      $codnomesp = $this->getRequestParameter('codnomesp');

      if ($codnom!='')
      {
          try{
           $sql = "select id,codnom,condicion from tmpcalculoesp where codnom='".$codnom."'";
            if (Herramientas::BuscarDatos($sql,&$npnomina))
            {
              $tabla=true;
            }else
              $tabla=false;
            }catch(Exception $ex){

              $sql = "CREATE TABLE tmpcalculoesp (id int4 NOT NULL,
                                        codnom VARCHAR(3) NOT NULL,
                                                            condicion VARCHAR(10) NOT NULL
                                                  ) WITHOUT OIDS";
            Herramientas::insertarRegistros($sql);
            $tabla=false;
            //exit('655');
          }

          $desde=$this->getRequestParameter('desde');
          $hasta=$this->getRequestParameter('hasta');
          $opsi=$this->getRequestParameter('opsi');
          $msem=$this->getRequestParameter('msem2');

          //PARA PROBAR LUEGO DE LA PRUEBA QUITAR COMENTARIO
          //$desde = str_replace('/','-',$desde);
          //$hasta = str_replace('/','-',$hasta);
          //////////////////////////////////////////////////

          if (!$tabla)
          {
            //PARA PROBAR LUEGO DE LA PRUEBA QUITAR COMENTARIO
            /*$host = $_SERVER["HTTP_HOST"];
              $aux = split('/',$_SERVER["REQUEST_URI"]);
              $uri = '';
            for ($i=0;$i<count($aux)-1;$i++)
              $uri = $uri . $aux[$i]."/";*/

            /*$url =  'http://'.$host.$uri.'calculo/cookiecid/44aa95ac18060e7dcdd80251ef74f733/codnom/'.$codnom.'/desde/'.$desde.'/hasta/'.$hasta.'/opsi/'.$opsi.'/msem2/'.$msem.'/archivo/archivo';
            system('wget '.$url.' > /dev/null &',$retval);*/
            ///////////////////////////////////////////////////////


            //ELIMINAR ESTA LINEA DESPUES DE LA PRUEBA
            $now = strtotime(date("Y-m-d H:i:s"));

            CalculoNominaEspecial::ValidicionPorEmpleado($codnom,$desde,$hasta,$opsi,$msem,&$cont,$codnomesp);
            CalculoNominaEspecial::EliminarRegistro($codnom, $codnomesp);
            //////////////////////////////////////////
            $now2 = strtotime(date("Y-m-d H:i:s"));
            $now3 = $now2-$now;

            $output = '[["controlador","no",""],["tiempo","'.$now3.'",""]]';

          }
          else
          {
            $output = '[["controlador","si",""]]';
          }
          //PARA PROBAR LUEGO DE LA PRUEBA ELIMINAR ESTO
            $sql="select codnom from tmpcalculoesp";
            if (!(Herramientas::BuscarDatos($sql,&$tabla)))
            {
              $sql = "drop table tmpcalculoesp";
              Herramientas::insertarRegistros($sql);
            }
          ///////////////////////////////////////////////
          $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');
          //return sfView::HEADER_ONLY;
          $this->configGridV2($codnom);
      }else
      {
        $output = '[["controlador","vacio",""]]';
        $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');
        return sfView::HEADER_ONLY;
      }
      }
  }


  public function validateEdit()
  {
    $this->coderr =-1;

    // Se deben llamar a las funciones necesarias para cargar los
    // datos de la vista que serán usados en las funciones de validación.
    // Por ejemplo:

    if($this->getRequest()->getMethod() == sfRequest::POST){

      if($this->coderr!=-1){
        return false;
      } else return true;

    }else return true;

  }

  /**
   * Función para actualziar el grid en el post si ocurre un error
   * Se pueden colocar aqui los grids adicionales
   *
   */
  public function updateError()
  {

  }

  public function saving($clasemodelo)
  {
    return parent::saving($clasemodelo);
  }

  public function deleting($clasemodelo)
  {
    return parent::deleting($clasemodelo);
  }



public function configGrid_prueba($codnom='')
  {
    /////PARA LA CONSULTA//////
    /*$c = new Criteria();
      $c->add(NpnominaPeer::CODNOM,$codnom);
      $per = NpnominaPeer::doSelect($c);*/

    try{
        $sql = "select 9 as id,codnom as codnom,condicion as condicion from tmpcalculoesp";
        if (Herramientas::BuscarDatos($sql,&$npnomina))
      {
          $per = $npnomina;
      }else
        $per = array('0' => array('id' => 9, 'codnom' => '**********', 'condicion' => 'NO HAY NOMINA EN EJECUCION' ));
    }
    catch(Exception $ex){
      $per = array('0' => array('id' => 9, 'codnom' => '*********', 'condicion' => 'NO HAY NOMINA EN EJECUCION' ));
    }
          ///FIN CONSULTA///

    ////OPCIONES DEL GRID//////
      $opciones = new OpcionesGrid();
      $opciones->setTabla('Npnomina');
      $opciones->setEliminar(false);
      $opciones->setAnchoGrid(400);
      $opciones->setFilas(0);
      //$opciones->setTitulo('Nominas en Calculo');
      $opciones->setTitulo('LAS SIGUIENTES NOMINAS SE ESTAN EJECUTANDO');

      $opciones->setHTMLTotalFilas(' ');
      ///FIN OPCIONES///

    /////COLUMNAS///////

      $col1 = new Columna('Nomina');
      $col1->setTipo(Columna::TEXTO);
      $col1->setAlineacionObjeto(Columna::CENTRO);
      $col1->setAlineacionContenido(Columna::CENTRO);
      $col1->setNombreCampo('codnom');
      $col1->setHTML('type="text" size="7" maxlength="35"  readonly=true ');


      $col2 = new Columna('Condicion');
      $col2->setTipo(Columna::TEXTO);
      $col2->setAlineacionObjeto(Columna::CENTRO);
      $col2->setAlineacionContenido(Columna::CENTRO);
      $col2->setNombreCampo('condicion');
      $col2->setHTML('type="text" size="40" maxlength="35"  readonly=true');

      $opciones->addColumna($col1);
      $opciones->addColumna($col2);

        ///FIN COLUMNAS///

      $this->obj = $opciones->getConfig($per);
      //H::printR($this->obj);
  }


  public function configGridV2($codnom='')
  {
    /////PARA LA CONSULTA//////
    /*$c = new Criteria();
      $c->add(NpnominaPeer::CODNOM,$codnom);
      $per = NpnominaPeer::doSelect($c);*/

    try{
    	$this->npnomina = $this->getNpnominaOrCreate();
        $sql = "select 9 as id,codnom as codnom,condicion as condicion from tmpcalculoesp";
        if (Herramientas::BuscarDatos($sql,&$npnomina))
        {
          $per = $npnomina;
        }else
          $per = array('0' => array('id' => 9, 'codnom' => '**********', 'condicion' => 'NO HAY NOMINA EN EJECUCION' ));
        }
    catch(Exception $ex){
    	//echo "3";
    	//echo $ex;
      $per = array('0' => array('id' => 9, 'codnom' => '*********', 'condicion' => 'NO HAY NOMINA EN EJECUCION' ));
    }

    $this->columnas = Herramientas::getConfigGrid(sfConfig::get('sf_app_module_dir').'/nomespcalculo/'.sfConfig::get('sf_app_module_config_dir_name').'/grid_calculo');
    ///$this->columnas[1][0]->setCatalogo('ccanalis','sf_admin_edit_form',$obj,'Analistas_Ccanalis',$params);

    $this->obj = $this->columnas[0]->getConfig($per);
//h::printR($this->npnomina);
    $this->npnomina->setObjcalculo($this->obj);

  }

  public function executeCalculo()
  {
  $codnom = $this->getRequestParameter('codnom');
  $desde = $this->getRequestParameter('desde');
  $hasta = $this->getRequestParameter('hasta');
  $opsi = $this->getRequestParameter('opsi');
  $msem = $this->getRequestParameter('msem2');
  $cont='no';
  $desde = str_replace('-','/',$desde);
  $hasta = str_replace('-','/',$hasta);

  CalculoNominaEspecial::ValidicionPorEmpleado($codnom,$desde,$hasta,$opsi,$msem,&$cont);


    $sql="delete from tmpcalculoesp where codnom ='".$codnom."' ";
    Herramientas::insertarRegistros($sql);


  $sql="select codnom from tmpcalculoesp";
  if (!(Herramientas::BuscarDatos($sql,&$tabla)))
  {
    $sql = "drop table tmpcalculoesp";
    Herramientas::insertarRegistros($sql);
  }

  system('rm archivo* ');

  //PARA EL POPUP DE FIN DEL CALCULO
  /*$host = $_SERVER["HTTP_HOST"];
  $aux = split('/',$_SERVER["REQUEST_URI"]);
  $uri = '';
  for ($i=0;$i<count($aux)-1;$i++)
    $uri = $uri . $aux[$i]."/";

  $url =  'http://'.$host.$uri.'mensaje/cookiecid/44aa95ac18060e7dcdd80251ef74f733/codnom/'.$codnom;
  system('firefox '.$url,$retval);*/

  return sfView::HEADER_ONLY;
  }
}
