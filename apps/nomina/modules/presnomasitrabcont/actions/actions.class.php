<?php

/**
 * presnomasitrabcont actions.
 *
 * @package    Roraima
 * @subpackage presnomasitrabcont
 * @author     $Author: cramirez $ <desarrollo@cidesa.com.ve>
 * @version SVN: $Id: actions.class.php 42757 2011-02-24 17:31:13Z cramirez $
 *
 * @copyright  Copyright 2007, Cide S.A.
 * @license    http://opensource.org/licenses/gpl-2.0.php GPLv2
 */
class presnomasitrabcontActions extends autopresnomasitrabcontActions
{

  // variable donde se debe colocar el código de error generado en el validateEdit
  // para que sea procesado por el handleErrorEdit.

  public function editing()
  {
    $this->configGridnew($this->npasiempcont->getCodtipcon());
  }

  /**
   * Función principal para el manejo de la accion list
   * del formulario.
   *
   */
  public function executeList()
  {
    $this->processSort();

    $this->processFilters();

    $this->filters = $this->getUser()->getAttributeHolder()->getAll('sf_admin/npasiempcont/filters');

    // pager
    $this->pager = new sfPropelPager('Npasiempcont', 5);
    $c = new Criteria();
	$c->addSelectColumn(NpasiempcontPeer::CODTIPCON);
    $c->addSelectColumn("'' AS CODNOM");
    $c->addSelectColumn("'' AS CODEMP");
    $c->addSelectColumn("'' AS NOMEMP");
    $c->addSelectColumn("'yyyy/mm/dd' AS FECCAL");
	$c->addSelectColumn("'yyyy/mm/dd' AS FECDES");
	$c->addSelectColumn("'yyyy/mm/dd' AS FECDES");
	$c->addSelectColumn("'' AS STATUS");
    $c->addSelectColumn("max(ID) AS ID");
    $c->addGroupByColumn(NpasiempcontPeer::CODTIPCON);

    $this->addSortCriteria($c);
    $this->addFiltersCriteria($c);
    $this->pager->setCriteria($c);
    $this->pager->setPage($this->getRequestParameter('page', 1));
    $this->pager->init();
  }

  public function configGridnew($codigo='')
  {
    $sql="select DISTINCT '1' as check,'1' as check1,z.CODTIPCON,z.CodEmp,z.Nomemp,z.fecing as feccal,
						coalesce(x.fecdes,z.fecasi) as fecdes,
						--coalesce(x.fechas,(select max(anovighas) from npbonocont where codtipcon=z.codtipcon)) as fechas,
						coalesce(x.fechas,to_date('31/12/3000','dd/mm/yyyy')) as fechas,
						'' as codtipcon2,
						x.status,
						z.codnom,z.nomnom, 9 as id from
						(select  a.codemp,c.codtipcon,a.codnom,d.nomemp,d.fecing,a.fecasi,b.nomnom from npasicaremp a, npasinomcont c, npnomina b, nphojint d
						where  c.codnom=a.codnom and a.codnom=b.codnom and a.codemp=d.codemp and a.status='V') z
						left outer join npasiempcont x on (z.codemp=x.codemp and z.codtipcon=x.codtipcon)
						where x.codtipcon is not null and z.codtipcon='".$codigo."'
		  union all
		  select DISTINCT '0' as check,'0' as check1,z.CODTIPCON,z.CodEmp,z.Nomemp,z.fecing as feccal,
		  				coalesce(x.fecdes,z.fecasi) as fecdes,
						--coalesce(x.fechas,(select max(anovighas) from npbonocont where codtipcon=z.codtipcon)) as fechas,
						coalesce(x.fechas,to_date('31/12/3000','dd/mm/yyyy')) as fechas,
						(select codtipcon from npasiempcont where codtipcon<>z.codtipcon and codemp=z.codemp and status='A') as codtipcon2,
						x.status,
						z.codnom,z.nomnom, 9 as id from
						(select  a.codemp,c.codtipcon,a.codnom,d.nomemp,d.fecing,a.fecasi,b.nomnom from npasicaremp a, npasinomcont c, npnomina b, nphojint d
						where  c.codnom=a.codnom and a.codnom=b.codnom and a.codemp=d.codemp and a.status='V') z
						left outer join npasiempcont x on (z.codemp=x.codemp and z.codtipcon=x.codtipcon)
						where x.codtipcon is null and z.codtipcon='".$codigo."' order by check1 desc, codemp";

    if(!Herramientas::BuscarDatos($sql,&$per))
    {
        $per=array();
    }

    $this->obj = Herramientas::getConfigGrid(sfConfig::get('sf_app_module_dir').'/presnomasitrabcont/'.sfConfig::get('sf_app_module_config_dir_name').'/gridcon');

    $this->obj = $this->obj[0]->getConfig($per);

    $this->npasiempcont->setObjcon($this->obj);
  }


/**
   * Función para procesar _todas_ las funciones Ajax del formulario
   * Cada función esta identificada con el valor de la vista "ajax"
   * el cual traerá el indice de lo que se quiere procesar.
   *
   */
  public function executeAjax()
  {
      $js='';
      $output='';
      $dato="";
      if ($this->getRequestParameter('ajax')=='1')
      {
        $this->npasiempcont = $this->getNpasiempcontOrCreate();
        $this->updateNpasiempcontFromRequest();
        if (trim($this->getRequestParameter('codigo'))<>'')
        {
                 $c = new Criteria();
                 $c->Add(NpasiempcontPeer::CODTIPCON,$this->getRequestParameter('codigo'));
                 $obj = NpasiempcontPeer::doSelect($c);
                 if(!$obj)
                 {
                        $dato=Herramientas::getX('codtipcon','nptipcon','destipcon',$this->getRequestParameter('codigo'));
                        $this->configGridnew($this->getRequestParameter('codigo'));
                        $output = '[["npasiempcont_destipcon","'.$dato.'",""]]';
                 }else
                 {
                        $js.="$('npasiempcont_codtipcon').value='';";
                        $js.="alert('Codigo de Contrato ya Registrado');";
                        $js.="$('npasiempcont_codtipcon').focus();";
                        $this->configGridnew();
                        $output = '[["npasiempcont_destipcon","'.$dato.'",""],["javascript","'.$js.'",""]]';
                 }

        }
        else
        {
                $this->configGridnew();
                $output = '[["npasiempcont_destipcon","'.$dato.'",""]]';

        }
        $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');
        //return sfView::HEADER_ONLY;
     }
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
      $this->mensaje="";
      if($this->getRequest()->getMethod() == sfRequest::POST)
      {
        $this->npasiempcont = $this->getNpasiempcontOrCreate();
        $this->updateNpasiempcontFromRequest();
        $this->configGridnew();
        $grid=Herramientas::CargarDatosGridv2($this,$this->obj,true);

        if(count($grid[0])>0)
        	$this->coderr=EmpleadosBanco::Validar_Datos_Npasiempcont($grid);
        else
        	$this->coderr=437;

       if (($this->coderr<>-1))
        {
                return false;

        }else return true;

      }else return true;
    }

  public function updateError()
  {
    $this->configGridnew();
    $grid = Herramientas::CargarDatosGridv2($this,$this->obj,true);
  }


/**
   * Función para manejar el salvado del formulario.
   * cabe destacar que en las versiones nuevas del formulario (cidesaPropel)
   * llama internamente a la función $this->saving
   * Esta función saving siempre debe retornar un valor >=-1.
   * En esta funcción se debe realizar el proceso de guardado de informacion
   * del negocio en la base de datos. Este proceso debe ser realizado llamado
   * a funciones de las clases del negocio que se encuentran en lib/bussines
   * todos los procesos de guardado deben estar en la clases del negocio (lib/bussines/"modulo")
   *
   */
  public function saving($npasiempcont)
  {

    $coderr = -1;

    $grid=Herramientas::CargarDatosGridv2($this,$this->obj,true);
    $coderr = EmpleadosBanco::Grabar_grid_Npasiempcont($grid,$npasiempcont);

    $this->coderr=$coderr;

    return $this->redirect('presnomasitrabcont/list');

  }
  /**
   * Función principal para procesar la eliminación de registros
   * en el formulario.
   *
   */
  public function deleting($clasemodelo)
  {
        return $this->redirect('presnomasitrabcont/list');
  }

}
