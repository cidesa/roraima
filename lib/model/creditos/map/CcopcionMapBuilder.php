<?php



class CcopcionMapBuilder {

	
	const CLASS_NAME = 'lib.model.creditos.map.CcopcionMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('ccopcion');
		$tMap->setPhpName('Ccopcion');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('ccopcion_SEQ');

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

		$tMap->addColumn('NOMOPC', 'Nomopc', 'string', CreoleTypes::VARCHAR, false, null);

		$tMap->addColumn('DESOPC', 'Desopc', 'string', CreoleTypes::VARCHAR, false, null);

	} 
} 