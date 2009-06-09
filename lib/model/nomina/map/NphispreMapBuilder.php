<?php



class NphispreMapBuilder {

	
	const CLASS_NAME = 'lib.model.nomina.map.NphispreMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('nphispre');
		$tMap->setPhpName('Nphispre');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('nphispre_SEQ');

		$tMap->addColumn('CODTIPPRE', 'Codtippre', 'string', CreoleTypes::VARCHAR, true, 4);

		$tMap->addColumn('FECHISPRE', 'Fechispre', 'int', CreoleTypes::DATE, false, null);

		$tMap->addColumn('DESHISPRE', 'Deshispre', 'string', CreoleTypes::VARCHAR, false, 250);

		$tMap->addColumn('CODEMP', 'Codemp', 'string', CreoleTypes::VARCHAR, true, 16);

		$tMap->addColumn('MONPRE', 'Monpre', 'double', CreoleTypes::NUMERIC, true, 14);

		$tMap->addColumn('SALDO', 'Saldo', 'double', CreoleTypes::NUMERIC, false, 14);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 