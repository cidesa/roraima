<?php


	
class FcdefncaMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.FcdefncaMapBuilder';	

    
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
		
		$tMap = $this->dbMap->addTable('fcdefnca');
		$tMap->setPhpName('Fcdefnca');

		$tMap->setUseIdGenerator(false);

		$tMap->addColumn('CODPAR', 'Codpar', 'string', CreoleTypes::VARCHAR, false, 4);

		$tMap->addColumn('CODMUN', 'Codmun', 'string', CreoleTypes::VARCHAR, false, 4);

		$tMap->addColumn('CODEDO', 'Codedo', 'string', CreoleTypes::VARCHAR, false, 4);

		$tMap->addColumn('CODPAI', 'Codpai', 'string', CreoleTypes::VARCHAR, false, 4);

		$tMap->addColumn('NUMNIV', 'Numniv', 'double', CreoleTypes::NUMERIC, false);

		$tMap->addColumn('NOMEXT1', 'Nomext1', 'string', CreoleTypes::VARCHAR, false, 210);

		$tMap->addColumn('NOMABR1', 'Nomabr1', 'string', CreoleTypes::VARCHAR, false, 9);

		$tMap->addColumn('TAMANO1', 'Tamano1', 'double', CreoleTypes::NUMERIC, false);

		$tMap->addColumn('NOMEXT2', 'Nomext2', 'string', CreoleTypes::VARCHAR, false, 210);

		$tMap->addColumn('NOMABR2', 'Nomabr2', 'string', CreoleTypes::VARCHAR, false, 9);

		$tMap->addColumn('TAMANO2', 'Tamano2', 'double', CreoleTypes::NUMERIC, false);

		$tMap->addColumn('NOMEXT3', 'Nomext3', 'string', CreoleTypes::VARCHAR, false, 210);

		$tMap->addColumn('NOMABR3', 'Nomabr3', 'string', CreoleTypes::VARCHAR, false, 9);

		$tMap->addColumn('TAMANO3', 'Tamano3', 'double', CreoleTypes::NUMERIC, false);

		$tMap->addColumn('NOMEXT4', 'Nomext4', 'string', CreoleTypes::VARCHAR, false, 210);

		$tMap->addColumn('NOMABR4', 'Nomabr4', 'string', CreoleTypes::VARCHAR, false, 9);

		$tMap->addColumn('TAMANO4', 'Tamano4', 'double', CreoleTypes::NUMERIC, false);

		$tMap->addColumn('NOMEXT5', 'Nomext5', 'string', CreoleTypes::VARCHAR, false, 210);

		$tMap->addColumn('NOMABR5', 'Nomabr5', 'string', CreoleTypes::VARCHAR, false, 9);

		$tMap->addColumn('TAMANO5', 'Tamano5', 'double', CreoleTypes::NUMERIC, false);

		$tMap->addColumn('NOMEXT6', 'Nomext6', 'string', CreoleTypes::VARCHAR, false, 210);

		$tMap->addColumn('NOMABR6', 'Nomabr6', 'string', CreoleTypes::VARCHAR, false, 9);

		$tMap->addColumn('TAMANO6', 'Tamano6', 'double', CreoleTypes::NUMERIC, false);

		$tMap->addColumn('NOMEXT7', 'Nomext7', 'string', CreoleTypes::VARCHAR, false, 210);

		$tMap->addColumn('NOMABR7', 'Nomabr7', 'string', CreoleTypes::VARCHAR, false, 9);

		$tMap->addColumn('TAMANO7', 'Tamano7', 'double', CreoleTypes::NUMERIC, false);

		$tMap->addColumn('NOMEXT8', 'Nomext8', 'string', CreoleTypes::VARCHAR, false, 210);

		$tMap->addColumn('NOMABR8', 'Nomabr8', 'string', CreoleTypes::VARCHAR, false, 9);

		$tMap->addColumn('TAMANO8', 'Tamano8', 'double', CreoleTypes::NUMERIC, false);

		$tMap->addColumn('NOMEXT9', 'Nomext9', 'string', CreoleTypes::VARCHAR, false, 210);

		$tMap->addColumn('NOMABR9', 'Nomabr9', 'string', CreoleTypes::VARCHAR, false, 9);

		$tMap->addColumn('TAMANO9', 'Tamano9', 'double', CreoleTypes::NUMERIC, false);

		$tMap->addColumn('NOMEXT10', 'Nomext10', 'string', CreoleTypes::VARCHAR, false, 210);

		$tMap->addColumn('NOMABR10', 'Nomabr10', 'string', CreoleTypes::VARCHAR, false, 9);

		$tMap->addColumn('TAMANO10', 'Tamano10', 'double', CreoleTypes::NUMERIC, false);

		$tMap->addColumn('NIVINM', 'Nivinm', 'string', CreoleTypes::VARCHAR, false, 2);

		$tMap->addColumn('NUMPER', 'Numper', 'double', CreoleTypes::NUMERIC, false);

		$tMap->addColumn('DENUMPER', 'Denumper', 'string', CreoleTypes::VARCHAR, false, 20);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);
				
    } 
} 