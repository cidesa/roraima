<?php


	
class PagtransaMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.PagtransaMapBuilder';	

    
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
		
		$tMap = $this->dbMap->addTable('pagtransa');
		$tMap->setPhpName('Pagtransa');

		$tMap->setUseIdGenerator(false);

		$tMap->addColumn('NUMTRA', 'Numtra', 'string', CreoleTypes::VARCHAR, true, 10);

		$tMap->addColumn('FECTRA', 'Fectra', 'int', CreoleTypes::DATE, true);

		$tMap->addColumn('CODPRO', 'Codpro', 'string', CreoleTypes::VARCHAR, true, 10);

		$tMap->addColumn('CODMOV', 'Codmov', 'string', CreoleTypes::VARCHAR, true, 3);

		$tMap->addColumn('DESTRA', 'Destra', 'string', CreoleTypes::VARCHAR, false, 100);

		$tMap->addColumn('MONTRA', 'Montra', 'double', CreoleTypes::NUMERIC, false);

		$tMap->addColumn('TOTDSC', 'Totdsc', 'double', CreoleTypes::NUMERIC, false);

		$tMap->addColumn('TOTREC', 'Totrec', 'double', CreoleTypes::NUMERIC, false);

		$tMap->addColumn('TOTTRA', 'Tottra', 'double', CreoleTypes::NUMERIC, false);

		$tMap->addColumn('STAIMP', 'Staimp', 'string', CreoleTypes::VARCHAR, false, 1);

		$tMap->addColumn('NUMCHE', 'Numche', 'string', CreoleTypes::VARCHAR, false, 10);

		$tMap->addColumn('DESANU', 'Desanu', 'string', CreoleTypes::VARCHAR, false, 100);

		$tMap->addColumn('FECANU', 'Fecanu', 'int', CreoleTypes::DATE, false);

		$tMap->addColumn('RIFPRO', 'Rifpro', 'string', CreoleTypes::VARCHAR, false, 15);

		$tMap->addColumn('NUMCOM', 'Numcom', 'string', CreoleTypes::VARCHAR, false, 8);

		$tMap->addColumn('FECCOM', 'Feccom', 'int', CreoleTypes::DATE, false);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);
				
    } 
} 