<?php



class NpvacsalidasMapBuilder {

	
	const CLASS_NAME = 'lib.model.nomina.map.NpvacsalidasMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('npvacsalidas');
		$tMap->setPhpName('Npvacsalidas');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('npvacsalidas_SEQ');

		$tMap->addColumn('CODEMP', 'Codemp', 'string', CreoleTypes::VARCHAR, false, 16);

		$tMap->addColumn('FECVAC', 'Fecvac', 'int', CreoleTypes::DATE, false, null);

		$tMap->addColumn('DIASDISFRUTAR', 'Diasdisfrutar', 'double', CreoleTypes::NUMERIC, false, 14);

		$tMap->addColumn('OBSERVA', 'Observa', 'string', CreoleTypes::VARCHAR, false, 250);

		$tMap->addColumn('FECDES', 'Fecdes', 'int', CreoleTypes::DATE, false, null);

		$tMap->addColumn('FECHAS', 'Fechas', 'int', CreoleTypes::DATE, false, null);

		$tMap->addColumn('FECPAGBONVAC', 'Fecpagbonvac', 'int', CreoleTypes::DATE, false, null);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 