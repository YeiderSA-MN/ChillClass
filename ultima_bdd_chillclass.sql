-- MariaDB dump 10.19  Distrib 10.4.28-MariaDB, for Win64 (AMD64)
--
-- Host: localhost    Database: chillclass
-- ------------------------------------------------------
-- Server version	10.4.28-MariaDB

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Current Database: `chillclass`
--

CREATE DATABASE /*!32312 IF NOT EXISTS*/ `chillclass` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci */;

USE `chillclass`;

--
-- Table structure for table `academia`
--

DROP TABLE IF EXISTS `academia`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `academia` (
  `cod_academia` varchar(10) NOT NULL,
  `descripcion` text DEFAULT NULL,
  `fecha_creacion_academia` datetime DEFAULT NULL,
  `id_persona` int(12) DEFAULT NULL,
  PRIMARY KEY (`cod_academia`),
  KEY `id_persona` (`id_persona`),
  CONSTRAINT `academia_ibfk_1` FOREIGN KEY (`id_persona`) REFERENCES `persona` (`id_persona`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `academia`
--

LOCK TABLES `academia` WRITE;
/*!40000 ALTER TABLE `academia` DISABLE KEYS */;
INSERT INTO `academia` VALUES ('01','Desarrollo web','2023-10-17 00:00:00',1018235761),('02','Diseño grafico','2023-10-18 00:00:00',1018235761),('03','Matematicas','2023-05-26 17:45:10',1018235761),('04','Videojuegos','2023-05-31 17:45:30',1018235761),('05','Dibujo','2023-05-23 17:46:48',1018235761),('06','Idiomas','2023-05-09 17:41:41',1018235761),('07','Literatura','2023-10-12 00:00:00',1018235761),('08 ','Fotografía','2023-10-10 00:00:00',1018235761);
/*!40000 ALTER TABLE `academia` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `calificacion_del_curso`
--

DROP TABLE IF EXISTS `calificacion_del_curso`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `calificacion_del_curso` (
  `cod_curso` varchar(10) NOT NULL,
  `fecha_calificacion` datetime NOT NULL,
  `cod_estudiante` int(12) DEFAULT NULL,
  `calificacion` int(2) DEFAULT NULL,
  PRIMARY KEY (`cod_curso`,`fecha_calificacion`),
  KEY `cod_estudiante` (`cod_estudiante`),
  CONSTRAINT `calificacion_del_curso_ibfk_1` FOREIGN KEY (`cod_estudiante`) REFERENCES `persona` (`id_persona`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `calificacion_del_curso`
--

LOCK TABLES `calificacion_del_curso` WRITE;
/*!40000 ALTER TABLE `calificacion_del_curso` DISABLE KEYS */;
INSERT INTO `calificacion_del_curso` VALUES ('01','2023-05-29 00:00:00',1018235761,4);
/*!40000 ALTER TABLE `calificacion_del_curso` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `certificado`
--

DROP TABLE IF EXISTS `certificado`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `certificado` (
  `cod_certificado` varchar(10) NOT NULL,
  `cod_estudiante` int(12) DEFAULT NULL,
  `cod_curso` varchar(10) DEFAULT NULL,
  `fecha_inicio_curso` datetime DEFAULT NULL,
  `fecha_fin_curso` datetime DEFAULT NULL,
  PRIMARY KEY (`cod_certificado`),
  KEY `cod_estudiante` (`cod_estudiante`),
  KEY `cod_curso` (`cod_curso`),
  CONSTRAINT `certificado_ibfk_1` FOREIGN KEY (`cod_estudiante`) REFERENCES `persona` (`id_persona`),
  CONSTRAINT `certificado_ibfk_2` FOREIGN KEY (`cod_curso`) REFERENCES `curso` (`cod_curso`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `certificado`
--

LOCK TABLES `certificado` WRITE;
/*!40000 ALTER TABLE `certificado` DISABLE KEYS */;
/*!40000 ALTER TABLE `certificado` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `curso`
--

DROP TABLE IF EXISTS `curso`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `curso` (
  `cod_curso` varchar(10) NOT NULL,
  `descripcion` varchar(50) NOT NULL,
  `cod_academia` varchar(10) DEFAULT NULL,
  `fecha_creacion` datetime DEFAULT NULL,
  `duracion_curso` int(3) DEFAULT NULL,
  `cod_tematica` varchar(10) DEFAULT NULL,
  `cod_estado` varchar(10) DEFAULT NULL,
  `video` varchar(200) NOT NULL,
  PRIMARY KEY (`cod_curso`),
  KEY `cod_academia` (`cod_academia`),
  KEY `cod_tematica` (`cod_tematica`),
  KEY `cod_estado` (`cod_estado`),
  CONSTRAINT `curso_ibfk_1` FOREIGN KEY (`cod_academia`) REFERENCES `academia` (`cod_academia`),
  CONSTRAINT `curso_ibfk_2` FOREIGN KEY (`cod_tematica`) REFERENCES `tematica` (`cod_tematica`),
  CONSTRAINT `curso_ibfk_3` FOREIGN KEY (`cod_estado`) REFERENCES `estado` (`cod_estado`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `curso`
--

LOCK TABLES `curso` WRITE;
/*!40000 ALTER TABLE `curso` DISABLE KEYS */;
INSERT INTO `curso` VALUES ('01','Ingles b1','06','2023-07-16 20:55:39',50,'11','01','http://localhost/videos/inglesb1.webm'),('02','Unity basico','04','2023-05-25 17:51:18',50,'07','02','http://localhost/videos/unity_basico.webm'),('03','Frances basico','06','2023-10-11 00:00:00',50,'12','01','http://localhost/videos/frances_basico.mp4'),('04','Ingles c1','06','2023-10-12 00:00:00',50,'11','01','http://localhost/videos/inglesc1.mp4'),('05','Calculo diferencial','03','2023-10-17 00:00:00',40,'05','01','http://localhost/videos/calculo_diferencial.mp4'),('06','Angular avanzado','01','2023-10-24 00:00:00',60,'04','01','http://localhost/videos/angular_avanzado.mp4'),('07','Realismo en carboncillo','05','2023-10-12 00:00:00',30,'09','03','http://localhost/videos/realismo_carboncillo.mp4'),('08','Iustracion en Photoshop','02','2023-10-18 00:00:00',70,'02','01','http://localhost/videos/marco_eliptico.mp4		'),('09','Python avanzado','01','2023-10-12 00:00:00',40,'03','01','http://localhost/videos/python_avanzado.mp4'),('10','Calculo integral','03','2023-10-11 00:00:00',30,'05','01','http://localhost/videos/calculo_integral.mp4');
/*!40000 ALTER TABLE `curso` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `estado`
--

DROP TABLE IF EXISTS `estado`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `estado` (
  `cod_estado` varchar(10) NOT NULL,
  `descripcion` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`cod_estado`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `estado`
--

LOCK TABLES `estado` WRITE;
/*!40000 ALTER TABLE `estado` DISABLE KEYS */;
INSERT INTO `estado` VALUES ('01','Abierto'),('02','Cerrado'),('03','En proceso');
/*!40000 ALTER TABLE `estado` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `genero`
--

DROP TABLE IF EXISTS `genero`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `genero` (
  `cod_genero` varchar(10) NOT NULL,
  `descripcion` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`cod_genero`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `genero`
--

LOCK TABLES `genero` WRITE;
/*!40000 ALTER TABLE `genero` DISABLE KEYS */;
INSERT INTO `genero` VALUES ('01','Masculino'),('02','Femenino'),('03','Otro');
/*!40000 ALTER TABLE `genero` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `persona`
--

DROP TABLE IF EXISTS `persona`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `persona` (
  `id_persona` int(12) NOT NULL,
  `nombre` varchar(50) DEFAULT NULL,
  `apellido` varchar(50) DEFAULT NULL,
  `edad` int(3) DEFAULT NULL,
  `cod_genero` varchar(10) DEFAULT NULL,
  `contrasena` varchar(20) DEFAULT NULL,
  `tipo_persona` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`id_persona`),
  KEY `tipo_persona` (`tipo_persona`),
  KEY `cod_genero` (`cod_genero`),
  CONSTRAINT `persona_ibfk_1` FOREIGN KEY (`tipo_persona`) REFERENCES `tipo_persona` (`tipo_persona`),
  CONSTRAINT `persona_ibfk_2` FOREIGN KEY (`tipo_persona`) REFERENCES `tipo_persona` (`tipo_persona`),
  CONSTRAINT `persona_ibfk_3` FOREIGN KEY (`cod_genero`) REFERENCES `genero` (`cod_genero`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `persona`
--

LOCK TABLES `persona` WRITE;
/*!40000 ALTER TABLE `persona` DISABLE KEYS */;
INSERT INTO `persona` VALUES (1223,'Pablo','Mejia',16,'01','Diaz','03'),(1018235761,'Juan Jose','Diaz Rodriguez',16,'01','Lentes11','01'),(1020109841,'Miguel','Moreno Rojas',17,'01','miguelmoreno0','03'),(1021805422,'Hader','Renteria',16,'03','awoo','02');
/*!40000 ALTER TABLE `persona` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `persona_curso`
--

DROP TABLE IF EXISTS `persona_curso`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `persona_curso` (
  `cod_curso` varchar(10) NOT NULL,
  `id_persona` int(12) NOT NULL,
  `fecha_registro` date NOT NULL,
  PRIMARY KEY (`cod_curso`,`id_persona`),
  KEY `id_persona` (`id_persona`),
  CONSTRAINT `persona_curso_ibfk_1` FOREIGN KEY (`cod_curso`) REFERENCES `curso` (`cod_curso`),
  CONSTRAINT `persona_curso_ibfk_2` FOREIGN KEY (`id_persona`) REFERENCES `persona` (`id_persona`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `persona_curso`
--

LOCK TABLES `persona_curso` WRITE;
/*!40000 ALTER TABLE `persona_curso` DISABLE KEYS */;
INSERT INTO `persona_curso` VALUES ('01',1018235761,'2023-09-05'),('02',1223,'2023-10-12'),('02',1018235761,'2023-10-15'),('03',1223,'2023-10-13'),('04',1223,'2023-10-13');
/*!40000 ALTER TABLE `persona_curso` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `quiz`
--

DROP TABLE IF EXISTS `quiz`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `quiz` (
  `cod_quiz` varchar(10) NOT NULL,
  `titulo` varchar(100) NOT NULL,
  `cod_pregunta` varchar(10) NOT NULL,
  `pregunta` varchar(100) DEFAULT NULL,
  `A` text DEFAULT NULL,
  `B` text DEFAULT NULL,
  `C` text DEFAULT NULL,
  `respuesta_correcta` text DEFAULT NULL,
  `cod_curso` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`cod_quiz`,`cod_pregunta`),
  KEY `cod_curso` (`cod_curso`),
  CONSTRAINT `quiz_ibfk_1` FOREIGN KEY (`cod_curso`) REFERENCES `curso` (`cod_curso`),
  CONSTRAINT `quiz_ibfk_2` FOREIGN KEY (`cod_quiz`) REFERENCES `quiz_general` (`cod_quiz`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `quiz`
--

LOCK TABLES `quiz` WRITE;
/*!40000 ALTER TABLE `quiz` DISABLE KEYS */;
INSERT INTO `quiz` VALUES ('01','Quiz Unity','01','¿Qué es Unity y para qué se utiliza?','Unity es una plataforma de streaming de música en línea.','Unity es un tipo de arte marcial japonés.','Unity es un motor de videojuegos ampliamente utilizado para crear videojuegos 2D y 3D.','C','02'),('01','Quiz Unity','02','¿Cuál es el lenguaje de programación principal utilizado en Unity?','El lenguaje de programación principal utilizado en Unity es C#.','El lenguaje de programación principal utilizado en Unity es Java.','El lenguaje de programación principal utilizado en Unity es HTML.','A','02'),('01','Quiz Unity','03','¿Qué es el Asset Store en Unity y cuál es su propósito?','El Asset Store en Unity es una tienda de ropa en línea donde puedes comprar ropa virtual para los personajes de tus juegos.','El Asset Store en Unity es una plataforma para comprar y vender activos gráficos, scripts y recursos para juegos y aplicaciones.','El Asset Store en Unity es una herramienta para buscar recetas de cocina y aprender a cocinar en tiempo real mientras desarrollas juegos.','B','02'),('01','Quiz Unity','04','¿Cómo se llama el editor visual que se utiliza para crear y manipular objetos en Unity?','El editor visual que se utiliza para crear y manipular objetos en Unity se llama \"Unity Editor\".','El editor visual que se utiliza para crear y manipular objetos en Unity se llama \"VisualCraft\".','El editor visual que se utiliza para crear y manipular objetos en Unity se llama \"ObjectMaker\".','A','02'),('01','Quiz Unity','05','¿Cuál es la función principal del motor de físicas en Unity?','La función principal del motor de físicas en Unity es gestionar la inteligencia artificial de los personajes.','La función principal del motor de físicas en Unity es crear música y efectos de sonido.','La función principal del motor de físicas en Unity es generar gráficos en 3D.','C','02'),('01','Quiz Unity','06','¿Qué tipos de plataformas son compatibles con Unity para desplegar juegos y aplicaciones?','Unity es compatible solo con sistemas operativos Windows.','Unity es compatible con sistemas operativos Mac OS, pero no con Windows.','Unity es compatible con una amplia variedad de plataformas, incluyendo Windows, macOS, Android, iOS, PlayStation, Xbox y muchas más.','C','02'),('01','Quiz Unity','07','¿Qué componente de Unity se utiliza para controlar el movimiento de los objetos en el juego?','RigidBody','Transform','Collider','A','02'),('01','Quiz Unity','08','¿Cuál de las siguientes no es una característica de la programación en Unity?','Herencia múltiple','Componentes y GameObjects','Eventos y delegados','A','02'),('01','Quiz Unity','09','¿Cuál es el formato de archivo comúnmente utilizado para importar modelos 3D en Unity?','.png','.fbx','.wav','B','02'),('01','Quiz Unity','10','¿Cuál es la función del componente \"Animator\" en Unity?\r\n','Controlar el audio en el juego','Animar los objetos en el juego','Gestionar la iluminación','B','02'),('02','Quiz Ingles B1','01','¿Cuál es la forma correcta del verbo en presente simple en la tercera persona singular (he, she, it)','Play','Plays','Playing','B','01'),('02','Quiz Ingles B1','02','¿Cuál es la forma negativa de la siguiente oración? \"She can play the piano.\"','She can\'t play the piano.','She can play the piano.','She couldn\'t play the piano.','A','01'),('02','Quiz Ingles B1','03','¿Cuál de las siguientes palabras es un sinónimo de \"happy\"?','Sad','Joyful','Angry','B','01'),('02','Quiz Ingles B1','04','Elige la opción con la forma gramaticalmente correcta: \"He ___ (not study) for the exam yesterday.\"','not study','didn\'t studying','didn\'t study','C','01'),('02','Quiz Ingles B1','05','¿Cuál es el comparativo de \"good\"?','More good','Better','Best','B','01'),('02','Quiz Ingles B1','06','¿Cuál es el opuesto de la palabra \"careful\"?','Carefree','Careless','Caring','B','01'),('02','Quiz Ingles B1','07','¿Cuál de las siguientes frases es una pregunta en el tiempo presente continuo?','They are playing soccer.','They play soccer.','They played soccer.','A','01'),('02','Quiz Ingles B1','08','¿Cuál es el pronombre posesivo correcto para \"John and Mary\"? \"This is ___ book.\"','His','Their','Her','B','01'),('02','Quiz Ingles B1','09','¿Cuál es el plural de \"child\"?','Childs','Childrens','Children','C','01'),('02','Quiz Ingles B1','10','Completa la siguiente frase con la palabra correcta: \"I ___ my keys at home this morning.\"','Left','Leave','Leaving','A','01'),('03','Quiz Frances Basico','01','¿Cuál es la palabra en francés para \"hola\"?','Bonjour','Bonsoir','Au revoir','A','03'),('03','Quiz Frances Basico','02','¿Qué significa \"merci\" en francés?','Hola','Gracias','Adios','B','03'),('03','Quiz Frances Basico','03','¿Cómo se dice \"sí\" en francés?','Oui','Non','Bonjour','A','03'),('03','Quiz Frances Basico','04','¿Cuál es la traducción de \"amigo\" en francés?','Amour','Ami','Mère','B','03'),('03','Quiz Frances Basico','05','Completa la frase: \"Je ____ un étudiant.\" (Soy un estudiante)','suis','être','êtes','A','03'),('03','Quiz Frances Basico','06','¿Cómo se dice \"rojo\" en francés?','Bleu','Vert','Rouge','C','03'),('03','Quiz Frances Basico','07','¿Cuál es la palabra francesa para \"casa\"?','Voiture','Maison','Jardin','B','03'),('03','Quiz Frances Basico','08','¿Qué significa \"pain\" en francés?','Agua','Pan','Leche','B','03'),('03','Quiz Frances Basico','09','¿Cuál es el número \"cinco\" en francés?','Trois','Cinq','Sept','B','03'),('03','Quiz Frances Basico','10','Traduce la frase: \"El gato duerme\". (The cat sleeps)','Le chat mange','Le chien dort','Le chat dort','C','03'),('04','Quiz Ingles C1','01','¿Cuál de las siguientes oraciones utiliza correctamente el condicional de tipo 2?','If I will go to the store, I will buy some groceries.','If I go to the store, I would buy some groceries.','If I went to the store, I would buy some groceries.','C','04'),('04','Quiz Ingles C1','02','¿Qué figura retórica se utiliza cuando se compara algo sin usar \"como\" o \"igual que\"?','Hipérbole','Metáfora','Simile','B','04'),('04','Quiz Ingles C1','03','¿Cuál de las siguientes palabras es un sinónimo de \"conundrum\"?','Mystery','Solution','Enigma','C','04'),('04','Quiz Ingles C1','04','Completa la siguiente frase con la forma correcta: \"By the time you arrive, I ___ my work.\"','Have finishedFinish','Finish','Will finish','A','04'),('04','Quiz Ingles C1','05','¿Cuál es la forma correcta del verbo en tercera persona del singular en el tiempo presente simple pa','She goes','She go','She going','A','04'),('04','Quiz Ingles C1','06','¿Cuál de las siguientes palabras es un antónimo de \"arduous\"?','Easy','Difficult','Simple','A','04'),('04','Quiz Ingles C1','07','¿Cuál es el superlativo de \"good\"?','Better','Best','Well','B','04'),('04','Quiz Ingles C1','08','¿Cuál es la voz pasiva de la siguiente oración: \"They are renovating the old house\"?','The old house is renovated by them.','The old house was renovated by them.','The old house is being renovated by them.','C','04'),('04','Quiz Ingles C1','09','¿Qué tiempo verbal se utiliza para hablar de una acción que comenzó en el pasado y continúa en el pr','Presente Simple','Pasado Simple','Presente Perfecto','C','04'),('04','Quiz Ingles C1','10','¿Cuál es la preposición correcta en la siguiente frase? \"I\'m not interested ___ politics.\"','on','in','at','B','04'),('05','Quiz Calculo Diferencial','01','¿Cuál es la derivada de la función f(x) = 3x^2 - 2x + 1?','f\'(x) = 6x - 2','f\'(x) = 6x + 2','f\'(x) = 3x^3 - x^2 + x','A','05'),('05','Quiz Calculo Diferencial','02','¿Cuál es el límite cuando x tiende a 3 de la función f(x) = (x^2 - 9) / (x - 3)?','0','6','Indefinido','B','05'),('05','Quiz Calculo Diferencial','03','¿Cuál es la regla de la cadena en cálculo diferencial?','(f * g)\' = f\' * g\'','(f * g)\' = f\' * g + f * g\'','(f * g)\' = f\' * g\' + f * g','A','05'),('05','Quiz Calculo Diferencial','04','¿Cuál es la derivada de la función f(x) = e^x?','f\'(x) = e^x','f\'(x) = 1','f\'(x) = e^x + 1','A','05'),('05','Quiz Calculo Diferencial','05','¿Cuál es la integral definida de la función f(x) = 2x desde x = 1 hasta x = 3?','4','6','8','B','05'),('05','Quiz Calculo Diferencial','06','¿Cuál es la derivada de la función f(x) = ln(x)?','f\'(x) = 1/x','f\'(x) = x','f\'(x) = ln(x)','A','05'),('05','Quiz Calculo Diferencial','07','¿Cuál es la derivada de la función f(x) = sen(x)?','f\'(x) = cos(x)','f\'(x) = -sen(x)','f\'(x) = e^x','A','05'),('05','Quiz Calculo Diferencial','08','¿Cuál es la integral indefinida de la función f(x) = 4x^3?','F(x) = x^4 + C','F(x) = 2x^4 + C','F(x) = 12x^2 + C','A','05'),('05','Quiz Calculo Diferencial','09','¿Cuál es la derivada de la función f(x) = 1/x?','f\'(x) = -1/x^2','f\'(x) = 1/x^2','f\'(x) = ln(x)','A','05'),('05','Quiz Calculo Diferencial','10','¿Cuál es el límite cuando x tiende a infinito de la función f(x) = 3x^3 - 2x^2 + 5x?','0','Infinito','3','B','05'),('06','Quiz Angular Avanzado','01','¿Qué es un módulo en Angular?','Una instancia de una clase.','Un componente que encapsula datos y lógica.','Un contenedor para un conjunto de componentes, servicios y otros recursos.','C','06'),('06','Quiz Angular Avanzado','02','¿Cuál es la diferencia entre AngularJS y Angular?','AngularJS es una versión anterior de Angular.','Angular es una versión anterior de AngularJS.','Angular y AngularJS son lo mismo.','A','06'),('06','Quiz Angular Avanzado','03','¿Cuál de las siguientes directivas se utiliza para repetir elementos en Angular?','*ngIf','*ngFor','*ngSwitch','B','06'),('06','Quiz Angular Avanzado','04','¿Cuál es el propósito del inyector de dependencias en Angular?','Controlar la lógica de negocio.','Gestionar la comunicación con el servidor.','Suministrar instancias de servicios a las clases que los necesitan.','C','06'),('06','Quiz Angular Avanzado','05','¿Cuál es el ciclo de vida de un componente en Angular?','ngOnInit, ngOnChanges, ngOnDestroy','ngOnCreate, ngOnUpdate, ngOnDestroy','ngStart, ngUpdate, ngStop','A','06'),('06','Quiz Angular Avanzado','06','¿Cuál es la herramienta recomendada para la gestión de estados en una aplicación Angular?','Redux','Observables','Servicios','A','06'),('06','Quiz Angular Avanzado','07','¿Cuál de las siguientes afirmaciones describe mejor el enrutamiento en Angular?','El enrutamiento se utiliza para agregar estilos a las páginas.','El enrutamiento permite la navegación entre vistas y la gestión de URL.','El enrutamiento está relacionado con la presentación de datos.','B','06'),('06','Quiz Angular Avanzado','08','¿Cuál es el propósito de la detección de cambios (change detection) en Angular?','Controlar la animación de elementos HTML.','Detectar cambios en los valores de las propiedades y actualizar la vista en consecuencia.','Verificar la seguridad de la aplicación.','B','06'),('06','Quiz Angular Avanzado','09','¿Cuál de las siguientes afirmaciones es cierta sobre la \"inversión de control\" en Angular?','Es un principio que promueve el acoplamiento fuerte entre componentes.','Permite que los módulos y servicios soliciten sus dependencias en lugar de crearlas directamente.','No tiene relación con la estructura de una aplicación Angular.','B','06'),('06','Quiz Angular Avanzado','10','¿Qué es el AOT (Ahead-of-Time) compilation en Angular?','Un tipo de directiva en Angular.','Un proceso de compilación que convierte el código TypeScript y las plantillas HTML en JavaScript optimizado antes de la implementación.','Una técnica de administración de estados.','B','06'),('07','Quiz Realismo en Carboncillo','01','¿Qué es el carboncillo en el contexto del arte?','Un tipo de pigmento.','Un material de escritura.','Una técnica de pintura al óleo.','A','07'),('07','Quiz Realismo en Carboncillo','02','En el realismo en carboncillo, ¿qué tipo de representación se busca alcanzar?','Representar objetos con colores vibrantes.','Capturar la apariencia realista de los sujetos con tonos de gris.','Experimentar con formas abstractas.','B','07'),('07','Quiz Realismo en Carboncillo','03','¿Cuál es el soporte comúnmente utilizado para dibujos de carboncillo realistas?','Lienzo','Papel','Madera','B','07'),('07','Quiz Realismo en Carboncillo','04','¿Qué herramientas se utilizan comúnmente en el dibujo de carboncillo?','Pinceles y acuarelas.','Carboncillos y lápices de colores.','Varillas de carboncillo y gomas de borrar.','C','07'),('07','Quiz Realismo en Carboncillo','05','¿Cuál es el propósito de difuminar en el dibujo de carboncillo?','Añadir líneas definidas.','Mezclar y suavizar los tonos de gris.','Agregar colores brillantes.','B','07'),('07','Quiz Realismo en Carboncillo','06','¿Cuál es el término que se usa para describir una técnica de carboncillo en la que se usa una herram','Sfumato','Hachure','Sgraffito','C','07'),('07','Quiz Realismo en Carboncillo','07','¿Cuál es uno de los desafíos comunes al trabajar con carboncillo?','Falta de control en la aplicación de colores.','La incapacidad de lograr detalles precisos.','La durabilidad limitada del material.','B','07'),('07','Quiz Realismo en Carboncillo','08','¿Qué artista famoso es conocido por sus dibujos de carboncillo hiperrealistas?','Vincent van Gogh','Leonardo da Vinci','Chuck Close','C','07'),('07','Quiz Realismo en Carboncillo','09','¿Qué término se utiliza para describir la técnica de carboncillo en la que se crean áreas oscuras ll','Hachure','Sfumato','Chiaroscuro','C','07'),('07','Quiz Realismo en Carboncillo','10','¿Cuál es el propósito principal del difuminado en el realismo en carboncillo?','Agregar texturas detalladas.','Mezclar áreas de sombra y luz para crear transiciones suaves.','Resaltar áreas de alto contraste.','B','07'),('08','Quiz Ilustracion en Photoshop','01','¿Cuál de las siguientes herramientas en Photoshop es más adecuada para crear líneas y trazos preciso','Pincel','Pluma','Bote de pintura','B','08'),('08','Quiz Ilustracion en Photoshop','02','¿Qué tipo de capa se utiliza comúnmente para separar elementos de una ilustración y aplicar efectos ','Capa de ajuste','Capa de fondo','Capa de texto','A','08'),('08','Quiz Ilustracion en Photoshop','03','¿Cuál de las siguientes herramientas se utiliza para mezclar colores en una ilustración en Photoshop','Pincel','Bote de pintura','Herramienta de mezcla','C','08'),('08','Quiz Ilustracion en Photoshop','04','¿Qué efecto se logra al aplicar la herramienta \"Difuminar\" en una ilustración?','Aumentar el contraste','Suavizar bordes y transiciones','Agregar texto','B','08'),('08','Quiz Ilustracion en Photoshop','05','¿Cuál es el propósito de la máscara de capa en Photoshop?','Aplicar filtros a toda la imagen.','Ocultar partes de una capa sin borrarlas.','Cambiar la resolución de la imagen.','B','08'),('08','Quiz Ilustracion en Photoshop','06','¿Qué herramienta permite crear selecciones personalizadas en una ilustración?','Varita mágica','Lazo','Pluma','C','08'),('08','Quiz Ilustracion en Photoshop','07','¿Cuál es el propósito de la herramienta \"Pincel de historia\" en Photoshop?','Agregar sombras y reflejos.','Deshacer acciones y revertir áreas de una imagen a un estado anterior.','Pintar objetos 3D en la ilustración.','B','08'),('08','Quiz Ilustracion en Photoshop','08','¿Qué opción de la barra de herramientas se utiliza para ajustar el tamaño y la dureza de un pincel e','Opacidad','Pincel personalizado','Diámetro','C','08'),('08','Quiz Ilustracion en Photoshop','09','¿Qué tipo de archivo es más adecuado para ilustraciones en Photoshop si se desea mantener capas y tr','JPEG','GIF','PSD','C','08'),('08','Quiz Ilustracion en Photoshop','10','¿Qué atajo de teclado se utiliza para deshacer la última acción en Photoshop?','Ctrl + S','Ctrl + C','Ctrl + Z','C','08'),('09','Quiz Python Avanzado','01','¿Cuál de las siguientes estructuras de datos en Python permite almacenar elementos de manera ordenad','Lista','Conjunto','Diccionario','B','09'),('09','Quiz Python Avanzado','02','En Python, ¿cuál es la función utilizada para crear una excepción personalizada?','raise','throw','catch','A','09'),('09','Quiz Python Avanzado','03','¿Cuál es el propósito del decorador @property en Python?','Definir un método mágico __init__.','Convertir un método en una propiedad que se puede acceder como un atributo.','Crear una instancia de una clase.','B','09'),('09','Quiz Python Avanzado','04','¿Cuál es la diferencia principal entre una comprensión de listas (list comprehension) y una comprens','Una comprensión de listas produce un conjunto, mientras que una comprensión de conjuntos produce una lista.','Una comprensión de listas se utiliza para crear listas, y una comprensión de conjuntos se utiliza para crear conjuntos.','No hay diferencia entre ellos; ambos términos se utilizan indistintamente.','B','09'),('09','Quiz Python Avanzado','05','¿Cuál es el propósito de la función lambda en Python?','Crear listas de manera eficiente.','Definir funciones anónimas en una sola línea.','Realizar operaciones de entrada y salida de datos.','B','09'),('09','Quiz Python Avanzado','06','¿Qué es la recursión en Python?','Un bucle que repite una acción.','Una técnica en la que una función se llama a sí misma.','Una técnica para manejar excepciones.','B','09'),('09','Quiz Python Avanzado','07','¿Cuál de las siguientes bibliotecas se utiliza comúnmente para visualización de datos en Python?','NumPy','Pandas','Matplotlib','C','09'),('09','Quiz Python Avanzado','08','¿Qué módulo se utiliza para trabajar con bases de datos SQL en Python?','SQLAlchemy','Pandas','SQLite','A','09'),('09','Quiz Python Avanzado','09','En Python, ¿cuál es el método utilizado para eliminar un elemento de una lista por valor?','remove()','delete()','pop()','A','09'),('09','Quiz Python Avanzado','10','¿Cuál es el operador que se utiliza para realizar una operación de módulo en Python?','%','//','**','A','09'),('10','Quiz Calculo Integral','01','¿Cuál es la derivada de la función f(x) = x^2 con respecto a x?','f\'(x) = 2x','f\'(x) = x','f\'(x) = 2','A','10'),('10','Quiz Calculo Integral','02','¿Qué representa la integral definida ∫(0 to 2) f(x) dx en cálculo integral?','El área bajo la curva de la función f(x) en el intervalo [0, 2].','La pendiente de la curva de la función f(x) en x = 2.','El valor máximo de la función f(x) en el intervalo [0, 2].','A','10'),('10','Quiz Calculo Integral','03','¿Cuál es la integral indefinida de la función f(x) = 3x^2 con respecto a x?','F(x) = x^3 + C','F(x) = 6x + C','F(x) = 3x^2 + C','A','10'),('10','Quiz Calculo Integral','04','¿Qué representa la regla del trapezoide en el contexto de la aproximación de integrales?','Una técnica para calcular el límite de una función.','Un método para estimar el valor de una integral mediante áreas de trapecios.','Una fórmula para encontrar derivadas de funciones compuestas.','B','10'),('10','Quiz Calculo Integral','05','¿Cuál es la derivada de la función exponencial f(x) = e^x?','f\'(x) = e^x','f\'(x) = x','f\'(x) = 1/x','A','10'),('10','Quiz Calculo Integral','06','¿Cuál es el teorema fundamental del cálculo?','El teorema que establece que la derivada de una función es igual a la integral indefinida de su función primitiva.','El teorema que describe la relación entre las series infinitas y las integrales impropias.','El teorema que establece que toda función continua es diferenciable.','A','10'),('10','Quiz Calculo Integral','07','¿Cuál es la notación estándar para representar la integral definida de una función f(x) desde a hast','∫[a, b] f(x) dx','∫(a, b) f(x) dx','∫{a, b} f(x) dx','A','10'),('10','Quiz Calculo Integral','08','¿Cuál es la derivada de la función trigonométrica f(x) = sin(x)?','f\'(x) = cos(x)','f\'(x) = -sin(x)','f\'(x) = tan(x)','A','10'),('10','Quiz Calculo Integral','09','¿Qué representa el teorema del valor intermedio en el cálculo integral?','El teorema que establece la relación entre el límite y la continuidad de una función.','El teorema que garantiza que una función continua en un intervalo toma todos los valores intermedios entre dos extremos.','El teorema que describe la derivación de funciones compuestas.','B','10'),('10','Quiz Calculo Integral','10','¿Cuál es la derivada de la función logarítmica f(x) = ln(x)?','f\'(x) = x','f\'(x) = 1/x','f\'(x) = e^x','B','10');
/*!40000 ALTER TABLE `quiz` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `quiz_general`
--

DROP TABLE IF EXISTS `quiz_general`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `quiz_general` (
  `cod_quiz` varchar(10) NOT NULL,
  `descripcion` varchar(100) NOT NULL,
  PRIMARY KEY (`cod_quiz`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `quiz_general`
--

LOCK TABLES `quiz_general` WRITE;
/*!40000 ALTER TABLE `quiz_general` DISABLE KEYS */;
INSERT INTO `quiz_general` VALUES ('01','Quiz Unity'),('02','Quiz Ingles B1'),('03','Quiz Frances Basico'),('04','Quiz Ingles C1'),('05','Quiz Calculo Diferencial'),('06','Quiz Angular Avanzado'),('07','Quiz Realismo en Carboncillo'),('08','Quiz Ilustracion en Photoshop'),('09','Quiz Python Avanzado'),('10','Quiz Calculo Integral');
/*!40000 ALTER TABLE `quiz_general` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `respuesta_quiz`
--

DROP TABLE IF EXISTS `respuesta_quiz`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `respuesta_quiz` (
  `cod_quiz` varchar(10) NOT NULL,
  `fecha_presentacion` datetime NOT NULL,
  `cod_pregunta` varchar(10) DEFAULT NULL,
  `respuesta_correcta` text DEFAULT NULL,
  `cod_estudiante` int(12) DEFAULT NULL,
  PRIMARY KEY (`cod_quiz`,`fecha_presentacion`),
  KEY `cod_estudiante` (`cod_estudiante`),
  CONSTRAINT `respuesta_quiz_ibfk_1` FOREIGN KEY (`cod_quiz`) REFERENCES `quiz` (`cod_quiz`),
  CONSTRAINT `respuesta_quiz_ibfk_2` FOREIGN KEY (`cod_estudiante`) REFERENCES `persona` (`id_persona`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `respuesta_quiz`
--

LOCK TABLES `respuesta_quiz` WRITE;
/*!40000 ALTER TABLE `respuesta_quiz` DISABLE KEYS */;
INSERT INTO `respuesta_quiz` VALUES ('01','2023-05-29 00:59:43','01','Rama de la tecnología para desarrollar un software',1018235761);
/*!40000 ALTER TABLE `respuesta_quiz` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tematica`
--

DROP TABLE IF EXISTS `tematica`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tematica` (
  `cod_tematica` varchar(10) NOT NULL,
  `descripcion` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`cod_tematica`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tematica`
--

LOCK TABLES `tematica` WRITE;
/*!40000 ALTER TABLE `tematica` DISABLE KEYS */;
INSERT INTO `tematica` VALUES ('01','Ilustrator'),('02','photoshop'),('03','Python'),('04','Angular'),('05','Calculo'),('06','Trigonometria'),('07','Unity'),('08','Blender'),('09','Realismo'),('10','Arte conceptual'),('11','Ingles'),('12','Frances');
/*!40000 ALTER TABLE `tematica` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tipo_persona`
--

DROP TABLE IF EXISTS `tipo_persona`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tipo_persona` (
  `tipo_persona` varchar(10) NOT NULL,
  `descripcion` text DEFAULT NULL,
  PRIMARY KEY (`tipo_persona`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tipo_persona`
--

LOCK TABLES `tipo_persona` WRITE;
/*!40000 ALTER TABLE `tipo_persona` DISABLE KEYS */;
INSERT INTO `tipo_persona` VALUES ('01','Admin'),('02','Profesor'),('03','Estudiante');
/*!40000 ALTER TABLE `tipo_persona` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2023-10-16 23:44:57
