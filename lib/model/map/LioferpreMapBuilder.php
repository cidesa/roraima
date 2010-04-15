<?php



class LioferpreMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.LioferpreMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('lioferpre');
		$tMap->setPhpName('Lioferpre');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('lioferpre_SEQ');

		$tMap->addForeignKey('LIREGLIC_ID', 'LireglicId', 'int', CreoleTypes::INTEGER, 'lireglic', 'ID', true, null);

		$tMap->addColumn('CODLIC', 'Codlic', 'string', CreoleTypes::VARCHAR, true, 32);

		$tMap->addColumn('CODPRO', 'Codpro', 'string', CreoleTypes::VARCHAR, true, 15);

		$tMap->addColumn('CODPAR', 'Codpar', 'string', CreoleTypes::VARCHAR, true, 32);

		$tMap->addColumn('CANT', 'Cant', 'double', CreoleTypes::NUMERIC, true, 14);

		$tMap->addColumn('PRECIO', 'Precio', 'double', CreoleTypes::NUMERIC, true, 14);

		$tMap->addColumn('MONSINIVA', 'Monsiniva', 'double', CreoleTypes::NUMERIC, true, 14);

		$tMap->addColumn('IVA', 'Iva', 'double', CreoleTypes::NUMERIC, false, 14);

		$tMap->addColumn('MONTOT', 'Montot', 'double', CreoleTypes::NUMERIC, true, 14);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 