<?php


	
class FcretencionMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.FcretencionMapBuilder';	

    
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
		
		$tMap = $this->dbMap->addTable('fcretencion');
		$tMap->setPhpName('Fcretencion');

		$tMap->setUseIdGenerator(false);

		$tMap->addColumn('NUMRET', 'Numret', 'string', CreoleTypes::VARCHAR, true, 15);

		$tMap->addColumn('FUEING', 'Fueing', 'string', CreoleTypes::VARCHAR, true, 2);

		$tMap->addColumn('FECRET', 'Fecret', 'int', CreoleTypes::DATE, false);

		$tMap->addColumn('FECREG', 'Fecreg', 'int', CreoleTypes::DATE, false);

		$tMap->addColumn('MONRET', 'Monret', 'double', CreoleTypes::NUMERIC, false);

		$tMap->addColumn('NUMREL', 'Numrel', 'string', CreoleTypes::VARCHAR, false, 10);

		$tMap->addColumn('DESRET', 'Desret', 'string', CreoleTypes::VARCHAR, false, 1000);

		$tMap->addColumn('MONSAL', 'Monsal', 'double', CreoleTypes::NUMERIC, false);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);
				
    } 
} 