#!/bin/bash

SLUG="portal-timtec"
DB_NAME="wordpress"
LOCAL_BIN="/usr/local/bin"
VAGRANT_PATH="/var/www/wordpress"

echo "---> Installing apt packages"
apt-get -y update && \
apt-get -y upgrade && \
DEBIAN_FRONTEND=noninteractive apt-get -y install unzip npm nodejs mysql-client mysql-server python-mysqldb php5 php5-cli php5-curl php5-gd php5-imagick php5-mysql php5-xmlrpc apache2 libapache2-mod-php5 && \

echo "---> Enable mod rewrite"
a2enmod rewrite && \

echo "---> Adding vagrant user to admin groups"
usermod -a -G www-data,adm,root vagrant && \

echo "---> Adding vagrant new home user"
usermod -d $VAGRANT_PATH vagrant && \

echo "---> Adding vagrant user to admin groups"
usermod -a -G adm,root www-data && \

echo "---> Creating database"
{ mysqladmin -u root create $DB_NAME ; } || { echo "ok" ; } 

echo "---> Populating database"
mysql -u root $DB_NAME < /var/www/wordpress/db/base.sql && \

echo "---> Install wp-cli"
wget -q -c https://raw.githubusercontent.com/wp-cli/builds/gh-pages/phar/wp-cli.phar -O $LOCAL_BIN/wp && \
chmod -v 755 $LOCAL_BIN/wp && \

echo "---> Configuring apache2 vhost"
cp -v $VAGRANT_PATH/templates/vhost.conf /etc/apache2/sites-available/ && \

echo "---> Configuring wp-config"
cp -v $VAGRANT_PATH/templates/wp-config-sample.php /var/www/wordpress/src/wp-config.php && \

echo "---> cp htaccess template"
cp -v /var/www/wordpress/src/_htaccess /var/www/wordpress/src/.htaccess

echo "---> Search replace into database"
su - vagrant -c "cd /var/www/wordpress/src; /usr/local/bin/wp search-replace \"http://localhost/$SLUG\" \"http://localhost:8000\"" && \

echo "---> Create symbolic link to nodejs"
ln -fvs /usr/bin/nodejs /usr/bin/node

echo "---> Install node packages"
su - vagrant -c 'cd /var/www/wordpress/src; /usr/bin/npm --silent install' && \
/usr/bin/npm -q install -g grunt-cli && \
su - vagrant -c 'cd /var/www/wordpress/src; /usr/local/bin/grunt less' && \

echo "---> Enable site vhost"
a2ensite vhost && \
a2dissite 000-default

echo "---> Restarting apache"
/etc/init.d/apache2 restart 

echo "<------------- all done ------------->"
