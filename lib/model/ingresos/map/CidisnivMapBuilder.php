<?php



class CidisnivMapBuilder {

	
	const CLASS_NAME = 'lib.model.ingresos.map.CidisnivMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('cidisniv');
		$tMap->setPhpName('Cidisniv');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('cidisniv_SEQ');

		$tMap->addColumn('CODPRE', 'Codpre', 'string', CreoleTypes::VARCHAR, true, 32);

		$tMap->addColumn('MONASI', 'Monasi', 'double', CreoleTypes::NUMERIC, false, 14);

		$tMap->addColumn('MODIFICACION', 'Modificacion', 'double', CreoleTypes::NUMERIC, false, 14);

		$tMap->addColumn('ASIGACTUAL', 'Asigactual', 'double', CreoleTypes::NUMERIC, false, 14);

		$tMap->addColumn('MONPRC', 'Monprc', 'double', CreoleTypes::NUMERIC, false, 14);

		$tMap->addColumn('MONCOM', 'Moncom', 'double', CreoleTypes::NUMERIC, false, 14);

		$tMap->addColumn('MONCAU', 'Moncau', 'double', CreoleTypes::NUMERIC, false, 14);

		$tMap->addColumn('MONPAG', 'Monpag', 'double', CreoleTypes::NUMERIC, false, 14);

		$tMap->addColumn('MONAJU', 'Monaju', 'double', CreoleTypes::NUMERIC, false, 14);

		$tMap->addColumn('MONDIS', 'Mondis', 'double', CreoleTypes::NUMERIC, false, 14);

		$tMap->addColumn('DEUDA', 'Deuda', 'double', CreoleTypes::NUMERIC, false, 14);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 