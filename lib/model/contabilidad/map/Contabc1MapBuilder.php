<?php



class Contabc1MapBuilder {

	
	const CLASS_NAME = 'lib.model.contabilidad.map.Contabc1MapBuilder';

	
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

		$tMap = $this->dbMap->addTable('contabc1');
		$tMap->setPhpName('Contabc1');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('contabc1_SEQ');

		$tMap->addForeignKey('NUMCOM', 'Numcom', 'string', CreoleTypes::VARCHAR, 'contabc', 'NUMCOM', true, 8);

		$tMap->addColumn('FECCOM', 'Feccom', 'int', CreoleTypes::DATE, true, null);

		$tMap->addColumn('DEBCRE', 'Debcre', 'string', CreoleTypes::VARCHAR, true, 1);

		$tMap->addForeignKey('CODCTA', 'Codcta', 'string', CreoleTypes::VARCHAR, 'contabb', 'CODCTA', true, 32);

		$tMap->addColumn('NUMASI', 'Numasi', 'double', CreoleTypes::NUMERIC, false, 3);

		$tMap->addColumn('REFASI', 'Refasi', 'string', CreoleTypes::VARCHAR, false, 8);

		$tMap->addColumn('DESASI', 'Desasi', 'string', CreoleTypes::VARCHAR, false, 250);

		$tMap->addColumn('MONASI', 'Monasi', 'double', CreoleTypes::NUMERIC, false, 14);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 