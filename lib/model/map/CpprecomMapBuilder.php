<?php



class CpprecomMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.CpprecomMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('cpprecom');
		$tMap->setPhpName('Cpprecom');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('cpprecom_SEQ');

		$tMap->addColumn('REFPRC', 'Refprc', 'string', CreoleTypes::VARCHAR, true, 8);

		$tMap->addColumn('TIPPRC', 'Tipprc', 'string', CreoleTypes::VARCHAR, true, 4);

		$tMap->addColumn('FECPRC', 'Fecprc', 'int', CreoleTypes::DATE, true, null);

		$tMap->addColumn('ANOPRC', 'Anoprc', 'string', CreoleTypes::VARCHAR, false, 4);

		$tMap->addColumn('DESPRC', 'Desprc', 'string', CreoleTypes::VARCHAR, false, 250);

		$tMap->addColumn('DESANU', 'Desanu', 'string', CreoleTypes::VARCHAR, false, 100);

		$tMap->addColumn('MONPRC', 'Monprc', 'double', CreoleTypes::NUMERIC, false, 14);

		$tMap->addColumn('SALCOM', 'Salcom', 'double', CreoleTypes::NUMERIC, false, 14);

		$tMap->addColumn('SALCAU', 'Salcau', 'double', CreoleTypes::NUMERIC, false, 14);

		$tMap->addColumn('SALPAG', 'Salpag', 'double', CreoleTypes::NUMERIC, false, 14);

		$tMap->addColumn('SALAJU', 'Salaju', 'double', CreoleTypes::NUMERIC, false, 14);

		$tMap->addColumn('STAPRC', 'Staprc', 'string', CreoleTypes::VARCHAR, false, 1);

		$tMap->addColumn('FECANU', 'Fecanu', 'int', CreoleTypes::DATE, false, null);

		$tMap->addColumn('CEDRIF', 'Cedrif', 'string', CreoleTypes::VARCHAR, false, 15);

		$tMap->addColumn('REFSOL', 'Refsol', 'string', CreoleTypes::VARCHAR, false, 8);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 