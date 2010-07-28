<?php



class OpdetordMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.OpdetordMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('opdetord');
		$tMap->setPhpName('Opdetord');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('opdetord_SEQ');

		$tMap->addColumn('NUMORD', 'Numord', 'string', CreoleTypes::VARCHAR, true, 8);

		$tMap->addColumn('REFCOM', 'Refcom', 'string', CreoleTypes::VARCHAR, false, 8);

		$tMap->addColumn('CODPRE', 'Codpre', 'string', CreoleTypes::VARCHAR, true, 32);

		$tMap->addColumn('MONCAU', 'Moncau', 'double', CreoleTypes::NUMERIC, true, 14);

		$tMap->addColumn('MONDES', 'Mondes', 'double', CreoleTypes::NUMERIC, false, 14);

		$tMap->addColumn('MONRET', 'Monret', 'double', CreoleTypes::NUMERIC, false, 14);

		$tMap->addColumn('REFSAL', 'Refsal', 'string', CreoleTypes::VARCHAR, false, 1000);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 
