<?php
/* Stack Implementation in PHP */

//Stack Class
class Stack {
    private $_items = array();

    public function push($value = NULL) {
        array_push($this->_items, $value);
    }

    public function pop() {
        return array_pop($this->_items);
    }

    public function peek() {
        return end($this->_items);
    }

	public function size() {
		return count($this->_items);
	}

	public function isEmpty() {
		return empty($this->_items);
	}

    public function display()
    {
        print_r($this->_items);
    }
}

$st = new Stack();

$st->push(34);
$st->push(36);
$st->push(50);
$st->push(90);
$st->display();
$st->pop();
$st->display();
$s = $st->peek();
$st->display();
?>
