<?php


abstract class BaseBnregsemPeer {

	
	const DATABASE_NAME = 'propel';

	
	const TABLE_NAME = 'bnregsem';

	
	const CLASS_DEFAULT = 'lib.model.Bnregsem';

	
	const NUM_COLUMNS = 27;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;


	
	const CODACT = 'bnregsem.CODACT';

	
	const CODSEM = 'bnregsem.CODSEM';

	
	const DESSEM = 'bnregsem.DESSEM';

	
	const CODPRO = 'bnregsem.CODPRO';

	
	const CODUBI = 'bnregsem.CODUBI';

	
	const ORDCOM = 'bnregsem.ORDCOM';

	
	const FECREG = 'bnregsem.FECREG';

	
	const FECCOM = 'bnregsem.FECCOM';

	
	const FECEXP = 'bnregsem.FECEXP';

	
	const ORDRCP = 'bnregsem.ORDRCP';

	
	const FOTSEM = 'bnregsem.FOTSEM';

	
	const SEXSEM = 'bnregsem.SEXSEM';

	
	const RAZSEM = 'bnregsem.RAZSEM';

	
	const EDASEM = 'bnregsem.EDASEM';

	
	const HERSEM = 'bnregsem.HERSEM';

	
	const OBSSEM = 'bnregsem.OBSSEM';

	
	const VIDUTI = 'bnregsem.VIDUTI';

	
	const MESDEP = 'bnregsem.MESDEP';

	
	const VALINI = 'bnregsem.VALINI';

	
	const VALRES = 'bnregsem.VALRES';

	
	const VALLIB = 'bnregsem.VALLIB';

	
	const VALREX = 'bnregsem.VALREX';

	
	const COSREP = 'bnregsem.COSREP';

	
	const DEPMEN = 'bnregsem.DEPMEN';

	
	const DEPACU = 'bnregsem.DEPACU';

	
	const STASEM = 'bnregsem.STASEM';

	
	const ID = 'bnregsem.ID';

	
	private static $phpNameMap = null;


	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('Codact', 'Codsem', 'Dessem', 'Codpro', 'Codubi', 'Ordcom', 'Fecreg', 'Feccom', 'Fecexp', 'Ordrcp', 'Fotsem', 'Sexsem', 'Razsem', 'Edasem', 'Hersem', 'Obssem', 'Viduti', 'Mesdep', 'Valini', 'Valres', 'Vallib', 'Valrex', 'Cosrep', 'Depmen', 'Depacu', 'Stasem', 'Id', ),
		BasePeer::TYPE_COLNAME => array (BnregsemPeer::CODACT, BnregsemPeer::CODSEM, BnregsemPeer::DESSEM, BnregsemPeer::CODPRO, BnregsemPeer::CODUBI, BnregsemPeer::ORDCOM, BnregsemPeer::FECREG, BnregsemPeer::FECCOM, BnregsemPeer::FECEXP, BnregsemPeer::ORDRCP, BnregsemPeer::FOTSEM, BnregsemPeer::SEXSEM, BnregsemPeer::RAZSEM, BnregsemPeer::EDASEM, BnregsemPeer::HERSEM, BnregsemPeer::OBSSEM, BnregsemPeer::VIDUTI, BnregsemPeer::MESDEP, BnregsemPeer::VALINI, BnregsemPeer::VALRES, BnregsemPeer::VALLIB, BnregsemPeer::VALREX, BnregsemPeer::COSREP, BnregsemPeer::DEPMEN, BnregsemPeer::DEPACU, BnregsemPeer::STASEM, BnregsemPeer::ID, ),
		BasePeer::TYPE_FIELDNAME => array ('codact', 'codsem', 'dessem', 'codpro', 'codubi', 'ordcom', 'fecreg', 'feccom', 'fecexp', 'ordrcp', 'fotsem', 'sexsem', 'razsem', 'edasem', 'hersem', 'obssem', 'viduti', 'mesdep', 'valini', 'valres', 'vallib', 'valrex', 'cosrep', 'depmen', 'depacu', 'stasem', 'id', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, 24, 25, 26, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('Codact' => 0, 'Codsem' => 1, 'Dessem' => 2, 'Codpro' => 3, 'Codubi' => 4, 'Ordcom' => 5, 'Fecreg' => 6, 'Feccom' => 7, 'Fecexp' => 8, 'Ordrcp' => 9, 'Fotsem' => 10, 'Sexsem' => 11, 'Razsem' => 12, 'Edasem' => 13, 'Hersem' => 14, 'Obssem' => 15, 'Viduti' => 16, 'Mesdep' => 17, 'Valini' => 18, 'Valres' => 19, 'Vallib' => 20, 'Valrex' => 21, 'Cosrep' => 22, 'Depmen' => 23, 'Depacu' => 24, 'Stasem' => 25, 'Id' => 26, ),
		BasePeer::TYPE_COLNAME => array (BnregsemPeer::CODACT => 0, BnregsemPeer::CODSEM => 1, BnregsemPeer::DESSEM => 2, BnregsemPeer::CODPRO => 3, BnregsemPeer::CODUBI => 4, BnregsemPeer::ORDCOM => 5, BnregsemPeer::FECREG => 6, BnregsemPeer::FECCOM => 7, BnregsemPeer::FECEXP => 8, BnregsemPeer::ORDRCP => 9, BnregsemPeer::FOTSEM => 10, BnregsemPeer::SEXSEM => 11, BnregsemPeer::RAZSEM => 12, BnregsemPeer::EDASEM => 13, BnregsemPeer::HERSEM => 14, BnregsemPeer::OBSSEM => 15, BnregsemPeer::VIDUTI => 16, BnregsemPeer::MESDEP => 17, BnregsemPeer::VALINI => 18, BnregsemPeer::VALRES => 19, BnregsemPeer::VALLIB => 20, BnregsemPeer::VALREX => 21, BnregsemPeer::COSREP => 22, BnregsemPeer::DEPMEN => 23, BnregsemPeer::DEPACU => 24, BnregsemPeer::STASEM => 25, BnregsemPeer::ID => 26, ),
		BasePeer::TYPE_FIELDNAME => array ('codact' => 0, 'codsem' => 1, 'dessem' => 2, 'codpro' => 3, 'codubi' => 4, 'ordcom' => 5, 'fecreg' => 6, 'feccom' => 7, 'fecexp' => 8, 'ordrcp' => 9, 'fotsem' => 10, 'sexsem' => 11, 'razsem' => 12, 'edasem' => 13, 'hersem' => 14, 'obssem' => 15, 'viduti' => 16, 'mesdep' => 17, 'valini' => 18, 'valres' => 19, 'vallib' => 20, 'valrex' => 21, 'cosrep' => 22, 'depmen' => 23, 'depacu' => 24, 'stasem' => 25, 'id' => 26, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, 24, 25, 26, )
	);

	
	public static function getMapBuilder()
	{
		include_once 'lib/model/map/BnregsemMapBuilder.php';
		return BasePeer::getMapBuilder('lib.model.map.BnregsemMapBuilder');
	}
	
	public static function getPhpNameMap()
	{
		if (self::$phpNameMap === null) {
			$map = BnregsemPeer::getTableMap();
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
		return str_replace(BnregsemPeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(BnregsemPeer::CODACT);

		$criteria->addSelectColumn(BnregsemPeer::CODSEM);

		$criteria->addSelectColumn(BnregsemPeer::DESSEM);

		$criteria->addSelectColumn(BnregsemPeer::CODPRO);

		$criteria->addSelectColumn(BnregsemPeer::CODUBI);

		$criteria->addSelectColumn(BnregsemPeer::ORDCOM);

		$criteria->addSelectColumn(BnregsemPeer::FECREG);

		$criteria->addSelectColumn(BnregsemPeer::FECCOM);

		$criteria->addSelectColumn(BnregsemPeer::FECEXP);

		$criteria->addSelectColumn(BnregsemPeer::ORDRCP);

		$criteria->addSelectColumn(BnregsemPeer::FOTSEM);

		$criteria->addSelectColumn(BnregsemPeer::SEXSEM);

		$criteria->addSelectColumn(BnregsemPeer::RAZSEM);

		$criteria->addSelectColumn(BnregsemPeer::EDASEM);

		$criteria->addSelectColumn(BnregsemPeer::HERSEM);

		$criteria->addSelectColumn(BnregsemPeer::OBSSEM);

		$criteria->addSelectColumn(BnregsemPeer::VIDUTI);

		$criteria->addSelectColumn(BnregsemPeer::MESDEP);

		$criteria->addSelectColumn(BnregsemPeer::VALINI);

		$criteria->addSelectColumn(BnregsemPeer::VALRES);

		$criteria->addSelectColumn(BnregsemPeer::VALLIB);

		$criteria->addSelectColumn(BnregsemPeer::VALREX);

		$criteria->addSelectColumn(BnregsemPeer::COSREP);

		$criteria->addSelectColumn(BnregsemPeer::DEPMEN);

		$criteria->addSelectColumn(BnregsemPeer::DEPACU);

		$criteria->addSelectColumn(BnregsemPeer::STASEM);

		$criteria->addSelectColumn(BnregsemPeer::ID);

	}

	const COUNT = 'COUNT(bnregsem.ID)';
	const COUNT_DISTINCT = 'COUNT(DISTINCT bnregsem.ID)';

	
	public static function doCount(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(BnregsemPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(BnregsemPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = BnregsemPeer::doSelectRS($criteria, $con);
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
		$objects = BnregsemPeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, $con = null)
	{
		return BnregsemPeer::populateObjects(BnregsemPeer::doSelectRS($criteria, $con));
	}
	
	public static function doSelectRS(Criteria $criteria, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if (!$criteria->getSelectColumns()) {
			$criteria = clone $criteria;
			BnregsemPeer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

						return BasePeer::doSelect($criteria, $con);
	}
	
	public static function populateObjects(ResultSet $rs)
	{
		$results = array();
	
				$cls = BnregsemPeer::getOMClass();
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
		return BnregsemPeer::CLASS_DEFAULT;
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
			$comparison = $criteria->getComparison(BnregsemPeer::ID);
			$selectCriteria->add(BnregsemPeer::ID, $criteria->remove(BnregsemPeer::ID), $comparison);

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
			$affectedRows += BasePeer::doDeleteAll(BnregsemPeer::TABLE_NAME, $con);
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
			$con = Propel::getConnection(BnregsemPeer::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} elseif ($values instanceof Bnregsem) {

			$criteria = $values->buildPkeyCriteria();
		} else {
						$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(BnregsemPeer::ID, (array) $values, Criteria::IN);
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

	
	public static function doValidate(Bnregsem $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(BnregsemPeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(BnregsemPeer::TABLE_NAME);

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

		$res =  BasePeer::doValidate(BnregsemPeer::DATABASE_NAME, BnregsemPeer::TABLE_NAME, $columns);
    if ($res !== true) {
        $request = sfContext::getInstance()->getRequest();
        foreach ($res as $failed) {
            $col = BnregsemPeer::translateFieldname($failed->getColumn(), BasePeer::TYPE_COLNAME, BasePeer::TYPE_PHPNAME);
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

		$criteria = new Criteria(BnregsemPeer::DATABASE_NAME);

		$criteria->add(BnregsemPeer::ID, $pk);


		$v = BnregsemPeer::doSelect($criteria, $con);

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
			$criteria->add(BnregsemPeer::ID, $pks, Criteria::IN);
			$objs = BnregsemPeer::doSelect($criteria, $con);
		}
		return $objs;
	}

} 
if (Propel::isInit()) {
			try {
		BaseBnregsemPeer::getMapBuilder();
	} catch (Exception $e) {
		Propel::log('Could not initialize Peer: ' . $e->getMessage(), Propel::LOG_ERR);
	}
} else {
			require_once 'lib/model/map/BnregsemMapBuilder.php';
	Propel::registerMapBuilder('lib.model.map.BnregsemMapBuilder');
}
