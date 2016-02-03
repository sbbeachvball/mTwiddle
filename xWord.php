<!DOCTYPE html><html lang="en"><head><title>Word Search</title>
<style>  
html {  font-family: helvetica, arial, sans-serif; font-size: 0.9em;}
table { border-collapse: collapse; border: 2px solid blue; margin: 10px; border-radius: 8px; }
td { border: 1px solid #ccc; width: 32px;    height: 32px;   margin: 5px;  
    text-align: left;   
    font-weight: bold;   vertical-align: top; font-size: 0.6em;  }
#wordList-Container { border: solid 1px blue; margin: 10px; border-radius: 8px; width: 840px; }
.wordList { display: inline-block; padding: 8px; padding-left: 15px; width: 390px; font-size: 1.4em; }
.black { background-color: black; }
.solution { font-size: 1.8em; vertical-align: middle; text-align: center; }
</style></head><body><table>
<?php
class xWord {
    function __construct($rows,$cols){
        $this->wordlist = array();
        $this->rowCount = $rows;
        $this->colCount = $cols;
        // create a matrix of empty
        $cols = array_fill(0,$this->colCount,'');
        $this->data = array_fill(0,$this->rowCount,$cols);
        $this->num = array_fill(0,$this->rowCount,$cols);
        $this->errs = $this->out = $this->allStr = '';
        $this->all = $this->fill = $this->wordList = array();
        $this->cluenum = 0;
        $this->clue = array();
        foreach( array('Across','Down') as $dir){
            $this->clue[$dir] = array();
            $this->clue[$dir][] = "<strong>$dir</strong>";
        }
    }
    function addWord($dir,$c,$r,$word,$clue){
        if ( ! isset($this->wordlist[$dir])) $this->wordlist[$dir] = array();
        if ($dir == 'Across' ){
            $vdir = 0;  $hdir = 1;
        }
        else {
            $vdir = 1;  $hdir = 0;
        }
        $this->wordList[$dir][] = $word;
        $this->allStr .= $word;
        $w = str_split($word);
        $this->setClue($dir,$c,$r,$word,$clue);
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
    function setClue($dir,$c,$r,$word,$clue){
        // Assign a number to the clue and build an array for the clues
        if ($this->num[$r][$c] == '' ) {
            //print "found unshared  cell: " . $c . "," . $r . " for word: " . $word . "<br>\n";
            $this->cluenum++;
        }
        $this->num[$r][$c] = $this->cluenum;
        $this->clue[$dir][] = $this->cluenum . " - " . $clue ;
    }
    function display(){
        $b = '';
        for($i=0;$i<$this->rowCount;$i++){
            $b .=  "<tr>\n";
            for($j=0;$j<$this->colCount;$j++){
                $clstr = 'class="solution"';
                if ( $this->data[$i][$j] == '' ) {
                    $clstr="class=\"black\"";
                }
                $d = $this->data[$i][$j];
                //$d = $this->num[$i][$j];
                $b .=  "<td $clstr>" . $d . "</td>\n";
            }
            $b .= "</tr>\n";
        }
        return $b;
    }
    function displayClues(){
        $b = '';
        $keys = array_keys($this->clue);
        foreach( $keys as $block){
            //print "block: $block<br>\n";
            $chunked = array_chunk($this->clue[$block], 7);
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
        }
        return $b;
    }
}

$ws = new xWord(18,24);
$ws->addWord("Across"  , 0, 0, "mountain"    ,"Tall and part of a landscape");
$ws->addWord("Down"    , 4, 0, "treasure"    ,"Pirates love this");
$ws->addWord("Down"    ,13, 0, "villain"     ,"Bad guy");
$ws->addWord("Across"  ,13, 0, "vulture"     ,"Large, carrion eating birds");
$ws->addWord("Down"    ,22, 0, "future"      ,"Time after now");
$ws->addWord("Down"    , 9, 1, "measure"     ,"Rulers do this");
$ws->addWord("Down"    , 1, 2, "architecture","Building design");
$ws->addWord("Across"  , 1, 2, "adventure"   ,"Exciting event");
$ws->addWord("Down"    ,11, 2, "texture"     ,"How something feels");
$ws->addWord("Across"  ,13, 3, "luncheon"    ,"Between breakfast and dinner");
$ws->addWord("Down"    ,16, 3, "captain"     ,"Leader - on a ship");
$ws->addWord("Across"  , 8, 5, "curtain"     ,"Window Covers");
$ws->addWord("Across"  ,16, 5, "pasture"     ,"Cows eat here");
$ws->addWord("Down"    , 6, 7, "fountain"    ,"Found in courtyards");
$ws->addWord("Down"    ,14, 8, "mixture"     ,"Combined elements");
$ws->addWord("Across"  ,14, 8, "moisture"    ,"Water in the air");
$ws->addWord("Across"  , 1, 9, "creature"    ,"________ from the black lagoon");
$ws->addWord("Down"    ,11,10, "pleasure"    ,"Happiness");
$ws->addWord("Down"    ,18,10, "surgeon"     ,"Found in an operating room");
$ws->addWord("Across"  , 3,11, "lecture"     ,"Talk to an audience");
$ws->addWord("Down"    ,22,11, "feature"     ,"_______ presentation");
$ws->addWord("Across"  ,13,12, "culture"     ,"Customs and beliefs of a society");
$ws->addWord("Across"  , 8,14, "leisure"     ,"Relaxing");
$ws->addWord("Across"  , 4,16, "departure"   ,"Leaving");
$ws->addWord("Across"  ,15,16, "furniture"   ,"You have this in your house");

print $ws->display() . "</table>" . $ws->displayClues() . $ws->errs ;
// print code using enscript:
// enscript --line-numbers --word-wrap --landscape -2 
// --borders -p - mTwiddle/xWord.php |  pstopdf -i -o ./out.pdf
?>
</body></html>