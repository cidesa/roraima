<?php

/**
 * nomcalcon actions.
 *
 * @package    siga
 * @subpackage nomcalcon
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 2288 2006-10-02 15:22:13Z fabien $
 */
class nomcalconActions extends autonomcalconActions
{
  public function executeList()
  {
    $this->processSort();

    $this->processFilters();

    $this->filters = $this->getUser()->getAttributeHolder()->getAll('sf_admin/npcalcon/filters');

    // pager
    $this->pager = new sfPropelPager('Npcalcon', 20);
    $c = new Criteria();

  $c->addSelectColumn(NpcalconPeer::CODCON);
  $c->addSelectColumn(NpcalconPeer::CODNOM);
    $c->addSelectColumn("0 AS NUMCON");
    $c->addSelectColumn("'' AS CAMPO");
    $c->addSelectColumn("'' AS OPERADOR");
    $c->addSelectColumn("'' AS VALOR");
    $c->addSelectColumn("'' AS CONFOR");
    $c->addSelectColumn("'' AS TIPCAL");
    $c->addSelectColumn("max(ID) AS ID");
   // $c->addSelectColumn(NpconfonPeer::CODNOM." AS ID");

    $c->addGroupByColumn(NpcalconPeer::CODCON);
    $c->addGroupByColumn(NpcalconPeer::CODNOM);

    $this->addSortCriteria($c);
    $this->addFiltersCriteria($c);
    $this->pager->setCriteria($c);
    $this->pager->setPage($this->getRequestParameter('page', 1));
    $this->pager->init();
  }


  public function executeEdit()
  {
    if(SF_ENVIRONMENT=='dev'){
      $this->ent='_dev';
    }else
    {
      $this->ent='';
    }

    $this->npcalcon = $this->getNpcalconOrCreate();
    $this->lista1 = Constantes::ListaFuncionesCalculoConcepto();
    $this->lista2 = $this->CargarDatosEmpleado();//Constantes::ListaDatosCalculoConcepto();
    if(($this->npcalcon->getId()))
    {
      $c = new Criteria();
      $c->add(NpcalconPeer::ID,$this->npcalcon->getId());
      $obj = NpcalconPeer::doSelectOne($c);
      $this->objlistcon = FormulaConceptos::CargarListasVariables($obj->getCodcon(),$obj->getCodnom(),'C');
      $this->objlistmov = FormulaConceptos::CargarListasVariables($obj->getCodcon(),$obj->getCodnom(),'M');
      $this->objlisthis = FormulaConceptos::CargarListasVariables($obj->getCodcon(),$obj->getCodnom(),'H');
      $this->objlistvar = $this->CargarVariables($obj->getCodnom());
      $this->getUser()->setAttribute('liscon',$this->objlistcon);
      $this->getUser()->setAttribute('lismov',$this->objlistmov);
      $this->getUser()->setAttribute('lishis',$this->objlisthis);
    }else
    {
      $this->objlistcon = array();
      $this->objlistmov = array();
      $this->objlisthis = array();
      $this->objlistvar = array();
    }

    //$this->variables = $this->CargarVariables();
    //$this->configGrid();

    if ($this->getRequest()->getMethod() == sfRequest::POST)
    {
      $this->updateNpcalconFromRequest();

      if ($this->saveNpcalcon($this->npcalcon)=='N')
      {
        $this->setFlash('notice', 'Your modifications have been saved');
$this->Bitacora('Guardo');

        if ($this->getRequestParameter('save_and_add'))
        {
          return $this->redirect('nomcalcon/create');
        }
        else if ($this->getRequestParameter('save_and_list'))
        {
          return $this->redirect('nomcalcon/list');
        }
        else
        {
          return $this->redirect('nomcalcon/edit');
        }
      }else
      {
         return $this->redirect('nomcalcon/list');
      }
    }
    else
    {
      $this->labels = $this->getLabels();
    }
  }


  public function executeAjax()
  {
    $ajax = $this->getRequestParameter('ajax');
    $cajtexmos=$this->getRequestParameter('cajtexmos');
    $cajtexcom=$this->getRequestParameter('cajtexcom');
    $codigo=$this->getRequestParameter('codigo');
    $codcon=$this->getRequestParameter('cod_con');
    $id=$this->getRequestParameter('id');
    $output='';
    $this->cond='';
    switch ($ajax){
      case '1':
        $dato='';
        $c = new Criteria();
        $c->add(NpdefcptPeer::CODCON,$codigo);
        $obj = NpdefcptPeer::doSelectOne($c);
        $objlist=array();
        if($codigo=='')
        {
          $js="disableAllObjetos_(a=new Array('npcalcon_codcon'),true);
            $('npcalcon_codcon').readOnly=false;
            $$('.buttoncat')[0].disabled=false;";
        }elseif ($obj)
        {
          $dato = $obj->getNomcon();
          $result=array();
          $sql="select distinct(a.codnom) as codigo, a.nomnom as nombre from npnomina a, npasicarnom b, npasiconnom c where
              c.codnom = b.codnom and
              b.codnom = a.codnom and
              c.codcon = '".$codigo."' ";
          if (Herramientas::BuscarDatos($sql,&$result))
          {
            $dato2='si';
              $this->getUser()->setAttribute('remnom',$result,'nomcalcon');
            $result2=array();
            $sql2="Select distinct(a.CodCon) as codcon, b.nomcon from NPASICONNOM a, npdefcpt b, npcalcon c where a.codcon=b.codcon and a.codcon = c.codcon Order By CodCon";
            if (Herramientas::BuscarDatos($sql2,&$result2))
            {

              $i=0;
              $objlist = array();
              $r=0;
              while ($i<count($result2))
              {
                if ($result2[$i]["codcon"] < $codigo)
                {
                  $v = "C" . $result2[$i]["codcon"] . "S";
                  $objlist[$v] = "C" . $result2[$i]["codcon"] . "S" . " " . $result2[$i]["nomcon"] ;
                  //$r++;
                  $v = "C" . $result2[$i]["codcon"] . "A";
                  $objlist[$v] = "C" . $result2[$i]["codcon"] . "A" . " " . $result2[$i]["nomcon"];
                    //$r++;
                }
                $i++;
              }
            }
            $js="disableAllObjetos_(a=new Array('npcalcon_codcon','npcalcon_codnom'),true);
                $$('.buttoncat')[1].disabled=false;
                $('npcalcon_codcon').readOnly=true;
                $$('.sf_admin_action_list')[0].disabled=false;
                $$('.sf_admin_action_create')[0].disabled=false;
              $('npcalcon_codnom').focus();";

          }else
          {
            $dato2='';$objlist=array();
            $js="alert('No existen nominas para los cargos asignados con este concepto');
              $('npcalcon_codcon').value='';
              $('npcalcon_codnom').value='';
              $('npcalcon_nomcon').value='';";
          }
        }
        else
        {
          $dato='';$dato2='';$objlist=array();
          $js="alert_('C&oacute;digo del Concepto no existe');
            $('npcalcon_codnom').value='';
            $('npcalcon_codcon').value=''";
        }

        $this->cond='1';
        $this->objlist = $objlist;
        $this->getUser()->setAttribute('liscon',$objlist);
        $output = '[["'.$cajtexmos.'","'.$dato.'",""],["javascript","'.$js.'",""]]';
        $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');

        break;
      case '2':
        $c = new Criteria();
        $c->add(NpnominaPeer::CODNOM,$codigo);
        $obj = NpnominaPeer::doSelectOne($c);
        $objlist=array();
        $objlist2=array();
        $controlador=false;
        $dato='';
        $js='';
        if($codigo=='')
        {
          $js="disableAllObjetos_(a=new Array('npcalcon_codcon','npcalcon_codnom'),true);
                $$('.buttoncat')[1].disabled=false;
                $('npcalcon_codcon').readOnly=true;
                $$('.sf_admin_action_list')[0].disabled=false;
                $$('.sf_admin_action_create')[0].disabled=false;
              $('npcalcon_codnom').focus();";
        }else
        {
          if ($obj)
          {
            $dato = $obj->getNomnom();
            $remnom = $this->getUser()->getAttribute('remnom',null,'nomcalcon');
            if ($remnom)
            {
              for ($a=0;$a<count($remnom);$a++)
              {
                if(($remnom[$a]["codigo"])==$codigo)
                {
                  $controlador=true;
                  break;
                }
              }
                          if ($controlador==true)
                          {
                //$dato2='si';
                $result=array();
                $sql="Select A.CODNOM,A.CODCON,A.STATUS,C.NOMCON from NPDEFCPT C,NPDEFMOV A,NPASICONNOM B
                    WHERE A.CODCON=C.CODCON AND A.CODCON=B.CODCON AND A.CODNOM=B.CODNOM AND A.CodNom = '".$codigo."'
                    ORDER BY A.CODCON,A.STATUS ";
                if (Herramientas::BuscarDatos($sql,&$result))
                {
                  $i=0;
                                $r=0;
                  while ($i<count($result))
                  {
                    $v = "M" . $result[$i]["codnom"] . $result[$i]["codcon"] . $result[$i]["status"];
                    $objlist[$v] = "M" . $result[$i]["codnom"] . $result[$i]["codcon"] . $result[$i]["status"] . " " . $result[$i]["nomcon"];
                    //$r++;
                    $i++;
                  }
                  $c2 = new Criteria();
                  $obj2 = NpdefcptPeer::doSelect($c2);
                  if ($obj2)
                  {
                    $r=0;
                    foreach ($obj2 as $res)
                    {
                      $c3 = new Criteria();
                      $c3->add(NpdefmovPeer::CODCON,$res->getCodcon());
                      $c3->setDistinct();
                      $obj3 = NpdefmovPeer::doSelect($c3);
                      if ($obj3)
                      {
                        foreach ($obj3 as $o)
                        {
                          $v = "H" . $o->getCodnom() . $res->getCodcon();
                          $objlist2[$v] = "H" . $o->getCodnom() . $res->getCodcon() . " " . $res->getNomcon();
                          //$r++;
                        }
                      }else
                      {
                        $v = "H" . $codigo . $res->getCodcon();
                        $objlist2[$v] = "H" . $codigo . $res->getCodcon() . " " . $res->getNomcon();
                        //$r++;
                      }
                    }
                  }
                }else
                {

                }
                          }else
                           {
                             //$dato2='';
                             $js="alert('Codigo de la nomina no existe para un cargo asignado con el concepto ' + $('npcalcon_codcon').value);
                  $('npcalcon_codnom').value='';
                  $('npcalcon_nomnom').value='';
                  $('npcalcon_codnom').focus();
                  //var condicion = false;";
                           }

            }else
            {
              //$dato='no';$dato2='';
              $js="alert('Codigo de la nomina no existe para los cargos asignados al concepto');
                $('npcalcon_codnom').value='';
                $('npcalcon_nomnom').value='';
                $('npcalcon_codnom').focus();
                //var condicion = false;";
            }


          }else
          {
            //$dato='';$dato2='';
            $js="alert('Codigo de la nomina no existe ');
              $('npcalcon_codnom').value='';
              $('npcalcon_nomnom').value='';
              $('npcalcon_codnom').focus();
              //var condicion = false;";
          }
          $this->cond='2';
          $this->objlist = $objlist;

          $this->getUser()->setAttribute('nominacod',$codigo);

          $this->getUser()->setAttribute('objlist2',$objlist2);

          $this->getUser()->setAttribute('lismov',$objlist);
          $this->getUser()->setAttribute('lishis',$objlist2);

          $r = NominaConceptos::ValidarExistenciaDatos($codigo,$codcon);

          $js.="toAjaxUpdater('divVariables',5,getUrlModulo()+'ajax');
              toAjaxUpdater('divHistoricos',3,getUrlModulo()+'ajax');
                ";

          if ($r==0)
          {
            //$dato3='';
            if(empty($id))
            {
              $js="alert('Este concepto con esta nomina fueron calculados vaya a lista si desea modificarlos');
                app=location.pathname;
                apparray=app.split('/');
                       location=('/'+apparray[1]+'/nomcalcon/create');
                       //var condicion = false;";

            }

          }else
          {
            //$dato3='si';
            $js.="disableAllObjetos_(a=new Array(),false);
                  $('npcalcon_codcon').readOnly=true;
                   $('npcalcon_codnom').readOnly=true;
                   $$('.sf_admin_action_list')[0].disabled=false;
                  $$('.sf_admin_action_save')[0].disabled=false;";
          }
        }
        $output = '[["'.$cajtexmos.'","'.$dato.'",""],["javascript","'.$js.'",""]]';
        $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');

        break;
      case '3':

          $objlist2=array();
          $this->cond='3';
          $this->objlist2 = $this->getUser()->getAttribute('objlist2');

          break;

      case '4':
        $dato=FordeforgpubPeer::getOrganismo($codigo);

             $output = '[["'.$cajtexmos.'","'.$dato.'",""]]';
             $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');
         return sfView::HEADER_ONLY;

          break;

      case '5':

          $this->variables=array();
          $this->cond='4';
          $codigonom = $this->getUser()->getAttribute('nominacod');
          $this->variables = $this->CargarVariables($codigonom);

          break;

      case '6':
          $codigo = $this->getRequestParameter('codigo');


        break;
      default:
        $cadena = $this->getRequestParameter('cajgrid3');
          $nomina = $this->getRequestParameter('npcalcon[codnom]');
          //$formula = $this->getRequestParameter('codigo');
          $lisfun = Constantes::ListaFuncionesCalculoConcepto();
          $lisemp = Constantes::ListaDatosCalculoConcepto();
          $lisvar = $this->CargarVariables($nomina);
          $liscon = $this->getUser()->getAttribute('liscon');
          $lismov = $this->getUser()->getAttribute('lismov');
          $lishis = $this->getUser()->getAttribute('lishis');

        $ecuacion = Nomina::posfix($cadena);
        Nomina::evalEcua(&$ecuacion,&$resecu,&$error,"","","",$nomina,$liscon,$lismov,$lisvar,$lisfun,$lisemp,$lishis,date("d/m/Y"),"","","",$vars='',$especial='NO');

        if ($vars != "")
            $vars = "Con" . $vars;

        if ($error && $cadena!="" )
        {
          $dato = '-1';
        }else
        {
          $dato='';
        }

        $output = '[["cajgrid2","'.$dato.'",""]]';
        $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');
        return sfView::HEADER_ONLY;
          break;
    }
    //$this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');
    //return sfView::HEADER_ONLY;
  }

    public function CargarDatosEmpleado()
    {

      $sima = '';
      $sima = $this->getUser()->getAttribute('empresa',null);
      $sima = 'SIMA'.$sima;

      $sql="SELECT attname as Column_Name,col_description(attrelid,attnum) as Comentario,'E'||lpad(rtrim(ltrim(to_char(attnum-1,'99'))),2,'0') as col
      From pg_namespace, pg_attribute, pg_type, pg_class
      Where pg_namespace.nspname ='".$sima."'
      AND relnamespace = pg_namespace.oid
      AND relname ='nphojint' AND attnum >= 1
      AND pg_type.oid = atttypid
      AND pg_class.oid = attrelid
      AND coalesce(col_description(attrelid,attnum),' ') <> ' '
      order by attnum";

    $listaemp = array();
    if (Herramientas::BuscarDatos($sql,&$result))
    {

      foreach ($result as $resp)
      {
        $listaemp[$resp["col"]] = $resp["col"] . " " . $resp["comentario"] ;
      }
    }

    return $listaemp;

    }

    public function CargarVariables($codigonomina)
    {
    $c = new Criteria();
    $c->add(NpdefvarPeer::CODNOM,$codigonomina);
    $c->addAscendingOrderByColumn(NpdefvarPeer::CODVAR);
    $obj = NpdefvarPeer::doSelect($c);
    $objlist = array();
    if ($obj)
    {

      $r=0;
      foreach ($obj as $o)
      {
        if ($o->getValor1()!='')
                {
           $v = "V" . $o->getCodvar() . "1";
           $objlist[$v] = "V" . $o->getCodvar() . "1" ." " .$o->getDesvar() . " 1";
           //$r++;
                }
                if ($o->getValor2()!='0')
                {
                   $v = "V" . $o->getCodvar() . "2";
           $objlist[$v] = "V" . $o->getCodvar() . "2" . " ".$o->getDesvar() . " 2";
           //$r++;
                }
                if ($o->getValor3()!='0')
                {
                   $v = "V" . $o->getCodvar() . "3";
           $objlist[$v] = "V" . $o->getCodvar() . "3" . " ". $o->getDesvar() . " 3";
           //$r++;
                }
                if ($o->getValor4()!='0')
                {
                   $v = "V" . $o->getCodvar() . "4";
           $objlist[$v] = "V" . $o->getCodvar() . "4" . " " . $o->getDesvar() . " 4";
           //$r++;
                }
                if ($o->getValor5()!='0')
                {
                   $v = "V" . $o->getCodvar() . "5";
           $objlist[$v] = "V" . $o->getCodvar() . "5" .  " ". $o->getDesvar() . " 5";
           //$r++;
                }

      }

      return $objlist;

    }
    else
        return $objlist=array();
    }

  protected function saveNpcalcon($npcalcon)
  {
    $tipo = $this->getUser()->getAttribute('tipo',null,'nomcalcon');

    //$this->updateNpcalconFromRequest();
    $grid=Herramientas::CargarDatosGrid($this,$this->obj);
    /*$c = new Criteria();
    $c->add(NpcalconPeer::CODCON,$npcalcon->getCodcon());
    $c->add(NpcalconPeer::CODNOM,$npcalcon->getCodnom());
    NpcalconPeer::doDelete($c);
    if ($obj)
    {
      foreach($obj as $o)
      {
        $o->delete();
      }
    }*/
    Nomina::salvar_npcalcon($npcalcon,$grid,$tipo);
    if ($npcalcon->getId())
    {
      return 'C';
    }else
    {
      return 'N';
    }



  }


  protected function deleteNpcalcon($npcalcon)
  {

    $coderr = -1;

    // habilitar la siguiente línea si se usa grid
    //$grid=Herramientas::CargarDatosGrid($this,$this->obj);

    try {

      // Modificar la siguiente línea para llamar al método
      // correcto en la clase del negocio, ej:
      // $coderr = Compras::EliminarAlmaujoc($caajuoc,$grid);

      // OJO ----> Eliminar esta linea al modificar este método
          $c = new Criteria();
          $c->add(NpcalconPeer::CODCON,$npcalcon->getCodcon());
          $c->add(NpcalconPeer::CODNOM,$npcalcon->getCodnom());
          $obj = NpcalconPeer::doSelect($c);

          if ($obj)
          {
            foreach($obj as $o)
            {
              $o->delete();
            }
          }

      /*if(is_array($coderr)){
        foreach ($coderror as $ERR){
          $err = Herramientas::obtenerMensajeError($ERR);
          $this->getRequest()->setError('',$err);
          $this->ActualizarGrid();
        }
      }elseif($coderr!=-1){
        $err = Herramientas::obtenerMensajeError($coderror);
        $this->getRequest()->setError('',$err);
        $this->ActualizarGrid();
      }*/


    } catch (Exception $ex) {

      $coderror = 0;
      $err = Herramientas::obtenerMensajeError($coderror);
      $this->getRequest()->setError('',$err);

    }

  }

  public function validateEdit()
  {
    $resp=-1;

    // Se deben llamar a las funciones necesarias para cargar los
    // datos de la vista que serán usados en las funciones de validación.
    // Por ejemplo:

    if($this->getRequest()->getMethod() == sfRequest::POST){

      $this->npcalcon = $this->getNpcalconOrCreate();
      $this->updateNpcalconFromRequest();
      // $this->configGrid();
      $grid = Herramientas::CargarDatosGrid($this,$this->obj);

      // Aqui van los llamados a los métodos de las clases del
      // negocio para validar los datos.
      // Los resultados de cada llamado deben ser analizados por ejemplo:

      $resp = Nomina::validarNomcalcon($this->npcalcon,$grid,&$tipo);

      $this->getUser()->setAttribute('tipo',$tipo,'nomcalcon');

      // o
       //Para que el codigo no se pueda cambiar al editar el registro:
       //$this->tstipmov= $this->getTstipmovOrCreate();
       //$tstipmov = $this->getRequestParameter('tstipmov');
       //$valor = $tstipmov['codtip'];
       //$campo='codtip';

       //$resp=Herramientas::ValidarCodigo($valor,$this->tstipmov,$campo);

      // al final $resp es analizada en base al código que retorna
      // Todas las funciones de validación y procesos del negocio
      // deben retornar códigos >= -1. Estos código serám buscados en
      // el archivo errors.yml en la función handleErrorEdit()

      if($resp!=-1){
        $this->coderror = $resp;
        return false;
      } else return true;

    }else return true;



  }

  public function handleErrorEdit()
  {

    if($this->getRequest()->getMethod() == sfRequest::POST)
    {

      $this->preExecute();


      if($this->coderror!=-1){
        $err = Herramientas::obtenerMensajeError($this->coderror);
        $this->getRequest()->setError('',$err);
      }

      $this->labels = $this->getLabels();


      if(SF_ENVIRONMENT=='dev'){
          $this->ent='_dev';
        }else
        {
          $this->ent='';
        }

        $this->npcalcon = $this->getNpcalconOrCreate();
        $this->updateNpcalconFromRequest();
        $this->lista1 = Constantes::ListaFuncionesCalculoConcepto();
        $this->lista2 = $this->CargarDatosEmpleado();

      $c = new Criteria();
    $c->add(NpcalconPeer::ID,$this->npcalcon->getId());
    $obj = NpcalconPeer::doSelectOne($c);
    $this->objlistcon = FormulaConceptos::CargarListasVariables($obj->getCodcon(),$obj->getCodnom(),'C');
    $this->objlistmov = FormulaConceptos::CargarListasVariables($obj->getCodcon(),$obj->getCodnom(),'M');
    $this->objlisthis = FormulaConceptos::CargarListasVariables($obj->getCodcon(),$obj->getCodnom(),'H');
    $this->objlistvar = $this->CargarVariables($obj->getCodnom());

    }
    return sfView::SUCCESS;

  }


  public function configGrid($codcon='',$codnom='')
  {
    /////PARA LA CONSULTA//////
    $c = new Criteria();
      $c->add(NpcalconPeer::CODCON,$codcon);
      $c->add(NpcalconPeer::CODNOM,$codnom);
      $c->addAscendingOrderByColumn(NpcalconPeer::NUMCON);
      $per = NpcalconPeer::doSelect($c);
          ///FIN CONSULTA///

    ////OPCIONES DEL GRID//////
    $opciones = new OpcionesGrid();
    $opciones->setEliminar(true);
      $opciones->setTabla('Npcalcon');
      $opciones->setAnchoGrid(800);
      $opciones->setFilas(50);
      $opciones->setTitulo('');
      $opciones->setHTMLTotalFilas(' ');
       ///FIN OPCIONES///

    /////COLUMNAS///////

      $col1 = new Columna('Campo');
      $col1->setTipo(Columna::TEXTO);
      $col1->setEsGrabable(true);
      $col1->setAlineacionObjeto(Columna::CENTRO);
      $col1->setAlineacionContenido(Columna::CENTRO);
      $col1->setNombreCampo('campo');
      $col1->setHTML('type="text" size="20" maxlength="35"  readonly=true');


    $col2 = new Columna('Operador');
      $col2->setTipo(Columna::COMBO);
      $col2->setEsGrabable(true);
      $col2->setAlineacionObjeto(Columna::CENTRO);
      $col2->setAlineacionContenido(Columna::CENTRO);
      $col2->setNombreCampo('operador');
      $col2->setCombo(Constantes::ListaOperadores());
      $col2->setHTML(' style=width:50px');

    $col3 = new Columna('Valor');
      $col3->setTipo(Columna::TEXTO);
      $col3->setEsGrabable(true);
      $col3->setAlineacionObjeto(Columna::CENTRO);
      $col3->setAlineacionContenido(Columna::CENTRO);
      $col3->setNombreCampo('valor');
      $col3->setJScript('onFocus="condicionValor(this.id)"  onBlur="event.keyCode=13; condicionValor2(event,this.id)" onKeyUp="condicionValor3(this,this.id)" ');
      $col3->setHTML('type="text" size="25" maxlength="30" ');

    $col4 = new Columna('Definicion Fórmula');
      $col4->setTipo(Columna::COMBO);
      $col4->setAlineacionObjeto(Columna::CENTRO);
      $col4->setAlineacionContenido(Columna::CENTRO);
      $col4->setNombreCampo('combito');
      $col4->setCombo(Constantes::OperacionesBasica());
      $col4->setJScript('onchange="ajaxgrid(this.id)"');
      $col4->setHTML(' style=width:80px ');


    $col5 = new Columna('Condición/Fórmula');
      $col5->setTipo(Columna::TEXTO);
      $col5->setEsGrabable(true);
      $col5->setAlineacionObjeto(Columna::CENTRO);
      $col5->setAlineacionContenido(Columna::CENTRO);
      $col5->setNombreCampo('confor');
      $col5->setHTML('type="text" size="100" maxlength="250" readonly="true"');
      $col5->setJScript('onFocus="PreFormula(this.id)" onKeyPress="PostFormula(event,this.id)" ');

      $opciones->addColumna($col1);
      $opciones->addColumna($col2);
      $opciones->addColumna($col3);
      $opciones->addColumna($col4);
      $opciones->addColumna($col5);

         ///FIN COLUMNAS///

      $this->obj = $opciones->getConfig($per);


  }


  public function executeAutocomplete()
  {
  if ($this->getRequestParameter('ajax')=='1')
  {
    $this->tags=Herramientas::autocompleteAjax('CODCON','Npdefcpt','Codcon',$this->getRequestParameter('npcalcon[codcon]'));
  }

  }

 protected function getNpcalconOrCreate($id = 'id')
  {
    if (!$this->getRequestParameter($id))
    {
      $npcalcon = new Npcalcon();
      $this->configGrid();
    }
    else
    {
      $npcalcon = NpcalconPeer::retrieveByPk($this->getRequestParameter($id));

      $this->forward404Unless($npcalcon);
      $this->configGrid($npcalcon->getCodcon(),$npcalcon->getCodnom());
    }

    return $npcalcon;
  }


}

