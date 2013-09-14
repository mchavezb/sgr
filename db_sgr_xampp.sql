SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

CREATE SCHEMA IF NOT EXISTS `db_sgr_xampp` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci ;
USE `db_sgr_xampp` ;

-- -----------------------------------------------------
-- Table `db_sgr_xampp`.`Perfil`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `db_sgr_xampp`.`Perfil` ;

CREATE TABLE IF NOT EXISTS `db_sgr_xampp`.`Perfil` (
  `idPerfil` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `nombre` VARCHAR(45) NULL,
  PRIMARY KEY (`idPerfil`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `db_sgr_xampp`.`Usuario`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `db_sgr_xampp`.`Usuario` ;

CREATE TABLE IF NOT EXISTS `db_sgr_xampp`.`Usuario` (
  `idUsuario` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `usuario` VARCHAR(45) NULL,
  `password` VARCHAR(45) NULL,
  `Perfil_idPerfil` INT UNSIGNED NOT NULL,
  PRIMARY KEY (`idUsuario`),
  INDEX `fk_Usuario_Perfil_idx` (`Perfil_idPerfil` ASC),
  CONSTRAINT `fk_Usuario_Perfil`
    FOREIGN KEY (`Perfil_idPerfil`)
    REFERENCES `db_sgr_xampp`.`Perfil` (`idPerfil`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `db_sgr_xampp`.`Mesa`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `db_sgr_xampp`.`Mesa` ;

CREATE TABLE IF NOT EXISTS `db_sgr_xampp`.`Mesa` (
  `idMesa` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `mesa_num` SMALLINT UNSIGNED NULL,
  `mesa_estado` VARCHAR(45) NULL,
  `capacidad` SMALLINT UNSIGNED NULL,
  PRIMARY KEY (`idMesa`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `db_sgr_xampp`.`Producto`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `db_sgr_xampp`.`Producto` ;

CREATE TABLE IF NOT EXISTS `db_sgr_xampp`.`Producto` (
  `idProducto` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `p_nombre` VARCHAR(45) NULL,
  `p_estado` VARCHAR(45) NULL,
  `p_tiempoestimado` VARCHAR(45) NULL,
  `p_costo` VARCHAR(45) NULL,
  PRIMARY KEY (`idProducto`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `db_sgr_xampp`.`Comprobante`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `db_sgr_xampp`.`Comprobante` ;

CREATE TABLE IF NOT EXISTS `db_sgr_xampp`.`Comprobante` (
  `idComprobante` INT NOT NULL,
  PRIMARY KEY (`idComprobante`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `db_sgr_xampp`.`TipoComanda`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `db_sgr_xampp`.`TipoComanda` ;

CREATE TABLE IF NOT EXISTS `db_sgr_xampp`.`TipoComanda` (
  `idTipoComanda` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `descripcion` VARCHAR(45) NULL,
  PRIMARY KEY (`idTipoComanda`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `db_sgr_xampp`.`Comanda`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `db_sgr_xampp`.`Comanda` ;

CREATE TABLE IF NOT EXISTS `db_sgr_xampp`.`Comanda` (
  `idComanda` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `fecha` TIMESTAMP NULL,
  `Comprobante_idComprobante` INT UNSIGNED NOT NULL,
  `TipoComanda_idTipoComanda` INT UNSIGNED NOT NULL,
  `Usuario_idUsuario` INT UNSIGNED NOT NULL,
  `Mesa_idMesa` INT UNSIGNED NULL,
  PRIMARY KEY (`idComanda`),
  INDEX `fk_Comanda_Comprobante1_idx` (`Comprobante_idComprobante` ASC),
  INDEX `fk_Comanda_TipoComanda1_idx` (`TipoComanda_idTipoComanda` ASC),
  INDEX `fk_Comanda_Usuario1_idx` (`Usuario_idUsuario` ASC),
  INDEX `fk_Comanda_Mesa1_idx` (`Mesa_idMesa` ASC),
  CONSTRAINT `fk_Comanda_Comprobante1`
    FOREIGN KEY (`Comprobante_idComprobante`)
    REFERENCES `db_sgr_xampp`.`Comprobante` (`idComprobante`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Comanda_TipoComanda1`
    FOREIGN KEY (`TipoComanda_idTipoComanda`)
    REFERENCES `db_sgr_xampp`.`TipoComanda` (`idTipoComanda`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Comanda_Usuario1`
    FOREIGN KEY (`Usuario_idUsuario`)
    REFERENCES `db_sgr_xampp`.`Usuario` (`idUsuario`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Comanda_Mesa1`
    FOREIGN KEY (`Mesa_idMesa`)
    REFERENCES `db_sgr_xampp`.`Mesa` (`idMesa`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `db_sgr_xampp`.`Factura`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `db_sgr_xampp`.`Factura` ;

CREATE TABLE IF NOT EXISTS `db_sgr_xampp`.`Factura` (
  `idFactura` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `ruc` INT NULL,
  `razon_social` VARCHAR(45) NULL,
  `monto_total` DOUBLE NULL,
  PRIMARY KEY (`idFactura`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `db_sgr_xampp`.`Boleta`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `db_sgr_xampp`.`Boleta` ;

CREATE TABLE IF NOT EXISTS `db_sgr_xampp`.`Boleta` (
  `idBoleta` INT NOT NULL,
  `monto_total` DOUBLE NULL,
  PRIMARY KEY (`idBoleta`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `db_sgr_xampp`.`Comprobante`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `db_sgr_xampp`.`Comprobante` ;

CREATE TABLE IF NOT EXISTS `db_sgr_xampp`.`Comprobante` (
  `idComprobante` INT NOT NULL,
  PRIMARY KEY (`idComprobante`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `db_sgr_xampp`.`Caja`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `db_sgr_xampp`.`Caja` ;

CREATE TABLE IF NOT EXISTS `db_sgr_xampp`.`Caja` (
  `idCaja` INT NOT NULL,
  `caja_numero` VARCHAR(45) NULL,
  `Usuario_idUsuario` INT UNSIGNED NOT NULL,
  PRIMARY KEY (`idCaja`),
  INDEX `fk_Caja_Usuario1_idx` (`Usuario_idUsuario` ASC),
  CONSTRAINT `fk_Caja_Usuario1`
    FOREIGN KEY (`Usuario_idUsuario`)
    REFERENCES `db_sgr_xampp`.`Usuario` (`idUsuario`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `db_sgr_xampp`.`DetalleComanda`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `db_sgr_xampp`.`DetalleComanda` ;

CREATE TABLE IF NOT EXISTS `db_sgr_xampp`.`DetalleComanda` (
)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `db_sgr_xampp`.`ComandaxPedido`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `db_sgr_xampp`.`ComandaxPedido` ;

CREATE TABLE IF NOT EXISTS `db_sgr_xampp`.`ComandaxPedido` (
  `Comanda_idComanda` INT UNSIGNED NOT NULL,
  `Producto_idProducto` INT UNSIGNED NOT NULL,
  `cantidad` INT NULL,
  `estado` VARCHAR(45) NULL,
  PRIMARY KEY (`Comanda_idComanda`, `Producto_idProducto`),
  INDEX `fk_Comanda_has_Producto_Producto1_idx` (`Producto_idProducto` ASC),
  INDEX `fk_Comanda_has_Producto_Comanda1_idx` (`Comanda_idComanda` ASC),
  CONSTRAINT `fk_Comanda_has_Producto_Comanda1`
    FOREIGN KEY (`Comanda_idComanda`)
    REFERENCES `db_sgr_xampp`.`Comanda` (`idComanda`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Comanda_has_Producto_Producto1`
    FOREIGN KEY (`Producto_idProducto`)
    REFERENCES `db_sgr_xampp`.`Producto` (`idProducto`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `db_sgr_xampp`.`EstadoP`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `db_sgr_xampp`.`EstadoP` ;

CREATE TABLE IF NOT EXISTS `db_sgr_xampp`.`EstadoP` (
)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `db_sgr_xampp`.`TipoPago`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `db_sgr_xampp`.`TipoPago` ;

CREATE TABLE IF NOT EXISTS `db_sgr_xampp`.`TipoPago` (
  `idTipoPago` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `descripcion` VARCHAR(45) NULL,
  PRIMARY KEY (`idTipoPago`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `db_sgr_xampp`.`MedioPago`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `db_sgr_xampp`.`MedioPago` ;

CREATE TABLE IF NOT EXISTS `db_sgr_xampp`.`MedioPago` (
  `idMedioPago` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `descripccion` VARCHAR(45) NULL,
  PRIMARY KEY (`idMedioPago`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `db_sgr_xampp`.`Pago`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `db_sgr_xampp`.`Pago` ;

CREATE TABLE IF NOT EXISTS `db_sgr_xampp`.`Pago` (
  `idPago` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `total` DOUBLE NOT NULL,
  `ruc` VARCHAR(45) NULL,
  `razon_social` VARCHAR(45) NULL,
  `Comanda_idComanda` INT UNSIGNED NOT NULL,
  `TipoPago_idTipoPago` INT UNSIGNED NOT NULL,
  `MedioPago_idMedioPago` INT UNSIGNED NOT NULL,
  PRIMARY KEY (`idPago`),
  INDEX `fk_Pago_Comanda1_idx` (`Comanda_idComanda` ASC),
  INDEX `fk_Pago_TipoPago1_idx` (`TipoPago_idTipoPago` ASC),
  INDEX `fk_Pago_MedioPago1_idx` (`MedioPago_idMedioPago` ASC),
  CONSTRAINT `fk_Pago_Comanda1`
    FOREIGN KEY (`Comanda_idComanda`)
    REFERENCES `db_sgr_xampp`.`Comanda` (`idComanda`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Pago_TipoPago1`
    FOREIGN KEY (`TipoPago_idTipoPago`)
    REFERENCES `db_sgr_xampp`.`TipoPago` (`idTipoPago`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Pago_MedioPago1`
    FOREIGN KEY (`MedioPago_idMedioPago`)
    REFERENCES `db_sgr_xampp`.`MedioPago` (`idMedioPago`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `db_sgr_xampp`.`Reserva`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `db_sgr_xampp`.`Reserva` ;

CREATE TABLE IF NOT EXISTS `db_sgr_xampp`.`Reserva` (
  `idReserva` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `fecha` TIMESTAMP NULL,
  `numero_personas` INT NULL,
  `Mesa_idMesa` INT UNSIGNED NOT NULL,
  `Usuario_idUsuario` INT UNSIGNED NOT NULL,
  PRIMARY KEY (`idReserva`),
  INDEX `fk_Reserva_Mesa1_idx` (`Mesa_idMesa` ASC),
  INDEX `fk_Reserva_Usuario1_idx` (`Usuario_idUsuario` ASC),
  CONSTRAINT `fk_Reserva_Mesa1`
    FOREIGN KEY (`Mesa_idMesa`)
    REFERENCES `db_sgr_xampp`.`Mesa` (`idMesa`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Reserva_Usuario1`
    FOREIGN KEY (`Usuario_idUsuario`)
    REFERENCES `db_sgr_xampp`.`Usuario` (`idUsuario`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `db_sgr_xampp`.`AperturaCaja`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `db_sgr_xampp`.`AperturaCaja` ;

CREATE TABLE IF NOT EXISTS `db_sgr_xampp`.`AperturaCaja` (
  `idCaja` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `total_soles` DOUBLE NULL,
  `total_dolares` DOUBLE NULL,
  `fechaInicio` TIMESTAMP NULL,
  `Usuario_idUsuario` INT UNSIGNED NOT NULL,
  PRIMARY KEY (`idCaja`),
  INDEX `fk_AperturaCaja_Usuario1_idx` (`Usuario_idUsuario` ASC),
  CONSTRAINT `fk_AperturaCaja_Usuario1`
    FOREIGN KEY (`Usuario_idUsuario`)
    REFERENCES `db_sgr_xampp`.`Usuario` (`idUsuario`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `db_sgr_xampp`.`table1`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `db_sgr_xampp`.`table1` ;

CREATE TABLE IF NOT EXISTS `db_sgr_xampp`.`table1` (
)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `db_sgr_xampp`.`CierreCaja`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `db_sgr_xampp`.`CierreCaja` ;

CREATE TABLE IF NOT EXISTS `db_sgr_xampp`.`CierreCaja` (
  `idCierreCaja` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `total_soles` VARCHAR(45) NULL,
  `total_dolares` VARCHAR(45) NULL,
  `fechaFin` TIMESTAMP NULL,
  `Usuario_idUsuario` INT UNSIGNED NOT NULL,
  PRIMARY KEY (`idCierreCaja`),
  INDEX `fk_CierreCaja_Usuario1_idx` (`Usuario_idUsuario` ASC),
  CONSTRAINT `fk_CierreCaja_Usuario1`
    FOREIGN KEY (`Usuario_idUsuario`)
    REFERENCES `db_sgr_xampp`.`Usuario` (`idUsuario`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;