<?php


abstract class BaseOcadjobrPeer {

	
	const DATABASE_NAME = 'propel';

	
	const TABLE_NAME = 'ocadjobr';

	
	const CLASS_DEFAULT = 'lib.model.Ocadjobr';

	
	const NUM_COLUMNS = 16;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;


	
	const CODADJ = 'ocadjobr.CODADJ';

	
	const TIPADJ = 'ocadjobr.TIPADJ';

	
	const FECADJ = 'ocadjobr.FECADJ';

	
	const CODOBR = 'ocadjobr.CODOBR';

	
	const FECINIPUB = 'ocadjobr.FECINIPUB';

	
	const FECFINPUB = 'ocadjobr.FECFINPUB';

	
	const FECBASEINI = 'ocadjobr.FECBASEINI';

	
	const FECBASEFIN = 'ocadjobr.FECBASEFIN';

	
	const FECPREOFINI = 'ocadjobr.FECPREOFINI';

	
	const FECPREOFFIN = 'ocadjobr.FECPREOFFIN';

	
	const FECANAOFINI = 'ocadjobr.FECANAOFINI';

	
	const FECANAOFFIN = 'ocadjobr.FECANAOFFIN';

	
	const CODPROGAN = 'ocadjobr.CODPROGAN';

	
	const FECGAN = 'ocadjobr.FECGAN';

	
	const STATUS = 'ocadjobr.STATUS';

	
	const ID = 'ocadjobr.ID';

	
	private static $phpNameMap = null;


	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('Codadj', 'Tipadj', 'Fecadj', 'Codobr', 'Fecinipub', 'Fecfinpub', 'Fecbaseini', 'Fecbasefin', 'Fecpreofini', 'Fecpreoffin', 'Fecanaofini', 'Fecanaoffin', 'Codprogan', 'Fecgan', 'Status', 'Id', ),
		BasePeer::TYPE_COLNAME => array (OcadjobrPeer::CODADJ, OcadjobrPeer::TIPADJ, OcadjobrPeer::FECADJ, OcadjobrPeer::CODOBR, OcadjobrPeer::FECINIPUB, OcadjobrPeer::FECFINPUB, OcadjobrPeer::FECBASEINI, OcadjobrPeer::FECBASEFIN, OcadjobrPeer::FECPREOFINI, OcadjobrPeer::FECPREOFFIN, OcadjobrPeer::FECANAOFINI, OcadjobrPeer::FECANAOFFIN, OcadjobrPeer::CODPROGAN, OcadjobrPeer::FECGAN, OcadjobrPeer::STATUS, OcadjobrPeer::ID, ),
		BasePeer::TYPE_FIELDNAME => array ('codadj', 'tipadj', 'fecadj', 'codobr', 'fecinipub', 'fecfinpub', 'fecbaseini', 'fecbasefin', 'fecpreofini', 'fecpreoffin', 'fecanaofini', 'fecanaoffin', 'codprogan', 'fecgan', 'status', 'id', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('Codadj' => 0, 'Tipadj' => 1, 'Fecadj' => 2, 'Codobr' => 3, 'Fecinipub' => 4, 'Fecfinpub' => 5, 'Fecbaseini' => 6, 'Fecbasefin' => 7, 'Fecpreofini' => 8, 'Fecpreoffin' => 9, 'Fecanaofini' => 10, 'Fecanaoffin' => 11, 'Codprogan' => 12, 'Fecgan' => 13, 'Status' => 14, 'Id' => 15, ),
		BasePeer::TYPE_COLNAME => array (OcadjobrPeer::CODADJ => 0, OcadjobrPeer::TIPADJ => 1, OcadjobrPeer::FECADJ => 2, OcadjobrPeer::CODOBR => 3, OcadjobrPeer::FECINIPUB => 4, OcadjobrPeer::FECFINPUB => 5, OcadjobrPeer::FECBASEINI => 6, OcadjobrPeer::FECBASEFIN => 7, OcadjobrPeer::FECPREOFINI => 8, OcadjobrPeer::FECPREOFFIN => 9, OcadjobrPeer::FECANAOFINI => 10, OcadjobrPeer::FECANAOFFIN => 11, OcadjobrPeer::CODPROGAN => 12, OcadjobrPeer::FECGAN => 13, OcadjobrPeer::STATUS => 14, OcadjobrPeer::ID => 15, ),
		BasePeer::TYPE_FIELDNAME => array ('codadj' => 0, 'tipadj' => 1, 'fecadj' => 2, 'codobr' => 3, 'fecinipub' => 4, 'fecfinpub' => 5, 'fecbaseini' => 6, 'fecbasefin' => 7, 'fecpreofini' => 8, 'fecpreoffin' => 9, 'fecanaofini' => 10, 'fecanaoffin' => 11, 'codprogan' => 12, 'fecgan' => 13, 'status' => 14, 'id' => 15, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, )
	);

	
	public static function getMapBuilder()
	{
		include_once 'lib/model/map/OcadjobrMapBuilder.php';
		return BasePeer::getMapBuilder('lib.model.map.OcadjobrMapBuilder');
	}
	
	public static function getPhpNameMap()
	{
		if (self::$phpNameMap === null) {
			$map = OcadjobrPeer::getTableMap();
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
		return str_replace(OcadjobrPeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(OcadjobrPeer::CODADJ);

		$criteria->addSelectColumn(OcadjobrPeer::TIPADJ);

		$criteria->addSelectColumn(OcadjobrPeer::FECADJ);

		$criteria->addSelectColumn(OcadjobrPeer::CODOBR);

		$criteria->addSelectColumn(OcadjobrPeer::FECINIPUB);

		$criteria->addSelectColumn(OcadjobrPeer::FECFINPUB);

		$criteria->addSelectColumn(OcadjobrPeer::FECBASEINI);

		$criteria->addSelectColumn(OcadjobrPeer::FECBASEFIN);

		$criteria->addSelectColumn(OcadjobrPeer::FECPREOFINI);

		$criteria->addSelectColumn(OcadjobrPeer::FECPREOFFIN);

		$criteria->addSelectColumn(OcadjobrPeer::FECANAOFINI);

		$criteria->addSelectColumn(OcadjobrPeer::FECANAOFFIN);

		$criteria->addSelectColumn(OcadjobrPeer::CODPROGAN);

		$criteria->addSelectColumn(OcadjobrPeer::FECGAN);

		$criteria->addSelectColumn(OcadjobrPeer::STATUS);

		$criteria->addSelectColumn(OcadjobrPeer::ID);

	}

	const COUNT = 'COUNT(ocadjobr.ID)';
	const COUNT_DISTINCT = 'COUNT(DISTINCT ocadjobr.ID)';

	
	public static function doCount(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(OcadjobrPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(OcadjobrPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = OcadjobrPeer::doSelectRS($criteria, $con);
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
		$objects = OcadjobrPeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, $con = null)
	{
		return OcadjobrPeer::populateObjects(OcadjobrPeer::doSelectRS($criteria, $con));
	}
	
	public static function doSelectRS(Criteria $criteria, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if (!$criteria->getSelectColumns()) {
			$criteria = clone $criteria;
			OcadjobrPeer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

						return BasePeer::doSelect($criteria, $con);
	}
	
	public static function populateObjects(ResultSet $rs)
	{
		$results = array();
	
				$cls = OcadjobrPeer::getOMClass();
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
		return OcadjobrPeer::CLASS_DEFAULT;
	}

	
	public static function doInsert($values, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} else {
			$criteria = $values->buildCriteria(); 		}

		$criteria->remove(OcadjobrPeer::ID); 

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
			$comparison = $criteria->getComparison(OcadjobrPeer::ID);
			$selectCriteria->add(OcadjobrPeer::ID, $criteria->remove(OcadjobrPeer::ID), $comparison);

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
			$affectedRows += BasePeer::doDeleteAll(OcadjobrPeer::TABLE_NAME, $con);
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
			$con = Propel::getConnection(OcadjobrPeer::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} elseif ($values instanceof Ocadjobr) {

			$criteria = $values->buildPkeyCriteria();
		} else {
						$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(OcadjobrPeer::ID, (array) $values, Criteria::IN);
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

	
	public static function doValidate(Ocadjobr $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(OcadjobrPeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(OcadjobrPeer::TABLE_NAME);

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

		$res =  BasePeer::doValidate(OcadjobrPeer::DATABASE_NAME, OcadjobrPeer::TABLE_NAME, $columns);
    if ($res !== true) {
        $request = sfContext::getInstance()->getRequest();
        foreach ($res as $failed) {
            $col = OcadjobrPeer::translateFieldname($failed->getColumn(), BasePeer::TYPE_COLNAME, BasePeer::TYPE_PHPNAME);
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

		$criteria = new Criteria(OcadjobrPeer::DATABASE_NAME);

		$criteria->add(OcadjobrPeer::ID, $pk);


		$v = OcadjobrPeer::doSelect($criteria, $con);

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
			$criteria->add(OcadjobrPeer::ID, $pks, Criteria::IN);
			$objs = OcadjobrPeer::doSelect($criteria, $con);
		}
		return $objs;
	}

} 
if (Propel::isInit()) {
			try {
		BaseOcadjobrPeer::getMapBuilder();
	} catch (Exception $e) {
		Propel::log('Could not initialize Peer: ' . $e->getMessage(), Propel::LOG_ERR);
	}
} else {
			require_once 'lib/model/map/OcadjobrMapBuilder.php';
	Propel::registerMapBuilder('lib.model.map.OcadjobrMapBuilder');
}
