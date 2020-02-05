

<ul>
    <!-- output the loop in html -->
    <?php foreach($blogs as $blog) { ?>
      <?php if ($blog['author'] == 'toad') { ?>
        <h3><?php echo $blog['title']; ?></h3>
        <p><?php echo $blog['author']; ?></p>
      <?php } ?>

    <?php } ?>

  </ul>