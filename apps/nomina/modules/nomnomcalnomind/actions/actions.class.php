<?php

/**
 * nomnomcalnomind actions.
 *
 * @package    siga
 * @subpackage nomnomcalnomind
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 2288 2006-10-02 15:22:13Z fabien $
 */
class nomnomcalnomindActions extends autonomnomcalnomindActions
{
  private $coderror = -1;

  public function executeIndex()
  {
    return $this->redirect('nomnomcalnomind/edit');
  }


  public function executeEdit()
  {
    if(SF_ENVIRONMENT=='dev'){
      $this->ent='_dev';
    }else
    {
      $this->ent='';
    }
    $this->configGrid();
    parent::executeEdit();

  }

  public function executeAjax()
  {
  $cajtexmos=$this->getRequestParameter('cajtexmos');
     $cajtexcom=$this->getRequestParameter('cajtexcom');
     $codigo=$this->getRequestParameter('codigo');
    if ($this->getRequestParameter('ajax')=='1')
      {

        $consultado = false;
        $datoaux='';
        $datopag='';
        ////LOSTFOCUS
        if ($codigo!='')
        {
        $sql0="Select distinct(A.codnom),B.nomnom from npdefmov A,npnomina B where A.CodNom='".$codigo."' and A.codnom=B.codnom";
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
          $ultfec=$npnomina[0]["ultfec"];
          $profec=split('-',$npnomina[0]["profec"]);

          $fecha1=$profec[0].'-'.$profec[1].'-'.'01';

          $fecha2=Herramientas::dateAdd('m',1,$fecha1,'+');
          $fecha2=Herramientas::dateAdd('d',1,$fecha2,'-');

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
          $fecha2=Herramientas::dateAdd('d',1,$fecha1,'-');

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

          $profec=$npnomina[0]["profec2"];
          $ultfec=$npnomina[0]["ultfec2"];
                $output = '[["npnomina_nomnom","'.$nomnom.'",""],["npnomina_numsem","'.$numerosemanas.'",""],["npnomina_profec","'.$profec.'",""],["npnomina_ultfec","'.$ultfec.'",""],["opsi","'.$opsi.'",""],["msem","'.$msem.'",""],["cajocuaux","'.$datopag.'",""]]';


                $this->configGrid($codigo,$profec);
                $this->getUser()->setAttribute('obj',$this->obj,'nomnomcalnomind');
                $this->getUser()->setAttribute('calculolisto','si','nomnomcalnomind');
                $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');
            //return sfView::HEADER_ONLY;
        }
      }
      else
      {
        $output = '[["npnomina_nomnom","No existe",""],["cajocuaux","'.$datoaux.'",""]]';
        $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');
          return sfView::HEADER_ONLY;
      }
      }
      ////////////////////////////////////////////////////////////////////////////////////
    ////////////////////////////////////////////////////////////////////////////////////
    ////////////////////////////////////////////////////////////////////////////////////
    else if ($this->getRequestParameter('ajax')=='2') // CALCULO DE NOMINA!!!!!!!!!!!
      {
      $codnom=$this->getRequestParameter('npnomina[codnom]');

      if ($codnom!='')
      {
          try{
              $sql = "select id,codnom,condicion from tmpcalculo where codnom='".$codnom."'";
              if (Herramientas::BuscarDatos($sql,&$npnomina))
            {
              $tabla=true;
            }else
                $tabla=false;
          }catch(Exception $ex){
            $sql = "CREATE TABLE tmpcalculo (id int4 NOT NULL,
                                        codnom VARCHAR(3) NOT NULL,
                                                            condicion VARCHAR(10) NOT NULL
                                                  ) WITHOUT OIDS";
            Herramientas::insertarRegistros($sql);
            $tabla=false;
          }

          $desde=$this->getRequestParameter('npnomina[ultfec]');
          $hasta=$this->getRequestParameter('npnomina[profec]');
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

            $obj=$this->getUser()->getAttribute('obj',null,'nomnomcalnomind');
            $objeto = H::CargarDatosGrid($this,$obj);
            $grid = $objeto[0];

            foreach($grid as $o)
            {
              if ($o->getCheck())
                  $objemp[]=$o;
            }
            CalculoNomina::CalPorEmpleado($objemp,$codnom,$desde,$hasta,$opsi,$msem,&$cont);
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
            $sql="select codnom from tmpcalculo";
            if (!(Herramientas::BuscarDatos($sql,&$tabla)))
            {
              $sql = "drop table tmpcalculo";
              Herramientas::insertarRegistros($sql);
            }
          ///////////////////////////////////////////////
          $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');
          return sfView::HEADER_ONLY;

      }else
      {
        $output = '[["controlador","vacio",""]]';
        $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');
        return sfView::HEADER_ONLY;
      }
      }
  }

  public function executeAutocomplete()
  {
    if ($this->getRequestParameter('ajax')=='1')
      {
      $this->tags=Herramientas::autocompleteAjax('CODNOM','Npnomina','Codnom',trim($this->getRequestParameter('npnomina[codnom]')));
      }
      else if ($this->getRequestParameter('ajax')=='2')
      {

      }
  }


  public function handleErrorEdit()
  {
    $this->labels = $this->getLabels();
    if(SF_ENVIRONMENT=='dev'){
      $this->ent='_dev';
    }else
    {
      $this->ent='';
    }
    $this->npnomina= $this->getNpnominaOrCreate();
    $this->updateNpnominaFromRequest();
    $this->configGrid();


    if($this->getRequest()->getMethod() == sfRequest::POST)
    {
      if($this->coderror!=-1){
        $err = Herramientas::obtenerMensajeError($this->coderror);
        $this->getRequest()->setError('',$err);
      }
    }
    return sfView::SUCCESS;

  }

  public function configGrid($codnom='',$hasta='')
  {
  $sql="Select distinct b.id,0 as check,b.cedemp,a.codemp,b.nomemp,a.codcar,b.staemp,b.fecnac,b.fecing,b.sexemp
      from npasicaremp a,nphojint b, npsitemp c
      where a.codnom='".$codnom."' and a.status='V'
        and to_date(to_char(b.fecing,'dd/mm/yyyy'),'dd/mm/yyyy') < to_date('".$hasta."','dd/mm/yyyy')
      and a.codemp=b.codemp --and a.codemp='07415254'
      and b.staemp = c.codsitemp
      and c.calnom = 'S'
      and a.status = 'V'
      order by a.codemp,a.codcar";

  $resp = Herramientas::BuscarDatos($sql,&$per);

  $opciones = new OpcionesGrid();
  $opciones->setTabla('Nphojint');
  $opciones->setAnchoGrid(900);
  $opciones->setTitulo('');
  $opciones->setFilas(0);
  $opciones->setEliminar(false);
  $opciones->setHTMLTotalFilas(' ');

  $col1 = new Columna('Marque');
  $col1->setTipo(Columna::CHECK);
  $col1->setEsGrabable(true);
  $col1->setNombreCampo('check');
  $col1->setHTML(' ');

  $col2 = new Columna('CEDULA TRABAJADOR');
  $col2->setTipo(Columna::TEXTO);
  $col2->setEsGrabable(true);
  $col2->setAlineacionObjeto(Columna::CENTRO);
  $col2->setAlineacionContenido(Columna::CENTRO);
  $col2->setNombreCampo('cedemp');
  $col2->setHTML('type="text" size="10"');

  $col3 = new Columna('CODIGO TRABAJADOR');
  $col3->setTipo(Columna::TEXTO);
  $col3->setEsGrabable(true);
  $col3->setOculta(true);
  $col3->setAlineacionObjeto(Columna::CENTRO);
  $col3->setAlineacionContenido(Columna::CENTRO);
  $col3->setNombreCampo('codemp');
  $col3->setHTML('type="text" size="10"');

  $col4 = new Columna('CODIGO CARGO');
  $col4->setTipo(Columna::TEXTO);
  $col4->setEsGrabable(true);
  $col4->setOculta(true);
  $col4->setAlineacionObjeto(Columna::CENTRO);
  $col4->setAlineacionContenido(Columna::CENTRO);
  $col4->setNombreCampo('codcar');
  $col4->setHTML('type="text" size="10"');

  $col5 = new Columna('NOMBRE TRABAJADOR');
  $col5->setTipo(Columna::TEXTO);
  $col5->setEsGrabable(true);
  $col5->setAlineacionObjeto(Columna::IZQUIERDA);
  $col5->setAlineacionContenido(Columna::IZQUIERDA);
  $col5->setNombreCampo('nomemp');
  $col5->setHTML('type="text" size="60"');

  $col6 = new Columna('FECHA NACIMIENTO');
  $col6->setTipo(Columna::FECHA);
  $col6->setEsGrabable(true);
  $col6->setAlineacionObjeto(Columna::CENTRO);
  $col6->setAlineacionContenido(Columna::CENTRO);
  $col6->setNombreCampo('fecnac');

    $col7 = new Columna('FECHA DE INGRESO');
    $col7->setTipo(Columna::FECHA);
    $col7->setEsGrabable(true);
  $col7->setAlineacionObjeto(Columna::CENTRO);
  $col7->setAlineacionContenido(Columna::CENTRO);
    $col7->setNombreCampo('fecing');

    $opciones->addColumna($col1);
    $opciones->addColumna($col2);
    $opciones->addColumna($col3);
    $opciones->addColumna($col4);
    $opciones->addColumna($col5);
    $opciones->addColumna($col6);
    $opciones->addColumna($col7);


    $this->obj = $opciones->getConfig($per);
  }

}
