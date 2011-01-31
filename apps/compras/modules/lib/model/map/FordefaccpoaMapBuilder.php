<?php



class FordefaccpoaMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.FordefaccpoaMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('fordefaccpoa');
		$tMap->setPhpName('Fordefaccpoa');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('fordefaccpoa_SEQ');

		$tMap->addColumn('CODSUBACC', 'Codsubacc', 'string', CreoleTypes::VARCHAR, true, 5);

		$tMap->addColumn('DESSUBACC', 'Dessubacc', 'string', CreoleTypes::VARCHAR, false, 250);

		$tMap->addColumn('METSUBACC', 'Metsubacc', 'string', CreoleTypes::VARCHAR, false, 250);

		$tMap->addColumn('LOCSUBACC', 'Locsubacc', 'string', CreoleTypes::VARCHAR, false, 250);

		$tMap->addColumn('INDGESSUBACC', 'Indgessubacc', 'string', CreoleTypes::VARCHAR, false, 250);

		$tMap->addColumn('CODUNIMED', 'Codunimed', 'string', CreoleTypes::VARCHAR, false, 3);

		$tMap->addColumn('MEDVERSUBACC', 'Medversubacc', 'string', CreoleTypes::VARCHAR, false, 250);

		$tMap->addColumn('SUPSUBACC', 'Supsubacc', 'string', CreoleTypes::VARCHAR, false, 250);

		$tMap->addColumn('METPRITRI', 'Metpritri', 'double', CreoleTypes::NUMERIC, false, 14);

		$tMap->addColumn('METSEGTRI', 'Metsegtri', 'double', CreoleTypes::NUMERIC, false, 14);

		$tMap->addColumn('METTERTRI', 'Mettertri', 'double', CreoleTypes::NUMERIC, false, 14);

		$tMap->addColumn('METCUATRI', 'Metcuatri', 'double', CreoleTypes::NUMERIC, false, 14);

		$tMap->addColumn('METTOT', 'Mettot', 'double', CreoleTypes::NUMERIC, false, 14);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 