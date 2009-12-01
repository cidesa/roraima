<?php



class CpmovajuMapBuilder {

	
	const CLASS_NAME = 'lib.model.presupuesto.map.CpmovajuMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('cpmovaju');
		$tMap->setPhpName('Cpmovaju');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('cpmovaju_SEQ');

		$tMap->addForeignKey('REFAJU', 'Refaju', 'string', CreoleTypes::VARCHAR, 'cpajuste', 'REFAJU', true, 8);

		$tMap->addForeignKey('CODPRE', 'Codpre', 'string', CreoleTypes::VARCHAR, 'cpdeftit', 'CODPRE', true, 32);

		$tMap->addColumn('MONAJU', 'Monaju', 'double', CreoleTypes::NUMERIC, false, 14);

		$tMap->addColumn('STAMOV', 'Stamov', 'string', CreoleTypes::VARCHAR, false, 1);

		$tMap->addColumn('REFPRC', 'Refprc', 'string', CreoleTypes::VARCHAR, true, 8);

		$tMap->addColumn('REFCOM', 'Refcom', 'string', CreoleTypes::VARCHAR, true, 8);

		$tMap->addColumn('REFCAU', 'Refcau', 'string', CreoleTypes::VARCHAR, true, 8);

		$tMap->addColumn('REFPAG', 'Refpag', 'string', CreoleTypes::VARCHAR, false, 8);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 