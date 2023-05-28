<?php
$banner = get_field("banner");
if ($banner) : ?>
  <section class="container-banner">
    <?php while (have_rows("banner")) : the_row();
      $imagen = get_sub_field("banner_image");
      $paragraph = get_sub_field("banner_paragraph") ?>

      <figure class="container-banner__image">
        <?php if ($imagen) : ?>
          <img class="w-100" src="<?php echo esc_url($imagen['url']) ?>" alt="<?php echo esc_attr($imagen['alt']) ?>">
        <?php endif ?>
      </figure>
      <div class="container-banner__paragraph">
        <?php if ($paragraph)  ?>
        <h1> <?php echo $paragraph ?></h1>
      </div>
    <?php endwhile ?>
  </section>
<?php endif ?>
