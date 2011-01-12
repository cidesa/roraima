<?php



class ViadefgenMapBuilder {


	const CLASS_NAME = 'lib.model.map.ViadefgenMapBuilder';


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

		$tMap = $this->dbMap->addTable('viadefgen');
		$tMap->setPhpName('Viadefgen');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('viadefgen_SEQ');

		$tMap->addColumn('NUMSOLVIA', 'Numsolvia', 'int', CreoleTypes::INTEGER, false, null);

		$tMap->addColumn('NUMCALVIANAC', 'Numcalvianac', 'int', CreoleTypes::INTEGER, false, null);

		$tMap->addColumn('NUMCALVIAINT', 'Numcalviaint', 'int', CreoleTypes::INTEGER, false, null);

		$tMap->addColumn('VALUNITRI', 'Valunitri', 'double', CreoleTypes::NUMERIC, false, 14);

		$tMap->addColumn('VALDOLAR', 'Valdolar', 'double', CreoleTypes::NUMERIC, false, 14);

		$tMap->addColumn('NUMRELGASADI', 'Numrelgasadi', 'int', CreoleTypes::INTEGER, false, null);

		$tMap->addColumn('CODPAR', 'Codpar', 'string', CreoleTypes::VARCHAR, false, 32);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	}
}