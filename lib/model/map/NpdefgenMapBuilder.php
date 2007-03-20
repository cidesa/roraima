<?php


	
class NpdefgenMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.NpdefgenMapBuilder';	

    
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
		
		$tMap = $this->dbMap->addTable('npdefgen');
		$tMap->setPhpName('Npdefgen');

		$tMap->setUseIdGenerator(false);

		$tMap->addColumn('CODEMP', 'Codemp', 'string', CreoleTypes::VARCHAR, true, 3);

		$tMap->addColumn('LONCODCAR', 'Loncodcar', 'double', CreoleTypes::NUMERIC, false);

		$tMap->addColumn('LONCODEMP', 'Loncodemp', 'double', CreoleTypes::NUMERIC, false);

		$tMap->addColumn('LONCODORG', 'Loncodorg', 'double', CreoleTypes::NUMERIC, false);

		$tMap->addColumn('LONCODUNI', 'Loncoduni', 'double', CreoleTypes::NUMERIC, false);

		$tMap->addColumn('RUPCAR', 'Rupcar', 'double', CreoleTypes::NUMERIC, false);

		$tMap->addColumn('RUPEMP', 'Rupemp', 'double', CreoleTypes::NUMERIC, false);

		$tMap->addColumn('RUPORG', 'Ruporg', 'double', CreoleTypes::NUMERIC, false);

		$tMap->addColumn('RUPUNI', 'Rupuni', 'double', CreoleTypes::NUMERIC, false);

		$tMap->addColumn('FORCAR', 'Forcar', 'string', CreoleTypes::VARCHAR, true, 16);

		$tMap->addColumn('FOREMP', 'Foremp', 'string', CreoleTypes::VARCHAR, true, 16);

		$tMap->addColumn('FORORG', 'Fororg', 'string', CreoleTypes::VARCHAR, true, 16);

		$tMap->addColumn('FORUNI', 'Foruni', 'string', CreoleTypes::VARCHAR, true, 16);

		$tMap->addColumn('REDMON', 'Redmon', 'string', CreoleTypes::VARCHAR, true, 1);

		$tMap->addColumn('CODPRE', 'Codpre', 'string', CreoleTypes::VARCHAR, false, 3);

		$tMap->addColumn('CODVAC', 'Codvac', 'string', CreoleTypes::VARCHAR, false, 3);

		$tMap->addColumn('CODVACFRA', 'Codvacfra', 'string', CreoleTypes::VARCHAR, false, 3);

		$tMap->addColumn('CODVACCOL', 'Codvaccol', 'string', CreoleTypes::VARCHAR, false, 3);

		$tMap->addColumn('CODISLR', 'Codislr', 'string', CreoleTypes::VARCHAR, false, 3);

		$tMap->addColumn('CODPRES', 'Codpres', 'string', CreoleTypes::VARCHAR, false, 3);

		$tMap->addColumn('CODSSO', 'Codsso', 'string', CreoleTypes::VARCHAR, false, 3);

		$tMap->addColumn('SUEINT', 'Sueint', 'string', CreoleTypes::VARCHAR, false, 3);

		$tMap->addColumn('ASICONNOM', 'Asiconnom', 'string', CreoleTypes::VARCHAR, false, 1);

		$tMap->addColumn('CIERAC', 'Cierac', 'string', CreoleTypes::VARCHAR, false, 1);

		$tMap->addColumn('FORESC', 'Foresc', 'string', CreoleTypes::VARCHAR, false, 16);

		$tMap->addColumn('NUMREC', 'Numrec', 'double', CreoleTypes::NUMERIC, false);

		$tMap->addColumn('FORCARRAC', 'Forcarrac', 'string', CreoleTypes::VARCHAR, false, 16);

		$tMap->addColumn('FORCAROCP', 'Forcarocp', 'string', CreoleTypes::VARCHAR, false, 16);

		$tMap->addColumn('CORREL', 'Correl', 'double', CreoleTypes::NUMERIC, false);

		$tMap->addColumn('PORCTICK', 'Porctick', 'double', CreoleTypes::NUMERIC, false);

		$tMap->addColumn('UNITRIB', 'Unitrib', 'double', CreoleTypes::NUMERIC, false);

		$tMap->addColumn('NUMTICK', 'Numtick', 'double', CreoleTypes::NUMERIC, false);

		$tMap->addColumn('DIASEM', 'Diasem', 'double', CreoleTypes::NUMERIC, false);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);
				
    } 
} 