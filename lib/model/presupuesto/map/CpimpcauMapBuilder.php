<?php



class CpimpcauMapBuilder {

	
	const CLASS_NAME = 'lib.model.presupuesto.map.CpimpcauMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('cpimpcau');
		$tMap->setPhpName('Cpimpcau');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('cpimpcau_SEQ');

		$tMap->addForeignKey('REFCAU', 'Refcau', 'string', CreoleTypes::VARCHAR, 'cpcausad', 'REFCAU', true, 8);

		$tMap->addColumn('CODPRE', 'Codpre', 'string', CreoleTypes::VARCHAR, true, 32);

		$tMap->addColumn('MONIMP', 'Monimp', 'double', CreoleTypes::NUMERIC, false, 14);

		$tMap->addColumn('MONPAG', 'Monpag', 'double', CreoleTypes::NUMERIC, false, 14);

		$tMap->addColumn('MONAJU', 'Monaju', 'double', CreoleTypes::NUMERIC, false, 14);

		$tMap->addColumn('STAIMP', 'Staimp', 'string', CreoleTypes::VARCHAR, false, 1);

		$tMap->addColumn('REFERE', 'Refere', 'string', CreoleTypes::VARCHAR, false, 8);

		$tMap->addColumn('REFPRC', 'Refprc', 'string', CreoleTypes::VARCHAR, false, 8);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 