<?php



class AtdenunciasMapBuilder {

	
	const CLASS_NAME = 'lib.model.ciudadanos.map.AtdenunciasMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('atdenuncias');
		$tMap->setPhpName('Atdenuncias');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('atdenuncias_SEQ');

		$tMap->addColumn('ATSOLICI', 'Atsolici', 'string', CreoleTypes::VARCHAR, true, 30);

		$tMap->addColumn('DESDEN', 'Desden', 'string', CreoleTypes::VARCHAR, true, 30);

		$tMap->addColumn('TELEFONO', 'Telefono', 'string', CreoleTypes::VARCHAR, false, 60);

		$tMap->addForeignKey('ATUNIDADES_ID', 'AtunidadesId', 'int', CreoleTypes::INTEGER, 'atunidades', 'ID', false, null);

		$tMap->addColumn('PERSONA', 'Persona', 'string', CreoleTypes::VARCHAR, false, 30);

		$tMap->addColumn('STATUS', 'Status', 'string', CreoleTypes::VARCHAR, false, 1);

		$tMap->addColumn('RESPUESTA', 'Respuesta', 'string', CreoleTypes::VARCHAR, false, 100);

		$tMap->addColumn('FECHAA', 'Fechaa', 'int', CreoleTypes::DATE, false, null);

		$tMap->addColumn('FECHAR', 'Fechar', 'int', CreoleTypes::DATE, false, null);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 