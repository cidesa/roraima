<?php



class NpcalconMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.NpcalconMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('npcalcon');
		$tMap->setPhpName('Npcalcon');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('npcalcon_SEQ');

		$tMap->addColumn('CODCON', 'Codcon', 'string', CreoleTypes::VARCHAR, true, 3);

		$tMap->addColumn('CODNOM', 'Codnom', 'string', CreoleTypes::VARCHAR, true, 3);

		$tMap->addColumn('NUMCON', 'Numcon', 'string', CreoleTypes::VARCHAR, true, 3);

		$tMap->addColumn('CAMPO', 'Campo', 'string', CreoleTypes::VARCHAR, false, 20);

		$tMap->addColumn('OPERADOR', 'Operador', 'string', CreoleTypes::VARCHAR, false, 2);

		$tMap->addColumn('VALOR', 'Valor', 'string', CreoleTypes::VARCHAR, false, 20);

		$tMap->addColumn('CONFOR', 'Confor', 'string', CreoleTypes::VARCHAR, true, 1000);

		$tMap->addColumn('TIPCAL', 'Tipcal', 'string', CreoleTypes::VARCHAR, true, 1);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 