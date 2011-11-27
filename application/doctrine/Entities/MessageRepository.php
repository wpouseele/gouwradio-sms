<?php

namespace Entities;

class MessageRepository extends \Doctrine\ORM\EntityRepository
{
    public function getNewMessages()
    {
    	$query = $this->_em->createQuery('SELECT m FROM Entities\Message m WHERE m.gouwradio is NULL ORDER BY m.id ASC');
		
        $result = $query->getResult();
        return $result;
	}
	
	public function getMessages()
    {
        $query = $this->_em->createQuery('SELECT m FROM Entities\Message m JOIN m.gouwradio g WHERE g.new = 0 AND g.deleted = 0 ORDER BY m.id ASC');
        $result = $query->getResult();
        return $result;
    }
	
	public function getVerzoekjes()
	{
		$query = $this->_em->createQuery("SELECT m FROM Entities\Message m JOIN m.gouwradio g WHERE g.type = 'verzoek' AND g.deleted = 0 AND g.read = 0 ORDER BY m.id ASC");
		$result = $query->getResult();
		return $result;
	}
	
	public function getBerichtjes()
	{
		$query = $this->_em->createQuery("SELECT m FROM Entities\Message m JOIN m.gouwradio g WHERE g.type = 'bericht' AND g.deleted = 0 AND g.read = 0 ORDER BY m.id ASC");
		$result = $query->getResult();
		return $result;
	}
	
	public function getNextUnread($type, $currentId)
	{
		if ($type == 'alles')
		{
			$query = $this->_em->createQuery("SELECT m FROM Entities\Message m JOIN m.gouwradio g WHERE g.deleted = 0 AND g.new = 0 AND m.id > :id");
			$query->setParameter('id', $currentId);
		}
		else 
		{
			$query = $this->_em->createQuery("SELECT m FROM Entities\Message m JOIN m.gouwradio g WHERE g.type = :type AND g.deleted = 0 AND g.new = 0 AND m.id > :id");
			$query->setParameter('type', $type);
		}
		$query->setParameter('id', $currentId);
		$result = $query->getResult();
		return $result;
	}

	public function getPreviousUnread($type, $currentId)
	{
		if ($type == 'alles')
		{
			$query = $this->_em->createQuery("SELECT m FROM Entities\Message m JOIN m.gouwradio g WHERE g.deleted = 0 AND g.new = 0 AND m.id < :id");
			$query->setParameter('id', $currentId);
		}
		else 
		{
			$query = $this->_em->createQuery("SELECT m FROM Entities\Message m JOIN m.gouwradio g WHERE g.type = :type AND g.deleted = 0 AND g.new = 0 AND m.id < :id");
			$query->setParameter('type', $type);
		}
		$query->setParameter('id', $currentId);
		$result = $query->getResult();
		return $result;
	}
}