<?php



class CcbarinfMapBuilder {

	
	const CLASS_NAME = 'lib.model.creditos.map.CcbarinfMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('ccbarinf');
		$tMap->setPhpName('Ccbarinf');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('ccbarinf_SEQ');

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

		$tMap->addColumn('PUNTUA', 'Puntua', 'double', CreoleTypes::DOUBLE, true, null);

		$tMap->addColumn('PONDER', 'Ponder', 'double', CreoleTypes::DOUBLE, true, null);

		$tMap->addColumn('RESULT', 'Result', 'double', CreoleTypes::DOUBLE, true, null);

		$tMap->addForeignKey('CCINFORM_ID', 'CcinformId', 'int', CreoleTypes::INTEGER, 'ccinform', 'ID', true, null);

		$tMap->addForeignKey('CCTITULO_ID', 'CctituloId', 'int', CreoleTypes::INTEGER, 'cctitulo', 'ID', true, null);

	} 
} 