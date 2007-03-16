<?php


	
class CpsoltraslaMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.CpsoltraslaMapBuilder';	

    
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
		
		$tMap = $this->dbMap->addTable('cpsoltrasla');
		$tMap->setPhpName('Cpsoltrasla');

		$tMap->setUseIdGenerator(false);

		$tMap->addColumn('REFTRA', 'Reftra', 'string', CreoleTypes::VARCHAR, true, 8);

		$tMap->addColumn('FECTRA', 'Fectra', 'int', CreoleTypes::DATE, false);

		$tMap->addColumn('ANOTRA', 'Anotra', 'string', CreoleTypes::VARCHAR, false, 4);

		$tMap->addColumn('PERTRA', 'Pertra', 'string', CreoleTypes::VARCHAR, true, 2);

		$tMap->addColumn('DESTRA', 'Destra', 'string', CreoleTypes::VARCHAR, false, 250);

		$tMap->addColumn('DESANU', 'Desanu', 'string', CreoleTypes::VARCHAR, false, 250);

		$tMap->addColumn('TOTTRA', 'Tottra', 'double', CreoleTypes::NUMERIC, false);

		$tMap->addColumn('STATRA', 'Statra', 'string', CreoleTypes::VARCHAR, false, 1);

		$tMap->addColumn('CODART', 'Codart', 'string', CreoleTypes::VARCHAR, false, 3);

		$tMap->addColumn('STACON', 'Stacon', 'string', CreoleTypes::VARCHAR, false, 1);

		$tMap->addColumn('STAGOB', 'Stagob', 'string', CreoleTypes::VARCHAR, false, 1);

		$tMap->addColumn('STAPRE', 'Stapre', 'string', CreoleTypes::VARCHAR, false, 1);

		$tMap->addColumn('FECPRE', 'Fecpre', 'int', CreoleTypes::DATE, false);

		$tMap->addColumn('DESPRE', 'Despre', 'string', CreoleTypes::VARCHAR, false, 250);

		$tMap->addColumn('FECCON', 'Feccon', 'int', CreoleTypes::DATE, false);

		$tMap->addColumn('DESCON', 'Descon', 'string', CreoleTypes::VARCHAR, false, 250);

		$tMap->addColumn('DESGOB', 'Desgob', 'string', CreoleTypes::VARCHAR, false, 250);

		$tMap->addColumn('FECGOB', 'Fecgob', 'int', CreoleTypes::DATE, false);

		$tMap->addColumn('JUSTIFICACION', 'Justificacion', 'string', CreoleTypes::VARCHAR, false, 4000);

		$tMap->addColumn('FECCONT', 'Feccont', 'int', CreoleTypes::DATE, false);

		$tMap->addColumn('JUSTIFICACION1', 'Justificacion1', 'string', CreoleTypes::VARCHAR, false, 4000);

		$tMap->addColumn('JUSTIFICACION2', 'Justificacion2', 'string', CreoleTypes::VARCHAR, false, 4000);

		$tMap->addColumn('JUSTIFICACION3', 'Justificacion3', 'string', CreoleTypes::VARCHAR, false, 4000);

		$tMap->addColumn('JUSTIFICACION4', 'Justificacion4', 'string', CreoleTypes::VARCHAR, false, 4000);

		$tMap->addColumn('JUSTIFICACION5', 'Justificacion5', 'string', CreoleTypes::VARCHAR, false, 4000);

		$tMap->addColumn('JUSTIFICACION6', 'Justificacion6', 'string', CreoleTypes::VARCHAR, false, 4000);

		$tMap->addColumn('JUSTIFICACION7', 'Justificacion7', 'string', CreoleTypes::VARCHAR, false, 4000);

		$tMap->addColumn('JUSTIFICACION8', 'Justificacion8', 'string', CreoleTypes::VARCHAR, false, 4000);

		$tMap->addColumn('JUSTIFICACION9', 'Justificacion9', 'string', CreoleTypes::VARCHAR, false, 4000);

		$tMap->addColumn('TIPO', 'Tipo', 'string', CreoleTypes::VARCHAR, false, 100);

		$tMap->addColumn('TIPGAS', 'Tipgas', 'string', CreoleTypes::VARCHAR, false, 250);

		$tMap->addColumn('FECANU', 'Fecanu', 'int', CreoleTypes::DATE, false);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);
				
    } 
} 