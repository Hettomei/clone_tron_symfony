<?php

namespace Tim\TronBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Game
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Tim\TronBundle\Entity\GameRepository")
 */
class Game
{
  /**
   * @var integer
   *
   * @ORM\Column(name="id", type="integer")
   * @ORM\Id
   * @ORM\GeneratedValue(strategy="AUTO")
   */
  private $id;

  /**
   * @ORM\ManyToOne(targetEntity="Tim\UserBundle\Entity\User", inversedBy="games")
   * @ORM\JoinColumn(nullable=true)
   */
  private $j1;

  /**
   * @ORM\ManyToOne(targetEntity="Tim\UserBundle\Entity\User", inversedBy="games")
   * @ORM\JoinColumn(nullable=true)
   */
  private $j2;

  /**
   * @var array
   *
   * @ORM\Column(name="j1_moves", type="array", nullable=true)
   */
  private $j1Moves;

  /**
   * @var array
   *
   * @ORM\Column(name="j2_moves", type="array", nullable=true)
   */
  private $j2Moves;

  /**
   * @ORM\ManyToOne(targetEntity="Tim\UserBundle\Entity\User", inversedBy="games")
   * @ORM\JoinColumn(nullable=true)
   */
  private $winner;


  /**
   * Get id
   *
   * @return integer
   */
  public function getId()
  {
    return $this->id;
  }

  /**
   * @param Tim\UserBundle\Entity\User $j1
   */
  public function setJ1(\Tim\UserBundle\Entity\User $j1 = null)
  {
    $this->j1 = $j1;

    return $this;
  }

  /**
   * @return Tim\UserBundle\Entity\User
   */
  public function getJ1()
  {
    return $this->j1;
  }

  /**
   * @param Tim\UserBundle\Entity\User $j2
   */
  public function setJ2(\Tim\UserBundle\Entity\User $j2 = null)
  {
    $this->j2 = $j2;

    return $this;
  }

  /**
   * @return Tim\UserBundle\Entity\User
   */
  public function getJ2()
  {
    return $this->j2;
  }

  /**
   * Set j1Moves
   *
   * @param array $j1Moves
   * @return Game
   */
  public function setJ1Moves($j1Moves)
  {
    $this->j1Moves = $j1Moves;

    return $this;
  }

  /**
   * Get j1Moves
   *
   * @return array
   */
  public function getJ1Moves()
  {
    return $this->j1Moves;
  }

  /**
   * Set j2Moves
   *
   * @param array $j2Moves
   * @return Game
   */
  public function setJ2Moves($j2Moves)
  {
    $this->j2Moves = $j2Moves;

    return $this;
  }

  /**
   * Get j2Moves
   *
   * @return array
   */
  public function getJ2Moves()
  {
    return $this->j2Moves;
  }

  /**
   * @param Tim\UserBundle\Entity\User $winner
   */
  public function setWinner(\Tim\UserBundle\Entity\User $winner = null)
  {
    $this->winner = $winner;

    return $this;
  }

  /**
   * @return Tim\UserBundle\Entity\User
   */
  public function getWinner()
  {
    return $this->winner;
  }

  public function getStatus()
  {
    if(!$this->j2){
      return "Attente nouveau joueur";
    }

    if($this->j1 && $this->j2 && $this->winner){
      return "Le gagnant est " . $this->winner->getUsername();
    }

    if($this->j1 && $this->j2 && !$this->winner){
      return "Partie en cours";
    }
  }
}
