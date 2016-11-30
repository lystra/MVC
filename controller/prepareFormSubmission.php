<?php
if(isset($_POST['submit']))
{
//Define variables we will use for the sql statement
$fieldNames='';
$fieldValueVariables='';
$fieldValues='';
$bindMethodValues='';

//Get total number of fields in foreach array so that we can determine where to place the last comma for the sql query
$numofFields = count($_POST)-1;
$i = 1;

//Get all field names and field values posted in a form submission without specifying the field names
	foreach ($_POST as $key => $entry)
	{
		 if ($key == "submit") continue;
			 if (is_array($entry))
			 {
				foreach($entry as $value)
				{
					if($i >= $numofFields) //If last form field dont display comma after
					{
					//Put all form fields, value variables, and actual values into separate comma-separated strings for binding and the database query
					$fieldNames .= $key;
					$fieldValueVariables .= ':'.$key;
					$fieldValues .= $entry;
					}
					else //Display comma after
					{
					//Put all form fields, value variables, and actual values into separate comma-separated strings for binding and the database query
					$fieldNames .= $key.', ';
					$fieldValueVariables .= ':'.$key.', ';
					$fieldValues .= $entry.', ';
					}
				}
			 }
			else
			 {
			    if($i >= $numofFields) //If last form field dont display comma after
			    {
			    //Put all form fields, value variables, and actual values into separate comma-separated strings for binding and the database query
				$fieldNames .= $key;
				$fieldValueVariables .= ':'.$key;
				$fieldValues .= $entry;
				}
				else //Display comma after
				{
			    //Put all form fields, value variables, and actual values into separate comma-separated strings for binding and the database query
				$fieldNames .= $key.', ';
				$fieldValueVariables .= ':'.$key.', ';
				$fieldValues .= $entry.', ';
				}
			 }
	  $bindMethodValues .= ':'.$key .', '.$entry;//Get bind values into a string
	  $i++;
	}
	//print 'Field names: '.$fieldNames.'<br />';
	//print 'Field Value Variables: '.$fieldValueVariables.'<br />';
	//print 'Field values: '.$fieldValues.'<br />';

	//create each bind line for sql query
	$bindedValues = explode(':', $bindMethodValues);
}
?>