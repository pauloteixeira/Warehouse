-- MySQL dump 10.13  Distrib 5.7.12, for osx10.9 (x86_64)
--
-- Host: localhost    Database: warehouse
-- ------------------------------------------------------
-- Server version	5.5.5-10.1.16-MariaDB

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `categories`
--

DROP TABLE IF EXISTS `categories`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `categories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `categories`
--

LOCK TABLES `categories` WRITE;
/*!40000 ALTER TABLE `categories` DISABLE KEYS */;
INSERT INTO `categories` VALUES (1,'Electronics'),(2,'Videogames'),(3,'Smarthphones'),(4,'Tablets'),(5,'Apple'),(6,'Photography'),(7,'Nikon'),(8,'Canon');
/*!40000 ALTER TABLE `categories` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `migration`
--

DROP TABLE IF EXISTS `migration`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `migration` (
  `version` varchar(180) COLLATE utf8_unicode_ci NOT NULL,
  `apply_time` int(11) DEFAULT NULL,
  PRIMARY KEY (`version`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migration`
--

LOCK TABLES `migration` WRITE;
/*!40000 ALTER TABLE `migration` DISABLE KEYS */;
INSERT INTO `migration` VALUES ('m000000_000000_base',1488215175),('m170227_165156_create_users_table',1488215187),('m170227_165238_create_categories_table',1488215267),('m170227_165254_create_products_table',1488215267),('m170227_165305_create_products_has_categories_table',1488215267),('m170227_173014_insert_user',1488216741),('m170228_184321_add_column_products_has_categories_table',1488307579),('m170228_202740_add_column_quantity_stock_products_table',1488313752);
/*!40000 ALTER TABLE `migration` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `products`
--

DROP TABLE IF EXISTS `products`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `products` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci NOT NULL,
  `price` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `image` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `quantity` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=41 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `products`
--

LOCK TABLES `products` WRITE;
/*!40000 ALTER TABLE `products` DISABLE KEYS */;
INSERT INTO `products` VALUES (13,'SanDisk Extreme PRO SDXC UHS-I Memory Card (64 GB)','Whether you\'re in the studio or out in the field, SanDisk Extreme PRO SDXC UHS-I Memory Cards are an ideal storage solution for professional photographers and videographers. Offering read speeds up to 95 MB/s (1), write speeds up to 90 MB/s, and a UHS Class 3 speed rating (2), these powerful memory cards are designed for continuous burst-mode shooting, Full HD and 4K Ultra HD (3) video recording, and quick file transfer. A capacity of 64GB (4) allows you to shoot longer photo and video sessions. The cards are engineered to perform dependably in extreme conditions, enabling pros to get the most out of their advanced digital cameras and camcorders.','35.00','QRE2EiNNKGa7EddZ1htbwEDpvP4QKajc.jpg',100),(14,'SanDisk Extreme SDXC UHS-I Memory Card (64 GB)','Whether you\'re in the studio or out in the field, SanDisk Extreme SDXC UHS-I Memory Cards are an ideal storage solution for professional photographers and videographers. Offering read speeds up to 95 MB/s (1), write speeds up to 90 MB/s, and a UHS Class 3 speed rating (2), these powerful memory cards are designed for continuous burst-mode shooting, Full HD and 4K Ultra HD (3) video recording, and quick file transfer. A capacity of 64GB (4) allows you to shoot longer photo and video sessions. The cards are engineered to perform dependably in extreme conditions, enabling pros to get the most out of their advanced digital cameras and camcorders.','28.00','wjtHuLMlPDqNCAeULAwH-FrJyhBKLLuU.jpg',40),(15,'Canon EOS 7D Mark II Digital SLR Camera','The Canon EOS 7D Mark II GPS Digital SLR Camera features a refined APS-C sized 20.2 Megapixel CMOS sensor with Dual DIGIC 6 Image Processors for gorgeous imagery. It shoots up to 10 frames per second at ISOs ranging from 100-16000 (expandable to H1: 25600, H2: 51200), has a 65-point all cross-type AF system and features Canon\'s amazing Dual Pixel CMOS AF for brilliant Live-View AF. It has dual card slots for both CF and SD cards, USB 3.0 connectivity and even has built-in GPS for easy location tagging. Additional features: 3.0\" LCD screen, Full HD 1080p, 10fps continuous shooting, magnesium alloy body, plus more! ','1,499.00','3r2GQKRRPqNdrPj6rtAZ_YkjthRT1xyF.jpg',87),(16,'Canon EOS 5D Mark IV DSLR Camera','The EOS 5D Mark IV camera builds on the powerful legacy of the 5D series, offering amazing refinements in image quality, performance and versatility. Canon’s commitment to imaging excellence is the soul of the EOS 5D Mark IV. Wedding and portrait photographers, nature and landscape shooters, as well as creative videographers will appreciate the brilliance and power that the EOS 5D Mark IV delivers. Superb image quality is achieved with Canon’s all-new 30.4 Megapixel full-frame sensor, and highly-detailed 4K video is captured with ease. Focus accuracy has been improved with a refined 61-point AF system and Canon’s revolutionary Dual Pixel CMOS AF for quick, smooth AF for both video and Live View shooting. Fast operation is enhanced with Canon’s DIGIC 6+ Image Processor, which provides continuous shooting at up to 7.0 fps. Built-in Wi-Fi, GPS and an easy-to-navigate touch-panel LCD allow the camera to become an extension of you. ','3,499.00','M-W-t_DNtv_nyq_Ec4JW8fd1IcSjahDf.jpg',34),(17,'Nikon D90 12.3MP Digital SLR Camera with 18-1','Fusing 12.3-megapixel image quality inherited from the award-winning D300 with groundbreaking features, the D90\'s breathtaking, low-noise image quality is further advanced with EXPEED image processing. Split-second shutter response and continuous shooting at up to 4.5 frames-per-second provide the power to capture fast action and precise moments perfectly, while Nikon\'s exclusive Scene Recognition System contributes to faster 11-area autofocus performance, finer white balance detection and more.What\'s in the box: Nikon D90 SLR Digital Camera Kit with Nikon 18-105mm VR Lens,18-105mm f/3.5-5.6G ED VR AF-S DX Nikkor Autofocus Lens,Front & Rear Lens Caps,Lens Hood,Lens Pouch,EN-EL3e Rechargeable Lithium-ion Battery,MH-18a Quick Charger,UC-E4 USB Cable,EG-D2 Audio/Video Cable,AN-DC1 Neck Strap,BM-10 LCD Monitor Cover,BF-1A Body Cap,DK-5 Eyepiece Cap,DK-21 Rubber Eyecup,BS-1 Accessory Shoe Cap,Nikon Software Suite CD-ROM, and User Guides.','599.00','tCMdqioWqjxystJ3yUehWKK19O49SEx5.jpg',44),(18,'Nikon D3200 24.2 MP Digital SLR with 18-55mm f/3.5-5.6 ','Nikon D3200 Digital SLR Camera & 18-55mm VR DX AF-S Zoom Lens (Black) -Factory Refurbished\r\n\r\nDon\'t let the compact size and price fool you -- packed inside the Nikon D3200 Digital SLR Camera is some serious power: a 24.2 MP DX-format CMOS sensor that excels in any light, EXPEED 3 image-processing for fast operation and creative in-camera effects, Full HD (1080p) movie recording, in-camera tutorials and much more. This camera outfit includes a razor-sharp NIKKOR 18-55mm VR, 3x zoom lens with built-in image stabilization.','499.00','Z4C-GQ7i1uzYS7ko-uB-IJs7gnzkg3Kk.jpg',10),(19,'Sony PlayStation 4 500GB','PlayStation 4 Slim 500GB Console - Uncharted 4 Bundle','249.00','RlFW7R6LUjOunzQLPWa84qT5sCT0TikI.jpg',1),(20,'Sony PlayStation 3','PlayStation 3','199.00','zRK8tsgKTmo0_iNARuuuBw4CFQI20Y0w.jpg',0),(21,'Microsoft Xbox One 500 GB','Xbox One brings together the best exclusive games, the most advanced multiplayer, and entertainment experiences you won’t find anywhere else. Play games like Titanfall™ and Halo together with your friends on a network powered by over 300,000 servers for maximum performance. Find new challengers who fit your skill and style with Smart Match, which uses intelligent algorithms to bring the right players together. Turn your best game moments into personalized movies that you can share with friends, or broadcast your gameplay live. Then switch quickly between apps like Netflix, Hulu, and Internet Explorer. Or do two things at once by snapping a game, live TV, a movie or apps side-by-side.','199.00','6C2HjKe2D5xhZB7hoDXzDsnyRCGFHTCk.jpg',5),(22,'Apple iPad Air 2 9.7-Inch 32GB','Work and play faster, thinner, and lighter with the Apple 32GB iPad Air 2. \n\nFeaturing Apple\'s 64-bit A8X chip and M8 coprocessor, the Air 2 delivers 40% faster CPU performance and 2.5 times the graphics performance when compared to its predecessor. It\'s also 18% thinner at 0.24\" and weighs 0.96 lb. \n\nThe LED-backlit 9.7\" 2048 x 1536 Retina IPS LCD display\'s anti-reflective coating reduces glare by 56% and uses a single-layer design to eliminate internal reflectance for richer colors, greater contrast, and sharper images. \n\nThis iPad features 802.11a/b/g/n/ac Wi-Fi technology with MIMO support for download speeds up to 866 Mbps as well as Bluetooth 4.0. Share documents and files with AirDrop and stream your iPad\'s content to your compatible HDTV and speakers with AirPlay. The Air 2 features Apple Touch ID technology, which uses your fingerprint to unlock your device as well as make secure purchases in iTunes, iBooks, and the App Store. The 1.2MP front and 8MP rear camera let you take high-re','356.00','dZVQEuTGwoGg7qnoknBzb0QYubUJLIw_.jpg',16),(23,'Apple iPhone 6 64GB - Gold','iPhone 6 isn’t simply bigger it’s better in every way. Larger, yet dramatically thinner. More powerful, but remarkably power efficient. With a smooth metal surface that seamlessly meets the new Retina HD display. It’s one continuous form where hardware and software function in perfect unison, creating a new generation of iPhone that’s better by any measure.','759.00','hwVJuEleQ3l7FUa2rwe8MfbgMlTU_j9i.jpg',10),(24,'Samsung Galaxy S7 Edge SM-G935F Smart Phone 32 GB, Black Ony','Samsung Galaxy S7 Edge 32GB smartphone - black offers incredible communication experience alongside insane entertainment. The dual SIM galaxy mobile runs on Quad-core (2.15GHz + 1.6GHz) Kryo processor and is based on Marshmallow Android 6.0 OS to power your needs perfectly. Storage and memory needs are met through 4GB RAM and built-in storage of 32GB with an extendable option upto 200GB via microSD slot. The slim and sleek S7 Edge phone comes with 5.5 inch Super AMOLED capacitive touchscreen to render stunning views and sports 12MP rear camera with dual pixel technology for less blur and a new advanced sensor for catching details in low light. Backed by 3600mAh battery, the S7 Edge smartphone features a dual edge design to access real-time updates with a single swipe and has 5MP front camera for selfie fun. The Galaxy S7 Edge powers up from 0 to 100% in no time and is water-resistant in up to 5 feet of water for up to 30 minutes. The S7 Edge battery is non-removable, supports wireless ','5,999.99','gjl4Xz7GMSacXZAHpegFnJU0y449RYXt.jpg',0),(33,'Samsung Galaxy S5 (Charcoal Black, 16GB)','Impressive Photography Tool\r\n\r\nThe Samsung Galaxy S5 provides a unique photographic experience as it features a stunning 16MP primary camera. It\'s one of the first models to feature an autofocus speed as high as 0.3 seconds! Use the Selective Focus camera feature of this Samsung Galaxy S5 mobile phone to make the primary object more prominent and blur the background, so that you can take crisp and focused photos. With the HDR, you can click or shoot your subject even if there\'s a visible counterlight or uneven shading or indoor light.\r\n\r\nRich and Clear Display\r\n\r\nPacked with a 5.1-inch FHD Super AMOLED touchscreen, this Samsung Galaxy S5 charcoal black smartphone provides you a superior and rich viewing experience. On its 1920 x 1080 pixel resolution, all your high definition movies and photos look picturesque and eye catching. With Local Contrast Enhancement, this smartphone changes and adapts to the light conditions. Whether you are in low light conditions or facing too much sunlight, you can dim or brighten up the display of this Samsung Android phone to let you clearly see your files, videos or pictures.\r\n\r\nHealth Monitor with Enhanced Security\r\n\r\nThe Samsung Quad Core phone is the first model to incorporate the heart rate sensor. It allows you to put your finger on the back of the phone to measure and check your heart rate. With S Health and pedometer, you can keep track of various parameters when you go for a walk. It monitors the distance covered, time taken and your speed in addition to other factors. For enhanced security, this Samsung Galaxy S5 comes with a fingerprint scanner that stores your fingerprint as your password so that only you can unlock your phone.\r\n\r\nCamera: 16MP primary camera with selective focus\r\nDisplay: 5.1-inch FHD Super AMOLED touchscreen\r\nDisplay Resolution: 1920 x 1080 pixels\r\nOperating System: Android v4.4.2 Kitkat\r\nProcessor: 2.5GHz Quad Core processor\r\nMemory: 16GB internal memory, expandable up to 128GB\r\nBattery: 2800mAH battery','459.00','J3Sp2kUrOAq1Va4ojZ4b9mvUlcBIIWwg.jpg',23),(34,'Samsung Galaxy S6 Edge (Black Sapphire, 32GB)','Samsung Galaxy S6 Edge Comes with Power Packed Features\r\n\r\nShop online Samsung Galaxy S6 Edge at Amazon.in that comes with power packed features. This Black Sapphire smartphone has a 5.1 inch Quad HD (2560x1440) AMOLED display that gives you the perfect sharp view with topmost clarity. The Samsung Galaxy S6 Edge has an upgraded, highly performing GPU that allows you multitasking and is equipped with advanced multimedia functions. Get top quality pictures using the smartphone’s front and rear end cameras with F1.9 aperture and high resolution. In addition, this phone will never give you headache when it comes to charging, for it can be charged 1.5 times faster along with wireless charging option.\r\n\r\nBuy online Samsung Galaxy S6 Edge with the Perfect Design\r\nThe Samsung Galaxy S6 Edge smartphone is beautifully crafted with the perfect blend of metal sculpturing and glass moulding. A design that stands out in the lot with its brilliant display glass that reflects wide range of bright colors.\r\n\r\nSamsung galaxy S6 Edge Offers Upgraded Security\r\nEnjoy this smartphone without worrying about security as it comes with KNOX, a fingerprint scanner that helps you keep your phone secured','699.00','LnUs9O287l4ZAEFFyeiHtMqhGnWBzVOl.jpg',45),(35,'Samsung Galaxy S3 GT-I9300 (Pebble Blue)','Samsung GALAXY S III just gets us. Little things, like staying awake when you look at it and keeping track of loved ones. designed for humans, it goes beyond smart and fulfills your needs by thinking as you think, acting as you act. S Voice : Why not get a response from your phone. Tell it to wake up! Even better, you can tell Samsung GALAXY S III to turn off the alarm for a few minutes and let yourself sleep a bit more. Answer your phone (or reject a call), turn your music up (or down), and even tell the camera when to shoot. Social tag : Now its even easier to keep track of friends and loved ones. Social tag lets you link the faces in your photo album with their social media streams. \r\n\r\nOnce its set, all you have to do is look at their pictures and youll see their current status appear. Direct call Samsung GALAXY S III even knows when you want to talk. When you are messaging someone and decide to call them instead, simply lift the phone to your ear and direct call will dial their number for you. No more fumbling through call logs or contacts. Let Samsung GALAXY S III do the work. Smart stay With the innovative smart stay feature, Samsung GALAXY S III automatically recognizes when you are looking at the phone, whether it is to read an e-book or browse the web. The front camera looks deep into your eyes and maintains a bright display for continued viewing pleasure. \r\n\r\nWhat a bright idea. Design Whether its the oceans horizon or a majestic forest of Nordic firs, one thing is apparent there are no straight lines in nature. \r\n\r\nThe Samsung GALAXY S IIIs minimal and organic design is reflected in its smooth and non-linear lines. Its human-centric nature provides an ergonomic and comfortable experience with enhanced usability. Its comfortable grip, gentle curves and platinum organic form deliver a natural look and feel.','100.00','NPCwsw9SM_fNWra0NsY0I0vEwjBOK76O.jpg',40),(36,'Samsung Tab A SM-T355YZAAINS Tablet (8 inch, 16GB, Wi-Fi+3G+Voice Calling), Smoky Titanium','Samsung Tab A SM-T355YZWA Tablet \r\nSmart features, faster performance\r\n\r\nArmed with the 1.20 GHz Qualcomm processor and 1.50 GB RAM, the Samsung A SM-T355YZWA Tablet delivers faster performance and allows you to complete your work quickly and efficiently. It has a sleek and stylish design along with a compact and slim body. Hence, it is highly portable and you get to carry it anywhere you want. It comes with the Android operating system that provides access to all Android services and apps. The 8 Inch display screen and effective speakers provide the ideal multimedia experience by enhancing the quality of audio and visuals of your favourite movie or game.\r\n\r\nImproved camera and better battery life\r\nThis Samsung Tablet has a couple of powerful cameras which are capable of taking high quality images with perfect clarity. You also get to click better selfies with this tablet as it is equipped with an effective front camera. The various shooting modes and camera options allow you to do more with your images. Along with clicking images, this camera is also effective when it comes to recording videos as well. With the Ultra Power Saving Mode, this tablet saves power during its functions and thus enhances the overall battery life.\r\n\r\nEffective multitasking tools and 16 GB storage\r\nWith the cutting edge multitasking tools of this tablet, you can run various programs simultaneously. The Multi Window feature of this tablet allows you to access two different apps side by side. The 16 GB storage capacity is effective in accommodating your data.\r\n\r\nMicrosoft Office feature for smart working\r\nMicrosoft Office offers an effective working platform. This Samsung Galaxy Tablet is equipped with the Microsoft Office feature which is ideal for working professionals. With the Microsoft Word, you can edit and review any document; while the Microsoft Excel makes data collection simple with its easy to use tables and charts. You can create impressive presentations that stand out with the Microsoft PowerPoint feature. Moreover, PowerPoint comes with various options and modes so that you get to do more with every presentation. The Microsoft OneDrive with its 100 GB storage keeps all your documents and data safe. With this OneDrive feature, you can access your files from anywhere by simply logging into your Microsoft account.','999.00','f1aMg65NeBz1zIHhXzwWtLsg__ybB6Bq.jpg',50),(37,'Apple iPhone 5c (BLUE, 16GB)','Apple gives you one more reason to pick your own iPhone this timeFun colours!\r\n\r\nThe new presentations by this brand have popped in bright colours to let you catch up the latest trend of the season. Coming with a 4 inch retina display screen, the Apple iPhone 5c can offer you the maximum clarity for watching photos and videos, and is excellent for all web browsing purposes. It can let you have instant internet access through 4G and superfast wireless connection. It runs on an iOS 7 operating system and works on an A6 dual-core processor which makes multi-tasking easy for you. The 16GB internal storage can add to your ease as you can store anything on your smart mobile device and use multiple applications at the same time after downloading those from the Apple Application Store.\r\n\r\nThe phone is equipped with an 8 MP rear camera that allows you to take HD quality pictures and videos in great detailing. Besides allowing excellent edit functionalities, the device can let you capture live action all the time with just a touch. The 1.2MP secondary camera makes it perfect for video chatting purposes as well. You can use Siri to your advantage for all kinds of voice assistance with the device including sending messages, making calls, setting reminders etc.\r\n\r\nOffering brilliant looks and the promise of quality from the brand, the smart phone can turn walking through every day life into a smooth experience for you. Grab this Apple iPhone 5c Yellow now to brighten up your days ahead with its peppy colour and smooth touch screen experience.','359.00','83VnsQrl3oHj2N3jhccUKtTEGQYepp7k.jpg',45),(38,'Apple iPhone 7 (Jet Black, 128GB)','12MP primary camera with optical image stabilisation, Quad-LED True Tone flash and Live Photos, 4K video recording at 30 fps and slow-motion video recording in 1080p at 120 fps, 7MP front facing FaceTime HD camera with Retina Flash 4.7-inch (diagonal) Retina HD 3D Touch capacitive touchscreen display and home button with 1334x750 resolution and wide colour, Splash, water and dust resistant iOS 10 and iCloud operating system with A10 Fusion chip with integrated M10 motion coprocessor, 2GB RAM, 128GB internal memory and single Nano-SIM Non-removable Li-Ion 1960 mAh battery (7.45 Wh) providing talktime up to 14 hours on 3G network','789.00','WnI8nrJIXeroWJWiJWKhF8R7XAB8FPzP.jpg',400),(39,'Moto X Force (Black, 32GB)','The Moto X Force gives you the all-new Moto ShatterShield, the world’s first shatterproof display. So there’s nothing to fear when the going gets tough. With up to 30 hours of battery life, TurboPower charging, and a 21MP camera, it won’t ever let you down. And with a sleek design featuring your choice of premium materials like ballistic nylon, it’s easy to fall for. Get tons more space for pictures, videos, music, and apps with an optional microSD card (up to 2 TB*). Moto X Force. Choose the phone that loves you back.\r\n\r\n*microSD cards sold separately. Content with DRM restrictions may not be able to be moved to the card. 200GB is the maximum capacity currently available.','34.00','S7OsFgClVaEnZk2x6z8D3Bd5WKCePUun.jpg',87),(40,'Moto Z with Style Mod (Black, 64GB)','Ultra-Thin Design. Unlimited Possibilities\r\nIntroducing the all-new Moto Z. It’s designed around Moto Mods, interchangeable backs that snap onto your smartphone, instantly transforming it into a movie projector, boombox, battery powerhouse and more. The possibilities are practically endless. Of course, Moto Z is a standout phone on its own. With a stunning metal design, it’s not only the world’s thinnest premium smartphone - it also gives you an all-day battery, the blazing-fast charging of TurboPower, a fast processor and so much more. The new Moto Z. Thin is just the beginning.\r\n\r\n\r\n\r\nUltrathin, Ultralight: The World’s Thinnest Premium Smartphone\r\nRazor thin and ultra light, Moto Z was designed from the start with Moto Mods in mind. Which means you can add powerful capabilities to your phone without adding a ton of bulk to your pocket. Made from military aircraft-grade aluminum and stainless steel, it’s both stunning and durable.','189.00','nG9QOvefGhcfeABDiEt38976oWtboa85.jpg',67);
/*!40000 ALTER TABLE `products` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `products_has_categories`
--

DROP TABLE IF EXISTS `products_has_categories`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `products_has_categories` (
  `product_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `id` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`),
  KEY `idx-products_has_categories` (`product_id`),
  KEY `idx-categories_has_product` (`category_id`),
  CONSTRAINT `fk-categories_has_products` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE,
  CONSTRAINT `fk-products_has_categories` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=80 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `products_has_categories`
--

LOCK TABLES `products_has_categories` WRITE;
/*!40000 ALTER TABLE `products_has_categories` DISABLE KEYS */;
INSERT INTO `products_has_categories` VALUES (14,1,18),(14,3,19),(14,6,20),(15,6,21),(15,8,22),(16,6,23),(16,8,24),(17,6,25),(17,7,26),(18,6,27),(18,7,28),(22,1,35),(22,4,36),(22,5,37),(23,1,38),(23,3,39),(23,5,40),(24,1,41),(24,3,42),(13,1,43),(13,6,44),(20,1,55),(20,2,56),(19,1,57),(19,2,58),(21,1,59),(21,2,60),(33,3,69),(34,3,70),(35,3,71),(36,1,72),(36,4,73),(37,3,74),(37,5,75),(38,3,76),(38,5,77),(39,3,78),(40,3,79);
/*!40000 ALTER TABLE `products_has_categories` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  `username` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'Paulo A. Teixeira','admin@admin.com','admin@admin.com','55a5e9e78207b4df8699d60886fa070079463547b095d1a05bc719bb4e6cd251',1),(4,'Jonh ','jonh@warehouse.com','jonh@warehouse.com','55a5e9e78207b4df8699d60886fa070079463547b095d1a05bc719bb4e6cd251',1);
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2017-02-28 20:08:17
