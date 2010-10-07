<?php

/**
 * forasoconcar actions.
 *
 * @package    siga
 * @subpackage forasoconcar
 * @author     $Auhor$ <desarrollo@cidesa.com.ve>
 * @version    SVN: $Id: actions.class.php 32371 2009-09-01 16:06:59Z lhernandez $
 * @copyright  Copyright 2007, Cidesa C.A.
 */

class forasoconcarActions extends autoforasoconcarActions
{

  public function executeIndex()
  {
    return $this->forward('forasoconcar', 'edit');
  }

  // Para incluir funcionalidades al executeEdit()
  public function editing()
  {
     $this->configGrid();
  }

  public function configGrid()
  {
     $this->configGridConceptos();
  }

  public function configGridConceptos($codcar='')
  {
     $sql= "SELECT (case when (forconcar.codcar is null )then 0 else 1 end) as check,
            npdefcpt.codcon as codcon, npdefcpt.nomcon as nomcon, 9 as id
            FROM npdefcpt LEFT OUTER JOIN forconcar on npdefcpt.codcon=forconcar.codcon and forconcar.codcar = '".$codcar."'
            order by npdefcpt.codcon";
    $resp = Herramientas::BuscarDatos($sql,&$reg);

    $opciones = new OpcionesGrid();
    $opciones->setTabla('Forconcar');
    $opciones->setAnchoGrid(600);
    $opciones->setAncho(500);
    $opciones->setTitulo('');
    $opciones->setFilas(0);
    $opciones->setHTMLTotalFilas(' ');

    $col1 = new Columna('Marque');
    $col1->setTipo(Columna::CHECK);
    $col1->setNombreCampo('check');
    $col1->setEsGrabable(true);
    $col1->setHTML(' ');

    $col2 = new Columna('CÃ³digo');
    $col2->setTipo(Columna::TEXTO);
    $col2->setEsGrabable(true);
    $col2->setAlineacionObjeto(Columna::CENTRO);
    $col2->setAlineacionContenido(Columna::CENTRO);
    $col2->setNombreCampo('codcon');
    $col2->setHTML('type="text" size="10" readonly=true');

    $col3 = new Columna('Nombre del Concepto');
    $col3->setTipo(Columna::TEXTO);
    $col3->setAlineacionObjeto(Columna::IZQUIERDA);
    $col3->setAlineacionContenido(Columna::IZQUIERDA);
    $col3->setNombreCampo('nomcon');
    $col3->setHTML('type="text" size="60" readonly=true');

    $opciones->addColumna($col1);
    $opciones->addColumna($col2);
    $opciones->addColumna($col3);

    $this->obj = $opciones->getConfig($reg);

    $this->forconcar->setObj($this->obj);
  }

  public function executeAjax()
  {
    $codigo = $this->getRequestParameter('codigo','');
    $ajax = $this->getRequestParameter('ajax','');
    $cajtexcom = $this->getRequestParameter('cajtexcom','');
    $cajtexmos = $this->getRequestParameter('cajtexmos','');
    $js=""; $dato="";
    switch ($ajax){
      case '1':
        $mascara=Herramientas::ObtenerFormato('Npdefgen','Forcar');
        $longitud=strlen($mascara);
        $c= new Criteria();
        $c->add(NpcargosPeer::CODCAR,$codigo);
        $reg= NpcargosPeer::doSelectOne($c);
        if ($reg)
        {
            if (strlen($codigo)==$longitud)
            {
              $dato=$reg->getNomcar();
            }else {
                $codigo="";
                $js="alert('El Cargo no es de Ultimo Nivel'); $('forconcar_codcar').value=''; $('forconcar_codcar').focus();";
            }
        }else {
           $codigo="";
           $js="alert('El Cargo no existe'); $('forconcar_codcar').value=''; $('forconcar_codcar').focus();";
        }

       $this->params=array();
       $this->forconcar = $this->getForconcarOrCreate();
       $this->labels = $this->getLabels();
       $this->configGridConceptos($codigo);

        $output = '[["'.$cajtexmos.'","'.$dato.'",""],["javascript","'.$js.'",""],["","",""]]';
        $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');
        break;
      default:
        $output = '[["","",""],["","",""],["","",""]]';
        $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');
        return sfView::HEADER_ONLY;
     }
   
  }


  /**
   *
   * FunciÃ³n que se ejecuta luego los validadores del negocio (validators)
   * Para realizar validaciones especÃ­ficas del negocio del formulario
   * Para mayor informaciÃ³n vease http://www.symfony-project.org/book/1_0/06-Inside-the-Controller-Layer#chapter_06_validation_and_error_handling_methods
   *
   */
  public function validateEdit()
  {
    $this->coderr =-1;

    if($this->getRequest()->getMethod() == sfRequest::POST){

      if($this->coderr!=-1){
        return false;
      } else return true;

    }else return true;



  }

  /**
   * FunciÃ³n para actualziar el grid en el post si ocurre un error
   * Se pueden colocar aqui los grids adicionales
   *
   */
  public function updateError()
  {
    $this->configGrid();
    $grid = Herramientas::CargarDatosGrid($this,$this->obj,true);
  }

  public function saving($clasemodelo)
  {
    $grid = Herramientas::CargarDatosGrid($this,$this->obj,true);
    Formulacion::salvarConceptosCargos($clasemodelo,$grid);

    return -1;
  }

  public function deleting($clasemodelo)
  {
    return parent::deleting($clasemodelo);
  }


}
