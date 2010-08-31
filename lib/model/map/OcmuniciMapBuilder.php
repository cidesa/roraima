<?php



class OcmuniciMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.OcmuniciMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('ocmunici');
		$tMap->setPhpName('Ocmunici');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('ocmunici_SEQ');

		$tMap->addForeignKey('CODPAI', 'Codpai', 'string', CreoleTypes::VARCHAR, 'ocpais', 'CODPAI', true, 4);

		$tMap->addForeignKey('CODEDO', 'Codedo', 'string', CreoleTypes::VARCHAR, 'ocestado', 'CODEDO', true, 4);

		$tMap->addForeignKey('CODCIU', 'Codciu', 'string', CreoleTypes::VARCHAR, 'occiudad', 'CODCIU', true, 4);

		$tMap->addColumn('CODMUN', 'Codmun', 'string', CreoleTypes::VARCHAR, true, 4);

		$tMap->addColumn('NOMMUN', 'Nommun', 'string', CreoleTypes::VARCHAR, true, 50);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 
