<?php



class FcrangosrecMapBuilder {

	
	const CLASS_NAME = 'lib.model.hacienda.map.FcrangosrecMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('fcrangosrec');
		$tMap->setPhpName('Fcrangosrec');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('fcrangosrec_SEQ');

		$tMap->addColumn('CODREC', 'Codrec', 'string', CreoleTypes::VARCHAR, false, 4);

		$tMap->addColumn('DIASDESDE', 'Diasdesde', 'double', CreoleTypes::NUMERIC, false, null);

		$tMap->addColumn('DIASHASTA', 'Diashasta', 'double', CreoleTypes::NUMERIC, false, null);

		$tMap->addColumn('VALOR', 'Valor', 'double', CreoleTypes::NUMERIC, false, null);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 