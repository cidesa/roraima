<?php



class CcactiviMapBuilder {

	
	const CLASS_NAME = 'lib.model.creditos.map.CcactiviMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('ccactivi');
		$tMap->setPhpName('Ccactivi');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('ccactivi_SEQ');

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

		$tMap->addColumn('NOMACT', 'Nomact', 'string', CreoleTypes::VARCHAR, false, null);

		$tMap->addColumn('DESACT', 'Desact', 'string', CreoleTypes::VARCHAR, false, null);

		$tMap->addColumn('FECINI', 'Fecini', 'int', CreoleTypes::DATE, false, null);

		$tMap->addColumn('RESACT', 'Resact', 'string', CreoleTypes::VARCHAR, false, 250);

		$tMap->addColumn('OBSRES', 'Obsres', 'string', CreoleTypes::VARCHAR, false, 250);

		$tMap->addColumn('FECCUL', 'Feccul', 'int', CreoleTypes::DATE, false, null);

		$tMap->addColumn('ESTATU', 'Estatu', 'string', CreoleTypes::VARCHAR, false, 20);

		$tMap->addColumn('SOLCRENUM', 'Solcrenum', 'string', CreoleTypes::VARCHAR, false, 30);

		$tMap->addColumn('SOLCRE', 'Solcre', 'string', CreoleTypes::VARCHAR, false, 1);

		$tMap->addForeignKey('CCCLAACT_ID', 'CcclaactId', 'int', CreoleTypes::INTEGER, 'ccclaact', 'ID', true, null);

	} 
} 