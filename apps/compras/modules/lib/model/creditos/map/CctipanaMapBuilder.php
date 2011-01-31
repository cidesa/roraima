<?php



class CctipanaMapBuilder {

	
	const CLASS_NAME = 'lib.model.creditos.map.CctipanaMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('cctipana');
		$tMap->setPhpName('Cctipana');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('cctipana_SEQ');

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

		$tMap->addColumn('NOMTIPANA', 'Nomtipana', 'string', CreoleTypes::VARCHAR, false, null);

		$tMap->addColumn('DESTIPANA', 'Destipana', 'string', CreoleTypes::VARCHAR, false, null);

		$tMap->addForeignKey('CCGERENC_ID', 'CcgerencId', 'int', CreoleTypes::INTEGER, 'ccgerenc', 'ID', true, null);

	} 
} 