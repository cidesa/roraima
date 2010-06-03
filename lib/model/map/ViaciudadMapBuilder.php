<?php



class ViaciudadMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.ViaciudadMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('viaciudad');
		$tMap->setPhpName('Viaciudad');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('viaciudad_SEQ');

		$tMap->addColumn('CODCIU', 'Codciu', 'string', CreoleTypes::VARCHAR, true, 4);

		$tMap->addColumn('NOMCIU', 'Nomciu', 'string', CreoleTypes::VARCHAR, true, 100);

		$tMap->addColumn('CODEST', 'Codest', 'string', CreoleTypes::VARCHAR, true, 4);

		$tMap->addColumn('CODPAI', 'Codpai', 'string', CreoleTypes::VARCHAR, true, 4);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 