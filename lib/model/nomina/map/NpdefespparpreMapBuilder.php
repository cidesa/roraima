<?php



class NpdefespparpreMapBuilder {

	
	const CLASS_NAME = 'lib.model.nomina.map.NpdefespparpreMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('npdefespparpre');
		$tMap->setPhpName('Npdefespparpre');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('npdefespparpre_SEQ');

		$tMap->addColumn('CODNOM', 'Codnom', 'string', CreoleTypes::VARCHAR, true, 3);

		$tMap->addColumn('NUMDIAMES', 'Numdiames', 'int', CreoleTypes::INTEGER, true, null);

		$tMap->addColumn('NUMDIAMAXANO', 'Numdiamaxano', 'int', CreoleTypes::INTEGER, true, null);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 