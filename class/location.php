<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of location
 *
 * @author kelvin
 */
class location {
    //instance variables
    private $id;
    private $name;
    private $level;
    private $code;
    private $node_id;
    
    //constroctur
    function __construct($nid) 
    {
        $query = mysql_query("SELECT * FROM location WHERE id='{$nid}'");
        while ($row = mysql_fetch_array($query)) 
            {
                extract($row);
                $this->id = $id;
                $this->name = $name;
                $this->level = $level;
                $this->code = $code;
                $this->node_id = $node_id;
            }
    }
    
//    setters and getters
    
     function getId()
        {
            return $this->id;
        }

     function setId($value)
        {
            $query = mysql_query("UPDATE location SET id='{$value}' WHERE id='{$this->id}'") or die(mysql_error());
        }
        
        function getName()
        {
            return $this->name;
        }

     function setName($value)
        {
            $query = mysql_query("UPDATE location SET name='{$value}' WHERE id='{$this->id}'") or die(mysql_error());
        }
        
        function getLevel()
        {
            return $this->id;
        }

     function setLevel($value)
        {
            $query = mysql_query("UPDATE location SET id='{$value}' WHERE id='{$this->id}'") or die(mysql_error());
        }
        
        function getCode()
        {
            return $this->code;
        }

     function setCode($value)
        {
            $query = mysql_query("UPDATE location SET code='{$value}' WHERE id='{$this->id}'") or die(mysql_error());
        }
        
        function getNode_id()
        {
            return $this->node_id;
        }

     function setNode_id($value)
        {
            $query = mysql_query("UPDATE location SET node_id='{$value}' WHERE id='{$this->id}'") or die(mysql_error());
        }
}

?>
