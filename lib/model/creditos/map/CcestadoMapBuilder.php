<?php



class CcestadoMapBuilder {

	
	const CLASS_NAME = 'lib.model.creditos.map.CcestadoMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('ccestado');
		$tMap->setPhpName('Ccestado');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('ccestado_SEQ');

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

		$tMap->addColumn('NOMEST', 'Nomest', 'string', CreoleTypes::VARCHAR, false, null);

		$tMap->addColumn('NOMCOO', 'Nomcoo', 'string', CreoleTypes::VARCHAR, false, null);

		$tMap->addColumn('TELCOO', 'Telcoo', 'string', CreoleTypes::VARCHAR, false, null);

		$tMap->addColumn('CODARETEL', 'Codaretel', 'string', CreoleTypes::VARCHAR, false, null);

		$tMap->addColumn('DIROFI', 'Dirofi', 'string', CreoleTypes::VARCHAR, false, null);

		$tMap->addColumn('CEDCOO', 'Cedcoo', 'string', CreoleTypes::VARCHAR, false, 12);

		$tMap->addForeignKey('CCPERPRE_ID', 'CcperpreId', 'int', CreoleTypes::INTEGER, 'ccperpre', 'ID', true, null);

	} 
} 