<?php

$config = array(
  'manager/items' => array(
    array(
      'field' => 'title',
      'label' => 'Titre',
      'rules' => 'trim|required',
    ),
    array(
      'field' => 'subtitle',
      'label' => 'Sous-titre',
      'rules' => 'trim',
    ),
    array(
      'field' => 'slug',
      'label' => 'Alias',
      'rules' => 'trim|required',
    ),
  ),
  'manager/items/pages/add' => array(
    array(
      'field' => 'title',
      'label' => 'Titre',
      'rules' => 'trim|required',
    ),
    array(
      'field' => 'subtitle',
      'label' => 'Sous-titre',
      'rules' => 'trim',
    ),
    array(
      'field' => 'slug',
      'label' => 'Alias',
      'rules' => 'trim|required',
    ),
  ),
  'manager/items/pages/edit' => array(
    array(
      'field' => 'title',
      'label' => 'Titre',
      'rules' => 'trim|required',
    ),
    array(
      'field' => 'subtitle',
      'label' => 'Sous-titre',
      'rules' => 'trim',
    ),
    array(
      'field' => 'slug',
      'label' => 'Alias',
      'rules' => 'trim|required',
    ),
  ),
);
