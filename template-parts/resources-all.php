<?php

/****
Field Group Name: Section - All Resources
****/

// $total_resources = wp_count_posts('resources');
// $total_resources = $total_resources->publish;

// Featured Section Args
$featArgs = array(
  'post_type' => 'resource',
  'posts_per_page' => 3, //limit
  //'paged' => $page,
  'order' => 'DESC',
  //'relation' => 'AND',
  'meta_key' => 'is_resource_featured',
  'meta_value' => '1' //if is featured is yes (value returns 1)
);

$featQuery = new WP_Query($featArgs);
?>

<section class="section section--pad section--resource-featured">
  <div class="container">
    <div class="row">
      <div class="col-xs-12 u-text-center">
        <h2 class="title u-color-primary">Featured</h2>
      </div>
    </div>
    <div class="row u-re-li">

      <?php
        if($featQuery->have_posts()) :
          while ( $featQuery->have_posts() ) :
            $featQuery->the_post(); ?>
            <li class="col-sm-4 col-xs-12 card card--has-footer grow">
              <a href="<?php the_permalink(); ?>" class="card__overlay" style="background:linear-gradient(rgba(110, 154, 185, 0.85), rgba(110, 154, 185, 0.85)), url('<?php echo get_thumb_img($id); ?>')">
                <h5 class="card__type"><?php echo get_tax_name($id); ?></h5>
                <h5 class="card__title"><?php the_title(); ?></h5>
              </a><!--/.card__overlay-->
              <div class="card__footer">
                <p><?php echo wp_trim_words( get_the_content() , '20', '…' ); ?></p>
                <span class="card__more"><a href="<?php the_permalink(); ?>">View</a></span>
              </div><!--/.card__footer-->
            </li><!--/.card-->
            <?php
          endwhile;
        endif;

        wp_reset_query();
    
      ?>

    </div><!--/.row-->
  </div><!--/.container-->
</section>

<section class="section section--resource-list">
  <div class="container">

  <p class="col-sm-offset-1 col-sm-10 col-xs-12 u-text-center">See a sampling of our most popular resources below. Or, use the filters to browse through our full library.</p>
  
    <div class="filters">
      <?php $topics = get_terms(array('taxonomy' => 'topic', 'hide_empty' => true)) ?>
      <div class="row center-xs">
        <div class="col-sm-3 col-xs-6">
          <select class="topic custom-select" placeholder="Topic">
            <option value="All">All Topics</option>
            <?php foreach ($topics as $topic): ?>
              <option value="<?php print (str_replace(' ', '-', strtolower($topic->name))); ?>"><?php echo $topic->name; ?></option>
            <?php endforeach ?>
          </select>
        </div><!--/.col.select-->
      <?php $types = get_terms(array('taxonomy' => 'type', 'hide_empty' => true)) ?>
        <div class="col-sm-3 col-xs-6">
          <select class="type custom-select" placeholder="Type">
            <option value="All">All Types</option>
            <?php foreach ($types as $type): ?>
              <option value="<?php print (str_replace(' ', '-', strtolower($type->name))); ?>"><?php echo $type->name; ?></option>
            <?php endforeach ?>
          </select>
        </div><!--/.select-->
      </div><!--/.row-->

    </div><!--/.filters-->

    <ul id="js-resources-list" class="row start-xs cards"></ul>

    <div class="u-text-center">
        <div class="load-more">
          <a id="js-load-more" class="btn btn--primary">Load More</a>
        </div>
        <img class="loading-spinner" src="<?php echo get_template_directory_uri() . '/dist/img/loading.svg'; ?>">
        <!--<div class="all-shown">All resources are shown.</div>-->
        <div class="none-shown">No resources found.</div>
    </div>


  <script type="text/javascript">
    jQuery(document).ready(function($) {

      var admin_ajax = '<?php echo admin_url( 'admin-ajax.php' ) ?>',
        ppp = 16,
        page = 1;

      var get_resources = function(ppp, page, type, topic, params) {

        type = (typeof type == 'undefined' ? 'All' : type);
        topic = (typeof topic == 'undefined' ? 'All' : topic);
        //console.log('get_resources', ppp, page, type, topic);

        $('.loading-spinner').show();
        $('#js-load-more').hide();
        //$('.all-shown').hide();
        $('.none-shown').hide();
        $('.filters select').attr('disabled', true);

        type_param = type_param;
    

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
            $('#js-resources-list').append(res);
            $('.loading-spinner').hide();
            //console.log(type_param)
            //url = '?topic=' + topic + '&type='+ type;
            //window.history.replaceState(null, null, url);
            if (total_resources == 0) {
              $('.loading-spinner').hide();
              $('.none-shown').show();
            } else if ($('#js-resources-list li').length == total_resources) {
              $('.loading-spinner').hide();
              //$('.all-shown').show();
              $('#js-load-more').hide();
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

function getAllUrlParams(url) {

// get query string from url (optional) or window
var queryString = url ? url.split('?')[1] : window.location.search.slice(1);

// we'll store the parameters here
var obj = {};

// if query string exists
if (queryString) {

  // stuff after # is not part of query string, so get rid of it
  queryString = queryString.split('#')[0];

  // split our query string into its component parts
  var arr = queryString.split('&');

  for (var i=0; i<arr.length; i++) {
    // separate the keys and the values
    var a = arr[i].split('=');

    // in case params look like: list[]=thing1&list[]=thing2
    var paramNum = undefined;
    var paramName = a[0].replace(/\[\d*\]/, function(v) {
      paramNum = v.slice(1,-1);
      return '';
    });

    // set parameter value (use 'true' if empty)
    var paramValue = typeof(a[1])==='undefined' ? true : a[1];

    // (optional) keep case consistent
    paramName = paramName.toLowerCase();
    paramValue = paramValue.toLowerCase();

    // if parameter name already exists
    if (obj[paramName]) {
      // convert value to array (if still string)
      if (typeof obj[paramName] === 'string') {
        obj[paramName] = [obj[paramName]];
      }
      // if no array index number specified...
      if (typeof paramNum === 'undefined') {
        // put the value on the end of the array
        obj[paramName].push(paramValue);
      }
      // if array index number specified...
      else {
        // put the value at that index number
        obj[paramName][paramNum] = paramValue;
      }
    }
    // if param name doesn't exist yet, set it
    else {
      obj[paramName] = paramValue;
    }
  }
}

return obj;
}

var topic_param = getAllUrlParams().topic;
var type_param = getAllUrlParams().type;

//console.log("topic:", topic_param, "type:", type_param);
  
if (window.location.href.indexOf(type_param) >= 0) {
  var this_sel = $('.custom-options .custom-option[data-value*='+ type_param + ']');
  this_sel.addClass("selection");
  this_sel.find(".custom-select").removeClass("opened");
  this_sel.find(".custom-select-trigger").text(this_sel).text();
  this_sel.triggerHandler('click');   
}




      $('.filters .custom-option').on('click', function() {

        //var topic = $('.filters select.topic').val();
        var type = $('.filters select.type').val();

        //url = '?topic=' + topic + '&type='+ type;
        url = '?type='+ type;
        window.history.replaceState(null, null, url);


        $('#js-resources-list').html('');
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

$(".custom-select").each(function() {
  var classes = $(this).attr("class"),
      id      = $(this).attr("id"),
      name    = $(this).attr("name");
  var template =  '<div class="' + classes + '">';
      template += '<span class="custom-select-trigger">' + $(this).attr("placeholder") + '</span>';
      template += '<div class="custom-options">';
      $(this).find("option").each(function() {
        template += '<span class="custom-option ' + $(this).attr("class") + '" data-value="' + $(this).attr("value") + '">' + $(this).html() + '</span>';
      });
  template += '</div></div>';
  
  $(this).wrap('<div class="custom-select-wrapper"></div>');
  $(this).hide();
  $(this).after(template);
});
$(".custom-option:first-of-type").hover(function() {
  $(this).parents(".custom-options").addClass("option-hover");
}, function() {
  $(this).parents(".custom-options").removeClass("option-hover");
});
$(".custom-select-trigger").on("click", function() {
  //$(".custom-select").removeClass("opened");
  $(this).parents(".custom-select").toggleClass("opened");
  event.stopPropagation();
});

$(".custom-options .custom-option").on("click", function(e) {
  e.preventDefault();
  $(this).parents(".custom-select-wrapper").find("select").val($(this).data("value"));
  $(this).parents(".custom-options").find(".custom-option").removeClass("selection");
  $(this).addClass("selection");
  $(this).parents(".custom-select").removeClass("opened");
  $(this).parents(".custom-select").find(".custom-select-trigger").text($(this).text());
});
  </script>

  </div><!--/.container-->
</section>