<?php



class NppreliqMapBuilder {

	
	const CLASS_NAME = 'lib.model.nomina.map.NppreliqMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('nppreliq');
		$tMap->setPhpName('Nppreliq');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('nppreliq_SEQ');

		$tMap->addColumn('FECVIG', 'Fecvig', 'int', CreoleTypes::DATE, true, null);

		$tMap->addColumn('CODNOM', 'Codnom', 'string', CreoleTypes::VARCHAR, true, 3);

		$tMap->addColumn('MES', 'Mes', 'double', CreoleTypes::NUMERIC, true, 6);

		$tMap->addColumn('DIAPRE', 'Diapre', 'double', CreoleTypes::NUMERIC, false, 14);

		$tMap->addColumn('DIAANT', 'Diaant', 'double', CreoleTypes::NUMERIC, false, 14);

		$tMap->addColumn('DIAVAC', 'Diavac', 'double', CreoleTypes::NUMERIC, false, 14);

		$tMap->addColumn('DIAVACFRA', 'Diavacfra', 'double', CreoleTypes::NUMERIC, false, 14);

		$tMap->addColumn('DIABONVAC', 'Diabonvac', 'double', CreoleTypes::NUMERIC, false, 14);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 