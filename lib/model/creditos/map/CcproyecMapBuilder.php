<?php



class CcproyecMapBuilder {

	
	const CLASS_NAME = 'lib.model.creditos.map.CcproyecMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('ccproyec');
		$tMap->setPhpName('Ccproyec');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('ccproyec_SEQ');

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

		$tMap->addColumn('NOMPRO', 'Nompro', 'string', CreoleTypes::VARCHAR, false, 50);

		$tMap->addColumn('RESPRO', 'Respro', 'string', CreoleTypes::VARCHAR, false, 500);

		$tMap->addColumn('EMPDIRGEN', 'Empdirgen', 'int', CreoleTypes::INTEGER, false, null);

		$tMap->addColumn('EMPINDGEN', 'Empindgen', 'int', CreoleTypes::INTEGER, false, null);

		$tMap->addColumn('AREGEO', 'Aregeo', 'string', CreoleTypes::VARCHAR, false, 100);

		$tMap->addColumn('MONAPO', 'Monapo', 'double', CreoleTypes::NUMERIC, false, 14);

		$tMap->addColumn('DESACTECO', 'Desacteco', 'string', CreoleTypes::VARCHAR, false, 100);

		$tMap->addColumn('INTROD', 'Introd', 'string', CreoleTypes::VARCHAR, false, null);

		$tMap->addColumn('RESUME', 'Resume', 'string', CreoleTypes::VARCHAR, false, null);

		$tMap->addColumn('ESTMER', 'Estmer', 'string', CreoleTypes::VARCHAR, false, null);

		$tMap->addColumn('TAMLOC', 'Tamloc', 'string', CreoleTypes::VARCHAR, false, null);

		$tMap->addColumn('INGPRO', 'Ingpro', 'string', CreoleTypes::VARCHAR, false, null);

		$tMap->addColumn('APOSOC', 'Aposoc', 'string', CreoleTypes::VARCHAR, false, null);

		$tMap->addColumn('INVFIN', 'Invfin', 'string', CreoleTypes::VARCHAR, false, null);

		$tMap->addColumn('PROFIN', 'Profin', 'string', CreoleTypes::VARCHAR, false, null);

		$tMap->addColumn('ANAFIN', 'Anafin', 'string', CreoleTypes::VARCHAR, false, null);

		$tMap->addColumn('ANEXOS', 'Anexos', 'string', CreoleTypes::VARCHAR, false, null);

		$tMap->addColumn('RECOME', 'Recome', 'string', CreoleTypes::VARCHAR, false, null);

		$tMap->addColumn('OBSERV', 'Observ', 'string', CreoleTypes::VARCHAR, false, null);

		$tMap->addForeignKey('CCACTECO_ID', 'CcactecoId', 'int', CreoleTypes::INTEGER, 'ccacteco', 'ID', false, null);

		$tMap->addForeignKey('CCSOLICI_ID', 'CcsoliciId', 'int', CreoleTypes::INTEGER, 'ccsolici', 'ID', true, null);

	} 
} 