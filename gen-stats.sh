cat <<EOF > stats.html
<h1><font color="blue">Node Stats.html</font></h2>
<h2>Realtime Statics for node: <font color="red"> $(hostname -f):80 </font></h2>


<ul>
        <li><b>Uname:</b> $(uname -a) </li>
        <li><b>CPU:</b>  $(grep 'cpu ' /proc/stat| awk '{usage=($2+$4)*100/($2+$4+$5)} END {print usage "%"}') </li>
        <li><b>Memory(MB):</b>  $(free -m | awk 'NR==3 {print "used:"$3" free:"$4}') </li>
        <li><b>Uptime:</b>  $(uptime) </li>
</ul>

<h3> list of live connections </h3>
<code><pre>
$(netstat -an | grep :80)
</pre></code>
<h3> Traffic Statistics </h3>
<pre>
$(netstat -s)
</pre>
EOF
