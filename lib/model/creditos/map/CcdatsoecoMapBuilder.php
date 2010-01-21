<?php



class CcdatsoecoMapBuilder {

	
	const CLASS_NAME = 'lib.model.creditos.map.CcdatsoecoMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('ccdatsoeco');
		$tMap->setPhpName('Ccdatsoeco');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('ccdatsoeco_SEQ');

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

		$tMap->addColumn('ESPTIPVI', 'Esptipvi', 'string', CreoleTypes::VARCHAR, false, 255);

		$tMap->addColumn('DORMIT', 'Dormit', 'string', CreoleTypes::VARCHAR, false, 4);

		$tMap->addColumn('BANOS', 'Banos', 'string', CreoleTypes::VARCHAR, false, 4);

		$tMap->addColumn('SALA', 'Sala', 'string', CreoleTypes::VARCHAR, false, 4);

		$tMap->addColumn('COCINA', 'Cocina', 'string', CreoleTypes::VARCHAR, false, 4);

		$tMap->addColumn('LAVADE', 'Lavade', 'string', CreoleTypes::VARCHAR, false, 4);

		$tMap->addColumn('CLOSET', 'Closet', 'string', CreoleTypes::VARCHAR, false, 4);

		$tMap->addColumn('JARDIN', 'Jardin', 'string', CreoleTypes::VARCHAR, false, 4);

		$tMap->addColumn('ESTACIO', 'Estacio', 'string', CreoleTypes::VARCHAR, false, 4);

		$tMap->addColumn('EXPLIESTRUC', 'Expliestruc', 'string', CreoleTypes::VARCHAR, false, 255);

		$tMap->addColumn('TECHOS', 'Techos', 'string', CreoleTypes::VARCHAR, false, 255);

		$tMap->addColumn('PAREDES', 'Paredes', 'string', CreoleTypes::VARCHAR, false, 255);

		$tMap->addColumn('PISO', 'Piso', 'string', CreoleTypes::VARCHAR, false, 255);

		$tMap->addColumn('REVEST', 'Revest', 'string', CreoleTypes::VARCHAR, false, 255);

		$tMap->addColumn('CONSER', 'Conser', 'string', CreoleTypes::VARCHAR, false, 255);

		$tMap->addColumn('EDAD', 'Edad', 'string', CreoleTypes::VARCHAR, false, 100);

		$tMap->addColumn('ZONA', 'Zona', 'string', CreoleTypes::VARCHAR, false, 255);

		$tMap->addColumn('DIST', 'Dist', 'string', CreoleTypes::VARCHAR, false, 100);

		$tMap->addColumn('ACCESO', 'Acceso', 'string', CreoleTypes::VARCHAR, false, 255);

		$tMap->addColumn('OBSERV', 'Observ', 'string', CreoleTypes::VARCHAR, false, 255);

		$tMap->addColumn('LINNORTE', 'Linnorte', 'string', CreoleTypes::VARCHAR, false, 100);

		$tMap->addColumn('LINSUR', 'Linsur', 'string', CreoleTypes::VARCHAR, false, 100);

		$tMap->addColumn('LINESTE', 'Lineste', 'string', CreoleTypes::VARCHAR, false, 100);

		$tMap->addColumn('LINOESTE', 'Linoeste', 'string', CreoleTypes::VARCHAR, false, 100);

		$tMap->addColumn('SUPERFI', 'Superfi', 'string', CreoleTypes::VARCHAR, false, 100);

		$tMap->addColumn('TRASOC', 'Trasoc', 'string', CreoleTypes::VARCHAR, false, 255);

		$tMap->addColumn('ANALISIS', 'Analisis', 'string', CreoleTypes::VARCHAR, false, 1000);

		$tMap->addColumn('RECOMEN', 'Recomen', 'string', CreoleTypes::VARCHAR, false, 255);

		$tMap->addColumn('RESPON', 'Respon', 'string', CreoleTypes::VARCHAR, false, 1);

		$tMap->addColumn('ASIGNA', 'Asigna', 'double', CreoleTypes::DOUBLE, false, null);

		$tMap->addColumn('DEDUCC', 'Deducc', 'double', CreoleTypes::DOUBLE, false, null);

		$tMap->addColumn('ASIGCON', 'Asigcon', 'double', CreoleTypes::DOUBLE, false, null);

		$tMap->addColumn('DEDUCON', 'Deducon', 'double', CreoleTypes::DOUBLE, false, null);

		$tMap->addColumn('GASFAM', 'Gasfam', 'double', CreoleTypes::DOUBLE, false, null);

		$tMap->addColumn('CAPPAGO', 'Cappago', 'double', CreoleTypes::DOUBLE, false, null);

		$tMap->addForeignKey('CCORIMATPRI_ID', 'CcorimatpriId', 'int', CreoleTypes::INTEGER, 'ccorimatpri', 'ID', false, null);

		$tMap->addForeignKey('CCACTECO_ID', 'CcactecoId', 'int', CreoleTypes::INTEGER, 'ccacteco', 'ID', false, null);

		$tMap->addForeignKey('CCESTRUC_ID', 'CcestrucId', 'int', CreoleTypes::INTEGER, 'ccestruc', 'ID', false, null);

		$tMap->addForeignKey('CCRIEZONA_ID', 'CcriezonaId', 'int', CreoleTypes::INTEGER, 'ccriezona', 'ID', false, null);

		$tMap->addForeignKey('CCSOLICI_ID', 'CcsoliciId', 'int', CreoleTypes::INTEGER, 'ccsolici', 'ID', true, null);

	} 
} 