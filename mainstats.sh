#!/bin/bash
#
# CRONTAB SETTINGS (every 30 minutes)
# 0,30 * * * * /opt/honeystats/mainstats.sh
#
MY_DIR=$(dirname $(readlink -f $0))
. $MY_DIR/honeystats.cfg
. $MY_DIR/hs_functions.sh

hs_perm $app
cd $app/stats

#
# GLASTOPF TOP 15 FILES
#
hs_select 'glastopf' 'glastopf_top15files.txt' "SELECT COUNT(filename), filename FROM events GROUP BY filename ORDER BY COUNT(filename) DESC LIMIT 15"

#
# GLASTOPF ALL MALWARE FILES
#
hs_select 'glastopf' 'mfiles.txt' "SELECT LEFT (source, LOCATE (':', source)-1) AS IP, filename, SUBSTRING_INDEX(request_url,'http',-1) as s FROM events WHERE filename is not null GROUP BY filename"
#"SELECT LEFT (source, LOCATE (':', source)-1) AS IP, filename, SUBSTRING_INDEX(request_url,'http',-1) as s FROM events WHERE filename is not null GROUP BY filename,IP,s order by s,filename,IP ASC"

#
# KIPPO TOP 20 IP
#
hs_select 'kippo' 'kippo_top20ip.txt' 'select count(ip) as count, ip from sessions group by ip order by count desc limit 20'

#
# KIPPO LAST 20 SESSIONS
#
hs_select 'kippo' 'kippo_last20sess.txt' 'SELECT starttime,ip FROM sessions order by starttime desc limit 20'

#
# KIPPO LAST 50 COMMANDS
#
hs_select 'kippo' 'kippo_last50commands.txt' 'SELECT timestamp,input,ip FROM input, sessions where input.session = sessions.id order by timestamp DESC limit 50'

#
# GLASTOPF LAST 20 EVENTS
#
hs_select 'glastopf' 'glastopf_last20events.txt' "SELECT id,time,pattern, source AS 'IP', request_url FROM events WHERE pattern != 'style_css' AND pattern != 'robots' ORDER BY id DESC LIMIT 20"

#
# GLASTOPF TOP 15 IP
#
hs_select 'glastopf' 'glastopf_top15ip.txt' "SELECT id, pattern, count(LEFT (source, LOCATE (':', source)-1)) AS count, LEFT(source, LOCATE(':', source)-1) AS 'IP' FROM events where pattern = 'sqli' or pattern = 'rfi' GROUP BY IP ORDER BY count DESC LIMIT 15"

#
# GLASTOPF TOP 15 EXT
#
hs_select 'glastopf' 'glastopf_top15ext.txt' 'SELECT count,content FROM  ext ORDER BY ext.count DESC LIMIT 15'

#
# GLASTOPF TOP 15 INTITLE
#
hs_select 'glastopf' 'glastopf_top15intitle.txt' 'SELECT count,content FROM intitle ORDER BY intitle.count DESC LIMIT 15'

#
# GLASTOPF TOP 15 INTEXT
#
hs_select 'glastopf' 'glastopf_top15intext.txt' "SELECT count,content FROM intext ORDER BY intext.count DESC LIMIT 15"

#
# GLASTOPF TOP 15 INURL
#
hs_select 'glastopf' 'glastopf_top15inurl.txt' 'SELECT count,content FROM inurl ORDER BY inurl.count DESC LIMIT 15'

#
# KIPPO ALL USERS
#
hs_select 'kippo' 'live_users.txt' 'select distinct username from auth order by username ASC'

#
# COPY TXT TO FTP
#
#copy2 txt $mnt

#
# COPY TXT TO WWW
#
copy2 txt $www

hs_perm $app
