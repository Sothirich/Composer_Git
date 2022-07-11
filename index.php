<!DOCTYPE html>
<html>
<head>
	<title>Create</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
	<div class="container">
		<form action="php/create.php" 
		      method="post">
            
		   <h4 class="display-4 text-center">Add Products</h4><hr><br>
		   <?php if (isset($_GET['error'])) { ?>
		   <div class="alert alert-danger" role="alert">
			  <?php echo $_GET['error']; ?>
		    </div>
		   <?php } ?>
		   <div class="form-group">
		     <label for="name">Name</label>
		     <input type="name" 
		           class="form-control" 
		           id="name" 
		           name="name" 
		           value="<?php if(isset($_GET['name']))
		                           echo($_GET['name']); ?>" 
		           placeholder="Enter product name">
		   </div>

		   <div class="form-group">
		     <label for="amount">Amount</label>
		     <input type="amount" 
		           class="form-control" 
		           id="amount" 
		           name="amount" 
		           value="<?php if(isset($_GET['amount']))
		                           echo($_GET['amount']); ?>"
		           placeholder="Enter amount">
		   </div>

		   <div class="form-group">
		     <label for="price">Price</label>
		     <input type="price" 
		           class="form-control" 
		           id="price" 
		           name="price" 
		           value="<?php if(isset($_GET['price']))
		                           echo($_GET['price']); ?>"
		           placeholder="Enter price">
		   </div>

		   <button type="submit" 
		          class="btn btn-primary"
		          name="create">Add</button>
		    <a href="read.php" class="link-primary">View</a>
	    </form>
	</div>
</body>
</html>