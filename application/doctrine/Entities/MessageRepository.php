<?php

namespace Entities;

class MessageRepository extends \Doctrine\ORM\EntityRepository
{
    public function getNewMessages()
    {
        $query = $this->_em->createQuery('SELECT m.id,m.date,m.number,m.text FROM Entities\Message m WHERE m.new = 1 ORDER BY m.id ASC');
        $result = $query->getResult();
        return $result;
    }
}