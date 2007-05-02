<?php


	
class FcactpicMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.FcactpicMapBuilder';	

    
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
		
		$tMap = $this->dbMap->addTable('fcactpic');
		$tMap->setPhpName('Fcactpic');

		$tMap->setUseIdGenerator(false);

		$tMap->addColumn('NUMDOC', 'Numdoc', 'string', CreoleTypes::VARCHAR, false, 10);

		$tMap->addColumn('CODACT', 'Codact', 'string', CreoleTypes::VARCHAR, false, 16);

		$tMap->addColumn('EXONER', 'Exoner', 'string', CreoleTypes::VARCHAR, false, 1);

		$tMap->addColumn('MONACT', 'Monact', 'double', CreoleTypes::NUMERIC, false);

		$tMap->addColumn('POREXO', 'Porexo', 'double', CreoleTypes::NUMERIC, false);

		$tMap->addColumn('ESTACT', 'Estact', 'string', CreoleTypes::VARCHAR, false, 1);

		$tMap->addColumn('EXENTO', 'Exento', 'string', CreoleTypes::VARCHAR, false, 1);

		$tMap->addColumn('REBAJA', 'Rebaja', 'string', CreoleTypes::VARCHAR, false, 1);

		$tMap->addColumn('PORREB', 'Porreb', 'double', CreoleTypes::NUMERIC, false);

		$tMap->addColumn('MONANT', 'Monant', 'double', CreoleTypes::NUMERIC, false);

		$tMap->addColumn('IMPUESTO', 'Impuesto', 'double', CreoleTypes::NUMERIC, false);

		$tMap->addColumn('FECVEN', 'Fecven', 'int', CreoleTypes::DATE, false);

		$tMap->addColumn('ANODEC', 'Anodec', 'string', CreoleTypes::VARCHAR, false, 4);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);
				
    } 
} 