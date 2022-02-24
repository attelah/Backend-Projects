<header class="h">
    <!-- Logo och meny i headern -->
    <img src="../media/logo2.svg" alt="Website logo" />
    <div id="logo">BakÄndsAppen</div>
    <link rel="stylesheet" href="../style.css">

    <nav>
        <!-- Huvudmenyn -->
        <ul>
            <li><a href="../projekt2/index.php">Home</a></li>
            <li><a href="../projekt2/login.php">Login/Registrera</a></li>
            
           <?php if(!empty($_SESSION['username'])) : ?>
            
               <!-- Visa länken till profilsidan och "log out" om man är inloggad-->

               <?php
                print("<li><a href='./profile.php'>Min Profil</a></li>");
                print("<li><a href='./logout.php'>Logga Ut</a></li>");
                ?>
            
            <?php endif; ?>
        </ul>
    </nav>
</header>