  function marcar() {
	var id='<?php echo $cpdeftit->getId()?>';
	fil=0;
	var sw=true;
	while (sw==true){
	   if(id!=null){
		   var id="ax"+"_"+fil+"_1";
		   $(id).checked=true;
		   fil++;
	   }else{
	   	   var sw=false;
	   }
	}
  }

  function desmarcar() {
  	var id='<?php echo $npasiconemp->getId()?>';
    fil=0;
    var sw=true;
    while (sw==true){
    	if(id==null){
		   sw=false;
	   }else{
	   	   var id="ax"+"_"+fil+"_1";
		   $(id).checked=false;
		   fil++;

	   }
    }
  }

