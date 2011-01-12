<?php



class CcestatuMapBuilder {

	
	const CLASS_NAME = 'lib.model.creditos.map.CcestatuMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('ccestatu');
		$tMap->setPhpName('Ccestatu');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('ccestatu_SEQ');

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

		$tMap->addColumn('ALIAS', 'Alias', 'string', CreoleTypes::VARCHAR, false, null);

		$tMap->addColumn('NOMBRE', 'Nombre', 'string', CreoleTypes::VARCHAR, false, null);

		$tMap->addColumn('MAXDIA', 'Maxdia', 'int', CreoleTypes::INTEGER, false, null);

		$tMap->addColumn('COMENTARIO', 'Comentario', 'string', CreoleTypes::VARCHAR, false, null);

		$tMap->addColumn('MOVCONT', 'Movcont', 'string', CreoleTypes::VARCHAR, false, 1);

		$tMap->addColumn('ENRUTA', 'Enruta', 'string', CreoleTypes::VARCHAR, false, 1);

		$tMap->addColumn('ORDEN', 'Orden', 'int', CreoleTypes::INTEGER, false, null);

		$tMap->addForeignKey('CCGERENC_ID', 'CcgerencId', 'int', CreoleTypes::INTEGER, 'ccgerenc', 'ID', true, null);

	} 
} 