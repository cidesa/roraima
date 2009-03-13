<?php

/**
 * nomnommovnomemp actions.
 *
 * @package    siga
 * @subpackage nomnommovnomemp
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 2288 2006-10-02 15:22:13Z fabien $
 */
class nomnommovnomempActions extends autonomnommovnomempActions
{

	protected function getNpasicarempOrCreate($id = 'id')
  	{
	    	if (!$this->getRequestParameter($id))
    		{
		      $npasicaremp = new Npasicaremp();
		      $this->configGrid();
	    	}
	    	else
	    	{
	      	$npasicaremp = NpasicarempPeer::retrieveByPk($this->getRequestParameter($id));
	      	$this->configGrid($npasicaremp->getCodnom(),$npasicaremp->getCodcon(),$npasicaremp->getCodcar());

	      	$this->forward404Unless($npasicaremp);
    		}

    		return $npasicaremp;
  	}

  	public function configGrid($codigonomina='', $codigoempleado='', $codigocargo='')
	  {

	 $SQL="Select a.codcon as codcon, (CASE when a.mensaje is null THEN b.nomcon
	 else a.mensaje END) as nomcon,b.codemp as codemp,b.codcar as codcar,a.status as status, (CASE when a.status='C' THEN COALESCE(b.cantidad,0)
	 else COALESCE(b.monto,0) END) as valor, 9 as id from npdefmov a, npasiconemp b where b.codemp='".$codigoempleado."' and b.codcar='".$codigocargo."' and a.codnom='".$codigonomina."' and a.codcon=b.codcon order by codcon";



	      $resp = Herramientas::BuscarDatos($SQL,&$per);
		$filas_arreglo=20;

		// Se crea el objeto principal de la clase OpcionesGrid
		$opciones = new OpcionesGrid();
		// Se configuran las opciones globales del Grid
		$opciones->setEliminar(false);
		$opciones->setFilas($filas_arreglo);
		$opciones->setTabla('Npasiconemp');
		$opciones->setName('a');
		$opciones->setAnchoGrid(800);
		$opciones->setTitulo('Conceptos');
		$opciones->setHTMLTotalFilas(' ');

		// Se generan las columnas
		$col1 = new Columna('Código del Concepto');
		$col1->setTipo(Columna::TEXTO);
		$col1->setEsGrabable(true);
		$col1->setAlineacionObjeto(Columna::CENTRO);
		$col1->setAlineacionContenido(Columna::CENTRO);
		$col1->setNombreCampo('codcon');
		$col1->setHTML('type="text" size="10" readonly=true');

		$col2 = new Columna('Nombre del Concepto');
		$col2->setTipo(Columna::TEXTO);
		$col2->setAlineacionObjeto(Columna::IZQUIERDA);
		$col2->setAlineacionContenido(Columna::IZQUIERDA);
		$col2->setNombreCampo('nomcon');
		$col2->setHTML('type="text" size="30" readonly=true');

		$col3 = new Columna('Status');
		$col3->setTipo(Columna::TEXTO);
		$col3->setEsGrabable(true);
		$col3->setAlineacionObjeto(Columna::IZQUIERDA);
		$col3->setAlineacionContenido(Columna::IZQUIERDA);
		$col3->setNombreCampo('status');
		$col3->setHTML('type="text" size="7" readonly=true');

            $col4 = new Columna('Valor');
		$col4->setTipo(Columna::MONTO);
		$col4->setEsGrabable(true);
		$col4->setNombreCampo('valor');
		$col4->setHTML('type="text" size="12"');
		$col4->setJScript('onBlur="javascript: event.keyCode=13; validar_monto_numero(event,this.id)"');

		$col5 = new Columna('Empleado');
		$col5->setTipo(Columna::TEXTO);
		$col5->setEsGrabable(true);
		$col5->setNombreCampo('codemp');
		$col5->setOculta(true);
		$col5->setHTML('type="text" size="12"');

		$col6 = new Columna('Cargo');
		$col6->setTipo(Columna::TEXTO);
		$col6->setEsGrabable(true);
		$col6->setNombreCampo('codcar');
		$col6->setOculta(true);
		$col6->setHTML('type="text" size="12"');


		// Se guardan las columnas en el objetos de opciones
		$opciones->addColumna($col1);
		$opciones->addColumna($col2);
		$opciones->addColumna($col3);
		$opciones->addColumna($col4);
		$opciones->addColumna($col5);
		$opciones->addColumna($col6);

		// Se genera el arreglo de opciones necesario para generar el grid
		$this->obj = $opciones->getConfig($per);
 	 }


	public function executeSQL()
	{
		//Funcion que ejecuta sql lista
		$con =
		sfContext::getInstance()->getDatabaseConnection($connection='propel');
		$sql = "Select distinct a.codcon, case2(a.mensaje,Null,b.nomcon,a.mensaje),a.status,case2n(a.status,'C',b.cantidad,b.monto) from npdefmov a, npasiconemp b where b.codemp= '".str_pad($this->npasicaremp->getCodemp(),16,' ')."' and b.codcar='".str_pad($this->npasicaremp->getCodcar(),16,' ')."' and a.codnom='".$this->npasicaremp->getCodnom()."' and a.codcon=b.codcon order by a.codcon";
		$stmt = $con->createStatement();
		$stmt->setLimit(50000);
		$rs = $stmt->executeQuery($sql, ResultSet::FETCHMODE_NUM);
		$resultado=array();
		//aqui lleno el array con los resultados:
		while ($rs->next())
		{
			$resultado[]=$rs->getRow();
		}
		//y la envio al template:
		$this->rs=$resultado;
		return $this->rs;
	}
	public function executeEdit()
	{
		$this->npasicaremp = $this->getNpasicarempOrCreate();
		$this->rs = '';//$this->executeSQL();

		if ($this->getRequest()->getMethod() == sfRequest::POST)
		{
			$this->updateNpasicarempFromRequest();

			$this->saveNpasicaremp($this->npasicaremp);

			$this->setFlash('notice', 'Your modifications have been saved');
$this->Bitacora('Guardo');

			if ($this->getRequestParameter('save_and_add'))
			{
				return $this->redirect('nomnommovnomemp/create');
			}
			else if ($this->getRequestParameter('save_and_list'))
			{
				return $this->redirect('nomnommovnomemp/list');
			}
			else
     		 {
      	 return $this->redirect('nomnommovnomemp/edit?id='.$this->npasicaremp->getId());
      	}
   		 }
    		else
   		 {
    		  $this->labels = $this->getLabels();
   		}
  	}

     public function executeAjax()
	{

	 if ($this->getRequestParameter('ajax')=='1')
       {
	   $cajtexmos=$this->getRequestParameter('cajtexmos');
	   $cajtexcom=$this->getRequestParameter('cajtexcom');

   	   $dato=NpnominaPeer::getDesnom(trim($this->getRequestParameter('codigo')));
	   $output = '[["'.$cajtexcom.'","'.$dato.'",""]]';
	   $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');
	   return sfView::HEADER_ONLY;
       }

       elseif ($this->getRequestParameter('ajax')=='3')
       {
	   $cajtexmos=$this->getRequestParameter('cajtexmos');
	   $cajtexcom=$this->getRequestParameter('cajtexcom');

   	   $dato=NpasicarempPeer::getNomempnom(trim($this->getRequestParameter('codigoemp')),trim($this->getRequestParameter('codigonom')));
	   $output = '[["'.$cajtexcom.'","'.$dato.'",""]]';
	   $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');
	   return sfView::HEADER_ONLY;
       }

	 else if ($this->getRequestParameter('ajax')=='2')
	 {
	 	$cajtexmos=$this->getRequestParameter('cajtexmos');
	      $cajtexcom=$this->getRequestParameter('cajtexcom');

		$this->configGrid($this->getRequestParameter('codigonomina'),$this->getRequestParameter('codigoempleado'),$this->getRequestParameter('codigocargo'));

            $dato=NpasiconempPeer::getNombreCargo(trim($this->getRequestParameter('codigocargo')),trim($this->getRequestParameter('codigoempleado')));
	      $output = '[["'.$cajtexcom.'","'.$dato.'",""]]';
	      $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');

	 }
	}
    protected function saveNpasicaremp($npasiconemp)
     {
	 $grid=Herramientas::CargarDatosGrid($this,$this->obj,true);
	 Nomina::salvarNomnommovnomemp($npasiconemp,$grid);
     }
}
