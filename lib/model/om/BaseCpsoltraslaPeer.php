<?php


abstract class BaseCpsoltraslaPeer {

	
	const DATABASE_NAME = 'propel';

	
	const TABLE_NAME = 'cpsoltrasla';

	
	const CLASS_DEFAULT = 'lib.model.Cpsoltrasla';

	
	const NUM_COLUMNS = 33;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;


	
	const REFTRA = 'cpsoltrasla.REFTRA';

	
	const FECTRA = 'cpsoltrasla.FECTRA';

	
	const ANOTRA = 'cpsoltrasla.ANOTRA';

	
	const PERTRA = 'cpsoltrasla.PERTRA';

	
	const DESTRA = 'cpsoltrasla.DESTRA';

	
	const DESANU = 'cpsoltrasla.DESANU';

	
	const TOTTRA = 'cpsoltrasla.TOTTRA';

	
	const STATRA = 'cpsoltrasla.STATRA';

	
	const CODART = 'cpsoltrasla.CODART';

	
	const STACON = 'cpsoltrasla.STACON';

	
	const STAGOB = 'cpsoltrasla.STAGOB';

	
	const STAPRE = 'cpsoltrasla.STAPRE';

	
	const FECPRE = 'cpsoltrasla.FECPRE';

	
	const DESPRE = 'cpsoltrasla.DESPRE';

	
	const FECCON = 'cpsoltrasla.FECCON';

	
	const DESCON = 'cpsoltrasla.DESCON';

	
	const DESGOB = 'cpsoltrasla.DESGOB';

	
	const FECGOB = 'cpsoltrasla.FECGOB';

	
	const JUSTIFICACION = 'cpsoltrasla.JUSTIFICACION';

	
	const FECCONT = 'cpsoltrasla.FECCONT';

	
	const JUSTIFICACION1 = 'cpsoltrasla.JUSTIFICACION1';

	
	const JUSTIFICACION2 = 'cpsoltrasla.JUSTIFICACION2';

	
	const JUSTIFICACION3 = 'cpsoltrasla.JUSTIFICACION3';

	
	const JUSTIFICACION4 = 'cpsoltrasla.JUSTIFICACION4';

	
	const JUSTIFICACION5 = 'cpsoltrasla.JUSTIFICACION5';

	
	const JUSTIFICACION6 = 'cpsoltrasla.JUSTIFICACION6';

	
	const JUSTIFICACION7 = 'cpsoltrasla.JUSTIFICACION7';

	
	const JUSTIFICACION8 = 'cpsoltrasla.JUSTIFICACION8';

	
	const JUSTIFICACION9 = 'cpsoltrasla.JUSTIFICACION9';

	
	const TIPO = 'cpsoltrasla.TIPO';

	
	const TIPGAS = 'cpsoltrasla.TIPGAS';

	
	const FECANU = 'cpsoltrasla.FECANU';

	
	const ID = 'cpsoltrasla.ID';

	
	private static $phpNameMap = null;


	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('Reftra', 'Fectra', 'Anotra', 'Pertra', 'Destra', 'Desanu', 'Tottra', 'Statra', 'Codart', 'Stacon', 'Stagob', 'Stapre', 'Fecpre', 'Despre', 'Feccon', 'Descon', 'Desgob', 'Fecgob', 'Justificacion', 'Feccont', 'Justificacion1', 'Justificacion2', 'Justificacion3', 'Justificacion4', 'Justificacion5', 'Justificacion6', 'Justificacion7', 'Justificacion8', 'Justificacion9', 'Tipo', 'Tipgas', 'Fecanu', 'Id', ),
		BasePeer::TYPE_COLNAME => array (CpsoltraslaPeer::REFTRA, CpsoltraslaPeer::FECTRA, CpsoltraslaPeer::ANOTRA, CpsoltraslaPeer::PERTRA, CpsoltraslaPeer::DESTRA, CpsoltraslaPeer::DESANU, CpsoltraslaPeer::TOTTRA, CpsoltraslaPeer::STATRA, CpsoltraslaPeer::CODART, CpsoltraslaPeer::STACON, CpsoltraslaPeer::STAGOB, CpsoltraslaPeer::STAPRE, CpsoltraslaPeer::FECPRE, CpsoltraslaPeer::DESPRE, CpsoltraslaPeer::FECCON, CpsoltraslaPeer::DESCON, CpsoltraslaPeer::DESGOB, CpsoltraslaPeer::FECGOB, CpsoltraslaPeer::JUSTIFICACION, CpsoltraslaPeer::FECCONT, CpsoltraslaPeer::JUSTIFICACION1, CpsoltraslaPeer::JUSTIFICACION2, CpsoltraslaPeer::JUSTIFICACION3, CpsoltraslaPeer::JUSTIFICACION4, CpsoltraslaPeer::JUSTIFICACION5, CpsoltraslaPeer::JUSTIFICACION6, CpsoltraslaPeer::JUSTIFICACION7, CpsoltraslaPeer::JUSTIFICACION8, CpsoltraslaPeer::JUSTIFICACION9, CpsoltraslaPeer::TIPO, CpsoltraslaPeer::TIPGAS, CpsoltraslaPeer::FECANU, CpsoltraslaPeer::ID, ),
		BasePeer::TYPE_FIELDNAME => array ('reftra', 'fectra', 'anotra', 'pertra', 'destra', 'desanu', 'tottra', 'statra', 'codart', 'stacon', 'stagob', 'stapre', 'fecpre', 'despre', 'feccon', 'descon', 'desgob', 'fecgob', 'justificacion', 'feccont', 'justificacion1', 'justificacion2', 'justificacion3', 'justificacion4', 'justificacion5', 'justificacion6', 'justificacion7', 'justificacion8', 'justificacion9', 'tipo', 'tipgas', 'fecanu', 'id', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, 24, 25, 26, 27, 28, 29, 30, 31, 32, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('Reftra' => 0, 'Fectra' => 1, 'Anotra' => 2, 'Pertra' => 3, 'Destra' => 4, 'Desanu' => 5, 'Tottra' => 6, 'Statra' => 7, 'Codart' => 8, 'Stacon' => 9, 'Stagob' => 10, 'Stapre' => 11, 'Fecpre' => 12, 'Despre' => 13, 'Feccon' => 14, 'Descon' => 15, 'Desgob' => 16, 'Fecgob' => 17, 'Justificacion' => 18, 'Feccont' => 19, 'Justificacion1' => 20, 'Justificacion2' => 21, 'Justificacion3' => 22, 'Justificacion4' => 23, 'Justificacion5' => 24, 'Justificacion6' => 25, 'Justificacion7' => 26, 'Justificacion8' => 27, 'Justificacion9' => 28, 'Tipo' => 29, 'Tipgas' => 30, 'Fecanu' => 31, 'Id' => 32, ),
		BasePeer::TYPE_COLNAME => array (CpsoltraslaPeer::REFTRA => 0, CpsoltraslaPeer::FECTRA => 1, CpsoltraslaPeer::ANOTRA => 2, CpsoltraslaPeer::PERTRA => 3, CpsoltraslaPeer::DESTRA => 4, CpsoltraslaPeer::DESANU => 5, CpsoltraslaPeer::TOTTRA => 6, CpsoltraslaPeer::STATRA => 7, CpsoltraslaPeer::CODART => 8, CpsoltraslaPeer::STACON => 9, CpsoltraslaPeer::STAGOB => 10, CpsoltraslaPeer::STAPRE => 11, CpsoltraslaPeer::FECPRE => 12, CpsoltraslaPeer::DESPRE => 13, CpsoltraslaPeer::FECCON => 14, CpsoltraslaPeer::DESCON => 15, CpsoltraslaPeer::DESGOB => 16, CpsoltraslaPeer::FECGOB => 17, CpsoltraslaPeer::JUSTIFICACION => 18, CpsoltraslaPeer::FECCONT => 19, CpsoltraslaPeer::JUSTIFICACION1 => 20, CpsoltraslaPeer::JUSTIFICACION2 => 21, CpsoltraslaPeer::JUSTIFICACION3 => 22, CpsoltraslaPeer::JUSTIFICACION4 => 23, CpsoltraslaPeer::JUSTIFICACION5 => 24, CpsoltraslaPeer::JUSTIFICACION6 => 25, CpsoltraslaPeer::JUSTIFICACION7 => 26, CpsoltraslaPeer::JUSTIFICACION8 => 27, CpsoltraslaPeer::JUSTIFICACION9 => 28, CpsoltraslaPeer::TIPO => 29, CpsoltraslaPeer::TIPGAS => 30, CpsoltraslaPeer::FECANU => 31, CpsoltraslaPeer::ID => 32, ),
		BasePeer::TYPE_FIELDNAME => array ('reftra' => 0, 'fectra' => 1, 'anotra' => 2, 'pertra' => 3, 'destra' => 4, 'desanu' => 5, 'tottra' => 6, 'statra' => 7, 'codart' => 8, 'stacon' => 9, 'stagob' => 10, 'stapre' => 11, 'fecpre' => 12, 'despre' => 13, 'feccon' => 14, 'descon' => 15, 'desgob' => 16, 'fecgob' => 17, 'justificacion' => 18, 'feccont' => 19, 'justificacion1' => 20, 'justificacion2' => 21, 'justificacion3' => 22, 'justificacion4' => 23, 'justificacion5' => 24, 'justificacion6' => 25, 'justificacion7' => 26, 'justificacion8' => 27, 'justificacion9' => 28, 'tipo' => 29, 'tipgas' => 30, 'fecanu' => 31, 'id' => 32, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, 24, 25, 26, 27, 28, 29, 30, 31, 32, )
	);

	
	public static function getMapBuilder()
	{
		include_once 'lib/model/map/CpsoltraslaMapBuilder.php';
		return BasePeer::getMapBuilder('lib.model.map.CpsoltraslaMapBuilder');
	}
	
	public static function getPhpNameMap()
	{
		if (self::$phpNameMap === null) {
			$map = CpsoltraslaPeer::getTableMap();
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
		return str_replace(CpsoltraslaPeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(CpsoltraslaPeer::REFTRA);

		$criteria->addSelectColumn(CpsoltraslaPeer::FECTRA);

		$criteria->addSelectColumn(CpsoltraslaPeer::ANOTRA);

		$criteria->addSelectColumn(CpsoltraslaPeer::PERTRA);

		$criteria->addSelectColumn(CpsoltraslaPeer::DESTRA);

		$criteria->addSelectColumn(CpsoltraslaPeer::DESANU);

		$criteria->addSelectColumn(CpsoltraslaPeer::TOTTRA);

		$criteria->addSelectColumn(CpsoltraslaPeer::STATRA);

		$criteria->addSelectColumn(CpsoltraslaPeer::CODART);

		$criteria->addSelectColumn(CpsoltraslaPeer::STACON);

		$criteria->addSelectColumn(CpsoltraslaPeer::STAGOB);

		$criteria->addSelectColumn(CpsoltraslaPeer::STAPRE);

		$criteria->addSelectColumn(CpsoltraslaPeer::FECPRE);

		$criteria->addSelectColumn(CpsoltraslaPeer::DESPRE);

		$criteria->addSelectColumn(CpsoltraslaPeer::FECCON);

		$criteria->addSelectColumn(CpsoltraslaPeer::DESCON);

		$criteria->addSelectColumn(CpsoltraslaPeer::DESGOB);

		$criteria->addSelectColumn(CpsoltraslaPeer::FECGOB);

		$criteria->addSelectColumn(CpsoltraslaPeer::JUSTIFICACION);

		$criteria->addSelectColumn(CpsoltraslaPeer::FECCONT);

		$criteria->addSelectColumn(CpsoltraslaPeer::JUSTIFICACION1);

		$criteria->addSelectColumn(CpsoltraslaPeer::JUSTIFICACION2);

		$criteria->addSelectColumn(CpsoltraslaPeer::JUSTIFICACION3);

		$criteria->addSelectColumn(CpsoltraslaPeer::JUSTIFICACION4);

		$criteria->addSelectColumn(CpsoltraslaPeer::JUSTIFICACION5);

		$criteria->addSelectColumn(CpsoltraslaPeer::JUSTIFICACION6);

		$criteria->addSelectColumn(CpsoltraslaPeer::JUSTIFICACION7);

		$criteria->addSelectColumn(CpsoltraslaPeer::JUSTIFICACION8);

		$criteria->addSelectColumn(CpsoltraslaPeer::JUSTIFICACION9);

		$criteria->addSelectColumn(CpsoltraslaPeer::TIPO);

		$criteria->addSelectColumn(CpsoltraslaPeer::TIPGAS);

		$criteria->addSelectColumn(CpsoltraslaPeer::FECANU);

		$criteria->addSelectColumn(CpsoltraslaPeer::ID);

	}

	const COUNT = 'COUNT(cpsoltrasla.ID)';
	const COUNT_DISTINCT = 'COUNT(DISTINCT cpsoltrasla.ID)';

	
	public static function doCount(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(CpsoltraslaPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(CpsoltraslaPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = CpsoltraslaPeer::doSelectRS($criteria, $con);
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
		$objects = CpsoltraslaPeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, $con = null)
	{
		return CpsoltraslaPeer::populateObjects(CpsoltraslaPeer::doSelectRS($criteria, $con));
	}
	
	public static function doSelectRS(Criteria $criteria, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if (!$criteria->getSelectColumns()) {
			$criteria = clone $criteria;
			CpsoltraslaPeer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

						return BasePeer::doSelect($criteria, $con);
	}
	
	public static function populateObjects(ResultSet $rs)
	{
		$results = array();
	
				$cls = CpsoltraslaPeer::getOMClass();
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
		return CpsoltraslaPeer::CLASS_DEFAULT;
	}

	
	public static function doInsert($values, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} else {
			$criteria = $values->buildCriteria(); 		}


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
			$comparison = $criteria->getComparison(CpsoltraslaPeer::ID);
			$selectCriteria->add(CpsoltraslaPeer::ID, $criteria->remove(CpsoltraslaPeer::ID), $comparison);

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
			$affectedRows += BasePeer::doDeleteAll(CpsoltraslaPeer::TABLE_NAME, $con);
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
			$con = Propel::getConnection(CpsoltraslaPeer::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} elseif ($values instanceof Cpsoltrasla) {

			$criteria = $values->buildPkeyCriteria();
		} else {
						$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(CpsoltraslaPeer::ID, (array) $values, Criteria::IN);
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

	
	public static function doValidate(Cpsoltrasla $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(CpsoltraslaPeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(CpsoltraslaPeer::TABLE_NAME);

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

		$res =  BasePeer::doValidate(CpsoltraslaPeer::DATABASE_NAME, CpsoltraslaPeer::TABLE_NAME, $columns);
    if ($res !== true) {
        $request = sfContext::getInstance()->getRequest();
        foreach ($res as $failed) {
            $col = CpsoltraslaPeer::translateFieldname($failed->getColumn(), BasePeer::TYPE_COLNAME, BasePeer::TYPE_PHPNAME);
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

		$criteria = new Criteria(CpsoltraslaPeer::DATABASE_NAME);

		$criteria->add(CpsoltraslaPeer::ID, $pk);


		$v = CpsoltraslaPeer::doSelect($criteria, $con);

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
			$criteria->add(CpsoltraslaPeer::ID, $pks, Criteria::IN);
			$objs = CpsoltraslaPeer::doSelect($criteria, $con);
		}
		return $objs;
	}

} 
if (Propel::isInit()) {
			try {
		BaseCpsoltraslaPeer::getMapBuilder();
	} catch (Exception $e) {
		Propel::log('Could not initialize Peer: ' . $e->getMessage(), Propel::LOG_ERR);
	}
} else {
			require_once 'lib/model/map/CpsoltraslaMapBuilder.php';
	Propel::registerMapBuilder('lib.model.map.CpsoltraslaMapBuilder');
}
