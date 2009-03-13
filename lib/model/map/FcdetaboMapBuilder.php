<?php



class FcdetaboMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.FcdetaboMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('fcdetabo');
		$tMap->setPhpName('Fcdetabo');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('fcdetabo_SEQ');

		$tMap->addColumn('NUMPAG', 'Numpag', 'string', CreoleTypes::VARCHAR, true, 10);

		$tMap->addColumn('NRODET', 'Nrodet', 'string', CreoleTypes::VARCHAR, true, 30);

		$tMap->addColumn('MONPAG', 'Monpag', 'double', CreoleTypes::NUMERIC, false, 14);

		$tMap->addColumn('TIPPAG', 'Tippag', 'string', CreoleTypes::VARCHAR, true, 3);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 