<?php

/**
 * precontra actions.
 *
 * @package    siga
 * @subpackage precontra
 * @author     $Auhor$ <desarrollo@cidesa.com.ve>
 * @version    SVN: $Id: actions.class.php 32371 2009-09-01 16:06:59Z lhernandez $
 * @copyright  Copyright 2007, Cidesa C.A.
 */

class precontraActions extends autoprecontraActions
{
  public function executeIndex()
  {
    return $this->forward('precontra', 'edit');
  }


  // Para incluir funcionalidades al executeEdit()
  public function editing()
  {
   $this->configGrid($this->cpcontra->getCodparma());

  }

  public function configGrid($codparma='')
  {
    $c = new Criteria();
    $c->add(CpcontraPeer::CODPARMA,$codparma);
    $partidas = CpcontraPeer::doSelect($c);

    $this->columnas = Herramientas::getConfigGrid(sfConfig::get('sf_app_module_dir').'/precontra/'.sfConfig::get('sf_app_module_config_dir_name').'/grid_partidas');

    $mascarapar=$this->cpcontra->getMascara();
    $lonpar=strlen($mascarapar);

    $obj= array('codpar' => 1, 'nompar' => 2);
    $this->columnas[1][0]->setHTML('type="text" size="17" maxlength="'.chr(39).$lonpar.chr(39).'" onKeyDown="javascript:return dFilter (event.keyCode, this,'.chr(39).$mascarapar.chr(39).')" onKeyPress="javascript:cadena=rayaenter(event,this.value);if (event.keyCode==13 || event.keyCode==9){document.getElementById(this.id).value=cadena;}" onBlur="toAjax(\'2\',getUrlModulo()+\'ajax\',this.value,\'\',\'&cajtexmos=\'+$(this.id).up().next(0).descendants()[0].id+\'&cajtexcom=\'+this.id)"');
    $this->columnas[1][0]->setCatalogo('Prepartidas','sf_admin_edit_form',$obj,'Nppartidas_Precontra');

    $this->obj =$this->columnas[0]->getConfig($partidas);

    $this->cpcontra->setObj($this->obj);
  }

  public function executeAjax()
  {
    $codigo = $this->getRequestParameter('codigo','');    
    $ajax = $this->getRequestParameter('ajax','');
    $cajtexmos = $this->getRequestParameter('cajtexmos');
    $cajtexcom = $this->getRequestParameter('cajtexcom');
    $dato=""; $js="";

    switch ($ajax){
      case '1':
        $this->params=array();
        $this->cpcontra = $this->getCpcontraOrCreate();
        $this->labels = $this->getLabels();
        $c = new Criteria();
        $c->add(PrepartidasPeer :: CODPAR, $codigo);
        $reg=PrepartidasPeer::doSelectOne($c);
        if ($reg)
        {
            $dato=$reg->getNompar();
            $this->configGrid($codigo);
        }else {
            $js="alert('La partida no existe'); $('$cajtexcom').value=''; $('$cajtexcom').focus();";
        }
        $output = '[["'.$cajtexmos.'","'.$dato.'",""],["javascript","'.$js.'",""],["","",""]]';
        $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');
        break;
      case '2':
        $c = new Criteria();
        $c->add(PrepartidasPeer :: CODPAR, $codigo);
        $reg=PrepartidasPeer::doSelectOne($c);
        if ($reg)
        {
            $dato=$reg->getNompar();
            $js="verificarpartida('".$cajtexcom."');";
            
        }else {
            $js="alert('La partida no existe'); $('$cajtexcom').value=''; $('$cajtexcom').focus();";
        }
        $output = '[["'.$cajtexmos.'","'.$dato.'",""],["javascript","'.$js.'",""],["","",""]]';
        $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');
        return sfView::HEADER_ONLY;
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

    $grid = Herramientas::CargarDatosGridv2($this,$this->obj);

  }

  public function saving($clasemodelo)
  {
    $grid = Herramientas::CargarDatosGridv2($this,$this->obj);

       $x=$grid[0];
       $j=0;
       while ($j<count($x))
       {
           if ($x[$j]->getCodparde()!='')
           {
                $x[$j]->setCodparma($clasemodelo->getCodparma());
                $x[$j]->save();
           }
          $j++;
        }
        
        $z=$grid[1];
        $j=0;
        if (!empty($z[$j]))
        {
          while ($j<count($z))
          {
            $z[$j]->delete();
            $j++;
          }
        }


    return -1;
  }

  public function deleting($clasemodelo)
  {
    return parent::deleting($clasemodelo);
  }


}
