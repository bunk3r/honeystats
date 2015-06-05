#!/bin/bash
#
# CRONTAB SETTINGS (every 30 minutes)
# 0,30 * * * * /opt/honeystats/mainstats.sh
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
# GLASTOPF TOP 15 FILES
#
/bin/rm -f $app/stats/glastopf_top15files.txt.tmp
echo "[i] creating 'glastopf_top15files.txt.tmp'"
/usr/bin/mysql --user=$mysqluser --password=$mysqlpass --database=$glastodb --execute="SELECT COUNT(filename), filename FROM events GROUP BY filename ORDER BY COUNT(filename) DESC LIMIT 15 into outfile '/`echo $app`/stats/glastopf_top15files.txt.tmp';"
/bin/mv glastopf_top15files.txt.tmp glastopf_top15files.txt


#
# GLASTOPF ALL MALWARE FILES
#
/bin/rm -f $app/stats/mfiles.txt.tmp 
echo "[i] creating 'mfiles.txt.tmp '"
/usr/bin/mysql --user=$mysqluser --password=$mysqlpass --database=$glastodb --execute="SELECT LEFT (source, LOCATE (':', source)-1) AS IP, filename, SUBSTRING_INDEX(request_url,'http',-1) as s FROM events WHERE filename is not null GROUP BY filename,IP,s order by s,filename,IP ASC into outfile '/`echo $app`/stats/mfiles.txt.tmp';"
/bin/mv $app/stats/mfiles.txt.tmp $app/stats/mfiles.txt

#
# KIPPO TOP 20 IP
#
/bin/rm -f $app/stats/kippo_top20ip.txt.tmp
echo "[i] creating 'kippo_top20ip.txt.tmp'"
/usr/bin/mysql --user=$mysqluser --password=$mysqlpass --database=$kippodb --execute="select count(ip) as count, ip from sessions group by ip order by count desc limit 20 into outfile '/`echo $app`/stats/kippo_top20ip.txt.tmp';"
/bin/mv $app/stats/kippo_top20ip.txt.tmp $app/stats/kippo_top20ip.txt

#
# KIPPO LAST 20 SESSIONS
#
/bin/rm -f $app/stats/kippo_last20sess.txt.tmp
echo "[i] creating 'kippo_last20sess.txt.tmp'"
/usr/bin/mysql --user=$mysqluser --password=$mysqlpass --database=$kippodb --execute="SELECT starttime,ip FROM sessions order by starttime desc limit 20 into outfile '/`echo $app`/stats/kippo_last20sess.txt.tmp';"
/bin/mv $app/stats/kippo_last20sess.txt.tmp $app/stats/kippo_last20sess.txt

#
# KIPPO LAST 50 COMMANDS
#
/bin/rm -f $app/stats/kippo_last50commands.txt.tmp
echo "[i] creating 'kippo_last50commands.txt.tmp'"
/usr/bin/mysql --user=$mysqluser --password=$mysqlpass --database=$kippodb --execute="SELECT timestamp,input,ip FROM input, sessions where input.session = sessions.id order by timestamp DESC limit 50 into outfile '/`echo $app`/stats/kippo_last50commands.txt.tmp';"
/bin/mv $app/stats/kippo_last50commands.txt.tmp $app/stats/kippo_last50commands.txt

#
# GLASTOPF LAST 20 EVENTS
#
/bin/rm -f $app/stats/glastopf_last20events.txt.tmp
echo "[i] creating 'glastopf_last20events.txt.tmp'"
/usr/bin/mysql --user=$mysqluser --password=$mysqlpass --database=$glastodb --execute="SELECT id,time,pattern, source AS 'IP', request_url FROM events WHERE pattern != 'style_css' AND pattern != 'robots' ORDER BY id DESC LIMIT 20 into outfile '/`echo $app`/stats/glastopf_last20events.txt.tmp';"
/bin/mv $app/stats/glastopf_last20events.txt.tmp $app/stats/glastopf_last20events.txt

#
# GLASTOPF TOP 15 IP
#
/bin/rm -f $app/stats/glastopf_top15ip.txt.tmp
echo "[i] creating 'glastopf_top15ip.txt.tmp'"
/usr/bin/mysql --user=$mysqluser --password=$mysqlpass --database=$glastodb --execute="SELECT id, pattern, count(LEFT (source, LOCATE (':', source)-1)) AS count, LEFT(source, LOCATE(':', source)-1) AS 'IP' FROM events where pattern = 'sqli' or pattern = 'rfi' GROUP BY IP ORDER BY count DESC LIMIT 15 into outfile '/`echo $app`/stats/glastopf_top15ip.txt.tmp';"
/bin/mv $app/stats/glastopf_top15ip.txt.tmp $app/stats/glastopf_top15ip.txt

#
# GLASTOPF TOP 15 EXT
#
/bin/rm -f $app/stats/glastopf_top15ext.txt.tmp
echo "[i] creating 'glastopf_top15ext.txt.tmp'"
/usr/bin/mysql --user=$mysqluser --password=$mysqlpass --database=$glastodb --execute="SELECT count,content FROM  ext ORDER BY ext.count DESC LIMIT 15 into outfile '/`echo $app`/stats/glastopf_top15ext.txt.tmp';"
/bin/mv $app/stats/glastopf_top15ext.txt.tmp $app/stats/glastopf_top15ext.txt

#
# GLASTOPF TOP 15 INTITLE
#
/bin/rm -f $app/stats/glastopf_top15intitle.txt.tmp
echo "[i] creating 'glastopf_top15intitle.txt.tmp'"
/usr/bin/mysql --user=$mysqluser --password=$mysqlpass --database=$glastodb --execute="SELECT count,content FROM intitle ORDER BY intitle.count DESC LIMIT 15 into outfile '/`echo $app`/stats/glastopf_top15intitle.txt.tmp';"
/bin/mv $app/stats/glastopf_top15intitle.txt.tmp $app/stats/glastopf_top15intitle.txt

#
# GLASTOPF TOP 15 INTEXT
#
/bin/rm -f $app/stats/glastopf_top15intext.txt.tmp
echo "[i] creating 'glastopf_top15intext.txt.tmp'"
/usr/bin/mysql --user=$mysqluser --password=$mysqlpass --database=$glastodb --execute="SELECT count,content FROM intext ORDER BY intext.count DESC LIMIT 15 into outfile '/`echo $app`/stats/glastopf_top15intext.txt.tmp';"
/bin/mv $app/stats/glastopf_top15intext.txt.tmp $app/stats/glastopf_top15intext.txt

#
# GLASTOPF TOP 15 INURL
#
/bin/rm -f $app/stats/glastopf_top15inurl.txt.tmp
echo "[i] creating 'glastopf_top15inurl.txt.tmp'"
/usr/bin/mysql --user=$mysqluser --password=$mysqlpass --database=$glastodb --execute="SELECT count,content FROM inurl ORDER BY inurl.count DESC LIMIT 15 into outfile '/`echo $app`/stats/glastopf_top15inurl.txt.tmp';"
/bin/mv $app/stats/glastopf_top15inurl.txt.tmp $app/stats/glastopf_top15inurl.txt

#
# KIPPO ALL USERS
#
/bin/rm -f $app/stats/live_users.txt.tmp
echo "[i] creating 'live_users.txt.tmp'"
/usr/bin/mysql --user=$mysqluser --password=$mysqlpass --database=$kippodb --execute="select distinct username from auth order by username ASC into outfile '/`echo $app`/stats/live_users.txt.tmp';"
/bin/mv $app/stats/live_users.txt.tmp $app/stats/live_users.txt

#
# COPY TXT TO FTP
#
#cp -r $app/stats/*.txt $mnt/stats
#chmod --recursive 777 $mnt/stats

echo "[i] applying 777 to stats dir ($app/stats)"
/bin/chmod --recursive 777 $app/stats
