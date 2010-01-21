<?php



class CcrecproMapBuilder {

	
	const CLASS_NAME = 'lib.model.creditos.map.CcrecproMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('ccrecpro');
		$tMap->setPhpName('Ccrecpro');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('ccrecpro_SEQ');

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

		$tMap->addColumn('OBSREC', 'Obsrec', 'string', CreoleTypes::VARCHAR, false, null);

		$tMap->addColumn('FECVIG', 'Fecvig', 'int', CreoleTypes::DATE, false, null);

		$tMap->addColumn('FECVEN', 'Fecven', 'int', CreoleTypes::DATE, false, null);

		$tMap->addForeignKey('CCRECAUD_ID', 'CcrecaudId', 'int', CreoleTypes::INTEGER, 'ccrecaud', 'ID', true, null);

		$tMap->addForeignKey('CCPROGRA_ID', 'CcprograId', 'int', CreoleTypes::INTEGER, 'ccprogra', 'ID', true, null);

	} 
} 