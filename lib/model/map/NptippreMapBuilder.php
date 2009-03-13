<?php



class NptippreMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.NptippreMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('nptippre');
		$tMap->setPhpName('Nptippre');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('nptippre_SEQ');

		$tMap->addColumn('CODCON', 'Codcon', 'string', CreoleTypes::VARCHAR, false, 3);

		$tMap->addColumn('TIPPRE', 'Tippre', 'string', CreoleTypes::VARCHAR, false, 3);

		$tMap->addColumn('CODTIPPRE', 'Codtippre', 'string', CreoleTypes::VARCHAR, false, 4);

		$tMap->addColumn('DESTIPPRE', 'Destippre', 'string', CreoleTypes::VARCHAR, false, 255);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 