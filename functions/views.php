<?php

/**
 * 
 */
class View 
{
	
function make($view, $data = null)
	{
		
		if(is_array($data)) {
			extract($data);
		}
		
		
		include 'views/'.$view.'.php';
	}





}