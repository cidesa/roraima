<?php


abstract class BaseNpdefespclaudetPeer {

	
	const DATABASE_NAME = 'propel';

	
	const TABLE_NAME = 'npdefespclaudet';

	
	const CLASS_DEFAULT = 'lib.model.nomina.Npdefespclaudet';

	
	const NUM_COLUMNS = 11;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;


	
	const CODNOM = 'npdefespclaudet.CODNOM';

	
	const DESCRIPCLAU = 'npdefespclaudet.DESCRIPCLAU';

	
	const CODPAR = 'npdefespclaudet.CODPAR';

	
	const CODRET = 'npdefespclaudet.CODRET';

	
	const TOTRET = 'npdefespclaudet.TOTRET';

	
	const NUMDIAANT = 'npdefespclaudet.NUMDIAANT';

	
	const PORANOANT = 'npdefespclaudet.PORANOANT';

	
	const APARTIRMES = 'npdefespclaudet.APARTIRMES';

	
	const PORMESANT = 'npdefespclaudet.PORMESANT';

	
	const TIPSALDIAANT = 'npdefespclaudet.TIPSALDIAANT';

	
	const ID = 'npdefespclaudet.ID';

	
	private static $phpNameMap = null;


	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('Codnom', 'Descripclau', 'Codpar', 'Codret', 'Totret', 'Numdiaant', 'Poranoant', 'Apartirmes', 'Pormesant', 'Tipsaldiaant', 'Id', ),
		BasePeer::TYPE_COLNAME => array (NpdefespclaudetPeer::CODNOM, NpdefespclaudetPeer::DESCRIPCLAU, NpdefespclaudetPeer::CODPAR, NpdefespclaudetPeer::CODRET, NpdefespclaudetPeer::TOTRET, NpdefespclaudetPeer::NUMDIAANT, NpdefespclaudetPeer::PORANOANT, NpdefespclaudetPeer::APARTIRMES, NpdefespclaudetPeer::PORMESANT, NpdefespclaudetPeer::TIPSALDIAANT, NpdefespclaudetPeer::ID, ),
		BasePeer::TYPE_FIELDNAME => array ('codnom', 'descripclau', 'codpar', 'codret', 'totret', 'numdiaant', 'poranoant', 'apartirmes', 'pormesant', 'tipsaldiaant', 'id', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('Codnom' => 0, 'Descripclau' => 1, 'Codpar' => 2, 'Codret' => 3, 'Totret' => 4, 'Numdiaant' => 5, 'Poranoant' => 6, 'Apartirmes' => 7, 'Pormesant' => 8, 'Tipsaldiaant' => 9, 'Id' => 10, ),
		BasePeer::TYPE_COLNAME => array (NpdefespclaudetPeer::CODNOM => 0, NpdefespclaudetPeer::DESCRIPCLAU => 1, NpdefespclaudetPeer::CODPAR => 2, NpdefespclaudetPeer::CODRET => 3, NpdefespclaudetPeer::TOTRET => 4, NpdefespclaudetPeer::NUMDIAANT => 5, NpdefespclaudetPeer::PORANOANT => 6, NpdefespclaudetPeer::APARTIRMES => 7, NpdefespclaudetPeer::PORMESANT => 8, NpdefespclaudetPeer::TIPSALDIAANT => 9, NpdefespclaudetPeer::ID => 10, ),
		BasePeer::TYPE_FIELDNAME => array ('codnom' => 0, 'descripclau' => 1, 'codpar' => 2, 'codret' => 3, 'totret' => 4, 'numdiaant' => 5, 'poranoant' => 6, 'apartirmes' => 7, 'pormesant' => 8, 'tipsaldiaant' => 9, 'id' => 10, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, )
	);

	
	public static function getMapBuilder()
	{
		include_once 'lib/model/nomina/map/NpdefespclaudetMapBuilder.php';
		return BasePeer::getMapBuilder('lib.model.nomina.map.NpdefespclaudetMapBuilder');
	}
	
	public static function getPhpNameMap()
	{
		if (self::$phpNameMap === null) {
			$map = NpdefespclaudetPeer::getTableMap();
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
		return str_replace(NpdefespclaudetPeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(NpdefespclaudetPeer::CODNOM);

		$criteria->addSelectColumn(NpdefespclaudetPeer::DESCRIPCLAU);

		$criteria->addSelectColumn(NpdefespclaudetPeer::CODPAR);

		$criteria->addSelectColumn(NpdefespclaudetPeer::CODRET);

		$criteria->addSelectColumn(NpdefespclaudetPeer::TOTRET);

		$criteria->addSelectColumn(NpdefespclaudetPeer::NUMDIAANT);

		$criteria->addSelectColumn(NpdefespclaudetPeer::PORANOANT);

		$criteria->addSelectColumn(NpdefespclaudetPeer::APARTIRMES);

		$criteria->addSelectColumn(NpdefespclaudetPeer::PORMESANT);

		$criteria->addSelectColumn(NpdefespclaudetPeer::TIPSALDIAANT);

		$criteria->addSelectColumn(NpdefespclaudetPeer::ID);

	}

	const COUNT = 'COUNT(npdefespclaudet.ID)';
	const COUNT_DISTINCT = 'COUNT(DISTINCT npdefespclaudet.ID)';

	
	public static function doCount(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(NpdefespclaudetPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(NpdefespclaudetPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = NpdefespclaudetPeer::doSelectRS($criteria, $con);
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
		$objects = NpdefespclaudetPeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, $con = null)
	{
		return NpdefespclaudetPeer::populateObjects(NpdefespclaudetPeer::doSelectRS($criteria, $con));
	}
	
	public static function doSelectRS(Criteria $criteria, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if (!$criteria->getSelectColumns()) {
			$criteria = clone $criteria;
			NpdefespclaudetPeer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

						return BasePeer::doSelect($criteria, $con);
	}
	
	public static function populateObjects(ResultSet $rs)
	{
		$results = array();
	
				$cls = NpdefespclaudetPeer::getOMClass();
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
		return NpdefespclaudetPeer::CLASS_DEFAULT;
	}

	
	public static function doInsert($values, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} else {
			$criteria = $values->buildCriteria(); 		}

		$criteria->remove(NpdefespclaudetPeer::ID); 

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
			$comparison = $criteria->getComparison(NpdefespclaudetPeer::ID);
			$selectCriteria->add(NpdefespclaudetPeer::ID, $criteria->remove(NpdefespclaudetPeer::ID), $comparison);

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
			$affectedRows += BasePeer::doDeleteAll(NpdefespclaudetPeer::TABLE_NAME, $con);
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
			$con = Propel::getConnection(NpdefespclaudetPeer::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} elseif ($values instanceof Npdefespclaudet) {

			$criteria = $values->buildPkeyCriteria();
		} else {
						$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(NpdefespclaudetPeer::ID, (array) $values, Criteria::IN);
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

	
	public static function doValidate(Npdefespclaudet $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(NpdefespclaudetPeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(NpdefespclaudetPeer::TABLE_NAME);

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

		$res =  BasePeer::doValidate(NpdefespclaudetPeer::DATABASE_NAME, NpdefespclaudetPeer::TABLE_NAME, $columns);
    if ($res !== true) {
        $request = sfContext::getInstance()->getRequest();
        foreach ($res as $failed) {
            $col = NpdefespclaudetPeer::translateFieldname($failed->getColumn(), BasePeer::TYPE_COLNAME, BasePeer::TYPE_PHPNAME);
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

		$criteria = new Criteria(NpdefespclaudetPeer::DATABASE_NAME);

		$criteria->add(NpdefespclaudetPeer::ID, $pk);


		$v = NpdefespclaudetPeer::doSelect($criteria, $con);

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
			$criteria->add(NpdefespclaudetPeer::ID, $pks, Criteria::IN);
			$objs = NpdefespclaudetPeer::doSelect($criteria, $con);
		}
		return $objs;
	}

} 
if (Propel::isInit()) {
			try {
		BaseNpdefespclaudetPeer::getMapBuilder();
	} catch (Exception $e) {
		Propel::log('Could not initialize Peer: ' . $e->getMessage(), Propel::LOG_ERR);
	}
} else {
			require_once 'lib/model/nomina/map/NpdefespclaudetMapBuilder.php';
	Propel::registerMapBuilder('lib.model.nomina.map.NpdefespclaudetMapBuilder');
}
