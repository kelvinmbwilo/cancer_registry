<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of occupation
 *
 * @author kelvin
 */
class occupation {
    //instance variables
    private $id;
    private $name;
    
    //constroctur
    function __construct($oid) 
    {
        $query = mysql_query("SELECT * FROM occupation WHERE id='{$oid}'");
        while ($row = mysql_fetch_array($query)) 
            {
                extract($row);
                $this->id =   $id;
                $this->name = $name;
            }
    }
    
//    setters and getters
    function getId()
        {
            return $this->id;
        }

    function setId($value)
        {
            $query = mysql_query("UPDATE occupation SET id='{$value}' WHERE id='{$this->id}'") or die(mysql_error());
        }
        
        function getName()
        {
            return $this->name;
        }

    function setName($value)
        {
            $query = mysql_query("UPDATE occupation SET name='{$value}' WHERE id='{$this->id}'") or die(mysql_error());
        }
        
}

?>
