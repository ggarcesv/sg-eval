-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';


CREATE SCHEMA IF NOT EXISTS `emp_simulada` DEFAULT CHARACTER SET latin1 ;
USE `emp_simulada` ;

-- -----------------------------------------------------
-- Table `emp_simulada`.`aspecto`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `emp_simulada`.`aspecto` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `nombre` VARCHAR(50) NOT NULL,
  `ponderacion` INT NOT NULL,
  `created_at` DATETIME NULL,
  `update_at` DATETIME NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB
AUTO_INCREMENT = 3
DEFAULT CHARACTER SET = latin1;


-- -----------------------------------------------------
-- Table `emp_simulada`.`criterio`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `emp_simulada`.`criterio` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `nombre` VARCHAR(50) NOT NULL,
  `aspecto_id` INT(11) NOT NULL,
  `created_at` DATETIME NULL,
  `update_at` DATETIME NULL,
  INDEX `criterios_criterio_aspecto_id_fk` (`id` ASC),
  PRIMARY KEY (`id`),
  INDEX `fk_criterios_criterio_aspecto_idx` (`aspecto_id` ASC),
  CONSTRAINT `fk_criterios_criterio_aspecto`
    FOREIGN KEY (`aspecto_id`)
    REFERENCES `emp_simulada`.`aspecto` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = latin1;


-- -----------------------------------------------------
-- Table `emp_simulada`.`carrera`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `emp_simulada`.`carrera` (
  `id` INT NOT NULL,
  `nombre` VARCHAR(45) NOT NULL,
  `created_at` DATETIME NULL,
  `update_at` DATETIME NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `emp_simulada`.`sede`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `emp_simulada`.`sede` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `nombre` VARCHAR(45) NOT NULL,
  `direccion` VARCHAR(45) NOT NULL,
  `telefono` VARCHAR(45) NOT NULL,
  `created_at` DATETIME NULL,
  `update_at` DATETIME NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `emp_simulada`.`alumno`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `emp_simulada`.`alumno` (
  `id` INT NOT NULL,
  `carrera_id` INT NOT NULL,
  `sede_id` INT NOT NULL,
  `nombre` VARCHAR(45) NOT NULL,
  `correo` VARCHAR(45) NOT NULL,
  `password` VARCHAR(255) NULL,
  `created_at` DATETIME NULL,
  `update_at` DATETIME NULL,
  INDEX `fk_alumno_carrera1_idx` (`carrera_id` ASC),
  PRIMARY KEY (`id`),
  INDEX `fk_alumno_sede1_idx` (`sede_id` ASC),
  CONSTRAINT `fk_alumno_carrera1`
    FOREIGN KEY (`carrera_id`)
    REFERENCES `emp_simulada`.`carrera` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_alumno_sede1`
    FOREIGN KEY (`sede_id`)
    REFERENCES `emp_simulada`.`sede` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `emp_simulada`.`docente`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `emp_simulada`.`docente` (
  `rut` VARCHAR(8) NOT NULL,
  `nombre` VARCHAR(45) NOT NULL,
  `correo` VARCHAR(45) NOT NULL,
  `password` VARCHAR(255) NOT NULL,
  `sede_id` INT NOT NULL,
  `created_at` DATETIME NULL,
  `update_at` DATETIME NULL,
  INDEX `fk_docente_sede1_idx` (`sede_id` ASC),
  PRIMARY KEY (`rut`),
  CONSTRAINT `fk_docente_sede1`
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
  `created_at` DATETIME NULL,
  `update_at` DATETIME NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `emp_simulada`.`asignatura_seccion`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `emp_simulada`.`asignatura_seccion` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `year` INT NOT NULL,
  `semestre` INT NOT NULL,
  `num_seccion` INT NOT NULL,
  `asignatura_id` INT NOT NULL,
  `carrera_id` INT NOT NULL,
  `docente_rut` VARCHAR(8) NOT NULL,
  `created_at` DATETIME NULL,
  `update_at` DATETIME NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_seccion_asignatura1_idx` (`asignatura_id` ASC),
  INDEX `fk_asignatura_seccion_carrera1_idx` (`carrera_id` ASC),
  INDEX `fk_asignatura_seccion_docente1_idx` (`docente_rut` ASC),
  CONSTRAINT `fk_seccion_asignatura1`
    FOREIGN KEY (`asignatura_id`)
    REFERENCES `emp_simulada`.`asignatura` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_asignatura_seccion_carrera1`
    FOREIGN KEY (`carrera_id`)
    REFERENCES `emp_simulada`.`carrera` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_asignatura_seccion_docente1`
    FOREIGN KEY (`docente_rut`)
    REFERENCES `emp_simulada`.`docente` (`rut`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `emp_simulada`.`rotacion_grupo`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `emp_simulada`.`rotacion_grupo` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `fecha_inicio` DATE NOT NULL,
  `fecha_termino` DATE NULL,
  `rotacion_numero` INT NOT NULL,
  `asignatura_seccion_id` INT NOT NULL,
  `created_at` DATETIME NULL,
  `update_at` DATETIME NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_rotacion_grupo_asignatura_seccion1_idx` (`asignatura_seccion_id` ASC),
  CONSTRAINT `fk_rotacion_grupo_asignatura_seccion1`
    FOREIGN KEY (`asignatura_seccion_id`)
    REFERENCES `emp_simulada`.`asignatura_seccion` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `emp_simulada`.`rotacion_alumno`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `emp_simulada`.`rotacion_alumno` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `alumno_id` INT NOT NULL,
  `fecha` DATE NULL,
  `rotacion_grupo_id` INT NOT NULL,
  `created_at` DATETIME NULL,
  `update_at` DATETIME NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_evaluacion_alumno1_idx` (`alumno_id` ASC),
  INDEX `fk_evaluacion_alumno_seccion_rotacion_grupo1_idx` (`rotacion_grupo_id` ASC),
  CONSTRAINT `fk_evaluacion_alumno1`
    FOREIGN KEY (`alumno_id`)
    REFERENCES `emp_simulada`.`alumno` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_evaluacion_alumno_seccion_rotacion_grupo1`
    FOREIGN KEY (`rotacion_grupo_id`)
    REFERENCES `emp_simulada`.`rotacion_grupo` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `emp_simulada`.`modulo`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `emp_simulada`.`modulo` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `nombre` VARCHAR(45) NOT NULL,
  `created_at` DATETIME NULL,
  `update_at` DATETIME NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `emp_simulada`.`sede_has_carrera`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `emp_simulada`.`sede_has_carrera` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `sede_id` INT NOT NULL,
  `carrera_id` INT NOT NULL,
  `created_at` DATETIME NULL,
  `update_at` DATETIME NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_sede_has_carrera_carrera1_idx` (`carrera_id` ASC),
  INDEX `fk_sede_has_carrera_sede1_idx` (`sede_id` ASC),
  CONSTRAINT `fk_sede_has_carrera_sede1`
    FOREIGN KEY (`sede_id`)
    REFERENCES `emp_simulada`.`sede` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_sede_has_carrera_carrera1`
    FOREIGN KEY (`carrera_id`)
    REFERENCES `emp_simulada`.`carrera` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `emp_simulada`.`rubrica`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `emp_simulada`.`rubrica` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `nombre` VARCHAR(45) NOT NULL,
  `modulo_id` INT NOT NULL,
  `sede_has_carrera_id` INT NOT NULL,
  `created_at` DATETIME NULL,
  `update_at` DATETIME NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_grupo_modulo1_idx` (`modulo_id` ASC),
  INDEX `fk_grupo_sede_has_carrera1_idx` (`sede_has_carrera_id` ASC),
  CONSTRAINT `fk_grupo_modulo1`
    FOREIGN KEY (`modulo_id`)
    REFERENCES `emp_simulada`.`modulo` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_grupo_sede_has_carrera1`
    FOREIGN KEY (`sede_has_carrera_id`)
    REFERENCES `emp_simulada`.`sede_has_carrera` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `emp_simulada`.`estado`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `emp_simulada`.`estado` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `nombre` VARCHAR(45) NOT NULL,
  `created_at` DATETIME NULL,
  `update_at` DATETIME NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `emp_simulada`.`rubrica_detalle`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `emp_simulada`.`rubrica_detalle` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `criterio_id` INT NOT NULL,
  `rubrica_id` INT NOT NULL,
  `estado_id` INT NOT NULL,
  `created_at` DATETIME NULL,
  `update_at` DATETIME NULL,
  INDEX `fk_criterios_has_modulo_criterios2_idx` (`criterio_id` ASC),
  INDEX `fk_grupos_criterios_grupo1_idx` (`rubrica_id` ASC),
  PRIMARY KEY (`id`),
  INDEX `fk_grupos_criterios_estado1_idx` (`estado_id` ASC),
  CONSTRAINT `fk_criterios_has_modulo_criterios2`
    FOREIGN KEY (`criterio_id`)
    REFERENCES `emp_simulada`.`criterio` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_grupos_criterios_grupo1`
    FOREIGN KEY (`rubrica_id`)
    REFERENCES `emp_simulada`.`rubrica` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_grupos_criterios_estado1`
    FOREIGN KEY (`estado_id`)
    REFERENCES `emp_simulada`.`estado` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = latin1;


-- -----------------------------------------------------
-- Table `emp_simulada`.`evaluacion_detalle`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `emp_simulada`.`evaluacion_detalle` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `nota` FLOAT NOT NULL,
  `rotacion_alumno_id` INT NOT NULL,
  `rubrica_detalle_id` INT NOT NULL,
  `created_at` DATETIME NULL,
  `update_at` DATETIME NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_detalle_evaluacion1_idx` (`rotacion_alumno_id` ASC),
  INDEX `fk_evaluacion_alumno_criterio_detalle_grupos_criterios_deta_idx` (`rubrica_detalle_id` ASC),
  CONSTRAINT `fk_detalle_evaluacion1`
    FOREIGN KEY (`rotacion_alumno_id`)
    REFERENCES `emp_simulada`.`rotacion_alumno` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_evaluacion_alumno_criterio_detalle_grupos_criterios_detalle1`
    FOREIGN KEY (`rubrica_detalle_id`)
    REFERENCES `emp_simulada`.`rubrica_detalle` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `emp_simulada`.`bc_alumno`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `emp_simulada`.`bc_alumno` (
  `id` INT NOT NULL,
  `carrera_id` INT NOT NULL,
  `sede_id` INT NOT NULL,
  `nombre` VARCHAR(45) NOT NULL,
  `correo` VARCHAR(45) NOT NULL,
  `password` VARCHAR(255) NULL,
  `created_at` DATETIME NULL,
  `update_at` DATETIME NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `emp_simulada`.`rubrica_autoevaluacion`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `emp_simulada`.`rubrica_autoevaluacion` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `nombre` VARCHAR(45) NULL,
  `created_at` DATETIME NULL,
  `update_at` DATETIME NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `emp_simulada`.`rubrica_autoevaluacion_detalle`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `emp_simulada`.`rubrica_autoevaluacion_detalle` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `estado_id` INT NOT NULL,
  `criterio_id` INT NOT NULL,
  `rubrica_autoevaluacion_id` INT NOT NULL,
  `created_at` DATETIME NULL,
  `update_at` DATETIME NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_rubrica_autoevaluacion_detalle_estado1_idx` (`estado_id` ASC),
  INDEX `fk_rubrica_autoevaluacion_detalle_criterio1_idx` (`criterio_id` ASC),
  INDEX `fk_rubrica_autoevaluacion_detalle_rubrica_autoevaluacion1_idx` (`rubrica_autoevaluacion_id` ASC),
  CONSTRAINT `fk_rubrica_autoevaluacion_detalle_estado1`
    FOREIGN KEY (`estado_id`)
    REFERENCES `emp_simulada`.`estado` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_rubrica_autoevaluacion_detalle_criterio1`
    FOREIGN KEY (`criterio_id`)
    REFERENCES `emp_simulada`.`criterio` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_rubrica_autoevaluacion_detalle_rubrica_autoevaluacion1`
    FOREIGN KEY (`rubrica_autoevaluacion_id`)
    REFERENCES `emp_simulada`.`rubrica_autoevaluacion` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;

-- -----------------------------------------------------
-- Table `emp_simulada`.`autoevaluacion_detalle`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `emp_simulada`.`autoevaluacion_detalle` (
  `alumno_id` INT NOT NULL AUTO_INCREMENT,
  `rubrica_autoevaluacion_detalle_id` INT NOT NULL,
  `created_at` DATETIME NULL,
  `update_at` DATETIME NULL,
  `nota` FLOAT NULL,
  INDEX `fk_autoevaluacion_detalle_rubrica_autoevaluacion_detalle1_idx` (`rubrica_autoevaluacion_detalle_id` ASC),
  INDEX `fk_autoevaluacion_detalle_alumno1_idx` (`alumno_id` ASC),
  CONSTRAINT `fk_autoevaluacion_detalle_rubrica_autoevaluacion_detalle1`
    FOREIGN KEY (`rubrica_autoevaluacion_detalle_id`)
    REFERENCES `emp_simulada`.`rubrica_autoevaluacion_detalle` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_autoevaluacion_detalle_alumno1`
    FOREIGN KEY (`alumno_id`)
    REFERENCES `emp_simulada`.`alumno` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;