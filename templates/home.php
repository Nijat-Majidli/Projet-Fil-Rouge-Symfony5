<!-- PAGE HEAD -->
<?php
    if (file_exists("header.php")){
        include("header.php");
    }
    else{
        echo "file 'header.php' n'existe pas";
    }
?>

<!-- PAGE CONTENT -->
<div class="row row-1">
    <div class="col-9">
        <img src="Charte/BODY/pub guitare.png" alt="publicité guitare" class="img-1">
        <img src="Charte/BODY/pub guitare bouton blanc.png" alt="bouton blanc"  class="img-2">
    </div>
    <div class="col-3">
        <img src="Charte/BODY/banniere droite prix.png" alt="banniere"  class="img-3">
    </div> 
</div>

<div class="row-2"> 
    <img src="Charte/BODY/banniere centre 4 pictos.png" alt="banniere">
</div>

<div class="row-3">
    <h3> Nos catégories </h3> 
</div>

<div class="row-4 flexible-image"> 
    <img src="Charte/BODY/CATEGORIES guitare.png" alt="guitare"> 
    <img src="Charte/BODY/CATEGORIES batterie.png" alt="batterie"> 
    <img src="Charte/BODY/CATEGORIES piano.png" alt="piano"> 
    <img src="Charte/BODY/CATEGORIES micro.png" alt="micro"> 
</div>

<div class="row-4 flexible-image">
    <img src="Charte/BODY/CATEGORIES sono.png" alt="sono"> 
    <img src="Charte/BODY/CATEGORIES cases.png" alt="cases"> 
    <img src="Charte/BODY/CATEGORIES cable.png" alt="cable"> 
    <img src="Charte/BODY/CATEGORIES saxo.png" alt="saxo">   
</div>

<div class="row row-3 mb-0">
    <div class="col-6"> <h3> Meilleures ventes </h3> </div>
    <div class="col-6"> <h3> Nos partenaires </h3> </div>
</div>

<div class="row-5 flexible-image">
    <img src="Charte/BODY/TOP VENTES guitare.png" alt="tv_guitare"> 
    <img src="Charte/BODY/TOP VENTES saxo.png" alt="tv_saxo"> 
    <img src="Charte/BODY/TOP VENTES piano.png" alt="tv_piano">
    <img src="Charte/BODY/partenaires 4 logos.png" alt="partenaires">  
</div>

<!-- PAGE FOOT -->
<?php
    if (file_exists("footer.php")){
        include("footer.php");
    }
    else{
        echo "file 'footer.php' n'existe pas";
    }
?>