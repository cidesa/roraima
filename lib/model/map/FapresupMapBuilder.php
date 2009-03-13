<?php



class FapresupMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.FapresupMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('fapresup');
		$tMap->setPhpName('Fapresup');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('fapresup_SEQ');

		$tMap->addColumn('REFPRE', 'Refpre', 'string', CreoleTypes::VARCHAR, true, 8);

		$tMap->addColumn('DESPRE', 'Despre', 'string', CreoleTypes::VARCHAR, false, 255);

		$tMap->addColumn('FECPRE', 'Fecpre', 'int', CreoleTypes::DATE, true, null);

		$tMap->addColumn('CODCLI', 'Codcli', 'string', CreoleTypes::VARCHAR, true, 10);

		$tMap->addColumn('MONPRE', 'Monpre', 'double', CreoleTypes::NUMERIC, false, 14);

		$tMap->addColumn('MONDESC', 'Mondesc', 'double', CreoleTypes::NUMERIC, false, 14);

		$tMap->addColumn('MONRGO', 'Monrgo', 'double', CreoleTypes::NUMERIC, false, 14);

		$tMap->addForeignKey('FACONPAG_ID', 'FaconpagId', 'int', CreoleTypes::INTEGER, 'faconpag', 'ID', false, null);

		$tMap->addForeignKey('FAFORDES_ID', 'FafordesId', 'int', CreoleTypes::INTEGER, 'fafordes', 'ID', false, null);

		$tMap->addForeignKey('FAFORSOL_ID', 'FaforsolId', 'int', CreoleTypes::INTEGER, 'faforsol', 'ID', false, null);

		$tMap->addColumn('TIPMON', 'Tipmon', 'string', CreoleTypes::VARCHAR, false, 3);

		$tMap->addColumn('VALMON', 'Valmon', 'double', CreoleTypes::NUMERIC, false, 12);

		$tMap->addColumn('AUTPOR', 'Autpor', 'string', CreoleTypes::VARCHAR, false, 50);

		$tMap->addColumn('OBSERV', 'Observ', 'string', CreoleTypes::VARCHAR, false, 500);

		$tMap->addColumn('CODUBI', 'Codubi', 'string', CreoleTypes::VARCHAR, false, 30);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 