<?php


	
class TsanticiMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.TsanticiMapBuilder';	

    
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
		
		$tMap = $this->dbMap->addTable('tsantici');
		$tMap->setPhpName('Tsantici');

		$tMap->setUseIdGenerator(false);

		$tMap->addColumn('REFANT', 'Refant', 'string', CreoleTypes::VARCHAR, true, 20);

		$tMap->addColumn('DESANT', 'Desant', 'string', CreoleTypes::VARCHAR, false, 250);

		$tMap->addColumn('CEDRIF', 'Cedrif', 'string', CreoleTypes::VARCHAR, true, 15);

		$tMap->addColumn('REFCOM', 'Refcom', 'string', CreoleTypes::VARCHAR, true, 8);

		$tMap->addColumn('FECANT', 'Fecant', 'int', CreoleTypes::DATE, true);

		$tMap->addColumn('MONTO', 'Monto', 'double', CreoleTypes::NUMERIC, false);

		$tMap->addColumn('SALDO', 'Saldo', 'double', CreoleTypes::NUMERIC, false);

		$tMap->addColumn('NUMCOM', 'Numcom', 'string', CreoleTypes::VARCHAR, false, 8);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);
				
    } 
} 