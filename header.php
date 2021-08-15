<?php

session_start();

?>


<section class="topbar">

    <div class="header">
        <form class="d-flex" method="POST" action="search.php">
            <input class="me-2 search" name="search" type="search" placeholder="Search Something..." aria-label="Search">
            <i class="bi bi-search"></i>
        </form>
    </div>





    <div class="logo header">
        <span>THE</span>
        <a href="index.php" style="text-decoration: none;">
            <h1 style="color:#212529;">MEGA NEWS </h1>
        </a>
    </div>




    <div class="icon">
        <?php
        if (isset($_SESSION['reporterId'])) {

        ?>
            <a href="post.php">Create Post</a>
            <a href="./logout.php">Log Out </a>

            <!-- <a href="#">Contact</a> -->
        <?php
        } elseif (isset($_SESSION['adminId'])) {

        ?>
            <a href="admin.php">Dashboard</a>
            <a href="./logout.php">Log Out </a>

        <?php
        } else {
        ?>

            <a href="./login.html">Log in </a>
            <a href="./signup.html">Signup </a>

        <?php
        }
        ?>


        <li> <i class="bi bi-facebook"></i> </li>
        <li> <i class="bi bi-instagram"></i> </li>
        <li> <i class="bi bi-twitter"></i> </li>

    </div>

</section>