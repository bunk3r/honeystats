# honeystats
A simple and effective environment created to collect data from honeypots (kippo, glastopf, etc.) and publish them online (php + apache)

INSTALL: 
1 - edit 'honeystats.cfg' with your needs
2 - copy 'www' content into your www-root apache directory (this is the site, change it as you want)
3 - launch 'mainstats.sh' and 'slowquery.sh'
 or
3.1 - edit your crontab as in the first line of .sh files to keep your stats updated

NOTICE:
you can automount with fuse a remote ftp/ssh server (your web hosting server, for example) and use it with honeystats  (you can edit the mountpoint in the .cfg and remove comments from FTP/SSH fuse settings into the .sh files)
