<?php

	function button_to_popup($name, $internal_uri)
	{
		return button_to($name,$internal_uri,array(
			'popup' => array('true','menubar=no,toolbar=no,scrollbars=yes,width=490,height=490,resizable=yes,left=50,top=50'),
  		));
	}

?>