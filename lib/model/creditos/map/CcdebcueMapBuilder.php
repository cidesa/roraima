<?php



class CcdebcueMapBuilder {

	
	const CLASS_NAME = 'lib.model.creditos.map.CcdebcueMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('ccdebcue');
		$tMap->setPhpName('Ccdebcue');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('ccdebcue_SEQ');

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

		$tMap->addColumn('NUMCUE', 'Numcue', 'string', CreoleTypes::VARCHAR, false, 20);

		$tMap->addColumn('MONTO', 'Monto', 'double', CreoleTypes::DOUBLE, false, null);

		$tMap->addColumn('CEDRIF', 'Cedrif', 'string', CreoleTypes::VARCHAR, false, 12);

		$tMap->addColumn('EMPRESA', 'Empresa', 'string', CreoleTypes::VARCHAR, false, 4);

		$tMap->addColumn('NUMEXP', 'Numexp', 'string', CreoleTypes::VARCHAR, false, 20);

		$tMap->addForeignKey('CCDEBBAN_ID', 'CcdebbanId', 'int', CreoleTypes::INTEGER, 'ccdebban', 'ID', true, null);

	} 
} 