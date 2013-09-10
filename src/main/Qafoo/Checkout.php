<?php

namespace Qafoo;

class Checkout
{
    private $article;

    private $articleList = array();

    private $result = 0.0;

    private $sortiment = array(
        'A' =>  0.5,
        'B' =>  0.79,
        'C' =>  1.29,
        'D' =>  2.01
    );

    public function registerProduct($article)
    {
        $this->articleList[] = $article;
    }

    public function calculateSum()
    {

        foreach ($this->articleList as $article) {
            $this->result += $this->sortiment[$article];
        }

        return $this->result;
    }

    public function isInArticleList($article)
    {
        if (in_array($article, array_keys($this->sortiment))) {
            return true;
        }
        return false;
    }
}
