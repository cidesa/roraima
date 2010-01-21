<?php



class CcaregerMapBuilder {

	
	const CLASS_NAME = 'lib.model.creditos.map.CcaregerMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('ccareger');
		$tMap->setPhpName('Ccareger');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('ccareger_SEQ');

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

		$tMap->addColumn('NOMARE', 'Nomare', 'string', CreoleTypes::VARCHAR, false, null);

		$tMap->addColumn('DESARE', 'Desare', 'string', CreoleTypes::VARCHAR, false, null);

		$tMap->addColumn('OBJARE', 'Objare', 'string', CreoleTypes::VARCHAR, false, null);

		$tMap->addForeignKey('CCGERENC_ID', 'CcgerencId', 'int', CreoleTypes::INTEGER, 'ccgerenc', 'ID', true, null);

	} 
} 