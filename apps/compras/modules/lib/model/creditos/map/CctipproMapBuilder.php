<?php



class CctipproMapBuilder {

	
	const CLASS_NAME = 'lib.model.creditos.map.CctipproMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('cctippro');
		$tMap->setPhpName('Cctippro');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('cctippro_SEQ');

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

		$tMap->addColumn('NOMTIPPRO', 'Nomtippro', 'string', CreoleTypes::VARCHAR, false, null);

		$tMap->addColumn('DESTIPPRO', 'Destippro', 'string', CreoleTypes::VARCHAR, false, null);

		$tMap->addColumn('EMPCOOP', 'Empcoop', 'string', CreoleTypes::VARCHAR, false, null);

	} 
} 