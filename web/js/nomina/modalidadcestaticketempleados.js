function MarcarTodos(variable)
{
    var fil = 0;
    var existe = 2;

	while (existe > 1)
	{
	    var id = "conceptosx"+"_"+fil+"_3";
		if ($(id)){
            $(id).value=variable;
		}else{
		    existe=0;
		}
		fil ++;
	}
}



function desmarcarTodo()
{
    var fil = 0;
    var existe = 2;

	while (existe > 1)
	{
	    var id = "conceptosx"+"_"+fil+"_3";
		if ($(id)){
            $(id).value='';
		}else{
		    existe=0;
		}
		fil ++;
	}
}