<aside class="sidebar-left theme-primary sidebar-fixed">
  <form class="sidebar-searchform" id="searchForm" method="get">
    <input class="form-field-item field-search" type="text" autocomplete="off" placeholder="Search" name="s" value="">
  </form>
  <div class="sidebar-downloads">
    <?php if(get_field("form_resume_pdf")): ?>
      <a href="<?=get_field("form_resume_pdf")?>"
         class="btn-download"
         role="button"
         download
         rel="noopener">
        Firm Resume PDF <small>Download</small></a>
    <?php endif; ?>

    <?php if(get_field("form_resume_powerpoint")): ?>
      <a href="<?=get_field("form_resume_powerpoint")?>"
         class="btn-download"
         download
         role="button"
         rel="noopener">
        Firm Resume PDF PowerPoint <small>Download</small></a>
    <?php endif; ?>

    <?php if(get_field("branding_guide")): ?>
      <a href="<?=get_field("branding_guide")?>"
         class="btn-download"
         role="button"
         download
         rel="noopener">
        Branding Guide <small>Download</small></a>
    <?php endif; ?>
    <?php if(get_field("logo_pack")): ?>
      <a href="<?=get_field("logo_pack")?>"
         download
         class="btn-download"
         role="button"
         rel="noopener">
        Logo Pack <small>Download</small></a>
    <?php endif; ?>

    <a href="#submitMarketing" class="btn-download theme-success" role="button">Submit Marketing<br/>Request</a>
    <?php if(get_field("articles_to_read_and_share")): ?>
      <a href="<?=get_field("articles_to_read_and_share")?>" class="btn-download theme-danger" role="button" target="_blank" rel="noopener">Articles to Read<br/>& Share</small></a>
    <?php endif; ?>
    <?php if(get_field("business_card_portal")): ?>
      <a href="<?=get_field("business_card_portal")?>" class="btn-download theme-info" role="button" target="_blank" rel="noopener">Business Card<br/>Portal</small></a>
    <?php endif; ?>
  </div>

  <?php
  $team = get_field("team");
  if($team):
    ?>
    <ul class="team-marketing">
      <?php foreach ($team as $member) :
        $image = $member['image'];
        $name= $member['name'];
        $position = $member['position'];
        ?>
        <li class="team-marketing-person">
          <?php if($image): ?>
            <figure class="team-marketing-avatar">
              <img src="<?=$image?>" alt="<?=$name?>">
              <figcaption><?=$name?><br/><?=$position?></figcaption>
            </figure>
          <?php endif; ?>
        </li>
      <?php endforeach; ?>
    </ul>
  <?php endif; ?>
</aside>
