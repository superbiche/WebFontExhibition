<?php require_once '_head.php';?>

<body>
<div id="header" class="container_16 clearfix">
<div id="top-select">
    <label for="font_select" ><?php echo Tools::l('select_font_label', __DEFAULT_LANG__);?></label>
    <select name="font_select" id="font_select">
        <option value="Arial<?php /*echo $default_font->name;*/?>" selected>Arial<?php /*echo $default_font->name;*/?></option>
        <?php
        foreach($fonts as $name => $font) {?>
            <option value="<?php echo $name;?>" data-format="<?php echo $font->getDatasetFormat();?>" data-path="<?php echo $font->default_path;?>" <?php /* echo $name == $default_font->name ? 'selected' : */'' ?>><?php echo $name;?></option>
        <?php
        }
        ?>
    </select>
</div>

<!-- NOM DE LA POLICE -->
<div class="grid_16">
    <h1 id="font-name">Arial<?php /*echo $default_font->name;*/?></h1>
</div>

<!-- EXEMPLE DE TEXTE -->
<div class="grid_8">
    <h2>Exemple de texte<span><br />Taille de texte CSS (<abbr title="pixels">px</abbr>)  avec hauteur de ligne à 1.4 em</span></h2>
    <p class="s s18"><span class="size">18</span> <span class="text"><?php echo Tools::l('example_text', __DEFAULT_LANG__);?></span></p>
    <p class="s s16"><span class="size">16</span> <span class="text"><?php echo Tools::l('example_text', __DEFAULT_LANG__);?></span></p>
    <p class="s s14"><span class="size">14</span> <span class="text"><?php echo Tools::l('example_text', __DEFAULT_LANG__);?></span></p>
    <p class="s s13"><span class="size">13</span> <span class="text"><?php echo Tools::l('example_text', __DEFAULT_LANG__);?></span></p>
    <p class="s s12"><span class="size">12</span> <span class="text"><?php echo Tools::l('example_text', __DEFAULT_LANG__);?></span></p>
    <p class="s s11"><span class="size">11</span> <span class="text"><?php echo Tools::l('example_text', __DEFAULT_LANG__);?></span></p>
    <p class="s s10"><span class="size">10</span> <span class="text"><?php echo Tools::l('example_text', __DEFAULT_LANG__);?></span></p>
    <p class="s s9"><span class="size">9</span> <span class="text"><?php echo Tools::l('example_text', __DEFAULT_LANG__);?></span></p>
</div>


<!-- JEU DE CARACTÈRES -->
<div class="grid_8 charset">
    <h2>Caractères</h2>
    <p class="s s50">
        A B C D E F G H I J K L M N O P Q R S T U V W X Y Z
    </p>
    <p class="s s50"><!--
     -->Á <!--À Â Ä --><!--
     --><!--É -->È <!--Ê Ë --><!--
     --><!--Í Ì -->Î <!--Ï --><!--
     --><!--Ó Ò Ô -->Ö <!--
     -->Ú <!--Ù Û Ü --><!--
     -->Ý <!--
     -->Ç <!--
     -->Æ Œ <!--
 --></p>
    <p class="s s50">
        a b c d e f g h i j k l m n o p q r s t u v w x y z
    </p>
    <p class="s s50"><!--
     -->á <!--à â ä --><!--
     --><!--é -->è <!--ê ë --><!--
     --><!--í ì -->î <!--ï --><!--
     --><!--ó ò ô -->ö <!--
     -->ú <!--ù û ü --><!--
     -->ý <!--
     -->ç <!--
     -->æ œ <!--
     -->ﬁ <!--
 --></p>
    <p class="s s50">
        1 2 3 4 5 6 7 8 9 0 
    </p>
    <p class="s s50"><!--
     -->&amp; @ <!--
     -->€ <!--$ ¢ £ ¥ ¤ --><!--
     -->( ) <!--[ ] { } --><!--
     --><!--/ \ | * ~ ° # %--><!--
 --></p>
    <p class="s s50"><!--
     -->. … , ; : ! ? <!--
     --><!--' ‘ -->’ <!--‚ --><!--
     --><!--" “ ” „ -->« » <!--
     --><!--¯ --><!--
     --><!--+ -->- <!--± × ÷ &lt; = &gt; --><!--
     -->– <!--
     -->— <!--
     --><!--_ --><!--
 --></p>
</div>
</div><!-- fin .container_16 -->

<!-- COMPARAISON DES TAILLES DE CORPS -->
<div class="container_16 clearfix">
<div class="grid_16">
    <h2>Comparaison des tailles de corps</h2>

    <div class="bodysize">
        <table summary="">
        <tr>
            <th id="bodysize-font-name">Arial<?php /* echo $default_font->name;*/ ?></th>
            <th><a href="http://www.codestyle.org/servlets/FontStack?stack=Arial,Helvetica&amp;generic=sans-serif">Stack</a> Arial</th>
            <th><a href="http://www.codestyle.org/servlets/FontStack?stack=Times+New+Roman,Times&amp;generic=serif">Stack</a> Times</th>
            <th><a href="http://www.codestyle.org/servlets/FontStack?stack=Georgia,New+Century+Schoolbook,Nimbus+Roman+No9+L&amp;generic=serif">Stack</a> Georgia</th>
        </tr>
        <tr>
            <td><span>Corps</span></td>
            <td class="tf typeface2"><span>Corps</span></td>
            <td class="tf typeface3"><span>Corps</span></td>
            <td class="tf typeface4"><span>Corps</span></td>
        </tr>
        </table>    
    </div><!-- fin .bodysize -->

</div>
</div><!-- fin .container-16 -->


<!-- NIVEAUX DE GRIS -->

<div class="container_16 clearfix">
<div class="grid_16">
    <h2>Niveaux de gris <span>– Couleur CSS <abbr title="hexadécimal">hexa</abbr></span></h2>
</div>

<div class="grayscale clearfix">
<div class="grid_8 white">
    <p class="c000"><span class="size">#000</span> <span class="text">Vlan, encore un détail, un indice, pour être bon à me consoler. Passant rapidement d’un sujet rebelle qui a mis au monde ! Chacun et chaque chose en sa place. Envoyez sans retard mandat d’arrestation qui courait évidemment après lui, il réunit un conseil.</span></p>
    <p class="c333"><span class="size">#333</span> <span class="text">Vlan, encore un détail, un indice, pour être bon à me consoler. Passant rapidement d’un sujet rebelle qui a mis au monde ! Chacun et chaque chose en sa place. Envoyez sans retard mandat d’arrestation qui courait évidemment après lui, il réunit un conseil.</span></p>
    <p class="c666"><span class="size">#666</span> <span class="text">Vlan, encore un détail, un indice, pour être bon à me consoler. Passant rapidement d’un sujet rebelle qui a mis au monde ! Chacun et chaque chose en sa place. Envoyez sans retard mandat d’arrestation qui courait évidemment après lui, il réunit un conseil.</span></p>
    <p class="c999"><span class="size">#999</span> <span class="text">Vlan, encore un détail, un indice, pour être bon à me consoler. Passant rapidement d’un sujet rebelle qui a mis au monde ! Chacun et chaque chose en sa place. Envoyez sans retard mandat d’arrestation qui courait évidemment après lui, il réunit un conseil.</span></p>
    <p class="cCCC"><span class="size">#CCC</span> <span class="text">Vlan, encore un détail, un indice, pour être bon à me consoler. Passant rapidement d’un sujet rebelle qui a mis au monde ! Chacun et chaque chose en sa place. Envoyez sans retard mandat d’arrestation qui courait évidemment après lui, il réunit un conseil.</span></p>
</div>

<div class="grid_8 black">
    <p class="cFFF"><span class="size">#FFF</span> <span class="text">Vlan, encore un détail, un indice, pour être bon à me consoler. Passant rapidement d’un sujet rebelle qui a mis au monde ! Chacun et chaque chose en sa place. Envoyez sans retard mandat d’arrestation qui courait évidemment après lui, il réunit un conseil.</span></p>
    <p class="cCCC"><span class="size">#CCC</span> <span class="text">Vlan, encore un détail, un indice, pour être bon à me consoler. Passant rapidement d’un sujet rebelle qui a mis au monde ! Chacun et chaque chose en sa place. Envoyez sans retard mandat d’arrestation qui courait évidemment après lui, il réunit un conseil.</span></p>
    <p class="c999"><span class="size">#999</span> <span class="text">Vlan, encore un détail, un indice, pour être bon à me consoler. Passant rapidement d’un sujet rebelle qui a mis au monde ! Chacun et chaque chose en sa place. Envoyez sans retard mandat d’arrestation qui courait évidemment après lui, il réunit un conseil.</span></p>
    <p class="c666"><span class="size">#666</span> <span class="text">Vlan, encore un détail, un indice, pour être bon à me consoler. Passant rapidement d’un sujet rebelle qui a mis au monde ! Chacun et chaque chose en sa place. Envoyez sans retard mandat d’arrestation qui courait évidemment après lui, il réunit un conseil.</span></p>
    <p class="c333"><span class="size">#333</span> <span class="text">Vlan, encore un détail, un indice, pour être bon à me consoler. Passant rapidement d’un sujet rebelle qui a mis au monde ! Chacun et chaque chose en sa place. Envoyez sans retard mandat d’arrestation qui courait évidemment après lui, il réunit un conseil.</span></p>
</div>
</div><!-- fin .grayscale -->
</div><!-- fin .container-16 -->


<!-- TAILLE HAUT ET BAS DE CASSE -->
<div class="container_16 ulc clearfix">
<div class="clearfix">
    <div class="grid_16">
        <h2>Taille <span>– Taille de police CSS (<abbr title="pixels">px</abbr>)</span></h2>
        <p class="s s36"><span class="size">36</span> <span class="text">Voix ambiguë d’un cœur qui, au zéphyr, préfère les jattes de kiwis.</span></p>
        <p class="s s30"><span class="size">30</span> <span class="text">Voix ambiguë d’un cœur qui, au zéphyr, préfère les jattes de kiwis.</span></p>
        <p class="s s24"><span class="size">24</span> <span class="text">Voix ambiguë d’un cœur qui, au zéphyr, préfère les jattes de kiwis.</span></p>
    </div>
</div>
<div class="clearfix">
    <div class="grid_10">
        <p class="s s21"><span class="size">21</span> <span class="text">Voix ambiguë d’un cœur qui, au zéphyr, préfère les jattes de kiwis.</span></p>
        <p class="s s18"><span class="size">18</span> <span class="text">Voix ambiguë d’un cœur qui, au zéphyr, préfère les jattes de kiwis.</span></p>
    </div>
    <div class="grid_6 upp">
        <p class="s s9"><span class="size">9</span> <span class="text">Voix ambiguë d’un cœur qui, au zéphyr, préfère les jattes de kiwis.</span></p>
        <p class="s s10"><span class="size">10</span> <span class="text">Voix ambiguë d’un cœur qui, au zéphyr, préfère les jattes de kiwis.</span></p>
    </div>
</div>
<div class="clearfix">
    <div class="grid_8">
        <p class="s s16"><span class="size">16</span> <span class="text">Voix ambiguë d’un cœur qui, au zéphyr, préfère les jattes de kiwis.</span></p>
        <p class="s s14"><span class="size">14</span> <span class="text">Voix ambiguë d’un cœur qui, au zéphyr, préfère les jattes de kiwis.</span></p>
        <p class="s s13"><span class="size">13</span> <span class="text">Voix ambiguë d’un cœur qui, au zéphyr, préfère les jattes de kiwis.</span></p>
    </div>
    <div class="grid_8 upp">
        <p class="s s11"><span class="size">11</span> <span class="text">Voix ambiguë d’un cœur qui, au zéphyr, préfère les jattes de kiwis.</span></p>
        <p class="s s12"><span class="size">12</span> <span class="text">Voix ambiguë d’un cœur qui, au zéphyr, préfère les jattes de kiwis.</span></p>
        <p class="s s13"><span class="size">13</span> <span class="text">Voix ambiguë d’un cœur qui, au zéphyr, préfère les jattes de kiwis.</span></p>
    </div>
</div>
<div class="clearfix">
    <div class="grid_6">
        <p class="s s12"><span class="size">12</span> <span class="text">Voix ambiguë d’un cœur qui, au zéphyr, préfère les jattes de kiwis.</span></p>
        <p class="s s11"><span class="size">11</span> <span class="text">Voix ambiguë d’un cœur qui, au zéphyr, préfère les jattes de kiwis.</span></p>
        <p class="s s10"><span class="size">10</span> <span class="text">Voix ambiguë d’un cœur qui, au zéphyr, préfère les jattes de kiwis.</span></p>
        <p class="s s9"><span class="size">9</span> <span class="text">Voix ambiguë d’un cœur qui, au zéphyr, préfère les jattes de kiwis.</span></p>
    </div>
    <div class="grid_10 upp">
        <p class="s s14"><span class="size">14</span> <span class="text">Voix ambiguë d’un cœur qui, au zéphyr, préfère les jattes de kiwis.</span></p>
        <p class="s s16"><span class="size">16</span> <span class="text">Voix ambiguë d’un cœur qui, au zéphyr, préfère les jattes de kiwis.</span></p>
        <p class="s s18"><span class="size">18</span> <span class="text">Voix ambiguë d’un cœur qui, au zéphyr, préfère les jattes de kiwis.</span></p>
    </div>
</div>
<div class="clearfix">
    <div class="grid_16 upp">
        <p class="s s21"><span class="size">21</span> <span class="text">Voix ambiguë d’un cœur qui, au zéphyr, préfère les jattes de kiwis.</span></p>
        <p class="s s24"><span class="size">24</span> <span class="text">Voix ambiguë d’un cœur qui, au zéphyr, préfère les jattes de kiwis.</span></p>
        <p class="s s30"><span class="size">30</span> <span class="text">Voix ambiguë d’un cœur qui, au zéphyr, préfère les jattes de kiwis.</span></p>
    </div>
</div>
</div><!-- fin .container_16 -->


<!-- À PROPOS -->
<div id="footer" class="container_12">
<div>
    <p>
        <span lang="en">Web Font Specimen</span> vous est présenté par <a href="http://nicewebtype.com/" lang="en" hreflang="en">Nice Web Type</a>. Forké et PHPisé par <a href="http://www.webiche.info" lang="fr" hreflang="fr">Michel Tomas</a><br />
        Installez-le une fois et testez toutes vos polices !<br />Sous licence par l’intermédiaire de <a rel="license" href="http://creativecommons.org/licenses/by/3.0/us/deed.fr" lang="en" hreflang="fr">Creative Commons</a>.
    </p>
    <p>
        Traduction et adaptation française réalisées par <a href="http://www.htmlzengarden.com/" lang="en" hreflang="fr"><abbr>HTML</abbr> zen garden</a>.<br />
    </p>
</div>
</div><!-- fin #footer -->
<script src="js/jquery-1.8.1.min.js"></script>
<script src="js/jquery.dataset.js"></script>
<script src="js/jquery.stylish-select.js"></script>
<script src="cache/fonts.js"></script>
<script src="js/jquery.wfss-selectfont.js"></script>
</body>
</html>