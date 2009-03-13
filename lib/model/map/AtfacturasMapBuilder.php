<?php



class AtfacturasMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.AtfacturasMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('atfacturas');
		$tMap->setPhpName('Atfacturas');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('atfacturas_SEQ');

		$tMap->addForeignKey('ATAYUDAS_ID', 'AtayudasId', 'int', CreoleTypes::INTEGER, 'atayudas', 'ID', false, null);

		$tMap->addColumn('NUMFAC', 'Numfac', 'string', CreoleTypes::VARCHAR, true, 50);

		$tMap->addColumn('BASIMP', 'Basimp', 'double', CreoleTypes::NUMERIC, false, 14);

		$tMap->addColumn('IVA', 'Iva', 'double', CreoleTypes::NUMERIC, false, 14);

		$tMap->addColumn('EXENTOS', 'Exentos', 'double', CreoleTypes::NUMERIC, false, 14);

		$tMap->addColumn('TOTAL', 'Total', 'double', CreoleTypes::NUMERIC, false, 14);

		$tMap->addColumn('NROSPD', 'Nrospd', 'string', CreoleTypes::VARCHAR, false, 50);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 