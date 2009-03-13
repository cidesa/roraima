<?php


abstract class BaseCidisnivPeer {

	
	const DATABASE_NAME = 'propel';

	
	const TABLE_NAME = 'cidisniv';

	
	const CLASS_DEFAULT = 'lib.model.Cidisniv';

	
	const NUM_COLUMNS = 12;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;


	
	const CODPRE = 'cidisniv.CODPRE';

	
	const MONASI = 'cidisniv.MONASI';

	
	const MODIFICACION = 'cidisniv.MODIFICACION';

	
	const ASIGACTUAL = 'cidisniv.ASIGACTUAL';

	
	const MONPRC = 'cidisniv.MONPRC';

	
	const MONCOM = 'cidisniv.MONCOM';

	
	const MONCAU = 'cidisniv.MONCAU';

	
	const MONPAG = 'cidisniv.MONPAG';

	
	const MONAJU = 'cidisniv.MONAJU';

	
	const MONDIS = 'cidisniv.MONDIS';

	
	const DEUDA = 'cidisniv.DEUDA';

	
	const ID = 'cidisniv.ID';

	
	private static $phpNameMap = null;


	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('Codpre', 'Monasi', 'Modificacion', 'Asigactual', 'Monprc', 'Moncom', 'Moncau', 'Monpag', 'Monaju', 'Mondis', 'Deuda', 'Id', ),
		BasePeer::TYPE_COLNAME => array (CidisnivPeer::CODPRE, CidisnivPeer::MONASI, CidisnivPeer::MODIFICACION, CidisnivPeer::ASIGACTUAL, CidisnivPeer::MONPRC, CidisnivPeer::MONCOM, CidisnivPeer::MONCAU, CidisnivPeer::MONPAG, CidisnivPeer::MONAJU, CidisnivPeer::MONDIS, CidisnivPeer::DEUDA, CidisnivPeer::ID, ),
		BasePeer::TYPE_FIELDNAME => array ('codpre', 'monasi', 'modificacion', 'asigactual', 'monprc', 'moncom', 'moncau', 'monpag', 'monaju', 'mondis', 'deuda', 'id', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('Codpre' => 0, 'Monasi' => 1, 'Modificacion' => 2, 'Asigactual' => 3, 'Monprc' => 4, 'Moncom' => 5, 'Moncau' => 6, 'Monpag' => 7, 'Monaju' => 8, 'Mondis' => 9, 'Deuda' => 10, 'Id' => 11, ),
		BasePeer::TYPE_COLNAME => array (CidisnivPeer::CODPRE => 0, CidisnivPeer::MONASI => 1, CidisnivPeer::MODIFICACION => 2, CidisnivPeer::ASIGACTUAL => 3, CidisnivPeer::MONPRC => 4, CidisnivPeer::MONCOM => 5, CidisnivPeer::MONCAU => 6, CidisnivPeer::MONPAG => 7, CidisnivPeer::MONAJU => 8, CidisnivPeer::MONDIS => 9, CidisnivPeer::DEUDA => 10, CidisnivPeer::ID => 11, ),
		BasePeer::TYPE_FIELDNAME => array ('codpre' => 0, 'monasi' => 1, 'modificacion' => 2, 'asigactual' => 3, 'monprc' => 4, 'moncom' => 5, 'moncau' => 6, 'monpag' => 7, 'monaju' => 8, 'mondis' => 9, 'deuda' => 10, 'id' => 11, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, )
	);

	
	public static function getMapBuilder()
	{
		include_once 'lib/model/map/CidisnivMapBuilder.php';
		return BasePeer::getMapBuilder('lib.model.map.CidisnivMapBuilder');
	}
	
	public static function getPhpNameMap()
	{
		if (self::$phpNameMap === null) {
			$map = CidisnivPeer::getTableMap();
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
		return str_replace(CidisnivPeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(CidisnivPeer::CODPRE);

		$criteria->addSelectColumn(CidisnivPeer::MONASI);

		$criteria->addSelectColumn(CidisnivPeer::MODIFICACION);

		$criteria->addSelectColumn(CidisnivPeer::ASIGACTUAL);

		$criteria->addSelectColumn(CidisnivPeer::MONPRC);

		$criteria->addSelectColumn(CidisnivPeer::MONCOM);

		$criteria->addSelectColumn(CidisnivPeer::MONCAU);

		$criteria->addSelectColumn(CidisnivPeer::MONPAG);

		$criteria->addSelectColumn(CidisnivPeer::MONAJU);

		$criteria->addSelectColumn(CidisnivPeer::MONDIS);

		$criteria->addSelectColumn(CidisnivPeer::DEUDA);

		$criteria->addSelectColumn(CidisnivPeer::ID);

	}

	const COUNT = 'COUNT(cidisniv.ID)';
	const COUNT_DISTINCT = 'COUNT(DISTINCT cidisniv.ID)';

	
	public static function doCount(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(CidisnivPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(CidisnivPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = CidisnivPeer::doSelectRS($criteria, $con);
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
		$objects = CidisnivPeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, $con = null)
	{
		return CidisnivPeer::populateObjects(CidisnivPeer::doSelectRS($criteria, $con));
	}
	
	public static function doSelectRS(Criteria $criteria, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if (!$criteria->getSelectColumns()) {
			$criteria = clone $criteria;
			CidisnivPeer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

						return BasePeer::doSelect($criteria, $con);
	}
	
	public static function populateObjects(ResultSet $rs)
	{
		$results = array();
	
				$cls = CidisnivPeer::getOMClass();
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
		return CidisnivPeer::CLASS_DEFAULT;
	}

	
	public static function doInsert($values, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} else {
			$criteria = $values->buildCriteria(); 		}

		$criteria->remove(CidisnivPeer::ID); 

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
			$comparison = $criteria->getComparison(CidisnivPeer::ID);
			$selectCriteria->add(CidisnivPeer::ID, $criteria->remove(CidisnivPeer::ID), $comparison);

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
			$affectedRows += BasePeer::doDeleteAll(CidisnivPeer::TABLE_NAME, $con);
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
			$con = Propel::getConnection(CidisnivPeer::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} elseif ($values instanceof Cidisniv) {

			$criteria = $values->buildPkeyCriteria();
		} else {
						$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(CidisnivPeer::ID, (array) $values, Criteria::IN);
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

	
	public static function doValidate(Cidisniv $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(CidisnivPeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(CidisnivPeer::TABLE_NAME);

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

		$res =  BasePeer::doValidate(CidisnivPeer::DATABASE_NAME, CidisnivPeer::TABLE_NAME, $columns);
    if ($res !== true) {
        $request = sfContext::getInstance()->getRequest();
        foreach ($res as $failed) {
            $col = CidisnivPeer::translateFieldname($failed->getColumn(), BasePeer::TYPE_COLNAME, BasePeer::TYPE_PHPNAME);
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

		$criteria = new Criteria(CidisnivPeer::DATABASE_NAME);

		$criteria->add(CidisnivPeer::ID, $pk);


		$v = CidisnivPeer::doSelect($criteria, $con);

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
			$criteria->add(CidisnivPeer::ID, $pks, Criteria::IN);
			$objs = CidisnivPeer::doSelect($criteria, $con);
		}
		return $objs;
	}

} 
if (Propel::isInit()) {
			try {
		BaseCidisnivPeer::getMapBuilder();
	} catch (Exception $e) {
		Propel::log('Could not initialize Peer: ' . $e->getMessage(), Propel::LOG_ERR);
	}
} else {
			require_once 'lib/model/map/CidisnivMapBuilder.php';
	Propel::registerMapBuilder('lib.model.map.CidisnivMapBuilder');
}
