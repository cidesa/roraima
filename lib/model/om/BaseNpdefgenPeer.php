<?php


abstract class BaseNpdefgenPeer {

	
	const DATABASE_NAME = 'propel';

	
	const TABLE_NAME = 'npdefgen';

	
	const CLASS_DEFAULT = 'lib.model.Npdefgen';

	
	const NUM_COLUMNS = 34;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;


	
	const CODEMP = 'npdefgen.CODEMP';

	
	const LONCODCAR = 'npdefgen.LONCODCAR';

	
	const LONCODEMP = 'npdefgen.LONCODEMP';

	
	const LONCODORG = 'npdefgen.LONCODORG';

	
	const LONCODUNI = 'npdefgen.LONCODUNI';

	
	const RUPCAR = 'npdefgen.RUPCAR';

	
	const RUPEMP = 'npdefgen.RUPEMP';

	
	const RUPORG = 'npdefgen.RUPORG';

	
	const RUPUNI = 'npdefgen.RUPUNI';

	
	const FORCAR = 'npdefgen.FORCAR';

	
	const FOREMP = 'npdefgen.FOREMP';

	
	const FORORG = 'npdefgen.FORORG';

	
	const FORUNI = 'npdefgen.FORUNI';

	
	const REDMON = 'npdefgen.REDMON';

	
	const CODPRE = 'npdefgen.CODPRE';

	
	const CODVAC = 'npdefgen.CODVAC';

	
	const CODVACFRA = 'npdefgen.CODVACFRA';

	
	const CODVACCOL = 'npdefgen.CODVACCOL';

	
	const CODISLR = 'npdefgen.CODISLR';

	
	const CODPRES = 'npdefgen.CODPRES';

	
	const CODSSO = 'npdefgen.CODSSO';

	
	const SUEINT = 'npdefgen.SUEINT';

	
	const ASICONNOM = 'npdefgen.ASICONNOM';

	
	const CIERAC = 'npdefgen.CIERAC';

	
	const FORESC = 'npdefgen.FORESC';

	
	const NUMREC = 'npdefgen.NUMREC';

	
	const FORCARRAC = 'npdefgen.FORCARRAC';

	
	const FORCAROCP = 'npdefgen.FORCAROCP';

	
	const CORREL = 'npdefgen.CORREL';

	
	const PORCTICK = 'npdefgen.PORCTICK';

	
	const UNITRIB = 'npdefgen.UNITRIB';

	
	const NUMTICK = 'npdefgen.NUMTICK';

	
	const DIASEM = 'npdefgen.DIASEM';

	
	const ID = 'npdefgen.ID';

	
	private static $phpNameMap = null;


	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('Codemp', 'Loncodcar', 'Loncodemp', 'Loncodorg', 'Loncoduni', 'Rupcar', 'Rupemp', 'Ruporg', 'Rupuni', 'Forcar', 'Foremp', 'Fororg', 'Foruni', 'Redmon', 'Codpre', 'Codvac', 'Codvacfra', 'Codvaccol', 'Codislr', 'Codpres', 'Codsso', 'Sueint', 'Asiconnom', 'Cierac', 'Foresc', 'Numrec', 'Forcarrac', 'Forcarocp', 'Correl', 'Porctick', 'Unitrib', 'Numtick', 'Diasem', 'Id', ),
		BasePeer::TYPE_COLNAME => array (NpdefgenPeer::CODEMP, NpdefgenPeer::LONCODCAR, NpdefgenPeer::LONCODEMP, NpdefgenPeer::LONCODORG, NpdefgenPeer::LONCODUNI, NpdefgenPeer::RUPCAR, NpdefgenPeer::RUPEMP, NpdefgenPeer::RUPORG, NpdefgenPeer::RUPUNI, NpdefgenPeer::FORCAR, NpdefgenPeer::FOREMP, NpdefgenPeer::FORORG, NpdefgenPeer::FORUNI, NpdefgenPeer::REDMON, NpdefgenPeer::CODPRE, NpdefgenPeer::CODVAC, NpdefgenPeer::CODVACFRA, NpdefgenPeer::CODVACCOL, NpdefgenPeer::CODISLR, NpdefgenPeer::CODPRES, NpdefgenPeer::CODSSO, NpdefgenPeer::SUEINT, NpdefgenPeer::ASICONNOM, NpdefgenPeer::CIERAC, NpdefgenPeer::FORESC, NpdefgenPeer::NUMREC, NpdefgenPeer::FORCARRAC, NpdefgenPeer::FORCAROCP, NpdefgenPeer::CORREL, NpdefgenPeer::PORCTICK, NpdefgenPeer::UNITRIB, NpdefgenPeer::NUMTICK, NpdefgenPeer::DIASEM, NpdefgenPeer::ID, ),
		BasePeer::TYPE_FIELDNAME => array ('codemp', 'loncodcar', 'loncodemp', 'loncodorg', 'loncoduni', 'rupcar', 'rupemp', 'ruporg', 'rupuni', 'forcar', 'foremp', 'fororg', 'foruni', 'redmon', 'codpre', 'codvac', 'codvacfra', 'codvaccol', 'codislr', 'codpres', 'codsso', 'sueint', 'asiconnom', 'cierac', 'foresc', 'numrec', 'forcarrac', 'forcarocp', 'correl', 'porctick', 'unitrib', 'numtick', 'diasem', 'id', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, 24, 25, 26, 27, 28, 29, 30, 31, 32, 33, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('Codemp' => 0, 'Loncodcar' => 1, 'Loncodemp' => 2, 'Loncodorg' => 3, 'Loncoduni' => 4, 'Rupcar' => 5, 'Rupemp' => 6, 'Ruporg' => 7, 'Rupuni' => 8, 'Forcar' => 9, 'Foremp' => 10, 'Fororg' => 11, 'Foruni' => 12, 'Redmon' => 13, 'Codpre' => 14, 'Codvac' => 15, 'Codvacfra' => 16, 'Codvaccol' => 17, 'Codislr' => 18, 'Codpres' => 19, 'Codsso' => 20, 'Sueint' => 21, 'Asiconnom' => 22, 'Cierac' => 23, 'Foresc' => 24, 'Numrec' => 25, 'Forcarrac' => 26, 'Forcarocp' => 27, 'Correl' => 28, 'Porctick' => 29, 'Unitrib' => 30, 'Numtick' => 31, 'Diasem' => 32, 'Id' => 33, ),
		BasePeer::TYPE_COLNAME => array (NpdefgenPeer::CODEMP => 0, NpdefgenPeer::LONCODCAR => 1, NpdefgenPeer::LONCODEMP => 2, NpdefgenPeer::LONCODORG => 3, NpdefgenPeer::LONCODUNI => 4, NpdefgenPeer::RUPCAR => 5, NpdefgenPeer::RUPEMP => 6, NpdefgenPeer::RUPORG => 7, NpdefgenPeer::RUPUNI => 8, NpdefgenPeer::FORCAR => 9, NpdefgenPeer::FOREMP => 10, NpdefgenPeer::FORORG => 11, NpdefgenPeer::FORUNI => 12, NpdefgenPeer::REDMON => 13, NpdefgenPeer::CODPRE => 14, NpdefgenPeer::CODVAC => 15, NpdefgenPeer::CODVACFRA => 16, NpdefgenPeer::CODVACCOL => 17, NpdefgenPeer::CODISLR => 18, NpdefgenPeer::CODPRES => 19, NpdefgenPeer::CODSSO => 20, NpdefgenPeer::SUEINT => 21, NpdefgenPeer::ASICONNOM => 22, NpdefgenPeer::CIERAC => 23, NpdefgenPeer::FORESC => 24, NpdefgenPeer::NUMREC => 25, NpdefgenPeer::FORCARRAC => 26, NpdefgenPeer::FORCAROCP => 27, NpdefgenPeer::CORREL => 28, NpdefgenPeer::PORCTICK => 29, NpdefgenPeer::UNITRIB => 30, NpdefgenPeer::NUMTICK => 31, NpdefgenPeer::DIASEM => 32, NpdefgenPeer::ID => 33, ),
		BasePeer::TYPE_FIELDNAME => array ('codemp' => 0, 'loncodcar' => 1, 'loncodemp' => 2, 'loncodorg' => 3, 'loncoduni' => 4, 'rupcar' => 5, 'rupemp' => 6, 'ruporg' => 7, 'rupuni' => 8, 'forcar' => 9, 'foremp' => 10, 'fororg' => 11, 'foruni' => 12, 'redmon' => 13, 'codpre' => 14, 'codvac' => 15, 'codvacfra' => 16, 'codvaccol' => 17, 'codislr' => 18, 'codpres' => 19, 'codsso' => 20, 'sueint' => 21, 'asiconnom' => 22, 'cierac' => 23, 'foresc' => 24, 'numrec' => 25, 'forcarrac' => 26, 'forcarocp' => 27, 'correl' => 28, 'porctick' => 29, 'unitrib' => 30, 'numtick' => 31, 'diasem' => 32, 'id' => 33, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, 24, 25, 26, 27, 28, 29, 30, 31, 32, 33, )
	);

	
	public static function getMapBuilder()
	{
		include_once 'lib/model/map/NpdefgenMapBuilder.php';
		return BasePeer::getMapBuilder('lib.model.map.NpdefgenMapBuilder');
	}
	
	public static function getPhpNameMap()
	{
		if (self::$phpNameMap === null) {
			$map = NpdefgenPeer::getTableMap();
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
		return str_replace(NpdefgenPeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(NpdefgenPeer::CODEMP);

		$criteria->addSelectColumn(NpdefgenPeer::LONCODCAR);

		$criteria->addSelectColumn(NpdefgenPeer::LONCODEMP);

		$criteria->addSelectColumn(NpdefgenPeer::LONCODORG);

		$criteria->addSelectColumn(NpdefgenPeer::LONCODUNI);

		$criteria->addSelectColumn(NpdefgenPeer::RUPCAR);

		$criteria->addSelectColumn(NpdefgenPeer::RUPEMP);

		$criteria->addSelectColumn(NpdefgenPeer::RUPORG);

		$criteria->addSelectColumn(NpdefgenPeer::RUPUNI);

		$criteria->addSelectColumn(NpdefgenPeer::FORCAR);

		$criteria->addSelectColumn(NpdefgenPeer::FOREMP);

		$criteria->addSelectColumn(NpdefgenPeer::FORORG);

		$criteria->addSelectColumn(NpdefgenPeer::FORUNI);

		$criteria->addSelectColumn(NpdefgenPeer::REDMON);

		$criteria->addSelectColumn(NpdefgenPeer::CODPRE);

		$criteria->addSelectColumn(NpdefgenPeer::CODVAC);

		$criteria->addSelectColumn(NpdefgenPeer::CODVACFRA);

		$criteria->addSelectColumn(NpdefgenPeer::CODVACCOL);

		$criteria->addSelectColumn(NpdefgenPeer::CODISLR);

		$criteria->addSelectColumn(NpdefgenPeer::CODPRES);

		$criteria->addSelectColumn(NpdefgenPeer::CODSSO);

		$criteria->addSelectColumn(NpdefgenPeer::SUEINT);

		$criteria->addSelectColumn(NpdefgenPeer::ASICONNOM);

		$criteria->addSelectColumn(NpdefgenPeer::CIERAC);

		$criteria->addSelectColumn(NpdefgenPeer::FORESC);

		$criteria->addSelectColumn(NpdefgenPeer::NUMREC);

		$criteria->addSelectColumn(NpdefgenPeer::FORCARRAC);

		$criteria->addSelectColumn(NpdefgenPeer::FORCAROCP);

		$criteria->addSelectColumn(NpdefgenPeer::CORREL);

		$criteria->addSelectColumn(NpdefgenPeer::PORCTICK);

		$criteria->addSelectColumn(NpdefgenPeer::UNITRIB);

		$criteria->addSelectColumn(NpdefgenPeer::NUMTICK);

		$criteria->addSelectColumn(NpdefgenPeer::DIASEM);

		$criteria->addSelectColumn(NpdefgenPeer::ID);

	}

	const COUNT = 'COUNT(npdefgen.ID)';
	const COUNT_DISTINCT = 'COUNT(DISTINCT npdefgen.ID)';

	
	public static function doCount(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(NpdefgenPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(NpdefgenPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = NpdefgenPeer::doSelectRS($criteria, $con);
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
		$objects = NpdefgenPeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, $con = null)
	{
		return NpdefgenPeer::populateObjects(NpdefgenPeer::doSelectRS($criteria, $con));
	}
	
	public static function doSelectRS(Criteria $criteria, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if (!$criteria->getSelectColumns()) {
			$criteria = clone $criteria;
			NpdefgenPeer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

						return BasePeer::doSelect($criteria, $con);
	}
	
	public static function populateObjects(ResultSet $rs)
	{
		$results = array();
	
				$cls = NpdefgenPeer::getOMClass();
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
		return NpdefgenPeer::CLASS_DEFAULT;
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
			$comparison = $criteria->getComparison(NpdefgenPeer::ID);
			$selectCriteria->add(NpdefgenPeer::ID, $criteria->remove(NpdefgenPeer::ID), $comparison);

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
			$affectedRows += BasePeer::doDeleteAll(NpdefgenPeer::TABLE_NAME, $con);
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
			$con = Propel::getConnection(NpdefgenPeer::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} elseif ($values instanceof Npdefgen) {

			$criteria = $values->buildPkeyCriteria();
		} else {
						$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(NpdefgenPeer::ID, (array) $values, Criteria::IN);
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

	
	public static function doValidate(Npdefgen $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(NpdefgenPeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(NpdefgenPeer::TABLE_NAME);

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

		$res =  BasePeer::doValidate(NpdefgenPeer::DATABASE_NAME, NpdefgenPeer::TABLE_NAME, $columns);
    if ($res !== true) {
        $request = sfContext::getInstance()->getRequest();
        foreach ($res as $failed) {
            $col = NpdefgenPeer::translateFieldname($failed->getColumn(), BasePeer::TYPE_COLNAME, BasePeer::TYPE_PHPNAME);
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

		$criteria = new Criteria(NpdefgenPeer::DATABASE_NAME);

		$criteria->add(NpdefgenPeer::ID, $pk);


		$v = NpdefgenPeer::doSelect($criteria, $con);

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
			$criteria->add(NpdefgenPeer::ID, $pks, Criteria::IN);
			$objs = NpdefgenPeer::doSelect($criteria, $con);
		}
		return $objs;
	}

} 
if (Propel::isInit()) {
			try {
		BaseNpdefgenPeer::getMapBuilder();
	} catch (Exception $e) {
		Propel::log('Could not initialize Peer: ' . $e->getMessage(), Propel::LOG_ERR);
	}
} else {
			require_once 'lib/model/map/NpdefgenMapBuilder.php';
	Propel::registerMapBuilder('lib.model.map.NpdefgenMapBuilder');
}
