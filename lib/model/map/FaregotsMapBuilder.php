<?php



class FaregotsMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.FaregotsMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('faregots');
		$tMap->setPhpName('Faregots');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('faregots_SEQ');

		$tMap->addColumn('CEDRIF', 'Cedrif', 'string', CreoleTypes::VARCHAR, true, 15);

		$tMap->addColumn('NOMOTS', 'Nomots', 'string', CreoleTypes::VARCHAR, true, 250);

		$tMap->addColumn('RIFPRO', 'Rifpro', 'string', CreoleTypes::VARCHAR, true, 15);

		$tMap->addColumn('PLACA', 'Placa', 'string', CreoleTypes::VARCHAR, true, 10);

		$tMap->addColumn('ESTATUS', 'Estatus', 'string', CreoleTypes::VARCHAR, true, 1);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 