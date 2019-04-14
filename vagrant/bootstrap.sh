#!/usr/bin/env bash

apt-get update
apt-get install -y apache2

cp /vagrant/config/000-default.conf /etc/apache2/sites-available

systemctl restart apache2
