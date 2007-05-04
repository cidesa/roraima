<?php


	
class FcfuepreMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.FcfuepreMapBuilder';	

    
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
		
		$tMap = $this->dbMap->addTable('fcfuepre');
		$tMap->setPhpName('Fcfuepre');

		$tMap->setUseIdGenerator(false);

		$tMap->addColumn('CODFUE', 'Codfue', 'string', CreoleTypes::VARCHAR, true, 2);

		$tMap->addColumn('NOMFUE', 'Nomfue', 'string', CreoleTypes::VARCHAR, true, 100);

		$tMap->addColumn('NOMABR', 'Nomabr', 'string', CreoleTypes::VARCHAR, true, 3);

		$tMap->addColumn('FRECOB', 'Frecob', 'double', CreoleTypes::NUMERIC, false);

		$tMap->addColumn('MONMOR', 'Monmor', 'double', CreoleTypes::NUMERIC, false);

		$tMap->addColumn('PERMOR', 'Permor', 'double', CreoleTypes::NUMERIC, false);

		$tMap->addColumn('PROPAG', 'Propag', 'double', CreoleTypes::NUMERIC, false);

		$tMap->addColumn('PERPPG', 'Perppg', 'double', CreoleTypes::NUMERIC, false);

		$tMap->addColumn('LIQACT', 'Liqact', 'double', CreoleTypes::NUMERIC, false);

		$tMap->addColumn('DEUFEC', 'Deufec', 'double', CreoleTypes::NUMERIC, false);

		$tMap->addColumn('RECFEC', 'Recfec', 'double', CreoleTypes::NUMERIC, false);

		$tMap->addColumn('FECUFA', 'Fecufa', 'int', CreoleTypes::DATE, false);

		$tMap->addColumn('INGREC', 'Ingrec', 'string', CreoleTypes::VARCHAR, false, 18);

		$tMap->addColumn('FUEING', 'Fueing', 'string', CreoleTypes::VARCHAR, false, 32);

		$tMap->addColumn('INIEJE', 'Inieje', 'int', CreoleTypes::DATE, false);

		$tMap->addColumn('FINEJE', 'Fineje', 'int', CreoleTypes::DATE, false);

		$tMap->addColumn('DIAVSO', 'Diavso', 'double', CreoleTypes::NUMERIC, false);

		$tMap->addColumn('CODPREI', 'Codprei', 'string', CreoleTypes::VARCHAR, false, 16);

		$tMap->addColumn('DEUFRA', 'Deufra', 'string', CreoleTypes::VARCHAR, true, 1);

		$tMap->addColumn('AUTLIQ', 'Autliq', 'string', CreoleTypes::VARCHAR, true, 1);

		$tMap->addColumn('SIMPRE', 'Simpre', 'string', CreoleTypes::VARCHAR, true, 1);

		$tMap->addColumn('FECCIE', 'Feccie', 'int', CreoleTypes::DATE, false);

		$tMap->addColumn('TIPMUL', 'Tipmul', 'string', CreoleTypes::VARCHAR, false, 1);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);
				
    } 
} 