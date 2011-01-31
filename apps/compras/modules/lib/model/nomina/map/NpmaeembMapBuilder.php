<?php



class NpmaeembMapBuilder {

	
	const CLASS_NAME = 'lib.model.nomina.map.NpmaeembMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('npmaeemb');
		$tMap->setPhpName('Npmaeemb');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('npmaeemb_SEQ');

		$tMap->addColumn('CODEMB', 'Codemb', 'string', CreoleTypes::VARCHAR, true, 4);

		$tMap->addColumn('DESEMB', 'Desemb', 'string', CreoleTypes::VARCHAR, true, 200);

		$tMap->addColumn('CODJUZ', 'Codjuz', 'string', CreoleTypes::VARCHAR, true, 4);

		$tMap->addColumn('CODEMP', 'Codemp', 'string', CreoleTypes::VARCHAR, true, 16);

		$tMap->addColumn('FECREGEMB', 'Fecregemb', 'int', CreoleTypes::DATE, true, null);

		$tMap->addColumn('CODCONEMB', 'Codconemb', 'string', CreoleTypes::VARCHAR, true, 3);

		$tMap->addColumn('TIPDIS', 'Tipdis', 'string', CreoleTypes::VARCHAR, true, 1);

		$tMap->addColumn('TIPCAL', 'Tipcal', 'string', CreoleTypes::VARCHAR, true, 1);

		$tMap->addColumn('MONTOTEMB', 'Montotemb', 'double', CreoleTypes::NUMERIC, false, 14);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 