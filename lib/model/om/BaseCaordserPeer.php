<?php


abstract class BaseCaordserPeer {

	
	const DATABASE_NAME = 'propel';

	
	const TABLE_NAME = 'caordser';

	
	const CLASS_DEFAULT = 'lib.model.Caordser';

	
	const NUM_COLUMNS = 15;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;


	
	const ORDSER = 'caordser.ORDSER';

	
	const FECSER = 'caordser.FECSER';

	
	const CODPRO = 'caordser.CODPRO';

	
	const CODCAT = 'caordser.CODCAT';

	
	const DESORD = 'caordser.DESORD';

	
	const CRECON = 'caordser.CRECON';

	
	const PLAENT = 'caordser.PLAENT';

	
	const TIECAN = 'caordser.TIECAN';

	
	const MONORD = 'caordser.MONORD';

	
	const STAORD = 'caordser.STAORD';

	
	const AFEPRE = 'caordser.AFEPRE';

	
	const CEDRIF = 'caordser.CEDRIF';

	
	const REFCOM = 'caordser.REFCOM';

	
	const FECANU = 'caordser.FECANU';

	
	const ID = 'caordser.ID';

	
	private static $phpNameMap = null;


	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('Ordser', 'Fecser', 'Codpro', 'Codcat', 'Desord', 'Crecon', 'Plaent', 'Tiecan', 'Monord', 'Staord', 'Afepre', 'Cedrif', 'Refcom', 'Fecanu', 'Id', ),
		BasePeer::TYPE_COLNAME => array (CaordserPeer::ORDSER, CaordserPeer::FECSER, CaordserPeer::CODPRO, CaordserPeer::CODCAT, CaordserPeer::DESORD, CaordserPeer::CRECON, CaordserPeer::PLAENT, CaordserPeer::TIECAN, CaordserPeer::MONORD, CaordserPeer::STAORD, CaordserPeer::AFEPRE, CaordserPeer::CEDRIF, CaordserPeer::REFCOM, CaordserPeer::FECANU, CaordserPeer::ID, ),
		BasePeer::TYPE_FIELDNAME => array ('ordser', 'fecser', 'codpro', 'codcat', 'desord', 'crecon', 'plaent', 'tiecan', 'monord', 'staord', 'afepre', 'cedrif', 'refcom', 'fecanu', 'id', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('Ordser' => 0, 'Fecser' => 1, 'Codpro' => 2, 'Codcat' => 3, 'Desord' => 4, 'Crecon' => 5, 'Plaent' => 6, 'Tiecan' => 7, 'Monord' => 8, 'Staord' => 9, 'Afepre' => 10, 'Cedrif' => 11, 'Refcom' => 12, 'Fecanu' => 13, 'Id' => 14, ),
		BasePeer::TYPE_COLNAME => array (CaordserPeer::ORDSER => 0, CaordserPeer::FECSER => 1, CaordserPeer::CODPRO => 2, CaordserPeer::CODCAT => 3, CaordserPeer::DESORD => 4, CaordserPeer::CRECON => 5, CaordserPeer::PLAENT => 6, CaordserPeer::TIECAN => 7, CaordserPeer::MONORD => 8, CaordserPeer::STAORD => 9, CaordserPeer::AFEPRE => 10, CaordserPeer::CEDRIF => 11, CaordserPeer::REFCOM => 12, CaordserPeer::FECANU => 13, CaordserPeer::ID => 14, ),
		BasePeer::TYPE_FIELDNAME => array ('ordser' => 0, 'fecser' => 1, 'codpro' => 2, 'codcat' => 3, 'desord' => 4, 'crecon' => 5, 'plaent' => 6, 'tiecan' => 7, 'monord' => 8, 'staord' => 9, 'afepre' => 10, 'cedrif' => 11, 'refcom' => 12, 'fecanu' => 13, 'id' => 14, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, )
	);

	
	public static function getMapBuilder()
	{
		include_once 'lib/model/map/CaordserMapBuilder.php';
		return BasePeer::getMapBuilder('lib.model.map.CaordserMapBuilder');
	}
	
	public static function getPhpNameMap()
	{
		if (self::$phpNameMap === null) {
			$map = CaordserPeer::getTableMap();
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
		return str_replace(CaordserPeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(CaordserPeer::ORDSER);

		$criteria->addSelectColumn(CaordserPeer::FECSER);

		$criteria->addSelectColumn(CaordserPeer::CODPRO);

		$criteria->addSelectColumn(CaordserPeer::CODCAT);

		$criteria->addSelectColumn(CaordserPeer::DESORD);

		$criteria->addSelectColumn(CaordserPeer::CRECON);

		$criteria->addSelectColumn(CaordserPeer::PLAENT);

		$criteria->addSelectColumn(CaordserPeer::TIECAN);

		$criteria->addSelectColumn(CaordserPeer::MONORD);

		$criteria->addSelectColumn(CaordserPeer::STAORD);

		$criteria->addSelectColumn(CaordserPeer::AFEPRE);

		$criteria->addSelectColumn(CaordserPeer::CEDRIF);

		$criteria->addSelectColumn(CaordserPeer::REFCOM);

		$criteria->addSelectColumn(CaordserPeer::FECANU);

		$criteria->addSelectColumn(CaordserPeer::ID);

	}

	const COUNT = 'COUNT(caordser.ID)';
	const COUNT_DISTINCT = 'COUNT(DISTINCT caordser.ID)';

	
	public static function doCount(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(CaordserPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(CaordserPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = CaordserPeer::doSelectRS($criteria, $con);
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
		$objects = CaordserPeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, $con = null)
	{
		return CaordserPeer::populateObjects(CaordserPeer::doSelectRS($criteria, $con));
	}
	
	public static function doSelectRS(Criteria $criteria, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if (!$criteria->getSelectColumns()) {
			$criteria = clone $criteria;
			CaordserPeer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

						return BasePeer::doSelect($criteria, $con);
	}
	
	public static function populateObjects(ResultSet $rs)
	{
		$results = array();
	
				$cls = CaordserPeer::getOMClass();
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
		return CaordserPeer::CLASS_DEFAULT;
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
			$comparison = $criteria->getComparison(CaordserPeer::ID);
			$selectCriteria->add(CaordserPeer::ID, $criteria->remove(CaordserPeer::ID), $comparison);

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
			$affectedRows += BasePeer::doDeleteAll(CaordserPeer::TABLE_NAME, $con);
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
			$con = Propel::getConnection(CaordserPeer::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} elseif ($values instanceof Caordser) {

			$criteria = $values->buildPkeyCriteria();
		} else {
						$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(CaordserPeer::ID, (array) $values, Criteria::IN);
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

	
	public static function doValidate(Caordser $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(CaordserPeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(CaordserPeer::TABLE_NAME);

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

		$res =  BasePeer::doValidate(CaordserPeer::DATABASE_NAME, CaordserPeer::TABLE_NAME, $columns);
    if ($res !== true) {
        $request = sfContext::getInstance()->getRequest();
        foreach ($res as $failed) {
            $col = CaordserPeer::translateFieldname($failed->getColumn(), BasePeer::TYPE_COLNAME, BasePeer::TYPE_PHPNAME);
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

		$criteria = new Criteria(CaordserPeer::DATABASE_NAME);

		$criteria->add(CaordserPeer::ID, $pk);


		$v = CaordserPeer::doSelect($criteria, $con);

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
			$criteria->add(CaordserPeer::ID, $pks, Criteria::IN);
			$objs = CaordserPeer::doSelect($criteria, $con);
		}
		return $objs;
	}

} 
if (Propel::isInit()) {
			try {
		BaseCaordserPeer::getMapBuilder();
	} catch (Exception $e) {
		Propel::log('Could not initialize Peer: ' . $e->getMessage(), Propel::LOG_ERR);
	}
} else {
			require_once 'lib/model/map/CaordserMapBuilder.php';
	Propel::registerMapBuilder('lib.model.map.CaordserMapBuilder');
}
