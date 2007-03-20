<?php


	
class NpvacliquidacionMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.NpvacliquidacionMapBuilder';	

    
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
		
		$tMap = $this->dbMap->addTable('npvacliquidacion');
		$tMap->setPhpName('Npvacliquidacion');

		$tMap->setUseIdGenerator(false);

		$tMap->addColumn('CODEMP', 'Codemp', 'string', CreoleTypes::VARCHAR, false, 16);

		$tMap->addColumn('PERINI', 'Perini', 'string', CreoleTypes::VARCHAR, false, 4);

		$tMap->addColumn('PERFIN', 'Perfin', 'string', CreoleTypes::VARCHAR, false, 4);

		$tMap->addColumn('DIADIS', 'Diadis', 'double', CreoleTypes::NUMERIC, false);

		$tMap->addColumn('DIASBONO', 'Diasbono', 'double', CreoleTypes::NUMERIC, false);

		$tMap->addColumn('MONTO', 'Monto', 'double', CreoleTypes::NUMERIC, false);

		$tMap->addColumn('ULTSUE', 'Ultsue', 'double', CreoleTypes::NUMERIC, false);

		$tMap->addColumn('MONTOINCI', 'Montoinci', 'double', CreoleTypes::NUMERIC, false);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);
				
    } 
} 