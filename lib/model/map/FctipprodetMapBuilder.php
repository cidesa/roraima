<?php



class FctipprodetMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.FctipprodetMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('fctipprodet');
		$tMap->setPhpName('Fctipprodet');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('fctipprodet_SEQ');

		$tMap->addColumn('TIPVAR', 'Tipvar', 'string', CreoleTypes::VARCHAR, false, 500);

		$tMap->addColumn('TIPO', 'Tipo', 'string', CreoleTypes::VARCHAR, false, 1);

		$tMap->addColumn('VALOR', 'Valor', 'string', CreoleTypes::VARCHAR, false, 14);

		$tMap->addColumn('TIPPRO', 'Tippro', 'string', CreoleTypes::VARCHAR, true, 4);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 