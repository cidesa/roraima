<?php



class CcbitusuMapBuilder {

	
	const CLASS_NAME = 'lib.model.creditos.map.CcbitusuMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('ccbitusu');
		$tMap->setPhpName('Ccbitusu');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('ccbitusu_SEQ');

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

		$tMap->addColumn('USUARIO', 'Usuario', 'string', CreoleTypes::VARCHAR, true, 50);

		$tMap->addColumn('FORMA', 'Forma', 'string', CreoleTypes::VARCHAR, true, 50);

		$tMap->addColumn('FECHA', 'Fecha', 'int', CreoleTypes::DATE, true, null);

		$tMap->addColumn('REGISTRO', 'Registro', 'int', CreoleTypes::INTEGER, true, null);

		$tMap->addColumn('ACCION', 'Accion', 'string', CreoleTypes::VARCHAR, false, 50);

		$tMap->addColumn('HORA', 'Hora', 'int', CreoleTypes::TIME, false, null);

	} 
} 