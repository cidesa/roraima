<?php



class CatusoespMapBuilder {

	
	const CLASS_NAME = 'lib.model.catastro.map.CatusoespMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('catusoesp');
		$tMap->setPhpName('Catusoesp');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('catusoesp_SEQ');

		$tMap->addColumn('DESUSO', 'Desuso', 'string', CreoleTypes::VARCHAR, true, 100);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 