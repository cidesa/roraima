<?php



class TscomegrmesMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.TscomegrmesMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('tscomegrmes');
		$tMap->setPhpName('Tscomegrmes');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('tscomegrmes_SEQ');

		$tMap->addColumn('MES1', 'Mes1', 'string', CreoleTypes::VARCHAR, true, 2);

		$tMap->addColumn('CORMES1', 'Cormes1', 'int', CreoleTypes::INTEGER, false, null);

		$tMap->addColumn('MES2', 'Mes2', 'string', CreoleTypes::VARCHAR, true, 2);

		$tMap->addColumn('CORMES2', 'Cormes2', 'int', CreoleTypes::INTEGER, false, null);

		$tMap->addColumn('MES3', 'Mes3', 'string', CreoleTypes::VARCHAR, true, 2);

		$tMap->addColumn('CORMES3', 'Cormes3', 'int', CreoleTypes::INTEGER, false, null);

		$tMap->addColumn('MES4', 'Mes4', 'string', CreoleTypes::VARCHAR, true, 2);

		$tMap->addColumn('CORMES4', 'Cormes4', 'int', CreoleTypes::INTEGER, false, null);

		$tMap->addColumn('MES5', 'Mes5', 'string', CreoleTypes::VARCHAR, true, 2);

		$tMap->addColumn('CORMES5', 'Cormes5', 'int', CreoleTypes::INTEGER, false, null);

		$tMap->addColumn('MES6', 'Mes6', 'string', CreoleTypes::VARCHAR, true, 2);

		$tMap->addColumn('CORMES6', 'Cormes6', 'int', CreoleTypes::INTEGER, false, null);

		$tMap->addColumn('MES7', 'Mes7', 'string', CreoleTypes::VARCHAR, true, 2);

		$tMap->addColumn('CORMES7', 'Cormes7', 'int', CreoleTypes::INTEGER, false, null);

		$tMap->addColumn('MES8', 'Mes8', 'string', CreoleTypes::VARCHAR, true, 2);

		$tMap->addColumn('CORMES8', 'Cormes8', 'int', CreoleTypes::INTEGER, false, null);

		$tMap->addColumn('MES9', 'Mes9', 'string', CreoleTypes::VARCHAR, true, 2);

		$tMap->addColumn('CORMES9', 'Cormes9', 'int', CreoleTypes::INTEGER, false, null);

		$tMap->addColumn('MES10', 'Mes10', 'string', CreoleTypes::VARCHAR, true, 2);

		$tMap->addColumn('CORMES10', 'Cormes10', 'int', CreoleTypes::INTEGER, false, null);

		$tMap->addColumn('MES11', 'Mes11', 'string', CreoleTypes::VARCHAR, true, 2);

		$tMap->addColumn('CORMES11', 'Cormes11', 'int', CreoleTypes::INTEGER, false, null);

		$tMap->addColumn('MES12', 'Mes12', 'string', CreoleTypes::VARCHAR, true, 2);

		$tMap->addColumn('CORMES12', 'Cormes12', 'int', CreoleTypes::INTEGER, false, null);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 