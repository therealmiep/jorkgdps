<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <?php include 'config.php'; ?>
    <meta property="og:image" content="<?php echo $gdpsIcon; ?>">
    <meta property="og:title" content="<?php echo $webTitle; ?>">
    <meta property="og:description" content="<?php echo $info; ?>">
    <meta property="og:type" content="website">

    <title><?php echo $webTitle; ?></title>
    
</head>
<body>
    <header>
        <h1>
            <a href="<?php echo $gdpsLink; ?>" style="font-family: SF_1; color: #FFFFFF;">
                <?php echo $gdpsTitle; ?>
            </a>
        </h1>
    </header>

    <main>
        <section>
            <h2><a style="text-decoration: underline dotted;"><?php echo $firstTitle ?></a></h2>
            <h3><b><i><?php echo $whatDoing ?></i></b></h3>
            <p><?php echo $intro; ?></p>
        </section>

        <nav>
            <ul>
                <li>
                    <a class="botones" href="<?php echo $registerLink; ?>"><?php echo $register; ?></a>
                </li>
                <li>
                    <a class="botones" href="<?php echo $downloadLink; ?>"><?php echo $download; ?></a>
                </li>
                    <a class="botones" href="<?php echo $dlLink; ?>"><?php echo $demonlist; ?></a>
                </li>
            </ul>
        </nav>
    </main>

    <footer>
        <p><?php echo $footer; ?></p>
        <div class="social-links">
            <a class="redes" href="<?php echo $youtubeLink; ?>" aria-label="YouTube">
                <img src="./assets/yt.png" alt="YouTube"></a>
            <a class="redes" href="<?php echo $facebookLink; ?>" aria-label="Facebook">
                <img src="./assets/fb.png" alt="Facebook"></a>
            <a class="redes" href="<?php echo $twitterLink; ?>" aria-label="Twitter">
                <img src="./assets/tt.png" alt="Twitter"></a>
            <a class="redes" href="<?php echo $discordLink; ?>" aria-label="Discord">
                <img src="./assets/dc.png" alt="Discord"></a>
        </div>
    </footer>
</body>
</html>