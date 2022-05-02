<?php
    session_start();
    unset($_SESSION["actual"]);
    $_SESSION["total"] = 0;
?>

<tr>
<th colspan="2" class="cart">ID Compra</th>
    <td colspan="2" class="cart">
        ID cliente
        <select name="clientes" id="clientes">
            <option value="1">1</option>
        </select>
    </td>
</tr>
<tr>
    <th>Product</th>
    <th class="th-small">Quantity</th>
    <th class="th-small">Unit</th>
    <th class="th-small">Sub.</th>
</tr>