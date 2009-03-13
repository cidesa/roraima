<?php



class RhasicurMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.RhasicurMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('rhasicur');
		$tMap->setPhpName('Rhasicur');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('rhasicur_SEQ');

		$tMap->addColumn('CODCUR', 'Codcur', 'string', CreoleTypes::VARCHAR, true, 10);

		$tMap->addColumn('NUMCLA', 'Numcla', 'string', CreoleTypes::VARCHAR, true, 3);

		$tMap->addColumn('CODEMP', 'Codemp', 'string', CreoleTypes::VARCHAR, true, 16);

		$tMap->addColumn('ASICLA', 'Asicla', 'string', CreoleTypes::VARCHAR, false, 1);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 