<?php

/**
 * oycadjobr actions.
 *
 * @package    Roraima
 * @subpackage oycadjobr
 * @author     $Author$ <desarrollo@cidesa.com.ve>
 * @version SVN: $Id$
 * 
 * @copyright  Copyright 2007, Cide S.A.
 * @license    http://opensource.org/licenses/gpl-2.0.php GPLv2
 */
class oycadjobrActions extends autooycadjobrActions
{

  // Para incluir funcionalidades al executeEdit()
  /**
   * Función para colocar el codigo necesario en  
   * el proceso de edición.
   * Aquí se pueden buscar datos adicionales que necesite la vista
   * Esta función es parte de la acción executeEdit, que maneja tanto
   * el create como el edit del formulario.
   * Generalmente aqui se debe y puede colocar los llamados a los configGrid
   * Para generar la información de configuración de los grids.
   *
   */
  public function editing()
  {
    if (!$this->ocadjobr->getId())
    {
       $t= new Criteria();
       $t->setLimit(1);
       $t->addDescendingOrderByColumn(OcadjobrPeer::CODADJ);
       $reg= OcadjobrPeer::doSelectOne($t);
       if ($reg)
       {
           $this->ocadjobr->setCodadj(str_pad(($reg->getCodadj()+1),8,'0',STR_PAD_LEFT));
       }else $this->ocadjobr->setCodadj('00000001');

    }

  }

  /**
   * Función para procesar _todas_ las funciones Ajax del formulario
   * Cada función esta identificada con el valor de la vista "ajax"
   * el cual traerá el indice de lo que se quiere procesar.
   *
   */
  public function executeAjax()
  {
    $codigo = $this->getRequestParameter('codigo','');
    $ajax = $this->getRequestParameter('ajax','');
    $cajtexmos=$this->getRequestParameter('cajtexmos');
    $dato=""; $dato1=""; $dato2=""; $dato3=""; $dato4=""; $dato5=""; $dato6=""; $dato7="";
    $javascript="";

    switch ($ajax){
      case '1':
        $c= new Criteria();
        $c->add(OcregobrPeer::CODOBR,$codigo);
        $data=OcregobrPeer::doSelectOne($c);
        if ($data)
        {
          $dato=$data->getDesobr();
          $dato1=$data->getCodtipobr();
          $dato2=Herramientas::getX('CODTIPOBR','Octipobr','Destipobr',$dato1);
          $dato3=date("d/m/Y",strtotime($data->getFecini()));
          $dato4=date("d/m/Y",strtotime($data->getFecfin()));
          $dato5=number_format($data->getMonobr(),2,',','.');
	      $dato6=$data->getCodpre();
       	  $dato7=Herramientas::getX('CODPRE','Cpdeftit','Nompre',$dato6);
        }
        else
        {
         $dato1=""; $dato2=""; $dato3=""; $dato4=""; $dato5="";
         $javascript="alert('La Obra no se encuentra Registrada');";
        }
        $output = '[["'.$cajtexmos.'","'.$dato.'",""],["ocadjobr_codtipobr","'.$dato1.'",""],["ocadjobr_destipobr","'.$dato2.'",""],["ocadjobr_fecini","'.$dato3.'",""],["ocadjobr_fecfin","'.$dato4.'",""],["ocadjobr_monobr","'.$dato5.'",""],["ocadjobr_codpre","'.$dato6.'",""],["ocadjobr_nompre","'.$dato7.'",""],["javascript","'.$javascript.'",""]]';
        break;
      case '2':
        $c= new Criteria();
	    $c->add(OcempparPeer::CODPRO,$codigo);
        $reg=OcempparPeer::doSelectOne($c);
        if ($reg)
        {
       	 $dato=$reg->getNompro();
        }else {
        $javascript="alert('El Contratista no existe como Empresa Ofertante para la Obra Seleccionada');";
        }
        $output = '[["'.$cajtexmos.'","'.$dato.'",""],["javascript","'.$javascript.'",""]]';
        break;
      default:
        $output = '[["","",""],["","",""],["","",""]]';
        break;
    }

    $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');
    return sfView::HEADER_ONLY;
  }


  protected function saving($ocadjobr)
  {
    if (Obras::salvarOycadjobr($ocadjobr,&$error))
    {
      return $error;
    }else return $error;

  }




}
