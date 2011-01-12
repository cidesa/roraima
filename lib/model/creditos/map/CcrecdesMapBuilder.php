<?php



class CcrecdesMapBuilder {

	
	const CLASS_NAME = 'lib.model.creditos.map.CcrecdesMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('ccrecdes');
		$tMap->setPhpName('Ccrecdes');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('ccrecdes_SEQ');

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

		$tMap->addColumn('OBSREC', 'Obsrec', 'string', CreoleTypes::VARCHAR, false, null);

		$tMap->addColumn('FECREC', 'Fecrec', 'int', CreoleTypes::DATE, false, null);

		$tMap->addColumn('CODUSUREC', 'Codusurec', 'int', CreoleTypes::INTEGER, false, null);

		$tMap->addColumn('FECRECCEN', 'Fecreccen', 'int', CreoleTypes::DATE, false, null);

		$tMap->addColumn('CODUSUCEN', 'Codusucen', 'int', CreoleTypes::INTEGER, false, null);

		$tMap->addColumn('ESTATU', 'Estatu', 'string', CreoleTypes::VARCHAR, false, null);

		$tMap->addForeignKey('CCRECAUD_ID', 'CcrecaudId', 'int', CreoleTypes::INTEGER, 'ccrecaud', 'ID', true, null);

		$tMap->addForeignKey('CCCUADES_ID', 'CccuadesId', 'int', CreoleTypes::INTEGER, 'cccuades', 'ID', true, null);

	} 
} 