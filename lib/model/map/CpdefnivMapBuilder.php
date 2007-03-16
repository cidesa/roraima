<?php


	
class CpdefnivMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.CpdefnivMapBuilder';	

    
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
		
		$tMap = $this->dbMap->addTable('cpdefniv');
		$tMap->setPhpName('Cpdefniv');

		$tMap->setUseIdGenerator(false);

		$tMap->addColumn('CODEMP', 'Codemp', 'string', CreoleTypes::VARCHAR, true, 3);

		$tMap->addColumn('LONCOD', 'Loncod', 'double', CreoleTypes::NUMERIC, true);

		$tMap->addColumn('RUPCAT', 'Rupcat', 'double', CreoleTypes::NUMERIC, true);

		$tMap->addColumn('RUPPAR', 'Ruppar', 'double', CreoleTypes::NUMERIC, true);

		$tMap->addColumn('NIVDIS', 'Nivdis', 'double', CreoleTypes::NUMERIC, true);

		$tMap->addColumn('FORPRE', 'Forpre', 'string', CreoleTypes::VARCHAR, true, 32);

		$tMap->addColumn('ASIPER', 'Asiper', 'string', CreoleTypes::VARCHAR, true, 1);

		$tMap->addColumn('NUMPER', 'Numper', 'double', CreoleTypes::NUMERIC, true);

		$tMap->addColumn('PERACT', 'Peract', 'string', CreoleTypes::VARCHAR, true, 2);

		$tMap->addColumn('FECPER', 'Fecper', 'int', CreoleTypes::DATE, false);

		$tMap->addColumn('FECINI', 'Fecini', 'int', CreoleTypes::DATE, false);

		$tMap->addColumn('FECCIE', 'Feccie', 'int', CreoleTypes::DATE, false);

		$tMap->addColumn('ETADEF', 'Etadef', 'string', CreoleTypes::VARCHAR, false, 1);

		$tMap->addColumn('STAPRC', 'Staprc', 'string', CreoleTypes::VARCHAR, false, 1);

		$tMap->addColumn('CORAEP', 'Coraep', 'string', CreoleTypes::VARCHAR, false, 8);

		$tMap->addColumn('GENCOM', 'Gencom', 'string', CreoleTypes::VARCHAR, false, 1);

		$tMap->addColumn('NUMCOM', 'Numcom', 'string', CreoleTypes::VARCHAR, false, 8);

		$tMap->addColumn('CARAEP', 'Caraep', 'string', CreoleTypes::VARCHAR, false, 8);

		$tMap->addColumn('TIPTRAPRC', 'Tiptraprc', 'string', CreoleTypes::VARCHAR, false, 4);

		$tMap->addColumn('FUEORD', 'Fueord', 'string', CreoleTypes::VARCHAR, false, 4);

		$tMap->addColumn('FUECRE', 'Fuecre', 'string', CreoleTypes::VARCHAR, false, 4);

		$tMap->addColumn('FUETRA', 'Fuetra', 'string', CreoleTypes::VARCHAR, false, 4);

		$tMap->addColumn('NOMGOB', 'Nomgob', 'string', CreoleTypes::VARCHAR, false, 100);

		$tMap->addColumn('NOMSEC', 'Nomsec', 'string', CreoleTypes::VARCHAR, false, 100);

		$tMap->addColumn('UNIDAD', 'Unidad', 'string', CreoleTypes::VARCHAR, false, 100);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);
				
    } 
} 