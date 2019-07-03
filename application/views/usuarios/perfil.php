<h2>Google Account Details</h2>
<div class="ac-data">
    <!-- Display Google profile information -->
    <img src="<?php echo $user['picture']; ?>"/>
    <p><b>Google ID:</b> <?php echo $user['oauth_uid']; ?></p>
    <p><b>Nombre:</b> <?php echo $user['first_name'].' '.$user['last_name']; ?></p>
    <p><b>Email:</b> <?php echo $user['email']; ?></p>
    <p><b>Logged in with:</b> Google</p>
    <p><a href="<?php echo $user['link']; ?>" target="_blank">Click to visit Google+</a></p>
    <p>Logout from <a href="<?php echo base_url().'user_authentication/logout'; ?>">Google</a></p>
</div>