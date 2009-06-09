<?php



class AtayudasMapBuilder {

	
	const CLASS_NAME = 'lib.model.ciudadanos.map.AtayudasMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('atayudas');
		$tMap->setPhpName('Atayudas');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('atayudas_SEQ');

		$tMap->addColumn('NROEXP', 'Nroexp', 'string', CreoleTypes::VARCHAR, false, 50);

		$tMap->addForeignKey('REFDOC', 'Refdoc', 'int', CreoleTypes::INTEGER, 'caordcom', 'ID', false, null);

		$tMap->addColumn('PARENTESCO', 'Parentesco', 'int', CreoleTypes::INTEGER, false, null);

		$tMap->addColumn('PRIAYU', 'Priayu', 'int', CreoleTypes::INTEGER, true, null);

		$tMap->addForeignKey('ATPRIAYU_ID', 'AtpriayuId', 'int', CreoleTypes::INTEGER, 'atpriayu', 'ID', false, null);

		$tMap->addForeignKey('ATSOLICI', 'Atsolici', 'int', CreoleTypes::INTEGER, 'atciudadano', 'ID', true, null);

		$tMap->addForeignKey('ATBENEFI', 'Atbenefi', 'int', CreoleTypes::INTEGER, 'atciudadano', 'ID', true, null);

		$tMap->addForeignKey('ATTIPAYU_ID', 'AttipayuId', 'int', CreoleTypes::INTEGER, 'attipayu', 'ID', false, null);

		$tMap->addForeignKey('ATRUBROS_ID', 'AtrubrosId', 'int', CreoleTypes::INTEGER, 'atrubros', 'ID', false, null);

		$tMap->addForeignKey('ATESTAYU_ID', 'AtestayuId', 'int', CreoleTypes::INTEGER, 'atestayu', 'ID', false, null);

		$tMap->addForeignKey('ATTRASOC_ID', 'AttrasocId', 'int', CreoleTypes::INTEGER, 'attrasoc', 'ID', false, null);

		$tMap->addForeignKey('ATPROVEE_ID', 'AtproveeId', 'int', CreoleTypes::INTEGER, 'atprovee', 'ID', false, null);

		$tMap->addColumn('PROAYU', 'Proayu', 'string', CreoleTypes::VARCHAR, false, 100);

		$tMap->addColumn('NROOFI', 'Nroofi', 'string', CreoleTypes::VARCHAR, false, 50);

		$tMap->addColumn('DESAYU', 'Desayu', 'string', CreoleTypes::VARCHAR, false, 50);

		$tMap->addColumn('MOTAYU', 'Motayu', 'string', CreoleTypes::VARCHAR, false, 50);

		$tMap->addColumn('CREATED_AT', 'CreatedAt', 'int', CreoleTypes::TIMESTAMP, false, null);

		$tMap->addColumn('UPDATED_AT', 'UpdatedAt', 'int', CreoleTypes::TIMESTAMP, false, null);

		$tMap->addColumn('USUCRE', 'Usucre', 'string', CreoleTypes::VARCHAR, false, 50);

		$tMap->addColumn('USUMOD', 'Usumod', 'string', CreoleTypes::VARCHAR, false, 50);

		$tMap->addColumn('CODPRE', 'Codpre', 'string', CreoleTypes::VARCHAR, false, 50);

		$tMap->addColumn('DETAYU', 'Detayu', 'string', CreoleTypes::VARCHAR, false, 1000);

		$tMap->addColumn('MONAYU', 'Monayu', 'double', CreoleTypes::NUMERIC, false, 14);

		$tMap->addColumn('MONAPR', 'Monapr', 'double', CreoleTypes::NUMERIC, false, 14);

		$tMap->addForeignKey('ATMEDICO_ID', 'AtmedicoId', 'int', CreoleTypes::INTEGER, 'atmedico', 'ID', false, null);

		$tMap->addColumn('RESPAT', 'Respat', 'string', CreoleTypes::VARCHAR, false, 5000);

		$tMap->addColumn('INFMED', 'Infmed', 'string', CreoleTypes::VARCHAR, false, 5000);

		$tMap->addColumn('OBSMED', 'Obsmed', 'string', CreoleTypes::VARCHAR, false, 5000);

		$tMap->addColumn('FECDIASOC', 'Fecdiasoc', 'int', CreoleTypes::DATE, false, null);

		$tMap->addColumn('USUDIASOC', 'Usudiasoc', 'string', CreoleTypes::VARCHAR, false, 100);

		$tMap->addColumn('RESDIASOC', 'Resdiasoc', 'string', CreoleTypes::VARCHAR, false, 5000);

		$tMap->addColumn('FECVISDOC', 'Fecvisdoc', 'int', CreoleTypes::DATE, false, null);

		$tMap->addColumn('USUVISDOC', 'Usuvisdoc', 'string', CreoleTypes::VARCHAR, false, 100);

		$tMap->addColumn('RESVISDOC', 'Resvisdoc', 'string', CreoleTypes::VARCHAR, false, 5000);

		$tMap->addColumn('FECSOL', 'Fecsol', 'int', CreoleTypes::DATE, false, null);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 