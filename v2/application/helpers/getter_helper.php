<?php

function get_lang_code($lan_id = null) {
  $ci = &get_instance();

  if (!is_null($lan_id)) {
    return $ci->db->select('lan_code')
                             ->from('lan_languages')
                             ->where('lan_id', $lan_id)
                             ->get()->result()[0]->lan_code;
  } else {
    return empty($_SESSION['lan_code'])
           ? substr($ci->config->item('language'), 0, 2)
           : $ci->session->userdata('lan_code');
  }
}

function get_lang_id(string $lan_code = null) {
  $ci = &get_instance();

  if (is_null($lan_code)) {
    $lan_code = get_lang_code();
  }
  return $ci->db->select('lan_id')
                ->from('lan_languages')
                ->where('lan_code', $lan_code)
                ->get()->result()[0]->lan_id;
}

function get_uri_manager($formated = true) {
  $ci = &get_instance();
  $uri = null;
  $segments = $ci->uri->segments;

  if (count($segments) >= 2 && $segments[2] == 'manager') {
    $uri = $segments[2];
    $uri .= (isset($segments[3])) ? '/' . $segments[3] : '';
    $uri .= (isset($segments[4])) ? '/' . $segments[4] : '';

    if ($formated) {
      $uri = (isset($segments[3])) ? $segments[3] . ' ' : '';
      $uri = (isset($segments[4])) ? $segments[4] . ' ' : '';
      $uri .= $segments[2];
    }
  }
  return $uri;
}

function get_page_bar_title($title, $is_manager = true) {
  $segments = get_instance()->uri->segments;
  $pb_title = isset($segments[2]) ? $segments[2] : $segments[1];
  $pb_title = ($is_manager) ? get_uri_manager() : $pb_title;

  $pb_title .= space(3, true) . '-' . space(3, true);
  $pb_title .= $title;
  return $pb_title;
}

function get_breadcumb() {
  return '';
}
