<?php
// Panggil fungsi datacust() untuk mengisi variabel $comfy
// datacust();

?>

<section id="heropr" class="section">
    <div class="container h100">
        <div id="herowr" class="hw100">
            <span class="herobook">Book Car Now</span>
            <span data-phone="<?php echo link_cta('phone'); ?>" class="herophone"><?php echo $datacust['phone']; ?></span>
            <span class="heroweb">www.comfyride.id</span>
            <div id="herocar"></div>
        </div>
    </div>
</section>