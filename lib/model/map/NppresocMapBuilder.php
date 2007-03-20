<?php


	
class NppresocMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.NppresocMapBuilder';	

    
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
		
		$tMap = $this->dbMap->addTable('nppresoc');
		$tMap->setPhpName('Nppresoc');

		$tMap->setUseIdGenerator(false);

		$tMap->addColumn('CODEMP', 'Codemp', 'string', CreoleTypes::VARCHAR, true, 16);

		$tMap->addColumn('FECCOR', 'Feccor', 'int', CreoleTypes::DATE, true);

		$tMap->addColumn('FECCAL', 'Feccal', 'int', CreoleTypes::DATE, false);

		$tMap->addColumn('CODCON', 'Codcon', 'string', CreoleTypes::VARCHAR, false, 3);

		$tMap->addColumn('DIASER', 'Diaser', 'double', CreoleTypes::NUMERIC, false);

		$tMap->addColumn('MESSER', 'Messer', 'double', CreoleTypes::NUMERIC, false);

		$tMap->addColumn('ANOSER', 'Anoser', 'double', CreoleTypes::NUMERIC, false);

		$tMap->addColumn('DIATRA', 'Diatra', 'double', CreoleTypes::NUMERIC, false);

		$tMap->addColumn('MESTRA', 'Mestra', 'double', CreoleTypes::NUMERIC, false);

		$tMap->addColumn('ANOTRA', 'Anotra', 'double', CreoleTypes::NUMERIC, false);

		$tMap->addColumn('ANTACU', 'Antacu', 'double', CreoleTypes::NUMERIC, false);

		$tMap->addColumn('INTACU', 'Intacu', 'double', CreoleTypes::NUMERIC, false);

		$tMap->addColumn('BONTRA', 'Bontra', 'double', CreoleTypes::NUMERIC, false);

		$tMap->addColumn('ADEPRE', 'Adepre', 'double', CreoleTypes::NUMERIC, false);

		$tMap->addColumn('ADEINT', 'Adeint', 'double', CreoleTypes::NUMERIC, false);

		$tMap->addColumn('MONPRE', 'Monpre', 'double', CreoleTypes::NUMERIC, true);

		$tMap->addColumn('PASREGANT', 'Pasregant', 'double', CreoleTypes::NUMERIC, false);

		$tMap->addColumn('STAPRE', 'Stapre', 'string', CreoleTypes::VARCHAR, false, 1);

		$tMap->addColumn('REGPRE', 'Regpre', 'string', CreoleTypes::VARCHAR, false, 1);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);
				
    } 
} 