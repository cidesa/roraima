<?php



class ViasolviatraMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.ViasolviatraMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('viasolviatra');
		$tMap->setPhpName('Viasolviatra');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('viasolviatra_SEQ');

		$tMap->addColumn('NUMSOL', 'Numsol', 'string', CreoleTypes::VARCHAR, false, 10);

		$tMap->addColumn('FECSOL', 'Fecsol', 'int', CreoleTypes::DATE, false, null);

		$tMap->addColumn('TIPVIA', 'Tipvia', 'string', CreoleTypes::VARCHAR, false, 1);

		$tMap->addColumn('CODEMP', 'Codemp', 'string', CreoleTypes::VARCHAR, false, 16);

		$tMap->addColumn('CODCAT', 'Codcat', 'string', CreoleTypes::VARCHAR, false, 32);

		$tMap->addColumn('CODNIV', 'Codniv', 'string', CreoleTypes::VARCHAR, false, 2);

		$tMap->addColumn('CODEMPACO', 'Codempaco', 'string', CreoleTypes::VARCHAR, false, 16);

		$tMap->addColumn('CODNIVACO', 'Codnivaco', 'string', CreoleTypes::VARCHAR, false, 2);

		$tMap->addColumn('DESSOL', 'Dessol', 'string', CreoleTypes::VARCHAR, false, 1000);

		$tMap->addColumn('CODCIU', 'Codciu', 'string', CreoleTypes::VARCHAR, false, 4);

		$tMap->addColumn('CODNIVAPR', 'Codnivapr', 'string', CreoleTypes::VARCHAR, false, 2);

		$tMap->addColumn('CODPROCED', 'Codproced', 'string', CreoleTypes::VARCHAR, false, 2);

		$tMap->addColumn('STATUS', 'Status', 'string', CreoleTypes::VARCHAR, false, 1);

		$tMap->addColumn('FECDES', 'Fecdes', 'int', CreoleTypes::DATE, false, null);

		$tMap->addColumn('FECHAS', 'Fechas', 'int', CreoleTypes::DATE, false, null);

		$tMap->addColumn('NUMDIA', 'Numdia', 'int', CreoleTypes::INTEGER, false, null);

		$tMap->addColumn('CODFORTRA', 'Codfortra', 'string', CreoleTypes::VARCHAR, false, 2);

		$tMap->addColumn('CODEMPAUT', 'Codempaut', 'string', CreoleTypes::VARCHAR, false, 16);

		$tMap->addColumn('CODCEN', 'Codcen', 'string', CreoleTypes::VARCHAR, false, 4);

		$tMap->addColumn('CODUBI', 'Codubi', 'string', CreoleTypes::VARCHAR, false, 30);

		$tMap->addColumn('NOMEMPE', 'Nomempe', 'string', CreoleTypes::VARCHAR, false, 250);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 
