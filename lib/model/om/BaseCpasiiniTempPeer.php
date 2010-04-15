<?php


abstract class BaseCpasiiniTempPeer {

	
	const DATABASE_NAME = 'propel';

	
	const TABLE_NAME = 'cpasiini_temp';

	
	const CLASS_DEFAULT = 'lib.model.CpasiiniTemp';

	
	const NUM_COLUMNS = 18;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;


	
	const CODPRE = 'cpasiini_temp.CODPRE';

	
	const NOMPRE = 'cpasiini_temp.NOMPRE';

	
	const PERPRE = 'cpasiini_temp.PERPRE';

	
	const ANOPRE = 'cpasiini_temp.ANOPRE';

	
	const MONASI = 'cpasiini_temp.MONASI';

	
	const MONPRC = 'cpasiini_temp.MONPRC';

	
	const MONCOM = 'cpasiini_temp.MONCOM';

	
	const MONCAU = 'cpasiini_temp.MONCAU';

	
	const MONPAG = 'cpasiini_temp.MONPAG';

	
	const MONTRA = 'cpasiini_temp.MONTRA';

	
	const MONTRN = 'cpasiini_temp.MONTRN';

	
	const MONADI = 'cpasiini_temp.MONADI';

	
	const MONDIM = 'cpasiini_temp.MONDIM';

	
	const MONAJU = 'cpasiini_temp.MONAJU';

	
	const MONDIS = 'cpasiini_temp.MONDIS';

	
	const DIFERE = 'cpasiini_temp.DIFERE';

	
	const STATUS = 'cpasiini_temp.STATUS';

	
	const ID = 'cpasiini_temp.ID';

	
	private static $phpNameMap = null;


	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('Codpre', 'Nompre', 'Perpre', 'Anopre', 'Monasi', 'Monprc', 'Moncom', 'Moncau', 'Monpag', 'Montra', 'Montrn', 'Monadi', 'Mondim', 'Monaju', 'Mondis', 'Difere', 'Status', 'Id', ),
		BasePeer::TYPE_COLNAME => array (CpasiiniTempPeer::CODPRE, CpasiiniTempPeer::NOMPRE, CpasiiniTempPeer::PERPRE, CpasiiniTempPeer::ANOPRE, CpasiiniTempPeer::MONASI, CpasiiniTempPeer::MONPRC, CpasiiniTempPeer::MONCOM, CpasiiniTempPeer::MONCAU, CpasiiniTempPeer::MONPAG, CpasiiniTempPeer::MONTRA, CpasiiniTempPeer::MONTRN, CpasiiniTempPeer::MONADI, CpasiiniTempPeer::MONDIM, CpasiiniTempPeer::MONAJU, CpasiiniTempPeer::MONDIS, CpasiiniTempPeer::DIFERE, CpasiiniTempPeer::STATUS, CpasiiniTempPeer::ID, ),
		BasePeer::TYPE_FIELDNAME => array ('codpre', 'nompre', 'perpre', 'anopre', 'monasi', 'monprc', 'moncom', 'moncau', 'monpag', 'montra', 'montrn', 'monadi', 'mondim', 'monaju', 'mondis', 'difere', 'status', 'id', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('Codpre' => 0, 'Nompre' => 1, 'Perpre' => 2, 'Anopre' => 3, 'Monasi' => 4, 'Monprc' => 5, 'Moncom' => 6, 'Moncau' => 7, 'Monpag' => 8, 'Montra' => 9, 'Montrn' => 10, 'Monadi' => 11, 'Mondim' => 12, 'Monaju' => 13, 'Mondis' => 14, 'Difere' => 15, 'Status' => 16, 'Id' => 17, ),
		BasePeer::TYPE_COLNAME => array (CpasiiniTempPeer::CODPRE => 0, CpasiiniTempPeer::NOMPRE => 1, CpasiiniTempPeer::PERPRE => 2, CpasiiniTempPeer::ANOPRE => 3, CpasiiniTempPeer::MONASI => 4, CpasiiniTempPeer::MONPRC => 5, CpasiiniTempPeer::MONCOM => 6, CpasiiniTempPeer::MONCAU => 7, CpasiiniTempPeer::MONPAG => 8, CpasiiniTempPeer::MONTRA => 9, CpasiiniTempPeer::MONTRN => 10, CpasiiniTempPeer::MONADI => 11, CpasiiniTempPeer::MONDIM => 12, CpasiiniTempPeer::MONAJU => 13, CpasiiniTempPeer::MONDIS => 14, CpasiiniTempPeer::DIFERE => 15, CpasiiniTempPeer::STATUS => 16, CpasiiniTempPeer::ID => 17, ),
		BasePeer::TYPE_FIELDNAME => array ('codpre' => 0, 'nompre' => 1, 'perpre' => 2, 'anopre' => 3, 'monasi' => 4, 'monprc' => 5, 'moncom' => 6, 'moncau' => 7, 'monpag' => 8, 'montra' => 9, 'montrn' => 10, 'monadi' => 11, 'mondim' => 12, 'monaju' => 13, 'mondis' => 14, 'difere' => 15, 'status' => 16, 'id' => 17, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, )
	);

	
	public static function getMapBuilder()
	{
		include_once 'lib/model/map/CpasiiniTempMapBuilder.php';
		return BasePeer::getMapBuilder('lib.model.map.CpasiiniTempMapBuilder');
	}
	
	public static function getPhpNameMap()
	{
		if (self::$phpNameMap === null) {
			$map = CpasiiniTempPeer::getTableMap();
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
		return str_replace(CpasiiniTempPeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(CpasiiniTempPeer::CODPRE);

		$criteria->addSelectColumn(CpasiiniTempPeer::NOMPRE);

		$criteria->addSelectColumn(CpasiiniTempPeer::PERPRE);

		$criteria->addSelectColumn(CpasiiniTempPeer::ANOPRE);

		$criteria->addSelectColumn(CpasiiniTempPeer::MONASI);

		$criteria->addSelectColumn(CpasiiniTempPeer::MONPRC);

		$criteria->addSelectColumn(CpasiiniTempPeer::MONCOM);

		$criteria->addSelectColumn(CpasiiniTempPeer::MONCAU);

		$criteria->addSelectColumn(CpasiiniTempPeer::MONPAG);

		$criteria->addSelectColumn(CpasiiniTempPeer::MONTRA);

		$criteria->addSelectColumn(CpasiiniTempPeer::MONTRN);

		$criteria->addSelectColumn(CpasiiniTempPeer::MONADI);

		$criteria->addSelectColumn(CpasiiniTempPeer::MONDIM);

		$criteria->addSelectColumn(CpasiiniTempPeer::MONAJU);

		$criteria->addSelectColumn(CpasiiniTempPeer::MONDIS);

		$criteria->addSelectColumn(CpasiiniTempPeer::DIFERE);

		$criteria->addSelectColumn(CpasiiniTempPeer::STATUS);

		$criteria->addSelectColumn(CpasiiniTempPeer::ID);

	}

	const COUNT = 'COUNT(cpasiini_temp.ID)';
	const COUNT_DISTINCT = 'COUNT(DISTINCT cpasiini_temp.ID)';

	
	public static function doCount(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(CpasiiniTempPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(CpasiiniTempPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = CpasiiniTempPeer::doSelectRS($criteria, $con);
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
		$objects = CpasiiniTempPeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, $con = null)
	{
		return CpasiiniTempPeer::populateObjects(CpasiiniTempPeer::doSelectRS($criteria, $con));
	}
	
	public static function doSelectRS(Criteria $criteria, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if (!$criteria->getSelectColumns()) {
			$criteria = clone $criteria;
			CpasiiniTempPeer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

						return BasePeer::doSelect($criteria, $con);
	}
	
	public static function populateObjects(ResultSet $rs)
	{
		$results = array();
	
				$cls = CpasiiniTempPeer::getOMClass();
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
		return CpasiiniTempPeer::CLASS_DEFAULT;
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
			$comparison = $criteria->getComparison(CpasiiniTempPeer::ID);
			$selectCriteria->add(CpasiiniTempPeer::ID, $criteria->remove(CpasiiniTempPeer::ID), $comparison);

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
			$affectedRows += BasePeer::doDeleteAll(CpasiiniTempPeer::TABLE_NAME, $con);
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
			$con = Propel::getConnection(CpasiiniTempPeer::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} elseif ($values instanceof CpasiiniTemp) {

			$criteria = $values->buildPkeyCriteria();
		} else {
						$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(CpasiiniTempPeer::ID, (array) $values, Criteria::IN);
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

	
	public static function doValidate(CpasiiniTemp $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(CpasiiniTempPeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(CpasiiniTempPeer::TABLE_NAME);

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

		$res =  BasePeer::doValidate(CpasiiniTempPeer::DATABASE_NAME, CpasiiniTempPeer::TABLE_NAME, $columns);
    if ($res !== true) {
        $request = sfContext::getInstance()->getRequest();
        foreach ($res as $failed) {
            $col = CpasiiniTempPeer::translateFieldname($failed->getColumn(), BasePeer::TYPE_COLNAME, BasePeer::TYPE_PHPNAME);
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

		$criteria = new Criteria(CpasiiniTempPeer::DATABASE_NAME);

		$criteria->add(CpasiiniTempPeer::ID, $pk);


		$v = CpasiiniTempPeer::doSelect($criteria, $con);

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
			$criteria->add(CpasiiniTempPeer::ID, $pks, Criteria::IN);
			$objs = CpasiiniTempPeer::doSelect($criteria, $con);
		}
		return $objs;
	}

} 
if (Propel::isInit()) {
			try {
		BaseCpasiiniTempPeer::getMapBuilder();
	} catch (Exception $e) {
		Propel::log('Could not initialize Peer: ' . $e->getMessage(), Propel::LOG_ERR);
	}
} else {
			require_once 'lib/model/map/CpasiiniTempMapBuilder.php';
	Propel::registerMapBuilder('lib.model.map.CpasiiniTempMapBuilder');
}
