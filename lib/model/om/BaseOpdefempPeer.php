<?php


abstract class BaseOpdefempPeer {

	
	const DATABASE_NAME = 'propel';

	
	const TABLE_NAME = 'opdefemp';

	
	const CLASS_DEFAULT = 'lib.model.Opdefemp';

	
	const NUM_COLUMNS = 46;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;


	
	const CODEMP = 'opdefemp.CODEMP';

	
	const CTAPAG = 'opdefemp.CTAPAG';

	
	const CTADES = 'opdefemp.CTADES';

	
	const NUMINI = 'opdefemp.NUMINI';

	
	const ORDNOM = 'opdefemp.ORDNOM';

	
	const ORDOBR = 'opdefemp.ORDOBR';

	
	const UNITRI = 'opdefemp.UNITRI';

	
	const VERCOMRET = 'opdefemp.VERCOMRET';

	
	const GENCTAORD = 'opdefemp.GENCTAORD';

	
	const FORUBI = 'opdefemp.FORUBI';

	
	const TIPAJU = 'opdefemp.TIPAJU';

	
	const TIPEJE = 'opdefemp.TIPEJE';

	
	const NUMAUT = 'opdefemp.NUMAUT';

	
	const TIPMOV = 'opdefemp.TIPMOV';

	
	const CORIVA = 'opdefemp.CORIVA';

	
	const CTABONO = 'opdefemp.CTABONO';

	
	const CTAVACA = 'opdefemp.CTAVACA';

	
	const GENCAUBON = 'opdefemp.GENCAUBON';

	
	const GENCOMADI = 'opdefemp.GENCOMADI';

	
	const UNIDAD = 'opdefemp.UNIDAD';

	
	const ORDLIQ = 'opdefemp.ORDLIQ';

	
	const ORDFID = 'opdefemp.ORDFID';

	
	const ORDVAL = 'opdefemp.ORDVAL';

	
	const GENORDRET = 'opdefemp.GENORDRET';

	
	const EMICHEPAG = 'opdefemp.EMICHEPAG';

	
	const CUECAJCHI = 'opdefemp.CUECAJCHI';

	
	const TIPCAJCHI = 'opdefemp.TIPCAJCHI';

	
	const MONAPECAJCHI = 'opdefemp.MONAPECAJCHI';

	
	const PORREPCAJCHI = 'opdefemp.PORREPCAJCHI';

	
	const TIPRENCAJCHI = 'opdefemp.TIPRENCAJCHI';

	
	const NUMINICAJCHI = 'opdefemp.NUMINICAJCHI';

	
	const CEDRIFCAJCHI = 'opdefemp.CEDRIFCAJCHI';

	
	const CODCATCAJCHI = 'opdefemp.CODCATCAJCHI';

	
	const GENCOMALC = 'opdefemp.GENCOMALC';

	
	const REQAPRORD = 'opdefemp.REQAPRORD';

	
	const ORDCOMPTOT = 'opdefemp.ORDCOMPTOT';

	
	const ORDMOTANU = 'opdefemp.ORDMOTANU';

	
	const MANBLOQBAN = 'opdefemp.MANBLOQBAN';

	
	const ORDRET = 'opdefemp.ORDRET';

	
	const ORDCONPRE = 'opdefemp.ORDCONPRE';

	
	const ORDTNA = 'opdefemp.ORDTNA';

	
	const ORDTBA = 'opdefemp.ORDTBA';

	
	const ORDCRE = 'opdefemp.ORDCRE';

	
	const ORDSOLPAG = 'opdefemp.ORDSOLPAG';

	
	const MONCHE = 'opdefemp.MONCHE';

	
	const ID = 'opdefemp.ID';

	
	private static $phpNameMap = null;


	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('Codemp', 'Ctapag', 'Ctades', 'Numini', 'Ordnom', 'Ordobr', 'Unitri', 'Vercomret', 'Genctaord', 'Forubi', 'Tipaju', 'Tipeje', 'Numaut', 'Tipmov', 'Coriva', 'Ctabono', 'Ctavaca', 'Gencaubon', 'Gencomadi', 'Unidad', 'Ordliq', 'Ordfid', 'Ordval', 'Genordret', 'Emichepag', 'Cuecajchi', 'Tipcajchi', 'Monapecajchi', 'Porrepcajchi', 'Tiprencajchi', 'Numinicajchi', 'Cedrifcajchi', 'Codcatcajchi', 'Gencomalc', 'Reqaprord', 'Ordcomptot', 'Ordmotanu', 'Manbloqban', 'Ordret', 'Ordconpre', 'Ordtna', 'Ordtba', 'Ordcre', 'Ordsolpag', 'Monche', 'Id', ),
		BasePeer::TYPE_COLNAME => array (OpdefempPeer::CODEMP, OpdefempPeer::CTAPAG, OpdefempPeer::CTADES, OpdefempPeer::NUMINI, OpdefempPeer::ORDNOM, OpdefempPeer::ORDOBR, OpdefempPeer::UNITRI, OpdefempPeer::VERCOMRET, OpdefempPeer::GENCTAORD, OpdefempPeer::FORUBI, OpdefempPeer::TIPAJU, OpdefempPeer::TIPEJE, OpdefempPeer::NUMAUT, OpdefempPeer::TIPMOV, OpdefempPeer::CORIVA, OpdefempPeer::CTABONO, OpdefempPeer::CTAVACA, OpdefempPeer::GENCAUBON, OpdefempPeer::GENCOMADI, OpdefempPeer::UNIDAD, OpdefempPeer::ORDLIQ, OpdefempPeer::ORDFID, OpdefempPeer::ORDVAL, OpdefempPeer::GENORDRET, OpdefempPeer::EMICHEPAG, OpdefempPeer::CUECAJCHI, OpdefempPeer::TIPCAJCHI, OpdefempPeer::MONAPECAJCHI, OpdefempPeer::PORREPCAJCHI, OpdefempPeer::TIPRENCAJCHI, OpdefempPeer::NUMINICAJCHI, OpdefempPeer::CEDRIFCAJCHI, OpdefempPeer::CODCATCAJCHI, OpdefempPeer::GENCOMALC, OpdefempPeer::REQAPRORD, OpdefempPeer::ORDCOMPTOT, OpdefempPeer::ORDMOTANU, OpdefempPeer::MANBLOQBAN, OpdefempPeer::ORDRET, OpdefempPeer::ORDCONPRE, OpdefempPeer::ORDTNA, OpdefempPeer::ORDTBA, OpdefempPeer::ORDCRE, OpdefempPeer::ORDSOLPAG, OpdefempPeer::MONCHE, OpdefempPeer::ID, ),
		BasePeer::TYPE_FIELDNAME => array ('codemp', 'ctapag', 'ctades', 'numini', 'ordnom', 'ordobr', 'unitri', 'vercomret', 'genctaord', 'forubi', 'tipaju', 'tipeje', 'numaut', 'tipmov', 'coriva', 'ctabono', 'ctavaca', 'gencaubon', 'gencomadi', 'unidad', 'ordliq', 'ordfid', 'ordval', 'genordret', 'emichepag', 'cuecajchi', 'tipcajchi', 'monapecajchi', 'porrepcajchi', 'tiprencajchi', 'numinicajchi', 'cedrifcajchi', 'codcatcajchi', 'gencomalc', 'reqaprord', 'ordcomptot', 'ordmotanu', 'manbloqban', 'ordret', 'ordconpre', 'ordtna', 'ordtba', 'ordcre', 'ordsolpag', 'monche', 'id', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, 24, 25, 26, 27, 28, 29, 30, 31, 32, 33, 34, 35, 36, 37, 38, 39, 40, 41, 42, 43, 44, 45, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('Codemp' => 0, 'Ctapag' => 1, 'Ctades' => 2, 'Numini' => 3, 'Ordnom' => 4, 'Ordobr' => 5, 'Unitri' => 6, 'Vercomret' => 7, 'Genctaord' => 8, 'Forubi' => 9, 'Tipaju' => 10, 'Tipeje' => 11, 'Numaut' => 12, 'Tipmov' => 13, 'Coriva' => 14, 'Ctabono' => 15, 'Ctavaca' => 16, 'Gencaubon' => 17, 'Gencomadi' => 18, 'Unidad' => 19, 'Ordliq' => 20, 'Ordfid' => 21, 'Ordval' => 22, 'Genordret' => 23, 'Emichepag' => 24, 'Cuecajchi' => 25, 'Tipcajchi' => 26, 'Monapecajchi' => 27, 'Porrepcajchi' => 28, 'Tiprencajchi' => 29, 'Numinicajchi' => 30, 'Cedrifcajchi' => 31, 'Codcatcajchi' => 32, 'Gencomalc' => 33, 'Reqaprord' => 34, 'Ordcomptot' => 35, 'Ordmotanu' => 36, 'Manbloqban' => 37, 'Ordret' => 38, 'Ordconpre' => 39, 'Ordtna' => 40, 'Ordtba' => 41, 'Ordcre' => 42, 'Ordsolpag' => 43, 'Monche' => 44, 'Id' => 45, ),
		BasePeer::TYPE_COLNAME => array (OpdefempPeer::CODEMP => 0, OpdefempPeer::CTAPAG => 1, OpdefempPeer::CTADES => 2, OpdefempPeer::NUMINI => 3, OpdefempPeer::ORDNOM => 4, OpdefempPeer::ORDOBR => 5, OpdefempPeer::UNITRI => 6, OpdefempPeer::VERCOMRET => 7, OpdefempPeer::GENCTAORD => 8, OpdefempPeer::FORUBI => 9, OpdefempPeer::TIPAJU => 10, OpdefempPeer::TIPEJE => 11, OpdefempPeer::NUMAUT => 12, OpdefempPeer::TIPMOV => 13, OpdefempPeer::CORIVA => 14, OpdefempPeer::CTABONO => 15, OpdefempPeer::CTAVACA => 16, OpdefempPeer::GENCAUBON => 17, OpdefempPeer::GENCOMADI => 18, OpdefempPeer::UNIDAD => 19, OpdefempPeer::ORDLIQ => 20, OpdefempPeer::ORDFID => 21, OpdefempPeer::ORDVAL => 22, OpdefempPeer::GENORDRET => 23, OpdefempPeer::EMICHEPAG => 24, OpdefempPeer::CUECAJCHI => 25, OpdefempPeer::TIPCAJCHI => 26, OpdefempPeer::MONAPECAJCHI => 27, OpdefempPeer::PORREPCAJCHI => 28, OpdefempPeer::TIPRENCAJCHI => 29, OpdefempPeer::NUMINICAJCHI => 30, OpdefempPeer::CEDRIFCAJCHI => 31, OpdefempPeer::CODCATCAJCHI => 32, OpdefempPeer::GENCOMALC => 33, OpdefempPeer::REQAPRORD => 34, OpdefempPeer::ORDCOMPTOT => 35, OpdefempPeer::ORDMOTANU => 36, OpdefempPeer::MANBLOQBAN => 37, OpdefempPeer::ORDRET => 38, OpdefempPeer::ORDCONPRE => 39, OpdefempPeer::ORDTNA => 40, OpdefempPeer::ORDTBA => 41, OpdefempPeer::ORDCRE => 42, OpdefempPeer::ORDSOLPAG => 43, OpdefempPeer::MONCHE => 44, OpdefempPeer::ID => 45, ),
		BasePeer::TYPE_FIELDNAME => array ('codemp' => 0, 'ctapag' => 1, 'ctades' => 2, 'numini' => 3, 'ordnom' => 4, 'ordobr' => 5, 'unitri' => 6, 'vercomret' => 7, 'genctaord' => 8, 'forubi' => 9, 'tipaju' => 10, 'tipeje' => 11, 'numaut' => 12, 'tipmov' => 13, 'coriva' => 14, 'ctabono' => 15, 'ctavaca' => 16, 'gencaubon' => 17, 'gencomadi' => 18, 'unidad' => 19, 'ordliq' => 20, 'ordfid' => 21, 'ordval' => 22, 'genordret' => 23, 'emichepag' => 24, 'cuecajchi' => 25, 'tipcajchi' => 26, 'monapecajchi' => 27, 'porrepcajchi' => 28, 'tiprencajchi' => 29, 'numinicajchi' => 30, 'cedrifcajchi' => 31, 'codcatcajchi' => 32, 'gencomalc' => 33, 'reqaprord' => 34, 'ordcomptot' => 35, 'ordmotanu' => 36, 'manbloqban' => 37, 'ordret' => 38, 'ordconpre' => 39, 'ordtna' => 40, 'ordtba' => 41, 'ordcre' => 42, 'ordsolpag' => 43, 'monche' => 44, 'id' => 45, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, 24, 25, 26, 27, 28, 29, 30, 31, 32, 33, 34, 35, 36, 37, 38, 39, 40, 41, 42, 43, 44, 45, )
	);

	
	public static function getMapBuilder()
	{
		include_once 'lib/model/map/OpdefempMapBuilder.php';
		return BasePeer::getMapBuilder('lib.model.map.OpdefempMapBuilder');
	}
	
	public static function getPhpNameMap()
	{
		if (self::$phpNameMap === null) {
			$map = OpdefempPeer::getTableMap();
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
		return str_replace(OpdefempPeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(OpdefempPeer::CODEMP);

		$criteria->addSelectColumn(OpdefempPeer::CTAPAG);

		$criteria->addSelectColumn(OpdefempPeer::CTADES);

		$criteria->addSelectColumn(OpdefempPeer::NUMINI);

		$criteria->addSelectColumn(OpdefempPeer::ORDNOM);

		$criteria->addSelectColumn(OpdefempPeer::ORDOBR);

		$criteria->addSelectColumn(OpdefempPeer::UNITRI);

		$criteria->addSelectColumn(OpdefempPeer::VERCOMRET);

		$criteria->addSelectColumn(OpdefempPeer::GENCTAORD);

		$criteria->addSelectColumn(OpdefempPeer::FORUBI);

		$criteria->addSelectColumn(OpdefempPeer::TIPAJU);

		$criteria->addSelectColumn(OpdefempPeer::TIPEJE);

		$criteria->addSelectColumn(OpdefempPeer::NUMAUT);

		$criteria->addSelectColumn(OpdefempPeer::TIPMOV);

		$criteria->addSelectColumn(OpdefempPeer::CORIVA);

		$criteria->addSelectColumn(OpdefempPeer::CTABONO);

		$criteria->addSelectColumn(OpdefempPeer::CTAVACA);

		$criteria->addSelectColumn(OpdefempPeer::GENCAUBON);

		$criteria->addSelectColumn(OpdefempPeer::GENCOMADI);

		$criteria->addSelectColumn(OpdefempPeer::UNIDAD);

		$criteria->addSelectColumn(OpdefempPeer::ORDLIQ);

		$criteria->addSelectColumn(OpdefempPeer::ORDFID);

		$criteria->addSelectColumn(OpdefempPeer::ORDVAL);

		$criteria->addSelectColumn(OpdefempPeer::GENORDRET);

		$criteria->addSelectColumn(OpdefempPeer::EMICHEPAG);

		$criteria->addSelectColumn(OpdefempPeer::CUECAJCHI);

		$criteria->addSelectColumn(OpdefempPeer::TIPCAJCHI);

		$criteria->addSelectColumn(OpdefempPeer::MONAPECAJCHI);

		$criteria->addSelectColumn(OpdefempPeer::PORREPCAJCHI);

		$criteria->addSelectColumn(OpdefempPeer::TIPRENCAJCHI);

		$criteria->addSelectColumn(OpdefempPeer::NUMINICAJCHI);

		$criteria->addSelectColumn(OpdefempPeer::CEDRIFCAJCHI);

		$criteria->addSelectColumn(OpdefempPeer::CODCATCAJCHI);

		$criteria->addSelectColumn(OpdefempPeer::GENCOMALC);

		$criteria->addSelectColumn(OpdefempPeer::REQAPRORD);

		$criteria->addSelectColumn(OpdefempPeer::ORDCOMPTOT);

		$criteria->addSelectColumn(OpdefempPeer::ORDMOTANU);

		$criteria->addSelectColumn(OpdefempPeer::MANBLOQBAN);

		$criteria->addSelectColumn(OpdefempPeer::ORDRET);

		$criteria->addSelectColumn(OpdefempPeer::ORDCONPRE);

		$criteria->addSelectColumn(OpdefempPeer::ORDTNA);

		$criteria->addSelectColumn(OpdefempPeer::ORDTBA);

		$criteria->addSelectColumn(OpdefempPeer::ORDCRE);

		$criteria->addSelectColumn(OpdefempPeer::ORDSOLPAG);

		$criteria->addSelectColumn(OpdefempPeer::MONCHE);

		$criteria->addSelectColumn(OpdefempPeer::ID);

	}

	const COUNT = 'COUNT(opdefemp.ID)';
	const COUNT_DISTINCT = 'COUNT(DISTINCT opdefemp.ID)';

	
	public static function doCount(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(OpdefempPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(OpdefempPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = OpdefempPeer::doSelectRS($criteria, $con);
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
		$objects = OpdefempPeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, $con = null)
	{
		return OpdefempPeer::populateObjects(OpdefempPeer::doSelectRS($criteria, $con));
	}
	
	public static function doSelectRS(Criteria $criteria, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if (!$criteria->getSelectColumns()) {
			$criteria = clone $criteria;
			OpdefempPeer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

						return BasePeer::doSelect($criteria, $con);
	}
	
	public static function populateObjects(ResultSet $rs)
	{
		$results = array();
	
				$cls = OpdefempPeer::getOMClass();
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
		return OpdefempPeer::CLASS_DEFAULT;
	}

	
	public static function doInsert($values, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} else {
			$criteria = $values->buildCriteria(); 		}

		$criteria->remove(OpdefempPeer::ID); 

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
			$comparison = $criteria->getComparison(OpdefempPeer::ID);
			$selectCriteria->add(OpdefempPeer::ID, $criteria->remove(OpdefempPeer::ID), $comparison);

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
			$affectedRows += BasePeer::doDeleteAll(OpdefempPeer::TABLE_NAME, $con);
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
			$con = Propel::getConnection(OpdefempPeer::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} elseif ($values instanceof Opdefemp) {

			$criteria = $values->buildPkeyCriteria();
		} else {
						$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(OpdefempPeer::ID, (array) $values, Criteria::IN);
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

	
	public static function doValidate(Opdefemp $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(OpdefempPeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(OpdefempPeer::TABLE_NAME);

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

		$res =  BasePeer::doValidate(OpdefempPeer::DATABASE_NAME, OpdefempPeer::TABLE_NAME, $columns);
    if ($res !== true) {
        $request = sfContext::getInstance()->getRequest();
        foreach ($res as $failed) {
            $col = OpdefempPeer::translateFieldname($failed->getColumn(), BasePeer::TYPE_COLNAME, BasePeer::TYPE_PHPNAME);
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

		$criteria = new Criteria(OpdefempPeer::DATABASE_NAME);

		$criteria->add(OpdefempPeer::ID, $pk);


		$v = OpdefempPeer::doSelect($criteria, $con);

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
			$criteria->add(OpdefempPeer::ID, $pks, Criteria::IN);
			$objs = OpdefempPeer::doSelect($criteria, $con);
		}
		return $objs;
	}

} 
if (Propel::isInit()) {
			try {
		BaseOpdefempPeer::getMapBuilder();
	} catch (Exception $e) {
		Propel::log('Could not initialize Peer: ' . $e->getMessage(), Propel::LOG_ERR);
	}
} else {
			require_once 'lib/model/map/OpdefempMapBuilder.php';
	Propel::registerMapBuilder('lib.model.map.OpdefempMapBuilder');
}
