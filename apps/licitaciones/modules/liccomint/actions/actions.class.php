<?php

/**
 * liccomint actions.
 *
 * @package    siga
 * @subpackage liccomint
 * @author     $Auhor$ <desarrollo@cidesa.com.ve>
 * @version    SVN: $Id: actions.class.php 32371 2009-09-01 16:06:59Z lhernandez $
 * @copyright  Copyright 2007, Cidesa C.A.
 */

class liccomintActions extends autoliccomintActions
{

  // Para incluir funcionalidades al executeEdit()
  public function editing()
  {

    $this->configGrid();
  }

  public function configGrid()
  {
    if($this->licomint->getNumcomint()=='')
        $this->configGridArt();
    $this->configGridReq();
  }

  public function configGridArt($reg = array(),$regelim = array())
  {
    $this->regelim = $regelim;
    if(!count($reg)>0)
    {
        $sql = "select '0' as check,a.codart, a.desart, a.unimed, max(a.id) as id
                from caregart a, caartsol b, casolart c
                where
                a.codart=b.codart and
                b.reqart=c.reqart and
                c.stareq='A'
                group by
                a.codart, a.desart, a.unimed
                order by codart
                ";
        H::BuscarDatos($sql, $reg);
    }
    $this->columnas = Herramientas::getConfigGrid(sfConfig::get('sf_app_module_dir').'/liccomint/'.sfConfig::get('sf_app_module_config_dir_name').'/gridart');
    $this->obj2 =$this->columnas[0]->getConfig($reg);
    $this->licomint->setObjart($this->obj2);
  }

  public function configGridReq($codart='')
  {
    if($this->licomint->getNumcomint()=='')
       $sqlli = "b.codart||b.reqart not in (select codart||reqart from lidetcomint) and b.codart='$codart' and";
    else
       $sqlli = "b.codart||b.reqart in (select codart||reqart from lidetcomint where numcomint='".$this->licomint->getNumcomint()."') and";
    
        $sql = "select '0' as check,c.unires,d.desubi,b.reqart,to_char(c.fecreq,'dd/mm/yyyy') as fecreq,
            FormatoNum(b.canreq) as canreq,FormatoNum(b.costo) as costo,Formatonum(b.montot) as montot, max(a.id) as id, '$codart' as codart
            from caregart a, caartsol b, casolart c, bnubica d
            where
            $sqlli
            a.codart=b.codart and
            b.reqart=c.reqart and
            d.codubi=c.unires and
            c.stareq='A'            
            group by
            c.unires,d.desubi,b.reqart,c.fecreq,b.canreq,b.costo,b.montot
            order by b.reqart
            ";

    H::BuscarDatos($sql, $reg);
    
    $this->columnas = Herramientas::getConfigGrid(sfConfig::get('sf_app_module_dir').'/liccomint/'.sfConfig::get('sf_app_module_config_dir_name').'/gridreq');
    $this->columnas[1][0]->setHtml('size=5 disabled=true');
    $this->obj =$this->columnas[0]->getConfig($reg);
    $this->licomint->setObjreq($this->obj);
  }

  public function executeAjax()
  {

    $codigo = $this->getRequestParameter('codigo','');
    $cajtexmos = $this->getRequestParameter('cajtexmos','');
    // Esta variable ajax debe ser usada en cada llamado para identificar
    // que objeto hace el llamado y por consiguiente ejecutar el código necesario
    $ajax = $this->getRequestParameter('ajax','');
    $sw=true;
    // Se debe enviar en la petición ajax desde el cliente los datos que necesitemos
    // para generar el código de retorno, esto porque en un llamado Ajax no se devuelven
    // los datos de los objetos de la vista como pasa en un submit normal.

    switch ($ajax){
      case '1':
        // La variable $output es usada para retornar datos en formato de arreglo para actualizar
        // objetos en la vista. mas informacion en
        // http://201.210.211.26:8080/www/wiki/index.php/Agregar_Ajax_para_buscar_una_descripcion
        $dato = H::GetX('Codcom','Licomlic','Descom',$codigo);
        $dato2 = H::GetX('Codcom','Licomlic','Respon',$codigo);
        $output = '[["'.$cajtexmos.'","'.$dato.'",""],["licomint_respon","'.$dato2.'",""],["","",""]]';
        break;
      case '2':
        // La variable $output es usada para retornar datos en formato de arreglo para actualizar
        // objetos en la vista. mas informacion en
        // http://201.210.211.26:8080/www/wiki/index.php/Agregar_Ajax_para_buscar_una_descripcion
        $sw=false;
        $this->licomint = $this->getLicomintOrCreate();
        $this->updateLicomintFromRequest();
        $this->configGridReq($codigo);        
        $output = '[["","",""],["","",""],["","",""]]';
        break;
      default:
        $output = '[["","",""],["","",""],["","",""]]';
    }

    // Instruccion para escribir en la cabecera los datos a enviar a la vista
    $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');

    // Si solo se va usar ajax para actualziar datos en objetos ya existentes se debe
    // mantener habilitar esta instrucción
    if($sw)
        return sfView::HEADER_ONLY;

    // Si por el contrario se quiere reemplazar un div en la vista, se debe deshabilitar
    // por supuesto tomando en cuenta que debe existir el archivo ajaxSuccess.php en la carpeta templates.

  }

  public function executeAjaxgrid()
  {
      
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

    $gridart = Herramientas::CargarDatosGridv2($this,$this->obj2,true);
    $gridreq = Herramientas::CargarDatosGridv2($this,$this->obj,true);

  }

  public function saving($clasemodelo)
  {
    $gridreq = Herramientas::CargarDatosGridv2($this,$this->obj,true);

    if($clasemodelo->getStatus()=='P')
    {
        foreach($gridreq[0] as $r)
        {
            if($r['check']==true)
            {
                $obj = new Lidetcomint();
                $obj->setNumcomint($clasemodelo->getNumcomint());
                $obj->setFeccomint($clasemodelo->getFeccomint());
                $obj->setCodart($r['codart']);
                $obj->setReqart($r['reqart']);
                $obj->setFecreq($r['fecreq']);
                $obj->setUnires($r['unires']);
                $obj->setCanreq(H::FormatoNum($r['canreq']));
                $obj->setCosto(H::FormatoNum($r['costo']));
                $obj->setMontot(H::FormatoNum($r['montot']));
                $obj->save();
            }
        }
        $clasemodelo->setStatus('P');
        return parent::saving($clasemodelo);
    }else
        return 'LI001';
    
  }

  public function deleting($clasemodelo)
  {
    $c = new Criteria();
    $c->add(LidetcomintPeer::NUMCOMINT,$clasemodelo->getNumcomint());
    $per = LidetcomintPeer::doSelect($c);
    foreach($per as $r)
        $r->delete();

    return parent::deleting($clasemodelo);
  }


}
