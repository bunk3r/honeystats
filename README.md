# honeystats
A simple and effective environment created to collect data from honeypots (kippo, glastopf, etc.) and publish them online (php)

## **INSTALL**

* cd /opt
* git clone git://github.com/bunk3r/honeystats.git

1. edit 'honeystats.cfg' with your needs (cp honeystats.cfg to honeystats.cfg)
2. copy 'www' content into your www-root apache directory (this is the site, change it as you want)
3. launch 'mainstats.sh' and 'slowquery.sh'
 or
4. edit your crontab as in the first lines of .sh files to keep your stats updated

## **NOTICE**

you can automount with fuse a remote ftp/ssh server (e.g. your web hosting server) and use it with honeystats (you can edit the mountpoint in the .cfg and remove comments from FTP/SSH parts into the .sh files)

* slowquery.sh - this is the file for the very slow queries (e.g. kippo passwords)
* mainstats.sh - all other queries
* wp-hs.sh - wordpress related attacks stats (only txt files, not yet included in www)
