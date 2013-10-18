<?php

namespace Tim\UserBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

use Symfony\Component\Security\Core\User\UserInterface;
/**
 * User
 */
class User implements UserInterface
{
  /**
   * @var integer
   */
  private $id;

  /**
   * @var string
   */
  private $username;

  /**
   * @var string
   */
  private $password;

  /**
   * @var string
   */
  private $confirm_password;

  /**
   * @var string
   */
  private $salt;

  /**
   * @var array
   */
  private $roles;

  /**
   * @var array
   */
  private $msg_error;

  /**
   * @ORM\OneToMany(targetEntity="Tim\TronBundle\Entity\Game", mappedBy="user")
   */
  private $games;

  public function __construct()
  {
    $this->games = new \Doctrine\Common\Collections\ArrayCollection();
  }

  /**
   * Add Games
   *
   * @param Tim\TronBundle\Entity\Game $games
   */
  public function addGame(\Tim\TronBundle\Entity\Game $game)
  {
    $this->games[] = $game;
    return $this;
  }

  /**
   * Remove games
   *
   * @param Tim\TronBundle\Entity\Game $categories
   */
  public function removeGame(\Tim\TronBundle\Entity\Game $game)
  {
    $this->games->removeElement($game);
  }

  /**
   * Get games
   *
   * @return Doctrine\Common\Collections\Collection
   */
  public function getGames()
  {
    return $this->games;
  }

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
   * Set username
   *
   * @param string $username
   * @return User
   */
  public function setUsername($username)
  {
    $this->username = $username;

    return $this;
  }

  /**
   * Get username
   *
   * @return string
   */
  public function getUsername()
  {
    return $this->username;
  }

  /**
   * Set password
   *
   * @param string $password
   * @return User
   */
  public function setPassword($password)
  {
    $this->password = $password;

    return $this;
  }

  /**
   * Set confirm_password
   *
   * @param string $confirm_password
   * @return User
   */
  public function setConfirmPassword($password)
  {
    $this->confirm_password = $password;

    return $this;
  }
  /**
   * Get password
   *
   * @return string
   */
  public function getPassword()
  {
    return $this->password;
  }

  /**
   * Set salt
   *
   * @param string $salt
   * @return User
   */
  public function setSalt($salt)
  {
    $this->salt = $salt;

    return $this;
  }

  /**
   * Get salt
   *
   * @return string
   */
  public function getSalt()
  {
    return $this->salt;
  }

  /**
   * Set roles
   *
   * @param array $roles
   * @return User
   */
  public function setRoles($roles)
  {
    $this->roles = $roles;

    return $this;
  }

  /**
   * Get roles
   *
   * @return array
   */
  public function getRoles()
  {
    return $this->roles;
  }

  public function eraseCredentials()
  {
  }

  public function is_valid()
  {
    $this->msg_error = [];
    if(!$this->getUsername()){
      $this->msg_error[] = "Entrez votre pseudo.";
    }

    if(!$this->getPassword()){
      $this->msg_error[] = "Entrez un password";
    }

    if($this->getPassword() !== $this->confirm_password){
      $this->msg_error[] = "Password et Confirmation différente.";
    }

    return count($this->msg_error) === 0;
  }

  public function errors_to_s(){
    return implode(" - ", $this->msg_error);
  }
}
