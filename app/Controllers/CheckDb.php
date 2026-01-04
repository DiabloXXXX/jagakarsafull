<?php
$db = db_connect();
$fields = $db->getFieldData('users');
$found = false;
foreach ($fields as $field) {
    if ($field->name === 'updated_at') {
        $found = true;
        break;
    }
}
echo $found ? "COLUMN_EXISTS" : "COLUMN_MISSING";
