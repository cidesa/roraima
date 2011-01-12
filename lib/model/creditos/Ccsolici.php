<?php

/**
 * Subclass for representing a row from the 'ccsolici' table.
 *
 *
 *
 * @package lib.model
 */
class Ccsolici extends BaseCcsolici
{
 protected $estasig='';
 protected $nomben='';
 protected $nomusu='';
 //****** para el modulo informes *****//
 protected $ccanalis_id=array();
 protected $ccclainf_id=array();
 protected $total=0;
 protected $desresbar="";
 protected $titulo="";
 protected $contenido="";
 protected $opciones="";
 //************************************//


 protected $ccestado_id=0;
 protected $ccestado_id2=0;
 protected $ccmunici_id2=0;
 //protected $ccacteco_id=0;
 protected $ccparroq_id=0;
 protected $ccperpre_id=0;
 protected $cedrif="";
 protected $telben="";
 protected $faxben="";
 protected $corele="";
 protected $creant=false;
 protected $proela="";
 protected $matpri="";
 protected $dissisven="";
 protected $celben="";
 //protected $ccorimatpri_id=0;
 protected $empacthom=0;
 protected $empactmuj=0;
 protected $aregeo="";
 protected $empdirgen=0;
 protected $empindgen=0;
 protected $ccacteco_id2=0;
 protected $desacteco="";
 protected $respro="";
 protected $nompro="";
 protected $monapo=0;
 protected $ingres="";
 protected $dirnomurb2="";
 protected $dircalles2="";
 protected $dircasedi2="";
 protected $dirnumpis2="";
 protected $dirapatar2="";
 protected $dirpunref2="";
 protected $numtel="";
 protected $numfax="";
 protected $mail="";
 protected $numcel="";
 protected $codaretel = "";
 protected $codarecel = "";
 protected $codarefax = "";
 protected $codaretel2 = "";
 protected $codarecel2 = "";
 protected $codarefax2 = "";
 protected $oculta2="";
 protected $oculta3="";
 protected $oculta4="";
 protected $dirnomurb3="";
 protected $dircalles3="";
 protected $dircasedi3="";
 protected $dirnumpis3="";
 protected $dirapatar3="";
 protected $dirpunref3="";
 protected $numtelloc="";
 protected $numotrtel="";
 protected $corava="";
 protected $numcel2="";
 protected $cctipups_id=0;
 protected $dirben='';
 protected $ccperpre_id2=0;
 protected $ccestciv_id=0;
 protected $nomcon="";
 protected $cedcon="";
 protected $lugtracon="";
 protected $telcon="";
 protected $celcon="";
 protected $cedrepben1="";
 protected $cedrepben2="";
 protected $cedrepben3="";
 protected $cedrepben4="";
 protected $nomrepben1="";
 protected $nomrepben2="";
 protected $nomrepben3="";
 protected $nomrepben4="";
 protected $parentrepben1="";
 protected $parentrepben2="";
 protected $parentrepben3="";
 protected $parentrepben4="";
 protected $ccestado_id3=0;
 protected $ccmunici_id3=0;
 protected $ccparroq_id2=0;
 protected $ccestado_id4=0;
 protected $ccmunici_id4=0;
 protected $ccparroq_id4=0;
 protected $ccestado_id5=0;
 protected $ccmunici_id5=0;
 protected $ccparroq_id5=0;
 protected $ccestado_id6=0;
 protected $ccmunici_id6=0;
 protected $ccparroq_id6=0;
 protected $ccestado_id7=0;
 protected $ccmunici_id7=0;
 protected $ccparroq_id7=0;
 protected $ccestado_id8=0;
 protected $ccmunici_id8=0;
 protected $ccparroq_id8=0;
 protected $ccestado_id9=0;
 protected $ccmunici_id9=0;
 protected $ccparroq_id9=0;
 protected $nomentfin="";
 protected $numcre="";
 protected $moncre=0;
 protected $salact=0;
 protected $estatu1="";
 protected $nomentfin2="";
 protected $numcre2="";
 protected $moncre2=0;
 protected $salact2=0;
 protected $estatu2="";
 protected $feccre="";
 protected $feccre2="";

 protected $nomgar="";
 protected $monestgar=0;
 protected $monava=0;
 protected $fecrec="";
 protected $reapor="";
 protected $nompro1="";
 protected $cedpro="";
 protected $ubinomurb="";
 protected $ubinumcal="";
 protected $ubinumcas="";
 protected $ubinumpis="";
 protected $dirnumapt="";
 protected $ubipunref="";
 protected $grava1=true;
 protected $grado1="";
 protected $ccperpre_id3=0;

 protected $nomgar2="";
 protected $monestgar2=0;
 protected $monava2=0;
 protected $fecrec2="";
 protected $reapor2="";
 protected $nompro2="";
 protected $cedpro2="";
 protected $ubinomurb2="";
 protected $ubinumcal2="";
 protected $ubinumcas2="";
 protected $ubinumpis2="";
 protected $dirnumapt2="";
 protected $ubipunref2="";
 protected $grava2=true;
 protected $grado2="";
 protected $ccperpre_id4=0;

 protected $nomgar3="";
 protected $monestgar3=0;
 protected $monava3=0;
 protected $fecrec3="";
 protected $reapor3="";
 protected $nompro3="";
 protected $cedpro3="";
 protected $ubinomurb3="";
 protected $ubinumcal3="";
 protected $ubinumcas3="";
 protected $ubinumpis3="";
 protected $dirnumapt3="";
 protected $ubipunref3="";
 protected $grava3=true;
 protected $grado3="";
 protected $ccperpre_id5=0;

 protected $ccclabie_id1="";
 protected $desbieadq1="";
 protected $grava4=true;
 protected $grado4="";
 protected $cctipprobie_id1=0;
 protected $proced1="";
 protected $monpre1=0;
 protected $monfacpro1=0;
 protected $ubinomurb4="";
 protected $ubinumcal4="";
 protected $ubinumcas4="";
 protected $ubinumpis4="";
 protected $ubinumapt4="";
 protected $ubipunref4="";
 protected $ccclabie_id2="";
 protected $desbieadq2="";
 protected $grava5=true;
 protected $grado5="";
 protected $cctipprobie_id2=0;
 protected $proced2="";
 protected $monpre2=0;
 protected $monfacpro2=0;
 protected $ubinomurb5="";
 protected $ubinumcal5="";
 protected $ubinumcas5="";
 protected $ubinumpis5="";
 protected $ubinumapt5="";
 protected $ubipunref5="";
 protected $ccclabie_id3="";
 protected $desbieadq3="";
 protected $grava6=true;
 protected $grado6="";
 protected $cctipprobie_id3=0;
 protected $proced3="";
 protected $monpre3=0;
 protected $monfacpro3=0;
 protected $ubinomurb6="";
 protected $ubinumcal6="";
 protected $ubinumcas6="";
 protected $ubinumpis6="";
 protected $ubinumapt6="";
 protected $ubipunref6="";

 /**  Para Recaudos por Solicitud - WYanez */
 protected $objrecsol=array();

 /*Para los datos Socio Económicos - Edgar Luzardo*/
 protected $ccorimatpri_id = 0;
 protected $ccestruc_id = 0;
 protected $ccriezona_id = 0;
 protected $ccacteco_id = 0;
 protected $esptipvi = "";
 protected $dormit = 0;
 protected $banos = 0;
 protected $sala = 0;
 protected $cocina = 0;
 protected $lavade = 0;
 protected $closet = 0;
 protected $jardin = 0;
 protected $estacio = 0;
 protected $totalpie = 0;
 protected $expliestruc = "";
 protected $techos = "";
 protected $paredes = "";
 protected $piso = "";
 protected $revest = "";
 protected $conser = "";
 protected $edad = "";
 protected $zona = "";
 protected $dist = "";
 protected $acceso = "";
 protected $observ = "";
 protected $linnorte = " mts con ";
 protected $linsur = " mts con ";
 protected $lineste = " mts con ";
 protected $linoeste = " mts con ";
 protected $superfi = "";
 protected $trasoc = "";
 protected $analisis = "";
 protected $recomen = "";
 protected $respon = "";
 protected $asigna = 0;
 protected $deducc= 0;
 protected $asigcon= 0;
 protected $deducon= 0;
 protected $gasfam= 0;
 /*Fin datos Socio Económicos*/

 /*Para los datos del inmueble a adquirir*/
  protected $termetcua = 0;
  protected $conmetcua = 0;
  protected $numhab = "";
  protected $numban = "";
  protected $numest = "";
  protected $precinmu = 0;
  protected $diaofe = "";
  protected $cappago = 0;
  protected $nomproven = "";
  protected $cedrifpro = "";
  protected $codarehab = "";
  protected $telhab = "";
  protected $codarecelpro = "";
  protected $telcel = "";
  protected $codareofi = "";
  protected $telofi = "";
 /*Fin de los datos del inmueble a adquirir*/

 /*Arreglo para el grupo familiar*/
 protected $grupofam = array();

  public function __toString(){
    return $this->getNumsol();
  }

  public function afterHydrate()
	{
		$ccbenefi = $this->getCcbenefi();
		if($ccbenefi) $this->nomben = $ccbenefi->getNomben();

  	$c = new Criteria();
    $c->add(CcusuarioPeer::ID,$this->getCcusuarioId());
    $per0 = CcusuarioPeer::doSelectOne($c);
  if($per0){
  	$c = new Criteria();
    $c->add(CcbenefiPeer::ID,$per0->getCcbenefiId());
    $per = CcbenefiPeer::doSelectOne($c);
    $this->ccestciv_id = $per->getCcestcivId();
    $this->ccperpre_id = $per->getCcperpreId();
    //$this->ccacteco_id=$per->getCcactecoId();
    $this->ccparroq_id=$per->getCcparroqId();
    $this->cedrif=$per->getCedrif();
    $this->nomben=$per->getNomben();
   	$this->dirben = "Urbanización ".$per->getDirnomurb()." Calle(s) ".$per->getDircalles()." Casa / Edificio ".$per->getDircasedi()." N° Piso ".$per->getDirnumpis()." Apto ".$per->getDirapatar()." Referencia ".$per->getDirapatar();
    $this->dirnomurb=$per->getDirnomurb();
    $this->dircalles=$per->getDircalles();
    $this->dircasedi=$per->getDircasedi();
    $this->dirnumpis=$per->getDirnumpis();
    $this->dirapatar=$per->getDirapatar();
    $this->dirpunref=$per->getDirpunref();
    $this->codaretel = $per->getCodaretel();
    $this->codarecel = $per->getCodarecel();
    $this->codarefax = $per->getCodareFax();
    $this->telben=$per->getTelben();
    $this->celben=$per->getCelben();
    $this->faxben=$per->getFaxben();
    $this->corele=$per->getCorele();
    $this->creant=$per->getCreant();
    $this->proela=$per->getProela();
    $this->matpri=$per->getMatpri();
    $this->dissisven=$per->getDissisven();
    $this->ingres=$per->getIngres();
    //$this->ccorimatpri_id=$per->getCcorimatpriId();
    $this->empacthom=$per->getEmpacthom();
    $this->empactmuj=$per->getEmpactmuj();
    $this->ingres=$per->getIngres();
    $this->cctipups_id=$per->getCctipupsId();


    $c = new Criteria();
    $c->add(CcdircorbenPeer::CCBENEFI_ID,$per0->getCcbenefiId());
    $per3 = CcdircorbenPeer::doSelectOne($c);

    if($per3){
      $this->dirnomurb2=$per3->getDirnomurb();
      $this->dircalles2=$per3->getDirnumcal();
      $this->dircasedi2=$per3->getDirnumcasedi();
      $this->dirnumpis2=$per3->getDirnumpis();
      $this->dirapatar2=$per3->getDirnumapt();
      $this->dirpunref2=$per3->getDirpunref();
      $this->codaretel2 = $per3->getCodaretel();
      $this->codarecel2 = $per3->getCodarecel();
      $this->codarefax2 = $per3->getCodareFax();
      $this->numtel=$per3->getNumtel();
      $this->numcel=$per3->getNumcel();
      $this->numfax=$per3->getNumfax();
      $this->mail=$per3->getMail();
      $this->ccparroq_id2=$per3->getCcparroqId();
    }
    $c = new Criteria();
    $c->add(CcconbenPeer::CCBENEFI_ID,$per0->getCcbenefiId());
    $per4 = CcconbenPeer::doSelectOne($c);

    if($per4){
    	$this->ccperpre_id2=$per4->getCcperpreId();
    	$this->nomcon=$per4->getNomcon();
 		$this->cedcon=$per4->getCedcon();
 		$this->lugtracon=$per4->getLugtracon();
 		$this->telcon=$per4->getTelcon();
 		$this->celcon=$per4->getCelcon();
    }

	$c = new Criteria();
    $c->add(CcrepbenPeer::CCBENEFI_ID,$per0->getCcbenefiId());
    //$c->setLimit(4);
    $per5 = CcrepbenPeer::doSelect($c);
    if ($per5){
    	/*$i=1;
    	foreach($per5 as $p){
    		eval('$this->cedrepben'.$i.'=$p->getCedrifben();');
     		eval('$this->nomrepben'.$i.'=$p->getNomrepben();');
     		eval('$this->parentrepben'.$i.'=$p->getParent();');
    		$i++;
    	}*/
    	foreach($per5 as $p){
    		$c =  new Criteria();
    		$c->add(CcparentPeer::ID,$p->getCcparentId());
    		$parent = CcparentPeer::doSelectOne($c);
    		$cedrifbenaux = $p->getCedrifben();
    		$nomrepbenaux = $p->getNomrepben();
    		if($parent) $parentaux = $parent->getNomparent(); else $parentaux='';
    		$this->grupofam[] = array("cedrifben"=>$cedrifbenaux,"nomrepben"=>$nomrepbenaux,"parent"=>$parentaux);
    	}

    }

    $c = new Criteria();
    $c->add(CccreantPeer::CCBENEFI_ID,$per0->getCcbenefiId());
    $c->setLimit(2);
    $per6 = CccreantPeer::doSelect($c);
    if ($per6){
    	$i=0;
    		foreach($per6 as $p){
    			if ($p->getTipent()=='G')
    				$i="";
    		eval('$this->feccre'.$i.'=$p->getFeccre();');
    		eval('$this->nomentfin'.$i.'=$p->getNomentfin();');
    		eval('$this->numcre'.$i.'=$p->getNumCre();');
    		eval('$this->moncre'.$i.'=$p->getMonCre();');

    		eval('$this->salact'.$i.'=$p->getSalact();');
    			if ($i=="")
    				$i=1;
    				eval('$this->estatu'.$i.'=$p->getEstatu();');
    		$i++;
    	}
    }

    $c = new Criteria();
    $c->add(CcsoliciPeer::CCBENEFI_ID,$per0->getCcbenefiId());
    $c->addJoin(CcsoliciPeer::ID,CcdatsoecoPeer::CCSOLICI_ID);
    $datsoeco = CcdatsoecoPeer::doSelectOne($c);
    if ($datsoeco){
    	$this->ccorimatpri_id = $datsoeco->getCcorimatpriId();
    	$this->ccestruc_id = $datsoeco->getCcestrucId();
    	$this->ccriezona_id = $datsoeco->getCcriezonaId();
    	$this->ccacteco_id = $datsoeco->getCcactecoId();
    	$this->esptipvi = $datsoeco->getEsptipvi();
    	$this->dormit = $datsoeco->getDormit();
    	$this->banos = $datsoeco->getBanos();
    	$this->sala = $datsoeco->getSala();
    	$this->cocina = $datsoeco->getCocina();
    	$this->lavade = $datsoeco->getLavade();
    	$this->closet = $datsoeco->getCloset();
    	$this->jardin = $datsoeco->getJardin();
    	$this->estacio = $datsoeco->getEstacio();
    	$this->totalpie = $datsoeco->getTotalpie();
    	$this->expliestruc = $datsoeco->getExpliestruc();
    	$this->techos = $datsoeco->getTechos();
    	$this->paredes = $datsoeco->getParedes();
    	$this->piso = $datsoeco->getPiso();
    	$this->revest = $datsoeco->getRevest();
    	$this->conser = $datsoeco->getConser();
    	$this->edad = $datsoeco->getEdad();
    	$this->zona = $datsoeco->getZona();
    	$this->dist = $datsoeco->getDist();
    	$this->acceso = $datsoeco->getAcceso();
    	$this->observ = $datsoeco->getObserv();
    	$this->linnorte = $datsoeco->getLinnorte();
    	$this->linsur = $datsoeco->getLinsur();
    	$this->lineste = $datsoeco->getLineste();
    	$this->linoeste = $datsoeco->getLinoeste();
    	$this->superfi = $datsoeco->getSuperfi();
    	$this->trasoc = $datsoeco->getTrasoc();
    	$this->analisis = $datsoeco->getAnalisis();
    	$this->recomen = $datsoeco->getRecomen();
    	if($datsoeco->getRespon() == "S"){
    		$resp = "1";
    	}else {
    		$resp = "0";
    	}
    	$this->respon = $resp;
    	$this->asigna = $datsoeco->getAsigna();
    	$this->deducc = $datsoeco->getDeducc();
    	$this->asigcon = $datsoeco->getAsigcon();
    	$this->deducon = $datsoeco->getDeducon();
    	$this->gasfam = $datsoeco->getGasfam();
    	$this->cappago = $datsoeco->getCappago();
    }
}
    $c = new Criteria();
    $c->add(CcproyecPeer::CCSOLICI_ID,$this->getId());
    $per2 = CcproyecPeer::doSelectOne($c);

    if($per2){
	    $this->aregeo=$per2->getAregeo();
	    $this->empindgen=$per2->getEmpindgen();
	    $this->empdirgen=$per2->getEmpdirgen();
	    $this->ccacteco_id2=$per2->getCcactecoId();
	    $this->desacteco=$per2->getDesacteco();
	    $this->respro=$per2->getRespro();
	    $this->nompro=$per2->getNompro();
	    $this->monapo=Herramientas::toFloat($per2->getMonapo());
	}

	$c = new Criteria();
    $c->add(CcgarsolPeer::CCSOLICI_ID,$this->getId());
    $c->addAscendingOrderByColumn(CcgarsolPeer::NUMGAR);
    $per7 = CcgarsolPeer::doSelect($c);
	if ($per7){
    	$i=0;
    		foreach($per7 as $p){
    			if ($i==0)
    				$i="";
				 eval('$this->nomgar'.$i.'=$p->getNomgar();');
				 eval('$this->monestgar'.$i.'=$p->getMonestgar();');
				 eval('$this->monava'.$i.'=$p->getMonava();');
				 eval('$this->fecrec'.$i.'=$p->getFecrec();');
				 eval('$this->reapor'.$i.'=$p->getReapor();');
				 eval('$this->cedpro'.$i.'=$p->getCedpro();');
				 eval('$this->ubinomurb'.$i.'=$p->getUbinomurb();');
				 eval('$this->ubinumcal'.$i.'=$p->getUbinumcal();');
				 eval('$this->ubinumcas'.$i.'=$p->getUbinumcasedi();');
				 eval('$this->ubinumpis'.$i.'=$p->getUbinumpis();');
				 eval('$this->dirnumapt'.$i.'=$p->getUbinumapt();');
				 eval('$this->ubipunref'.$i.'=$p->getUbipunref();');

    			if ($i=="")
    				$i=1;
				 eval('$this->ccparroq_id'.($i+3).'=$p->getCcparroqId();');
				 eval('$this->ccperpre_id3'.($i+2).'=$p->getCcperpreId();');
				 eval('$this->nompro'.$i.'=$p->getNompro();');
				 eval('$this->grava'.$i.'=$p->getGravam();');
				 eval('$this->grado'.$i.'=$p->getGrado();');
    		$i++;
    	}
    }
	$c = new Criteria();
    $c->add(CcbieadqPeer::CCSOLICI_ID,$this->getId());
    $c->addAscendingOrderByColumn(CcbieadqPeer::NUMBIE);
    $per8 = CcbieadqPeer::doSelect($c);
	if ($per8){
    	$i=1;
    		foreach($per8 as $p){


        		 eval('$this->ccclabie_id'.$i.'=$p->getCcclabieId();');
				 //eval('$this->desbieadq'.$i.'=$p->getDesbieadq();');
				 //eval('$this->cctipprobie_id'.$i.'=$p->getCctipprobieId();');
				 //eval('$this->grava'.($i+3).'=$p->getGravam();');
				 //eval('$this->grado'.($i+3).'=$p->getGrado();');
				 //eval('$this->proced'.$i.'=$p->getProced();');
				 //eval('$this->monpre'.$i.'=$p->getMonpre();');
				 //eval('$this->monfacpro'.$i.'=$p->getMonfacpro();');
				 eval('$this->ubinomurb'.($i+3).'=$p->getUbinomurb();');
				 eval('$this->ubinumcal'.($i+3).'=$p->getUbinumcal();');
				 eval('$this->ubinumcas'.($i+3).'=$p->getUbinumcas();');
				 eval('$this->ubinumpis'.($i+3).'=$p->getUbinumpis();');
				 eval('$this->ubinumapt'.($i+3).'=$p->getUbinumapt();');
				 eval('$this->ubipunref'.($i+3).'=$p->getUbipunref();');
				 eval('$this->ccparroq_id'.($i+6).'=$p->getCcparroqId();');
				 $this->setTermetcua($p->getTermetcua());
				 $this->setConmetcua($p->getConmetcua());
				 $this->setNumhab($p->getNumhab());
				 $this->setNumban($p->getNumban());
				 $this->setNumest($p->getNumest());
				 $this->setPrecinmu($p->getPrecinmu());
				 $this->setDiaofe($p->getDiaofe());
				 //$this->setCuopag($p->getCuopag());
				 $this->setNomproven($p->getNomproven());
				 $this->setCedrifpro($p->getCedrifpro());
				 $this->setCodarehab($p->getCodarehab());
				 $this->setTelhab($p->getTelhab());
				 $this->setCodareofi($p->getCodareofi());
				 $this->setTelofi($p->getTelofi());
				 $this->setCodarecelPro($p->getCodarecel());
				 $this->setTelcel($p->getTelcel());
    			$i++;

    		}
	}

  }

  public function llenarDatosBen($codigo){
  	$c = new Criteria();
    $c->add(CcusuarioPeer::ID,$codigo);
    $per0 = CcusuarioPeer::doSelectOne($c);
	if ($per0){
  		$c = new Criteria();
    	$c->add(CcbenefiPeer::ID,$per0->getCcbenefiId());
    	$per = CcbenefiPeer::doSelectOne($c);

    	$this->ccestciv_id = $per->getCcestcivId();
		$this->ccperpre_id = $per->getCcperpreId();
    	//$this->ccacteco_id=$per->getCcactecoId();
    	$this->ccparroq_id=$per->getCcparroqId();
    	$this->cedrif=$per->getCedrif();
    	$this->nomben=$per->getNomben();
    	$this->dirben = "Urbanización ".$per->getDirnomurb()." Calle(s) ".$per->getDircalles()." Casa / Edificio ".$per->getDircasedi()." N° Piso ".$per->getDirnumpis()." Apto ".$per->getDirapatar()." Referencia ".$per->getDirpunref();
    	$this->dirnomurb=$per->getDirnomurb();
    	$this->dircalles=$per->getDircalles();
    	$this->dircasedi=$per->getDircasedi();
    	$this->dirnumpis=$per->getDirnumpis();
    	$this->dirapatar=$per->getDirapatar();
    	$this->dirpunref=$per->getDirpunref();
    	$this->codaretel = $per->getCodaretel();
        $this->codarecel = $per->getCodarecel();
        $this->codarefax = $per->getCodareFax();
    	$this->telben=$per->getTelben();
    	$this->faxben=$per->getFaxben();
    	$this->corele=$per->getCorele();
    	$this->creant=$per->getCreant();
    	$this->proela=$per->getProela();
   	    $this->matpri=$per->getMatpri();
    	$this->dissisven=$per->getDissisven();
    	$this->celben=$per->getCelben();
    	$this->ingres=$per->getIngres();
    	//$this->ccorimatpri_id=$per->getCcorimatpriId();
    	$this->empacthom=$per->getEmpacthom();
    	$this->empactmuj=$per->getEmpactmuj();
    	$this->ingres=$per->getIngres();
    	$this->cctipups_id=$per->getCctipupsId();

    $c = new Criteria();
    $c->add(CcdircorbenPeer::CCBENEFI_ID,$per->getId());
    $per3 = CcdircorbenPeer::doSelectOne($c);

    if($per3){
       $this->dirnomurb2=$per3->getDirnomurb();
       $this->dircalles2=$per3->getDirnumcal();
       $this->dircasedi2=$per3->getDirnumcasedi();
       $this->dirnumpis2=$per3->getDirnumpis();
 	   $this->dirapatar2=$per3->getDirnumapt();
 	   $this->dirpunref2=$per3->getDirpunref();
 	   $this->codaretel2 = $per3->getCodaretel();
       $this->codarecel2 = $per3->getCodarecel();
       $this->codarefax2 = $per3->getCodareFax();
 	   $this->numtel=$per3->getNumtel();
 	   $this->numfax=$per3->getNumfax();
 	   $this->mail=$per3->getMail();
 	   $this->numcel=$per3->getNumcel();
 	   $this->ccparroq_id2=$per3->getCcparroqId();
    }

      $c = new Criteria();
    $c->add(CcconbenPeer::CCBENEFI_ID,$per0->getCcbenefiId());
    $per4 = CcconbenPeer::doSelectOne($c);

    if($per4){
    	$this->ccperpre_id2 = $per4->getCcperpreId();
    	$this->nomcon=$per4->getNomcon();
 		$this->cedcon=$per4->getCedcon();
 		$this->lugtracon=$per4->getLugtracon();
 		$this->telcon=$per4->getTelcon();
 		$this->celcon=$per4->getCelcon();
    }
    	$c = new Criteria();
    $c->add(CcrepbenPeer::CCBENEFI_ID,$per0->getCcbenefiId());
    //$c->setLimit(4);
    $per5 = CcrepbenPeer::doSelect($c);
    if ($per5){
    	/*$i=1;
    	foreach($per5 as $p){
    		eval('$this->cedrepben'.$i.'=$p->getCedrifben();');
     		eval('$this->nomrepben'.$i.'=$p->getNomrepben();');
     		eval('$this->parentrepben'.$i.'=$p->getParent();');
    		$i++;
    	}*/
    	foreach($per5 as $p){
    		$c =  new Criteria();
    		$c->add(CcparentPeer::ID,$p->getCcparentId());
    		$parent = CcparentPeer::doSelectOne($c);
    		$cedrifbenaux = $p->getCedrifben();
    		$nomrepbenaux = $p->getNomrepben();
    		if($parent) $parentaux = $parent->getNomparent(); else $parentaux='';
    		$this->grupofam[] = array("cedrifben"=>$cedrifbenaux,"nomrepben"=>$nomrepbenaux,"parent"=>$parentaux);
    	}

    }
    $c = new Criteria();
    $c->add(CccreantPeer::CCBENEFI_ID,$per0->getCcbenefiId());
    $c->setLimit(2);
    $per6 = CccreantPeer::doSelect($c);
    if ($per6){
    	$i=0;
    		foreach($per6 as $p){
    			if ($p->getTipent()==0)
    				$i="";
    		eval('$this->feccre'.$i.'=$p->getFeccre();');
    		eval('$this->nomentfin'.$i.'=$p->getNomentfin();');
    		eval('$this->numcre'.$i.'=$p->getNumCre();');
    		eval('$this->moncre'.$i.'=$p->getMonCre();');
    		eval('$this->salact'.$i.'=$p->getSalact();');
    			if ($i=="")
    				$i=1;
    	    eval('$this->estatu'.$i.'=$p->getEstatu();');
    		$i++;
    	}
    }

        $c = new Criteria();
    $c->add(CcproyecPeer::CCSOLICI_ID,$this->getId());
    $per2 = CcproyecPeer::doSelectOne($c);

    if($per2){
	    $this->aregeo=$per2->getAregeo();
	    $this->empindgen=$per2->getEmpindgen();
	    $this->empdirgen=$per2->getEmpdirgen();
	    $this->ccacteco_id2=$per2->getCcactecoId();
	    $this->desacteco=$per2->getDesacteco();
	    $this->respro=$per2->getRespro();
	    $this->nompro=$per2->getNompro();
	    $this->monapo=Herramientas::toFloat($per2->getMonapo());
	  }
    
    if($this->getId()=='')
    {
      $this->ccestado_id = 10;
      $this->ccciudad_id = 13;
      $this->ccmunici_id = 1;
      $this->cccircuito_id = 1;
    }
  }
}

public function setCctipprobieId1($val){
 	$this->cctipprobie_id1=$val;
 }

  public function getCctipprobieId1(){
    return $this->cctipprobie_id1;

  }

public function setCctipprobieId2($val){
 	$this->cctipprobie_id2=$val;
 }

  public function getCctipprobieId2(){
    return $this->cctipprobie_id2;

  }

public function setCctipprobieId3($val){
 	$this->cctipprobie_id3=$val;
 }

  public function getCctipprobieId3(){
    return $this->cctipprobie_id3;

  }

public function setCcclabieId1($val){
 	$this->ccclabie_id1=$val;
 }

  public function getCcclabieId1(){
    return $this->ccclabie_id1;

  }

public function setCcclabieId2($val){
 	$this->ccclabie_id2=$val;
 }

  public function getCcclabieId2(){
    return $this->ccclabie_id2;

  }

public function setCcclabieId3($val){
 	$this->ccclabie_id3=$val;
 }

  public function getCcclabieId3(){
    return $this->ccclabie_id3;

  }

 public function setCcestcivId($val){
 	$this->ccestciv_id=$val;
 }

  public function getCcestcivId(){
    return $this->ccestciv_id;

  }

 public function setCcperpreId($val){
 	$this->ccperpre_id=$val;
 }

  public function getCcperpreId(){
    return $this->ccperpre_id;

  }

 public function setCcperpreId2($val){
 	$this->ccperpre_id2=$val;
 }

  public function getCcperpreId2(){
    return $this->ccperpre_id2;

  }

 public function setCcperpreId3($val){
 	$this->ccperpre_id3=$val;
 }

  public function getCcperpreId3(){
    return $this->ccperpre_id3;

  }
   public function setCcperpreId4($val){
 	$this->ccperpre_id4=$val;
 }

  public function getCcperpreId4(){
    return $this->ccperpre_id4;

  }
   public function setCcperpreId5($val){
 	$this->ccperpre_id5=$val;
 }

  public function getCcperpreId5(){
    return $this->ccperpre_id5;

  }

 public function setCcestadoId($val){
 	$this->ccestado_id=$val;
 }

  public function getCcestadoId(){
    return $this->ccestado_id;

  }


  public function setCctipupsId($val){
 	$this->cctipups_id=$val;
 }

  public function getCctipupsId(){
    return $this->cctipups_id;

  }


 public function setCcactecoId($val){
 	$this->ccacteco_id=$val;
 }

  public function getCcactecoId(){
    return $this->ccacteco_id;

  }

 public function setCcactecoId2($val){
 	$this->ccacteco_id2=$val;
 }

  public function getCcactecoId2(){
    return $this->ccacteco_id2;

  }


   public function setCcparroqId($val){
 	$this->ccparroq_id=$val;
 }

  public function getCcparroqId(){
    return $this->ccparroq_id;

  }

 public function setCcestadoId2($val){
 	$this->ccestado_id2=$val;
 }

  public function getCcestadoId2(){
    return $this->ccestado_id2;

  }

   public function setCcmuniciId2($val){
 	$this->ccmunici_id2=$val;
 }

  public function getCcmuniciId2(){
    return $this->ccmunici_id2;

  }

 public function setCcparroqId4($val){
 	$this->ccparroq_id4=$val;
 }

  public function getCcparroqId4(){
    return $this->ccparroq_id4;

  }

 public function setCcestadoId4($val){
 	$this->ccestado_id4=$val;
 }

  public function getCcestadoId4(){
    return $this->ccestado_id4;

  }

   public function setCcmuniciId4($val){
 	$this->ccmunici_id4=$val;
 }

  public function getCcmuniciId4(){
    return $this->ccmunici_id4;
  }



 public function setCcparroqId5($val){
 	$this->ccparroq_id5=$val;
 }

  public function getCcparroqId5(){
    return $this->ccparroq_id5;

  }

 public function setCcestadoId5($val){
 	$this->ccestado_id5=$val;
 }

  public function getCcestadoId5(){
    return $this->ccestado_id5;

  }

   public function setCcmuniciId5($val){
 	$this->ccmunici_id5=$val;
 }

  public function getCcmuniciId5(){
    return $this->ccmunici_id5;
  }



 public function setCcparroqId6($val){
 	$this->ccparroq_id6=$val;
 }

  public function getCcparroqId6(){
    return $this->ccparroq_id6;

  }

 public function setCcestadoId6($val){
 	$this->ccestado_id6=$val;
 }

  public function getCcestadoId6(){
    return $this->ccestado_id6;

  }

   public function setCcmuniciId6($val){
 	$this->ccmunici_id6=$val;
 }

  public function getCcmuniciId6(){
    return $this->ccmunici_id6;
  }




 public function setCcparroqId7($val){
 	$this->ccparroq_id7=$val;
 }

  public function getCcparroqId7(){
    return $this->ccparroq_id7;

  }

 public function setCcestadoId7($val){
 	$this->ccestado_id7=$val;
 }

  public function getCcestadoId7(){
    return $this->ccestado_id7;

  }

   public function setCcmuniciId7($val){
 	$this->ccmunici_id7=$val;
 }

  public function getCcmuniciId7(){
    return $this->ccmunici_id7;
  }





 public function setCcparroqId8($val){
 	$this->ccparroq_id8=$val;
 }

  public function getCcparroqId8(){
    return $this->ccparroq_id8;

  }

 public function setCcestadoId8($val){
 	$this->ccestado_id8=$val;
 }

  public function getCcestadoId8(){
    return $this->ccestado_id8;

  }

   public function setCcmuniciId8($val){
 	$this->ccmunici_id8=$val;
 }

  public function getCcmuniciId8(){
    return $this->ccmunici_id8;
  }


 public function setCcparroqId9($val){
 	$this->ccparroq_id9=$val;
 }

  public function getCcparroqId9(){
    return $this->ccparroq_id9;

  }

 public function setCcestadoId9($val){
 	$this->ccestado_id9=$val;
 }

  public function getCcestadoId9(){
    return $this->ccestado_id9;

  }

   public function setCcmuniciId9($val){
 	$this->ccmunici_id9=$val;
 }

  public function getCcmuniciId9(){
    return $this->ccmunici_id9;
  }


   public function setCcparroqId2($val){
 	$this->ccparroq_id2=$val;
 }

  public function getCcparroqId2(){
    return $this->ccparroq_id2;

  }

 public function setCcestadoId3($val){
 	$this->ccestado_id3=$val;
 }

  public function getCcestadoId3(){
    return $this->ccestado_id3;

  }

   public function setCcmuniciId3($val){
 	$this->ccmunici_id3=$val;
 }

  public function getCcmuniciId3(){
    return $this->ccmunici_id3;

  }

 public function setCcorimatpriId($val){
 	$this->ccorimatpri_id=$val;
 }

  public function getCcorimatpriId(){
    return $this->ccorimatpri_id;

  }

  public function setMonapo($val){
  	$this->monapo=$val;
  }

  public function getMonapo($val=false){
    if($val) return number_format($this->monapo,2,',','.');
    else return Herramientas::toFloat($this->monapo);
  }

    public function setMoncre($val){
  	$this->moncre=$val;
  }

  public function getMoncre($val=false){
    if($val) return number_format($this->moncre,2,',','.');
    else return Herramientas::toFloat($this->moncre);
  }

    public function setMoncre2($val){
  	$this->moncre2=$val;
  }

  public function getMoncre2($val=false){
    if($val) return number_format($this->moncre2,2,',','.');
    else return Herramientas::toFloat($this->moncre2);
  }

      public function setSalact($val){
  	$this->salact=$val;
  }

  public function getSalact($val=false){
    if($val) return number_format($this->salact,2,',','.');
    else return Herramientas::toFloat($this->salact);
  }

  public function setSalact2($val){
  	$this->salact2=$val;
  }

  public function getSalact2($val=false){
    if($val) return number_format($this->salact2,2,',','.');
    else return Herramientas::toFloat($this->salact2);
  }

 public function setIngres($val){
  	$this->ingres=$val;
  }

  public function getIngres($val=false){
    if($val) return number_format($this->ingres,2,',','.');
    else return Herramientas::toFloat($this->ingres);

  }

  public function getEstasig(){
  	$c = new Criteria();
  	$c->add(CcasiganaPeer::CCSOLICI_ID,self::getId());
  	$c->add(CcasiganaPeer::ESTATUS,'A');
  	/*$c->addDescendingOrderByColumn(CcasiganaPeer::ID);
  	$c->setLimit(1);*/
  	$aux = CcasiganaPeer::doSelectOne($c);
  	if($aux){
  		$estaux = $aux->getEstatus();
  	}
  	else {
  		$estaux = '';
  	}

  	if($estaux == 'A'){
  		return 'Asignada';
  	}
  	else {
  		return 'Gestionada';
  	}
  }

  public function getEstatusruta(){
    $c = new Criteria();
    $c->add(CcestcredPeer::CCSOLICI_ID,self::getId());
    $c->add(CcestcredPeer::CCESTSIG_ID,null);
    $estcred = CcestcredPeer::doSelectOne($c);
    if ($estcred){
    	$estatus = $estcred->getCcestatuId();
    	$c2 = $c = new Criteria();
    	$c2->add(CcestatuPeer::ID,$estatus);
    	$ccestatu = CcestatuPeer::doSelectOne($c2);
    	if($ccestatu){
    		return $ccestatu->getNombre();
    	}
    	else return '';
    }
    else {
    	return '';
    }

  }

  public function getGerencia(){
    $c = new Criteria();
	$c->add(CcestcredPeer::CCSOLICI_ID,self::getId());
    $c->add(CcestcredPeer::CCESTSIG_ID,null);
    $estcred = CcestcredPeer::doSelectOne($c);
    if ($estcred){
    	$gerencia = $estcred->getCcgerencdesId();
    	$c2 = $c = new Criteria();
    	$c2->add(CcgerencPeer::ID,$gerencia);
    	$ccgerenc = CcgerencPeer::doSelectOne($c2);
    	if($ccgerenc){
    		return $ccgerenc->getNomger();
    	}
    	else {
    		 return '';
    	}
    }
    else {
    	return '';
    }

  }

  public function getFecasi(){
	$c = new Criteria();
	$c->add(CcasiganaPeer::CCSOLICI_ID,self::getId());
    $c->add(CcasiganaPeer::ESTATUS,'A');
    $ccasigana = CcasiganaPeer::doSelectOne($c);
    if ($ccasigana){
    	return $ccasigana->getFecasig('d/m/Y');
    }
    else {
    	return '';
    }
  }

  /*public function getGerencia(){
  	$c =  new Criteria();
  	$c->add(CcestcredPeer::CCSOLICI_ID, self::getId());
  	$c->add(CcestcredPeer::CCESTSIG_ID,null);
  	$estcred = CcestcredPeer::doSelectOne($c);
  	if ($estcred){
  		return Herramientas::getX('id','ccgerenc','nomger',$estcred->getGerdesId());
  	}
  	else{
  		return 'No aplica';
  	}
  }*/
/*
  public function getEstatusruta(){
  	$c =  new Criteria();
  	$c->add(CcestcredPeer::CCSOLICI_ID, self::getId());
  	$c->add(CcestcredPeer::CCESTSIG_ID,null);
  	$estcred = CcestcredPeer::doSelectOne($c);
  	if ($estcred){
  		return Herramientas::getX('id','ccestatu','nombre',$estcred->getCcestatuId());
  	}
  	else{
  		return 'No aplica';
  	}
  }*/

  /*public function getFecasi(){
   	$c =  new Criteria();
  	$c->add(CcasiganaPeer::CCSOLICI_ID, self::getId());
  	$c->add(CcasiganaPeer::ESTATUS,'A');
  	$asigana = CcasiganaPeer::doSelectOne($c);
  	if($asigana){
  		return $asigana->getFecasig('d/m/Y');
  	}
  	else {
  		return '';
  	}
   }*/


  public function setMonestgar($val){
    if ($this->monestgar !== $val) {
      $this->monestgar = Herramientas::toFloat($val);
    }
  }

  public function getMonestgar($val=false){
    if($val) return number_format($this->monestgar,2,',','.');
    else return Herramientas::toFloat($this->monestgar);
  }

      public function setMonestgar2($val){
    if ($this->monestgar2 !== $val) {
      $this->monestgar2 = Herramientas::toFloat($val);
    }
  }

  public function getMonestgar2($val=false){
    if($val) return number_format($this->monestgar2,2,',','.');
    else return Herramientas::toFloat($this->monestgar2);
  }

      public function setMonestgar3($val){
  	$this->monestgar3=$val;
  }

  public function getMonestgar3($val=false){
    if($val) return number_format($this->monestgar3,2,',','.');
    else return Herramientas::toFloat($this->monestgar3);
  }

  public function setMonava($val){
    if ($this->monava !== $val) {
      $this->monava = Herramientas::toFloat($val);
    }
  }

  public function getMonava($val=false){
    if($val) return number_format($this->monava,2,',','.');
    else return Herramientas::toFloat($this->monava);
  }

  public function setMonava2($val){
    if ($this->monava !== $val) {
      $this->monava = Herramientas::toFloat($val);
    }
  }

  public function getMonava2($val=false){
    if($val) return number_format($this->monava2,2,',','.');
    else return Herramientas::toFloat($this->monava2);
  }

        public function setMonava3($val){
  	$this->monava3=$val;
  }

  public function getMonava3($val=false){
    if($val) return number_format($this->monava3,2,',','.');
    else return Herramientas::toFloat($this->monava3);
  }

  public function setGrava1($val){
  	if ($val=='1') $this->grava1=true;
  	else $this->grava1=false;
  }

  public function getGrava1(){
    if($this->grava1) return '1';
    else return '0';
  }

    public function setGrava2($val){
  	if ($val=='1') $this->grava2=true;
  	else $this->grava2=false;
  }

  public function getGrava2(){
    if($this->grava2) return '1';
    else return '0';
  }

    public function setGrava3($val){
  	if ($val=='1') $this->grava3=true;
  	else $this->grava3=false;
  }

  public function getGrava3(){
    if($this->grava3) return '1';
    else return '0';
  }

  public function setGrava4($val){
	if ($val=='1') $this->grava4=true;
	else $this->grava4=false;
  }

  public function getGrava4(){
    if($this->grava4) return '1';
    else return '0';
  }

    public function setGrava5($val){
	if ($val=='1') $this->grava5=true;
	else $this->grava5=false;
  }

  public function getGrava5(){
    if($this->grava5) return '1';
    else return '0';
  }

    public function setGrava6($val){
	if ($val=='1') $this->grava6=true;
	else $this->grava6=false;
  }

  public function getGrava6(){
    if($this->grava6) return '1';
    else return '0';
  }

  public function setMonpre1($val){
    if ($this->monpre1 !== $val) {
      $this->monpre1 = Herramientas::toFloat($val);
    }

  }

  public function getMonpre1($val=false){
    if($val) return number_format($this->monpre1,2,',','.');
    else return Herramientas::toFloat($this->monpre1);
  }

  public function setMonpre2($val){
    if ($this->monpre2 !== $val) {
      $this->monpre2 = Herramientas::toFloat($val);
    }
  }

  public function getMonpre2($val=false){
    if($val) return number_format($this->monpre2,2,',','.');
    else return Herramientas::toFloat($this->monpre2);
  }

      public function setMonpre3($val){
    $this->monpre3=$val;
  }

  public function getMonpre3($val=false){
    if($val) return number_format($this->monpre3,2,',','.');
    else return Herramientas::toFloat($this->monpre3);
  }

  public function setMonfacpro1($val){
    if ($this->monfacpro1 !== $val) {
      $this->monfacpro1 = Herramientas::toFloat($val);
    }
  }

  public function getMonfacpro1($val=false){
    if($val) return number_format($this->monfacpro1,2,',','.');
    else return Herramientas::toFloat($this->monfacpro1);
  }

  public function setMonfacpro2($val){
    $this->monfacpro2=$val;
  }

  public function getMonfacpro2($val=false){
    if($val) return number_format($this->monfacpro2,2,',','.');
    else return Herramientas::toFloat($this->monfacpro2);
  }

  public function setMonfacpro3($val){
    $this->monfacpro3=$val;
  }

  public function getMonfacpro3($val=false){
    if($val) return number_format($this->monfacpro3,2,',','.');
    else return Herramientas::toFloat($this->monfacpro3);
  }

  public function setCcestrucId($val){
 	$this->ccestruc_id=$val;
 }

  public function getCcestrucId(){
    return $this->ccestruc_id;

  }

  public function setCcriezonaId($val){
 	$this->ccriezona_id=$val;
 }

  public function getCcriezonaId(){
    return $this->ccriezona_id;

  }

}