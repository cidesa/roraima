<?php

/**
 * Subclass for performing query and update operations on the 'ccamoact' table.
 *
 *
 *
 * @package lib.model
 */
class CcamoactPeer extends BaseCcamoactPeer
{

	public static function buscarPordefamoRS($id){
		$c = new Criteria();
		$c->add(CcamoactPeer::CCDEFAMO_ID,$id);
		$per = CcamoactPeer::doSelectRS($c);
		return $per;
	}

}
