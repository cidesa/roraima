<?php


	
class AcunidadMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.AcunidadMapBuilder';	

    
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
		
		$tMap = $this->dbMap->addTable('acunidad');
		$tMap->setPhpName('Acunidad');

		$tMap->setUseIdGenerator(false);

		$tMap->addColumn('NUMUNI', 'Numuni', 'string', CreoleTypes::VARCHAR, true, 4);

		$tMap->addColumn('NOMUNI', 'Nomuni', 'string', CreoleTypes::VARCHAR, true, 30);

		$tMap->addColumn('DESUNI', 'Desuni', 'string', CreoleTypes::VARCHAR, false, 200);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);
				
    } 
} 