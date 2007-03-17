<?php

/**
 * Subclass for performing query and update operations on the 'cadetent' table.
 *
 * 
 *
 * @package lib.model
 */ 
class CadetentPeer extends BaseCadetentPeer
{
	
		private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('Número', 'Código Artículo', 'Canrec', 'Monto Total', 'Cosart', 'Id', ),
		BasePeer::TYPE_COLNAME => array (CadetentPeer::RCPART, CadetentPeer::CODART, CadetentPeer::CANREC, CadetentPeer::MONTOT, CadetentPeer::COSART, CadetentPeer::ID, ),
		BasePeer::TYPE_FIELDNAME => array ('rcpart', 'codart', 'canrec', 'montot', 'cosart', 'id', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, )
	);
	
}
