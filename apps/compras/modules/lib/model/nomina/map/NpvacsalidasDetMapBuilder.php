<?php



class NpvacsalidasDetMapBuilder {

	
	const CLASS_NAME = 'lib.model.nomina.map.NpvacsalidasDetMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('npvacsalidas_det');
		$tMap->setPhpName('NpvacsalidasDet');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('npvacsalidas_det_SEQ');

		$tMap->addColumn('CODEMP', 'Codemp', 'string', CreoleTypes::VARCHAR, false, 16);

		$tMap->addColumn('PERINI', 'Perini', 'string', CreoleTypes::VARCHAR, false, 4);

		$tMap->addColumn('PERFIN', 'Perfin', 'string', CreoleTypes::VARCHAR, false, 4);

		$tMap->addColumn('DIASDISFUTAR', 'Diasdisfutar', 'double', CreoleTypes::NUMERIC, false, 14);

		$tMap->addColumn('DIASDISFRUTADOS', 'Diasdisfrutados', 'double', CreoleTypes::NUMERIC, false, 14);

		$tMap->addColumn('DIASVAC', 'Diasvac', 'double', CreoleTypes::NUMERIC, false, 14);

		$tMap->addColumn('DIASBONOVAC', 'Diasbonovac', 'double', CreoleTypes::NUMERIC, false, 14);

		$tMap->addColumn('DIASBONOVACPAG', 'Diasbonovacpag', 'double', CreoleTypes::NUMERIC, false, 14);

		$tMap->addColumn('FECVAC', 'Fecvac', 'int', CreoleTypes::DATE, false, null);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 