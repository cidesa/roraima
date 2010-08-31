<?php



class OcciudadMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.OcciudadMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('occiudad');
		$tMap->setPhpName('Occiudad');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('occiudad_SEQ');

		$tMap->addForeignKey('CODPAI', 'Codpai', 'string', CreoleTypes::VARCHAR, 'ocpais', 'CODPAI', true, 4);

		$tMap->addForeignKey('CODEDO', 'Codedo', 'string', CreoleTypes::VARCHAR, 'ocestado', 'CODEDO', true, 4);

		$tMap->addColumn('CODCIU', 'Codciu', 'string', CreoleTypes::VARCHAR, true, 4);

		$tMap->addColumn('NOMCIU', 'Nomciu', 'string', CreoleTypes::VARCHAR, true, 50);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 
