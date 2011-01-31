<?php



class InrecaudMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.InrecaudMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('inrecaud');
		$tMap->setPhpName('Inrecaud');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('inrecaud_SEQ');

		$tMap->addForeignKey('INGRUPREC_ID', 'IngruprecId', 'int', CreoleTypes::INTEGER, 'ingruprec', 'ID', false, null);

		$tMap->addColumn('CODREC', 'Codrec', 'string', CreoleTypes::VARCHAR, true, 4);

		$tMap->addColumn('DESREC', 'Desrec', 'string', CreoleTypes::VARCHAR, true, 30);

		$tMap->addColumn('LIMITA', 'Limita', 'boolean', CreoleTypes::BOOLEAN, true, null);

		$tMap->addColumn('UNITRI', 'Unitri', 'double', CreoleTypes::NUMERIC, true, 14);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 