<?php
class colorClassGen {
    function __construct($rowChoices,$colChoices){
        $this->rowChoices = $rowChoices;
        $this->colChoices = $colChoices;
        $this->rowChoicesLength = count($this->rowChoices);
        $this->colChoicesLength = count($this->colChoices);
    }
    
    function get($rownum,$colnum){
        $r = $this->rowChoices[$rownum % $this->rowChoicesLength];
        $c = $this->colChoices[$colnum % $this->colChoicesLength];
                
        $carray = ($r ==$c) ? array($r) : array($r,$c);
        asort($carray);
        return $this->prefix . implode("",$carray);
    }
    function setPrefix($str){
        $this->prefix = $str;
    }
}
?>