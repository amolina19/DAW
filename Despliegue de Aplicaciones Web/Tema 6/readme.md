https://www.digitalocean.com/community/tutorials/how-to-install-and-secure-phpmyadmin-on-ubuntu-20-04

FIX PHPMYADMIN PASSWORD POLICY

apt install phpmyadmin php-mbstring php-zip php-gd php-json php-curl

sudo mysql

mysql -u root -p

UNINSTALL COMPONENT "file://component_validate_password";

exit

sudo apt install phpmyadmin

ALTER USER 'pphmyadmin'@'localhost' IDENTIFIED WITH mysql_native_password BY 'despliegue';
