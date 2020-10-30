<?php
    //Aqui estaremos insertando todas las funciones que se estaran reutilizando..
    
    function mysql_prep( $valor ) {
		$magic_quotes_activo = get_magic_quotes_gpc();
		$nuevo_version_php = function_exists( "mysql_real_escape_string" ); // ej. PHP >= v4.3.0
		if( $nuevo_version_php ) { // PHP v4.3.0 o mayor
			// deshacer cualquier cambio de magic quote de manera que mysql_real_escape_string pueda hacer su funcion
			if( $magic_quotes_activo ) { $valor = stripslashes( $valor ); }
			$valor = mysql_real_escape_string( $valor );
		} else { // antes de  PHP v4.3.0
			// si magic quotes no esta activo aun entonces agregar los  slashes manualmente
			if( !$magic_quotes_activo ) { $valor = addslashes( $valor ); }
			// si magic quotes esta activo, entonces los slashes ya existen
		}
		return $valor;
	}
    
    
    function redireccionar($ubicacion=NULL)
    {
        if($ubicacion != NULL)
        {
            header("Location: {$ubicacion}");
            exit;
            
        }
        
    }
    
    function confirmar_consulta($resultados_set)
    {
             if(!$resultados_set)
            {
                die("Hubo un error al generar la consulta " . mysql_error());
            }
        
    }

    function get_todos_topicos($publico=true)
    {
        global $conexion;
        
        $query = "SELECT * FROM
                  topico ";
        
        if($publico)
        {$query .= "WHERE visible =1 "; }
        $query .= "ORDER BY posicion ASC";
                    
        $topicos_set = mysql_query($query, $conexion);
        confirmar_consulta($topicos_set);
        
        return $topicos_set;
    }
    
    function get_paginas_para_topicos($topico_id, $publico=true)
    {
        global $conexion;
           $query = "SELECT * FROM paginas ";
           $query .= "WHERE topico_id={$topico_id} "; 
           if($publico)
           {
            $query .= "AND visible =1";
           }
           
           $query .= " ORDER BY posicion ASC";
                            
            $paginas_set = mysql_query($query, $conexion);
            confirmar_consulta($paginas_set);
            
            return $paginas_set;
        
    }


    function get_topico_por_id($topico_id)
    {
        global $conexion;
        $query =  "SELECT * ";
        $query .= "FROM topico ";
        $query .= "WHERE id=" . $topico_id . " ";
        $query .= "LIMIT 1";
        $topico_set = mysql_query($query, $conexion);
        confirmar_consulta($topico_set);
       
        if($topico = mysql_fetch_array($topico_set))
        {
            return $topico;
        }
        else{
            return NULL;
        }
        
    }
    
    function get_pagina_por_id($pagina_id)
    {
        global $conexion;
        $query =  "SELECT * ";
        $query .= "FROM paginas ";
        $query .= "WHERE id=" . $pagina_id . " ";
        $query .= "LIMIT 1";
        $pagina_set = mysql_query($query, $conexion);
        confirmar_consulta($pagina_set);
       
        if($pagina = mysql_fetch_array($pagina_set))
        {
            return $pagina;
        }
        else{
            return NULL;
        }
        
    }

    function get_pagina_default($topico_id)
    {
        //Recuparamos todos los topicos visibles
    }


    function buscar_pagina_selec()
    {
            global $sel_pagina_id;
            global $sel_topico_id;
            
        if(isset($_GET['topico']))
        {
            $sel_topico_id = get_topico_por_id($_GET['topico']);
            $sel_pagina_id= get_pagina_default($sel_topico_id['id']);
        }
        elseif(isset($_GET['pagina']))
        {
            $sel_pagina_id = get_pagina_por_id($_GET['pagina']);
            $sel_topico_id = NULL;
        }
        else
        {
            $sel_pagina_id = NULL;
            $sel_topico_id = NULL;
        }
   
    }
    

    function navegacion($sel_topico_id, $sel_pagina_id, $publico=false)
    {
                 
            $salida = "<ul class=\"topicos\">";
        
            $topicos_set = get_todos_topicos($publico);
            
                while($topico=mysql_fetch_array($topicos_set))
                {
                    $salida .= "<li";
                    if($topico["id"] == $sel_topico_id['id']){
                        $salida .= " class=\"selected\"";    
                    }
                    
                    $salida .= "><a href=\" editar_topico.php?topico=" . urlencode($topico["id"]) . "\">{$topico["nombre_menu"]}</a></li>";
                    
                    $paginas_set = get_paginas_para_topicos($topico["id"], $publico);
                    
                    $salida .= "<ul class=\" paginas \">";
                    while($pagina=mysql_fetch_array($paginas_set))
                    {
                        $salida .= "<li";
                        if($pagina["id"] == $sel_pagina_id['id']){
                            $salida .= " class=\"selected\"";
                        }
                        $salida .= "><a href=\" contenido.php?pagina="  . urlencode($pagina["id"]) . "\">{$pagina["nombre_menu"]}</a></li>";
                    }
                    $salida .= "</ul>";
                }
            
                    $salida .= "</ul>";

                    return $salida ;
        
        
    }

    function navegacion_publica($sel_topico_id, $sel_pagina_id, $publico=true)
        {
                     
                $salida = "<ul class=\"topicos\">";
            
                $topicos_set = get_todos_topicos($publico);
                
                    while($topico=mysql_fetch_array($topicos_set))
                    {
                        $salida .= "<li";
                        if($topico["id"] == $sel_topico_id['id']){
                            $salida .= " class=\"selected\"";    
                        }
                        
                        $salida .= "><a href=\" index.php?topico=" . urlencode($topico["id"]) . "\">{$topico["nombre_menu"]}</a></li>";
                        
                        if($topico["id"]==$sel_topico_id["id"]){
                            $paginas_set = get_paginas_para_topicos($topico["id"]);
                            
                            $salida .= "<ul class=\" paginas \">";
                            while($pagina=mysql_fetch_array($paginas_set))
                            {
                                $salida .= "<li";
                                if($pagina["id"] == $sel_pagina_id['id']){
                                    $salida .= " class=\"selected\"";
                                }
                                $salida .= "><a href=\" index.php?pagina="  . urlencode($pagina["id"]) . "\">{$pagina["nombre_menu"]}</a></li>";
                            }
                            $salida .= "</ul>";
                        }
                    }
                
                        $salida .= "</ul>";
    
                        return $salida ;
            
            
        }


?>
