<?php



class CcbaremoMapBuilder {

	
	const CLASS_NAME = 'lib.model.creditos.map.CcbaremoMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('ccbaremo');
		$tMap->setPhpName('Ccbaremo');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('ccbaremo_SEQ');

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

		$tMap->addColumn('NOMBAR', 'Nombar', 'string', CreoleTypes::VARCHAR, false, null);

		$tMap->addColumn('ORDEN', 'Orden', 'int', CreoleTypes::INTEGER, false, null);

		$tMap->addColumn('PUNTUA', 'Puntua', 'double', CreoleTypes::DOUBLE, false, null);

		$tMap->addColumn('PONDER', 'Ponder', 'double', CreoleTypes::DOUBLE, false, null);

		$tMap->addColumn('RESULT', 'Result', 'double', CreoleTypes::DOUBLE, false, null);

		$tMap->addForeignKey('CCGERENC_ID', 'CcgerencId', 'int', CreoleTypes::INTEGER, 'ccgerenc', 'ID', true, null);

		$tMap->addForeignKey('CCTITULO_ID', 'CctituloId', 'int', CreoleTypes::INTEGER, 'cctitulo', 'ID', true, null);

	} 
} 