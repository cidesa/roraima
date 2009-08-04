<?php

/**
 * bieciemesdan actions.
 *
 * @package    siga
 * @subpackage bieciemesdan
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 2692 2006-11-15 21:03:55Z fabien $
 */
class bieciemesdanActions extends sfActions
{
  /**
   * Executes index action
   *
   */
  public function executeIndex()
  {
  }

  public function executeAjax()
  {
    $cajtexmos=$this->getRequestParameter('cajtexmos');
    $codigo= $this->getRequestParameter('codigo');
    $ajax= $this->getRequestParameter('ajax');
    $javascript="";
    switch ($ajax){
      case '1':
        $r= new Criteria();
        $r->addAscendingOrderByColumn(BndepactPeer::FECDEP);
        $trajo=BndepactPeer::doSelectOne($r);
        if ($trajo)
        {
          $fec=Herramientas :: dateAdd('m', 1, $trajo->getFecdep(), '+');
          $dato=date('d/m/Y',strtotime($fec));
          $javascript="$('fechareval').show(); $('depcalculada').value='S'; $('label16').innerHTML = 'Fecha Depreciación'; $('fecha').focus();";
        }else
        {
          $dato="";
          $javascript="$('fechareval').show(); $('label16').innerHTML = 'Fecha Inicio de Depreciación';$('fecha').focus();";
        }
        $output = '[["javascript","'.$javascript.'",""],["fecha","'.$dato.'",""],["","",""]]';
        $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');
        return sfView::HEADER_ONLY;
       break;
      case '2':
        $r= new Criteria();
        $r->addAscendingOrderByColumn(BndepactPeer::FECDEP);
        $trajo2=BndepactPeer::doSelectOne($r);
        if ($trajo2)
        {
          $fechacomp=$trajo2->getFecdep();
          $feccomp=date('d/m/Y',strtotime($fechacomp));
          if ($this->getRequestParameter('deprecal')!="S")
          {
            $mes=date('m',strtotime($fechacomp));
            $anno=date('Y',strtotime($fechacomp));
            $reftra="DM".str_pad($mes, 2, '0', STR_PAD_LEFT).$anno;
            $s= new Criteria();
            $s->add(ContabcPeer::REFTRA,$reftra);
            $resulto= ContabcPeer::doSelectOne($s);
            if (!$resulto)
            {
              $mondepm=$trajo2->getMonmue();
              $mondepi=$trajo2->getMoninm();
              $mondeps=$trajo2->getMonsem();
              Bienes::generaComprobanteDepreciacion($fechacomp,&$comprobante);
              $form="sf_admin/bieciemesdan/confincomgen";
			  $i=0;
 		      $f[$i]=$form.$i;
		      $this->getUser()->setAttribute('grabar',$comprobante[$i]->getGrabar(),$f[$i]);
		      $this->getUser()->setAttribute('reftra',$comprobante[$i]->getReftra(),$f[$i]);
		      $this->getUser()->setAttribute('numcomp',$comprobante[$i]->getNumcom(),$f[$i]);
		      $this->getUser()->setAttribute('fectra',$comprobante[$i]->getFectra(),$f[$i]);
		      $this->getUser()->setAttribute('destra',$comprobante[$i]->getDestra(),$f[$i]);
		      $this->getUser()->setAttribute('ctas', $comprobante[$i]->getCtas(),$f[$i]);
		      $this->getUser()->setAttribute('desctas', $comprobante[$i]->getDesc(),$f[$i]);
		      $this->getUser()->setAttribute('tipmov', '');
		      $this->getUser()->setAttribute('mov', $comprobante[$i]->getMov(),$f[$i]);
		      $this->getUser()->setAttribute('montos', $comprobante[$i]->getMontos(),$f[$i]);
			  $this->i=0;
			  $this->formulario=$f;
            }else{
            	$this->i="";
                $this->formulario=array();
            	$javascript="alert_('El Asiento Contable de la Depreciaci&oacute;n de Activos a la fecha $feccomp ya fue realizado');";
            }
          }else
          {
          	  Bienes::generaComprobanteDepreciacion($fechacomp,&$comprobante);
	          $form="sf_admin/bieciemesdan/confincomgen";
			  $i=0;
		      $f[$i]=$form.$i;
		      $this->getUser()->setAttribute('grabar',$comprobante[$i]->getGrabar(),$f[$i]);
		      $this->getUser()->setAttribute('reftra',$comprobante[$i]->getReftra(),$f[$i]);
		      $this->getUser()->setAttribute('numcomp',$comprobante[$i]->getNumcom(),$f[$i]);
		      $this->getUser()->setAttribute('fectra',$comprobante[$i]->getFectra(),$f[$i]);
		      $this->getUser()->setAttribute('destra',$comprobante[$i]->getDestra(),$f[$i]);
		      $this->getUser()->setAttribute('ctas', $comprobante[$i]->getCtas(),$f[$i]);
		      $this->getUser()->setAttribute('desctas', $comprobante[$i]->getDesc(),$f[$i]);
		      $this->getUser()->setAttribute('tipmov', '');
		      $this->getUser()->setAttribute('mov', $comprobante[$i]->getMov(),$f[$i]);
		      $this->getUser()->setAttribute('montos', $comprobante[$i]->getMontos(),$f[$i]);
			  $this->i=0;
			  $this->formulario=$f;
          	  $javascript="$('depcalculada').value='N';";
          }
        }
        else
        { $this->i="";
          $this->formulario=array();
          $javascript="alert_('No se puede realizar un Asiento Contable ya que la Depreciaci&oacute;n de los Activos no ha sido ejecutada');";
        }
        $output = '[["javascript","'.$javascript.'",""],["","",""],["","",""]]';
        $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');
       break;
      case '3':
         if ($codigo!="")
        {
          $fec1_aux = split("/", $codigo);
          if (checkdate(intval($fec1_aux[1]), intval($fec1_aux[0]), intval($fec1_aux[2])))
          {
            $lafechadep=$fec1_aux[2]."-".$fec1_aux[1]."-".$fec1_aux[0];
            $msj="";
            Bienes::iniciarDepreciacionActivos('1',$lafechadep,&$depejecutadam,&$depejecutadai,&$montodepm,&$montodepi,&$msj);
            Bienes::iniciarDepreciacionActivos('2',$lafechadep,&$depejecutadam,&$depejecutadai,&$montodepm,&$montodepi,&$msj);
            if ($msj=="")
            {
	            if ($depejecutadam==true && $depejecutadai==true)
	            {
	              Bienes::actualizarFecdep($lafechadep,$montodepm,$montodepi);
	              $depejecutadam=false;
	              $depejecutadai=false;
	            }
             $javascript="$('fechareval').hide(); $('depcalculada').value='S'; alert('Depreciación de Activos Realizada'); ";
            }else
            {
            	$javascript="$msj";
            }

          }
          else
          {
            $javascript="alert('La Fecha es Inválida'); $('fecha').value=''; $('fecha').focus();";
          }
        }else{
            $lafechadep=date('Y-m-d');
            $msj="";
            Bienes::iniciarDepreciacionActivos('1',$lafechadep,&$depejecutadam,&$depejecutadai,&$montodepm,&$montodepi,&$msj);
            Bienes::iniciarDepreciacionActivos('2',$lafechadep,&$depejecutadam,&$depejecutadai,&$montodepm,&$montodepi,&$msj);
            if ($msj=="")
            {
            if ($depejecutadam==true && $depejecutadai==true)
            {
              Bienes::actualizarFecdep($lafechadep,$montodepm,$montodepi);
              $depejecutadam=false;
              $depejecutadai=false;
            }
            $javascript="$('fechareval').hide(); $('depcalculada').value='S'; alert('Depreciación de Activos Realizada'); ";
            }else
            {
            	$javascript="$msj";
            }
        }
        $output = '[["javascript","'.$javascript.'",""],["","",""],["","",""]]';
        $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');
        return sfView::HEADER_ONLY;
       break;
      default:
        $output = '[["","",""],["","",""],["","",""]]';
        $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');
        return sfView::HEADER_ONLY;
        break;
    }

  }

}
