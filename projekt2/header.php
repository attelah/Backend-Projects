<header>
    <!-- Logo och meny i headern -->
    <img src="../media/logo.svg" alt="Website logo" />
    <div id="logo">BakÄndsAppen</div>

    <nav>
        <!-- Huvudmenyn -->
        <ul>
            <li><a href="../home/">Home</a></li>
            <li><a href="../projekt2/login.php">Login/Registrera</a></li>
            <li><a href="../rapport/">Rapport</a></li>
            
           <?php
             if (($_SESSION['username']) !== null) {
                // Visa länken till profilsidan om man är inloggad
                print("<li><a href='./profile.php'>Min Profil</a></li>");
                print("<li></a>Logga Ut</li>");
            }
            ?>
        </ul>
    </nav>
</header>