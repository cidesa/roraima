<?php



class CcconcepMapBuilder {

	
	const CLASS_NAME = 'lib.model.creditos.map.CcconcepMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('ccconcep');
		$tMap->setPhpName('Ccconcep');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('ccconcep_SEQ');

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

		$tMap->addColumn('NOMCON', 'Nomcon', 'string', CreoleTypes::VARCHAR, false, null);

		$tMap->addColumn('DESCON', 'Descon', 'string', CreoleTypes::VARCHAR, false, null);

		$tMap->addColumn('CODPAR', 'Codpar', 'string', CreoleTypes::VARCHAR, false, null);

		$tMap->addForeignKey('CCPARTID_ID', 'CcpartidId', 'int', CreoleTypes::INTEGER, 'ccpartid', 'ID', true, null);

	} 
} 