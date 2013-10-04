<div class="post admin">
  <h1>Admin</h1>
    <p>Latest 10 posts</p>
    <?php
        $posts = get_posts(1, 10, TRUE);
        echo '<ul>';
        foreach($posts as $post) {
            echo '<li>'.$post['title'].'</li>';
        }
        echo '</ul>';
    ?>
</div>
