# Run a volume container and add media folder from sample data
docker run -i -t --name kimtoys_data -v /app/var -v /app/media ubuntu:13.04 /bin/bash

# Run a mysql container that is also a a data volume container
docker run -d -p 3306 --name kimtoys_db tutum/mysql

Find out the admin password if it was not provided when creating the db container: docker logs kimtoys_db

mysql -uadmin -p<password> -h<host> -P<port>

create database magento-db-instance-name;

# Import the CE or EE sample data into your MySQL database as follows:
mysql -u root -p magento-db-instance-name < path-to-sample-data-extract-dir/sample-data-filename.sql

# Edit magento database redirect links
mysql -uadmin -p<password> -h<host> -P<port>

USE magento;
SELECT * FROM core_config_data WHERE path="web/unsecure/base_url";
UPDATE core_config_data SET value="http://<host>:<port>/" WHERE path="web/unsecure/base_url";
SELECT * FROM core_config_data WHERE path="web/secure/base_url";
UPDATE core_config_data SET value="http://<host>:<port>/" WHERE path="web/secure/base_url"
exit;

# Build magento container
Edit /app/etc/local.xml with mysql connection params.

docker build -t krebernisak/magento .

# Run magento apache container
docker run -d -p 80 --name kimtoys_magento_app --volumes-from kimtoys_data krebernisak/magento

# Reset admin user password if necessary
SELECT username, password FROM admin_user;
UPDATE admin_user SET password=CONCAT(MD5('qXpassword'), ':qX') WHERE username='admin';

# References
- http://www.magentocommerce.com/knowledge-base/entry/ce18-and-ee113-installing
- http://www.magentocommerce.com/knowledge-base/entry/install-privs-after
- http://themeforest.net/item/flatshop-responsive-magento-theme/5872457?ref=MeigeeTeam
