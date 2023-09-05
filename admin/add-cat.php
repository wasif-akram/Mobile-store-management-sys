<html>
<head>
  <title>Add Cat</title>
  <style>
    /* Set the overall width and margin of the form */
form {
  width: 200px;
  margin: 0 auto;
  background-color: #f7f7f7;
  border-radius: 10px;
}

/* Style the input fields */
input {
  width: 100%;
  padding: 12px 20px;
  margin: 8px 0;
  box-sizing: border-box;
  border: 2px solid #ccc;
  border-radius: 4px;
}

/* Add a placeholder text to the input fields */
input::placeholder {
  color: purple;
}

/* Style the radio buttons */
input[type="radio"] {
  margin-left: 10px;
}

/* Style the submit button */
.submit {
  background-color: #4CAF50;
  color: gray;
  padding: 12px 20px;
  border: none;
  border-radius: 4px;
  cursor: pointer;
}

/* Add a hover effect to the submit button */
.submit:hover {
  background-color: cadetblue;
}

  </style>
</head>
<body>

<form action="adding-cat.php" method="post">

Name: <input type="text" name="nm" ><br>
isActive: 
<input type="radio" name="isActive" value="y" checked="checked"> Yes 
<input type="radio" name="isActive" value="n"> No
<br>
<input type="submit" value="Add"> 
</form>

</body>
</html>
