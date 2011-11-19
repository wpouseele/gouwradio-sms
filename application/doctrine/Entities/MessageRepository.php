<?php

namespace Entities;

class MessageRepository extends \Doctrine\ORM\EntityRepository
{
    public function getNewMessages()
    {
        $query = $this->_em->createQuery('SELECT m FROM Entities\Message m WHERE m.new = 1 AND m.deleted  = 0 ORDER BY m.id ASC');
        $result = $query->getResult();
        return $result;
    }
	
	public function getMessages()
    {
        $query = $this->_em->createQuery('SELECT m FROM Entities\Message m WHERE m.new = 0 AND m.deleted  = 0 ORDER BY m.id ASC');
        $result = $query->getResult();
        return $result;
    }
	
	public function getVerzoekjes()
	{
		$query = $this->_em->createQuery("SELECT m FROM Entities\Message m WHERE m.type = 'verzoek' AND m.deleted  = 0 AND m.read = 0 ORDER BY m.id ASC");
		$result = $query->getResult();
		return $result;
	}
	
	public function getBerichtjes()
	{
		$query = $this->_em->createQuery("SELECT m FROM Entities\Message m WHERE m.type = 'bericht' AND m.deleted  = 0 AND m.read = 0 ORDER BY m.id ASC");
		$result = $query->getResult();
		return $result;
	}
	
	public function getNextUnread($type, $currentId)
	{
		if ($type == 'alles')
		{
			$query = $this->_em->createQuery("SELECT m FROM Entities\Message m WHERE m.deleted  = 0 AND m.new = 0 AND m.id > :id");
			$query->setParameter('id', $currentId);
		}
		else 
		{
			$query = $this->_em->createQuery("SELECT m FROM Entities\Message m WHERE m.type = :type AND m.deleted  = 0 AND m.new = 0 AND m.id > :id");
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
			$query = $this->_em->createQuery("SELECT m FROM Entities\Message m WHERE m.deleted  = 0 AND m.new = 0 AND m.id < :id");
			$query->setParameter('id', $currentId);
		}
		else 
		{
			$query = $this->_em->createQuery("SELECT m FROM Entities\Message m WHERE m.type = :type AND m.deleted  = 0 AND m.new = 0 AND m.id < :id");
			$query->setParameter('type', $type);
		}
		$query->setParameter('id', $currentId);
		$result = $query->getResult();
		return $result;
	}
}