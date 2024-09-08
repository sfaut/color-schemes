<?php

// Generates an HTML file to preview color schemes from JSON store

$data = file_get_contents(__DIR__ . '/color-schemes.json');
$data = json_decode($data);

$buffer = '<table cellspacing="1" cellpadding="4">';
foreach ($data as $family => $schemes) {
    foreach ($schemes as $scheme => $colors) {
        $buffer .= '<tr>';
        $buffer .= "<th scope='row' align='right'>{$family}.{$scheme}</th>";
        foreach ($colors as $color) {
            $buffer .= "<td bgcolor='{$color}'>{$color}</td>";
        }
        $buffer .= '</tr>';
    }
}
$buffer .= '</table>';

file_put_contents(__DIR__ . '/color-schemes.html', $buffer);
