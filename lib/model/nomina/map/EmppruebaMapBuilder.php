<?php



class EmppruebaMapBuilder {

	
	const CLASS_NAME = 'lib.model.nomina.map.EmppruebaMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('empprueba');
		$tMap->setPhpName('Empprueba');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('empprueba_SEQ');

		$tMap->addColumn('CEDULA', 'Cedula', 'string', CreoleTypes::VARCHAR, true, 10);

		$tMap->addColumn('NOMBRE', 'Nombre', 'string', CreoleTypes::VARCHAR, true, 100);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 