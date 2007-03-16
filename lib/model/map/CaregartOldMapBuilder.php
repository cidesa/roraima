<?php


	
class CaregartOldMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.CaregartOldMapBuilder';	

    
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
		
		$tMap = $this->dbMap->addTable('caregart_old');
		$tMap->setPhpName('CaregartOld');

		$tMap->setUseIdGenerator(false);

		$tMap->addColumn('CODART', 'Codart', 'string', CreoleTypes::VARCHAR, true, 20);

		$tMap->addColumn('DESART', 'Desart', 'string', CreoleTypes::VARCHAR, true, 250);

		$tMap->addColumn('CODCTA', 'Codcta', 'string', CreoleTypes::VARCHAR, false, 32);

		$tMap->addColumn('CODPAR', 'Codpar', 'string', CreoleTypes::VARCHAR, false, 16);

		$tMap->addColumn('RAMART', 'Ramart', 'string', CreoleTypes::VARCHAR, false, 6);

		$tMap->addColumn('COSULT', 'Cosult', 'double', CreoleTypes::NUMERIC, false);

		$tMap->addColumn('COSPRO', 'Cospro', 'double', CreoleTypes::NUMERIC, false);

		$tMap->addColumn('EXITOT', 'Exitot', 'double', CreoleTypes::NUMERIC, false);

		$tMap->addColumn('UNIMED', 'Unimed', 'string', CreoleTypes::VARCHAR, false, 15);

		$tMap->addColumn('UNIALT', 'Unialt', 'string', CreoleTypes::VARCHAR, false, 15);

		$tMap->addColumn('RELART', 'Relart', 'string', CreoleTypes::VARCHAR, false, 25);

		$tMap->addColumn('FECULT', 'Fecult', 'int', CreoleTypes::DATE, false);

		$tMap->addColumn('INVINI', 'Invini', 'double', CreoleTypes::NUMERIC, false);

		$tMap->addColumn('CODMAR', 'Codmar', 'string', CreoleTypes::VARCHAR, false, 6);

		$tMap->addColumn('CODREF', 'Codref', 'string', CreoleTypes::VARCHAR, false, 15);

		$tMap->addColumn('COSTOT', 'Costot', 'double', CreoleTypes::NUMERIC, false);

		$tMap->addColumn('SIGECOF', 'Sigecof', 'string', CreoleTypes::VARCHAR, false, 20);

		$tMap->addColumn('CODCLAART', 'Codclaart', 'double', CreoleTypes::NUMERIC, false);

		$tMap->addColumn('LOTUNI', 'Lotuni', 'string', CreoleTypes::VARCHAR, false, 1);

		$tMap->addColumn('CTAVTA', 'Ctavta', 'string', CreoleTypes::VARCHAR, false, 32);

		$tMap->addColumn('CTACOS', 'Ctacos', 'string', CreoleTypes::VARCHAR, false, 32);

		$tMap->addColumn('CTAPRO', 'Ctapro', 'string', CreoleTypes::VARCHAR, false, 32);

		$tMap->addColumn('PREART', 'Preart', 'string', CreoleTypes::VARCHAR, false, 50);

		$tMap->addColumn('DISTOT', 'Distot', 'double', CreoleTypes::NUMERIC, false);

		$tMap->addColumn('TIPO', 'Tipo', 'string', CreoleTypes::VARCHAR, false, 1);

		$tMap->addColumn('TIP0', 'Tip0', 'string', CreoleTypes::VARCHAR, false, 1);

		$tMap->addColumn('CODING', 'Coding', 'string', CreoleTypes::VARCHAR, false, 32);

		$tMap->addColumn('MERCON', 'Mercon', 'string', CreoleTypes::VARCHAR, false, 1);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);
				
    } 
} 