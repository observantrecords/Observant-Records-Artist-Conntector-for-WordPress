<?php
/**
 * Created by PhpStorm.
 * User: gregbueno
 * Date: 11/8/14
 * Time: 1:20 PM
 */

namespace ObservantRecords\WordPress\Plugins\ArtistConnector\Models;


class Base {

	protected $ob_db;

	public $_table;
	public $_primary_key;

	public function __construct() {
		$driver = new Driver();
		$this->ob_db = $driver->get_driver();
	}

	public function get($id, $args = null) {
		$fields = !empty($args['fields']) ? implode(", ", $args['fields']) : '*';

		$prepared_query = $this->ob_db->prepare( "select $fields from $this->_table where $this->_primary_key = %d", $id);

		$result = $this->ob_db->get_row($prepared_query);

		return $result;
	}

	public function get_all($args = null) {
		$fields = !empty($args['fields']) ? implode(", ", $args['fields']) : '*';

		$order_by = $args['order_by'];
		$order = is_array($order_by) ? implode(", ", $order_by) : $order_by;

		if (!empty($order)) {
			$prepared_query = "select $fields from $this->_table order by $order";
		} else {
			$prepared_query = "select $fields from $this->_table";
		}

		$result = $this->ob_db->get_results($prepared_query);

		return $result;
	}

	public function get_by($field, $value, $args = null) {
		$fields = !empty($args['fields']) ? implode(", ", $args['fields']) : '*';

		$prepared_query = $this->ob_db->prepare( "select $fields from $this->_table where $field = %s", $value);

		$result = $this->ob_db->get_row($prepared_query);

		return $result;
	}

	public function get_many_by($field, $value, $args = null) {
		$fields = !empty($args['fields']) ? implode(", ", $args['fields']) : '*';

		$order_by = $args['order_by'];
		$order = is_array($order_by) ? implode(", ", $order_by) : $order_by;

		if (!empty($order)) {
			$prepared_query = $this->ob_db->prepare( "select $fields from $this->_table where $field = %s order by $order", $value);
		} else {
			$prepared_query = $this->ob_db->prepare( "select $fields from $this->_table where $field = %s", $value);
		}

		$result = $this->ob_db->get_results($prepared_query);

		return $result;
	}

	public function get_many_like($field, $value, $pos = 'all', $args = null) {
		$fields = !empty($args['fields']) ? implode(", ", $args['fields']) : '*';

		$order_by = $args['order_by'];
		$order = is_array($order_by) ? implode(", ", $order_by) : $order_by;

		switch ($pos) {
			case 'before':
				$like_value = '%' . like_escape($value);
				break;
			case 'after':
				$like_value = like_escape($value) . '%';
				break;
			case 'all':
			default:
				$like_value = '%' . like_escape($value) . '%';
		}

		if (!empty($order)) {
			$prepared_query = $this->ob_db->prepare( "select $fields from $this->_table where $field like %s order by $order", $like_value);
		} else {
			$prepared_query = $this->ob_db->prepare( "select $fields from $this->_table where $field like %s", $like_value);
		}

		$result = $this->ob_db->get_results($prepared_query);

		return $result;
	}

	public function load_relationship($args) {

		$model = null;
		if (is_array($args)) {
			$model = $args['model'];
			$alias = $args['alias'];
		} else {
			$model = $alias = $args;
		}

		$this->{$alias} = new $model();
	}

}