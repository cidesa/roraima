<?php



class CcgerencMapBuilder {

	
	const CLASS_NAME = 'lib.model.creditos.map.CcgerencMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('ccgerenc');
		$tMap->setPhpName('Ccgerenc');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('ccgerenc_SEQ');

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

		$tMap->addColumn('NOMGER', 'Nomger', 'string', CreoleTypes::VARCHAR, false, null);

		$tMap->addColumn('DESGER', 'Desger', 'string', CreoleTypes::VARCHAR, false, null);

		$tMap->addColumn('OBJGER', 'Objger', 'string', CreoleTypes::VARCHAR, false, null);

		$tMap->addColumn('FECVIG', 'Fecvig', 'int', CreoleTypes::DATE, false, null);

		$tMap->addColumn('FECVEN', 'Fecven', 'int', CreoleTypes::DATE, false, null);

		$tMap->addColumn('NOMYML', 'Nomyml', 'string', CreoleTypes::VARCHAR, false, 50);

		$tMap->addColumn('ORDEN', 'Orden', 'int', CreoleTypes::INTEGER, false, null);

		$tMap->addColumn('ENRUTA', 'Enruta', 'string', CreoleTypes::VARCHAR, false, 1);

	} 
} 