<?php



class LidetcomMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.LidetcomMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('lidetcom');
		$tMap->setPhpName('Lidetcom');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('lidetcom_SEQ');

		$tMap->addForeignKey('LICOMLIC_ID', 'LicomlicId', 'int', CreoleTypes::INTEGER, 'licomlic', 'ID', true, null);

		$tMap->addColumn('CODEMP', 'Codemp', 'string', CreoleTypes::VARCHAR, false, 16);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 