<?php



class NppernomMapBuilder {

	
	const CLASS_NAME = 'lib.model.nomina.map.NppernomMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('nppernom');
		$tMap->setPhpName('Nppernom');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('nppernom_SEQ');

		$tMap->addColumn('CODNOM', 'Codnom', 'string', CreoleTypes::VARCHAR, true, 3);

		$tMap->addColumn('ANNO', 'Anno', 'int', CreoleTypes::INTEGER, true, null);

		$tMap->addColumn('MES', 'Mes', 'string', CreoleTypes::VARCHAR, true, 2);

		$tMap->addColumn('FECINI', 'Fecini', 'int', CreoleTypes::DATE, true, null);

		$tMap->addColumn('FECFIN', 'Fecfin', 'int', CreoleTypes::DATE, true, null);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 