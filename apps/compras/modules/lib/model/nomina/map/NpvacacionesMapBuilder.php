<?php



class NpvacacionesMapBuilder {

	
	const CLASS_NAME = 'lib.model.nomina.map.NpvacacionesMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('npvacaciones');
		$tMap->setPhpName('Npvacaciones');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('npvacaciones_SEQ');

		$tMap->addColumn('CODEMP', 'Codemp', 'string', CreoleTypes::VARCHAR, false, 16);

		$tMap->addColumn('FECHAVAC', 'Fechavac', 'int', CreoleTypes::DATE, false, null);

		$tMap->addColumn('DISFRUTAR', 'Disfrutar', 'double', CreoleTypes::NUMERIC, false, 14);

		$tMap->addColumn('DISFRUTADOS', 'Disfrutados', 'double', CreoleTypes::NUMERIC, false, 14);

		$tMap->addColumn('BONOVAC', 'Bonovac', 'double', CreoleTypes::NUMERIC, false, 14);

		$tMap->addColumn('BONOPAGADO', 'Bonopagado', 'string', CreoleTypes::VARCHAR, false, 1);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 