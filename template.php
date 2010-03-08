<?php


function twentyten_preprocess_page(&$vars) {
    $node =$vars['node'];

    $theterms = taxonomy_node_get_terms($node, 'weight');
    $tax = $theterms[0]->name;  // if no parents, this is the top.
    if ( $tax ) {
        log_debug('got a tax: ', $tax);
        if ( $tax == 'Drupal' ) {
            $vars['taxonomy_img'] = '<img src="/sites/all/themes/twentyten/images/Drupal_logo.jpg" />';
        }
    }
}




function twentyten_preprocess_node(&$vars, $hook) {
    $node =$vars['node'];

    $theterms = taxonomy_node_get_terms($node, 'weight');
    $tax = $theterms[0]->name;  // if no parents, this is the top.
    if ( $tax ) {
        log_debug('got a tax: ', $tax);
        if ( $tax == 'Drupal' ) {
            $vars['taxonomy_img'] = '<img src="/sites/all/themes/twentyten/images/Drupal_logo.jpg" />';
        }
    }
    
}
