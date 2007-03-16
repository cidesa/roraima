<?php


	
class DftabtipMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.DftabtipMapBuilder';	

    
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
		
		$tMap = $this->dbMap->addTable('dftabtip');
		$tMap->setPhpName('Dftabtip');

		$tMap->setUseIdGenerator(false);

		$tMap->addColumn('TIPDOC', 'Tipdoc', 'string', CreoleTypes::VARCHAR, true, 4);

		$tMap->addColumn('NOMTAB', 'Nomtab', 'string', CreoleTypes::VARCHAR, true, 30);

		$tMap->addColumn('VIDUTIL', 'Vidutil', 'string', CreoleTypes::VARCHAR, true, 2);

		$tMap->addColumn('CLVPRM', 'Clvprm', 'string', CreoleTypes::VARCHAR, false, 30);

		$tMap->addColumn('CLVFRN', 'Clvfrn', 'string', CreoleTypes::VARCHAR, false, 30);

		$tMap->addColumn('MONDOC', 'Mondoc', 'string', CreoleTypes::VARCHAR, false, 20);

		$tMap->addColumn('FECDOC', 'Fecdoc', 'string', CreoleTypes::VARCHAR, false, 20);

		$tMap->addColumn('DESDOC', 'Desdoc', 'string', CreoleTypes::VARCHAR, false, 20);

		$tMap->addColumn('STADOC', 'Stadoc', 'string', CreoleTypes::VARCHAR, false, 20);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);
				
    } 
} 