#!/bin/bash
#
# CRONTAB SETTINGS (every day at 2:30 AM)
# 30 2 * * * /opt/honeystats/wp-hs.sh
#
MY_DIR=$(dirname $(readlink -f $0))
. $MY_DIR/honeystats.cfg
. $MY_DIR/hs_functions.sh

hs_perm $app
cd $app/stats

#
# GLASTOPF WORDPRESS THEMES LIST
#
hs_select 'glastopf' 'glastopf_wpthemeslist.txt' "SELECT request_url FROM events WHERE pattern != 'style_css' AND pattern != 'robots' AND request_url like '%wp%/themes/%'"
/bin/cat $app/stats/glastopf_wpthemeslist.txt | perl -l -ne '/\/themes\/([a-z0-9]+)\// and print $1' | sort -u > $app/stats/glastopf_wpthemeslist.txt.tmp
/bin/mv $app/stats/glastopf_wpthemeslist.txt.tmp $app/stats/glastopf_wpthemeslist.txt

hs_select 'glastopf' 'glastopf_wpattackslist.txt' "SELECT id,time,pattern, source AS 'IP', request_url FROM events WHERE pattern != 'style_css' AND pattern != 'robots' AND request_url like '%/themes/%'"
/bin/cat $app/stats/glastopf_wpattackslist.txt | perl -l -ne '/\t+([a-z0-9]*\/themes\/[a-z0-9]+\/.*)/ and print $1' | sort -u > $app/stats/glastopf_wpattackslist.txt.tmp
/bin/mv $app/stats/glastopf_wpattackslist.txt.tmp $app/stats/glastopf_wpattackslist.txt

#
# COPY TXT TO FTP
#
copy2 txt $mnt

#
# COPY TXT TO WWW
#
copy2 txt $www

hs_perm $app
