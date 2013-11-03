<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of source
 *
 * @author kelvin
 */
class source {
    //instance variable
    private $id;
    private $tumor_id;
    private $hosptal;
    private $path_lab_no;
    private $unit;
    private $case_no;
    
    //constroctur
    function __construct($id, $pid) 
    {
        $squery =($id == "")?"SELECT * FROM source WHERE tumor_id='{$pid}'":"SELECT * FROM source WHERE id='{$id}'";
        $query = mysql_query($squery);
        while ($row = mysql_fetch_array($query)) 
            {
                extract($row);
                $this->id = $id;
                $this->tumor_id= $tumor_id;
                $this->hosptal= $hosptal;
                $this->path_lab_no= $path_lab_no;
                $this->unit= $unit;
                $this->case_no= $case_no;
            }
    } 
            function getId(){
                return $this->id;
            }
            
            function getTumorId(){
                return $this->tumor_id;
            }
            
            function getHosptal(){
                return $this->hosptal;
            }
            
            function getPathLab(){
                return $this->path_lab_no;
            }
            
            function getCaseNo(){
                return $this->case_no;
            }
            
            function getUnit(){
                return $this->unit;
            }
}

?>
