<header>
    <!-- Logo och meny i headern -->
    <img src="../media/logo.svg" alt="Website logo" />
    <div id="logo">BakÄndsAppen</div>
    <link rel="stylesheet" href="../style.css">

    <nav>
        <!-- Huvudmenyn -->
        <ul>
            <li><a href="../projekt2/index.php">Home</a></li>
            <li><a href="../projekt2/login.php">Login/Registrera</a></li>
            <li><a href="../rapport/">Rapport</a></li>
            
           <?php $username = ($_SESSION['username']);?>
           <?php if (($_SESSION['username']) == $username) : ?>
            
               <!-- Visa länken till profilsidan och "log out" om man är inloggad-->

               <?php
                print("<li><a href='./profile.php'>Min Profil</a></li>");
                print("<li><a href='./logout.php'>Logga Ut</a></li>");
                ?>
            
            <?php endif; ?>
        </ul>
    </nav>
</header>