<?php


$search = '/([Ss][Ee][Ll][Ee][Cc][Tt]|\"|\'|\=|\&|\@|\#|\(|\)|\^|\~|[Uu][Pp][Dd][Aa][Tt][Ee]|[Dd][Ee][Ll][Ee][Tt][Ee]|[Ii][Nn][Ss][Ee][Rr][Tt]|\*|\%|[Aa][Ll][Tt][Ee][Rr]|[Cc][Rr][Ee][Aa][Tt][Ee]|\\\|\/\/|[Dd][Ee][Ss][Cc][Rr][Ii][Bb][Ee]|\+|\-|\_|\?|[Tt][Oo][Pp]|[Ff][Rr][Oo][Mm]|[Jj][Oo][Ii][Nn]|\:|\;|[Ww][Hh][Ee][Rr][Ee]|\<|\>|\]|\[|\{|\}|[Ll][Ii][Mm][Ii][Tt]|[Tt][Aa][Bb][Ll][Ee])/';

$select = "SELECT * FROM tablename WHERE id = '1' AND name = 'Test' ORDER BY id  DESC";

$update = "UPDATE tablename SET id = '123' WHERE id = '1' AND name = 'Test' OR '1' = '1'  ORDER BY id DESC LIMIT 10000";

$insert = "INSERT INTO tablename(id, name) VALUES('123', 'NewTest')";

$select_sanitize = preg_replace($search, '-/-/-/-/SQL INJECTION=($1)/-/-/-/-', $select);
$update_sanitize = preg_replace($search, '-/-/-/-/SQL INJECTION=($1)/-/-/-/-', $update);
$insert_sanitize = preg_replace($search, '-/-/-/-/SQL INJECTION=($1)/-/-/-/-', $insert);

echo "<br />[SELECT]<br />";
echo $select;
echo "<br />";
echo $select_sanitize;
echo "<br />";

echo "<br />[UPDATE]<br />";
echo $update;
echo "<br />";
echo $update_sanitize;
echo "<br />";

echo "<br />[INSERT]<br />";
echo $insert;
echo "<br />";
echo $insert_sanitize;
echo "<br />";

$recovery = str_replace("-/-/-/-/SQL INJECTION=(", "", $select_sanitize);
$recovery = str_replace(")/-/-/-/-", "", $recovery);

echo "<br />[RECOVERY SELECT]<br />";
echo $recovery;

?>

