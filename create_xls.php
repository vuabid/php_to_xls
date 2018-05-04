<?php
$filename = "sample_php_excel.xls";
$data = array(
    array("User Name" => "Abid Ali", "Q1" => "$32055", "Q2" => "$31067", "Q3" => 32045, "Q4" => 39043),
    array("User Name" => "Sajid Ali", "Q1" => "$25080", "Q2" => "$20677", "Q3" => 32025, "Q4" => 34010),
    array("User Name" => "Wajid Ali", "Q1" => "$93067", "Q2" => "$98075", "Q3" => 95404, "Q4" => 102055),
);
to_xls($data, $filename);
echo "done";

function to_xls($data, $filename){
    $fp = fopen($filename, "w+");
    $str = pack(str_repeat("s", 6), 0x809, 0x8, 0x0, 0x10, 0x0, 0x0); // s | v
    fwrite($fp, $str);
    if (is_array($data) && !empty($data)){
        $row = 0;
        foreach (array_values($data) as $_data){
            if (is_array($_data) && !empty($_data)){
                if ($row == 0){
                    foreach (array_keys($_data) as $col => $val){
                        _xlsWriteCell($row, $col, $val, $fp);
                    }
                    $row++;
                }
                foreach (array_values($_data) as $col => $val){
                    _xlsWriteCell($row, $col, $val, $fp);
                }
                $row++;
            }
        }
    }
    $str = pack(str_repeat("s", 2), 0x0A, 0x00);
    fwrite($fp, $str);
    fclose($fp);
}

function _xlsWriteCell($row, $col, $val, $fp){
    if (is_float($val) || is_int($val)){
        $str  = pack(str_repeat("s", 5), 0x203, 14, $row, $col, 0x0);
        $str .= pack("d", $val);
    } else {
        $l    = strlen($val);
        $str  = pack(str_repeat("s", 6), 0x204, 8 + $l, $row, $col, 0x0, $l);
        $str .= $val;
    }
    fwrite($fp, $str);
}
?>