-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

-- -----------------------------------------------------
-- Schema mydb
-- -----------------------------------------------------
-- -----------------------------------------------------
-- Schema emp_simulada
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema emp_simulada
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `emp_simulada` DEFAULT CHARACTER SET latin1 ;
USE `emp_simulada` ;

-- -----------------------------------------------------
-- Table `emp_simulada`.`criterio_aspecto`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `emp_simulada`.`criterio_aspecto` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `nombre` VARCHAR(50) NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB
AUTO_INCREMENT = 3
DEFAULT CHARACTER SET = latin1;


-- -----------------------------------------------------
-- Table `emp_simulada`.`criterios`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `emp_simulada`.`criterios` (
  `id` INT NOT NULL,
  `nombre` VARCHAR(50) NOT NULL,
  `criterio_aspecto_id` INT(11) NOT NULL,
  INDEX `criterios_criterio_aspecto_id_fk` (`id` ASC),
  PRIMARY KEY (`id`, `criterio_aspecto_id`),
  INDEX `fk_criterios_criterio_aspecto_idx` (`criterio_aspecto_id` ASC),
  CONSTRAINT `fk_criterios_criterio_aspecto`
    FOREIGN KEY (`criterio_aspecto_id`)
    REFERENCES `emp_simulada`.`criterio_aspecto` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = latin1;


-- -----------------------------------------------------
-- Table `emp_simulada`.`sede`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `emp_simulada`.`sede` (
  `id` INT NOT NULL,
  `nombre` VARCHAR(45) NOT NULL,
  `direccion` VARCHAR(45) NOT NULL,
  `telefono` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `emp_simulada`.`persona`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `emp_simulada`.`persona` (
  `id` INT NOT NULL,
  `nombre` VARCHAR(45) NOT NULL,
  `correo` VARCHAR(45) NOT NULL,
  `password` VARCHAR(45) NOT NULL,
  `sede_id` INT NOT NULL,
  PRIMARY KEY (`id`, `sede_id`),
  INDEX `fk_persona_sede1_idx` (`sede_id` ASC),
  CONSTRAINT `fk_persona_sede1`
    FOREIGN KEY (`sede_id`)
    REFERENCES `emp_simulada`.`sede` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `emp_simulada`.`asignatura`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `emp_simulada`.`asignatura` (
  `id` INT NOT NULL,
  `nombre` VARCHAR(45) NOT NULL,
  `seccion` INT NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `emp_simulada`.`seccion`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `emp_simulada`.`seccion` (
  `id` INT NOT NULL,
  `year` INT NOT NULL,
  `semestre` INT NOT NULL,
  `num` INT NOT NULL,
  `asignatura_id` INT NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_seccion_asignatura1_idx` (`asignatura_id` ASC),
  CONSTRAINT `fk_seccion_asignatura1`
    FOREIGN KEY (`asignatura_id`)
    REFERENCES `emp_simulada`.`asignatura` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `emp_simulada`.`carrera`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `emp_simulada`.`carrera` (
  `id` INT NOT NULL,
  `nombre` VARCHAR(45) NOT NULL,
  `seccion_id` INT NOT NULL,
  PRIMARY KEY (`id`, `seccion_id`),
  INDEX `fk_carrera_seccion1_idx` (`seccion_id` ASC),
  CONSTRAINT `fk_carrera_seccion1`
    FOREIGN KEY (`seccion_id`)
    REFERENCES `emp_simulada`.`seccion` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `emp_simulada`.`alumno`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `emp_simulada`.`alumno` (
  `matricula` INT NOT NULL,
  `carrera_id` INT NOT NULL,
  `persona_id` INT NOT NULL,
  PRIMARY KEY (`carrera_id`, `persona_id`),
  INDEX `fk_alumno_carrera1_idx` (`carrera_id` ASC),
  INDEX `fk_alumno_persona1_idx` (`persona_id` ASC),
  CONSTRAINT `fk_alumno_carrera1`
    FOREIGN KEY (`carrera_id`)
    REFERENCES `emp_simulada`.`carrera` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_alumno_persona1`
    FOREIGN KEY (`persona_id`)
    REFERENCES `emp_simulada`.`persona` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `emp_simulada`.`docente`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `emp_simulada`.`docente` (
  `id` INT NOT NULL,
  `persona_id` INT NOT NULL,
  PRIMARY KEY (`id`, `persona_id`),
  INDEX `fk_docente_persona1_idx` (`persona_id` ASC),
  CONSTRAINT `fk_docente_persona1`
    FOREIGN KEY (`persona_id`)
    REFERENCES `emp_simulada`.`persona` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `emp_simulada`.`evaluacion`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `emp_simulada`.`evaluacion` (
  `id` INT NOT NULL,
  `alumno_matricula` INT NOT NULL,
  `fecha` DATE NOT NULL,
  `rotacion` INT NOT NULL,
  `seccion_id` INT NOT NULL,
  PRIMARY KEY (`id`, `alumno_matricula`, `seccion_id`),
  INDEX `fk_evaluacion_alumno1_idx` (`alumno_matricula` ASC),
  INDEX `fk_evaluacion_seccion1_idx` (`seccion_id` ASC),
  CONSTRAINT `fk_evaluacion_alumno1`
    FOREIGN KEY (`alumno_matricula`)
    REFERENCES `emp_simulada`.`alumno` (`matricula`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_evaluacion_seccion1`
    FOREIGN KEY (`seccion_id`)
    REFERENCES `emp_simulada`.`seccion` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `emp_simulada`.`modulo`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `emp_simulada`.`modulo` (
  `id` INT NOT NULL,
  `nombre` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `emp_simulada`.`criterios_has_modulo`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `emp_simulada`.`criterios_has_modulo` (
  `id` INT NOT NULL,
  `ponderacion` INT NULL,
  `criterios_id` INT NOT NULL,
  `modulo_id` INT NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_criterios_has_modulo_criterios2_idx` (`criterios_id` ASC),
  INDEX `fk_criterios_has_modulo_modulo2_idx` (`modulo_id` ASC),
  CONSTRAINT `fk_criterios_has_modulo_criterios2`
    FOREIGN KEY (`criterios_id`)
    REFERENCES `emp_simulada`.`criterios` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_criterios_has_modulo_modulo2`
    FOREIGN KEY (`modulo_id`)
    REFERENCES `emp_simulada`.`modulo` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = latin1;


-- -----------------------------------------------------
-- Table `emp_simulada`.`detalle`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `emp_simulada`.`detalle` (
  `id` INT NOT NULL,
  `nota` FLOAT NULL,
  `evaluacion_id` INT NOT NULL,
  `evaluacion_criterios_id` INT NOT NULL,
  `evaluacion_alumno_matricula` INT NOT NULL,
  `evaluacion_seccion_id` INT NOT NULL,
  `criterios_has_modulo_id` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`id`, `evaluacion_id`, `evaluacion_criterios_id`, `evaluacion_alumno_matricula`, `evaluacion_seccion_id`, `criterios_has_modulo_id`),
  INDEX `fk_detalle_evaluacion1_idx` (`evaluacion_id` ASC, `evaluacion_criterios_id` ASC, `evaluacion_alumno_matricula` ASC, `evaluacion_seccion_id` ASC),
  INDEX `fk_detalle_criterios_has_modulo1_idx` (`criterios_has_modulo_id` ASC),
  CONSTRAINT `fk_detalle_evaluacion1`
    FOREIGN KEY (`evaluacion_id` , `evaluacion_alumno_matricula` , `evaluacion_seccion_id`)
    REFERENCES `emp_simulada`.`evaluacion` (`id` , `alumno_matricula` , `seccion_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_detalle_criterios_has_modulo1`
    FOREIGN KEY (`criterios_has_modulo_id`)
    REFERENCES `emp_simulada`.`criterios_has_modulo` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
