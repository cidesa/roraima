<?php



class NptasfidMapBuilder {

	
	const CLASS_NAME = 'lib.model.nomina.map.NptasfidMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('nptasfid');
		$tMap->setPhpName('Nptasfid');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('nptasfid_SEQ');

		$tMap->addColumn('FECDESDE', 'Fecdesde', 'int', CreoleTypes::DATE, false, null);

		$tMap->addColumn('FECHASTA', 'Fechasta', 'int', CreoleTypes::DATE, false, null);

		$tMap->addColumn('TASA', 'Tasa', 'double', CreoleTypes::NUMERIC, false, 14);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 