<?php



class CcactanaMapBuilder {

	
	const CLASS_NAME = 'lib.model.creditos.map.CcactanaMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('ccactana');
		$tMap->setPhpName('Ccactana');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('ccactana_SEQ');

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

		$tMap->addColumn('OBSERV', 'Observ', 'string', CreoleTypes::VARCHAR, false, null);

		$tMap->addColumn('FECASI', 'Fecasi', 'int', CreoleTypes::DATE, false, null);

		$tMap->addColumn('FECCUL', 'Feccul', 'int', CreoleTypes::DATE, false, null);

		$tMap->addColumn('NOMACT', 'Nomact', 'string', CreoleTypes::VARCHAR, false, null);

		$tMap->addColumn('DESACT', 'Desact', 'string', CreoleTypes::VARCHAR, false, null);

		$tMap->addColumn('RESACT', 'Resact', 'string', CreoleTypes::VARCHAR, false, 250);

		$tMap->addColumn('ESTATU', 'Estatu', 'string', CreoleTypes::VARCHAR, false, null);

		$tMap->addForeignKey('CCACTIVI_ID', 'CcactiviId', 'int', CreoleTypes::INTEGER, 'ccactivi', 'ID', true, null);

		$tMap->addForeignKey('CCCLAACT_ID', 'CcclaactId', 'int', CreoleTypes::INTEGER, 'ccclaact', 'ID', true, null);

		$tMap->addForeignKey('CCANALIS_ID', 'CcanalisId', 'int', CreoleTypes::INTEGER, 'ccanalis', 'ID', true, null);

		$tMap->addForeignKey('CCCREDIT_ID', 'CccreditId', 'int', CreoleTypes::INTEGER, 'cccredit', 'ID', true, null);

	} 
} 