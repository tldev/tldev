<?php

namespace Application\Entity;

use Application\Blog\BlogInterface;
use Doctrine\ORM\Mapping as ORM;

/**
 * Blog
 *
 * @ORM\Table(name="blog")
 * @ORM\Entity(repositoryClass="Application\Repository\BlogRepository")
 * @Gedmo\Mapping\Annotation\SoftDeleteable(fieldName="deleted_at", timeAware=false)
 */
class Blog implements BlogInterface {

    /**
     * @var int
     *
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     * @ORM\Column(name="id", type="integer", nullable=false)
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="content", type="text", nullable=false)
     */
    private $content;

    /**
     * @var \DateTime
     *
     * @Gedmo\Mapping\Annotation\Timestampable(on="create")
     * @ORM\Column(name="created", type="datetime", nullable=false)
     */
    private $created;

    /**
     * @var \DateTime
     *
     * @Gedmo\Mapping\Annotation\Timestampable(on="update")
     * @ORM\Column(name="updated", type="datetime", nullable=false)
     */
    private $updated;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="deleted_at", type="datetime", nullable=true)
     */
    private $deleted_at;

    /**
     * @return string
     */
    public function getContent() {
        return $this->content;
    }

    /**
     * @return \DateTime
     */
    public function getCreated() {
        return $this->created;
    }

} 