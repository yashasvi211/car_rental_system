INSERT INTO OFFICE (office_id,office_name,country,city,address) VALUES 
(1,'Fisrt_Office','EGY','Cairo','Madent Nasr'),
(2,'Second_Office','EGY','Alexandria','Smoha'),
(3,'Third_Office','KSA','Jeddah','Baradwan Street'),
(4,'Forth_Office','KSA','Riyadh','Tahlia Street'),
(5,'Fifth_Office','IND','Chicago ','Clark Street'),
(6,'Sixth_Office','IND','New york','Crosby Street') ;


INSERT INTO ADMIN VALUES (1,'Yashasvi','yashasvi@gmail.com','0000');

INSERT INTO CAR (Plate_id,Color,`Year`,Brand,Model,Price_per_day,office_id,image) VALUES
(2323,'white',2021,'BMW','X5 xDrive40i',3000,5,'https://www.ccarprice.com/products/BMW_X5_xDrive40i_2021.jpg'),
(2655,'blue',2021,'BMW','New BMW 8 Series Convertible 2021',2950,1,'https://cdn.bmwblog.com/wp-content/uploads/2019/07/BMW-M850i-Convertible-21-of-30.jpg'),
(2222,'black',2024,'Mercedes','Coupe AMG',3100,6,'https://images.carandbike.com/car-images/colors/mercedes-amg/gle-coupe/mercedes-amg-gle-coupe-selenite-grey.png?v=1629707416'),
(2455,'black',2018,'Mercedes','2018 Mercedes-Maybach S 560 & S 650',2900,2,'https://imgcdnblog.carbay.com/wp-content/uploads/2018/08/02121104/mer_650x420.jpg'),
(1121,'white',2019,'Audi','A5 Cabriolet',1950,3,'https://www.ccarprice.com/products/Audi_A5_35_TFSI_Cabriolet_2017.jpg'),
(1929,'red',2021,'Toyota','Camry Hybrid',1750,1,'https://imgd.aeplcdn.com/0x0/n/1g8lpua_1557431.jpg'),
(1239,'black',2021,'Toyota','Camry Hybrid',1200,1,'https://imgd.aeplcdn.com/0x0/n/1g8lpua_1557431.jpg'),
(2343,'blue',2015,'KIA','Forte',1000,4,'https://media.ed.edmunds-media.com/kia/forte/2015/oem/2015_kia_forte_sedan_ex_fq_oem_1_1600.jpg'),
(2121,'black',2019,'Chevrolet','Cruze',950,2,'https://www.motortrend.com/uploads/sites/10/2019/03/2019-chevrolet-cruze-lt-sedan-angular-front.png'),
(2874,'red',2021,'Jeep','Wrangler Rubicon 392',2250,6,'https://media.ed.edmunds-media.com/jeep/wrangler/2021/oem/2021_jeep_wrangler_convertible-suv_unlimited-rubicon-392_fq_oem_1_1600.jpg'),
(2099,'blue',2024,'Fiat','Tipo Hatchback',1550,1,'http://www.bauto.com/storage/cars/YC7PClIrXZ8YDivRGqlke2rGdD54UjBwCj2bcoZ2.png'),
(2155,'red',2024,'Hyundai','Hyundai ALcazar',1450,2,'https://www.ccarprice.com/products/Hyundai_Aura_SX_Plus_Turbo_2024.jpg'),
(2911,'black',2018,'Hyundai','Elantra',1300,4,'https://tdrresearch.azureedge.net/photos/chrome/Expanded/White/2018HYC020004/2018HYC02000401.jpg'),
(2872,'red',2018,'Ferrari','488 Pista',4000,6,'https://www.pushstart.it/en/test-drive/ferrari-488-pista/images/IMG1_9252_D-p-c_hu8346bd8583d10d9c1ce1fd2ddde091e4_1998652_1024x640_fill_q75_box_center.jpg'),
(2421,'blue',2021,'Skoda','Octavia',2000,1,'https://ymimg1.b8cdn.com/resized/car_model/8514/logo/mobile_listing_main_01.png'),
(2761,'yellow',2015,'Lamborghini','Huracan spyder',5000,4,'https://www.lamborghini.com/sites/it-en/files/DAM/lamborghini/masterpieces/huracan_spyder/over/huracan_spyder_over_02_m.jpg'),
(2333,'black',2024,'BMW','X4',3200,5,'https://www.ccarprice.com/products/BMW_X4_xDrive30i_2023.jpg'),
(2133,'white',2021,'Mercedes','Benz EQC 400',3500,5,'https://hips.hearstapps.com/hmg-prod/images/2020-mercedes-benz-eqc-4-1547234221.jpg?crop=0.821xw:1.00xh;0.107xw,0&resize=640:*'),
(2566,'red',2024,'Skoda','Slavia',2000,3,'https://upload.wikimedia.org/wikipedia/commons/thumb/9/92/2021_%C5%A0koda_Slavia_1.5_TSI_Style_%28India%29_front_view.png/1200px-2021_%C5%A0koda_Slavia_1.5_TSI_Style_%28India%29_front_view.png'),
(2661,'black',2024,'Skoda','Slavia',2000,3,'https://i.cdn.newsbytesapp.com/images/l142_21511637559155.jpg'),
(2561,'white',2021,'Jeep','Grand Cherokee',2600,2,'https://media.ed.edmunds-media.com/jeep/grand-cherokee-l/2024/oem/2024_jeep_grand-cherokee-l_4dr-suv_limited_fq_oem_1_1600.jpg'),
(2541,'black',2021,'Jeep','Grand Cherokee',2600,6,'https://imgd.aeplcdn.com/1200x900/n/cw/ec/132711/grand-cherokee-exterior-right-front-three-quarter.jpeg?isig=0&q=75'),
(2611,'blue',2024,'Audi','A6',3000,4,'https://cdni.autocarindia.com/ExtraImages/20191024030710_Audi-A6-review-main.jpg'),
(2621,'black',2024,'Audi','A6',3000,5,'https://bluesky.cdn.imgeng.in/cogstock-images/cit-cb9a3d7e793650841b479ae9d93323b77902a717.jpg?width=150'),
(2499,'black',2024,'Fiat','Tipo Hatchback',1550,2,'http://www.bauto.com/storage/cars/YC7PClIrXZ8YDivRGqlke2rGdD54UjBwCj2bcoZ2.png');




INSERT INTO customer (national_id,Fname,Lname,email,`password`,phone_number,country,sex,licence_id) VALUES
(301100,'John','Smith','john@gmail.com','1234','9982822010','IND','male',1021001),
(301103,'Leo','Messi','leo@gmail.com','0909','9912012000','IND','male',1090999),
 
 
 
 