<?php

namespace App\Structures;

class TrieNode
{
    public TrieNode $children;
    public bool $isEnd;
}

class Trie
{
    private TrieNode $root;

    public function __construct()
    {
        $this->root = new TrieNode();
    }

    public function insert(string $word) : void
    {
        $current = $this->root;

        foreach(str_split($word) as $letter)
        {
            if (!isset($current->children[$letter]))
            {
                $current->children[$letter] = new TrieNode();
            }
            $current = $current->children[$letter];
        }
        $current->isEnd = true;
    }

    public function search(string $word): bool
    {
        $current = $this->root;

        foreach(str_split($word) as $letter)
        {
            if (!isset($current->children[$letter]))
            {
                return false;
            }
            $current = $current->children[$letter];
        }
        return $current->isEnd;
    }

    public function remove(string $word): void
    {
        $current = $this->root;

        foreach(str_split($word) as $letter)
        {
            if (!isset($current->children[$letter]))
            {
                return;
            }

            $current = $current->children[$letter];
        }
        $current->isEnd = false;
    }
}
