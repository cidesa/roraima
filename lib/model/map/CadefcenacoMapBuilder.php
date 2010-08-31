<?php



class CadefcenacoMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.CadefcenacoMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('cadefcenaco');
		$tMap->setPhpName('Cadefcenaco');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('cadefcenaco_SEQ');

		$tMap->addColumn('CODCENACO', 'Codcenaco', 'string', CreoleTypes::VARCHAR, true, 4);

		$tMap->addColumn('DESCENACO', 'Descenaco', 'string', CreoleTypes::VARCHAR, true, 250);

		$tMap->addForeignKey('CODPAI', 'Codpai', 'string', CreoleTypes::VARCHAR, 'ocpais', 'CODPAI', false, 4);

		$tMap->addForeignKey('CODEDO', 'Codedo', 'string', CreoleTypes::VARCHAR, 'ocestado', 'CODEDO', false, 4);

		$tMap->addForeignKey('CODCIU', 'Codciu', 'string', CreoleTypes::VARCHAR, 'occiudad', 'CODCIU', false, 4);

		$tMap->addForeignKey('CODMUN', 'Codmun', 'string', CreoleTypes::VARCHAR, 'ocmunici', 'CODMUN', false, 4);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 