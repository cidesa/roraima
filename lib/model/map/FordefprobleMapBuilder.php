<?php



class FordefprobleMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.FordefprobleMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('fordefproble');
		$tMap->setPhpName('Fordefproble');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('fordefproble_SEQ');

		$tMap->addColumn('CODPRO', 'Codpro', 'string', CreoleTypes::VARCHAR, true, 4);

		$tMap->addColumn('NOMPRO', 'Nompro', 'string', CreoleTypes::VARCHAR, false, 4000);

		$tMap->addColumn('PROGRA', 'Progra', 'string', CreoleTypes::VARCHAR, false, 4000);

		$tMap->addColumn('PLAECO', 'Plaeco', 'string', CreoleTypes::VARCHAR, false, 4000);

		$tMap->addColumn('OBJEST', 'Objest', 'string', CreoleTypes::VARCHAR, false, 4000);

		$tMap->addColumn('PLAGOB', 'Plagob', 'string', CreoleTypes::VARCHAR, false, 4000);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 