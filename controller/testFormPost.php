<?php
if(isset($_POST['submit']))
{
$fieldNames ='';
$fieldValues ='';

//Get all field names and field values posted in a form submission without specifying the field names
foreach ($_POST as $key => $entry)
{
 if ($key == "submit") continue;
 $fieldNames .= $key.',';
 $fieldValues .= $entry.',';
}

//Get each field name on a separate line
$fieldName = explode(',', $fieldNames);
    $a = 1;
	foreach($fieldName As $field)
	{
		 if($field !='') //Make sure last comma is ignored
		 {
		 echo $a.') Field Name: '.$field.'<br />';
		 }
	$a++;
	}

//Get each field value on a separate line
$fieldValue = explode(',', $fieldValues);
    $b = 1;
	foreach($fieldValue As $value)
	{
		 if($value !='') //Make sure last comma is ignored
		 {
		 echo $b.') Field Value: '.$value.'<br />';
		 }
	$b++;
	}
}
?>


<form method="post" action"">
Name: <input type="text" name="name" class="form-control" required>
<br /><br />
Email: <input type="text" name="email" class="form-control" required>
<br /><br />
Phone: <input type="text" name="phone" class="form-control" required>
<br /><br />
Message:
<br />
<textarea name="message" class="form-control"></textarea>
<br /><br />
<input type="submit" name="submit" value="Add Data" class="btn btn-warning">
</form>