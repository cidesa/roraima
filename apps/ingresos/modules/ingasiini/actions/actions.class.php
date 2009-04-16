<?php
<?php
<?php

/**
 * ingasiini actions.
 *
 * @package    siga
 * @subpackage ingasiini
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 2288 2006-10-02 15:22:13Z fabien $
 */
class ingasiiniActions extends autoingasiiniActions
{

  // Para incluir funcionalidades al executeEdit()
  public function editing()
  {
		$this->configGrid();

  }

  public function executeList()
  {
    $this->processSort();

    $this->processFilters();

    $this->filters = $this->getUser()->getAttributeHolder()->getAll('sf_admin/ciasiini/filters');

    // pager
    $this->pager = new sfPropelPager('Ciasiini', 5);
    $c = new Criteria();
    $c->add(CiasiiniPeer::PERPRE,'00');
    $c->addDescendingOrderByColumn(CiasiiniPeer::ANOPRE);
    $c->addAscendingOrderByColumn(CiasiiniPeer::CODPRE);
    //$this->addSortCriteria($c);
    $this->addFiltersCriteria($c);
    $this->pager->setCriteria($c);
    $this->pager->setPage($this->getRequestParameter('page', 1));
    $this->pager->init();
  }

  public function configGrid($genera='', $arreglo=array()){

    if ($genera==''){

    $c = new Criteria();
    $c->add(CiasiiniPeer::CODPRE,$this->ciasiini->getCodpre());
    $c->add(CiasiiniPeer::PERPRE,'00',Criteria::NOT_EQUAL);
    $c->add(CiasiiniPeer::ANOPRE,$this->ciasiini->getAnopre());
    $per = CiasiiniPeer::doSelect($c);

    }else{

    	$per=$arreglo;
    }

    $this->columnas = Herramientas::getConfigGrid(sfConfig::get('sf_app_module_dir').'/ingasiini/'.sfConfig::get('sf_app_module_config_dir_name').'/grid');


    $this->grid = $this->columnas[0]->getConfig($per);
    $this->ciasiini->setGrid($this->grid);
  }


   protected function updateCiasiiniFromRequest()
   {
    $ciasiini = $this->getRequestParameter('ciasiini');

    if (isset($ciasiini['codpre']))
    {
      $this->ciasiini->setCodpre($ciasiini['codpre']);
    }
    if (isset($ciasiini['nompre']))
    {
      $this->ciasiini->setNompre($ciasiini['nompre']);
    }
    if (isset($ciasiini['perpre']))
    {
      $this->ciasiini->setPerpre('00');
    }
    if (isset($ciasiini['anopre']))
    {
      $this->ciasiini->setAnopre($ciasiini['anopre']);
    }
    if (isset($ciasiini['monasi']))
    {
      $this->ciasiini->setMonasi($ciasiini['monasi']);
    }
    if (isset($ciasiini['grid']))
    {
      $this->ciasiini->setGrid($ciasiini['grid']);
    }
    if (isset($ciasiini['status']))
    {
      $this->ciasiini->setStatus($ciasiini['status']);
    }

  }

  public function executeAjax()
  {
  	$this->ciasiini = $this->getCiasiiniOrCreate();

    $codigo = $this->getRequestParameter('codigo','');
    // Esta variable ajax debe ser usada en cada llamado para identificar
    // que objeto hace el llamado y por consiguiente ejecutar el código necesario
    $ajax = $this->getRequestParameter('ajax','');

    // Se debe enviar en la petición ajax desde el cliente los datos que necesitemos
    // para generar el código de retorno, esto porque en un llamado Ajax no se devuelven
    // los datos de los objetos de la vista como pasa en un submit normal.

    switch ($ajax){
      case '1':
		$monto1 = $this->getRequestParameter('monto');
		$c= new Criteria();
		$periodos=CiperejePeer::doSelect($c);
		$numper=count($periodos);
		$i=1;
		$j=0;
		$monto=H::QuitarMonto($monto1);
		$monasi=$monto/$numper;
		$per=new Ciasiini();
		$this->per1=array();

		while ($i<=$numper){

		if ($i<10){
			$p="0".(string)$i;
		}else{ $p=(string)$i;}

		$this->per1[$j]["perpre"]=$p;
	    $this->per1[$j]["monasi"]=H::FormatoMonto($monasi);
	    $this->per1[$j]["id"]='9';

		$i++;
		$j++;

		}
		//H::printR($this->per1);
		$genera='S';
        $this->configGrid($genera,$this->per1);
        $output = '[["","",""]]';
        break;
      default:
        $output = '[["","",""],["","",""],["","",""]]';
    }

    // Instruccion para escribir en la cabecera los datos a enviar a la vista
    $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');

    // Si solo se va usar ajax para actualziar datos en objetos ya existentes se debe
    // mantener habilitar esta instrucción
    //return sfView::HEADER_ONLY;

    // Si por el contrario se quiere reemplazar un div en la vista, se debe deshabilitar
    // por supuesto tomando en cuenta que debe existir el archivo ajaxSuccess.php en la carpeta templates.

  }


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
    //$this->configGrid();

    //$grid = Herramientas::CargarDatosGrid($this,$this->obj);

    //$this->configGrid($grid[0],$grid[1]);

  }


    public function executeEdit()
  {
    $this->ciasiini = $this->getCiasiiniOrCreate();

    $this->editing();

    if ($this->getRequest()->getMethod() == sfRequest::POST)
    {
      $this->updateCiasiiniFromRequest();

      if($this->saveCiasiini($this->ciasiini) ==-1){
        $this->setFlash('notice', 'Your modifications have been saved');

        if ($this->getRequestParameter('save_and_add'))
        {
          return $this->redirect('ingasiini/create');
        }
        else if ($this->getRequestParameter('save_and_list'))
        {
          return $this->redirect('ingasiini/list');
        }
        else
        {
          return $this->redirect('ingasiini/list');//edit?id='.$this->ciasiini->getId());
        }

      }else{
        $this->labels = $this->getLabels();
      }

    }
    else
    {
      $this->labels = $this->getLabels();
    }
  }

  public function saving($ciasiini)
  {
    $grid = Herramientas::CargarDatosGridv2($this,$this->grid,true);
    Ingresos::salvarEstimacion($ciasiini, $grid);
    return -1;
  }

  public function deleting($ciasiini)
  {
  	$c1= new Criteria();
  	$datos=CidefnivPeer::doSelect($c1);
  	$anoini=substr($datos[0]->getFecini(),0,4);
  	$anocie=substr($datos[0]->getFeccie(),0,4);


  	$c= new Criteria();
  	$c->add(CiasiiniPeer::CODPRE,$ciasiini->getCodpre());
  	$c->add(CiasiiniPeer::ANOPRE,$anoini,Criteria::GREATER_EQUAL);
  	$c->add(CiasiiniPeer::ANOPRE,$anocie,Criteria::LESS_EQUAL);
  	$datos=CiasiiniPeer::doSelect($c);
  	foreach ($datos as $per2){
    	$per2->delete();
    }

    return -1;
  }


}

/**
 * ingasiini actions.
 *
 * @package    siga
 * @subpackage ingasiini
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 2288 2006-10-02 15:22:13Z fabien $
 */
class ingasiiniActions extends autoingasiiniActions
{

  // Para incluir funcionalidades al executeEdit()
  public function editing()
  {
		$this->configGrid();

  }

  public function executeList()
  {
    $this->processSort();

    $this->processFilters();

    $this->filters = $this->getUser()->getAttributeHolder()->getAll('sf_admin/ciasiini/filters');

    // pager
    $this->pager = new sfPropelPager('Ciasiini', 5);
    $c = new Criteria();
    $c->add(CiasiiniPeer::PERPRE,'00');
    $c->addDescendingOrderByColumn(CiasiiniPeer::ANOPRE);
    $c->addAscendingOrderByColumn(CiasiiniPeer::CODPRE);
    //$this->addSortCriteria($c);
    $this->addFiltersCriteria($c);
    $this->pager->setCriteria($c);
    $this->pager->setPage($this->getRequestParameter('page', 1));
    $this->pager->init();
  }

  public function configGrid($genera='', $arreglo=array()){

    if ($genera==''){

    $c = new Criteria();
    $c->add(CiasiiniPeer::CODPRE,$this->ciasiini->getCodpre());
    $c->add(CiasiiniPeer::PERPRE,'00',Criteria::NOT_EQUAL);
    $c->add(CiasiiniPeer::ANOPRE,$this->ciasiini->getAnopre());
    $per = CiasiiniPeer::doSelect($c);

    }else{

    	$per=$arreglo;
    }

    $this->columnas = Herramientas::getConfigGrid(sfConfig::get('sf_app_module_dir').'/ingasiini/'.sfConfig::get('sf_app_module_config_dir_name').'/grid');


    $this->grid = $this->columnas[0]->getConfig($per);
    $this->ciasiini->setGrid($this->grid);
  }


   protected function updateCiasiiniFromRequest()
   {
    $ciasiini = $this->getRequestParameter('ciasiini');

    if (isset($ciasiini['codpre']))
    {
      $this->ciasiini->setCodpre($ciasiini['codpre']);
    }
    if (isset($ciasiini['nompre']))
    {
      $this->ciasiini->setNompre($ciasiini['nompre']);
    }
    if (isset($ciasiini['perpre']))
    {
      $this->ciasiini->setPerpre('00');
    }
    if (isset($ciasiini['anopre']))
    {
      $this->ciasiini->setAnopre($ciasiini['anopre']);
    }
    if (isset($ciasiini['monasi']))
    {
      $this->ciasiini->setMonasi($ciasiini['monasi']);
    }
    if (isset($ciasiini['grid']))
    {
      $this->ciasiini->setGrid($ciasiini['grid']);
    }
    if (isset($ciasiini['status']))
    {
      $this->ciasiini->setStatus($ciasiini['status']);
    }

  }

  public function executeAjax()
  {
  	$this->ciasiini = $this->getCiasiiniOrCreate();

    $codigo = $this->getRequestParameter('codigo','');
    // Esta variable ajax debe ser usada en cada llamado para identificar
    // que objeto hace el llamado y por consiguiente ejecutar el código necesario
    $ajax = $this->getRequestParameter('ajax','');

    // Se debe enviar en la petición ajax desde el cliente los datos que necesitemos
    // para generar el código de retorno, esto porque en un llamado Ajax no se devuelven
    // los datos de los objetos de la vista como pasa en un submit normal.

    switch ($ajax){
      case '1':
		$monto1 = $this->getRequestParameter('monto');
		$c= new Criteria();
		$periodos=CiperejePeer::doSelect($c);
		$numper=count($periodos);
		$i=1;
		$j=0;
		$monto=H::QuitarMonto($monto1);
		$monasi=$monto/$numper;
		$per=new Ciasiini();
		$this->per1=array();

		while ($i<=$numper){

		if ($i<10){
			$p="0".(string)$i;
		}else{ $p=(string)$i;}

		$this->per1[$j]["perpre"]=$p;
	    $this->per1[$j]["monasi"]=H::FormatoMonto($monasi);
	    $this->per1[$j]["id"]='9';

		$i++;
		$j++;

		}
		//H::printR($this->per1);
		$genera='S';
        $this->configGrid($genera,$this->per1);
        $output = '[["","",""]]';
        break;
      default:
        $output = '[["","",""],["","",""],["","",""]]';
    }

    // Instruccion para escribir en la cabecera los datos a enviar a la vista
    $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');

    // Si solo se va usar ajax para actualziar datos en objetos ya existentes se debe
    // mantener habilitar esta instrucción
    //return sfView::HEADER_ONLY;

    // Si por el contrario se quiere reemplazar un div en la vista, se debe deshabilitar
    // por supuesto tomando en cuenta que debe existir el archivo ajaxSuccess.php en la carpeta templates.

  }


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
    //$this->configGrid();

    //$grid = Herramientas::CargarDatosGrid($this,$this->obj);

    //$this->configGrid($grid[0],$grid[1]);

  }


    public function executeEdit()
  {
    $this->ciasiini = $this->getCiasiiniOrCreate();

    $this->editing();

    if ($this->getRequest()->getMethod() == sfRequest::POST)
    {
      $this->updateCiasiiniFromRequest();

      if($this->saveCiasiini($this->ciasiini) ==-1){
        $this->setFlash('notice', 'Your modifications have been saved');

        if ($this->getRequestParameter('save_and_add'))
        {
          return $this->redirect('ingasiini/create');
        }
        else if ($this->getRequestParameter('save_and_list'))
        {
          return $this->redirect('ingasiini/list');
        }
        else
        {
          return $this->redirect('ingasiini/list');//edit?id='.$this->ciasiini->getId());
        }

      }else{
        $this->labels = $this->getLabels();
      }

    }
    else
    {
      $this->labels = $this->getLabels();
    }
  }

  public function saving($ciasiini)
  {
    $grid = Herramientas::CargarDatosGridv2($this,$this->grid,true);
    Ingresos::salvarEstimacion($ciasiini, $grid);
    return -1;
  }

  public function deleting($ciasiini)
  {
  	$c1= new Criteria();
  	$datos=CidefnivPeer::doSelect($c1);
  	$anoini=substr($datos[0]->getFecini(),0,4);
  	$anocie=substr($datos[0]->getFeccie(),0,4);


  	$c= new Criteria();
  	$c->add(CiasiiniPeer::CODPRE,$ciasiini->getCodpre());
  	$c->add(CiasiiniPeer::ANOPRE,$anoini,Criteria::GREATER_EQUAL);
  	$c->add(CiasiiniPeer::ANOPRE,$anocie,Criteria::LESS_EQUAL);
  	$datos=CiasiiniPeer::doSelect($c);
  	foreach ($datos as $per2){
    	$per2->delete();
    }

    return -1;
  }


}
