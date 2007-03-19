<?php


	
class NpnominaMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.NpnominaMapBuilder';	

    
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
		
		$tMap = $this->dbMap->addTable('npnomina');
		$tMap->setPhpName('Npnomina');

		$tMap->setUseIdGenerator(false);

		$tMap->addColumn('CODNOM', 'Codnom', 'string', CreoleTypes::VARCHAR, true, 3);

		$tMap->addColumn('NOMNOM', 'Nomnom', 'string', CreoleTypes::VARCHAR, true, 100);

		$tMap->addColumn('FRECAL', 'Frecal', 'string', CreoleTypes::VARCHAR, true, 1);

		$tMap->addColumn('ULTFEC', 'Ultfec', 'int', CreoleTypes::DATE, true);

		$tMap->addColumn('PROFEC', 'Profec', 'int', CreoleTypes::DATE, true);

		$tMap->addColumn('NUMSEM', 'Numsem', 'double', CreoleTypes::NUMERIC, false);

		$tMap->addColumn('ORDPAG', 'Ordpag', 'string', CreoleTypes::VARCHAR, true, 1);

		$tMap->addColumn('TIPCAU', 'Tipcau', 'string', CreoleTypes::VARCHAR, false, 4);

		$tMap->addColumn('REFCAU', 'Refcau', 'string', CreoleTypes::VARCHAR, false, 8);

		$tMap->addColumn('TIPPRC', 'Tipprc', 'string', CreoleTypes::VARCHAR, false, 4);

		$tMap->addColumn('REFPRC', 'Refprc', 'string', CreoleTypes::VARCHAR, false, 8);

		$tMap->addColumn('TIPCOM', 'Tipcom', 'string', CreoleTypes::VARCHAR, false, 4);

		$tMap->addColumn('REFCOM', 'Refcom', 'string', CreoleTypes::VARCHAR, false, 8);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);
				
    } 
} 