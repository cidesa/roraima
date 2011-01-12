<?php



class CcregnotMapBuilder {

	
	const CLASS_NAME = 'lib.model.creditos.map.CcregnotMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('ccregnot');
		$tMap->setPhpName('Ccregnot');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('ccregnot_SEQ');

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

		$tMap->addColumn('NOMREGNOT', 'Nomregnot', 'string', CreoleTypes::VARCHAR, false, null);

		$tMap->addColumn('DESREGNOT', 'Desregnot', 'string', CreoleTypes::VARCHAR, false, null);

		$tMap->addColumn('DIRREGNOT', 'Dirregnot', 'string', CreoleTypes::VARCHAR, false, null);

		$tMap->addColumn('CODARETEL', 'Codaretel', 'string', CreoleTypes::VARCHAR, false, null);

		$tMap->addColumn('NUMTELREG', 'Numtelreg', 'string', CreoleTypes::VARCHAR, false, null);

		$tMap->addColumn('CODARETEL2', 'Codaretel2', 'string', CreoleTypes::VARCHAR, false, null);

		$tMap->addColumn('NUMTELREG2', 'Numtelreg2', 'string', CreoleTypes::VARCHAR, false, null);

		$tMap->addColumn('TIPREGNOT', 'Tipregnot', 'string', CreoleTypes::VARCHAR, false, 1);

		$tMap->addForeignKey('CCMUNICI_ID', 'CcmuniciId', 'int', CreoleTypes::INTEGER, 'ccmunici', 'ID', true, null);

	} 
} 