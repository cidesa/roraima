<?php

/**
 * nomdefesptipnom actions.
 *
 * @package    siga
 * @subpackage nomdefesptipnom
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 2288 2006-10-02 15:22:13Z fabien $
 */
class nomdefesptipnomActions extends autonomdefesptipnomActions
{
	public function executeEdit()
	{
		$this->listafrecpag = Constantes::ListaFrecuenciaPago();
		$this->listagenordpag = Constantes::ListaGeneraOrdenPago();
		parent::executeEdit();
	}
}
