<?php

/**
 * almmiginvfis actions.
 *
 * @package    siga
 * @subpackage almmiginvfis
 * @author     $Auhor$ <desarrollo@cidesa.com.ve>
 * @version    SVN: $Id: actions.class.php 32371 2009-09-01 16:06:59Z lhernandez $
 * @copyright  Copyright 2007, Cidesa C.A.
 */

class almmiginvfisActions extends autoalmmiginvfisActions
{

  public function executeList()
  {
    $this->redirect('almmiginvfis/create');
  }

  // Para incluir funcionalidades al executeEdit()
  public function editing()
  {
    $currentFile = sfConfig::get('sf_upload_dir')."/assets/archivo_excel.xls";
    $arc='N';
    if (is_file($currentFile))
            $arc='S';
    $this->params=array('archivo'=>$arc);

  }

  protected function updateCainvfisFromRequest()
  {
        if (!$this->getRequest()->hasErrors() && $this->getRequest()->getFileSize('cainvfis[archixls]'))
	    {
	        $fileName = "archivo_excel.xls";
	        $this->getRequest()->moveFile('cainvfis[archixls]', sfConfig::get('sf_upload_dir')."/assets/".$fileName);
	    }
  }

  public function configGrid($reg = array(),$regelim = array())
  {
    $this->regelim = $regelim;

    if(!count($reg)>0)
    {
      // Aquí va el código para traernos los registros que contendrá el grid
      $reg = array();
      // Aquí va el código para generar arreglo de configuración del grid

    $this->obj = array();
    }

    // Insertar el criterio de la busqueda de registros del Grid
    // Por ejemplo:

    // $c = new Criteria();
    // $c->add(CaartaocPeer::AJUOC ,$this->caajuoc->getAjuoc());
    // $reg = CaartaocPeer::doSelect($c);

    // De esta forma se carga la configuración del grid de un archivo yml
    // y se le pasa el parámetro de los registros encontrados ($reg)
    //                                                                            /nombreformulario/
    // $this->obj = Herramientas::getConfigGrid(sfConfig::get('sf_app_module_dir').'/formulario/'.sfConfig::get('sf_app_module_config_dir_name').'/grid_caartaoc',$reg);

    // Si no se quiere cargar la configuración del grid de un .yml, sedebe hacer a pie.

    // Se genera el arreglo de opciones necesario para generar el grid

     $this->obj = Herramientas::getConfigGrid(sfConfig::get('sf_app_module_dir').'/almmiginvfis/'.sfConfig::get('sf_app_module_config_dir_name').'/grid');

     $this->obj = $this->obj[0]->getConfig($reg);
     $this->cainvfis->setObj($this->obj);



  }

  public function executeAjax()
  {

    $codigo = $this->getRequestParameter('codigo','');
    // Esta variable ajax debe ser usada en cada llamado para identificar
    // que objeto hace el llamado y por consiguiente ejecutar el código necesario
    $ajax = $this->getRequestParameter('ajax','');

    // Se debe enviar en la petición ajax desde el cliente los datos que necesitemos
    // para generar el código de retorno, esto porque en un llamado Ajax no se devuelven
    // los datos de los objetos de la vista como pasa en un submit normal.

    switch ($ajax){
      case '1':
        // La variable $output es usada para retornar datos en formato de arreglo para actualizar
        // objetos en la vista. mas informacion en
        // http://201.210.211.26:8080/www/wiki/index.php/Agregar_Ajax_para_buscar_una_descripcion
        $per=array();
        $js="";
        $mensaje='';
      	$this->cainvfis = $this->getCainvfisOrCreate();
        $this->updateCainvfisFromRequest();

        $data = new Spreadsheet_Excel_Reader();
        $data->setOutputEncoding('CP1251');
        $currentFile = sfConfig::get('sf_upload_dir')."/assets/archivo_excel.xls";
        if (is_file($currentFile))
        {
            $data->read($currentFile);
            $r=0;
            $codalm='';
            $nomalm='';
            $codubi='';
            $nomubi='';
            $codart='';
            $fecha=date('d/m/Y');
            for($i=0;$i<count($data->sheets);$i++)
            {
                foreach($data->sheets[$i]['cells'] as $dat){
                  if(array_key_exists('1', $dat))
                  {
                    $c = new Criteria();
                    $obj = CadefartPeer::doSelectone($c);
                    if($obj)
                    {
                        if(strlen($obj->getForart())==strlen($dat[1]))
                        {
                            $aux1=split('-',$obj->getForart());
                            $aux2=split('-',$dat[1]);
                            if(count($aux1)==count($aux2))
                            {
                                $codart=$dat[1];
                                $c = new Criteria();
                                $c->add(CaregartPeer::CODART,$codart);
                                $reg = CaregartPeer::doSelect($c);
                                if($reg)
                                {
                                    $per[$r]['codart']=$codart;
                                    $per[$r]['desart']=H::GetX('Codart','Caregart','desart',$codart);
                                    $per[$r]['fecinv']=$fecha;
                                    $per[$r]['codalm']=$codalm;
                                    $per[$r]['desalm']=$nomalm;
                                    $per[$r]['codubi']=$codubi;
                                    $per[$r]['desubi']=$nomubi;
                                    $per[$r]['presen']= array_key_exists('3', $dat) ? $dat[3] : '';
                                    $per[$r]['reluni']= array_key_exists('4', $dat) ? $dat[4] : 0;
                                    $per[$r]['exiact']= array_key_exists('11', $dat) ? $dat[11] : 0;
                                    $per[$r]['id']=9;
                                    $r++;
                                }
                            }
                        }
                    }
                    else
                        $mensaje="No hay definición Previa de Articulos";
                  }elseif(array_key_exists('6', $dat))
                  {
                    if(count($dat)==1)
                    {
                        if(strrpos(strtolower($dat[6]),"fecha")!==false)
                        {
                            $fecha = trim(substr($dat[6],strrpos($dat[6],":")+1));
                        }
                        if(strrpos(strtolower($dat[6]),"instalaci")!==false)
                        {
                            $alm = trim(substr($dat[6],strrpos($dat[6],":")+1));
                            $auxalm = split("/",$alm);
                            count($auxalm)>0 ? $codalm = trim($auxalm[0]) : $codalm = '';
                            $nomalm=H::GetX('Codalm','Cadefalm','nomalm',$codalm);
                        }
                        if(strrpos(strtolower($dat[6]),"ubicaci")!==false)
                        {
                            $ubi = trim(substr($dat[6],strrpos($dat[6],":")+1));
                            $auxubi = split("/",$ubi);
                            count($auxubi)>0 ? $codubi = trim($auxubi[0]) : $codubi = '';
                            $nomubi=H::GetX('Codubi','Cadefubi','nomubi',$codubi);
                        }
                    }
                  }else
                      $mensaje="No se pudo leer la Información del Archivo, revisar archivo xls";
                }
            }
            if(!$per)
                $mensaje="Los Articulos en el archivo xls no existen en la definición de Articulos del Sistema";
            unlink($currentFile);
        }else
        {
                $js="alert('Debe existir un archivo cargado previamente');";
                $mensaje="No hay Archivos Cargados, debe cargar un archivo primero";

        }
        $this->configGrid($per);
        $output = '[["javascript","'.$js.'",""],["","",""],["","",""]]';

        break;
      default:

        $output = '[["","",""],["","",""],["","",""]]';
        break;
    }
    $this->datos=$per;
    $this->mensaje=$mensaje;
    // Instruccion para escribir en la cabecera los datos a enviar a la vista
    $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');
    // Si solo se va usar ajax para actualziar datos en objetos ya existentes se debe
    // mantener habilitar esta instrucción
    #return sfView::HEADER_ONLY;

    // Si por el contrario se quiere reemplazar un div en la vista, se debe deshabilitar
    // por supuesto tomando en cuenta que debe existir el archivo ajaxSuccess.php en la carpeta templates.

  }


  /**
   *
   * Función que se ejecuta luego los validadores del negocio (validators)
   * Para realizar validaciones específicas del negocio del formulario
   * Para mayor información vease http://www.symfony-project.org/book/1_0/06-Inside-the-Controller-Layer#chapter_06_validation_and_error_handling_methods
   *
   */
  public function validateEdit()
  {
    $this->coderr =-1;

    // Se deben llamar a las funciones necesarias para cargar los
    // datos de la vista que serán usados en las funciones de validación.
    // Por ejemplo:

    if($this->getRequest()->getMethod() == sfRequest::POST){

      // $this->configGrid();
      // $grid = Herramientas::CargarDatosGrid($this,$this->obj);

      // Aqui van los llamados a los métodos de las clases del
      // negocio para validar los datos.
      // Los resultados de cada llamado deben ser analizados por ejemplo:

      // $resp = Compras::validarAlmajuoc($this->caajuoc,$grid);

       //$resp=Herramientas::ValidarCodigo($valor,$this->tstipmov,$campo);

      // al final $resp es analizada en base al código que retorna
      // Todas las funciones de validación y procesos del negocio
      // deben retornar códigos >= -1. Estos código serám buscados en
      // el archivo errors.yml en la función handleErrorEdit()

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
    $this->configGrid();

    $grid = Herramientas::CargarDatosGridv2($this,$this->obj,true);

  }

  public function saving($clasemodelo)
  {
    $this->configGrid();
    $grid = Herramientas::CargarDatosGridv2($this,$this->obj,true);

    if(count($grid[0])>=1)
    {
        foreach($grid[0] as $reg)
        {
            $c = new Criteria();
            $c->add(CainvfisPeer::CODART,$reg['codart']);
            $c->add(CainvfisPeer::CODALM,$reg['codalm']);
            $c->add(CainvfisPeer::CODUBI,$reg['codubi']);
            $obj = CainvfisPeer::doSelectOne($c);
            if($obj)
            {

                $obj->setExiact(intval($obj->getExiact())+intval($reg['exiact']));
                $obj->save();
            }else
            {
                $objinv = new Cainvfis();
                $objinv->setCodart($reg['codart']);
                $objinv->setCodalm($reg['codalm']);
                $objinv->setCodubi($reg['codubi']);
                $auxfec = split("/",$reg['fecinv']);
                $objinv->setFecinv(date('Y-m-d',strtotime($auxfec[2].'-'.$auxfec[1].'-'.$auxfec[0])));
                $objinv->setExiact($reg['exiact']);
                $objinv->setExiact2(0);
                $objinv->save();
            }
            $c = new Criteria();
            $c->add(CaregartPeer::CODART,$reg['codart']);
            $per = CaregartPeer::doSelectOne($c);
            if($per)
            {
              $per->setUnialt($reg['presen']);
              $per->setRelart($reg['reluni']);
              $per->save();
            }
        }
        return '-1';
    }else
    return '-1';#parent::saving($clasemodelo);
  }

  public function deleting($clasemodelo)
  {
    return $this->forward('almmiginvfis', 'create');
  }


}
