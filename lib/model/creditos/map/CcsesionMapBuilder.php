<?php



class CcsesionMapBuilder {

	
	const CLASS_NAME = 'lib.model.creditos.map.CcsesionMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('ccsesion');
		$tMap->setPhpName('Ccsesion');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('ccsesion_SEQ');

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

		$tMap->addColumn('OBSERV', 'Observ', 'string', CreoleTypes::VARCHAR, false, null);

		$tMap->addColumn('FECSES', 'Fecses', 'int', CreoleTypes::DATE, false, null);

		$tMap->addColumn('HORA', 'Hora', 'string', CreoleTypes::VARCHAR, false, null);

		$tMap->addColumn('ESTATU', 'Estatu', 'string', CreoleTypes::VARCHAR, false, null);

		$tMap->addColumn('FECCIESES', 'Feccieses', 'int', CreoleTypes::DATE, false, null);

	} 
} 