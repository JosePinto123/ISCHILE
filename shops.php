<?php
        $nameArroba = $_GET["id"];
        $name = ltrim($nameArroba,'@');
        $url = "https://www.instagram.com/";
        $url = $url . $name; 
        $final = "/?__a=1";
        $url = $url . $final;
        $jsonFile = file_get_contents($url);
        $objeto = json_decode($jsonFile,true);
        $cantidadPosts = $objeto['graphql']['user']['edge_owner_to_timeline_media']['count'];
        $numeroSeguidores = $objeto['graphql']['user']['edge_followed_by']['count'];
        $numeroSeguidos = $objeto['graphql']['user']['edge_follow']['count'];
        $biografia = $objeto['graphql']['user']['biography'];
        $fotoPerfil = $objeto['graphql']['user']['profile_pic_url'];
        $fullname = $objeto['graphql']['user']['full_name'];
        $urlBiografia = $objeto['graphql']['user']['external_url'];
        
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <script src="/js/app.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js" integrity="sha512-bLT0Qm9VnAYZDflyKcBaQ2gg0hSYNQrJ8RilYldYQ1FxQYoCLtUjuuRuZo+fjqhx/qtq/1itJ0C2ejDxltZVFg==" crossorigin="anonymous"></script>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>InstaShopping</title>
    <link rel="stylesheet" href="/css/shops.css" type="text/css">
    <link rel="stylesheet" href="/css/estilos.css" type="text/css">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;700&display=swap" rel="stylesheet">
    <link href='https://unpkg.com/boxicons@2.0.5/css/boxicons.min.css' rel='stylesheet'>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;700&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <script id="dsq-count-scr" src="//ischile.disqus.com/count.js" async></script>

</head>
<body>
    <div class="wrap head2">
        <p class="titulo2">InstaShopping Chile</p>
    </div>
        <div class="container">
            <div class="profile">
                <div class="profile-image">
                    <img src=<?php echo $fotoPerfil;?> alt="">
                </div>
                <div class="profile-user-settings">
                    <h1 class="profile-user-name"><?php echo $nameArroba;?></h1> 
                </div>
                <div class="profile-stats">                    
                    <ul>
                        <li><span class="profile-stat-count"><?php echo $cantidadPosts;?></span> posts</li>
                        <li><span class="profile-stat-count"><?php echo $numeroSeguidores;?></span> followers</li>
                        <li><span class="profile-stat-count"><?php echo $numeroSeguidos;?></span> following</li>
                    </ul>

                </div>
                <div class="profile-bio">
                    <span class="profile-real-name"><?php echo $fullname;?></span>
                    <p><?php echo $biografia;?></p>
                    <a target='_blank' href="<?php echo $urlBiografia;?>"><?php echo $urlBiografia;?></a>
                    
                </div>
            </div>
            <!-- End of profile section -->
        </div>
        <div id="disqus_thread" class="discus"></div>
            <script >
                /**
                *  RECOMMENDED CONFIGURATION VARIABLES: EDIT AND UNCOMMENT THE SECTION BELOW TO INSERT DYNAMIC VALUES FROM YOUR PLATFORM OR CMS.
                *  LEARN WHY DEFINING THESE VARIABLES IS IMPORTANT: https://disqus.com/admin/universalcode/#configuration-variables    */
                /*
                var disqus_config = function () {
                this.page.url = PAGE_URL;  // Replace PAGE_URL with your page's canonical URL variable
                this.page.identifier = PAGE_IDENTIFIER; // Replace PAGE_IDENTIFIER with your page's unique identifier variable
                };
                */
                (function() { // DON'T EDIT BELOW THIS LINE
                var d = document, s = d.createElement('script');
                s.src = 'https://ischile.disqus.com/embed.js';
                s.setAttribute('data-timestamp', +new Date());
                (d.head || d.body).appendChild(s);
                })();
            </script>
            <noscript>Please enable JavaScript to view the <a href="https://disqus.com/?ref_noscript">comments powered by Disqus.</a></noscript>
    <footer id="footer">
        <div class="contenedor footer-content">
                <div class="contact-us">
                    <h2 class="brand">InstaShopping</h2>
                </div>
                <div class="social-media">
                    <a href="./" class="social-media-icon">
                        <i class='bx bxl-facebook'></i>
                    </a>
                    <a href="./" class="social-media-icon">
                        <i class='bx bxl-twitter' ></i>
                    </a>
                    <a href="./" class="social-media-icon">
                        <i class='bx bxl-instagram' ></i>
                    </a>
                </div>
        </div>
        <div class="line"></div>
    </footer>

    <script src="js/lightbox.js"></script>
    <script src="js/main.js"></script>
    <script src="js/jquery-3.5.1.min.js"></script>
</body>
</html>
