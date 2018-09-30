
<?php
 include_once 'header.php'; 
?>
    <section class="main-container">
        <div class="main-wrapper">
            <h2>Sign up</h2>
            <form class="signup-form" action="s.inc.php" method="POST">
                <input type="text" name="first" placeholder="firstname">
                <input type="text" name="last"  placeholder="lastname">
                <input type="text" name="email" placeholder="email">
                <input type="text" name="uid"   placeholder="username">
                <input type="password" name="pwd" placeholder="password">
                <button name="submit" type="submit">Sign up</button>
        </div>
    </section>
 <?php
 include_once 'footer.php'; 
?>
