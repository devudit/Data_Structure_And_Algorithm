<?php

class Node
{
    public $data;
    public $next;

    public function __construct($data)
    {
        $this->data = $data;
        $this->next = null;
    }
}


class LinkedList
{
    private $head;

    public function __construct()
    {
        $this->head = null;
    }

    // Add a node to the end of the list
    public function append($data)
    {
        $newNode = new Node($data);

        if ($this->head === null) {
            $this->head = &$newNode;
            return;
        }

        $current = $this->head;
        while ($current->next !== null) {
            $current = $current->next;
        }
        $current->next = &$newNode;
    }

    // Add a node to the beginning of the list
    public function prepend($data)
    {
        $newNode = new Node($data);

        if ($this->head !== null) {
            $newNode->next = $this->head;
        }

        $this->head = &$newNode;
    }

    // Delete a node by value
    public function delete($data)
    {
        if ($this->head === null) {
            return;
        }

        if ($this->head->data === $data) {
            $this->head = $this->head->next;
            return;
        }

        $current = $this->head;
        while ($current->next !== null && $current->next->data !== $data) {
            $current = $current->next;
        }

        if ($current->next !== null) {
            $current->next = $current->next->next;
        }
    }

    // Add a node after a specific item
    public function addAfter($target, $data) {
        $current = $this->head;

        while ($current !== null) {
            if ($current->data === $target) {
                $newNode = new Node($data);
                $newNode->next = $current->next;
                $current->next = $newNode;
                return; // Node added, exit the function
            }
            $current = $current->next;
        }

        echo "Node with value $target not found.\n";
    }

    // Display the linked list
    public function display()
    {
        $current = $this->head;
        while ($current !== null) {
            echo $current->data . " -> ";
            $current = $current->next;
        }
        echo "null\n";
    }
}


$list = new LinkedList();
$list->append(1);
$list->append(2);
$list->addAfter(2, 2.5); // Adds 2.5 after 2
$list->append(3);
$list->display(); // Output: 1 -> 2 -> 3 -> null

$list->prepend(0);
$list->display(); // Output: 0 -> 1 -> 2 -> 3 -> null

$list->delete(2);
$list->display(); // Output: 0 -> 1 -> 3 -> null