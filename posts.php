<?php include "inc/header.php";?>
<?php include "inc/slider.php";?>



<div class="contentsection contemplete clear">
    <div class="maincontent clear">

        <?php

            $cat = $_GET['id'];

            $query = "SELECT * FROM posts WHERE cat = $cat";

            $post = $db->select($query);
        
            if($post) {
                while($result = $post->fetch_assoc()) {    ?>

                   
		<div class="about">
             <h2><?php echo $result['title']; ?></h2>
			<h4><?php echo $result['date']; ?>, By <a href="#"> <?php echo $result['author']; ?></a></h4>
			<img src="admin/uploads/<?php echo $result['image']; ?>" alt="MyImage" />
			<p><?php echo $result['body']; ?></p>
          


        </div>

        <?php } } ?>
       


    </div>
    <?php include "inc/sidebar.php"; ?>
</div>
<?php include "inc/footer.php"; ?>