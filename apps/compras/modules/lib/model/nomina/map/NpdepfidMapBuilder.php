<?php



class NpdepfidMapBuilder {

	
	const CLASS_NAME = 'lib.model.nomina.map.NpdepfidMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('npdepfid');
		$tMap->setPhpName('Npdepfid');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('npdepfid_SEQ');

		$tMap->addColumn('CODEMP', 'Codemp', 'string', CreoleTypes::VARCHAR, false, 16);

		$tMap->addColumn('FECNOM', 'Fecnom', 'int', CreoleTypes::DATE, false, null);

		$tMap->addColumn('FECING', 'Fecing', 'int', CreoleTypes::DATE, false, null);

		$tMap->addColumn('DEVENGADO', 'Devengado', 'double', CreoleTypes::NUMERIC, false, 14);

		$tMap->addColumn('DIASDEPOSITO', 'Diasdeposito', 'double', CreoleTypes::NUMERIC, false, 14);

		$tMap->addColumn('FIDEICOMISO', 'Fideicomiso', 'double', CreoleTypes::NUMERIC, false, 14);

		$tMap->addColumn('CODCAR', 'Codcar', 'string', CreoleTypes::VARCHAR, false, 16);

		$tMap->addColumn('CODNOM', 'Codnom', 'string', CreoleTypes::VARCHAR, false, 16);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 