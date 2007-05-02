<?php


	
class FcdetaboMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.FcdetaboMapBuilder';	

    
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
		
		$tMap = $this->dbMap->addTable('fcdetabo');
		$tMap->setPhpName('Fcdetabo');

		$tMap->setUseIdGenerator(false);

		$tMap->addColumn('NUMPAG', 'Numpag', 'string', CreoleTypes::VARCHAR, false, 10);

		$tMap->addColumn('NRODET', 'Nrodet', 'string', CreoleTypes::VARCHAR, false, 30);

		$tMap->addColumn('MONPAG', 'Monpag', 'double', CreoleTypes::NUMERIC, false);

		$tMap->addColumn('TIPPAG', 'Tippag', 'string', CreoleTypes::VARCHAR, false, 3);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);
				
    } 
} 