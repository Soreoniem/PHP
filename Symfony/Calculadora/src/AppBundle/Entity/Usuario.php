<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntityValidator;
use Symfony\Component\Validator\Constraints As Assert;
/*
@Assert
	\Length(
		min="3",
		max="8"
	)
*/

/**
 * Usuario
 *
 * @ORM\Table(name="usuario")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\UsuarioRepository")
 * @ORM\HasLifecycleCallbacks()
 */
class Usuario{
//╔═════  ATRIBUTOS  ═════╗
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     * @Assert\Email()
	 * @Assert\NotBlank(message="Se necesita un email")
     * @ORM\Column(name="email", type="string", length=255, unique=true)
     */
    private $email;

    /**
     * @var string
	 * Falta rellenar
     * @Assert\Length(
	 *     min	= "4",
	 *     max	= "15"
	 * )
     * @ORM\Column(name="nombre", type="string", length=255, unique=true)
     */
    private $nombre;

    /**
     * @var string
     * @Assert\Regex(
	 *     pattern	="/^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?!.*\s).*$/",
	 *     message	= "Es necesario: 1 minúscula, 1 mayuscula y 1 número"
	 * )
     * @ORM\Column(name="password", type="string", length=255)
     */
    private $password;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="creado_at", type="datetime")
     */
    private $creadoAt;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="actualizado_at", type="datetime")
     */
    private $actualizadoAt;
	
//╔═════  CONSTRUCTOR  ═════╗
	public function __construct(){
		$this->creadoAt			= new \DateTime();
		$this->actualizadoAt	= $this->creadoAt;
	}
	
//╔═════  GET | SET  ═════╗
	/**
     * @return int
     */
    public function getId(){
        return $this->id;
    }

    /**
     * @param string $email
     *
     * @return Usuario
     */
    public function setEmail($email){
        $this->email = $email;

        return $this;
    }

    /**
     * @return string
     */
    public function getEmail(){
        return $this->email;
    }

    /**
     * @param string $nombre
     *
     * @return Usuario
     */
    public function setNombre($nombre){
        $this->nombre = $nombre;

        return $this;
    }

    /**
     * @return string
     */
    public function getNombre(){
        return $this->nombre;
    }

    /**
     * @param string $password
     *
     * @return Usuario
     */
    public function setPassword($password){
        $this->password = $password;

        return $this;
    }

    /**
     * @return string
     */
    public function getPassword(){
        return $this->password;
    }

    /**
     * @param \DateTime $creadoAt
     *
     * @return Usuario
     */
    public function setCreadoAt($creadoAt){
        $this->creadoAt = $creadoAt;

        return $this;
    }

    /**
     * @return \DateTime
     */
    public function getCreadoAt(){
        return $this->creadoAt;
    }

    /**
     * @ORM\PreUpdate()
     *
     * @return Usuario
     */
    public function setActualizadoAt(){
        $this->actualizadoAt = new \DateTime();

        return $this;
    }

    /**
     * @return \DateTime
     */
    public function getActualizadoAt(){
        return $this->actualizadoAt;
    }
}
