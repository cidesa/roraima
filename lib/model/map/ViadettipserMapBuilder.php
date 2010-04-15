<?php



class ViadettipserMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.ViadettipserMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('viadettipser');
		$tMap->setPhpName('Viadettipser');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('viadettipser_SEQ');

		$tMap->addColumn('MONTOEUR', 'Montoeur', 'double', CreoleTypes::NUMERIC, false, 12);

		$tMap->addColumn('MONTODOL', 'Montodol', 'double', CreoleTypes::NUMERIC, false, 12);

		$tMap->addColumn('MONTOBS', 'Montobs', 'double', CreoleTypes::NUMERIC, false, 12);

		$tMap->addForeignKey('VIAREGTIPTAB_ID', 'ViaregtiptabId', 'int', CreoleTypes::INTEGER, 'viaregtiptab', 'ID', false, null);

		$tMap->addForeignKey('OCCIUDAD_ID', 'OcciudadId', 'int', CreoleTypes::INTEGER, 'occiudad', 'ID', false, null);

		$tMap->addForeignKey('VIAREGTIPSER_ID', 'ViaregtipserId', 'int', CreoleTypes::INTEGER, 'viaregtipser', 'ID', false, null);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 