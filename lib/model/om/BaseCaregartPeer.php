<?php


abstract class BaseCaregartPeer {

	
	const DATABASE_NAME = 'propel';

	
	const TABLE_NAME = 'caregart';

	
	const CLASS_DEFAULT = 'lib.model.Caregart';

	
	const NUM_COLUMNS = 30;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;


	
	const CODART = 'caregart.CODART';

	
	const DESART = 'caregart.DESART';

	
	const CODCTA = 'caregart.CODCTA';

	
	const CODPAR = 'caregart.CODPAR';

	
	const RAMART = 'caregart.RAMART';

	
	const COSULT = 'caregart.COSULT';

	
	const COSPRO = 'caregart.COSPRO';

	
	const EXITOT = 'caregart.EXITOT';

	
	const UNIMED = 'caregart.UNIMED';

	
	const UNIALT = 'caregart.UNIALT';

	
	const RELART = 'caregart.RELART';

	
	const FECULT = 'caregart.FECULT';

	
	const INVINI = 'caregart.INVINI';

	
	const CODMAR = 'caregart.CODMAR';

	
	const CODREF = 'caregart.CODREF';

	
	const COSTOT = 'caregart.COSTOT';

	
	const SIGECOF = 'caregart.SIGECOF';

	
	const CODCLAART = 'caregart.CODCLAART';

	
	const LOTUNI = 'caregart.LOTUNI';

	
	const CTAVTA = 'caregart.CTAVTA';

	
	const CTACOS = 'caregart.CTACOS';

	
	const CTAPRO = 'caregart.CTAPRO';

	
	const PREART = 'caregart.PREART';

	
	const DISTOT = 'caregart.DISTOT';

	
	const TIPO = 'caregart.TIPO';

	
	const TIP0 = 'caregart.TIP0';

	
	const CODING = 'caregart.CODING';

	
	const MERCON = 'caregart.MERCON';

	
	const CODARTSNC = 'caregart.CODARTSNC';

	
	const ID = 'caregart.ID';

	
	private static $phpNameMap = null;


	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('Codart', 'Desart', 'Codcta', 'Codpar', 'Ramart', 'Cosult', 'Cospro', 'Exitot', 'Unimed', 'Unialt', 'Relart', 'Fecult', 'Invini', 'Codmar', 'Codref', 'Costot', 'Sigecof', 'Codclaart', 'Lotuni', 'Ctavta', 'Ctacos', 'Ctapro', 'Preart', 'Distot', 'Tipo', 'Tip0', 'Coding', 'Mercon', 'Codartsnc', 'Id', ),
		BasePeer::TYPE_COLNAME => array (CaregartPeer::CODART, CaregartPeer::DESART, CaregartPeer::CODCTA, CaregartPeer::CODPAR, CaregartPeer::RAMART, CaregartPeer::COSULT, CaregartPeer::COSPRO, CaregartPeer::EXITOT, CaregartPeer::UNIMED, CaregartPeer::UNIALT, CaregartPeer::RELART, CaregartPeer::FECULT, CaregartPeer::INVINI, CaregartPeer::CODMAR, CaregartPeer::CODREF, CaregartPeer::COSTOT, CaregartPeer::SIGECOF, CaregartPeer::CODCLAART, CaregartPeer::LOTUNI, CaregartPeer::CTAVTA, CaregartPeer::CTACOS, CaregartPeer::CTAPRO, CaregartPeer::PREART, CaregartPeer::DISTOT, CaregartPeer::TIPO, CaregartPeer::TIP0, CaregartPeer::CODING, CaregartPeer::MERCON, CaregartPeer::CODARTSNC, CaregartPeer::ID, ),
		BasePeer::TYPE_FIELDNAME => array ('codart', 'desart', 'codcta', 'codpar', 'ramart', 'cosult', 'cospro', 'exitot', 'unimed', 'unialt', 'relart', 'fecult', 'invini', 'codmar', 'codref', 'costot', 'sigecof', 'codclaart', 'lotuni', 'ctavta', 'ctacos', 'ctapro', 'preart', 'distot', 'tipo', 'tip0', 'coding', 'mercon', 'codartsnc', 'id', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, 24, 25, 26, 27, 28, 29, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('Codart' => 0, 'Desart' => 1, 'Codcta' => 2, 'Codpar' => 3, 'Ramart' => 4, 'Cosult' => 5, 'Cospro' => 6, 'Exitot' => 7, 'Unimed' => 8, 'Unialt' => 9, 'Relart' => 10, 'Fecult' => 11, 'Invini' => 12, 'Codmar' => 13, 'Codref' => 14, 'Costot' => 15, 'Sigecof' => 16, 'Codclaart' => 17, 'Lotuni' => 18, 'Ctavta' => 19, 'Ctacos' => 20, 'Ctapro' => 21, 'Preart' => 22, 'Distot' => 23, 'Tipo' => 24, 'Tip0' => 25, 'Coding' => 26, 'Mercon' => 27, 'Codartsnc' => 28, 'Id' => 29, ),
		BasePeer::TYPE_COLNAME => array (CaregartPeer::CODART => 0, CaregartPeer::DESART => 1, CaregartPeer::CODCTA => 2, CaregartPeer::CODPAR => 3, CaregartPeer::RAMART => 4, CaregartPeer::COSULT => 5, CaregartPeer::COSPRO => 6, CaregartPeer::EXITOT => 7, CaregartPeer::UNIMED => 8, CaregartPeer::UNIALT => 9, CaregartPeer::RELART => 10, CaregartPeer::FECULT => 11, CaregartPeer::INVINI => 12, CaregartPeer::CODMAR => 13, CaregartPeer::CODREF => 14, CaregartPeer::COSTOT => 15, CaregartPeer::SIGECOF => 16, CaregartPeer::CODCLAART => 17, CaregartPeer::LOTUNI => 18, CaregartPeer::CTAVTA => 19, CaregartPeer::CTACOS => 20, CaregartPeer::CTAPRO => 21, CaregartPeer::PREART => 22, CaregartPeer::DISTOT => 23, CaregartPeer::TIPO => 24, CaregartPeer::TIP0 => 25, CaregartPeer::CODING => 26, CaregartPeer::MERCON => 27, CaregartPeer::CODARTSNC => 28, CaregartPeer::ID => 29, ),
		BasePeer::TYPE_FIELDNAME => array ('codart' => 0, 'desart' => 1, 'codcta' => 2, 'codpar' => 3, 'ramart' => 4, 'cosult' => 5, 'cospro' => 6, 'exitot' => 7, 'unimed' => 8, 'unialt' => 9, 'relart' => 10, 'fecult' => 11, 'invini' => 12, 'codmar' => 13, 'codref' => 14, 'costot' => 15, 'sigecof' => 16, 'codclaart' => 17, 'lotuni' => 18, 'ctavta' => 19, 'ctacos' => 20, 'ctapro' => 21, 'preart' => 22, 'distot' => 23, 'tipo' => 24, 'tip0' => 25, 'coding' => 26, 'mercon' => 27, 'codartsnc' => 28, 'id' => 29, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, 24, 25, 26, 27, 28, 29, )
	);

	
	public static function getMapBuilder()
	{
		include_once 'lib/model/map/CaregartMapBuilder.php';
		return BasePeer::getMapBuilder('lib.model.map.CaregartMapBuilder');
	}
	
	public static function getPhpNameMap()
	{
		if (self::$phpNameMap === null) {
			$map = CaregartPeer::getTableMap();
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
		return str_replace(CaregartPeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(CaregartPeer::CODART);

		$criteria->addSelectColumn(CaregartPeer::DESART);

		$criteria->addSelectColumn(CaregartPeer::CODCTA);

		$criteria->addSelectColumn(CaregartPeer::CODPAR);

		$criteria->addSelectColumn(CaregartPeer::RAMART);

		$criteria->addSelectColumn(CaregartPeer::COSULT);

		$criteria->addSelectColumn(CaregartPeer::COSPRO);

		$criteria->addSelectColumn(CaregartPeer::EXITOT);

		$criteria->addSelectColumn(CaregartPeer::UNIMED);

		$criteria->addSelectColumn(CaregartPeer::UNIALT);

		$criteria->addSelectColumn(CaregartPeer::RELART);

		$criteria->addSelectColumn(CaregartPeer::FECULT);

		$criteria->addSelectColumn(CaregartPeer::INVINI);

		$criteria->addSelectColumn(CaregartPeer::CODMAR);

		$criteria->addSelectColumn(CaregartPeer::CODREF);

		$criteria->addSelectColumn(CaregartPeer::COSTOT);

		$criteria->addSelectColumn(CaregartPeer::SIGECOF);

		$criteria->addSelectColumn(CaregartPeer::CODCLAART);

		$criteria->addSelectColumn(CaregartPeer::LOTUNI);

		$criteria->addSelectColumn(CaregartPeer::CTAVTA);

		$criteria->addSelectColumn(CaregartPeer::CTACOS);

		$criteria->addSelectColumn(CaregartPeer::CTAPRO);

		$criteria->addSelectColumn(CaregartPeer::PREART);

		$criteria->addSelectColumn(CaregartPeer::DISTOT);

		$criteria->addSelectColumn(CaregartPeer::TIPO);

		$criteria->addSelectColumn(CaregartPeer::TIP0);

		$criteria->addSelectColumn(CaregartPeer::CODING);

		$criteria->addSelectColumn(CaregartPeer::MERCON);

		$criteria->addSelectColumn(CaregartPeer::CODARTSNC);

		$criteria->addSelectColumn(CaregartPeer::ID);

	}

	const COUNT = 'COUNT(caregart.ID)';
	const COUNT_DISTINCT = 'COUNT(DISTINCT caregart.ID)';

	
	public static function doCount(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(CaregartPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(CaregartPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = CaregartPeer::doSelectRS($criteria, $con);
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
		$objects = CaregartPeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, $con = null)
	{
		return CaregartPeer::populateObjects(CaregartPeer::doSelectRS($criteria, $con));
	}
	
	public static function doSelectRS(Criteria $criteria, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if (!$criteria->getSelectColumns()) {
			$criteria = clone $criteria;
			CaregartPeer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

						return BasePeer::doSelect($criteria, $con);
	}
	
	public static function populateObjects(ResultSet $rs)
	{
		$results = array();
	
				$cls = CaregartPeer::getOMClass();
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
		return CaregartPeer::CLASS_DEFAULT;
	}

	
	public static function doInsert($values, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} else {
			$criteria = $values->buildCriteria(); 		}

		$criteria->remove(CaregartPeer::ID); 

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
			$comparison = $criteria->getComparison(CaregartPeer::ID);
			$selectCriteria->add(CaregartPeer::ID, $criteria->remove(CaregartPeer::ID), $comparison);

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
			$affectedRows += BasePeer::doDeleteAll(CaregartPeer::TABLE_NAME, $con);
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
			$con = Propel::getConnection(CaregartPeer::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} elseif ($values instanceof Caregart) {

			$criteria = $values->buildPkeyCriteria();
		} else {
						$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(CaregartPeer::ID, (array) $values, Criteria::IN);
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

	
	public static function doValidate(Caregart $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(CaregartPeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(CaregartPeer::TABLE_NAME);

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

		$res =  BasePeer::doValidate(CaregartPeer::DATABASE_NAME, CaregartPeer::TABLE_NAME, $columns);
    if ($res !== true) {
        $request = sfContext::getInstance()->getRequest();
        foreach ($res as $failed) {
            $col = CaregartPeer::translateFieldname($failed->getColumn(), BasePeer::TYPE_COLNAME, BasePeer::TYPE_PHPNAME);
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

		$criteria = new Criteria(CaregartPeer::DATABASE_NAME);

		$criteria->add(CaregartPeer::ID, $pk);


		$v = CaregartPeer::doSelect($criteria, $con);

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
			$criteria->add(CaregartPeer::ID, $pks, Criteria::IN);
			$objs = CaregartPeer::doSelect($criteria, $con);
		}
		return $objs;
	}

} 
if (Propel::isInit()) {
			try {
		BaseCaregartPeer::getMapBuilder();
	} catch (Exception $e) {
		Propel::log('Could not initialize Peer: ' . $e->getMessage(), Propel::LOG_ERR);
	}
} else {
			require_once 'lib/model/map/CaregartMapBuilder.php';
	Propel::registerMapBuilder('lib.model.map.CaregartMapBuilder');
}
