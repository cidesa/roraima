<?php



class FacorrelatMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.FacorrelatMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('facorrelat');
		$tMap->setPhpName('Facorrelat');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('facorrelat_SEQ');

		$tMap->addColumn('CORPRE', 'Corpre', 'double', CreoleTypes::NUMERIC, true, 8);

		$tMap->addColumn('CORPED', 'Corped', 'double', CreoleTypes::NUMERIC, true, 8);

		$tMap->addColumn('CORFAC', 'Corfac', 'double', CreoleTypes::NUMERIC, true, 8);

		$tMap->addColumn('CORNOT', 'Cornot', 'double', CreoleTypes::NUMERIC, true, 8);

		$tMap->addColumn('CORDPH', 'Cordph', 'double', CreoleTypes::NUMERIC, true, 8);

		$tMap->addColumn('CORDEV', 'Cordev', 'double', CreoleTypes::NUMERIC, true, 8);

		$tMap->addColumn('CORAJU', 'Coraju', 'double', CreoleTypes::NUMERIC, true, 8);

		$tMap->addColumn('CODPRO', 'Codpro', 'double', CreoleTypes::NUMERIC, false, 8);

		$tMap->addColumn('PROFORM', 'Proform', 'string', CreoleTypes::VARCHAR, false, 1);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 
