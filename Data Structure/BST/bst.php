<?php


class TreeNode
{
    public $value;
    public $left;
    public $right;

    public function __construct($value)
    {
        $this->value = $value;
        $this->left = null;
        $this->right = null;
    }
}

class BinarySearchTree
{
    public $root;

    public function __construct()
    {
        $this->root = null;
    }

    public function insert($value)
    {
        $newNode = new TreeNode($value);

        if ($this->root === null) {
            $this->root = $newNode;
        } else {
            $this->insertNode($this->root, $newNode);
        }
    }

    private function insertNode($node, $newNode)
    {
        if ($newNode->value < $node->value) {
            if ($node->left === null) {
                $node->left = $newNode;
            } else {
                $this->insertNode($node->left, $newNode);
            }
        } else {
            if ($node->right === null) {
                $node->right = $newNode;
            } else {
                $this->insertNode($node->right, $newNode);
            }
        }
    }

    public function search($value)
    {
        return $this->searchNode($this->root, $value);
    }

    private function searchNode($node, $value)
    {
        if ($node === null) {
            return null;
        }

        if ($value === $node->value) {
            return $node;
        }

        if ($value < $node->value) {
            return $this->searchNode($node->left, $value);
        } else {
            return $this->searchNode($node->right, $value);
        }
    }

    public function inOrderTraversal($node, $callback)
    {
        if ($node !== null) {
            $this->inOrderTraversal($node->left, $callback);
            call_user_func($callback, $node->value);
            $this->inOrderTraversal($node->right, $callback);
        }
    }

    public function preOrderTraversal($node, $callback)
    {
        if ($node !== null) {
            call_user_func($callback, $node->value);
            $this->preOrderTraversal($node->left, $callback);
            $this->preOrderTraversal($node->right, $callback);
        }
    }

    public function postOrderTraversal($node, $callback)
    {
        if ($node !== null) {
            $this->postOrderTraversal($node->left, $callback);
            $this->postOrderTraversal($node->right, $callback);
            call_user_func($callback, $node->value);
        }
    }
}

// Usage example
$bst = new BinarySearchTree();
$bst->insert(10);
$bst->insert(5);
$bst->insert(15);
$bst->insert(3);
$bst->insert(7);

$searchValue = 7;
$foundNode = $bst->search($searchValue);
if ($foundNode !== null) {
    echo "Value {$searchValue} found in the BST.\n";
} else {
    echo "Value {$searchValue} not found in the BST.\n";
}

echo "In-order Traversal:\n";
$bst->inOrderTraversal($bst->root, function ($value) {
    echo $value . ' ';
});
echo "\n";

echo "Pre-order Traversal:\n";
$bst->preOrderTraversal($bst->root, function ($value) {
    echo $value . ' ';
});
echo "\n";

echo "Post-order Traversal:\n";
$bst->postOrderTraversal($bst->root, function ($value) {
    echo $value . ' ';
});
echo "\n";

