<?php


	
class PagdocumeMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.PagdocumeMapBuilder';	

    
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
		
		$tMap = $this->dbMap->addTable('pagdocume');
		$tMap->setPhpName('Pagdocume');

		$tMap->setUseIdGenerator(false);

		$tMap->addColumn('REFDOC', 'Refdoc', 'string', CreoleTypes::VARCHAR, true, 10);

		$tMap->addColumn('CODPRO', 'Codpro', 'string', CreoleTypes::VARCHAR, true, 10);

		$tMap->addColumn('CODMOV', 'Codmov', 'string', CreoleTypes::VARCHAR, true, 3);

		$tMap->addColumn('FECEMI', 'Fecemi', 'int', CreoleTypes::DATE, true);

		$tMap->addColumn('FECVEN', 'Fecven', 'int', CreoleTypes::DATE, false);

		$tMap->addColumn('ORIDOC', 'Oridoc', 'string', CreoleTypes::VARCHAR, false, 3);

		$tMap->addColumn('DESDOC', 'Desdoc', 'string', CreoleTypes::VARCHAR, false, 100);

		$tMap->addColumn('MONDOC', 'Mondoc', 'double', CreoleTypes::NUMERIC, false);

		$tMap->addColumn('RECDOC', 'Recdoc', 'double', CreoleTypes::NUMERIC, false);

		$tMap->addColumn('DSCDOC', 'Dscdoc', 'double', CreoleTypes::NUMERIC, false);

		$tMap->addColumn('ABODOC', 'Abodoc', 'double', CreoleTypes::NUMERIC, false);

		$tMap->addColumn('SALDOC', 'Saldoc', 'double', CreoleTypes::NUMERIC, false);

		$tMap->addColumn('FECANU', 'Fecanu', 'int', CreoleTypes::DATE, false);

		$tMap->addColumn('DESANU', 'Desanu', 'string', CreoleTypes::VARCHAR, false, 100);

		$tMap->addColumn('STADOC', 'Stadoc', 'string', CreoleTypes::VARCHAR, false, 1);

		$tMap->addColumn('NUMCOM', 'Numcom', 'string', CreoleTypes::VARCHAR, false, 8);

		$tMap->addColumn('FECCOM', 'Feccom', 'int', CreoleTypes::DATE, false);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);
				
    } 
} 