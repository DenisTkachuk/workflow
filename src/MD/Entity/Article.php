<?php

namespace MD\Entity;

use Symfony\Component\Validator\Constraints as Assert;

use Doctrine\ORM\Mapping as ORM;

/**
 * Article
 *
 * @ORM\Entity
 */
class Article
{
    /**
     * The ID of the Article
     *
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * The title of the Article
     *
     * @var string
     *
     * @ORM\Column(type="string", length=255)
     *
     * @Assert\NotBlank(message="article.title.not_blank")
     * @Assert\Length(
     *      max=255,
     *      maxMessage="article.title.length.max"
     * )
     */
    protected $title;

    /**
     * The content of the Article
     *
     * @var string
     *
     * @ORM\Column(type="text")
     *
     * @Assert\NotBlank(message="article.content.not_blank")
     */
    protected $content;


    /**
     * Get the ID of the Article
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set the title of the Article
     *
     * @param string $title
     *
     * @return $this
     */
    public function setTitle($title)
    {
        $this->title = $title;

        return $this;
    }

    /**
     * Get the title of the Article
     *
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Set the content of the Article
     *
     * @param string $content
     *
     * @return $this
     */
    public function setContent($content)
    {
        $this->content = $content;

        return $this;
    }

    /**
     * Get the content of the Article
     *
     * @return string
     */
    public function getContent()
    {
        return $this->content;
    }
}
