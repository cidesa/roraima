<?php

/**
 * facdefespins actions.
 *
 * @package    siga
 * @subpackage facdefespins
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 2288 2006-10-02 15:22:13Z fabien $
 */
class facdefespinsActions extends autofacdefespinsActions
{
	public function executeEdit()
	  {
	    $this->fcdefins = $this->getFcdefinsOrCreate();
	    $this->listatasa = Constantes::Listatasa();
	
	    if ($this->getRequest()->getMethod() == sfRequest::POST)
	    {
	      $this->updateFcdefinsFromRequest();
	
	      $this->saveFcdefins($this->fcdefins);
	
	      $this->setFlash('notice', 'Your modifications have been saved');
	
	      if ($this->getRequestParameter('save_and_add'))
	      {
	        return $this->redirect('facdefespins/create');
	      }
	      else if ($this->getRequestParameter('save_and_list'))
	      {
	        return $this->redirect('facdefespins/list');
	      }
	      else
	      {
	        return $this->redirect('facdefespins/edit?id='.$this->fcdefins->getId());
	      }
	    }
	    else
	    {
	      $this->labels = $this->getLabels();
	    }
	  }	

	public function handleErrorEdit()
	  {
	    $this->preExecute();
	    $this->fcdefins = $this->getFcdefinsOrCreate();
	    $this->updateFcdefinsFromRequest();
	
	    $this->labels = $this->getLabels();
	
	    return sfView::SUCCESS;
	  }	  
	  
	protected function updateFcdefinsFromRequest()
	  {
	    $fcdefins = $this->getRequestParameter('fcdefins');
	
	    if (isset($fcdefins['codemp']))
	    {
	      $this->fcdefins->setCodemp($fcdefins['codemp']);
	    }
	    if (isset($fcdefins['nomemp']))
	    {
	      $this->fcdefins->setNomemp($fcdefins['nomemp']);
	    }
	    if (isset($fcdefins['loncodubifis']))
	    {
	      $this->fcdefins->setLoncodubifis($fcdefins['loncodubifis']);
	    }
	    if (isset($fcdefins['rupubifis']))
	    {
	      $this->fcdefins->setRupubifis($fcdefins['rupubifis']);
	    }
	    if (isset($fcdefins['forubifis']))
	    {
	      $this->fcdefins->setForubifis($fcdefins['forubifis']);
	    }
	    if (isset($fcdefins['loncodubimag']))
	    {
	      $this->fcdefins->setLoncodubimag($fcdefins['loncodubimag']);
	    }
	    if (isset($fcdefins['rupubimag']))
	    {
	      $this->fcdefins->setRupubimag($fcdefins['rupubimag']);
	    }
	    if (isset($fcdefins['forubimag']))
	    {
	      $this->fcdefins->setForubimag($fcdefins['forubimag']);
	    }
	    if (isset($fcdefins['codpic']))
	    {
	      $this->fcdefins->setCodpic($fcdefins['codpic']);
	    }
	    if (isset($fcdefins['nomfuep']))
	    {
	      $this->fcdefins->setNomfuep($fcdefins['nomfuep']);
	    }
	    if (isset($fcdefins['codveh']))
	    {
	      $this->fcdefins->setCodveh($fcdefins['codveh']);
	    }
	    if (isset($fcdefins['nomfuev']))
	    {
	      $this->fcdefins->setNomfuev($fcdefins['nomfuev']);
	    }
	    if (isset($fcdefins['codinm']))
	    {
	      $this->fcdefins->setCodinm($fcdefins['codinm']);
	    }
	    if (isset($fcdefins['nomfuei']))
	    {
	      $this->fcdefins->setNomfuei($fcdefins['nomfuei']);
	    }
	    if (isset($fcdefins['codpro']))
	    {
	      $this->fcdefins->setCodpro($fcdefins['codpro']);
	    }
	    if (isset($fcdefins['nomfuepr']))
	    {
	      $this->fcdefins->setNomfuepr($fcdefins['nomfuepr']);
	    }
	    if (isset($fcdefins['codesp']))
	    {
	      $this->fcdefins->setCodesp($fcdefins['codesp']);
	    }
	    if (isset($fcdefins['nomfuee']))
	    {
	      $this->fcdefins->setNomfuee($fcdefins['nomfuee']);
	    }
	    if (isset($fcdefins['codapu']))
	    {
	      $this->fcdefins->setCodapu($fcdefins['codapu']);
	    }
	    if (isset($fcdefins['nomfuea']))
	    {
	      $this->fcdefins->setNomfuea($fcdefins['nomfuea']);
	    }
	    if (isset($fcdefins['loncodact']))
	    {
	      $this->fcdefins->setLoncodact($fcdefins['loncodact']);
	    }
	    if (isset($fcdefins['rupact']))
	    {
	      $this->fcdefins->setRupact($fcdefins['rupact']);
	    }
	    if (isset($fcdefins['foract']))
	    {
	      $this->fcdefins->setForact($fcdefins['foract']);
	    }
	    if (isset($fcdefins['codajupic']))
	    {
	      $this->fcdefins->setCodajupic($fcdefins['codajupic']);
	    }
	    if (isset($fcdefins['porpic']))
	    {
	      $this->fcdefins->setPorpic($fcdefins['porpic']);
	    }
	    if (isset($fcdefins['unitas']))
	    {
	      $this->fcdefins->setUnitas($fcdefins['unitas']);
	    }
	    if (isset($fcdefins['unipic']))
	    {
	      $this->fcdefins->setUnipic($fcdefins['unipic']);
	    }
	    if (isset($fcdefins['valunitri']))
	    {
	      $this->fcdefins->setValunitri($fcdefins['valunitri']);
	    }
	    if (isset($fcdefins['loncodveh']))
	    {
	      $this->fcdefins->setLoncodveh($fcdefins['loncodveh']);
	    }
	    if (isset($fcdefins['rupveh']))
	    {
	      $this->fcdefins->setRupveh($fcdefins['rupveh']);
	    }
	    if (isset($fcdefins['forveh']))
	    {
	      $this->fcdefins->setForveh($fcdefins['forveh']);
	    }
	    if (isset($fcdefins['porveh']))
	    {
	      $this->fcdefins->setPorveh($fcdefins['porveh']);
	    }
	    if (isset($fcdefins['loncodcat']))
	    {
	      $this->fcdefins->setLoncodcat($fcdefins['loncodcat']);
	    }
	    if (isset($fcdefins['rupcat']))
	    {
	      $this->fcdefins->setRupcat($fcdefins['rupcat']);
	    }
	    if (isset($fcdefins['forcat']))
	    {
	      $this->fcdefins->setForcat($fcdefins['forcat']);
	    }
	    if (isset($fcdefins['porinm']))
	    {
	      $this->fcdefins->setPorinm($fcdefins['porinm']);
	    }
	  }	  
	  
	protected function getLabels()
	  {
	    return array(
	      'fcdefins{codemp}' => 'Código:',
	      'fcdefins{nomemp}' => 'Nombre:',
	      'fcdefins{loncodubifis}' => 'Longitud del Código:',
	      'fcdefins{rupubifis}' => 'Rupturas de Control:',
	      'fcdefins{forubifis}' => 'Formato del Código:',
	      'fcdefins{loncodubimag}' => 'Longitud del Codigo:',
	      'fcdefins{rupubimag}' => 'Rupturas de Control:',
	      'fcdefins{forubimag}' => 'Formato del Código:',
	      'fcdefins{codpic}' => 'Patente Industria y Comercio:',
	      'fcdefins{nomfuep}' => 'Vehiculos:',
	      'fcdefins{codveh}' => 'Vehiculos:',
	      'fcdefins{nomfuev}' => 'Nomfuev:',
	      'fcdefins{codinm}' => 'Inmuebles Urbanos:',
	      'fcdefins{nomfuei}' => 'Inmuebles Urbanos:',
	      'fcdefins{codpro}' => 'Propaganda Comercial:',
	      'fcdefins{nomfuepr}' => 'Propaganda Comercial:',
	      'fcdefins{codesp}' => 'Espectáculos Públicos:',
	      'fcdefins{nomfuee}' => 'Espectáculos Públicos:',
	      'fcdefins{codapu}' => 'Apuesta Lícita:',
	      'fcdefins{nomfuea}' => 'Apuesta Lícita:',
	      'fcdefins{loncodact}' => 'Longitud del Código:',
	      'fcdefins{rupact}' => 'Rupturas de Control:',
	      'fcdefins{foract}' => 'Formato del Código:',
	      'fcdefins{codajupic}' => 'Fuente de Ingreso para el Ajuste:',
	      'fcdefins{porpic}' => 'Alicuota en Porcentaje para Actividad Comercial:',
	      'fcdefins{unitas}' => 'Criterio para Calculo de Tasa:',
	      'fcdefins{unipic}' => 'Unidad:',
	      'fcdefins{valunitri}' => 'Valor de Unidad Tributaria:',
	      'fcdefins{loncodveh}' => 'Longitud del Codigo:',
	      'fcdefins{rupveh}' => 'Rupturas de Control:',
	      'fcdefins{forveh}' => 'Formato del Codigo:',
	      'fcdefins{porveh}' => 'Alicuota en Porcentaje para Vehiculos:',
	      'fcdefins{loncodcat}' => 'Longitud del Codigo:',
	      'fcdefins{rupcat}' => 'Rupturas de Control:',
	      'fcdefins{forcat}' => 'Formato del Codigo:',
	      'fcdefins{porinm}' => 'Alicuota en Porcentaje para Vehiculos:',
	    );
	  }	  
}
