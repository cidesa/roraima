<?php


abstract class BaseLisolegrdetPeer {

	
	const DATABASE_NAME = 'propel';

	
	const TABLE_NAME = 'lisolegrdet';

	
	const CLASS_DEFAULT = 'lib.model.Lisolegrdet';

	
	const NUM_COLUMNS = 14;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;


	
	const NUMSOL = 'lisolegrdet.NUMSOL';

	
	const CODART = 'lisolegrdet.CODART';

	
	const CODCAT = 'lisolegrdet.CODCAT';

	
	const CODPRE = 'lisolegrdet.CODPRE';

	
	const UNIMED = 'lisolegrdet.UNIMED';

	
	const CANSOL = 'lisolegrdet.CANSOL';

	
	const COSTO = 'lisolegrdet.COSTO';

	
	const SUBTOT = 'lisolegrdet.SUBTOT';

	
	const MONREC = 'lisolegrdet.MONREC';

	
	const MONTOT = 'lisolegrdet.MONTOT';

	
	const STATUS = 'lisolegrdet.STATUS';

	
	const CODMON = 'lisolegrdet.CODMON';

	
	const VALCAM = 'lisolegrdet.VALCAM';

	
	const ID = 'lisolegrdet.ID';

	
	private static $phpNameMap = null;


	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('Numsol', 'Codart', 'Codcat', 'Codpre', 'Unimed', 'Cansol', 'Costo', 'Subtot', 'Monrec', 'Montot', 'Status', 'Codmon', 'Valcam', 'Id', ),
		BasePeer::TYPE_COLNAME => array (LisolegrdetPeer::NUMSOL, LisolegrdetPeer::CODART, LisolegrdetPeer::CODCAT, LisolegrdetPeer::CODPRE, LisolegrdetPeer::UNIMED, LisolegrdetPeer::CANSOL, LisolegrdetPeer::COSTO, LisolegrdetPeer::SUBTOT, LisolegrdetPeer::MONREC, LisolegrdetPeer::MONTOT, LisolegrdetPeer::STATUS, LisolegrdetPeer::CODMON, LisolegrdetPeer::VALCAM, LisolegrdetPeer::ID, ),
		BasePeer::TYPE_FIELDNAME => array ('numsol', 'codart', 'codcat', 'codpre', 'unimed', 'cansol', 'costo', 'subtot', 'monrec', 'montot', 'status', 'codmon', 'valcam', 'id', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('Numsol' => 0, 'Codart' => 1, 'Codcat' => 2, 'Codpre' => 3, 'Unimed' => 4, 'Cansol' => 5, 'Costo' => 6, 'Subtot' => 7, 'Monrec' => 8, 'Montot' => 9, 'Status' => 10, 'Codmon' => 11, 'Valcam' => 12, 'Id' => 13, ),
		BasePeer::TYPE_COLNAME => array (LisolegrdetPeer::NUMSOL => 0, LisolegrdetPeer::CODART => 1, LisolegrdetPeer::CODCAT => 2, LisolegrdetPeer::CODPRE => 3, LisolegrdetPeer::UNIMED => 4, LisolegrdetPeer::CANSOL => 5, LisolegrdetPeer::COSTO => 6, LisolegrdetPeer::SUBTOT => 7, LisolegrdetPeer::MONREC => 8, LisolegrdetPeer::MONTOT => 9, LisolegrdetPeer::STATUS => 10, LisolegrdetPeer::CODMON => 11, LisolegrdetPeer::VALCAM => 12, LisolegrdetPeer::ID => 13, ),
		BasePeer::TYPE_FIELDNAME => array ('numsol' => 0, 'codart' => 1, 'codcat' => 2, 'codpre' => 3, 'unimed' => 4, 'cansol' => 5, 'costo' => 6, 'subtot' => 7, 'monrec' => 8, 'montot' => 9, 'status' => 10, 'codmon' => 11, 'valcam' => 12, 'id' => 13, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, )
	);

	
	public static function getMapBuilder()
	{
		include_once 'lib/model/map/LisolegrdetMapBuilder.php';
		return BasePeer::getMapBuilder('lib.model.map.LisolegrdetMapBuilder');
	}
	
	public static function getPhpNameMap()
	{
		if (self::$phpNameMap === null) {
			$map = LisolegrdetPeer::getTableMap();
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
		return str_replace(LisolegrdetPeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(LisolegrdetPeer::NUMSOL);

		$criteria->addSelectColumn(LisolegrdetPeer::CODART);

		$criteria->addSelectColumn(LisolegrdetPeer::CODCAT);

		$criteria->addSelectColumn(LisolegrdetPeer::CODPRE);

		$criteria->addSelectColumn(LisolegrdetPeer::UNIMED);

		$criteria->addSelectColumn(LisolegrdetPeer::CANSOL);

		$criteria->addSelectColumn(LisolegrdetPeer::COSTO);

		$criteria->addSelectColumn(LisolegrdetPeer::SUBTOT);

		$criteria->addSelectColumn(LisolegrdetPeer::MONREC);

		$criteria->addSelectColumn(LisolegrdetPeer::MONTOT);

		$criteria->addSelectColumn(LisolegrdetPeer::STATUS);

		$criteria->addSelectColumn(LisolegrdetPeer::CODMON);

		$criteria->addSelectColumn(LisolegrdetPeer::VALCAM);

		$criteria->addSelectColumn(LisolegrdetPeer::ID);

	}

	const COUNT = 'COUNT(lisolegrdet.ID)';
	const COUNT_DISTINCT = 'COUNT(DISTINCT lisolegrdet.ID)';

	
	public static function doCount(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(LisolegrdetPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(LisolegrdetPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = LisolegrdetPeer::doSelectRS($criteria, $con);
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
		$objects = LisolegrdetPeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, $con = null)
	{
		return LisolegrdetPeer::populateObjects(LisolegrdetPeer::doSelectRS($criteria, $con));
	}
	
	public static function doSelectRS(Criteria $criteria, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if (!$criteria->getSelectColumns()) {
			$criteria = clone $criteria;
			LisolegrdetPeer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

						return BasePeer::doSelect($criteria, $con);
	}
	
	public static function populateObjects(ResultSet $rs)
	{
		$results = array();
	
				$cls = LisolegrdetPeer::getOMClass();
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
		return LisolegrdetPeer::CLASS_DEFAULT;
	}

	
	public static function doInsert($values, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} else {
			$criteria = $values->buildCriteria(); 		}

		$criteria->remove(LisolegrdetPeer::ID); 

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
			$comparison = $criteria->getComparison(LisolegrdetPeer::ID);
			$selectCriteria->add(LisolegrdetPeer::ID, $criteria->remove(LisolegrdetPeer::ID), $comparison);

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
			$affectedRows += BasePeer::doDeleteAll(LisolegrdetPeer::TABLE_NAME, $con);
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
			$con = Propel::getConnection(LisolegrdetPeer::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} elseif ($values instanceof Lisolegrdet) {

			$criteria = $values->buildPkeyCriteria();
		} else {
						$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(LisolegrdetPeer::ID, (array) $values, Criteria::IN);
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

	
	public static function doValidate(Lisolegrdet $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(LisolegrdetPeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(LisolegrdetPeer::TABLE_NAME);

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

		$res =  BasePeer::doValidate(LisolegrdetPeer::DATABASE_NAME, LisolegrdetPeer::TABLE_NAME, $columns);
    if ($res !== true) {
        $request = sfContext::getInstance()->getRequest();
        foreach ($res as $failed) {
            $col = LisolegrdetPeer::translateFieldname($failed->getColumn(), BasePeer::TYPE_COLNAME, BasePeer::TYPE_PHPNAME);
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

		$criteria = new Criteria(LisolegrdetPeer::DATABASE_NAME);

		$criteria->add(LisolegrdetPeer::ID, $pk);


		$v = LisolegrdetPeer::doSelect($criteria, $con);

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
			$criteria->add(LisolegrdetPeer::ID, $pks, Criteria::IN);
			$objs = LisolegrdetPeer::doSelect($criteria, $con);
		}
		return $objs;
	}

} 
if (Propel::isInit()) {
			try {
		BaseLisolegrdetPeer::getMapBuilder();
	} catch (Exception $e) {
		Propel::log('Could not initialize Peer: ' . $e->getMessage(), Propel::LOG_ERR);
	}
} else {
			require_once 'lib/model/map/LisolegrdetMapBuilder.php';
	Propel::registerMapBuilder('lib.model.map.LisolegrdetMapBuilder');
}
