<?php
$about = get_field("about");
if ($about) : ?>
  <section class="about">
    <?php while (have_rows("about")) : the_row();
      $image = get_sub_field("about__image");
      $title = get_sub_field("about__title");
      $text = get_sub_field("about__text"); ?>
      <figure class="about__image">
        <?php if ($image) : ?>
          <img class="w-100" src="<?php echo esc_url($image['url']) ?>" alt="<?php echo esc_attr($image['alt']) ?>">
        <?php endif ?>
      </figure>
      <div class="about__content container">
        <div class="about__title">
          <?php if ($title)  ?>
          <h2> <?php echo  $title  ?></h2>
        </div>
        <div class="about__texto">
          <?php if ($text)  ?>
          <p> <?php echo $text  ?></p>
        </div>
      </div>
    <?php endwhile ?>
  </section>
<?php endif ?>
