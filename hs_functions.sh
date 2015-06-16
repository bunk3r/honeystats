#!/bin/bash
#
# Honeystats functions
#

# hs_perm directory
function hs_perm {
	echo "[i] applying 777 to stats dir ($1/stats)"
	/bin/chmod --recursive 777 $1/stats
}

# copy2 filetype path 
function copy2 {
	hs_perm $2
	echo "[i] cp $app/stats/*.$1 to $2/stats"
	cp -r $app/stats/*.txt $2/stats
	hs_perm $2
}

# 
# hs_perm db file select
#
function hs_select {
	/bin/rm -f $app/stats/$2.tmp
	echo "[i] creating $2.tmp"
	if [ $1 == 'kippo' ]; then
		/usr/bin/mysql --user=$mysqluser --password=$mysqlpass --database=$kippodb --execute="$3 into outfile '/`echo $app`/stats/`echo $2`.tmp';"
	elif [ $1 == 'glastopf' ]; then
		/usr/bin/mysql --user=$mysqluser --password=$mysqlpass --database=$glastodb --execute="$3 into outfile '/`echo $app`/stats/`echo $2`.tmp';"
	#else
	#	/usr/bin/mysql --user=$mysqluser --password=$mysqlpass --database= --execute="$3 into outfile '/`echo $app`/stats/`$2`.tmp';"
	fi
	/bin/mv $app/stats/$2.tmp $app/stats/$2
}

if [ ! -d "$app/stats" ]; then
  echo "[!] stats directory doesn't exists ($app/stats):\t let's create it!"
  /bin/mkdir $app/stats
  hs_perm $app
fi