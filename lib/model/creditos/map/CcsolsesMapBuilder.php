<?php



class CcsolsesMapBuilder {

	
	const CLASS_NAME = 'lib.model.creditos.map.CcsolsesMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('ccsolses');
		$tMap->setPhpName('Ccsolses');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('ccsolses_SEQ');

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

		$tMap->addColumn('MOTIVO', 'Motivo', 'string', CreoleTypes::VARCHAR, false, null);

		$tMap->addColumn('OBSRES', 'Obsres', 'string', CreoleTypes::VARCHAR, false, null);

		$tMap->addColumn('ESTATU', 'Estatu', 'string', CreoleTypes::VARCHAR, false, null);

		$tMap->addForeignKey('CCSOLICI_ID', 'CcsoliciId', 'int', CreoleTypes::INTEGER, 'ccsolici', 'ID', true, null);

		$tMap->addForeignKey('CCSESION_ID', 'CcsesionId', 'int', CreoleTypes::INTEGER, 'ccsesion', 'ID', true, null);

	} 
} 