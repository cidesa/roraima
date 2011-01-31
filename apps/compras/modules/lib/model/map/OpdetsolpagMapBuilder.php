<?php



class OpdetsolpagMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.OpdetsolpagMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('opdetsolpag');
		$tMap->setPhpName('Opdetsolpag');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('opdetsolpag_SEQ');

		$tMap->addForeignKey('REFSOL', 'Refsol', 'string', CreoleTypes::VARCHAR, 'opsolpag', 'REFSOL', true, 8);

		$tMap->addColumn('CODPRE', 'Codpre', 'string', CreoleTypes::VARCHAR, true, 32);

		$tMap->addColumn('MONIMP', 'Monimp', 'double', CreoleTypes::NUMERIC, false, 14);

		$tMap->addColumn('STAIMP', 'Staimp', 'string', CreoleTypes::VARCHAR, false, 1);

		$tMap->addForeignKey('REFORD', 'Reford', 'string', CreoleTypes::VARCHAR, 'opordpag', 'NUMORD', false, 8);

		$tMap->addColumn('REFERE', 'Refere', 'string', CreoleTypes::VARCHAR, false, 8);

		$tMap->addColumn('REFPRC', 'Refprc', 'string', CreoleTypes::VARCHAR, false, 8);

		$tMap->addForeignKey('REFCOM', 'Refcom', 'string', CreoleTypes::VARCHAR, 'cpcompro', 'REFCOM', false, 8);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 