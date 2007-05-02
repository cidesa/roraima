<?php


	
class FcvalinmMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.FcvalinmMapBuilder';	

    
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
		
		$tMap = $this->dbMap->addTable('fcvalinm');
		$tMap->setPhpName('Fcvalinm');

		$tMap->setUseIdGenerator(false);

		$tMap->addColumn('CODZON', 'Codzon', 'string', CreoleTypes::VARCHAR, false, 1);

		$tMap->addColumn('DESZON', 'Deszon', 'string', CreoleTypes::VARCHAR, false, 50);

		$tMap->addColumn('CODTIP', 'Codtip', 'string', CreoleTypes::VARCHAR, false, 3);

		$tMap->addColumn('DESTIP', 'Destip', 'string', CreoleTypes::VARCHAR, false, 150);

		$tMap->addColumn('VALMTR', 'Valmtr', 'double', CreoleTypes::NUMERIC, false);

		$tMap->addColumn('VALFIS', 'Valfis', 'double', CreoleTypes::NUMERIC, false);

		$tMap->addColumn('ALITIP', 'Alitip', 'double', CreoleTypes::NUMERIC, false);

		$tMap->addColumn('ANUAL', 'Anual', 'double', CreoleTypes::NUMERIC, false);

		$tMap->addColumn('ALITIPT', 'Alitipt', 'double', CreoleTypes::NUMERIC, false);

		$tMap->addColumn('ANUALT', 'Anualt', 'double', CreoleTypes::NUMERIC, false);

		$tMap->addColumn('ANOVIG', 'Anovig', 'string', CreoleTypes::VARCHAR, false, 4);

		$tMap->addColumn('PORVALFIS', 'Porvalfis', 'double', CreoleTypes::NUMERIC, false);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);
				
    } 
} 