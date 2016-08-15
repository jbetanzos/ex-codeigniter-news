<?php

namespace models\Entity;

use Doctrine\ORM\Mapping;

/**
 * @Entity(repositoryClass="models\Repository\UserRepository")
 * @Table(name="user")
 */
class User
{
    /**
     * @var string
     *
     * @Id
     * @Column(name="email", type="string")
     */
    protected $email;

    /**
     * @var string
     *
     * @Column(name="password", type="string", nullable=false)
     */
    protected $password;

    /**
     * @var boolean
     *
     * @Column(name="confirmed", type="boolean", nullable=true)
     */
    protected $confirmed;

    /**
     * @var ArrayCollection
     *
     * @OneToMany(targetEntity="Article", mappedBy="user")
     */
    protected $articles;

    /**
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param string $email
     */
    public function setEmail($email)
    {
        $this->email = $email;
    }

    /**
     * @return string
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * @param string $password
     */
    public function setPassword($password)
    {
        $this->password = $password;
    }

    /**
     * @return boolean
     */
    public function isConfirmed()
    {
        return $this->confirmed;
    }

    /**
     * @param boolean $confirmed
     */
    public function setConfirmed($confirmed)
    {
        $this->confirmed = $confirmed;
    }
}
