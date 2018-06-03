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
