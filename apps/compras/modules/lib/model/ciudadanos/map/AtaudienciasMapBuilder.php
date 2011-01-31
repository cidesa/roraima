<?php



class AtaudienciasMapBuilder {

	
	const CLASS_NAME = 'lib.model.ciudadanos.map.AtaudienciasMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('ataudiencias');
		$tMap->setPhpName('Ataudiencias');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('ataudiencias_SEQ');

		$tMap->addForeignKey('ATCIUDADANO_ID', 'AtciudadanoId', 'int', CreoleTypes::INTEGER, 'atciudadano', 'ID', false, null);

		$tMap->addColumn('MOTAUD', 'Motaud', 'string', CreoleTypes::VARCHAR, true, 30);

		$tMap->addForeignKey('ATUNIDADES_ID', 'AtunidadesId', 'int', CreoleTypes::INTEGER, 'atunidades', 'ID', false, null);

		$tMap->addColumn('PERSONA', 'Persona', 'string', CreoleTypes::VARCHAR, false, 30);

		$tMap->addColumn('STATUS', 'Status', 'string', CreoleTypes::VARCHAR, false, 1);

		$tMap->addColumn('FECHA', 'Fecha', 'int', CreoleTypes::DATE, false, null);

		$tMap->addColumn('FECHAR', 'Fechar', 'int', CreoleTypes::DATE, false, null);

		$tMap->addColumn('FECHAA', 'Fechaa', 'int', CreoleTypes::DATE, false, null);

		$tMap->addColumn('LUGAR', 'Lugar', 'string', CreoleTypes::VARCHAR, false, 100);

		$tMap->addColumn('OBSERVACION', 'Observacion', 'string', CreoleTypes::VARCHAR, false, 30);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 