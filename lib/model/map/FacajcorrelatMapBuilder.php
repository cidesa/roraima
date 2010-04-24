<?php



class FacajcorrelatMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.FacajcorrelatMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('facajcorrelat');
		$tMap->setPhpName('Facajcorrelat');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('facajcorrelat_SEQ');

		$tMap->addColumn('CODCAJ', 'Codcaj', 'string', CreoleTypes::VARCHAR, true, 3);

		$tMap->addColumn('CODFAC', 'Codfac', 'string', CreoleTypes::VARCHAR, true, 8);

		$tMap->addColumn('TIPO', 'Tipo', 'string', CreoleTypes::VARCHAR, true, 1);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 