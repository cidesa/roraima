<?php

/**
 * facdecinmlot actions.
 *
 * @package    siga
 * @subpackage facdecinmlot
 * @author     $Auhor$ <desarrollo@cidesa.com.ve>
 * @version    SVN: $Id: actions.class.php 32371 2009-09-01 16:06:59Z lhernandez $
 * @copyright  Copyright 2007, Cidesa C.A.
 */

class facdecinmlotActions extends autofacdecinmlotActions
{

  public function executeIndex55()
  {
    return $this->forward('facdecinmlot', 'edit');
  }


  // Para incluir funcionalidades al executeEdit()
  public function editing()
  {
	$this->configGrid();

  }


  public function configGrid() {

  	 $sql = " select distinct A.*, C.StaCarInm From FCRegInm A,FCConRep B,FCCarInm C Where A.EstInm<>'D' ANd A.CodCarInm=C.CodCarInm And A.RifCon = B.RifCon
         And B.Repcon='C' And $this->fcdeclar->getRifcon()<>' ' And $this->fcdeclar->getNroinm() <>' ' And RTrim(A.CodCatFis)<>' ' And $this->fcdeclar->getCodcatinm()<>' '
         And A.CodZon>='$this->fcdeclar->getZonadesde()' And A.CodZon<='$this->fcdeclar->getZonahasta()' Order By A.nroinm ";
//exit('55555555');

		$c = new Criteria();

		$c->add(FcesplicdetPeer :: NROCON, $this->fcdeclar->getNumref());
		$c->add(FcesplicdetPeer :: RIFCON, $this->fcdeclar->getRifcon());
		$c->add(FcesplicdetPeer :: TIPESP, $this->fcdeclar->getTipesp());
		$per = FcesplicdetPeer :: doSelect($c);
$per =array();
	    $this->grid = H::getConfigGrid('grid',$per);
		$this->fcdeclar->setGrid($this->grid);
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
        $output = '[["","",""],["","",""],["","",""]]';
        break;
      default:
        $output = '[["","",""],["","",""],["","",""]]';
    }

    // Instruccion para escribir en la cabecera los datos a enviar a la vista
    $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');

    // Si solo se va usar ajax para actualziar datos en objetos ya existentes se debe
    // mantener habilitar esta instrucción
    return sfView::HEADER_ONLY;

    // Si por el contrario se quiere reemplazar un div en la vista, se debe deshabilitar
    // por supuesto tomando en cuenta que debe existir el archivo ajaxSuccess.php en la carpeta templates.

  }


  /**
   *
   * Función que se ejecuta luego los validadores del negocio (validators)   * Para realizar validaciones específicas del negocio del formulario
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
    //$this->configGrid();

    //$grid = Herramientas::CargarDatosGrid($this,$this->obj);

    //$this->configGrid($grid[0],$grid[1]);

  }

  public function saving($clasemodelo)
  {
    return parent::saving($clasemodelo);
  }

  public function deleting($clasemodelo)
  {
    return parent::deleting($clasemodelo);
  }


}
