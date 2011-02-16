<?php



class LileyconMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.LileyconMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('lileycon');
		$tMap->setPhpName('Lileycon');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('lileycon_SEQ');

		$tMap->addColumn('ARCHIVOCON', 'Archivocon', 'string', CreoleTypes::VARCHAR, false, 100);

		$tMap->addColumn('ARCHIVOREG', 'Archivoreg', 'string', CreoleTypes::VARCHAR, false, 100);

		$tMap->addColumn('DESCRIPCION', 'Descripcion', 'string', CreoleTypes::VARCHAR, false, 1000);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 