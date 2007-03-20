<?php


	
class OcregvalMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.OcregvalMapBuilder';	

    
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
		
		$tMap = $this->dbMap->addTable('ocregval');
		$tMap->setPhpName('Ocregval');

		$tMap->setUseIdGenerator(false);

		$tMap->addColumn('MONVAL', 'Monval', 'double', CreoleTypes::NUMERIC, true);

		$tMap->addColumn('SALLIQ', 'Salliq', 'double', CreoleTypes::NUMERIC, true);

		$tMap->addColumn('RETACU', 'Retacu', 'double', CreoleTypes::NUMERIC, true);

		$tMap->addColumn('MONIVA', 'Moniva', 'double', CreoleTypes::NUMERIC, false);

		$tMap->addColumn('AMOANT', 'Amoant', 'double', CreoleTypes::NUMERIC, false);

		$tMap->addColumn('STAVAL', 'Staval', 'string', CreoleTypes::VARCHAR, true, 1);

		$tMap->addColumn('PORIVA', 'Poriva', 'double', CreoleTypes::NUMERIC, false);

		$tMap->addColumn('PORANT', 'Porant', 'double', CreoleTypes::NUMERIC, false);

		$tMap->addColumn('MONPAG', 'Monpag', 'double', CreoleTypes::NUMERIC, false);

		$tMap->addColumn('SALANT', 'Salant', 'double', CreoleTypes::NUMERIC, false);

		$tMap->addColumn('GASREE', 'Gasree', 'double', CreoleTypes::NUMERIC, false);

		$tMap->addColumn('SUBTOT', 'Subtot', 'double', CreoleTypes::NUMERIC, false);

		$tMap->addColumn('MONFUL', 'Monful', 'double', CreoleTypes::NUMERIC, false);

		$tMap->addColumn('MONFIA', 'Monfia', 'double', CreoleTypes::NUMERIC, false);

		$tMap->addColumn('MONANT', 'Monant', 'double', CreoleTypes::NUMERIC, false);

		$tMap->addColumn('MONPERIVA', 'Monperiva', 'double', CreoleTypes::NUMERIC, false);

		$tMap->addColumn('CODCON', 'Codcon', 'string', CreoleTypes::VARCHAR, true, 32);

		$tMap->addColumn('NUMVAL', 'Numval', 'string', CreoleTypes::VARCHAR, true, 2);

		$tMap->addColumn('CODTIPVAL', 'Codtipval', 'string', CreoleTypes::VARCHAR, true, 2);

		$tMap->addColumn('FECINI', 'Fecini', 'int', CreoleTypes::DATE, false);

		$tMap->addColumn('FECFIN', 'Fecfin', 'int', CreoleTypes::DATE, false);

		$tMap->addColumn('FECREG', 'Fecreg', 'int', CreoleTypes::DATE, true);

		$tMap->addColumn('AUMOBR', 'Aumobr', 'double', CreoleTypes::NUMERIC, true);

		$tMap->addColumn('DISOBR', 'Disobr', 'double', CreoleTypes::NUMERIC, true);

		$tMap->addColumn('OBREXT', 'Obrext', 'double', CreoleTypes::NUMERIC, true);

		$tMap->addColumn('MONPER', 'Monper', 'double', CreoleTypes::NUMERIC, true);

		$tMap->addColumn('TOTDED', 'Totded', 'double', CreoleTypes::NUMERIC, true);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);
				
    } 
} 