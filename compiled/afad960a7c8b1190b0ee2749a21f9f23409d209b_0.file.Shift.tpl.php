<?php
/* Smarty version 4.3.1, created on 2023-10-22 18:49:44
  from 'C:\Users\anvil\Desktop\shift\resources\views\Home\Shift.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.1',
  'unifunc' => 'content_65354498e7dbd2_31916427',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'afad960a7c8b1190b0ee2749a21f9f23409d209b' => 
    array (
      0 => 'C:\\Users\\anvil\\Desktop\\shift\\resources\\views\\Home\\Shift.tpl',
      1 => 1697989753,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_65354498e7dbd2_31916427 (Smarty_Internal_Template $_smarty_tpl) {
?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="/ShiftPOST" method="POST">
        <input type="text" name="src">
        <button type="submit">Зашифровать</button>
    </form>

    <form action="/DecodePOST" method="POST">
        <input type="text" name="src">
        <button type="submit">Расшифровать</button>
    </form>
</body>
</html><?php }
}
