<div class="post">
    <h2>Contact</h2> 
    <?php 
        $encodedEmail = encode_email_address( 'chiriacradu@gmail.com' );         
    ?>
    <p><a href="mailto:<?php printf('%s', $encodedEmail, $encodedEmail); ?>"><?php printf('%s', $encodedEmail, $encodedEmail); ?></a></p>
</div>
