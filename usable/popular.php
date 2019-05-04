
<div class="popular-container">
  <span class="container-title-popular">Самое просматриваемое</span>
  <?php
    $query = "SELECT * FROM posts ORDER BY post_visitors DESC LIMIT 5";
    $result = mysql_query($query);

    while ($post = mysql_fetch_array($result, MYSQL_ASSOC)) {
  ?>

  <div class="post-popular">
    <?php
    $post_id = $post['id'];
    echo "<a href='../post.php?post_id=$post_id' style='color: black;'>"
    ?>

    <div class="post-popular-header">
      <div class="post-popular-title">
        <?php echo $post['post_title'] ?>
      </div>
      <div class="post-popular-visitors">
        <img src="../images/eye.png" alt="Eye" style="height: 15px;">
        <?php echo $post['post_visitors'] ?>
      </div>
    </div>

    <div class="post-popular-content">
      <div class="post-popular-short">
        <?php echo $post['post_short'] ?>
      </div>
    </div>

    </a>

  </div>



  <?php } ?>
</div>
