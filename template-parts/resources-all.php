<?php

/****
Field Group Name: Section - All Resources
****/

// $total_resources = wp_count_posts('resources');
// $total_resources = $total_resources->publish;

?>

<section class="ont-module resources-list">
  <div class="container">
    <div class="filters">
      <?php $topics = get_terms(array('taxonomy' => 'topic', 'hide_empty' => false)) ?>
      <div>
        <div class="ont-select">
          <select class="topic">
            <option value="All">All Topics</option>
            <?php foreach ($topics as $topic): ?>
              <option value="<?php echo $topic->term_id ?>"><?php echo $topic->name ?></option>
            <?php endforeach ?>
          </select>
        </div>
      </div>
      <div>
      <?php $types = get_terms(array('taxonomy' => 'type', 'hide_empty' => false)) ?>
        <div class="ont-select">
          <select class="topic">
            <option value="All">All Types</option>
            <?php foreach ($types as $type): ?>
              <option value="<?php echo $type->term_id ?>"><?php echo $type->name ?></option>
            <?php endforeach ?>
          </select>
        </div>
      </div>
    </div>
    <ul class="list re-li"></ul>
    <div class="load-more tac">
      <a id="js-load-more" class="btn btn--primary">Load More</a>
    </div>
    <img class="loading-spinner tac" src="<?php echo get_template_directory_uri() . '/dist/img/loading.svg'; ?>">
    <div class="all-shown">all resources are shown</div>
    <div class="none-shown">no resources found</div>
  </div>

  <script type="text/javascript">
    jQuery(document).ready(function($) {

      var admin_ajax = '<?php echo admin_url( 'admin-ajax.php' ) ?>',
        ppp = 6,
        page = 1;

      var get_resources = function(ppp, page, type, topic) {

        type = (typeof type == 'undefined' ? 'All' : type);
        topic = (typeof topic == 'undefined' ? 'All' : topic);

        console.log('get_resources', ppp, page, type, topic);

        $('.loading-spinner').show();
        $('.load-more').hide();
        $('.all-shown').hide();
        $('.none-shown').hide();
        $('.filters select').attr('disabled', true);

        $.ajax({
          url: admin_ajax,
          type: 'POST',
          data: {
            action: 'ont_get_resources',
            ppp: ppp,
            page: page,
            type: type,
            topic: topic
          },
          success: function(res) {

            $('.resources-list .list').append(res);
            $('.loading-spinner').hide();
            if (total_resources == 0) {
              $('.loading-spinner').hide();
              $('.none-shown').show();
            } else if ($('.resources-list .list li').length == total_resources) {
              $('.loading-spinner').hide();
              $('.all-shown').show();
            } else {
              $('#js-load-more').show();
            }
            $('.filters select').attr('disabled', false);
          },
          error: function(res) {
            console.log(res);
          }
        });

      }

      $('.filters select').on('change', function() {

        $('.resources-list .list').html('');

        get_resources(ppp, page, $('.filters select.type').val(), $('.filters select.topic').val());
      });

      // $('.ont-select .options li').on('click', function() {
      //  console.log('option clicked', $(this).attr('data-value'));
      //  $(this).parent().prev().text($(this).text());
      //  $(this).parent().prev().attr('data-value', $(this).attr('data-value'));
      // });

      $('#js-load-more').on('click', function() {

        get_resources(ppp, ++page, $('.filters select.type').val(), $('.filters select.topic').val());

      });

      get_resources(ppp, page, $('.filters select.type').val(), $('.filters select.topic').val());

    });
  </script>
</section>