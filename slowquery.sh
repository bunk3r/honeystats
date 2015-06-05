#!/bin/bash
#
# CRONTAB SETTINGS (every day at 2:30 AM)
# 30 2 * * * /opt/honeystats/password.sh
#
MY_DIR=$(dirname $(readlink -f $0))
. $MY_DIR/honeystats.cfg

if [ ! -d "$app/stats" ]; then
  echo "[!] stats directory doesn't exists ($app/stats):\t let's create it!"
  /bin/mkdir $app/stats
  /bin/chmod --recursive 777 $app/stats
fi

echo "[i] applying 777 to stats dir ($app/stats)"
/bin/chmod --recursive 777 $app/stats
cd $app/stats

#
# LIVE DICT PASSWORD (SLOW)
#
/bin/rm -f $app/stats/live_dict.txt
/bin/rm -f $app/stats/live_dict.txt.tar.gz
echo "[i] creating 'live_dict.txt'"
/usr/bin/mysql --user=$mysqluser --password=$mysqlpass --database=$kippodb --execute="select distinct password from auth order by password ASC into outfile '`echo $app`/stats/live_dict.txt';"
/bin/tar czf $app/stats/live_dict.txt.tar.gz $app/stats/live_dict.txt
/bin/rm -f $app/stats/live_dict.txt

#
# TOP 15 USER+PASS (SLOW)
#
echo "[i] creating 'kippo_top15userpass.txt.tmp'"
/bin/rm -f $app/stats/kippo_top15userpass.txt.tmp
/usr/bin/mysql --user=$mysqluser --password=$mysqlpass --database=$kippodb --execute="SELECT username,password,count(*) AS count FROM auth GROUP BY USERNAME,PASSWORD ORDER BY count DESC LIMIT 15 into outfile '`echo $app`/stats/kippo_top15userpass.txt.tmp'";
/bin/mv $app/stats/kippo_top15userpass.txt.tmp $app/stats/kippo_top15userpass.txt

echo "[i] applying 777 to stats dir ($app/stats)"
/bin/chmod --recursive 777 $app/stats