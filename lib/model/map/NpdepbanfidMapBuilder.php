<?php


	
class NpdepbanfidMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.NpdepbanfidMapBuilder';	

    
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
		
		$tMap = $this->dbMap->addTable('npdepbanfid');
		$tMap->setPhpName('Npdepbanfid');

		$tMap->setUseIdGenerator(false);

		$tMap->addColumn('NUMLIN', 'Numlin', 'double', CreoleTypes::NUMERIC, false);

		$tMap->addColumn('DESDEP', 'Desdep', 'string', CreoleTypes::VARCHAR, false, 255);

		$tMap->addColumn('CODEMP', 'Codemp', 'string', CreoleTypes::VARCHAR, false, 16);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);
				
    } 
} 