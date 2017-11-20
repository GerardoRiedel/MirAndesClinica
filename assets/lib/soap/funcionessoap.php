<?php
/**
 * Created by PhpStorm.
 * User: llopez
 * Date: 3/09/14
 * Time: 14:06
 */

function dump_xml( $title, $body )
{
    $nl = preg_replace( "/\>\</", ">\n<", $body );
    $clean = htmlspecialchars( $nl );
    print "\n<b>$title</b>\n<pre>$clean</pre>\n";
}
function soapDebug($client){
    $requestHeaders = $client->__getLastRequestHeaders();
    $request = beautify($client->__getLastRequest());
    $responseHeaders = $client->__getLastResponseHeaders();
    $response = beautify($client->__getLastResponse());
    echo '<code>' . nl2br(htmlspecialchars($requestHeaders, true)) . '</code>';
    echo highlight_string($request, true) . "<br/>\n";
    echo '<code>' . nl2br(htmlspecialchars($responseHeaders, true)) . '</code>' . "<br/>\n";
    echo highlight_string($response, true) . "<br/>\n";

    echo '<br>'. 'Debu' .'</br>';
    echo '<pre>' . htmlspecialchars($client->debug_str, ENT_QUOTES) . '</pre>';
}
function readpdf($file)
{
	$largo= filesize($file);
//lee el archivo escrito  a disco
    $fpPDF = fopen($file,"rb"); // habro el pdf
    $contenidoapdf = fread($fpPDF, $largo); // leo el contendio
$byteArray = unpack("N*",$contenidoapdf); 
//print_r($byteArray); 
for($n = 0; $n < 16; $n++)
{ 
    // echo $byteArray [$n].'<br/>'; 
}
	
    fclose($fpPDF); // cierro el pdf
    $pdfbin=  $contenidoapdf;
    return ($pdfbin);
	
	
}


function byteStr2byteArray($s) {
    return array_slice(unpack("C*", "\0".$s), 1);
}

function arraybyte($objpdf){
//$str_arr = str_split($objpdf, 4);
    $bin=array();
    $str_arr =chunk_split($objpdf, 4);
    $hasta=count($str_arr)	;
    for($i = 0; $i<$hasta; $i++){
        $bin .= str_pad(decbin(hexdec(bin2hex($str_arr[$i]))), strlen($str_arr[$i])*8, "0", STR_PAD_LEFT);
    }
    $byte_array = unpack('C*', $bin);
//var_dump($byte_array);  // $byte_array should be int[] which can be converted
// to byte[] in C# since values are range of 0 - 255
    return $byte_array;
}
function sqlite_encode_blob($data) {
    $result = "";
    for ($i = 0; $i < strlen($data); $i++) {
        $result .= sprintf("%02X", ord(substr($data, $i, 1)));
    }
    return $result;
}
function asc2bin($string)
{
    $result = '';
    $len = strlen($string);
    for ($i = 0; $i < $len; $i++)
    {
        $result .=sprintf("%08b",ord($string{$i}));
    }
    return $result;
}
function object2array($object)
{
    return json_decode(json_encode($object), TRUE);
}
function xmlstring2array($string)
{
    $xml   = simplexml_load_string($string, 'SimpleXMLElement', LIBXML_NOCDATA);
    $array = json_decode(json_encode($xml), TRUE);
    return $array;
}
function formatXmlString($xml){
    $xml = preg_replace('/(>)(<)(\/*)/', "$1\n$2$3", $xml);
    $token      = strtok($xml, "\n");
    $result     = '';
    $pad        = 0;
    $matches    = array();
    while ($token !== false) :
        if (preg_match('/.+<\/\w[^>]*>$/', $token, $matches)) :
            $indent=0;
        elseif (preg_match('/^<\/\w/', $token, $matches)) :
            $pad--;
            $indent = 0;
        elseif (preg_match('/^<\w[^>]*[^\/]>.*$/', $token, $matches)) :
            $indent=1;
        else :
            $indent = 0;
        endif;
        $line    = str_pad($token, strlen($token)+$pad, ' ', STR_PAD_LEFT);
        $result .= $line . "\n";
        $token   = strtok("\n");
        $pad    += $indent;
    endwhile;
    return $result;
}
function beautify($xmlString)
{
    $outputString = "";
    $previousBitIsCloseTag = false;
    $indentLevel = 0;
    $previousBitIsSimplifiedTag= false;
    $prefix= null;
    $bits = explode("<", $xmlString);
    foreach($bits as $bit){
        $bit = trim($bit);
        if (!empty($bit)){
            if ($bit[0]=="/"){ $isCloseTag = true; }
            else{ $isCloseTag = false; }
            if(strstr($bit, "/>")){
                $prefix = "\n".str_repeat(" ",$indentLevel);
                $previousBitIsSimplifiedTag = true;
            }else{
                if ( !$previousBitIsCloseTag and $isCloseTag){
                    if ($previousBitIsSimplifiedTag){
                        $indentLevel--;
                        $prefix = "\n".str_repeat(" ",$indentLevel);
                    }else{
                        $prefix = "";
                        $indentLevel--;
                    }
                }
                if ( $previousBitIsCloseTag and !$isCloseTag){$prefix = "\n".str_repeat(" ",$indentLevel); $indentLevel++;}
                if ( $previousBitIsCloseTag and $isCloseTag){$indentLevel--;$prefix = "\n".str_repeat(" ",$indentLevel);}
                if ( !$previousBitIsCloseTag and !$isCloseTag){{$prefix = "\n".str_repeat(" ",$indentLevel); $indentLevel++;}}
                $previousBitIsSimplifiedTag = false;
            }
            $outputString .= $prefix."<".$bit;
            $previousBitIsCloseTag = $isCloseTag;
        }
    }
    return $outputString;
}
function xmlpp($xml, $html_output=false) {
    $xml_obj = new SimpleXMLElement($xml);
    $level = 4;
    $indent = 0; // current indentation level
    $pretty = array();
    // get an array containing each XML element
    $xml = explode("\n", preg_replace('/>\s*</', ">\n<", $xml_obj->asXML()));
    // shift off opening XML tag if present
    if (count($xml) && preg_match('/^<\?\s*xml/', $xml[0])) {
        $pretty[] = array_shift($xml);
    }
    foreach ($xml as $el) {
        if (preg_match('/^<([\w])+[^>\/]*>$/U', $el)) {
            // opening tag, increase indent
            $pretty[] = str_repeat(' ', $indent) . $el;
            $indent += $level;
        } else {
            if (preg_match('/^<\/.+>$/', $el)) {
                $indent -= $level;  // closing tag, decrease indent
            }
            if ($indent < 0) {
                $indent += $level;
            }
            $pretty[] = str_repeat(' ', $indent) . $el;
        }
    }
    $xml = implode("\n", $pretty);
    return ($html_output) ? htmlentities($xml) : $xml;
}
function bencode($string='') {
    $binval = convert_binary_str($string);
    $final = "";
    $start = 0;
    while ($start < strlen($binval)) {
        if (strlen(substr($binval,$start)) < 6)
            $binval .= str_repeat("0",6-strlen(substr($binval,$start)));
        $tmp = bindec(substr($binval,$start,6));
        if ($tmp < 26)
            $final .= chr($tmp+65);
        elseif ($tmp > 25 && $tmp < 52)
            $final .= chr($tmp+71);
        elseif ($tmp == 62)
            $final .= "+";
        elseif ($tmp == 63)
            $final .= "/";
        elseif (!$tmp)
            $final .= "A";
        else
            $final .= chr($tmp-4);
        $start += 6;
    }
    if (strlen($final)%4>0)
        $final .= str_repeat("=",4-strlen($final)%4);
    return $final;
}
function convert_binary_str($string) {
    if (strlen($string)<=0)
        return null;
    $tmp = decbin(ord($string[0]));
    $tmp = str_repeat("0",8-strlen($tmp)).$tmp;
    return $tmp.convert_binary_str(substr($string,1));
}

function create_byte_array($string){
    $array = array();
    foreach(str_split($string) as $char){
        array_push($array, sprintf("%02X", ord($char)));
    }
    return implode(' ', $array);
}

