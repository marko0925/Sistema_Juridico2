<?php
require_once __Dir__.'/PersonaDTO.php';
  /**
   *
   */
<<<<<<< HEAD
  class ClienteDTO  extends PersonaDTO implements JsonSerializable
  {
      public function __construct(){
          parent::__construct();
=======
  class ClienteDTO extends PersonaDTO
  {
      public function __construct(){
          parent::PersonaDTO();
>>>>>>> 47cd0fcb6862f3154cd6c608e7e900861e785faf
      }

      public function jsonSerialize() {
      return [
          'dni' => $this->getDni(),
          'apellido' => $this->getApellido(),
          'nombre' => $this->getNombre(),
          'fechaNacimiento' => $this->getFecha_nac(),
          'telefono' => $this->getTelefono(),
          'email' => $this->getCorreo()
      ];
  }
      
  }
