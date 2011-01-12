<?php



class CadefartMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.CadefartMapBuilder';

	
	private $dbMap;

	
	public function isBuilt()
	{
		return ($this->dbMap !== null);
	}

	
	public function getDatabaseMap()
	{
		return $this->dbMap;
	}

	
	public function doBuild()
	{
		$this->dbMap = Propel::getDatabaseMap('propel');

		$tMap = $this->dbMap->addTable('cadefart');
		$tMap->setPhpName('Cadefart');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('cadefart_SEQ');

		$tMap->addColumn('CODEMP', 'Codemp', 'string', CreoleTypes::VARCHAR, true, 3);

		$tMap->addColumn('LONART', 'Lonart', 'double', CreoleTypes::NUMERIC, true, 2);

		$tMap->addColumn('RUPART', 'Rupart', 'double', CreoleTypes::NUMERIC, true, 2);

		$tMap->addColumn('FORART', 'Forart', 'string', CreoleTypes::VARCHAR, true, 30);

		$tMap->addColumn('DESART', 'Desart', 'string', CreoleTypes::VARCHAR, true, 30);

		$tMap->addColumn('FORUBI', 'Forubi', 'string', CreoleTypes::VARCHAR, true, 30);

		$tMap->addColumn('DESUBI', 'Desubi', 'string', CreoleTypes::VARCHAR, true, 30);

		$tMap->addColumn('CORREQ', 'Correq', 'string', CreoleTypes::VARCHAR, false, 8);

		$tMap->addColumn('CORORD', 'Corord', 'string', CreoleTypes::VARCHAR, false, 8);

		$tMap->addColumn('CORREC', 'Correc', 'string', CreoleTypes::VARCHAR, false, 8);

		$tMap->addColumn('CORDES', 'Cordes', 'string', CreoleTypes::VARCHAR, false, 8);

		$tMap->addColumn('GENERAOP', 'Generaop', 'string', CreoleTypes::VARCHAR, false, 1);

		$tMap->addColumn('ASIPARREC', 'Asiparrec', 'string', CreoleTypes::VARCHAR, false, 1);

		$tMap->addColumn('GENERACOM', 'Generacom', 'string', CreoleTypes::VARCHAR, false, 1);

		$tMap->addColumn('MERCON', 'Mercon', 'string', CreoleTypes::VARCHAR, false, 20);

		$tMap->addColumn('CTADEV', 'Ctadev', 'string', CreoleTypes::VARCHAR, false, 32);

		$tMap->addColumn('CTAVCO', 'Ctavco', 'string', CreoleTypes::VARCHAR, false, 32);

		$tMap->addColumn('UNIVTA', 'Univta', 'string', CreoleTypes::VARCHAR, false, 32);

		$tMap->addColumn('ARTVEN', 'Artven', 'string', CreoleTypes::VARCHAR, false, 20);

		$tMap->addColumn('ARTINS', 'Artins', 'string', CreoleTypes::VARCHAR, false, 20);

		$tMap->addColumn('ARTSER', 'Artser', 'string', CreoleTypes::VARCHAR, false, 20);

		$tMap->addColumn('CODALMVEN', 'Codalmven', 'string', CreoleTypes::VARCHAR, false, 6);

		$tMap->addColumn('RECART', 'Recart', 'double', CreoleTypes::NUMERIC, false, 8);

		$tMap->addColumn('ORDCOM', 'Ordcom', 'double', CreoleTypes::NUMERIC, false, 8);

		$tMap->addColumn('REQART', 'Reqart', 'double', CreoleTypes::NUMERIC, false, 8);

		$tMap->addColumn('DPHART', 'Dphart', 'double', CreoleTypes::NUMERIC, false, 8);

		$tMap->addColumn('ORDSER', 'Ordser', 'double', CreoleTypes::NUMERIC, false, 8);

		$tMap->addColumn('TIPIMPREC', 'Tipimprec', 'string', CreoleTypes::VARCHAR, false, 1);

		$tMap->addColumn('ARTVENHAS', 'Artvenhas', 'string', CreoleTypes::VARCHAR, false, 20);

		$tMap->addColumn('CORCOT', 'Corcot', 'string', CreoleTypes::VARCHAR, false, 8);

		$tMap->addColumn('SOLART', 'Solart', 'string', CreoleTypes::VARCHAR, false, 8);

		$tMap->addColumn('APLICLADES', 'Apliclades', 'string', CreoleTypes::VARCHAR, false, 1);

		$tMap->addColumn('SOLCOM', 'Solcom', 'double', CreoleTypes::NUMERIC, false, 8);

		$tMap->addColumn('UNIDAD', 'Unidad', 'string', CreoleTypes::VARCHAR, false, 100);

		$tMap->addColumn('PRCASOPRE', 'Prcasopre', 'string', CreoleTypes::VARCHAR, false, 1);

		$tMap->addColumn('PRCREQAPR', 'Prcreqapr', 'string', CreoleTypes::VARCHAR, false, 1);

		$tMap->addColumn('COMASOPRE', 'Comasopre', 'string', CreoleTypes::VARCHAR, false, 1);

		$tMap->addColumn('COMREQAPR', 'Comreqapr', 'string', CreoleTypes::VARCHAR, false, 1);

		$tMap->addColumn('ALMCORRE', 'Almcorre', 'string', CreoleTypes::VARCHAR, true, 8);

		$tMap->addColumn('FORSNC', 'Forsnc', 'string', CreoleTypes::VARCHAR, false, 20);

		$tMap->addColumn('DESSNC', 'Dessnc', 'string', CreoleTypes::VARCHAR, false, 20);

		$tMap->addColumn('REQREQAPR', 'Reqreqapr', 'string', CreoleTypes::VARCHAR, false, 1);

		$tMap->addColumn('SOLREQAPR', 'Solreqapr', 'string', CreoleTypes::VARCHAR, false, 1);

		$tMap->addColumn('GENCORART', 'Gencorart', 'string', CreoleTypes::VARCHAR, false, 1);

		$tMap->addColumn('TIPDOCPRE', 'Tipdocpre', 'string', CreoleTypes::VARCHAR, false, 4);

		$tMap->addColumn('CORNAC', 'Cornac', 'int', CreoleTypes::INTEGER, false, null);

		$tMap->addColumn('COREXT', 'Corext', 'int', CreoleTypes::INTEGER, false, null);

		$tMap->addColumn('TIPODOC', 'Tipodoc', 'string', CreoleTypes::VARCHAR, false, 4);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 
