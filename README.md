# Create .xls from PHP
Generate .xls file from PHP

## Usage:
```
$filename = "sample_php_excel.xls";
$data = array(
    array("User Name" => "Abid Ali", "Q1" => "$32055", "Q2" => "$31067", "Q3" => 32045, "Q4" => 39043),
    array("User Name" => "Sajid Ali", "Q1" => "$25080", "Q2" => "$20677", "Q3" => 32025, "Q4" => 34010),
    array("User Name" => "Wajid Ali", "Q1" => "$93067", "Q2" => "$98075", "Q3" => 95404, "Q4" => 102055),
);
to_xls($data, $filename);
```
