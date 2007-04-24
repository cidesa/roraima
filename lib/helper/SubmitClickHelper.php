<?php

  function submit_tag_click($value,$option)
  {
  	
  	$code = '<input type="button" name="'.$option['name'].'" value="'.$value.'" class="'.$option['class'].'" onclick="salvar();">';
  	
  	
  	$code = $code.'<script type="text/javascript">
					function salvar()
					{
						f=document.'.$option['form'].';
						f.action=location.pathname;
						f.submit();
					}
					</script>';
  	
  	return $code;
  }

?>