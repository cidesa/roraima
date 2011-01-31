<?php



class CatcarconMapBuilder {

	
	const CLASS_NAME = 'lib.model.catastro.map.CatcarconMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('catcarcon');
		$tMap->setPhpName('Catcarcon');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('catcarcon_SEQ');

		$tMap->addColumn('TIPO', 'Tipo', 'string', CreoleTypes::VARCHAR, true, 2);

		$tMap->addColumn('NOMCARCON', 'Nomcarcon', 'string', CreoleTypes::VARCHAR, true, 100);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 