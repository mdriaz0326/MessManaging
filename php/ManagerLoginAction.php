<!DOCTYPE html>
 <head>
	 <title>Untitled</title>
	 <meta charset="UTF-8"/>
	 <link rel="stylesheet" href="" type="text/css"/>
	 <style>
	 #submitBtn {
  background-color: #4CAF50;
  color: white;
  border: none;
  padding: 10px 20px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
  margin: 4px 2px;
  cursor: pointer;
  border-radius: 5px;
}

#submitBtn:hover {
//  background-color: #3e8e41;
    background-color: #ffaa11;

}

	 </style>
	 <script>
	 $(document).ready(function() {
  $('#inputName').blur(function() {
    var a= name.val;
    if(a<0){
    $('#submitBtn').disabled
    }
  });
});

	 </script>
 </head>
	 <body>
	<form>
  <div class="form-group">
    <label for="inputName">Name</label>
    <input type="text" class="form-control" name="name" id="inputName" placeholder="Enter your name">
  </div>
  <div class="form-group">
    <label for="inputEmail">Email address</label>
    <input type="text" class="form-control" id="inputEmail" placeholder="Enter your email">
  </div>
  <button type="submit" class="btn btn-primary" id="submitBtn">Submit</button>
</form>

	 </body>
 </html>
150
20
10
300
200
20    