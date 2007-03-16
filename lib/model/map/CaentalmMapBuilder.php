<?php


	
class CaentalmMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.CaentalmMapBuilder';	

    
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
		
		$tMap = $this->dbMap->addTable('caentalm');
		$tMap->setPhpName('Caentalm');

		$tMap->setUseIdGenerator(false);

		$tMap->addColumn('RCPART', 'Rcpart', 'string', CreoleTypes::VARCHAR, true, 8);

		$tMap->addColumn('FECRCP', 'Fecrcp', 'int', CreoleTypes::DATE, true);

		$tMap->addColumn('DESRCP', 'Desrcp', 'string', CreoleTypes::VARCHAR, false, 100);

		$tMap->addColumn('CODPRO', 'Codpro', 'string', CreoleTypes::VARCHAR, false, 10);

		$tMap->addColumn('MONRCP', 'Monrcp', 'double', CreoleTypes::NUMERIC, false);

		$tMap->addColumn('STARCP', 'Starcp', 'string', CreoleTypes::VARCHAR, false, 1);

		$tMap->addColumn('CODALM', 'Codalm', 'string', CreoleTypes::VARCHAR, false, 6);

		$tMap->addColumn('TIPMOV', 'Tipmov', 'string', CreoleTypes::VARCHAR, false, 3);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);
				
    } 
} 