#!/usr/bin/env bash

apt-get update
apt-get install -y apache2

cp /vagrant/config/000-default.conf /etc/apache2/sites-available

debconf-set-selections <<< 'mysql-server mysql-server/root_password password root'
debconf-set-selections <<< 'mysql-server mysql-server/root_password_again password root'
apt-get -y install mysql-server

LC_ALL=C.UTF-8 add-apt-repository ppa:ondrej/php -y
apt-get update
apt-get -y install php7.3 php7.3-cli php7.3-common libapache2-mod-php7.3 php7.3-mbstring php7.3-xmlrpc php7.3-soap php7.3-gd php7.3-xml php7.3-zip php7.3-mysql
a2enmod php7.3

curl -sS https://getcomposer.org/installer | sudo php -- --install-dir=/usr/local/bin --filename=composer

a2enmod rewrite

apt-get -y upgrade

systemctl restart apache2
