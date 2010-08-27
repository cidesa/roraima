<?php


abstract class BaseFaartfacproPeer {


	const DATABASE_NAME = 'propel';


	const TABLE_NAME = 'faartfacpro';


	const CLASS_DEFAULT = 'lib.model.Faartfacpro';


	const NUM_COLUMNS = 44;


	const NUM_LAZY_LOAD_COLUMNS = 0;



	const REFFAC = 'faartfacpro.REFFAC';


	const CODART = 'faartfacpro.CODART';


	const DESART = 'faartfacpro.DESART';


	const CODREF = 'faartfacpro.CODREF';


	const CANTOT = 'faartfacpro.CANTOT';


	const PRECIO = 'faartfacpro.PRECIO';


	const MONRGO = 'faartfacpro.MONRGO';


	const MONDES = 'faartfacpro.MONDES';


	const TOTART = 'faartfacpro.TOTART';


	const CANAJU = 'faartfacpro.CANAJU';


	const CANDES = 'faartfacpro.CANDES';


	const NRONOT = 'faartfacpro.NRONOT';


	const ORDDESPACHO = 'faartfacpro.ORDDESPACHO';


	const GUIA = 'faartfacpro.GUIA';


	const CONTENEDORES = 'faartfacpro.CONTENEDORES';


	const BILLLEADING = 'faartfacpro.BILLLEADING';


	const PLACA = 'faartfacpro.PLACA';


	const RIFPRO = 'faartfacpro.RIFPRO';


	const FECSAL = 'faartfacpro.FECSAL';


	const HORSAL = 'faartfacpro.HORSAL';


	const FECLLEG = 'faartfacpro.FECLLEG';


	const HORLLEG = 'faartfacpro.HORLLEG';


	const CODPROD = 'faartfacpro.CODPROD';


	const KG = 'faartfacpro.KG';


	const CAJAS = 'faartfacpro.CAJAS';


	const ESTATUS = 'faartfacpro.ESTATUS';


	const OBSERVACIONES = 'faartfacpro.OBSERVACIONES';


	const TM = 'faartfacpro.TM';


	const CEDRIF = 'faartfacpro.CEDRIF';

	
	const NOTENTDIG = 'faartfacpro.NOTENTDIG';

	
	const TIPOV = 'faartfacpro.TIPOV';

	
	const FECLLCA = 'faartfacpro.FECLLCA';

	
	const HORLLCA = 'faartfacpro.HORLLCA';

	
	const FECDESC = 'faartfacpro.FECDESC';

	
	const HORDESC = 'faartfacpro.HORDESC';

	
	const KGENT = 'faartfacpro.KGENT';

	
	const DIFKG = 'faartfacpro.DIFKG';

	
	const CAJASENT = 'faartfacpro.CAJASENT';

	
	const DIFCAJ = 'faartfacpro.DIFCAJ';

	
	const TMENT = 'faartfacpro.TMENT';

	
	const DIFTON = 'faartfacpro.DIFTON';

	
	const IER = 'faartfacpro.IER';

	
	const NUMFAC = 'faartfacpro.NUMFAC';

	
	const ID = 'faartfacpro.ID';


	private static $phpNameMap = null;



	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('Reffac', 'Codart', 'Desart', 'Codref', 'Cantot', 'Precio', 'Monrgo', 'Mondes', 'Totart', 'Canaju', 'Candes', 'Nronot', 'Orddespacho', 'Guia', 'Contenedores', 'Billleading', 'Placa', 'Rifpro', 'Fecsal', 'Horsal', 'Feclleg', 'Horlleg', 'Codprod', 'Kg', 'Cajas', 'Estatus', 'Observaciones', 'Tm', 'Cedrif', 'Notentdig', 'Tipov', 'Fecllca', 'Horllca', 'Fecdesc', 'Hordesc', 'Kgent', 'Difkg', 'Cajasent', 'Difcaj', 'Tment', 'Difton', 'Ier', 'Numfac', 'Id', ),
		BasePeer::TYPE_COLNAME => array (FaartfacproPeer::REFFAC, FaartfacproPeer::CODART, FaartfacproPeer::DESART, FaartfacproPeer::CODREF, FaartfacproPeer::CANTOT, FaartfacproPeer::PRECIO, FaartfacproPeer::MONRGO, FaartfacproPeer::MONDES, FaartfacproPeer::TOTART, FaartfacproPeer::CANAJU, FaartfacproPeer::CANDES, FaartfacproPeer::NRONOT, FaartfacproPeer::ORDDESPACHO, FaartfacproPeer::GUIA, FaartfacproPeer::CONTENEDORES, FaartfacproPeer::BILLLEADING, FaartfacproPeer::PLACA, FaartfacproPeer::RIFPRO, FaartfacproPeer::FECSAL, FaartfacproPeer::HORSAL, FaartfacproPeer::FECLLEG, FaartfacproPeer::HORLLEG, FaartfacproPeer::CODPROD, FaartfacproPeer::KG, FaartfacproPeer::CAJAS, FaartfacproPeer::ESTATUS, FaartfacproPeer::OBSERVACIONES, FaartfacproPeer::TM, FaartfacproPeer::CEDRIF, FaartfacproPeer::NOTENTDIG, FaartfacproPeer::TIPOV, FaartfacproPeer::FECLLCA, FaartfacproPeer::HORLLCA, FaartfacproPeer::FECDESC, FaartfacproPeer::HORDESC, FaartfacproPeer::KGENT, FaartfacproPeer::DIFKG, FaartfacproPeer::CAJASENT, FaartfacproPeer::DIFCAJ, FaartfacproPeer::TMENT, FaartfacproPeer::DIFTON, FaartfacproPeer::IER, FaartfacproPeer::NUMFAC, FaartfacproPeer::ID, ),
		BasePeer::TYPE_FIELDNAME => array ('reffac', 'codart', 'desart', 'codref', 'cantot', 'precio', 'monrgo', 'mondes', 'totart', 'canaju', 'candes', 'nronot', 'orddespacho', 'guia', 'contenedores', 'billleading', 'placa', 'rifpro', 'fecsal', 'horsal', 'feclleg', 'horlleg', 'codprod', 'kg', 'cajas', 'estatus', 'observaciones', 'tm', 'cedrif', 'notentdig', 'tipov', 'fecllca', 'horllca', 'fecdesc', 'hordesc', 'kgent', 'difkg', 'cajasent', 'difcaj', 'tment', 'difton', 'ier', 'numfac', 'id', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, 24, 25, 26, 27, 28, 29, 30, 31, 32, 33, 34, 35, 36, 37, 38, 39, 40, 41, 42, 43, )
	);


	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('Reffac' => 0, 'Codart' => 1, 'Desart' => 2, 'Codref' => 3, 'Cantot' => 4, 'Precio' => 5, 'Monrgo' => 6, 'Mondes' => 7, 'Totart' => 8, 'Canaju' => 9, 'Candes' => 10, 'Nronot' => 11, 'Orddespacho' => 12, 'Guia' => 13, 'Contenedores' => 14, 'Billleading' => 15, 'Placa' => 16, 'Rifpro' => 17, 'Fecsal' => 18, 'Horsal' => 19, 'Feclleg' => 20, 'Horlleg' => 21, 'Codprod' => 22, 'Kg' => 23, 'Cajas' => 24, 'Estatus' => 25, 'Observaciones' => 26, 'Tm' => 27, 'Cedrif' => 28, 'Notentdig' => 29, 'Tipov' => 30, 'Fecllca' => 31, 'Horllca' => 32, 'Fecdesc' => 33, 'Hordesc' => 34, 'Kgent' => 35, 'Difkg' => 36, 'Cajasent' => 37, 'Difcaj' => 38, 'Tment' => 39, 'Difton' => 40, 'Ier' => 41, 'Numfac' => 42, 'Id' => 43, ),
		BasePeer::TYPE_COLNAME => array (FaartfacproPeer::REFFAC => 0, FaartfacproPeer::CODART => 1, FaartfacproPeer::DESART => 2, FaartfacproPeer::CODREF => 3, FaartfacproPeer::CANTOT => 4, FaartfacproPeer::PRECIO => 5, FaartfacproPeer::MONRGO => 6, FaartfacproPeer::MONDES => 7, FaartfacproPeer::TOTART => 8, FaartfacproPeer::CANAJU => 9, FaartfacproPeer::CANDES => 10, FaartfacproPeer::NRONOT => 11, FaartfacproPeer::ORDDESPACHO => 12, FaartfacproPeer::GUIA => 13, FaartfacproPeer::CONTENEDORES => 14, FaartfacproPeer::BILLLEADING => 15, FaartfacproPeer::PLACA => 16, FaartfacproPeer::RIFPRO => 17, FaartfacproPeer::FECSAL => 18, FaartfacproPeer::HORSAL => 19, FaartfacproPeer::FECLLEG => 20, FaartfacproPeer::HORLLEG => 21, FaartfacproPeer::CODPROD => 22, FaartfacproPeer::KG => 23, FaartfacproPeer::CAJAS => 24, FaartfacproPeer::ESTATUS => 25, FaartfacproPeer::OBSERVACIONES => 26, FaartfacproPeer::TM => 27, FaartfacproPeer::CEDRIF => 28, FaartfacproPeer::NOTENTDIG => 29, FaartfacproPeer::TIPOV => 30, FaartfacproPeer::FECLLCA => 31, FaartfacproPeer::HORLLCA => 32, FaartfacproPeer::FECDESC => 33, FaartfacproPeer::HORDESC => 34, FaartfacproPeer::KGENT => 35, FaartfacproPeer::DIFKG => 36, FaartfacproPeer::CAJASENT => 37, FaartfacproPeer::DIFCAJ => 38, FaartfacproPeer::TMENT => 39, FaartfacproPeer::DIFTON => 40, FaartfacproPeer::IER => 41, FaartfacproPeer::NUMFAC => 42, FaartfacproPeer::ID => 43, ),
		BasePeer::TYPE_FIELDNAME => array ('reffac' => 0, 'codart' => 1, 'desart' => 2, 'codref' => 3, 'cantot' => 4, 'precio' => 5, 'monrgo' => 6, 'mondes' => 7, 'totart' => 8, 'canaju' => 9, 'candes' => 10, 'nronot' => 11, 'orddespacho' => 12, 'guia' => 13, 'contenedores' => 14, 'billleading' => 15, 'placa' => 16, 'rifpro' => 17, 'fecsal' => 18, 'horsal' => 19, 'feclleg' => 20, 'horlleg' => 21, 'codprod' => 22, 'kg' => 23, 'cajas' => 24, 'estatus' => 25, 'observaciones' => 26, 'tm' => 27, 'cedrif' => 28, 'notentdig' => 29, 'tipov' => 30, 'fecllca' => 31, 'horllca' => 32, 'fecdesc' => 33, 'hordesc' => 34, 'kgent' => 35, 'difkg' => 36, 'cajasent' => 37, 'difcaj' => 38, 'tment' => 39, 'difton' => 40, 'ier' => 41, 'numfac' => 42, 'id' => 43, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, 24, 25, 26, 27, 28, 29, 30, 31, 32, 33, 34, 35, 36, 37, 38, 39, 40, 41, 42, 43, )
	);


	public static function getMapBuilder()
	{
		include_once 'lib/model/map/FaartfacproMapBuilder.php';
		return BasePeer::getMapBuilder('lib.model.map.FaartfacproMapBuilder');
	}

	public static function getPhpNameMap()
	{
		if (self::$phpNameMap === null) {
			$map = FaartfacproPeer::getTableMap();
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
		return str_replace(FaartfacproPeer::TABLE_NAME.'.', $alias.'.', $column);
	}


	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(FaartfacproPeer::REFFAC);

		$criteria->addSelectColumn(FaartfacproPeer::CODART);

		$criteria->addSelectColumn(FaartfacproPeer::DESART);

		$criteria->addSelectColumn(FaartfacproPeer::CODREF);

		$criteria->addSelectColumn(FaartfacproPeer::CANTOT);

		$criteria->addSelectColumn(FaartfacproPeer::PRECIO);

		$criteria->addSelectColumn(FaartfacproPeer::MONRGO);

		$criteria->addSelectColumn(FaartfacproPeer::MONDES);

		$criteria->addSelectColumn(FaartfacproPeer::TOTART);

		$criteria->addSelectColumn(FaartfacproPeer::CANAJU);

		$criteria->addSelectColumn(FaartfacproPeer::CANDES);

		$criteria->addSelectColumn(FaartfacproPeer::NRONOT);

		$criteria->addSelectColumn(FaartfacproPeer::ORDDESPACHO);

		$criteria->addSelectColumn(FaartfacproPeer::GUIA);

		$criteria->addSelectColumn(FaartfacproPeer::CONTENEDORES);

		$criteria->addSelectColumn(FaartfacproPeer::BILLLEADING);

		$criteria->addSelectColumn(FaartfacproPeer::PLACA);

		$criteria->addSelectColumn(FaartfacproPeer::RIFPRO);

		$criteria->addSelectColumn(FaartfacproPeer::FECSAL);

		$criteria->addSelectColumn(FaartfacproPeer::HORSAL);

		$criteria->addSelectColumn(FaartfacproPeer::FECLLEG);

		$criteria->addSelectColumn(FaartfacproPeer::HORLLEG);

		$criteria->addSelectColumn(FaartfacproPeer::CODPROD);

		$criteria->addSelectColumn(FaartfacproPeer::KG);

		$criteria->addSelectColumn(FaartfacproPeer::CAJAS);

		$criteria->addSelectColumn(FaartfacproPeer::ESTATUS);

		$criteria->addSelectColumn(FaartfacproPeer::OBSERVACIONES);

		$criteria->addSelectColumn(FaartfacproPeer::TM);

		$criteria->addSelectColumn(FaartfacproPeer::CEDRIF);

		$criteria->addSelectColumn(FaartfacproPeer::NOTENTDIG);

		$criteria->addSelectColumn(FaartfacproPeer::TIPOV);

		$criteria->addSelectColumn(FaartfacproPeer::FECLLCA);

		$criteria->addSelectColumn(FaartfacproPeer::HORLLCA);

		$criteria->addSelectColumn(FaartfacproPeer::FECDESC);

		$criteria->addSelectColumn(FaartfacproPeer::HORDESC);

		$criteria->addSelectColumn(FaartfacproPeer::KGENT);

		$criteria->addSelectColumn(FaartfacproPeer::DIFKG);

		$criteria->addSelectColumn(FaartfacproPeer::CAJASENT);

		$criteria->addSelectColumn(FaartfacproPeer::DIFCAJ);

		$criteria->addSelectColumn(FaartfacproPeer::TMENT);

		$criteria->addSelectColumn(FaartfacproPeer::DIFTON);

		$criteria->addSelectColumn(FaartfacproPeer::IER);

		$criteria->addSelectColumn(FaartfacproPeer::NUMFAC);

		$criteria->addSelectColumn(FaartfacproPeer::ID);

	}

	const COUNT = 'COUNT(faartfacpro.ID)';
	const COUNT_DISTINCT = 'COUNT(DISTINCT faartfacpro.ID)';


	public static function doCount(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(FaartfacproPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(FaartfacproPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = FaartfacproPeer::doSelectRS($criteria, $con);
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
		$objects = FaartfacproPeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}

	public static function doSelect(Criteria $criteria, $con = null)
	{
		return FaartfacproPeer::populateObjects(FaartfacproPeer::doSelectRS($criteria, $con));
	}

	public static function doSelectRS(Criteria $criteria, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if (!$criteria->getSelectColumns()) {
			$criteria = clone $criteria;
			FaartfacproPeer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

						return BasePeer::doSelect($criteria, $con);
	}

	public static function populateObjects(ResultSet $rs)
	{
		$results = array();

				$cls = FaartfacproPeer::getOMClass();
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
		return FaartfacproPeer::CLASS_DEFAULT;
	}


	public static function doInsert($values, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} else {
			$criteria = $values->buildCriteria(); 		}

		$criteria->remove(FaartfacproPeer::ID);

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
			$comparison = $criteria->getComparison(FaartfacproPeer::ID);
			$selectCriteria->add(FaartfacproPeer::ID, $criteria->remove(FaartfacproPeer::ID), $comparison);

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
			$affectedRows += BasePeer::doDeleteAll(FaartfacproPeer::TABLE_NAME, $con);
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
			$con = Propel::getConnection(FaartfacproPeer::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} elseif ($values instanceof Faartfacpro) {

			$criteria = $values->buildPkeyCriteria();
		} else {
						$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(FaartfacproPeer::ID, (array) $values, Criteria::IN);
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


	public static function doValidate(Faartfacpro $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(FaartfacproPeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(FaartfacproPeer::TABLE_NAME);

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

		$res =  BasePeer::doValidate(FaartfacproPeer::DATABASE_NAME, FaartfacproPeer::TABLE_NAME, $columns);
    if ($res !== true) {
        $request = sfContext::getInstance()->getRequest();
        foreach ($res as $failed) {
            $col = FaartfacproPeer::translateFieldname($failed->getColumn(), BasePeer::TYPE_COLNAME, BasePeer::TYPE_PHPNAME);
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

		$criteria = new Criteria(FaartfacproPeer::DATABASE_NAME);

		$criteria->add(FaartfacproPeer::ID, $pk);


		$v = FaartfacproPeer::doSelect($criteria, $con);

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
			$criteria->add(FaartfacproPeer::ID, $pks, Criteria::IN);
			$objs = FaartfacproPeer::doSelect($criteria, $con);
		}
		return $objs;
	}

}
if (Propel::isInit()) {
			try {
		BaseFaartfacproPeer::getMapBuilder();
	} catch (Exception $e) {
		Propel::log('Could not initialize Peer: ' . $e->getMessage(), Propel::LOG_ERR);
	}
} else {
			require_once 'lib/model/map/FaartfacproMapBuilder.php';
	Propel::registerMapBuilder('lib.model.map.FaartfacproMapBuilder');
}
