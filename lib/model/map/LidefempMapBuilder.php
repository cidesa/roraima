<?php



class LidefempMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.LidefempMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('lidefemp');
		$tMap->setPhpName('Lidefemp');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('lidefemp_SEQ');

		$tMap->addColumn('CODEMP', 'Codemp', 'string', CreoleTypes::VARCHAR, true, 15);

		$tMap->addColumn('NOMEMP', 'Nomemp', 'string', CreoleTypes::VARCHAR, true, 100);

		$tMap->addColumn('DIREMP', 'Diremp', 'string', CreoleTypes::VARCHAR, true, 100);

		$tMap->addColumn('TELEMP', 'Telemp', 'string', CreoleTypes::VARCHAR, true, 30);

		$tMap->addColumn('FAXEMP', 'Faxemp', 'string', CreoleTypes::VARCHAR, false, 30);

		$tMap->addColumn('EMAEMP', 'Emaemp', 'string', CreoleTypes::VARCHAR, false, 100);

		$tMap->addColumn('UNITRI', 'Unitri', 'double', CreoleTypes::NUMERIC, false, 14);

		$tMap->addColumn('PTOCTA', 'Ptocta', 'int', CreoleTypes::INTEGER, false, null);

		$tMap->addColumn('PREBAS', 'Prebas', 'int', CreoleTypes::INTEGER, false, null);

		$tMap->addColumn('EXPDIE', 'Expdie', 'int', CreoleTypes::INTEGER, false, null);

		$tMap->addColumn('NUMEMO', 'Numemo', 'int', CreoleTypes::INTEGER, false, null);

		$tMap->addColumn('SOLEGR', 'Solegr', 'int', CreoleTypes::INTEGER, false, null);

		$tMap->addColumn('COMINT', 'Comint', 'int', CreoleTypes::INTEGER, false, null);

		$tMap->addColumn('PLIEGO', 'Pliego', 'int', CreoleTypes::INTEGER, false, null);

		$tMap->addColumn('ACLARA', 'Aclara', 'int', CreoleTypes::INTEGER, false, null);

		$tMap->addColumn('OFERTA', 'Oferta', 'int', CreoleTypes::INTEGER, false, null);

		$tMap->addColumn('ANAOFE', 'Anaofe', 'int', CreoleTypes::INTEGER, false, null);

		$tMap->addColumn('RECOME', 'Recome', 'int', CreoleTypes::INTEGER, false, null);

		$tMap->addColumn('PTOCUECON', 'Ptocuecon', 'int', CreoleTypes::INTEGER, false, null);

		$tMap->addColumn('NOTIFI', 'Notifi', 'int', CreoleTypes::INTEGER, false, null);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 