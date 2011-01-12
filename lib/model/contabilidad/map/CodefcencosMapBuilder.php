<?php



class CodefcencosMapBuilder {

	
	const CLASS_NAME = 'lib.model.contabilidad.map.CodefcencosMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('codefcencos');
		$tMap->setPhpName('Codefcencos');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('codefcencos_SEQ');

		$tMap->addColumn('CODCENCOS', 'Codcencos', 'string', CreoleTypes::VARCHAR, true, 32);

		$tMap->addColumn('DESCENCOS', 'Descencos', 'string', CreoleTypes::VARCHAR, true, 500);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 