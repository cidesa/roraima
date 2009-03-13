<?php



class FcdetpagMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.FcdetpagMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('fcdetpag');
		$tMap->setPhpName('Fcdetpag');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('fcdetpag_SEQ');

		$tMap->addForeignKey('NUMPAG', 'Numpag', 'string', CreoleTypes::VARCHAR, 'fcpagos', 'NUMPAG', true, 10);

		$tMap->addColumn('NRODET', 'Nrodet', 'string', CreoleTypes::VARCHAR, true, 30);

		$tMap->addColumn('MONPAG', 'Monpag', 'double', CreoleTypes::NUMERIC, false, 14);

		$tMap->addForeignKey('TIPPAG', 'Tippag', 'string', CreoleTypes::VARCHAR, 'fctippag', 'TIPPAG', true, 3);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 