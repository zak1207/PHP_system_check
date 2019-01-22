<?php

$output = shell_exec('ps auxww');

$array_check = array(
'/sbin/init',
'/sbin/slaacd',
'slaacd: frontend (slaacd)',
'slaacd: engine (slaacd)',
'/usr/local/sbin/openvpn --daemon --config /etc/openvpn/server.conf',
'syslogd: [priv] (syslogd)',
'/usr/sbin/syslogd',
'pflogd: [running] -s 160 -i pflog0 -f /var/log/pflog (pflogd)',
'pflogd: [priv] (pflogd)',
'nsd -c /var/nsd/etc/nsd.conf',
'unbound -c /var/unbound/etc/unbound.conf',
'ntpd: ntp engine (ntpd)',
'/usr/sbin/ntpd',
'ntpd: dns engine (ntpd)',
'isakmpd: monitor [priv] (isakmpd)',
'/sbin/isakmpd',
'npppd: [priv] (npppd)',
'/usr/sbin/npppd',
'/usr/sbin/portmap',
'mountd: [priv] (mountd)',
'mountd: parent (mountd)',
'/usr/sbin/sshd',
'snmpd: snmpe (snmpd)',
'snmpd: traphandler (snmpd)',
'/usr/sbin/snmpd',
'relayd: ca (relayd)',
'relayd: pfe (relayd)',
'relayd: hce (relayd)',
'relayd: relay (relayd)',
'relayd: ca (relayd)',
'/usr/sbin/relayd',
'/usr/sbin/dhcpd em0 sk1 ral0 vlan0 vlan1',
'/usr/sbin/rtadvd em0 sk1',
'smtpd: control (smtpd)',
'/usr/sbin/smtpd',
'smtpd: klondike (smtpd)',
'smtpd: lookup (smtpd)',
'smtpd: scheduler (smtpd)',
'smtpd: pony express (smtpd)',
'smtpd: queue (smtpd)',
'/usr/sbin/ftp-proxy',
'spamd: [priv] (greylist) (spamd)',
'spamd: (pf <spamd-white> update) (spamd)',
'spamd: (/var/db/spamd update) (spamd)',
'/usr/libexec/spamlogd',
'/usr/bin/sndiod',
'sndiod: helper (sndiod)',
'/usr/local/bin/dbus-daemon --system',
'avahi-daemon: -avahi-daemon: running [bsdhost.local] (avahi-daemon)',
'/usr/local/sbin/smbd -D',
'/usr/local/sbin/nmbd -D',
'pure-ftpd: -pure-ftpd (SERVER) (pure-ftpd)',
'/usr/local/bin/tor',
'/usr/local/sbin/squid',
'(squid-1) (squid)',
'(unlinkd) (unlinkd)',
'(logfile-daemon) /var/squid/logs/access.log (log_file_daemon)',
'php-fpm-5.6: master process (/etc/php-fpm.conf) (php-fpm-5.6)',
'php-fpm-5.6: pool www (php-fpm-5.6)',
'/usr/local/sbin/httpd2 -k graceful',
'/usr/local/sbin/igmpproxy -c /etc/igmpproxy.conf',
'/usr/sbin/ftp-proxy -p 8011 -R 172.16.1.10 -P 21 -D7 -v',
'/usr/local/bin/flow-capture -w /home/bsduser/netflow -n 143 127.0.0.1/0/1234',
'/usr/sbin/apmd -A',
'/usr/sbin/cron',
'/usr/sbin/wsmoused',
'/usr/local/sbin/httpd2 -k graceful',
'nsd -c /var/nsd/etc/nsd.conf',
'/bin/sh /usr/local/bin/mysqld_safe',
'/usr/local/libexec/mysqld --basedir=/usr/local --datadir=/home/bsduser/mysql --plugin-dir=/usr/local/lib/mysql/plugin --user=_mysql --log-error=/home/bsduser/mysql/bsdhost.ru.err --pid-file=bsdhost.ru.pid --socket=/var/run/mysql/mysql.sock --port=3306',
'/usr/libexec/getty std.9600 ttyC0',
'/usr/libexec/getty std.9600 ttyC1',
'/usr/libexec/getty std.9600 ttyC2',
'/usr/libexec/getty std.9600 ttyC3',
'/usr/libexec/getty std.9600 ttyC5'
);

foreach ($array_check as $i=>$item) {
	if (strpos($output, $item) == false) {
	$errors = $errors . "\r\n". '['. $i . '] ' . $item . ' has problem';
	}
}

if (empty($errors)) {
    echo "The system is working properly\r\n";
} else {
	echo $errors . "\r\n";
}


// Debug:
// echo '<pre>'.htmlspecialchars($output).'</pre>';
// ps auxww | awk -v f=1 -v t=10 '{for(i=1;i<=NF;i++)if(i>=f&&i<=t)continue;else printf("%s%s",$i,(i!=NF)?OFS:ORS)}' | sed "s/.*/'&',/" | uniq

?>
