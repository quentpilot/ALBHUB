<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class MY_Table extends CI_Table {

	public function __construct($config = array()) {
    parent::__construct($config);
  }

  // --------------------------------------------------------------------

	/**
	 * Set table data from a database result object
	 *
	 * @param	ITable_Database	$object	Database result object
	 * @return	void
	 */
	protected function _set_from_orm_result($object)
	{
		// First generate the headings from the table column names
		if ($this->auto_heading === TRUE && empty($this->heading))
		{
      $heading = array();
      //foreach ($object as $row) {
        $heading = $this->_prep_args($object[0]->list_fields());
        $this->heading = array_merge($this->heading, $heading);
      //}
		}

		foreach ($object as $row)
		{
      //debug($row);
			$this->rows[] = $this->_prep_args($row->list_values());
		}
	}

  // --------------------------------------------------------------------

	/**
	 * Set table data from a database result object
	 *
	 * @param	CI_DB_result	$object	Database result object
	 * @return	void
	 */
	protected function _set_from_db_result($object)
	{
		// First generate the headings from the table column names
		if ($this->auto_heading === TRUE && empty($this->heading))
		{
			$this->heading = $this->_prep_args($object->list_fields());
		}

		foreach ($object->result_array() as $row)
		{
			$this->rows[] = $this->_prep_args($row);
		}
	}

	// --------------------------------------------------------------------

	/**
	 * Set table data from an array
	 *
	 * @param	array	$data
	 * @return	void
	 */
	protected function _set_from_array($data)
	{
		if ($this->auto_heading === TRUE && empty($this->heading)) {
      if ($data[0] instanceof IORM_Database) {
        return $this->_set_from_orm_result($data);
      } else {
			  $this->heading = $this->_prep_args(array_shift($data));
      }
		}

		foreach ($data as &$row) {
			$this->rows[] = $this->_prep_args($row);
		}
	}
}
