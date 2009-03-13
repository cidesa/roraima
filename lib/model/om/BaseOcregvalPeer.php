<?php


abstract class BaseOcregvalPeer {

	
	const DATABASE_NAME = 'propel';

	
	const TABLE_NAME = 'ocregval';

	
	const CLASS_DEFAULT = 'lib.model.Ocregval';

	
	const NUM_COLUMNS = 29;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;


	
	const MONVAL = 'ocregval.MONVAL';

	
	const SALLIQ = 'ocregval.SALLIQ';

	
	const RETACU = 'ocregval.RETACU';

	
	const MONIVA = 'ocregval.MONIVA';

	
	const AMOANT = 'ocregval.AMOANT';

	
	const STAVAL = 'ocregval.STAVAL';

	
	const PORIVA = 'ocregval.PORIVA';

	
	const PORANT = 'ocregval.PORANT';

	
	const MONPAG = 'ocregval.MONPAG';

	
	const SALANT = 'ocregval.SALANT';

	
	const GASREE = 'ocregval.GASREE';

	
	const SUBTOT = 'ocregval.SUBTOT';

	
	const MONFUL = 'ocregval.MONFUL';

	
	const MONFIA = 'ocregval.MONFIA';

	
	const MONANT = 'ocregval.MONANT';

	
	const MONPERIVA = 'ocregval.MONPERIVA';

	
	const CODCON = 'ocregval.CODCON';

	
	const NUMVAL = 'ocregval.NUMVAL';

	
	const CODTIPVAL = 'ocregval.CODTIPVAL';

	
	const FECINI = 'ocregval.FECINI';

	
	const FECFIN = 'ocregval.FECFIN';

	
	const FECREG = 'ocregval.FECREG';

	
	const AUMOBR = 'ocregval.AUMOBR';

	
	const DISOBR = 'ocregval.DISOBR';

	
	const OBREXT = 'ocregval.OBREXT';

	
	const MONPER = 'ocregval.MONPER';

	
	const TOTDED = 'ocregval.TOTDED';

	
	const OBSVAL = 'ocregval.OBSVAL';

	
	const ID = 'ocregval.ID';

	
	private static $phpNameMap = null;


	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('Monval', 'Salliq', 'Retacu', 'Moniva', 'Amoant', 'Staval', 'Poriva', 'Porant', 'Monpag', 'Salant', 'Gasree', 'Subtot', 'Monful', 'Monfia', 'Monant', 'Monperiva', 'Codcon', 'Numval', 'Codtipval', 'Fecini', 'Fecfin', 'Fecreg', 'Aumobr', 'Disobr', 'Obrext', 'Monper', 'Totded', 'Obsval', 'Id', ),
		BasePeer::TYPE_COLNAME => array (OcregvalPeer::MONVAL, OcregvalPeer::SALLIQ, OcregvalPeer::RETACU, OcregvalPeer::MONIVA, OcregvalPeer::AMOANT, OcregvalPeer::STAVAL, OcregvalPeer::PORIVA, OcregvalPeer::PORANT, OcregvalPeer::MONPAG, OcregvalPeer::SALANT, OcregvalPeer::GASREE, OcregvalPeer::SUBTOT, OcregvalPeer::MONFUL, OcregvalPeer::MONFIA, OcregvalPeer::MONANT, OcregvalPeer::MONPERIVA, OcregvalPeer::CODCON, OcregvalPeer::NUMVAL, OcregvalPeer::CODTIPVAL, OcregvalPeer::FECINI, OcregvalPeer::FECFIN, OcregvalPeer::FECREG, OcregvalPeer::AUMOBR, OcregvalPeer::DISOBR, OcregvalPeer::OBREXT, OcregvalPeer::MONPER, OcregvalPeer::TOTDED, OcregvalPeer::OBSVAL, OcregvalPeer::ID, ),
		BasePeer::TYPE_FIELDNAME => array ('monval', 'salliq', 'retacu', 'moniva', 'amoant', 'staval', 'poriva', 'porant', 'monpag', 'salant', 'gasree', 'subtot', 'monful', 'monfia', 'monant', 'monperiva', 'codcon', 'numval', 'codtipval', 'fecini', 'fecfin', 'fecreg', 'aumobr', 'disobr', 'obrext', 'monper', 'totded', 'obsval', 'id', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, 24, 25, 26, 27, 28, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('Monval' => 0, 'Salliq' => 1, 'Retacu' => 2, 'Moniva' => 3, 'Amoant' => 4, 'Staval' => 5, 'Poriva' => 6, 'Porant' => 7, 'Monpag' => 8, 'Salant' => 9, 'Gasree' => 10, 'Subtot' => 11, 'Monful' => 12, 'Monfia' => 13, 'Monant' => 14, 'Monperiva' => 15, 'Codcon' => 16, 'Numval' => 17, 'Codtipval' => 18, 'Fecini' => 19, 'Fecfin' => 20, 'Fecreg' => 21, 'Aumobr' => 22, 'Disobr' => 23, 'Obrext' => 24, 'Monper' => 25, 'Totded' => 26, 'Obsval' => 27, 'Id' => 28, ),
		BasePeer::TYPE_COLNAME => array (OcregvalPeer::MONVAL => 0, OcregvalPeer::SALLIQ => 1, OcregvalPeer::RETACU => 2, OcregvalPeer::MONIVA => 3, OcregvalPeer::AMOANT => 4, OcregvalPeer::STAVAL => 5, OcregvalPeer::PORIVA => 6, OcregvalPeer::PORANT => 7, OcregvalPeer::MONPAG => 8, OcregvalPeer::SALANT => 9, OcregvalPeer::GASREE => 10, OcregvalPeer::SUBTOT => 11, OcregvalPeer::MONFUL => 12, OcregvalPeer::MONFIA => 13, OcregvalPeer::MONANT => 14, OcregvalPeer::MONPERIVA => 15, OcregvalPeer::CODCON => 16, OcregvalPeer::NUMVAL => 17, OcregvalPeer::CODTIPVAL => 18, OcregvalPeer::FECINI => 19, OcregvalPeer::FECFIN => 20, OcregvalPeer::FECREG => 21, OcregvalPeer::AUMOBR => 22, OcregvalPeer::DISOBR => 23, OcregvalPeer::OBREXT => 24, OcregvalPeer::MONPER => 25, OcregvalPeer::TOTDED => 26, OcregvalPeer::OBSVAL => 27, OcregvalPeer::ID => 28, ),
		BasePeer::TYPE_FIELDNAME => array ('monval' => 0, 'salliq' => 1, 'retacu' => 2, 'moniva' => 3, 'amoant' => 4, 'staval' => 5, 'poriva' => 6, 'porant' => 7, 'monpag' => 8, 'salant' => 9, 'gasree' => 10, 'subtot' => 11, 'monful' => 12, 'monfia' => 13, 'monant' => 14, 'monperiva' => 15, 'codcon' => 16, 'numval' => 17, 'codtipval' => 18, 'fecini' => 19, 'fecfin' => 20, 'fecreg' => 21, 'aumobr' => 22, 'disobr' => 23, 'obrext' => 24, 'monper' => 25, 'totded' => 26, 'obsval' => 27, 'id' => 28, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, 24, 25, 26, 27, 28, )
	);

	
	public static function getMapBuilder()
	{
		include_once 'lib/model/map/OcregvalMapBuilder.php';
		return BasePeer::getMapBuilder('lib.model.map.OcregvalMapBuilder');
	}
	
	public static function getPhpNameMap()
	{
		if (self::$phpNameMap === null) {
			$map = OcregvalPeer::getTableMap();
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
		return str_replace(OcregvalPeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(OcregvalPeer::MONVAL);

		$criteria->addSelectColumn(OcregvalPeer::SALLIQ);

		$criteria->addSelectColumn(OcregvalPeer::RETACU);

		$criteria->addSelectColumn(OcregvalPeer::MONIVA);

		$criteria->addSelectColumn(OcregvalPeer::AMOANT);

		$criteria->addSelectColumn(OcregvalPeer::STAVAL);

		$criteria->addSelectColumn(OcregvalPeer::PORIVA);

		$criteria->addSelectColumn(OcregvalPeer::PORANT);

		$criteria->addSelectColumn(OcregvalPeer::MONPAG);

		$criteria->addSelectColumn(OcregvalPeer::SALANT);

		$criteria->addSelectColumn(OcregvalPeer::GASREE);

		$criteria->addSelectColumn(OcregvalPeer::SUBTOT);

		$criteria->addSelectColumn(OcregvalPeer::MONFUL);

		$criteria->addSelectColumn(OcregvalPeer::MONFIA);

		$criteria->addSelectColumn(OcregvalPeer::MONANT);

		$criteria->addSelectColumn(OcregvalPeer::MONPERIVA);

		$criteria->addSelectColumn(OcregvalPeer::CODCON);

		$criteria->addSelectColumn(OcregvalPeer::NUMVAL);

		$criteria->addSelectColumn(OcregvalPeer::CODTIPVAL);

		$criteria->addSelectColumn(OcregvalPeer::FECINI);

		$criteria->addSelectColumn(OcregvalPeer::FECFIN);

		$criteria->addSelectColumn(OcregvalPeer::FECREG);

		$criteria->addSelectColumn(OcregvalPeer::AUMOBR);

		$criteria->addSelectColumn(OcregvalPeer::DISOBR);

		$criteria->addSelectColumn(OcregvalPeer::OBREXT);

		$criteria->addSelectColumn(OcregvalPeer::MONPER);

		$criteria->addSelectColumn(OcregvalPeer::TOTDED);

		$criteria->addSelectColumn(OcregvalPeer::OBSVAL);

		$criteria->addSelectColumn(OcregvalPeer::ID);

	}

	const COUNT = 'COUNT(ocregval.ID)';
	const COUNT_DISTINCT = 'COUNT(DISTINCT ocregval.ID)';

	
	public static function doCount(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(OcregvalPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(OcregvalPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = OcregvalPeer::doSelectRS($criteria, $con);
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
		$objects = OcregvalPeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, $con = null)
	{
		return OcregvalPeer::populateObjects(OcregvalPeer::doSelectRS($criteria, $con));
	}
	
	public static function doSelectRS(Criteria $criteria, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if (!$criteria->getSelectColumns()) {
			$criteria = clone $criteria;
			OcregvalPeer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

						return BasePeer::doSelect($criteria, $con);
	}
	
	public static function populateObjects(ResultSet $rs)
	{
		$results = array();
	
				$cls = OcregvalPeer::getOMClass();
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
		return OcregvalPeer::CLASS_DEFAULT;
	}

	
	public static function doInsert($values, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} else {
			$criteria = $values->buildCriteria(); 		}

		$criteria->remove(OcregvalPeer::ID); 

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
			$comparison = $criteria->getComparison(OcregvalPeer::ID);
			$selectCriteria->add(OcregvalPeer::ID, $criteria->remove(OcregvalPeer::ID), $comparison);

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
			$affectedRows += BasePeer::doDeleteAll(OcregvalPeer::TABLE_NAME, $con);
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
			$con = Propel::getConnection(OcregvalPeer::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} elseif ($values instanceof Ocregval) {

			$criteria = $values->buildPkeyCriteria();
		} else {
						$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(OcregvalPeer::ID, (array) $values, Criteria::IN);
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

	
	public static function doValidate(Ocregval $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(OcregvalPeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(OcregvalPeer::TABLE_NAME);

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

		$res =  BasePeer::doValidate(OcregvalPeer::DATABASE_NAME, OcregvalPeer::TABLE_NAME, $columns);
    if ($res !== true) {
        $request = sfContext::getInstance()->getRequest();
        foreach ($res as $failed) {
            $col = OcregvalPeer::translateFieldname($failed->getColumn(), BasePeer::TYPE_COLNAME, BasePeer::TYPE_PHPNAME);
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

		$criteria = new Criteria(OcregvalPeer::DATABASE_NAME);

		$criteria->add(OcregvalPeer::ID, $pk);


		$v = OcregvalPeer::doSelect($criteria, $con);

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
			$criteria->add(OcregvalPeer::ID, $pks, Criteria::IN);
			$objs = OcregvalPeer::doSelect($criteria, $con);
		}
		return $objs;
	}

} 
if (Propel::isInit()) {
			try {
		BaseOcregvalPeer::getMapBuilder();
	} catch (Exception $e) {
		Propel::log('Could not initialize Peer: ' . $e->getMessage(), Propel::LOG_ERR);
	}
} else {
			require_once 'lib/model/map/OcregvalMapBuilder.php';
	Propel::registerMapBuilder('lib.model.map.OcregvalMapBuilder');
}
