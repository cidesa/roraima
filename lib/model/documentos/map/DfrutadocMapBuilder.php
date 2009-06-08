<?php



class DfrutadocMapBuilder {

	
	const CLASS_NAME = 'lib.model.documentos.map.DfrutadocMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('dfrutadoc');
		$tMap->setPhpName('Dfrutadoc');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('dfrutadoc_SEQ');

		$tMap->addColumn('RUTDOC', 'Rutdoc', 'int', CreoleTypes::INTEGER, true, null);

		$tMap->addColumn('DESUNI', 'Desuni', 'string', CreoleTypes::VARCHAR, false, 100);

		$tMap->addColumn('DESRUT', 'Desrut', 'string', CreoleTypes::VARCHAR, false, 100);

		$tMap->addColumn('DIADOC', 'Diadoc', 'int', CreoleTypes::INTEGER, true, null);

		$tMap->addForeignKey('ID_ACUNIDAD', 'IdAcunidad', 'int', CreoleTypes::INTEGER, 'acunidad', 'ID', true, null);

		$tMap->addForeignKey('ID_DFTABTIP', 'IdDftabtip', 'int', CreoleTypes::INTEGER, 'dftabtip', 'ID', true, null);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 