<?php



class AtestsocecoMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.AtestsocecoMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('atestsoceco');
		$tMap->setPhpName('Atestsoceco');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('atestsoceco_SEQ');

		$tMap->addForeignKey('ATAYUDAS_ID', 'AtayudasId', 'int', CreoleTypes::INTEGER, 'atayudas', 'ID', false, null);

		$tMap->addForeignKey('ATCIUDADANO_ID', 'AtciudadanoId', 'int', CreoleTypes::INTEGER, 'atciudadano', 'ID', false, null);

		$tMap->addForeignKey('ATTIPVIV_ID', 'AttipvivId', 'int', CreoleTypes::INTEGER, 'attipviv', 'ID', false, null);

		$tMap->addForeignKey('ATTIPPROVIV_ID', 'AttipprovivId', 'int', CreoleTypes::INTEGER, 'attipproviv', 'ID', false, null);

		$tMap->addColumn('CARVIVSAL', 'Carvivsal', 'boolean', CreoleTypes::BOOLEAN, false, null);

		$tMap->addColumn('CARVIVCOM', 'Carvivcom', 'boolean', CreoleTypes::BOOLEAN, false, null);

		$tMap->addColumn('CARVIVHAB', 'Carvivhab', 'boolean', CreoleTypes::BOOLEAN, false, null);

		$tMap->addColumn('CARVIVCOC', 'Carvivcoc', 'boolean', CreoleTypes::BOOLEAN, false, null);

		$tMap->addColumn('CARVIVBAN', 'Carvivban', 'boolean', CreoleTypes::BOOLEAN, false, null);

		$tMap->addColumn('CARVIVPAT', 'Carvivpat', 'boolean', CreoleTypes::BOOLEAN, false, null);

		$tMap->addColumn('CARVIVAREVER', 'Carvivarever', 'boolean', CreoleTypes::BOOLEAN, false, null);

		$tMap->addColumn('CARVIVPIS', 'Carvivpis', 'boolean', CreoleTypes::BOOLEAN, false, null);

		$tMap->addColumn('CARVIVPAR', 'Carvivpar', 'boolean', CreoleTypes::BOOLEAN, false, null);

		$tMap->addColumn('CARVIVTEC', 'Carvivtec', 'boolean', CreoleTypes::BOOLEAN, false, null);

		$tMap->addColumn('ANASOCECO', 'Anasoceco', 'string', CreoleTypes::VARCHAR, false, 1000);

		$tMap->addColumn('ANAFAM', 'Anafam', 'string', CreoleTypes::VARCHAR, false, 1000);

		$tMap->addColumn('OTROS', 'Otros', 'string', CreoleTypes::VARCHAR, false, 1000);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 