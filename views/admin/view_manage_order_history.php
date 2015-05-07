<link rel="stylesheet" type="text/css" href="views/css/jquery-ui-1.8.13.custom.css">
<script type="text/javascript" src="views/js/jquery-1.6.1.min.js"></script>
<script type="text/javascript" src="views/js/jquery-ui-1.8.13.custom.min.js"></script>
<script type="text/javascript" src="views/js/ui.dropdownchecklist-1.4-min.js"></script>
<script type="text/javascript" src="views/js/ui.dropdownchecklist.js"></script>
<script type="text/javascript" src="views/js/checkbox.js"></script>

<form method="post" action="?page=manage_order_history">
<label for="username">Search by username:</label>
<input type="text" id="username" placeholder="username" name="username"  value="<?php $username ?>"/>      
<input type="text" id="state" placeholder="state"name="state"  value="<?php $state ?>"/>      

<label for="dateTitle">State:</label>
<select id="s7" name="state[]" multiple="multiple">
  <option name="state[]" value="1">1</option>
  <option name="state[]" value="2">2</option>
  <option name="state[]" value="3">3</option>
  <option name="state[]" value="4">4</option>

</select>

<label for="dateTitle">Year:</label>
<select id="s5" name="check[]" multiple="multiple">
  <option name="check[]" value="2011">2011</option>
  <option name="check[]" value="2012">2012</option>
  <option name="check[]" value="2013">2013</option>
  <option name="check[]" value="2014">2014</option>
  <option name="check[]" value="2015">2015</option>
</select>
<label for="dateTitle">Month:</label>
<select id="s6" name="month[]" multiple="multiple">
  <option name="month[]" value="01">january</option>
  <option name="month[]" value="02">february</option>
  <option name="month[]" value="03">march</option>
  <option name="month[]" value="04">april</option>
  <option name="month[]" value="05">may</option>
  <option name="month[]" value="06">june</option>
  <option name="month[]" value="07">jully</option>
  <option name="month[]" value="08">august</option>
  <option name="month[]" value="09">september</option>
  <option name="month[]" value="10">october</option>
  <option name="month[]" value="11">november</option>
  <option name="month[]" value="12">december</option>
</select>
<input type="submit" name="rechercher" value="Rechercher" /><br />
    <table>
      <tr>      
        <td>&nbsp;</td>       
        <td id="returnS5">
      </td>
    </tr>
    </table>
    <table>
      <tr>      
        <td>&nbsp;</td>      
        <td id="returnS5">
      </td>
    </tr>
    </table>
</form>
<div id="container">

</div>