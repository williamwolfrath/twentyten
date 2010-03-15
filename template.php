<?php


function twentyten_preprocess_page(&$vars) {
    //$node =$vars['node'];
    //
    //$theterms = taxonomy_node_get_terms($node, 'weight');
    //$tax = $theterms[0]->name;  // if no parents, this is the top.
    //if ( $tax ) {
    //    log_debug('got a tax: ', $tax);
    //    if ( $tax == 'Drupal' ) {
    //        $vars['taxonomy_img'] = '<img src="/sites/all/themes/twentyten/images/Drupal_logo.jpg" />';
    //    }
    //}
}




function twentyten_preprocess_node(&$vars, $hook) {
    //$node =$vars['node'];
    //
    //$theterms = taxonomy_node_get_terms($node, 'weight');
    //$tax = $theterms[0]->name;  // if no parents, this is the top.
    //if ( $tax ) {
    //    log_debug('got a tax: ', $tax);
    //    if ( $tax == 'Drupal' ) {
    //        $vars['taxonomy_img'] = '<img src="/sites/all/themes/twentyten/images/Drupal_logo.jpg" />';
    //    }
    //}
    
}



function twentyten_links($links, $attributes = array('class' => 'links')) {
  global $language;
  $output = '';

  if (count($links) > 0) {
    $output = '<ul'. drupal_attributes($attributes) .'>';

    $num_links = count($links);
    $i = 1;
    foreach ($links as $key => $link) {
      $class = $key;

      // Add first, last and active classes to the list of links to help out themers.
      if ($i == 1) {
        $class .= ' first';
      }
      if ($i == $num_links) {
        $class .= ' last';
      }
      // BW - adding this to save a nightmare of IE6 issues - it likes specific widths on floated objects..
      $navclass = 'menu-item-' . $i;
      $class .= ' ' . $navclass;
      
      if (isset($link['href']) && ($link['href'] == $_GET['q'] || ($link['href'] == '<front>' && drupal_is_front_page()))
          && (empty($link['language']) || $link['language']->language == $language->language)) {
        $class .= ' active';
      }
      $output .= '<li'. drupal_attributes(array('class' => $class)) .'>';

      if (isset($link['href'])) {
        $output .= l($link['title'], $link['href'], $link);
      }
      else if (!empty($link['title'])) {
        // Some links are actually not links, but we wrap these in <span> for adding title and class attributes
        if (empty($link['html'])) {
          $link['title'] = check_plain($link['title']);
        }
        $span_attributes = '';
        if (isset($link['attributes'])) {
          $span_attributes = drupal_attributes($link['attributes']);
        }
        $output .= '<span'. $span_attributes .'>'. $link['title'] .'</span>';
      }

      $i++;
      $output .= "</li>\n";
    }

    $output .= '</ul>';
  }

  return $output;
}