<?php



class NpasicarpreMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.NpasicarpreMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('npasicarpre');
		$tMap->setPhpName('Npasicarpre');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('npasicarpre_SEQ');

		$tMap->addColumn('CODCAT', 'Codcat', 'string', CreoleTypes::VARCHAR, true, 32);

		$tMap->addColumn('CODCAR', 'Codcar', 'string', CreoleTypes::VARCHAR, true, 16);

		$tMap->addColumn('CANPRE', 'Canpre', 'double', CreoleTypes::NUMERIC, true, 6);

		$tMap->addColumn('CANASI', 'Canasi', 'double', CreoleTypes::NUMERIC, true, 6);

		$tMap->addColumn('MONPRE', 'Monpre', 'double', CreoleTypes::NUMERIC, true, 14);

		$tMap->addColumn('MONASI', 'Monasi', 'double', CreoleTypes::NUMERIC, true, 14);

		$tMap->addColumn('CODNIV', 'Codniv', 'string', CreoleTypes::VARCHAR, true, 16);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 