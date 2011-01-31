<?php



class FcdefentextMapBuilder {

	
	const CLASS_NAME = 'lib.model.hacienda.map.FcdefentextMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('fcdefentext');
		$tMap->setPhpName('Fcdefentext');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('fcdefentext_SEQ');

		$tMap->addColumn('CODENTEXT', 'Codentext', 'string', CreoleTypes::VARCHAR, true, 3);

		$tMap->addColumn('NOMENTEXT', 'Nomentext', 'string', CreoleTypes::VARCHAR, true, 50);

		$tMap->addColumn('PERNATJUR', 'Pernatjur', 'string', CreoleTypes::VARCHAR, false, 1);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 