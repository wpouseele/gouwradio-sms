<?php

namespace Entities;

class MessageRepository extends \Doctrine\ORM\EntityRepository
{
    public function getNewMessages()
    {
        $query = $this->_em->createQuery('SELECT m FROM Entities\Message m WHERE m.new = 1 ORDER BY m.id ASC');
        $result = $query->getResult();
        return $result;
    }
	
	public function getVerzoekjes()
	{
		$query = $this->_em->createQuery("SELECT m FROM Entities\Message m WHERE m.type = 'verzoek' AND m.read = 0 ORDER BY m.id ASC");
		$result = $query->getResult();
		return $result;
	}
	
	public function getBerichtjes()
	{
		$query = $this->_em->createQuery("SELECT m FROM Entities\Message m WHERE m.type = 'bericht' AND m.read = 0 ORDER BY m.id ASC");
		$result = $query->getResult();
		return $result;
	}
	
}