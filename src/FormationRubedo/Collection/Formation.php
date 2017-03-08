<?php

namespace FormationRubedo\Collection;
use Rubedo\Collection\AbstractCollection;

class Formation extends AbstractCollection
{
    public function __construct()
    {
        $this->_collectionName = 'Formation';
        parent::__construct();
    }
}