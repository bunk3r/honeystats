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
