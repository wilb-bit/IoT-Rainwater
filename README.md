# IoT-Rainwater-Tank
Penultimate yearlong project

•	Engineered a solar-powered Internet of Things (IoT) device to remotely monitor the fullness of a rainwater tank, from anywhere with an internet connection (lifetime: 10+ years).

## Webserver
• Apache webserver developed (HTML, PHP, SQL) with a login system, a MySQL database, Graphical User Interface (GUI), and an API for communication with an IoT device (ESP8266). IoT device programmed with C++.

This was the webserver used for the project. XAMPP was installed to have a Apache web server and MySQL database running on my computer.
home.php is the home page. water/receive.php is the API to receive data form the IoT device.

## IoT device
Code located in other respository (IoT-Rainwater-Tank-Device) 
https://github.com/wilb-bit/IoT-Rainwater-Tank-Device  

NodeMCU (ESP8266) programmed with Arduino IDE. Ultrasonic range sensor used to find the distance between the top of the tank and the water level. 
1. Wakes and connects to wifi and web server.   
2. Reads the water level of the tank (ultrasonic range sensor).   
3. Sends this to the websever using PHP GET calling 'water/recieve.php?'. This file will then save it to the MySql database.
4. Sleeps for 10 seconds (for demo purposes). 
5. Repeat the steps again
