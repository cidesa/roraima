<?php



class DfatendocobsMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.DfatendocobsMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('dfatendocobs');
		$tMap->setPhpName('Dfatendocobs');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('dfatendocobs_SEQ');

		$tMap->addColumn('DESOBS', 'Desobs', 'string', CreoleTypes::VARCHAR, false, 100);

		$tMap->addForeignKey('ID_DFATENDOCDET', 'IdDfatendocdet', 'int', CreoleTypes::INTEGER, 'dfatendocdet', 'ID', true, null);

		$tMap->addForeignKey('ID_USUARIO', 'IdUsuario', 'int', CreoleTypes::INTEGER, 'usuarios', 'ID', true, null);

		$tMap->addColumn('FECOBS', 'Fecobs', 'int', CreoleTypes::TIMESTAMP, true, null);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 