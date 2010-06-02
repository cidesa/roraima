<?php



class ViarelviaMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.ViarelviaMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('viarelvia');
		$tMap->setPhpName('Viarelvia');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('viarelvia_SEQ');

		$tMap->addColumn('NUMREL', 'Numrel', 'string', CreoleTypes::VARCHAR, false, 10);

		$tMap->addColumn('FECREL', 'Fecrel', 'int', CreoleTypes::DATE, false, null);

		$tMap->addColumn('TIPCOM', 'Tipcom', 'string', CreoleTypes::VARCHAR, false, 4);

		$tMap->addColumn('DESREL', 'Desrel', 'string', CreoleTypes::VARCHAR, false, 250);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 