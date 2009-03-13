<?php



class AtreclamosMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.AtreclamosMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('atreclamos');
		$tMap->setPhpName('Atreclamos');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('atreclamos_SEQ');

		$tMap->addColumn('ATSOLICI', 'Atsolici', 'string', CreoleTypes::VARCHAR, true, 50);

		$tMap->addColumn('DESREC', 'Desrec', 'string', CreoleTypes::VARCHAR, true, 30);

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