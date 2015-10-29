<!DOCTYPE html><html lang="en"><head><title>Word Search</title>
<style>  
html {  font-family: helvetica, arial, sans-serif; }
table { border-collapse: collapse; border: 2px solid blue; margin: 10px; border-radius: 8px; }
td { border: 1px solid #ccc; width: 40px;    height: 40px;   margin: 5px;  
    text-align: center;   
    font-weight: bold;   font-size: 2em;  }
#wordList-Container { border: solid 1px blue; margin: 10px; border-radius: 8px; width: 775px; }
.wordList { display: inline-block; padding: 8px; padding-left: 15px; width: 130px; font-size: 1.4em; }
</style></head><body><table>
<?php
class wordSearch {
    function __construct($rows,$cols){
        $this->rowCount = $rows;
        $this->colCount = $cols;
        // create a matrix of empty
        $cols = array_fill(0,$this->colCount,'');
        $this->data = array_fill(0,$this->rowCount,$cols);
        $this->errs = $this->out = $this->allStr = '';
        $this->all = $this->fill = $this->wordList = array();
    }
    function addWord($word,$r,$c,$hdir,$vdir){
        $this->wordList[] = $word;
        $this->allStr .= $word;
        $w = str_split($word);
        foreach( $w as $k => $v){
            if ($this->data[$r][$c] != '' ){
                if ($this->data[$r][$c] != $v) 
                    $this->errs .= "value missmatch<br>\n";
            }
            $this->data[$r][$c] = $v;
            $this->out .= "$r $c: $v<br>\n";
            $r += $vdir;    $c += $hdir;
        }
    }
    function buildFillString(){
        $this->all = str_split($this->allStr);
        $chunkLen = 3;
        for($i=0;$i<50;$i++){
            // would like to generate this a little less randomly, so that it was
            // repeatable and produces the same fill string each time.  Maybe get cleverer 
            // about building that array as things are read in
            $index = mt_rand(0,count($this->all)-$chunkLen);
            $this->fill = array_merge($this->fill,
                array_slice($this->all,$index,$chunkLen));
        }
    }
    function display(){
        $this->buildFillString();
        $this->fill();
        $b = '';
        for($i=0;$i<$this->rowCount;$i++){
            $b .=  "<tr>\n";
            for($j=0;$j<$this->colCount;$j++)
                $b .=  "<td>" . $this->data[$i][$j] . "</td>\n";
            $b .= "</tr>\n";
        }
        return $b;
    }
    function fill(){
        $filler = $this->fill;
        for($i=0;$i<$this->rowCount;$i++){
            for($j=0;$j<$this->colCount;$j++){
                if ( $this->data[$i][$j] == '' ){
                    $this->data[$i][$j] = array_shift($filler);
                    if( count($filler) <= 0){
                        $filler=$this->fill;
                    }
                }
            }
        }
    }
    function displayWordList(){
        $chunked = array_chunk($this->wordList, 5);
        $b = '';
        $b .= '<div id="wordList-Container">';
        // want to break these into 3 or four columns
        foreach( $chunked as $chunk){
            
            $b .= '<div class="wordList">';
            foreach( $chunk as $word){
            $b .= $word . "<br>\n";
            }
            $b .= '</div>';
        }
        $b .= '</div>';
        return $b;
    }
}

$ws = new wordSearch(18,18);
$ws->addWord("theater",13,5,1,0);
$ws->addWord("actor",12,10,1,0);
$ws->addWord("mirror",17,9,1,-1);
$ws->addWord("powder",6,12,1,1);
$ws->addWord("humor",14,1,1,-1);
$ws->addWord("anger",4,6,0,-1);
$ws->addWord("banner",7,5,1,-1);
$ws->addWord("pillar",4,10,1,0);
$ws->addWord("major",5,9,0,1);
$ws->addWord("thunder",0,0,1,0);
$ws->addWord("flavor",8,5,1,0);
$ws->addWord("finger",1,2,1,0);
$ws->addWord("mayor",12,3,1,0);
$ws->addWord("polar",4,10,0,1);
$ws->addWord("chamber",10,1,1,-1);
$ws->addWord("clover",3,12,1,1);
$ws->addWord("burglar",2,3,1,0);
$ws->addWord("tractor",9,3,1,0);
$ws->addWord("matter",7,7,0,1);
$ws->addWord("lunar",6,10,1,1);
$ws->addWord("quarter",16,8,1,-1);
$ws->addWord("oyster",2,1,0,1);
$ws->addWord("clamor",3,13,0,1);
$ws->addWord("tremor",10,7,1,0);
$ws->addWord("scholar",4,1,1,0);
print $ws->display() . "</table>" . $ws->displayWordList() . $ws->errs ;
// print code using enscript:
// enscript --line-numbers --word-wrap --landscape -2 
// --borders -p - mTwiddle/wordSearch.php |  pstopdf -i -o ./out.pdf
?>
</body></html>