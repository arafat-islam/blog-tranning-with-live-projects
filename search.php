<?php include "inc/header.php";?>
<?php include "inc/slider.php";?>

<div class="contentsection contemplete clear">
    <div class="maincontent clear">
        <?php

    if(isset($_GET['submit'])) {
        $keyword = $_GET['keyword'];
    } else {
        header("location: 404.php");
    }
       
    $query= "SELECT * FROM posts WHERE title LIKE '%$keyword%' OR body LIKE '%$keyword%'";

    $post = $db->select($query);
		if($post) {
			while($result = $post->fetch_assoc()) {  
            
                $total_row = mysqli_num_rows($post);
        ?>
      

        <div class="about">
            <h2><?php echo $result['title']; ?></h2>
            <h4><?php echo $fm->formatDate($result['date']); ?> , By   <a href="#"><?php echo $result['author']; ?></a></h4>
            <img src="admin/uploads/<?php echo $result['image']; ?>" alt="MyImage" />
            <p><?php echo $result['body']; ?></p>
        </div>
        <?php }  } else {echo "No results found!";} ?>
    </div>


    <?php include "inc/sidebar.php"; ?>

    <?php include "inc/footer.php"; ?>