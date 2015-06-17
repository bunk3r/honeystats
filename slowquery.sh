#!/bin/bash
#
# CRONTAB SETTINGS (every day at 2:30 AM)
# 30 2 * * * /opt/honeystats/slowquery.sh
#
MY_DIR=$(dirname $(readlink -f $0))
. $MY_DIR/honeystats.cfg
. $MY_DIR/hs_functions.sh

hs_perm $app
cd $app/stats

#
# LIVE DICT PASSWORD (SLOW)
#
/bin/rm -f live_dict.txt.tar.gz
hs_select 'kippo' 'live_dict.txt' 'select distinct password from auth order by password ASC'
/bin/tar -czf live_dict.txt.tar.gz live_dict.txt
/bin/rm -f live_dict.txt

#
# TOP 15 USER+PASS (SLOW)
#
hs_select 'kippo' 'kippo_top15userpass.txt' 'SELECT username,password,count(*) AS count FROM auth GROUP BY USERNAME,PASSWORD ORDER BY count DESC LIMIT 15'

#
# LIVE DICT USER+PASS (SLOW)
#
/bin/rm -f live_userpass_dict.txt.tar.gz
hs_select 'kippo' 'live_userpass_dict.txt' "SELECT username, password FROM auth WHERE username <> '' AND password <> '' GROUP BY username, password DESC"
/bin/tar -czf live_userpass_dict.txt.tar.gz live_userpass_dict.txt
/bin/rm -f live_userpass_dict.txt

#
# TOP 20 SUCCESSFUL LOGIN IPs (maybe SLOW)
#
hs_select 'kippo' 'kippo_top20successlogin.txt' 'SELECT COUNT(sessions.ip) AS count, sessions.ip FROM sessions INNER JOIN auth ON sessions.id = auth.session WHERE auth.success = 1 GROUP BY sessions.ip ORDER BY count DESC LIMIT 20'

#
# COPY TXT+TGZ TO FTP
#
#copy2 txt $mnt
#copy2 tar.gz $mnt

#
# COPY TXT TO WWW
#
copy2 txt $www
copy2 tar.gz $www

hs_perm $app
