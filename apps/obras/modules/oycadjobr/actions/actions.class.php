<?php

/**
 * oycadjobr actions.
 *
 * @package    siga
 * @subpackage oycadjobr
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 2288 2006-10-02 15:22:13Z fabien $
 */
class oycadjobrActions extends autooycadjobrActions
{

  // Para incluir funcionalidades al executeEdit()
  public function editing()
  {


  }

  public function executeAjax()
  {
    $codigo = $this->getRequestParameter('codigo','');
    $ajax = $this->getRequestParameter('ajax','');
    $cajtexmos=$this->getRequestParameter('cajtexmos');
    $dato="";
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
        }
        else
        {
         $dato1=""; $dato2=""; $dato3=""; $dato4=""; $dato5="";
         $javascript="alert('La Obra no se encuentra Registrada');";
        }
        $output = '[["'.$cajtexmos.'","'.$dato.'",""],["ocadjobr_codtipobr","'.$dato1.'",""],["ocadjobr_destipobr","'.$dato2.'",""],["ocadjobr_fecini","'.$dato3.'",""],["ocadjobr_fecfin","'.$dato4.'",""],["ocadjobr_monobr","'.$dato5.'",""],["javascript","'.$javascript.'",""]]';
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
