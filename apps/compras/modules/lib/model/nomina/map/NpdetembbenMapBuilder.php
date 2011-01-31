<?php



class NpdetembbenMapBuilder {

	
	const CLASS_NAME = 'lib.model.nomina.map.NpdetembbenMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('npdetembben');
		$tMap->setPhpName('Npdetembben');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('npdetembben_SEQ');

		$tMap->addColumn('CODEMB', 'Codemb', 'string', CreoleTypes::VARCHAR, true, 4);

		$tMap->addColumn('CODEMP', 'Codemp', 'string', CreoleTypes::VARCHAR, true, 16);

		$tMap->addColumn('CEDRIFBEN', 'Cedrifben', 'string', CreoleTypes::VARCHAR, true, 16);

		$tMap->addColumn('TIPREL', 'Tiprel', 'string', CreoleTypes::VARCHAR, true, 3);

		$tMap->addColumn('VALEMB', 'Valemb', 'double', CreoleTypes::NUMERIC, false, 14);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 