<?php



class CpmovfuefinMapBuilder {

	
	const CLASS_NAME = 'lib.model.presupuesto.map.CpmovfuefinMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('cpmovfuefin');
		$tMap->setPhpName('Cpmovfuefin');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('cpmovfuefin_SEQ');

		$tMap->addColumn('CORREL', 'Correl', 'string', CreoleTypes::VARCHAR, false, 10);

		$tMap->addColumn('REFMOV', 'Refmov', 'string', CreoleTypes::VARCHAR, false, 8);

		$tMap->addColumn('TIPMOV', 'Tipmov', 'string', CreoleTypes::VARCHAR, false, 20);

		$tMap->addColumn('MONMOV', 'Monmov', 'double', CreoleTypes::NUMERIC, false, 20);

		$tMap->addColumn('FECMOV', 'Fecmov', 'int', CreoleTypes::DATE, false, null);

		$tMap->addColumn('CODPRE', 'Codpre', 'string', CreoleTypes::VARCHAR, false, 32);

		$tMap->addColumn('STAMOV', 'Stamov', 'string', CreoleTypes::VARCHAR, false, 1);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 