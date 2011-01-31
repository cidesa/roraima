<?php


abstract class BaseCpdoccomPeer {

	
	const DATABASE_NAME = 'propel';

	
	const TABLE_NAME = 'cpdoccom';

	
	const CLASS_DEFAULT = 'lib.model.presupuesto.Cpdoccom';

	
	const NUM_COLUMNS = 9;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;


	
	const TIPCOM = 'cpdoccom.TIPCOM';

	
	const NOMEXT = 'cpdoccom.NOMEXT';

	
	const NOMABR = 'cpdoccom.NOMABR';

	
	const REFPRC = 'cpdoccom.REFPRC';

	
	const AFEPRC = 'cpdoccom.AFEPRC';

	
	const AFECOM = 'cpdoccom.AFECOM';

	
	const AFEDIS = 'cpdoccom.AFEDIS';

	
	const REQAUT = 'cpdoccom.REQAUT';

	
	const ID = 'cpdoccom.ID';

	
	private static $phpNameMap = null;


	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('Tipcom', 'Nomext', 'Nomabr', 'Refprc', 'Afeprc', 'Afecom', 'Afedis', 'Reqaut', 'Id', ),
		BasePeer::TYPE_COLNAME => array (CpdoccomPeer::TIPCOM, CpdoccomPeer::NOMEXT, CpdoccomPeer::NOMABR, CpdoccomPeer::REFPRC, CpdoccomPeer::AFEPRC, CpdoccomPeer::AFECOM, CpdoccomPeer::AFEDIS, CpdoccomPeer::REQAUT, CpdoccomPeer::ID, ),
		BasePeer::TYPE_FIELDNAME => array ('tipcom', 'nomext', 'nomabr', 'refprc', 'afeprc', 'afecom', 'afedis', 'reqaut', 'id', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('Tipcom' => 0, 'Nomext' => 1, 'Nomabr' => 2, 'Refprc' => 3, 'Afeprc' => 4, 'Afecom' => 5, 'Afedis' => 6, 'Reqaut' => 7, 'Id' => 8, ),
		BasePeer::TYPE_COLNAME => array (CpdoccomPeer::TIPCOM => 0, CpdoccomPeer::NOMEXT => 1, CpdoccomPeer::NOMABR => 2, CpdoccomPeer::REFPRC => 3, CpdoccomPeer::AFEPRC => 4, CpdoccomPeer::AFECOM => 5, CpdoccomPeer::AFEDIS => 6, CpdoccomPeer::REQAUT => 7, CpdoccomPeer::ID => 8, ),
		BasePeer::TYPE_FIELDNAME => array ('tipcom' => 0, 'nomext' => 1, 'nomabr' => 2, 'refprc' => 3, 'afeprc' => 4, 'afecom' => 5, 'afedis' => 6, 'reqaut' => 7, 'id' => 8, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, )
	);

	
	public static function getMapBuilder()
	{
		include_once 'lib/model/presupuesto/map/CpdoccomMapBuilder.php';
		return BasePeer::getMapBuilder('lib.model.presupuesto.map.CpdoccomMapBuilder');
	}
	
	public static function getPhpNameMap()
	{
		if (self::$phpNameMap === null) {
			$map = CpdoccomPeer::getTableMap();
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
		return str_replace(CpdoccomPeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(CpdoccomPeer::TIPCOM);

		$criteria->addSelectColumn(CpdoccomPeer::NOMEXT);

		$criteria->addSelectColumn(CpdoccomPeer::NOMABR);

		$criteria->addSelectColumn(CpdoccomPeer::REFPRC);

		$criteria->addSelectColumn(CpdoccomPeer::AFEPRC);

		$criteria->addSelectColumn(CpdoccomPeer::AFECOM);

		$criteria->addSelectColumn(CpdoccomPeer::AFEDIS);

		$criteria->addSelectColumn(CpdoccomPeer::REQAUT);

		$criteria->addSelectColumn(CpdoccomPeer::ID);

	}

	const COUNT = 'COUNT(cpdoccom.ID)';
	const COUNT_DISTINCT = 'COUNT(DISTINCT cpdoccom.ID)';

	
	public static function doCount(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(CpdoccomPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(CpdoccomPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = CpdoccomPeer::doSelectRS($criteria, $con);
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
		$objects = CpdoccomPeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, $con = null)
	{
		return CpdoccomPeer::populateObjects(CpdoccomPeer::doSelectRS($criteria, $con));
	}
	
	public static function doSelectRS(Criteria $criteria, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if (!$criteria->getSelectColumns()) {
			$criteria = clone $criteria;
			CpdoccomPeer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

						return BasePeer::doSelect($criteria, $con);
	}
	
	public static function populateObjects(ResultSet $rs)
	{
		$results = array();
	
				$cls = CpdoccomPeer::getOMClass();
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
		return CpdoccomPeer::CLASS_DEFAULT;
	}

	
	public static function doInsert($values, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} else {
			$criteria = $values->buildCriteria(); 		}

		$criteria->remove(CpdoccomPeer::ID); 

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
			$comparison = $criteria->getComparison(CpdoccomPeer::ID);
			$selectCriteria->add(CpdoccomPeer::ID, $criteria->remove(CpdoccomPeer::ID), $comparison);

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
			$affectedRows += BasePeer::doDeleteAll(CpdoccomPeer::TABLE_NAME, $con);
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
			$con = Propel::getConnection(CpdoccomPeer::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} elseif ($values instanceof Cpdoccom) {

			$criteria = $values->buildPkeyCriteria();
		} else {
						$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(CpdoccomPeer::ID, (array) $values, Criteria::IN);
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

	
	public static function doValidate(Cpdoccom $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(CpdoccomPeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(CpdoccomPeer::TABLE_NAME);

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

		$res =  BasePeer::doValidate(CpdoccomPeer::DATABASE_NAME, CpdoccomPeer::TABLE_NAME, $columns);
    if ($res !== true) {
        $request = sfContext::getInstance()->getRequest();
        foreach ($res as $failed) {
            $col = CpdoccomPeer::translateFieldname($failed->getColumn(), BasePeer::TYPE_COLNAME, BasePeer::TYPE_PHPNAME);
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

		$criteria = new Criteria(CpdoccomPeer::DATABASE_NAME);

		$criteria->add(CpdoccomPeer::ID, $pk);


		$v = CpdoccomPeer::doSelect($criteria, $con);

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
			$criteria->add(CpdoccomPeer::ID, $pks, Criteria::IN);
			$objs = CpdoccomPeer::doSelect($criteria, $con);
		}
		return $objs;
	}

} 
if (Propel::isInit()) {
			try {
		BaseCpdoccomPeer::getMapBuilder();
	} catch (Exception $e) {
		Propel::log('Could not initialize Peer: ' . $e->getMessage(), Propel::LOG_ERR);
	}
} else {
			require_once 'lib/model/presupuesto/map/CpdoccomMapBuilder.php';
	Propel::registerMapBuilder('lib.model.presupuesto.map.CpdoccomMapBuilder');
}
