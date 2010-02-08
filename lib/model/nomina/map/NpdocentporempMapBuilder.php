<?php



class NpdocentporempMapBuilder {

	
	const CLASS_NAME = 'lib.model.nomina.map.NpdocentporempMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('npdocentporemp');
		$tMap->setPhpName('Npdocentporemp');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('npdocentporemp_SEQ');

		$tMap->addColumn('CODEMP', 'Codemp', 'string', CreoleTypes::VARCHAR, false, 16);

		$tMap->addColumn('CODDOC', 'Coddoc', 'string', CreoleTypes::VARCHAR, false, 3);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 