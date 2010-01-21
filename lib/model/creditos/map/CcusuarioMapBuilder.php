<?php



class CcusuarioMapBuilder {

	
	const CLASS_NAME = 'lib.model.creditos.map.CcusuarioMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('ccusuario');
		$tMap->setPhpName('Ccusuario');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('ccusuario_SEQ');

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

		$tMap->addColumn('NOMUSU', 'Nomusu', 'string', CreoleTypes::VARCHAR, false, 50);

		$tMap->addColumn('CONTRAS', 'Contras', 'string', CreoleTypes::VARCHAR, false, 50);

		$tMap->addColumn('CEDUSU', 'Cedusu', 'string', CreoleTypes::VARCHAR, true, 15);

		$tMap->addColumn('LOGIN', 'Login', 'string', CreoleTypes::VARCHAR, true, 50);

		$tMap->addForeignKey('CCBENEFI_ID', 'CcbenefiId', 'int', CreoleTypes::INTEGER, 'ccbenefi', 'ID', true, null);

		$tMap->addForeignKey('CCPERPRE_ID', 'CcperpreId', 'int', CreoleTypes::INTEGER, 'ccperpre', 'ID', true, null);

	} 
} 