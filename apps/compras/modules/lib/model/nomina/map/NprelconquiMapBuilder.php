<?php



class NprelconquiMapBuilder {

	
	const CLASS_NAME = 'lib.model.nomina.map.NprelconquiMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('nprelconqui');
		$tMap->setPhpName('Nprelconqui');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('nprelconqui_SEQ');

		$tMap->addColumn('CODEMP', 'Codemp', 'string', CreoleTypes::VARCHAR, false, 16);

		$tMap->addColumn('CODNOM', 'Codnom', 'string', CreoleTypes::VARCHAR, false, 3);

		$tMap->addColumn('CODCON', 'Codcon', 'string', CreoleTypes::VARCHAR, false, 3);

		$tMap->addColumn('CANTIDAD', 'Cantidad', 'double', CreoleTypes::NUMERIC, false, 14);

		$tMap->addColumn('MONTO', 'Monto', 'double', CreoleTypes::NUMERIC, false, 14);

		$tMap->addColumn('FECINI', 'Fecini', 'int', CreoleTypes::DATE, false, null);

		$tMap->addColumn('FECEXP', 'Fecexp', 'int', CreoleTypes::DATE, false, null);

		$tMap->addColumn('CALCON', 'Calcon', 'string', CreoleTypes::VARCHAR, false, 1);

		$tMap->addColumn('ACTCON', 'Actcon', 'string', CreoleTypes::VARCHAR, false, 1);

		$tMap->addColumn('NOMSUS', 'Nomsus', 'string', CreoleTypes::VARCHAR, false, 50);

		$tMap->addColumn('CODPRE', 'Codpre', 'string', CreoleTypes::VARCHAR, false, 32);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 