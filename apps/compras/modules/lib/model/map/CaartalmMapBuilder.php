<?php



class CaartalmMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.CaartalmMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('caartalm');
		$tMap->setPhpName('Caartalm');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('caartalm_SEQ');

		$tMap->addColumn('CODALM', 'Codalm', 'string', CreoleTypes::VARCHAR, true, 20);

		$tMap->addColumn('CODART', 'Codart', 'string', CreoleTypes::VARCHAR, true, 20);

		$tMap->addColumn('CODUBI', 'Codubi', 'string', CreoleTypes::VARCHAR, false, 20);

		$tMap->addColumn('EXIMIN', 'Eximin', 'double', CreoleTypes::NUMERIC, false, 14);

		$tMap->addColumn('EXIMAX', 'Eximax', 'double', CreoleTypes::NUMERIC, false, 14);

		$tMap->addColumn('EXIACT', 'Exiact', 'double', CreoleTypes::NUMERIC, false, 14);

		$tMap->addColumn('PTOREO', 'Ptoreo', 'double', CreoleTypes::NUMERIC, false, 14);

		$tMap->addColumn('PEDMIN', 'Pedmin', 'double', CreoleTypes::NUMERIC, false, 14);

		$tMap->addColumn('PEDMAX', 'Pedmax', 'double', CreoleTypes::NUMERIC, false, 14);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 
