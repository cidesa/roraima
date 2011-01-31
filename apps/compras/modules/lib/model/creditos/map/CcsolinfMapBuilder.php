<?php



class CcsolinfMapBuilder {

	
	const CLASS_NAME = 'lib.model.creditos.map.CcsolinfMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('ccsolinf');
		$tMap->setPhpName('Ccsolinf');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('ccsolinf_SEQ');

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

		$tMap->addColumn('NOMSOLINF', 'Nomsolinf', 'string', CreoleTypes::VARCHAR, false, null);

		$tMap->addColumn('OBSSOLINF', 'Obssolinf', 'string', CreoleTypes::VARCHAR, false, null);

		$tMap->addColumn('FECSOLINF', 'Fecsolinf', 'int', CreoleTypes::DATE, false, null);

		$tMap->addForeignKey('CCGERENC_ID', 'CcgerencId', 'int', CreoleTypes::INTEGER, 'ccgerenc', 'ID', true, null);

		$tMap->addForeignKey('CCANALIS_ID', 'CcanalisId', 'int', CreoleTypes::INTEGER, 'ccanalis', 'ID', true, null);

		$tMap->addForeignKey('CCCLAINF_ID', 'CcclainfId', 'int', CreoleTypes::INTEGER, 'ccclainf', 'ID', true, null);

	} 
} 