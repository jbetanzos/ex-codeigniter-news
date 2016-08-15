<?php

namespace models\Entity;

/**
 * @Entity(repositoryClass="models\Repository\ArticleRepository")
 * @Table(name="article")
 */
class Article
{
    /**
     * @var integer
     *
     * @Id
     * @Column(name="id", type="integer")
     * @GeneratedValue
     */
    protected $id;

    /**
     * @var string
     *
     * @Column(name="title", type="string")
     */
    protected $title;

    /**
     * @var string
     *
     * @Column(name="photo", type="string")
     */
    protected $photo;

    /**
     * @var body
     *
     * @Column(name="body", type="string")
     */
    protected $body;

    /**
     * @var \DateTime
     *
     * @Column(name="created_at", type="datetime")
     */
    protected $createdAt;


    /**
     * @var \models\Entity\User
     *
     * @ManyToOne(targetEntity="User", inversedBy="articles")
     * @JoinColumn(name="user_email", referencedColumnName="email")
     */
    protected $user;

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param int $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @param string $title
     */
    public function setTitle($title)
    {
        $this->title = $title;
    }

    /**
     * @return string
     */
    public function getPhoto()
    {
        return $this->photo;
    }

    /**
     * @param string $photo
     */
    public function setPhoto($photo)
    {
        $this->photo = $photo;
    }

    /**
     * @return body
     */
    public function getBody()
    {
        return $this->body;
    }

    /**
     * @param body $body
     */
    public function setBody($body)
    {
        $this->body = $body;
    }

    /**
     * @return \DateTime
     */
    public function getCreatedAt()
    {
        return $this->createdAt;
    }

    /**
     * @param \DateTime $createdAt
     */
    public function setCreatedAt($createdAt)
    {
        $this->createdAt = $createdAt;
    }

    /**
     * @return \models\Entity\User
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * @param \models\Entity\User $user
     */
    public function setUser($user)
    {
        $this->user = $user;
    }
}