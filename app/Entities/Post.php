<?php declare(strict_types=1);

namespace App\Entities;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Illuminate\Support\Str;

/**
 * @ORM\Entity()
 * @ORM\Table(name="posts")
 * @ORM\HasLifecycleCallbacks()
 */
class Post
{
    use HasTimestamps;

    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="title", type="string")
     */
    private $title;

    /**
     * @var string
     *
     * @ORM\Column(name="body", type="text")
     */
    private $body;

    /**
    * @var boolean
    *
    * @ORM\Column(name="published", type="boolean")
    */
    private $published = false;

    /**
     * @var User
     *
     * @ORM\ManyToOne(targetEntity="User")
     * @ORM\JoinColumn(name="user_id", referencedColumnName="id")
     */
    private $author;

    /**
     * @var ArrayCollection
     *
     * @ORM\OneToMany(targetEntity="Comment", mappedBy="post")
     */
    private $comments;

    /**
     * @var ArrayCollection
     * @ORM\ManyToMany(targetEntity="Tag")
     * @ORM\JoinTable(name="posts_tags",
     *     joinColumns={@ORM\JoinColumn(name="post_id", referencedColumnName="id")},
     *     inverseJoinColumns={@ORM\JoinColumn(name="tag_id", referencedColumnName="id")})
     */
    private $tags;

    public function __construct()
    {
        $this->comments = new ArrayCollection;
        $this->tags     = new ArrayCollection;
    }

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getTitle(): string
    {
        return $this->title;
    }

    /**
     * @param string $title
     */
    public function setTitle(string $title): void
    {
        $this->title = $title;
    }

    /**
     * @return string
     */
    public function getBody(): string
    {
        return $this->body;
    }

    /**
     * @param string $body
     */
    public function setBody(string $body): void
    {
        $this->body = $body;
    }

    /**
     * @return User
     */
    public function getAuthor(): User
    {
        return $this->author;
    }

    /**
     * @param User $author
     */
    public function authoredBy(User $author): void
    {
        $this->author = $author;
    }

    /**
     * @return ArrayCollection
     */
    public function getComments(): ArrayCollection
    {
        return $this->comments;
    }

    /**
     * @return ArrayCollection|Collection
     */
    public function getTags(): Collection
    {
        return $this->tags;
    }

    /**
     * @param Tag $tag
     */
    public function addTag(Tag $tag): void
    {
        if (null === $this->tags) {
            $this->tags = new ArrayCollection;
        }

        $this->tags->add($tag);
    }

    public function getSlug(): string
    {
        return Str::slug($this->getTitle());
    }

    /**
     * @return bool
     */
    public function isPublished(): bool
    {
        return $this->published;
    }

    public function publish(): void
    {
        $this->setPublished(true);
    }

    public function unpublish(): void
    {
        $this->setPublished(false);
    }

    /**
     * @param bool $published
     */
    public function setPublished(bool $published): void
    {
        $this->published = $published;
    }
}