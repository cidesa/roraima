<?php


abstract class BaseNpnomcalPeer {

	
	const DATABASE_NAME = 'propel';

	
	const TABLE_NAME = 'npnomcal';

	
	const CLASS_DEFAULT = 'lib.model.Npnomcal';

	
	const NUM_COLUMNS = 22;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;


	
	const CODNOM = 'npnomcal.CODNOM';

	
	const CODEMP = 'npnomcal.CODEMP';

	
	const CODCAR = 'npnomcal.CODCAR';

	
	const CODCON = 'npnomcal.CODCON';

	
	const FRECON = 'npnomcal.FRECON';

	
	const ASIDED = 'npnomcal.ASIDED';

	
	const FECNOM = 'npnomcal.FECNOM';

	
	const NOMCON = 'npnomcal.NOMCON';

	
	const NOMNOM = 'npnomcal.NOMNOM';

	
	const CANTIDAD = 'npnomcal.CANTIDAD';

	
	const MONTO = 'npnomcal.MONTO';

	
	const ACUCON = 'npnomcal.ACUCON';

	
	const ACUMULADO = 'npnomcal.ACUMULADO';

	
	const SALDO = 'npnomcal.SALDO';

	
	const NUMREC = 'npnomcal.NUMREC';

	
	const FECNOMDES = 'npnomcal.FECNOMDES';

	
	const ESPECIAL = 'npnomcal.ESPECIAL';

	
	const FECNOMESPDES = 'npnomcal.FECNOMESPDES';

	
	const FECNOMESPHAS = 'npnomcal.FECNOMESPHAS';

	
	const CODNOMESP = 'npnomcal.CODNOMESP';

	
	const NOMNOMESP = 'npnomcal.NOMNOMESP';

	
	const ID = 'npnomcal.ID';

	
	private static $phpNameMap = null;


	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('Codnom', 'Codemp', 'Codcar', 'Codcon', 'Frecon', 'Asided', 'Fecnom', 'Nomcon', 'Nomnom', 'Cantidad', 'Monto', 'Acucon', 'Acumulado', 'Saldo', 'Numrec', 'Fecnomdes', 'Especial', 'Fecnomespdes', 'Fecnomesphas', 'Codnomesp', 'Nomnomesp', 'Id', ),
		BasePeer::TYPE_COLNAME => array (NpnomcalPeer::CODNOM, NpnomcalPeer::CODEMP, NpnomcalPeer::CODCAR, NpnomcalPeer::CODCON, NpnomcalPeer::FRECON, NpnomcalPeer::ASIDED, NpnomcalPeer::FECNOM, NpnomcalPeer::NOMCON, NpnomcalPeer::NOMNOM, NpnomcalPeer::CANTIDAD, NpnomcalPeer::MONTO, NpnomcalPeer::ACUCON, NpnomcalPeer::ACUMULADO, NpnomcalPeer::SALDO, NpnomcalPeer::NUMREC, NpnomcalPeer::FECNOMDES, NpnomcalPeer::ESPECIAL, NpnomcalPeer::FECNOMESPDES, NpnomcalPeer::FECNOMESPHAS, NpnomcalPeer::CODNOMESP, NpnomcalPeer::NOMNOMESP, NpnomcalPeer::ID, ),
		BasePeer::TYPE_FIELDNAME => array ('codnom', 'codemp', 'codcar', 'codcon', 'frecon', 'asided', 'fecnom', 'nomcon', 'nomnom', 'cantidad', 'monto', 'acucon', 'acumulado', 'saldo', 'numrec', 'fecnomdes', 'especial', 'fecnomespdes', 'fecnomesphas', 'codnomesp', 'nomnomesp', 'id', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('Codnom' => 0, 'Codemp' => 1, 'Codcar' => 2, 'Codcon' => 3, 'Frecon' => 4, 'Asided' => 5, 'Fecnom' => 6, 'Nomcon' => 7, 'Nomnom' => 8, 'Cantidad' => 9, 'Monto' => 10, 'Acucon' => 11, 'Acumulado' => 12, 'Saldo' => 13, 'Numrec' => 14, 'Fecnomdes' => 15, 'Especial' => 16, 'Fecnomespdes' => 17, 'Fecnomesphas' => 18, 'Codnomesp' => 19, 'Nomnomesp' => 20, 'Id' => 21, ),
		BasePeer::TYPE_COLNAME => array (NpnomcalPeer::CODNOM => 0, NpnomcalPeer::CODEMP => 1, NpnomcalPeer::CODCAR => 2, NpnomcalPeer::CODCON => 3, NpnomcalPeer::FRECON => 4, NpnomcalPeer::ASIDED => 5, NpnomcalPeer::FECNOM => 6, NpnomcalPeer::NOMCON => 7, NpnomcalPeer::NOMNOM => 8, NpnomcalPeer::CANTIDAD => 9, NpnomcalPeer::MONTO => 10, NpnomcalPeer::ACUCON => 11, NpnomcalPeer::ACUMULADO => 12, NpnomcalPeer::SALDO => 13, NpnomcalPeer::NUMREC => 14, NpnomcalPeer::FECNOMDES => 15, NpnomcalPeer::ESPECIAL => 16, NpnomcalPeer::FECNOMESPDES => 17, NpnomcalPeer::FECNOMESPHAS => 18, NpnomcalPeer::CODNOMESP => 19, NpnomcalPeer::NOMNOMESP => 20, NpnomcalPeer::ID => 21, ),
		BasePeer::TYPE_FIELDNAME => array ('codnom' => 0, 'codemp' => 1, 'codcar' => 2, 'codcon' => 3, 'frecon' => 4, 'asided' => 5, 'fecnom' => 6, 'nomcon' => 7, 'nomnom' => 8, 'cantidad' => 9, 'monto' => 10, 'acucon' => 11, 'acumulado' => 12, 'saldo' => 13, 'numrec' => 14, 'fecnomdes' => 15, 'especial' => 16, 'fecnomespdes' => 17, 'fecnomesphas' => 18, 'codnomesp' => 19, 'nomnomesp' => 20, 'id' => 21, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, )
	);

	
	public static function getMapBuilder()
	{
		include_once 'lib/model/map/NpnomcalMapBuilder.php';
		return BasePeer::getMapBuilder('lib.model.map.NpnomcalMapBuilder');
	}
	
	public static function getPhpNameMap()
	{
		if (self::$phpNameMap === null) {
			$map = NpnomcalPeer::getTableMap();
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
		return str_replace(NpnomcalPeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(NpnomcalPeer::CODNOM);

		$criteria->addSelectColumn(NpnomcalPeer::CODEMP);

		$criteria->addSelectColumn(NpnomcalPeer::CODCAR);

		$criteria->addSelectColumn(NpnomcalPeer::CODCON);

		$criteria->addSelectColumn(NpnomcalPeer::FRECON);

		$criteria->addSelectColumn(NpnomcalPeer::ASIDED);

		$criteria->addSelectColumn(NpnomcalPeer::FECNOM);

		$criteria->addSelectColumn(NpnomcalPeer::NOMCON);

		$criteria->addSelectColumn(NpnomcalPeer::NOMNOM);

		$criteria->addSelectColumn(NpnomcalPeer::CANTIDAD);

		$criteria->addSelectColumn(NpnomcalPeer::MONTO);

		$criteria->addSelectColumn(NpnomcalPeer::ACUCON);

		$criteria->addSelectColumn(NpnomcalPeer::ACUMULADO);

		$criteria->addSelectColumn(NpnomcalPeer::SALDO);

		$criteria->addSelectColumn(NpnomcalPeer::NUMREC);

		$criteria->addSelectColumn(NpnomcalPeer::FECNOMDES);

		$criteria->addSelectColumn(NpnomcalPeer::ESPECIAL);

		$criteria->addSelectColumn(NpnomcalPeer::FECNOMESPDES);

		$criteria->addSelectColumn(NpnomcalPeer::FECNOMESPHAS);

		$criteria->addSelectColumn(NpnomcalPeer::CODNOMESP);

		$criteria->addSelectColumn(NpnomcalPeer::NOMNOMESP);

		$criteria->addSelectColumn(NpnomcalPeer::ID);

	}

	const COUNT = 'COUNT(npnomcal.ID)';
	const COUNT_DISTINCT = 'COUNT(DISTINCT npnomcal.ID)';

	
	public static function doCount(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(NpnomcalPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(NpnomcalPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = NpnomcalPeer::doSelectRS($criteria, $con);
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
		$objects = NpnomcalPeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, $con = null)
	{
		return NpnomcalPeer::populateObjects(NpnomcalPeer::doSelectRS($criteria, $con));
	}
	
	public static function doSelectRS(Criteria $criteria, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if (!$criteria->getSelectColumns()) {
			$criteria = clone $criteria;
			NpnomcalPeer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

						return BasePeer::doSelect($criteria, $con);
	}
	
	public static function populateObjects(ResultSet $rs)
	{
		$results = array();
	
				$cls = NpnomcalPeer::getOMClass();
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
		return NpnomcalPeer::CLASS_DEFAULT;
	}

	
	public static function doInsert($values, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} else {
			$criteria = $values->buildCriteria(); 		}

		$criteria->remove(NpnomcalPeer::ID); 

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
			$comparison = $criteria->getComparison(NpnomcalPeer::ID);
			$selectCriteria->add(NpnomcalPeer::ID, $criteria->remove(NpnomcalPeer::ID), $comparison);

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
			$affectedRows += BasePeer::doDeleteAll(NpnomcalPeer::TABLE_NAME, $con);
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
			$con = Propel::getConnection(NpnomcalPeer::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} elseif ($values instanceof Npnomcal) {

			$criteria = $values->buildPkeyCriteria();
		} else {
						$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(NpnomcalPeer::ID, (array) $values, Criteria::IN);
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

	
	public static function doValidate(Npnomcal $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(NpnomcalPeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(NpnomcalPeer::TABLE_NAME);

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

		$res =  BasePeer::doValidate(NpnomcalPeer::DATABASE_NAME, NpnomcalPeer::TABLE_NAME, $columns);
    if ($res !== true) {
        $request = sfContext::getInstance()->getRequest();
        foreach ($res as $failed) {
            $col = NpnomcalPeer::translateFieldname($failed->getColumn(), BasePeer::TYPE_COLNAME, BasePeer::TYPE_PHPNAME);
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

		$criteria = new Criteria(NpnomcalPeer::DATABASE_NAME);

		$criteria->add(NpnomcalPeer::ID, $pk);


		$v = NpnomcalPeer::doSelect($criteria, $con);

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
			$criteria->add(NpnomcalPeer::ID, $pks, Criteria::IN);
			$objs = NpnomcalPeer::doSelect($criteria, $con);
		}
		return $objs;
	}

} 
if (Propel::isInit()) {
			try {
		BaseNpnomcalPeer::getMapBuilder();
	} catch (Exception $e) {
		Propel::log('Could not initialize Peer: ' . $e->getMessage(), Propel::LOG_ERR);
	}
} else {
			require_once 'lib/model/map/NpnomcalMapBuilder.php';
	Propel::registerMapBuilder('lib.model.map.NpnomcalMapBuilder');
}
