<?php
    $get_page_query = "SELECT * FROM pages";

    $post = $db->select($get_page_query);


?>
<div class="grid_2">
            <div class="box sidemenu">
                <div class="block" id="section-menu">
                    <ul class="section menu">
                       <li><a class="menuitem">Site Option</a>
                            <ul class="submenu">
                                <li><a href="titleslogan.php">Title & Slogan</a></li>
                                <li><a href="social.php">Social Media</a></li>
                                <li><a href="copyright.php">Copyright</a></li>
                                
                            </ul>
                        </li>
						
                         <li><a class="menuitem">Pages</a>
                            <ul class="submenu">
                            <li><a href="addpage.php">Add Page</a> </li>
                            
                            <?php  

                                if ($post) {
                                while($result = $post->fetch_assoc()) { ?>
                                 <li><a href="editpage.php?id=<?php echo $result['id']; ?>"><?php echo $result['title']; ?></a> </li>
                          
                            <?php } }?>

                            <!-- <li><a href="../about.php">About Us</a></li>
                                <li><a href="../contact.php">Contact Us</a></li> -->
                            </ul>
                        </li>
                        <li><a class="menuitem">Category Option</a>
                            <ul class="submenu">
                                <li><a href="addcat.php">Add Category</a> </li>
                                <li><a href="catlist.php">Category List</a> </li>
                            </ul>
                        </li>
                        <li><a class="menuitem">Post Option</a>
                            <ul class="submenu">
                                <li><a href="addpost.php">Add Post</a> </li>
                                <li><a href="postlist.php">Post List</a> </li>
                            </ul>
                        </li>
                        <li><a class="menuitem">Slider Options</a>
                            <ul class="submenu">
                                <li><a href="addslider.php">Add Slider</a> </li>
                                <li><a href="sliders.php">Slider List</a> </li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
        </div>