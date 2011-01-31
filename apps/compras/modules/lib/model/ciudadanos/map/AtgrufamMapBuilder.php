<?php



class AtgrufamMapBuilder {

	
	const CLASS_NAME = 'lib.model.ciudadanos.map.AtgrufamMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('atgrufam');
		$tMap->setPhpName('Atgrufam');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('atgrufam_SEQ');

		$tMap->addForeignKey('ATCIUDADANO_ID', 'AtciudadanoId', 'int', CreoleTypes::INTEGER, 'atciudadano', 'ID', false, null);

		$tMap->addColumn('CEDFAM', 'Cedfam', 'string', CreoleTypes::VARCHAR, false, 12);

		$tMap->addColumn('NOMFAM', 'Nomfam', 'string', CreoleTypes::VARCHAR, true, 50);

		$tMap->addColumn('APEFAM', 'Apefam', 'string', CreoleTypes::VARCHAR, true, 50);

		$tMap->addColumn('EDAD', 'Edad', 'int', CreoleTypes::INTEGER, true, null);

		$tMap->addColumn('PARFAM', 'Parfam', 'string', CreoleTypes::VARCHAR, true, 50);

		$tMap->addColumn('OCUFAM', 'Ocufam', 'string', CreoleTypes::VARCHAR, false, 50);

		$tMap->addColumn('MONING', 'Moning', 'double', CreoleTypes::NUMERIC, false, 14);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 