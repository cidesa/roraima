<?php



class NpvacdiaferMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.NpvacdiaferMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('npvacdiafer');
		$tMap->setPhpName('Npvacdiafer');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('npvacdiafer_SEQ');

		$tMap->addColumn('DIA', 'Dia', 'double', CreoleTypes::NUMERIC, false, 2);

		$tMap->addColumn('MES', 'Mes', 'double', CreoleTypes::NUMERIC, false, 2);

		$tMap->addColumn('DESCRIPCION', 'Descripcion', 'string', CreoleTypes::VARCHAR, false, 250);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 