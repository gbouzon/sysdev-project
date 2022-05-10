<html>
    <head>
        <!-- CSS only -->
        
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <link rel="stylesheet" type="text/css" href="/app/public/css/navbar.css">
		<link rel="stylesheet" type="text/css" href="/app/public/css/updates.css">
        <!-- JavaScript Bundle with Popper -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
        <title><?= $data->product_name ?></title>
    </head>
    <body>
    <?php
            $this->view('subviews/navigation');
        ?>
        <div class='container' >
        
        <h1 id="title">Update Product</h1>
            <form method='post' action='' enctype = 'multipart/form-data'>
				<label class='form-label'>Product name:<input type='text' name='product_name' class='form-control' value= '<?= $data->product_name?>' /></label> <br>
				<label class='form-label'>Product price:<input type='double' name='product_price' class='form-control' value='<?= $data->price?>' /></label> <br>
				<label class='form-label'>Product quantity:&ensp;<input type='number' min="0" name='product_quantity' class='form-control' value='<?= $data->quantity?>'/></label> <br>
                <label class='form-label'>Product description:<textarea name='product_description' cols="80" class='form-control'><?= $data->description?></textarea></label><br>

				<label class = 'form-label'>Product picture (if you want to change it): 
                    <input type = 'file' name = 'product_image' class = 'form-control'></label><br> <br>
					
				<input class = 'btn btn-primary' type="submit" name='action' value='Update!' class='form-control' />
			</form>
        </div>
    </body>
</html>