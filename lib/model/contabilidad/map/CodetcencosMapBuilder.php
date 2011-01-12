<?php



class CodetcencosMapBuilder {

	
	const CLASS_NAME = 'lib.model.contabilidad.map.CodetcencosMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('codetcencos');
		$tMap->setPhpName('Codetcencos');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('codetcencos_SEQ');

		$tMap->addColumn('NUMCOM', 'Numcom', 'string', CreoleTypes::VARCHAR, true, 8);

		$tMap->addColumn('CODCTA', 'Codcta', 'string', CreoleTypes::VARCHAR, true, 32);

		$tMap->addColumn('CODCENCOS', 'Codcencos', 'string', CreoleTypes::VARCHAR, true, 32);

		$tMap->addColumn('MONCENCOS', 'Moncencos', 'double', CreoleTypes::NUMERIC, false, 14);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 