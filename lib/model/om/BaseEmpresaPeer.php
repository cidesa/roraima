<?php


abstract class BaseEmpresaPeer {

	
	const DATABASE_NAME = 'propel';

	
	const TABLE_NAME = 'empresa';

	
	const CLASS_DEFAULT = 'lib.model.Empresa';

	
	const NUM_COLUMNS = 43;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;


	
	const CODEMP = 'empresa.CODEMP';

	
	const NOMEMP = 'empresa.NOMEMP';

	
	const DIREMP = 'empresa.DIREMP';

	
	const TLFEMP = 'empresa.TLFEMP';

	
	const CIUEMP = 'empresa.CIUEMP';

	
	const URLEMP = 'empresa.URLEMP';

	
	const FAXEMP = 'empresa.FAXEMP';

	
	const CODPOS = 'empresa.CODPOS';

	
	const GOBEDO = 'empresa.GOBEDO';

	
	const CONEDO = 'empresa.CONEDO';

	
	const CLEEDO = 'empresa.CLEEDO';

	
	const COOPLA = 'empresa.COOPLA';

	
	const DIRPRE = 'empresa.DIRPRE';

	
	const MUNEMP = 'empresa.MUNEMP';

	
	const CIEEDO = 'empresa.CIEEDO';

	
	const CODCTAGAS = 'empresa.CODCTAGAS';

	
	const CODCTABAN = 'empresa.CODCTABAN';

	
	const CODCTARET = 'empresa.CODCTARET';

	
	const CODCTABEN = 'empresa.CODCTABEN';

	
	const CODCTAART = 'empresa.CODCTAART';

	
	const CODCTAGASHAS = 'empresa.CODCTAGASHAS';

	
	const CODCTABANHAS = 'empresa.CODCTABANHAS';

	
	const CODCTARETHAS = 'empresa.CODCTARETHAS';

	
	const CODCTABENHAS = 'empresa.CODCTABENHAS';

	
	const CODCTAARTHAS = 'empresa.CODCTAARTHAS';

	
	const CODCTAPAGEJE = 'empresa.CODCTAPAGEJE';

	
	const CODCTAINGDEVN = 'empresa.CODCTAINGDEVN';

	
	const CODCTAINGDEV = 'empresa.CODCTAINGDEV';

	
	const DIRADM = 'empresa.DIRADM';

	
	const DIRFIN = 'empresa.DIRFIN';

	
	const DIRPER = 'empresa.DIRPER';

	
	const DIRGEN = 'empresa.DIRGEN';

	
	const ANAPRE = 'empresa.ANAPRE';

	
	const ANAPER = 'empresa.ANAPER';

	
	const ANAADM = 'empresa.ANAADM';

	
	const EDOEMP = 'empresa.EDOEMP';

	
	const ENCABEZADO = 'empresa.ENCABEZADO';

	
	const COOEJE = 'empresa.COOEJE';

	
	const PARTIDAIVA = 'empresa.PARTIDAIVA';

	
	const CODEMPFONAVA = 'empresa.CODEMPFONAVA';

	
	const NUMLOT = 'empresa.NUMLOT';

	
	const CODCAT = 'empresa.CODCAT';

	
	const ID = 'empresa.ID';

	
	private static $phpNameMap = null;


	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('Codemp', 'Nomemp', 'Diremp', 'Tlfemp', 'Ciuemp', 'Urlemp', 'Faxemp', 'Codpos', 'Gobedo', 'Conedo', 'Cleedo', 'Coopla', 'Dirpre', 'Munemp', 'Cieedo', 'Codctagas', 'Codctaban', 'Codctaret', 'Codctaben', 'Codctaart', 'Codctagashas', 'Codctabanhas', 'Codctarethas', 'Codctabenhas', 'Codctaarthas', 'Codctapageje', 'Codctaingdevn', 'Codctaingdev', 'Diradm', 'Dirfin', 'Dirper', 'Dirgen', 'Anapre', 'Anaper', 'Anaadm', 'Edoemp', 'Encabezado', 'Cooeje', 'Partidaiva', 'Codempfonava', 'Numlot', 'Codcat', 'Id', ),
		BasePeer::TYPE_COLNAME => array (EmpresaPeer::CODEMP, EmpresaPeer::NOMEMP, EmpresaPeer::DIREMP, EmpresaPeer::TLFEMP, EmpresaPeer::CIUEMP, EmpresaPeer::URLEMP, EmpresaPeer::FAXEMP, EmpresaPeer::CODPOS, EmpresaPeer::GOBEDO, EmpresaPeer::CONEDO, EmpresaPeer::CLEEDO, EmpresaPeer::COOPLA, EmpresaPeer::DIRPRE, EmpresaPeer::MUNEMP, EmpresaPeer::CIEEDO, EmpresaPeer::CODCTAGAS, EmpresaPeer::CODCTABAN, EmpresaPeer::CODCTARET, EmpresaPeer::CODCTABEN, EmpresaPeer::CODCTAART, EmpresaPeer::CODCTAGASHAS, EmpresaPeer::CODCTABANHAS, EmpresaPeer::CODCTARETHAS, EmpresaPeer::CODCTABENHAS, EmpresaPeer::CODCTAARTHAS, EmpresaPeer::CODCTAPAGEJE, EmpresaPeer::CODCTAINGDEVN, EmpresaPeer::CODCTAINGDEV, EmpresaPeer::DIRADM, EmpresaPeer::DIRFIN, EmpresaPeer::DIRPER, EmpresaPeer::DIRGEN, EmpresaPeer::ANAPRE, EmpresaPeer::ANAPER, EmpresaPeer::ANAADM, EmpresaPeer::EDOEMP, EmpresaPeer::ENCABEZADO, EmpresaPeer::COOEJE, EmpresaPeer::PARTIDAIVA, EmpresaPeer::CODEMPFONAVA, EmpresaPeer::NUMLOT, EmpresaPeer::CODCAT, EmpresaPeer::ID, ),
		BasePeer::TYPE_FIELDNAME => array ('codemp', 'nomemp', 'diremp', 'tlfemp', 'ciuemp', 'urlemp', 'faxemp', 'codpos', 'gobedo', 'conedo', 'cleedo', 'coopla', 'dirpre', 'munemp', 'cieedo', 'codctagas', 'codctaban', 'codctaret', 'codctaben', 'codctaart', 'codctagashas', 'codctabanhas', 'codctarethas', 'codctabenhas', 'codctaarthas', 'codctapageje', 'codctaingdevn', 'codctaingdev', 'diradm', 'dirfin', 'dirper', 'dirgen', 'anapre', 'anaper', 'anaadm', 'edoemp', 'encabezado', 'cooeje', 'partidaiva', 'codempfonava', 'numlot', 'codcat', 'id', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, 24, 25, 26, 27, 28, 29, 30, 31, 32, 33, 34, 35, 36, 37, 38, 39, 40, 41, 42, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('Codemp' => 0, 'Nomemp' => 1, 'Diremp' => 2, 'Tlfemp' => 3, 'Ciuemp' => 4, 'Urlemp' => 5, 'Faxemp' => 6, 'Codpos' => 7, 'Gobedo' => 8, 'Conedo' => 9, 'Cleedo' => 10, 'Coopla' => 11, 'Dirpre' => 12, 'Munemp' => 13, 'Cieedo' => 14, 'Codctagas' => 15, 'Codctaban' => 16, 'Codctaret' => 17, 'Codctaben' => 18, 'Codctaart' => 19, 'Codctagashas' => 20, 'Codctabanhas' => 21, 'Codctarethas' => 22, 'Codctabenhas' => 23, 'Codctaarthas' => 24, 'Codctapageje' => 25, 'Codctaingdevn' => 26, 'Codctaingdev' => 27, 'Diradm' => 28, 'Dirfin' => 29, 'Dirper' => 30, 'Dirgen' => 31, 'Anapre' => 32, 'Anaper' => 33, 'Anaadm' => 34, 'Edoemp' => 35, 'Encabezado' => 36, 'Cooeje' => 37, 'Partidaiva' => 38, 'Codempfonava' => 39, 'Numlot' => 40, 'Codcat' => 41, 'Id' => 42, ),
		BasePeer::TYPE_COLNAME => array (EmpresaPeer::CODEMP => 0, EmpresaPeer::NOMEMP => 1, EmpresaPeer::DIREMP => 2, EmpresaPeer::TLFEMP => 3, EmpresaPeer::CIUEMP => 4, EmpresaPeer::URLEMP => 5, EmpresaPeer::FAXEMP => 6, EmpresaPeer::CODPOS => 7, EmpresaPeer::GOBEDO => 8, EmpresaPeer::CONEDO => 9, EmpresaPeer::CLEEDO => 10, EmpresaPeer::COOPLA => 11, EmpresaPeer::DIRPRE => 12, EmpresaPeer::MUNEMP => 13, EmpresaPeer::CIEEDO => 14, EmpresaPeer::CODCTAGAS => 15, EmpresaPeer::CODCTABAN => 16, EmpresaPeer::CODCTARET => 17, EmpresaPeer::CODCTABEN => 18, EmpresaPeer::CODCTAART => 19, EmpresaPeer::CODCTAGASHAS => 20, EmpresaPeer::CODCTABANHAS => 21, EmpresaPeer::CODCTARETHAS => 22, EmpresaPeer::CODCTABENHAS => 23, EmpresaPeer::CODCTAARTHAS => 24, EmpresaPeer::CODCTAPAGEJE => 25, EmpresaPeer::CODCTAINGDEVN => 26, EmpresaPeer::CODCTAINGDEV => 27, EmpresaPeer::DIRADM => 28, EmpresaPeer::DIRFIN => 29, EmpresaPeer::DIRPER => 30, EmpresaPeer::DIRGEN => 31, EmpresaPeer::ANAPRE => 32, EmpresaPeer::ANAPER => 33, EmpresaPeer::ANAADM => 34, EmpresaPeer::EDOEMP => 35, EmpresaPeer::ENCABEZADO => 36, EmpresaPeer::COOEJE => 37, EmpresaPeer::PARTIDAIVA => 38, EmpresaPeer::CODEMPFONAVA => 39, EmpresaPeer::NUMLOT => 40, EmpresaPeer::CODCAT => 41, EmpresaPeer::ID => 42, ),
		BasePeer::TYPE_FIELDNAME => array ('codemp' => 0, 'nomemp' => 1, 'diremp' => 2, 'tlfemp' => 3, 'ciuemp' => 4, 'urlemp' => 5, 'faxemp' => 6, 'codpos' => 7, 'gobedo' => 8, 'conedo' => 9, 'cleedo' => 10, 'coopla' => 11, 'dirpre' => 12, 'munemp' => 13, 'cieedo' => 14, 'codctagas' => 15, 'codctaban' => 16, 'codctaret' => 17, 'codctaben' => 18, 'codctaart' => 19, 'codctagashas' => 20, 'codctabanhas' => 21, 'codctarethas' => 22, 'codctabenhas' => 23, 'codctaarthas' => 24, 'codctapageje' => 25, 'codctaingdevn' => 26, 'codctaingdev' => 27, 'diradm' => 28, 'dirfin' => 29, 'dirper' => 30, 'dirgen' => 31, 'anapre' => 32, 'anaper' => 33, 'anaadm' => 34, 'edoemp' => 35, 'encabezado' => 36, 'cooeje' => 37, 'partidaiva' => 38, 'codempfonava' => 39, 'numlot' => 40, 'codcat' => 41, 'id' => 42, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, 24, 25, 26, 27, 28, 29, 30, 31, 32, 33, 34, 35, 36, 37, 38, 39, 40, 41, 42, )
	);

	
	public static function getMapBuilder()
	{
		include_once 'lib/model/map/EmpresaMapBuilder.php';
		return BasePeer::getMapBuilder('lib.model.map.EmpresaMapBuilder');
	}
	
	public static function getPhpNameMap()
	{
		if (self::$phpNameMap === null) {
			$map = EmpresaPeer::getTableMap();
			$columns = $map->getColumns();
			$nameMap = array();
			foreach ($columns as $column) {
				$nameMap[$column->getPhpName()] = $column->getColumnName();
			}
			self::$phpNameMap = $nameMap;
		}
		return self::$phpNameMap;
	}
	
	static public function translateFieldName($name, $fromType, $toType)
	{
		$toNames = self::getFieldNames($toType);
		$key = isset(self::$fieldKeys[$fromType][$name]) ? self::$fieldKeys[$fromType][$name] : null;
		if ($key === null) {
			throw new PropelException("'$name' could not be found in the field names of type '$fromType'. These are: " . print_r(self::$fieldKeys[$fromType], true));
		}
		return $toNames[$key];
	}

	

	static public function getFieldNames($type = BasePeer::TYPE_PHPNAME)
	{
		if (!array_key_exists($type, self::$fieldNames)) {
			throw new PropelException('Method getFieldNames() expects the parameter $type to be one of the class constants TYPE_PHPNAME, TYPE_COLNAME, TYPE_FIELDNAME, TYPE_NUM. ' . $type . ' was given.');
		}
		return self::$fieldNames[$type];
	}

	
	public static function alias($alias, $column)
	{
		return str_replace(EmpresaPeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(EmpresaPeer::CODEMP);

		$criteria->addSelectColumn(EmpresaPeer::NOMEMP);

		$criteria->addSelectColumn(EmpresaPeer::DIREMP);

		$criteria->addSelectColumn(EmpresaPeer::TLFEMP);

		$criteria->addSelectColumn(EmpresaPeer::CIUEMP);

		$criteria->addSelectColumn(EmpresaPeer::URLEMP);

		$criteria->addSelectColumn(EmpresaPeer::FAXEMP);

		$criteria->addSelectColumn(EmpresaPeer::CODPOS);

		$criteria->addSelectColumn(EmpresaPeer::GOBEDO);

		$criteria->addSelectColumn(EmpresaPeer::CONEDO);

		$criteria->addSelectColumn(EmpresaPeer::CLEEDO);

		$criteria->addSelectColumn(EmpresaPeer::COOPLA);

		$criteria->addSelectColumn(EmpresaPeer::DIRPRE);

		$criteria->addSelectColumn(EmpresaPeer::MUNEMP);

		$criteria->addSelectColumn(EmpresaPeer::CIEEDO);

		$criteria->addSelectColumn(EmpresaPeer::CODCTAGAS);

		$criteria->addSelectColumn(EmpresaPeer::CODCTABAN);

		$criteria->addSelectColumn(EmpresaPeer::CODCTARET);

		$criteria->addSelectColumn(EmpresaPeer::CODCTABEN);

		$criteria->addSelectColumn(EmpresaPeer::CODCTAART);

		$criteria->addSelectColumn(EmpresaPeer::CODCTAGASHAS);

		$criteria->addSelectColumn(EmpresaPeer::CODCTABANHAS);

		$criteria->addSelectColumn(EmpresaPeer::CODCTARETHAS);

		$criteria->addSelectColumn(EmpresaPeer::CODCTABENHAS);

		$criteria->addSelectColumn(EmpresaPeer::CODCTAARTHAS);

		$criteria->addSelectColumn(EmpresaPeer::CODCTAPAGEJE);

		$criteria->addSelectColumn(EmpresaPeer::CODCTAINGDEVN);

		$criteria->addSelectColumn(EmpresaPeer::CODCTAINGDEV);

		$criteria->addSelectColumn(EmpresaPeer::DIRADM);

		$criteria->addSelectColumn(EmpresaPeer::DIRFIN);

		$criteria->addSelectColumn(EmpresaPeer::DIRPER);

		$criteria->addSelectColumn(EmpresaPeer::DIRGEN);

		$criteria->addSelectColumn(EmpresaPeer::ANAPRE);

		$criteria->addSelectColumn(EmpresaPeer::ANAPER);

		$criteria->addSelectColumn(EmpresaPeer::ANAADM);

		$criteria->addSelectColumn(EmpresaPeer::EDOEMP);

		$criteria->addSelectColumn(EmpresaPeer::ENCABEZADO);

		$criteria->addSelectColumn(EmpresaPeer::COOEJE);

		$criteria->addSelectColumn(EmpresaPeer::PARTIDAIVA);

		$criteria->addSelectColumn(EmpresaPeer::CODEMPFONAVA);

		$criteria->addSelectColumn(EmpresaPeer::NUMLOT);

		$criteria->addSelectColumn(EmpresaPeer::CODCAT);

		$criteria->addSelectColumn(EmpresaPeer::ID);

	}

	const COUNT = 'COUNT(empresa.ID)';
	const COUNT_DISTINCT = 'COUNT(DISTINCT empresa.ID)';

	
	public static function doCount(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(EmpresaPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(EmpresaPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = EmpresaPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}
	
	public static function doSelectOne(Criteria $criteria, $con = null)
	{
		$critcopy = clone $criteria;
		$critcopy->setLimit(1);
		$objects = EmpresaPeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, $con = null)
	{
		return EmpresaPeer::populateObjects(EmpresaPeer::doSelectRS($criteria, $con));
	}
	
	public static function doSelectRS(Criteria $criteria, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if (!$criteria->getSelectColumns()) {
			$criteria = clone $criteria;
			EmpresaPeer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

						return BasePeer::doSelect($criteria, $con);
	}
	
	public static function populateObjects(ResultSet $rs)
	{
		$results = array();
	
				$cls = EmpresaPeer::getOMClass();
		$cls = Propel::import($cls);
				while($rs->next()) {
		
			$obj = new $cls();
			$obj->hydrate($rs);
			$results[] = $obj;
			
		}
		return $results;
	}
	
	public static function getTableMap()
	{
		return Propel::getDatabaseMap(self::DATABASE_NAME)->getTable(self::TABLE_NAME);
	}

	
	public static function getOMClass()
	{
		return EmpresaPeer::CLASS_DEFAULT;
	}

	
	public static function doInsert($values, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} else {
			$criteria = $values->buildCriteria(); 		}

		$criteria->remove(EmpresaPeer::ID); 

				$criteria->setDbName(self::DATABASE_NAME);

		try {
									$con->begin();
			$pk = BasePeer::doInsert($criteria, $con);
			$con->commit();
		} catch(PropelException $e) {
			$con->rollback();
			throw $e;
		}

		return $pk;
	}

	
	public static function doUpdate($values, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		$selectCriteria = new Criteria(self::DATABASE_NAME);

		if ($values instanceof Criteria) {
			$criteria = clone $values; 
			$comparison = $criteria->getComparison(EmpresaPeer::ID);
			$selectCriteria->add(EmpresaPeer::ID, $criteria->remove(EmpresaPeer::ID), $comparison);

		} else { 			$criteria = $values->buildCriteria(); 			$selectCriteria = $values->buildPkeyCriteria(); 		}

				$criteria->setDbName(self::DATABASE_NAME);

		return BasePeer::doUpdate($selectCriteria, $criteria, $con);
	}

	
	public static function doDeleteAll($con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}
		$affectedRows = 0; 		try {
									$con->begin();
			$affectedRows += BasePeer::doDeleteAll(EmpresaPeer::TABLE_NAME, $con);
			$con->commit();
			return $affectedRows;
		} catch (PropelException $e) {
			$con->rollback();
			throw $e;
		}
	}

	
	 public static function doDelete($values, $con = null)
	 {
		if ($con === null) {
			$con = Propel::getConnection(EmpresaPeer::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} elseif ($values instanceof Empresa) {

			$criteria = $values->buildPkeyCriteria();
		} else {
						$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(EmpresaPeer::ID, (array) $values, Criteria::IN);
		}

				$criteria->setDbName(self::DATABASE_NAME);

		$affectedRows = 0; 
		try {
									$con->begin();
			
			$affectedRows += BasePeer::doDelete($criteria, $con);
			$con->commit();
			return $affectedRows;
		} catch (PropelException $e) {
			$con->rollback();
			throw $e;
		}
	}

	
	public static function doValidate(Empresa $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(EmpresaPeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(EmpresaPeer::TABLE_NAME);

			if (! is_array($cols)) {
				$cols = array($cols);
			}

			foreach($cols as $colName) {
				if ($tableMap->containsColumn($colName)) {
					$get = 'get' . $tableMap->getColumn($colName)->getPhpName();
					$columns[$colName] = $obj->$get();
				}
			}
		} else {

		}

		$res =  BasePeer::doValidate(EmpresaPeer::DATABASE_NAME, EmpresaPeer::TABLE_NAME, $columns);
    if ($res !== true) {
        $request = sfContext::getInstance()->getRequest();
        foreach ($res as $failed) {
            $col = EmpresaPeer::translateFieldname($failed->getColumn(), BasePeer::TYPE_COLNAME, BasePeer::TYPE_PHPNAME);
            $request->setError($col, $failed->getMessage());
        }
    }

    return $res;
	}

	
	public static function retrieveByPK($pk, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		$criteria = new Criteria(EmpresaPeer::DATABASE_NAME);

		$criteria->add(EmpresaPeer::ID, $pk);


		$v = EmpresaPeer::doSelect($criteria, $con);

		return !empty($v) > 0 ? $v[0] : null;
	}

	
	public static function retrieveByPKs($pks, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		$objs = null;
		if (empty($pks)) {
			$objs = array();
		} else {
			$criteria = new Criteria();
			$criteria->add(EmpresaPeer::ID, $pks, Criteria::IN);
			$objs = EmpresaPeer::doSelect($criteria, $con);
		}
		return $objs;
	}

} 
if (Propel::isInit()) {
			try {
		BaseEmpresaPeer::getMapBuilder();
	} catch (Exception $e) {
		Propel::log('Could not initialize Peer: ' . $e->getMessage(), Propel::LOG_ERR);
	}
} else {
			require_once 'lib/model/map/EmpresaMapBuilder.php';
	Propel::registerMapBuilder('lib.model.map.EmpresaMapBuilder');
}
