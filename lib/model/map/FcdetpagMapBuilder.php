<?php


	
class FcdetpagMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.FcdetpagMapBuilder';	

    
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
		
		$tMap = $this->dbMap->addTable('fcdetpag');
		$tMap->setPhpName('Fcdetpag');

		$tMap->setUseIdGenerator(false);

		$tMap->addForeignPrimaryKey('NUMPAG', 'Numpag', 'string' , CreoleTypes::VARCHAR, 'fcpagos', 'NUMPAG', true, 10);

		$tMap->addPrimaryKey('NRODET', 'Nrodet', 'string', CreoleTypes::VARCHAR, true, 30);

		$tMap->addColumn('MONPAG', 'Monpag', 'double', CreoleTypes::NUMERIC, false);

		$tMap->addForeignKey('TIPPAG', 'Tippag', 'string', CreoleTypes::VARCHAR, 'fctippag', 'TIPPAG', false, 3);

		$tMap->addColumn('ID', 'Id', 'int', CreoleTypes::INTEGER, false);
				
    } 
} 