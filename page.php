<?php include "inc/header.php";?>
<?php include "inc/slider.php";?>
<?php
    if(isset($_GET['pageid'])) {

       
        $id = $_GET['pageid'];

        
        $query = "SELECT * FROM pages WHERE id = $id";


        $post = $db->select($query);
    
        $result = $post->fetch_assoc();
    }


?>
</div>
<div class="contentsection contemplete clear">
	<div class="maincontent clear">

		
		<div class="samepost clear">
			<h2><a href="page.php?id=<?php echo $result['id'];?>"><?php echo $result['title']; ?></a></h2>
			
			<p>
				<?php echo $result['body']; ?>
			</p>

		</div>


</div>

<?php include "inc/sidebar.php"; ?>

<?php include "inc/footer.php"; ?>