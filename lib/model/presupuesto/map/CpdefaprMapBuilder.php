<?php



class CpdefaprMapBuilder {

	
	const CLASS_NAME = 'lib.model.presupuesto.map.CpdefaprMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('cpdefapr');
		$tMap->setPhpName('Cpdefapr');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('cpdefapr_SEQ');

		$tMap->addColumn('STACON', 'Stacon', 'string', CreoleTypes::VARCHAR, false, 50);

		$tMap->addColumn('ABRSTACON', 'Abrstacon', 'string', CreoleTypes::VARCHAR, false, 5);

		$tMap->addColumn('STAGOB', 'Stagob', 'string', CreoleTypes::VARCHAR, false, 50);

		$tMap->addColumn('ABRSTAGOB', 'Abrstagob', 'string', CreoleTypes::VARCHAR, false, 5);

		$tMap->addColumn('STAPRE', 'Stapre', 'string', CreoleTypes::VARCHAR, false, 50);

		$tMap->addColumn('ABRSTAPRE', 'Abrstapre', 'string', CreoleTypes::VARCHAR, false, 5);

		$tMap->addColumn('STANIV4', 'Staniv4', 'string', CreoleTypes::VARCHAR, false, 50);

		$tMap->addColumn('ABRSTANIV4', 'Abrstaniv4', 'string', CreoleTypes::VARCHAR, false, 5);

		$tMap->addColumn('STANIV5', 'Staniv5', 'string', CreoleTypes::VARCHAR, false, 50);

		$tMap->addColumn('ABRSTANIV5', 'Abrstaniv5', 'string', CreoleTypes::VARCHAR, false, 5);

		$tMap->addColumn('STANIV6', 'Staniv6', 'string', CreoleTypes::VARCHAR, false, 50);

		$tMap->addColumn('ABRSTANIV6', 'Abrstaniv6', 'string', CreoleTypes::VARCHAR, false, 5);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 