<?php



class NpmotegrMapBuilder {

	
	const CLASS_NAME = 'lib.model.nomina.map.NpmotegrMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('npmotegr');
		$tMap->setPhpName('Npmotegr');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('npmotegr_SEQ');

		$tMap->addColumn('CODMOT', 'Codmot', 'string', CreoleTypes::VARCHAR, true, 4);

		$tMap->addColumn('DESMOT', 'Desmot', 'string', CreoleTypes::VARCHAR, true, 250);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 